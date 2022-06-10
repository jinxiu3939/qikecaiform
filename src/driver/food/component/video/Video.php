<?php
/**
 * 视频
 */

namespace Qikecai\Sffrender\driver\food\component\video;

use Qikecai\Sffrender\driver\food\component\Component;

class Video extends Component
{
    protected $attributeNames = [
        'kind', // 上传类别，['ng2-file-upload']
        'multiple', // 是否多图片
    ];

    protected $dataNames = [
        'uploadConfig', // 上传配置
    ];

    /**
     * 格式化表单组件
     * @param $component array 组件配置
     * @return array
     */
    protected function formatFormComponent($component)
    {
        $component = parent::formatFormComponent($component);
        if (isset($component['multiple'])) {
            $component['multiple'] = ($component['multiple'] === 'false' || !$component['multiple']) ? false : true;
        }
        return $component;
    }
}
