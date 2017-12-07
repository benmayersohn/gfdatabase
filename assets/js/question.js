jQuery(document).ready(function($){
    $('#answer-button').click(
        function(event){
            event.preventDefault();
            $('#answer').slideToggle('slow');
        }
    )
});
  