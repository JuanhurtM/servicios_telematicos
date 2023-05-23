<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/Css/bootstrap.min.css">
    <link rel="shortcut icon" href="Assets/Img/rocket-takeoff-fill.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Books</title>
</head>
<body class="bg-secondary">
    <?php
	 $errTitle="";
	 $errDescription="";
	 $errAuthor="";
	 $errId="";
	 $id="";
	 $bpost=false;
	 $bput=false;
	 $bdelete=false;
	if(isset($_POST['id'])) {$id= $_POST['id'];}
    if(isset($_POST['post'])) {
      // Check if title has been entered
      if(empty($_POST['title'])) {
        $errTitle= 'Please enter the title';
      }
      // Check if description has been entered and is valid
      else if(empty($_POST['description'])) {
        $errDescription = 'Please enter the description';
      }
      // check if a author has been entered and if it is a valid password
      else if(empty($_POST['author'])) {
        $errAuthor = 'Please enter an author';
      } else {
        $title= $_POST['title'];
        $description= $_POST['description'];
        $author = $_POST['author'];
	    $bpost=true;
        echo "The form has been submitted";
      }
    }
	if(isset($_POST['put'])) {
      // Check if title has been entered
	   if(empty($_POST['id'])) {
        $errId= 'Please enter the id';
      }
      else if(empty($_POST['title'])) {
        $errTitle= 'Please enter the title';
      }
      // Check if description has been entered and is valid
      else if(empty($_POST['description'])) {
        $errDescription = 'Please enter the description';
      }
      // check if a author has been entered and if it is a valid password
      else if(empty($_POST['author'])) {
        $errAuthor = 'Please enter an author';
      } else {
        $title= $_POST['title'];
        $description= $_POST['description'];
        $author = $_POST['author'];
	    $bput=true;
        echo "The form has been submitted";
      }
    }
	if(isset($_POST['delete'])) {
      // Check if title has been entered
	   if(empty($_POST['id'])) {
        $errId= 'Please enter the id';
      }
       else {
	    $bdelete=true;
        echo "The form has been submitted";
      }
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark fixed-top pb-2 mb-5">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">Books</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <section class="w-50 mx-auto text-center pt-5 mt-5" id="intro">
        <img src="Assets/Img/rocket-takeoff-fill copy.svg" class="img-fliud mx-auto d-block mt-3" style="height: 7rem;">
        <div class="container mt-4 text-center">
        <div class="row">
                <div class="col">
                    <form class="mt-4 mb-5" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="row g-3 mb-6">
                                <div class="col-4">
                                    <label for="inputid" class="form-label mb-2 fw-bold">Id</label>
                                    <input id="inputid" name="id" type="text" class="form-control" placeholder="Id">
                                    <?php echo $errId; ?>
                                </div>
                                <div class="col-4">
                                    <label for="inputtitle" class="form-label mb-2 fw-bold">Title</label>
                                    <input id="inputtitle" name="title" type="text" class="form-control" placeholder="Title">
                                    <?php echo $errTitle; ?>
                                </div>
                                <div class="col-4">
                                    <label for="inputauthor" class="form-label mb-2 fw-bold">Author</label>
                                    <input id="inputauthor" type="text" name="author" class="form-control" placeholder="Author">
                                    <?php echo $errAuthor; ?>
                                </div> 
                                <div class="col-12">
                                    <label for="inputdescription" class="form-label mb-2 fw-bold">Description</label>
                                    <input id="inputdescription" name="description" type="text" class="form-control" placeholder="Description">
                                    <?php echo $errDescription; ?>
                                </div>
                            </div>
                            
                            <div class="text-center mt-4" >
                                <input type="submit" name="get" value="Listar" placeholder="Listar" class="btn btn-success fw-bold rounded-pill"/>
                                <input type="submit" value="Agregar" name="post" placeholder="Agregar" class="btn btn-dark fw-bold rounded-pill"/>
                                <input type="submit" value="Actualizar" name="put" placeholder="Actualizar" class="btn btn-warning fw-bold rounded-pill"/>
                                <input type="submit" value="Eliminar" name="delete" placeholder="Eliminar" class="btn btn-danger fw-bold rounded-pill"/>
                            </div>
                    </form>
                    <?php 
                    function get(){
                        global $id;
                        if (empty($_POST['id'])) {
                            $url = "http://192.168.50.4:5000/books";
                        } else {
                            $url = "http://192.168.50.4:5000/books/{$id}";
                        }
                        $response = file_get_contents($url);
                        $datos = json_decode($response, true);

                        echo "<table class = 'table table-hover table-bordered mt-4 display shadow-lg'>";
                        echo "<tr><th>Id</th><th>Title</th><th>Author</th><th>Category</th></tr>";

                        foreach ($datos as $libro) {
                            echo "<tr>";
                            echo "<td>". $libro['id'] . "</td>";
                            echo "<td>" . $libro['title'] . "</td>";
                            echo "<td>" . $libro['author'] . "</td>";
                            echo "<td>" . $libro['description'] . "</td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                    }  
                    
                    if(array_key_exists('get', $_POST)) { 
                        get(); 
                    } 
                    ?>
                    <label for="report" class="form-label mb-5 fw-bold">Report</label>

                    <!-- <textarea id="result" name="result" class="form-control mb-5" style="height: 95px" > -->
                        <?php 

                            if(array_key_exists('post', $_POST)) {
                                if($bpost){
                                $url = 'http://192.168.50.4:5000/books';
                                $ch = curl_init($url);
                                $data = array( 'title' => $title, 'description' => $description, 'author' => $author);
                                $payload =json_encode($data);
                                curl_setopt($ch, CURLOPT_POST, 1);
                                curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                $result = curl_exec($ch);
                                curl_close($ch);
                                $datos = json_decode($result, true);
                                echo "<h2>Book Added</h2>";
                                } 
                            } 
                            else if(array_key_exists('put', $_POST)) {
                                if($bput){
                                $url = "http://192.168.50.4:5000/books/{$id}";
                                
                                //$ch = curl_init($url);
                                $data = array( 'title' => $title, 'description' => $description, 'author' => $author);
                                $payload=json_encode($data);

                            if($ch = curl_init($url))
                            {
                                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                                $result = curl_exec($ch);
                                curl_close($ch);
                                $datos = json_decode($result, true);
                                echo "<h2>Book Updated</h2>";
                            }
                                
                                } 
                            }
                            else if(array_key_exists('delete', $_POST)) {
                                if($bdelete){
                                $url = "http://192.168.50.4:5000/books/{$id}";
                                
                                //$ch = curl_init($url);
                                

                            if($ch = curl_init($url))
                            {
                                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                $result = curl_exec($ch);
                                curl_close($ch);
                                echo "<h2>Book Deleted</h2>";
                            }
                                
                                } 
                            }                             
                        ?>
                    <!-- </textarea> -->

                </div>
            </div>
        </div>
    </section>
    
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>