<?php

namespace Qikecai\Sffrender\bean;

/**
 * 表单设置实体类
 *
 * @author qikecai <xiujixin@163.com>
 */
class FormSettingBean extends BaseBean
{
    public bool $validate; // 点击提交按钮是否校验表单
    public bool $foldBody; // 表单体是否折叠
    public int $bodyWidth; // 表单体宽度
    public string $size; // 一行放几个表单项
    public int $width; // 每个表单项中表单组件的宽度
    public int $buttonWidth; // 按钮宽度
    public array $buttons; // 按钮
    public string $buttonAlign; // 按钮对齐方式
    public bool $buttonFixed; // 按钮是否悬浮
    public string $buttonPosition; // 按钮悬浮位置
    public bool $hideSubmit; // 隐藏提交按钮
    public string $submitText; // 提交按钮文本
    public bool $hideReset; // 隐藏重置按钮
    public string $resetText; // 提交按钮文本
    public string $blockId; // 块标识
    public string $blockTitle; // 块标题
    public string $blockLayout; // 块布局方式
    public bool $hideBlockBody; // 块内容是否隐藏
    public array $children; // 子块
}
