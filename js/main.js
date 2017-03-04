/**
 * jQuery.toTop.js v1.1
 * Developed by: MMK Jony
 * Fork on Github: https://github.com/mmkjony/jQuery.toTop
 **/
!function(o){"use strict";o.fn.toTop=function(t){var i=this,e=o(window),s=o("html, body"),n=o.extend({autohide:!0,offset:420,speed:500,position:!0,right:15,bottom:30},t);i.css({cursor:"pointer"}),n.autohide&&i.css("display","none"),n.position&&i.css({position:"fixed",right:n.right,bottom:n.bottom}),i.click(function(){s.animate({scrollTop:0},n.speed)}),e.scroll(function(){var o=e.scrollTop();n.autohide&&(o>n.offset?i.fadeIn(n.speed):i.fadeOut(n.speed))})}}(jQuery);
console.log('\n %c  Cat UI V1.2 情托于物。人情冷暖，世态炎凉。 %c @折影轻梦<https://i.chainwon.com/catui.html> \n\n','color:rgb(255, 242, 242);background:rgb(244, 164, 164);padding:5px 0;border-radius:3px 0 0 3px;', 'color:rgb(244, 164, 164);background:rgb(255, 242, 242);padding:5px 0;border-radius:0 3px 3px 0;');
//float start
var antime = 500;
$(".float-window").click(function() {
    $(this).fadeOut(antime);
});
$("#qrcode-b").click(function() {
    $("#qrcode").fadeIn(antime);
});
$("#support-b").click(function() {
    $("#support").fadeIn(antime);
});
//float end
