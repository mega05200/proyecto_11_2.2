
/*LOGICA DE CARUCEL */
let MostrarIma = 0;  // Guarda cuál imagen está visible (0 = primera)
const ImagenesC = document.querySelectorAll('.carousel-Imagen');  // Obtiene todas las imágenes
const TotalImagenesC = ImagenesC.length;  // Cuenta cuántas imágenes hay (3 en tu caso)
const slideTrack = document.querySelector('.carousel-Tipo');  // Obtiene el contenedor de las imágenes

        // Botón retroceso (CarrucelA)
        document.querySelector('.CarrucelA').addEventListener('click', () => {
        MostrarIma = (MostrarIma - 1 + TotalImagenesC) % TotalImagenesC;
          MejoraCarusel();
        ResetTemporizador();  // Reinicia el temporizador
        });

        // Botón avance (CarrucelS)
        document.querySelector('.CarrucelS').addEventListener('click', () => {
        MostrarIma = (MostrarIma + 1) % TotalImagenesC;
         MejoraCarusel();
        ResetTemporizador();  // Reinicia el temporizador
        });


        /*Temporizador del carusel*/ 
    function MejoraCarusel() {
            const offset = -MostrarIma * 100;
    slideTrack.style.transform = `translateX(${offset}%)`;
        }

    // Auto-play: avanza la imagen cada 3 segundos
    let TemporizadorCarusel;

    function InicioAutoCarusel() {
        TemporizadorCarusel = setInterval(() => {
            MostrarIma = (MostrarIma + 1) % TotalImagenesC;
            MejoraCarusel();
        }, 3000);  // 3000 milisegundos = 3 segundos
    }

    function ResetTemporizador() {
        clearInterval(TemporizadorCarusel);
        InicioAutoCarusel();
    }

    // Inicia el auto-play al cargar la página
    InicioAutoCarusel();



//////////////////////////////////////////////////////////////////////////////////////////////

    // Menú desplegable acordeón?
    document.querySelectorAll('.Mini-Menu').forEach(toggle => {
        toggle.addEventListener('click', (e) => {
            e.preventDefault();
            const submenu = toggle.nextElementSibling;
            const isVisible = submenu.style.display !== 'none';

            // Cierra todos los submenús
            document.querySelectorAll('.submenu').forEach(menu => {
                menu.style.display = 'none';
            });
            document.querySelectorAll('.Mini-Menu').forEach(t => {
                t.textContent = t.textContent.replace('▼', '▶');
            });

            // Abre el actual si estaba cerrado
            if (!isVisible) {
                submenu.style.display = 'block';
                toggle.textContent = toggle.textContent.replace('▶', '▼');
            }
        });
    });
