<div class="form-group clearfix">
    <lable for="class" class="col-sm-4 control-label">Class</lable>
    <div class="col-sm-6">
        <select size="1" id="class" name="class" class="form-control">
            {foreach from=$settings->get('BNET_CLASSES') key=$key item=$class}
                {if isset($ranking)}
                    {if $key == $ranking->getClass()}
                        <option value="{$key}" selected>{$class}</option>
                    {else}
                        <option value="{$key}">{$class}</option>
                    {/if}
                {else}
                    {if $key == $settings->get('RANKING_DEFAULT_CLASS')}
                        <option value="{$key}" selected>{$class}</option>
                    {else}
                        <option value="{$key}">{$class}</option>
                    {/if}
                {/if}
            {/foreach}
        </select>
    </div>
    <div class="col-sm-2"></div>
</div>
