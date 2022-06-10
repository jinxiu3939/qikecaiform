<?php
/**
 * 表单工厂
 */

namespace Qikecai\Sffrender;


use Qikecai\Sffrender\driver\BaseDriver;
use Qikecai\Sffrender\util\StrHelper;

class FormFactory
{
    /**
     * 实例化表单驱动工厂
     * @param $driver string 表单驱动名称
     * @return BaseDriver
     */
    public static function instance($driver = 'food') {
        $name = sprintf('%sDriver', StrHelper::studly($driver)); // 下划线转大驼峰
        $form = sprintf('Qikecai\\Sffrender\\driver\\%s\\%s', $driver, $name);
        return new $form();
    }
}
