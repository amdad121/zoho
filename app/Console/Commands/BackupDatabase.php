<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BackupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup the database';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // Set the database credentials
        $host = config('database.connections.mysql.host');
        $dbname = config('database.connections.mysql.database');
        $user = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');

        // Set the backup directory
        $backupDir = storage_path('app/backups');

        // Create a filename for the backup file
        $filename = $dbname.'_'.date('Y-m-d_H-i-s').'.sql';

        // Set the mysqldump command
        $command = "mysqldump -h $host -u $user -p $password $dbname > $backupDir/$filename";

        // Run the command
        system($command);

        $this->info('Database backup complete!');
    }
}
