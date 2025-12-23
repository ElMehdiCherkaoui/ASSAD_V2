let Guides = [];
let GuideId = localStorage.getItem("GuideId");


function displayAllguids(Guides) {

    const GuidesBookContainner = document.getElementById("GuidesBookContainner");
    GuidesBookContainner.innerHTML = "";

    Guides.forEach((a) => {
        if (a.statut === "Active") {
            const block = `         
                <div class="p-6 text-center">
                    <h3 class="text-xl font-semibold mb-2">${a.title}</h3>
                    <p class="text-gray-600 mb-2">Date: ${a.date_time} | Duration: ${a.duree} hours</p>
                    <p class="text-gray-600 mb-4">Price: $${a.price} | Language: ${a.languages} | Remaining: ${a.max_capacity} seats</p>
         <a href="book.php"
   onclick="storeGuideId(${a.guided_id})"
   class="bg-primary text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-900">
   Book Now
</a>

 `
            GuidesBookContainner.innerHTML += block;
        }

    });

}
function loadAnimal() {
    fetch("/youcode/ASSAD/Pages/visitsLogged/api/listGuides.php")
        .then(response => response.json())
        .then(data => {
            Guides = data;
            displayAllguids(Guides);
        });
}



loadAnimal();


function storeGuideId(id) {
    localStorage.setItem("GuideId", id);
}

fetch("/youcode/ASSAD/Pages/visitsLogged/api/listGuides.php")
    .then(res => res.json())
    .then(data => {
        Guides = data;
        loadBookForm();
    });


function loadBookForm() {


    let guide = Guides.find(g => g.guided_id == GuideId);

    document.getElementById("bookFormContainer").innerHTML = `
 <h2 class="text-xl font-semibold mb-4">${guide.title}</h2>
            <p class="mb-2"><strong>Date:</strong> ${guide.date_time}</p>
            <p class="mb-2"><strong>Duration:</strong> ${guide.duree} hours</p>
            <p class="mb-2"><strong>Language:</strong> ${guide.languages}</p>
            <p class="mb-2"><strong>Remaining Capacity:</strong> ${guide.max_capacity}</p>

 <form method="POST" action="api/saveReservation.php" class="mt-4">
    <input type="hidden" name="guide_id" value="${guide.guided_id}">

    <label>Number of People:</label>
    <input class="border px-3 py-2 rounded-lg w-full mb-4"  type="number" name="people" min="1" max="${guide.max_capacity}" required>

    <button class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-900" type="submit">Confirm Booking</button>
</form>

    `;
}
