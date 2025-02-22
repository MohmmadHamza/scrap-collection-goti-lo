<?php
namespace App\Jobs\Country;

use App\Models\Country;
use DB;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\State; 
use App\Models\City;  

class DeleteManyCountry
{
    use Queueable;

    protected $payload;
    public $deletedCountrys = [];
    public $undeletedCountrys = [];
    public $errorOccurred = false;

    public function __construct(array $payload)
    {
        $this->payload = $payload;
    }

    public function handle()
    {
        try {
            $selected = array_keys($this->payload['Checkboxes']);

            DB::transaction(function () use ($selected) {
                // Check for references in various tables
                $assignedToState = State::whereIn('country_id', $selected)->pluck('country_id')->toArray();
                $assignedToCity = City::whereIn('country_id', $selected)->pluck('country_id')->toArray();

                // Combine all referenced countries
                $referencedCountries = array_merge($assignedToState, $assignedToCity);
                $referencedCountries = array_unique($referencedCountries);

                // Determine countries to delete
                $countriesToDelete = array_diff($selected, $referencedCountries);

                // Perform deletion
                if (!empty($countriesToDelete)) {
                    Country::whereIn('id', $countriesToDelete)->delete();
                    $this->deletedCountrys = $countriesToDelete;
                }

                // Track undeleted countries
                if (!empty($referencedCountries)) {
                    $this->undeletedCountrys = $referencedCountries;
                    $this->errorOccurred = true;
                    \Log::error('Some countries could not be deleted because they are referenced elsewhere: ' . implode(', ', $referencedCountries));
                }
            });
        } catch (\Exception $e) {
            \Log::error('Error deleting countries: ' . $e->getMessage());
            $this->errorOccurred = true;
            throw $e;
        }
    }
}

