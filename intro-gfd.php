<?php
include('default_theme_vals.php');

$feeder_permalink = FEEDER_LINK;
$ready_string = "<h3 class=\"text-center\"><strong>" . get_theme_mod('essentials_ready',ESS_READY) . "</strong></h3>";

if (!isset($_GET[TOPIC])){
    $feeder_permalink .= "?" . SHOW_QUESTION . "=1";
    echo "<div>";
    the_content();
    echo "</div>" . $ready_string;
}
else{
    $html = "<div>
        <h2 class=\"text-center\">Topic Chosen: " . get_term_by('slug',$_GET[TOPIC],'topic')->name . "</h2>
        " . $ready_string . "</div>";
    $feeder_permalink .= "?" . SHOW_QUESTION . "=1&" . TOPIC . "=" . $_GET[TOPIC];
}
echo $html . "<div class=\"text-center\"><a class=\"btn btn-primary return-button\" href=\"" . $feeder_permalink . "\">Begin</a></div>";