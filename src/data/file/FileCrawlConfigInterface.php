<?php
/**
 * 文件抓取配置接口
 */

namespace Qikecai\Sffrender\data\file;


interface FileCrawlConfigInterface
{
    /**
     * 获取文件抓取配置
     * @param array $field
     * @param array $value
     * @param array $model
     * @return FileCrawlConfig
     */
    public function getFileCrawlConfig($field, $value, $model);
}
