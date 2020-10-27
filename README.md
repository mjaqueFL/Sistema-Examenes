# Sistema-Examenes
Proceso instalación:
En el proceso solo estoy especificando el nombre de la base de datos, el usuario y la contraseña dan muchos problemas en CI
Cuando instalemos codeigniter pegaremos sobre libraries un archivo mongo_db.php con unos datos que al hacer el proceso de instalación se rellenan por otros
El archivo mongo_db.php es necesario que esté antes de sobreescribirlo porque CI hace un autoload de la libreria de mongo y la libreria hace una llamada al archivo mongo_db.php, si el archivo no está da fallo
Al instalarse el programa redirige a Auth y borra el controlador de instalacion y la vista de instalacion y escribe una nueva linea en el routes.php con el nuevo controlador por defecto , que pasará a ser "Auth".
