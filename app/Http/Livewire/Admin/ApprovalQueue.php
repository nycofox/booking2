<?php

namespace App\Http\Livewire\Admin;

use App\Models\Booking;
use Livewire\Component;

class ApprovalQueue extends Component
{



    public function render()
    {
        return view('livewire.admin.approval-queue', [
            'approvals' => Booking::whereNull('approved_at')->where('booked_from', '>=', now()->startOfDay())
                ->orderBy('created_at')->with('seat')->with('user')->get(),
        ]);
    }
//
//    public function approve();
//
//    public function deny();

}
