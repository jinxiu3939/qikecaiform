<?php
/**
 * 图片
 */

namespace Qikecai\Sffrender\driver\food\component\image;

use Qikecai\Sffrender\driver\food\component\Component;

class Image extends Component
{
    protected $attributeNames = [
        'display', // 展示方式，'image' | 'input'
        'kind', // 上传类别，['ng2-file-upload']
        'multiple', // 是否多图片
        'repeat', // 是否可以选择重复的图片
    ];

    protected $dataNames = [
        'crawlConfig', // 抓取配置，CrawlConfig
        'cropperConfig', // 裁剪配置
        'list', // 资源列表
        'searchConfig', // 检索配置
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
