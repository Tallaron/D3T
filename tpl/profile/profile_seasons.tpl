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
                <tr>
                    <td>{$season->getId()}</td>
                    <td>{$season->getParagon()}</td>
                    <td>{$season->getParagonHardcore()}</td>
                    <td>{$season->getKilledMonsters()}</td>
                    <td>{$season->getKilledElites()}</td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>





                