function display_alert(){
  alert("Alert!")
}

cities = new Object();
cities['China'] = new Array('Shanghai','Kunming','Beijing','Yantai');
cities['Japan'] = new Array('Tokyo', 'Osaka', 'Kamakura');
cities['Italy'] = new Array('Roma','Milan','Venice','Florence');
cities['America'] = new Array('New York','San Francisco', 'Washington');
function set_city(country, city)
{
    var pv, cv;
    var i, ii;
    pv = country.value;
    cv = city.value;
    city.length = 1;
    if(pv == '0') return;
    if(typeof(cities[pv]) == 'undefined') return;
    for(i = 0; i < cities[pv].length; i++)
    {
       ii = i + 1;
       city.options[ii] = new Option();
       city.options[ii].text = cities[pv][i];
       city.options[ii].value = cities[pv][i];
    }
}
