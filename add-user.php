<?php
include('includes/nav.php');
include('includes/css-links.php');
include('includes/footer.php');
include('query.php');

?>

<head>
    <?php echo $cssLinks; ?>
    <link rel="stylesheet" href="assets/css/add-user.css">
</head>

<body>
    <!-- navbar -->
    <?php echo $navbar; ?>
    <!-- Create User -->
    <form action="/action_page.php" style="border:1px solid #ccc">
        <div class="container" style="margin-bottom: 20px">
            <h1>Create User</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>


            <label for="email"><b>First Name</b></label>
            <input type="text" placeholder="Enter First Name" name="name" id="firstname" required>

            <label for="email"><b>Full Name</b></label>
            <input type="text" placeholder="Enter Full Name" name="name" id="name" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
            <!-- SPACE -->
            <hr>
            <!-- SPACE -->
            <label for="psw"><b>Address</b></label>
            <input type="text" placeholder="Enter User's Address" name="homeadd" id="homeadd" required>

            <label for="psw"><b>Mobile</b></label>
            <input type="text" placeholder="Enter User's Mobile" name="mobile" id="mobile" required>
            <!-- SPACE -->
            <hr>
            <!-- SPACE -->
            <label for="psw"><b>Job Title</b></label>
            <input type="text" placeholder="Enter User's Job Title" name="jobtitle" id="jobtitle" required>

            <label for="team"><b>Choose Team</b></label>
            <select id="teamfield">
                <option disabled selected value> -- Select a team -- </option>
                <?php teamname($conn) ?>
            </select>
            
            <label for="team"><b>Choose Office Location</b></label>
            <select id="officeloc">
                <option disabled selected value> -- Select a location -- </option>
                <option value="STR">STR</option>
                <option value="Worcester">Worcester</option>
                <option value="Data Centre">Data Centre</option>
            </select>
             <!-- SPACE -->
             <hr>
            <!-- SPACE -->
            <label for="team"><b>Choose Working Hours</b></label>
            <select id="workinghours">
                <option disabled selected value> -- Select a time -- </option>
                <option value="08:00 - 16:30">08:00 - 16:30</option>
                <option value="08:30 - 17:00">08:30 - 17:00</option>
                <option value="08:45 - 17:30">08:45 - 17:30</option>
            </select>

            <label for="team"><b>Choose Lunch Times</b></label>
            <select id="lunchtimes">
                <option disabled selected value> -- Select a time -- </option>
                <option value="12:00">12:00</option>
                <option value="13:00">13:00</option>
            </select>

            
            <div class="clearfix">
                <button type="button" class="signupbtn" onclick="createUser()">Sign Up</button>
            </div>
        </div>
    </form>
    
    













    <!-- footer -->
    <?php echo $footer; ?>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>