<div class="col-sm-12">
    <div class="panel panel-success">
        <div class="panel-heading">Scope</div>
        <div class="panel-body">

            {foreach from=$settings->get('SCOPE_GROUPS') key=$scopeGroup item=$scopeGroupText}
                <div class="scope-group-text">{$scopeGroupText}</div>
                <div class="scope-group-hr-container"><hr /></div>
                {foreach from=$settings->get('SCOPE_TYPES') key=$scopeType item=$scopeTypeText}
                    {$scopeValue = $build->getScope($scopeGroup, $scopeType)}
                    {include file="builds/content/show/scope.tpl"}
                {/foreach}
            {/foreach}
            
        </div>
    </div>
</div>
