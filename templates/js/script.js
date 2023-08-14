// Function to format the price elements with the structure 70 000,00

function formatPriceElements() {
  let priceElements = document.querySelectorAll(".price");
  priceElements.forEach(function (element) {
    let price = parseFloat(element.textContent);
    price = price.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, " ").replace(".", ",");
    element.textContent = price + " €";
  });
}

formatPriceElements();

// Function to update the value of the range

function updateRangeValue(rangeId, valueId) {
  let range = document.getElementById(rangeId);
  let value = document.getElementById(valueId);

  if (rangeId === 'priceRange' || rangeId === 'priceValue') {
      let formatter = new Intl.NumberFormat('fr-FR', { minimumFractionDigits: 2 });
      value.textContent = formatter.format(parseFloat(range.value));
      range.setAttribute('data-price', range.value);
  } else {
      value.textContent = range.value;
  }
}

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("priceRange").addEventListener("input", function() {
    updateRangeValue('priceRange', 'priceValue');
    filterResults();
  });
  document.getElementById("mileageRange").addEventListener("input", function() {
    updateRangeValue('mileageRange', 'mileageValue');
    filterResults();
  });
  document.getElementById("yearRange").addEventListener("input", function() {
    updateRangeValue('yearRange', 'yearValue');
    filterResults();
  });
});

// function search

function filterResults() {
  let searchInput = document.getElementById("searchInput").value.toLowerCase();
  let priceValue = parseFloat(document.getElementById("priceRange").getAttribute("data-price"));
  let mileageValue = parseFloat(document.getElementById("mileageRange").value);
  let yearValue = parseFloat(document.getElementById("yearRange").value);

  let items = document.querySelectorAll(".vignetteAuto");

  items.forEach(function (item) {
    let title = item.querySelector(".title").textContent.toLowerCase();
    let price = parseFloat(item.querySelector(".price").getAttribute("data-price"));
    let km = parseFloat(item.querySelector(".km").textContent);
    let year = parseFloat(item.querySelector(".years").textContent);

    if (title.includes(searchInput) && price <= priceValue && km <= mileageValue && year <= yearValue) {
      item.style.display = 'block';
    } else {
      item.style.display = 'none';
    }
  });
}