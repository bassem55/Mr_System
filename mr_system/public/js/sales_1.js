    day = false,
    month = false,
    year = false;
    function show_option(option)
    {
        document.getElementById("result").style.display = "none";
        let sup_options = document.getElementById("sub-options");
        let data = "";
        if(option == "day")
        {
            day = true;
            month = false;
            year = false;
            data += '<input type="number" min="1" max="31" class="inputs" id="day" placeholder="Day">';
            data += '<input type="number" min="1" max="12" class="inputs" id="month" placeholder="Month">';
            data += '<input type="number" min="2019" max="2019" class="inputs" id="year" placeholder="Year"><br>';
            data += '<input type="button" id="btn" class="btn" value="Get Sales" onclick="get_sales()">';
        }
        else if(option == "month")
        {
            day = false;
            month = true;
            year = false;
            data += '<input type="number" min="1" max="12" class="inputs" id="month" placeholder="Month">';
            data += '<input type="number" min="2019" max="2019" class="inputs" id="year" placeholder="Year"><br>';
            data += '<input type="button" id="btn" class="btn" value="Get Sales" onclick="get_sales()">';
        }
        else if(option == "year")
        {
            day = false;
            month = false;
            year = true;
            data += '<input type="number" min="2019" max="2019" class="inputs" id="year" placeholder="Year"><br>';
            data += '<input type="button" id="btn" class="btn" value="Get Sales" onclick="get_sales()">';
        }

        if(data != "")
        {
            sup_options.style.display = "block";
            sup_options.innerHTML = data;
        }
    }
function sales_for_today()
{

 }   