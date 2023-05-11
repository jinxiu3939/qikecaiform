<?php
/**
 * 视频
 */

namespace Qikecai\Sffrender\driver\food\component\video;

use Qikecai\Sffrender\driver\food\component\Component;

class Video extends Component
{
    protected $attributeNames = [
        'queueLimit', // 单次上传最大文件数目
        'multiple', // 是否多图片
    ];

    protected $dataNames = [
        'uploadConfig', // 上传配置
    ];
}
