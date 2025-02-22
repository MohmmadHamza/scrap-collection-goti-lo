<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Facades\LogBatch;

abstract class BaseModel extends Model
{
    use LogsActivity;

  
    public function getActivitylogOptions(): LogOptions
    {
        LogBatch::startBatch();
        return LogOptions::defaults()
            ->logOnly($this->getLogAttributes()) 
            ->useLogName($this->getLogName()) 
            ->logOnlyDirty() 
            ->dontSubmitEmptyLogs(); 
    }

    /**
     * Get the attributes to log for the model.
     *
     * @return array
     */
    protected function getLogAttributes(): array
    {
        
        return [];
    }

    /**
     * Get the log name based on the model class.
     *
     * @return string
     */
    protected function getLogName(): string
    {
        
        return class_basename($this);
    }

    /**
     * Provide a description for the event.
     *
     * @param string $eventName
     * @return string
     */
    public function getDescriptionForEvent(string $eventName): string
    {
        
        return sprintf('%s has been %s', $this->getLogName(), $eventName);
    }
}
