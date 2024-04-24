<?php
/**
 * 单选项
 */

namespace Qikecai\Sffrender\driver\food\component\radio;

use Qikecai\Sffrender\driver\food\component\Component;

class Radio extends Component
{
    protected $attributeNames = [
        'all', // 是否显示全部
        'empty', // 是否显示空选项
        'readonly', // 是否只读
        'width', // 选项宽度
    ];

    protected $dataNames = [
        'options', // 选项
    ];

    /**
     * 格式化表单组件
     * @param $component array 组件配置
     * @return array
     */
    protected function formatFormComponent($component)
    {
        $component = parent::formatFormComponent($component);
        /* 值 */
        if (isset($component['value'])) {
            if ($component['value'] === 'false') {
                $component['value'] = false;
            } elseif ($component['value'] === 'true') {
                $component['value'] = true;
            }
        }
        return $component;
    }
}
