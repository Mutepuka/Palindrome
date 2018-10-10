<?php
if(isset($_POST['key'])=='testWord'){
  /*we get the value from the input field search and store it to a local variable called search. second
  we use substr to run through each letter in the word and we check the word length with strlen. note the word we checking for is what is being entered in the input field. Thirdly we print the word in reverse with strrev. note that i use the theword variable which store the lenght value of the string being entered, then finally i use strcasecmp which compares the two string if the contain the same letters, this way we escape the case senstive problem.*/
  $search=$_POST['search'];
  $theword=substr($search,0,strlen($search));
  $rve=strrev($theword);

  $word1= strcasecmp($theword, $rve)==0;
  $word='';
  if($word1 == true){
    $word.='
    The word is Palindrome if writen backwords the print is '.$rve.'
    ';
   exit($word);
  }else{
    exit("false not a palindrome");
  }

}
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
<meta http-equiv="content-type" content="text/html"/>
<link rel="stylesheet" href="css/style.css"/>
<script src="js/jquery-3.2.1.min.js"></script>
</head>
<body>
<div class="main_body">
<div class="form_body">
  <h1>Program to check if word is Palindrome</h1>
  <div class="check_form">
    <div class="word">
			<label>WORD:</label>
		</div>
    <form method="get" id="form_word">
			<input type="text" name="search" id="search" placeholder="Enter word"><br>
      <div class="button">
			<button type="submit" name="search_query" class="btn_search_home"><span>Check Word</span></button>
    </div>
		</form>
    <div class="out_word">
      <p id="checking"></p>
      <textarea id="fword"></textarea>
    </div>
  </div>

</div>
</div>
</body>
</html>
<script>
$(document).ready(function(){
  $("#form_word").submit(function(e){
    //prevent the execution of the form values
    e.preventDefault();
    var search= $("#search");
    $.ajax({
      url:'index.php',
      method: 'POST',
      dataType: 'text',
      data:{
        key: 'testWord',
        search: search.val()
      },
      beforeSend:function(){
        $("#checking").html('<br /><label class="text-primary">checking...</label>');
      },success:function(response){
        $("#checking").html('<br /><label class="text-primary">Results...</label>');
        $("#fword").html(response);

      }
    })
  })

});
</script>
