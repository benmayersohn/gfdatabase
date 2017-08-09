</div> <!-- end the "container" div -->
<?php include('default_theme_vals.php'); ?>

<hr class="footer-hr">
<footer style="background-color:<?php echo get_theme_mod('essentials_footer_bg',FOOTER_BG_COLOR); ?>;color:<?php echo get_theme_mod('essentials_footer_text_color',FOOTER_TEXT_COLOR); ?>;">
<p><?php echo get_theme_mod('essentials_footer_text',FOOTER_TEXT);?></p>
</footer>

<?php wp_footer();?>
</body>
</html>