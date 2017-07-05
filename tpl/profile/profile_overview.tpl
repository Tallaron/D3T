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
                        </tr>
                        <tr>
                            <td>Hardcore</td>
                            <td>{n($profile->getParagonHardcore())}</td>
                        </tr>
                        <tr>
                            <td>Season</td>
                            <td>{n($profile->getParagonSeasonal())}</td>
                        </tr>
                        <tr>
                            <td>Season Hardcore</td>
                            <td>{n($profile->getParagonSeasonalHardcore())}</td>
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

                <div class="played-bars">
                    {foreach from=$profile->getPlayed() key=$key item=$played}
                        <div class="played-bar-container" title="{$profile->getPlayedPercentage($key)}%">
                            <div class="played-bar-limiter">
                                <div class="played-bar-bg played-{$key}-bg"></div>
                                <div class="played-bar played-{$key}" style="height: {$profile->getPlayedNormalized($key)}{'%'};"></div>
                            </div>
                            <div class="played-bar-text">{$settings->get('BNET_CLASSES_SHORT', $key)}</div>
                        </div>
                    {/foreach}
                </div>

            </div>
        </div>

    </div>

</div>             