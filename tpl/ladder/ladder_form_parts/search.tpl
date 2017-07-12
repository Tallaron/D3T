<div class="form-group clearfix">
    <lable for="search" class="col-sm-2 control-label">Search</lable>
    <div class="col-sm-7">
        {if isset($ladder)}
            <input type="text" id="search" name="search" value="{$ladder->getSearchString()}" placeholder="name1; name2; name3; ..." class="form-control">
        {else}
            <input type="text" id="search" name="search" value="" placeholder="name1; name2; name3; ..." class="form-control">
        {/if}
    </div>
    <div class="col-sm-3">
    </div>
</div>
