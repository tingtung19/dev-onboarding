<?php
/**
 * The template for displaying footer.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<footer id="site-footer" class="site-footer" role="contentinfo">
	<?php // footer. ?>
</footer>


<!-- Custom Login/Register/Password Code @ https://digwp.com/2010/12/login-register-password-code/ -->
<!-- jQuery -->

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8">
	$j(document).ready(function() {
		$j(".tab_content_login").hide();
		$j("ul.tabs_login li:first").addClass("active_login").show();
		$j(".tab_content_login:first").show();
		$j("ul.tabs_login li").click(function() {
			$j("ul.tabs_login li").removeClass("active_login");
			$j(this).addClass("active_login");
			$j(".tab_content_login").hide();
			var activeTab = $j(this).find("a").attr("href");
			if ($j.browser.msie) {$j(activeTab).show();}
			else {$j(activeTab).show();}
			return false;
		});
	});
</script>

<!-- Custom Login/Register/Password Code @ https://digwp.com/2010/12/login-register-password-code/ -->