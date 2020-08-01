// *************** Menu *************** //
$(".categories a").click(function (e) {
    var a_href = $(this).attr("href");
    e.preventDefault();
});

function openDiv(evt, menuCategory) {
    var i, menuItems;

    hideMenuSections();

    menuItems = document.getElementsByClassName("menuitems");
    for (i = 0; i < menuItems.length; i++) {
        menuItems[i].className = menuItems[i].className.replace(" active", "");
    }
    document.getElementById(menuCategory).style.display = "block";
    evt.currentTarget.className += " active";
}

function hideMenuSections() {
    var items = document.getElementsByClassName("menucontent"); // [HTMLElement, HTMLElement]
    for (var i = 0; i < items.length; i++) {
        items[i].style.display = "none";
    }
    // for (const item of items) { // [HTMLELEMENT, HTMLELEMENT]
    //     item.style.display = "none";
    // }
}

document.getElementById("defaultOpen").click();
