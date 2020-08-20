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

 // Get item details when each item is selected based on the id given
 async function populateModal(itemId, isEditModal = false) {
    const response = await fetch(
        `./api/menu/getItemDetails.php?itemId=${itemId}`,
        {
           method: "GET"
        }
  );

  // create a variable that contains the data from JSON
  const data = await response.json();

    if (isEditModal) {
       document.getElementById("modal-item-title").value = data.name; // $("#menu-modal-title").val(data.name)
       document.getElementById("modal-item-desc").value = data.desc;
       document.getElementById("modal-item-price").value = data.price;
       document.getElementById("modal-item-category").value = data.category;
       document.getElementById("modal-item-id").value = data.id;

       const takeoutRadios = $("[name='takeoutRadios']");

       for (const elem of takeoutRadios) {
           if (elem.value === 'Y' && data.takeout === 'Y') {
               elem.checked = true;
           } else if (elem.value === 'N' && data.takeout === 'N') {
               elem.checked = true;
           }
       }

       $('#modifyItemModal').modal('show');
    } else {
        // Send corresponding item details to modal
       document.getElementById("modal-item-title").textContent = data.name; // $("#menu-modal-title").val(data.name)
       document.getElementById("modal-item-desc").textContent = data.desc;
       document.getElementById("modal-item-price").textContent = data.price;
       document.getElementById("modal-item-id").value = data.id;

        if (loggedIn) {
            // Show The Modal
            $('#addToCartModal').modal('show');
        }
       
    }
}

 async function modifyMenuItem() {
    const itemId = $("#modal-item-id").val();
    const itemName = $("#modal-item-title").val();
    const itemDesc = $("#modal-item-desc").val();
    const itemPrice = $("#modal-item-price").val();
    let itemTakeout = '';
    const itemCategory = $("#modal-item-category").val();
    const itemRemove = $("#modal-item-remove")[0].checked;

    for (const elem of $("[name='takeoutRadios']")) {
       if (elem.checked) {
           itemTakeout = elem.value;
       }
   }

    const response = await fetch("./api/menu/modifyMenuItem.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            itemId,
            itemName,
            itemDesc,
            itemPrice,
            itemTakeout,
            itemCategory,
            itemRemove
        })
    })

    const data = await response.json();

    if (data.type === "SUCCESS") {
        const msg = itemRemove === "on" ? "deletion" : "modification";
        alert(`Successful ${msg}`);

       location.reload();
    } else {
        alert("Error");
    }
}

var loggedIn = false;

// Show item details only if user is logged in
$('.menucontent a').click(function(e) {
   if(loggedin === true) {
      loggedIn = true;
      e.preventDefault();
      $('#addToCartModal').modal('show');
    }
   else {
      loggedIn = false;
      document.getElementById("menu-link").href="#pleaselogin";
      alert("Please login to see item details"); 
    }
});


 