<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Confirmación de compra</title>
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
   <style>
      body {
         font-family: 'Open Sans', sans-serif;
         background-color: #f4f4f4; /* Color de fondo */
      }

      .containercon {
          width: 60%;
          margin: 50px auto;
          padding: 20px;
          background-color: #fff;
          border-radius: 10px; /* Cuadro redondeado */
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra */
      }
  
      h1 {
          font-size: 32px;
          text-align: center;
          color: #333; /* Color del título */
          font-family: 'Open Sans', sans-serif;
      }
  
      p {
          font-size: 18px;
          color: #555; /* Color del texto */
          font-family: 'Open Sans', sans-serif;
      }
  
      strong {
          font-weight: bold;
          font-family: 'Open Sans', sans-serif;
      }
  
      .contact-info {
          margin-top: 20px;
          font-family: 'Open Sans', sans-serif;
      }
  
      .contact-info p {
          font-size: 16px;
          margin-bottom: 8px;
          font-family: 'Open Sans', sans-serif;
      }
  
      .footer {
          text-align: center;
          margin-top: 30px;
          color: #888; /* Color del texto del pie de página */
          font-family: 'Open Sans', sans-serif;
      }
  </style>
</head>
<body>

@include('partials.navbar')

<div class="containercon">
    <h1>Confirmación de Compra</h1>
    <p>Gracias por realizar tu compra en nuestra tienda en línea. A continuación, te proporcionamos los detalles de tu compra:</p>

    <p><strong>Código de Pedido:</strong> {{ $pedido }}</p>
    <p><strong>Total de la Compra:</strong> {{ $total }} COP</p>

    <!-- Agrega más detalles del pedido aquí según tus necesidades -->

    <div class="contact-info">
        <p>Si tienes alguna pregunta o necesitas asistencia, no dudes en ponerte en contacto con nuestro servicio de atención al cliente.</p>
    </div>

    <p>Gracias por elegir nuestra tienda en línea.</p>
</div>

<!-- footer -->
@include('footer.footer')

</body>
</html>