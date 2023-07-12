<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function addToCart(product_id, product_varient_id = 0) {
        let qty = $(`#qty${product_id}`).val() ?? 1;
        let varient_id = $(`#product_varient_id${product_id}`).val() ?? product_varient_id;

        $.ajax({
            type: "post",
            url: "{{ route('cart.store') }}",
            data: {
                product_id,
                qty,
                varient_id
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    toaster('success', response.message)
                    location.reload();
                }
            },
            error: function(response) {}
        });
    }

    function removeCartItem(id) {
        $.ajax({
            type: "POST",
            url: "{{ route('cart.destroy') }}",
            data: {
                id
            },
            success: function(response) {
                if (response.success) {
                    location.reload();
                }
            }
        });
    }

    function addCoupon(event) {
        let coupon_code =$("#coupon_code").val();
        let sub_total =$("#sub_total").val();
        $.ajax({
            type: "POST",
            url: "{{ route('coupon.add') }}",
            data: {
                coupon_code , sub_total
            },
            success: function(response) {
                if (response.success) {
                    location.reload();
                }else{
                    toaster('error' , response.message)
                }
            },
            error: function(response) {
                let errors = Object.values(response.responseJSON.errors);
                toaster('error' , errors)
                // errors.map((er)=>{
                //     toaster('error' , errors)
                // });                
            }
            
        });

    }

    function removeCartCouponApply() {
        $.ajax({
            type: "POST",
            url: "{{ route('coupon.destroy') }}",
            data: {},
            success: function(response) {
                let jsonData = JSON.parse(response);
                if (jsonData.success) {
                    notifier.notify('success', jsonData.message);
                } else {
                    notifier.notify('error', jsonData.message);
                }
                setTimeout(function() {
                    location.reload();
                }, 300);
            }
        });
    }
</script>
