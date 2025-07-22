<?php

namespace App\Jobs;

use App\Models\TestEntry;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class TestJob implements ShouldQueue
{
    use Queueable;

    public function handle(): void
    {
        Log::info("TestJob started");
        // Simulate some work
        sleep(10); // Simulating a delay of 10 seconds
        TestEntry::create([
            'created_by' => 'TestJob',
        ]);
        Log::info("TestJob completed");
    }
}
