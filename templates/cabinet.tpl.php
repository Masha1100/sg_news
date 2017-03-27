<!--<php require_once '../src/Controller/Cabinet.php'; ?>-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Адмiнпанель</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
</head>

<body>
    <div class="container">
           <div class="col-md-8 col-md-offset-2">
                <h2 class="text-center">Панель адмiнiстратора</h2>
                <hr />
            </div>
             <form class="form-horizontal" role="form" method="POST" action="/cabinet">
        <div class="form-group">
            <label for="nameSource" class="col-md-2 col-md-offset-2 control-label">Назва джерела</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="name" placeholder="name source">
            </div>
        </div>
        <div class="form-group">
            <label for="nameSource" class="col-md-2 col-md-offset-2 control-label">Ресурс</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="source" placeholder="link source">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Додати джерело</button>
            </div>
        </div>
    </form>
            <div class="col-md-8 col-md-offset-2">
            <h3 class="text-center">Список джерел</h3>
            <table class="table">
            <?php foreach ($list as $row) : ?>
               <tr>
                <th colspan="2"><?php echo $row['name']; ?></th>
              </tr>
              <tr>
                <td><?php echo $row['source']; ?></td>
                <td class="text-right">
             <form method="POST" action="/delcabinet">
              <button type="submit" class="btn btn-primary" name="id">Видалити</button></form>
                </td>
              </tr>
            <?php endforeach ?>
            </table>
            <hr />
            </div>       
    </div>
    </body>
</html>