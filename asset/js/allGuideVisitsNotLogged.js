
function displayAllGuides(Guides) {
    const GuidesContainer = document.getElementById("GuidesContainer");
    GuidesContainer.innerHTML = "";
    Guides.forEach((g) => {
        const block = `           
                            <div class="bg-white rounded-xl shadow p-6 flex justify-between items-center">
        <div>
            <h3 class="text-xl font-semibold">${g.title}</h3>
            <p class="text-gray-600 text-sm">
                Duration: ${g.duree}h • Language: ${g.languages} • Price: ${g.price} MAD
            </p>
        </div>

        <a href="visit-show.php" class="bg-primary text-white px-5 py-2 rounded-lg hover:bg-green-900">
            View
        </a>
    </div>`
        GuidesContainer.innerHTML += block;
    });
};
function loadGuides() {
    fetch("/youcode/ASSAD/Pages/visiteuNotLogged/api/listGuides.php")
        .then(res => res.json())
        .then(data => displayAllGuides(data))
};
loadGuides();