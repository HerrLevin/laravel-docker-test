<?php

use App\Jobs\TestJob;
use App\Models\TestEntry;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('test-entries', function () {
    $entries = TestEntry::all();

    return response()->json([
        'info' => 'This endpoint is used to test the persistence of the database and the job queue system. You can trigger a job at ' . route('test-job'),
        'count' => $entries->count(),
        'entries' => $entries->map(function ($entry) {
            return [
                'id' => $entry->id,
                'created_by' => $entry->created_by,
                'created_at' => $entry->created_at->toDateTimeString(),
            ];
        }),
    ]);
})->name('test-entries');

Route::get('test-job', function () {
    TestJob::dispatch();

    return response()->json([
        'success' => 'The job should have been dispatched! To test the results & persistence of the database, check ' . route('test-entries') . ' after a few seconds.',
    ]);
})->name('test-job');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
