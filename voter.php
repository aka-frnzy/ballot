<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'voter') {
    header("Location: login.php");
    exit();
}
include('templates/header.php');
include('php/db.php');

$view = isset($_GET['view']) ? $_GET['view'] : 'elections';
?>

<div class="container">
    <h2>Voter Dashboard</h2>
    <nav>
        <ul>
            <li><a href="voter.php?view=elections" class="<?php echo $view == 'elections' ? 'active' : ''; ?>">Available Elections</a></li>
            <li><a href="voter.php?view=results" class="<?php echo $view == 'results' ? 'active' : ''; ?>">View Results</a></li>
        </ul>
    </nav>

    <div>
        <?php
        if ($view == 'elections') {
            include('php/available_elections.php');
        } elseif ($view == 'results') {
            include('php/view_results_voter.php');
        } elseif ($view == 'vote' && isset($_GET['election_id'])) {
            include('vote.php');
        } else {
            include('php/available_elections.php');
        }
        ?>
    </div>
</div>

<?php include('templates/footer.php'); ?>