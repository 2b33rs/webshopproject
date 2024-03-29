
function addToCart(productId) {
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'php/scripts/addToCartScript.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Hier kannst du die Antwort des Servers verarbeiten
      // z.B. eine Bestätigung anzeigen oder weitere Aktionen ausführen
      var toastLiveExample = document.getElementById('liveToast');
      var toast = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
      toast.show();
      reloadCardItems();
    }
  };
  xhr.send('products_id=' + productId);
}

function reloadCardItems() {
  var div = document.getElementById('itemsInCartCounter');
  var value = parseInt(div.innerHTML);
  value++; // Den Wert um 1 erhöhen
  div.innerHTML = value;
}