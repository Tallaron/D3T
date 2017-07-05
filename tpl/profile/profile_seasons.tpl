<div class="panel panel-info">
    <div class="panel-heading">Seasons</div>
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th rowspan="2">#</th>
                    <th colspan="2">Paragon</th>
                    <th colspan="2">Kills</th>
                </tr>
                <tr>
                    <th>Normal</th>
                    <th>Hardcore</th>
                    <th>Monsters</th>
                    <th>Elites</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$profile->getSeasons() item=$season}
                <tr data-toggle="collapse" data-target="#s{$season->getId()}">
                    <td>{$season->getId()}</td>
                    <td>{n($season->getParagon())}</td>
                    <td>{n($season->getParagonHardcore())}</td>
                    <td>{n($season->getKilledMonsters())}</td>
                    <td>{n($season->getKilledElites())}</td>
                </tr>
                <tr class="collapse" id="s{$season->getId()}">
                    <td colspan="5" class="season-played">
                        {$obj = $season}
                        {include file="profile/profile_played.tpl"}
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>





                