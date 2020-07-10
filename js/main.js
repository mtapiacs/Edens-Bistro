var item = ".sidenav a";

$(function () {
    $(item).click(function () {
        $(".desc").text($(this).text());
        $(item).removeClass("active");
        $(this).addClass("active");
    });
});

// *************** REGISTER *************** //
const handleNextPage = async (event, currentPage) => {
    console.log(event);
    event.preventDefault();

    const validationData = await validateSection(currentPage);

    if (validationData.type === "SUCCESS") {
        $("#alert-box").hide();
        $(`#sec-${currentPage}`).hide();

        if (currentPage === 3) {
            alert("At the end");
        }

        const nextPage = currentPage + 1;
        $(`#sec-${nextPage}`).show();
    } else {
        $("#alert-box").show();
        $("#alert-box").html(validationData.message);
    }
};

const handleLastPage = currentPage => {
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
    // Temporary Promise Until Server Side Verification Is In place
    const promise = new Promise((resolve, reject) => {
        setTimeout(() => resolve({ type: "SUCCESS" }), 1000);
    });
    return promise;
};
