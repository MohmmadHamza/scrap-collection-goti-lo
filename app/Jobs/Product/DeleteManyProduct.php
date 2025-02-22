<?php

namespace App\Jobs\Product;

use App\Models\Product;
use DB;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class DeleteManyProduct
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

           
            Product::whereIn('id', $this->selectedIds)->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
           
            throw $e;
        }
    }
}
