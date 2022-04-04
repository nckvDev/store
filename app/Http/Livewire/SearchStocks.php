<?php

namespace App\Http\Livewire;

use App\Models\Stock;
use App\Models\User;
use Livewire\Component;

class SearchStocks extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.search-stocks', [
            'users' => User::where('name', $this->search)->get(),
        ]);
    }
}
