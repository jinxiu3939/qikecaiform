<?php

namespace Qikecai\Sffrender\data\file;

/**
 * 文件抓取配置接口
 */
interface FileCrawlConfigInterface
{
    /**
     * 获取文件抓取配置
     *
     * @param array $field 字段配置
     * @param mixed $value 字段值
     * @param array $context 表单上下文
     * @return FileCrawlConfig
     */
    public function getFileCrawlConfig(array $field, mixed $value, ?array $context): FileCrawlConfig;
}
