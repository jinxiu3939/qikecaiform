<?php
/**
 * 自定义表单项
 */

namespace Qikecai\Sffrender\driver\food\component\custom;

use Qikecai\Sffrender\driver\food\component\Component;

class Custom extends Component
{
    protected $attributeNames = [
        'renderComponent', // 自定义组件名称标识
        'onComponentInitFunction', // 自定义组件初始化回调函数
    ];
}
