<div class="panel panel-info">
    <div class="panel-heading custom-collapse collapsed" data-toggle="collapse" data-target="#build-skills-p">
        <span>Passive Skills</span>
    </div>
    <div id="build-skills-p" class="panel-collapse collapse in">
        <div class="panel-body">

            {for $key=1 to 4}
                <div class="form-group clearfix">
                    {include file="builds/form_parts/skill_p_parts/skill.tpl"}
                    <div class="col-sm-6"></div>
                </div>
            {/for}

        </div>
    </div>
</div>