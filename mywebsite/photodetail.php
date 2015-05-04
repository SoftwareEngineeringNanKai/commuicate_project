<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Photo Detail</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Portfolio Gallery with jQuery" />
        <meta name="keywords" content="jquery, portfolio, gallery, image gallery, photos, sliding, thumbnails, navigation"/>
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="css/styleforphotodetail.css" type="text/css" media="screen"/>
        <style type="text/css">
			h1.title{
				position:absolute;
				right:20px;
				top:0px;
				font-weight:normal;
				text-transform:uppercase;
				font-size:56px;
				color:#fff;
				background:transparent url(bg.png) repeat top left;
				padding:0px 15px 10px 15px;
			}
			h1.title span{
				font-size:14px;
				display:block;
}
			span.reference{
				font-family:Arial;
				position:fixed;
				right:10px;
				bottom:10px;
				font-size:10px;
			}
			span.reference a{
				color:#333;
				text-transform:uppercase;
				text-decoration:none;
				margin-left:20px;
			}
		</style>
        
        <style type="text/css">
#pg_preview { width: 340px; height: 260px; padding: 5px; border: 1px solid #ccc;position: absolute; top:90px;
	left:250px;}
#pg_preview .small_pic { width: 340px; height: 260px; background: #eee;position:relative;}
#pg_preview .float_layer { width: 50px; height: 50px; border: 1px solid #000; background: #fff; filter: alpha(opacity: 30); opacity: 0.3; position: absolute; top:90px;left:250px; display:none; }
#pg_preview .mark {width:100%; height:100%; position:absolute; z-index:20; left:0px; top:0px; background:red; filter:alpha(opacity:0); opacity:0;}
#pg_preview .big_pic { position: absolute; top:90px;
	left:750px; width:250px; height:250px; overflow:hidden; border:2px solid #CCC; display:none; }
#pg_preview .big_pic img { position:absolute; top: -30px; left: -80px; }
</style>
<script type="text/javascript">
function getByClass(oParent, sClass)
{
 var aEle=oParent.getElementsByTagName('*');
 var aTmp=[];
 var i=0;
 
 for(i=0;i<aEle.length;i++)
 {
  if(aEle[i].className==sClass)
  {
   aTmp.push(aEle[i]);
  }
 }
 
 return aTmp;
}

window.onload=function ()
{
 var oDiv=document.getElementById('pg_preview');
 var oMark=getByClass(oDiv, 'mark')[0];
 var oFloat=getByClass(oDiv, 'float_layer')[0];
 var oBig=getByClass(oDiv, 'big_pic')[0];
 var oSmall=getByClass(oDiv, 'small_pic')[0];
 var oImg=oBig.getElementsByTagName('img')[0];
 oMark.onmouseover=function ()
 {
  oFloat.style.display='block';
  oBig.style.display='block';
 };
 
 oMark.onmouseout=function ()
 {
  oFloat.style.display='none';
  oBig.style.display='none';
 };
 
 oMark.onmousemove=function (ev)
 {
  var oEvent=ev||event;
  
  var l=oEvent.clientX-oDiv.offsetLeft-oSmall.offsetLeft-oFloat.offsetWidth/2;
  var t=oEvent.clientY-oDiv.offsetTop-oSmall.offsetTop-oFloat.offsetHeight/2;
  
  if(l<0)
  {
   l=0;
  }
  else if(l>oMark.offsetWidth-oFloat.offsetWidth)
  {
   l=oMark.offsetWidth-oFloat.offsetWidth;
  }
  
  if(t<0)
  {
   t=0;
  }
  else if(t>oMark.offsetHeight-oFloat.offsetHeight)
  {
   t=oMark.offsetHeight-oFloat.offsetHeight;
  }
  oFloat.style.left=l+'px';
  oFloat.style.top=t+'px';
  var percentX=l/(oMark.offsetWidth-oFloat.offsetWidth);
  var percentY=t/(oMark.offsetHeight-oFloat.offsetHeight);
  oImg.style.left=-percentX*(oImg.offsetWidth-oBig.offsetWidth)+'px';
  oImg.style.top=-percentY*(oImg.offsetHeight-oBig.offsetHeight)+'px';
 };
};

</script>
        
    </head>

    <body>
    
	    <?php include 'blue.php'?>

		<h1 class="title">Portfolio <span>Codrops Tutorial</span></h1>


		<div class="pg_content">
			<div id="pg_title" class="pg_title">
				<h1 style="display:block;top:25px;">Shape Company Website Design</h1>
			</div>

            <div id="pg_preview">
               <div class="small_pic">
                  <span class="mark"></span>
                  <span class="float_layer"></span>
                  <img src="images/zhanghanyun_s.jpg" class="pg_thumb" style="display:block;z-index:1;" alt="images/large/1.jpg"/>
                  </div>
                <div class="big_pic"><img src="images/zhanghanyun.jpg" /></div>
            </div>
            
			<div id="pg_desc1" class="pg_description">
				<div style="display:block;left:250px;">
					<h2>Project Description</h2>
					<p>A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p>
				</div>
			</div>
			<div id="pg_desc2" class="pg_description">
				<div style="display:block;left:250px;">
					<h2>Technologies Used</h2>
					<p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
				</div>
			</div>
		</div>
		<div id="overlay"></div>
		<?php include 'nav.php'?>
		<?php include 'balloon.php'?>
    </body>
</html>