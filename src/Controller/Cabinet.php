<?php

namespace App\Controller;

use \PDO;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Cabinet
{
    public function getIndex($request, $response)
    {
        $logged = $request->getSession()->get('logged');
        if($logged) {
            $db = new PDO("mysql:host=localhost;dbname=sg_course;charset=utf8", "root", "123");
        $sql_urls = "SELECT * FROM `news_urls`";
        $stmt_urls = $db->prepare($sql_urls);
        $stmt_urls->execute();

        $i = 0;
        $list = array();
        while ($row = $stmt_urls->fetch(PDO::FETCH_ASSOC)) {
            $list[$i]['name'] = $row['name'];
            $list[$i]['source'] = $row['source'];
            $i++;}
            $response->setContent(include '../templates/cabinet.tpl.php');
        }else{
             $response->setStatusCode('403');
             $response->setContent('403: Forbidden');
        }
        return $response;
        
    }

    public function addSource($request)
    {
         $logged = $request->getSession()->get('logged');
        if($logged) {
        $name = $request->request->get('name');
        $source = $request->request->get('source');
        $db = new PDO("mysql:host=localhost;dbname=sg_course;charset=utf8", "root", "123");
        $sql = "INSERT INTO news_urls(name, source) VALUES('{$name}', '{$source}')";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(
            $urls['name'],
            $urls['source'],
        ));
        }
        return new RedirectResponse('/cabinet');
    
    }
   

    public function deleteSource($request)
    {
        $logged = $request->getSession()->get('logged');
        if($logged) { 
        $id = $_POST['id'];
        //$request->request->get('id');
        $db = new PDO("mysql:host=localhost;dbname=sg_course;charset=utf8", "root", "123");
        $sql = "DELETE FROM news_urls WHERE id = $id";
        $stmt = $db->prepare($sql);      
        $stmt->execute();
        }
        return new RedirectResponse('/cabinet');        
    }

}