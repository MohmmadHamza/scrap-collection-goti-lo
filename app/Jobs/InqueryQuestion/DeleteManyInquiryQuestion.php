<?php

namespace App\Jobs\InqueryQuestion;

use App\Models\InquiryQuestion;
use DB;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class DeleteManyInquiryQuestion
{
    use Queueable;

     
    protected $selectedIds;
    public function __construct(array $selectedIds)
    {
        $this->selectedIds = $selectedIds;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
        try {
            DB::beginTransaction();

           
            InquiryQuestion::whereIn('id', $this->selectedIds)->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
           
            throw $e;
        }
    }
}
