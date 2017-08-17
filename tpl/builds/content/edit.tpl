<div>

    <form method="post" action="{BASE_DIR}/build/save">
        {include file="builds/form_parts/hidden_id.tpl" once=true}

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

        {include file="builds/form_parts/items.tpl" once=true}
        {include file="builds/form_parts/cube.tpl" once=true}
        {include file="builds/form_parts/skills_a.tpl" once=true}
        {include file="builds/form_parts/skills_p.tpl" once=true}
        {include file="builds/form_parts/scope.tpl" once=true}
    </form>

</div>