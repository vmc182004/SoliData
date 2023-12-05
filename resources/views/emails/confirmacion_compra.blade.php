<!DOCTYPE html>
<html>
<head>
    <title>Confirmación de Compra</title>
</head>
<body>
    <h1>Confirmación de Compra</h1>
    <p>Gracias por realizar tu compra en nuestra tienda en línea. A continuación, te proporcionamos los detalles de tu compra:</p>

    <p><strong>Código de Pedido:</strong> {{ $pedido->codigo }}</p>
    <p><strong>Total de la Compra:</strong> {{ $pedido->total }} COP</p>

    <!-- Agrega más detalles del pedido aquí según tus necesidades -->

    <p>Si tienes alguna pregunta o necesitas asistencia, no dudes en ponerte en contacto con nuestro servicio de atención al cliente.</p>

    <p>Gracias por elegir nuestra tienda en línea.</p>
</body>
</html>
