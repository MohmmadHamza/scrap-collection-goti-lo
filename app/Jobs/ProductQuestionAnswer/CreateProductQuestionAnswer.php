<?php

namespace App\Jobs\ProductQuestionAnswer;

use App\Models\Product;
use App\Models\ProductQuestion;
use App\Models\ProductQuestionAnswer;
use Illuminate\Foundation\Queue\Dispatchable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Str;

class CreateProductQuestionAnswer
{
    use Queueable;

    protected array $requestData;

    /**
     * Create a new job instance.
     *
     * @param array $requestData
     */
    public function __construct(array $requestData)
    {
        $this->requestData = $requestData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        \DB::transaction(function () {
            // Create the product
            $product = Product::create($this->prepareProductData());

            // Store each answer for the product's questions
            $this->storeProductQuestionAnswers($product->id);
        });
    }

    /**
     * Prepare product data from the request.
     *
     * @return array
     */
    private function prepareProductData(): array
    {
        return [
            'user_id' => Auth::id(),
            'category_id' => $this->requestData['category_id'],
            'subcategory_id' => $this->requestData['sub_category_id'],
            'name' => $this->requestData['name'],
            'description' => $this->requestData['description'],
            'price' => $this->requestData['price'],
            'stock_quantity'=>$this->requestData['stock_quantity'],
            'created_by' => Auth::id(),
            'created_at' => now(),
            'code' => $this->generateUniqueSlug($this->requestData['name']),
        ];
    }

    /**
     * Generate a unique slug based on the product name.
     *
     * @param string $name
     * @return string
     */
    private function generateUniqueSlug(string $name): string
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        while (Product::where('code', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    /**
     * Store each question answer for the product.
     *
     * @param int $productId
     */
    private function storeProductQuestionAnswers(int $productId): void
    {
        foreach ($this->requestData['answer_text'] as $questionId => $answer) {
            // Retrieve question type for the given question ID
            $question = ProductQuestion::find($questionId);
            $questionType = $question ? $question->question_type : null;

            // Handle file upload for answers requiring media
            $answerText = $this->handleAnswerUpload($answer);

            // Create the answer entry in the database
            ProductQuestionAnswer::create([
                'product_id' => $productId,
                'question_id' => $questionId,
                'answer_text' => $answerText,
                'question_type' => $questionType,
                'created_by' => Auth::id(),
            ]);
        }
    }

    /**
     * Handle the answer file upload, if the answer is a file.
     *
     * @param mixed $answer
     * @return string
     */
    private function handleAnswerUpload($answer): string
    {
        if ($answer instanceof \Illuminate\Http\UploadedFile) {
            $destinationPath = public_path('assets/images/product_answers');

            // Create the directory if it doesn't exist
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Save the file and return the path
            $fileName = time() . '_' . $answer->getClientOriginalName();
            $answer->move($destinationPath, $fileName);

            return 'assets/images/product_answers/' . $fileName;
        }

        return $answer; // If not a file, return the answer text directly
    }
}
