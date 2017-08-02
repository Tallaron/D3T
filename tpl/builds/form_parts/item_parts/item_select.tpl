<select size="1" id="{$itemType}" name="{$itemType}[item]" class="form-control custom-select-untouched">
    <option value="-1" selected>EMPTY</option>
    {foreach from=$items[$itemType] item=$item}
        <option value="{$item->id}" class="custom-select-{$item->quality}">[{$item->level}] {$item->name}</option>
    {/foreach}
</select>
