<?php

namespace App\Jobs\InquiryFollowup;

use App\Models\InquiryFollowUp;
use DB;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Log;

class DeleteInquiryFollowup
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
                $model = InquiryFollowUp::findOrFail($this->id);
                $model->delete();
                return true; // Return true if the category is successfully deleted
            });
        } catch (\Exception $e) {
            Log::error("Error deleting Inquiry Followup with ID {$this->id}: " . $e->getMessage());
            return false; // Return false if deletion fails
        }
    }
}
