<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;

class News extends Component
{
    public function render()
    {
        return view('livewire.student.news', [
            'news' => \App\Models\News::latest()->get(),
        ]);
    }
}
