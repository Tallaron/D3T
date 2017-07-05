<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Filter</h3>
    </div>
    <div class="panel-body">

        <div class="col-sm-6">
            <form method="post" action="{BASE_DIR}/ladder/load">
                {include file="ladder/ladder_form_parts/realm.tpl"}
                {include file="ladder/ladder_form_parts/mode.tpl"}
                {include file="ladder/ladder_form_parts/class.tpl"}
                {include file="ladder/ladder_form_parts/minmax.tpl"}
                {include file="ladder/ladder_form_parts/search.tpl"}
            </form>
        </div>
            <div class="col-sm-6">
                
                <div class="panel panel-info">
                    <div class="panel-heading">Information</div>
                    <div class="panel-body">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td>Realm</td>
                                    <td>Era</td>
                                    <td>Season</td>
                                </tr>
                            </thead>
                            <tbody>
                                {foreach from=$settings->get('BNET_REALM_NAME') key=$key item=$realm}
                                    <tr>
                                        <td>{$realm}</td>
                                        <td>{$settings->get('RANKING_MIN_ERA_INDEX', $key)}-{$settings->get('RANKING_MAX_ERA_INDEX', $key)}</td>
                                        <td>{$settings->get('RANKING_MIN_SEASON_INDEX', $key)}-{$settings->get('RANKING_MAX_SEASON_INDEX', $key)}</td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>

    </div>
</div>

            
