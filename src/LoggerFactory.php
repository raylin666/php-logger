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

/**
 * Class LoggerFactory
 * @package Raylin666\Logger
 */
class LoggerFactory
{
    /**
     * 日志集合
     * @var Logger[]
     */
    protected $loggers = [];

    public function make($channel = 'raylin666', LoggerOptions $loggerOptions)
    {
        if (isset($this->loggers[$channel])) {
            return ;
        }


    }

    public function get()
    {

    }
}