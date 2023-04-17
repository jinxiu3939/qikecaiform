<?php

namespace Qikecai\Sffrender;

/**
 * 组件配置接口
 *
 * @author qikecai <xiujixin@163.com>
 */
interface ComponentConfigInterface
{
    /**
     * 获取属性配置项
     * 
     * @return array
     */
    public function getAttributeConfigs(): array;

    /**
     * 获取数据配置项
     * 
     * @return array
     */
    public function getDataConfigs(): array;
}
