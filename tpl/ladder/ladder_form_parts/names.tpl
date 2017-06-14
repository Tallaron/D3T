<div class="form-group clearfix">
    <lable for="names" class="col-sm-4 control-label">Search</lable>
    <div class="col-sm-6">
        {if isset($ranking)}
            <input type="text" id="names" name="names" value="{$ranking->getNamesString()}" placeholder="name1; name2; name3; ..." class="form-control">
        {else}
            <input type="text" id="names" name="names" value="" placeholder="name1; name2; name3; ..." class="form-control">
        {/if}
    </div>
    <div class="col-sm-2">
        <button type="submit" class="btn btn-primary pull-right">Ok</button>
    </div>
</div>
