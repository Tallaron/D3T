$(function() {
    
    $("option").click(function() {
        var cls = $(this).attr("class");
        $(this).parent("select").attr("class", "form-control");
        $(this).parent("select").addClass(cls);
    });
    
    /*
     * Apply CSS of selected options to parent select nodes after loading page
     */
    for(i=0; i<$("option:checked").length; i++) {
        var cls = $($("option:checked").get(i)).attr("class");
        $($("option:checked").get(i)).parent("select").attr("class", "form-control");
        $($("option:checked").get(i)).parent("select").addClass(cls);
    }
    
    
    $("#build-skills-a option").click(function() {
        var skillId = $(this).val();
        $.post(
//            BASE_DIR+"/ajax/get_runes.php",
            BASE_DIR+"/ladder/json/eu/0/0/8/team-4/1/5/1/10000/1",
            {
                skillId: skillId
            },
            function(data) {
                alert(data);
//                $("#"+$(this).parent("select").data("rune")).html(data);
            }
        );
    });
    
    
    
});