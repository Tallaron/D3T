
<div class="row">
<div class="col-sm-12">
    <select size="1" name="sockets[]" class="form-control">
        {foreach from=$settings->get('D3_GEMS') key=$key item=$gem}
            {if $gem['type'] == $gemType || $gem['type'] == 'all'}
                <option value="{$key}">{$gem['name']}</option>
            {/if}
        {/foreach}
    </select>
</div>
</div>