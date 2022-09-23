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
        <div class="container">
            <h1>Create User</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>


            <label for="email"><b>Name</b></label>
            <input type="text" placeholder="Enter First Name" name="name" id="name" required>

            <label for="email"><b>First Name</b></label>
            <input type="text" placeholder="Enter Full Name" name="name" id="firstname" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

            <label for="team"><b>Choose Team</b></label>
            <select id="teamfield">
                <option disabled selected value> -- Select a team -- </option>
                <?php teamname($conn) ?>
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