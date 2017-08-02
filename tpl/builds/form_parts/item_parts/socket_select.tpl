
<div class="row">
<div class="col-sm-12">
    <div class="col-sm-3"><small>Socket</small></div>
    <div class="col-sm-9">
        <select size="1" name="{$itemType}[socket][]" class="form-control custom-select-untouched">
{*        <select size="1" name="sockets[]" class="form-control custom-select-untouched">*}
            <option value="-1">EMPTY</option>
            {foreach from=$gems item=$gem}
                <option value="{$gem->id}" class="custom-select-{$gem->type}">{$gem->name}</option>
            {/foreach}
        </select>
    </div>
</div>
</div>