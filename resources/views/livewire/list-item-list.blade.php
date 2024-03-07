<div class="bg-white rounded shadow border border-gray p-4">
    <div class="row pb-4">
        <div class="col-1">
            <p>#</p>
        </div>

        <div class="col-11">
            <p>Task</p>
        </div>
    </div>

    @foreach($listItems as $listItem)
        <div class="row border-top border-gray align-items-center py-3 @if($listItem->list_item_status_id != \App\Models\ListItemStatus::PENDING) finished-task @endif">
            <div class="col-1">
                <p class="mb-0">{{$loop->iteration}}</p>
            </div>

            <div class="col-11">
                <livewire:list-item :listItem="$listItem"  :key="$listItem->id" />
            </div>
        </div>
    @endforeach

    @if($listItems->isEmpty())
        <div class="row border-top border-gray align-items-center py-3">
            <p class="text-center">No tasks found</p>
        </div>
    @endif
</div>
