<?php
/**
 * 表格渲染接口
 */

namespace Qikecai\Sffrender;

use Qikecai\Sffrender\bean\TableSettingBean;

interface TableRenderInterface
{
    /**
     * 表格设置
     *
     * @param array $setting
     * @return TableSettingBean
     */
    public function setting(array $setting): TableSettingBean;
}
