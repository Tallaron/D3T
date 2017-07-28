<select size="1" id="{$itemType}" name="{$itemType}" class="form-control">
    <option value="-1" selected>EMPTY</option>
    {foreach from=$items[$itemType] item=$item}
        <option value="{$item->getId()}" class="{if $item->getSet()}custom-select-set{else}custom-select-legendary{/if}">{$item->getSlug()}</option>
    {/foreach}
</select>
