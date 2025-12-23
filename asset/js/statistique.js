fetch("/youcode/ASSAD/Pages/admin/api/getStatistics.php")
  .then(res => res.json())
  .then(data => {
      document.getElementById("totalVisitors").textContent = data.totalVisitors;
      document.getElementById("totalAnimals").textContent = data.totalAnimals;

      let countryHtml = "";
      data.visitorsByCountry.forEach(v => {
          countryHtml += `<tr><td class="px-4 py-2">${v.country}</td><td class="px-4 py-2">${v.total}</td></tr>`;
      });
      document.getElementById("visitorsByCountry").innerHTML = countryHtml;

      let animalsHtml = "";
      data.topAnimals.forEach(a => {
          animalsHtml += `<tr><td class="px-4 py-2">${a.name}</td></tr>`;
      });
      document.getElementById("topAnimals").innerHTML = animalsHtml;

      let toursHtml = "";
      data.topTours.forEach(t => {
          toursHtml += `<tr><td class="px-4 py-2">${t.title}</td><td class="px-4 py-2">${t.reservations}</td></tr>`;
      });
      document.getElementById("topTours").innerHTML = toursHtml;
  })
  .catch(err => console.error("Failed to load stats:", err));
