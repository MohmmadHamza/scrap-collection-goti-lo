<?php

namespace App\Jobs\SubCategory;


use App\Models\SubCategory;
use DB;
use Illuminate\Foundation\Queue\Queueable;

class DeleteManySubCategory
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

           
            SubCategory::whereIn('id', $this->selectedIds)->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
           
            throw $e;
        }
    }
}
