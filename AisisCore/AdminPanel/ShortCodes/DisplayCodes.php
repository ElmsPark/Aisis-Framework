<?php
?>

<style type="text/css">
body{
	background:#F1F4F8;
	color:#000000;
	font-size:16px;
	font-family:Arial, Helvetica, sans-serif;
}
h1 {
	color:#4B718B;
	margin-left:50px;
	text-shadow : #6695B0 0 1px 0;
	margin-bottom: 20px;
	border-bottom: inset thin #666;
	line-height: 40px;
	width: 46%;
	font-size: 45px;
}
p{
	margin: 0 auto 0 auto;
	width: 60%;
	font-size:16px;
}
.headerTitle{
	margin-left: 175px;
	margin-top: 40px;
	font-size:36px;
	color:#B38FB6;
}
.wrapper{
	background : #fff;
	margin : 30px 0 30px;
	padding : 20px 35px;
	width : 89%;
	float : left;
	border-radius : 8px;
	box-shadow: 0 1px 3px rgba(0,0,0,.4);
}
.PanelSubTitle {
	width: 50%;
	margin-left: 285px;
	margin-bottom: 45px;
	background:#D5B7CC;
	padding:10px;
	border-right: #846275 15px solid;
	border-top-left-radius:8px;
	border-bottom-left-radius: 8px;
	-webkit-box-shadow: 0 6px 6px -6px black;
	-moz-box-shadow: 0 6px 6px -6px black;
	box-shadow: 0 6px 6px -6px black;
}
.PanelSubTitle p{
	margin-left:50px;
}
.box{
	width: 50%;
	border-top-right-radius: 8px;
	border-bottom-right-radius: 8px;
	padding: 10px;
	margin: 40px auto 40px -35px;
	background:#CCC;
}

.box p{
	text-align:justify;
	font-size:16px;
	color:#687E9F;
}
.image-wrap {
	position : relative;
	display : inline-block;
	max-width : 100%;
	vertical-align : bottom;
}
.image-wrap:after {
	content : ' ';
	width : 100%;
	height : 100%;
	position : absolute;
	top : -1px;
	left : -1px;
	border : 1px solid #1b1b1b;
	border-radius : 7px;
}
.image-wrap img {
	vertical-align : bottom;
	border-radius : 6px;
}
.soft-embossed .image-wrap:after {
	-webkit-box-shadow: inset 0 0 3px rgba(0,0,0,1), inset 0 1px 1px rgba(255,255,255,.5), inset 0 -6px 2px rgba(0,0,0,.6), inset 0 -8px 2px rgba(255,255,255,.3);
	-moz-box-shadow: inset 0 0 3px rgba(0,0,0,1), inset 0 1px 1px rgba(255,255,255,.5), inset 0 -6px 2px rgba(0,0,0,.6), inset 0 -8px 2px rgba(255,255,255,.3);
	box-shadow: inset 0 0 3px rgba(0,0,0,1), inset 0 1px 1px rgba(255,255,255,.5), inset 0 -6px 2px rgba(0,0,0,.6), inset 0 -8px 2px rgba(255,255,255,.3);
}
.center-image{
	margin: 20px auto 20px auto;
	width: 350px;
	height: 350px;
}

</style>

<script type="text/javascript" src="<?php  get_template_directory_uri()?>http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://steamdev.com/snippet/js/jquery.snippet.min.js"></script>
<link href="http://steamdev.com/snippet/css/jquery.snippet.min.css" rel="stylesheet" type="text/css">
<link href="http://steamdev.com/snippet/css/jquery.snippet.min.css" rel="stylesheet" type="text/css">

<script type="text/javascript">
jQuery(document).ready(function($){
	// wrap image with <span class="image-wrap"> for styling
	$('.imgPost img').each(function() {
		var imgClass = $(this).attr('class');
		$(this).wrap('<span class="image-wrap ' + imgClass + '" style="width: auto; height: auto;"/>');
		$(this).removeAttr('class');
	});
	
	//because JS syntax highlighting looks better
	$("pre.js").snippet("javascript",{style:"acid"})
	
	$( "#tabs" ).tabs();
});

</script>

<div id="tabs">
	<ul>
    	<li><a href="#AisisShortCodeInto">Aisis - Short Codes</a></li>
        <li><a href="#ImageCodes">Image Codes</a></li>
    </ul>
    <div id="AisisShortCodeInto">
        <div class="headerTitle">Aisis - Short Codes</div>
        <div class="wrapper">
          <div class="PanelSubTitle">
            <h1>Aisis Codes</h1>
            <p>List of all Aisis codes and how to use them. Make sure you enter them through the HTML side.</p>
          </div>
          <div class="box">
            <strong>Usising Aisis Codes</strong>
            <p>Aisis Codes or Aisis Short Codes can be a perfect way to add functionality where there wasn't any before. 
            For example glossy images or softimages could be used in extremly simple ways. Updating a post or adding an info box was never so easy.</p>
          </div>
          <p>Aisis short codes are a essential way of the writers life and we provide simple and clean ways to insert images, code and other small 
          features that you would have to code with css. The following is an example of short codes and their power.</p>
          <pre class="js">[softimg] img src here [/softimg]</pre>
          <div class="imgPost">
              <div class="soft-embossed center-image">
                <img src="../../Exceptions/ShortCodes/images/bridge.jpg" width="350" height ="350" />
              </div>
          </div>
        </div>
    </div>
    <div id="ImageCodes">
    	Hello
    </div>
</div>


        