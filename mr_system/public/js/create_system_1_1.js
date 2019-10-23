sel_items = [];

var all_list = document.getElementById('all_attr');
var sel_list = document.getElementById('all_sel_attr');
function add(item)
{
    var item_v = document.getElementById(item).innerHTML;
    //first store item in array
    if(sel_items.length == 0)
    {
        sel_items[0] = item;
    }
    else
    {
        sel_items[sel_items.length] = item;
    }
    //secand remove selected item from list
    document.getElementById(item).style.display = "none";

    //finally rewrite items in confirm form 
    rewrite_items();
}
function remove(item)
{
    //first we will remove item from array

    index = get_index(item);
    sel_items.splice(index , 1);
    //secand add item to general list
    document.getElementById(item).style.display = "inline-block";

    //finally rewrite items in confirm form 
    rewrite_items();

}
function rewrite_items()
{
    document.getElementById('all_sel_attr').innerHTML = "";

    var data = "";
    for(var i = 0;i<sel_items.length ; i++)
    {
        var id = sel_items[i];
        data += '<div class="sel_attr" id="sel_'+id+'" onclick="remove(\''+ id +'\')" >'+id+'</div>';
    }
    document.getElementById('all_sel_attr').innerHTML = data;
}
function get_index(id)
{
    for(var i=0;i<sel_items.length;i++)
    {
        var id2 = sel_items[i];
        if(id == id2)
        {
            return i;
        } 
    }
}