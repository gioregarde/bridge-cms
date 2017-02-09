$(document).ready(function() {
    var content = ace.edit("content");
    var css = ace.edit("css");
    var js = ace.edit("js");
    var controller = ace.edit("controller");

    content.setTheme("ace/theme/kr_theme");
    css.setTheme("ace/theme/kr_theme");
    js.setTheme("ace/theme/kr_theme");
    controller.setTheme("ace/theme/kr_theme");

    content.getSession().setMode("ace/mode/php");
    css.getSession().setMode("ace/mode/css");
    js.getSession().setMode("ace/mode/javascript");
    controller.getSession().setMode("ace/mode/php");

    $("form").submit(function(event) {
        if (true) { // validate
            $("textarea[name='content']").val(content.getSession().getValue());
            $("textarea[name='css']").val(css.getSession().getValue());
            $("textarea[name='js']").val(js.getSession().getValue());
            $("textarea[name='controller']").val(controller.getSession().getValue());
            return;
        } else {
            // show error
            event.preventDefault();
        }
    });
});
