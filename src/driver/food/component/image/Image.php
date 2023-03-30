<?php
/**
 * 图片
 */

namespace Qikecai\Sffrender\driver\food\component\image;

use Qikecai\Sffrender\driver\food\component\Component;

class Image extends Component
{
    protected $attributeNames = [
        'aspectRatioHeight', // 裁剪比率高度
        'aspectRatioWidth', // 裁剪比率宽度
        'cropperType', // 裁剪格式，'png'|'jpeg'
        'debug', // 是否开启调试模式
        'display', // 展示方式，'image' | 'input'
        'hideCrawl', // 是否禁用图片抓取组件
        'hideCropper', // 是否禁用图片裁剪组件
        'hideSearch', // 是否禁用图片检索组件
        'hideUpload', // 是否禁用图片上传组件
        'kind', // 上传类别，'ng2-file-upload'
        'multiple', // 是否多图片
        'queueLimit', // 单次操作最大图片数目
        'repeat', // 是否可以选择重复的图片
        'searchDisplay', // 检索结果显示方式
        'searchMode', // 检索方式
    ];

    protected $dataNames = [
        'crawlConfig', // 抓取配置，CrawlConfig
        'cropperConfig', // 裁剪配置
        'list', // 同步图片列表
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
