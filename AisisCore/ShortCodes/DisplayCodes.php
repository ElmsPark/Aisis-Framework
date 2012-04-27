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
	margin-left: 125px;
	margin-top: 40px;
	font-size:36px;
	color:#B38FB6;
}
.wrapper{
	background : #fff;
	margin : 30px 0 30px;
	padding : 20px 35px;
	width : 89%;
	border-radius : 8px;
	box-shadow: 0 1px 3px rgba(0,0,0,.4);
}
.PanelSubTitle {
	width: 65%;
	margin-left: 185px;
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
	width: 75%;
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
	width: 80%;
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
#tabs{
	width:100%;
	border: none;
	background:#F1F4F8;
	
}


</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/lib/Javascript/plugins/jquery.snipit.js' ?>"></script>
<link href="<?php echo get_template_directory_uri() . '/lib/Javascript/plugins/pluginCss/snipit.css' ?>" rel="stylesheet" type="text/css">
<link href="<?php echo get_template_directory_uri() . '/AisisCore/AdminPanel/Modules/Required/jquery-ui-1.8.19.custom.css' ?>" rel="stylesheet" type="text/css">

<script type="text/javascript">
jQuery(document).ready(function($){
	// wrap image with <span class="image-wrap"> for styling
	$('.imgPost img').each(function() {
		var imgClass = $(this).attr('class');
		$(this).wrap('<span class="image-wrap ' + imgClass + '" style="width: auto; height: auto;"/>');
		$(this).removeAttr('class');
	});
	
	//because JS syntax highlighting looks better
	$("pre.js").snippet("javascript",{style:"acid", showNum:false})
	
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
            <p>Aisis Short codes are a dynamic and interesting addition to any post. They are super easy to make and super easy to implement.</p>
            <div class="box">
                <p> <strong>Usising Aisis Codes</strong><br  /><br />
                Using aisis short codes helps you write better articles, get more done with out having to 
                worry about how to implement images ina specific way. The work is done for you.</p>
            </div>
            <p>Aisis short codes are a essential way of the writers life and we provide simple and clean ways to insert images, code and other small 
            features that you would have to code with css. The following is an example of short codes and their power.</p>
            <pre class="js">[softimg] img src here [/softimg]</pre>
            <div class="imgPost">
            <div class="soft-embossed center-image">
                <img src="<?php echo get_template_directory_uri() . '/AisisCore/ShortCodes/images/bridge.jpg' ?>" width="350" height ="350" />
            </div>
            </div>
        </div>
    </div>
    <div id="ImageCodes">
    	Hello
    </div>
</div>



        