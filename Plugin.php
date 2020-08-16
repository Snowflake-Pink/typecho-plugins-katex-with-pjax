<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * MarkdownParse Katex for Typecho (Modified by memset0 & Snowflake_Pink)
 * 
 * @package MardownKatex
 * @author zyuzhi & memset0 & Snowflake_Pink
 * @version 1.1
 * @link https://blog.zyuzhi.me
 */
class MarkdownKatex_Plugin implements Typecho_Plugin_Interface
{
    public static $count = 0;
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Abstract_Contents')->markdown = array('MarkdownKatex_Plugin','parseDown');
        Typecho_Plugin::factory('Widget_Archive')->footer = array('MarkdownKatex_Plugin','footer');
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
    }
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}

    public static function parseDown($text)
    {
        require_once dirname(__FILE__) . '/ParsedownKatex.php';
        $content = ParsedownKatex::instance()->setFencedCodeBlockClassPrefix('')->text($text);
        return $content;
    }

    public static function footer($content) {
        ?>
<link href="//cdn.jsdelivr.net/npm/katex@0.12.0/dist/katex.min.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/katex@0.12.0/dist/katex.min.js"></script>
<script>
var katex_config = {
	delimiters: 
	[
		{left: "$$", right: "$$", display: true},
  		{left: "$", right: "$", display: false}
	]
};
</script>
<script defer src="https://cdn.jsdelivr.net/npm/katex@0.12.0/dist/contrib/auto-render.min.js" onload="renderMathInElement(document.body,katex_config)"></script>
<?php
    }
}

