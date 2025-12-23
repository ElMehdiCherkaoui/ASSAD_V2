let userReservations = [];

function displayUserReservations(reservations) {
    const container = document.getElementById("UserContainer");
    container.innerHTML = "";

    reservations.forEach((r) => {
        const row = `
            <tr class="border-b">
                <td class="px-4 py-2">${r.userName}</td>
                <td class="px-4 py-2">${r.title}</td>
                <td class="px-4 py-2">${r.reservation_date}</td>
                <td class="px-4 py-2">${r.number_of_people}</td>
                <td class="px-4 py-2">
                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded font-semibold">Confirmed</span>
                </td>
            </tr>
        `;
        container.innerHTML += row;
    });
}

function loadUserReservations() {
    fetch("/youcode/ASSAD/Pages/guide/api/loadReservationUser.php")
        .then(res => res.json())
        .then(data => {
            userReservations = data;
            displayUserReservations(userReservations);
        })
        .catch(err => console.error("Failed to load reservations:", err));
}

loadUserReservations();
