
<?php
//Enter page title here
$page_title = 'Welcome';

//importing header
require_once 'snippets/header.php';
//importing database connection
require_once 'db/conn.php';

$subjects = $crud->getSubject();
?>
<!-- Body starts here -->











<!-- Body ends here -->
<?php
//importing footer
require_once 'snippets/footer.php';
?>