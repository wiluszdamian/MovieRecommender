import "./bootstrap";
import "flowbite";

/* Navbar dropdown animation */
let listDisplayed = false;
document.querySelector(".button-nav").addEventListener("click", function () {
    let listDiv = document.querySelector(".dropdown-nav");
    if (!listDisplayed) {
        listDiv.style.display = "block";
        listDisplayed = true;
    } else {
        listDiv.style.display = "none";
        listDisplayed = false;
    }
});

setTimeout(function () {
    const alert = document.querySelector(".alert");
    alert.style.display = "none";
}, 2000);
