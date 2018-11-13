<?php

namespace InfancyIt\LogRhythm;

class LogRhythmProcessor
{
    /**
     * Include additional field to the record.
     *
     * @param array $record
     * @return array
     */
    public function __invoke(array $record): array
    {
        $record['extra'] = [
            'user_id' => auth()->user() ? auth()->user()->id : NULL,
            'url' => request()->server('REQUEST_URI'),
            'ip' => request()->server('REMOTE_ADDR'),
            'http_method' => request()->server('REQUEST_METHOD'),
            'inputs' => [
                'origin' => request()->headers->get('origin'),
                'input' => config('logrhythm.input') ? request()->except('password') : null,
                'server' => request()->server('SERVER_NAME'),
                'referrer' => request()->server('HTTP_REFERER'),
            ]
        ];
        return $record;
    }
}
