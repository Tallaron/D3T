<select size="1" id="cube-{$itemType}" name="cube[{$itemType}]" class="form-control custom-select-untouched">
    <option value="-1">EMPTY</option>
    {foreach from=$lists->getCubeItemsByKey($itemType) item=$item}
        <option value="{$item->getId()}" class="custom-select-{$item->getQuality()}"{if $item->getId() == $build->getCube()->getItemAt($itemType)->getId()} selected{/if}>{$item->getName()}</option>
    {/foreach}
</select>
