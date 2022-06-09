<?php
/**
 * 组件配置接口
 */

namespace Qikecai\Sffrender;


interface ComponentConfigInterface
{
    /**
     * 获取组件属性配置项
     * @return array
     */
    public function getAttributeConfigs();

    /**
     * 获取数据配置项
     * @return array
     */
    public function getDataConfigs();
}
