<?php
session_start();
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
 <!-- Statistics Section -->
 <section id="statistics" class="counter-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-5">
                    <h2 class="animate__animated animate__fadeInUp" style="color:rgb(255, 255, 255);">Food Waste By The Numbers</h2>                        <p class="lead animate__animated animate__fadeInUp">The scale of global food waste presents both challenges and opportunities</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="counter-box animate__animated animate__fadeInUp">
                            <div class="counter-number">
                                <span class="count" data-count="33">0</span>%
                            </div>
                            <div class="counter-title">Of all food produced is wasted globally</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter-box animate__animated animate__fadeInUp animate__delay-1s">
                            <div class="counter-number">
                                <span class="count" data-count="1.3">0</span>B
                            </div>
                            <div class="counter-title">Tons of food wasted annually</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter-box animate__animated animate__fadeInUp animate__delay-2s">
                            <div class="counter-number">
                                <span class="count" data-count="8">0</span>%
                            </div>
                            <div class="counter-title">Of greenhouse gases from food waste</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter-box animate__animated animate__fadeInUp animate__delay-3s">
                            <div class="counter-number">
                                <span class="count" data-count="828">0</span>M
                            </div>
                            <div class="counter-title">People face food insecurity</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    <section id="FoodShortage" class="fade-in">
    <h2>What is Food Shortage?</h2>
    <div class="row">
    <article class="col-sm">
    <figure class="fade-in">
        <img src="/images/Food-shortage.jpg" class = "img-thumbnail" alt="Food shortage"
        title="View larger image..." style="width: 50%; height: auto;"/>
        
        <figcaption>Food Shortage</figcaption>
    </figure>
    <p class="boxed-paragraph fade-in">
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

      <!-- Key Solutions Section -->
      <section id="solutions" class="bg-light py-5 fade-in">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-5">
                        <h2 class="section-title">Key Solutions to Food Waste</h2>
                        <p class="lead">Practical approaches anyone can implement to reduce food waste</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="feature-box fade-in">
                            <i class="fas fa-list-check feature-icon"></i>
                            <h3>Smart Shopping</h3>
                            <p>Plan meals, make shopping lists, and buy only what you need to reduce food waste at home.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="feature-box fade-in">
                            <i class="fas fa-temperature-low feature-icon"></i>
                            <h3>Proper Storage</h3>
                            <p>Learn how to store different foods correctly to extend their shelf life and prevent premature spoilage.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="feature-box fade-in">
                            <i class="fas fa-recycle feature-icon"></i>
                            <h3>Composting</h3>
                            <p>Turn food scraps into nutrient-rich compost for gardens instead of sending them to landfills.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="feature-box fade-in">
                            <i class="fas fa-hands-holding-circle feature-icon"></i>
                            <h3>Food Sharing</h3>
                            <p>Share excess food with neighbors or donate to food banks and community fridges.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="feature-box fade-in">
                            <i class="fas fa-utensils feature-icon"></i>
                            <h3>Creative Cooking</h3>
                            <p>Learn to cook with leftovers and use all parts of ingredients to minimize kitchen waste.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="feature-box fade-in">
                            <i class="fas fa-seedling feature-icon"></i>
                            <h3>Home Gardening</h3>
                            <p>Grow your own food to better appreciate its value and reduce reliance on commercial supply chains.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <section id="Causes" class="fade-in">
        <h2>What we can do to prevent food shortage:</h2>
        <div class="row">
        <article class="col-sm">

        <figure class="fade-in">
            <img src="/images/RecycleFood.jpg" class = "img-thumbnail"  alt="Recycling food"
            title="View larger image..."  style="width: 50%; height: auto;" />

            <figcaption>Recycling food</figcaption>
        </figure> 
        <div class="boxed-paragraph fade-in">
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

        <section id="take-action" class="fade-in">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center mb-5">
                        <h2 class="section-title">Take Action Today</h2>
                        <p class="lead">Join the movement to reduce food waste and help ensure food security for all</p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="boxed-paragraph text-center fade-in">
                            <h3 class="mb-4">Ready to make a difference?</h3>
                            <p>Every small action counts in the fight against food waste and shortage. Start with changes in your daily habits and expand your impact through community involvement.</p>
                            <div class="row mt-5">
                                <div class="col-md-4 mb-4">
                                    <div class="action-step fade-in">
                                        <div class="action-icon mb-3">
                                            <i class="fas fa-home fa-3x text-primary"></i>
                                        </div>
                                        <h4>At Home</h4>
                                        <ul class="text-start">
                                            <li>Create weekly meal plans</li>
                                            <li>Learn proper food storage techniques</li>
                                            <li>Start a compost bin</li>
                                            <li>Use leftovers creatively</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="action-step fade-in">
                                        <div class="action-icon mb-3">
                                            <i class="fas fa-users fa-3x text-primary"></i>
                                        </div>
                                        <h4>In Your Community</h4>
                                        <ul class="text-start">
                                            <li>Volunteer at food banks</li>
                                            <li>Join or start community gardens</li>
                                            <li>Organize food waste workshops</li>
                                            <li>Support local farmers</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="action-step fade-in">
                                        <div class="action-icon mb-3">
                                            <i class="fas fa-globe fa-3x text-primary"></i>
                                        </div>
                                        <h4>Global Impact</h4>
                                        <ul class="text-start">
                                            <li>Support anti-food waste policies</li>
                                            <li>Donate to hunger relief organizations</li>
                                            <li>Spread awareness on social media</li>
                                            <li>Choose eco-friendly products</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <a href="/register.php" class="btn btn-primary btn-lg animate__animated animate__pulse animate__infinite">
                                    <i class="fas fa-hand-holding-heart me-2"></i>Register as Member!
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    include "inc/footer.inc.php";
    ?>
</body>
</html>