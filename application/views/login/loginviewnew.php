<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>newassets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>newassets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <title>Quizbaj</title>

  </head>

  <body>
    <header>
      <div class="container">
        <div class="row">
          <div class="col-md-4">

            <div class="logo">

              <a href="<?=base_url()?>"><img src="<?=base_url()?>newassets/img/logo.png" alt="Logo"></a> 

            </div>

          </div>
          <div class="col-md-8">

            <!-- <div class="reg_button float-end">

              <a href="#" class="btn">Registration</a>

            </div> -->

            <nav>
              <ul class="nav float-end">
                <!-- <li>
                  <a href="#" class="nav-link">Topics</a>
                </li> -->
                <li>
                  <a href="<?=site_url('login/help');?>" class="nav-link">Help/Faq</a>
                </li>
                <!-- <li>
                  <a href="#" class="nav-link">Log in</a>
                </li> -->
              </ul>
            </nav>

          </div>
        </div>
      
        <div class="banner_content">
          <div class="row">
            <div class="col-md-7">
              <h1>Play Online quiz & <br>Win Cash Daily!</h1>
              <p>Win up to 1000৳ monthly from <strong>QuizBaj</strong>.</p>
              <form action="<?=site_url('login/verify');?>" method="POST">
                <div class="num">+880</div>
                <input name="phone_number" type="text" class="form-control" placeholder="Enter Mobile Number" pattern="\d*" maxlength="10" required>
                <input type="submit" name="submit" value="Register">
              </form>
              <h3 style="padding-top: 50px;" >Number of Active Users Right Now  </h3>
              <!-- <h2 style="font-size: 3rem; margin-left: 138px; font-weight: bolder; ">20,000+</h2> -->
            <h2 style="font-size: 3rem; margin-left: 138px; font-weight: bolder; "><?php echo $totalUsersNo; ?></h2>

            <!-- <h3 style="padding-top: 50px;" >Number of Total Player  </h3>
            <h2 style="font-size: 3rem; margin-left: 138px; font-weight: bolder; "><?php echo $totalPlayerNo; ?></h2> -->
            </div>
          </div>
        </div>
        
      </div>
      
    </header>

    <section>
      <div class="how_to_play">
        <div class="container">
          <div class="title_one">
            <h1>How To Play</h1>
            <p>
              It's easy to start playing on <strong>QuizBaj,</strong> <br>just follow step by step
            </p>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="step_single">
                <h5>Step 1</h5>
                <img src="<?=base_url()?>newassets/img/step1.svg" alt="">
                <h4>
                  Enter the Phone Number and Click Register
                </h4>
                <p>
                  
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="step_single">
                <h5>Step 2</h5>
                <img src="<?=base_url()?>newassets/img/step2.svg" alt="">
                <h4>
                  Enter the Verification Code and click Verify.
                </h4>
                <p>
                  Please check your Phone to insert the OTP
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="step_single">
                <h5>Step 3</h5>
                <img src="<?=base_url()?>newassets/img/step3.svg" alt="">
                <h4>
                 Enter your Info and click Play Quiz . 
                </h4>
                <p>
                  You will be redirected to the user's dashboard screen.
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="step_single">
                <h5>Step 4</h5>
                <img src="<?=base_url()?>newassets/img/step4.svg" alt="">
                <h4>
                  Click on the subject 
                </h4>
                <p>
                  Select the Subjects you want to play quiz
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="step_single">
                <h5>Step 5</h5>
                <img src="<?=base_url()?>newassets/img/step5.svg" alt="">
                <h4>
                  A question will have four options
                </h4>
                <p>
                  There could be one correct option.
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="step_single">
                <h5>Step 6</h5>
                <img src="<?=base_url()?>newassets/img/step6.svg" alt="">
                <h4>
                  Click right Option.
                </h4>
                <p>
                  Pick the option you consider to be correct and click Confirm.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="explore_topics">
        <div class="container">
          <div class="title_two">
            <div class="row">
              <div class="col-md-4">
                <h1>Explore topics <br>of quiz</h1>
              </div>
              <div class="col-md-8">
                <p>
                  What we learn with pleasure, we never forget. play thousands of Quiz And 5 topics. QuizBaj, and fun at the same time.
                </p>
              </div>
            </div>
          </div>
          <div class="topics_list">
            <?php

            if($subject->code == 1){
                foreach ($subject->subject as $key => $val) {

                if($val->subject_name == "Bangla"){
                   $clasname = "bangla";
                }elseif ($val->subject_name == "English") {
                  $clasname = "english";
                }elseif ($val->subject_name == "Math") {
                  $clasname = "mathematics";
                }elseif ($val->subject_name == "General Science") {
                  $clasname = "general_science";
                }elseif ($val->subject_name == "General Knowledge") {
                  $clasname = "general_knowledge";
                }
            ?>

            <div class="topics_single">
              <div class="<?=$clasname;?>"></div>
              <h4><?=$val->subject_name;?></h4>
            </div>
            <?php }} ?>

            <!-- <div class="topics_single">
              <div class="english"></div>
              <h4>English</h4>
            </div>

            <div class="topics_single">
              <div class="mathematics"></div>
              <h4>Mathematics</h4>
            </div>

            <div class="topics_single">
              <div class="general_science"></div>
              <h4>General Science and Technology</h4>
            </div>

            <div class="topics_single">
              <div class="general_knowledge"></div>
              <h4>General Knowledge</h4>
            </div> -->

          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="winner_player">
        <div class="container">
          <div class="title_one">
            <h1>Winner Player</h1>
          </div>
          <div class="winner_tab">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Daily Winner</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Weekly Winner</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Monthly Winner</a>
              </li>
            </ul>
          </div>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <?php if(!empty($dailyTopPoints)){ ?>
              <div class="row">
                <div class="col-md-4">
                  <div class="winner_single">
                    <h4><i class="fa fa-star"></i>Third<i class="fa fa-star"></i></h4>
                    <div class="winner_img third">
                      <img src="<?=$dailyTopPoints[2]->image;?>">
                    </div>
                    <h3><?=$dailyTopPoints[2]->fullName;?></h3>
                    <p>Points: <?=$dailyTopPoints[2]->point;?></p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="winner_single winner_first">
                    <h4><i class="fa fa-star"></i>Winner<i class="fa fa-star"></i></h4>
                    <div class="winner_img winner">
                      <img src="<?=$dailyTopPoints[0]->image;?>">
                    </div>
                    <h3><?=$dailyTopPoints[0]->fullName;?></h3>
                    <p>Points: <?=$dailyTopPoints[0]->point;?></p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="winner_single">
                    <h4><i class="fa fa-star"></i>Second<i class="fa fa-star"></i></h4>
                    <div class="winner_img second">
                      <img src="<?=$dailyTopPoints[1]->image;?>">
                    </div>
                    <h3><?=$dailyTopPoints[1]->fullName;?></h3>
                    <p>Points: <?=$dailyTopPoints[1]->point;?></p>
                  </div>
                </div>
              </div>
            <?php } ?>

            </div>
             
<!-- Static Weekly Player winners   -->

            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              
              <div class="row">
                <div class="col-md-4">
                  <div class="winner_single">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="winner_single winner_first">
                    <h3  style="margin-bottom: 40px;" >Please wait till 26-03-2021</h3>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="winner_single">
                    
                  </div>
                </div>
              </div>
            </div>
            <!-- Static Weekly Player winners   -->


            <!-- Dynamic Weekly Player winners   -->
<!-- 
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <?php if(!empty($weeklyTopPoints)){ ?>
              <div class="row">
                <div class="col-md-4">
                  <div class="winner_single">
                    <h4><i class="fa fa-star"></i>Third<i class="fa fa-star"></i></h4>
                    <div class="winner_img third">
                      <img src="<?=$weeklyTopPoints[2]->image;?>">
                    </div>
                    <h3><?=$weeklyTopPoints[2]->fullName;?></h3>
                    <p>Points: <?=$weeklyTopPoints[2]->point;?></p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="winner_single winner_first">
                    <h4><i class="fa fa-star"></i>Winner<i class="fa fa-star"></i></h4>
                    <div class="winner_img winner">
                      <img src="<?=$weeklyTopPoints[0]->image;?>">
                    </div>
                    <h3><?=$weeklyTopPoints[0]->fullName;?></h3>
                    <p>Points: <?=$weeklyTopPoints[0]->point;?></p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="winner_single">
                    <h4><i class="fa fa-star"></i>Second<i class="fa fa-star"></i></h4>
                    <div class="winner_img second">
                      <img src="<?=$weeklyTopPoints[1]->image;?>">
                    </div>
                    <h3><?=$weeklyTopPoints[1]->fullName;?></h3>
                    <p>Points: <?=$weeklyTopPoints[1]->point;?></p>
                  </div>
                </div>
              </div>
            <?php } ?>
            </div> -->
            <!-- Dynamic Weekly Player winners   -->
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
              <?php if(!empty($monthlyPoints)){ ?>
              <div class="row">
                <div class="col-md-4">
                  <div class="winner_single">
                    <h4><i class="fa fa-star"></i>Third<i class="fa fa-star"></i></h4>
                    <div class="winner_img third">
                      <img src="<?=$monthlyPoints[2]->image;?>">
                    </div>
                    <h3><?=$monthlyPoints[2]->fullName;?></h3>
                    <p>Points: <?=$monthlyPoints[2]->point;?></p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="winner_single winner_first">
                    <h4><i class="fa fa-star"></i>Winner<i class="fa fa-star"></i></h4>
                    <div class="winner_img winner">
                      <img src="<?=$monthlyPoints[0]->image;?>">
                    </div>
                    <h3><?=$monthlyPoints[0]->fullName;?></h3>
                    <p>Points: <?=$monthlyPoints[0]->point;?></p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="winner_single">
                    <h4><i class="fa fa-star"></i>Second<i class="fa fa-star"></i></h4>
                    <div class="winner_img second">
                      <img src="<?=$monthlyPoints[1]->image;?>">
                    </div>
                    <h3><?=$monthlyPoints[1]->fullName;?></h3>
                    <p>Points: <?=$monthlyPoints[1]->point;?></p>
                  </div>
                </div>
              </div>
            <?php } ?>
            </div>
          </div>
          
        </div>
      </div>
    </section>
<!-- 
    <section>
      <div class="play_n_win">
        <div class="container">
          <div class="title_one">
            <h1>Play N Win FAQ</h1>
          </div>
          <div class="win_tab">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                   <p>
                      1. How can I try a quiz before it is released?
                    </p>
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>This is the first item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                   <p>
                      2. How can I enable notification of quiz submissions?
                    </p>
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <p>
                      3. How can I print a copy of a quiz?
                    </p>
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <p>
                      4. How can I print all the students' quiz questions?
                    </p>
                  </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>

              </div>
               <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="container">
        <div class="footer_top">
          <div class="row">
            <div class="col-md-4">
              <div class="footer_logo">
                <a href="#">
                  <img src="<?=base_url()?>newassets/img/logo.png">
                </a>
              </div>
              <div class="social_icon">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                  <i class="fab fa-google-plus-g"></i>
                </a>
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </div>
            </div>
            <div class="col-md-8">
              <!--<div class="float-end">
                <a href="#" class="btn">Register</a>
              </div>-->
              <nav>
                <ul class="nav float-end">
                  <!--<li>
                    <a href="#" class="nav-link">Topics</a>
                  </li>
                  <li>
                      <li>
                    <a href="#" class="nav-link">Log in</a>
                  </li>-->
                  <li>
                     <a href="<?=site_url('login/help');?>" class="nav-link">Help/Faq</a>
                  </li>
                  
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="footer_bottom">
          <ul class="nav">
            <li>© 2021  Play N Win</li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>
        </div>
      </div>
    </footer>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    
  </body>
</html>