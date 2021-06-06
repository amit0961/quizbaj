
<?php

$result = $exam_sheet[0]->accessInfo;

//echo "<pre>";print_r($result);exit();

$this->load->view('confignew/header');


//$this->load->view('confignew/header');
?>



<script type="text/javascript">
    $(document).ready(function(){
    
    $('.afterexam').hide();
    $('.result_final').hide();

});
</script>

<style type="text/css">
    .tab {
      display: none;
    }
    .afterexam{
        display: none;
    }
    .result_final{
        display: none;
    }
   

.count1{
    font-size:22px;
    text-align:center;
    font-weight:bold;
    color:#ff8400;
}

.bulgy-radios label {
  display: block;
  position: relative;
  height: 1em;
  padding-left: 30px;
  margin-bottom: 1.75rem;
  cursor: pointer;
  font-size:12px;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  color: #ccc;
  letter-spacing: 1px;
}
.bulgy-radios label:hover input:not(:checked) ~ .radio {
  opacity: 0.8;
}
.bulgy-radios .label {
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
          align-items: center;
}
.bulgy-radios .label span {
  line-height: 1em;
}
.bulgy-radios input {
  position: absolute;
  cursor: pointer;
  height: 0;
  width: 0;
  left: -2000px;
}
.bulgy-radios input:checked ~ .radio {
  background-color: #0ac07d;
  -webkit-transition: background .3s;
  transition: background .3s;
}
.bulgy-radios input:checked ~ .radio::after {
  opacity: 1;
}
.bulgy-radios input:checked ~ .label {
  color: #0bae72;
}
.bulgy-radios input:checked ~ .label span {
  -webkit-animation: bulge .5s forwards;
          animation: bulge .5s forwards;
}
.bulgy-radios input:checked ~ .label span:nth-child(1) {
  -webkit-animation-delay: 0.025s;
          animation-delay: 0.025s;
}
.bulgy-radios input:checked ~ .label span:nth-child(2) {
  -webkit-animation-delay: 0.05s;
          animation-delay: 0.05s;
}
.bulgy-radios input:checked ~ .label span:nth-child(3) {
  -webkit-animation-delay: 0.075s;
          animation-delay: 0.075s;
}
.bulgy-radios input:checked ~ .label span:nth-child(4) {
  -webkit-animation-delay: 0.1s;
          animation-delay: 0.1s;
}
.bulgy-radios input:checked ~ .label span:nth-child(5) {
  -webkit-animation-delay: 0.125s;
          animation-delay: 0.125s;
}
.bulgy-radios input:checked ~ .label span:nth-child(6) {
  -webkit-animation-delay: 0.15s;
          animation-delay: 0.15s;
}
.bulgy-radios input:checked ~ .label span:nth-child(7) {
  -webkit-animation-delay: 0.175s;
          animation-delay: 0.175s;
}
.bulgy-radios input:checked ~ .label span:nth-child(8) {
  -webkit-animation-delay: 0.2s;
          animation-delay: 0.2s;
}
.bulgy-radios input:checked ~ .label span:nth-child(9) {
  -webkit-animation-delay: 0.225s;
          animation-delay: 0.225s;
}
.bulgy-radios input:checked ~ .label span:nth-child(10) {
  -webkit-animation-delay: 0.25s;
          animation-delay: 0.25s;
}
.bulgy-radios input:checked ~ .label span:nth-child(11) {
  -webkit-animation-delay: 0.275s;
          animation-delay: 0.275s;
}
.bulgy-radios input:checked ~ .label span:nth-child(12) {
  -webkit-animation-delay: 0.3s;
          animation-delay: 0.3s;
}
.bulgy-radios input:checked ~ .label span:nth-child(13) {
  -webkit-animation-delay: 0.325s;
          animation-delay: 0.325s;
}
.bulgy-radios input:checked ~ .label span:nth-child(14) {
  -webkit-animation-delay: 0.35s;
          animation-delay: 0.35s;
}
.bulgy-radios input:checked ~ .label span:nth-child(15) {
  -webkit-animation-delay: 0.375s;
          animation-delay: 0.375s;
}
.bulgy-radios input:checked ~ .label span:nth-child(16) {
  -webkit-animation-delay: 0.4s;
          animation-delay: 0.4s;
}
.bulgy-radios input:checked ~ .label span:nth-child(17) {
  -webkit-animation-delay: 0.425s;
          animation-delay: 0.425s;
}
.bulgy-radios input:checked ~ .label span:nth-child(18) {
  -webkit-animation-delay: 0.45s;
          animation-delay: 0.45s;
}
.bulgy-radios input:checked ~ .label span:nth-child(19) {
  -webkit-animation-delay: 0.475s;
          animation-delay: 0.475s;
}

.radio {
  position: absolute;
  top: 0.2rem;
  left: 0;
  height: 1rem;
  width: 1rem;
  background: #c9ded6;
  border-radius: 50%;
}
.radio::after {
  content: '';
  position: absolute;
  opacity: 0;
  top: .3rem;
  left: .28rem;
  width: .5rem;
  height: .5rem;
  border-radius: 50%;
  background: #fff;
}

@-webkit-keyframes bulge {
  50% {
    -webkit-transform: rotate(4deg);
            transform: rotate(4deg);
    font-size: 1.5em;
    font-weight: bold;
  }
  100% {
    -webkit-transform: rotate(0);
            transform: rotate(0);
    font-size: 1em;
    font-weight: bold;
  }
}

@keyframes bulge {
  50% {
    -webkit-transform: rotate(4deg);
            transform: rotate(4deg);
    font-size: 1.5em;
    font-weight: bold;
  }
  100% {
    -webkit-transform: rotate(0);
            transform: rotate(0);
    font-size: 1em;
    font-weight: bold;
  }
}



</style>


            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid" id="quizrules">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Quiz Rules</h4>
                                </div>
                                
                            </div>
                        </div>
                        <div class="dashboard_top_content">
                            
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="card-box">
                                        <div class="row pt-3 quiz_rules">
                                            <div class="col-lg-5 offset-lg-1">
                                                <div>
                                                    <div class="faq-question-q-box">1</div>
                                                    <h4 class="faq-question">
                                                        There are 10 multiple choice items in this park
                                                    </h4>     
                                                </div>
                                                <div>
                                                    <div class="faq-question-q-box">3</div>
                                                    <h4 class="faq-question">
                                                         Any incorrect answers will take you back to the start.
                                                    </h4>     
                                                </div>
                                                <div>
                                                    <div class="faq-question-q-box">5</div>
                                                    <h4 class="faq-question">
                                                          There are 10 exam for 10 taka payment and each payment there will be 10 multiple choice items.
                                                    </h4>     
                                                </div>
                                                <div>
                                                    <div class="faq-question-q-box">7</div>
                                                    <h4 class="faq-question">
                                                         There are 10 multiple choice items in this park
                                                    </h4>     
                                                </div>
                                            </div>
                                            <div class="col-lg-5 offset-lg-1">
                                                <div>
                                                    <div class="faq-question-q-box">2</div>
                                                    <h4 class="faq-question">
                                                        Answer every questions correctly to complete the challenger.
                                                    </h4>
                                                </div>
                                                <div>
                                                    <div class="faq-question-q-box">4</div>
                                                    <h4 class="faq-question">
                                                        The faster you beat the challenger, the higher your rank.
                                                    </h4>
                                                </div>
                                                <div>
                                                    <div class="faq-question-q-box">6</div>
                                                    <h4 class="faq-question">
                                                        There are 10 multiple choice items in this park
                                                    </h4>
                                                </div>
                                                <div>
                                                    <div class="faq-question-q-box">8</div>
                                                    <h4 class="faq-question">
                                                         Enjoy and learn.
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- end card-body -->
                                    </div>
                                </div>
                            <div class="col-sm-12 col-md-12">
                                <a class="btn btn-danger" id="start" href="#">Start quiz now</a>
                            </div>  
                                
                            </div>
                        </div>     
                        <!-- end page title --> 
                   
                        
                    </div> <!-- container -->


                    <div class="container-fluid exam">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">History</h4>
                                </div>
                                <div class="quiz_now">
                                    <a class="btn count1" style="color: black;font-size: 22px;"></a>
                                </div>
                            </div>
                        </div>
                            
                        <!-- end page title --> 

                    <form id="question" onsubmit='return exam_sheet_form();'>

                        <div class="row history_content">
                         
                        <?php 

                            if(!empty($result)){
                                $i=1;
                                $total_que = count($result);
                                $pur = 100 / $total_que;
                                $totalpur = 0;
                                foreach ($result as $val) {
                                    $totalpur += $pur;
                        ?>

                        <div class="tab" style="width: 100%;">

                            <div class="col-xl-12 col-md-12">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-xl-4 col-md-4">
                                            <h4>Questions <?=$i;?> out of <?=$total_que;?></h4>
                                            <div class="progress mb-2">

                                                <div class="progress-bar" role="progressbar" style="width: <?=$totalpur;?>%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-md-2"></div>
                                        <div class="col-xl-6 col-md-6">
                                            <h4>Questions: <?=$i;?></h4>
                                            <p>
                                                 <?=$val->question;?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding: 0 10px;">
                                <div class="col-xl-12 col-md-12">
                                    <div id="validation<?=$i?>" style="color: red; font-size: 22px; padding: 0 0 10px; font-weight: normal;"></div>
                                </div>
                            <?php $q = 1; foreach ($val->questionOptions as $option) { ?>

                            <div class="col-xl-3 col-md-6">
                                <div class="card-box">
                                    <div class="bulgy-radios" role="radiogroup" aria-labelledby="bulgy-radios-label">
                                        
                                         <!-- <input type="radio" id="user_ans<?=$q;?>" class="custom-control-input" value="<?=$q;?>" name="user_ans_<?=$i;?>"> -->

                                        

                                       <!--  <label class="custom-control-label" for="user_ans<?=$q;?>"><?=$option->option;?></label>  -->
                                        
                                            <label>
                                                <input type="radio" id="user_ans<?=$q;?>" value="<?=$q;?>" name="user_ans_<?=$i;?>"> 
                                                <span class="radio"></span>
                                                <span class="label" style="line-height: 2;" ><?=$option->option;?></span>
                                              </label>
                                        
                                    </div>
                                </div>
                            </div>

                            <?php $q++;} ?>

                            </div>

                            <!---userexaminfo-->
                            <input type="hidden" id="examID" value="<?=$val->examID;?>" >
                            <input type="hidden" id="userExamID" value="<?=$val->userExamID;?>" >
                            <input type="hidden" id="sheetID_<?=$i;?>" value="<?=$val->sheetID;?>" >
                            <input type="hidden" id="answer_<?=$i;?>" value="<?=$val->answer;?>" >
                            <input type="hidden" id="questionsID_<?=$i;?>" value="<?=$val->questionsID;?>" >

                            <?php 
                                if($i == $total_que){
                                    $value=1;
                                    $ms = "Finish ";
                                    $icon = "";
                                    $button = "Submit";
                                }else{
                                    $value = 0;
                                    $ms = "Next Qustion ";
                                    $icon = "<i class='fa fa-arrow-right'></i>";
                                    $button = "Submit";
                                }

                            ?>

                            <input type="hidden" id="isComplete_<?=$i;?>" value="<?=$value;?>" >

                            <!---userexaminfo end-->


                            <button id="nextBtn" onclick="nextPrev(<?=$i;?>)" type="button" class="btn btn-info width-md waves-effect waves-light next_qus"><?=$ms;?> <?=$icon;?></button>

                        </div>



                        <?php $i++;}} ?>

                        </div>

                        
                        <!-- end row -->
                    </form>
                        
                    </div> <!-- container -->

                    <div class="container-fluid afterexam">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">View Result</h4>
                                </div>
                                <div class="quiz_now" style="margin-right: 30px;">
                                    <a class="btn btn-danger viewquiz" href="#">View Quiz Answer</a>
                                </div>

                                <div class="quiz_now" style="margin-right: 30px;">
                                    <a class="btn btn-danger" href="<?=site_url('user/subject');?>">Take A New Quiz</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="container-fluid result_final">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Final Result</h4>
                                </div>
                                
                            </div>
                        </div>
                        <div class="dashboard_top_content">
                            
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="card cta-box bg-info text-white">
                                        <div class="card-body final_result">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <img class="ml-3" style="width: 163px; height: 163px;" src="<?=$image;?>"  alt="Generic placeholder image">
                                                </div>
                                                <div class="col-sm-4">
                                                    <h1>Ekramul Karim</h1>
                                                </div>
                                                <div class="col-sm-5 you_have">
                                                    <p>You have got</p>
                                                    <h2 id="point"></h2>
                                                    <p>Points!</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card-body -->
                                    </div>
                                </div>
                              
                                
                            </div>
                        </div>     
                        <!-- end page title --> 
                        
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card-box">
                                    <div class="text-center right_answar">
                                        <h2 class="pt-1 mb-1" id="rightanswar">  </h2>
                                        <p class="text-muted mb-0">Right Answar</p>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card-box">
                                    <div class="text-center wrong_answar">
                                        <h2 class="pt-1 mb-1" id="wronganswar">  </h2>
                                        <p class="text-muted mb-0">Wrong Answar</p>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card-box">
                                    <div class="text-center  total_question">
                                        <h2 class="pt-1 mb-1" id="totalquestion">  </h2>
                                        <p class="text-muted mb-0">Total Questions</p>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card-box">
                                    <div class="text-center total_time">
                                        <h2 class="pt-1 mb-1" id="totaltime"> 215 </h2>
                                        <p class="text-muted mb-0">Total Time (sec)</p>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            
                            <div class="col-xl-8 col-md-6">
                                <div class="card-box parcentage_box">
                                    <div class="float-left parcen_prog" dir="ltr">
                                        <input data-plugin="knob" data-width="60" data-height="60" data-fgColor="#21ce25 "
                                            data-bgColor="#48525e" id="parcentagevalue" value=""
                                            data-skin="tron" data-angleOffset="180" data-readOnly=true
                                            data-thickness=".15"/>
                                    </div>
                                    <div class="parcentage float-left">
                                        <h2 class="pt-1 mb-1" id="parcentage">  </h2>
                                        <p class="text-muted mb-0">Parcentage</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="result_button">
                            <a href="<?=site_url('user/subject');?>"><button type="button" class="btn btn-info waves-effect waves-light">Take A New Quiz</button></a>
                            <button type="button" class="btn btn-purple waves-effect waves-light">View Quiz Answer</button>
                        </div>

                      
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                2020 &copy; <a href="">Quiz Buzz</a> 
                            </div>
                            
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->




<?php
$this->load->view('confignew/footer');
?>

<script>
$(document).ready(function () {
//var nowPlus30Seconds = moment().add('30', 'seconds').format('YYYY/MM/DD HH:mm:ss');

$('.count1').countdown(nowPlus30Seconds)
    .on('update.countdown', function (event) { 
        //$(this).html(event.strftime('%Y : %D : %H : %M : %S')); 
        $(this).html(event.strftime('%S')); 
    })
    .on('finish.countdown', function () { 
        $('.afterexam').show();
        $(".afterexam").css("display", "inline-block");
        $('.exam').hide();
    });
});
</script>

<script type="text/javascript">

 $(document).ready(function(){
    
    $(".viewquiz").click(function(){
         $('.result_final').show();
         $('.afterexam').hide();
         $(".result_final").css("display", "inline-block");
    });

});


function exam_sheet_form(){
    return false;
}

var currentTab = 0;
showTab(currentTab); 

function showTab(n) {
  
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }

  fixStepIndicator(n)
}

function nextPrev(n) {
  
  var inputfield = "input[name=user_ans_" + n + "]:checked";

  var userans = $(inputfield, '#question').val();

    if(userans){

        var x = document.getElementsByClassName("tab");
         
          if (n == 1 && !validateForm()) return false;
          
          x[currentTab].style.display = "none";

          currentTab = currentTab + 1;

         
          //==========submit answer===\\\


          var examID = $("#examID").val();
          var userExamID = $("#userExamID").val();
          
          var sheetID = $("#sheetID_" + n).val();
          var answer = $("#answer_" + n).val();
          var questionsID = $("#questionsID_" + n).val();
          var isComplete = $("#isComplete_" + n).val();

          if(userans == answer){
            var right = 1;
          }else{
            var right = 0;
          }

          var isCorect = right;

            $.ajax({
                url: '<?php echo base_url(); ?>index.php/user/answer_submit',
                dataType:'json',
                type: "post",
                data: {examID: examID, userExamID: userExamID, sheetID: sheetID, answer: userans, questionsID: questionsID, isComplete: isComplete, isCorect: isCorect},
                success: function(data){
                   
                   var data_result = data;
                    
                   if(data_result.accessInfo !="NULL"){
                        $('.afterexam').show();
                        $(".afterexam").css("display", "inline-block");
                        $('.exam').hide();

                        //$('#stest').html('hello');

                        var totalpoin = data.accessInfo.totalPoints;

                        $('#point').html(totalpoin);

                        var examResults = data.accessInfo.examResult;

                        var totalquestion  = examResults.questions;
                        $('#totalquestion').html(totalquestion);
                        var correctanswer  = examResults.correct;
                        $('#rightanswar').html(correctanswer);
                        var wronganswar  = examResults.wrong;
                        $('#wronganswar').html(wronganswar);

                        var parcentagevalue = correctanswer + 0 + "%";

                        $('#parcentagevalue').val(parcentagevalue);

                        $('#parcentage').html(parcentagevalue);

                        //console.log(wronganswar);
                        //console.log(correctanswer);
                        //console.log(totalquestion);
                        //console.log(totalpoin);
                   }

                    //console.log(data.accessInfo);
                    
                }
            });


          //============end=======\\

          // Otherwise, display the correct tab:
          showTab(currentTab);
    }else{

        var ms = "Please Select a Answar First";
        $('#validation' + n).html(ms);

    }

}

function validateForm() {
 
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  
  for (i = 0; i < y.length; i++) {
    
    if (y[i].value == "") {
      
      y[i].className += " invalid";
      
      valid = false;
    }
  }

  return valid; 
}

function fixStepIndicator(n) {
  
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
 
  x[n].className += " active";
}


</script>
<script src="http://momentjs.com/downloads/moment.js"></script>
<script src="http://cdn.rawgit.com/hilios/jQuery.countdown/2.0.4/dist/jquery.countdown.min.js"></script>