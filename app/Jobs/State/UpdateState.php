<?php

namespace App\Jobs\State;


use App\Models\State;
use Illuminate\Foundation\Queue\Queueable;
use Auth;

class UpdateState
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
    public function handle(): State
    {
        return \DB::transaction(function () {
            $request = $this->prepareRequestData();
            $state = State::findOrFail($this->id);
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
