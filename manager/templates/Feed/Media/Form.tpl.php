<h1>Add media</h1>
<form action="?view=feed" method="post" name="media" id="media" enctype="multipart/form-data">
    <div style="display: none;">
        <input id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" type="hidden" value="67108864" />
    </div>

    <fieldset id="feed_header">
        <legend>Existing Media</legend>
        <ol>
            <li><label for="url" class="element">URL</label><div class="element"><input id="url" name="url" type="text" size="60" /></div></li>
            <li><label for="title" class="element">Title</label><div class="element"><input id="title" name="title" type="text" size="60" /></div></li>
            <li>
                <label for="description" class="element">Description</label>
                <div class="element"><textarea id="description" name="description" rows="5" cols="60"></textarea></div>
            </li>

            <li><label for="submit" class="element">&nbsp;</label><div class="element"><input id="submit" name="submit" value="Save" type="submit" /></div></li>
        </ol>
    </fieldset>
    <fieldset id="feed_header">
        <legend>Upload new media</legend>
        <ol>
            <li><label for="file_upload" class="element">File</label><div class="element"><input id="file_upload" name="file_upload" type="file" /></div></li>
            <li><label for="qf_4f7d51" class="element">What would you like to do with this file?</label><div class="element"><input name="upload_target" type="radio" id="qf_4f7d51" /><label for="qf_4f7d51">Encode it</label></div></li>

            <li><label for="qf_a38a81" class="element">&nbsp;</label><div class="element"><input name="upload_target" type="radio" id="qf_a38a81" /><label for="qf_a38a81">Go Live</label></div></li>
            <li><label for="submit" class="element">&nbsp;</label><div class="element"><input id="submit" name="submit" value="Save" type="submit" /></div></li>
        </ol>
    </fieldset>
</form>