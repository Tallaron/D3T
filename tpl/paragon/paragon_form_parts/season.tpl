<div class="form-group clearfix">
    <lable for="paras" class="col-sm-4 control-label">Season</lable>
    <div class="col-sm-6">
        {if isset($paragon)}
            <input type="text" id="paras" name="paras" value="{$paragon->getSeason()->getLevel()}" class="form-control">
        {else}
            <input type="text" id="paras" name="paras" value="0" class="form-control">
        {/if}
    </div>
    <div class="col-sm-2"></div>
</div>
