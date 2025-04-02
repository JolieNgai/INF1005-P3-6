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
        document.querySelector('.calc-right').style.backgroundColor = '#71a294';
      })
      .catch(error => console.error('Error:', error));
    });
  });