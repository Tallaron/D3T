<div class=" col-sm-12">
    <div class="panel panel-warning">
        <div class="panel-heading">Passive Skills</div>
        <div class="panel-body">
            {foreach from=$profile->getHero()->getPassiveSkills() item=$skill}
                <div class="row col-sm-12">
                    <div class="pull-left custom-a-skill"><img src="http://media.blizzard.com/d3/icons/skills/42/{$skill->getIcon()}.png" /></div>
                    <div class="pull-left">{$skill->getName()}</div>
                </div>
            {/foreach}
        </div>
    </div>
</div>