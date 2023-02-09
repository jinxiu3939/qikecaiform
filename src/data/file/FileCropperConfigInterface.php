<?php
/**
 * 文件裁剪配置接口
 */

namespace Qikecai\Sffrender\data\file;


interface FileCropperConfigInterface
{
    /**
     * 获取文件裁剪配置
     * @param array $field
     * @param array $value
     * @param array $model
     * @return FileCropperConfig
     */
    public function getFileCropperConfig($field, $value, $model);
}
