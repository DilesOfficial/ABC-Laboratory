<?php
@include 'config.php';
session_start();

$db = new mysqli("localhost", "root","","abc") or die('connection failed');

if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($db, $_POST['name']);
   $email = mysqli_real_escape_string($db, $_POST['email']);
   $number = $_POST['number'];
   $date = $_POST['date'];

   $insert = mysqli_query($db, "INSERT INTO `contact_form`(name, email, number, date) VALUES('$name','$email','$number',
   '$date')") or die('query failed');

   if($insert){
      $message[] = 'appointment made successfully!';
   }else{
      $message[] = 'appointment failed';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Arogya Health Care Hospital</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"><!--font awesome cdn link  -->
    <link rel="stylesheet" href="css/style.css">     <!-- custom css file link  -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');

:root{
    --green:#177C16; 
    --black:#0C1A07;
    --light-color:#212420;
    --box-shadow:.5rem .5rem 0 rgba(22, 160, 133, .2);
    --border:.2rem solid var(--green);
}

*{
    font-family: 'Poppins', sans-serif;
    margin:0; padding: 0;
    box-sizing: border-box;
    outline: none; border: none;
    text-transform: capitalize;
    transition: all .2s ease-out;
    text-decoration: none;
}

html{
    font-size: 62.5%;
    overflow-x: hidden;
    scroll-padding-top: 7rem;
    scroll-behavior: smooth;
}

section{
    padding:2rem 9%;
}
section:nth-child(even){
    background: #E3FADE;
}

.heading{
    text-align: center;
    padding-bottom: 2rem;
    text-shadow: var(--text-shadow);
    text-transform: uppercase;
    color:var(--black);
    font-size: 4.3rem;
    letter-spacing: .4rem;
}

.heading span{
    text-transform: uppercase;
    color:var(--green);
}

.btn{
    display: inline-block;
    margin-top: 1rem;
    margin-right: 60px; 
    padding: .5rem;
    padding-left: 3rem;
    border:var(--border);
    border-radius: .5rem;
    box-shadow: var(--box-shadow);
    color:var(--green);
    cursor: pointer;
    font-size: 1.7rem;
    background: #E3FADE;
}

.btn span{
    padding:.7rem 1rem;
    border-radius: .5rem;
    background: var(--green);
    color:#fff;
    margin-left: .5rem;
}
.btn:hover{
    background: var(--green);
    color:#fff;
}

.btn:hover span{
    color: var(--green);
    background:#fff;
    margin-left: 1rem;
}

.header{
    padding:2rem 9%;
    position: fixed;
    top:0; left: 0; right: 0;
    z-index: 1000;
    box-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, .1);
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #08C449;
}

.header .logo{
    font-size: 2.5rem;
    color: var(--black);
}

.header .logo i{
    color: #c0392b;
}

.header .navbar a{
    font-size: 1.7rem;
    color: var(--light-color);
    margin-left: 2rem;
}

.header .navbar a:hover{
    color:#1C211C;
}

#menu-btn{
    font-size: 2.5rem;
    border-radius: .5rem;
    background: var(--green);
    color:#fff;
    padding: 1rem 1.5rem;
    cursor: pointer;
    display: none;
    margin-left: -60px;
}

.home{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap:1rem;
    padding-top: 10rem;

}

.home .image{
    flex:1 1 45rem;
    margin: 10px 20px 30px -40px;
}

.home .image img{
    width: 100%;
}
.home .content{
    flex:1 1 56rem;
}

.home .content h3{
    font-size: 4.7rem;
    color:var(--black);
    line-height: 1.8;
    text-shadow: var(--text-shadow);
    margin-top: 1px;
}

.home .content p{
    font-size: 1.8rem;
    color:var(--light-color);
    line-height: 1.8;
    padding: 1rem 0;
}

.icons-container{
    display: grid;
    gap:2rem;
    grid-template-columns: repeat(auto-fit, minmax(20rem, 1fr));
    padding-top: 5rem;
    padding-bottom: 5rem;
}

.icons-container .icons{
    border:var(--border);
    box-shadow: var(--box-shadow);
    border-radius: .5rem;
    text-align: center;
    padding: 2.5rem;
}
.icons-container .icons i{
    font-size: 4.5rem;
    color:var(--green);
    padding-bottom: .7rem;
}

.icons-container .icons h3{
    font-size: 4rem;
    color:var(--black);
    padding: .5rem 0;
    text-shadow: var(--text-shadow);
}
.icons-container .icons p{
    font-size: 1.7rem;
    color:var(--light-color);
}

.about .row{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap:2rem;
}

.about .row .image{
    flex:1 1 45rem;
}
.about .row .image img{
    width: 100%;
}
.about .row .content{
    flex:1 1 45rem;
}

.about .row .content h3{
    color: var(--black);
    text-shadow: var(--text-shadow);
    font-size: 2.9rem;
    line-height: 1.8;
}

.about .row .content p{
    color: var(--light-color);
    padding:1rem 0;
    font-size: 1.5rem;
    line-height: 1.8;
}

.services .box-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(27rem, 1fr));
    gap:2rem;
}

.services .box-container .box{
    background:#fff;
    border-radius: .5rem;
    box-shadow: var(--box-shadow);
    border:var(--border);
    padding: 2.5rem;
}

.services .box-container .box i{
    color: var(--green);
    font-size: 5rem;
    padding-bottom: .5rem;
}

.services .box-container .box h3{
    color: var(--black);
    font-size: 2.5rem;
    padding:1rem 0;
}

.services .box-container .box p{
    color: var(--light-color);
    font-size: 1.4rem;
    line-height: 2;
}

.doctors .box-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
    gap:2rem;
}

.doctors .box-container .box{
    text-align: center;
    background:#fff;
    border-radius: .5rem;
    border:var(--border);
    box-shadow: var(--box-shadow);
    padding:2rem;
}

.doctors .box-container .box img{
    height: 20rem;
    border:var(--border);
    border-radius: .5rem;
    margin-top: 1rem;
    margin-bottom: 1rem;
}

.doctors .box-container .box h3{
    color:var(--black);
    font-size: 2.5rem;
}
.doctors .box-container .box span{
    color:var(--green);
    font-size: 1.5rem;
}
.doctors .box-container .box .share{
    padding-top: 2rem;
}

.doctors .box-container .box .share a{
    height: 5rem;
    width: 5rem;
    line-height: 4.5rem;
    font-size: 2rem;
    color:var(--green);
    border-radius: .5rem;
    border:var(--border);
    margin:.3rem;
}

.doctors .box-container .box .share a:hover{
    background:var(--green);
    color:#fff;
    box-shadow: var(--box-shadow);
}

.appointment .row{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap:2rem;
    padding-left:20rem;
    padding-right:20rem;
}
.appointment .row .image{
    flex:1 1 45rem;
}
.appointment .row .image img{
    width: 100%;
}

.appointment .row form{
    flex:1 1 45rem;
    background: #fff;
    border:var(--border);
    box-shadow: var(--box-shadow);
    text-align: center;
    padding: 2rem;
    border-radius: .5rem;
}
.appointment .row form .message{
    margin-bottom: 2rem;
    margin-left: 10px;
    border-radius: .5rem;
    padding: 1.5rem 1rem;
    font-size: 1.7rem;
    text-align: center;

}
.appointment .row form h3{
    color:var(--black);
    padding-bottom: 1rem;
    font-size: 3rem;
}

.appointment .row form .box{
    width: 100%;
    margin:.7rem 0;
    border-radius: .5rem;
    border:var(--border);
    font-size: 1.6rem;
    color: var(--black);
    text-transform: none;
    padding: 1rem;
}

.appointment .row form .btn{
    padding:1rem 4rem;
}
.review .box-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(27rem, 1fr));
    gap:2rem;
}

.review .box-container .box{
    border:var(--border);
    box-shadow: var(--box-shadow);
    border-radius: .5rem;
    padding:2.5rem;
    background: #fff;
    text-align: center;
    position: relative;
    overflow: hidden;
    z-index: 0;
}

.review .box-container .box img{
    height: 10rem;
    width: 10rem;
    border-radius: 50%;
    object-fit: cover;
    border:.5rem solid #fff;
}
.review .box-container .box h3{
    color:#fff;
    font-size: 2.2rem;
    padding:.5rem 0;
}

.review .box-container .box .stars i{
    color:#fff;
    font-size: 1.5rem;
}

.review .box-container .box .text{
    color:var(--light-color);
    line-height: 1.8;
    font-size: 1.6rem;
    padding-top: 4rem;
}

.review .box-container .box::before{
    content: '';
    position: absolute;
    top:-4rem; left: 50%;
    transform:translateX(-50%);
    background:var(--green);
    border-bottom-left-radius: 50%;
    border-bottom-right-radius: 50%;
    height: 25rem;
    width: 120%;
    z-index: -1;
}

.footer .box-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(22rem, 1fr));
    gap:2rem;
}

.footer .box-container .box h3{
    font-size: 2.5rem;
    color:var(--black);
    padding: 1rem 0;
}

.footer .box-container .box a{
    display: block;
    font-size: 1.5rem;
    color:var(--light-color);
    padding: 1rem 0;
}

.footer .box-container .box a i{
    padding-right: .5rem;
    color:var(--green);
}

.footer .box-container .box a:hover i{
    padding-right:2rem;
}

.footer .credit{
    padding: 1rem;
    padding-top: 2rem;
    margin-top: 2rem;
    text-align: center;
    font-size: 2rem;
    color:var(--light-color);
    border-top: .1rem solid rgba(0, 0, 0, .1);
}

.footer .credit span{
    color:var(--green);
}

/* media queries  */
@media (max-width:991px){

    html{
        font-size: 55%;
    }

    .header{
        padding: 2rem;
    }

    section{
        padding:2rem;
    }
}

@media (max-width:768px){
    #menu-btn{
        display: initial;
    }

    .header .navbar{
        position: absolute;
        top:115%; right: 2rem;
        border-radius: .5rem;
        box-shadow: var(--box-shadow);
        width: 30rem;
        border: var(--border);
        background: #fff;
        transform: scale(0);
        opacity: 0;
        transform-origin: top right;
        transition: none;
    }

    .header .navbar.active{
        transform: scale(1);
        opacity: 1;
        transition: .2s ease-out;
    }
    .header .navbar a{
        font-size: 2rem;
        display: block;
        margin:2.5rem;
    }
}

@media (max-width:450px){
    html{
        font-size: 50%;
    }
}
    </style>
</head>
<body>
    
<header class="header">
    <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> <strong>AROGYA</strong> health care </a>

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#about">about</a>
        <a href="#services">services</a>
        <a href="#doctors">doctors</a>
        <a href="#review">review</a>
    </nav>
    <div id="menu-btn" class="fas fa-bars"></div>
</header>

<section class="home" id="home"> <!-- home section starts  -->
    <div class="image">
        <img src="about-img.svg" alt="">
    </div>

    <div class="content">
        <h3> Your Health, Our Priority:</h3> <br>
        <p> A leading healthcare provider dedicated to delivering high-quality medical services and cutting-edge treatments to its patients while maintaining a patient-centric approach.</p> <br>
        <a href="#appointment" class="btn"> appointment us <span class="fas fa-chevron-right" ></span> </a>
        <a href="login.php" class="btn"> login <span class="fas fa-chevron-right" ></span> </a>
    </div>
</section>

<section class="icons-container"> <!-- icons section starts  -->

    <div class="icons">
        <i class="fas fa-user-md"></i>
        <h3>150+</h3>
        <p>doctors at work</p>
    </div>

    <div class="icons">
        <i class="fas fa-users"></i>
        <h3>1030+</h3>
        <p>satisfied patients</p>
    </div>

    <div class="icons">
        <i class="fas fa-procedures"></i>
        <h3>490+</h3>
        <p>bed facility</p>
    </div>

    <div class="icons">
        <i class="fas fa-hospital"></i>
        <h3>70+</h3>
        <p>available hospitals</p>
    </div>

</section>

<section class="about" id="about"> <!-- about section starts  -->
    <h1 class="heading"> <span>about</span> us </h1>
    <div class="row">
        <div class="content">
            <h3> Empowering Your Health, One Click at a Time</h3>
            <p>Arogya Health Care Hospital is a leading healthcare provider that is dedicated to providing high-quality medical care to its patients. Arogya Health Care Hospital offers a wide range of medical services, including emergency care, diagnostic services, surgical procedures, and inpatient and outpatient care.</p>
            <p>The hospital is equipped with state-of-the-art technology and staffed by a team of highly qualified and experienced healthcare professionals. The hospital is committed to providing compassionate and patient-centered care and strives to ensure that every patient receives the best possible treatment and outcomes.</p>
            <a href="#" class="btn"> more <span class="fas fa-chevron-right"></span> </a>
        </div>
    </div>
</section>

<section class="services" id="services"> <!-- services section starts  -->
    <h1 class="heading"> our <span>services</span> </h1>
    <div class="box-container">

        <div class="box">
            <i class="fas fa-notes-medical"></i>
            <h3>free checkups</h3>
            <p>for underprivileged communities on a regular basis to promote health and wellness.</p>
            <a href="#" class="btn"> more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-ambulance"></i>
            <h3>24/7 ambulance</h3>
            <p> Arogya Health Care hospital provides for emergency medical situations.</p>
            <a href="#" class="btn"> more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-user-md"></i>
            <h3>expert doctors</h3>
            <p>expert doctors with years of experience and knowledge in their respective fields.</p>
            <a href="#" class="btn"> more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-pills"></i>
            <h3>medicines</h3>
            <p>Arogya Health Care hospital has a well-stocked pharmacy with a wide range of medicines.</p>
            <a href="#" class="btn"> more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-procedures"></i>
            <h3>bed facility</h3>
            <p>comfortable and well-equipped beds for the patients to ensure a peaceful.</p>
            <a href="#" class="btn"> more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-heartbeat"></i>
            <h3>total care</h3>
            <p> physical and emotional needs are met with compassion and professionalism.</p>
            <a href="#" class="btn"> more <span class="fas fa-chevron-right"></span> </a>
        </div>
    </div>
</section>

<section class="doctors" id="doctors">  <!-- doctors section starts  -->
    <h1 class="heading"> our <span>doctors</span> </h1>
    <div class="box-container">

        <div class="box">
            <img src="doc-12.jpg" alt="">
            <h3>Dr. James Smith</h3>
            <span>Expert doctor</span>
            <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>               
            </div>
        </div>

        <div class="box">
            <img src="doc-11.jpg" alt="">
            <h3>Dr. Sarah Johnson</h3>
            <span>Expert doctor</span>
            <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <img src="doc-13.jpg" alt="">
            <h3>Dr. David Brown</h3>
            <span>Expert doctor</span>
            <div class="share" >
            <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <img src="doc-14.jpg" alt="">
            <h3>Dr. Emily Davis</h3>
            <span>Intern doctor</span>
            <div class="share">
                
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>
        <div class="box">
            <img src="doc-15.jpg" alt="">
            <h3>Dr. Benjamin Wilson</h3>
            <span>Expert doctor</span>
            <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>
        <div class="box">
            <img src="doc-16.jpg" alt="">
            <h3>Dr. Elizabeth Taylor</h3>
            <span>Expert doctor</span>
            <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>
    </div>
</section>

<section class="appointment" id="appointment">  <!-- appointmenting section starts   -->
    <h1 class="heading"> <span>appointments</span>  </h1>    
    <div class="row">

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <?php
            if(isset($message)) {
                foreach($message as $message) {
                echo'<p class ="message">'.$message.'</p>';
            }
            }
        ?>
            <h3>make an appointment</h3>
            <input type="text"name="name" placeholder="your name" class="box">
            <input type="number"name="number" placeholder="your number" class="box">
            <input type="email"name="email" placeholder="your email" class="box">
            <input type="date"name="date" class="box">
            <input type="submit" name="submit" value="OK" class="btn">
        </form>
    </div>
</section>



<section class="review" id="review">  <!-- review section starts  -->
    <h1 class="heading"> client's <span>review</span> </h1>

    <div class="box-container">
        <div class="box">
            <img src="pic14.jpg" alt="">
            <h3>William Johnson</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <p class="text">"I cannot thank Arogya Health Care enough for the incredible care I received during my recent stay. The medical staff was knowledgeable and professional, and the facilities were top-notch. I would highly recommend this hospital to anyone seeking excellent medical care."</p>
        </div>

        <div class="box">
            <img src="pic13.jpg" alt="">
            <h3>Emily Brown</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <p class="text">From the moment I walked into Arogya Health Care, I felt at ease. The staff was warm and welcoming, and the doctors took the time to explain my diagnosis and treatment options in detail. The hospital's commitment to patient care and safety is evident in everything they do</p>
        </div>

        <div class="box">
            <img src="pic12.jpg" alt="">
            <h3>Michael Davis</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <p class="text"> I have been to several hospitals over the years, but Arogya Health Care stands out as one of the best. The doctors are highly skilled and compassionate, and the hospital's state-of-the-art technology ensures that patients receive the most advanced care available. </p>
        </div>
    </div>
</section>

<!-- footer section starts  -->
<section class="footer">
    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a href="#home"> <i class="fas fa-chevron-right"></i> home </a>
            <a href="#about"> <i class="fas fa-chevron-right"></i> about </a>
            <a href="#services"> <i class="fas fa-chevron-right"></i> services </a>
            <a href="#doctors"> <i class="fas fa-chevron-right"></i> doctors </a>
            <a href="#appointment"> <i class="fas fa-chevron-right"></i> appointment </a>
            <a href="#review"> <i class="fas fa-chevron-right"></i> review </a>
        </div>

        <div class="box">
            <h3>our services</h3>
            <a href="#"> <i class="fas fa-chevron-right"></i> dental care </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> message therapy </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> cardioloty </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> diagnosis </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> ambulance service </a>
        </div>

        <div class="box">
            <h3>appointment info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +94113859302 </a>
            <a href="#"> <i class="fas fa-phone"></i> +94113846582 </a>
            <a href="#"> <i class="fas fa-envelope"></i> arogya@gmail.com </a>
            <a href="#"> <i class="fas fa-envelope"></i> infoarogya26@gmail.com </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Negombo, SriLanka </a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-facebook"></i> facebook </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
            <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
            <a href="#"> <i class="fab fa-pinterest"></i> pinterest </a>
        </div>
    </div>
    <div class="credit"> created by <span> Apex Design Works</span> | all rights reserved </div>
</section>

<script src="js/script.js"></script> <!-- js file link  -->

<script>
    let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
}
</script>

</body>
</html>