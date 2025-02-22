<?php

namespace App\Jobs\Category;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DeleteCategory
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
                    $model = Category::findOrFail($this->id);
                    $model->delete();
                    return true; // Return true if the category is successfully deleted
                });
            } catch (\Exception $e) {
                Log::error("Error deleting category with ID {$this->id}: " . $e->getMessage());
                return false; // Return false if deletion fails
            }
        }
    
}
