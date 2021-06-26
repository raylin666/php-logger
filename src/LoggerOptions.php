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

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\RotatingFileHandler;

/**
 * Class LoggerOptions
 * @package Raylin666\Logger
 */
class LoggerOptions
{
    /**
     * 日志组
     * @var
     */
    protected $group;

    /**
     * 日志处理器
     * @var array
     */
    protected $handlers = [
        [
            'class'         =>  RotatingFileHandler::class,
            'constructor'   => [
                'filename'      =>  '',
                'maxFiles'      =>  31,
                'level'         =>  Logger::DEBUG,
                'bubble'        =>  true,
                'filePermission'=>  0666,
                'useLocking'    =>  false,
            ],
        ]
    ];

    /**
     * 日志格式
     * @var array
     */
    protected $formatter = [
        'class'         =>  LineFormatter::class,
        'constructor'   =>  [
            'format'                        =>  "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n",
            'dateFormat'                    =>  "Y-m-d H:i:s",
            'allowInlineLineBreaks'         => true,
            'ignoreEmptyContextAndExtra'    => false,
        ]
    ];

    /**
     * LoggerOptions constructor.
     * @param string $group
     * @param array $handlers
     * @param array $formatter
     */
    public function __construct(string $group, array $handlers = [], array $formatter = [])
    {
        $this->group = $group;

        if ($handlers) {
            $this->handlers = $handlers;
        }

        if ($formatter) {
            $this->formatter = $formatter;
        }
    }

    /**
     * @return string
     */
    public function group(): string
    {
        return $this->group;
    }

    /**
     * @param array $handlers
     */
    public function setHandlers(array $handlers): void
    {
        $this->handlers = $handlers;
    }

    /**
     * @return array
     */
    public function getHandlers(): array
    {
        return $this->handlers;
    }

    /**
     * @param array $formatter
     */
    public function setFormatter(array $formatter): void
    {
        $this->formatter = $formatter;
    }

    /**
     * @return array
     */
    public function getFormatter(): array
    {
        return $this->formatter;
    }
}