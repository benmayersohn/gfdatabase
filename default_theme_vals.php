<?php
// Default values in customizer 
defined("NAVBAR_BG_DEFAULT") or define("NAVBAR_BG_DEFAULT",'#009cea');
defined("SUBTITLE_BG_DEFAULT") or define("SUBTITLE_BG_DEFAULT",'#009cea');
defined("SUBTITLE_TEXT_DEFAULT") or define("SUBTITLE_TEXT_DEFAULT",
'That\'s <span style="font-weight:bold;color:white;">G</span>eophysical <span style="font-weight:bold;color:white;">F</span>luid <span style="font-weight:bold;color:white;">D</span>ynamics.');
defined("NAVBAR_MOBILE_DEFAULT") or define("NAVBAR_MOBILE_DEFAULT",'#009cea');
defined("NAVBAR_TEXT") or define("NAVBAR_TEXT",'#888888');
defined("NAVBAR_TEXT_ACTIVE") or define("NAVBAR_TEXT_ACTIVE",'#ffffff');
defined("BODY_BACKGROUND") or define("BODY_BACKGROUND",'#ffffff');
defined("BODY_TEXT_COLOR") or define("BODY_TEXT_COLOR",'#000000');
defined("ESS_HEADING") or define("ESS_HEADING",'Brush Up On Your Atmosphere-Ocean Science Fundamentals.');
defined("ESS_DESCRIPTION") or define("ESS_DESCRIPTION",
'This is a database full of questions on topics in geophysical fluid dynamics, or GFD. Good for upper-level undergraduates and graduate students who are studying for quals or need to brush up on the basics. There are also questions on related topics like fluid dynamics, thermodynamics, and numerical modeling.');
defined("ESS_READY") or define("ESS_READY",'Ready?');
defined("FOOTER_TEXT") or define("FOOTER_TEXT",'&copy; Copyright '. (new DateTime())->format("Y") . ' Ben Mayersohn');
defined("FOOTER_TEXT_COLOR") or define("FOOTER_TEXT_COLOR",'#000000');
defined("FOOTER_BG_COLOR") or define("FOOTER_BG_COLOR",'#adadad');

defined("SCROLLUP_BG_COLOR") or define("SCROLLUP_BG_COLOR",'#ffffff');
defined("SCROLLUP_ARROW_COLOR") or define("SCROLLUP_ARROW_COLOR",'#000000');
defined("SCROLLUP_BG_OPACITY") or define("SCROLLUP_BG_OPACITY", 0.8); // Opacity on background color (not available in customizer)

// Blog - featured image
defined("FEATURED_IMG_STYLE") or define('FEATURED_IMG_STYLE', "width:350px;height:233px;border-style:solid;border-width:3px;border-color:black;");

// Common parameters
defined("STYLESHEET_DIR") or define("STYLESHEET_DIR",get_stylesheet_directory_uri());
defined("TEMPLATE_DIR") or define("TEMPLATE_DIR",get_template_directory_uri());

defined('SHOW_QUESTION') or define('SHOW_QUESTION','show-question');
defined('TOPIC') or define('TOPIC','chosen-topic');

