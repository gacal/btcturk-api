<?php
declare(strict_types=1);

namespace slvler\BtcTurkApi\Log;

use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Record
{

    CONST logName = 'BtcTurk';
    CONST logFile = 'BtcTurk.log';

    public function loggered()
    {
        $logger = new Logger(self::logName);
        $logger->pushHandler(new StreamHandler(__DIR__ . '/'. self::logFile));

        $stack = HandlerStack::create();
        $stack->push(Middleware::log(
            $logger,
            new MessageFormatter('{req_body} - {res_body}')
        ));
        return $stack;
    }

}