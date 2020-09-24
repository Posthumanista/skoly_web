<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Skola;

class Search extends Component
{

    public $skoly;
    public $searchTerm;
    public $searchTermMesto;

    public function mount()
    {
        $this->skoly = Skola::all();
    }

    public function render()
    {
        $this->skoly = Skola::where('nazev', 'like', '%' . $this->searchTerm . '%')->get();
        return view('livewire.search');
    }

}
