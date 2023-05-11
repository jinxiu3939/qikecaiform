# qikecaiform
表单渲染引擎

区别组件和字段的概念，组件是指客户端表单组件；字段是指数据表字段设置


## 目录结构

- bean, 表单实体
- data, 数据接口
- driver, 表单驱动
- lang, 多语言

## 引擎文件

### 接口

- ComponentConfigInterface, 组件配置接口，用于外部配置组件
- ComponentInterface, 组件接口，用于定义组件
- FormConfigInterface, 表单配置接口，提供外部调用表单配置
- FormRenderInterface, 表单渲染接口，提供外部渲染表单
- TableConfigInterface, 表格配置接口

### 类

- CardFacade, 卡片引擎门面类，外部调用卡片引擎的唯一入口
- FormFacade, 表单引擎门面类，外部调用表单引擎的唯一入口
- FormFactory, 表单驱动工厂，实例化表单驱动
- TableFacade, 表格引擎门面类，外部调用表格引擎的唯一入口

## 数据驱动流程

参见data目录下的README
