
{foreach from=$randomBuilds item=$build}
    <a href="{BASE_DIR}/build/show/{$build->getId()}" class="random-build-link">
    {include file="builds/content/show/random_build_meta.tpl"}
    </a>
{/foreach}


