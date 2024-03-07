<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;



use Livewire\Livewire;

use App\Models\ListItem;
use App\Http\Livewire\ListItemForm;
use App\Models\ListItemStatus;
use App\Http\Livewire\ListItemList;
use App\Http\Livewire\ListItem as ListItemComponent;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ListFormTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    function can_create_list_item()
    {

        Livewire::test(ListItemForm::class)
            ->set('name', 'test title')
            ->call('submit');

        $this->assertTrue(ListItem::whereName('test title')->exists());
    }

    /** @test */
    function name_is_required()
    {
        Livewire::test(ListItemForm::class)
            ->set('name', '')
            ->call('submit')
            ->assertHasErrors(['name' => 'required']);
    }

    /** @test */
    function list_item_added_event_is_emitted()
    {
        Livewire::test(ListItemForm::class)
            ->set('name', 'test title')
            ->call('submit')
            ->assertEmitted('listItemAdded');
    }

    /** @test */
    function list_item_can_be_completed()
    {
        $listItem = ListItem::create([
            'name' => 'test title',
            'list_item_status_id' => ListItemStatus::PENDING
        ]);

        Livewire::test(ListItemComponent::class, ['listItem' => $listItem])
            ->call('complete');

        $this->assertTrue($listItem->fresh()->list_item_status_id == ListItemStatus::COMPLETE);
    }

    /** @test */
    function notify_success_event_is_emitted_when_list_item_is_completed()
    {
        $listItem = ListItem::create([
            'name' => 'test title',
            'list_item_status_id' => ListItemStatus::PENDING
        ]);

        Livewire::test(ListItemComponent::class, ['listItem' => $listItem])
            ->call('complete')
            ->assertEmitted('notifySuccess');
    }
}
