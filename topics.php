<?php
/*
Template Name: Topics

We provide a list of topics in alphabetical order. 
*/

get_header();

// Get all topics
$terms = get_terms(array(
    'taxonomy' => 'topic',
    'hide_empty' => true,
));

// Create a table, thumbnail
?>  
<main id="main" class="site-main" role="main">
<div class="row">
        <div class="col-lg-8 col-md-7 middle-panel-rise">
    <h2 class="text-center"><?php echo get_the_title()?></h2><br>
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
</div>

<div class="col-lg-4 col-md-5">
  <?php get_sidebar('footer');?>
</div>
</div>

</main>
<?php get_footer(); ?>