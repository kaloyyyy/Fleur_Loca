document.addEventListener("DOMContentLoaded", function() {
    var el = document.getElementById("wrapper");
    var toggleBtn = document.getElementById("menu-toggle");

    toggleBtn.onclick = function() {
        el.classList.toggle("toggled");
    };
});


$(document).ready(function() {
    $('.delete-btn').click(function() {
        var galleryID = $(this).data('galleryid');
        if (confirm("Are you sure you want to delete this gallery?")) {
            window.location.href = '/Fleur_Loca/admin/viewimage.php?delete=' + galleryID;
        }
    });
});
