$(document).ready(function () {
    
    $(".deleteBag").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var id = $(this).data("id");
        var token = $(this).data("token");
        
        $.ajax(
        {
            url: 'bags/' + id,
            type: 'DELETE',
            dataType: "json",
            data: {
                "id": id
            },
            success: function (data)
            {
                let response = data.success;

                $("#flash").show().text(response);
                setTimeout(()=>{$("#flash").fadeOut(3000);},3000);            }
        });

        $("#card" + id).remove();        
        
    });
}); 