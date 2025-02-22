<?php

namespace App\Jobs\Brand;


use App\Models\Brand;
use Illuminate\Foundation\Queue\Queueable;
use Auth;
class UpdateBrand
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

    public function handle(): Brand
    {
        return \DB::transaction(function () {
            $request = $this->prepareRequestData();
            $brand = Brand::findOrFail($this->id);
            $brand->update($request);

            return $brand;
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
