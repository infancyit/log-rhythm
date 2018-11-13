<?php

namespace InfancyIt\LogRhythm;

use Monolog\Logger;

class LogRhythmChannel
{
    /**
     * Create a custom Monolog instance.
     *
     * @param  array $config
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        $logger = new Logger('log-rhythm');
        $logger->pushHandler(new LogRhythmHandler());
        $logger->pushProcessor(new LogRhythmProcessor());
        return $logger;
    }
}
