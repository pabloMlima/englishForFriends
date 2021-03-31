<html lang='pt-br'>

<head>
    <meta charset='utf-8'>
    <style>
        <style>.back-title {
            background: #1e60f2e0;
            color: #FFF;
            font-size: 20px;
        }

        .b-radius {
            border-radius: 20px;
        }

        .back-b {
            background: #4fa8f0b8;
        }

        .color-w {
            color: #FFF;
        }

        .t-border {
            border: 1px solid #FFF;
            width: 100%;
        }

        .mrg {
            margin-left: 15px;
        }

        .div-lg {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .button-a {
            width: 100%;
            background: #1e60f2e0;
            border: 2px solid #959dd3;
            color: #FFF;
            font-size: 15px;
            margin-top: 5px;
        }

        .t-center {
            text-align: center !important;
        }

        .div-img {
            display: flex;
            justify-content: center;
            text-align: center;
        }
    </style>
</head>

<body class='back-b'>
    <div class='b-radius'>
        <div class='div-img'>
            <img class='div-img' src='{{asset("img/logo.png")}}' />
        </div>
        <div class='color-w mrg'>
            {{$text}}
        </div><br>
        <button class='button-a' href="{{$link}}">Confirmar email</button>
    </div>

</body>

</html>
