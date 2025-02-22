<?php

namespace App\Jobs\InquiryQuestionAnswer;

use App\Models\InquiryQuestionAnswer;

use Illuminate\Foundation\Queue\Queueable;
use Auth;
class UpdateInquiryQuestionAnswer
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

    public function handle(): InquiryQuestionAnswer
    {
        return \DB::transaction(function () {
            $request = $this->prepareRequestData();
            $inquiryQuestionAnswer = InquiryQuestionAnswer::findOrFail($this->id);
            $inquiryQuestionAnswer->update($request);

            return $inquiryQuestionAnswer;
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
