// Select link navbar
let currentUrl = window.location.pathname;
let menuItems = document.querySelectorAll('.navbar-nav .nav-link');

for (let i = 0; i < menuItems.length; i++) {
    let menuItem = menuItems[i];

    if (menuItem.innerText === 'Accueil' || menuItem.innerText === 'Nos véhicules' 
        || menuItem.innerText === 'Nous contacter') {
            if (currentUrl.includes(menuItem.getAttribute('href'))) {
            menuItem.classList.add('active');
            } 
    }
}

let dropdownItems = document.querySelectorAll('.navbar-nav .dropdown .dropdown-menu .dropdown-item');

for (let x = 0; x < dropdownItems.length; x++) {
    let dropdownItem = dropdownItems[x];

    if (dropdownItem.innerText === 'Atelier mécanique' || dropdownItem.innerText === 'Atelier carrosserie' 
        || dropdownItem.innerText === 'Nettoyage supérieur') {
            if (currentUrl.includes(dropdownItem.getAttribute('href'))) {
                dropdownItem.classList.add('active');
            }
            
                let dropdown = dropdownItem.closest('.dropdown');

                if (dropdown.innerText === 'Nos prestations') {
                    dropdown.classList.add('active');
            }
    }
} 