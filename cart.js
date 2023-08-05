$(document).ready(function () {
  // Function to update the cart items and total price
  function updateCart() {
    // Load cart items from localStorage
    let cartItems = loadCartItems();

    let total = 0;
    const cartItemsDiv = $('#cart-items');
    cartItemsDiv.empty();

    cartItems.forEach(item => {
      const itemTotal = item.productPrice * item.quantity;
      total += itemTotal;

      cartItemsDiv.append(`<div class="cart-item">
        <h3>${item.productName}</h3>
        <p>Price: $${item.productPrice.toFixed(2)}</p>
        <p>Quantity: ${item.quantity}</p>
        <p>Total: $${itemTotal.toFixed(2)}</p>
        <button class="delete-button" data-product-id="${item.productId}">Delete</button>
        <button class="update-button" data-product-id="${item.productId}">Update</button>
      </div>`);
    });

    $('#cart-total').text(total.toFixed(2));
  }

  // Function to load cart items from localStorage
  function loadCartItems() {
    const cartItems = localStorage.getItem('cartItems');
    return cartItems ? JSON.parse(cartItems) : [];
  }

  // Function to save cart items to localStorage
  function saveCartItems(cartItems) {
    localStorage.setItem('cartItems', JSON.stringify(cartItems));
  }

  // Handle the form submission to update the quantity
  $('#update-cart-form').submit(function (event) {
    event.preventDefault();
    const newQuantity = parseInt($('#quantity').val());
    if (!isNaN(newQuantity) && newQuantity > 0) {
      let cartItems = loadCartItems();

      const productIdToUpdate = 2; // Change this to the appropriate product ID
      const itemToUpdate = cartItems.find(item => item.productId === productIdToUpdate);
      if (itemToUpdate) {
        itemToUpdate.quantity = newQuantity;
        saveCartItems(cartItems);
        updateCart();
      }
    }
  });

  // Handle the checkout button click
  $('#checkout-button').click(function () {
    // Your checkout process logic goes here...
    // For example, you can redirect to a checkout page, process the payment, etc.
    alert('Checkout process placeholder. Implement your own logic here.');
  });

  // Handle the delete button click
  $(document).on('click', '.delete-button', function () {
    const productIdToDelete = parseInt($(this).data('product-id'));
    let cartItems = loadCartItems();

    const updatedCartItems = cartItems.filter(item => item.productId !== productIdToDelete);
    saveCartItems(updatedCartItems);
    updateCart();
  });

  // Handle the update button click
  $(document).on('click', '.update-button', function () {
    const productIdToUpdate = parseInt($(this).data('product-id'));
    const newQuantity = parseInt(prompt('Enter the new quantity:', '1'));

    if (!isNaN(newQuantity) && newQuantity > 0) {
      let cartItems = loadCartItems();

      const itemToUpdate = cartItems.find(item => item.productId === productIdToUpdate);
      if (itemToUpdate) {
        itemToUpdate.quantity = newQuantity;
        saveCartItems(cartItems);
        updateCart();
      }
    }
  });

  // Initial update of cart items and total price on page load
  updateCart();
});