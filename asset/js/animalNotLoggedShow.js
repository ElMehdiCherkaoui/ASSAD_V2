
function displayAllAnimals(Animals) {

    const animalContainer = document.getElementById("animalContainer");
    animalContainer.innerHTML = "";
    Animals.forEach((a) => {

        const block = `
     <div class="bg-white rounded-xl shadow overflow-hidden">
        <img src="${a.Image}" class="w-full h-48 object-cover">
        <div class="p-5">
            <h3 class="text-xl font-semibold">"${a.animalName}</h3>
            <p class="text-gray-600 text-sm mt-2">
                "${a.descriptionCourte}.
            </p>
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
            displayAllAnimals(data);
        });
}

loadAnimal();