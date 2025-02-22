<?php

namespace App\Jobs\InquiryValuation;

use App\Models\InquiryValuation;
use DB;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Log;

class DeleteInquiryValuation
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
                $model = InquiryValuation::findOrFail($this->id);
                $model->delete();
                return true;
            });
        } catch (\Exception $e) {
            Log::error("Error deleting Inquiry Question with ID {$this->id}: " . $e->getMessage());
            return false;
        }
    }
}
