<?php

namespace App\Jobs\InquiryQuestionAnswer;

use App\Models\Inquiry;
use App\Models\InquiryAssigned;
use App\Models\InquiryQuestion;
use App\Models\InquiryQuestionAnswer;
use App\Models\User;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CreateInquiryQuestionAnswer
{
    use Dispatchable, SerializesModels;

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
    public function handle()
    {
        
        \DB::transaction(function () {
            // Create the inquiry
            $inquiry = Inquiry::create($this->prepareInquiryData());

            // Assign the inquiry to all users
            $this->assignInquiryToUsers($inquiry->id);

            
            // Store each answer
            $this->storeInquiryQuestionAnswers($inquiry->id);
        });
    }

    /**
     * Prepare inquiry data from the request.
     */
    private function prepareInquiryData(): array
    {
        return [
            'user_id' => Auth::id(),
            'category_id' => $this->requestData['category_id'],
            'sub_category_id' => $this->requestData['sub_category_id'],
            'status' => 'Awaiting Response from Vendor',
            'zolio_status' => 'Pending',
            'amount' => 0,
            'created_by' => Auth::id(),
            'created_at' => now(),
        ];
    }

    /**
     * Assign the inquiry to all users.
     */
    private function assignInquiryToUsers(int $inquiryId): void
    {
        $userIds = User::all()->pluck('id');
        foreach ($userIds as $userId) {
            InquiryAssigned::create([
                'inquiry_id' => $inquiryId,
                'user_id' => $userId,
                'status' => 'Pending',
                'amount' => 0,
                'created_by' => Auth::id(),
            ]);
        }
    }

    /**
     * Store each inquiry question answer.
     */
    private function storeInquiryQuestionAnswers(int $inquiryId): void
    {
        foreach ($this->requestData['answer_text'] as $questionId => $answer) {
            
            $question = InquiryQuestion::find($questionId);
            $questionType = $question ? $question->question_type : null; 
    
            if ($answer instanceof \Illuminate\Http\UploadedFile) {
                
                $destinationPath = public_path('assets/images/inquiry_answers'); 
    
                
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
    
                
                $fileName = time() . '_' . $answer->getClientOriginalName();
                
                
                $answer->move($destinationPath, $fileName);
                
                
                $answerText = 'images/inquiry_answers/' . $fileName; 
            } else {
                $answerText = $answer; 
            }
    
            
            InquiryQuestionAnswer::create([
                'inquiry_id' => $inquiryId,
                'question_id' => $questionId,
                'answer_text' => $answerText,
                'question_type' => $questionType,
                'created_by' => Auth::id(),
            ]);
        }
    }
    

}
