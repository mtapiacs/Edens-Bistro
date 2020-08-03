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

//Adds details when you click the menu item
$(function() {
   $(".itemname").click(function() {
      var itemname = $(this).parents("tr").find(".name").text();
      var price = $(this).parents("tr").find(".price").text();
      var p = "";
      // CREATING DATA TO SHOW ON MODEL 
      p += itemname;
      p += "<br>" + price;
      //SETTING THE TITLE 
      $("#modal-title").html(itemname);
      //CLEARING THE PREFILLED DATA 
      $("#itemdetails").empty();
      //WRITING THE DATA ON MODEL 
      $("#itemdetails").append(p);
  });
});

$(document).on("hidden.bs.modal", function (e) {
	$(e.target).removeData("bs.modal").find(".modal-content").empty();
});
