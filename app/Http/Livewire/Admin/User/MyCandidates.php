<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;

class MyCandidates extends Component
{
    public function render()
    {
        return view('livewire.admin.user.my-candidates', [
            'candidates' => auth()->user()->candidates,
        ]);
    }
}
