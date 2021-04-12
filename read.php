<!--OFFICIAL MINING PAGE-->
<?php
//Including functions.php
include 'connection.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();

// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// Number of records to be shown on each page
$records_per_page = 7;

// Prepare the SQL statement and get records from our Miner's contacts table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM contacts ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page - 1) * $records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();

// Fetches the records to be display in template.
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of Miner contacts, this is so we can determine whether there should be a next and previous button
$num_contacts = $pdo->query('SELECT COUNT(*) FROM contacts')->fetchColumn();
?>
<!--template header context Indentation-->
<?= template_header('Read') ?>


<div class="content read">
    <h2 style="color: white;">ADMINISTRATOR PRIVILAGE</h2>
    <a href="create.php" class="create-contact">Create New Contact</a>
    <table>
        <thead>
        <!--Table row-->
        <tr>
            <td>#</td>
            <td>NAME</td>
            <td>EMAIL</td>
            <td>PHONE</td>
            <td>TITLE</td>
            <td>CREATED</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($contacts as $contact): ?>
            <!--Table row-->
            <tr>
                <td><?= $contact['id'] ?></td>
                <td><?= $contact['name'] ?></td>
                <td><?= $contact['email'] ?></td>
                <td><?= $contact['phone'] ?></td>
                <td><?= $contact['title'] ?></td>
                <td><?= $contact['created'] ?></td>
                <td class="actions">
                    <!--To move to update or delete page.-->
                    <a href="update.php?id=<?= $contact['id'] ?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?= $contact['id'] ?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination">
        <!--Code clause for read.php-->
        <?php if ($page > 1): ?>
            <a href="read.php?page=<?= $page - 1 ?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
        <?php endif; ?>
        <?php if ($page * $records_per_page < $num_contacts): ?>
            <a href="read.php?page=<?= $page + 1 ?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
        <?php endif; ?>
    </div>
</div>

<!--template Footer context Indentation-->
<?= template_footer() ?>