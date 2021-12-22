<?php
/* 
Written by: Viviannie De La Fuente
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
*/
namespace Phppot;

class SearchModel
{

    private $ds;

    private $perPage;

    function __construct()
    {
        require_once 'DataSource.php';
        $con = new DataSource();
        $this->ds = $con->getConnection();
    }

    function getCount($search_keyword = "")
    {
        if(!empty($search_keyword)) {
            $sql = 'SELECT * FROM general_user_information WHERE firstName LIKE :keyword OR lastName LIKE :keyword OR dateOfBirth LIKE :keyword';
        } else {
            $sql = 'SELECT * FROM general_user_information';
        }
        $pdo_statement = $this->ds->prepare($sql);
        if(!empty($search_keyword)) {
        $pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', \PDO::PARAM_STR);
        }
        $pdo_statement->execute();
        $row_count = $pdo_statement->rowCount();
        return $row_count;
    }

    function getAllPosts($start, $perPage, $search_keyword = "")
    {
        if(!empty($search_keyword)) {
            $sql = 'SELECT * FROM general_user_information WHERE firstName LIKE :keyword OR lastName LIKE :keyword OR dateOfBirth LIKE :keyword ORDER BY firstName ASC LIMIT ' . $start . ',' . $perPage;
        } else {
            $sql = 'SELECT * FROM general_user_information ORDER BY firstName ASC LIMIT ' . $start . ',' . $perPage;
        }
        $pdo_statement = $this->ds->prepare($sql);
        if(!empty($search_keyword)) {
            $pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', \PDO::PARAM_STR);
        }
        $pdo_statement->execute();
        $result = $pdo_statement->fetchAll();
        return $result;
    }
}
