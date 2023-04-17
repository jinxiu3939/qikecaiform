<?php

namespace Qikecai\Sffrender;

use Qikecai\Sffrender\driver\BaseDriver;
use Qikecai\Sffrender\util\StrHelper;

/**
 * 表单工厂
 *
 * @author qikecai <xiujixin@163.com>
 */
class FormFactory
{
    /**
     * 实例化表单驱动工厂
     * @param string $driver 表单驱动名称
     * @return BaseDriver
     */
    public static function instance(string $driver = 'food'): BaseDriver
    {
        $name = sprintf('%sDriver', StrHelper::studly($driver)); // 下划线转大驼峰
        $form = sprintf('Qikecai\\Sffrender\\driver\\%s\\%s', $driver, $name);
        return new $form();
    }
}
