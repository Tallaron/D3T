<div class="panel panel-info">
    <div class="panel-heading custom-collapse collapsed" data-toggle="collapse" data-target="#build-items">
        <span>Items</span>
    </div>
    <div id="build-items" class="panel-collapse collapse">
        <div class="panel-body">

            <div class="form-group clearfix">
                {include file="builds/form_parts/item_parts/head.tpl" once=true}
                {include file="builds/form_parts/item_parts/mainHand.tpl" once=true}
            </div>

            <div class="form-group clearfix">
                {include file="builds/form_parts/item_parts/torso.tpl" once=true}
                {include file="builds/form_parts/item_parts/offHand.tpl" once=true}
            </div>

            <div class="form-group clearfix">
                {include file="builds/form_parts/item_parts/waist.tpl" once=true}
                <div class="col-sm-6"></div>
            </div>

            <div class="form-group clearfix">
                {include file="builds/form_parts/item_parts/legs.tpl" once=true}
                {include file="builds/form_parts/item_parts/neck.tpl" once=true}
            </div>

            <div class="form-group clearfix">
                {include file="builds/form_parts/item_parts/feet.tpl" once=true}
                {include file="builds/form_parts/item_parts/rightFinger.tpl" once=true}
            </div>

            <div class="form-group clearfix">
                {include file="builds/form_parts/item_parts/shoulders.tpl" once=true}
                {include file="builds/form_parts/item_parts/leftFinger.tpl" once=true}
            </div>

            <div class="form-group clearfix">
                {include file="builds/form_parts/item_parts/hands.tpl" once=true}
                <div class="col-sm-6"></div>
            </div>

            <div class="form-group clearfix">
                {include file="builds/form_parts/item_parts/bracers.tpl" once=true}
                <div class="col-sm-6"></div>
            </div>

        </div>
    </div>
</div>
