<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<div class="clear"></div>
</div><!-- page -->
<div id="footer">
    <?php
    $footer_widgets = array(
          'news' => 'Footer (News)'
        , 'contact-form' => 'Footer (Contact)'
    );
    foreach ($footer_widgets as $id => $name) {
        if ( !dynamic_sidebar($name) ) {
            echo "<div id={$id} class=\"footer-widget\">Widget empty or not supported: {$name}</div>";
        }
    }
    ?>
    <?php wp_footer(); ?>
<br class="clear" />
</div><!-- footer -->
</div><!-- page-wrapper -->

<script type="text/javascript"> var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www."); document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E")); </script> <script type="text/javascript"> try { var pageTracker = _gat._getTracker("UA-11383476-1"); pageTracker._trackPageview(); } catch(err) {}</script>
</body>
</html>
