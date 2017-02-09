$(document).ready(function(){
    $("input[type='submit'][value='Delete']").click(function(){
        $("input[name='file']").val($(this).data("item"));
    });

    $("input[type='file']").change(function() {
        $(this).closest("div[class='input-group']").find("input[readonly]").val($(this).val());
    });
});