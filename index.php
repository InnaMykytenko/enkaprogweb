<?php
$postData = $statusMsg = '';
$status = 'error';


//Google reCAPTCHA API key configuration
$sitekey = '';


//If the form is submitted
if(isset($_POST['send'])) {
    $postData = $_POST;

    //Validate form fields
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['subject']) && !empty($_POST['issues'])) {

        //Validate reCAPTCHA box
        if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

            $secretKey = '';
            //Verify the reCaptcha response
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' .$secretKey. '&response=' .$_POST['g-recaptcha-response']);

            //Decode json data
            $responseData= json_decode($verifyResponse);

            //if reCAPTCHA response is valid
            if ($responseData->success){
                //Posted form data
                $name = !empty($_POST['name'])?$_POST['name']: '';
                $email = !empty($_POST['email'])?$_POST['email']: '';
                $phone = !empty($_POST['phone'])?$_POST['phone']: '';
                $subject = !empty($_POST['subject'])?$_POST['subject']: '';
                $issues = !empty($_POST['issues'])?$_POST['issues']: '';
                $send = !empty($_POST['send'])?$_POST['send']: '';

                //Send email notification to the site admin


                $to = 'mykytenko@enkaprogweb.com';
                $Subject1 = 'New mail from client from enkaprogweb site';
                $htmlContent = "
                    <h1>Contact request details</h1>
                    <p><b>Name: </b>" .$name. "</p>
                    <p><b>Email: </b>" .$email. "</p>
                    <p><b>Phone: </b>" .$phone. "</p>
                    <p><b>Subject: </b>" .$subject. "</p>
                    <p><b>Messages: </b>" .$issues. "</p>
                ";

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From:'.$name.' <'.$email.'>' . "\r\n";

                //Send email
                @mail($to, $Subject1, $htmlContent, $headers);
                header('location: index.php#contactform');

                $status = 'success';
                $statusMsg = 'Your contact request has submitted successfully.' ;
                $postData = '';

                if($statusMsg->send){
                    echo 'Error';
                } else {
                    header('location: thank-you.php#services');
                }

            }else{
                $statusMsg = 'Please verification failed, please try again.';

            }
        }else{
            $statusMsg = 'Please check on the reCAPTCHA box.';
        }
    }else{
        $statusMsg = 'Please fill all the mandatory fields.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inna Mykytenko</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Mykytenko portfolio" />
    <!-- css files -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="css/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
    <link href="css/font-awesome.min.css" rel="stylesheet"><!-- fontawesome css -->
    <!-- //css files -->
    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <!-- //google fonts -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<!-- header -->
<header>
    <nav class ="navbar" >
        <div class="container">
            <h1 class = "wthree-logo">
                <a href="index.php" id="logoLink"><i class="fa fa-bolt"></i><span>I.</span>Mykytenko</a>
            </h1>
            <!--menu-->
            <ul id="menu">
                <li>
                    <input id="check02" type="checkbox" name="menu"/>
                    <label for = check02><span class="fa fa-bars" aria-hidden="true"></span></label>
                    <ul class="submenu">
                        <li><a href="index.php" class="active">Home</a></li>
                        <li><a href = "#about">About Me</a></li>
                        <li><a href = "#services">Services</a></li>
                        <li><a href = "#portfolio">My work</a></li>
                        <li><a href = "#contactform">Contact Me</a></li>
                    </ul>
                </li>
            </ul>
            <!-- //menu -->
        </div>
    </nav>
</header>
<!-- //header -->
<!--banner -->
<div id="home" class="banner-inna d-flex">
    <div class = "container">
        <div class="row">
            <div class ="col-lg-6 bnr-txt-inna">
                <div class = "bnr-inna-txt mt-sm-5">
                    <h6>Welcome to my Portfolio</h6>
                    <h2>Hello <span>I'm Inna Mykytenko</span></h2>
                    <h4>designer - developer - freelancer</h4>
                    <p class = "mt-4">I enjoy building everything from small business site to rich interactive web apps.
                        If you are business seeking a web presence or an employer looking to hire, you can get
                        In touch with me here. </p>
                    <ul class = "social_section_1info mt-4">
                        <li class="mb-2 facebook"> <a href ="https://www.facebook.com/Enkaprogwebcom-473576730069813/" target="_blank"><span class="fa fa-facebook"></span></a></li>
                        <li class="linkedin"> <a href ="https://www.linkedin.com/in/inna-mykytenko-600500137/" target="_blank"><span class="fa fa-linkedin"></span></a></li>
                    </ul>
                    <a href = "#about" class="scroll bnr-btn mr-2">Read more</a>
                    <a href="#contact" class ="scroll bnr-btn1">Contact Me</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //banner -->
<!-- about -->
<section class="about" id="about">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 p-0">
                <img src="images/6.jpg" alt="" class="img-fluid" />
            </div>
            <div class="col-lg-6">
                <div class="about-right">
                    <h4 class="main">Looking for a Front-End Developer?</h4>
                    <p>I have a diverse set of skills, ranging from design,
                        to HTML + CSS + Javascript, up to PHP and Java, Gitlab, MySQL, knowledge in the .NET Universal Windows platform.</p>
                    <div class="row mt-sm-5 mt-4 about-right-inner">
                        <div class="col-sm-4 col-6 myphoto-sign text-center">
                            <img src="images/my_min.png" alt="" class="img-fluid rounded-circle"/>
                            <img src="images/signature1.png" alt="" class="img-fluid mt-3"/>
                            <a href="#contact" class="scroll abt-btn">Hire Me </a>
                        </div>
                        <div class="col-sm-7 offset-lg-1">
                            <h4>Personal Info</h4>
                            <p>Hello, My name is <strong>Inna Mykytenko</strong>.<br>I am <strong>Web Developer from Wroclaw, Poland. </strong></p>
                            <h4 class="mt-4">Skills & Abilities</h4>
                            <div class="progress-one mt-3">
                                <h4 class="progress-tittle">HTML & CSS</h4>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="progress-one my-lg-3">
                                <h4 class="progress-tittle">Photoshop</h4>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="progress-one">
                                <h4 class="progress-tittle">PHP & JavaScript</h4>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 55%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="position">About Me</h3>
        </div>
    </div>
</section>
<!-- //about -->
<!-- services-->
<section class="services pt-5" id="services">
    <div class="container py-xg-0">
        <p class="paragraph">What I do for you</p>
        <h3 class="heading mb-sm-5 mb-4">My Services</h3>
        <div class="row">
            <div class="col-xg-3 col-sm-4 mb-5">
                <div class="panel panel-default">
                    <div class="panel-thumbnail">
                        <h3><span class="fa fa-weibo" aria-hidden="true"></span></h3>
                        <h4 class="mt-3">Web Design</h4>
                        <p class="mt-3">I am implement web designs through coding languages like HTML, CSS, PHP and JavaScript.  </p>
                    </div>
                </div>
            </div>
            <div class="col-xg-3 col-sm-4 mb-5">
                <div class="panel panel-default">
                    <div class="panel-thumbnail">
                        <h3><span class="fa fa-bug" aria-hidden="true"></span></h3>
                        <h4 class="mt-3">Creative</h4>
                        <p class="mt-3"> Experience matters. CREATIVE is a little thing that makes a big difference.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xg-3 col-sm-4 mb-5">
                <div class="panel panel-default">
                    <div class="panel-thumbnail">
                        <h3><span class="fa fa-handshake-o" aria-hidden="true"></span></h3>
                        <h4 class="mt-3">Advertising</h4>
                        <p class="mt-3">Strategic planning centered around my consumers' intent. I'm build with them. </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- //services -->
<!-- quote -->
<section class="quote py-5">
    <div class="container py-lg-0">
        <div class="row">
            <div class="col-lg-10">
                <h4>"Treating people kindly is only 20% good service. The more important part is
                    the development of technologies and systems that allow you to do the job well the first time.
                    No smiles will help you if your product or service does not suit your customer.
                    You have to be better than yesterday, not better than others. Although this life strategy is not the easiest, but the most win-win..."</h4>
                <h5>designer - developer - freelancer</h5>
                <img src="images/signature2.png" alt="" class="img-fluid"/>
            </div>
        </div>
    </div>
</section>
<!-- //quote -->

<section class="portfolio py-5" id="portfolio">
    <div class="container py-lg-1">
        <p class="paragraph">My recent Work</p>
            <div class="toggles">
                <button id="showall">SHOW ALL</button>
                <button id="webdev">JAVASCRIPT,PHP</button>
                <button id="webdesing">HTML, CSS, BOOTSTRAP</button>
                <button id="laravel">LARAVEL, REST API ALLEGRO</button>
            </div>

    <div class="posts">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-6 p-0">
                <div class="box9">
                    <div class="post webdesing">
                        <img src="images/portfolio1.jpg" alt="portfolio" class="img-fluid">
                        <div class="box-content">
                            <h3 class="title">DELIVERY</h3>
                            <ul class="icon">
                                <li><a href="http://we-beliwe.pl/" target="_blank"><i class="fa fa-search"></i></a></li>
                                <li><a href="#"><i class="fa fa-link"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-lg-3 col-md-4 col-6 p-0">
            <div class="box9">
                <div class="post webdev">
                    <img src="images/Artboard_2.jpg" alt="portfolio" class="img-fluid">
                    <div class="box-content">
                        <h3 class="title">AGROTOURISTIC</h3>
                        <ul class="icon">
                            <li><a href="http://agronadrzeka.pl/" target="_blank"><i class="fa fa-search"></i></a></li>
                            <li><a href="#"><i class="fa fa-link"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

            <div class="col-lg-3 col-md-4 col-6 p-0">
                <div class="box9">
                    <div class="post webdev">
                        <img src="images/portfolio3.jpg" alt="portfolio" class="img-fluid">
                        <div class="box-content">
                            <h3 class="title">TRUCK</h3>
                            <ul class="icon">
                                <li><a href="https://tironline.com.ua/" target="_blank"><i class="fa fa-search"></i></a></li>
                                <li><a href="#"><i class="fa fa-link"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-6 p-0">
                <div class="box9">
                    <div class="post webdev">
                        <img src="images/portfolio4.jpg" alt="portfolio" class="img-fluid">
                        <div class="box-content">
                            <h3 class="title">ATLAS</h3>
                            <ul class="icon">
                                <li><a href="https://Atlas24.com.ua/" target="_blank"><i class="fa fa-search"></i></a></li>
                                <li><a href="#"><i class="fa fa-link"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-6 p-0">
                <div class="box9">
                    <div class="post laravel">
                        <img src="images/portfolio5.jpg" alt="portfolio" class="img-fluid">
                        <div class="box-content">
                            <h3 class="title">MOTOBAZAR</h3>
                            <ul class="icon">
                                <li><a href="https://motobazar.com.ua/" target="_blank"><i class="fa fa-search"></i></a></li>
                                <li><a href="#"><i class="fa fa-link"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
             </div>
        </div>
    </div>
</section>


<!-- Contact -->
<section class="contact py-1" id="contact">
    <div class="container py-lg-1">
        <p class="paragraph">Get in touch with me</p>
        <h3 class="heading mb-sm-5 mb-4">Contact</h3>
        <div class="contact-form">
            <div class="row">
                <div class="col-lg-8">
                    <form name="contactform" id="contactform" method="post" action="#contactform">
                        <!-- Status message -->
                        <?php if(!empty($statusMsg)){ ?>
                            <p class="status-msg <?php echo $status; ?>"><?php echo $statusMsg; ?></p>
                        <?php } ?>
                        <div class="row">

                            <div class="form-group col-md-6 ">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo !empty($postData['name'])?$postData['name']:'';?>" id="name" placeholder="Enter Name" required >
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo !empty($postData['email'])?$postData['email']:'';?>" id="email" placeholder="Enter Email"  required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Phone No.</label>
                                <input type="text" name="phone" class="form-control" value="<?php echo !empty($postData['phone'])?$postData['phone']:'';?>" id="phone" placeholder="Enter Phone no."  required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Subject</label>
                                <input type="text" class="form-control" name="subject" value="<?php echo !empty($postData['subject'])?$postData['subject']:'';?>" id="subject" placeholder="Enter Subject" required>
                            </div>
                            <div class="form-group col-12">
                                <label>Message</label>
                                <textarea name="issues" class="form-control"  id="issues" placeholder="Enter Your Message Here" required="" ><?php echo !empty($postData['issues'])?$postData['issues']:'';?></textarea>
                            </div>
                            <div class="form-group col-2">
                                <div class="g-recaptcha" data-sitekey="<?php echo $sitekey; ?>"></div>
                                <br/>
                                <button type="submit" id = "submit" name="send" value="SEND" class="btn btn-default">Submit </button>
                            </div>
                        </div>
                    </form>
                </div>
                <section class="inna-map col-lg-4 mt-lg-0 mt-5">
                    <iframe src="https://maps.google.com/maps?q=bzowa%20poland&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen=""></iframe>
                </section>
            </div>
        </div>
    </div>
</section>
<!-- //Contact -->

<!-- footer -->
<footer class="py-lg-5 py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <h3 class="wthree-logo mt-3">
                    <a href="index.php" id="logoLink1"><span class="fa fa-bolt"></span> <span>I.</span>Mykytenko</a>
                </h3>
            </div>
            <div class="col-lg-6 my-lg-0 my-2">
                <p><span class="fa mr-2 fa-map-marker"></span>51-224 Bzowa Street, Poland</p>
                <p class="mt-2"><span class="fa mr-2 fa-envelope"></span><a href="mailto:mykytenko@enkaprogweb.com">mykytenko@enkaprogweb.com</a><span class="fa ml-3 mr-2 fa-phone"></span>+48 690-969-935</p>
            </div>
            <div class="col-lg-4 copy-right p-0 text-lg-right">
                <p>Follow me on social media</p>
                <ul class="social_section_1info">
                    <li class="mb-2 facebook"><a href="https://www.facebook.com/Enkaprogwebcom-473576730069813/" target="_blank"><span class="fa fa-facebook"></span></a></li>
                    <li class="linkedin"><a href="https://www.linkedin.com/in/inna-mykytenko-600500137/" target="_blank"><span class="fa fa-linkedin"></span></a></li>

                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- //footer -->

<!-- copyright -->
<div class="copyright py-3 text-center">
    <div class="container">
        <p class="my-2">© 2019 Inna Mykytenko. All rights reserved
            <a href="http://enkaprogweb.com">enkaprogweb.com</a>
        </p>
    </div>
</div>
<!-- copyright -->

<!-- move top -->
<div class="move-top text-right">
    <a href="#home" class="move-top">
        <span class="fa fa-angle-up  mb-3" aria-hidden="true"></span>
    </a>
</div>
<!-- move top -->

<!-- Bootstrap core JavaScript
   ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
<!-- //js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="script.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

</body>
</html>