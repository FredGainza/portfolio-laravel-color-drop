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

<h2 class="light">Selection des paramètres</h2>

<form action="" method="post">
@csrf
<label for="name">Liste des enfants</label><br>
      <select name="name" id="player-name">
        @for($i=0; $i<=count($players)-1; $i++)
        <option value="{{$players[$i]->id}}">{{$players[$i]->name}}</option>
        @endfor
      </select><br><br>
<label for="difficult">Niveau de difficulté</label><br>
      <select name="difficulty" id="dif-select">
        <option value="facile">Facile</option>
        <option value="moyen">Moyen</option>
        <option value="difficile">Difficile</option>
      </select><br>
<button class="game">JOUER</button>
</form>

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
        text-align: center;
        border: 1px solid black;
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
        position: relative;
    }
    .light{
        display: block;
        text-align: center;
        border: 1px solid black;
        width: 20%;
        margin: auto;
        margin-top: 10px;
        margin-bottom: 10px;
        background-image: linear-gradient(0deg, white, Skyblue);
        box-shadow: 3px 3px 0px black;
    }
    .settings{
        font-size: 3.2em;
        position: absolute;
        right: 0;
        top: 60;
        text-decoration: none;
    }
    body{
        margin: 0 auto;
        font-family: cursive;
        background-image: url('../../../img/bg.png');
    }
    .button{
        display: block;
        width: 300px;
        margin: 0 auto;
        margin-top: 15px;
        border-radius: 5px;
        text-align: center;
        border: 3px groove DarkOrchid;
        background-image: radial-gradient(circle at center, Orchid, DarkOrchid);
        font-size: 5.0em;
        color: black;
        box-shadow: 5px 5px 0px black;
        text-decoration: none;
        font-weight: bold;
    }
    label{
        margin: 0 auto;
        text-align: center;
        margin-top: 50px;
        margin-bottom: 50px;
        margin-left: 42%;
        font-size: 180%;
        border: 3px solid gray;
        background-image: radial-gradient(circle at center, white, cyan);
        border: 1px solid black;
        border-radius: 5px;
    }
    select, option{
        margin: 0 auto;
        text-align: center;
        margin-top: 10px;
        margin-bottom: 50px;
        margin-left: 46%;
        font-size: 150%;
        border-radius: 5px;
    }
    form{
        background-image: radial-gradient(circle at center, Gainsboro, gray);
        margin-left: 15px;
        margin-right: 15px;
        padding-top: 15px;
        padding-bottom: 15px;
    }
    .game{
        display: block;
        width: 200px;
        margin: auto;
        border-radius: 5px;
        text-align: center;
        border: 3px groove DarkOrchid;
        background-image: radial-gradient(circle at center, Orchid, DarkOrchid);
        font-size: 300%;
        font-weight: bold;
        color: black;
        box-shadow: 5px 5px 0px black;
    }
</style>



