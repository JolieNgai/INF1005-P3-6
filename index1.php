<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food 4 Thought</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2E7D32;
            --secondary-color: #81C784;
            --accent-color: #FFC107;
            --text-color: #333;
            --light-bg: #F8F9FA;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            background-color: #FBFBF9;
            overflow-x: hidden;
        }
        
        .custom-body-background {
            background: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(240,255,240,0.9) 100%);
            background-attachment: fixed;
        }
        
        h1, h2, h3, h4 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .navbar {
            background-color: var(--primary-color);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 15px 0;
            transition: all 0.3s ease;
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
        
        header {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('/images/Food-shortage.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .header-content {
            max-width: 800px;
            padding: 0 20px;
        }
        
        .header-content h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            color: white;
        }
        
        .header-content p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 10px 25px;
            font-weight: 500;
            border-radius: 30px;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #1B5E20;
            border-color: #1B5E20;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .btn-outline-light {
            border-radius: 30px;
            padding: 10px 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-outline-light:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        section {
            padding: 5rem 0;
            position: relative;
        }
        
        section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            z-index: -1;
        }
        
        section h2 {
            margin-bottom: 2.5rem;
            position: relative;
            display: inline-block;
            padding-bottom: 10px;
        }
        
        section h2::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 60px;
            height: 3px;
            background-color: var(--accent-color);
        }
        
        .boxed-paragraph {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .boxed-paragraph:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }
        
        figure {
            margin-bottom: 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        figure img {
            width: 100% !important;
            height: auto;
            transition: transform 0.5s ease;
            border-radius: 15px;
        }
        
        figure:hover img {
            transform: scale(1.05);
        }
        
        figcaption {
            padding: 15px;
            background-color: rgba(46,125,50,0.8);
            color: white;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            font-weight: 500;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }
        
        figure:hover figcaption {
            transform: translateY(0);
        }
        
        /* Quiz styling */
        .QuizBtn {
            display: block;
            margin: 2rem auto;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(46,125,50, 0.7);
            }
            70% {
                transform: scale(1.05);
                box-shadow: 0 0 0 10px rgba(46,125,50, 0);
            }
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(46,125,50, 0);
            }
        }
        
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.7);
            transition: all 0.3s ease;
        }
        
        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 30px;
            border: none;
            width: 70%;
            max-width: 600px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            position: relative;
            animation: modalopen 0.5s;
        }
        
        @keyframes modalopen {
            from {opacity: 0; transform: translateY(-60px);}
            to {opacity: 1; transform: translateY(0);}
        }
        
        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        
        .close-btn:hover {
            color: var(--primary-color);
        }
        
        #answerButtons, #answerButtons2 {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }
        
        .answer-btn {
            background-color: white;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            border-radius: 30px;
            padding: 12px 15px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: left;
        }
        
        .answer-btn:hover {
            background-color: var(--light-bg);
        }
        
        .answer-btn.correct {
            background-color: rgba(46,204,113,0.2);
            border-color: #2ecc71;
        }
        
        .answer-btn.incorrect {
            background-color: rgba(231,76,60,0.2);
            border-color: #e74c3c;
        }
        
        /* Feature boxes */
        .feature-box {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
            height: 100%;
        }
        
        .feature-box::before {
            content: '';
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            z-index: -1;
            transform: scale(0);
            transition: transform 0.5s ease;
            border-radius: 20px;
        }
        
        .feature-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            color: white;
        }
        
        .feature-box:hover::before {
            transform: scale(1);
        }
        
        .feature-box:hover h3, .feature-box:hover p, .feature-box:hover i {
            color: white;
            position: relative;
            z-index: 2;
        }
        
        .feature-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            color: var(--primary-color);
            transition: color 0.3s ease;
        }
        
        /* Stats counter section */
        .counter-section {
            background: linear-gradient(rgba(46,125,50,0.85), rgba(46,125,50,0.85)), url('/images/RecycleFood.jpg');
            background-size: cover;
            background-attachment: fixed;
            color: white;
            text-align: center;
            padding: 5rem 0;
        }
        
        .counter-box {
            padding: 30px;
            border-radius: 15px;
            background-color: rgba(255,255,255,0.1);
            backdrop-filter: blur(5px);
            margin-bottom: 30px;
            transition: transform 0.3s ease;
        }
        
        .counter-box:hover {
            transform: translateY(-10px);
        }
        
        .counter-number {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .counter-title {
            font-size: 1.2rem;
            font-weight: 500;
        }
        
        /* Footer styling */
        footer {
            background-color: #333;
            color: white;
            padding: 4rem 0 2rem;
            position: relative;
        }
        
        footer h3 {
            color: white;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 10px;
        }
        
        footer h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 2px;
            background-color: var(--accent-color);
        }
        
        footer p, footer a {
            color: rgba(255,255,255,0.7);
            transition: color 0.3s ease;
        }
        
        footer a:hover {
            color: white;
            text-decoration: none;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links li a {
            display: block;
            transition: all 0.3s ease;
        }
        
        .footer-links li a:hover {
            transform: translateX(5px);
        }
        
        .social-icons {
            list-style: none;
            padding: 0;
            display: flex;
            gap: 15px;
        }
        
        .social-icons li a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        
        .social-icons li a:hover {
            background-color: var(--primary-color);
            transform: translateY(-5px);
        }
        
        .copyright {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        
        /* Animation classes */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
        
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .header-content h1 {
                font-size: 2.5rem;
            }
            
            .modal-content {
                width: 90%;
            }
        }
        
        @media (max-width: 768px) {
            section {
                padding: 3rem 0;
            }
            
            .header-content h1 {
                font-size: 2rem;
            }
            
            .counter-number {
                font-size: 2.5rem;
            }
        }
        
        /* Progress bar on scroll */
        .progress-container {
            position: fixed;
            top: 0;
            z-index: 1100;
            width: 100%;
            height: 5px;
            background: transparent;
        }
        
        .progress-bar {
            height: 5px;
            background: var(--accent-color);
            width: 0%;
        }
    </style>
</head>

<body class="custom-body-background">
    <!-- Progress bar for scrolling -->
    <div class="progress-container">
        <div class="progress-bar" id="progressBar"></div>
    </div>

    <!-- Navigation bar -->
    <?php
    include "inc/nav.inc.php";
    ?>

    <!-- Header bar -->
    <?php
    include "inc/header.inc.php";
    ?>

    <main class="container">
        <!-- Food Shortage Section -->
        <section id="Food-Shortage" class="fade-in">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h2 class="section-title animate__animated animate__fadeInUp">What is Food Shortage?</h2>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <figure class="fade-in">
                        <img src="/images/Food-shortage.jpg" class="img-fluid" alt="Food shortage" title="View larger image..."/>
                        <figcaption>Food Shortage: A Global Crisis</figcaption>
                    </figure>
                </div>
                <div class="col-lg-6">
                    <div class="boxed-paragraph fade-in">
                        <p>
                            A food shortage happens when an area, country or region does not have enough food
                            or enough nutritious food for its population. Typically, a food shortage happens because of 
                            production issues where not enough food is grown or imported to meet a population's energy and nutrient requirements.
                        </p>
                        <p>
                            Food shortages can arise from a complex mix of factors, including natural disasters, climate change, conflict, 
                            economic instability, and unsustainable agricultural practices, all of which can disrupt food production, distribution, and access.
                        </p>
                        <!-- Quiz Button -->
                        <button id="startQuiz1Btn" class="btn btn-primary QuizBtn">
                            <i class="fas fa-question-circle me-2"></i>Test Your Knowledge!
                        </button>
                    </div>
                </div>
            </div>
        </section>

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

        <!-- Prevention Section -->
        <section id="Causes" class="fade-in">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h2 class="section-title animate__animated animate__fadeInUp">What We Can Do To Prevent Food Shortage</h2>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2 mb-4">
                    <figure class="fade-in">
                        <img src="/images/RecycleFood.jpg" class="img-fluid" alt="Recycling food" title="View larger image..."/>
                        <figcaption>Sustainable Food Management</figcaption>
                    </figure>
                </div>
                <div class="col-lg-6 order-lg-1">
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
                        <!-- Quiz Button -->
                        <button id="startQuiz2Btn" class="btn btn-primary QuizBtn">
                            <i class="fas fa-question-circle me-2"></i>Test Your Knowledge 2
                        </button>
                    </div>
                </div>
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

        <!-- Take Action Section -->
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
                                <a href="#" class="btn btn-primary btn-lg animate__animated animate__pulse animate__infinite">
                                    <i class="fas fa-hand-holding-heart me-2"></i>Join Our Newsletter
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Quiz Modals -->
    <div id="quiz1Modal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <div id="quiz1Container">
                <h2 id="questionText"></h2>
                <div id="answerButtons"></div>
            </div>
            <div id="quiz1Result" style="display: none;">
                <h3>Your Score</h3>
                <p>You answered <span id="quiz1Score"></span> out of <span id="quiz1TotalQuestions"></span> questions correctly!</p>
                <button id="retryQuiz1Btn" class="btn btn-warning">Retry Quiz</button>
            </div>
        </div>
    </div>

    <div id="quiz2Modal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <div id="quiz2Container">
                <h2 id="questionText2"></h2>
                <div id="answerButtons2"></div>
            </div>
            <div id="quiz2Result" style="display: none;">
                <h3>Your Score</h3>
                <p>You answered <span id="quiz2Score"></span> out of <span id="quiz2TotalQuestions"></span> questions correctly!</p>
                <button id="retryQuiz2Btn" class="btn btn-warning">Retry Quiz</button>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Quiz 1 Questions
        const quiz1Questions = [
            {
                question: "What is a primary cause of food shortages?",
                answers: [
                    { text: "Excess food production", correct: false },
                    { text: "Climate change and natural disasters", correct: true },
                    { text: "Too many farmers", correct: false },
                    { text: "Decreased global population", correct: false }
                ]
            },
            {
                question: "Which of the following is NOT typically associated with food shortages?",
                answers: [
                    { text: "Economic instability", correct: false },
                    { text: "Sustainable agricultural practices", correct: true },
                    { text: "Conflict and war", correct: false },
                    { text: "Unsustainable farming methods", correct: false }
                ]
            },
            {
                question: "Approximately what percentage of global food production is wasted annually?",
                answers: [
                    { text: "5-10%", correct: false },
                    { text: "15-20%", correct: false },
                    { text: "33%", correct: true },
                    { text: "50-60%", correct: false }
                ]
            }
        ];

        // Quiz 2 Questions
        const quiz2Questions = [
            {
                question: "Which of these is an effective strategy to reduce food waste at home?",
                answers: [
                    { text: "Buy in bulk regardless of needs", correct: false },
                    { text: "Throw away food as soon as it reaches the 'best by' date", correct: false },
                    { text: "Plan meals and make shopping lists", correct: true },
                    { text: "Always store all produce in the refrigerator", correct: false }
                ]
            },
            {
                question: "Why is buying locally and seasonally beneficial?",
                answers: [
                    { text: "It always costs more money", correct: false },
                    { text: "It reduces food miles and transportation emissions", correct: true },
                    { text: "It increases food waste", correct: false },
                    { text: "It has no environmental impact", correct: false }
                ]
            },
            {
                question: "What is composting and why is it important?",
                answers: [
                    { text: "Burning food waste for energy", correct: false },
                    { text: "Turning food scraps into nutrient-rich soil", correct: true },
                    { text: "Preserving food in salt", correct: false },
                    { text: "Freezing food to increase shelf life", correct: false }
                ]
            }
        ];

        // Current question index for each quiz
        let currentQuiz1QuestionIndex = 0;
        let currentQuiz2QuestionIndex = 0;
        let quiz1Score = 0;
        let quiz2Score = 0;

        // Quiz Functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Quiz 1 Elements
            const quiz1Modal = document.getElementById('quiz1Modal');
            const startQuiz1Btn = document.getElementById('startQuiz1Btn');
            const closeBtn1 = quiz1Modal.querySelector('.close-btn');
            const quiz1Container = document.getElementById('quiz1Container');
            const quiz1Result = document.getElementById('quiz1Result');
            const retryQuiz1Btn = document.getElementById('retryQuiz1Btn');
            const questionText = document.getElementById('questionText');
            const answerButtons = document.getElementById('answerButtons');
            const quiz1ScoreElement = document.getElementById('quiz1Score');
            const quiz1TotalElement = document.getElementById('quiz1TotalQuestions');

            // Quiz 2 Elements
            const quiz2Modal = document.getElementById('quiz2Modal');
            const startQuiz2Btn = document.getElementById('startQuiz2Btn');
            const closeBtn2 = quiz2Modal.querySelector('.close-btn');
            const quiz2Container = document.getElementById('quiz2Container');
            const quiz2Result = document.getElementById('quiz2Result');
            const retryQuiz2Btn = document.getElementById('retryQuiz2Btn');
            const questionText2 = document.getElementById('questionText2');
            const answerButtons2 = document.getElementById('answerButtons2');
            const quiz2ScoreElement = document.getElementById('quiz2Score');
            const quiz2TotalElement = document.getElementById('quiz2TotalQuestions');

            // Quiz 1 Event Listeners
            startQuiz1Btn.addEventListener('click', () => {
                quiz1Modal.style.display = 'block';
                startQuiz1();
            });

            closeBtn1.addEventListener('click', () => {
                quiz1Modal.style.display = 'none';
            });

            retryQuiz1Btn.addEventListener('click', () => {
                quiz1Result.style.display = 'none';
                quiz1Container.style.display = 'block';
                quiz1Score = 0;
                currentQuiz1QuestionIndex = 0;
                showQuiz1Question();
            });

            // Quiz 2 Event Listeners
            startQuiz2Btn.addEventListener('click', () => {
                quiz2Modal.style.display = 'block';
                startQuiz2();
            });

            closeBtn2.addEventListener('click', () => {
                quiz2Modal.style.display = 'none';
            });

            retryQuiz2Btn.addEventListener('click', () => {
                quiz2Result.style.display = 'none';
                quiz2Container.style.display = 'block';
                quiz2Score = 0;
                currentQuiz2QuestionIndex = 0;
                showQuiz2Question();
            });

            // Quiz 1 Functions
            function startQuiz1() {
                quiz1Score = 0;
                currentQuiz1QuestionIndex = 0;
                quiz1Container.style.display = 'block';
                quiz1Result.style.display = 'none';
                showQuiz1Question();
            }

            function showQuiz1Question() {
                resetState(answerButtons);
                const currentQuestion = quiz1Questions[currentQuiz1QuestionIndex];
                questionText.textContent = currentQuestion.question;

                currentQuestion.answers.forEach(answer => {
                    const button = document.createElement('button');
                    button.textContent = answer.text;
                    button.classList.add('answer-btn');
                    answerButtons.appendChild(button);

                    if(answer.correct) {
                        button.dataset.correct = answer.correct;
                    }

                    button.addEventListener('click', selectQuiz1Answer);
                });
            }

            function resetState(buttonContainer) {
                while (buttonContainer.firstChild) {
                    buttonContainer.removeChild(buttonContainer.firstChild);
                }
            }

            function selectQuiz1Answer(e) {
                const selectedButton = e.target;
                const isCorrect = selectedButton.dataset.correct === 'true';

                if(isCorrect) {
                    selectedButton.classList.add('correct');
                    quiz1Score++;
                } else {
                    selectedButton.classList.add('incorrect');
                    
                    // Highlight the correct answer
                    Array.from(answerButtons.children).forEach(button => {
                        if(button.dataset.correct === 'true') {
                            button.classList.add('correct');
                        }
                    });
                }

                // Disable all buttons after selection
                Array.from(answerButtons.children).forEach(button => {
                    button.disabled = true;
                });

                // Move to next question after a delay
                setTimeout(() => {
                    currentQuiz1QuestionIndex++;
                    if(currentQuiz1QuestionIndex < quiz1Questions.length) {
                        showQuiz1Question();
                    } else {
                        showQuiz1Result();
                    }
                }, 1500);
            }

            function showQuiz1Result() {
                quiz1Container.style.display = 'none';
                quiz1Result.style.display = 'block';
                quiz1ScoreElement.textContent = quiz1Score;
                quiz1TotalElement.textContent = quiz1Questions.length;
            }

            // Quiz 2 Functions
            function startQuiz2() {
                quiz2Score = 0;
                currentQuiz2QuestionIndex = 0;
                quiz2Container.style.display = 'block';
                quiz2Result.style.display = 'none';
                showQuiz2Question();
            }

            function showQuiz2Question() {
                resetState(answerButtons2);
                const currentQuestion = quiz2Questions[currentQuiz2QuestionIndex];
                questionText2.textContent = currentQuestion.question;

                currentQuestion.answers.forEach(answer => {
                    const button = document.createElement('button');
                    button.textContent = answer.text;
                    button.classList.add('answer-btn');
                    answerButtons2.appendChild(button);

                    if(answer.correct) {
                        button.dataset.correct = answer.correct;
                    }

                    button.addEventListener('click', selectQuiz2Answer);
                });
            }

            function selectQuiz2Answer(e) {
                const selectedButton = e.target;
                const isCorrect = selectedButton.dataset.correct === 'true';

                if(isCorrect) {
                    selectedButton.classList.add('correct');
                    quiz2Score++;
                } else {
                    selectedButton.classList.add('incorrect');
                    
                    // Highlight the correct answer
                    Array.from(answerButtons2.children).forEach(button => {
                        if(button.dataset.correct === 'true') {
                            button.classList.add('correct');
                        }
                    });
                }

                // Disable all buttons after selection
                Array.from(answerButtons2.children).forEach(button => {
                    button.disabled = true;
                });

                // Move to next question after a delay
                setTimeout(() => {
                    currentQuiz2QuestionIndex++;
                    if(currentQuiz2QuestionIndex < quiz2Questions.length) {
                        showQuiz2Question();
                    } else {
                        showQuiz2Result();
                    }
                }, 1500);
            }

            function showQuiz2Result() {
                quiz2Container.style.display = 'none';
                quiz2Result.style.display = 'block';
                quiz2ScoreElement.textContent = quiz2Score;
                quiz2TotalElement.textContent = quiz2Questions.length;
            }

            // Close modal when clicking outside the content
            window.addEventListener('click', (e) => {
                if (e.target === quiz1Modal) {
                    quiz1Modal.style.display = 'none';
                }
                if (e.target === quiz2Modal) {
                    quiz2Modal.style.display = 'none';
                }
            });

            // Progress Bar on Scroll
            window.onscroll = function() {updateProgressBar()};

            function updateProgressBar() {
                const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const scrolled = (winScroll / height) * 100;
                document.getElementById("progressBar").style.width = scrolled + "%";
            }

            // Animation on Scroll
            const fadeElements = document.querySelectorAll('.fade-in');

            function checkFade() {
                fadeElements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const elementVisible = 150;
                    if (elementTop < window.innerHeight - elementVisible) {
                        element.classList.add('visible');
                    }
                });
            }

            window.addEventListener('scroll', checkFade);
            checkFade(); // Initial check on page load

            // Animated Counter
            const counters = document.querySelectorAll('.count');
            const speed = 200;

            const counterSection = document.querySelector('.counter-section');
            let counterActivated = false;

            window.addEventListener('scroll', () => {
                if (counterSection.getBoundingClientRect().top < window.innerHeight - 100 && !counterActivated) {
                    counterActivated = true;
                    
                    counters.forEach(counter => {
                        const updateCount = () => {
                            const target = parseInt(counter.getAttribute('data-count'));
                            const count = parseInt(counter.innerText);
                            const increment = target / speed;

                            if (count < target) {
                                counter.innerText = Math.ceil(count + increment);
                                setTimeout(updateCount, 10);
                            } else {
                                counter.innerText = target;
                            }
                        };
                        updateCount();
                    });
                }
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();

                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);

                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 70,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Navbar Shrink on Scroll
            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('.navbar');
                if (window.scrollY > 50) {
                    navbar.style.padding = '10px 0';
                } else {
                    navbar.style.padding = '15px 0';
                }
            });
        });
    </script>
    
    <!-- Footer bar -->
    <?php
    include "inc/footer.inc.php";
    ?>
</body>
</html>