<div class="col-sm-12">
    <div class="panel panel-warning">
        <div class="panel-heading">Active Skills</div>
        <div class="panel-body">
            {foreach from=$profile->getHero()->getActiveSkills() item=$skill}
                {if $skill != null}
                    <div class="row col-sm-12">
                        <div class="pull-left custom-a-skill"><img src="{$skill->getLargeIconUrl()}" /></div>
                        <div class="pull-left">
                            <span>{$skill->getName()}</span>
                            <br/>
                            {if $skill->getRune() != null}
                                <span><small>{$skill->getRune()->getName()}</small></span>
                            {/if}
                        </div>
                    </div>
                {/if}
            {/foreach}
        </div>
    </div>
</div>