<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Skola;

class Filter extends Component
{

    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.filter', [
            'skoly' => Skola::where('nazev', 'like', '%'.$this->search.'%')->paginate(10),
        ]);
    }
}