<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Style</title>
</head>
<body>
    <div class="container">
        <div class="row" id="Navbar">
        <form action="/randomguest" method="post">
            @csrf
            <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Random</button>
        </form>
            
        <form method="post" action="/search">
        @csrf
            <div class="form-group">
       
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="" name="wanted">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Search</button>
                </div>
            </div>
        </form> 
        
        <a href="login">login</a>
        <a href="register">register</a>
        <div class="row" id="content">
            @yield('content')
        </div>
        <div class="row" id="footer">

        </div>
    </div>
</body>
</html>