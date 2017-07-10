<div class="page-header">
    <h3>
        {$profile->getBTag()} 
        <small>
            {if $profile->getClan() != null}&lt;{$profile->getClan()}&gt;{/if}
            <a href="{$settings->get('BLIZZARD_D3_PROFILE_URL', $profile->getRealm())}{$profile->getBTagMinus()}/" 
               target="_blank" 
               class="btn btn-xs btn-primary pull-right">
                <span class="glyphicon glyphicon-globe"></span> 
                B.Net Profile
            </a>
        </small>
    </h3>
</div>