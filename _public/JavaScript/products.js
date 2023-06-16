
function addToCart(productId) {
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'php/scripts/addToCartScript.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Hier kannst du die Antwort des Servers verarbeiten
      // z.B. eine Bestätigung anzeigen oder weitere Aktionen ausführen
    }
  };
  xhr.send('products_id=' + productId);
}