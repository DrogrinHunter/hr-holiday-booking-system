echo "jere"
<!-- Top bar -->
<div class="top-menu-d" id="top_menu">
    <div class="devicestatus" id="devicestatus" style="text-align: center;">
        <p1>Test</p1>
    </div>
    <div class="user_circle" id="user_circle">
        <img id="profileicon" class="circleusericon2" src="">
    </div>
</div>

<!-- The sidebar -->
<div class="side-menu">
    <!-- <img class="side-menu_back" src="img/side-menu.svg"> -->
    <div class="sidebar-main-wrapper">
        <div class="menu-wrapper" onClick="menu('dashboard')">
            <div class="sidebar-wrapper">
                <div class="sidebar-label"> Dashboard </div>
            </div>
        </div>
        <div class="menu-wrapper">
            <div class="sidebar-wrapper" onClick="expandmenu('nameHoliday')">
                <div class="sidebar-label">
                    <i class="fa-solid fa-person"></i> {name} Holiday
                </div>
            </div>
            <div class="sub-items" id="nameHoliday">
                <div class="sub-sidebar-wrapper">
                    <div class="sub-sidebar-label">
                        <a class="no-decoration" href="name-holiday.html">Holiday Allowance</a>
                    </div>
                </div>
                <div class="sub-sidebar-wrapper">
                    <!-- To include in above div, if necessary, onClick=menu('placeholder') -->
                    <div class="sub-sidebar-label">
                        <!-- to include sub heading, use <i class="fas fa-caret-right subicon"></i>  -->
                        <a class="no-decoration" href="name-book.html">Book Holiday</a>

                    </div>
                </div>
            </div>
        </div>
        <!-- if team leader -->
        <div class="menu-wrapper" onClick="expandmenu('teamHoliday')">
            <div class="sidebar-wrapper">
                <div class="sidebar-label">
                    <i class="fa-solid fa-people-group"></i> {team} Holiday
                </div>
            </div>
            <div class="sub-items" id="teamHoliday">
                <div class="sub-sidebar-wrapper">
                    <div class="sub-sidebar-label">
                        Check Holiday Allowances
                    </div>
                </div>
                <div class="sub-sidebar-wrapper">
                    <div class="sub-sidebar-label">
                        Approve / Deny Holiday
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-wrapper" onClick="expandmenu('reports')">
            <div class="sidebar-wrapper">
                <div class="sidebar-label"> Reports </div>
            </div>
        </div>
        <div class="menu-wrapper" onClick="expandmenu('sickness')">
            <div class="sidebar-wrapper">
                <div class="sidebar-label"> Sickness </div>
            </div>
        </div>
        <div class="menu-wrapper" onClick="expandmenu('logOff')">
            <div class="sidebar-wrapper">
                <div class="sidebar-label"> Log Off </div>
            </div>
        </div>
    </div>
    <a href="www.mfm-it.co.uk" target="_blank">
        <img class="main_logo" src="assets/img/logo.png">
    </a>
</div>