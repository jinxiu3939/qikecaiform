<?php
/**
 * `ueditor`富文本编辑器
 */

namespace Qikecai\Sffrender\driver\food\component\ueditor;

use Qikecai\Sffrender\driver\food\component\Component;

class UEditor extends Component
{
    protected $attributeNames = [
        'allowDivTransToP', // 允许进入编辑器的div标签自动变成p标签
        'autoFloatEnabled', // 是否保持toolbar的位置不动
        'autoHeightEnabled', // 是否自动行高
        'initialFrameHeight', // 初始化编辑器高度
        'kind', // 编辑器默认配置种类
        'lang', // 语言包
        'maximumWords', // 最大字数
        'readonly', // 是否只读
        'retainOnlyLabelPasted', // 粘贴只保留标签，去除标签所有属性
        'topOffset', // 浮动时工具栏距离浏览器顶部的高度，用于某些具有固定头部的页面
        'wordCount', // 是否开启最多字符验证
        'zIndex', // 层级
    ];

    protected $dataNames = [
        'editorConfig', // `u-editor`配置，配置项说明[http://fex.baidu.com/ueditor/#start-config]
    ];

    /**
     * 格式化表单组件
     * @param array $component 组件配置
     * @return array
     */
    protected function formatFormComponent($component)
    {
        $component = parent::formatFormComponent($component);
        $editor_config = isset($component['editorConfig']) ? $component['editorConfig'] : [];
        // 层级
        if (!isset($component['zIndex'])) {
            // 编辑页面为弹出框，zIndex需要设置较大，否则会被弹出层遮挡；如果不是，则需要配置zIndex为800，否则编辑之后的提示框被编辑器遮挡
            if (isset($component['value']) && $component['value'] != '') {
                $editor_config['zIndex'] = 2000;
            }
        }
        $component['editorConfig'] = $editor_config;
        return $component;
    }
}
