<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ForceCheckout extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:force-checkout';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Force checkout all users who have not checked out yet';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::checkedIn()->get();

        $this->info("{$users->count()} users are currently checked in");

        $i = 0;

        foreach ($users as $user) {
            $user->forceCheckout();
            $this->info("{$user->name} was force checked out");
            $i++;
        }

        $this->info("{$i} users were checked out");

    }
}
