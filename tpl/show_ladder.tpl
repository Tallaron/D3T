{include file="ladder_form.tpl"}

<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-sm-12">Avg. Level: {$ranking->getAverageLevel()}</div>
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <div class="badge">{$settings->get('BNET_REALM_NAME', $ranking->getRealm())}</div>
            <div class="badge">{$settings->get('BNET_MODE', $ranking->getMode())}</div>
            <div class="badge">{$ranking->getNum()}</div>
            <div class="badge">{$settings->get('BNET_CLASSES', $ranking->getClass())}</div>
            <div class="badge">{$ranking->getMin()}-{$ranking->getMax()}</div>
        </h3>
    </div>
    <div class="panel-body">

        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Level</th>
                <th>Name</th>
                <th>Time</th>
            </tr>
            {foreach from=$ranking->getRanksOutput() key=$i item=$rank}
                <tr>
                    <td>{$i+$ranking->getMin()}</td>
                    <td>{$rank->getLevel()}</td>
                    {if $rank->getProfile()}
                        <td><a href="{$rank->getProfile()}/" target="_blank">{$rank->getName()}</a></td>
                        {else}
                        <td><div class="custom-grey-name">{$rank->getName()}</div></td>
                        {/if}
                    <td title="{$rank->getDate()}">{$rank->getTime()}</td>
                </tr>
            {/foreach}
        </table>

    </div>
</div>