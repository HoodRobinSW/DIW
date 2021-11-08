<?php
  session_start();

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
          <pre style="text-align: center;">
[Letra de "Mayor Que Yo 3" ft. Don Omar, Wisin, Yandel & Daddy Yankee]

[Intro: Yandel, Daddy Yankee & Wisin]
Luny
Estaba loco por verte, deseoso por tenerte
Quiero volver a su lado (Más Flow 3)
No importa qué diga la gente
Le juro, señora, nunca le fallé
(W, Yandel, okey, El Rey Don Omar)
(El mejor de todos los tiempos, DY)

[Refrán: Yandel & Daddy Yankee]
Decían que por ser menor que usted, yo no la quería (Latinos, stand up)
Que no era amor solo interés, y aquí estoy todavía (Ajá)
Y aunque pase el tiempo lo sabes bien
Que soy aquel chico que te hizo sentir mujer
Siendo mayor que yo usted
(Luny Tunes, Mas Flow 3)

[Verso 1: Don Omar & Daddy Yankee]
(Llegó Papá, ¡Don!)
Señora, usted me gusta tanto, igual que el primer día
Bienvenida a la tercera dinastía
Se juntaron los que to' el mundo quería (You know)
Para cumplir toditas sus fantasías (El Duro)
Con esa experiencia es que usted me ha conquistado
Me tiene loco, me tiene enamorado
Y esa cinturita como que no ha cambiado
Y yo esta noche la quiero tener (Don, Don, Don)
Allá en mi cama
Dos cuerpos calentao', prendío' en llamas (Zumba)
El ron que dure hasta las 3 de la mañana
Yo forever papá, tú forever mamá
Ay, malvada con mente de perversa
Como acelera cuando pone la reversa
Choca con el hunter cazando la presa
No baje el fronte vamo' a matarnos (Don)

[Coro: Don Omar & Daddy Yankee]
Que la quiero mayor que yo, que yo
Que me dé calor, que me dé de su amor
Me eduque en experiencia, me deje loco
Me lleve a la cama y me haga alucinar
Que la quiero mayor que yo, que yo (¿Qué?)
Que me dé calor, que me dé de su amor
Me eduque en experiencia, me deje loco
Me lleve a la cama y me haga alucinar
(Zu-zu-zu-zu-zu-zumba)

[Verso 2: Wisin]
Lunes a viernes tiene novio, pero el sábado lo deja (Doble)
Aparece el domingo con la cara de pende— weh
Ella se viste cara y el tipo se acompleja (Ajá)
Que el tiguere es su favorito, me lo dijo en la oreja
Señora mía, saludable, rica, cero calorías
No has cambiado en nada, tú sigues de repostería
Quiero besarte de nuevo, ¿te gustaría?
Te traje una sorpresa de Victoria, ¿tú me la modelarías?
Ese cuerpo no ha cambiado (Heh), me tienes hipnotizado (Heh)
Siempre fina, maquillada, tremendo calzado (W)
Recordemos el pasado, ya yo estoy desesperado
Completemos lo que no hemos terminado
Gata salvaje (Frontúa), de Tinker Bell el tatuaje (Ajá)
Cuando está sola en su casa me llama pa' que trabaje (Siempre)
La monto en mi viaje, ella quiere cangrinaje (Tú sabe')
No tiene ropa interior debajo del traje

[Refrán: Don Omar & Yandel]
Decían que por ser menor que usted
Yo no la quería (No diga' eso)
Que no era amor solo interés (Se equivocaron)
Y aquí estoy todavía (Yes, babe)
Y aunque pase el tiempo lo sabes bien, que soy aquel (You know)
Chico que te hizo sentir mujer (The One)
Siendo mayor que yo usted

[Verso 3: Daddy Yankee]
Okey
El mejor de todos los tiempos
The GOAT
Da-ddy
¡Fuimo'!
Y a mí me gusta la fruta madura que se deja comer
Cuando yo te pele ahí, ahí te voy a morder, heh
Qué bien tú te conservas haces que me sangre hierva
La mujer es como el vino y tú eres la mejor reserva (Let's go)

[Puente: Daddy Yankee]
Quiere que le diga, quiere que le diga, dale, mami, enséñame
Quiere que le diga que en la cama usted es la que sabe
Dame cariñito, corazón, dame cariñito, corazón
No hay hombre que la dome cuando ella aprieta
Ah-oh, ah-oh, me puse salvaje
Ah-oh, ah-oh, aguanta el voltaje
Ah-oh, ah-oh, sacúdeme ese motete
La yegua que pide fuete
Se lo damo' pa' que respete

[Verso 4: Yandel & Daddy Yankee]
Me tiene enloquecido, estoy convencido
Que usted se va conmigo aunque me busque un lío
Yo no te obligo, me sigue o te sigo
Tranquila que de aquí nos vamos encendí'o
Yo sé que arrepentido no me quedaré
Entre mis sábanas te encontraré
Sabes que soy el hombre, que bien te conoce
Siendo tú mayor que yo (¡Fuimo'!)

[Coro: Daddy Yankee & Don Omar]
Que la quiero mayor que yo, que yo
Que me dé calor, que me dé de su amor (Las Torres)
Me eduque en experiencia, me vuelve loco
Me lleve a la cama y me haga alucinar (Don!)
Que la quiero mayor que yo, que yo
Que me dé calor, que me dé de su amor
Me eduque en experiencia, me deje loco
Me lleve a la cama y me haga alucinar (Fuimo')

[Puente: Daddy Yankee]
Quiere que le diga, quiere que le diga, dale, mami, enséñame
Quiere que le diga que en la cama usted es la que sabe
Dame cariñito, corazón, dame cariñito, corazón
No hay hombre que la dome cuando ella aprieta
Ah-oh, ah-oh, me puse salvaje
Ah-oh, ah-oh, aguanta el voltaje
Ah-oh, ah-oh, sacúdeme ese motete
La yegua que pide fuete
Se lo damo' pa' que respete

[Outro: Todos]
Luny
Damas y caballeros, esto es un encuentro de las Naciones Unidas (Jajajaja)
Mas Flow 3
Luny Tunes
Pina Records
Don, Don, Don, Don
Yandel
W
El Rey
El soberano, King Daddy
Llegó Papá, El Duro
Así mesmo, llegó Papá
La torre, del Movimiento
</pre>
        </div>
        <div id="frontPage_image">
          <img src="profile.png" alt="Alejandro Ortega Guerra" loading="lazy" width="300" height="300">
        </div>
      </div>
    </main>
  </body>
</html>
