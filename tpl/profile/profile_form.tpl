<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Load Profile</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="{BASE_DIR}/profile/load">
            <div class="form-group clearfix">
                <div class="col-sm-2">
                    <select size="1" name="realm" class="form-control">
                        {foreach from=$settings->get('BNET_REALM_NAME') key=$key item=$realm}
                            {if isset($profile)}
                                {if $key == $profile->getRealm()}
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
                <div class="col-sm-2">
                    {if isset($profile)}
                        <input type="text" id="btag" name="btag" value="{$profile->getBTag()}" class="form-control">
                    {else}
                        <input type="text" id="btag" name="btag" value="" class="form-control" placeholder="Battle#Tag">
                    {/if}
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Load</button>
                </div>
                </div>
            </div>
            <div class="col-sm-6"></div>
        </form>
    </div>
</div>


