<div>

    <form method="post" action="{BASE_DIR}/build/create">

        <div class="form-group clearfix">
            {include file="builds/form_parts/class.tpl" once=true}
            {include file="builds/form_parts/version.tpl" once=true}
        </div>

        <div class="form-group clearfix">
            {include file="builds/form_parts/name.tpl" once=true}
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary pull-right">Ok</button>
            </div>
        </div>

    </form>

</div>