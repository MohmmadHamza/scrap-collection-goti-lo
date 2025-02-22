<?php

namespace App\Jobs\Users;


use Illuminate\Foundation\Queue\Queueable;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class DeleteManyUser
{
    use Queueable;

   
    /**
     * Create a new job instance.
     */

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

            // Perform the deletion of instructors
            User::whereIn('id', $this->selectedIds)->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Log or handle the exception as needed
            throw $e;
        }
    }
}
