<?php

namespace Qikecai\Sffrender\data\file;

/**
 * 文件裁剪配置接口
 */
interface FileCropperConfigInterface
{
    /**
     * 获取文件裁剪配置
     * 
     * @param array $field
     * @param array $value
     * @param array $model
     * @return FileCropperConfig
     */
    public function getFileCropperConfig(array $field, ?array $value, ?array $model): FileCropperConfig;
}
