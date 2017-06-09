<div class="form-group clearfix">
    <lable for="realm" class="col-sm-2 control-label">Realm</lable>
    <div class="col-sm-3">
        <select size="1" id="realm" name="realm" class="form-control">
            {foreach from=BNET_REALM_NAME key=$key item=$realm}
                {if isset($ranking)}
                    {if $key == $ranking->getRealm()}
                        <option value="{$key}" selected>{$realm}</option>
                    {else}
                        <option value="{$key}">{$realm}</option>
                    {/if}
                {else}
                    {if $key == RANKING_DEFAULT_REALM}
                        <option value="{$key}" selected>{$realm}</option>
                    {else}
                        <option value="{$key}">{$realm}</option>
                    {/if}
                {/if}
            {/foreach}
        </select>
    </div>
    <div class="col-sm-7"></div>
</div>
