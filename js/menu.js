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
async function populateModal (itemId) {
   const response = await fetch(
      './api/getItemDetails.php?itemId=${itemId}")', 
      {
         method: "GET"
      }
   );
   
   const data = await response.json();
   
   //data.whatever
   data.itemName
   data.itemPrice
   data.itemDesc
   
   //send to modal
   document.getElementById("modal-title").textContent = data.itemName;
   document.getElementById("modal-item-desc").textContent = data.itemDesc;
   document.getElementById("modal-item-price").textContent = data.itemPrice;
}

$(document).on("hidden.bs.modal", function (e) {
	$(e.target).removeData("bs.modal").find(".modal-content").empty();
});


