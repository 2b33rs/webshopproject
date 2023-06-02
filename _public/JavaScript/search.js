document.addEventListener('DOMContentLoaded', function () {
    var searchButton = document.getElementById('search-button');
    searchButton.addEventListener('click', performSearch);
});

function performSearch() {
    var searchInput = document.getElementById('search-input').value;
    var searchResultsContainer = document.getElementById('search-results');
    searchResultsContainer.innerHTML = 'Loading...';

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'search.php?searchTerm=' + searchInput, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var products = JSON.parse(xhr.responseText);
            displayResults(products);
        }
    };
    xhr.send();
}

function displayResults(products) {
    var searchResultsContainer = document.getElementById('search-results');
    searchResultsContainer.innerHTML = '';

    if (products.length === 0) {
        searchResultsContainer.innerHTML = 'No results found.';
    } else {
        var ul = document.createElement('ul');
        ul.className = 'list-group';

        products.forEach(function (product) {
            var li = document.createElement('li');
            li.className = 'list-group-item';
            li.innerHTML = '<h5>' + product.name + '</h5><p>' + product.description + '</p>';
            ul.appendChild(li);
        });

        searchResultsContainer.appendChild(ul);
    }
}