<div class="nav_container">
    <div class="navigationn_bar">
        <ul class="nav_leftSide">
            <li><a href="index.php">Home</a></li>
            <li><a href="queue.php">Queue</a></li>
            <li><a href="drivers.php">Drivers</a></li>
            <li><a href="#Home">Team Management</a></li>
            <li><a href="#Home">Finances</a></li>
        </ul>
        <ul class="nav_rightSide" onload="alert()" src="../controller/Navbar_Clock.js">
            <li><span id="navbar_time"></span></li>
            <li><span id="navbar_date"></span></li>
        </ul>
    </div>
</div>
<!--Start Clock-->
<script> window.onload = setupTimer('navbar_time', 'navbar_date'); </script>