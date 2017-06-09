<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Filter</h3>
    </div>
    <div class="panel-body">

        <form method="post" action="{BASE_DIR}/ladder/load">
            {include file="ladder_form_parts/realm.tpl"}
            {include file="ladder_form_parts/mode.tpl"}
            {include file="ladder_form_parts/class.tpl"}
            {include file="ladder_form_parts/minmax.tpl"}
        </form>

    </div>
</div>
