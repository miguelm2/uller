<?php

class Constants{

    //Configuracion web
    static $HASH_TYPE  = "sha512";
    static $HASH_SALT  = "kondoritecnologia";


    // Configuracion bd
    static $USUARIO_BD = "uller_bd_user";
    static $PASS_BD    = "POkJBca3_jE[";
    static $NOMBRE_BD  = "uller_bd";
    static $IP_BD      = "localhost";


    //Mensajes Pagina
    static $PAGE_MENSAJE_ENVIADO = "Mensaje enviado exitosamente";
    static $PAGE_NOS_PONDREMOS   = "Nos pondremos en contacto con usted lo mas pronto posible.";
    static $PAGE_LOGIN           = "Cedula o contraseña incorrecta";
    static $PAGE_INTENTE_DENUEVO = "Intente de Nuevo";
    static $PAGE_RECUPERAR_PASS  = "Correo enviado exitosamente";
    static $PAGE_RECUPERAR_PASS2 = "Se envio un correo electronico con las instrucciones para recuperar su cuenta!";
    static $PAGE_RECUPERAR_PASS_CEDULA    = "Cedula incorrecta";
    static $PAGE_RECUPERAR_PASS_CEDULA2   = "El numero de cedula ingresado no esta registrado en el sistema, contacte con un administrador";


    //Configuracion PHPMailer
    static $MAIL_SMTP_SERVER = "uller.co";
    static $MAIL_SMTP_USER   = "hola@uller.co";
    static $MAIL_SMTP_PASS   = "MSg(hO4e#]82";
    static $MAIL_SMTP_NAME   = "Aplicacion Web Uller";


    //Mensajes Sistema
    static $ADMIN_NEW           = "Administrador creado exitosamente";
    static $ADMIN_UPDATE        = "Administrador actualizado exitosamente";
    static $REGISTER_DUPLICATE  = "Cédula, ya registrada en el sistema";
    static $ADMIN_REPEAT        = "Correo electrónico o cédula ya registrada";
    static $CUSTOMER_NEW        = "Cliente creado exitosamente";
    static $CUSTOMER_UPDATE     = "Cliente actualizado exitosamente";
    static $REGISTER_DELETE     = "Registro eliminado exitosamente";
    static $INFORMATION_NEW     = "Información actualizada exitosamente";
    static $CONFIRM_PASS        = "Las contraseñas no coinciden";
    static $UPDATE_PASS         = "Contraseña actualizada exitosamente";
    static $CURRENT_PASS        = "La contraseña actual es incorrecta";
    static $USER_NEW            = "Usuario creado exitosamente";
    static $USER_UPDATE         = "Usuario actualizado exitosamente";
    static $REGISTER_NEW        = "Registro creado exitosamente";
    static $REGISTER_UPDATE     = "Registro actualizado correctamente";
    static $MESSAGE_NEW         = "Mensaje enviado exitosamente, pronto nos pondremos en contacto contigo";
    static $REGISTER_ADD        = "Registro agregado exitosamente";
    static $TECHNICIAN_NEW      = "Técnico creado exitosamente";
    static $TECHNICIAN_UPDATE   = "Técnico actualizado correctamente";
    static $TECHNICIAN_ASSIGN   = "Técnico asignado correctamente";
}
 
?>