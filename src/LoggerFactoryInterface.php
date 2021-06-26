<?php
// +----------------------------------------------------------------------
// | Created by linshan. 版权所有 @
// +----------------------------------------------------------------------
// | Copyright (c) 2019 All rights reserved.
// +----------------------------------------------------------------------
// | Technology changes the world . Accumulation makes people grow .
// +----------------------------------------------------------------------
// | Author: kaka梦很美 <1099013371@qq.com>
// +----------------------------------------------------------------------

namespace Raylin666\Logger;

use Raylin666\Contract\LoggerInterface;

/**
 * Interface LoggerFactoryInterface
 * @package Raylin666\Logger
 */
interface LoggerFactoryInterface
{
    /**
     * @param LoggerOptions $loggerOptions
     * @return mixed
     */
    public function make(LoggerOptions $loggerOptions);

    /**
     * @param $name
     * @return LoggerInterface|null
     */
    public function get($name): ?LoggerInterface;
}