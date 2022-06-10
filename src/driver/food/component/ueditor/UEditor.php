<?php
/**
 * `ueditor`富文本编辑器
 */

namespace Qikecai\Sffrender\driver\food\component\ueditor;

use Qikecai\Sffrender\driver\food\component\Component;

class UEditor extends Component
{
    protected $attributeNames = [
        'kind', // `u-editor`类别，['classic']
        'wordCount', // 是否开启最多字符验证
        'autoFloatEnabled', // 是否保持toolbar的位置不动
        'zIndex', // 层级
    ];

    protected $dataNames = [
        'editorConfig', // `u-editor`配置，配置项说明[http://fex.baidu.com/ueditor/#start-config]
        'uEditorContentId', // 编辑记录标识
    ];

    /**
     * 格式化表单组件
     * @param $component array 组件配置
     * @return array
     */
    protected function formatFormComponent($component)
    {
        $component = parent::formatFormComponent($component);
        $editor_config = isset($component['editorConfig']) ? $component['editorConfig'] : [];
        if (isset($component['wordCount']) && $component['wordCount']) { // 开启最多字符验证
            $editor_config['maximumWords'] = $component['max']; // 最大字符
            unset($component['wordCount']); // 销毁配置值
        } elseif (isset($component['autoFloatEnabled'])) { // 是否保持toolbar的位置不动
            $editor_config['autoFloatEnabled'] = ($component['autoFloatEnabled'] === 'false' || !$component['autoFloatEnabled']) ? false : true;
            unset($component['autoFloatEnabled']); // 销毁配置值
        }
        // 层级
        if (!isset($component['zIndex'])) {
            if (isset($component['uEditorContentId']) && $component['uEditorContentId']) { // 编辑
                // 编辑页面为弹出框，zIndex需要设置较大，否则会被弹出层遮挡；如果不是，则需要配置zIndex为800，否则编辑之后的提示框被编辑器遮挡
                $editor_config['zIndex'] = 2000;
                unset($component['uEditorContentId']); // 销毁配置值
            } else { // 新增
                $editor_config['zIndex'] = 800;
            }
        }
        // 其他编辑器配置
        foreach ($editor_config as $key => $value) {
            if (isset($component[$key])) {
                $editor_config[$key] = $value;
                unset($component[$key]); // 清空多余配置
            }
        }
        $component['editorConfig'] = $editor_config;
        return $component;
    }
}
