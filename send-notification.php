<?php
/* 
Written by: Ryan Armstrong & Viviannie De La Fuente
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
*/
namespace Phppot;

use Phppot\SearchModel;
require_once "navigation.php";
require_once "SearchModel.php";
require_once 'DataConfig.php';

/* Pagination Code starts */
$per_page_html = '';
$page = 1;
$start = 0;
if (! empty($_POST["page"]) ) {
    $page = $_POST["page"];
    $start = ($page - 1) * Config::LIMIT_PER_PAGE;
}

$searchModel = new SearchModel();

$row_count = $searchModel->getCount();

$limit = " limit " . $start . "," . Config::LIMIT_PER_PAGE;

if (! empty($row_count)) {
    $per_page_html .= "<div style='text-align:center;margin:20px 0px;'>";
    $page_count = ceil($row_count / Config::LIMIT_PER_PAGE);

    if ($page_count > 1) {
        for ($i = 1; $i <= $page_count; $i ++) {
            if ($i == $page) {
                $per_page_html .= '<input type="button"  name="page" onclick="getResult2(' . $i . ')" value="' . $i . '" class="btn-page current" />';
            } else {
                $per_page_html .= '<input type="button"  name="page" onclick="getResult2(' . $i . ')" value="' . $i . '" class="btn-page" />';
            }
        }
    }
    $per_page_html .= "</div>";
}

$result = $searchModel->getAllPosts($start, Config::LIMIT_PER_PAGE);
?>
<html>
<head>
	<meta charset="UTF-8" />
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
	<link href="css/phppot-style.css" type="text/css" rel="stylesheet" />
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
</head>
<style>
.img-url {
	background: url("images/demo-search-icon.png") no-repeat center right 7px;
}
.ob{ 
	position : absolute; 
	left:310px;
	
}
.c{
	position : relative; 
	z-index: 1;
}
.btn{
    position:relative;
    background-color: #545474;
    border: none;
    color: #fff;
    padding: 10px;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    text-transform: uppercase;
    top: 0.5px;
    border-radius: 12px;
    z-index:1;
}
.btn:hover {
    background: #42425D;
    cursor: pointer;
}

.btn:focus {
    outline: none;
}
.tbl-qa{
	padding: 30px;
}

</style>
<body>
	
	<div class = "ob">
	<form name='frmSearch' action='' method='post' onSubmit="return submitSearch2(event)">
		<div class="search">
			<label>Search:</label> <input type='text' name='search' class="img-url" id='keyword' maxlength='25'>
		</div>
		<table class='tbl-qa' id="tutorial-body">
			<thead>
				<tr>
					<th class='table-header' >ID</th>
					<th class='table-header' >First Name</th>
					<th class='table-header' >Last Name</th>
					<th class='table-header' >Date of Birth</th>					
					<th class='table-header' >Send Notification</th>
				</tr>
			</thead>
			<tbody id='table-body'>
	<?php
if (! empty($result)) {
    foreach ($result as $row) {             
    ?>
		<tr class='table-row'>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['firstName']; ?></td>
			<td><?php echo $row['lastName']; ?></td>
			<td><?php echo date('d F Y', strtotime($row['dateOfBirth']));?></td>			
			<td onclick="sendEmail('<?php echo $row['email']; ?> ','FirstName','LastName')"><input class='btn' type='button' value='Send Email'/></td>
		</tr>
    <?php
    }
}
?>
  </tbody>
		</table>
<?php echo  $per_page_html;  ?>
<script src="js/search.js"></script>
	</form>
	</div>
</body>
</html>