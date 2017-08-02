$(function() {
    
    $("option").click(function() {
        var cls = $(this).attr("class");
        $(this).parent("select").attr("class", "form-control");
        $(this).parent("select").addClass(cls);
    });
    
    
    
});