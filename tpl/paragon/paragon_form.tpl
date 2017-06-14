<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Paragon Calculator</h3>
    </div>
    <div class="panel-body">

        <div class="col-sm-6">
            <form method="post" action="{BASE_DIR}/paragon/calc">
                {include file="paragon/paragon_form_parts/non_season.tpl"}
                {include file="paragon/paragon_form_parts/season.tpl"}
                {include file="paragon/paragon_form_parts/submit_btn.tpl"}
            </form>
        </div>
            <div class="col-sm-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">About</h3>
                    </div>
                    <div class="panel-body">Just fill in your non seasonal and seasonal Paragon level, then hit 'Calculate' to combine both and see what overall Paragon you have.</div>
                </div>
            </div>

    </div>
</div>


