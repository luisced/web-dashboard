<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ImportSqlData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:import-sql {file : The path to the SQL file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports SQL data from a specified file into the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $filePath = $this->argument('file');

        if (!File::exists($filePath)) {
            $this->error("File not found: {$filePath}");
            return 1;
        }

        try {
            $sql = File::get($filePath);
            DB::unprepared($sql);

            $this->info("SQL file imported successfully.");
            return 0;
        } catch (\Exception $e) {
            $this->error("Error importing SQL file: " . $e->getMessage());
            return 1;
        }
    }
}
