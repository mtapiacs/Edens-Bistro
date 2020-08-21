// *************** REUSABLE *************** //
const parseInput = type => {
    // Takes Phone Input And Parses It With Dashes
    if (type === "PHONE") {
        const phoneElem = $("#phone");
        const phoneElemVal = phoneElem.val();
        if (phoneElemVal === "") {
            return;
        }
        const tp = phoneElemVal.replaceAll("-", "");
        const phoneParsed = `${tp.substring(0, 3)}-${tp.substring(
            3,
            6
        )}-${tp.substring(6, 10)}`;
        phoneElem.val(phoneParsed);
    }
};

// *************** REGISTER *************** //
const submitRegister = async () => {
    // Get All Key Values From Form
    const fields = $("input");
    const postObj = {};

    for (field of fields) {
        postObj[field.id] = field.value;
    }

    // Calls RESTful Api
    const response = await fetch(
        "./api/register/registerUser.php?type=REGISTER",
        {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(postObj)
        }
    );

    const data = await response.json();

    if (data.message === "SUCCESS") {
        location.replace("./login.php?registered");
    } else {
        alert("Problem Registering!");
    }
};

const handleNextPage = async (event, currentPage) => {
    // OnEach Subsequent Page -> Validate. At Last Page SubmitRegister()
    event.preventDefault();

    const validationData = await validateSection(currentPage);

    if (validationData.type === "SUCCESS") {
        $("#alert-box").hide();
        $(`#sec-${currentPage}`).hide();

        if (currentPage === 3) {
            submitRegister();
            return;
        }

        const nextPage = currentPage + 1;
        $(`#sec-${nextPage}`).show();
    } else {
        $("#alert-box").show();
        $("#alert-box").html(validationData.message);
    }
};

const handleLastPage = currentPage => {
    // Manages Switches Between Pages
    $("#alert-box").hide();
    $(`#sec-${currentPage}`).hide();

    if (currentPage === 1) {
        alert("at start");
    } else {
        const lastPage = currentPage - 1;
        $(`#sec-${lastPage}`).show();
    }
};

//* Validate Inputs And Store In Server
const validateSection = async page => {
    // Validates Every Section Against The Server
    let data;
    if (page === 1) {
        const firstName = $("#firstName").val();
        const lastName = $("#lastName").val();
        const email = $("#email").val();
        const phone = $("#phone").val();

        data = await fetch(
            `./api/register/registerUser.php?type=VALIDATE&page=${page}`,
            {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    firstName,
                    lastName,
                    email,
                    phone
                })
            }
        );
    } else if (page === 2) {
        const addressLineMain = $("#addressLineMain").val();
        const addressLineSecondary = $("#addressLineSecondary").val();
        const city = $("#city").val();
        const state = $("#state").val();
        const zip = $("#zip").val();

        data = await fetch(
            `./api/register/registerUser.php?type=VALIDATE&page=${page}`,
            {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    addressLineMain,
                    addressLineSecondary,
                    city,
                    state,
                    zip
                })
            }
        );
    } else if (page === 3) {
        const username = $("#username").val();
        const password = $("#password").val();
        const confirmPassword = $("#confirmPassword").val();

        data = await fetch(
            `./api/register/registerUser.php?type=VALIDATE&page=${page}`,
            {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    username,
                    password,
                    confirmPassword
                })
            }
        );
    }

    return await data.json();
};

const checkPasswordMatch = () => {
    // Checks If Passwords Match
    const passwordElem = $("#password");
    const cPasswordElem = $("#confirmPassword");

    // Trigger Errors If Passwords Don't Match
    if (passwordElem.val() !== cPasswordElem.val()) {
        passwordElem[0].setCustomValidity("Invalid field");
        cPasswordElem[0].setCustomValidity("Invalid field");
    } else {
        passwordElem[0].setCustomValidity("");
        cPasswordElem[0].setCustomValidity("");
    }
};

// *************** ORDER *************** //
const addToCart = async () => {
    const itemId = $("#modal-item-id").val();
    const quantity = $("#item-qty").val();

    // Adds To Cart Via Rest
    const response = await fetch("./api/cart/addToCart.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            itemId,
            quantity
        })
    });
    const data = await response.json();

    alert(`Added ${quantity} to cart!`);
};

const modifyCart = async (action, itemId, quantity) => {
    // Action Show Sets Modal Values & Shows
    if (action === "SHOW") {
        // Exit Early As Just Populating Modal
        $("#modifyItemQty").val(quantity);
        $("#modifyItemId").val(itemId);

        $("#modifyItemModal").modal("toggle");

        return;
    }

    itemId = $("#modifyItemId").val();
    quantity = $("#modifyItemQty").val();

    // Dynamically Set Request Body Based On Action
    const requestBody = action === "AMOUNT" ? { itemId, quantity } : { itemId };

    const response = await fetch(`./api/cart/modifyCart.php?action=${action}`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(requestBody)
    });
    const data = await response.json();

    location.reload();
};

// *************** MANAGE *************** //
const changeAdminStatus = async event => {
    // Change Admin Status Via Rest
    const userId = event.target.value;
    const isAdmin = event.target.checked;

    const response = await fetch("./api/manage/changeUserStatus.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            userId,
            isAdmin
        })
    });
    const data = await response.json();

    if (data.type !== "SUCCESS") {
        alert("There has been an error updating the user");
    }
};
