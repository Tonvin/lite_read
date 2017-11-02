<?php
/**
 *@Author Tonvin Tian<itonvin@gmail.com>
*/
require_once(dirname(__FILE__).'/vendor/autoload.php');
$sapi_name = php_sapi_name();
if ( 'cli' ==  $sapi_name ) {
    $url = $argv[1];
} else {
    $url = urldecode($_REQUEST['url']);
}

if ( $url == '' ) {
    $url = 'http://blog.sina.com.cn/s/blog_620847f10102y29n.html?tj=1';
}

$is_url_legal = FALSE;
if (filter_var($url, FILTER_VALIDATE_URL)) {
    if ( 1 ==  preg_match ( '/^http:\/\/blog.sina.com.cn.*/', $url ) ) {
        $is_url_legal = TRUE;
    }
}
$msg = '';
if ( FALSE === $is_url_legal ) {
    $msg = '必须是http://blog.sina.com.cn格式开始的URL!';
    goto OUTPUT;
}

$html = SimpleHtmlDom\file_get_html($url);
if ( false === $html ) {
    $msg = '阅读失败!';
    goto OUTPUT;
}
foreach($html->find('.titName') as $element) 
{
       $title = $element->plaintext;
}
foreach($html->find('img') as $element) 
{
    if ( $element->hasAttribute('real_src') ) {
        $src = $element->getAttribute('real_src');
        $element->setAttribute('src', $src);
    }
}
foreach($html->find('.articalContent') as $element) 
{

    $content = $element->innertext;
}
//echo $content;exit;
OUTPUT:
if ( $sapi_name == 'cli' ) {
    echo chr(10);
    echo $title;
    echo chr(10);
    echo strip_tags($content);
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="referrer" content="no-referrer">
<title>新浪博客极简版</title>
<style>
.url{width:80%;margin:auto;text-align:left;}
.url input{width:85%;font-size:1.5em;height:1.2em;;text-indent:5px;}
.url button{font-size:1.3em;}
.msg{width:80%;margin:auto;text-align:center;}
.title{width:80%;margin:0.5em auto;text-align:center;font-size:2em;}
.content{width:80%;margin:auto;font-size:1em;line-height:2em;}
::-webkit-input-placeholder {color:#ccc;}
</style>
</head>
<body>
<div class=url>
    <form method=get action='sina_blog.php'>
    <input placeholder='http://blog.sina.com.cn' type=text name=url id=url value="<?php echo $url;?>" />
    <button type=submit>阅读</button>
    </form>
</div>

<?php
if ( strlen($msg) > 0  ) {
?>
    <div class=msg>
    <?php echo $msg;?>
    </div>
<?php
}
?>

<div class=title>
<?php echo $title;?>
</div>

<div class=content>
<?php echo $content;?>
</div>
</body>
<script>
function leach()
{
    var url = document.getElementById('url').value;
    window.location = 'sina_blog.php?url='+encodeURIComponent(url);
}
</script>
</html>
