<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Wastage Calculator</title>
  
  <!-- Link to your CSS file -->
  <link rel="stylesheet" href="../css/main.css">
  <?php include('../inc/head.inc.php'); ?>
  <?php include('../inc/nav.inc.php'); ?>
  
  <!-- Inline styles to match your site styling -->
  <style>
    :root {
      --primary-color: #2E7D32;
      --secondary-color: #81C784;
      --accent-color: #FFC107;
      --text-color: #333;
      --light-bg: #F8F9FA;
    }
    
    body.calc-bg {
      font-family: 'Poppins', sans-serif;
      color: var(--text-color);
      background-color: #FBFBF9;
      margin: 0;
      padding-top: 80px; /* Create space for fixed navbar */
      overflow-x: hidden;
    }
    
    .navbar {
      background-color: var(--primary-color);
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      padding: 15px 0;
      transition: all 0.3s ease;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
    }
    
    .navbar-brand {
      font-weight: 700;
      font-size: 1.8rem;
      color: white !important;
    }
    
    .navbar-nav .nav-link {
      color: white !important;
      margin: 0 10px;
      font-weight: 500;
      position: relative;
      transition: all 0.3s ease;
    }
    
    .navbar-nav .nav-link::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      background: var(--accent-color);
      bottom: -3px;
      left: 0;
      transition: width 0.3s ease;
    }
    
    .navbar-nav .nav-link:hover::after {
      width: 100%;
    }
    
    /* Calculator specific styling */
    .calculator-container {
      display: flex;
      max-width: 1200px;
      margin: 2rem auto;
      gap: 2rem;
      padding: 0 1.5rem;
    }
    
    @media (max-width: 768px) {
      .calculator-container {
        flex-direction: column;
      }
    }
    
    .calc-left {
      flex: 1;
      background-color: white;
      padding: 2rem;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .calc-left:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    }
    
    .calc-left h2 {
      font-family: 'Montserrat', sans-serif;
      font-weight: 700;
      color: var(--primary-color);
      margin-bottom: 1.5rem;
      position: relative;
      display: inline-block;
      padding-bottom: 10px;
    }
    
    .calc-left h2::after {
      content: '';
      position: absolute;
      left: 0;
      bottom: 0;
      width: 60px;
      height: 3px;
      background-color: var(--accent-color);
    }
    
    .calc-right {
      flex: 1;
      background-color: white;
      padding: 2rem;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.05);
      transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .calc-right:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    }
    
    .results-container h3 {
      font-family: 'Montserrat', sans-serif;
      font-weight: 700;
      color: var(--primary-color);
      margin-bottom: 1.5rem;
      position: relative;
      display: inline-block;
      padding-bottom: 10px;
    }
    
    .results-container h3::after {
      content: '';
      position: absolute;
      left: 0;
      bottom: 0;
      width: 40px;
      height: 3px;
      background-color: var(--accent-color);
    }
    
    .form-group {
      margin-bottom: 1.5rem;
    }
    
    .form-label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 600;
      color: var(--text-color);
    }
    
    .form-control {
      width: 100%;
      padding: 0.75rem;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-sizing: border-box;
      transition: all 0.3s ease;
    }
    
    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(46,125,50,0.2);
      outline: none;
    }
    
    .calculate-btn {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
      color: white;
      padding: 10px 25px;
      font-weight: 500;
      border-radius: 30px;
      transition: all 0.3s ease;
      cursor: pointer;
      width: 100%;
      border: none;
    }
    
    .calculate-btn:hover {
      background-color: #1B5E20;
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .copyright {
      text-align: center;
      margin: 2rem 0;
      color: #666;
      padding-top: 1rem;
      border-top: 1px solid #eee;
    }
    
    /* Animation for results */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    .results-container p {
      animation: fadeIn 0.5s ease forwards;
      opacity: 0;
      animation-delay: calc(var(--i) * 0.1s);
    }
    
    .results-container p:nth-child(1) { --i: 1; }
    .results-container p:nth-child(2) { --i: 2; }
    .results-container p:nth-child(3) { --i: 3; }
    .results-container p:nth-child(4) { --i: 4; }
  </style>
</head>
<body class="calc-bg">

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
  <div class="copyright">
    <p>&copy; 2025 Food 4 Thought. All Rights Reserved.</p>
  </div>
  <!-- ?php include('../inc/footer.inc.php'); ?> -->

  <!-- Inline JavaScript for AJAX and Results Panel Background Change -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('calcForm');
      
      form.addEventListener('submit', function(e) {
        e.preventDefault(); // Stop default form submission
        const formData = new FormData(form);
        
        fetch('process_calculation.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if(data.error) {
            alert(data.error);
            return;
          }
          // Update the results text
          document.getElementById('wasted_amount').textContent = data.wasted_amount;
          document.getElementById('wasted_cost').textContent = parseFloat(data.wasted_cost).toFixed(2);
          document.getElementById('carbon_emissions').textContent = parseFloat(data.carbon_emissions).toFixed(2);
          document.getElementById('water_usage').textContent = parseFloat(data.water_usage).toFixed(0);
          
          // Change the calculation results container background after results
          document.querySelector('.calc-right').style.backgroundColor = '#E8F5E9';
        })
        .catch(error => console.error('Error:', error));
      });
    });
  </script>
</body>
</html>