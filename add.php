<?php
require_once 'DictionaryMod.php';
$wordO = new DictionaryObj();
$wordM = new DictionaryMod();
?>
<?php
if(isset($_GET['add'])){

    $k=0;
    while(isset($_GET['word'.($k+1)])) {
        $k++;
    }
    if($k>=1)
    for($i=1;$i<=$k;$i++) {
        $wordO->setDictionary($_GET['word'.$i],$_GET['types'.$i], $_GET['meaning'.$i],$_GET['description'.$i],$_GET['lesson'.$i]);
        $wordM->addWord($wordO);
    }}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minh Luan Dictionary</title>
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

    <div class="container">

    </div>
     <div class="row" id="homePageAdd">
         <div class="col-12">
             <br />
         </div>
     <form class="col-12" method="get" action="add.php">
         <div class="row justify-content-center">
             <div class="col-4">
                 <input type="text" id="inputsearch" class="form-control" placeholder="How many Words you want add ?" required autofocus name="number">
             </div>
             <br />
             <div class="col-4">
                 <button class="btn btn-md btn-primary btn-block col-2 justify-content-center" name="find">Create</button>
             </div>
         </div>

    </form>
        <form action="" class="col-12">
            <div class="col-12 align-content-start">
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
                    <?php
                    if(isset($_GET['find'])){
                        $go = $_GET['number'];
                        for($i=1;$i<=$go;$i++) {
                            echo '
                    <tr>
                        <th scope="row">'.$i.'</th>
                        <td><input type="text" name="word'.$i.'" class="form-control" placeholder="Word Input" required autofocus></td>
                        <td><input type="text" name="types'.$i.'" class="form-control" placeholder="Type Input" required autofocus></td>
                        <td><input type="text" name="meaning'.$i.'" class="form-control" placeholder="Meaning Input" required autofocus></td>
                        <td><input type="text" name="description'.$i.'" class="form-control" placeholder="Description Input" required autofocus></td>
                        <td><input type="text" name="lesson'.$i.'" class="form-control" placeholder="Lesson Input" required autofocus></td>
                    </tr> ';
                        }
                    }
                    ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-5"></div>
                    <button class="btn btn-md btn-primary btn-block col-2 justify-content-center" name="add">Add</button>
                    <div class="col-5"></div>
                    <div class="col-12">
                        <br />
                    </div>
                </div>
            </div>
        </form>

     </div>


<footer class="card-footer" id="footerPage">
    Bootstrap Framework and UI Framework , Design by Minh Luan Le &copy 2017.
    <a href="index.php"><button type="button" class="btn btn-primary btn-sm">Go Start</button></a>
</footer>
<!--Kết thức nội dung html-->
<script src="js/bootstrap.js"> </script>
</body>
</html>