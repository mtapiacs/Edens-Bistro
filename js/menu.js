// Category link functionality 
$(".categories a").click(function (e) {
    var a_href = $(this).attr("href");
    e.preventDefault();
 });
 
 // Open menu when menu category is selected
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
 
 // Hide menu when new menu category is selected
 function hideMenuSections() {
    var items = document.getElementsByClassName("menucontent"); // [HTMLElement, HTMLElement]
    for (var i = 0; i < items.length; i++) {
       items[i].style.display = "none";
    }
 }
 
 // Show default menu when page is loaded
 document.getElementById("defaultOpen").click();
 
 // Get item details when each item is selected
 async function populateModal(itemId) {
     const response = await fetch(
         `./api/menu/getItemDetails.php?itemId=${itemId}`,
         {
             method: "GET"
         }
     );
 
     // id, name, desc, price
     const data = await response.json();
 
     // Send corresponding item details to modal
     document.getElementById("modal-item-title").textContent = data.name; // $("#menu-modal-title").val(data.name)
     document.getElementById("modal-item-desc").textContent = data.desc;
     document.getElementById("modal-item-price").textContent = data.price;
     document.getElementById("modal-item-id").value = data.id;

     // Show The Modal
     $('#addToCartModal').modal('show');
 }
 
 // Remove data when modal is closed
//  $(document).on("hidden.bs.modal", function (e) {
//      $(e.target).removeData("bs.modal").find(".modal-content").empty();
//  });
 