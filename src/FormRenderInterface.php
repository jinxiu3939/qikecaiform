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
     * @param array $lang 多语言 包括母语
     * @return FormSettingBean
     */
    public function setting(array $form, ?array $block, ?array $lang): FormSettingBean;

    /**
     * 渲染表单组件
     * 
     * @param array $fields 字段
     * @param array $data 数据
     * @param array $lang 多语言 包括母语
     * @return array
     */
    public function renderComponents(array $fields, array $data, ?array $lang): array;
}
