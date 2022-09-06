<?php $navbar = '<!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark main-font">
        <div class="d-flex flex-grow-1">
            <span class="w-100 d-lg-none d-block">
                <!-- hidden spacer to center brand on mobile -->
            </span>
            <a class="navbar-brand d-none d-lg-inline-block" href="index.html">
                <img class="main_logo" src="assets/img/resized-logo.png">
                Holiday Bookings
            </a>

            <div class="w-100 text-right">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        <div class="collapse navbar-collapse flex-grow-1 text-right " id="myNavbar">
            <ul class="navbar-nav ml-auto flex-nowrap">
                <li class="nav-item">
                    <a href="index.html" class="nav-link m-2 menu-item nav-active">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link m-2 menu-item dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {name} Holiday
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="name-holiday.html">Holiday Allowance</a>
                        <a class="dropdown-item" href="name-book.html">Book Holiday</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link m-2 menu-item dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Team Holiday
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="team-check.html">Check Holiday</a>
                        <a class="dropdown-item" href="team-review.html">Approve / Deny Requests</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link m-2 menu-item">Reports</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link m-2 menu-item">Sickness</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link m-2 menu-item">Log Off</a>
                </li>
            </ul>
        </div>
    </nav>'; ?>