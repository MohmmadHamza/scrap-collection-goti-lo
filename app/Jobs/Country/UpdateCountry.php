<?php

namespace App\Jobs\Country;
use App\Models\Country;
use Auth;

use Illuminate\Foundation\Queue\Queueable;

class UpdateCountry
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
    public function handle(): Country
    {
        return \DB::transaction(function () {
            $request = $this->prepareRequestData();
            $country = Country::findOrFail($this->id);
            $country->update($request);

            return $country;
        });
    }

    private function prepareRequestData(): array
    {
        $request = $this->data;

        $request['status'] = isset($request['status']) ? $request['status'] : 'inactive';
        $request['updated_by'] = Auth::id();
        $request['updated_at'] = date('Y-m-d H:i:s');

        return $request;
    }
}
