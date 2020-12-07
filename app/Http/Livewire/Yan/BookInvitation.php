<?php

namespace App\Http\Livewire\Yan;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\BookInvitation as ModelsBookInvitation;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class BookInvitation extends Component
{
    use PasswordValidationRules;

    public $bride;
    public $groom;
    public $password;

    protected $rules = [
        'bride' => 'required|alpha',
        'groom' => 'required|alpha',
        'password' => 'required|string|min:8|max:12'
    ];

    public function render()
    {
        return view('book.index')->layout('layouts.guest');
    }

    public function store()
    {
        $this->validate();

        ModelsBookInvitation::create([
            'bride' => $this->bride,
            'groom' => $this->groom,
            'password' => Hash::make($this->password),
        ]);

        $this->resetInput();

        session()->flash('status', 'Berhasil! hubungi CS kami di <a href="">08111818</a>');
    }

    private function resetInput()
    {
        $this->bride = null;
        $this->groom = null;
        $this->password = null;
    }
}
