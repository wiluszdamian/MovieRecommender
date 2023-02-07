import './bootstrap';
import 'flowbite';

/* Dropdown animation */
    let listDisplayed = false;
    document.querySelector(".button-nav").addEventListener("click", function() {
        let listDiv = document.querySelector(".dropdown-nav");
        if (!listDisplayed) {
            listDiv.style.display = "block";
            listDisplayed = true;
        } else {
            listDiv.style.display = "none";
            listDisplayed = false;
        }
    });
