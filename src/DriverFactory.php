<?php

namespace Qikecai\Sffrender;

use Qikecai\Sffrender\driver\BaseDriver;
use Qikecai\Sffrender\driver\BaseCardDriver;
use Qikecai\Sffrender\driver\BaseTableDriver;
use Qikecai\Sffrender\util\StrHelper;

/**
 * 驱动工厂
 *
 * @author qikecai <xiujixin@163.com>
 */
class DriverFactory
{
    /**
     * 实例化表单驱动器
     * 
     * @param string $driver 驱动名称
     * @return BaseDriver
     */
    public static function instance(string $driver = 'food'): BaseDriver
    {
        $name = sprintf('%sDriver', StrHelper::studly($driver)); // 下划线转大驼峰
        $form = sprintf('Qikecai\\Sffrender\\driver\\%s\\%s', $driver, $name);
        return new $form();
    }

    /**
     * 实例化表格驱动器
     * @param string $driver 驱动名称
     * @return BaseTableDriver
     */
    public static function instanceTable($driver = 'smart') {
        $name = sprintf('%sDriver', StrHelper::studly($driver)); // 下划线转大驼峰
        $table = sprintf('Qikecai\\Sffrender\\driver\\%s\\%s', $driver, $name);
        return new $table();
    }

    /**
     * 实例化卡片驱动器
     * @param string $driver 驱动名称
     * @return BaseCardDriver
     */
    public static function instanceCard($driver = 'cover') {
        $name = sprintf('%sDriver', StrHelper::studly($driver)); // 下划线转大驼峰
        $table = sprintf('Qikecai\\Sffrender\\driver\\%s\\%s', $driver, $name);
        return new $table();
    }
}
