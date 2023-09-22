<?php

namespace App\Traits;
use Illuminate\Support\Facades\Log;

trait LogTrait
{

    /**
     * Checks if Logging is enabled in the env variables
     */
    public function loggingEnabled()
    {
        return env('APP_DEBUG', false);
    }

    //Creates an info Log with the information passed
    public function infoLog($log)
    {
        if ($this->loggingEnabled()) {
            if (is_string($log)) {
                Log::info($log);
            } else {
                Log::info(print_r($log, true));
            }
        }
    }
}
