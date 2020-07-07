

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Technology</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container mt-3">
        <div class="card-body">
    <form action="createfile.php" method="post">
        <div class="row">
            <div class="col-sm-6">
                <label for="firstname">First Name</label>
                <input required type="text" placeholder="Enter firstname" name="firstname" id="firstname" class="form-control">
            </div>
            <div class="col-sm-6">
                <label for="lastname">Last Name</label>
                <input required type="text" placeholder="Enter lastname" name="lastname" id="lastname" class="form-control">
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <label for="address">Address</label>
                <textarea required name="address" id="address" cols="30" rows="3" class="form-control" placeholder="Enter your address"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
            <label for="village">Village</label>
            <input required type="text" placeholder="Enter village" name="village" id="village" class="form-control">
           </div>
           <div class="col-sm-3">
            <label for="city">City</label>
            <input required type="text" placeholder="Enter city" name="city" id="city" class="form-control">
           </div>
           <div class="col-sm-3">
            <label for="taluka">Taluka</label>
            <input required type="text" placeholder="Enter taluka" name="taluka" id="taluka" class="form-control">
           </div>
           <div class="col-sm-3">
            <label for="district">District</label>
            <input required type="text" placeholder="Enter district" name="district" id="district" class="form-control">
           </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
            <label for="state">State</label>
            <input required type="text" placeholder="Enter state" name="state" id="state" class="form-control">
           </div>
           <div class="col-sm-6">
            <label for="jurisdiction">Jurisdiction</label>
            <input required type="text" placeholder="Enter jurisdiction" name="jurisdiction" id="jurisdiction" class="form-control">
           </div>
        </div>
        
        <div class="row">
        <div class="col-sm-6">
            <label for="email">Email ID</label>
            <input required type="email" placeholder="Enter email" name="email" id="email" class="form-control">
           </div>
           <div class="col-sm-6">
            <label for="contact">Contact</label>
            <input required type="tel" placeholder="Enter contact" name="contact" id="contact" class="form-control">
           </div>
        </div>
        <div class="row">
           <div class="col-sm-6">
            <label for="password">Password</label>
            <input required type="password" placeholder="Enter password" name="password" id="password" class="form-control">
           </div>
           <div class="col-sm-6">
            <label for="cpassword">Confirm Password</label>
            <input required type="password" placeholder="Confirm password" name="confirmpassword" id="confirmpassword" class="form-control">
           </div>
        </div>
        <br>
        <button type="reset" class="btn btn-outline-secondary">Reset</button>
        <button class="btn btn-dark">Submit</button>
    </form>
    </div>
    </div>
  
</body>
</html>