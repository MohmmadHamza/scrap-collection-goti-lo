<?php

namespace App\Jobs\State;


use App\Models\State;
use Illuminate\Foundation\Queue\Queueable;
use Auth;

class CreateState
{
    use Queueable;


    protected ?State $model = null;

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
    public function handle(): State
    {
        return \DB::transaction(function () {
            $request = $this->prepareRequestData();
            $this->model = State::create($request);

            return $this->model;
        });
    }

    private function prepareRequestData(): array
    {
        $request = $this->requestData;
        $request['status'] = isset($request['status']) ? $request['status'] : 'inactive';
        $request['created_by'] = Auth::id();
        $request['created_at'] = date('Y-m-d H:i:s');

        return $request;
    }

  
}
