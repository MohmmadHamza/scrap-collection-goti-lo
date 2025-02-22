<?php

namespace App\Jobs\ProductQuestion;


use App\Models\ProductQuestion;
use Illuminate\Foundation\Queue\Queueable;

use Auth;
use DB;
class CreateProductQuestion
{
    use Queueable;

    protected ?ProductQuestion $model = null;
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
    public function handle(): ProductQuestion
    {
        return DB::transaction(function () {
            $request = $this->prepareRequestData();
            $this->model = ProductQuestion::create($request);

            return $this->model;
        });
    }

    /**
     * Prepare request data before saving.
     */
    private function prepareRequestData(): array
    {
        $request = $this->requestData;

        // Only store options if question_type is mcq or select
        if (in_array($request['question_type'], ['mcq', 'select'])) {
            $request['options'] = isset($request['options']) ? json_encode($request['options']) : json_encode([]);
        } else {
            unset($request['options']); // Remove options if not mcq or select
        }

        $request['status'] = isset($request['status']) ? $request['status'] : 'inactive';
        $request['created_by'] = Auth::id();
        $request['created_at'] = now();

        return $request;
    }
}
