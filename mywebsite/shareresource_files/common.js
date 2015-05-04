function get_rate(aid,rate,num){rate=rate.toString();var s;var g;$("#g").show();if(rate.length>=3){s=10;g=0;$("#g").hide();}else if(rate=="0"){s=0;g=0;}else{s=rate.substr(0,1);g=rate.substr(1,1);}
$("#s").text(s);$("#g").text("."+g);$("#my_rate").html('已有 <b>'+num+'</b> 人评分');$(".big_rate_up").animate({width:(parseInt(s)+parseInt(g)/10)*14,height:26},1000);$(".big_rate span").each(function(){$(this).hover(function(){$(".big_rate_up").width($(this).attr("rate")*14);$("#my_rate").show();$("#my_rate").text('我觉得 “'+$(this).text()+'”');},function(){$("#my_rate").show();$("#my_rate").html('已有 <b>'+num+'</b> 人评分');}).click(function(){var score=$(this).attr("rate");var comment=$(this).text();$myrate=$("#my_rate");$.ajax({type:"POST",url:"http://www.renrencd.com/ajax/score_action.php",data:"aid="+aid+"&score="+score,success:function(msg){if(msg<=0){$("#my_rate").html("<b>您已经评过分了！</b>");}else{$("#my_rate").html('');arr=msg.split(',');get_rate(arr[0],arr[1],arr[2]);$myrate.show();$myrate.html("已评分 “<span>"+comment+"</span>”");}}});})})
$(".big_rate").mouseout(function(){$("#s").text(s);$("#g").text("."+g);$(".big_rate_up").width((parseInt(s)+parseInt(g)/10)*14);});}
function addFavorite(){var sTitle=document.title;var sURL=document.location.href;try{window.external.addFavorite(sURL,sTitle);}catch(e){try{window.sidebar.addPanel(sTitle,sURL,"");}catch(e){alert("加入收藏失败，请使用Ctrl+D进行添加");}}}
function format_bytes(size){var base=Math.log(size)/Math.log(1024);var suffixes=new Array('','kB','MB','GB','TB','PB','EB');return Math.pow(1024,base-Math.floor(base)).toPrecision(3)+suffixes[Math.floor(base)];};$(function(){$("#checkallemule").click(function(){var checkstatus=this.checked;var size=0;$("input[name=selectemule]").each(function(){this.checked=checkstatus;if(this.checked==true){size+=parseInt($(this).attr("filesize"));}});if(size==0){$("#size_emule").text(0);}else{$("#size_emule").text(format_bytes(size));}});$("#reverseemule").click(function(){var size=0;$("#checkallemule").attr("checked",false);$("input[name=selectemule]:checkbox").each(function(){$(this).attr("checked",!$(this).attr("checked"));if(this.checked==true){size+=parseInt($(this).attr("filesize"));}});if(size==0){$("#size_emule").text(0);}else{$("#size_emule").text(format_bytes(size));}});$('input[name=selectemule]').change(function(){var size=0;$("input[name=selectemule]").each(function(){if(this.checked==true){size+=parseInt($(this).attr("filesize"));}});$("#checkallemule").attr("checked",false);$("#size_emule").text(format_bytes(size));if(size==0){$("#size_emule").text(0);}else{$("#size_emule").text(format_bytes(size));}});});function download(str,i,first){var a=document.getElementsByName(str);var n=a.length;try{var ed2k_links='';var ax=new ActiveXObject("IE2EM.IE2EMUrlTaker");var emule_version=ax.GetEmuleVersion();if('e'!=emule_version.substr(0,1)){throw{errorCode:'eMule not Installed.'};}
for(var i=i;i<n;i++){if(a[i].checked){if(ed2k_links==''){ed2k_links=a[i].value;}else{ed2k_links+="\n"+a[i].value;}}}
ax.SendUrl(ed2k_links,'dd',document.location);delete ax;return;}catch(e){}
if(!window.continueDown){for(var i=i;i<n;i++){if(a[i].checked){window.location=a[i].value;if(first)
timeout=6000;else
timeout=500;i++;window.setTimeout("download('"+str+"', "+i+", 0)",timeout);break;}}}else{for(var i=i;i<n;i++){if(a[i].checked){if(first){var k=i;var current_link=a[k].nextSibling;var multi_text='';var tmp_counter=0;var comma='';while(true){if(a[k].checked&&current_link){if(current_link.href){if(current_link.href.indexOf('ed2k')!==0){current_link=current_link.nextSibling;continue;}
if(tmp_counter>7){multi_text+='<br />…………';break;}
var right_link=current_link;tmp_counter++;if(navigator.userAgent.toLowerCase().indexOf("msie")==-1){multi_text+=comma+current_link.text;}else{multi_text+=comma+current_link.innerText;}
comma='<br />';}
current_link=current_link.nextSibling;}else{if(++k>=n){break;}
current_link=a[k].nextSibling;}}
downPopup(right_link,multi_text);}
continueDown(a[i].value);if(first)
timeout=6000;else
timeout=500;i++;window.setTimeout("download('"+str+"', "+i+", 0)",timeout);break;}}}}
function copy(str){var a=document.getElementsByName(str);var n=a.length;var ed2kcopy="";for(var i=0;i<n;i++){if(a[i].checked){ed2kcopy+=a[i].value;ed2kcopy+="\r\n";}}
var MergeResults=document.getElementById("MergeResults");MergeResults.value=ed2kcopy;}
var clip=null;function $z(id){return document.getElementById(id);}
function init(){clip=new ZeroClipboard.Client();clip.setHandCursor(true);clip.addEventListener('load',function(client){});clip.addEventListener('mousedown',function(client){copy('selectemule');});clip.addEventListener('mouseup',function(client){clip.setText($z('MergeResults').value.replace(/([^\r])\n/g,"$1\r\n"));});clip.addEventListener('complete',function(client,text){debugstr("Copied text to clipboard: "+text);});clip.glue('d_clip_button','d_clip_container');}
function copyToClipboard(txt){if(window.clipboardData){window.clipboardData.clearData();window.clipboardData.setData("Text",txt);}else if(navigator.userAgent.indexOf("Opera")!=-1){window.location=txt;}else if(window.netscape){try{netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");}catch(e){alert("被浏览器拒绝！\n请在浏览器地址栏输入'about:config'并回车\n然后将'signed.applets.codebase_principal_support'设置为'true'");}
var clip=Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);if(!clip)
return;var trans=Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);if(!trans)
return;trans.addDataFlavor('text/unicode');var str=new Object();var len=new Object();var str=Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);var copytext=txt;str.data=copytext;trans.setTransferData("text/unicode",str,copytext.length*2);var clipid=Components.interfaces.nsIClipboard;if(!clip)
return false;clip.setData(trans,null,clipid.kGlobalClipboard);}}
function toSubmit(url){var postform=document.getElementById("ed2kForm");if(postform)
{postform.action=url;postform.target="_blank";postform.submit();}}
function save2txtCheck(){copy('selectemule');var MergeResults=document.getElementById("MergeResults");if(MergeResults.value==""){alert('请先选中需要保存的资源');return false;}else{toSubmit('http://www.renrencd.com/app/save2txt.php');}}
function getDateDiff(dateStr){var minute=1000*60;var hour=minute*60;var day=hour*24;var halfamonth=day*15;var month=day*30;var year=month*12;var now=new Date().getTime();var diffValue=now-Date.parse(dateStr.replace(/-/gi,"/"));if(diffValue<0){return dateStr;}
var yearC=diffValue/year;var monthC=diffValue/month;var weekC=diffValue/(7*day);var dayC=diffValue/day;var hourC=diffValue/hour;var minC=diffValue/minute;if(yearC>=1){result=parseInt(yearC)+"年前";}
if(monthC>=1){result=parseInt(monthC)+"个月前";}
else if(weekC>=1){result=parseInt(weekC)+"星期前";}
else if(dayC>=1){result=parseInt(dayC)+"天前";}
else if(hourC>=1){result=parseInt(hourC)+"小时前";}
else if(minC>=30&&minC<60){result="半小时前";}
else if(minC>=1){result=parseInt(minC)+"分钟前";}else
result="刚刚";return result;}
function topsearch(){var wd=$('#wd').val();if(wd==''){alert("关键词不能为空！");return false;}}
$(document).ready(function(){$("#topsearch").submit(function(){var wd=$('#wd').val();if(wd==''){alert('请输入要搜索的内容！');return false;}else{$(this).attr("action","/search-"+wd+".html").submit();}
return false;});$("time").hover(function(){$datetime=$(this).attr("datetime");$text=$(this).text();$(this).text($datetime);},function(){$(this).text($text);});});