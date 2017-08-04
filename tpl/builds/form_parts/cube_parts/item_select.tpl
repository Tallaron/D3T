<select size="1" id="cube-{$itemType}" name="cube[{$itemType}]" class="form-control custom-select-untouched">
    <option value="-1">EMPTY</option>
    {foreach from=$lists->getCubeByKey($itemType) item=$item}
        <option value="{$item->id}" class="custom-select-{$item->quality}"{if $item->id == $cube->get($itemType)} selected{/if}>{$item->name}</option>
    {/foreach}
</select>
