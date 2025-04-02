<?php
session_start();
echo '<pre>'; print_r($_SESSION); echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Food 4 Thought</title>
    <?php 
    include "inc/head.inc.php";
    ?>
</head>

<body class="custom-body-background">
    <?php
    include "inc/nav.inc.php";
    ?>
    <?php
    include "inc/header.inc.php";

    ?>
    <main class="container">
        
    <section id="Food Shortage">
    <h2>What is Food Shortage?</h2>
    <div class="row">
    <article class="col-sm">
    <figure>
        <img src="/images/Food-shortage.jpg" class = "img-thumbnail" alt="Food shortage"
        title="View larger image..." style="width: 50%; height: auto;"/>
        
        <figcaption>Food Shortage</figcaption>
    </figure>
    <p class="boxed-paragraph">
    A food shortage happens when an area, country or region does not have enough food
    or enough nutritious food for its population. Typically, a food shortage happens because of 
    production issues where not enough food is grown or imported to meet a population's energy and nutrient requirements.
    Food shortages can arise from a complex mix of factors, including natural disasters, climate change, conflict, 
    economic instability, and unsustainable agricultural practices, all of which can disrupt food production, distribution, and access.

    <!-- Modal for Quiz 1 -->
<div id="quiz1Modal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <div id="quiz1Container">
            <h2 id="questionText"></h2> <!-- Question will be displayed here -->
            <div id="answerButtons"></div> <!-- Answer buttons will be here -->
        </div>
        <div id="quiz1Result" style="display: none;">
            <h3>Your Score</h3>
            <p>You answered <span id="quiz1Score"></span> out of <span id="quiz1TotalQuestions"></span> questions correctly!</p>
            <button id="retryQuiz1Btn" class="btn btn-warning">Retry Quiz</button>
        </div>
    </div>
</div>

<!-- Button to start Quiz 1 -->
<button id="startQuiz1Btn" class="btn btn-primary QuizBtn">Test Your Knowledge!</button>
    </p>
    </article>
    </div>
    </section>
    <section id="Causes">
        <h2>What we can do to prevent food shortage:</h2>
        <div class="row">
        <article class="col-sm">

        <figure>
            <img src="/images/RecycleFood.jpg" class = "img-thumbnail"  alt="Recycling food"
            title="View larger image..."  style="width: 50%; height: auto;" />

            <figcaption>Recycling food</figcaption>
        </figure> 
        <div class="boxed-paragraph">
    <p>To prevent food shortages, we can focus on reducing food waste, investing in sustainable agriculture, 
    diversifying food sources, improving infrastructure, and supporting vulnerable populations.</p>

    <p><strong>1. Reduce Food Waste:</strong></p>
    <ul>
        <li><strong>Household Level:</strong> Plan meals, store food properly, and only buy what you need.</li>
        <li><strong>Supply Chain Level:</strong> Improve storage and transportation infrastructure to minimize spoilage.</li>
        <li><strong>Redistribution:</strong> Donate surplus food to food banks and shelters.</li>
        <li><strong>Compost:</strong> Instead of throwing away food scraps, compost them to create nutrient-rich soil for gardening.</li>
    </ul>

    <p><strong>2. Buy Locally and Seasonally:</strong></p>
    <ul>
        <li>Support local farmers by purchasing food directly from local markets to reduce food miles and promote sustainable farming practices.</li>
        <li>Consume fruits and vegetables that are in season to reduce the energy and resources needed to grow and transport out-of-season produce.</li>
    </ul>

    <p><strong>3. Conserve Water and Energy:</strong></p>
    <ul>
        <li>Use water-saving techniques when cooking or growing food (e.g., using less water to wash fruits or vegetables).</li>
        <li>Avoid wasting energy by using the right pot size, covering pots with lids to conserve heat, and using energy-efficient cooking methods.</li>
    </ul>

    <p><strong>4. Support Sustainable Agriculture:</strong></p>
    <ul>
        <li>Choose organic or sustainably grown products that minimize environmental impact.</li>
    </ul>
    </div>
<!-- Modal for Quiz 2 -->
<div id="quiz2Modal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <div id="quiz2Container">
            <h2 id="questionText2"></h2> <!-- Question will be displayed here -->
            <div id="answerButtons2"></div> <!-- Answer buttons will be here -->
        </div>
        <div id="quiz2Result" style="display: none;">
            <h3>Your Score</h3>
            <p>You answered <span id="quiz2Score"></span> out of <span id="quiz2TotalQuestions"></span> questions correctly!</p>
            <button id="retryQuiz2Btn" class="btn btn-warning">Retry Quiz</button>
        </div>
    </div>
</div>

<!-- Button to start Quiz 2 -->
<button id="startQuiz2Btn" class="btn btn-primary QuizBtn">Test Your Knowledge 2</button>
        </article>
        </div>
        </section>
    </main>
    <?php
    include "inc/footer.inc.php";
    ?>
</body>
</html>