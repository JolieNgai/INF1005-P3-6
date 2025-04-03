<!DOCTYPE html>
<html lang="en">
<head>
  <title>Food Wastage Calculator</title>
  
  <?php include('inc/head.inc.php'); ?>
</head>
<body class="calc-bg">
  <?php include('inc/nav.inc.php'); ?>
  <!-- Main container with two panels: left for the form and right for results -->
  <main class="calculator-container">
    <!-- LEFT PANEL: Calculator Form -->
    <div class="calc-left">
      <h2>Food Wastage Calculator</h2>
      <p>
        Find out how much food wastage impacts the environment! Check how it impacts Carbon Emissions and Water Usage.
      </p>
      <form id="calcForm" action="process_calculation.php" method="post" class="needs-validation" novalidate>
        <div class="form-group mb-3">
          <label for="quantity" class="form-label">Quantity of Food Purchased (kg):</label>
          <input type="number" step="any" name="quantity" id="quantity" class="form-control" required>
          <div class="invalid-feedback">Please enter the quantity.</div>
        </div>
        <div class="form-group mb-3">
          <label for="waste_percentage" class="form-label">Waste Percentage (%):</label>
          <input type="number" step="any" name="waste_percentage" id="waste_percentage" class="form-control" required>
          <div class="invalid-feedback">Please enter the waste percentage.</div>
        </div>
        <div class="form-group mb-3">
          <label for="cost_per_unit" class="form-label">Cost per Kg ($):</label>
          <input type="number" step="any" name="cost_per_unit" id="cost_per_unit" class="form-control" required>
          <div class="invalid-feedback">Please enter the cost per unit.</div>
        </div>
        <button type="submit" class="calculate-btn btn btn-primary">Calculate</button>
      </form>
    </div>

    <!-- RIGHT PANEL: Results Display -->
    <div class="calc-right">
      <div class="results-container">
        <h3>Let's Take a Look at the Impact!</h3>
        <p><strong>Wasted Amount:</strong> <span id="wasted_amount">0</span> kg</p>
        <p><strong>Wasted Cost:</strong> $<span id="wasted_cost">0.00</span></p>
        <p><strong>Carbon Emissions:</strong> <span id="carbon_emissions">0</span> kg CO₂</p>
        <p><strong>Water Usage:</strong> <span id="water_usage">0</span> liters</p>
      </div>
    </div>
  </main>

  <?php include('inc/footer.inc.php'); ?>

<script src="../js/calc.js"></script>
</body>
</html>
