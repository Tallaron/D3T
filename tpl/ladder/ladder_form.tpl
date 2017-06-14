
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
                    {include file="ladder/ladder_form_parts/names.tpl"}
                </form>
            </div>
                <div class="col-sm-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-title">Warning: Long loading times</h3>
                        </div>
                        <div class="panel-body">Rankings are parsed from Blizzard Battle.Net Website. Sometimes these sites have long loading times. This may cause timeouts.</div>
                    </div>
                </div>

        </div>
    </div>

            
