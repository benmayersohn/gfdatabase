<?php
/*
Template Name: Topics

We provide a list of topics in alphabetical order. 
*/

get_header();

define('SHOW_QUESTION','show-question');
define('TOPIC','chosen-topic');

// Get all topics
$terms = get_terms(array(
    'taxonomy' => 'topic',
    'hide_empty' => false,
));

// Create a table, thumbnail
?>  
    <h2 class="text-center">Topics</h2>
  <table class="table table-bordered table-hover topic-table" style="margin-top:30px;">
    <tbody>
    <?php foreach ($terms as $term){
    $link = get_home_url() . "?" . SHOW_QUESTION . "=0&" . TOPIC . "=" . $term->slug;
    $row_string = "<tr><td><a href=\"" . $link . "\">" . $term->name . "</a></td><td style=\"text-align:left;\">" . $term->description . "</td></tr>";
    echo $row_string;
    }?>
    </tbody>
  </table>

<?php get_footer(); ?>