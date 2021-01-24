<?php
$url = urldecode($_REQUEST['url']);
if ( $url == '' ) {
    $url = 'http://blog.sina.com.cn/s/blog_620847f10102y8r0.html?tj=1';
}
if (filter_var($url, FILTER_VALIDATE_URL)) {
    $html = file_get_contents($url);
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    $articlebody = $dom->getElementById('articlebody');
    $images = $articlebody->getElementsByTagName('img');
    foreach ($images as $image) {
        if ( $real_src = $image->getAttribute('real_src') ) {
            $image->setAttribute('src', 'http://lite.wordpressmatrix.com/sinablogimageproxy?url='.$real_src); 
        }
    }
    $xpath = new DOMXPath($dom);
    $node = $xpath->query('//*[@id="articlebody"]'); 
    $content = $dom->saveHtml($node->item(0));
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
</style>
</head>
<body>
<div class=url>
    <form method=get action=''>
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
</html>
