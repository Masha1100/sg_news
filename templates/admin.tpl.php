<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Новости</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="container">
           <div class="col-md-9 col-md-offset-1">
                <h1 class="text-center">Авторизацiя</h1>
            </div>
    <form class="form-horizontal" role="form" method="POST" action="/login">
        <div class="form-group">
            <label for="inputUser" class="col-md-2 col-md-offset-1 control-label">Name</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="inputUser" name="name" placeholder="User name">
            </div>
        </div>
         <div class="form-group">
            <label for="inputPssword" class="col-md-2 col-md-offset-1 control-label">Password</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="inputPassword" name="pass" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    </div>