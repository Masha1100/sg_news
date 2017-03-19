<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$logger = new Logger('news_error');
$logger->pushHandler(new StreamHandler('../logs/error.log', Logger::ERROR));

$logger_info = new Logger('news_info');
$logger_info->pushHandler (new StreamHandler('../logs/info.log', Logger::INFO));
