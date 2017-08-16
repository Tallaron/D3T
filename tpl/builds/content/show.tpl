{if isset($build)}
    <div class="panel panel-info">
        <div class="panel-heading">
            <strong>{$build->getName()}</strong> - {$build->getClass()->getName()}
        </div>
        <div class="panel-body">
            <div class="col-sm-7">
                {include file="builds/content/show/inventory.tpl"}
                {include file="builds/content/show/cube.tpl"}
            </div>
            <div class="col-sm-5">
                {include file="builds/content/show/active_skills.tpl"}
                {include file="builds/content/show/passive_skills.tpl"}
            </div>
        </div>
    </div>
{else}
    <div class="panel panel-danger">
        <div class="panel-heading"><strong>404 - Build not found!</strong></div>
        <div class="panel-body">
            Possible reasons for this error:<br>
            <ul>
                <li>A wrong or invalid buildId was given.</li>
                <li>Build was deleted and is not longer available.</li>
            </ul>
        </div>
    </div>
{/if}
