<?php

header("Content-Type: text/html; charset=utf-8");
$db = new PDO("mysql:host=localhost;dbname=sg_course;charset=utf8", "root", "123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$limit = 30; // количество материалов на странице
            
// номер страницы
if (isset($_GET['page'])) {
    $page = (int) $_GET['page'];
} else {
     $page = 1;
}

$start = ($page-1)*$limit; 
$sql = "SELECT title, link, sourse, description, pub_date FROM `sg_news` ORDER BY `pub_date` DESC LIMIT $start, $limit";
        $result = $db->prepare($sql);
        $result->execute();


        $i = 0;
        $news = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $news[$i]['title'] = $row['title'];
            $news[$i]['link'] = $row['link'];
            $news[$i]['sourse'] = $row['sourse'];
            $news[$i]['description'] = $row['description'];
            $news[$i]['pub_date'] = $row['pub_date'];
            $i++;
        }
       
  $sql1 = "SELECT *  FROM sg_news";
  $res = $db->prepare($sql1);
  $res->execute();
  $count_res = $res->rowCount();
  $last_page = ceil ($count_res/$limit);
           