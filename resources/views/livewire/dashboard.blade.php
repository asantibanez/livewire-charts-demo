<div class="container mx-auto space-y-4 p-4 sm:p-0">
    <ul class="flex flex-col sm:flex-row sm:space-x-8 sm:items-center">
        <li>
            <input type="checkbox" value="travel" wire:model="types"/>
            <span>Travel</span>
        </li>
        <li>
            <input type="checkbox" value="shopping" wire:model="types"/>
            <span>Shopping</span>
        </li>
        <li>
            <input type="checkbox" value="food" wire:model="types"/>
            <span>Food</span>
        </li>
        <li>
            <input type="checkbox" value="entertainment" wire:model="types"/>
            <span>Entertainment</span>
        </li>
        <li>
            <input type="checkbox" value="other" wire:model="types"/>
            <span>Other</span>
        </li>
    </ul>

    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
            <livewire:livewire-column-chart
                key="{{ $columnChartModel->reactiveKey() }}"
                :column-chart-model="$columnChartModel"
            />
        </div>

        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
            <livewire:livewire-pie-chart
                key="{{ $pieChartModel->reactiveKey() }}"
                :pie-chart-model="$pieChartModel"
            />
        </div>
    </div>

    <div class="shadow rounded p-4 border bg-white" style="height: 32rem;">
        <livewire:livewire-line-chart
            key="{{ $lineChartModel->reactiveKey() }}"
            :line-chart-model="$lineChartModel"
        />
    </div>

    <div class="shadow rounded p-4 border bg-white" style="height: 32rem;">
        <livewire:livewire-area-chart
            key="{{ $areaChartModel->reactiveKey() }}"
            :area-chart-model="$areaChartModel"
        />
    </div>

    <div class="shadow rounded p-4 border bg-white" style="height: 32rem;">
        <livewire:livewire-radar-chart
            key="{{ $radarChartModel->reactiveKey() }}"
            :radar-chart-model="$radarChartModel"
        />
    </div>

    <div class="shadow rounded p-4 border bg-white" style="height: 32rem;">
        <livewire:livewire-tree-map-chart
            key="{{ $treeChartModel->reactiveKey() }}"
            :tree-map-chart-model="$treeChartModel"
        />
    </div>
</div>
