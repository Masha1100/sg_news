<?php 

require_once 'vendor/autoload.php';
require_once 'src/Controller/logger.php';

date_default_timezone_set('Europe/Kiev');

$db = new PDO("mysql:host=localhost;dbname=sg_course;charset=utf8", "root", "123");
$sql = "INSERT IGNORE INTO sg_news(title, link, description, sourse, pub_date) VALUES( ?, ?, ?, ?, ?)";
$stmt = $db->prepare($sql);

$sql_urls = "SELECT sourse FROM `news_urls`";
$stmt_urls = $db->prepare($sql_urls);
$stmt_urls->execute();
$feed_urls= $stmt_urls->fetchAll(PDO::FETCH_COLUMN);


$feed = new SimplePie();
$feed->set_feed_url($feed_urls);
$feed->enable_cache(false);
$feed->init();

$items = $feed->get_items();

foreach ($items as $item) {
    $stmt->execute([
        $item->get_title(),
        $item->get_link(),
        $item->get_description(),
        $item->get_feed()->get_link(),//обращаемся  к первоисточнику, если больше 1 файла
        //$feed->get_link(),
        $item->get_date("Y-m-d H:i:s"),
       
    ]);

    if (! empty($item->get_title()) && ! empty($item->get_link())) {
         $logger_info->info("Info: writing was succesfull");
         } else {
             $logger->error("Warning:something wrong");
         }
}
    