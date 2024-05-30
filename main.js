document.getElementById('checkoutForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent default form submission

  // Collect form data
  var formData = new FormData(this);
  formData.append('cart', JSON.stringify(window.cart)); // Assuming `cart` is a global variable

  // Send data via AJAX
  fetch('connection.php', {
    method: 'POST',
    body: formData,
  })
   .then(response => response.text())
   .then(data => {
      console.log(data); // Handle response
    })
   .catch(error => {
      console.error('Error:', error);
    });

  // Filter functionality
  const filterButtons = document.querySelectorAll('.filter-button');
  const menuItems = document.querySelectorAll('.menu-item');

  filterButtons.forEach(button => {
    button.addEventListener('click', () => {
      const category = button.getAttribute('data-category');
      menuItems.forEach(item => {
        if (item.getAttribute('data-category') === category) {
          item.classList.remove('hidden');
        } else {
          item.classList.add('hidden');
        }
      });
    });
  });
});