<?php

include_once("CommonCode.php");

// Check if he is logged in and if he is an Admin
if ($_SESSION["UserLoggedIn"] == false) {
    print "<script>alert('You are not logged in');</script>";
    print '<script>window.location.href = "Home.php";</script>';
    die();
}

if ($_SESSION["UserType"] != "Admin") {
    print "<script>alert('You are not an Admin');</script>";
    print '<script>window.location.href = "Home.php";</script>';
    die();
}

// Create a product 

if (isset($_POST["Productname"], $_POST["IMGname"], $_POST["Price"], $_POST["UpperdescriptionEN"], $_POST["LowerdescriptionEN"], $_POST["UpperdescriptionGER"], $_POST["LowerdescriptionGER"])) {
    //Getting the last used ID then +1 so i can use for the id descriptions
    $lastID = $connection->prepare("SELECT ProductID from Products ORDER BY ProductID DESC LIMIT 1");
    $lastID->execute();
    $result = $lastID->get_result();
    $row = $result->fetch_assoc();
    $lastproductID = $row["ProductID"] + 1; //+1 bcs the next

    //Common product info
    $productInsert = $connection->prepare("INSERT INTO Products (ProductName, ProductImage, Price) VALUES (?,?,?)");
    $productInsert->bind_param("ssi", $_POST["Productname"], $_POST["IMGname"], $_POST["Price"]);
    $productInsert->execute();

    //English Description
    $EnDesc = $connection->prepare("INSERT INTO Descriptions (DescText, ProductID, LanID, DescText2) VALUES (?,?,1,?)");
    $EnDesc->bind_param("sis", $_POST["UpperdescriptionEN"], $lastproductID, $_POST["LowerdescriptionEN"]);
    $EnDesc->execute();

    //German Description
    $GerDesc = $connection->prepare("INSERT INTO Descriptions (DescText, ProductID, LanID, DescText2) VALUES (?,?,2,?)");
    $GerDesc->bind_param("sis", $_POST["UpperdescriptionGER"], $lastproductID, $_POST["LowerdescriptionGER"]);
    $GerDesc->execute();

    print "<script>alert('Product has been created')</script>";
    header("Refresh:0");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./Bootstrap/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="./Bootstrap/bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='Navbar.css?t=<?= time(); ?>'>

    <style>
        .form-holder {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 100vh;
        }

        .form-holder .form-content {
            position: relative;
            text-align: center;
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-align-items: center;
            align-items: center;
            padding: 60px;
        }

        .form-content .form-items {
            border: 3px solid #fff;
            padding: 40px;
            display: inline-block;
            width: 100%;
            min-width: 540px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            text-align: left;
            -webkit-transition: all 0.4s ease;
            transition: all 0.4s ease;
        }

        .form-content h3 {
            color: #fff;
            text-align: left;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .form-content h3.form-title {
            margin-bottom: 30px;
        }

        .form-content p {
            color: #fff;
            text-align: left;
            font-size: 17px;
            font-weight: 300;
            line-height: 20px;
            margin-bottom: 30px;
        }


        .form-content label,
        .was-validated .form-check-input:invalid~.form-check-label,
        .was-validated .form-check-input:valid~.form-check-label {
            color: #fff;
        }

        .form-content input[type=text],
        .form-content input[type=password],
        .form-content input[type=number],
        .form-content select {
            width: 100%;
            padding: 9px 20px;
            text-align: left;
            border: 0;
            outline: 0;
            border-radius: 6px;
            background-color: #fff;
            font-size: 15px;
            font-weight: 300;
            color: #8D8D8D;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
            margin-top: 16px;
        }


        .btn-primary {
            background-color: #6C757D;
            outline: none;
            border: 0px;
            box-shadow: none;
        }

        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active {
            background-color: #495056;
            outline: none !important;
            border: none !important;
            box-shadow: none;
        }

        .form-content textarea {
            position: static !important;
            width: 100%;
            padding: 8px 20px;
            border-radius: 6px;
            text-align: left;
            background-color: #fff;
            border: 0;
            font-size: 15px;
            font-weight: 300;
            color: #8D8D8D;
            outline: none;
            resize: none;
            height: 120px;
            -webkit-transition: none;
            transition: none;
            margin-bottom: 14px;
        }

        .form-content textarea:hover,
        .form-content textarea:focus {
            border: 0;
            background-color: #ebeff8;
            color: #8D8D8D;
        }

        .mv-up {
            margin-top: -9px !important;
            margin-bottom: 8px !important;
        }

        .invalid-feedback {
            color: #ff606e;
        }

        .valid-feedback {
            color: #2acc80;
        }

        #SpaceDivNav {
            transform: translateY(6%);
            width: 97%;
        }

        #MoveRightNumber{
            margin-left: 5px;
        }
    </style>
    <title>Create a product</title>
</head>

<body>

    <?php
    $ActivePage = "CreateProduct";
    $URL =  "AdminCreateProduct.php";
    $URL2 = "AdminCreateProduct.php";
    include("ProductInfoNav.php");
    ?>

    <div class="form-body" id="SpaceDivNav">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Create a product</h3>
                        <p>Fill in the data below</p>
                        <form method="POST">
                            <h3>General product information</h3>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="Productname" placeholder="Product name" required>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="IMGname" placeholder="Image link - [Example: bla.jpg]" required>
                            </div>

                            <div class="col-md-12">
                                <input id="MoveRightNumber" class="form-control" type="number" name="Price" placeholder="Price" required>
                            </div>
                            <br>

                            <!-- DESCRIPTION -->

                            <h3>In English: </h3>
                            <div class="col-md-12">
                                <input class="form-control" type="text" name="UpperdescriptionEN" placeholder="Upper description" required>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="LowerdescriptionEN" placeholder="Lower description" required>
                            </div>
                            <br>

                            <!-- DESCRIPTION BUT DIFFERENT LANGUAGE -->

                            <h3>In German: </h3>
                            <div class="col-md-12">
                                <input class="form-control" type="text" name="UpperdescriptionGER" placeholder="Upper description" required>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="LowerdescriptionGER" placeholder="Lower description" required>
                            </div>

                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>