<div class="w-100">
    <form wire:submit.prevent="submit">
        <div class="form-group">
            <input type="text" class="form-control" wire:model="name" placeholder="{{__('Insert task name')}}">
            <button class="btn btn-submit w-100 mt-2 py-3" type="submit">Add</button>
        </div>
    </form>
</div>
