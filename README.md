# lite_read
以精简的模式浏览网页，去除其他信息的干扰。

目前支持的网站：
新浪博客
csdn博客

建议安装chrome插件tampermonkey实现遇到对应的url自动跳转的功能。

* 示例 
```
http://zero.one234.com/lite_read/sina_blog.php
```

* 下载代码
```
git clone https://github.com/Tonvin/lite_read.git
```

* 安装composer [ https://getcomposer.org/download/ ]
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

* 更新类库
```
php composer.phar update
```

* 开始使用
访问  http://$your_domain/lite_read/sina_blog.php

* 命令行模式
```
php -f lite_read/sina_blog.php $url
```
