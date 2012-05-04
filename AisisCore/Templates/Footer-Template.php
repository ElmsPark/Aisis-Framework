<?php
	/**
	 *
	 * ==================== [-DO NOT TOUCH!!!-] =======================
	 *
	 *		This is the footer for the Aisis Theme.
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->Templates
	 * =================================================================
	 */
?>

		</div>
        <footer id="footer">		
           <div class="footerWrapper">     
			   <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer') ) : else : ?>
               <?php endif; ?>	
           </div>
           <div class="afterBlock">
               <?php aisis_default_footer_text(); ?>
           </div>
        </footer>

        <!-- /#footer --> 
        <?php wp_footer();?>
	</body>
</html>