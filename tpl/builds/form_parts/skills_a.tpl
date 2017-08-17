<div class="panel panel-info">
    <div class="panel-heading custom-collapse collapsed" data-toggle="collapse" data-target="#build-skills-a">
        <span>Active Skills</span>
    </div>
    <div id="build-skills-a" class="panel-collapse collapse">
        <div class="panel-body">

            {for $key=1 to 6}
                <div class="form-group clearfix">
                    {include file="builds/form_parts/skill_a_parts/skill.tpl"}
                    {include file="builds/form_parts/skill_a_parts/rune.tpl"}
                </div>
            {/for}

        </div>
    </div>
</div>