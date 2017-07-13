<div class="form-group clearfix">
    <lable for="search-ctag" class="col-sm-3 control-label">by Clan Tag</lable>
    <div class="col-sm-7">
        {if isset($ladder)}
            <input type="text" id="search-ctag" name="search-ctag" value="{$ladder->getSearchStringClanTag()}" placeholder="tag1; tag2; tag3; ..." class="form-control">
        {else}
            <input type="text" id="search-ctag" name="search-ctag" value="" placeholder="tag1; tag2; tag3; ..." class="form-control">
        {/if}
    </div>
    <div class="col-sm-2">
    </div>
</div>
