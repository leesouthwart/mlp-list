<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

use Livewire\WithPagination;

use App\Models\ListItemStatus;
use App\Models\ListItem;

class ListItemList extends Component
{
    use WithPagination;

    public $listeners = ['taskDeleted' => 'render', 'listItemAdded' => 'render'];

//    public function mount()
//    {
//        $this->listItems = ListItem::where('list_item_status_id', '!=', ListItemStatus::DELETED)->paginate(10);
//    }

    public function render()
    {
        return view('livewire.list-item-list', [
            'listItems' => ListItem::where('list_item_status_id', '!=', ListItemStatus::DELETED)->paginate(10)
        ]);
    }
}
