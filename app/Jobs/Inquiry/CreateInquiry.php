<?php

namespace App\Jobs\Inquiry;


use App\Models\Inquiry;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Auth;

class CreateInquiry
{
    use Queueable;

    protected ?Inquiry $model = null;

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
    public function handle(): Inquiry
    {
        return \DB::transaction(function () {
            $request = $this->prepareRequestData();
            $this->model = Inquiry::create($request);

            return $this->model;
        });
    }

   
    private function prepareRequestData(): array
    {
        $request = $this->requestData;
    
        // Set sub_total to the original amount
        $sub_total = $request['amount'];
    
        // Calculate GST values based on the percentages
        $cgst = isset($request['cgst_per']) ? ($sub_total * $request['cgst_per'] / 100) : 0;
        $sgst = isset($request['sgst_per']) ? ($sub_total * $request['sgst_per'] / 100) : 0;
        $igst = isset($request['igst_per']) ? ($sub_total * $request['igst_per'] / 100) : 0;
    
        // Store individual GST amounts in the request
        $request['cgst'] = $cgst;
        $request['sgst'] = $sgst;
        $request['igst'] = $igst;
    
        // Calculate the grand total by adding GST amounts to the sub_total
        $grand_total = $sub_total + $cgst + $sgst + $igst;
        $sub_total = $sub_total + $cgst + $sgst + $igst;
    
        // Store sub_total and grand_total in the request
        $request['sub_total'] = $sub_total;
        $request['grand_total'] = $grand_total;
    
        // Set additional fields
        $request['created_by'] = Auth::id();
        $request['created_at'] = now();
    
        return $request;
    }
    
    
}
