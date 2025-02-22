<?php

namespace App\Jobs\City;


use Illuminate\Foundation\Queue\Queueable;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


use App\Models\City;

class DeleteCity
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
                $model = City::findOrFail($this->id);
                $model->delete();
                return true;
            });
        } catch (\Exception $e) {
            Log::error("Error deleting city with ID {$this->id}: " . $e->getMessage());
            return false;
        }
    }
}
