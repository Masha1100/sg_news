<?php

namespace App\Controller;

use \PDO;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Cabinet
{
    public function getIndex($request, $responce)
    {
        $logged = $request->getSession()->get('logged');
        if($logged) {
            $responce->setContent(include '../templates/cabinet.tpl.php');
        }else{
             $response->setStatusCode('403');
             $response->setContent('403: Forbidden');
        }
        return $response;
    
    }

    public function addSourse($request, $responce)
    {
        $db = new PDO("mysql:host=localhost;dbname=sg_course;charset=utf8", "root", "");
        $sql = "INSERT INTO news_urls(name, sourse) VALUES( ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(
            $urls['name'],
            $urls['sourse'],
        ));
        return new RedirectResponse('/cabinet');
    
    }
   

    public function deleteSourse($request)
    {
        $db = new PDO("mysql:host=localhost;dbname=sg_course;charset=utf8", "root", "");
        $sql = "DELETE FROM news_urls WHERE id=?";
        $stmt = $db->prepare($sql);
        $id = $request->request->get('id');        
        $stmt->execute();
        return new RedirectResponse('/cabinet');        
    }

    public function listSourse($request, $responce)
    {
        $db = new PDO("mysql:host=localhost;dbname=sg_course;charset=utf8", "root", "");
        $sql_urls = "SELECT * FROM `news_urls`";
        $stmt_urls = $db->prepare($sql_urls);
        $stmt_urls->execute();

        $i = 0;
        $list = array();
        while ($row = $stmt_urls->fetch(PDO::FETCH_ASSOC)) {
            $list[$i]['name'] = $row['name'];
            $list[$i]['sourse'] = $row['sourse'];
            $i++;
        }
        return $list;
    }
}