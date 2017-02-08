$(document).ready(function() {
    var css = ace.edit("css");
    var layout = ace.edit("layout");

    css.setTheme("ace/theme/kr_theme");
    layout.setTheme("ace/theme/kr_theme");

    css.getSession().setMode("ace/mode/css");
    layout.getSession().setMode("ace/mode/php");

    $("form").submit(function(event) {
        if (true) { // validate
            $("textarea[name='css']").val(css.getSession().getValue());
            $("textarea[name='layout']").val(layout.getSession().getValue());
            return;
        } else {
            // show error
            event.preventDefault();
        }
    });
});
