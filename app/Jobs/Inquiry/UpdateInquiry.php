<?php

namespace App\Jobs\Inquiry;

use App\Models\Inquiry;
use Illuminate\Foundation\Queue\Queueable;
use Auth;

class UpdateInquiry
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

    public function handle(): Inquiry
    {
        return \DB::transaction(function () {
            $request = $this->prepareRequestData();
            $inquiry = Inquiry::findOrFail($this->id);
            $inquiry->update($request);

            return $inquiry;
        });
    }

    private function prepareRequestData(): array
    {
        $request = $this->data;
    
        
        $request['status'] = $request['status'] ?? 'inactive';
    
        
        $sub_total = $request['amount'] ?? 0;
    
        
        $cgst = $sgst = $igst = 0;
        $cgst_per = $sgst_per = $igst_per = 0;
    
        
        if (isset($request['cgst_per']) && $request['cgst_per'] > 0) {
            $cgst = ($sub_total * $request['cgst_per']) / 100;
            $request['cgst'] = $cgst;
        } else {
            unset($request['cgst']);
            
        }
    
        if (isset($request['sgst_per']) && $request['sgst_per'] > 0) {
            $sgst = ($sub_total * $request['sgst_per']) / 100;
            $request['sgst'] = $sgst;
        } else {
            unset($request['sgst']);
           
        }
    
        if (isset($request['igst_per']) && $request['igst_per'] > 0) {
            $igst = ($sub_total * $request['igst_per']) / 100;
            $request['igst'] = $igst;
        } else {
            unset($request['igst']);
            
        }
    
        
        $grand_total = $sub_total + $cgst + $sgst + $igst;
        $sub_total = $sub_total + $cgst + $sgst + $igst;
    
        
        $request['sub_total'] = $sub_total;
        $request['grand_total'] = $grand_total;
    
        
        $request['updated_by'] = Auth::id();
        $request['updated_at'] = now();
    
        return $request;
    }
    
    
    
    
}
