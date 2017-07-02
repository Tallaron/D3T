<div class="panel panel-info">
    <div class="panel-heading">{$profile->getHero()->getName()}</div>
    <div class="panel-body">
        <div class="col-sm-7">
            {include file="profile/profile_hero_items.tpl"}
            {include file="profile/profile_hero_cube.tpl"}
        </div>
        <div class="col-sm-5">
            {include file="profile/profile_hero_active_skills.tpl"}
            {include file="profile/profile_hero_passive_skills.tpl"}
        </div>
    </div>
</div>

