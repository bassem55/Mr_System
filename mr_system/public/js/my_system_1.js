function system_have(item)
{
    for(let i=0;i< system_attr.length;i++)
    {
        if(system_attr[i] == item)
        {
            return true;
        }
    }
    return false;
}
function show_page_content()
{
    for(let i=0;i<system_attr.length;i++)
    {
        let class_name = system_attr[i] + "_attr";
        let class_arr = document.getElementsByClassName(class_name);
        for(let j=0;j<class_arr.length;j++)
        {
            class_arr[j].style.display = "inline-block";
        }
    }
}
function smart_size()
{
    if(system_attr.length < 9)
    {
        let all_size = 1000;

        let content_size = 0;
        for(let i=0;i<system_attr.length;i++)
        { 
            content_size += what_size_of(system_attr[i]);;
        }
        let bouns = (all_size - content_size) / system_attr.length;
        for(let i=0;i<system_attr.length;i++)
        {
            let size = what_size_of(system_attr[i]) + bouns;
            let class_name = system_attr[i] + "_attr";
            let class_arr = document.getElementsByClassName(class_name);
            for(let j=0;j<class_arr.length;j++)
            {
                class_arr[j].style.width = size;
            }
        }
    }    
}
function what_size_of(item)
{
    let group_1 = 70,
        group_2 = 100,
        group_3 = 120,
        group_4 = 140;

    let all_data = { 
        item_id : group_1,  
        item_number : group_1,
        item : group_2,
        item_type : group_2,
        item_price : group_1,
        item_buyer : group_4,
        item_buyer_phone : group_3,
        item_seller : group_2,
        item_notes : group_4 ,
        item_add_time : group_1
    };
    for(let i=0;i<system_attr.length;i++)
    {
        if(system_attr[i] == item)
        {
            return all_data[system_attr[i]];
        }
    }
}
dates = [];
function show_data(arr)
{
    let sales = 0;
    //arr will be like [ ["item" , [item1,item2,item3,..]] , ["item_id" ,] , ...]

    let old_data = document.getElementById("old_data");

    old_data.innerHTML = "";
    let smart_counter = 0;

    let row = "";
    let col_data = "";
    for(let i=0;i<arr.length;i++)
    {
        let mini_data = arr[i];
        let data_name = mini_data[0];
        let data = mini_data[1];

        
        for(let j=0;j<data.length;j++)
        {
           //it is smart simple loop will loop once 
            if(smart_counter < data.length)
            {
                row = "<div class='row' id='row_"+j+"'></div>";
                old_data.innerHTML = old_data.innerHTML + row;
                smart_counter++;  
            }
            if(data_name == "item_price")
            {
                sales += data[j];
            }
           if(data_name != "item_add_date")
           {
                col_data = "<div class='row_data "+data_name+"_attr' style='display:inline-block' id='"+data_name+"_res_"+j+"'>"+data[j]+"</div>";
            
           }
           else
           {
                dates[dates.length] = data[j];
           }
            document.getElementById("row_" + j).innerHTML = document.getElementById("row_" + j).innerHTML + col_data;
        }    
    }
    document.getElementById("result").innerHTML = sales;
}
