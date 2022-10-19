<?php
/**
 * 七棵菜表单组件父类
 */

namespace Qikecai\Sffrender\driver\food\component;

use Qikecai\Sffrender\driver\BaseComponent;

abstract class Component extends BaseComponent
{
    /**
     * 格式化表单组件
     * 重写父类方法
     * @param $component array 组件配置
     * @return array
     */
    protected function formatFormComponent($component)
    {
        /* 类型的第一个值为客户端组件类型，第二个值作为客户端工厂方法 */
        if (isset($component['type']) && is_array($component['type'])) {
            /* 客户端工厂方法 */
            $method = isset($component['type'][1]) ? $component['type'][1] : ''; // 客户端工厂化方法名称
            if (isset($component['data']) && $component['data']) {
                $component['data']['method'] = $method;
            } else {
                $component['data'] = ['method' => $method];
            }

            /* 组件类型 */
            $component['type'] = $component['type'][0];
        }

        return $component;
    }
}
