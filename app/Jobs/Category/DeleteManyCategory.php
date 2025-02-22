<?php

namespace App\Jobs\Category;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DeleteManyCategory
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $payload;
    public $deletedCategories = []; 
    public $undeletedCategories = [];
    public $errorOccurred = false;

    /**
     * Create a new job instance.
     *
     * @param array $payload
     */
    public function __construct(array $payload)
    {
        $this->payload = $payload;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        try {
            $selected = array_keys($this->payload['Checkboxes']);

            DB::transaction(function () use ($selected) {
                // Check for references in various tables
                $assignedToSubcategory = SubCategory::whereIn('category_id', $selected)->pluck('category_id')->toArray();

                // Combine all referenced categories
                $referencedCategories = array_unique($assignedToSubcategory);

                // Determine categories to delete
                $categoriesToDelete = array_diff($selected, $referencedCategories);

                // Perform deletion
                if (!empty($categoriesToDelete)) {
                    Category::whereIn('id', $categoriesToDelete)->delete();
                    $this->deletedCategories = $categoriesToDelete; // Store deleted categories
                }

                // Track undeleted categories
                if (!empty($referencedCategories)) {
                    $this->undeletedCategories = $referencedCategories;
                    $this->errorOccurred = true;
                    Log::error('Some categories could not be deleted because they are referenced elsewhere: ' . implode(', ', $referencedCategories));
                }
            });
        } catch (\Exception $e) {
            Log::error('Error deleting categories: ' . $e->getMessage());
            $this->errorOccurred = true;
            throw $e; // Allow the exception to bubble up
        }
    }
}
