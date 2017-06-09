<div class="form-group clearfix">
    <lable for="limit" class="col-sm-2 control-label">Range Positions</lable>
    <div class="col-sm-1">
        {if isset($ranking)}
            <input type="text" id="min" name="min" value="{$ranking->getMin()}" class="form-control">
        {else}
            <input type="text" id="min" name="min" value="{RANKING_DEFAULT_MIN}" class="form-control">
        {/if}
    </div>
    <div class="col-sm-1 text-center">-</div>
    <div class="col-sm-1">
        {if isset($ranking)}
            <input type="text" id="max" name="max" value="{$ranking->getMax()}" class="form-control">
        {else}
            <input type="text" id="max" name="max" value="{RANKING_DEFAULT_MAX}" class="form-control">
        {/if}
    </div>
    <div class="col-sm-1">
        <button type="submit" class="btn btn-primary pull-right">Ok</button>
    </div>
    <div class="col-sm-6"></div>
</div>
