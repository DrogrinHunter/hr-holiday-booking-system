<?php
session_start();
$firstname = $_SESSION["agentdata"]["firstname"];
$teamname = $_SESSION['agentdata']['tuidname'];
$teamleader = $_SESSION['agentdata']['teamleader'];

$navbar =
"
<nav class='navbar navbar-expand-lg navbar-dark bg-dark main-font'>
   <div class='d-flex flex-grow-1'>
      <span class='w-100 d-lg-none d-block'>
         <!-- hidden spacer to center brand on mobile -->
      </span>
      <a class='navbar-brand d-none d-lg-inline-block' href='index.php'>
      <img class='main_logo' src='assets/img/resized-logo.png'>
      Holiday Bookings
      </a>
      <div class='w-100 text-right'>
         <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#myNavbar'>
         <span class='navbar-toggler-icon'></span>
         </button>
      </div>
   </div>
   <div class='collapse navbar-collapse flex-grow-1 text-right ' id='myNavbar'>
      <ul class='navbar-nav ml-auto flex-nowrap'>
         <li class='nav-item'>
            <a href='index.php' class='nav-link m-2 menu-item nav-active'>Dashboard</a>
         </li>
         <li class='nav-item dropdown'>
            <a class='nav-link m-2 menu-item dropdown-toggle' href='#' id='navbarDropdownMenuLink'
               data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            $firstname's Holiday
            </a>
            <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
               <a class='dropdown-item' href='name-holiday.php'>Holiday Allowance</a>
               <a class='dropdown-item' href='name-book.php'>Book Holiday</a>
               <a class='dropdown-item' href='user-profile.php'>Your Profile</a>
            </div>
         </li>";
         if ($teamleader == 1) { 
       $navbar .=  "
         <li class='nav-item dropdown'>
            <a class='nav-link m-2 menu-item dropdown-toggle' href='#' id='navbarDropdownMenuLink'
               data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            $teamname Team
            </a>
            <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
               <a class='dropdown-item' href='team-check.php'>Check Holiday</a>
               <a class='dropdown-item' href='team-review.php'>Approve / Deny Requests</a>
               <a class='dropdown-item' href='add-user.php'>Add Users</a>
               <a class='dropdown-item' href='team-user-list.php'>Edit Team Members</a>
            </div>
         </li>";
         } 
		 $navbar .=
         "
         <li class='nav-item'>
            <a href='#' class='nav-link m-2 menu-item disabled'>Reports</a>
         </li>
         <li class='nav-item'>
            <a href='#' class='nav-link m-2 menu-item disabled'>Sickness</a>
         </li>
         <li class='nav-item'>
            <a href='logout.php' class='nav-link m-2 menu-item'>Log Off</a>
         </li>
      </ul>
   </div>
</nav>
";
?>