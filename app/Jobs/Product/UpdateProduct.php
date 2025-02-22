<?php

namespace App\Jobs\Product;


use App\Models\Product;
use Auth;
use Illuminate\Foundation\Queue\Queueable;

class UpdateProduct
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
    public function handle(): Product
    {
        return \DB::transaction(function () {
            $request = $this->prepareRequestData();
            $product = Product::findOrFail($this->id);
            $product->update($request);

            return $product;
        });
    }

    private function prepareRequestData(): array
    {
        $request = $this->data;

        $request['status'] = isset($request['status']) ? $request['status'] : 'inactive';
        $request['is_featured'] = $request['is_featured'] ?? 0; 
        $request['updated_by'] = Auth::id();
        $request['updated_at'] = date('Y-m-d H:i:s');

        return $request;
    }
}
