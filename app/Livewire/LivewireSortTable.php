<?php

namespace App\Livewire;

use App\Models\Store;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

use function Termwind\render;

class LivewireSortTable extends Component
{
    public $selectedStore;
    public $selectedGroup = array();
    public function mount() {
        //$this->selectedGroup = session('selectedGroup',['store']);
    }
    public function updateStoreOrder($stores)
    {
        foreach ($stores as $store) {
            Store::whereId($store['value'])->update(['order' => $store['order']]);
        }

        $this->selectedGroup = [];
    }






    public function orderTop()
    {
        ////Slide stores into the active range of IDs
        $stores = Store::orderBy('order', 'asc')->get();
        

        //map all stores with their order increased 
        $newOrder = $stores->mapWithKeys(function ($store) {
            return [$store->id => $store->order + count($this->selectedGroup)];
        });

        //sort the selection by order nullify then set their new order on an increment. 
        $selection = collect($this->selectedGroup)
            ->sortBy('order') // Ensure the current order is respected
            ->values() // Reset the array keys
            ->mapWithKeys(function ($item, $index) {
                return [$item['id'] => $index + 1]; // New order starts from 1
            })
            ->toArray();
        
        //swap out selected stores with their new order    
        $newOrder = array_replace($newOrder->toArray(), $selection);

        //update order -> it has missing valus but the order is correct.
        foreach ($newOrder as $id => $order) {
            Store::whereId($id)->update(['order' => $order]);
            
        }
        //Iterate through the stores sorted by the order and update the order to the increment
        $stores = Store::orderBy('order', 'asc')->get();
        $i = 1;
        foreach ($stores as $store) {
            Store::whereId($store->id)->update(['order' => $i]);
            $i++;
        }
    }
    public function orderBottom()
    {
        $orderSort = collect($this->selectedGroup)->sortBy('order')->values()->all();
            foreach ($orderSort as $store) {
                $storeId = $store->id;
                $lastOrder = Store::max('order') + 1;
                Store::whereId($storeId)->update(['order' => $lastOrder]);
                } 
            $stores = Store::orderBy('order', 'asc')->get();
            $i = 1;
            foreach ($stores as $store) {
                Store::whereId($store->id)->update(['order' => $i]);
                $i++;
            }
    }


    public function removeStore($id)
    {
        foreach($this->selectedGroup as $store) {
            if ($store !== null && $store->id == $id) {
                $index = array_search($store, $this->selectedGroup);
                unset($this->selectedGroup[$index]);
            }
        }
        Store::whereId($id)->delete();

    }

    public function removeSelected($stores) {

        foreach ($stores as $storeId) {
            $this->removeStore($storeId);
        }
    }

    public function selectStore($id) {

        $store = Store::whereId($id)->first();
        if(in_array($store, $this->selectedGroup)) {
            $index = array_search($store, $this->selectedGroup);
            unset($this->selectedGroup[$index]);
        }
        else {
            $this->selectedGroup[] = $store;
        }
    }

    public function selectAll() {
        //dd($this->selectedGroup);
        if(count($this->selectedGroup) > 0) {
            $this->selectedGroup = [];
            return redirect('/');
            
        }
        else {
            foreach(Store::all() as $store) {
                $this->selectStore($store->id);
            }
        }
    }
    
    public function test () {
        dd($this->selectedGroup);
    }

    public function render()
    {
        return view('livewire.livewire-sort-table', 
                        ['stores' => Store::orderBy('order')->get()]);
    }
}
