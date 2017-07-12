<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <div class="badge">{$settings->get('BNET_REALM_NAME', $ladder->getRealm())}</div>
            <div class="badge">{$settings->get('RANKING_TYPE', $ladder->getSeason())} #{$ladder->getIndex()}</div>
            <div class="badge">{$settings->get('RANKING_MODE', $ladder->getHardcore())}</div>
            <div class="badge">{$settings->get('BNET_CLASSES', $ladder->getClass())}</div>
            <div class="badge">{$ladder->getMin()} - {$ladder->getMax()}</div>
        </h3>
    </div>
    <div class="panel-body">

        <table class="table table-hover ranking-list">
            <thead
                <tr>
                    <th>#</th>
                    <th>Level</th>
                    <th>Class</th>
                    <th>Name</th>
                    <th>Paragon</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
{*                {$ladder->setSmarty(0)}*}
                {$pos = '0'}
                {foreach from=$ladder->getRanks() key=$i item=$rank}
                    {$player = $rank->getPlayer()}
                    <tr{if $rank->isMatch()} class="custom-tr-green"{/if}>
                        {include file="ladder/ladder_list_parts/position.tpl"}
                        {include file="ladder/ladder_list_parts/level.tpl"}
                        {include file="ladder/ladder_list_parts/class.tpl"}
                        {include file="ladder/ladder_list_parts/name.tpl"}
                        {include file="ladder/ladder_list_parts/paragon.tpl"}
                        {include file="ladder/ladder_list_parts/time.tpl"}
                    </tr>
                {/foreach}
            </tbody>
        </table>

    </div>
</div>