$(document).ready(function () {
    $(".comment").click(function () {
        var id = $(this).attr("data_id");
        $.post("/comment/viewForm/" + id, {}, function (data) {
            $("#comment_editor").html(data);
        });
        return false;
    });
});

