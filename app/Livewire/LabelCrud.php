<?php

namespace App\Livewire;

use App\Models\Label;
use App\Repositories\LabelRepository;
use Livewire\Component;
use Livewire\WithPagination;

class LabelCrud extends Component
{
    use WithPagination;

    public $labels;
    public $name;
    public $color;
    public $labelId;
    public $isEdit = false;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function mount()
    {
        $this->labels = Label::all();
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->color = '';
        $this->labelId = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate(config('request_rules.label_create'));

        Label::create(['name' => $this->name, 'color' => $this->color]);

        session()->flash('message', 'Label created successfully.');

        $this->resetInputFields();
        $this->labels = Label::all();
    }

    public function edit($id)
    {
        $label = Label::findOrFail($id);
        $this->labelId = $id;
        $this->name = $label->name;
        $this->color = $label->color;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate(config('request_rules.label_create'));

        $label = Label::findOrFail($this->labelId);
        $label->update(['name' => $this->name, 'color' => $this->color]);

        session()->flash('message', 'Label updated successfully.');

        $this->resetInputFields();
        $this->labels = Label::all();
    }

    public function delete($id)
    {
        Label::findOrFail($id)->delete();
        session()->flash('message', 'Label deleted successfully.');
        $this->labels = Label::all();
    }

    public function render()
    {
        return view('livewire.label-crud');
    }
}
