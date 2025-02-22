<?php

namespace App\Jobs\Inquiry;

use App\Models\Inquiry;
use Illuminate\Foundation\Queue\Queueable;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class DeleteInquiry
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
                $model = Inquiry::findOrFail($this->id);
                $model->delete();
                return true;
            });
        } catch (\Exception $e) {
            Log::error("Error deleting Inquiry with ID {$this->id}: " . $e->getMessage());
            return false; 
        }
    }
}
