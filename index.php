<?php
/**
 * ==========================================================
 *  🌐 PÁGINA PRINCIPAL - SECUNDARIA TÉCNICA 101
 * ==========================================================
 *  Archivo: index.php
 *  Descripción:
 *      Página de inicio del sitio web oficial de la 
 *      Secundaria Técnica 101. Muestra información 
 *      general sobre la institución y enlaces a las 
 *      diferentes secciones del portal.
 *
 *  Funcionalidades:
 *   - Verificación de sesión: redirige al usuario al 
 *     panel si ya inició sesión.
 *   - Encabezado y menú de navegación responsivo.
 *   - Contenido principal con bienvenida y descripción.
 *   - Modal para imágenes ampliadas.
 *   - Modal para notificaciones.
 *   - Pie de página institucional.
 *   - Carga de scripts JS y librerías externas.
 *
 *  Recursos externos:
 *   - Font Awesome para iconos.
 *   - jQuery 3.6 para funcionalidad dinámica.
 *
 *  Autor: [Tu Nombre]
 *  Fecha: 2025
 * ==========================================================
 **/

// =========================================================
//  🚀 Inicio de sesión segura
// =========================================================
session_start();

// Verificar si el usuario ya inició sesión
// Si es así, redirigir automáticamente a su panel
if (!empty($_SESSION['user_id']) && is_numeric($_SESSION['user_id'])) {
    header('Location: PAGINA/');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <!-- =========================================================
       🌐 Metadatos y Recursos
       - Configuración de caracteres y viewport
       - Descripción para SEO
       - Favicon
       - Fuentes de iconos (Font Awesome)
       - Hoja de estilos principal
  ========================================================= -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Sitio web oficial de la Secundaria Técnica 101, comprometida con la educación técnica y académica de calidad." />
  <link rel="icon" type="image/x-icon" href="IMG/Icono.ico" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="CSS/Principal_Style.css" />
  <title>Secundaria Técnica 101</title>
</head>
<body>

  <!-- =========================================================
       🏫 Encabezado y Navegación
       - Logo institucional
       - Menú principal con enlaces a secciones
       - Botón tipo "hamburger" para menú responsive
       - Icono de notificaciones con contador
  ========================================================= -->
  <header>
    <div class="container">
      <nav>
        <!-- Logo -->
        <div class="logo">
          <img src="IMG/Logo.png" alt="Logo Secundaria Técnica 101" loading="lazy" />
          Secundaria Técnica 101
        </div>

        <!-- Menú principal -->
        <ul class="menu" id="menu">
          <li class="active" data-section="inicio" tabindex="0"><i class="fas fa-house"></i> Inicio</li>
          <li data-section="nosotros" tabindex="0"><i class="fas fa-users"></i> Nosotros</li>
          <li data-section="eventos" tabindex="0"><i class="fas fa-calendar-check"></i> Eventos</li>
          <li data-section="galeria" tabindex="0"><i class="fas fa-images"></i> Galería</li>
          <li data-section="horarios" tabindex="0"><i class="fas fa-clock"></i> Horarios</li>
          <li data-section="tareas" tabindex="0"><i class="fas fa-list-check"></i> Tareas</li>
          <li data-section="trabajo_social" tabindex="0"><i class="fas fa-hand-holding-heart"></i> Trabajo Social</li>
          <li data-section="asistencia" tabindex="0"><i class="fas fa-user-check"></i> Asistencia</li>
          <li data-section="login" tabindex="0"><i class="fas fa-right-to-bracket"></i> Iniciar Sesión</li>
          <li data-section="contacto" tabindex="0"><i class="fas fa-envelope-open-text"></i> Contacto</li>
        </ul>

        <!-- Botón para menú móvil -->
        <button class="hamburger" id="hamburger" aria-label="Abrir menú de navegación" aria-expanded="false">
          <span></span><span></span><span></span>
        </button>
      </nav>

      <!-- Icono de notificaciones -->
      <div id="notificaciones-icon" title="Notificaciones" aria-label="Ver notificaciones">
        <i class="fas fa-bell"></i>
        <span id="contador-notificaciones" class="contador"></span>
      </div>
    </div>
  </header>

  <!-- =========================================================
       📌 Contenido Principal
       - Sección de bienvenida
       - Texto descriptivo
       - Imagen representativa de la escuela
  ========================================================= -->
  <main>
    <div class="container">
      <section class="content" id="content">
        <div class="contenido">
          <h1 class="titulo-principal">Bienvenido a Secundaria Técnica 101</h1>
          <p class="centrado">
            La Secundaria Técnica 101 está comprometida con la formación técnica y académica de calidad,
            preparando a los estudiantes para los retos del mundo moderno y la industria.
          </p>
          <div class="imagen-inicio">
            <img src="IMG/Escuela.jpg" alt="Imagen de la escuela" loading="lazy" />
          </div>
        </div>
      </section>
    </div>
  </main>

  <!-- =========================================================
       🖼 Modal: Imagen ampliada
       - Permite mostrar imágenes en tamaño completo
       - Accesible y cerrado mediante botón
  ========================================================= -->
  <div id="modal-overlay" class="oculto" aria-hidden="true" role="dialog" aria-modal="true">
    <div id="modal-content">
      <span id="modal-close" aria-label="Cerrar">&times;</span>
      <img src="" alt="Imagen ampliada" />
    </div>
  </div>

  <!-- =========================================================
       🔔 Modal: Notificaciones
       - Lista de notificaciones dinámicas
       - Cierre accesible
  ========================================================= -->
   <div id="notificaciones-modal" class="oculto" aria-hidden="true" role="dialog" aria-modal="true">
    <span id="cerrar-notificaciones" title="Cerrar">&times;</span>
    <h3>Notificaciones</h3>
    <ul></ul>
  </div>

  <!-- =========================================================
       ⚡ Pie de página
       - Derechos de autor
       - Consistencia visual
  ========================================================= -->
  <footer>
    <div class="container">
      <p>&copy; 2025 Secundaria Técnica 101. Todos los derechos reservados.</p>
    </div>
  </footer>

  <!-- =========================================================
       📜 Scripts
       - jQuery
       - Funcionalidades de secciones y UI
  ========================================================= -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
  <script src="JS/Principal_Sections.js" defer></script>
  <script src="JS/Principal_Scripts.js" defer></script>
</body>
</html>