<?php

namespace App\Jobs\InquiryPickup;

use App\Models\InquiryPickup;
use DB;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Log;

class DeleteInquiryPickup
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
                $model = InquiryPickup::findOrFail($this->id);
                $model->delete();
                return true; // Return true if the category is successfully deleted
            });
        } catch (\Exception $e) {
            Log::error("Error deleting Inquiry Pickup with ID {$this->id}: " . $e->getMessage());
            return false; // Return false if deletion fails
        }
    }
}
