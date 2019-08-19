jQuery(function(){
var topBtn=jQuery('#page-top-button');
topBtn.hide();
jQuery(window).scroll(function(){
	if(jQuery(this).scrollTop()>80){
	topBtn.fadeIn();
	}else{
	topBtn.fadeOut();
	}
});
topBtn.click(function(){
	jQuery('body,html').animate({
	scrollTop: 0},500);
	return false;
});
});