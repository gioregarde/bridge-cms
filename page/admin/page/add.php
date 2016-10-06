<form action="/admin/page/add" method="post">
    <label class="field-text">
        <span>Name</span>
        <input type="text" name="name"/>
    </label>
    <label class="field-text">
        <span>URL</span>
        <input type="text" name="url"/>
    </label>
    <label class="field-ace">
        <span>Content</span>
        <div class="script-panel" id="content"></div>
        <textarea class="script-textarea" name="content"></textarea>
    </label>
     <label class="field-ace">
        <span>CSS</span>
        <div class="script-panel" id="css"></div>
        <textarea class="script-textarea" name="css"></textarea>
    </label>
     <label class="field-ace">
        <span>JS</span>
        <div class="script-panel" id="js"></div>
        <textarea class="script-textarea" name="js"></textarea>
    </label>

    <input type="submit" name="action" value="Add">
</form>