<?php
function showNav()
{
    if (isset($username))
    {
    
    echo '<div>
            <ul>
                <li><a href="start.php">Start</a></li>
                <li><a href="select1.php">Select</a></li>
                <li><a href="Watch.php">Watch</a></li>
                <li><a href="List.php">List</a></li>
                <li><a href="#">Notification</a></li>
                <li><a href="Discussionlist.php">MyDiscussion</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>';
    }
}
?>
