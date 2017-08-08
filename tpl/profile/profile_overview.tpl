<div class="row">

    <div class="col-sm-6">

        <div class="panel panel-info">
            <div class="panel-heading">Overview</div>
            <div class="panel-body">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>Clan</td>
                            <td>{$profile->getClan()}</td>
                        </tr>
                        <tr>
                            <td>Last Update</td>
                            <td>{$profile->getLastUpdateFormatted()}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="col-sm-6">

        <div class="panel panel-info">
            <div class="panel-heading">Paragon</div>
            <div class="panel-body">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>Normal</td>
                            <td>{n($profile->getParagon())}</td>
                            <td class="custom-grey-text">{n($profile->getParagonOverall())}</td>
                        </tr>
                        <tr>
                            <td>Hardcore</td>
                            <td>{n($profile->getParagonHardcore())}</td>
                            <td class="custom-grey-text">{n($profile->getParagonHardcoreOverall())}</td>
                        </tr>
                        <tr>
                            <td>Season</td>
                            <td>{n($profile->getParagonSeasonal())}</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Season Hardcore</td>
                            <td>{n($profile->getParagonSeasonalHardcore())}</td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
<div class="row">

    <div class="col-sm-6">

        <div class="panel panel-info">
            <div class="panel-heading">Monsters</div>
            <div class="panel-body">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>Lifetime Kills</td>
                            <td>{n($profile->getLifeTimeKills())}</td>
                        </tr>
                        <tr>
                            <td>Elite Kills</td>
                            <td>{n($profile->getEliteKills())}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="col-sm-6">

        <div class="panel panel-info">
            <div class="panel-heading">Classes</div>
            <div class="panel-body text-center">
                {$obj = $profile}
                {include file="profile/profile_played.tpl"}
            </div>
        </div>

    </div>

</div>             