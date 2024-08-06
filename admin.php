<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin') {
    header("Location: login.php");
    exit();
}
include('templates/header.php');
include('php/db.php');
$view = isset($_GET['view']) ? $_GET['view'] : 'elections';

?>

<div class="container">
    <h2>Admin Dashboard</h2>
    <nav>
        <ul>
            <li><a href="admin.php?view=elections" class='<?php echo $view == "elections" ? "active" : ""; ?>'>Manage Elections</a></li>
            <li><a href="admin.php?view=candidates" class='<?php echo $view == "candidates" ? "active" : ""; ?>'>Manage Candidates</a></li>
            <li><a href="admin.php?view=results" class='<?php echo $view == "results" ? "active" : ""; ?>'>View Results</a></li>
        </ul>
    </nav>

    <div>
        <?php
        if (isset($_GET['view'])) {
            $view = $_GET['view'];
            if ($view == 'elections') {
                include('php/manage_elections.php');
            } elseif ($view == 'candidates') {
                include('php/manage_candidates.php');
            } elseif ($view == 'results') {
                include('php/view_results.php');
            }
        } else {
            include('php/manage_elections.php');
        }
        ?>
    </div>
</div>

<?php include('templates/footer.php'); ?>