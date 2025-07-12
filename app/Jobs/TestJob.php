<?php

namespace App\Jobs;

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
        sleep(10); // Simulating a delay of 5 seconds
        Log::info("TestJob completed");
    }
}
