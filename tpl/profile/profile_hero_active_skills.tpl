<div class=" col-sm-12">
    <div class="panel panel-warning">
        <div class="panel-heading">Active Skills</div>
        <div class="panel-body">
            {foreach from=$profile->getHero()->getActiveSkills() item=$skill}
                <div class="well well-sm warning">{$skill->getName()}<br><small>{$skill->getRune()->getName()}</small></div>
            {/foreach}
        </div>
    </div>
</div>