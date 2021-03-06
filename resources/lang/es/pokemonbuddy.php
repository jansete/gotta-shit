<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Gotta Shit
    |--------------------------------------------------------------------------
    |
    | Text for Gotta Shit
    |
    */

    'site_name' => 'Pokémon Buddy',
    'welcome' => "Estás en Pokémon Buddy - Gotta Shit. Empieza a añadir zonas de rastreo para escanear Pokemos magras cuando te <a class='disclaimer-link' href=':path'>Registres</a>",
    'footer_year' => '2016',
    'no_geolocation' => 'Este navegador no soporta geolocalización.',
    'home' => '
        <p>¡Estás en Pokémon Buddy - Gotta Shit!</p>

        <p>¿Tienes que cagar? Pues te jodes, hay que cazar pokemos. <br/>Este es el sitio web para ti.</p>

        <p>Aquí podrás:</p>

        <ul>
            <li>Buscar y encontrar las mejores zonas para cumplir tu sueño de maestro pokemos.</li>
            <li>Ver la puntuación de ese lugar</li>
            <li>Ver las opiniones de otros usuarios</li>
        </ul>

        <p>Una vez te hayas registrado serás capaz de...</p>

        <ul>
            <li>Añadir nuevos zonas de escaneo</li>
            <li>Opinar sobre esa zona u otras</li>
            <li>Puntuar las zonas</li>
        </ul>

        <p>¡Regístrate y disfruta!</p>
    ',

    'email' => [
        'confirm_email_subject' => 'Confirma tu correo electrónico para PokemonBuddy.com',
        'confirm_email_new_subject' => 'Confirma tu nueva dirección de correo electrónico para PokemonBuddy.com',
        'reset_password_subject' => 'Resetea tu clave para PokemonBuddy.com',
        'confirm_email_thanks'  => '¡Gracias por formar parte de PokemonBuddy.com!',
        'confirm_email_action' => "Un último paso. Necesitamos que <a href=':path'>confirmes tu dirección de correo electrónico</a>.",
        'reset_password_thanks' => 'Nos has pedido resetear tu clave',
        'reset_password_action' => "<a href=':path'>Haz click aquí</a> para resetear tu clave: <a href=':path'>Resetear mi clave</a>",
        'new_place_add' => "Añadieron un nuevo sitio",
        'new_place_action' => "<a href=':path'>Haz click aquí</a> para ver el nuevo sitio: <a href=':path'>:place</a> creado por <a href=':path_user'>:username</a>",
        'new_comment_add' => "Añadieron un nuevo comentario a :place",
        'new_comment_action' => "<a href=':path'>Haz click aquí</a> para ver el nuevo comentario para <a href=':path'>:place</a> creado por <a href=':path_author_of_comment'>:username_author_of_comment</a>",
    ],

    'nav' => [
        'login' => 'Entra',
        'logout' => 'Desconecta',
        'register' => 'Regístrate',
        'add_place' => 'Añadir',
        'user_places' => 'Tus zonas',
        'all' => 'Todos',
        'nearest' => 'Zonas cercanas',
        'best_places' => 'Mejores zonas',
        'profile' => 'Perfil',
        'es' => 'ES',
        'en' => 'EN',
        'menu' => 'Menú',
        'menu_user' => 'Menú de usuario',
        'active_places' => 'Zonas activas',
    ],

    'title' => [
        'create_place' => 'Añade una zona',
        'edit_place' => 'Editar :place',
        'user_places' => 'Tus zonas',
        'best_places' => 'Mejores zonas',
        'nearest_places' => 'Zonas más cercanos',
        'all_places' => 'Todas las zonas',
        'welcome' => 'Bienvenido',
        'register' => 'Regístrate',
        'login' => 'Entra',
        'edit_user' => 'Editar :user',
        'user_profile' => 'Perfíl de :user',
        'active_places' => 'Zonas activas',
    ],

    'user' => [
        'login' => 'Entra',
        'login_facebook' => 'Entra con Facebook',
        'login_twitter' => 'Entra con Twitter',
        'login_github' => 'Entra con Github',
        'add_facebook' => 'Añade tu Facebook',
        'add_twitter' => 'Añade tu Twitter',
        'add_github' => 'Añade tu Github',
        'logout' => 'Desconecta',
        'register' => 'Regístrate',
        'email' => 'Correo Electrónico',
        'password' => 'Clave',
        'remember_me' => 'Recúerdame',
        'full_name' => 'Nombre completo',
        'username' => 'Nombre de usuario',
        'confirm_password' => 'Confirma tu clave',
        'delete_user' => 'Borrar Usuario',
        'edit_user' => 'Editar Usuario',
        'sent_password_reset' => 'Mandar enlace para resetear mi clave',
        'forgot_password' => '¿Olvidaste tu contraseña?',
        'reset_password' => 'Resetear mi clave',
        'update_user' => 'Actualizar usuario',
        'updated_user' => ':user actualizado',
        'edit_user_not_allowed' => 'No puedes editar ese usuario',
        'update_user_not_allowed' => 'No puedes actualizar ese usuario',
        'number_of_places' => 'Cantidad de lugares',
        'number_of_places_deleted' => 'Cantidad de lugares borrados',
        'number_of_places_rated' => 'Cantidad de lugares votados',
        'no_notifications_warning' => 'No recibirás notificaciones por correo electrónico hasta que verifiques o definas tu correo electrónico',

    ],

    'place' => [
        'name' => 'Nombre',
        'my_location' => 'Localización actual',
        'latitude' => 'Latitud',
        'longitude' => 'Longitud',
        'create_place' => 'Crear Zona',
        'edit_place' => 'Editar Zona',
        'update_place' => 'Actualizar Zona',
        'delete_place' => 'Borrar Zona',
        'delete_place_confirm' => '¿Está seguro?',
        'delete_place_permanently' => 'Borrar Zona Permanentemente',
        'restore_place' => 'Recuperar Sitio',
        'enable_place' => 'Activar Zona',
        'disable_place' => 'Desactivar Zona - Quedan :remain_time',
        'remain_time_place' => 'Quedan :remain_time',
        'created_place' => ':place Creado',
        'updated_place' => ':place Actualizado',
        'deleted_place' => ':place Borrado',
        'restored_place' => ':place Recuperado',
        'enabled_place' => ':place Activado',
        'disabled_place' => ':place Desactivado',
        'disabled' => 'Desactivado',
        'deleted_place_permanently' => ':place Borrado Permanentemente',
        'edit_place_not_allowed' => 'No puedes editar :place',
        'update_place_not_allowed' => 'No puedes actualizar :place',
        'delete_place_not_allowed' => 'No puedes borrar :place',
        'restore_place_not_allowed' => 'No puedes recuperar :place',
        'show_pokemap' => 'Ver PokeMap',
    ],

    'comment' => [
        'comments' => '{0} No hay comentarios. Anímate.|{1} :number_of_comments Comentario|[2,Inf] :number_of_comments Comentarios',
        'create_comment_label' => 'Deja un comentario',
        'create_comment' => 'Enviar comentario',
        'edit_comment' => 'Editar comentario',
        'update_comment_label' => 'Actualiza tu comentario',
        'update_comment' => 'Actualizar comentario',
        'delete_comment' => 'Borrar comentario',
        'delete_comment_confirm' => 'Borrar comentario Permanentemente',
        'created_comment' => ':place comentado',
        'updated_comment' => 'Comentario para :place Actualizado',
        'deleted_comment' => 'Comentario para :place Borrado',
        'edit_comment_not_allowed' => 'No puedes editar el comentario para :place',
        'update_comment_not_allowed' => 'No puedes actualizar el comentario para :place',
        'delete_comment_not_allowed' => 'No puedes borrar el comentario para :place',
    ],

    'star' => [
        'stars' => 'Puntos',
        'votes' => 'Votos',
        'rate_place' => 'Puntúalo',
        'rated' => ':place Puntuado',
        'delete_star' => 'Borrar Puntuación',
        'deleted_star' => 'Puntuación para :place borrada',
    ],
    'subscription' => [
        'add' => 'Quiero suscribirme a este lugar',
        'delete' => 'Quiero desuscribirme de este lugar',
        'subscribed_place' => 'Recibirás correos cuando alguien comente este lugar',
        'unsubscribed_place' => 'No recibirás correos cuando alguien comente este lugar',
    ],
    'exception' => [
        '503' => 'Tenemos un pequeño problema',
        '404' => "Perdona, no podemos encontrar eso.",
        'token' => 'Inténtalo de nuevo',
    ],

];
