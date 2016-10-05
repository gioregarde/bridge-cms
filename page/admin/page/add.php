<form action="/admin/page/add" method="post">
    <label>
        <span>Name:</span>
        <input type="text" name="name"/>
    </label>
    <label>
        <span>URL:</span>
        <input type="text" name="url"/>
    </label>
    <label>
        <span>Content:</span>
        <div class="script-panel" id="content"></div>
        <textarea class="script-textarea" name="content"></textarea>
    </label>
     <label>
        <span>CSS:</span>
        <div class="script-panel" id="css"></div>
        <textarea class="script-textarea" name="css"></textarea>
    </label>
     <label>
        <span>JS:</span>
        <div class="script-panel" id="js"></div>
        <textarea class="script-textarea" name="js"></textarea>
    </label>

    <input type="submit" name="action" value="Add">
</form>