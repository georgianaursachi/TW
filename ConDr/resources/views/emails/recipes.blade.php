<html>
<head></head>
<body>
    <div><img src="<?php echo $message->embed('images/email-02.png'); ?>"></div>
    <div class="hrl"><hr></div>
    <br>

  
    
    <h2>{{$recipe_name}}</h2>
    <p><strong>Descriere:</strong></p>
    <p>{{$description}}</p>
    <br>
    <br>
    <p><strong>Metoda de preparare:</strong></p>
    <p>{{$method_of_preparation}}</p>
    <br></br>
    <div><img src="<?php echo $message->embed('uploads/pictures/'.$picture); ?>"></div>
    <br></br>
    <p>Să aveți poftă!</p>
</body>
</html>