<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;

class GiveAdminRole extends Component
{

    public $user;
//    public $is_admin;

    public function render()
    {
        return view('livewire.admin.user.give-admin-role');
    }

    public function toggleAdminRole()
    {
        if($this->user->hasRole('admin')) {
            $this->user->removeRole('admin');
        } else {
            $this->user->assignRole('admin');
        }
    }

}
