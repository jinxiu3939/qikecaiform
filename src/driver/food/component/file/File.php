<?php
/**
 * 文件
 */

namespace Qikecai\Sffrender\driver\food\component\file;

use Qikecai\Sffrender\driver\food\component\Component;

class File extends Component
{
    protected $attributeNames = [
        'accept', // 文件格式，['image/*', 'image/gif, image/jpeg']
        'kind', // 文件类型，['xls', 'word', 'txt', 'image', 'video', 'audio', 'pdf', 'json', 'zip']
    ];

    protected $dataNames = [
        'download', // 文件下载地址
    ];

    /**
     * 格式化表单组件
     * @param $component array 组件配置
     * @return array
     */
    protected function formatFormComponent($component)
    {
        $component = parent::formatFormComponent($component);
        if (isset($component['kind'])) {
            $component['kind'] = explode(',', $component['kind']);
        }
        return $component;
    }
}
