$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
$(".save_btn").click(function(e){

    var error_1 = false;
    var error_2 = false;
    var error_3 = false;
    var data = [];
    var data_counter = 0;
    for(var i=0;i<all_data.length;i++)
    {
        if(all_data[i] == "item")
        {
            if(items.length == 0)
            {
                error_1 = true;
            }
            else
            {
                data[data_counter] = ["items",items];
                data_counter++;

                error_1 = false;
            }
            
        }
        else if(all_data[i] == "item_type")
        {
            if(types.length == 0)
            {
                error_2 = true;
            }
            else
            {
                data[data_counter] = ["item_types",types];
                data_counter++;

                error_2 = false;
            }
           
        }
        else if(all_data[i] == "item_seller")
        {
            if(seller_names.length == 0)
            {
                error_3 = true;
            }
            else
            {
                data[data_counter] = ["item_seller_names",seller_names];
                data_counter++;

                error_3 = false;
            }
            
        }
    }
    //if ervery thing ok
    if(error_1 == false && error_2 == false && error_3 == false)
    {
        
        document.getElementById("error").style.display = "none";
        
        let new_all_data = JSON.stringify(data);
        e.preventDefault();
        $.ajax({
            type:'POST',
            url:'http://127.0.0.1:8000/edit_system',
            data:{data : new_all_data},
            cache: false,
            success:function(data){
                window.location.assign("http://127.0.0.1:8000/my_system");
            }
        });
    }
    else if(error_1 == true || error_2 == true || error_3 == true)
    {
        if(error_1 == true)
        {
            show_error("Please<br><br> Enter<br><br> atleast <br><br>one <br><br>item");
        }
        else if(error_2 == true)
        {
            show_error("Please<br><br> Enter<br><br> atleast <br><br>one <br><br>item type");
        }
        else if(error_3 == true)
        {
            show_error("Please<br><br> Enter<br><br> atleast <br><br>one <br><br>seller name");
        }
    } 
});

function show_error(error)
{
    var err = document.getElementById("error");

    err.innerHTML = error;
    err.style.display = "block";
}