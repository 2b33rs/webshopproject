var timeout;

function resetTimer() {
  clearTimeout(timeout);
  timeout = setTimeout(function() {
    alert("Logout");
    // Füge hier den Code für den Logout-Prozess hinzu
  }, 5000); // 5000 Millisekunden entsprechen 5 Sekunden
}

// Event-Listener für Mausbewegung und Tastendrücke
document.addEventListener("mousemove", resetTimer);
document.addEventListener("keypress", resetTimer);

// Starte den Timer, wenn das Skript geladen wird
resetTimer();

// Dauerschleife
setInterval(function() {
  // Führe hier den Code aus, der im Hintergrund laufen soll
  console.log("Die Dauerschleife wird ausgeführt.");
}, 1000); // 1000 Millisekunden entsprechen 1 Sekunde
