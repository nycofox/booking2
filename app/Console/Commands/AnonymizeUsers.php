<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AnonymizeUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:anonymize-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Anonymize users who have not been active for a month';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $inactive_users = User::where('last_active_at', '<', now()->subDays(30))->whereNull('anonymized_at')->get();

        $i = 0;

        foreach ($inactive_users as $user) {
            $user->anonymize();
            $user->removeRoles();
            $user->log('Brukeren ble anonymisert.');
            $i++;
        }

        $this->info("Anonymized {$i} users.");
    }
}
