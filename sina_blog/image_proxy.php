<?php
header("Content-type: image/jpeg");
$curl = curl_init();

$url = urldecode($_REQUEST['url']);
if (!filter_var($url, FILTER_VALIDATE_URL)) {
    echo 'invalid image'; 
    exit;
}

curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Host:  s8.sinaimg.cn',
        'Connection:  keep-alive',
        'Pragma:  no-cache',
        'Cache-Control:  no-cache',
        'Upgrade-Insecure-Requests:  1',
        'User-Agent:  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36',
        'Accept:  text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        'Referer:  http://blog.sina.com.cn/',
        'Accept-Encoding:  gzip, deflate',
        'Accept-Language:  zh-CN,zh;q=0.9,en;q=0.8,zh-TW;q=0.7'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
