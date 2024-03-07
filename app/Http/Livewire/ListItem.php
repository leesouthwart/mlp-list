<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\ListItem as Item;
use App\Models\ListItemStatus;

class ListItem extends Component
{
    public Item $listItem;

    public function mount(Item $listItem)
    {
        $this->listItem = $listItem;
    }

    public function render()
    {
        return view('livewire.list-item');
    }

    public function complete()
    {
        if($this->listItem->list_item_status_id == ListItemStatus::COMPLETE) {
            $this->emit('notifyError', 'Task already completed.');
            return;
        }

        try {
            $this->listItem->list_item_status_id = ListItemStatus::COMPLETE;
            $this->listItem->save();

            return $this->emit('notifySuccess', 'Task Complete. Congratulations!');
        } catch (\Exception $e) {
            return $this->emit('notifyError', $e->getMessage());
        }
    }

    public function cancel()
    {
        try {
            $this->listItem->list_item_status_id = ListItemStatus::DELETED;
            $this->listItem->save();

            $this->emit('taskDeleted');
            return $this->emit('notifySuccess', 'Task Deleted.');
        } catch (\Exception $e) {
            return $this->emit('notifyError', $e->getMessage());
        }
    }
}
