<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function addToCart(product_id , product_varient_id = 0 ) {
    let qty = $(`#qty${product_id}`).val() ?? 1;
    let varient_id = $(`#product_varient_id${product_id}`).val() ?? product_varient_id;

    $.ajax({
        type: "post",
        url : "{{route('cart.store')}}",
        data: {
            product_id , qty , varient_id
        },
        dataType: 'json',
        success: function (response) {
            if(response.success){
                toaster('success' , response.message)
            }
        },
        error: function (response) {
        }
    });
}

function removeCartItem(id){
    $.ajax({
        type: "POST",
        url: "{{route('cart.destroy')}}",
        data: {
            id
        },
        success: function(response) { 
            if(response.success){
                location.reload();
            }
        }
    });
}

function addCoupon(event){
    let code = event.value;
    $.ajax({
        type: "POST",
        url: "{{route('cart.coupon.add')}}",
        data: {
            code
        },
        success: function(response) { 
            if(response.success){
                location.reload();
            }
        }
    });

}
</script>