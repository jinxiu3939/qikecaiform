<?php

namespace Qikecai\Sffrender;

/**
 * 表格配置接口
 */
interface TableConfigInterface
{
    /**
     * 获取可配置项
     * 
     * @return array
     */
    public function getAttribute(): array;

    /**
     * 获取组件类型
     * 
     * @return array
     */
    public function getType(): array;
}
