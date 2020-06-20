<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        .container{
            width: 80%;
            background-color: bisque;
        }

        header{
            background-color: black;
            padding: 30px;
        }

        header h2 {
            color:white;
            letter-spacing: 10px;
        }
    </style>

    <title>Correo</title>
  </head>
  <body>
      <div class="container">
          <div class="row">
              <header>
                  <h2>Correo de contacto</h2>
              </header>
          </div>

          <div class="row">
              <div class="col-12">
                    <h4>De: </h4>
                    <p>{{ $msg['nombre'] }}</p>
                    <h4>Teléfono: </h4>
                    <p>{{ $msg['telefono'] }}</p>
                    <h4>Comentario: </h4>
                    <p>{{ $msg['comentarios'] }}</p>
              </div>
          </div>
      </div>
    

    
  </body>
</html>