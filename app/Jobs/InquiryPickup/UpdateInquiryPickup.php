<?php

namespace App\Jobs\InquiryPickup;

use App\Models\InquiryPickup;
use Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdateInquiryPickup
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
    public function handle(): InquiryPickup
    {
        return \DB::transaction(function () {
            $request = $this->prepareRequestData();
            $inquiryPickup = InquiryPickup::findOrFail($this->id);
            $inquiryPickup->update($request);

            return $inquiryPickup;
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
