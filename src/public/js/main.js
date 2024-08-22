// src/public/js/main.js
document.addEventListener("DOMContentLoaded", function() {
    fetch("/api/vehicles.php")
        .then(response => response.json())
        .then(data => {
            const vehicleList = document.getElementById("vehicle-list");
            data.records.forEach(vehicle => {
                const vehicleDiv = document.createElement("div");
                vehicleDiv.classList.add("vehicle");
                vehicleDiv.innerHTML = `
                    <img src="${vehicle.image_url}" alt="${vehicle.make} ${vehicle.model}">
                    <h2>${vehicle.make} ${vehicle.model}</h2>
                    <p>Year: ${vehicle.year}</p>
                    <p>Price: R${vehicle.price}</p>
                    <p>Mileage: ${vehicle.mileage} miles</p>
                    <p>Color: ${vehicle.color}</p>
                    <p>Engine: ${vehicle.engine_type}</p>
                    <p>Transmission: ${vehicle.transmission}</p>
                `;
                vehicleList.appendChild(vehicleDiv);
            });
        })
        .catch(error => console.error('Error:', error));
});
