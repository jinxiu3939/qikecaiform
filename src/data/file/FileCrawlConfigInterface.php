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
     * @param array $field
     * @param array $value
     * @param array $model
     * @return FileCrawlConfig
     */
    public function getFileCrawlConfig(array $field, ?array $value, ?array $model): FileCrawlConfig;
}
