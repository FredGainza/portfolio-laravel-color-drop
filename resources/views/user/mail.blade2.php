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


<form action="" method="post">
    @csrf
    <label for="name-select">Prénom de l'utilisateur</label><br>
    <input type="text" name="name" placeholder="Prénom" value="{{ $users->name }}"><br>
    <label for="name-select">Mail de l'utilisateur</label><br>
    <input type="mail" name="email" placeholder="Adresse email" value="{{ $users->email }}"><br>
        <button>Modifier</button>
</form>

<a class="back" href="https://project-color.fgainza.fr/pindex">Retour en arrière</a>

</body>

<style>
    .bye{
        position: absolute;
        top: 0;
        right: 0;
        font-size: 50;
        text-decoration: none;
    }
    h1{
        border: 1px solid black;
        text-align: center;
        background-image: radial-gradient(circle at center, white, DeepSkyBlue);
        width: 40%;
        margin: auto;
        margin-top: 10px;
        box-shadow: 3px 3px 0px black;
        position: relative;
    }
    .dark{
        border: 1px solid black;
        text-align: center;
        background-image: linear-gradient( white, DarkTurquoise);
        width: 25%;
        margin: auto;
        margin-top: 10px;
        box-shadow: 3px 3px 0px black;
    }
    .light{
        border: 1px solid black;
        background-image: linear-gradient(0deg, white, Skyblue);
        text-align: center;
        width: 20%;
        margin: auto;
        margin-top: 10px;
        margin-bottom: 15px;
        box-shadow: 3px 3px 0px black;
    }
    body{
        margin: 0 auto;
        background-image: url("../../../img/bg.png");
        font-family: cursive;
    }
    form{
        background-image: radial-gradient(circle at center, LightSlateGray, SlateGray);
        border-radius: 5px;
        padding: 10px;
        width: 32%;
        margin: auto;
        margin-top: 15px;
        font-size: 1.3em;
        text-align: center;
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
        width: 17%;
        margin: auto;
        border-radius: 2px;
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
</style>
