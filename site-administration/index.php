<?php
  session_start();

  if (isset($_SESSION['session_email'])) {
    include "../login/connection.php";
    $sessionEmail = $_SESSION['session_email'];
    $sql = "SELECT Usuario_fotografia FROM usuarios WHERE Usuario_email = '$sessionEmail'";
    $result = $conn->query($sql);
    $_SESSION['profile_image'] = $result->fetch_row()[0];
  }

  if (isset($_SESSION['successfullyRegistered'])) {
    $registered_info_style = 'display: block;';
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="../styles/styles.css" rel="stylesheet"/>
    <link rel="icon" href="page-icon.png" type="image/gif">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alejandro Ortega</title>
  </head>
  <body>
    <header>
      <nav>
        <div id="navbar_" class="center_item">
          <div class="homeButton-container center_item_vertically">
            <a id="list_item_" href="" class="">Home</a>
          </div>

          <!--THIS TOGGLES WHEN THE USER LOGINS; DISPLAY NONE;-->
          <div id="login_signup_" style='<?php echo $_SESSION['login_signup_display_style']; ?>'>
            <ul class="main-ul-container">
              <li><a id="list_item_" class="" href="login/">Login</a></li>
              <li><a id="list_item_" class="" href="form/">Sign up</a></li>
            </ul>
          </div>
          <!--THIS TOGGLES WHEN THE USER LOGINS-->
          <div id="login_dropdown_" style="<?php echo $_SESSION['display_user_style']; ?>">
            <a href="" class="">
              <img src="<?php if (isset($_SESSION['profile_image'])) {
                echo 'profile/uploads/' . $_SESSION['profile_image'];} else {echo '../images/profile-silhouette.png';}?>" width="32" height="32">
            </a>
            <ul class="userDropDown">
              <!-- <li><a class="dropdown-item" href="#">Settings</a></li> -->
              <li><a class="dropdown-item" href="profile">Profile</a></li>
              <li><hr></li>
              <li><a class="dropdown-item" href="login/logout.php">Sign out</a></li>
            </ul>
          </div>
          <!--UNTIL HERE-->
        </div>

      </nav>

  </header>
    <main>
      <!--INFO CONTAINER-->
      <div class="info_div" style="<?php echo $registered_info_style; ?>">
        <div>
          <?php echo $_SESSION['successfullyRegistered']; ?>
        </div>
      </div>
      <!---->
      <div class="main_container">
        <div id="frontPage_image">
          <img src="profile.png" alt="Alejandro Ortega Guerra" loading="lazy" width="300" height="300">
        </div>
        <div id="frontPage_text">
          <h1>Welcome to my page!</h1>
          <p class="center_item_vertically">[Intro: Baby Ranks & Yandel]
            Esté menor que usted (Eh)
            La quiere conocer (Eh)
            Con su forma de actuar (Eh)
            Me va a enloquecer (Eh)
            La tengo en mi soñar (Eh)
            Acaricio su piel (Eh)
            Le quiero confesar (Eh)
            Que hoy

            [Coro: Tonny Tun Tun]
            No me importa que usted sea mayor que yo
            Hoy la quiero en mi cama
            Y no malinterprete mi intención
            Es que no aguanto las gana'
            Por eso he venido a decírselo
            Que hoy la quiero en mi cama
            Si no estás dispuesta, ya dímelo
            Es que no aguanto las gana'
            Dame un chance

            [Verso 1: Yandel & Wisin]
            No me importa que usted sea mayor que yo, oye
            Te quiero aquí aunque tenga mil amores
            Yo creo en el destino, oye
            Tú sabes que Dios tiene sus razones
            Eres mayor que yo, oye
            Te quiero aquí aunque tenga mil amores
            Yo creo en el destino, oye
            Tú sabes que Dios tiene sus razones (¡Fuimos!)
            Avanza, vámono' y déjemono' de bla-bla-bla
            Suelta la cartera pa' la cama con el cha-cha-cha
            Te miro y me mira', te me pego pero no haces na'
            Dime por qué, por qué (¡Vamo'!)
            [Verso 2: Wisin]
            Así es que ellas mueven las poleas
            Sus carros las fulea
            Y bum, bum, ella se come la brea
            Llegamo' a la disco y to' el mundo la lookea
            Chulea, muah, tira un beso y se patea
            ¿Eso, eso con qué se come? ¿Con queso?
            Esto es un proceso, suelta de eso pa' los preso'
            Tú sabes, doña, cómo mi voz tiene peso
            El perro quiere un hueso, avanza, dame un beso, fuimo'
            Sácale la pata que tú eres tremenda gata (Buh)
            Con pata, doña, con pata, je
            Avanza, póngase la bata
            Dejémonos de lata, te vo'a dar con la culata y-

            [Coro: Tonny Tun Tun]
            No me importa que usted sea mayor que yo
            Hoy la quiero en mi cama
            Y no malinterprete mi intención
            Es que no aguanto las gana'
            Por eso he venido a decírselo
            Que hoy la quiero en mi cama
            Si no estás dispuesta, ya dímelo
            Es que no aguanto las gana'
            Dame un chance
            [Verso 3: Daddy Yankee & Tonny Tun Tun]
            (Nos fuimos lejos, pa', Daddy)
            Yo soy un tigre, por la edad no midas el calibre
            Prueba del menú y después me dices
            Soy fuego en el Caribe
            Ma'i, que las apariencia' no te engañen
            Ni permitas que la gente te cizañe (¡Azota!)
            Porque tengo estilo de sicario
            De la calle; vocabulario
            La gatita me mira fasciná'
            Y a la vez se pone media guilla'
            Se da cuenta de lo contrario
            Porque vio que yo tengo la capacidad
            Que un joven requiere, sin usar intermediario
            El chico sabe to' el tiempo lo que hace
            Es tiempo que separen los niños de los hombres
            El chico sabe to' el tiempo lo que hace
            Es tiempo que separen con calma los colores (¡Azota!)
            Porque tengo estilo de sicario
            De la calle; vocabulario
            La gatita me mira fasciná'
            Y a la vez se pone media guilla'
            Se da cuenta de lo contrario
            Porque vio que yo tengo la capacidad
            Que un joven requiere, sin usar intermediario
            (Dame un chance)
            [Verso 4: Héctor "El Father"]
            Dale, cuarentona, con tu corte bien roncona
            Suenan la' campana' que ya Wisin 'tá en la lona
            Juguetona, como en la cama me arrincona
            Aquella tiene veinte, pero se parece a Chona
            Malandrona, con ese corte bien burlona
            Tráiganme la linda, Wisin baila con la mona
            Guapetona, y si tu gato te encajona
            Quítate el grillete, dile que tú te encojona'
            Quítate el grillete, dile que tú te encojona'
            Quítate el grillete, dile que tú te encojona'
            Quítate el grillete, dile que tú te encojona'

            [Outro: Wisin, Daddy Yankee, Héctor "El Father" & Yandel]
            Eh
            Doble U "El Sobreviviente"
            Daddy
            Daddy Yankee
            Tamo' ready
            Yandel
            Yankee
            You know how we do, man
            We ready
            Y el gato, Ranks
            Mas Flow 2
            Hector "El Bambino"
            Hector "El Bambino"
            Wisin & Yandel
            Tonny Tun Tun
            Representando un junte pa' la historia en "Más Flow 2"
            ¿Entiendes?
            En más ningún otro disco
            Jajajajaja
            Luny, lo único que te falta unir, es a Bush y a Bin Laden
            Jajajajaja</p>
        </div>
      </div>
    </main>
  </body>
</html>
