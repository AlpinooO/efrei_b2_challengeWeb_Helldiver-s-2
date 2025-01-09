const container = document.getElementById("container");
const registerBtn = document.getElementById("register");
const loginBtn = document.getElementById("login");

registerBtn.addEventListener("click", () => {
  container.classList.add("active");
});

loginBtn.addEventListener("click", () => {
  container.classList.remove("active");
});
document.addEventListener("DOMContentLoaded", () => {
  async function fetchNewsData() {
    const campaignContainer = document.getElementById("campaign-container");

    if (!campaignContainer) {
      console.error("Element #campaign-container not found.");
      return;
    }

    try {
      const response = await fetch(
        "https://helldiverstrainingmanual.com/api/v1/war/news"
      );
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }

      const newsData = await response.json();
      campaignContainer.innerHTML = `<h3>Latest News</h3>`;

      newsData.forEach((news) => {
        const newsItem = document.createElement("div");
        newsItem.classList.add("news-item");
        newsItem.innerHTML = `
                    <h4>${news.title}</h4>
                    <p>${news.description || "No description available."}</p>
                    <small><strong>Date:</strong> ${new Date(
                      news.date
                    ).toLocaleString()}</small>
                `;
        campaignContainer.appendChild(newsItem);
      });
    } catch (error) {
      console.error("Error fetching news data:", error);
      campaignContainer.innerHTML =
        "<h3>Error loading news. Please try again later.</h3>";
    }
  }

  fetchNewsData();
});
