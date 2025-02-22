<?php

namespace App\Jobs\InquiryValuation;

use App\Models\InquiryValuation;
use Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdateInquiryValuation 
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
    public function handle(): InquiryValuation
    {
        return \DB::transaction(function () {
            $request = $this->prepareRequestData();
            $inquiryValuation = InquiryValuation::findOrFail($this->id);
            $inquiryValuation->update($request);

            return $inquiryValuation;
        });
    }

    private function prepareRequestData(): array
    {
        $request = $this->data;

       
        $request['updated_by'] = Auth::id();
        $request['updated_at'] = date('Y-m-d H:i:s');

        return $request;
    }
}
