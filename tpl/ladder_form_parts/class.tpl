<div class="form-group clearfix">
    <lable for="class" class="col-sm-2 control-label">Class</lable>
    <div class="col-sm-3">
        <select size="1" id="class" name="class" class="form-control">
            {foreach from=BNET_CLASSES key=$key item=$class}
                {if isset($ranking)}
                    {if $key == $ranking->getClass()}
                        <option value="{$key}" selected>{$class}</option>
                    {else}
                        <option value="{$key}">{$class}</option>
                    {/if}
                {else}
                    {if $key == RANKING_DEFAULT_CLASS}
                        <option value="{$key}" selected>{$class}</option>
                    {else}
                        <option value="{$key}">{$class}</option>
                    {/if}
                {/if}
            {/foreach}
        </select>
    </div>
    <div class="col-sm-7"></div>
</div>
