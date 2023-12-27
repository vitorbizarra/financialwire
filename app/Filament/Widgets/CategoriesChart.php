<?php

namespace App\Filament\Widgets;

use App\Enums\TransactionType;
use App\Models\Transactions\Category;
use App\Models\Transactions\Transaction;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Database\Eloquent\Builder;

class CategoriesChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $startDate = $this->filters['startDate'] ?? now()->startOfMonth();
        $endDate = $this->filters['endDate'] ?? now()->endOfMonth();
        $preview = $this->filters['preview'] ?? null;

        $data = [];
        $backgroundColor = [];
        $labels = [];

        foreach (auth()->user()->categories()->orderBy('name')->get() as $key => $category) {

            $income = $this->getCategoryAmount($category, $startDate, $endDate, $preview, TransactionType::Income);
            $expense = $this->getCategoryAmount($category, $startDate, $endDate, $preview, TransactionType::Expense);

            $data[] = ($income - $expense) / 100;
            $backgroundColor[] = $category->color;
            $labels[] = $category->name;
        }

        return [
            'datasets' => [
                [
                    'label'           => 'Revenue by category',
                    'data'            => $data,
                    'backgroundColor' => $backgroundColor,
                ],
            ],
            'labels'   => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    private function getCategoryAmount(Category $category, string $startDate, string $endDate, bool $preview, TransactionType $transactionType): int
    {
        $query = $category
            ->transactions()
            ->where('transaction_type', $transactionType)
            ->whereBetween('date', [$startDate, $endDate]);

        if (!$preview) {
            $query->where('finished', true);
        }

        return $query->sum('amount');
    }
}
