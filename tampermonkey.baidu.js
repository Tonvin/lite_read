// ==UserScript==
// @name         New Userscript
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  try to take over the world!
// @author       You
// @match        https://www.baidu.com/s*
// @grant        none
// ==/UserScript==

(function() {
    'use strict';
    var the_interval = setInterval(function(){ document.getElementById('content_right').style.display = 'none';}, 200);
    setTimeout(function(){ window.clearInterval(the_interval);}, 5000);
})();
