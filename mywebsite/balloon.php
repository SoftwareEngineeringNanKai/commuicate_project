<script type="text/javascript" src="js/moveobj.js"> </script>
<script type="text/javascript">

var flyimage1, flyimage2, flyimage3

function pagestart(){

 flyimage1=new Chip("flyimage1",47,68);
 flyimage2=new Chip("flyimage2",47,68);
 flyimage3=new Chip("flyimage3",47,68);


movechip("flyimage1");
movechip("flyimage2");
movechip("flyimage3");

}

if (window.addEventListener)
window.addEventListener("load", pagestart, false)
else if (window.attachEvent)
window.attachEvent("onload", pagestart)
else if (document.getElementById)
window.onload=pagestart

</script>
<DIV ID="flyimage1" STYLE="position:absolute; left: -500px; width:47; height:68;">
<A HREF="http://www.mobanwang.com"><IMG SRC="img/1.gif" BORDER=0></a>
</DIV>

<DIV ID="flyimage2" STYLE="position:absolute; left: -500px; width:47; height:68;">
<A HREF="http://www.mobanwang.com"><IMG SRC="img/2.gif" BORDER=0></a>
</DIV>

<DIV ID="flyimage3" STYLE="position:absolute; left: -500px; width:47; height:68;">
<A HREF="http://www.mobanwang.com"><IMG SRC="img/3.gif" BORDER=0></a>
</DIV>
