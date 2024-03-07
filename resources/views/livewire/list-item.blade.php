<div class="row align-items-center @if($listItem->list_item_status_id != \App\Models\ListItemStatus::PENDING) finished-task @endif">
    <div class="col-9">
        <p class="mb-0">{{$listItem->name}}</p>
    </div>

    @if($listItem->list_item_status_id == \App\Models\ListItemStatus::PENDING)
    <div class="col-2">
        <div class="d-flex w-100 justify-content-end">
           <a class="btn btn-success mx-2" wire:click="complete">
               <i class="fa-solid fa-check"></i>
           </a>

            <a class="btn btn-danger" wire:click="cancel">
                <i class="fa-solid fa-x"></i>
            </a>
        </div>
    </div>
    @endif
</div>
