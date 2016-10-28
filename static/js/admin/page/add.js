$(document).ready(function() {

    $("select[name='layout']").change(function() {
        var sectionCount = $(this).find(":selected").data("section-count");
        var option = "";
        for (i = 1; i <= sectionCount; i++) {
            option += "<option value='" + i + "'>" + i + "</option>";
        }
        $("select[name='section[]']").html(option);
    });

    $("select[name='layout']").change();

    $("button.content-add").click(function(event){
        $(this).closest("ul.content-list").find("li:nth-last-child(2)").after($("#contentTemplate").html());
        event.preventDefault();
    })

    $("ul.content-list").on("click", "button.content-remove", function(event){
        $(this).closest("li").remove();
        event.preventDefault();
    })

});