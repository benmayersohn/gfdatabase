<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <!--<h3 class="text-center question-topic"><?php the_title(); ?></h3>-->
    <div class="question-content">
    <?php the_content(); ?>
    </div>

    <div class="text-center">
    <div class="button-group">
    <?php
    /* Only show buttons if we have a hint/answer */
    $hint = get_post_meta(get_the_ID(), WYSIWYG_META_HINT_KEY, true);
    $answer = get_post_meta(get_the_ID(), WYSIWYG_META_ANSWER_KEY, true);

    if (!empty($hint)) : ?>
        <!-- Hint Modal -->
        <div class="modal fade" id="hintModal" tabindex="-1" role="dialog" aria-labelledby="hintModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h3 style="font-weight:bold;">Pssst...</h3>
            </div>
            <div class="modal-body" style="text-align:left;">
            <?php echo $hint ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>

        <a class="btn btn-warning return-button" id="hint-button" href="#hint-button" data-toggle="modal" data-target="#hintModal">Hint</a>
    <?php endif;

    if (!empty($answer)) : ?>
        <a class="btn btn-danger return-button" id="answer-button" href="#answer-button">Answer</a>
    <?php endif; ?>

    <!-- If we're not on the home page but SHOW_QUESTION is set, we're in a separate feeder -->
    <?php if (is_front_page()) : ?>
    <a class="btn btn-primary return-button" href="<?php get_home_url();?>">Next</a>
    <?php elseif (isset($_GET[SHOW_QUESTION])) :
    	$show_question = filter_input(INPUT_GET, SHOW_QUESTION, FILTER_SANITIZE_STRING);
        if (isset($_GET[TOPIC])) : $topic = filter_input(INPUT_GET, TOPIC, FILTER_SANITIZE_STRING); ?>
        
        <a class="btn btn-primary return-button" href="<?php echo FEEDER_LINK . '?' . SHOW_QUESTION . '=' . $show_question . '&' . TOPIC . '=' . $topic ;?>">Next</a>
        <?php else : ?>
        <a class="btn btn-primary return-button" href="<?php echo FEEDER_LINK . '?' . SHOW_QUESTION . '=' . $show_question ?>">Next</a>
        <?php endif; ?>
    <?php endif; ?>

    <?php
    if (!empty($answer)) : ?>
        <div class="init-hidden answer-content" id="answer">
            <br><hr>
            <div style="text-align:left;">
            <?php echo $answer;?>
            </div>
            <?php if (isset($_GET[SHOW_QUESTION])) : ?>
            <a class="btn btn-default permanent-link return-button" target="_blank" href="<?php the_permalink();?>">Permanent Link</a>
            <?php endif; ?>
            
        </div>
    <?php endif; ?>
    </div>
    </div>
    
</div>