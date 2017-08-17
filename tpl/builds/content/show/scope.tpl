<div class="scope-outer">
    <div class="scope"{if $scopeValue > -1} title="{$settings->get('SCOPE_VALUE_TEXT', $scopeValue)}"{/if}>
        <div class="scope-key">{$scopeTypeText}</div>
        <div class="scope-stars">{include file="builds/content/show/scope_stars.tpl"}</div>
        <div style="clear:both"></div>
    </div>
</div>
