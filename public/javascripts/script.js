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
    const response = await fetch(
      "https://helldiverstrainingmanual.com/api/v1/war/news"
    );
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
      campaignContainer.innerHTML =
        "<h3>Error loading news. Please try again later.</h3>";
    }
  }
}

fetchNewsData();
document.addEventListener("DOMContentLoaded", function () {
  console.log("Le DOM est chargé, le script va commencer.");

  async function fetchPlanets() {
    try {
      const response = await fetch("/assets/json/Planet.json");

      if (!response.ok) {
        throw new Error(`Erreur HTTP ! Statut: ${response.status}`);
      }

      const planetsData = await response.json();

      console.log("Réponse de l'API:", planetsData);

      const mapContainer = document.getElementById("map-container");

      if (!mapContainer) {
        console.error("Élément #map-container non trouvé.");
        return;
      }

      mapContainer.innerHTML = `<h3>Planets List</h3>`;

      const planets = Object.values(planetsData);

      if (planets && planets.length > 0) {
        mapContainer.innerHTML += `
          <ul class="planet-list">
            ${planets
              .map(
                (planet) => `
                  <li class="planet-item">
                    <h4>${planet.name}</h4>
                    <p><strong>Sector:</strong> ${planet.sector}</p>
                    ${
                      planet.biome
                        ? `<p><strong>Biome:</strong> ${planet.biome.description}</p>`
                        : ""
                    }
                    ${
                      planet.environmentals.length > 0
                        ? `
                      <ul>
                        ${planet.environmentals
                          .map(
                            (env) =>
                              `<li><strong>${env.name}</strong>: ${env.description}</li>`
                          )
                          .join("")}
                      </ul>
                    `
                        : ""
                    }
                    ${
                      planet.image
                        ? `<img src="${planet.image}" alt="${planet.name} image" class="planet-image">`
                        : ""
                    }
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
    } catch (error) {
      console.error("An error occurred:", error);
      const mapContainer = document.getElementById("map-container");
      if (mapContainer) {
        mapContainer.innerHTML =
          "<h3>Erreur lors du chargement des données. Veuillez réessayer plus tard.</h3>";
      }
    }
  }

  fetchPlanets();
});
