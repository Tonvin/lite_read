// ==UserScript==
// @name         baidu search result no advertisment.
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  remove baidu search advertisment.
// @author       You
// @include      /^https://www\.baidu\.com/s\?wd=.*
// @grant        none
// ==/UserScript==

(function() {
	document.getElementsByClassName("result-op")[0].parentNode.removeChild(document.getElementsByClassName("result-op")[1]);
})();
