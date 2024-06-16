# ProyectoDAW

Para el proyecto final tengo pensado una página web de restaurantes de comida donde puedas valorar, comentar y observar distintos restaurantes y sus menús.

DWES:<br>
Usaré Laravel y php para el backend<br>
Pensé en 5 tablas: Usuarios, restaurantes, platos, ciudad y Plato_Restaurante.
![ERProyectoDaw](https://user-images.githubusercontent.com/72411758/161502722-a416585b-4978-4dd9-8f35-1f79d10f7f9c.png)
![Screenshot 2022-04-07 at 13 24 00](https://user-images.githubusercontent.com/72411758/162188398-abd93ff3-21d2-4e45-9be4-291fb99b49e9.png)

<ul><li>
Usuario contendrá los datos del mismo y podrá ser cliente o administrador.</li>
<li>Restaurante contendrá una Fk de "tipoDeRestaurante" que indicara el tipo de comida principal, la Fk de usuario que indicara el dueño y la Fk de ciudad.</li>
<li>Platos tendrá registrados todos los platos con una pequeña descripción</li>
<li>Ciudad saldrán las ciudades que tengan al menos un restaurante registrado</li>
<li>Plato restaurante sera la tabla intermedia</li> 
</ul>
<br>
La vista administrador se accedera mediante un botón en el login y solo podras logear si tu perfil es administrador. La vista del administrador se ejecuta en con lavavel y blade mientras que la vista de cliente esta diseñada en angular comunicandose con el backend en php.<br>

Habrá un login que redigirá a un registro o a la página de inicio.<br> 

En la página de inicio estarán los restaurantes ordenados por defecto y se podrán ordenar por ciudad o tipo de restaurante , desde el inicio también se podrá acceder al perfil, cambiar el idioma con la banderas hecha con canvas o salir de vuelta al login.<br>

En el perfil puedes entrar para modificar datos, acceder a tus restaurantes donde puedes ver el menú, añadir platos o eliminar el restaurante. A la hora de agregar un plato puedes crear uno nuevo o seleccionar un plato ya existente y meterlo en el restaurante.<br>

Dentro del menu puedes ver los distintos platos dentro del restaurante o entrar al plato en cuestión donde si eres el dueño edl restaurante puedes actualizarlo o borrarlo. <br>

DWEC:<br>
Para el desarrollo del front se ha seleccionado el framework de Angular, se ha usado la versión 17.1.
 <br>El proyecto se ha estructurado de la siguiente manera:
 <br>
Components: 
<br>
	En esta carpeta se guardan las partes del proyecto que tienen una función específica y serán usadas en las distintas vistas. Los componentes tienen su selector para ser usados.
 <br>
	Por ejemplo, el cuadro del login, el formulario para añadir un plato, o la lista de los restaurantes son componentes que se llaman en las vistas que los necesitan.
 <br>
 <br>
Interfaces:
 <br>
	En esta carpeta se guardan los tipos especiales que se han creado para este poyecto.
 <br>
<br>
Pages:
 <br>
	En esta carpeta se guardan los componentes que contendrán al resto de componentes. No tienen selector, porque se llamarán en el sistemas de rutas. Su objetivo es que el resto de componentes sean llamados aquí.
	 <br>
 Formulario contendrá la vista del login y del registro, y principal contendrá el resto de componentes con el footer y el navbar.
 <br> 
 <br>

Pipes:
 <br>
	En esta carpeta se guardan los transformadores de texto. En este proyecto sólo se usó uno para traducir del español al inglés.
 <br>
 <br>

Services:
 <br>
	En esta carpeta se guardan los archivos que manejan la información que se usarán en los distintos componentes. Las conecciones al servidor se hacen en estos archivos.
 <br>
 <br>
Shared:
 <br>
	En esta carpeta se guardan los pequeños componentes que serán usados en la aplicación. Por ejemplo, elementos svg, un botón con el pipe translate o el navbar son elementos html con algunas modificaciones.
 <br>
 <br>
DI: <br>
se ha usado el preprocesador de CSS, SASS, se han elegido los colores #5f4a36 un tono de marron elegenate siendo este el color dominante junto con su color invertido #a0b5c9 que es un azul celeste claro. <br>

La fuente principal usada es knile porque buscaba una fuente fina que diera la sensación de sofisticación combinada con una fuente creada por andaluces llamada granaina más llamativa para atraer la atención a los nombres y el título. <br>

El login tiene de background un video en loop, el logo esta hecho con inkscape y al dar click tiene animación y reproduce sonido, en la aplicación de angular cambiara entre varias imagenes dando la sensación de ser mordido y en la vista de blade desaparecera usando anime.js, en el perfil se han usado dos icoos en svg. <br>
 
DAW desplegare con AWS un EC2 para alamcenar el backend y el frontend en un bucked S3,la base de datos con AWS RDS.
<br>
