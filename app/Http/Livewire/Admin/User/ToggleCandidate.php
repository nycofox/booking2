<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;

class ToggleCandidate extends Component
{
    public $user;

    public $is_candidate;

    public function render()
    {
        $this->is_candidate = auth()->user()->hasCandidate($this->user->id);

        return view('livewire.admin.user.toggle-candidate');
    }

    public function toggleCandidate()
    {
        if($this->is_candidate) {
            auth()->user()->removeCandidate($this->user->id);
        } else {
            auth()->user()->addCandidate($this->user->id);
        }
    }
}
