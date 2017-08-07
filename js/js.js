$(function() {
    
    $("option").click(function() {
        changeSelectClass(this);
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
        var target = $(this).parent("select").data("rune");
        $.post(
            BASE_DIR+"/build/rune/"+skillId,
            {},
            function(data) {
                $("#"+target).html(data);
                $("option").click(function() {
                    changeSelectClass(this);
                });
            }
        );
    });
    
    
    
});

function changeSelectClass(obj) {
    var cls = $(obj).attr("class");
    $(obj).parent("select").attr("class", "form-control");
    $(obj).parent("select").addClass(cls);
}