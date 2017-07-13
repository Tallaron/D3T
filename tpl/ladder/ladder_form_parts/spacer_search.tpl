<div class="form-group clearfix">
    <lable class="col-sm-3 control-label">Search</lable>
    <div class="col-sm-7">
        <div class="col-sm-6">
            <div class="checkbox">
                <label><input type="radio" id="search-mark" name="mark" value="1"{if isset($ladder) && $ladder->getSearchMode() != 1}{else} checked{/if}>Mark</label>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="checkbox">
                <label><input type="radio" id="search-filter" name="mark" value="0"{if isset($ladder) && $ladder->getSearchMode() == 0} checked{/if}>Filter</label>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
    </div>    
</div>
