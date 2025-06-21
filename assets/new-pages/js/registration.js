document.addEventListener("DOMContentLoaded", function () {
  const BASE_URL =
    document.querySelector('meta[name="base_url"]')?.getAttribute("content") +
    "api/";

  const districtSelect = document.getElementById("district");

  // Hide elements initially
  // document.getElementById("India").style.display = "none";
  // document.getElementById("Others").style.display = "none";

  // Add change event listener for country selection
  // document.getElementById("country").addEventListener("change", function () {
  // 	const country = this.value;

  // 	if (country === "105") {
  // 		document.getElementById("India").style.display = "block";
  // 		document.getElementById("Others").style.display = "none";

  // 		// Make AJAX request to get states
  // 		fetch(BASE_URL + "/getStates")
  // 			.then((response) => response.text())
  // 			.then((data) => {
  // 				document.getElementById("state").innerHTML = data;
  // 			})
  // 			.catch((error) => console.error("Error:", error));
  // 	}

  // 	if (country === "106") {
  // 		document.getElementById("Others").style.display = "block";
  // 		document.getElementById("India").style.display = "none";
  // 	}
  // });

  // Add change event listener for state selection
  document.getElementById("state").addEventListener("change", function () {
    const valueSelected = this.value;

    // Make AJAX request to get cities
    fetch(`${BASE_URL}/getCities?state=${valueSelected}`)
      .then((response) => response.json())
      .then((data) => {
        districtSelect.innerHTML = ""; // Clear existing options

        // Add default option
        const defaultOption = document.createElement("option");
        defaultOption.value = "";
        defaultOption.text = "Select District";
        districtSelect.appendChild(defaultOption);

        // Add new options
        data.forEach((city) => {
          const option = document.createElement("option");
          option.value = city.id;
          option.text = city.city;
          districtSelect.appendChild(option);
        });
      })
      .catch((error) => console.error("Error:", error));
  });
});
