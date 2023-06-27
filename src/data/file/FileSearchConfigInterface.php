<?php

namespace Qikecai\Sffrender\data\file;

/**
 * 文件检索配置接口
 */
interface FileSearchConfigInterface
{
    /**
     * 获取文件检索配置
     * @param array $field 字段配置
     * @param mixed $value 字段值
     * @param array $context 表单上下文
     * @return FileSearchConfig
     */
    public function getFileSearchConfig(array $field, mixed $value, ?array $context): FileSearchConfig;
}
