
<div class="panel-group" id="accordion">

    <div class="panel custom-profile-panel">
        <div class="collapse in" id="profile-overview">{include file="profile/profile_overview.tpl" once=true}</div>
    </div>    

    <div class="panel custom-profile-panel">
        <div class="collapse" id="profile-seasons">{include file="profile/profile_seasons.tpl" once=true}</div>
    </div>    

    {foreach from=$profile->getHeroes() item=$hero}
        <div class="panel custom-profile-panel">
            <div class="collapse" id="hero{$hero->getId()}">{include file="profile/profile_hero.tpl"}</div>
        </div>
    {/foreach}


</div>