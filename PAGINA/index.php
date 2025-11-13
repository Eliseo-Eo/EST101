<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Mi Página Web</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <style>
    :root {
  --color-principal: #8E0104;
  --color-secundario: #6E0104;
  --color-fondo: #f5f1eb;
  --color-texto: #4b3b2b;
  --color-hover: #750002;
  --color-notificacion-hover: #ffc107;
}
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
      height: 100vh;
      background: #f4f4f4;
      flex-direction: column;
    }

    .topbar {
      background-color: #630003ff;
      color: white;
      height: 50px;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      padding: 0 20px;
      gap: 20px;
      flex-shrink: 0;
    }

    .topbar i {
      font-size: 22px;
      cursor: pointer;
      transition: color 0.3s;
    }

    .topbar i:hover {
      color: #ff4d4d;
    }

    .container {
      display: flex;
      flex-grow: 1;
      height: calc(100vh - 50px);
    }

    .sidebar {
      width: 220px;
      background: linear-gradient(to bottom, #6E0104, #8E0104);
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      padding: 0 0 20px 0;
    }

    .sidebar .title {
      text-align: center;
      padding: 15px 0 5px;
      font-size: 20px;
      font-weight: bold;
      letter-spacing: 1px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .sidebar .logo {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 10px 0 15px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .sidebar .logo img {
      max-width: 140px;
      height: auto;
    }

    .sidebar .menu {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .sidebar .menu li {
      padding: 15px 25px;
      cursor: pointer;
      transition: background-color 0.3s;
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 16px;
    }

    .sidebar .menu li:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }

    .sidebar .menu li.active {
      background-color: rgba(255, 255, 255, 0.2);
    }

    .sidebar .menu li i {
      width: 20px;
      text-align: center;
    }

    .content {
      flex-grow: 1;
      padding: 30px;
      background: white;
      overflow-y: auto;
    }








    

    /* Diseño para la sección de planeaciones con el 40% del tamaño */
    .contenedor-planeaciones {
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin: 30px auto;
      max-width: 30%; /* Establece el contenedor al 40% del tamaño de la página */
      width: 30%;  /* Asegura que ocupe el 40% del espacio disponible */
     

    }

    .contenedor-planeaciones h1,h3 {
      text-align: center;
      font-size: 24px;
      color: #333;
      margin-bottom: 15px;
       
    }
    .contenedor-planeaciones p {
      text-align: center;      
    }

    .contenedor-planeaciones p {
      font-size: 16px;
      color: #555;
      margin-bottom: 20px;
    }

    .botones-tareas-contenedor {
      display: flex;
      justify-content: space-between;
      gap: 15px;
      margin-bottom: 20px;
       
    }





/* Diseño para la sección de planeaciones con el 40% del tamaño */
    #lista-archivos {
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin: 30px auto;
      max-width: 30%; /* Establece el contenedor al 40% del tamaño de la página */
      width: 30%;  /* Asegura que ocupe el 40% del espacio disponible */
     

    }

  
 






    /* Estilo para los botones */
   .boton-tarea {
      padding: 12px 25px;
      background-color: #800020;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      display: inline-flex;
      align-items: center; /* Centra el contenido verticalmente */
      justify-content: center; /* Centra el contenido horizontalmente */
      gap: 10px;
      transition: background-color 0.3s;
      width: 48%;
    }

    .boton-tarea i {
      display: inline-block; /* Asegura que el icono también se alinee bien */
    }

    .boton-tarea:hover {
      background-color: #a52a3a;
    }

    /* Estilo para el formulario de subida */
    .formulario-subida {
      background-color: #f9f9f9;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .formulario-subida h3 {
      font-size: 20px;
      color: #333;
      margin-bottom: 15px;
    }

    .formulario-subida input[type="file"] {
      padding: 8px;
      margin-bottom: 15px;
      width: 100%;
      border-radius: 5px;
      border: 1px solid #ddd;
    }

    .formulario-subida button {
      padding: 12px 25px;
      background-color: #800020;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      width: 100%;
      transition: background-color 0.3s;
    }

    .formulario-subida button:hover {
      background-color: #a52a3a;
    }












 /* Estilo para el select */
select {
  padding: 10px;
  font-size: 16px;
  color: white; /* Texto blanco */
  background-color: #800020; /* Fondo rojo */
  border: 1px solid #800020; /* Borde rojo */
  border-radius: 5px;
  width: 100%;
  margin-bottom: 15px;
  text-align: center; /* Centrar el texto */
  transition: all 0.3s ease;
  cursor: pointer;
}

/* Estilo cuando el select está en foco (cuando se selecciona) */
select:focus {
  border-color: #a52a3a; /* Cambiar a un rojo más claro cuando está en foco */
  background-color: #a52a3a; /* Fondo rojo más claro */
  box-shadow: 0 0 8px rgba(128, 0, 32, 0.2);
  outline: none;
}

/* Agregar una flecha personalizada para el select */
select::-ms-expand {
  display: none; /* Esconde la flecha predeterminada de IE */
}

select {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"%3E%3Cpath fill="none" stroke="%23ffffff" stroke-width="1.5" d="M3 4l3 3 3-3" /%3E%3C/svg%3E');
  background-repeat: no-repeat;
  background-position: right 10px center;
  background-size: 12px 12px;
}








/* ============================================
   NOTIFICACIONES LATERALES
============================================ */
#notificaciones-icon {
  position: absolute;
  top: 16px;
  right: 60px;
  font-size: 22px;
  color: white;
  cursor: pointer;
  z-index: 1500;
}

#notificaciones-icon:hover {
  color: var(--color-notificacion-hover);
}

#notificaciones-icon::after {
  content: "";
  position: absolute;
  top: -2px;
  right: -2px;
  width: 8px;
  height: 8px;
  background-color: red;
  border-radius: 50%;
}

#notificaciones-modal {
  position: fixed;
  top: 0;
  right: -400px;
  width: 320px;
  height: 100%;
  background-color: #fff;
  box-shadow: -2px 0 10px rgba(0,0,0,0.3);
  z-index: 3000;
  transition: right 0.3s ease;
  padding: 1.5rem;
  overflow-y: auto;
}

#notificaciones-modal.open {
  right: 0;
}

#notificaciones-modal h3 {
  margin-bottom: 1rem;
  color: var(--color-principal);
}

#notificaciones-modal ul {
  list-style: none;
  padding: 0;
}

#notificaciones-modal ul li {
  margin-bottom: 1rem;
  padding: 0.5rem;
  border-left: 4px solid var(--color-principal);
  background-color: #f8f8f8;
  font-size: 14px;
  border-radius: 5px;
}

#cerrar-notificaciones {
  position: absolute;
  top: 10px;
  right: 15px;
  font-size: 22px;
  cursor: pointer;
  color: var(--color-principal);
}







  </style>
</head>
<body>

  <!-- Barra superior -->
  <header class="topbar">
    <i class="fas fa-bell" id="notificaciones-icon" title="Notificaciones"></i>
    <i class="fas fa-sign-out-alt" title="Cerrar Sesión" id="logoutBtn"></i>
  </header>

  <div class="container">
    <!-- Menú lateral -->
    <nav class="sidebar">
      <div class="title">EST 101</div>
      <div class="logo">
        <img src="../IMG/Logo.png" alt="Logo" />
      </div>
      <ul class="menu">
        <li id="btn-inicio" class="active"><i class="fas fa-home"></i> Inicio</li>
        <li id="btn-planeaciones"><i class="fas fa-calendar-alt"></i> Planeaciones</li>
        <li id="btn-servicio"><i class="fas fa-hands-helping"></i> Servicio Social</li>
        <li id="btn-desercion"><i class="fas fa-user-slash"></i> Deserción Escolar</li>
        <li id="btn-configuracion"><i class="fas fa-cog"></i> Configuración</li>
      </ul>
    </nav>

    <!-- Área de contenido dinámico -->
    <main class="content" id="main-content">
      <!-- Contenido se cargará desde JS -->
    </main>
  </div>

<!-- INICIO: Modal para notificaciones -->
  <div id="notificaciones-modal">
    <span id="cerrar-notificaciones" title="Cerrar">&times;</span>
    <h3>Notificaciones</h3>
    <ul></ul>
  </div>






  <!-- Vincular JS -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="sections.js"></script>
  <script>
    // secciones.js

    // Contenido de cada sección
    const secciones = {
      inicio: `
        <h1>Inicio</h1>
        <p>Bienvenido a la sección de inicio. Aquí puedes ver el resumen general.</p>
      `,
      planeaciones: `
<div class="contenedor-planeaciones">
  <h1>Planeaciones</h1>
  <p>Selecciona tu turno para subir las planeaciones correspondientes:</p>

  <!-- Botones para seleccionar el turno -->
  <div class="botones-tareas-contenedor">
    <button onclick="mostrarFormulario('matutino')" class="boton-tarea">
      <i class="fas fa-upload"></i> Matutino
    </button>
    <button onclick="mostrarFormulario('vespertino')" class="boton-tarea">
      <i class="fas fa-upload"></i> Vespertino
    </button>
  </div>

  <!-- Formulario Matutino -->
  <form id="formulario-matutino" class="formulario-subida" style="display: none;" onsubmit="subirArchivo('matutino'); return false;">
    <h3>Subir Planeación - Matutino</h3>
    <label for="mes">Selecciona el mes:</label>
    <select id="mes" name="mes" required>
      <option value="" disabled selected>Seleccionar mes</option> <!-- Opción predeterminada -->
      <option value="01_ENERO">Enero</option>
      <option value="02_FEBRERO">Febrero</option>
      <option value="03_MARZO">Marzo</option>
      <option value="04_ABRIL">Abril</option>
      <option value="05_MAYO">Mayo</option>
      <option value="06_JUNIO">Junio</option>
      <option value="07_JULIO">Julio</option>
      <option value="08_AGOSTO">Agosto</option>
      <option value="09_SEPTIEMBRE">Septiembre</option>
      <option value="10_OCTUBRE">Octubre</option>
      <option value="11_NOVIEMBRE">Noviembre</option>
      <option value="12_DICIEMBRE">Diciembre</option>
    </select>
    <input type="file" id="archivo-matutino" name="archivo" required />
    <button type="submit">
      <i class="fas fa-paper-plane"></i> Subir Archivo
    </button>
  </form>

  <!-- Formulario Vespertino -->
  <form id="formulario-vespertino" class="formulario-subida" style="display: none;" onsubmit="subirArchivo('vespertino'); return false;">
    <h3>Subir Planeación - Vespertino</h3>
    <label for="mes-vespertino">Selecciona el mes:</label>
    <select id="mes-vespertino" name="mes-vespertino" required>
      <option value="" disabled selected>Seleccionar mes</option> <!-- Opción predeterminada -->
      <option value="01_ENERO">Enero</option>
      <option value="02_FEBRERO">Febrero</option>
      <option value="03_MARZO">Marzo</option>
      <option value="04_ABRIL">Abril</option>
      <option value="05_MAYO">Mayo</option>
      <option value="06_JUNIO">Junio</option>
      <option value="07_JULIO">Julio</option>
      <option value="08_AGOSTO">Agosto</option>
      <option value="09_SEPTIEMBRE">Septiembre</option>
      <option value="10_OCTUBRE">Octubre</option>
      <option value="11_NOVIEMBRE">Noviembre</option>
      <option value="12_DICIEMBRE">Diciembre</option>
    </select>
    <input type="file" id="archivo-vespertino" name="archivo" required />
    <button type="submit">
      <i class="fas fa-paper-plane"></i> Subir Archivo
    </button>
  </form>
</div>



  <!-- Cuadro para ver archivos y carpetas -->
  <div id="lista-archivos">
    <h2>Archivos y Carpetas</h2>
    <ul id="archivos-lista">
      <!-- Los archivos y carpetas se cargarán aquí -->
    </ul>
  </div>


      `,
      servicio: `
        <h1>Servicio Social</h1>
        <p>Aquí se gestionan los proyectos de servicio social.</p>
      `,
      desercion: `
        <h1>Deserción Escolar</h1>
        <p>Estadísticas y seguimiento de deserción escolar.</p>
      `,
      configuracion: `
        <h1>Configuración</h1>
        <p>Personaliza tu experiencia en esta sección.</p>
      `
    };

    // Función para cambiar el contenido y el estado activo
    function cargarSeccion(seccionId) {
      const content = document.getElementById('main-content');
      content.innerHTML = secciones[seccionId];

      // Quitar clase "active" de todos los botones
      document.querySelectorAll('.sidebar .menu li').forEach(btn => {
        btn.classList.remove('active');
      });

      // Agregar clase "active" al botón clickeado
      document.getElementById(`btn-${seccionId}`).classList.add('active');
    }

    // Escuchar clics en los botones
    document.getElementById('btn-inicio').addEventListener('click', () => cargarSeccion('inicio'));
    document.getElementById('btn-planeaciones').addEventListener('click', () => cargarSeccion('planeaciones'));
    document.getElementById('btn-servicio').addEventListener('click', () => cargarSeccion('servicio'));
    document.getElementById('btn-desercion').addEventListener('click', () => cargarSeccion('desercion'));
    document.getElementById('btn-configuracion').addEventListener('click', () => cargarSeccion('configuracion'));

    // Cargar sección por defecto
    window.onload = () => cargarSeccion('inicio');

    // Mostrar formulario según el turno
    function mostrarFormulario(turno) {
      const formularios = ['matutino', 'vespertino'];
      formularios.forEach(f => {
        const div = document.getElementById(`formulario-${f}`);
        if (div) div.style.display = (f === turno) ? 'block' : 'none';
      });
    }

    
    














    function mostrarFormulario(turno) {
  // Mostrar el formulario correspondiente y ocultar el otro
  if (turno === 'matutino') {
    document.getElementById('formulario-matutino').style.display = 'block';
    document.getElementById('formulario-vespertino').style.display = 'none';
  } else if (turno === 'vespertino') {
    document.getElementById('formulario-vespertino').style.display = 'block';
    document.getElementById('formulario-matutino').style.display = 'none';
  }
}

function subirArchivo(turno) {
  // Obtener el formulario y los datos necesarios
  const formulario = document.getElementById(`formulario-${turno}`);
  const inputArchivo = document.getElementById(`archivo-${turno}`);
  const archivo = inputArchivo.files[0];

  // Verificar si se seleccionó un archivo
  if (!archivo) {
    alert("Por favor selecciona un archivo.");
    return;
  }

  // Obtener el mes seleccionado
  const selectMes = document.getElementById(turno === 'matutino' ? 'mes' : 'mes-vespertino');
  const mesSeleccionado = selectMes.value;

  // Crear un objeto FormData para enviar el archivo
  const formData = new FormData();
  formData.append("turno", turno);
  formData.append("archivo", archivo);
  formData.append("mes", mesSeleccionado);

  // Enviar la solicitud al servidor con fetch
  fetch("../PHP/Subir_Planeaciones.php", {
    method: "POST",
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    alert(data);  // Mostrar el mensaje de éxito o error
    // Limpiar los campos después de la carga
    formulario.reset();  // Esto reinicia el formulario
  })
  .catch(error => {
    console.error("Error al subir el archivo:", error);
    alert("Error al subir el archivo.");
  });
}





  // LOGOUT
  $('#logoutBtn').on('click', function () {
    $.ajax({
      url: '../PHP/Principal_php.php',
      method: 'POST',
      data: { action: 'logout' },
      success: function (response) {
        if (response.success) {
          window.location.href = '../'; 
        } else {
          alert('No se pudo cerrar sesión');
        }
      },
      error: function (xhr, status, error) {
        alert('Error cerrando sesión:\n' + xhr.responseText);
      }
    });
  });



function cargarArchivos() {
  $.ajax({
    url: 'listar_archivos.php', // Ruta al script PHP que lista los archivos
    method: 'GET',
    success: function(response) {
      const archivos = JSON.parse(response);
      const listaArchivos = document.getElementById('archivos-lista');
      listaArchivos.innerHTML = ''; // Limpiar la lista antes de cargar nuevos archivos

      if (archivos.error) {
        listaArchivos.innerHTML = '<li>' + archivos.error + '</li>';
      } else {
        archivos.forEach(function(archivo) {
          const li = document.createElement('li');
          li.textContent = archivo; // Nombre del archivo o carpeta
          listaArchivos.appendChild(li);
        });
      }
    },
    error: function() {
      alert('Error al cargar los archivos.');
    }
  });
}

// Llamar a cargarArchivos cuando se carga la página
window.onload = function() {
  cargarSeccion('planeaciones'); // Para que cargue la sección 'inicio' al cargar
  cargarArchivos(); // Para que cargue los archivos
};
 









// NOTIFICACIONES
  $('#notificaciones-icon').on('click', function () {
    cargarNotificacionesDesdeArchivo();
    $('#notificaciones-modal').addClass('open');
  });

  $('#cerrar-notificaciones').on('click', function () {
    $('#notificaciones-modal').removeClass('open');
  });

  function cargarNotificacionesDesdeArchivo() {
    $.ajax({
      url: '../ARCHIVOS/Notificaciones_Alumnos.txt',
      dataType: 'text',
      success: function (data) {
        const lineas = data.split('\n').filter(linea => linea.trim() !== '');
        const ul = $('#notificaciones-modal ul');
        ul.empty();
        lineas.forEach(linea => {
          ul.append(`<li>${linea}</li>`);
        });
      },
      error: function () {
        console.error('No se pudo cargar el archivo de Notificaciones.');
      }
    });
  }



  
  </script>


  
</body>
</html>