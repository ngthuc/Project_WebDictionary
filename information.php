<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thunder Dragon</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/minhluancss.css">
    <link rel="icon" href="image/Other-mirillis-icon.png">
</head>
<body>
    <!-- Nav
gation -->
    <div id="topPage">
        <nav class="navbar ">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <h4 class="linkhover" style="color: white;">Từ điển học tập Anh ngữ</h4>
                </a>
                <h6>“Cơ hội chỉ có 1.” </h6>
            </div>
        </nav><!--hết menu-->
    </div>
    <div class="row" id="homePage">
        <div class="col-3 ">
            <form class="form-signin">
                <label for="inputsearch" class="sr-only">Input words</label>
                <br />
                <select class="form-control">
                    <option>--- Select type words ---</option>
                </select>
                <br />
                <select class="form-control" name="number">
                    <option value="0">--- Select number words ---</option>
                    <?php
                    for($i=1;$i<=50;$i++){
                        echo '<option value="'.$i.'">--- '.$i.' ---</option>';
                    }
                    ?>
                </select>
                <br />
                <input type="text" id="inputsearch" class="form-control" placeholder="Words" required autofocus>
                <br />
                <button class="btn btn-md btn-primary btn-block" type="submit">Search</button>

            </form>
        </div>
        <div class="col-9">
            <br />
            <table class="table table-inverse">
                <thead>
                <tr>
                    <th>Number</th>
                    <th>Words</th>
                    <th>Meaning</th>
                    <th>Test</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td><input type="text" id="" class="form-control" placeholder="Meaning Input" required autofocus></td>
                    <td><button class="btn btn-md btn-primary btn-block" type="submit">Test</button></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td><input type="text" id="" class="form-control" placeholder="Meaning Input" required autofocus></td>
                    <td><button class="btn btn-md btn-primary btn-block" type="submit">Test</button></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td><input type="text" id="" class="form-control" placeholder="Meaning Input" required autofocus></td>
                    <td><button class="btn btn-md btn-primary btn-block" type="submit">Test</button></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<footer class="card-footer" id="footerPage">
    Bootstrap Framework and UI Framework , Design by Minh Luan Le &copy 2017.
    <a href="#"><button type="button" class="btn btn-primary btn-sm">Go Start</button></a>
</footer>
<!--Kết thức nội dung html-->
<script src="js/bootstrap.js"> </script>
</body>
</html>