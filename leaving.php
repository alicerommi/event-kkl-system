<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Leaving Page</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <!-- select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Assistant:wght@300;500;700;800&display=swap" rel="stylesheet">	
  <!-- style css -->
  <link rel="stylesheet" href="./assets/css/style.css" />
<style>
@import url('https://fonts.googleapis.com/css2?family=Assistant:wght@300;500;700;800&display=swap');
@import url('https://fonts.cdnfonts.com/css/assistant');
</style>

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
  <div class="position-relative top-marjin-80">
    
   
    <!-- header -->
    <section class="header bg-primary py-1 w-100 mt-5 z-3">
      <div class="">
    <div class="image-wrap">
        <div class="img-content">
            <img class="img-fluid" src="./assets/img/exit.png" alt="">
        </div>
        <div class="overlay"></div>
    </div>
    <div class="banner-content gradient-bg">
		<p class="smallheadingtext" dir="rtl"><?php echo date("F j Y"); ?></p>

		<h1 class="headingtext " dir="rtl">  כל הכבוד! סיימתם את מסע הנדידה של קלנגה!</h1>
    </div>
        
      </div>
 </section>
	</div>

    <!-- header -->

      <!-- section -->
     <section class=" text-end" id="section4" style="margin: 30px 0">
        <div class="container">
          
          <div dir="rtl" class=" text-right headingtext" >
		התעייפתם? חישבו כמה קלנגה התאמץ בימי הנדידה הארוכים דרומה. <br>
        מה נשאר? <br>
לפתור את חידת אוצר הנדידה בחוברת המסע, ולהעתיק את הפתרון לכאן:

          </div>


			<form class="rtl mt-2" id = "leaving_form">
            <div class="row g-4"> 
                  <!-- <h2 class="text-center headingtext">תשובתך התקבלה בהצלחה </h2>
                  <h2 class="text-center headingtext">שמחנו לארח אותך </h2> -->

                <div class="col-12" id="leaving_form_messages">
                
                </div>

                <div class="col-12">
                  <input class="phoneinput" required type="text" id="phone" name="phone" maxlength="50" placeholder="הזן את המספר הסלולרי שלך לזיהוי " />
                </div>

                <div class="col-12">
                      <textarea class="mt-2 w-100 input-form" name="answer" id="answer" required rows="3" maxlength="5000" placeholder="הקלד את תשובתך"></textarea>
                </div>

                <input type="hidden" name="save_leaving_form" value="1">

                 <div class="text-center pb-4">
                       <button class="btn btn-primary btn-lg w-100 py-3 fs-4 rounded-0" id="leaving_form_submit_btn" type="submit">
                            לח
                        </button>        
                </div>
				</div>
			</form>
			</div>
      </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="assets/js/custom.js" type="application/javascript"></script> 
</body>
</html>