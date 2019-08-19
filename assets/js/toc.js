jQuery(function() {
var idcount = 1;
var toc='';
var ht_arr = [];
var a_arr = [];
jQuery("section.article :header",this).each(function(){
this.id = "toc_" + idcount;
idcount++;
if(this.nodeName.toLowerCase() == "h2") {
ht_arr.push(2);
} else if(this.nodeName.toLowerCase() == "h3") {
ht_arr.push(3);
} else if(this.nodeName.toLowerCase() == "h4") {
ht_arr.push(4);
} else if(this.nodeName.toLowerCase() == "h5") {
ht_arr.push(5);
} else if(this.nodeName.toLowerCase() == "h6") {
ht_arr.push(6);
}
var a = '<a href="#' + this.id + '">' + jQuery(this).text() + "<\/a>";
a_arr.push(a);
});
toc += '<ol>';
for(var i=0; i+1<ht_arr.length; ++i){
if(ht_arr[i] == ht_arr[i+1]){
toc += '<li>'+ a_arr[i] + '</li>';
}
else if(ht_arr[i] < ht_arr[i+1]){
toc += '<li>'+ a_arr[i] + '<ol>';
}
else if(ht_arr[i] > ht_arr[i+1]){
toc += '<li>'+ a_arr[i] + '</li>';
var olli_num = ht_arr[i]-ht_arr[i+1];
for(var j=0; j<olli_num; ++j){
toc += '</ol></li>';
}
}
}
//最後の1つと</ol></li>の数合わせ
toc += '<li>'+ a_arr[ht_arr.length-1] + '</li>';
var olli_num = ht_arr[ht_arr.length-1]-2;
for(var j=0; j<olli_num; ++j){
toc += '</ol></li>';
}
toc += '</ol>';
jQuery("#toc").html(toc);
//ページ内リンク#非表示。加速スクロール
jQuery('a[href^=#]').click(function(){
var	speed = 400,
href= jQuery(this).attr("href"),
target = jQuery(href == "#" || href == "" ? 'html' : href),
position = target.offset().top;
jQuery("html, body").animate({scrollTop:position}, speed, "swing");
return false;
});
});
