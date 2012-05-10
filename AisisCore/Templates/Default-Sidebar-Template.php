<?php

	/**
	 *
	 * ==================== [-DO NOT TOUCH!!!-] =======================
	 *
	 *		This is the default Sidebar laoded when your not using
	 *		any side bar widgets in WordPress. Note the notice
	 *		at the top of the side bar.
	 *
	 *		This side bar is not a fully functioning side bar.
	 *		It is meant more for example purposes then anything.
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->Templates
	 * =================================================================
	 */
   
   ?>
  		<div class="notice">
        	It seems you are using a fall back default side bar. Please
            consider adding widgets to your sidebar or use the lib/custom/Templates
            folder to create your own side bar. Please see the Aisis Doc.
        </div>
        <br />
		<section class="widget">
			<h4 class="widgettitle">Example Sidebar</h4>
			<ul>
				<li><a href="<?php echo WPINC ?>/media.php?type=image&amp;TB_iframe=true" title="add a caption to title attribute / or leave blank" class="thickbox">Example 1</a>   (3)</li>
				<li><a href="#">Design</a> (23)</li>
				<li><a href="#">Design </a>(18)</li>
			</ul>
		</section>
		<!-- /.widget -->

		<section class="widget clearfix">
			<h4 class="widgettitle">Example Flickr</h4>
			<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=8.&display=latest&size=s&layout=x&source=user&user=52839779@N02">
            </script> 
		</section>
		<!-- /.widget -->
        
        <section class="widget">
			<h4 class="widgettitle">Example Pop Up Links</h4>
            <p>Click the following to see "Android like" notifications!</p>
            <ul>
                <li><a href="javascript:notice_one();">Notice One</a></li>
                <li><a href="javascript:notice_two();">Notice two</a></li>
                <li><a href="javascript:notice_three();">Notice three</a></li>
            </ul>
		</section>
        
        <section class="widget">
			<h4 class="widgettitle">Example Email Subscription</h4>
            <div class="formLayout">
            	<p>Subscribe now!!</p>
                <form>
                    <label>Email:</label> <input type="text" />
                    <input type="submit" value="submit" />
                </form>
            </div>
		</section>
        
   
   <?php

?>