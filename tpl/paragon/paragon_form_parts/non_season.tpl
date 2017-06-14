<div class="form-group clearfix">
    <lable for="parans" class="col-sm-4 control-label">Non Season</lable>
    <div class="col-sm-6">
        {if isset($paragon)}
            <input type="text" id="parans" name="parans" value="{$paragon->getNonSeason()->getLevel()}" class="form-control">
        {else}
            <input type="text" id="parans" name="parans" value="0" class="form-control">
        {/if}
    </div>
    <div class="col-sm-2"></div>
</div>
