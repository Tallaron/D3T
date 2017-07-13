<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Filter</h3>
    </div>
    <div class="panel-body">

        <form method="post" action="{BASE_DIR}/ladder/load">
            <div class="col-sm-6">
                {include file="ladder/ladder_form_parts/realm.tpl"}
                {include file="ladder/ladder_form_parts/mode.tpl"}
                {include file="ladder/ladder_form_parts/class.tpl"}
                {include file="ladder/ladder_form_parts/minmax.tpl"}
                {include file="ladder/ladder_form_parts/paragon.tpl"}
            </div>
            
            <div class="col-sm-6">
                {include file="ladder/ladder_form_parts/spacer_search.tpl"}
                {include file="ladder/ladder_form_parts/search_name.tpl"}
                {include file="ladder/ladder_form_parts/search_clan_tag.tpl"}
                {include file="ladder/ladder_form_parts/search_clan_name.tpl"}
            </div>
        </form>

    </div>
</div>


