document.addEventListener("DOMContentLoaded", () => {
  const searchBox = document.getElementById("searchBox");
  const resultBox = document.getElementById("result");

  // Load all products when page loads
  fetchProducts("");

  // Live filter while typing
  searchBox.addEventListener("keyup", () => {
    fetchProducts(searchBox.value);
  });

  function fetchProducts(keyword) {
    fetch("ajax_search.php?keyword=" + encodeURIComponent(keyword))
      .then((response) => response.text())
      .then((data) => {
        resultBox.innerHTML = data;
      });
  }
});
