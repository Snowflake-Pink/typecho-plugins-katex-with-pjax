# Typecho Plugins KaTex with Pjax / Ajax
这个插件基于 [memset0](https://github.com/memset0) 修改 [zyuzhi](https://github.com/zyuzhi) 的项目 [typecho-plugin-katex](https://github.com/memset0/typecho-plugin-katex) 二次修改而来的，如果有时间，会保持长期更新。



细微修改如下：

* 引入了官方的 `auto-render.min.js` 
* 支持 `Pjax` / `Ajax` 回调函数

```js
renderMathInElement(document.body,katex_config)
```

## 使用

导入 `Typecho` 目录 `/usr/plugins/` ，**把插件文件夹改名为 `MarkdownKatex` 后**，在控制台启用插件。

若需要使用重载函数，请把重载函数代码放在主题专有的设置里面（需要 `Typecho` 主题支持）

