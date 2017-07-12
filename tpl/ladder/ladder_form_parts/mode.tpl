<div class="form-group clearfix">
    <div class="col-sm-2"></div>

    <div class="col-sm-7">
        <div class="col-sm-6">
            <div class="checkbox">
                <input type="hidden" name="season" value="0">
                <label><input type="checkbox" id="season" name="season" value="1"{if isset($ladder) && $ladder->getSeason() == 1} checked{/if}>Season</label>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="checkbox">
                <input type="hidden" name="hardcore" value="0">
                <label><input type="checkbox" id="hardcore" name="hardcore" value="1"{if isset($ladder) && $ladder->getHardcore() == 1} checked{/if}>Hardcore</label>
            </div>
        </div>
    </div>

    <div class="col-sm-3">

        <select size="1" name="index" class="form-control">
            {for $i=1 to 10}
                {if isset($ladder) && $i == $ladder->getIndex()}
                    <option value="{$i}" selected>{$i}</option>
                {elseif !isset($ladder) && $i == $settings->get('RANKING_DEFAULT_INDEX', 'eu')}
                    <option value="{$i}" selected>{$i}</option>
                {else}
                    <option value="{$i}">{$i}</option>
                {/if}
            {/for}
        </select>

    </div>

</div>


