function approveUser(id) {
    if (!confirm("Approve this user?")) return;

    fetch(`/youcode/ASSAD/Pages/admin/api/approve.php?id=${id}`)
        .then(res => res.json())
        .then(() => loadUsers());
}
function disableUser(id) {
    if (!confirm("Deactivate this user?")) return;

    fetch(`/youcode/ASSAD/Pages/admin/api/disable.php?id=${id}`)
        .then(res => res.json())
        .then(() => loadUsers());
}

function activateUser(id) {
    if (!confirm("Activate this user?")) return;
    
    fetch(`/youcode/ASSAD/Pages/admin/api/activate.php?id=${id}`)
        .then(res => res.json())
        .then(() => loadUsers());
}

function displayAllUsers(users) {
    const profileContainer = document.getElementById("profileContainer");

    profileContainer.innerHTML = "";

    users.forEach((u) => {
        if (u.userRole === "Admin") { return; };
        let statusClass = "";
        if (u.userStatus === "Active") statusClass = "text-green-500";
        if (u.userStatus === "Pending") statusClass = "text-yellow-500";
        if (u.userStatus === "Disabled") statusClass = "text-red-500";

        let actions = "";

        if (u.userStatus === "Pending") {
            actions = `
                <button onclick="approveUser(${u.Users_id})"
                    class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                    Approve
                </button>
                <button onclick="disableUser(${u.Users_id})"
                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                    Disable
                </button>
            `;
        }
        else if (u.userStatus === "Active") {
            actions = `
                <button onclick="disableUser(${u.Users_id})"
                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                    Deactivate
                </button>
            `;
        }
        else if (u.userStatus === "Disabled") {
            actions = `
                <button onclick="activateUser(${u.Users_id})"
                    class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                    Activate
                </button>
            `;
        }


        const row = `
            <tr>
                <td class="px-6 py-4">${u.Users_id}</td>
                <td class="px-6 py-4">${u.userName}</td>
                <td class="px-6 py-4">${u.userEmail}</td>
                <td class="px-6 py-4">${u.userRole}</td>
                <td class="px-6 py-4 font-semibold ${statusClass}">
                    ${u.userStatus}
                </td>
                <td class="px-6 py-4 space-x-2">
                    ${actions}
                </td>
            </tr>
        `;

        profileContainer.innerHTML += row;
    });
}

function loadUsers() {
    fetch("/youcode/ASSAD/Pages/admin/api/list.php")
        .then(res => res.json())
        .then(data => displayAllUsers(data))
        .catch(err => console.error(err));
}
loadUsers();
