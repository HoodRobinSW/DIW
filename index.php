<?php
  session_start();

  if (isset($_SESSION['session_email'])) {
    include "login/connection.php";
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
    <link href="styles/styles.css" rel="stylesheet"/>
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
                echo 'profile/uploads/' . $_SESSION['profile_image'];} else {echo 'images/profile-silhouette.png';}?>" width="32" height="32">
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
        <div id="frontPage_text">
          <h1 style="text-align: center;">Welcome to my page!</h1>
          <p style="text-align: center;">[Intro: Baby Ranks & Yandel]Esté menor que usted (Eh)La quiere conocer (Eh)Con su forma de actuar (Eh)Me va a enloquecer (Eh)La tengo en mi soñar (Eh)Acaricio su piel (Eh)Le quiero confesar (Eh)Que hoy[Coro: Tonny Tun Tun]No me importa que usted sea mayor que yoHoy la quiero en mi camaY no malinterprete mi intenciónEs que no aguanto las gana'Por eso he venido a decírseloQue hoy la quiero en mi camaSi no estás dispuesta, ya dímeloEs que no aguanto las gana'Dame un chance[Verso 1: Yandel & Wisin]No me importa que usted sea mayor que yo, oyeTe quiero aquí aunque tenga mil amoresYo creo en el destino, oyeTú sabes que Dios tiene sus razonesEres mayor que yo, oyeTe quiero aquí aunque tenga mil amoresYo creo en el destino, oyeTú sabes que Dios tiene sus razones (¡Fuimos!)Avanza, vámono' y déjemono' de bla-bla-blaSuelta la cartera pa' la cama con el cha-cha-chaTe miro y me mira', te me pego pero no haces na'Dime por qué, por qué (¡Vamo'!)[Verso 2: Wisin]Así es que ellas mueven las poleasSus carros las fuleaY bum, bum, ella se come la breaLlegamo' a la disco y to' el mundo la lookeaChulea, muah, tira un beso y se patea¿Eso, eso con qué se come? ¿Con queso?Esto es un proceso, suelta de eso pa' los preso'Tú sabes, doña, cómo mi voz tiene pesoEl perro quiere un hueso, avanza, dame un beso, fuimo'Sácale la pata que tú eres tremenda gata (Buh)Con pata, doña, con pata, jeAvanza, póngase la bataDejémonos de lata, te vo'a dar con la culata y-[Coro: Tonny Tun Tun]No me importa que usted sea mayor que yoHoy la quiero en mi camaY no malinterprete mi intenciónEs que no aguanto las gana'Por eso he venido a decírseloQue hoy la quiero en mi camaSi no estás dispuesta, ya dímeloEs que no aguanto las gana'Dame un chance[Verso 3: Daddy Yankee & Tonny Tun Tun](Nos fuimos lejos, pa', Daddy)Yo soy un tigre, por la edad no midas el calibrePrueba del menú y después me dicesSoy fuego en el CaribeMa'i, que las apariencia' no te engañenNi permitas que la gente te cizañe (¡Azota!)Porque tengo estilo de sicarioDe la calle; vocabularioLa gatita me mira fasciná'Y a la vez se pone media guilla'Se da cuenta de lo contrarioPorque vio que yo tengo la capacidadQue un joven requiere, sin usar intermediarioEl chico sabe to' el tiempo lo que haceEs tiempo que separen los niños de los hombresEl chico sabe to' el tiempo lo que haceEs tiempo que separen con calma los colores (¡Azota!)Porque tengo estilo de sicarioDe la calle; vocabularioLa gatita me mira fasciná'Y a la vez se pone media guilla'Se da cuenta de lo contrarioPorque vio que yo tengo la capacidadQue un joven requiere, sin usar intermediario(Dame un chance)[Verso 4: Héctor "El Father"]Dale, cuarentona, con tu corte bien ronconaSuenan la' campana' que ya Wisin 'tá en la lonaJuguetona, como en la cama me arrinconaAquella tiene veinte, pero se parece a ChonaMalandrona, con ese corte bien burlonaTráiganme la linda, Wisin baila con la monaGuapetona, y si tu gato te encajonaQuítate el grillete, dile que tú te encojona'Quítate el grillete, dile que tú te encojona'Quítate el grillete, dile que tú te encojona'Quítate el grillete, dile que tú te encojona'[Outro: Wisin, Daddy Yankee, Héctor "El Father" & Yandel]EhDoble U "El Sobreviviente"DaddyDaddy YankeeTamo' readyYandelYankeeYou know how we do, manWe readyY el gato, RanksMas Flow 2Hector "El Bambino"Hector "El Bambino"Wisin & YandelTonny Tun TunRepresentando un junte pa' la historia en "Más Flow 2"¿Entiendes?En más ningún otro discoJajajajajaLuny, lo único que te falta unir, es a Bush y a Bin LadenJajajajaja</p>
        </div>
        <div id="frontPage_image">
          <img src="profile.png" alt="Alejandro Ortega Guerra" loading="lazy" width="300" height="300">
        </div>
      </div>
    </main>
  </body>
</html>
