<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function addToCart(product_id , product_varient_id = 0 ) {
    let qty = $("#qty").val() ?? 1;
    let varient_id = $("#product_varient_id").val() ?? product_varient_id;

    $.ajax({
        type: "post",
        url : "{{route('cart.store')}}",
        data: {
            product_id , qty , varient_id
        },
        dataType: 'json',
        success: function (data) {
        },
        error: function (data) {
        }
    });

}
</script>