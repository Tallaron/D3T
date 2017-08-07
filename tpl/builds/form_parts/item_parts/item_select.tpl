<select size="1" id="{$itemType}" name="items[{$itemType}][item]" class="form-control custom-select-untouched">
    <option value="-1">EMPTY</option>
    {foreach from=$lists->getItemsByKey($itemType) item=$item}
        <option value="{$item->getId()}" class="custom-select-{$item->getQuality()}"{if $item->getId() == $inventory->get($itemType)->getItemId()} selected{/if}>[{$item->getLevel()}] {$item->getName()}</option>
    {/foreach}
</select>
