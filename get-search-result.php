<?php
/* 
Written by: Viviannie De La Fuente
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
*/

namespace Phppot;

use Phppot\SearchModel;
require_once "SearchModel.php";
require_once 'DataConfig.php';

$search_keyword = '';

if (! empty($_POST['search'])) {
    $search_keyword = $_POST['search'];
}

/* Pagination Code starts */
$per_page_html = '';
$page = 1;
$start = 0;
if (! empty($_POST["page"])) {
    $page = $_POST["page"];
    $start = ($page - 1) * Config::LIMIT_PER_PAGE;
}
$searchModel = new SearchModel();

$result = $searchModel->getAllPosts($start, Config::LIMIT_PER_PAGE, $search_keyword);

function highlightKeywords($text, $keyword)
{
    $wordsAry = explode(" ", $keyword);
    $wordsCount = count($wordsAry);

    for ($i = 0; $i < $wordsCount; $i ++) {
        $highlighted_text = "<span style='font-weight:bold; color:red'>$wordsAry[$i]</span>";
        $text = str_ireplace($wordsAry[$i], $highlighted_text, $text);
    }

    return $text;
}

if (! empty($_POST["page"])) {
    if (! empty($result)) {
        foreach ($result as $row) {
            if (Config::ENABLE_HIGHLIGHT == true) {
                $id = $row['id'];
                $firstName = highlightKeywords($row["firstName"], $_POST["search"]);
                $lastName = highlightKeywords($row["lastName"], $_POST["search"]);
                $dateOfBirth = highlightKeywords(date('d F Y', strtotime($row['dateOfBirth'])), $_POST["search"]);
            } else {
                print $firstName = $row['firstName'];
                $lastName = $row['lastName'];
                $dateOfBirth = date('d F Y', strtotime($row['dateOfBirth']));
                $id = $row['id'];

            }
            ?>
<tr class='table-row'>
    <td><?php echo $id ?></td>
	<td><?php echo $firstName ?></td>
	<td><?php echo $lastName ?></td>
	<td><?php echo $dateOfBirth ?></td>
    <td><textarea name='comment'> </textarea></td>
    <td><input type="date" value="<?php echo date('Y-m-d'); ?>"></td>
    <td onclick="updateRowHandler(this, <?php echo $row['id']; ?> )"><input class='btn' type='button' value='Update Status'/></td>
</tr>
<?php
        }
    }
}

?>
