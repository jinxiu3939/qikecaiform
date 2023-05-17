<?php
/**
 * Smart Table 组件父类
 */

namespace Qikecai\Sffrender\driver\smart\component;

use Qikecai\Sffrender\driver\BaseComponent;

abstract class Component extends BaseComponent
{
    /**
     * 配置表格组件
     * 重写父类方法
     * 
     * @param array $attribute
     * @param array $data
     * @return array
     */
    public function init(array $attribute = [], array $data = []): array
    {
        return $this->initColumn($attribute);
    }

    /**
     * 配置列
     * 
     * @param array $attribute
     * @return array
     */
    protected function initColumn(array $attribute): array
    {
        return $attribute;
    }
}
