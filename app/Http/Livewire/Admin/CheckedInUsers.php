<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class CheckedInUsers extends Component
{
    public function render()
    {
        return view('livewire.admin.checked-in-users', [
            'users' => \App\Models\User::checkedIn()->orderBy('name')->get(),
        ]);
    }
}
