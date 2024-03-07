<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\ListItemStatus;
use App\Models\ListItem;

class ListItemForm extends Component
{

    public string $name = '';
    public int $list_item_status_id = ListItemStatus::PENDING;

    public function rules()
    {
        return [
            'name' => 'Required',
            'list_item_status_id' => 'required|numeric',
        ];
    }

    public function prepareForValidation($attributes)
    {
        $attributes['list_item_status_id'] = $this->list_item_status_id;

        return $attributes;
    }

    public function messages()
    {
        return [
            'name.Required' => 'Please add a task name and try again.',
        ];
    }


    public function render()
    {
        return view('livewire.list-item-form');
    }

    public function submit()
    {
        $data = $this->validate();

        try {
            ListItem::create($data);

            $this->reset();

            $this->emit('listItemAdded');
            $this->emit('notifySuccess', 'List item added successfully');

        } catch (\Exception $e) {
            $this->emit('notifyError', $e->getMessage());
        }
    }
}
