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
document.getElementById("new-pub").addEventListener("click", function () {
  var form = document.getElementById("ajout-pub");
  if (form.style.display === "none" || form.style.display === "") {
    form.style.display = "block";
    this.textContent = "Hide Form";
  } else {
    form.style.display = "none";
    this.textContent = "Show Form";
  }
});
async function fetchNewsData() {
  try {
    const response = await fetch("https://helldiverstrainingmanual.com/api/v1/war/news");
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
      campaignContainer.innerHTML = "<h3>Error loading news. Please try again later.</h3>";
    }
  }
}

fetchNewsData();
