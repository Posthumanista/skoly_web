<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Skola;

class Search extends Component
{

    public $searchTerm;
    public $searchTermMesto;

    public function render()
    {
        return view('livewire.search', [
            'skoly' => Skola::where('nazev', 'like', '%' . $this->searchTerm . '%')->get(),
        ]);
    }

}
