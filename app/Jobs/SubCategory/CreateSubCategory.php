<?php

namespace App\Jobs\SubCategory;

use App\Models\SubCategory;

use Illuminate\Foundation\Queue\Queueable;

use Nette\Utils\Random;
use Auth;
use Illuminate\Support\Str;
class CreateSubCategory
{
    use Queueable;

    protected ?SubCategory $model = null;
    protected array $requestData;

    /**
     * Create a new job instance.
     */
    public function __construct(array $requestData)
    {
        $this->requestData = $requestData;
    }

    /**
     * Execute the job.
     */
    public function handle(): SubCategory
    {
        return \DB::transaction(function () {
            $request = $this->prepareRequestData();
            $this->model = SubCategory::create($request);

            return $this->model;
        });

    }
    private function prepareRequestData(): array
    {
        $request = $this->requestData;
        $request['code'] = $this->generateUniqueSlug($request['name']);
        $request['status'] = isset($request['status']) ? $request['status'] : 'inactive';
        $request['created_by'] = Auth::id();
        $request['created_at'] = date('Y-m-d H:i:s');

        return $request;
    }

    private function generateUniqueSlug(string $name): string
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        
        while (SubCategory::where('code', $slug)->exists()) { 
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
