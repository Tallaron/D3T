<div class="form-group clearfix">
    <lable for="mode" class="col-sm-4 control-label">Mode</lable>
    <div class="col-sm-6">
        <select size="1" id="mode" name="mode" class="form-control">
            {foreach from=$settings->get('BNET_MODE') key=$key item=$mode}
                {if isset($ranking)}
                    {if $key == $ranking->getMode()}
                        <option value="{$key}" selected>{$mode}</option>
                    {else}
                        <option value="{$key}">{$mode}</option>
                    {/if}
                {else}
                    {if $key == $settings->get('RANKING_DEFAULT_SELECT_MODE')}
                        <option value="{$key}" selected>{$mode}</option>
                    {else}
                        <option value="{$key}">{$mode}</option>
                    {/if}
                {/if}
            {/foreach}
        </select>
    </div>
    <div class="col-sm-2">
        {if isset($ranking)}
            <input type="text" id="num" name="num" value="{$ranking->getNum()}" class="form-control">
        {else}
            <input type="text" id="num" name="num" value="{$settings->get('RANKING_DEFAULT_NUM')}" class="form-control">
        {/if}
    </div>
</div>
