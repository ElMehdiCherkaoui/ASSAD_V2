function displayReservations(reservations) {
    const container = document.getElementById("ReservationContainer");
    container.innerHTML = "";

    reservations.forEach(r => {
        container.innerHTML += `
            <tr>
                <td class="px-6 py-4">${r.number_of_people}</td>
                <td class="px-6 py-4 text-green-600 font-semibold">Confirmed</td>
                <td class="px-6 py-4">
                    <a class="text-red-500 font-semibold hover:underline" href="#">Cancel</a>
                </td>
                <td class="px-6 py-4">
                    <button onclick="openCommentForm(${r.guided_id}, '${r.title}')" 
                        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                        Comment / Rate
                    </button>
                </td>
            </tr>
        `;
    });
}

function loadReservations() {
    fetch("/youcode/ASSAD/Pages/visitsLogged/api/listUserReservations.php")
        .then(res => res.json())
        .then(data => {
            displayReservations(data);
        })
        .catch(err => console.error("Failed to load reservations:", err));
}


function openCommentForm(reservationId, tourName) {
    document.getElementById('modalReservationId').value = reservationId;
    document.getElementById('modalTourName').textContent = "Comment / Rate: " + tourName;
    document.getElementById('commentModal').classList.remove('hidden');
}


function closeCommentForm() {
    document.getElementById('commentModal').classList.add('hidden');
}

function submitComment() {
    const reservationId = document.getElementById('modalReservationId').value;
    const comment = document.getElementById('commentText').value;
    const rating = document.getElementById('rating').value;

    if (!comment || !rating) {
        alert("Please enter a comment and select a rating.");
        return;
    }

    const formData = new FormData();
    formData.append("reservation_id", reservationId);
    formData.append("comment", comment);
    formData.append("rating", rating);

    fetch("/youcode/ASSAD/Pages/visitsLogged/api/submitComment.php", {
        method: "POST",
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert("Comment submitted successfully!");
                closeCommentForm();
                document.getElementById('commentText').value = '';
                document.getElementById('rating').value = '';
            } else {
                alert("Failed to submit comment.");
            }
        })
        .catch(err => console.error(err));

}

loadReservations();
