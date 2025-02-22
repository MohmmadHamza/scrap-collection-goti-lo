<?php

namespace App\Jobs\Brand;

use App\Models\Brand;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Random;
use Illuminate\Support\Str;

class CreateBrand
{
    use Queueable;

    protected ?Brand $model = null;

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
    public function handle(): Brand
    {
        return \DB::transaction(function () {
            $request = $this->prepareRequestData();
            $this->model = Brand::create($request);

            return $this->model;
        });
    }

    private function prepareRequestData(): array
    {
        $request = $this->requestData;

        // Handle the image upload
        if (isset($request['image_url']) && is_file($request['image_url'])) {
            $request['image_url'] = $this->uploadImage($request['image_url']);
        }

        $request['code'] = $this->generateUniqueSlug($request['name']);
        $request['status'] = $request['status'] ?? 'inactive';
        $request['created_by'] = Auth::id();
        $request['created_at'] = now();

        return $request;
    }

    private function uploadImage($image): string
    {
       
        $directory = public_path('assets/images/brand');
    
       
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
    
       
        $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
    
       
        $path = $image->move($directory, $filename);
    
       
        return 'images/brand/' . $filename; 
    }
    

    private function generateUniqueSlug(string $name): string
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        
        while (Brand::where('code', $slug)->exists()) { 
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
