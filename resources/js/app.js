import "./bootstrap";
import "flowbite";

/* Dropdown animation */
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
}, 3000);

let isChangedToWatch = false;

document.getElementById("to_watched").addEventListener("click", function () {
    if (!isChanged) {
        this.className =
            "inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out";
        isChangedToWatch = true;
    } else {
        this.className =
            "inline-block px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out";
        isChangedToWatch = false;
    }
});
