// Update price per person and total price when package or number of people changes
document.getElementById("package_id").addEventListener("change", function () {
  var pricePerPersonField = document.getElementById("price_per_person");
  var totalPriceField = document.getElementById("total_price");
  var numberOfPeopleField = document.getElementById("number_of_people");
  var packageId = this.value;

  // Fetch price per person from the selected package
  fetch("get_package_price.php?id=" + packageId)
    .then((response) => response.json())
    .then((data) => {
      pricePerPersonField.value =
        "Rp " + new Intl.NumberFormat("id-ID").format(data.price_per_person);
      totalPriceField.value =
        "Rp " +
        new Intl.NumberFormat("id-ID").format(
          data.price_per_person * numberOfPeopleField.value
        );
    });
});

document
  .getElementById("number_of_people")
  .addEventListener("input", function () {
    var numberOfPeople = this.value;
    var pricePerPersonField = document
      .getElementById("price_per_person")
      .value.replace(/Rp\s|[,.]/g, "");
    var totalPriceField = document.getElementById("total_price");

    if (pricePerPersonField) {
      totalPriceField.value =
        "Rp " +
        new Intl.NumberFormat("id-ID").format(
          pricePerPersonField * numberOfPeople
        );
    }
  });
