<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FixSessionMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:session-migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove session migration from database if it exists';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $migrationName = '%sessions%';

        $exists = DB::table('migrations')
            ->where('migration', 'like', $migrationName)
            ->exists();

        if ($exists) {
            DB::table('migrations')
                ->where('migration', 'like', $migrationName)
                ->delete();

            $this->info('Session migration entry removed from the database.');
        } else {
            $this->info('No session migration entry found in the database.');
        }

        return 0;
    }
}
