for(var i=0;i<all_data.length;i++)
{
    if(all_data[i] == "item")
    {
        document.getElementById("gen_item").style.display = "block";
    }
    else if(all_data[i] == "item_type")
    {
        document.getElementById("gen_item_type").style.display = "block";
    }
    else if(all_data[i] == "item_seller")
    {
        document.getElementById("gen_item_seller").style.display = "block";
    }
}
function rewrite_items(array , div , onclick_funaction_name)
{
    var data = "";
    for(var i=0;i<array.length;i++)
    {
        var onclick_value = 'onclick="'+onclick_funaction_name+ '(\'' + i + '\')"';


        data += "<div class='selected_item'>"+array[i]+"</div>";
        data += '<input type="button" class="sp-btn remove_selected_btn" value="Remove" '+onclick_value+'><br>';
    }
    if(data != "")
    {
        div.style.display = "block";
        div.innerHTML = data;
    }
    else
    {
        div.style.display = "none";
    }
   

}
items_counter = items.length ;
document.getElementById("add_item_btn").onclick = function()
{
    var item = document.getElementById("item_value");
    var items_div = document.getElementById("items");

    if(item.value != "")
    {
        items[items_counter] = item.value;
        items_counter++;

        rewrite_items(items , items_div , "remove_item");

        item.value = "";
    }
}
function remove_item(index)
{
    var items_div = document.getElementById("items");

    items.splice(index , 1);
    items_counter--;

    rewrite_items(items,items_div , "remove_item");
}
seller_names_counter = seller_names.length;
document.getElementById("add_seller_btn").onclick=function(){
    
    var seller_name = document.getElementById("seller_name");
    var seller_names_div = document.getElementById("seller_names");

    if(seller_name.value != "")
    {
        seller_names[seller_names_counter] = seller_name.value;
        seller_names_counter++;

        rewrite_items(seller_names , seller_names_div , "remove_seller");

        seller_name.value = "";
    }
    
}
function remove_seller(index)
{
    var seller_names_div = document.getElementById("seller_names");

    seller_names.splice(index , 1);
    seller_names_counter--;
    
    rewrite_items(seller_names , seller_names_div , "remove_seller");
}

types_counter = types.length;
document.getElementById("add_type_btn").onclick = function()
{
    var type = document.getElementById("item_type_value");
    var item_types = document.getElementById("item_types");

    if(type.value != "")
    {
        types[types_counter] = type.value;
        types_counter++;

        rewrite_items(types , item_types , "remove_type");

        type.value = "";
    }
    
}
function remove_type(index)
{
    var item_types = document.getElementById("item_types");
    types.splice(index , 1);
    types_counter--;

    rewrite_items(types , item_types , "remove_type");
}