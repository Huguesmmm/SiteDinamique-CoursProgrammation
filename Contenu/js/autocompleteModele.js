$(function() {
    function description(description){
        jQuery.ajax({

        });
        $("#descriptionAuto").text(description);
    }
    //autocomplete
    $("#auto").autocomplete({
        source: "index.php?action=quelsLangages",
        minLength: 1,
        select: function(event, ui){
            description();
        }
    });
});