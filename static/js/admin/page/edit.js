$(document).ready(function() {

    $("select[name='layoutId']").change(function() {
        var sectionCount = $(this).find(":selected").data("section-count");
        $("select[name='section[]']").each(function() {
            var option = "";
            for (i = 1; i <= sectionCount; i++) {
                if ($(this).data("section") == i) {
                    option += "<option value='" + i + "' selected>" + i + "</option>";
                } else {
                    option += "<option value='" + i + "'>" + i + "</option>";
                }
            }
            $(this).html(option);
        });
    });
    $("select[name='layoutId']").change();

    $("button.content-add").click(function(event){
        $(this).closest("ul.content-list").find("li:nth-last-child(2)").after($("#contentTemplate").html());
        event.preventDefault();
    })

    $("ul.content-list").on("click", "button.content-remove", function(event){
        $(this).closest("li").remove();
        event.preventDefault();
    })

});