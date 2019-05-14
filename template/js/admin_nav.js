
            onload = function ()
{
    for (var lnk = document.links, j = 0; j < lnk.length; j++)
        if (lnk [j].href == document.URL)
            lnk [j].style.cssText = 'color:#222222;background-color:#EEEEEE;text-decoration:none;';
}