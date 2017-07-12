<div class="form-group clearfix">
    <lable for="paragon" class="col-sm-2 control-label">Paragon</lable>
    <div class="col-sm-3">
        {if isset($ladder)}
            <input type="text" id="minPara" name="minPara" value="{$ladder->getMinPara()}" class="form-control">
        {else}
            <input type="text" id="minPara" name="minPara" value="{$settings->get('RANKING_DEFAULT_MIN_PARAGON')}" class="form-control">
        {/if}
    </div>
    <div class="col-sm-1 text-center">-</div>
    <div class="col-sm-3">
        {if isset($ladder)}
            <input type="text" id="maxPara" name="maxPara" value="{$ladder->getMaxPara()}" class="form-control">
        {else}
            <input type="text" id="maxPara" name="maxPara" value="{$settings->get('RANKING_DEFAULT_MAX_PARAGON')}" class="form-control">
        {/if}
    </div>

    <div class="col-sm-3">
        <button type="submit" class="btn btn-primary pull-right">Ok</button>
    </div>
</div>
