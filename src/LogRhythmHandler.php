<?php

namespace InfancyIt\LogRhythm;


use InfancyIt\LogRhythm\Models\LogRhythm;
use Illuminate\Support\Facades\Log;
use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

class LogRhythmHandler extends AbstractProcessingHandler
{

    public function __construct($level = Logger::DEBUG)
    {
        parent::__construct($level);
    }

    /**
     * Implements abstract method 'write' to handle the log
     * information.
     *
     * @param array $record
     */
    protected function write(array $record)
    {
        try {
            ini_set('memory_limit', '256M');
            $log = new LogRhythm();
            $log->message = $record['message'];
            $log->context = config('logrhythm.stack_trace') ? json_encode($record['context']) : null;
            $log->level = $record['level'];
            $log->level_name = strtolower($record['level_name']);
            $log->user_ip = $record['extra']['ip'];
            $log->url = $record['extra']['url'];
            $log->http_method = $record['extra']['http_method'];;
            $log->extra = json_encode($record['extra']['inputs']);
            $log->save();
        } catch (\Exception $e) {
            Log::channel('stack')->emergency($e->getMessage());
        } finally {
            ini_set('memory_limit', '128M');
        }

    }

    /**
     * {@inheritDoc}
     */
    protected function getDefaultFormatter()
    {
        return new JsonFormatter();
    }
}
