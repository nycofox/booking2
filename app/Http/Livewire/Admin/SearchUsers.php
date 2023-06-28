<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search = '';

    public function render()
    {
        if(strlen($this->search) >= 2) {
            $result = User::where('name', 'like', '%' . $this->search . '%')->withoutAnonymized()->get();
        } else {
            $result = [];
        }

        return view('livewire.admin.search-users', [
            'users' => $result,
        ]);
    }
}
