<?php

namespace App\Jobs\InqueryQuestion;


use Illuminate\Foundation\Queue\Queueable;

use App\Models\InquiryQuestion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DeleteInquiryQuestion
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
                $model = InquiryQuestion::findOrFail($this->id);
                $model->delete();
                return true;
            });
        } catch (\Exception $e) {
            Log::error("Error deleting Inquiry Question with ID {$this->id}: " . $e->getMessage());
            return false;
        }
    }

}
