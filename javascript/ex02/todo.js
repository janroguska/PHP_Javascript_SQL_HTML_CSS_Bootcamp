function list_add()
{
	var input = prompt("Add a TO DO", "");
	if (input !== "" && input !== null)
	{
		var new_node = document.createElement("div");
		var new_contents = document.createTextNode(input);
		new_node.setAttribute("onclick", "list_remove(this)");
		new_node.setAttribute("class", "TODO");
		var list = document.getElementById("ft_list");
		new_node.appendChild(new_contents);
		list.insertBefore(new_node, list.childNodes[0]);
		set_cookie("TODO", list.innerHTML, 30);
	}
}
function list_remove(x)
{
	var t = confirm("Are you sure you want to delete this item?");
	if (t === true)
	{
		var elem = document.getElementById("ft_list");
		elem.removeChild(x);
		set_cookie("TODO", elem.innerHTML, 1);
	}
}
function set_cookie(cname, cvalue, exdays)
{
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires;
}
function get_cookie(cname)
{
	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	var i = 0;
	while (i < ca.length)
	{
		var c = ca[i];
		while (c.charAt(0) == ' ')
            c = c.substring(1);
        if (c.indexOf(name) == 0)
            return (c.substring(name.length, c.length));
        i++;
    }
    return "";
}
function check_cookie()
{
	var elem = document.getElementById("ft_list");
	elem.innerHTML = get_cookie("TODO");
}