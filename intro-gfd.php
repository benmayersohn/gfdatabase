<?php
include('default_theme_vals.php');

if (!isset($_GET[TOPIC])){
    $html = "<div>
        <h2 class=\"text-center\">" . get_theme_mod('essentials_heading',ESS_HEADING) . "</h2>
        <br>
        <p>" . get_theme_mod('essentials_desc',ESS_DESCRIPTION) . " </p>
        <h3 class=\"text-center\"><strong>" . get_theme_mod('essentials_ready',ESS_READY) . "</strong></h3>
        </div>";
    $link = get_home_url() . "?" . SHOW_QUESTION . "=1";
}
else{
    $html = "<div>
        <h2 class=\"text-center\">Topic Chosen: " . get_term_by('slug',$_GET[TOPIC],'topic')->name . "</h2>
        <br>
        <h3 class=\"text-center\"><strong>" . get_theme_mod('essentials_ready',ESS_READY) . "</strong></h3>
        <br>
        </div>";
    $link = get_home_url() . "?" . SHOW_QUESTION . "=1&" . TOPIC . "=" . $_GET[TOPIC];
}
echo $html . "<div class=\"text-center\"><a class=\"btn btn-primary return-button\" href=\"" . $link . "\">Begin</a></div>";
?>