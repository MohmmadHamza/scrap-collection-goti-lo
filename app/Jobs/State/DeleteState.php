<?php

namespace App\Jobs\State;


use App\Models\State;
use Illuminate\Foundation\Queue\Queueable;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DeleteState
{
    use Queueable;

    
    public $id;
    public $message = null;
 
    /**
     * Create a new job instance.
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     */
    public function handle(): bool
    {
        try {
            return DB::transaction(function () {
                $model = State::findOrFail($this->id);
                $model->delete();
                return true;
            });
        } catch (\Exception $e) {
            Log::error("Error deleting state with ID {$this->id}: " . $e->getMessage());
            return false;
        }
    }
}
