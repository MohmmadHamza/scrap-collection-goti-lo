<?php

namespace App\Jobs\InqueryQuestion;


use Illuminate\Foundation\Queue\Queueable;

use App\Models\InquiryQuestion;
use Auth;
use DB;

class UpdateInqueryQuestion
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
    public function handle(): InquiryQuestion
    {
        return DB::transaction(function () {
            $request = $this->prepareRequestData();
            $inquiryQuestion = InquiryQuestion::findOrFail($this->id);
            $inquiryQuestion->update($request);

            return $inquiryQuestion;
        });
    }

    /**
     * Prepare request data before updating.
     */
    private function prepareRequestData(): array
    {
        $request = $this->data;

        // Only update options if question_type is mcq or select
        if (in_array($request['question_type'], ['mcq', 'select'])) {
            $request['options'] = isset($request['options']) ? json_encode($request['options']) : json_encode([]);
        } else {
            unset($request['options']); // Remove options if not mcq or select
        }

        // Default values
        $request['status'] = isset($request['status']) ? $request['status'] : 'inactive';
        $request['updated_by'] = Auth::id();
        $request['updated_at'] = now();

        return $request;
    }
}
