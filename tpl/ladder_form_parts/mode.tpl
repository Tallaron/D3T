<div class="form-group clearfix">
    <lable for="mode" class="col-sm-2 control-label">Mode</lable>
    <div class="col-sm-3">
        <select size="1" id="mode" name="mode" class="form-control">
            {foreach from=BNET_MODE key=$key item=$mode}
                {if isset($ranking)}
                    {if $key == $ranking->getMode()}
                        <option value="{$key}" selected>{$mode}</option>
                    {else}
                        <option value="{$key}">{$mode}</option>
                    {/if}
                {else}
                    {if $key == RANKING_DEFAULT_SELECT_MODE}
                        <option value="{$key}" selected>{$mode}</option>
                    {else}
                        <option value="{$key}">{$mode}</option>
                    {/if}
                {/if}
            {/foreach}
        </select>
    </div>
    <div class="col-sm-1">
        {if isset($ranking)}
            <input type="text" id="num" name="num" value="{$ranking->getNum()}" class="form-control">
        {else}
            <input type="text" id="num" name="num" value="{RANKING_DEFAULT_NUM}" class="form-control">
        {/if}
    </div>
    <div class="col-sm-6"></div>
</div>
