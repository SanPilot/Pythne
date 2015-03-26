function escapeHtml(text) {
    var map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };

    return text.replace(/[&<>"']/g, function(m) { return map[m]; });
}
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
var lastOverride = false;
$(document).ready(function() {
    var loadingicon = new Image();
    loadingicon.src = "/static/ui/LoadingIcon.png";
    $("#logo").on("click", function() {
        $("#searchBar").focus();
        revertSearch();	
    });
    $(document).on("click", function(event) {
        if (!$(event.target).closest('#bar').length) {
            $("#searchBar").css("width","448px");
            $("#bar").css("width","568px");
        }
    });
    if(!!getParameterByName("q")) {
        $("#searchBar").val(getParameterByName("q"));
        lastOverride = true;
        search(getParameterByName("q"));
    }
    $("#searchBar").on("focus", function() {
        $("#bar").css("width","670px");
        $("#searchBar").css("width","550px");
    });
    $("#cover").css("opacity","0");
    setTimeout(function() {
        $("#cover").css("display","none");
    }, 1200);
});
function removeResults() {
    $("#time").html("");
    $("#resultList").html("");
}
function prepSearch() {
    removeResults();
    $("#wrapper").css("margin","2% auto 0px 2%");
    $("body").css("background-color","#F2F2F2");
}
function revertSearch() {
    autolast = "";
    removeResults();
    $("#searchBar").val("");
    $("#resultList").html("");
    $("#wrapper").css("margin","7% auto 0px 10%");
    $("body").css("background-color","#DDD");
    document.title = "Pythne";
    window.history.pushState("", "", "/");
}
function drawResults (query, response, resTime) {
    $("#time").html("Found the following results for <b>"+escapeHtml(query)+"</b> in <b>"+resTime+"</b> seconds:");
    $("#resultList").html(response);
}
if(!!getParameterByName("q")) {
    var autolast = getParameterByName("q");
} else {
    var autolast = "";
}
function search(query) {
    if(!!query) {
        if(query !== autolast || lastOverride) {
            prepSearch();
            document.title = query+" - Pythne Search";
            window.history.pushState("", "", "/?q="+encodeURIComponent(query));
            var resTime = new Date().getTime();
            $.ajax("/search/?q="+encodeURIComponent(query),{
                beforeSend: function() {
                    $("#go").css("background-image", "url(/static/ui/LoadingIcon.png)").css("background-size", "22px");
                },
                success: function(response) {
                    resTime = new Date().getTime() - resTime;
                    resTime = resTime = resTime / 1000;
                    drawResults(query,response,resTime);
                },
                error: function() {
                    $("#resultList").html("An error occurred!");
                },
            });
            autolast = query;
            lastOverride = false;
        }
    } else {
        revertSearch();
    }
}