<?php

namespace App\Livewire;

use Livewire\Component;

class Edit extends Component
{
    public $store;
    public $openModal = false;
    public $formId;
    
    public function mount($store) {
        $this->formId = $store->id();
    }

    protected $rules = [
        'store.code' => ['required', 'unique:stores,code', 'max:5']
    ];

    public function updated ($property) {
        $this->validateOnly($property);
    }

    public function openModalToUpdateStore() {
        $this->resetErrorBag();
        $this->openModal = true;
    }

    public function update() {
        $this->store->update([
            'name' => $this->store->name,
            'code' => $this->store->code,
            'manager' => $this->store->manager,
            'speedDial' => $this->store->speedDial,
            'orderNumber' => $this->store->orderNumber,
            'orderValue' => $this->store->orderValue,
            'notes' => $this->store->notes,
        ]);

        $this->reset();
    }


    public function render()
    {
        return view('livewire.edit');
    }
}
