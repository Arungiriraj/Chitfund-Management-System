<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "chitfunds";
$conn = new mysqli($host, $username, $password, $database);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Schemes</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            *{
                padding: 0px;
                margin: 0px;
                font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            }
            div ~ p{
                font-size: 30px;
                font-family: cursive;
                text-align: center;
                color: darkred;
            }
            .demo2{
                width: 100%;
                background-color: rgb(102, 31, 31);
                height: 50px;
            }
            .header1 li,a{
                text-decoration: none;
                list-style: none;
                color:white;
            }
            .header1 nav{
                width: 50%;
                margin: 0 auto;
                padding-top: 15px;
            }
            .demo3 li{
                display: inline;
                margin-left: 35px;
            }
            .demo3 a{
                color: white;
                font-size: 15px;
            }
            .header2{
                width: 80%;
                margin: 0 auto;
                height: 500px;
            }
            .header2 img{
                width: 100%;
                height: 500px;
            }
            .schemes{
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: space-around;
                width: 100%;
                height: auto;
                gap:20px;
                padding-top: 20px;

            }
           .card {
                height: 300px;
                width: 300px;
                border-radius: 20px;
                border: 1px solid grey;
                text-align: center;
                transition: transform 0.7s;
                transform-style: preserve-3d;
                background-color:rgb(102, 31, 31) ;
                color:white;
            }

            .face {
                --flow-space: 1rem;
                position: absolute;
                height: 100%;
                width: 100%;
                backface-visibility: hidden;
            }

            button {
                border: 1px solid white;
                background: none;
                color: white;
                font-size: 1.25rem;
                font-weight: lighter;
                padding: 1rem;
                transition-duration: 0.30s;
                cursor: pointer;
            }

            button:hover,
            button:focus {
                background: white;
                color: white;
            }

            .back {
                display: grid;
                place-items: center;
                background: white;
                border-radius: 20px;
                transform: rotateY(180deg);
            }

            .card:focus,
            .card:hover {
                 transform: rotateY(180deg);
            }

            .reduce-motion .back {
                z-index: 2;
                opacity: 0;
                pointer-events: none;
                transition-duration: 0.6s;
                transform: none;
            }

            .reduce-motion .card:focus,
            .reduce-motion .card:focus-within,
            .reduce-motion .card:hover {
                 transform: none;
            }

            .reduce-motion .card:focus .back,
            .reduce-motion .card:focus-within .back,
            .reduce-motion .card:hover .back {
                opacity: 1;
                pointer-events: all;
                transform: none;
            }
        </style>
    </head>
    <body>
        <div></div>
        <p><b><i>AK Gold funds</i></b></p>
        <div class="first">
            <div class="header1">
                <div class="demo2">
                    <nav>
                        <ul class="demo3">
                            <li><a href="firstpage.html" target="_blank"><b><i>HOME</i></b></a></li>
                            <li><a href="quickpay.html" target="_blank"><b><i>QUICK PAY</i></b></a></li>
                            <li><a href="schemepage.php" target="_blank"><b><i>SAVING SCHEME</i></b></a></li>
                            <li><a href="contact.html" target="_blank"><b><i>CONTACT US</i></b></a></li>
                            <li><a href="aboutus.html" target="_blank"><b><i>ABOUT US</i></b></a></li>
                            <li><a href="login.html" target="_blank"><b><i>LOG IN</i></b></a></li>
                        </ul>
                    </nav>
                </div>
            </div> 
            
        </div>
        <div class="schemes">
            <?php
            $output='';
            $sql='select * from product_details';
            $exe=mysqli_query($conn,$sql);
            if($exe->num_rows>0){
                while($res=mysqli_fetch_array($exe)){
                    $display_name = $res["name"];
                    $display_description = $res["description"];
                    $display_duration = $res["duration"];
                    $output.='<div class="card">
                    <div class="box face front flow" style="background-image: url("./img/gold.jpg");border-radius: 20px;border-style: none;">
                    <h2></h2>
                    <p><b><i>'.$display_name.'</b></i></p>
                    </div>
                    <div class="face back">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-name="' . $display_name . '" data-description="' . $display_description . '" data-duration="' . $display_duration . '">Read More</button>
                    </div>
                    </div>';
                }
                echo $output;
            }
            ?>
        </div>
        <?php
        $sql = "SELECT * FROM product_details";
        $result = $conn->query($sql);
        ?>
        <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><span id="modalName"></span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Description: <span id="modalDescription"></span></p>
                    <p>Duration: <span id="modalDuration"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="vote" class="btn btn-primary" data-toggle="modal" onclick="">Register</button>
                </div>
            </div>
        </div>
        
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<!-- schemepage.php -->
<script>
    $(document).ready(function () {
        // Handle the "Read More" button click event
        $('[data-toggle="modal"]').click(function () {
            var button = $(this);
            var name = button.data('name');
            var description = button.data('description');
            var duration = button.data('duration');

            // Populate the modal with the data
            $('#modalName').text(name);
            $('#modalDescription').text(description);
            $('#modalDuration').text(duration);

            // Set modal title in a cookie
            document.cookie = "modalTitle=" + encodeURIComponent(name);
        });
        document.getElementById("vote").addEventListener("click", function () {
            var newPageURL = "joinscheme.html";
            window.location.href = newPageURL;
        });
    });
</script>

    </body>
</html>