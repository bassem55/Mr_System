$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $(".btn").click(function(e){

        var name = $('#sys_name').val();
        new_sel_items = sel_items.slice();
        new_sel_items[sel_items.length] = name;
        var all_data = JSON.stringify(new_sel_items);
        if(name != "")
        {
            if(sel_items.length != 0)
            {
                e.preventDefault();
                $.ajax({
    
                    type:'POST',
                    url:'http://127.0.0.1:8000/create_system',
                    data:{data : all_data},
                    cache: false,
                    success:function(data){
                        window.location.assign("http://127.0.0.1:8000/add_info");
                    }
                });
            }
            else
            {
                alert("Select atleast one item");
            }
           
        }
        else
        {
            alert("enter system name");
        }
        
        
    });