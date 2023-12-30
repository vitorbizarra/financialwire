<?php

namespace App\Filament\Widgets;

use App\Enums\TransactionType;
use App\Models\Transactions\Transaction;
use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

class MonthRevenue extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Revenue By Month';

    protected function getData(): array
    {

        $startDate = $this->filters['startDate'] ?? now()->startOfMonth();
        $endDate = $this->filters['endDate'] ?? now()->endOfMonth();
        $preview = $this->filters['preview'] ?? null;

        $income = $this->getPeriodAmount($startDate, $endDate, $preview, TransactionType::Income);
        $expense = $this->getPeriodAmount($startDate, $endDate, $preview, TransactionType::Expense);

        $expense->each(fn($period) => $period->aggregate = -$period->aggregate);

        $data = $income->concat($expense)->groupBy('new_date')->map(fn($items) => ['date' => $items->first()->new_date, 'aggregate' => $items->sum('aggregate') / 100]);

        $final = [
            'datasets' => [
                [
                    'label' => 'Blog posts',
                    'data'  => $data->map(fn($period)  => $period['aggregate'])->values()->toArray(),
                ],
            ],
            'labels'   => $data->map(fn($period)   => Carbon::parse($period['date'])->format('m/Y'))->values()->toArray(),
        ];

        return $final;
    }

    private function getPeriodAmount(string $startDate, string $endDate, bool $preview, TransactionType $transactionType): Collection
    {
        $query = Transaction::selectRaw("
                sum(`amount`) as `aggregate`, 
                DATE_FORMAT(`date`, '%Y-%m') AS `new_date`, 
                YEAR(`date`) AS `year`, 
                MONTH(`date`) AS `month`
            ")
            ->where('user_id', auth()->user()->id)
            ->where('transaction_type', $transactionType)
            ->whereBetween('date', [$startDate, $endDate]);

        if (!$preview) {
            $query->where('finished', true);
        }

        return $query->groupBy('year', 'month')->get();
    }

    protected function getOptions(): RawJs
    {
        return RawJs::make(<<<JS
            {
                scales: {
                    y: {display: false},
                    x: {display: false},
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem, chart){
                                var datasetLabel = tooltipItem.label || '';

                                return datasetLabel + ': ' + Intl.NumberFormat('pt-BR', {
                                    style: 'currency',
                                    currency: 'BRL',
                                }).format(tooltipItem.raw);
                            }
                        }
                    }
                }
            }
        JS);
    }


    protected function getType(): string
    {
        return 'pie';
    }
}
