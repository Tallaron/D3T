<select size="1" id="cube-{$itemType}" name="cube-{$itemType}" class="form-control custom-select-untouched">
    <option value="-1" selected>EMPTY</option>
    {foreach from=$cube[$itemType] item=$item}
        <option value="{$item->id}" class="custom-select-{$item->quality}">{$item->name}</option>
    {/foreach}
</select>
