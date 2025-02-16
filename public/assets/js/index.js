
function toogleMenu() {//for small screens
    const menuToggle = document.querySelector('.menu-toggle');
    const menuLinks = document.querySelectorAll('.menu a');

    let isMenuVisible = false;

    menuToggle.addEventListener('click', () => {

        menuLinks.forEach(link => {
            if (isMenuVisible) {
                link.style.visibility = 'hidden';
            } else {
                link.style.visibility = 'visible';
            }
        });

        // Update the state of the menu toggle
        isMenuVisible = !isMenuVisible;

        menuToggle.setAttribute('aria-expanded', isMenuVisible);

    });
}

document.addEventListener("DOMContentLoaded", updateTime);
function updateTime() {
    const timeSpan = document.querySelector('.profile-info div:nth-child(3) span');

    if (timeSpan) {
        timeSpan.textContent = new Date().toLocaleTimeString();
    } else {
        console.log("Time span not found!");
    }

    setTimeout(updateTime, 1000);
}




toogleMenu();

//TODO!!


//TODO crete restful api endpoints for the task page(php)

//TODO Fetch the data from the api and display it on the page

//TODO Replace hover effects with onclick javascript effects

//TODO impliment filtering and task sorting(sorting && searching algorithms)

//TODO Debugging & testing (different browsers)

