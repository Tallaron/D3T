<div class="form-group clearfix">
    <lable for="limit" class="col-sm-4 control-label">Range Positions</lable>
    <div class="col-sm-2">
        {if isset($ranking)}
            <input type="text" id="min" name="min" value="{$ranking->getMin()}" class="form-control">
        {else}
            <input type="text" id="min" name="min" value="{$settings->get('RANKING_DEFAULT_MIN')}" class="form-control">
        {/if}
    </div>
    <div class="col-sm-2 text-center">-</div>
    <div class="col-sm-2">
        {if isset($ranking)}
            <input type="text" id="max" name="max" value="{$ranking->getMax()}" class="form-control">
        {else}
            <input type="text" id="max" name="max" value="{$settings->get('RANKING_DEFAULT_MAX')}" class="form-control">
        {/if}
    </div>
    <div class="col-sm-2">
        <button type="submit" class="btn btn-primary pull-right">Ok</button>
    </div>
</div>
