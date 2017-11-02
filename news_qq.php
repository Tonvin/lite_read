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
    $url = 'http://news.qq.com/a/20170912/018352.htm';
}

$html = SimpleHtmlDom\file_get_html($url);
if ( false === $html ) {
    $msg = '阅读失败!';
    goto OUTPUT;
}
foreach($html->find('.qq_article .hd h1') as $element) 
{
       $title = $element->plaintext;
}
foreach($html->find('.qq_article .bd') as $element) 
{

    $content = $element->innertext;
}
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
<title></title>
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
    <form method=get action='news_qq.php'>
    <input placeholder='' type=text name=url id=url value="<?php echo $url;?>" />
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
    window.location = 'news_qq.php?url='+encodeURIComponent(url);
}
</script>
</html>
