<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;

class GiveAdminRole extends Component
{

    public $user;
    public $is_admin;

    public function render()
    {
        $this->is_admin = $this->hasAdmin();

        return view('livewire.admin.user.give-admin-role');
    }

    public function toggleAdminRole()
    {
        if($this->is_admin) {
            $this->user->removeRole('admin');
        } else {
            $this->user->assignRole('admin');
        }
    }

    public function hasAdmin()
    {
        return $this->user->hasRole('admin');
    }
}
