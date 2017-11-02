// ==UserScript==
// @name         New Userscript
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  try to take over the world!
// @author       You
// @include      /^http://blog\.csdn\.net/.*/article/details/.*
// @grant        none
// ==/UserScript==

(function() {
        'use strict';
        window.location = 'http://zero.one234.com/lite_read/csdn_blog.php?url='+encodeURIComponent(window.location.href);
})();
