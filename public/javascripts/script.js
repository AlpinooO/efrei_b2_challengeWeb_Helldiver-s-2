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
    if (!campaignContainer) {
      console.error("Element #campaign-container non trouvé");
      return;
    }

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
  console.log("Le script est bien chargé.");

  async function fetchWarStatus() {
    try {
      const response = await fetch(
        "https://helldiverstrainingmanual.com/api/v1/war/status"
      );

      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }

      const statusData = await response.json();

      console.log("Réponse de l'API:", statusData);

      // Utilisez l'ID correct, ici c'est "status-container" par exemple
      const statusContainer = document.getElementById("status-container");

      if (!statusContainer) {
        console.error("Element #status-container non trouvé");
        return;
      }

      statusContainer.innerHTML = `<h3>Status de la guerre</h3>`;

      if (statusData && statusData.status) {
        statusContainer.innerHTML += `
          <p><strong>Status:</strong> ${statusData.status}</p>
          <p><strong>Timestamp:</strong> ${new Date(
            statusData.timestamp
          ).toLocaleString()}</p>
        `;
      } else {
        statusContainer.innerHTML += "<p>Aucune donnée disponible.</p>";
      }
    } catch (error) {
      console.error(
        "Erreur lors de la récupération du statut de la guerre:",
        error
      );
      const statusContainer = document.getElementById("status-container");
      if (statusContainer) {
        statusContainer.innerHTML =
          "<h3>Erreur lors du chargement du statut de la guerre. Essayez de nouveau plus tard.</h3>";
      }
    }
  }

  fetchWarStatus();
});
