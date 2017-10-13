$(function () {

    $("option").click(function () {
        changeSelectClass(this);
    });

    /*
     * Apply CSS of selected options to parent select nodes after loading page
     */
    for (i = 0; i < $("option:checked").length; i++) {
        var cls = $($("option:checked").get(i)).attr("class");
        $($("option:checked").get(i)).parent("select").attr("class", "form-control");
        $($("option:checked").get(i)).parent("select").addClass(cls);
    }


    $("#build-skills-a option").click(function () {
        var skillId = $(this).val();
        var target = $(this).parent("select").data("rune");
        $.post(
                BASE_DIR + "/build/rune/" + skillId,
                {},
                function (data) {
                    $("#" + target).html(data);
                    $("option").click(function () {
                        changeSelectClass(this);
                    });
                }
        );
    });


    $(".d3t-tooltip").hide();

    $(".is-profile .item-title").hover(
            function () {
                loadProfileItemTooltip($(this).parent().data("d3tooltip"));
            },
            function () {
                $(".d3t-tooltip").hide();
            }
    );

    $(".is-profile .gear-slot .socket").hover(
            function () {
                loadProfileGemTooltip($(this).data("d3tooltip"));
            },
            function () {
                $(".d3t-tooltip").hide();
            }
    );

    $(".is-build .item-title").hover(
            function () {
                loadItemTooltip($(this).parent().data("d3tooltip"));
            },
            function () {
                $(".d3t-tooltip").hide();
            }
    );

    $(".is-build .gear-slot .socket").hover(
            function () {
                loadGemTooltip($(this).data("d3tooltip"));
            },
            function () {
                $(".d3t-tooltip").hide();
            }
    );

    $(".cube-slot").hover(
            function () {
                loadCubeItemTooltip($(this).find("a").data("d3tooltip"));
            },
            function () {
                $(".d3t-tooltip").hide();
            }
    );

    $(".a-skill-name, .a-skill-image, .p-skill-name, .p-skill-image").hover(
            function () {
                loadSkillTooltip($(this).parent().data("d3tooltip"));
            },
            function () {
                $(".d3t-tooltip").hide();
            }
    );

    $(".a-skill-rune").hover(
            function () {
                loadRuneTooltip($(this).data("d3tooltip"));
            },
            function () {
                $(".d3t-tooltip").hide();
            }
    );


});


function loadTooltip(type, data) {
    var scroll = getScrollPosition();
    $(".d3t-tooltip").css({top: scroll.y + 50, left: scroll.x + 50});
    $(".d3t-tooltip").html("Loading ...");
    $(".d3t-tooltip").show();
    $.post(
            BASE_DIR + "/ajax/tooltip/" + type,
            {data: data},
            (data) => $(".d3t-tooltip").html(data)
    );
}

function loadProfileItemTooltip(data) {
    loadTooltip("profile-item", data);
}

function loadProfileGemTooltip(data) {
    loadTooltip("profile-gem", data);
}

function loadItemTooltip(data) {
    loadTooltip("item", data);
}

function loadGemTooltip(data) {
    loadTooltip("gem", data);
}

function loadCubeItemTooltip(data) {
    loadTooltip("cube", data);
}

function loadSkillTooltip(data) {
    loadTooltip("skill", data);
}

function loadRuneTooltip(data) {
    loadTooltip("rune", data);
}


function changeSelectClass(obj) {
    var cls = $(obj).attr("class");
    $(obj).parent("select").attr("class", "form-control");
    $(obj).parent("select").addClass(cls);
}



function getScrollPosition() {

    var x = 0;
    var y = 0;

    if (window.pageXOffset || window.pageYOffset) {
        x = window.pageXOffset;
        y = window.pageYOffset;
    } else if (document.body && (document.body.scrollLeft || document.body.scrollTop)) {
        x = document.body.scrollLeft;
        y = document.body.scrollTop;
    } else if (document.documentElement && (document.documentElement.scrollLeft || document.documentElement.scrollTop)) {
        x = document.documentElement.scrollLeft;
        y = document.documentElement.scrollTop;
    }

    return {
        x: x,
        y: y
    };
}