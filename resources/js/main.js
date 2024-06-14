const myImage = document.getElementById('myImage');
    
    myImage.addEventListener('click', function() {
      // Animación con anime.js
      anime({
        targets: myImage,
        opacity: 0,
        duration: 1000,
        complete: function() {
          // Reproducir sonido después de la animación
          const sound = new Audio('ruta_del_sonido.mp3');
          sound.play();
          
          // Restaurar la imagen después de 1 segundo
          setTimeout(function() {
            myImage.style.opacity = 1;
          }, 1000);
        }
      });
    });