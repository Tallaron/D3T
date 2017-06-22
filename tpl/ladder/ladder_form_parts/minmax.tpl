<div class="form-group clearfix">
    <lable for="limit" class="col-sm-2 control-label">Positions</lable>
    <div class="col-sm-2">
        {if isset($ladder)}
            <input type="text" id="min" name="min" value="{$ladder->getMin()}" class="form-control">
        {else}
            <input type="text" id="min" name="min" value="{$settings->get('RANKING_DEFAULT_MIN')}" class="form-control">
        {/if}
    </div>
    <div class="col-sm-2 text-center">-</div>
    <div class="col-sm-2">
        {if isset($ladder)}
            <input type="text" id="max" name="max" value="{$ladder->getMax()}" class="form-control">
        {else}
            <input type="text" id="max" name="max" value="{$settings->get('RANKING_DEFAULT_MAX')}" class="form-control">
        {/if}
    </div>
    <div class="col-sm-4">
        
    </div>
</div>
