<lable for="class" class="col-sm-2 control-label">Class</lable>
<div class="col-sm-4">
    <select size="1" id="class" name="class" class="form-control">
        {foreach from=$settings->get('BNET_CLASSES_LONG') key=$key item=$class}
            <option value="{$key}">{$class}</option>
        {/foreach}
    </select>
</div>