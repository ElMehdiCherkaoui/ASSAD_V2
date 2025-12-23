const formGuide = document.getElementById("submitButtonGuide");
formGuide.addEventListener("click", (e) => {
    e.preventDefault();

    const title = document.getElementById("title").value;
    const date = document.getElementById("date").value;
    const duration = document.getElementById("duration").value;
    const language = document.getElementById("language").value;
    const capacity = document.getElementById("capacity").value;
    const Status = document.getElementById("Status").value;
    const price = document.getElementById("price").value;

    const formData = new FormData();
    formData.append("title", title);
    formData.append("date", date);
    formData.append("duration", duration);
    formData.append("language", language);
    formData.append("capacity", capacity);
    formData.append("Status", Status);
    formData.append("price", price);

    fetch("/youcode/ASSAD/Pages/guide/api/createGuide.php", {
        method: "POST",
        body: formData
    })
        .then(res => res.json())
        .then(result => {
            if (result.success) {
                alert("Guide added successfully!");
                window.location.href = "/youcode/ASSAD/Pages/guide/list.php";
            } else {
                alert(result.message || "Error: could not save Guide.");
            }
        })
        .catch(err => console.error("Fetch Error:", err));

});
