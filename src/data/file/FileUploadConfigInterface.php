<?php
/**
 * 文件上传配置接口
 */

namespace Qikecai\Sffrender\data\file;


interface FileUploadConfigInterface
{
    /**
     * 上传配置
     * @param array $field
     * @param array $value
     * @param array $model
     * @return FileUploadConfig
     */
    public function getFileUploadConfig($field, $value, $model);
}
