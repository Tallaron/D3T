<div class="form-group clearfix">
    <lable for="realm" class="col-sm-2 control-label">Realm</lable>
    <div class="col-sm-7">
        <select size="1" id="realm" name="realm" class="form-control">
            {foreach from=$settings->get('BNET_REALM_NAME') key=$key item=$realm}
                {if isset($ladder)}
                    {if $key == $ladder->getRealm()}
                        <option value="{$key}" selected>{$realm}</option>
                    {else}
                        <option value="{$key}">{$realm}</option>
                    {/if}
                {else}
                    {if $key == $settings->get('RANKING_DEFAULT_REALM')}
                        <option value="{$key}" selected>{$realm}</option>
                    {else}
                        <option value="{$key}">{$realm}</option>
                    {/if}
                {/if}
            {/foreach}
        </select>
    </div>
    <div class="col-sm-3"></div>
</div>
