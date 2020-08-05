<?php include_once "header.php";
#https://v4-alpha.getbootstrap.com/components/forms/
include_once "dbConnection.php";
include_once "classes/breeds.php" ?>
<style type="text/css">
html {
  font-size: 16px;
}

.cid-s5L8Qfeb7X{
    background: url("assets/images/background1.jpg") no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }
  .clr {  color: #fff; }
  .clr p{ color: #fff; }
  .newimg{ background:#76c355 !important; }
  .newimg h2 { padding: 30px; }
  .welabel{ font-size: 20px; }
  .weinp{ padding: 10px; padding:50px;}
  input[type="radio"]:checked {
  box-shadow: 0 0 0 30px orange;
}
input[type=radio] + label {
  color: #ccc;
  font-style: italic;
}
.brdrd{
  border-radius: 60px;
}
.overlay {
 position:fixed;
   left:100px;
   top:150px;
}
</style>
<script type="text/javascript">
    var datefield=document.createElement("input")
    datefield.setAttribute("type", "date")
    if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
        document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n') 
    }
</script>
 
<script>
if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
    jQuery(function($){ //on document.ready
        $('#birthday').datepicker();
    })
}
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<section class="tabs2 cid-s5L8Qfeb7X" id="tabs2-9" style="margin-top:50px ;">
    <div  class="container clr" >
        <h2 class="mbr-section-title align-center pb-5 mbr-fonts-style display-2">Feed it how you would do it to your kid</h2>
        <p class="clr">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        <div class="mbr-section-btn align-center"><a class="btn btn-md btn-black-outline display-4" href="">Get Started</a></div>

    </div>
</section>
<section class="tabs2 newimg" id="tabs2-9" >
  <form method="post" name="Form" onsubmit="return validateForm()" action="">

    <div  class="container clr" >
        <h2 class="mbr-section-title align-center pb-5 mbr-fonts-style display-2">Feed it how you would do it to your 
          <div class="form-group weinp">
             <p id="demo" ></p>
              <label for="exampleInputEmail1" class="welabel brdrd">Dogname</label>
              <input type="text" class="form-control emi" id="myInput" aria-describedby="emailHelp" placeholder="Enter your dogname" oninput="myFunction()">
              <!--  <label for="exampleInputEmail1" class="welabel emi2 brdrd">Email address2</label>
               <input type="email" class="form-control emi2" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Enter email" > -->
              <label class="welabel" style="margin-top:12px;"><span>Choose the Pet</span></label> <br>  
              <label class="form-check-label"><span class="welabel">Dog </span>
              <input class="brdrd" type="radio" id="pettype" style="" value="cat" oninput="myFunction('dogname')"> <span class="welabel">Cat </span>
              <input class="brdrd" type="radio" id="pettype2"  value="dog" oninput="myFunction('dogname')">
              </label><br>
              
              <label class="welabel"><span>Choose Your Bread</span></label> <br>  
              <select class="form-control" style="margin-bottom:-60px;"> 
              <option>Select Your Bread</option>
              <option>Bread1</option>
              <option>Bread1</option>
              </select><br>
              <label onclick="myFunction2();" style="font-size:12px;margin-top:-130px;color:#f0760c !important;cursor: copy;">Next Steps ---</label>
              <div class="emi2">
              <label class="welabel">Birthday</label>
               <input class="brdrd" type="date" id="birthday" name="birthday" placeholder="click to set birthday" style="border-radius:30px;" /> <br><br>
                <label for="exampleInputEmail1" class="welabel">Age Of Dog</label>
                 <input type="number" id="quantity" name="quantity" min="2000" max="2021" placeholder="year">
                 <input type="number" id="quantity" name="quantity" min="1" max="5" placeholder="month">
                 <br><br>
                 <label for="exampleInputEmail1" class="welabel">Weight Goal</label>
                 <input type="number" id="quantity" name="quantity" min="0" max="1000" placeholder="12 lb">
                
               </div>
          </div>
         
    </div>
  </form>
</section>
<section>

</section>

<?php include_once "footer.php" ?>
<script type="text/javascript">
    function myFunction(dogname) {
      if (dogname == 'dogname'){
        var x = document.getElementById("pettype").value;
         var x = document.getElementById("pettype2").value;
        document.getElementById("demo").innerHTML = "Type is: "+ x;
        //mydiv.appendChild(document.createTextNode("bar"));
      }
      else{
  var x = document.getElementById("myInput").value;
  document.getElementById("demo").innerHTML = "Your Dog Name is: " + x;
}
}
$('.emi2').hide();
   function myFunction2() {
   $('.emi2').delay(500).show(3000); 

}
$(document).ready(function(){
//   $(".emi").keyup(function(){
//     alert('calling');
//   var a1 = $('.emi').val();
//        document.getElementById("demo").innerHTML = "You wrote: " + a1;
// });
       
    });
</script>
