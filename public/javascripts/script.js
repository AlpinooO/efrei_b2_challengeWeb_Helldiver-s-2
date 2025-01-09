const container = document.getElementById("container");
document.addEventListener("DOMContentLoaded", () => {
  const registerBtn = document.getElementById("register");
  const loginBtn = document.getElementById("login");

  registerBtn.addEventListener("click", () => {
    container.classList.add("active");
  });

  loginBtn.addEventListener("click", () => {
    container.classList.remove("active");
  });
});
async function fetchNewsData() {
  try {
    const response = await fetch("https://helldiverstrainingmanual.com/api/v1/war/news");
    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }
    const newsData = await response.json();

    const campaignContainer = document.getElementById("campaign-container");

    // Vérifiez que l'élément container est bien trouvé

    // Effacez le contenu de campaignContainer pour éviter les doublons
    campaignContainer.innerHTML = `<h3>Dernières Nouveautés</h3>`;

    // Trier les articles par date décroissante (les plus récents en premier)
    const sortedNewsData = newsData.sort((a, b) => b.published - a.published);

    // Limiter à 3 articles
    const latestNews = sortedNewsData.slice(0, 7);

    // Si nous avons des articles, les afficher
    if (latestNews && latestNews.length > 0) {
      latestNews.forEach((news) => {
        console.log("Article de news:", news);
        const newsItem = document.createElement("div");
        newsItem.classList.add("news-item");

        const message = news.message || "Message indisponible";

        const publishedDate = new Date(news.published * 1000);
        const formattedDate = publishedDate.toLocaleString() || "Date inconnue";

        newsItem.innerHTML = `
            <h4>${message}</h4>
            <small><strong>Date:</strong> ${formattedDate}</small>
        `;

        campaignContainer.appendChild(newsItem);
      });
    } else {
      campaignContainer.innerHTML += "<p>No news found.</p>";
    }
  } catch (error) {
    console.error("Error fetching news data:", error);
    const campaignContainer = document.getElementById("campaign-container");
    if (campaignContainer) {
      campaignContainer.innerHTML = "<h3>Error loading news. Please try again later.</h3>";
    }
  }
}

fetchNewsData();
const mapContainer = document.getElementById("map-container"); // Déclaration en haut du script

mapContainer.innerHTML = "<h3>Fetching data...</h3>";
// Appel à l'API pour récupérer les planètes
fetch("https://helldiverstrainingmanual.com/api/v1/planets")
  .then((response) => {
    console.log("Response received:", response);
    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }
    return response.json(); // Parse la réponse en JSON
  })
  .then((data) => {
    console.log("Parsed data:", data);

    // Convertir les données en tableau (si nécessaire)
    const planets = Object.values(data);

    // Vérifier si les données sont valides
    if (planets && planets.length > 0) {
      // Affichage des données
      mapContainer.innerHTML = `
          <h3>Latest War Updates</h3>
          <ul>
            ${planets
              .map(
                (planet) => `
              <li>
                <strong>${planet.name}</strong>: 
                ${
                  planet.biome
                    ? planet.biome.description
                    : "No biome information"
                }
                <br>
                Sector: ${planet.sector}
                <br>
                Environmental Hazards:
                <ul>
                  ${
                    planet.environmentals.length > 0
                      ? planet.environmentals
                          .map(
                            (env) =>
                              `<li><strong>${env.name}</strong>: ${env.description}</li>`
                          )
                          .join("")
                      : "<li>None</li>"
                  }
                </ul>
              </li>
            `
              )
              .join("")}
          </ul>
        `;
    } else {
      console.warn("No data available to display.");
      mapContainer.innerHTML = "<h3>No data available</h3>";
    }
  })
  .catch((error) => {
    console.error("An error occurred:", error);
    mapContainer.innerHTML = "<h3>Failed to load data</h3>";
  });
