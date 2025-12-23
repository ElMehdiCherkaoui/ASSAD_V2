let userReservations = [];

function displayUserReservations(reservations) {
    const container = document.getElementById("UserReservedContainer");
    container.innerHTML = "";

    reservations.forEach((r) => {
        const row = `
            <tr>
                <td class="px-6 py-4">${r.userName}</td>
                <td class="px-6 py-4">${r.title}</td>
                <td class="px-6 py-4">${r.reservation_date}</td>
                <td class="px-6 py-4">${r.number_of_people}</td>
                <td class="px-6 py-4"><span class="text-green-600 font-semibold">Confirmed</span></td>
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
        });
}

loadUserReservations();
