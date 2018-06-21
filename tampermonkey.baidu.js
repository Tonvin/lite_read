 // ==UserScript==
 // @name         New Userscript
 // @namespace    http://tampermonkey.net/
 // @version      0.1
 // @description  try to take over the world!
 // @author       You
 // @match        https://www.baidu.com/*
 // @grant        none
 // ==/UserScript==

(function() {
 'use strict';
 var the_interval = setInterval(function(){
         if (  typeof document.getElementById('content_right') === 'object' ) {
         document.getElementById('content_right').style.display = 'none';
         }
 }, 500);
 //setTimeout(function(){ window.clearInterval(the_interval);}, 5000);
 })();
