<?php

namespace Qikecai\Sffrender\data\file;

/**
 * 文件检索配置接口
 */
interface FileSearchConfigInterface
{
    /**
     * 获取文件检索配置
     * @param array $field
     * @param array $value
     * @param array $model
     * @return FileSearchConfig
     */
    public function getFileSearchConfig(array $field, ?array $value, ?array $model): FileSearchConfig;
}
