<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class CategoriesChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $data = [];
        $backgroundColor = [];
        $labels = [];

        foreach (auth()->user()->categories()->orderBy('name')->get() as $key => $category) {
            $data[] = $key + 1;
            $backgroundColor[] = $category->color;
            $labels[] = $category->name;
        }

        /**
         * Calculo:
         * Receita - despesas = Receita total
         */

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
}
