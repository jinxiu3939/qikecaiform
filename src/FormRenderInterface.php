<?php
/**
 * 表单渲染接口
 */

namespace Qikecai\Sffrender;

use Qikecai\Sffrender\bean\FormSettingBean;

interface FormRenderInterface
{
    /**
     * 表单设置
     * 
     * @param array $form 表单
     * @param array $block 块
     * @param array $lang 多语言
     * @return FormSettingBean
     */
    public function setting(array $form, ?array $block, ?array $lang): FormSettingBean;
}
