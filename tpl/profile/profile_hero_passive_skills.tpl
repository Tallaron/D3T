<div class=" col-sm-12">
    <div class="panel panel-warning">
        <div class="panel-heading">Passive Skills</div>
        <div class="panel-body">
            {foreach from=$profile->getHero()->getPassiveSkills() item=$skill}
                <div class="well well-sm">{$skill->getName()}</div>
            {/foreach}
        </div>
    </div>
</div>