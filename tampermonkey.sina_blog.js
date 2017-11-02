// ==UserScript==
// @name         New Userscript
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  try to take over the world!
// @author       You
// @include      /^http://blog\.sina\.com\.cn/s/blog_.*
// @grant        none
// ==/UserScript==

(function() {
        'use strict';
            window.location = 'http://zero.one234.xyz/lite_read/sina_blog.php?url='+encodeURIComponent(window.location.href);
                // Your code here...
})();
