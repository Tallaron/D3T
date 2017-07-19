{if $fc->showIndex()}
    <html>
        <head>
            <title>D3T</title>
            <link href="{BASE_DIR}/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
            <script src="{BASE_DIR}/js/jquery-3.2.1.min.js" type="text/javascript"></script>
            <script src="{BASE_DIR}/js/bootstrap.min.js" type="text/javascript"></script>
            <link href="{BASE_DIR}/css/css.css" rel="stylesheet" type="text/css"/>
            <script src="{BASE_DIR}/js/js.js" type="text/javascript"></script>

            <link href="{BASE_DIR}/css/tt.css" rel="stylesheet" type="text/css"/>
            <script src="{BASE_DIR}/js/tt.js" type="text/javascript"></script>

            <link href="{BASE_DIR}/css/inventory.css" rel="stylesheet" type="text/css"/>
            <link href="{BASE_DIR}/css/cube.css" rel="stylesheet" type="text/css"/>
            <link href="{BASE_DIR}/css/skills.css" rel="stylesheet" type="text/css"/>
            <link href="{BASE_DIR}/css/profile.css" rel="stylesheet" type="text/css"/>

            <link title="Diablo® III - News" href="/d3/en/feed/news" type="application/atom+xml" rel="alternate" />

            <script src= "http://player.twitch.tv/js/embed/v1.js"></script>
        </head>
        <body>


            <div class="container">
                {include once=true file='nav.tpl'}
                {$fc->run()}
            </div>

        </body>
    </html>
{else}
    {$fc->run()}
{/if}