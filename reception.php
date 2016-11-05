<!DOCTYPE html>
<html>
<head>
  <title>upload file for image son reception</title>

  <meta charset="utf-8">
</head>
<body>

  <?php
  function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
  {
     //Test1: fichier correctement uploadé
       if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
     //Test2: taille limite
       if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
     //Test3: extension
       $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
       if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
     //Déplacement
       return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
  }
   
  //EXEMPLES
    $upload1 = upload('image','uploads/1.png',253600, array('png','jpg','jpeg') );
    $upload2 = upload('son','uploads/1.ogg',1048576, array('ogg', 'mp3'));
       
    if ($upload1) print "Upload de l'image réussi!<br />";
    if ($upload2) print "Upload du son réussi!<br />";

    print "toto";
    if (isset($_TITRE)) {
      print($_TITRE); 
    }
  ?>
</body>
</html>