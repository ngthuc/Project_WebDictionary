<?php
    require_once 'DictionaryMod.php';
        $dicO = new DictionaryObj();
        $dicM = new DictionaryMod();
?>
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
        <div class="col-2 ">
            <form class="form-signin" method="get" action="index.php">
                <label for="inputsearch" class="sr-only">Input words</label>
                <br />
                <select class="form-control" name="types">
                    <option value="NoType">--- Select type words ---</option>
                    <?php
                    $listTypes = $dicM->getTypes();
                    foreach ($listTypes as $key => $value){
                        echo'
                    <option value="'.$value.'">'.$value.'</option>';
                    }
                    ?>
                </select>
                <br />
                <select class="form-control" name="lesson">
                    <option value="NoLesson">--- Select lesson words ---</option>
                    <?php
                    $listLesson = $dicM->getLesson();
                    foreach ($listLesson as $key => $value){
                        echo'
                    <option>'.$value.'</option>';
                    }
                    ?>
                </select>
                <br />
                <select class="form-control" name="number">
                    <option value="NoNumber">--- Select number words ---</option>
                    <?php
                    for($i=1;$i<=50;$i++){
                        echo '<option value="'.$i.'">--- '.$i.' ---</option>';
                    }
                    ?>
                </select>
                <br />
                <button class="btn btn-md btn-primary btn-block" name="learn">Learn</button>
                <br />
                <b><a class="btn btn-md btn-primary btn-block" href="add.php">Add words</a></b>
                <br />
                <b><a class="btn btn-md btn-primary btn-block" href="add.php">Update words</a></b>
                <br />
                <b><a class="btn btn-md btn-primary btn-block" href="add.php">Delete words</a></b>
                <br />
            </form>
        </div>
        <?php
        echo '
        <form action="" class="col-10">
            <div class="col-12">

                <br />
                <div class="row">
                <div class="col-3">
                     <td><button class="btn btn-md btn-primary btn-block" type="submit">Test</button></td>
                </div>
                <div class="col-6">
                <input type="text" id="inputsearch" class="form-control" placeholder="Words" required autofocus name="words">
                </div>
                <br />
                <div class="col-3">
                <button class="btn btn-md btn-primary btn-block" name="learn">Find</button>
                </div>
                    
                <br />
                </div>
                <br />
                <table class="table table-inverse">
                    <thead>
                    <tr>
                        <th>Number</th>
                        <th>Words</th>
                        <th>Types</th>
                        <th>Meaning</th>
                        <th>Description</th>
                        <th>Lesson</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>';
                    if(isset($_GET['learn'])){
                        $list=$dicM->getOnRequi($_GET['types'],$_GET['lesson'],$_GET['number']);
                      foreach ($list as $key =>$value)
                          echo'
                        <th scope="row">'.($key+1).'</th>
                        <td>'.$value->getWord().'</td>
                        <td ><input type="text" id="" class="form-control" style="width: 100px;" placeholder="Type Input" required autofocus></td>
                        <td><input type="text" id="" class="form-control" placeholder="Meaning Input" required autofocus></td>
                        <td>'.$value->getDescription().'</td>
                        <td>'.$value->getLesson().'</td>
                        <td><button class="btn btn-md btn-primary btn-block" type="submit">Test</button></td>';
                      }

                    echo '
                </tr>
                </tbody>
                </table>
            </div>
        </form>';
        ?>


    </div>
<footer class="card-footer" id="footerPage">
    Bootstrap Framework and UI Framework , Design by Minh Luan Le &copy 2017.
    <a href="#"><button type="button" class="btn btn-primary btn-sm">Go Start</button></a>
</footer>
<!--Kết thức nội dung html-->
<script src="js/bootstrap.js"> </script>
</body>
</html>