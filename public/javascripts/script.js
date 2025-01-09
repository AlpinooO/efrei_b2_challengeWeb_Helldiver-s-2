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

    console.log("Réponse de l'API:", newsData);

    const campaignContainer = document.getElementById("campaign-container");

    // Vérifiez que l'élément container est bien trouvé

    // Effacez le contenu de campaignContainer pour éviter les doublons
    campaignContainer.innerHTML = `<h3>Latest News</h3>`;

    // Trier les articles par date décroissante (les plus récents en premier)
    const sortedNewsData = newsData.sort((a, b) => b.published - a.published);

    // Limiter à 3 articles
    const latestNews = sortedNewsData.slice(0, 3);

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
            <p>${message}</p>
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
  // Fetch the latest news from the API
  fetch("https://helldiverstrainingmanual.com/api/v1/planets")
    .then((response) => response.json()) // Parse the response as JSON
    .then((data) => {
      console.log("Response Data:", data); // Log the raw data for debugging

      const mapContainer = document.getElementById("map-container");

      if (data && Array.isArray(data) && data.length > 0) {
        // Display data on the map container
        mapContainer.innerHTML = `
                    <h3>Latest War Updates</h3>
                    <ul>
                        ${data
                          .map(
                            (planet) => `
                            <li>
                                <strong>${planet.name}</strong>: ${planet.status} 
                                <br>
                                Coordinates: ${planet.coordinates}
                            </li>
                        `
                          )
                          .join("")}
                    </ul>
                `;
      } else {
        mapContainer.innerHTML = "<h3>No data available</h3>";
      }
    })
    .catch((error) => {
      console.error("Error fetching data:", error);
      const mapContainer = document.getElementById("map-container");
      mapContainer.innerHTML = "<h3>Failed to load data</h3>";
    });
});
