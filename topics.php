<?php
/*
Template Name: Topics

We provide a list of topics in alphabetical order. 
*/

get_header();

define('SHOW_QUESTION','show-question');
define('TOPIC','chosen-topic');
define('FEEDER_LINK',question_feeder_permalink());

// Get all topics
$terms = get_terms(array(
    'taxonomy' => 'topic',
    'hide_empty' => false,
));

// Create a table, thumbnail
?>  

    <h2 class="text-center">Topics</h2><br>
      <div>
  <?php the_content();?>
  </div>

  <table class="table table-bordered table-hover topic-table">
    <thead>
    <tr>
     <th>Topic</th>
     <th>Count</th>
     <th>Description</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($terms as $term){
    $link = FEEDER_LINK . "?" . SHOW_QUESTION . "=0&" . TOPIC . "=" . $term->slug;
    $row_string = "<tr><td id=\"" . $term->slug . "\"><a href=\"" . $link . "\">" . $term->name . "</a></td>" 
    . "<td>" . $term->count . "</td>"
    . "<td style=\"text-align:left;\">" . $term->description . "</td></tr>";
    echo $row_string;
    }?>
    </tbody>
  </table>

<?php get_footer(); ?>