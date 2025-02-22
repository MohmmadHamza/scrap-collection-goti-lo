<?php

namespace App\Jobs\Product;


use App\Models\Product;
use DB;
use Illuminate\Foundation\Queue\Queueable;
use Log;

class DeleteProduct
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
                $model = Product::findOrFail($this->id);
                $model->delete();
                return true; 
            });
        } catch (\Exception $e) {
            Log::error("Error deleting product with ID {$this->id}: " . $e->getMessage());
            return false;
        }
    }
}
