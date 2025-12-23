let allAnimals = [];

function displayAllAnimals(Animals) {

    const animalContainer = document.getElementById("animalContainer");
    animalContainer.innerHTML = "";
    Animals.forEach((a) => {

        const block = `
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <img src="${a.Image}" class="w-full h-48 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-semibold mb-2">${a.animalName} </h3>
                    <p class="text-gray-600 mb-4">Species: ${a.espèce}  | Country: ${a.paysOrigine}</p>
                </div>
            </div>
        `
        animalContainer.innerHTML += block;

    });

}
function loadAnimal() {
    fetch("/youcode/ASSAD/Pages/admin/api/apiAnimal/list.php")
        .then(response => response.json())
        .then(data => {
            allAnimals = data;
            displayAllAnimals(allAnimals);
            fillSelects(allAnimals);
        });
}

loadAnimal();

function fillSelects(animals) {
    const habitatSelect = document.getElementById("habitatFilter");
    const countrySelect = document.getElementById("countryFilter");

    let habitats = [];
    let countries = [];

    animals.forEach(animal => {
        if (!habitats.includes(animal.habitatsName)) {
            habitats.push(animal.habitatsName);
        }

        if (!countries.includes(animal.paysOrigine)) {
            countries.push(animal.paysOrigine);
        }
    });

    habitats.forEach(habitat => {
        habitatSelect.innerHTML += `
            <option value="${habitat}">${habitat}</option>
        `;
    });

    countries.forEach(country => {
        countrySelect.innerHTML += `
            <option value="${country}">${country}</option>
        `;
    });
}

function filterAnimals() {

    let nameInput = document.getElementById("searchName").value.toLowerCase();
    let habitatInput = document.getElementById("habitatFilter").value;
    let countryInput = document.getElementById("countryFilter").value;

    let result = [];

    for (let i = 0; i < allAnimals.length; i++) {
        let animal = allAnimals[i];

        if (!animal.animalName.toLowerCase().includes(nameInput)) continue;
        if (habitatInput !== "" && animal.habitatsName !== habitatInput) continue;
        if (countryInput !== "" && animal.paysOrigine !== countryInput) continue;

        result.push(animal);
    }

    displayAllAnimals(result);
}
document.addEventListener("DOMContentLoaded",  () => {
    document.getElementById("searchName").addEventListener("input", filterAnimals);
    document.getElementById("habitatFilter").addEventListener("change", filterAnimals);
    document.getElementById("countryFilter").addEventListener("change", filterAnimals);
});
