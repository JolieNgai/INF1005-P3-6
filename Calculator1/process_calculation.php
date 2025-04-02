<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Retrieve and validate inputs
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_FLOAT);
    $waste_percentage = filter_input(INPUT_POST, 'waste_percentage', FILTER_VALIDATE_FLOAT);
    $cost_per_unit = filter_input(INPUT_POST, 'cost_per_unit', FILTER_VALIDATE_FLOAT);

    if ($quantity === false || $waste_percentage === false || $cost_per_unit === false) {
        echo json_encode(['error' => 'Invalid input. Please check your values.']);
        exit;
    }

    //Basic Waste Calculation
    //Converting the waste percentage into a decimal and multiplying it by the purchased quantity
    $wasted_amount = $quantity * ($waste_percentage / 100);

    //Multiplying the wasted amount by the cost per unit
    $wasted_cost = $wasted_amount * $cost_per_unit;

    //Environmental Impact Calculations
    $carbon_factor = 2.5; // kg CO2 per kg of wasted food
    $water_factor = 300;  // liters of water per kg of wasted food
    $carbon_emissions = $wasted_amount * $carbon_factor;
    $water_usage = $wasted_amount * $water_factor;

    //Return calculation results as JSON
    $result = [
        'wasted_amount'    => $wasted_amount,
        'wasted_cost'      => $wasted_cost,
        'carbon_emissions' => $carbon_emissions,
        'water_usage'      => $water_usage
    ];
    echo json_encode($result);
} else {
    echo json_encode(['error' => 'Invalid request.']);
}
