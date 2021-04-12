<?php
// Including functions.php to enable connection to the database
include 'connection.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for instance update.php?id=1 will get the contact with the id of 1

if (isset($_GET['id'])) {
    if (!empty($_POST)) {

        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');


        // To Update the record
        $stmt = $pdo->prepare('UPDATE contacts SET id = ?, name = ?, email = ?, phone = ?, title = ?, created = ? WHERE id = ?');
        $stmt->execute([$id, $name, $email, $phone, $title, $created, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM contacts WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>
<?= template_header('Read') ?>

    <div class="content update">

        <h2 style="color: gold;">Update Contact #<?= $contact['id'] ?></h2>

        <form action="update.php?id=<?= $contact['id'] ?>" method="post">
            <label for="id">ID</label>
            <label for="name">NAME</label>
            <input type="text" name="id" placeholder="1" value="<?= $contact['id'] ?>" id="id">
            <input type="text" name="name" placeholder="Kali Linux" value="<?= $contact['name'] ?>" id="name">
            <label for="email">EMAIL</label>
            <label for="phone">PHONE</label>
            <input type="text" name="email" placeholder="Kali@gmail.com" value="<?= $contact['email'] ?>" id="email">
            <input type="text" name="phone" placeholder="+23311223344" value="<?= $contact['phone'] ?>" id="phone">
            <label for="title">TITLE</label>
            <label for="created">CREATED</label>
            <input type="text" name="title" placeholder="Department" value="<?= $contact['title'] ?>" id="title">
            <input type="datetime-local" name="created"
                   value="<?= date('Y-m-d\TH:i', strtotime($contact['created'])) ?>" id="created">
            <input type="submit" value="Update">
        </form>
        <?php if ($msg): ?>
            <p><?= $msg ?></p>
        <?php endif; ?>
    </div>

<?= template_footer() ?>