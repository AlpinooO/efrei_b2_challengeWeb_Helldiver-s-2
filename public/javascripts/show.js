document.getElementById("toggleButton").addEventListener("click", function () {
  var form = document.getElementById("myForm");
  if (form.style.display === "none" || form.style.display === "") {
    form.style.display = "flex";
    this.textContent = "Cacher Form";
  } else {
    form.style.display = "none";
    this.textContent = "Montrer Form";
  }
});
