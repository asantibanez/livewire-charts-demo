<div>
    <div class="space-y-4 sticky top-0 bg-white p-4 shadow z-50">
        <ul class="flex flex-col sm:flex-row sm:space-x-8 sm:items-center">
            <li>
                <input type="checkbox" value="travel" id="travel" wire:model="types"/>
                <label for="travel">Travel</label>
            </li>
            <li>
                <input type="checkbox" value="shopping" id="shopping" wire:model="types"/>
                <label for="shopping">Shopping</label>
            </li>
            <li>
                <input type="checkbox" value="food" id="food" wire:model="types"/>
                <label for="food">Food</label>
            </li>
            <li>
                <input type="checkbox" value="entertainment" id="entertainment" wire:model="types"/>
                <label for="entertainment">Entertainment</label>
            </li>
            <li>
                <input type="checkbox" value="other" id="other" wire:model="types"/>
                <label for="other">Other</label>
            </li>
        </ul>

        <div>
            <input type="checkbox" value="other" id="labels" wire:model="showDataLabels"/>
            <label for="labels">Show data labels</label>
        </div>
    </div>

    <div class="container mx-auto space-y-4 p-4 sm:p-0 mt-8">
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
            <livewire:livewire-line-chart
                key="{{ $multiLineChartModel->reactiveKey() }}"
                :line-chart-model="$multiLineChartModel"
            />
        </div>

        <div class="shadow rounded p-4 border bg-white" style="height: 32rem;">
            <livewire:livewire-column-chart
                key="{{ $multiColumnChartModel->reactiveKey() }}"
                :column-chart-model="$multiColumnChartModel"
            />
        </div>
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
