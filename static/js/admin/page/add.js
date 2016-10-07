$(document).ready(function() {
    var content = ace.edit("content");
    var css = ace.edit("css");
    var js = ace.edit("js");
    var controller = ace.edit("controller");

    content.getSession().setMode("ace/mode/html");
    css.getSession().setMode("ace/mode/css");
    js.getSession().setMode("ace/mode/javascript");
    controller.getSession().setMode("ace/mode/php");

    $("form").submit(function(event) {
        if (true) { // validate
            $("textarea[name='content']").val(content.getSession().getValue());
            $("textarea[name='css']").val(css.getSession().getValue());
            $("textarea[name='js']").val(js.getSession().getValue());
            $("textarea[name='controller']").val(js.getSession().getValue());
            return;
        } else {
            // show error
            event.preventDefault();
        }
    });

});
