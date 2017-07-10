<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Filter</h3>
    </div>
    <div class="panel-body">

        <div class="col-sm-6">
            <form method="post" action="{BASE_DIR}/ladder/load">
                {include file="ladder/ladder_form_parts/realm.tpl"}
                {include file="ladder/ladder_form_parts/mode.tpl"}
                {include file="ladder/ladder_form_parts/class.tpl"}
                {include file="ladder/ladder_form_parts/minmax.tpl"}
                {include file="ladder/ladder_form_parts/search.tpl"}
            </form>
        </div>
            
        <div class="col-sm-6">
            {include file="ladder/ladder_form_parts/info.tpl"}
        </div>

    </div>
</div>


