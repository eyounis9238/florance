// Sample cartItems data
const cartItems = [
  {
    name: "Rose",
    price: "$10",
    rating: "4.5",
  },
  {
    name: "Lily",
    price: "$8",
    rating: "4",
  },
  {
    name: "Tulip",
    price: "$6",
    rating: "4.2",
  },
  {
    name: "Orchid",
    price: "$7",
    rating: "4.5",
  },
  {
    name: "Carnation",
    price: "$7",
    rating: "4.8",
  },
  {
    name: "Dahlia",
    price: "$8",
    rating: "5",
  },
  {
    name: "Daisy",
    price: "$7.5",
    rating: "4",
  },
  {
    name: "Lavender",
    price: "$8",
    rating: "4.5",
  },
  {
    name: "Buttercup",
    price: "$10",
    rating: "4.2",
  },
  {
    name: "Marigold",
    price: "$10",
    rating: "4.7",
  },

];

// Function to calculate the total price of the cart
function calculateTotal() {
  let total = 0;

  cartItems.forEach(item => {
    const price = parseFloat(item.price.substring(1)); // Remove the dollar sign and parse the price as a float
    total += price;
  });

  return total.toFixed(2);
}

// Show the cart items in the table format
function renderCartItems() {
  const cartList = document.getElementById('cart-list');

  // Clear the existing cart items
  cartList.innerHTML = '';

  // Create the table header row
  const tableHeader = document.createElement('tr');
  tableHeader.innerHTML = '<th>Product Name</th><th>Price</th><th>Rating</th>';
  cartList.appendChild(tableHeader);

  // Show the cart items in the table
  cartItems.forEach(item => {
    const cartItemRow = document.createElement('tr');
    cartItemRow.innerHTML = `<td>${item.name}</td><td>${item.price}</td><td>${item.rating}</td>`;
    cartList.appendChild(cartItemRow);
  });

  // Calculate the total price
  const cartTotalElement = document.getElementById('cart-total');
  cartTotalElement.textContent = `Total: $${calculateTotal()}`;
}

// Function to handle the checkout process
function checkout() {
  // Empty local storage
  localStorage.removeItem('cartItems');

  // Clear the cart items array
  cartItems = [];

  // Empty cart and update total
  renderCartItems();

  // Show the checkout message
  alert('Thank you for your purchase! Your order has been placed.');
}

// Initial cart items
renderCartItems();

// Attach click event listener to the checkout button
const checkoutButton = document.getElementById('checkout-button');
checkoutButton.addEventListener('click', checkout);
