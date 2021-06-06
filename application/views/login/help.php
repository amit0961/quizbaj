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

    <title>HELP</title>

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

            <!--<div class="reg_button float-end">

              <a href="" class="btn">Registration</a>

            </div>-->

            <nav>
              <ul class="nav float-end">
                <!-- <li>
                  <a href="#" class="nav-link">Topics</a>
                </li>
                <li>
                  <a href="#" class="nav-link">Help/Faq</a>
                </li> -->
                <li>
                  <a href="<?=site_url('login/index');?>" class="nav-link">Log in</a>
                </li>
              </ul>
            </nav>

          </div>
        </div>
      </div>
      
    </header>



    <section>
      <div class="inner_banner">
        <div class="container">
          <div class="inner_title">
            <h1>How can we help?</h1>
            <div class="search">
              <form action="" method="">
                 <input type="text" placeholder="Search our help center..." name="">
                 <!-- <input type="text" placeholder="" name=""> -->
                <i class="fa fa-search"></i>
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="topics_content">
        <div class="container">
          <h3>Topics</h3>
          <div class="d-flex align-items-start">
            <div class="row">
              <div class="col-md-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                    General information
                  </a>
                  <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                    Scoring process
                  </a>
                  <a class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                    Winners and Prizes
                  </a>
                  <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                   Help 
                  </a>
                </div>
              </div>
               <div class="col-md-1"></div>
              <div class="col-md-8">
                <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <h5>1. What is quizbaj</h5>
                    <p>
                               Quizbaj is a form of online game based on education in which players attempt to answer questions correctly about a certain or variety of subjects.
                    </p>
                    <h5>2.  Why you will participate in this quiz?</h5>
                    <p>
                      This quiz can be used as a brief assessment in education and similar fields to measure growth in knowledge, abilities, or skills for job completion and many more purpose. 
                    </p>
                    <h5>3.  How to participate in quizbaj quiz?</h5>
                    <p>
                      To be eligible for the contest, Participate has need to register with maintaining the process and active in this contest during the campaign period. There will be total 100 question and for each category will be 20 question for every day.
                    </p>
                    <h5>4.  What will be the duration to give answer for each category?</h5>
                    <p>
                                   There will be 5 minute for answering the each category.
                    </p>
                  </div>
                  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <h5>1. What will be the marking system?</h5>
                    <p>
                      Each correct answer will carry 10 point for regular question and there will be no negative marking for wrong answer.
                    </p>
                    
                    <h5> 2. How can check the participant position and score?</h5>
                    <p>
                      A participant can check his or her current position at any time from the leaderboard. He or she also will know the score from this leaderboard.
                    </p>
                  </div>
                  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <h5> 1. What are the categories of winner?</h5>
                    <p>
                      There will be three winners such as first, second and third for daily, weekly and monthly according to the highest position.
                    </p>
                    
                    <h5> 2. What will be the process of winner selection?</h5>
                    <p>
                     Whoever got highest points for the daily, weekly and monthly will be rewarded for that category. Winner will be selected as first come first arrival basis. 
                    </p>
                    
                    <h5> 3. What will be the prizes for daily winners?</h5>
                    <p>
                      1st Prize: 30 BDT <br>
                      2nd Prize: 20BDT <br>
                      3rd Prize: 10 BDT
                    </p>
                    <h5> 4. What will be the prizes for Weekly winners?</h5>
                    <p>
                      1st Prize: 100 BDT  <br>
                      2nd Prize: 50BDT <br>
                      3rd Prize: 40 BDT
                    </p>
                    <h5> 5. What will be the prizes for monthly winners?</h5>
                    <p>
                      1st Position:  Walton Primo E11 <br>
                      2nd Position: 1000 BDT <br>
                      3rd Position: 500 BDT
                    </p>
                  </div>
                  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <h5> 1.  How can I contact with any concern person to know more in details?</h5>
                    <p>
                      If you have any question, please call <code>+8801873048744</code>  or submit your query from help section.
                    </p>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="toggle_help">
            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"><i class="fa fa-question-circle"></i> Help</a>
          </div>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <!-- <h5 class="modal-title" id="exampleModalLabel">Tell us what you think about the Quiz Bazz app. Also if you have any quesition, Please let us know here.</h5> -->

                  <h5 class="modal-title " id="exampleModalLabel">Tell us what you think about the Quiz Bazz app. Also if you have any quesition, Please let us know here.</h5>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="mb-3">
                      <label for="recipient-name" class="col-form-label">Email:</label>
                      <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                      <label for="message-text" class="col-form-label">Message:</label>
                      <textarea class="form-control" id="message-text"></textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
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
                  <!-- <li>
                    <a href="#" class="nav-link">Topics</a>
                  </li>
                  <li>
                    <a href="#" class="nav-link">Help/Faq</a>
                  </li> -->
                  <li>
                    <a href="<?=site_url('login/index');?>" class="nav-link">Login</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="footer_bottom">
          <ul class="nav">
            <li>© 2020  Play N Win</li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>
        </div>
      </div>
    </footer>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    
  </body>
</html>