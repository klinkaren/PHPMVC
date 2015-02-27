<div class='comment-form'>
    <form method=post>
        <input type=hidden name="redirect" value="<?= $this->url->create($key) ?>">
        <input type=hidden name="pageKey" value="<?= $key ?>">
        <fieldset>
            <legend>Kommentera</legend>
            <label>Kommentar:<br><textarea name='content' rows='6' cols='100' ><?= $content ?></textarea></label><br>
            <p><label>Namn: <input type='text' name='name' maxlength="20" value='<?= $name ?>'/></label></p>
            <p><label>Webb: <input type='text' name='web' value='<?= $web ?>'/></label></p>
            <p><label>Epost: <input type='text' name='mail' value='<?= $mail ?>'/></label></p>
            <div class=buttons>
                <input class='btn' type='submit' name='doCreate' value='Comment' onClick="this.form.action = '<?= $this->url->create('comment/add') ?>'"/>
                <input class='btn' type='reset' value='Reset'/>
                <input class='btn' type='submit' name='doRemoveAll' value='Remove all' onClick="this.form.action = '<?= $this->url->create('comment/remove-all') ?>'"/>
            </div>
            <output><?= $output ?></output>
        </fieldset>
    </form>
</div> 