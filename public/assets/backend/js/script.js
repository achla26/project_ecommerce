$(".alert").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert").slideUp(500);
});

function updateStatus(status , id ,  url ,ref_id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url,
        data:{status, id},
        success:function(resp) {
            if(resp.status){
                //alert(resp.msg);
                if(status == 'active' ) {
                    $(ref_id).html(`<a  onclick= "updateStatus('deactive','${id}','${url}','${ref_id}')" class="btn btn-success btn-sm">Active</a>`);
                }
                else{
                    $(ref_id).html(`<a  onclick= "updateStatus('active','${id}','${url}','${ref_id}')" class="btn btn-warning btn-sm">Deactive</a>`);
                }
            }
        },
        error:function(){
            alert("Error");
        }
    });
}

$("#toast-close").on('click',function(){
    $(".toast").hide(1000);
});

function previewFile(id  , img_id){
    var file = $(id).get(0).files[0];

    if(file){
        var reader = new FileReader();

        reader.onload = function(){
            $(img_id).attr("src", reader.result);
        }

        reader.readAsDataURL(file);
    }
}

function remove(id){
    $(id).remove();
}