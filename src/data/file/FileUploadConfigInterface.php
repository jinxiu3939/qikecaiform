<?php

namespace Qikecai\Sffrender\data\file;

/**
 * 文件上传配置接口
 */
interface FileUploadConfigInterface
{
    /**
     * 上传配置
     * @param array $field
     * @param array $value
     * @param array $model
     * @return FileUploadConfig
     */
    public function getFileUploadConfig(array $field, ?array $value, ?array $model): FileUploadConfig;
}
