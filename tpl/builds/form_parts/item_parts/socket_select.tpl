
<div class="row">
<div class="col-sm-12">
    <div class="col-sm-3"><small>Socket</small></div>
    <div class="col-sm-9">
        <select size="1" name="items[{$itemType}][socket][]" class="form-control custom-select-untouched">
            <option value="-1">EMPTY</option>
            {foreach from=$lists->getGems() item=$gem}
                <option value="{$gem->getId()}" class="custom-select-{$gem->getType()}">{$gem->getName()}</option>
            {/foreach}
        </select>
    </div>
</div>
</div>