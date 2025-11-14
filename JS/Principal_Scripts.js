$(document).ready(function () {
  const menu = $('#menu');
  const content = $('#content');
  const modalOverlay = $('#modal-overlay');
  const modalImg = modalOverlay.find('img').get(0);

  // MENÚ HAMBURGUESA
  $('#hamburger').on('click keydown', function (e) {
    if (e.type === 'click' || e.key === 'Enter' || e.key === ' ') {
      menu.slideToggle().toggleClass('show');
      e.preventDefault();
    }
  });

  // CAMBIO DE SECCIÓN
  $('#menu').on('click', 'li', function () {
    const section = $(this).data('section');
    $('#menu li').removeClass('active');
    $(this).addClass('active');

    content.fadeOut(0, function () {
      $(this).html(sections[section]).fadeIn(500, function () {
        if (section === 'galeria') cargarGaleria();
      });
    });

    // CERRAR EL MENU SI ESTAMOS EN DISPOSITIVOS PEQUEÑOS
    if ($(window).width() <= 1000) {
      menu.slideUp().removeClass('show');
    }
  });

  // CARGAR NOTIFICACION DESDE ARCHIVO
  $('#notificaciones-icon').on('click', function () {
    cargarNotificacionesDesdeArchivo();
    $('#notificaciones-modal').addClass('open');
  });

  $('#cerrar-notificaciones').on('click', function () {
    $('#notificaciones-modal').removeClass('open');
  });

  function cargarNotificacionesDesdeArchivo() {
    $.ajax({
      url: 'ARCHIVOS/Notificaciones_Alumnos.txt',
      dataType: 'text',
      success: function (data) {
        const lineas = data.split('\n').filter(linea => linea.trim() !== '');
        const ul = $('#notificaciones-modal ul').empty();
        lineas.forEach(linea => ul.append(`<li>${linea}</li>`));
      },
      error: function () {
        console.error('No se pudo cargar el archivo de Notificaciones.');
      }
    });
  }

 // GALERÍA DINÁMICA (CARGANDO DE 100 A 0)
  function cargarGaleria() {
    const container = $('#gallery-container');
    if (!container.length) return;

    const totalImagenes = 70;
    const loteTam = 4;
    let cargadas = totalImagenes; // Empieza desde el total de imágenes

    container.empty();

    function cargarLote() {
      const fragment = document.createDocumentFragment();
      const nuevasImagenes = [];

      // Iterar sobre el lote de imágenes en orden decreciente
      for (let i = cargadas - 1; i >= Math.max(cargadas - loteTam, 0); i--) {
        const img = crearImagenGaleria(i);
        fragment.appendChild(img);
        nuevasImagenes.push(img);
      }

      container.append(fragment);
      cargadas -= nuevasImagenes.length; // Decrementa cargadas con el número real de imágenes cargadas

      // Lazy Loading
      if ('IntersectionObserver' in window) {
        aplicarLazyLoading(nuevasImagenes);
      } else {
        nuevasImagenes.forEach(img => {
          img.src = img.getAttribute('data-src');
        });
      }

      // Cargar siguiente lote con un pequeño delay para no bloquear la UI
      if (cargadas > 0) {
        setTimeout(cargarLote, 50); // Alternativa con requestAnimationFrame
      }
    }

    cargarLote();
  }

  function crearImagenGaleria(index) {
    const img = $('<img>', {
      'data-src': `ARCHIVOS/GALERIA/${index}.jpg`,
      'alt': `Imagen ${index}`,
      'tabindex': 0,
      'loading': 'lazy',
      'class': 'imagen-galeria',
      'style': 'cursor: pointer'
    }).get(0);

    img.onerror = () => {
      img.style.display = 'none';
    };

    img.addEventListener('click', () => abrirModal(img.src || img.getAttribute('data-src'), img.alt));
    img.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        abrirModal(img.src || img.getAttribute('data-src'), img.alt);
      }
    });

    return img;
  }

  function aplicarLazyLoading(imagenes) {
    const observer = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          img.src = img.getAttribute('data-src');
          img.removeAttribute('data-src');
          obs.unobserve(img);
        }
      });
    }, { rootMargin: '200px' });

    imagenes.forEach(img => observer.observe(img));
  }

  // MODAL DE IMÁGENES
  $('#modal-close').on('click', cerrarModal);
  $('#modal-overlay').on('click', function (e) {
      if (e.target === this) cerrarModal();
  });
  $(document).on('keydown', function (e) {
    if (e.key === 'Escape') {
      cerrarModal();
      $('#notificaciones-modal').removeClass('open');
    }
  });

  // ABRIR MODAL IMAGEN
  function abrirModal(src, alt) {
    modalImg.src = src;
    modalImg.alt = alt;
    modalOverlay.css('display', 'flex').attr('aria-hidden', 'false');
    $('body').css('overflow', 'hidden');
  }

  // CERRAR MODAL IMAGEN
  function cerrarModal() {
    modalOverlay.css('display', 'none').attr('aria-hidden', 'true');
    $('body').css('overflow', 'auto');
  }
  
  // EFECTO HOVER BOTONES HORARIOS Y TAREA
  $(document).on('mouseenter mouseleave', '.boton-tarea', function (e) {
    $(this).stop(true).animate({ opacity: e.type === 'mouseenter' ? 0.85 : 1 }, 200);
  });

  // ASISTENCIA
  document.addEventListener("DOMContentLoaded", () => {
     const observer = new MutationObserver(() => {
     const form = document.getElementById("formAsistencia");
     const resultados = document.getElementById("resultadosAsistencia");

        if (form && resultados) {
          form.addEventListener("submit", (e) => {
            e.preventDefault();

            const grado = document.getElementById("grado").value;
            const grupo = document.getElementById("grupo").value;
            const nombre = document.getElementById("nombre").value.toLowerCase().trim();

            // Simulación de datos
            const datos = [
              { nombre: "juan perez", grado: "1", grupo: "A", asistencias: "90%" },
              { nombre: "maria lopez", grado: "2", grupo: "B", asistencias: "85%" },
              { nombre: "luis martinez", grado: "3", grupo: "C", asistencias: "95%" }
            ];

            const encontrados = datos.filter(d =>
              d.grado === grado &&
              d.grupo === grupo &&
              d.nombre.includes(nombre)
            );

            if (encontrados.length === 0) {
              resultados.innerHTML = `<p class="centrado" style="color: red;">No se encontraron resultados para los datos ingresados.</p>`;
            } else {
              resultados.innerHTML = `
                <table class="tabla-asistencia">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Grado</th>
                      <th>Grupo</th>
                      <th>Asistencia</th>
                    </tr>
                  </thead>
                  <tbody>
                    ${encontrados.map(e => `
                      <tr>
                        <td>${e.nombre}</td>
                        <td>${e.grado}</td>
                        <td>${e.grupo}</td>
                        <td>${e.asistencias}</td>
                      </tr>
                    `).join("")}
                  </tbody>
                </table>
              `;
            }
          });
        }
      });
    observer.observe(document.body, { childList: true, subtree: true });
  });

    // LOGIN
    $('#content').on('submit', '#loginForm', function (e) {
      e.preventDefault();
      const username = $('#username').val().trim();
      const password = $('#password').val().trim();

      $.ajax({
        url: 'PHP/Principal_php.php',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({ username, password }),
        success: function (response) {
          if (response.success) {
            window.location.href = 'PAGINA/';
          } else {
            alert(response.message || 'Error al iniciar sesión');
          }
        },
        error: function (xhr) {
          alert('Error en la conexión:\n' + xhr.responseText);
        }
      });
    });

    // LOGOUT
    $('#logoutBtn').on('click', function () {
      $.ajax({
        url: '../../PHP/Principal_php.php',
        method: 'POST',
        data: { action: 'logout' },
        success: function (response) {
          if (response.success) {
            window.location.href = '../../';
          } else {
            alert('No se pudo cerrar sesión');
          }
        },
        error: function (xhr) {
          alert('Error cerrando sesión:\n' + xhr.responseText);
        }
      });
    });

    // MAPA
    document.addEventListener('click', function (event) {
      if (event.target && event.target.id === 'mapa-estatico') {
        const container = document.getElementById('mapa-contenedor');
        container.innerHTML = `
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.213739473676!2d-102.3512343845859!3d20.71332998616585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842f7fc2e0c27413%3A0x1234567890abcdef!2sC.%20Felipe%20%C3%81ngeles%2024%2C%20Arandas%2C%20Jal.!5e0!3m2!1ses!2smx!4v1690000000000!5m2!1ses!2smx"
            width="100%"
            height="400"
            allowfullscreen=""
            loading="lazy"
            class="mapa-iframe"
            title="Mapa de ubicación de Secundaria Técnica 101"
          ></iframe>`;
      }
    });
});