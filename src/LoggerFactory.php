<?php
// +----------------------------------------------------------------------
// | Created by linshan. 版权所有 @
// +----------------------------------------------------------------------
// | Copyright (c) 2020 All rights reserved.
// +----------------------------------------------------------------------
// | Technology changes the world . Accumulation makes people grow .
// +----------------------------------------------------------------------
// | Author: kaka梦很美 <1099013371@qq.com>
// +----------------------------------------------------------------------

namespace Raylin666\Logger;

use Monolog\Handler\FormattableHandlerInterface;
use Monolog\Handler\HandlerInterface;
use Raylin666\Contract\LoggerInterface;

/**
 * Class LoggerFactory
 * @package Raylin666\Logger
 */
class LoggerFactory implements LoggerFactoryInterface
{
    /**
     * 日志集合
     * @var Logger[]
     */
    protected $loggers = [];

    /**
     * @param LoggerOptions $loggerOptions
     */
    public function make(LoggerOptions $loggerOptions)
    {
        $name = $loggerOptions->group();

        if (isset($this->loggers[$name])) {
            return ;
        }

        $handlers = $loggerOptions->getHandlers();
        $formatter = $loggerOptions->getFormatter();
        $logger = new Logger($name);
        foreach ($handlers as $handler) {
            /** @var HandlerInterface $handler */
            $handler = new $handler['class'](...array_values($handler['constructor']));
            if ($formatter && ($handler instanceof FormattableHandlerInterface)) {
                $handler->setFormatter(new $formatter['class'](...array_values($formatter['constructor'])));
            }
            $logger->pushHandler($handler);
        }

        $this->loggers[$name] = $logger;
    }

    /**
     * @param $name
     * @return LoggerInterface|null
     */
    public function get($name): ?LoggerInterface
    {
        return $this->loggers[$name] ?? null;
    }
}