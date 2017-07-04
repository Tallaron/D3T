{if $profile->getHero() != false}
    <div class="panel panel-info">
        <div class="panel-heading">{$profile->getHero()->getName()} - {$settings->get('BNET_CLASSES', $profile->getHero()->getClass())}</div>
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
{else}
    <div class="panel panel-danger">
        <div class="panel-heading"><strong>404 - Hero not found!</strong></div>
        <div class="panel-body">
            Possible reasons for this error:<br>
            <ul>
                <li>A wrong or invalid heroId was given.</li>
                <li>Hero was deleted and is not longer available.</li>
            </ul>
        </div>
    </div>
{/if}
