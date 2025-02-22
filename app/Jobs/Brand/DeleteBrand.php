<?php

namespace App\Jobs\Brand;


use App\Models\Brand;
use Illuminate\Foundation\Queue\Queueable;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class DeleteBrand
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
                $model = Brand::findOrFail($this->id);
                $model->delete();
                return true;
            });
        } catch (\Exception $e) {
            Log::error("Error deleting Brand with ID {$this->id}: " . $e->getMessage());
            return false; 
        }
    }
}
