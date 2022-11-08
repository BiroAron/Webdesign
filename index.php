<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technology Of Tomorrow - Conference</title>
    <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <a href="#" class="logo">TOT<span>.</span></a>
        <div class="menuToggle" onclick="toggleMenu();"></div>
        <ul class="navigation">
            <li><a href="#banner" onclick="toggleMenu();">Home</a></li>
            <li><a href="#about" onclick="toggleMenu();">About</a></li>
            <li><a href="#speakers" onclick="toggleMenu();">Speakers</a></li>
            <li><a href="#faq" onclick="toggleMenu();">FAQ</a></li>
            <li><a href="#contact" onclick="toggleMenu();">Contact</a></li>
            <li><a href="login.php" class="login_btn">Login</a></li>
        </ul>
    </header>

    <section class="banner" id="banner">
        <div class="content">
            <h2>Tecnology Of Tomorrow</h2>
            <p>Virtual Conference</p>
            <div class="countdownContainer">
                <h1 id="headline">2021.10.30</h1>
                <div id="countdown">
                  <ul>
                    <li><span id="days"></span>days</li>
                    <li><span id="hours"></span>Hours</li>
                    <li><span id="minutes"></span>Minutes</li>
                    <li><span id="seconds"></span>Seconds</li>
                  </ul>
              </div>
            <a href="registrationForPresenters.php" class="btn">Sign Up As Presenter</a>
            <a href="registrationForGuests.php" class="btn">Sign Up As Guest</a>
        </div>
    </section>

    <section class="about" id="about">
        <div class="row">
            <div class="col50">
                <h2 class="titleText"><span>A</span>bout Us</h2>
                <p>Because TOT covers all new technologies, our conference and workshops invite you to get intro lessons (or advanced tips and tricks) on technologies like VR Dev, Artificial Intelligence Dev, Blockchain Dev, IoT Dev, Serverless technology, Microservices technology, new JavaScript frameworks, and more.<br></br>
                    This year, TOT will have an expanded DevExec World, which is 2 days of roundtable talks, educational talks, and networking events for engineering managers, tech executives, and lead developers. Additionally, DeveloperWeek will be co-located with ProductWorld and CloudWorld.</p>
                <a href="#" class="btn">Learn More</a>
            </div>
            <div class="col50">
                <div class="imgBox">
                    <img src="picture1.jpg">
                </div>
            </div>
        </div>
    </section>

    <section class="menu" id="speakers">
        <div class="title">
            <h2 class="titleText">Our <span>S</span>peakers</h2>
            <p>These people are just our most well known speakers, there will be plenty more.</p>
        </div>
        <div class="content">
            <div class="box">
                <div class="imgBox">
                    <img src="jeffbezos.jpg">
                </div>
                <div class="text">
                    <h3>Jeff Bezos</h3>
                </div>
            </div>
            <div class="box">
                <div class="imgBox">
                    <img src="markzuckerberg.jpg">
                </div>
                <div class="text">
                    <h3>Mark Zuckerberg</h3>
                </div>
            </div>
            <div class="box">
                <div class="imgBox">
                    <img src="elonmusk.jpg">
                </div>
                <div class="text">
                    <h3>Elon Musk</h3>
                </div>
            </div>
            <div class="box">
                <div class="imgBox">
                    <img src="billgates.jpg">
                </div>
                <div class="text">
                    <h3>Bill Gates</h3>
                </div>
            </div>
            <div class="box">
                <div class="imgBox">
                    <img src="arwindkrishna.jpg">
                </div>
                <div class="text">
                    <h3>Arwind Krishna</h3>
                </div>
            </div>
            <div class="box">
                <div class="imgBox">
                    <img src="reedhastings.jpg">
                </div>
                <div class="text">
                    <h3>Reed Hastings</h3>
                </div>
            </div>
        </div>
        <div class="title">
           <a href="#" class="btn">View All</a>
        </div>
    </section>

    <section class="faq" id="faq">
        <div class="title">
            <h2 class="titleText">Frequently <span>A</span>sked Questions</h2>
        </div>
        <div class="container">
           
            <div class="accordion">
              <div class="accordion-item">
                <a>What are the digital event dates?</a>
                <div class="content">
                  <p>Tecnology of Tomorrow will take place online, kicking off on the morning of September 30, at 8:00 AM in the Pacific Time zone. The event programming will include live segments and Q&A, available across time zones. Visit the homepage to view the event agenda.</p>
                </div>
              </div>
              <div class="accordion-item">
                <a>Who should attend ToT</a>
                <div class="content">
                  <p>Tecnology of Tomorrow is for anyone who is motivated to be on the frontier of innovation and tech. We recognize that the role of IT has shifted considerably, as has the way IT decisions are made. Therefore, our keynotes and sessions are meant for all roles, from developers and IT implementers to those who make large-scale purchasing decisions for enterprise tech and security solutions.</p>
                </div>
              </div>
              <div class="accordion-item">
                <a>What is the digital Code of Conduct?</a>
                <div class="content">
                  <p>We expect all digital event participants to uphold the principles of this Code of Conduct, which covers the main digital event and all related activities. We do not tolerate disruptive or disrespectful behavior, messages, images, or interactions by any party participant, in any form, at any aspect of the program including business and social activities, regardless of location.</p>
                </div>
              </div>
              <div class="accordion-item">
                <a>What are the accesible options for ToT</a>
                <div class="content">
                  <p>We strive to create experiences that are accessible and welcoming to everyone. We have added new features such as American Sign Language interpretation, Audio Description and multi-language simultaneous audio translation (French, German, Japanese, Mandarin & Spanish) to our digital event platform. There is still much to do as we continue to scale our offerings and we want to know what you think.</p>
                </div>
              </div>
              <div class="accordion-item">
                <a>Will I be able to access on-demand content after ToT?</a>
                <div class="content">
                  <p>For the best event experience, make sure you are registered so you can view content during the live event and access all content on-demand after the event is over. As long as you are registered, you will be able to stream on-demand, but sessions will not be enabled for download or offline viewing.</p>
                </div>
              </div>
            </div>
            
          </div>
    </section>

    <section class="testimonials" id="testimonials">
        <div class="title">
            <h2 class="titleText">Our <span>H</span>osts</h2>
            <p>To help our speakers open their perspectives, our emcees will faciliate conversations, moderate  Q&A opportunities, and guide sessions and activities at this year's ToT.</p>
        </div>
        <div class="content">
            <div class="box">
                <div class="imgBox">
                    <img src="man1.jpg">
                </div>
                <div class="text">
                    <p>As emcee, Jack will introduce and help conduct interactions with this year's special guests. Currently a soluton architecht at ToT, he has also used her passion for teaching as a system administrator in higher education, as a host of an online meetup teaching Python, and as a part-time teaching assistant for a cybersecurity bootcamp.</p>
                   <h3>Jack Pott</h3>
                </div>
            </div>
            <div class="box">
                <div class="imgBox">
                    <img src="man2.jpg">
                </div>
                <div class="text">
                    <p>By introducing presentations azd leading Q&A segments, Joe will serve as our emcee for keynote sessions. As a Chief Architect of Transformation and Adoption at ToT he has relies on her extensive experience in automation, containers, and application services to help clients in a number of industries modernize culture and improve business processes.</p>
                   <h3>Joe King</h3>
                </div>
            </div>
        </div>
    </section>


    <section class="contact" id="contact">
        <div class="title">
            <h2 class="titleText"><span>C</span>ontact Us</h2>
            <p>If you want to say something, now is the chance.</p>
        </div>
        <div class="contactForm">
            <h3>Send Message</h3>
            <div class="inputBox">
                <input type="text" placeholder="Name" id="name" onblur="checkNameValidity()">
            </div>
            <div class="inputBox">
                <input type="text" id="email" placeholder="email" onblur="checkEmailValidity()">
            </div>
            <div class="inputBox">
                <input type="text" placeholder="Message" id="message" onblur="checkMessageValidity()"></input>
            </div>
            <div class="inputBox">
                <input type="submit" value="send" id="submitButton">
            </div>
        </div>
    </section>

    <div class="copyrightText">
        <p><div class="5">Copyrigt 2021 <a href="linkedin.com/in/biró-áron-715b23195">Biró Áron</a>. All Rights Reserved</div></p>
    </div>

    <script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
    <script  src="function.js"></script>
    <script src="script1.js"></script>
</body>
</html>