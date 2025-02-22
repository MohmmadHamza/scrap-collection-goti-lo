<?php

namespace App\Jobs\Brand;

use App\Models\Brand;
use DB;
use Illuminate\Foundation\Queue\Queueable;

class DeleteManyBrand
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

           
            Brand::whereIn('id', $this->selectedIds)->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
           
            throw $e;
        }
    }
}
