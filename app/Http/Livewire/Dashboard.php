<?php

namespace App\Http\Livewire;

use App\Models\Expense;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Component;

class Dashboard extends Component
{
    public $types = ['food', 'shopping', 'entertainment', 'travel', 'other'];

    public $colors = [
        'food' => '#f6ad55',
        'shopping' => '#fc8181',
        'entertainment' => '#90cdf4',
        'travel' => '#66DA26',
        'other' => '#cbd5e0',
    ];

    public $firstRun = true;

    public $showDataLabels = false;

    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
    ];

    public function handleOnPointClick($point)
    {
        dd($point);
    }

    public function handleOnSliceClick($slice)
    {
        dd($slice);
    }

    public function handleOnColumnClick($column)
    {
        dd($column);
    }

    public function render()
    {
        $expenses = Expense::whereIn('type', $this->types)->get();

        $columnChartModel = $expenses->groupBy('type')
            ->reduce(function ($columnChartModel, $data) {
                $type = $data->first()->type;
                $value = $data->sum('amount');

                return $columnChartModel->addColumn($type, $value, $this->colors[$type]);
            }, LivewireCharts::columnChart()
                ->setTitle('Expenses by Type')
                ->setAnimated($this->firstRun)
                ->withOnColumnClickEventName('onColumnClick')
                ->setLegendVisibility(false)
                ->setDataLabelsEnabled($this->showDataLabels)
            );

        $pieChartModel = $expenses->groupBy('type')
            ->reduce(function ($pieChartModel, $data) {
                $type = $data->first()->type;
                $value = $data->sum('amount');

                return $pieChartModel->addSlice($type, $value, $this->colors[$type]);
            }, LivewireCharts::pieChart()
                ->setTitle('Expenses by Type')
                ->setAnimated($this->firstRun)
                ->withOnSliceClickEvent('onSliceClick')
                ->legendPositionBottom()
                ->legendHorizontallyAlignedCenter()
                ->setDataLabelsEnabled($this->showDataLabels)
            );

        $lineChartModel = $expenses
            ->reduce(function ($lineChartModel, $data) use ($expenses) {
                $index = $expenses->search($data);

                $amountSum = $expenses->take($index + 1)->sum('amount');

                if ($index == 6) {
                    $lineChartModel->addMarker(7, $amountSum);
                }

                if ($index == 11) {
                    $lineChartModel->addMarker(12, $amountSum);
                }

                return $lineChartModel->addPoint($index, $data->amount, ['id' => $data->id]);
            }, LivewireCharts::lineChart()
                ->setTitle('Expenses Evolution')
                ->setAnimated($this->firstRun)
                ->withOnPointClickEvent('onPointClick')
                ->setSmoothCurve()
                ->setXAxisVisible(true)
                ->setDataLabelsEnabled($this->showDataLabels)
            );

        $areaChartModel = $expenses
            ->reduce(function ($areaChartModel, $data) use ($expenses) {
                $index = $expenses->search($data);
                return $areaChartModel->addPoint($index, $data->amount, ['id' => $data->id]);
            }, LivewireCharts::areaChart()
                ->setTitle('Expenses Peaks')
                ->setAnimated($this->firstRun)
                ->setColor('#f6ad55')
                ->withOnPointClickEvent('onAreaPointClick')
                ->setDataLabelsEnabled($this->showDataLabels)
                ->setXAxisVisible(true)
            );

        $multiLineChartModel = $expenses
            ->reduce(function ($multiLineChartModel, $data) use ($expenses) {
                $index = $expenses->search($data);

                return $multiLineChartModel
                    ->addSeriesPoint($data->type, $index, $data->amount,  ['id' => $data->id]);
            }, LivewireCharts::multiLineChart()
                ->setTitle('Expenses by Type')
                ->setAnimated($this->firstRun)
                ->withOnPointClickEvent('onPointClick')
                ->setSmoothCurve()
                ->multiLine()
                ->setDataLabelsEnabled($this->showDataLabels)
            );

        $multiColumnChartModel = $expenses->groupBy('type')
            ->reduce(function ($multiColumnChartModel, $data) use ($expenses) {
                return $multiColumnChartModel
                    ->addSeriesColumn($data->first()->type, 1, $data->sum('amount'));
            }, LivewireCharts::multiColumnChart()
                ->setAnimated($this->firstRun)
                ->setDataLabelsEnabled($this->showDataLabels)
                ->withOnColumnClickEventName('onColumnClick')
                ->setTitle('Revenue per Year (K)')
                ->stacked()
            );

        $this->firstRun = false;

        return view('livewire.dashboard')
            ->with([
                'columnChartModel' => $columnChartModel,
                'pieChartModel' => $pieChartModel,
                'lineChartModel' => $lineChartModel,
                'areaChartModel' => $areaChartModel,
                'multiLineChartModel' => $multiLineChartModel,
                'multiColumnChartModel' => $multiColumnChartModel,
            ]);
    }
}
