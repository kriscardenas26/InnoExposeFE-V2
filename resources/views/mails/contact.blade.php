<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .center {
            text-align: center;
        }

        .card {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card label {
            margin-right: 10px;
            font-weight: bold;
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        strong {
            font-weight: bold;
        }

        p {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="center">InnoExpose</h1>
        <div class="card">
            <label for="name">Nombre:</label>
            <p> {{$contacto['name']}}</p>
        </div>
        <div class="card">
            <label for="email">Correo:</label>
            <p>  {{$contacto['email']}}</p>
        </div>
        <div class="card">
            <label for="subject">Asunto:</label>
            <p> {{$contacto['subject']}}</p>
        </div>
        <div class="card">
            <label for="message">Mensaje:</label>
            <p> {{$contacto['message']}}</p>
        </div>
        <p></strong> El usuario que tiene la duda queda atento a más información.</p>
    </div>
</body>

</html>

