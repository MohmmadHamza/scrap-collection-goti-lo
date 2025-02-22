<?php

namespace App\Jobs\Country;


use App\Models\Country;
use Illuminate\Foundation\Queue\Queueable;
use Auth;
use Nette\Utils\Random;

use Illuminate\Support\Str;
class CreateCountry
{
    use Queueable;

    protected ?Country $model = null;

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
    public function handle(): Country
    {
        return \DB::transaction(function () {
            $request = $this->prepareRequestData();
            $this->model = Country::create($request);

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

        
        while (Country::where('code', $slug)->exists()) { 
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
