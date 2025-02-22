<?php

namespace App\Jobs\ProductQuestion;


use App\Models\ProductQuestion;
use DB;
use Illuminate\Foundation\Queue\Queueable;

class DeleteManyProductQuestion
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

           
            ProductQuestion::whereIn('id', $this->selectedIds)->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
           
            throw $e;
        }
    }
}
