$(document).ready(function () {
  // Function to load cart items from localStorage
  function loadCartItems() {
    const cartItems = localStorage.getItem('cartItems');
    return cartItems ? JSON.parse(cartItems) : [];
  }

  // Function to save cart items to localStorage
  function saveCartItems(cartItems) {
    localStorage.setItem('cartItems', JSON.stringify(cartItems));
  }

  // Add item to the cart
  $('.add-to-cart-button').click(function () {
    const productName = $(this).data('product-name');
    const productPrice = parseFloat($(this).data('product-price'));
    const productId = parseInt($(this).data('product-id'));

    // Load existing cart items from localStorage
    let cartItems = loadCartItems();

    // Check if the item is already in the cart
    let found = false;
    cartItems.forEach(item => {
      if (item.productId === productId) {
        item.quantity++;
        found = true;
      }
    });

    // If the item is not in the cart, add it
    if (!found) {
      cartItems.push({
        productId,
        productName,
        productPrice,
        quantity: 1
      });
    }

    // Save updated cart items to localStorage
    saveCartItems(cartItems);
  });

  // ... (other code remains the same)
});
