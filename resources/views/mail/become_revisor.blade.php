<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Snap Sell</title>
    <style>
        *{
            font-family: 'Montserrat', sans-serif;
        }
        h1{
            font-size: 40px;
            line-height: 42px;
            text-align: center;
            padding: 0 50px;
        }
        strong{
            margin-right: 7px;
        }
        body{
            background-color: rgb(245, 245, 245);
        }
        .container-body{
            background: linear-gradient(-45deg, rgba(0, 175, 185, 0.7), rgba(0, 119, 130, 0.8));
            box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(3px) saturate(0.6);
            border-radius: 15px;
            color: white;
        }
        .content-data{
            background-color: #dddddd;
            display: inline-block;
            padding: 15px 25px;
            border-radius: 15px;
            color: black;
            margin: 15px 0;
            box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.3);
        }
        .btn{
            background-color: #00afb9;
            padding: 14px 20px;
            border-radius: 12px;
            color: white;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color .3s ease;
            display: inline-block;
            text-align: center;
            margin-top: 5px;
            transition: 0.5s;
        }
        .btn:hover{
            background-color: #00afb9;
            color: white;
            transform: scale(1.1);
            box-shadow: 0 0px 20px 0 rgba(0, 0, 0, 0.45);
        }
        @media screen and (max-width:576px){
            h1{
                padding: 0
            }
            .content-data{
                padding: 15px 10px;
            }
            p{
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container p-3">
        <div class="row">
            <div class="col-12 bg-danger px-1 py-3 p-sm-3 container-body">
                <h1>Un utente ha richiesto di lavorare con noi!</h1>
                <div class="text-center">
                    <div class="content-data">
                        <h2 class="text-center">Ecco i suoi dati: </h2>
                        <p class="m-0 text-start"><strong>Utente:</strong>{{$user->name}}</p>
                        <p class="m-0"><strong>Email:</strong>{{$user->email}}</p>
                    </div>
                    <h3>Se vuoi renderlo revisore clicca qui:<h3>
                    <a href="{{route('make.revisor',compact('user'))}}" class="btn">Rendi revisore</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>