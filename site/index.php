<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
<div class="login-page">
  <div class="form">
    <form class="sendmail-form" method="POST" action="sendMail.php">
      <input type="email" placeholder="Ten Email" name="nameEmail"  required/>
      <input type="text" placeholder="Tieu de" name="titleEmail"/>
      <textarea  id="" cols="30" rows="5" placeholder="Noi dung" name="contentEmail"></textarea>
      <button>login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js
"></script>
<script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>