<?php

namespace App\Jobs\Product;


use App\Models\Product;
use Auth;
use Illuminate\Foundation\Queue\Queueable;
use Str;

class CreateProduct
{
    use Queueable;
    protected ?Product $model = null;

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
    public function handle(): Product
    {
        return \DB::transaction(function () {
            $request = $this->prepareRequestData();
            $this->model = Product::create($request);

            return $this->model;
        });
    }

    private function prepareRequestData(): array
    {
        $request = $this->requestData;
        $request['code'] = $this->generateUniqueSlug($request['name']);
        $request['status'] = isset($request['status']) ? $request['status'] : 'inactive';
        $request['is_featured'] = isset($request['is_featured']) ? 1 : 0;
        $request['created_by'] = Auth::id();
        $request['created_at'] = date('Y-m-d H:i:s');

        return $request;
    }

    private function generateUniqueSlug(string $name): string
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        
        while (Product::where('code', $slug)->exists()) { 
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
