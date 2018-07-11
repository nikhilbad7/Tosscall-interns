<?php
function showNav()
{
    if (isset($_SESSION['username']))
    {
    
    echo '<div>
            <ul>
                <li><a href="start.php">Start</a></li>
                <li><a href="select1.php">Select</a></li>
                <li><a href="watch.php">Watch</a></li>
                <li><a href="list.php">List</a></li>
                <li><a href="notification.php">Notification</a></li>
                <li><a href="discussions-list.php">MyDiscussion</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>';
    }
}
?>
