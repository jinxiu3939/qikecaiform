<?php
/**
 * 文件检索配置接口
 */

namespace Qikecai\Sffrender\data\file;


interface FileSearchConfigInterface
{
    /**
     * 获取文件检索配置
     * @param array $field
     * @param array $value
     * @param array $model
     * @return FileSearchConfig
     */
    public function getFileSearchConfig($field, $value, $model);
}
