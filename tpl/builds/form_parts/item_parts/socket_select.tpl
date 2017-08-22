{for $i=1 to $numSockets}
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3"><small>Socket</small></div>
        <div class="col-sm-9">
            <select size="1" name="items[{$itemType}][socket][]" class="form-control custom-select-untouched">
                <option value="-1">EMPTY</option>
                <option value="0" 
                    {if $build->getInventory()->get($itemType)->getGemAt($i-1) != false 
                        && $build->getInventory()->get($itemType)->getGemAt($i-1)->getId() == 0}selected{/if}>No Socket</option>
                {foreach from=$lists->getGems() item=$gem}
                    <option value="{$gem->getId()}" class="custom-select-{$gem->getType()}" 
                        {if $build->getInventory()->get($itemType)->getGemAt($i-1) != false 
                            && $gem->getId() == $build->getInventory()->get($itemType)->getGemAt($i-1)->getId()}selected{/if}>{$gem->getName()}</option>
                {/foreach}
            </select>
        </div>
    </div>
</div>
{/for}