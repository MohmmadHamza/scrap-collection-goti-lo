<?php

namespace App\Jobs\State;

use App\Models\State;
use App\Models\City; // Import the City model
use DB;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class DeleteManyState
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $payload;
    public $deletedStates = []; 
    public $undeletedStates = [];
    public $errorOccurred = false;

    public function __construct(array $payload)
    {
        $this->payload = $payload;
    }

    public function handle(): void
    {
        try {
            $selected = array_keys($this->payload['Checkboxes']);

            DB::transaction(function () use ($selected) {
                // Check for references in the City model
                $assignedToCity = City::whereIn('state_id', $selected)->pluck('state_id')->toArray();

                // Combine all referenced states
                $referencedStates = array_unique($assignedToCity);

                // Determine states to delete
                $statesToDelete = array_diff($selected, $referencedStates);

                // Perform deletion
                if (!empty($statesToDelete)) {
                    State::whereIn('id', $statesToDelete)->delete();
                    $this->deletedStates = $statesToDelete;
                }

                // Track undeleted states
                if (!empty($referencedStates)) {
                    $this->undeletedStates = $referencedStates;
                    $this->errorOccurred = true;
                    Log::error('Some states could not be deleted because they are referenced elsewhere: ' . implode(', ', $referencedStates));
                }
            });
        } catch (\Exception $e) {
            Log::error('Error deleting states: ' . $e->getMessage());
            $this->errorOccurred = true;
            throw $e;
        }
    }
}
