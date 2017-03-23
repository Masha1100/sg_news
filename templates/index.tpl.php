<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Новости</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-1">
                <h1 class="text-center">Новини</h1>
            </div>
            <div id="paging">
            <div class="col-md-8 col-md-offset-2" id="paging">
            <?php foreach ($news as $row) : ?>
               <h3> <?php echo $row['title']; ?> </h3>
                <p class="text-right"> <?php echo $row ['pub_date']; ?></p>
                <p class="text-justify"><?php echo $row['description']; ?></p>
                <p class="text-left"><a href="<?php echo $row['link']; ?>">Читати продовження в джерелi &rarr;</a></p>
             <hr>
            <?php endforeach ?>
            </div>

           
            <div class="col-md-8 col-md-offset-2">
            
            <ul>
               <?php if($page > 1): ?>
            <li><a href="index.php?page=1">&lt;&lt;</a></li>
            <li><a href="index.php?page=<?=$page-1; ?>">&lt;</a></li>
        <?php endif ?>
            <?php for($i = 1; $i<=$last_page; $i++): ?>
            <li <?= ($i == $page) ? 'class="current"' : '';?>> <a href="index.php?page=<?=$i;?>"><?= $i;?></a> </li>
        <?php endfor ?>
         
        <?php if($page < $last_page): ?>
            <li><a href="index.php?page=<?=$page+1; ?>">&gt;</a></li>
            <li><a href="index.php?page=<?=$last_page; ?>">&gt;&gt;</a></li>
        <?php endif; ?>
            </ul>
           </div> 
           </div>
        </div>
</body>
</html>
