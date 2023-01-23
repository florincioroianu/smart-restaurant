<?php

namespace App\Traits;

use Livewire\WithPagination;

trait LivewireUtil
{
    use WithPagination;
    public $modal_open = false, $fills = [], $Model, $search, $delete_modal = false;
    public $modal_id, $modal_title="Delete Item", $modal_item = 'item';

    public function openModal(): void
    {
        $this->modal_open = true;
    }

    public function closeModal(): void
    {
        $this->modal_open = false;
        $this->modal_id = null;
    }

    public function closeDeleteModal(): void
    {
        $this->delete_modal = false;
        $this->modal_id = null;
    }

    private function resetInputFields(): void
    {
        $this->reset($this->fills);
    }

    public function create(): void
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function confirmDelete($id): void
    {
        $this->modal_id = $id;
        $this->delete_modal = true;
    }

    public function delete(): void
    {
        if ($this->modal_id) {
            $this->Model->find($this->modal_id)->delete();
            $this->emitTo('shared.flash-message', 'message', 'success', 'Delete Successful');
            $this->delete_modal = false;
            $this->modal_id = null;
        }
    }

    public function deleteChecked(): void
    {
        $this->Model->whereIn('id', $this->checkbox_values)->delete();
        $this->emitTo('shared.flash-message', 'message', 'success', 'Delete Successful');
    }

    public function edit($id): void
    {
        $model = $this->Model->find($id);
        $this->fills = $model->fillable;

        foreach($model->fillable as $key) {
            $this->{$key} = $model->{$key};
        }

        $this->modal_id = $id;

        $this->openModal();
    }

    public function store(): void
    {
        $this->validate();

        $data = [];

        foreach ($this->fills as $key) {
            $data["{$key}"] = $this->{$key};
        }

        $this->Model->updateOrCreate(['id' => $this->modal_id], $data);
        $this->emitTo('shared.flash-message', 'message', 'success', $this->modal_id ? 'Update Successful' : 'Record Created Successfully.');

        $this->emit('refreshLivewireDatatable');

        $this->resetInputFields();
        $this->closeModal();
    }

    private function generateSlug($value): string
    {
        return strtolower(str_replace(' ', '-', $value));
    }
}
