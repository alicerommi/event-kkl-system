<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registeration Page</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <!-- select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Assistant:wght@300;500;700;800&display=swap" rel="stylesheet">	
  <link rel="stylesheet" href="./assets/css/style.css" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Assistant:wght@300;500;700;800&display=swap');
    @import url('https://fonts.cdnfonts.com/css/assistant');
  </style>

   <!-- select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
     <!-- sweet alert notifications -->
    <script src="assets/js/sweetalert2.min.js"></script>

  <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
  <!-- favicon -->
  <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon" />
</head>
<body class="website">
<section class="header shadow bg-primary py-1 position-fixed w-100 top-0 left-0 z-3">
      <div class="container">
          <div class="container-fluid text-center">
            <a class="navbar-brand" href="#">
              <img src="./assets/img/logo.png" class="img-fluid logo mx-auto d-block" alt="">
            </a>
          </div>
        
      </div>
</section>
<div class="clearfix"></div>
  <div class=" top-marjin-80">
    <!-- header -->
    <section class="header bg-primary py-1 w-100 mt-5 z-3">
      
      <div class=" ">
		  <div class="">
    <div class="image-wrap">
        <div class="img-content">
            <img class="img-fluid" src="./assets/img/entrance.png" alt="">
        </div>
        <div class="overlay"></div>
    </div>
    <div class="banner-content gradient-bg">
		<p class="smallheadingtext" dir="rtl">25 בספטמבר 2023</p>

		<h1 class="headingtext " dir="rtl">  שלום למשתתפי הצפרתון ה- 6 של קרן קימת לישראל!</h1>
        
    </div>
        
      </div></div>
 </section>
	

    <!-- header -->

      <!-- section -->
      <section class="text-end" id="section4">
        <div class="container">
          <ul dir="rtl" class=" text-right subheadingtext" style="margin: 30px -30px; display: table; list-style: none">
            <li class="h4 flex align-items-center justify-content-center" dir="rtl">
              בואו נעוף ביחד עם קלנגה - עיט החורש, נגלה ביחד את עולם הטבע והציפורים.
            </li>
            <li class="h4 flex align-items-center justify-content-center" dir="rtl">
              ננדוד ביחד מצפון אמריקה , דרך ישראל - אל אפריקה.
            </li>
            
            <li class="h4 flex align-items-center justify-content-center" dir="rtl">
              בדרך נשחק ונפתור חידות ומי שיסיים את המסע, וישלח פיתרון נכון - יזכה בפרס חלומי ויזכה לבקר את קלנגה וחבריו - בחופשת החורף שלהם באפריקה הרחוקה.
            </li>
            <li class="h4 flex align-items-center justify-content-center" dir="rtl">
              (הפרס: זוג כרטיסי טיסה והורים + זוג כרטיסים לילדים לספארי באפריקה).
            </li>
            
          </ul>
        </div>
		  
      </section>
      <!-- section -->

      <!-- section -->
      <section class="" id="section5">

        <?php
          if (isset($_GET['token'])  && isset($_GET['site'])  ){
            if ( !empty($_GET['token']) && !empty($_GET['site']) ){
                $token = $_GET['token'];
                $site = $_GET['site'];

                echo '<div class="container">
          <div class="text-center">
            <h2 class="headingtext mb-3">הרשמו למשחק</h2>            
          </div>
          <form class="rtl" id="ticket_booking_form">
            <div class="row g-4">             
              <div class="col-12">
                <input type="hidden" name="token" value="'.$token.'">
                <input type="hidden" name="site" value="'.$site.'">

                <input required name="first_name" type="text" class="form-control py-3 fs-4 rounded-0" placeholder="שם פרטי" maxlength="50">
              </div>
              <div class="col-12">
               
                <input required  name="last_name" type="text" class="form-control py-3 fs-4 rounded-0" placeholder="שם משפחה" maxlength="50">
              </div>
              <div class="col-12">
                
                <input required"  name="residence" type="text" class="form-control py-3 fs-4 rounded-0" placeholder="מקום מגורים" maxlength="50">
              </div>
              <div class="col-12">
               
                <input required  name="phone" type="text" class="form-control py-3 fs-4 rounded-0" placeholder="מספר טלפון" maxlength="10">
              </div>

              <div class="col-12">
                <input required  name="mail" type="email" class="form-control py-3 fs-4 rounded-0" placeholder="מייל" maxlength="50">
              </div>
        
        
              <div class="col-12">
                <select class="form-control select py-3 fs-4 rounded-0" name="number_of_people"  id="number_of_people" required>
                        <option value="" selected="" disabled=""><img src="./assets/img/dropdown.png" class="dropdown"/> בחירת כמות משתתפים </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                       
                 </select>
              </div>
              <div class="col-12 mb-4">
                <label for="policy" class="lead mb-2 subheadingtext">
                 <input type="checkbox" name="policy_confirm" id="policy_confirm">  ואני מסכים לתנאיו
                              <a href="https://kkl-buzz.co.il/assets/files/1.docx" target="_blank" class="text-dark text-decoration-underline">
                    ולמדיניות השימוש והפרטיות
                              </a>
                      ואני מסכים לתנאיו
                      <a href="https://kkl-buzz.co.il/assets/files/2.docx" target="_blank" class="text-dark text-decoration-underline">
                    ולמדיניות השימוש והפרטיות
                              </a>
                </label> 
        
              </div>
            </div>
        <div class="col-md-12">
                <button class="btn btn-primary btn-lg w-100 py-3 fs-4 rounded-0 disabled-button" id="action_btn"  type="submit">
                  שלח
                </button>
              </div>
          </form>
        </div>';
        }else{
           echo '<div class="alert alert-warning text-center" class="rtl"><strong>על מנת להרשם עליך לגשת לשער הכניסה לקבלת קוד QR</strong></div>';
        }
        }else{
            echo '<div class="alert alert-warning text-center" class="rtl"><strong>על מנת להרשם עליך לגשת לשער הכניסה לקבלת קוד QR</strong></div>';
        }
      ?>  
      </section>
  <!-- section -->
  <!-- jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="assets/js/custom.js" type="application/javascript"></script> 
  <!-- bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	</div>
</body>
</html>