<?php
/**
 *
 * 作者 言兑
 * 邮箱 xjtdy888[at]163.com
 * QQ 339534039
 * 项目托管 http://code.google.com/p/html-extractor/
 * 
 */
/*
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
header("Content-type:text/html; charset=utf-8");
$url = $_REQUEST['url'];
$v = $url ? $url : 'http://news.sina.com.cn/w/2010-11-03/063821404648.shtml';
echo '<title>正文提取</title>';
echo '<h3>PHP 网页正文提取程序</h2>';
echo '<h3>作者: 言兑</h2>';
echo '<h3>QQ: 339534039</h2>';
echo '<h3> <a href="http://hi.baidu.com/phps" target="_blank">查看博客</a> <a href="http://code.google.com/p/html-extractor/" target="_blank">查看项目代码</a></h3>';
echo '<form>';
echo '请输入要提取的URL:<input type="text" name="url" size="50" value="'.$v.'" /><input type="submit" value="分析" />';
echo '</form>';
if (!$url){
	exit;
}
echo '<b>分析结果:</b> <a href="'.$url.'" target="_blank">查看原文</a>：<br /><br />';

$text = HTMLExtractor::getUrlMainContent($url,200,1);
$text = HTMLExtractor::convertToUTF8($text);
if (!$text) $text = "抓取失败...可能目标页不规范或者正文太短";

echo ($text);

echo "<br /><br />耗时:" . HTMLExtractor::$usageTime;
if (function_exists('memory_get_usage')){
	echo "内存占用:" . (memory_get_usage(true)/1024).'KB';
}
*/
class HTMLExtractor
{
	#要删掉的元素
	const PC_TAG_DELETE = 1; 
	#要删掉的标签
	const PC_TAG_STRIP = 2;
	static $cleanTags= array(
		array("script",self::PC_TAG_DELETE),
		array("style",self::PC_TAG_DELETE),
		array("link",self::PC_TAG_DELETE),
		array("link",self::PC_TAG_DELETE),
		array("object",self::PC_TAG_DELETE),
		array("embed",self::PC_TAG_DELETE),

/*
		array("p",self::PC_TAG_STRIP),
		array("b",self::PC_TAG_STRIP),
		array("i",self::PC_TAG_STRIP),
		array("u",self::PC_TAG_STRIP),
		array("font",self::PC_TAG_STRIP),
		array("strong",self::PC_TAG_STRIP),
*/
	);
	static $usageTime = 0;
	static function preClean($html)
	{
		foreach(self::$cleanTags as $t)
		{
			if (!$t) continue;
			$name = $t[0];
			$pc   = $t[1];
			$html = preg_replace("#<({$name})(>|\s[^>]*?>)(.*?)</\\1>#is",
				$pc == self::PC_TAG_DELETE ? "" : "\\3",$html);				
		}
		return $html;

	}
	static function getDataMainContent($data,$minlength,$maxdepth)
	{
		$s = microtime(true);
		$data = self::preClean($data);
		$root = new htmlTag("document",htmlTag::DOM_TAG);
		$hand = new htmlExtractorHandler($root);
		$p = new htmlParse($data,$hand);
		$p->parse();
		$text =  self::getMainContent($root,$minlength,$maxdepth);
		$e = microtime(true);
		self::$usageTime = $e - $s;
		return $text;
	}
	static function getUrlMainContent($url,$minlength,$maxdepth)
	{
		$data = self::getUrlHtml($url);
		if (!$data) return false;
		return self::getDataMainContent($data,$minlength,$maxdepth);
	}
	static function getDomText($dom,$depth)
	{
           $result  = '';
		if (isset($dom->echoset)) return ;
		$dom->echoset = true;
		if($dom->depth <= $depth){
			foreach($dom->getChildren() as $child){
				if (is_object($child)){
					$result .= self::getDomText($child,$depth);
				}elseif(is_string($child)){
					$result .= $child;
				}
			}
		}
		return $result;
	}

	static function getMainContent($root,$textLength=100,$maxdepth)
	{

		$result = '';
		$cn  = $root->tagNum + $root->textNum;
		$per = $root->tagNum ? $root->textLength/$textLength / $root->tagNum : 1;
		if ($root->textLength >= $textLength && $per>0.5){
			$result .= self::getDomText($root,$root->depth+$maxdepth);
		}
		foreach($root->getChildren() as $dom){
			if (is_object($dom)){
				$result .= self::getMainContent($dom,$textLength,$maxdepth);
			}
		}
		return $result;
	}

	
	static function checkTextType($url)
	{  
		$url = parse_url($url); 
		if($fp = @fsockopen($url['host'],empty($url['port'])?80:$url['port'],$error))
		{
			fputs($fp,"GET ".(empty($url['path'])?'/':$url['path'])." HTTP/1.1\r\n");
			fputs($fp,"Host:$url[host]\r\n\r\n");
			while(!feof($fp))
			{
				$tmp = fgets($fp);
				if(trim($tmp) == ''){
					break;
				}else if(preg_match('#Content-type: text/(.*)#si',$tmp,$arr)){
					fclose($fp);
					return true;
				}
			}
			fclose($fp);
			return false;
		}else{
			return false;
		}
	}

	static function convertToUTF8($str) {
		$charset = mb_detect_encoding($str, array('ASCII','UTF-8','GB2312','GBK','BIG5','ISO-8859-1'));
		if (strcasecmp($charset,'UTF-8') != 0) {
			$str = mb_convert_encoding($str,'UTF-8',$charset);
		}
		return $str;
	}


	static function getUrlHtml($url){
		//return file_get_contents("txt.txt");
		if (!self::checkTextType($url)){
			exit();
		}
		return file_get_contents($url);
	}
}
/**
 *
 * HTML 标签解析器
 * 该解析器以<>为单元 比如 <div id="cc"> 这是一个处理单元
 * 所以 <div></div> 这句是2个处理单元<div>和</div>
 * 解析器每处理一个单元都会产生回调函数，至于怎么来处理这个单元由处理器来决定
 * 也就是说该解析器并不去处理标签匹不匹配之类的问题
 * </span></span> 这样的字符串也是可以进行解析的，产生2次 endElement 事件回调。
 * 本来先用PHP自带的DOM对象类，不过由于大部份网页都不规范，解析起来大部份是会出错的
 * 所以自己写了这个简单的
 * 本类总共3个回调函数
 *  startElement($parser,$tagName)	发现开始标签
 *  endElement($parser,$tagName)	发现闭合标签
 *  characterData($parser,$char)	发现标签内容
 *  本类没做任何优化，所以回调的频率会相当的高。
 *
 */
class htmlParse
{
	/** 
	 *	要处理的HTML内容
	 */
	protected $_html = '';
	/**
	 * _html 的长度
	 */
	protected $_htmlLength = 0;
	/** 
	 * 当前处理位置指针
	 */
	protected $_pt = 0;
	/**
	 * 标签状态栈
	 */
	protected $_tagStatus = array();
	/**
	 * 标签栈
	 */
	protected $_tagStack = array();
	/**
	 * 当前标签名称
	 */
	protected $_tagName = '';
	
	/** 
	 * 标签开始标识
	 */
	const TAG_START = 10;
	/**
	 * 标签结束标识
	 */
	const TAG_END   = 20;

	/**
	 * 标签名字开始
	 */
	const TAGNAME_START = 30;
	/**
	 * 标签名字结束
	 */
	const TAGNAME_END = 40;
	/**
	 * 注释开始(保留）
	 */
	const COMMENT_START = 50;
	/**
	 * 注释结束(保留）
	 */
	const COMMENT_END = 60;


	/** 
	 *  事件回调对象
	 */
	public $_elementHandler = null;
	/**
	 * 
	 * 构函方法
	 * @param striing $html 要解析的字符串
	 * @param object|array elementHandler 回调处理器可以是数组也可以是对象
	 *		对象只要实现相同的方法名就可以，注意这里没有用到接口
			如果是数组，方法名作为下标即可
	 *
	 */
	public function htmlParse($html,$elementHander=null)
	{
		$this->setHtml($html);
		$this->setElementHandler($elementHander);
	}
	/**
	 *
	 * 重新设定要解析的内容
	 * @param string $html
	 *
	 */
	public function setHtml($html)
	{
		$this->_html = $html;
		$this->_reset();
	}
	/**
	 *
	 * 重位处理指针，要处理的字符长度 
	 *
	 */
	public function _reset()
	{
		$this->_pt = 0;
		$this->_htmlLength = strlen($this->_html);
	}
	/**
	 * 重新指定处理器
	 * @param object|array elementHandler
	 */
	public function setElementHandler($elementHander)
	{
		$this->_elementHandler = $elementHander;
	}
	/**
	 * 获取要处理的下一个字符 指针自动后移
	 * 到结尾了返回false
	 * @return char
	 */
	public function nextChar()
	{
		if ($this->_pt < $this->_htmlLength){
			return $this->_html[$this->_pt++];
		}
		
		return false;
	}
	/**
	 * 获取处理过的上一个字符指针回退
	 * 到结尾了返回false
	 * @return char
	 */
	public function preChar()
	{
		if ($this->_pt > 0){
			return $this->_html[--$this->_pt];
		}
		return false;
	}
	/**
	 * 获得当前处理位置
	 * @return integer
	 */
	public function getPt()
	{
		return $this->_pt;
	}
	/**
	 * 设置处理位置 成功返回true 失败false
	 * @return bool
	 */
	public function setPt($v)
	{
		if ($v>-1 && $v < $this->_htmlLength){
			$this->_pt = $v;
			return true;
		}
		return false;
	}

	public function addTagStack()
	{
		return array_push($this->_tagStack,$this->_tagName);
	}

	public function startElement($parse,$tagName)
	{
	}

	public function endElement($parse,$tagName)
	{
	}
	public function characterData($parse,$char)
	{
	}

	public function endParse($parse)
	{
	}

	public function callHandler($callback)
	{
		$argv = func_get_args();
		array_shift($argv);
		array_unshift($argv,$this);
		if (is_array($this->_elementHandler) && $this->_elementHandler[$callback]){
			return call_user_func_array($this->_elementHandler[$callback],$argv);

		}else{
			$handler = is_object($this->_elementHandler) ? $this->_elementHandler : $this;
			if (method_exists($handler,$callback)){
				return call_user_method_array($callback,$handler,$argv);
			}
		}
	}

	public function parse()
	{
		while(($char=$this->nextChar()) !== false)
		{
			switch($char)
			{
				case '<':
					if (!$this->_tagStatus || end($this->_tagStatus) == self::TAG_END)	
					{
						$pt = $this->getPt();

						$char1 = $this->nextChar();
						$char2 = $this->nextChar();
						$char3 = $this->nextChar();
						$refor = false;
						if ($char1 == '!' && ($char2 == '-' && $char3 == '-')) {
							//如果是注释
							while(($char1=$this->nextChar()) !== false)
							{
								
								if ($char1 != '>') continue;
								$pt2 = $this->getPt();
								$this->preChar();
								$char2 = $this->preChar();
								$char3 = $this->preChar();
								if ($char2 == '-' && $char3 == '-') {

									$refor = true;
									$this->setPt($pt2);
									break;
								}
								$this->setPt($pt2);
							}
							
						}
						if ($refor){
							continue;
						}

						$this->setPt($pt);
	
						array_push($this->_tagStatus,self::TAG_START);
						array_push($this->_tagStatus,self::TAGNAME_START);
						$this->_tagName = '';
					}
				break;
				case ' ':  case '>':
					if (!$this->_tagStatus || end($this->_tagStatus) == self::TAG_END){
						$callback = 'characterData';
						$this->callHandler($callback,$char);
						continue;
					}
					$callback = '';
					if (end($this->_tagStatus) == self::TAGNAME_START) {
						array_pop($this->_tagStatus);
						array_push($this->_tagStatus , self::TAGNAME_END);
						if ($this->_tagName[0] == '/'){
							$this->_tagName = substr($this->_tagName,1);
							$callback = 'endElement';
						}else{
							$callback = 'startElement';
						}
					}
					// <p /> <p/> <p / >
					// <link ... />
					if (in_array(end($this->_tagStatus) ,array(self::TAGNAME_START,	self::TAGNAME_END)) && $char == '>'){
						$pt = $this->getPt();
						$this->setPt($pt-1);
						while(($char2=$this->preChar()) !== false && !preg_match("#\s#",$char2)){
							if ($char2 == '/'){
								//自闭合标签
								$callback = 'endElement';
								array_pop($this->_tagStatus); //end tagname_start
								array_push($this->_tagStatus , self::TAGNAME_END);
							}
							break;
						}
						$this->setPt($pt);
					}
					if ($callback == 'startElement'){
						$this->addTagStack();
						$this->callHandler($callback,$this->_tagName);
					}elseif ($callback == 'endElement'){

						array_pop($this->_tagStatus); //end tagname
						array_pop($this->_tagStatus); // end tag
						$this->callHandler($callback,$this->_tagName);
					}
					if (end($this->_tagStatus) == self::TAGNAME_END && $char == '>'){
						array_pop($this->_tagStatus); //end tag name
						array_pop($this->_tagStatus); //end tag
					}
				break;
				default:
					if (end($this->_tagStatus) == self::TAGNAME_START)
					{
						$this->_tagName .= $char;
					}
					if (!$this->_tagStatus || end($this->_tagStatus) == self::TAG_END){
						$callback = 'characterData';
						$this->callHandler($callback,$char);
					}
				break;
			}
		}
		$callback = 'endParse';
		$this->callHandler($callback,$char);
	}
}
/**
 */
class htmlTag
{
	public $tagName = '';
	public $type = '';
	public $depth = 0;
	public $parent = null;
	public $childs = array();

	public $textLength = 0;

	public $tagNum  = 0;
	public $textNum = 0;

	const DOM_TAG = 1;

	public function __construct($tagName,$type)
	{
		$this->type = $type;
		$this->tagName = $tagName;
	}

	public function addChild($child)
	{
		array_push($this->childs,$child);
		if (!is_object($child)){
			$this->textLength += $this->_strlen($child,true);
			$this->textNum++;
		}else{
			$this->tagNum++;
		}
	}
	public function _strlen($text,$ignoreSpace=false)
	{
		if ($ignoreSpace) $text = preg_replace("#\s*#s","",$text);
		return strlen($text);
	}

	public function getChildren()
	{
		$result = array();
		foreach($this->childs as $dom)
		{
			$result[] = $dom;
		}
		return $result;
		
	}
	public function getText()
	{
		$text = '';
		foreach($this->childs as $dom){
			if (is_string($dom)) $text .= $dom;
		}
		return $text;
	}
}

class htmlExtractorHandler
{
	public $ignoreTags=array(
		"!doctype","meta","link","hr","!--","base","basefont","br",
		"frame","frameset","noframes","iframe",
		"input","button","select","optgroup","option",
		"label","fieldset","legend","isindex",
		"img","map","area","style",
		"script","noscript","applet","object","param","marquee","embed");

	protected $_dom = array();

	private $_charBuffer = '';
	private $_domDepth   = 0;

	public function __construct($root)
	{
		array_push($this->_dom,$root);
	}

	public function isIgnore($tag)
	{
		$tag = strtolower($tag);
		return in_array($tag,$this->ignoreTags);
	}

	public function endParse()
	{
		$this->updateChacter();
	}

	public function updateChacter()
	{
		if ($this->_charBuffer != ''){
			end($this->_dom)->addChild($this->_charBuffer);
			$this->_charBuffer = '';
		}
	}

	public function startElement($parse,$tagName)
	{
		$this->updateChacter();
		$tagName = strtolower($tagName);
		if ($this->isIgnore($tagName) === true) return false;

		$dom = new htmlTag($tagName,htmlTag::DOM_TAG);
		$parent = end($this->_dom);
		$dom->parent = $parent;
		//echo str_repeat("    ",$this->_domDepth)."[{$dom->tagName}_{$this->_domDepth}]\r\n";
		$dom->depth  = ++$this->_domDepth;
		$parent->addChild($dom);
		

		array_push($this->_dom,$dom);
	}

	public function endElement($parse,$tagName)
	{
		$this->updateChacter();
		$tagName = strtolower($tagName);
		if ($this->isIgnore($tagName) === true) return false;
		$dom = end($this->_dom);
		if (end($this->_dom)->tagName == $tagName) {
			array_pop($this->_dom);
			$this->_domDepth--;
		}
		//echo str_repeat("    ",$this->_domDepth)."[/{$dom->tagName}_{$this->_domDepth}]\r\n";
	}
	public function characterData($parse,$char)
	{
		$this->_charBuffer .= $char;
	}
}
