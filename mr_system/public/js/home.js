function go_to(link)
{
    window.location.assign(link);
}
function hover(id)
{
    let div = document.getElementById(id);
    div.style.backgroundColor = "rgb(87, 46, 46)";
    div.style.color = "white";
}
function out(id)
{
    let div = document.getElementById( id);
    div.style.backgroundColor = "white";
    div.style.color = "rgb(17, 12, 68)";
}