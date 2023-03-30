<?php
/**
 * `ckeditor`富文本编辑器
 */

namespace Qikecai\Sffrender\driver\food\component\ckeditor;


use Qikecai\Sffrender\driver\food\component\Component;

class CkEditor extends Component
{
    protected $attributeNames = [
        'build', // 编辑器种类，['classic', 'balloon-block']
        'editor', // 编辑器
        'uploadUrl', // `ckfinder`图片上传地址，需要安装依赖`CKEditor Build`[https://ckeditor.com/docs/ckeditor5/latest/builds/guides/overview.html#classic-editor]
        'kind', // 默认配置类别，['ckfinder']
    ];

    protected $dataNames = [
        'editorConfig', // `ck-editor`配置
    ];

    /**
     * 格式化表单组件
     * @param $component array 组件配置
     * @return array
     */
    protected function formatFormComponent($component)
    {
        $component = parent::formatFormComponent($component);
        /* 图片上传地址 */
        if (isset($component['uploadUrl']) && $component['uploadUrl']) {
            if (isset($component['editorConfig']) && is_array($component['editorConfig'])) {
                if (isset($component['editorConfig']['ckfinder']) && is_array($component['editorConfig']['ckfinder'])) {
                    $component['editorConfig']['ckfinder']['uploadUrl'] = $component['uploadUrl'];
                } else {
                    $component['editorConfig']['ckfinder'] = [
                        'uploadUrl' => $component['uploadUrl']
                    ];
                }
            } else {
                $component['editorConfig'] = [
                    'ckfinder' => [
                        'uploadUrl' => $component['uploadUrl']
                    ]
                ];
            }
            unset($component['uploadUrl']);
        }
        return $component;
    }
}
