// Select navbar link
let currentUrl = window.location.pathname;
let menuItems = document.querySelectorAll('.navbar-nav .nav-link');

for (let i = 0; i < menuItems.length; i++) {
    let menuItem = menuItems[i];

    if (menuItem.innerText === 'Accueil' || menuItem.innerText === 'Nos véhicules' 
        || menuItem.innerText === 'Nous contacter') {
            if (currentUrl.includes(menuItem.getAttribute('href'))) {
            menuItem.classList.add('active');
            }
    } else if (currentUrl === "/prestationsDetails.php") {
        const element = document.getElementById('navbarLightDropdownMenuLink');
        element.classList.add("active");
    } else if (currentUrl === "/vehiculesDetails.php") {
        const element = document.getElementById('navbarVehiculesLink');
        element.classList.add("active");
    } else
        console.log('page non prise en compte dans nav.php')
}