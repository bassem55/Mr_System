$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready(function()
{
    get_data();
    show_page_content();
    smart_size();
    function get_data()
    {
        $.ajax({
            type:'POST',
            url:'http://127.0.0.1:8000/my_system/get_data',
            success:function(data){
                let res = JSON.parse(data);
                show_data(res);
                smart_size();
            }
        });
    }
    setInterval(function(){
        get_data();
    } , 5000);


    $("#save_btn").click(function(e)
    {
        let item_id = document.getElementById("item_id"),
            item_number = document.getElementById("item_number"),
            item  = document.getElementById("item"),
            item_type = document.getElementById("item_type"),
            item_price = document.getElementById("item_price"),
            item_buyer = document.getElementById("item_buyer"),
            item_buyer_phone = document.getElementById("item_buyer_phone"),
            item_seller = document.getElementById("item_seller"),
            item_notes = document.getElementById("item_notes");
        all_data = [];
        if(system_have("item_id") == true)
        {
            if(item_id.value != "")
                all_data[all_data.length] = ["item_id" ,item_id.value];
            else
            {
                //error
            }
        }
        if(system_have("item_number") == true)
        {
            if(item_number.value != "")
            {
                all_data[all_data.length] = ["item_number" , item_number.value];
            }
            else
            {
                //error
            }
        }
        if(system_have("item") == true)
        {
            if(item.value != "")
            {
                all_data[all_data.length] = ["item" , item.value];
            }
            else
            {
                //error
            }
        }
        if(system_have("item_type") == true)
        {
            if(item_type.value != "")
            {
                all_data[all_data.length] = ["item_type" , item_type.value];
            }
            else
            {
                //error
            }
        }
        if(system_have("item_price") == true)
        {
            if(item_price.value != "")
            {
                all_data[all_data.length] = ["item_price" , item_price.value];
            }
            else
            {
                //error
            }
        }
        if(system_have("item_buyer") == true)
        {
            if(item_buyer.value != "")
            {
                all_data[all_data.length] = ["item_buyer" , item_buyer.value];
            }
            else
            {
                //error
            }
        }
        if(system_have("item_buyer_phone") == true)
        {
            if(item_buyer_phone.value != "")
            {
                all_data[all_data.length] = ["item_buyer_phone" , item_buyer_phone.value];
            }
            else
            {
                //error
            }
        }
        if(system_have("item_seller") == true)
        {
            if(item_seller.value != "")
            {
                all_data[all_data.length] = ["item_seller" , item_seller.value];
            }
            else
            {
                //error
            }
        }
        if(system_have("item_notes") == true)
        {
            if(item_notes.value != "")
            {
                all_data[all_data.length] = ["item_notes" , item_notes.value];
            }
            else
            {
                //error
            }
        }
        let timezone =  Intl.DateTimeFormat().resolvedOptions().timeZone ;
        let today = new Date();
        let today1 = today.toLocaleString( 'en-US' , {timeZone: timezone});

        let dd = String(today.getDate()).padStart(2, '0');
        let mm = String(today.getMonth() + 1).padStart(2, '0');
        let yyyy = today.getFullYear();

        //today_date =  dd+ '-' + mm + '-' + yyyy;
        today_date = yyyy + '-' + mm + '-' + dd;

        let today2 = today1.split(" ");
        let today_time = today2[1];

        all_data[all_data.length] = ["item_add_time" , today_time];
        all_data[all_data.length] = ["item_add_date" , today_date];

        let data = JSON.stringify(all_data);
        e.preventDefault();
        $.ajax({
        
            type:'POST',
            url:'http://127.0.0.1:8000/my_system/add_new_data',
            data:{data : data},
            success:function(data){
                get_data();
            }
        });
    
    });
});