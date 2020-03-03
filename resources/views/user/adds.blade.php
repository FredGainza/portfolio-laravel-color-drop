@section('content')


<body>

<a class="bye" href="https://project-color.fgainza.fr/home">❌</a>

<h1>
    ☀️☀️☀️☀️ &nbsp;&nbsp;&nbsp;COLOR DROP&nbsp;&nbsp;&nbsp; ☀️☀️☀️☀️
</h1>

<a class="settings" href="https://project-color.fgainza.fr/pindex">⚙️</a>

<h2 class="dark">
    Compte de : {{$users->name}}
</h2>

<h2 class="light">Ajouter un enfant</h2>

<form action="" method="post">
@csrf
    <label for="name-select">Prénom de l'enfant</label><br>
    <input type="text" name="name" placeholder="Prénom"><br>
    <input type="submit" name="add" value="Ajouter d'autres enfants">
    <input type="submit" name="continue" value="Continuer">
</form>



<a class="back" href="https://project-color.fgainza.fr/home">Retour en arrière</a>

<body>


<style>
    .bye{
        position: absolute;
        top: 0;
        right: 0;
        font-size: 50;
        text-decoration: none;
    }
    body{
        margin: 0 auto;
        background-image: url('../../../img/bg.png');
        font-family: cursive;
        background-repeat: no-repeat;
        background-size: cover;
    }
    h1{
        text-align: center;
        border: 1px solid black;
        width: 40%;
        margin: auto;
        margin-top: 10px;
        background-image: radial-gradient(circle at center, white, DeepSkyBlue);
        box-shadow: 3px 3px 0px black;
        position: relative;
    }
    .dark{
        text-align: center;
        border: 1px solid black;
        width: 25%;
        margin: auto;
        margin-top: 10px;
        background-image: linear-gradient( white, DarkTurquoise);
        box-shadow: 3px 3px 0px black;
    }
    .light{
        text-align: center;
        border: 1px solid black;
        width: 20%;
        margin: auto;
        margin-top: 10px;
        margin-bottom: 15px;
        background-image: linear-gradient(0deg, white, Skyblue);
        box-shadow: 3px 3px 0px black;
    }
    form{
        text-align: center;
        background-image: radial-gradient(circle at center, LightSlateGray, SlateGray);
        padding: 10px;
        width: 32%;
        margin: auto;
        border-radius: 5px;
        font-size: 1.3em;
        font-weight: bold;
        box-shadow: 5px 5px 0px black;
        margin-bottom: 15px;
    }
    input, select{
        font-size: 1.0em;
        border-radius: 5px;
        padding: 5px;
        margin-top: 10px;
        margin-bottom: 10px;
        box-shadow: 3px 3px 0px black;
    }
    button{
        font-size: 1.0em;
        border-radius: 5px;
        box-shadow: 3px 3px 0px black;
    }
    .back{
        display: block;
        width: 20%;
        margin: auto;
        border-radius: 5px;
        text-align: center;
        border: 3px groove DarkOrchid;
        background-image: radial-gradient(circle at center, Orchid, DarkOrchid);
        font-size: 2.0em;
        color: black;
        box-shadow: 5px 5px 0px black;
        text-decoration: none;
        font-weight: bold;
    }
    .settings{
        font-size: 3.2em;
        position: absolute;
        right: 0;
        top: 60;
        text-decoration: none;
    }
    input{
        width: 40%;
    }
</style>
