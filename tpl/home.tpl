<div class="container-fluid">

    <div class="col-sm-6">
        {if $msg != false}
            {include file="home/message.tpl" once=true}
        {/if}
            {include file="home/season_calendar.tpl" once=true}
    </div>
    
    <div class="col-sm-6">
        {include file="home/blizzard_newsfeed.tpl" once=true}
    </div>








</div>
