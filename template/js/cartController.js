
    $(document).ready(function () {
        $(".add_to_cart").click(function () {
            var id = $(this).attr("data_id");
            $.post("/cart/addAjax/" + id, {}, function (data) {
                $("#cart_count").html(data);
            });
            return false;
        });
    });
