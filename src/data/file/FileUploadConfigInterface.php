<?php

namespace Qikecai\Sffrender\data\file;

/**
 * 文件上传配置接口
 */
interface FileUploadConfigInterface
{
    /**
     * 上传配置
     * @param array $field 字段配置
     * @param mixed $value 字段值
     * @param array $context 表单上下文
     * @return FileUploadConfig
     */
    public function getFileUploadConfig(array $field, mixed $value, ?array $context): FileUploadConfig;
}
