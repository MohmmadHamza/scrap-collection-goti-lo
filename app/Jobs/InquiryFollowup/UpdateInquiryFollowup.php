<?php

namespace App\Jobs\InquiryFollowup;

use App\Models\InquiryFollowUp;
use Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdateInquiryFollowup
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
    public function handle(): InquiryFollowUp
    {
        return \DB::transaction(function () {
            $request = $this->prepareRequestData();
            $inquiryFollowup = InquiryFollowUp::findOrFail($this->id);
            $inquiryFollowup->update($request);

            return $inquiryFollowup;
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
