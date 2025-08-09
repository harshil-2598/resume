<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class CleanTempUploads extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clean-temp-uploads';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean up temporary uploads older than 24 hours';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting temp uploads cleanup...');
        $files = Storage::disk('public')->files('temp');
        $deletedCount = 0;

        foreach ($files as $file) {
            $lastModified = Carbon::createFromTimestamp(Storage::disk('public')->lastModified($file));
            if ($lastModified->diffInHours(now()) > 24) { // older than 24 hours
                Storage::disk('public')->delete($file);
                $this->info("Deleted: {$file}");
                $deletedCount++;
            }
        }

        $this->info("Cleanup completed! Deleted {$deletedCount} files.");
        logger()->info('Temp uploads cleaned', ['deleted_count' => $deletedCount]);
        
        return Command::SUCCESS;
    }
}