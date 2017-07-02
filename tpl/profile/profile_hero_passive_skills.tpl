<div class=" col-sm-12">
    <div class="panel panel-warning">
        <div class="panel-heading">Passive Skills</div>
        <div class="panel-body">
            {foreach from=$profile->getHero()->getPassiveSkills() item=$skill}
                {if $skill != null}
                    <div class="row col-sm-12">
                        <div class="pull-left custom-a-skill"><img src="{$skill->getLargeIconUrl()}" /></div>
                        <div class="pull-left">{$skill->getName()}</div>
                    </div>
                {/if}
            {/foreach}
        </div>
    </div>
</div>