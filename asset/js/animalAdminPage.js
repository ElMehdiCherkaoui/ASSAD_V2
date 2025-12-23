function displayAllAnimals(animals) {
    const animalContainer = document.getElementById("animalContainer");
    animalContainer.innerHTML = "";
    animals.forEach((a) => {
        const block = `  <tr>
                        <td class="px-6 py-4">"${a.Ani_id}"</td>
                        <td class="px-6 py-4">"${a.animalName}"</td>
                        <td class="px-6 py-4">"${a.espèce}"</td>
                        <td class="px-6 py-4">"${a.habitatsName}"</td>
                        <td class="px-6 py-4">"${a.paysOrigine}"</td>
                        <td class="px-6 py-4">
                            <img src="${a.Image}" alt="Asaad" class="w-12 h-12 rounded">
                        </td>
                        <td class="px-6 py-4 space-x-2">
                           <button onclick='openEditAnimalModal(${JSON.stringify(a)})'
    class="EditBtn bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
    Edit
</button>
       <button onclick="deleteAnimal(${a.Ani_id})"  class="deleteBtn bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                        </td>
                    </tr>`
        animalContainer.innerHTML += block;
    });
}

function loadAnimal() {
    fetch("/youcode/ASSAD/Pages/admin/api/apiAnimal/list.php")
        .then(res => res.json())
        .then(data => displayAllAnimals(data, console.log(data)))
        .catch(err => console.error(err));
}
loadAnimal();



const addAnimalBtn = document.getElementById('addAnimalBtn');
const addAnimalModal = document.getElementById('addAnimalPopup');
const closeModal = document.getElementById('closeModal');
const cancelBtn = document.getElementById('cancelBtn');
const habitatSelect = document.getElementById('habitatSelect');

addAnimalBtn.addEventListener('click', () => {
    addAnimalModal.classList.remove('hidden');
});

closeModal.addEventListener('click', () => {
    addAnimalModal.classList.add('hidden');
});
cancelBtn.addEventListener('click', () => {
    addAnimalModal.classList.add('hidden');
});
const editHabitatSelect = document.getElementById("editHabitatSelect");

fetch("/youcode/ASSAD/Pages/admin/api/apiAnimal/habitats-list.php")
    .then(res => res.json())
    .then(data => {
        data.forEach(h => {
            const option = document.createElement('option');
            option.value = h.Hab_id;
            option.textContent = h.habitatsName;
            habitatSelect.appendChild(option);
        });
    })
    .catch(err => console.error("Error fetching habitats:", err));


fetch("/youcode/ASSAD/Pages/admin/api/apiAnimal/habitats-list.php")
    .then(res => res.json())
    .then(data => {
        data.forEach(h => {
            const option = document.createElement('option');
            option.value = h.Hab_id;
            option.textContent = h.habitatsName;
            editHabitatSelect.appendChild(option);
        });
    })
    .catch(err => console.error("Error fetching habitats:", err));

document.getElementById("addAnimalForm").addEventListener('submit', (e) => {
    e.preventDefault();

    const formData = new FormData();

    formData.append("animalName", document.getElementById("animalName").value);
    formData.append("espèce", document.getElementById("espece").value);
    formData.append("alimentation", document.getElementById("alimentation").value);
    formData.append("Habitat_ID", document.getElementById("habitatSelect").value);
    formData.append("paysOrigine", document.getElementById("paysOrigine").value);
    formData.append("Image", document.getElementById("Image").value);
    formData.append("descriptionCourte", document.getElementById("Description").value);

    fetch("/youcode/ASSAD/Pages/admin/api/apiAnimal/add.php", {
        method: "POST",
        body: formData
    })
        .then(res => res.json())
        .then(result => {
            if (result.success) {
                alert("Animal added successfully!");
                loadAnimal();
                addAnimalModal.classList.add("hidden");

            } else {
                alert(result.message || "Error: could not save animal.");
            }
        })
        .catch(err => console.error("Fetch Error:", err));
});
function deleteAnimal(id) {
    if (!confirm("Are you sure you want to delete this animal?")) {
        return;
    }

    let formData = new FormData();
    formData.append("Ani_id", id);

    fetch("/youcode/ASSAD/Pages/admin/api/apiAnimal/delete.php", {
        method: "POST",
        body: formData
    })
        .then(res => res.json())
        .then(result => {
            if (result.success) {
                alert("Animal deleted successfully!");
                loadAnimal();
            } else {
                alert("Error deleting animal.");
            }
        })
        .catch(err => console.error("Delete error:", err));
}

function openEditAnimalModal(animal) {
    const modal = document.getElementById("editAnimalModal");
    const form = document.getElementById("editAnimalForm");

    form.editAniId.value = animal.Ani_id;
    form.editAnimalName.value = animal.animalName;
    form.editEspece.value = animal.espèce;
    form.editAlimentation.value = animal.alimentation;
    form.editHabitatSelect.value = animal.Habitat_ID;
    form.editPaysOrigine.value = animal.paysOrigine;
    form.editImage.value = animal.Image;
    form.editDescription.value = animal.descriptionCourte;


    modal.classList.remove("hidden");
    document.getElementById("cancelEditBtn").addEventListener("click", () => { modal.classList.add("hidden"); })
    document.getElementById("closeEditModal").addEventListener("click", () => { modal.classList.add("hidden"); })
    document.getElementById("editAnimalForm").addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData();
        formData.append("Ani_id", document.getElementById("editAniId").value);
        formData.append("animalName", document.getElementById("editAnimalName").value);
        formData.append("espèce", document.getElementById("editEspece").value);
        formData.append("alimentation", document.getElementById("editAlimentation").value);
        formData.append("Habitat_ID", document.getElementById("editHabitatSelect").value);
        formData.append("paysOrigine", document.getElementById("editPaysOrigine").value);
        formData.append("Image", document.getElementById("editImage").value);
        formData.append("descriptionCourte", document.getElementById("editDescription").value);

        fetch("/youcode/ASSAD/Pages/admin/api/apiAnimal/edit.php", {
            method: "POST",
            body: formData
        })
            .then(res => res.json())
            .then(result => {
                if (result.success) {
                    alert("Animal updated successfully!");
                    loadAnimal();
                    document.getElementById("editAnimalModal").classList.add("hidden");
                } else {
                    alert(result.message || "Error: could not update animal.");
                }
            })
            .catch(err => console.error("Fetch Error:", err));
    });
}

