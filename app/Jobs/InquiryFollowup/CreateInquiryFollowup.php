<?php

namespace App\Jobs\InquiryFollowup;

use App\Models\InquiryFollowUp;
use Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CreateInquiryFollowup
{
    use Queueable;

    protected ?InquiryFollowUp $model = null;

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
    public function handle(): InquiryFollowUp
    {
        return \DB::transaction(function () {
            $request = $this->prepareRequestData();
            $this->model = InquiryFollowUp::create($request);

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
