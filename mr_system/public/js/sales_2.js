$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function()
{
    $("#option_1").click(function(e){
        document.getElementById("sub-options").style.display = "none";
        $.ajax({
            type:'POST',
            url:'http://127.0.0.1:8000/sales/sales_for_today',
            success:function(data){
                document.getElementById("result").style.display = "block";
                document.getElementById('result').innerHTML = data;
            }
        });
    });
    $('#option_3').click(function(e){
        document.getElementById("sub-options").style.display = "none";
        $.ajax({
            type:'POST',
            url:'http://127.0.0.1:8000/sales/sales_for_this_month',
            success:function(data){
                document.getElementById("result").style.display = "block";
                document.getElementById('result').innerHTML = data;
            }
        });
    });
    $('#option_5').click(function(e){
        document.getElementById("sub-options").style.display = "none";
        $.ajax({
            type:'POST',
            url:'http://127.0.0.1:8000/sales/sales_for_this_year',
            success:function(data){
                document.getElementById("result").style.display = "block";
                document.getElementById('result').innerHTML = data;
            }
        });
    });
    $('#sales_for_sellers').click(function(e){
        let seller_name = document.getElementById('seller_name');
        $.ajax({
            type:'POST',
            url:'http://127.0.0.1:8000/sales/sellers',
            data :{data : seller_name.value},
            success:function(data){
                document.getElementById("result").style.display = "block";
                document.getElementById('result').innerHTML = data;
            }
        });
    });
    
});
function get_sales()
    {
        let date_value = "";
        let day_input   = document.getElementById("day"),
            month_input = document.getElementById("month"),
            year_input  = document.getElementById("year");
        if(day == true)
        {
            if(day_input.value != "" && month_input.value != "" && year_input.value != "")
            {

                date_value = year_input.value +"-"+ smart_num(month_input.value) +"-"+ smart_num(day_input.value);
                $.ajax({
                    type:'POST',
                    data:{date : date_value},
                    url:'http://127.0.0.1:8000/sales/sales_for_sp_day',
                    success:function(data){
                        document.getElementById("result").style.display = "block";
                       document.getElementById('result').innerHTML = data;
                    }
                });
                
            }
        }
        else if(month == true)
        {
            if(month_input.value != "" && year_input.value != "")
            {
                $.ajax({
                    type:'POST',
                    data:{month : month_input.value , year : year_input.value},
                    url:'http://127.0.0.1:8000/sales/sales_for_sp_month',
                    success:function(data){
                        document.getElementById("result").style.display = "block";
                       document.getElementById('result').innerHTML = data;
                    }
                });
            }
        }
        else if(year == true)
        {
            if(year_input.value != "")
            {
                $.ajax({
                    type:'POST',
                    data:{year : year_input.value},
                    url:'http://127.0.0.1:8000/sales/sales_for_sp_year',
                    success:function(data){
                        document.getElementById("result").style.display = "block";
                       document.getElementById('result').innerHTML = data;
                    }
                });
            }
        }
    }
    function smart_num(num)
    {
        if(num < 10)
        {
            return "0" + num ;
        }
        else
            return num;
    }