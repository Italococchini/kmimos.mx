!function(){angular.module("Wolive",["ngRoute","ngAnimate","countTo","angularMoment","ui.bootstrap","nvd3","angular-loading-bar"]).factory("ajaxAdmin",["$http","$httpParamSerializerJQLike",function(n,t){return{newRequest:function(e,i,o){return n({url:ajaxurl,method:"POST",ignoreLoadingBar:e.ignoreLoadingBar,data:t(e),headers:{"Content-Type":"application/x-www-form-urlencoded"}}).then(i,o)}}}]).factory("Functions",["$window",function(n){return{go:function(t){n.location.href=t},goUser:function(t){n.location.href="#/Users/"+t},goBlank:function(t){n.open(t,"_blank")},percent_array:function(n,t){var e=0;if(angular.forEach(t,function(n,t){e+=parseInt(n)}),0==e)return 0;return n/e*100},getTypePlatform:function(n){return 1==n?"Mobile":"Desktop"},setFocusEvents:function(n){jQuery(window).focus(function(){n(!0)}).blur(function(){n(!1)})},compareArray:function(n,t){},convert2Chart:function(n){var t=[];return angular.forEach(n,function(n,e){t.push({key:n.meta.post_title,y:n.total})}),t},classBrowser:function(n){return!!n&&(n=n.toLowerCase(),n.includes("chrome")||n.includes("crios")?"chrome":n.includes("firefox")?"firefox":n.includes("explorer")||n.includes("ie")?"internet-explorer":n.includes("safari")?"safari":void 0)},classSO:function(n){return!!n&&(n=n.toLowerCase(),n.includes("ios")||n.includes("mac")?"apple":n.includes("linux")?"linux":n.includes("win")?"windows":n.includes("android")?"android":void 0)},classAction:function(n){return!!n&&(n=n.toLowerCase(),n.includes("hit_url")?"link":n.includes("hit_post")?"thumb-tack":n.includes("hit_index")?"home cnuvi":n.includes("hit_src")?"search corange homeAction":n.includes("login")?"sign-in cnuvi":n.includes("logout")?"sign-out":n.includes("add_to_cart")?"shopping-cart wcooi":n.includes("remove_to_cart")?"cart-arrow-down wcooi":n.includes("wc_new_order")?"credit-card-alt wcooi":n.includes("coupon")?"ticket wcooi":void 0)},classReferer:function(n){return String.prototype.contains=function(n){return-1!=this.indexOf(n)},n.contains("facebook.com")||n.contains("fb.com")?"fa fa-facebook-official":n.contains("pinterest.com")?"fa fa-pinterest":n.contains("twitter.com")||n.contains("t.co")?"fa fa-twitter":n.contains("youtube.com")?"fa fa-youtube-play":n.contains("linkedin.com")?"fa fa-linkedin-square":n.contains("google.com")?"fa fa-google":n.contains("yahoo.com")?"fa fa-yahoo":n.contains("wikipedia.com")?"fa fa-wikipedia-w":n.contains("instagram.com")?"fa fa-instagram":"fa fa-tag"}}}]).filter("url_path",function(){return function(n){return n?n.replace(/^.*\/\/[^\/]+/,""):n}}).filter("platform_type",function(){return function(n){return 1==n?"Mobile":"Desktop"}}).filter("cut",function(){return function(n,t,e,i){if(!n)return"";if(!(e=parseInt(e,10)))return n;if(n.length<=e)return n;if(n=n.substr(0,e),t){var o=n.lastIndexOf(" ");-1!=o&&("."!=n.charAt(o-1)&&","!=n.charAt(o-1)||(o-=1),n=n.substr(0,o))}return n+(i||" …")}}).filter("secondsToDateTime",[function(){return function(n){return new Date(1970,0,1).setSeconds(n)}}]).filter("unique",function(){return function(n,t){if(!1===t)return n;if((t||angular.isUndefined(t))&&angular.isArray(n)){var e=[],i=function(n){return angular.isObject(n)&&angular.isString(t)?n[t]:n};angular.forEach(n,function(n){for(var t=!1,o=0;o<e.length;o++)if(angular.equals(i(e[o]),i(n))){t=!0;break}t||e.push(n)}),n=e}return n}}).filter("default",[function(){return function(n,t){return n||t}}]).directive("animateOnChange",function(n,t){return function(e,i,o){e.$watch(o.animateOnChange,function(e,o){if(e!=o){var r=e>o?"change-up":"change";n.addClass(i,r).then(function(){t(function(){n.removeClass(i,r)})})}})}}).constant("angularMomentConfig",{})}();