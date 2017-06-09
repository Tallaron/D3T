<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title">Error</h3>
    </div>
    <div class="panel-body">
        <div class="container-fluid">
        <span>{if isset($error)}{$error}{/if}</span>
        {if isset($smarty.session.error_tpl)}
            {include file="`$smarty.session.error_tpl`.tpl"}
        {/if}
        </div>
    </div>
    <div class="panel-footer text-center">
        <a href="{BASE_DIR}/" class="btn btn-primary">Home</a>
    </div>
</div>
