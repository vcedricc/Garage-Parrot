// Select link navbar
var currentUrl = window.location.pathname;
var menuItems = document.querySelectorAll('.navbar-nav .nav-link');

for (var i = 0; i < menuItems.length; i++) {
  var menuItem = menuItems[i];

  if (menuItem.innerText === 'Accueil' || menuItem.innerText === 'Nos véhicules' || menuItem.innerText === 'Nos prestations' || menuItem.innerText === 'Nous contacter') {
    if (currentUrl.includes(menuItem.getAttribute('href'))) {
      menuItem.classList.add('active');
    }
  }

  if (menuItem.innerText === 'Atelier mécanique' || menuItem.innerText === 'Atelier carrosserie' || menuItem.innerText === 'Nettoyage haut de gamme') {
    var parentItem = menuItem.closest('.dropdown');
    if (parentItem) {
      var parentLink = parentItem.querySelector('.nav-link');
      parentLink.classList.add('active');

      var dropdownToggle = parentItem.querySelector('.dropdown-toggle');
      dropdownToggle.classList.add('active');
    }
  }
}

// Function to update the value of the range
function updateRangeValue(rangeId, valueId) {
    var range = document.getElementById(rangeId);
    var value = document.getElementById(valueId);
    value.textContent = range.value;
}

// Update the range values on input change
document.getElementById('priceRange').addEventListener('input', function() {
    updateRangeValue('priceRange', 'priceValue');
});

document.getElementById('mileageRange').addEventListener('input', function() {
    updateRangeValue('mileageRange', 'mileageValue');
});

document.getElementById('yearRange').addEventListener('input', function() {
    updateRangeValue('yearRange', 'yearValue');
});









