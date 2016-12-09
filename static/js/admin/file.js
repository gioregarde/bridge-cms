$(document).ready(function(){
    $("input[type='submit'][value='Delete']").click(function(){
        $("input[name='file']").val($(this).data("item"));
    });
});