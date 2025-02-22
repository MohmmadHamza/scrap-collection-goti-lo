<?php

namespace App\Jobs\SubCategory;


use App\Models\SubCategory;
use Illuminate\Foundation\Queue\Queueable;
use Auth;

class UpdateSubCategory
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
    public function handle(): SubCategory
    {
        return \DB::transaction(function () {
            $request = $this->prepareRequestData();
            $category = SubCategory::findOrFail($this->id);
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
