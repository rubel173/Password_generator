<?php 
function password($length, $lowercase, $uppercase, $number, $symbol)
{
  $lower="abcdefghijklmnopqrstuvwxyz";
  $upper="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $allnumber="1234567890";
  $allsymbol="!@#$%^&*-+/?";
  $charecter="";
  if ($lowercase) {
    $charecter .=$lower;
  }
  if ($uppercase) {
    $charecter .= $upper;
  }
  if ($number) {
    $charecter .= $allnumber;
  }
  if ($symbol) {
    $charecter .= $allsymbol;
  }
  if (empty($charecter)) {
    return 'Please Selecet At Least One Character Type';
  }
  $shuffle= str_shuffle($charecter);
  $pas= substr($shuffle, 0,$length);
  return $pas;

}
$pas="";
if ($_SERVER['REQUEST_METHOD']=="POST") {
  $length=$_POST['length'];
  $lower=isset($_POST['lowercase']);
  $upper=isset($_POST['uppercase']);
  $number=isset($_POST['number']);
  $symbol=isset($_POST['symbol']);
  $pas=password($length,$lower,$upper,$number,$symbol);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Password Genaretor</title>
    <!-- fonts link -->

    <!-- icon link -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <!-- css links -->

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">
  </head>
  <body>
    
    <section class="password" >
      <div class="container">
        <div class="row justify-content-center pt-5">
          <div class="col-lg-6 col-md-8 col-sm-10">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
              <div class="card p-3" >
                <div class="genarate_password">
                  <div class="card-title">
                    <h1>Password Generator</h1>
                    <p>Create a Secure And Uniq Password With Just a Click</p>
                  </div>
                  <div class="card-body">
                    <div class="input-box">
                      <div class="row align-items-center">
                        <div class="col-sm-2 col-4">
                          <input type="number" name="length" id="length" class=" form-control rounded " value="8" >
                        </div>
                        <div class="col-sm-6 col-8">
                          <label for="length">Password length</label>
                        </div>
                      </div>
                      <!-- 2nd row -->
                      <div class="row pt-4 align-items-center">
                        <div class="col-sm-6 col-6">
                          <div class="row align-items-center">
                            <div class="col-sm-1">
                              <input type="checkbox" name="lowercase" id="lowercase" class="  rounded " <?php echo isset($_POST['lowercase'])?'checked':''; ?> >
                            </div>
                            <div class="col-sm-10">
                              <label for="lowercase">Lower Case</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-6">
                          <div class="row align-items-center">
                            <div class="col-sm-1">
                              <input type="checkbox" name="uppercase" id="uppercase" class="  rounded " <?php echo isset($_POST['uppercase'])?'checked':''; ?>>
                            </div>
                            <div class="col-sm-10">
                              <label for="uppercase">Upper Case</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row pt-4 align-items-center">
                        <div class="col-sm-6 col-6">
                          <div class="row align-items-center">
                            <div class="col-sm-1">
                              <input type="checkbox" name="number" id="number" class="  rounded "<?php echo isset($_POST['number'])?'checked':''; ?> >
                            </div>
                            <div class="col-sm-10">
                              <label for="number">Number</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-6">
                          <div class="row align-items-center">
                            <div class="col-sm-1">
                              <input type="checkbox" name="symbol" id="symbol" class="  rounded "<?php echo isset($_POST['symbol'])?'checked':''; ?> >
                            </div>
                            <div class="col-sm-10">
                              <label for="symbol">Symbol</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row pt-4">
                        <div class="col-12">
                          <button type="submit" class="btn btn-dark w-100"> Generate Password</button>
                        </div>
                      </div>
                      <div class="row pt-4">
                        <div class="col-12">
                          <p class="bg-secondary rounded text-center p-2" style=" height: 40px; color: white; ">
                            <?php echo $pas; ?>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>            

  <!-- js file link -->
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
    </script>
  </body>
</html>