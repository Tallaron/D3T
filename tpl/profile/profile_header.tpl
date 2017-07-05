<div class="page-header">
    <h3>
        {$profile->getBTag()} 
        <small>
            &lt;{$profile->getClan()}&gt;
            <a href="{$settings->get('BLIZZARD_D3_PROFILE_URL', $profile->getRealm())}{$profile->getBTagMinus()}/" target="_blank" class="btn btn-xs btn-primary pull-right">B.Net Profile</a>
        </small>
    </h3>
</div>