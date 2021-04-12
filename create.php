<?php

//Calling for functions.php
include 'connection.php';
$pdo = pdo_connect_mysql();
$msg = '';

// Check if POST data is not empty
if (!empty($_POST)) {

    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;

    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO contacts VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $name, $email, $phone, $title, $created]);

    // Output message
    $msg = 'Created Successfully!';
}
?>
<?= template_header('Create') ?>

    <div class="content update">
        <h2 style="color: gold;">Create Miner Contact</h2>
        <form action="create.php" method="post">
            <label style="color: white;" for="id">ID</label>
            <label style="color: white;" for="name">Name</label>
            <input type="text" name="id" placeholder="26" value="auto" id="id">
            <input type="text" name="name" placeholder="Doglas Kali" id="name">
            <label style="color: white;" for="email">EMAIL</label>
            <label style="color: white;" for="phone">PHONE</label>
            <input type="text" name="email" placeholder="kali@gmail.com" id="email">
            <input type="text" name="phone" placeholder="+23311223344" id="Phone Number">
            <label style="color: white;" for="title">SPECIALITY</label>
            <label style="color: white;" for="created">CREATED</label>
            <input type="text" name="title" placeholder="Department" id="title">
            <input type="datetime-local" name="created" value="<?= date('Y-m-d\TH:i') ?>" id="created">
            <input type="submit" value="Create">
        </form>
        <?php if ($msg): ?>
            <p><?= $msg ?></p>
        <?php endif; ?>
    </div>

<?= template_footer() ?>