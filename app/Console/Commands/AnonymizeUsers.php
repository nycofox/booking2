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
    protected $description = 'Anonymiserer brukere som ikke har vært aktive på 60 dager.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $inactive_users = User::where('last_active_at', '<', now()->subDays(60))->whereNull('anonymized_at')->get();

        $i = 0;

        foreach ($inactive_users as $user) {
            $user->anonymize();
            $user->removeRoles();
            $i++;
        }

        $this->info("Anonymized {$i} users.");
    }
}
