<?php

namespace App\Jobs\City;


use App\Models\City;
use Illuminate\Foundation\Queue\Queueable;
use Auth;
class UpdateCity
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
    public function handle(): City
    {
        return \DB::transaction(function () {
            $request = $this->prepareRequestData();
            $state = City::findOrFail($this->id);
            $state->update($request);

            return $state;
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
