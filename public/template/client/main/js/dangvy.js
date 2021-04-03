$(document).ready(function(){
    let position = 0
    $("#button-load-sale-products").click(function(){
        $("#button-load-sale-products").attr('href','index.php?module=client&controller=index&action=index&task=book-all');
        // alert("asdasd");
    })
    $("#add_product").click(function(){
        $("#add_product").submit()
    })
    $("#dathanghihi").click(function(){
        $('#admin-form').attr('action', link);
    })
    //AJAX COMMENT
    $("#comment_frm_abc").on('submit',function(event){
        event.preventDefault();
        console.log(123);
        // let url     = $(this).attr('action');
        // $.ajax({
        //     url: url, // Link mà nó sẽ gọi đến,
        //     method: 'POST',
        //     data: $(this).serialize(),
        //     success: function (data) {
        //         console.log(data);
        //     },
        // });
        
    })

    $('#test_form').on('submit', function (e) {
        e.preventDefault();
        console.log(123);
    })

    $('#my-search-form').on('submit', function (e) {
        e.preventDefault();
        console.log(123);
        
    })

    // $('#btn-review-product').on('click', function () {
    //     $("#comment_frm").submit();
    // })
})