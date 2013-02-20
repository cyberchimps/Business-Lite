<?php
/**
* Footer template used by Business.
*
* Authors: Tyler Cunningham, Trent Lapinski
* Copyright: © 2012
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package Business.
* @since 3.0
*/

global $options, $themeslug;

?>

<!-- For sticky footer -->
<div class="push"></div>  
</div>	<!-- End of wrapper -->

<?php if ($options->get($themeslug.'_disable_footer') != "0"):?>	

<div class="footer"> <!-- Footer class for sticky footer -->
	<div id="footer">
     	<div class="container">
     		<div class="row">
    	
	<!-- Begin @business footer hook content-->
		<?php business_footer(); ?>
	<!-- End @business footer hook content-->
	
	<?php endif;?>
	

		</div><!--end footer_wrap-->
	</div><!--end footer-->
</div> 

<?php if ($options->get($themeslug.'_disable_afterfooter') != "0"):?>

	<div id="afterfooter">
		<div id="afterfooterwrap">
		<div class="container">
		<div class="row">	
		<!-- Begin @business afterfooter hook content-->
			<?php business_secondary_footer(); ?>
		<!-- End @business afterfooter hook content-->
		</div>  <!--end afterfooterwrap-->	
	</div> <!--end afterfooter-->	
		</div> 	
		</div>
	<?php endif;?>
</div>  <!--End of footer class for sticky footer -->

<?php wp_footer(); ?>

</body>

</html>