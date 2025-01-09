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

function planetSearch() {
  return {
    planets: [], // Liste des planètes
    searchQuery: "", // Requête de recherche
    filteredPlanets: [], // Résultats filtrés

    async fetchPlanets() {
      try {
        const response = await fetch(
          "https://helldiverstrainingmanual.com/api/v1/planets"
        );
        if (!response.ok) {
          throw new Error(`Erreur HTTP : ${response.status}`);
        }

        // Charger les données et les convertir en tableau
        const data = await response.json();
        this.planets = Object.values(data);
        this.filteredPlanets = this.planets; // Initialiser les résultats
      } catch (error) {
        console.error("Erreur lors du chargement des planètes :", error);
      }
    },

    search() {
      const query = this.searchQuery.toLowerCase();
      this.filteredPlanets = this.planets.filter(
        (planet) =>
          planet.name.toLowerCase().includes(query) ||
          planet.sector.toLowerCase().includes(query)
      );
    },

    init() {
      this.fetchPlanets(); // Charger les planètes lors de l'initialisation
    },
  };
}
const apiUrl = "https://helldiverstrainingmanual.com/api/v1/war/major-orders";

// Fonction pour récupérer les données de l'API
async function fetchMajorOrders() {
  try {
    const response = await fetch(apiUrl);
    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }
    const data = await response.json();
    displayOrders(data);
  } catch (error) {
    document.getElementById(
      "orders"
    ).innerHTML = `<p class="error">Error: ${error.message}</p>`;
  }
}

// Fonction pour afficher les "major orders"
function displayOrders(orders) {
  const ordersContainer = document.getElementById("orders");
  if (orders.length === 0) {
    ordersContainer.innerHTML = "<p>Aucun ordre Prioritaire</p>";
    return;
  }

  const list = document.createElement("ul");
  orders.forEach((order) => {
    const listItem = document.createElement("li");
    listItem.innerHTML = `<strong>${order.name}</strong>: ${order.description}`;
    list.appendChild(listItem);
  });

  ordersContainer.innerHTML = "";
  ordersContainer.appendChild(list);
}

// Charger les données de l'API
fetchMajorOrders();
