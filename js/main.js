/**
 * jQuery.toTop.js v1.1
 * Developed by: MMK Jony
 * Fork on Github: https://github.com/mmkjony/jQuery.toTop
 **/
!function(o){"use strict";o.fn.toTop=function(t){var i=this,e=o(window),s=o("html, body"),n=o.extend({autohide:!0,offset:420,speed:500,position:!0,right:15,bottom:30},t);i.css({cursor:"pointer"}),n.autohide&&i.css("display","none"),n.position&&i.css({position:"fixed",right:n.right,bottom:n.bottom}),i.click(function(){s.animate({scrollTop:0},n.speed)}),e.scroll(function(){var o=e.scrollTop();n.autohide&&(o>n.offset?i.fadeIn(n.speed):i.fadeOut(n.speed))})}}(jQuery);
console.log('\n %c  Cat UI V2.0 情托于物。人情冷暖，世态炎凉。 %c @折影轻梦<https://i.chainwon.com/catui.html> \n\n','color:rgb(255, 242, 242);background:rgb(244, 164, 164);padding:5px 0;border-radius:3px 0 0 3px;', 'color:rgb(244, 164, 164);background:rgb(255, 242, 242);padding:5px 0;border-radius:0 3px 3px 0;');
//other start
$.material.init();
hljs.initHighlightingOnLoad();
$('.btn-top').toTop({
    position: false,
    offset: 700,
    speed: 500,
});
//other end
var MenuIsOpen = false;
$("#menu-btn").click(function() {
    if (MenuIsOpen){
        document.getElementById("menu-btn").className = "fa fa-navicon nav-button btn btn-raised";
        document.getElementById("menu").className = "nav nav-hid";
        MenuIsOpen = false;
    }else{
        document.getElementById("menu-btn").className = "fa fa-close nav-button btn btn-raised";
        document.getElementById("menu").className = "nav nav-appear";
        MenuIsOpen = true;
    }
});
Smilies = {
	dom:function(id) {
		return document.getElementById(id);
	},
	showBox:function () {
		this.dom("OwO").style.display = "block";
	},
	closeBox:function () {
		this.dom("OwO").style.display = "none";
	},
	grin:function (tag) {
		tag = ' '+tag+' ';
		myField = this.dom("textarea");
		document.selection?(myField.focus(),sel = document.selection.createRange(),sel.text = tag,myField.focus()):this.insertTag(tag);
	},
	insertTag:function (tag) {
		myField = Smilies.dom("textarea");
		myField.selectionStart || myField.selectionStart == "0"?(
			startPos = myField.selectionStart,
			endPos = myField.selectionEnd,
			cursorPos = startPos,
			myField.value = myField.value.substring(0,startPos)
				+ tag
				+ myField.value.substring(endPos,myField.value.length),
			cursorPos += tag.length,
			myField.focus(),
			myField.selectionStart = cursorPos,
			myField.selectionEnd = cursorPos
		):(
			myField.value += tag,
			myField.focus()
		);
	}
}