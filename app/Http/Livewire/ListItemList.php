<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

use App\Models\ListItemStatus;
use App\Models\ListItem;

class ListItemList extends Component
{
    public Collection $listItems;

    public $listeners = ['taskDeleted' => 'mount', 'listItemAdded' => 'mount'];

    public function mount()
    {
        $this->listItems = ListItem::where('list_item_status_id', '!=', ListItemStatus::DELETED)->get();
    }

    public function render()
    {
        return view('livewire.list-item-list');
    }
}
