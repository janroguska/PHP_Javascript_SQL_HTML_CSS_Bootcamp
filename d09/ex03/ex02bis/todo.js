$(document).ready(function(){
	var i = 0;
	$("#ft_list").html(get_cookie("TODO"));
	$("#button").click(function(){
		var input = prompt("Add a TO DO", "");
		if (input !== "" && input !== null)
		{
			$("#ft_list").prepend("<div id=\"" + i + "\" class=\"TODO\">" + input + "</div>");
			set_cookie("TODO", $("#ft_list").html(), 30);
			i++;
		}
		});
	$(this).click(function() {
		var target = event.target.id;
		if ($.isNumeric(target)) {
			if (confirm("Are you sure you want to delete this item?")) {
				$("#" + target).remove();
				set_cookie("TODO", $("#ft_list").html(), 1);
			}
		}
		});
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
});