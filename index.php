<?php 

include_once 'includes/dbconn.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Information Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="public/style.css" rel="stylesheet">
    
</head>
<body>
    
    <div class="container">
        <div class="outer-hd">
            <div class="inner-hd">
                <h2>AUTO SHOP</h2>
                <p>Customer Information and Retrieval Form</p>
            </div>
        </div>
    </div>

<!-- Enter Data section -->
    <div class="container">
        <div class="form-all">
            <div class="form-hd">
                <h2>Customer Information</h2>
            </div>

            <form action="includes/insertinfo.php" method="POST" class="needs-validation" >

                <div class="row">
                    <div class="col">
                    <label for="firstname">First Name *</label>
                    <input type="text" name="firstname" class="form-control" placeholder="Enter First Name" id="f-name" required> 
                    <div class="valid-feedback"></div>                  
                    </div>

                    <div class="col">
                    <label for="lastname">Last Name *</label>
                    <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name" id="l-name" required>   
                    <div class="invalid-feedback"></div>               
                    </div>
                </div>

                <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter Address" id="address">
                </div>

                <div class="form-group">
                <label for="phone">Phone Number *</label>
                <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number no Spaces" id="phone" required>  
                <div class="invalid-feedback"></div>                
                </div>

                <div class="form-group">
                <label for="email">E-mail *</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email" id="email" required>
                <div class="invalid-feedback"></div>  
                </div>


            <div class="form-hd">
                <h2>Vehicle Information</h2>
            </div>

                <div class="form-group">
                <label for="year">Year</label>
                <input type="number" name="year" class="form-control" placeholder="Enter Year" id="year">
                </div>
                
                <div class="form-group">
                <label for="make">Make</label>
                <input type="text" name="make" class="form-control" placeholder="Enter Make" id="make">
                </div>

                <div class="form-group">
                <label for="model">Model</label>
                <input type="text" name="model" class="form-control" placeholder="Enter Model" id="model">
                </div>

                <div class="form-group">
                <label for="vin">VIN</label>
                <input type="text" name="vin" class="form-control" placeholder="Enter VIN" id="vin">
                </div>

                <div class="form-group btn-psh">
                <button type="submit" name="sendinfo" class="btn btn-success">Submit</button>
                </div>

            </form>
        </div>
    </div>


<br><br>

<!-- Retrieve Data Section -->

    <div class="container">
        <div>
            <button id="btn-toggle" class="btn btn-primary">Retrieve</button>
        </div>

<br><br>


<!-- Search and retrieve results -->
        <div id="rtv-search">
            <div>
            </div>
                <h3>Customer Information Search Section</h3>
            <div>
                <form action="" method="POST">
                    <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Enter Customer Phone Number">
                    </div>
                        <br>
                    <div>
                    <input type="submit" name="getinfo" class="btn btn-success" placeholder="Search">
                    </div>
                </form>
            </div>
        </div>

<?php 

if(isset($_POST['getinfo']))
{

    $info = $_POST['search'];
    $sql = "SELECT * FROM customer WHERE phone='$info'";
    $result = mysqli_query($conn, $sql);

?>
        <div>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Year</th>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">Vin</th>
                    </tr>
                </thead>

                <?php 
                 if(mysqli_num_rows($result) > 0) 
                    {
                        while($row = mysqli_fetch_array($result))
                        {
                
                ?>
                <tbody>
                    <tr>
                    <td><?php echo $row['firstName'];?></td>
                    <td><?php echo $row['lastName'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['year'];?></td>
                    <td><?php echo $row['make'];?></td>
                    <td><?php echo $row['model'];?></td>
                    <td><?php echo $row['vin'];?></td>
                    </tr>
                <?php 
                        }
                    }     
                        else
                        {
                            ?>
                            <tr>
                                <td colspan="6">No Records Found</td>
                            </tr>
                <?php
                        }   
                ?>    
                </tbody>
            </table>
            <?php 
                };
            ?>
        </div>
    </div>

    <div class="b-spacing">
        <br><br><br><br><br><br><br><br>
    </div>

             

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script scr="public/script.js">

                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function () {
                'use strict'

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.querySelectorAll('.needs-validation')

                // Loop over them and prevent submission
                Array.prototype.slice.call(forms)
                    .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                    })
                })()



    </script>
    <script>
        // jquery slide animation for customer search
        $(document).ready(function(){
            $("#rtv-search").hide();
                $("#btn-toggle").click(function(){
                    $("#rtv-search").slideToggle(1000);
            });
        });
    </script>
</body>
</html>