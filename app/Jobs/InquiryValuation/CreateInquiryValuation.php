<?php

namespace App\Jobs\InquiryValuation;

use App\Models\InquiryValuation;
use Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CreateInquiryValuation
{
    use Queueable;

    protected ?InquiryValuation $model = null;

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
    public function handle(): InquiryValuation
    {
        return \DB::transaction(function () {
            $request = $this->prepareRequestData();
            $this->model = InquiryValuation::create($request);

            return $this->model;
        });
    }

    private function prepareRequestData(): array
    {
        $request = $this->requestData;
        $request['created_by'] = Auth::id();
        $request['created_at'] = date('Y-m-d H:i:s');

        return $request;
    }

   
}
