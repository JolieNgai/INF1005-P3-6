<?php include('../inc/head.inc.php'); ?>
<?php include('../inc/nav.inc.php'); ?>

<link rel="stylesheet" href="../css/main.css">

<main class="container my-5">
  <h2>Food Wastage Calculator</h2>
  <form id="calcForm" action="process_calculation.php" method="post" class="needs-validation" novalidate>
    <div class="mb-3">
      <label for="quantity" class="form-label">Quantity of Food Purchased (kg, How heavy the food was):</label>
      <input type="number" step="any" name="quantity" id="quantity" class="form-control" required>
      <div class="invalid-feedback">Please enter the quantity.</div>
    </div>
    <div class="mb-3">
      <label for="waste_percentage" class="form-label">Waste Percentage (%, Out of 100% how much food was):</label>
      <input type="number" step="any" name="waste_percentage" id="waste_percentage" class="form-control" required>
      <div class="invalid-feedback">Please enter the waste percentage.</div>
    </div>
    <div class="mb-3">
      <label for="cost_per_unit" class="form-label">Cost per Unit ($, Cost of food):</label>
      <input type="number" step="any" name="cost_per_unit" id="cost_per_unit" class="form-control" required>
      <div class="invalid-feedback">Please enter the cost per unit.</div>
    </div>
    <button type="submit" class="btn btn-primary">Calculate</button>
  </form>
</main>

<!-- Modal Popup for Showing Calculation Results -->
<div id="resultModal" class="modal" style="display: none;">
  <div class="modal-content">
    <span class="close-btn" id="closeModal" style="font-size: 24px; cursor: pointer; position: absolute; top: 10px; right: 10px;">&times;</span>
    <div id="modalBody">
      
    </div>
  </div>
</div>

<?php include('../inc/footer.inc.php'); ?>

<!-- Inline JavaScript for AJAX and Modal Behavior -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('calcForm');
  const modal = document.getElementById('resultModal');
  const modalBody = document.getElementById('modalBody');
  const closeModal = document.getElementById('closeModal');

  //Intercept form submission
  form.addEventListener('submit', function(e) {
    e.preventDefault(); //Stop default form submission

    const formData = new FormData(form);

    
    fetch('process_calculation.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      //Check if there's an error returned
      if(data.error) {
        alert(data.error);
        return;
      }
      
      //Build the result output string
      const output = `
        <h3>Calculation Results</h3>
        <p><strong>Wasted Amount:</strong> ${data.wasted_amount} kg</p>
        <p><strong>Wasted Cost:</strong> $${parseFloat(data.wasted_cost).toFixed(2)}</p>
        <p><strong>Carbon Emissions:</strong> ${parseFloat(data.carbon_emissions).toFixed(2)} kg CO₂</p>
        <p><strong>Water Usage:</strong> ${parseFloat(data.water_usage).toFixed(0)} liters</p>
      `;
      modalBody.innerHTML = output;
      modal.style.display = 'flex'; 
    })
    .catch(error => {
      console.error('Error:', error);
    });
  });

  //Close modal when the close button is clicked
  closeModal.addEventListener('click', function() {
    modal.style.display = 'none';
  });

  //Close modal if user clicks outside the modal-content
  window.addEventListener('click', function(event) {
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  });
});
</script>
