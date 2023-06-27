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
     * @param array $field 字段配置
     * @param mixed $value 字段值
     * @param array $context 表单上下文
     * @return FileCropperConfig
     */
    public function getFileCropperConfig(array $field, mixed $value, ?array $context): FileCropperConfig;
}
