<?php 

require_once 'vendor/autoload.php';
require_once 'src/Controller/logger.php';

$db = new PDO("mysql:host=localhost;dbname=sg_course;charset=utf8", "root", "123");
$sql = "INSERT IGNORE INTO sg_news(title, link, description, sourse, pub_date) VALUES( ?, ?, ?, ?, ?)";
$stmt = $db->prepare($sql);

$feed_urls = [
    'http://www.pravda.com.ua/rss/',
    'http://football.ua/rss2.ashx',
    'https://rss.unian.net/site/news_ukr.rss',
];

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
        $item->get_date("Y-m-d H:i:s +0200"),
       
    ]);

    if (! empty($item->get_title()) && ! empty($item->get_link())) {
         $logger_info->info("Info: writing was succesfull");
         } else {
             $logger->error("Warning:something wrong");
         }
}
    