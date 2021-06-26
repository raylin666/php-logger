# 日志服务

[![GitHub release](https://img.shields.io/github/release/raylin666/logger.svg)](https://github.com/raylin666/logger/releases)
[![PHP version](https://img.shields.io/badge/php-%3E%207.0-orange.svg)](https://github.com/php/php-src)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](#LICENSE)

### 环境要求

* PHP >=7.2

### 安装说明

```
composer require "raylin666/logger"
```

### 使用方式

继承 monolog/monolog 扩展包 https://github.com/Seldaek/monolog

最简单的文件日志存储调用方式：

```php
<?php

require_once 'vendor/autoload.php';

$loggerConfig = [
    'default' => [
        'handlers' => [
            [
                'class'         =>  \Monolog\Handler\RotatingFileHandler::class,
                'constructor'   => [
                    'filename'      =>  'runtime/logs/raylin666.log',
                    'maxFiles'      =>  31,
                    'level'         =>  \Raylin666\Logger\Logger::DEBUG,
                    'bubble'        =>  true,
                    'filePermission'=>  0666,
                    'useLocking'    =>  false,
                ],
            ]
        ],
        'formatter' => [
            'class'         =>  \Monolog\Formatter\LineFormatter::class,
            'constructor'   =>  [
                'format'                        =>  "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n",
                'dateFormat'                    =>  "Y-m-d H:i:s",
                'allowInlineLineBreaks'         => true,
                'ignoreEmptyContextAndExtra'    => false,
            ]
        ],
    ],
];

$loggerFactory = new \Raylin666\Logger\LoggerFactory();
foreach ($loggerConfig as $group => $item) {
    $loggerOption = new \Raylin666\Logger\LoggerOptions($group, $item['handlers'] ?? [], $item['formatter'] ?? []);
    $loggerFactory->make($loggerOption);
}

$loggerFactory->get('defalut')->info('hello world.');

// 日志文件输出 raylin666-2021-06-26.log
#  [2021-06-26 11:32:15] default.INFO: hello world. [] [] 

```

## 更新日志

请查看 [CHANGELOG.md](CHANGELOG.md)

### 联系

如果你在使用中遇到问题，请联系: [1099013371@qq.com](mailto:1099013371@qq.com). 博客: [kaka 梦很美](http://www.ls331.com)

## License MIT

