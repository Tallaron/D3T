<div class="form-group clearfix">
    <lable for="search-clan" class="col-sm-3 control-label">by Clan</lable>
    <div class="col-sm-7">
        {if isset($ladder)}
            <input type="text" id="search-clan" name="search-clan" value="{$ladder->getSearchStringClan()}" placeholder="clan1; clan2; clan3; ..." class="form-control">
        {else}
            <input type="text" id="search-clan" name="search-clan" value="" placeholder="clan1; clan2; clan3; ..." class="form-control">
        {/if}
    </div>
    <div class="col-sm-2">
    </div>
</div>
