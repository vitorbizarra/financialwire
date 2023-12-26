<?php

namespace App\Filament\Widgets;

use App\Enums\TransactionType;
use App\Models\Transactions\Transaction;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Builder;

class TransactionsOverview extends BaseWidget
{
    use InteractsWithPageFilters;

    protected function getStats(): array
    {
        $startDate = $this->filters['startDate'] ?? null;
        $endDate = $this->filters['endDate'] ?? null;
        $finished = $this->filters['finished'] ?? null;

        return [
            Stat::make(
                label: 'Incomes',
                value: $this->formatCurrency($this->getIncomes($startDate, $endDate, $finished))
            )->icon('heroicon-m-arrow-trending-up'),

            Stat::make(
                label: 'Expenses',
                value: $this->formatCurrency($this->getExpenses($startDate, $endDate, $finished))
            )->icon('heroicon-m-arrow-trending-down'),

            Stat::make(
                label: 'Current Balance',
                value: $this->formatCurrency($this->getCurrentBalance($startDate, $endDate, $finished))
            )->icon('heroicon-m-building-library'),
        ];
    }

    private function getTransactions($startDate, $endDate, bool $finished, TransactionType $transactionType): Builder
    {
        $query = Transaction::where('user_id', auth()->user()->id)
            ->where('transaction_type', $transactionType)
            ->whereBetween('date', [$startDate, $endDate]);

        if ($finished) {
            $query->where('finished', $finished);
        }

        return $query;
    }

    private function getIncomes($startDate, $endDate, bool $finished)
    {
        return $this->getTransactions($startDate, $endDate, $finished, TransactionType::Income)
            ->sum('amount');
    }

    private function getExpenses($startDate, $endDate, bool $finished)
    {
        return $this->getTransactions($startDate, $endDate, $finished, TransactionType::Expense)
            ->sum('amount');
    }



    private function getCurrentBalance($startDate, $endDate, bool $finished)
    {
        return $this->getIncomes($startDate, $endDate, $finished) - $this->getExpenses($startDate, $endDate, $finished);
    }

    private function formatCurrency(int $currency): string
    {
        return 'R$ ' . number_format($currency / 100, 2, decimal_separator: ',', thousands_separator: '.');
    }
}
