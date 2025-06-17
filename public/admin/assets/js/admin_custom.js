$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
// logout script
function handleLogoutClick(buttonId) {
    document
        .getElementById(buttonId)
        .addEventListener("click", function (event) {
            event.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You will be logged out!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, log out!",
                cancelButtonText: "Cancel",
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("logoutForm").submit();
                }
            });
        });
}

handleLogoutClick("btnlogout");
handleLogoutClick("btnlogout2");


