function displayAllGuides(Guides) {
    const guidesContainers = document.getElementById("guidesContainers");
    guidesContainers.innerHTML = "";
    Guides.forEach((g) => {
        const block = `                          <tr>
                            <td class="px-6 py-4">"${g.title}"</td>
                            <td class="px-6 py-4">"${g.date_time}"</td>
                            <td class="px-6 py-4">"${g.languages}"</td>
                            <td class="px-6 py-4">"${g.max_capacity}"</td>
                            <td class="px-6 py-4">"${g.price}"</td>
                            <td class="px-6 py-4">"${g.statut}"</td>
                            <td class="px-6 py-4 space-x-2">
                            <button onclick='openEtapsGuide(${g.guided_id})' class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Etapes</button>
                                <button onclick='openEditGuideModal(${JSON.stringify(g)})'
                                    class="px-3 py-1 bg-secondary text-black rounded hover:bg-amber-400">Edit</button>
                                <button onclick='changeStatus(${JSON.stringify(g)})' class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Cancel</button>

                            </td>
                        </tr>`
        guidesContainers.innerHTML += block;
    });
};
function loadGuides() {
    fetch("/youcode/ASSAD/Pages/guide/api/listGuide.php")
        .then(res => res.json())
        .then(data => displayAllGuides(data))
        .catch(err => console.error(err));
};
loadGuides();


function openEditGuideModal(Guide) {
    const modal = document.getElementById("formPopup");
    const form = document.getElementById("formGuide");

    modal.classList.remove("hidden");


    document.getElementById("closeEditModal").addEventListener("click", () => {
        modal.classList.add("hidden");
    });

    form.titles.value = Guide.title;
    form.date.value = Guide.date_time.split(" ")[0];
    form.capacity.value = Guide.max_capacity;
    form.duration.value = Guide.duree;
    form.language.value = Guide.languages;
    form.price.value = Guide.price;
    document.getElementById("ediguiId").value = Guide.guided_id;



    document.getElementById("submitButtonGuide").addEventListener('click', (e) => {
        e.preventDefault();

        const formData = new FormData();
        formData.append("ediguiId", document.getElementById("ediguiId").value);
        formData.append("title", document.getElementById("titles").value);
        formData.append("date", document.getElementById("date").value);
        formData.append("duration", document.getElementById("duration").value);
        formData.append("language", document.getElementById("language").value);
        formData.append("capacity", document.getElementById("capacity").value);
        formData.append("price", document.getElementById("price").value);

        fetch("/youcode/ASSAD/Pages/guide/api/edit.php", {
            method: "POST",
            body: formData
        })
            .then(res => res.json())
            .then(result => {
                if (result.success) {
                    alert("Guide updated successfully!");
                    loadGuides();
                    document.getElementById("formPopup").classList.add("hidden");
                } else {
                    alert(result.message || "Error: could not update guide.");
                }
            })
            .catch(err => console.error("Fetch Error:", err));
    });
}

function changeStatus(Guide) {

    const formData = new FormData();
    formData.append("ediguiId", Guide.guided_id);
    formData.append("status", "Disabled");

    fetch("/youcode/ASSAD/Pages/guide/api/cancleVisit.php", {
        method: "POST",
        body: formData
    })
        .then(res => res.json())
        .then(result => {
            if (result.success) {
                alert("Guide Disabled successfully!");
                loadGuides();
            } else {
                alert(result.message || "Error: could not update guide.");
            }
        })
        .catch(err => console.error("Fetch Error:", err));
}


function openEtapsGuide(visitId) {
    const stepsModal = document.getElementById("stepsModal");
    const stepsList = document.getElementById("stepsList");

    stepsModal.classList.remove("hidden");
    stepsList.innerHTML = "";
    document.getElementById("edietapId").value = visitId;
    const formData = new FormData();
    formData.append("id_visit", visitId);

    fetch("/youcode/ASSAD/Pages/guide/api/etapsVisitList.php", {
        method: "POST",
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            data.forEach(e => {
                const block = `
                <div class="flex gap-3 p-4 bg-gray-100 rounded-lg">
                    <div class="flex items-center justify-center w-10 h-10 bg-blue-600 text-white rounded-full font-bold">
                        ${e.step_order}
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg">${e.step_title}</h3>
                        <p class="text-gray-600 text-sm">${e.step_description}</p>
                    </div>
                </div>
            `;
                stepsList.innerHTML += block;
            });
        })
        .catch(err => {
            console.error(err);
        });


}

function closeStepsModal() {
    const stepsModal = document.getElementById("stepsModal");

    stepsModal.classList.add("hidden");



}

function openAddStepModal() {
    const addStepModal = document.getElementById("addStepModal");
    addStepModal.classList.remove("hidden");
   document.getElementById("SaveButton").addEventListener("click", (e) => {
    e.preventDefault();

    const id = parseInt(document.getElementById("edietapId").value);
    const stepOrder = parseInt(document.getElementById("stepOrder").value);
    const stepTitle = document.getElementById("stepTitle").value.trim();
    const stepDescription = document.getElementById("stepDescription").value.trim();

    const formData = new FormData();
    formData.append("IdGuideNeeded", id);
    formData.append("stepOrder", stepOrder);
    formData.append("stepTitle", stepTitle);
    formData.append("stepDescription", stepDescription);

    fetch("/youcode/ASSAD/Pages/guide/api/addStepGuide.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(result => {
        if (result.success) {
            closeAddStepModal();
            openEtapsGuide(id);
        } 
    })
    .catch(err => console.error("Fetch Error:", err));
});

}
function closeAddStepModal() {
    const addStepModal = document.getElementById("addStepModal");
    addStepModal.classList.add("hidden");
}