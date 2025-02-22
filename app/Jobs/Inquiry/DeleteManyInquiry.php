<?php

namespace App\Jobs\Inquiry;


use App\Models\Inquiry;
use DB;
use Illuminate\Foundation\Queue\Queueable;

class DeleteManyInquiry
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

           
            Inquiry::whereIn('id', $this->selectedIds)->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
           
            throw $e;
        }
    }
}
