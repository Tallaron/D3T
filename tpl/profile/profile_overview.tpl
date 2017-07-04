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
                    <td>{$profile->getParagon()}</td>
                </tr>
                <tr>
                    <td>Hardcore</td>
                    <td>{$profile->getParagonHardcore()}</td>
                </tr>
                <tr>
                    <td>Season</td>
                    <td>{$profile->getParagonSeasonal()}</td>
                </tr>
                <tr>
                    <td>Season Hardcore</td>
                    <td>{$profile->getParagonSeasonalHardcore()}</td>
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
                    <td>{number_format($profile->getLifeTimeKills(),0,'.',',')}</td>
                </tr>
                <tr>
                    <td>Elite Kills</td>
                    <td>{number_format($profile->getEliteKills(),0,'.',',')}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
    
</div>


<div class="col-sm-6">

<div class="panel panel-info">
    <div class="panel-heading">Classes</div>
    <div class="panel-body">
        #CLASSES#
    </div>
</div>
    
</div>




</div>             