// Function to simulate searching for products
function searchProducts(query) {
  // Placeholder implementation for demonstration purposes
  const products = [
    { id: 1, name: 'Rose', price: 10, rating: 4.5, image: 'rose.jpg' },
    { id: 2, name: 'Lily', price: 8, rating: 4, image: 'lily.jpg' },
    { id: 3, name: 'Tulip', price: 6, rating: 4.2, image: 'tulip.jpg' },
    { id: 4, name: 'Orchid', price: 7, rating: 4.8, image: 'orchid.jpg' },
    { id: 5, name: 'Carnation', price: 7, rating: 4.8, image: 'carnation.jpg' },
    { id: 6, name: 'Dahlia', price: 8, rating: 5, image: 'dahlia.jpg' },
    { id: 7, name: 'Daisy', price: 7.5, rating: 4, image: 'daisy.jpg' },
    { id: 8, name: 'Lavender', price: 8, rating: 4.5, image: 'lavender.jpg' },
    { id: 9, name: 'Buttercup', price: 10, rating: 4.2, image: 'buttercup.jpg' },
    { id: 10, name: 'Marigold', price: 10, rating: 4.7, image: 'marigold.jpg' },
  ];

  // Simulate searching and filtering products based on the query
  const results = products.filter(product =>
    product.name.toLowerCase().includes(query.toLowerCase())
  );

  return results;
}

// Function to display the search results
function displaySearchResults(results) {
  const flowerListContainer = document.querySelector('.flower-list');

  // Clear previous results
  flowerListContainer.innerHTML = '';

  // Create the table element
  const table = document.createElement('table');

  // Create the table header row
  const headerRow = document.createElement('tr');
  const headerNames = ['Image', 'Name', 'Price', 'Rating'];
  headerNames.forEach(headerName => {
    const th = document.createElement('th');
    th.textContent = headerName;
    headerRow.appendChild(th);
  });
  table.appendChild(headerRow);

  // Display each search result in a row
  results.forEach(result => {
    const row = document.createElement('tr');

    // Add the product image
    const imageCell = document.createElement('td');
    const flowerImage = document.createElement('img');
    flowerImage.src = result.image;
    flowerImage.alt = result.name;
    flowerImage.setAttribute('loading', 'lazy');

    // Set the image dimensions
    flowerImage.style.width = '80px';
    flowerImage.style.height = '80px';

    imageCell.appendChild(flowerImage);
    row.appendChild(imageCell);

    // Add the product name
    const nameCell = document.createElement('td');
    nameCell.textContent = result.name;
    row.appendChild(nameCell);

    // Add the product price
    const priceCell = document.createElement('td');
    priceCell.textContent = `$${result.price}`;
    row.appendChild(priceCell);

    // Add the product rating
    const ratingCell = document.createElement('td');
    ratingCell.textContent = `${result.rating} stars`;
    row.appendChild(ratingCell);

    // Add the row to the table
    table.appendChild(row);
  });

  // Append the table to the container
  flowerListContainer.appendChild(table);
}


// Function to handle search form submission
function handleSearchFormSubmit(event) {
  event.preventDefault();

  // Get the search query from the form input
  const searchInput = document.getElementById('search-input');
  const query = searchInput.value.trim();

  // Perform search and display the results
  const searchResults = searchProducts(query);
  displaySearchResults(searchResults);
}

// Get the search form element
const searchForm = document.getElementById('search-form');

// Add event listener to the search form for form submission
searchForm.addEventListener('submit', handleSearchFormSubmit);
