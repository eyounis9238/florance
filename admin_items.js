// Retrieve the form and table elements
const newItemForm = document.getElementById("new-item-form");
const itemTable = document.getElementById("item-table").getElementsByTagName("tbody")[0];

// Add a submit event listener to the form
newItemForm.addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent form submission

  // Get the input values
  const itemName = document.getElementById("item-name").value;
  const itemPrice = document.getElementById("item-price").value;
  const itemRating = document.getElementById("item-rating").value;
  const itemImage = document.getElementById("item-image").value;

  // Create a new row in the table
  const newRow = itemTable.insertRow();

  // Create cells for each column
  const nameCell = newRow.insertCell();
  const priceCell = newRow.insertCell();
  const ratingCell = newRow.insertCell();
  const imageCell = newRow.insertCell();
  const actionCell = newRow.insertCell();

  // Set the cell values
  nameCell.textContent = itemName;
  priceCell.textContent = itemPrice;
  ratingCell.textContent = itemRating;
  imageCell.innerHTML = `<img src="${itemImage}" alt="${itemName}" width="100">`;
  actionCell.innerHTML = '<button onclick="approveItem(this)">Approve</button>';

  // Reset the form
  newItemForm.reset();
});

// Function to approve the item
function approveItem(button) {
  const row = button.parentNode.parentNode;
  const itemName = row.cells[0].textContent;
  const itemPrice = row.cells[1].textContent;
  const itemRating = row.cells[2].textContent;
  const itemImage = row.cells[3].querySelector("img").getAttribute("src");

  // Perform any additional logic here to process the approved item

  // Remove the row from the table
  row.remove();
}
