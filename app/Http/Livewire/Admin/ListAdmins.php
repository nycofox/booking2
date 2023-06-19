<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class ListAdmins extends Component
{
    public function render()
    {
        return view('livewire.admin.list-admins', [
            'admins' => User::whereNull('anonymized_at')->isAdmin()->orderBy('name')->get(),
        ]);
    }
}
