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
