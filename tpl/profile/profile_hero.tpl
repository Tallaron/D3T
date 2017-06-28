<div class="panel panel-info">
    <div class="panel-heading">{$profile->getHero()->getName()}</div>
    <div class="panel-body">
        <div class="col-sm-8">
            {include file="profile/profile_hero_items.tpl"}
            
        </div>
        <div class="col-sm-4">
            {include file="profile/profile_hero_active_skills.tpl"}
            {include file="profile/profile_hero_passive_skills.tpl"}
        </div>
    </div>
</div>

