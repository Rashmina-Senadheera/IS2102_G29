<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EVENTRA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

 <style>  
  @media screen and (max-width: 768px) {
  .img_form_custom{
    display: none;
  }
}

form {
  --background: white;
  --border: rgba(0, 0, 0, 0.125);
  --borderDark: rgba(0, 0, 0, 0.25);
  --borderDarker: rgba(0, 0, 0, 0.5);
  --bgColorH: 0;
  --bgColorS: 0%;
  --bgColorL: 98%;
  --fgColorH: 210;
  --fgColorS: 50%;
  --fgColorL: 38%;
  --shadeDark: 0.3;
  --shadeLight: 0.7;
  --shadeNormal: 0.5;
  --borderRadius: 0.125rem;
  --highlight: #6C006C;
  background: white;
  display: flex;
  flex-direction: column;
  padding: 1rem;
  position: relative;
  overflow: hidden;
}

form .email, form .email a {
  color: hsl(var(--fgColorH), var(--fgColorS), var(--fgColorL));
  font-size: 0.825rem;
  order: 4;
  text-align: center;
  margin-top: 0.25rem;
  outline: 1px dashed transparent;
  outline-offset: 2px;
  display: inline;
}

form a:hover {
  color: hsl(var(--fgColorH), var(--fgColorS), calc(var(--fgColorL) * 0.85));
  transition: color 0.25s;
}

form a:focus {
  color: hsl(var(--fgColorH), var(--fgColorS), calc(var(--fgColorL) * 0.85));
  outline: 1px dashed hsl(var(--fgColorH), calc(var(--fgColorS) * 2), calc(var(--fgColorL) * 1.15));
  outline-offset: 2px;
}

form > div {
  order: 2;
}

label {
  display: flex;
  flex-direction: column;
}

.label-show-password {
  order: 3;
}

label > span {
  color: var(--borderDarker);
  display: block;
  font-size: 0.825rem;
  margin-top: 0.625rem;
  order: 1;
  transition: all 0.25s;
}

label > span.required::after {
  content: "*";
  color: #dd6666;
  margin-left: 0.125rem;
}

label input {
  order: 2;
  outline: none;
}

label input::placeholder {
  color: var(--borderDark);
}

label input[name="password"] {
  -webkit-text-security: disc;
}

input[name="show-password"]:checked ~ div label input[name="password"] {
  -webkit-text-security: none;
}

label:hover span {
  color: #6C006C;
}

input[type="checkbox"] + div label:hover span::before,
label:hover input.text {
  border-color: #6C006C;
}

label input.text:focus,
label input.text:active {
  border-color:  #6C006C;
  box-shadow: 0 1px  #6C006C
}

input.text:focus + span,
input.text:active + span {
  color:  #6C006C;
}

input {
  border: 1px solid var(--border);
  border-radius: var(--borderRadius);
  box-sizing: border-box;
  font-size: 1rem;
  height: 2.25rem;
  line-height: 1.25rem;
  margin-top: 0.25rem;
  order: 2;
  padding: 0.25rem 0.5rem;
  /* width: 15rem; */
  transition: all 0.25s;
}

input[type="submit"] {
  color: hsl(var(--bgColorH), var(--bgColorS), var(--bgColorL));
  background: #6C006C;
  font-size: 0.75rem;
  font-weight: bold;
  margin-top: 0.625rem;
  order: 4;
  outline: 1px dashed transparent;
  outline-offset: 2px;
  padding-left: 0;
  text-transform: uppercase;
}

input[type="checkbox"]:focus + label span::before,
input[type="submit"]:focus {
  outline: 1px dashed #6C006C;
  outline-offset: 2px;
}

input[type="submit"]:focus {
  background: #6C006C;
}

input[type="submit"]:hover {
  background: #6C006C;
}

input[type="submit"]:active {
  background: #6C006C;
  transition: all 0.125s;
}

/** Checkbox styling */
.a11y-hidden {
  position: absolute;
  top: -1000em;
  left: -1000em;
}

input[type="checkbox"] + label span {
  padding-left: 1.25rem;
  position: relative;
}

input[type="checkbox"] + label span::before {
  content: "";
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 0.75rem;
  height: 0.75rem;
  border: 1px solid var(--borderDark);
  border-radius: var(--borderRadius);
  transition: all 0.25s;
  outline:1px dashed transparent;
  outline-offset: 2px;
}

input[type="checkbox"]:checked + label span::after {
  content: "";
  display: block;
  position: absolute;
  top: 0.1875rem;
  left: 0.1875rem;
  width: 0.375rem;
  height: 0.375rem;
  border: 1px solid var(--borderDark);
  border-radius: var(--borderRadius);
  transition: all 0.25s;
  outline:1px dashed transparent;
  outline-offset: 2px;
  background: #6C006C;
}



 </style>
</head>
<body style="background: #f2f4f8;">
 <?php include('Staticnavbar.php') ?>
  <div class="container-fluid" style="margin-top: 100px;">
    <div class="container" >
      <div class="row shadow-lg " style="border-color:black; background-color: white;">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">
          <img src="./assets/img/undraw_welcome_re_h3d9.svg" class="img-fluid img_form_custom" height="auto" width="75%">
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
          <!--Form start-->
          <br ><br ><br ><br >
          <form class="shadow w-450 p-3" 
            action="php/login.php" 
            method="post">
            <h1 class="a11y-hidden">Login Form</h1>
            <div>
            <?php if(isset($_GET['error'])){ ?>
             <div class="alert alert-danger" role="alert">
             <?php echo $_GET['error']; ?>
              </div>
            <?php } ?>
              <label class="label-email">
              <input type="text" 
               class="form-control"
               name="uname"
               value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>">
                <span class="required" style="font-family:'Poppins'" ><b>Email</b></span>
              </label>
              <label class="label-password">
              <input type="password" 
               class="form-control"
               name="pass">
                <span class="required" style="font-family:'Poppins'"> <b>Password</b></span>
              </label>
            </div>
            <input type="submit"   style="font-family:'Poppins'" value="Log In" >
            
          </form>
          <!--Form end-->
        </div>
      </div>
    </div>
  </div>
</body>

</html>