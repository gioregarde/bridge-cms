$(document).ready(function() {
    var content = ace.edit("content");
    var css = ace.edit("css");
    var js = ace.edit("js");
    content.getSession().setMode("ace/mode/html");
    css.getSession().setMode("ace/mode/css");
    js.getSession().setMode("ace/mode/javascript");

    $("form").submit(function(event) {
        if (true) { // validate
            $("textarea[name='content']").val(content.getSession().getValue());
            $("input[name='css']").val(css.getSession().getValue());
            $("input[name='js']").val(js.getSession().getValue());
            return;
        } else {
            // show error
            event.preventDefault();
        }
    });

});
