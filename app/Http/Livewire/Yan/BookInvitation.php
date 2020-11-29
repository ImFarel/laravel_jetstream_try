<?php

namespace App\Http\Livewire\Yan;

use Livewire\Component;

class BookInvitation extends Component
{
    public function render()
    {
        return view('book.index')->layout('layouts.guest');
    }
}
