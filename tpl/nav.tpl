<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{BASE_DIR}/home"><span class="glyphicon glyphicon-home"></span></a>
        </div>

        <div class="navbar-form navbar-left">
            <div class="btn-group" role="group" aria-label="...">
                <a href="{BASE_DIR}/ladder" class="btn btn-primary"><small><span class="glyphicon glyphicon-list"></span></small> Ladder</a>
                <a href="{BASE_DIR}/paragon" class="btn btn-primary"><small><span class="glyphicon glyphicon-upload"></span></small> Paragon</a>
                <a href="{BASE_DIR}/profile" class="btn btn-primary"><small><span class="glyphicon glyphicon-user"></span></small> Profile</a>
                <a href="{BASE_DIR}/build" class="btn btn-primary"><small><span class="glyphicon glyphicon-wrench"></span></small> Builds</a>
            </div>
        </div>

        <div class="navbar-form navbar-right">
            <div class="btn-group" role="group" aria-label="...">
                {if $twitchStatus}
                    <a href="{BASE_DIR}/twitch"  class="btn btn-success"><div class="twitch-status">on</div></a>
                {else}
                    <a href="{BASE_DIR}/twitch"  class="btn btn-danger"><div class="twitch-status">off</div></a>
                {/if}
                <a href="{BASE_DIR}/twitch" class="btn btn-default"><small><span class="glyphicon glyphicon-facetime-video"></span></small> Twitch</a>
            </div>
        </div>

    </div>
</nav>        
