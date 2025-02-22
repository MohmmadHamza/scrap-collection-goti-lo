<?php

namespace App\Jobs\Category;

use App\Models\Category;
use Auth;
use Illuminate\Foundation\Queue\Queueable;

class UpdateCategory
{
    use Queueable;

    protected $id;

    protected $data;

    /**
     * Create a new job instance.
     */
    public function __construct(int $id, array $data)
    {
        $this->id = $id;
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): Category
    {
        return \DB::transaction(function () {
            $request = $this->prepareRequestData();
            $category = Category::findOrFail($this->id);
            $category->update($request);

            return $category;
        });
    }

    private function prepareRequestData(): array
    {
        $request = $this->data;

        $request['status'] = isset($request['status']) ? $request['status'] : 'inactive';
        $request['updated_by'] = Auth::id();
        $request['updated_at'] = date('Y-m-d H:i:s');

        return $request;
    }
}
