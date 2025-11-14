// MOSTRAR GRUPOS HORARIOS Y TAREA
  window.mostrarGrupos = function (turno) {
    $('#grupos-matutino, #grupos-vespertino').slideUp();
    $(`#materias-matutino-1, #materias-matutino-2, #materias-matutino-3`).slideUp();
    $(`#materias-vespertino-1, #materias-vespertino-2, #materias-vespertino-3`).slideUp();
      if (turno === 'matutino') {
        $('#grupos-matutino').slideDown(); 
      } else if (turno === 'vespertino') {
        $('#grupos-vespertino').slideDown(); 
      }
  };

  function mostrarMaterias(turno, grado) {
    $(`#materias-matutino-1, #materias-matutino-2, #materias-matutino-3`).slideUp();
    $(`#materias-vespertino-1, #materias-vespertino-2, #materias-vespertino-3`).slideUp();
    $(`#materias-${turno}-${grado}`).slideDown(); 
  }
    
  const sections = {
  // =========================
  // Sección: Inicio
  // =========================
  // Presenta una bienvenida a la Secundaria Técnica 101 con título, descripción y una imagen representativa.
  inicio: `
    <h2 class="centrado" tabindex="0">Bienvenido a Secundaria Técnica 101</h2>
    <p class="centrado" tabindex="0">
      La Secundaria Técnica 101 está comprometida con la formación técnica y académica de calidad,
      preparando a los estudiantes para los retos del mundo moderno y la industria.
    </p>
    <div class="imagen-inicio">
      <img src="IMG/Escuela.jpg" alt="Imagen de la escuela" loading="lazy" />
    </div>
  `,

  // =========================
  // Sección: Nosotros
  // =========================
  // Describe la historia, misión, visión, valores y talleres de la escuela.
  nosotros: `
  <section class="nosotros">
    <!-- Título principal y subtítulo -->
    <h2 class="titulo-principal">¡Conoce la Escuela Secundaria Técnica No. 101!</h2>
    <h3 class="subtitulo">Somos una institución que forma con calidad y compromiso.</h3>

    <!-- Introducción textual sobre la historia y filosofía -->
    <div class="texto-intro">
      <p>
        Fundada en 1980, la <strong>Escuela Secundaria Técnica No. 101</strong> ha sido un pilar
        en la educación técnica de la región. Con más de cuatro décadas de experiencia,
        nuestra institución forma estudiantes íntegros.
      </p>
      <p>
        Contamos con docentes capacitados, instalaciones modernas y una sólida estructura pedagógica
        que impulsa el aprendizaje significativo.
      </p>
    </div>

    <!-- Tarjetas de Misión, Visión y Valores -->
    <div class="contenedor-mvv">
      <div class="card">
        <div class="icono">🎯</div>
        <h3>Misión</h3>
        <p>
          Formar estudiantes con educación integral, fomentando valores, disciplina y responsabilidad.
        </p>
      </div>

      <div class="card">
        <div class="icono">👁️</div>
        <h3>Visión</h3>
        <p>
          Ser reconocidos por nuestra excelencia académica y técnica, promoviendo ciudadanos responsables y críticos.
        </p>
      </div>

      <div class="card">
        <div class="icono">⚖️</div>
        <h3>Valores</h3>
        <ul>
          <li>Respeto</li>
          <li>Responsabilidad</li>
          <li>Honestidad</li>
          <li>Disciplina</li>
          <li>Solidaridad</li>
          <li>Compromiso</li>
        </ul>
      </div>
    </div>

    <!-- Talleres Técnicos ofrecidos -->
    <h3 class="titulo-talleres">Talleres Técnicos</h3>
    <ul class="lista-talleres">
      <li>Electrónica</li>
      <li>Informática</li>
      <li>Ofimática</li>
      <li>PCIA</li>
    </ul>
  </section>
  `,

  // =========================
  // Sección: Eventos
  // =========================
  // Muestra los eventos escolares recientes y próximos, con iconos, imágenes y fechas.
  eventos: `
  <section class="eventos">
    <h2 class="titulo-principal">📅 Eventos Escolares</h2>
    <h3 class="subtitulo">Conoce nuestras actividades más recientes y próximas.</h3>

    <div class="texto-intro">
      <p>
        Fomentamos la participación de nuestros alumnos a través de eventos culturales, académicos y deportivos.
      </p>
    </div>

    <div class="contenedor-mvv">
      <!-- Evento 1: Desfile Septiembre -->
      <div class="card">
        <div class="icono">📚</div>
        <h3>Desfile Septiembre</h3>
        <p>
          Conmemoramos las fiestas patrias con un desfile escolar que refuerza valores de unidad y civismo.
        </p>
        <div class="imagen-evento">
          <img src="ARCHIVOS/EVENTOS/1.jpg" alt="Imagen del evento Desfile de Septiembre" loading="lazy">
        </div>
        <p class="fecha-evento"><strong>Fecha:</strong> 16 de Septiembre 2025</p>
      </div>

      <!-- Evento 2: Simulacro de Sismo -->
      <div class="card">
        <div class="icono">⚠️</div>
        <h3>Simulacro Sismo</h3>
        <p>
          Reforzamos medidas de seguridad y preparamos a la comunidad escolar ante emergencias.
        </p>
        <div class="imagen-evento">
          <img src="ARCHIVOS/EVENTOS/2.jpg" alt="Imagen del evento Simulacro de Sismo" loading="lazy">
        </div>
        <p class="fecha-evento"><strong>Fecha:</strong> 19 de Septiembre 2025</p>
      </div>

      <!-- Evento 3: Festival Cultural -->
      <div class="card">
        <div class="icono">🎭</div>
        <h3>Festival Cultural</h3>
        <p>
          Espacio para que los estudiantes expresen su talento en música, danza, teatro y pintura.
        </p>
        <div class="imagen-evento">
          <img src="ARCHIVOS/EVENTOS/3.jpg" alt="Imagen del evento Festival Cultural" loading="lazy">
        </div>
        <p class="fecha-evento"><strong>Fecha:</strong> 10 de Octubre 2025</p>
      </div>

      <!-- Evento 4: Día del Libro -->
      <div class="card">
        <div class="icono">📖</div>
        <h3>Día del Libro</h3>
        <p>
          Celebramos el amor por la lectura con actividades literarias y concursos entre los alumnos.
        </p>
        <div class="imagen-evento">
          <img src="ARCHIVOS/EVENTOS/4.jpg" alt="Imagen del evento Día del Libro" loading="lazy">
        </div>
        <p class="fecha-evento"><strong>Fecha:</strong> 24 de Octubre 2025</p>
      </div>

      <!-- Evento 5: Día de Muertos -->
      <div class="card">
        <div class="icono">💀</div> <!-- Ícono de calavera que representa el Día de Muertos -->
        <h3>Día de Muertos</h3>
        <p>
          Una de las tradiciones más importantes de México, donde honramos a nuestros seres queridos que han partido. Habrá altares, música, danzas, y la tradicional ofrenda con comida, flores y velas.
        </p>
        <div class="imagen-evento">
          <img src="ARCHIVOS/EVENTOS/5.jpg" alt="Imagen del evento Día de Muertos" loading="lazy">
        </div>
        <p class="fecha-evento"><strong>Fecha:</strong> 1-2 de Noviembre 2025</p> <!-- Las fechas tradicionales son el 1 y 2 de noviembre -->
      </div>

    </div>
  </section>
  `,

  // =========================
  // Sección: Galería
  // =========================
  // Contenedor dinámico para mostrar fotos y videos de la escuela.
  galeria: `
    <h2 class="titulo-principal" tabindex="0">Galería</h2>
    <p class="subtitulo" tabindex="0">
      Explora las fotos y videos de nuestras actividades escolares, talleres y proyectos destacados.
    </p>
    <div id="gallery-container" aria-live="polite" aria-atomic="true"></div>
  `,

  // =========================
  // Sección: Tareas
  // =========================
  // Permite descargar tareas según turno y grado, con botones interactivos.
  tareas: `
    <h2 class="titulo-principal" tabindex="0">Tareas</h2>
    <p class="subtitulo" tabindex="0">Selecciona tu turno, grado y materia para ver las tareas correspondientes:</p>

    <div class="imagen-tareas-contenedor">
      <img src="IMG/Tareas.png" alt="Imagen representativa de tareas escolares" class="imagen-tareas" loading="lazy" />
    </div>

    <div class="botones-tareas-contenedor">
      <!-- Botones para mostrar grupos matutino o vespertino -->
      <button onclick="mostrarGrupos('matutino')" class="boton-tarea" aria-controls="grupos-matutino" aria-expanded="false" aria-haspopup="true">
        <i class="fas fa-school" aria-hidden="true"></i> Matutino
      </button>
      <button onclick="mostrarGrupos('vespertino')" class="boton-tarea" aria-controls="grupos-vespertino" aria-expanded="false" aria-haspopup="true">
        <i class="fas fa-school" aria-hidden="true"></i> Vespertino
      </button>
    </div>

    <!-- Contenedor de grupos Matutino -->
    <div id="grupos-matutino" class="grupos-contenedor" style="display: none;" aria-live="polite" aria-atomic="true">
      <h3 class="centrado" tabindex="0">Grupos Matutino</h3>
      <div class="grupos-fila" style="display: flex; justify-content: center; gap: 20px;">
        ${[1, 2, 3].map(grado => `
          <button onclick="mostrarMaterias('matutino', ${grado})" class="boton-tarea" aria-controls="materias-matutino-${grado}" aria-expanded="false" aria-haspopup="true">
            <i class="fas fa-book" aria-hidden="true"></i> Grado ${grado}
          </button>
        `).join('')}
      </div>
    </div>

    <!-- Contenedor de grupos Vespertino -->
    <div id="grupos-vespertino" class="grupos-contenedor" style="display: none;" aria-live="polite" aria-atomic="true">
      <h3 class="centrado" tabindex="0">Grupos Vespertino</h3>
      <div class="grupos-fila" style="display: flex; justify-content: center; gap: 20px;">
        ${[1, 2, 3].map(grado => `
          <button onclick="mostrarMaterias('vespertino', ${grado})" class="boton-tarea" aria-controls="materias-vespertino-${grado}" aria-expanded="false" aria-haspopup="true">
            <i class="fas fa-book" aria-hidden="true"></i> Grado ${grado}
          </button>
        `).join('')}
      </div>
    </div>

    <!-- Contenedor de materias para cada grado matutino -->
    ${[1, 2, 3].map(grado => `
      <div id="materias-matutino-${grado}" class="materias-contenedor" style="display: none;">
        <h4 class="centrado" tabindex="0">Materias para Grado ${grado}</h4>
        <div class="materias-fila" style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
          ${['Artes', 'Biologia', 'Ed_Fisica', 'Español', 'Force', 'Geografia', 'Historia', 'Ingles', 'Matematicas', 'Tutorias'].map(materia => `
            <a href="ARCHIVOS/T_MAT/TAREAS/${grado}_Grado_${materia}.docx" download class="materia-link" aria-label="Descargar tarea de ${materia} para grado ${grado} matutino">
              <button class="boton-tarea">
                <i class="fas fa-download" aria-hidden="true"></i> ${materia}
              </button>
            </a>
          `).join('')}
        </div>
      </div>
    `).join('')}

    <!-- Contenedor de materias para cada grado vespertino -->
    ${[1, 2, 3].map(grado => `
      <div id="materias-vespertino-${grado}" class="materias-contenedor" style="display: none;">
        <h4 class="centrado" tabindex="0">Materias para Grado ${grado}</h4>
        <div class="materias-fila" style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
          ${['Artes', 'Biologia', 'Ed_Fisica', 'Español', 'Force', 'Geografia', 'Historia', 'Ingles', 'Matematicas', 'Tutorias'].map(materia => `
            <a href="ARCHIVOS/T_VES/TAREAS/${grado}_Grado_${materia}.docx" download class="materia-link" aria-label="Descargar tarea de ${materia} para grado ${grado} vespertino">
              <button class="boton-tarea">
                <i class="fas fa-download" aria-hidden="true"></i> ${materia}
              </button>
            </a>
          `).join('')}
        </div>
      </div>
    `).join('')}
`,

// ==================================================
// Sección: Horarios
// ==================================================
horarios: `
  <!-- Título principal de la sección -->
  <h2 class="titulo-principal" tabindex="0">Horarios</h2>
  <!-- Subtítulo que indica acción al usuario -->
  <p class="subtitulo" tabindex="0">Selecciona tu turno para ver los horarios correspondientes:</p>

  <!-- Imagen representativa de los horarios -->
  <div class="imagen-tareas-contenedor">
    <img 
      src="IMG/Horarios.jpg" 
      alt="Imagen representativa de horarios escolares" 
      class="imagen-tareas" 
      loading="lazy" 
    />
  </div>

  <!-- Botones para elegir turno: Matutino o Vespertino -->
  <div class="botones-tareas-contenedor">
    <button 
      onclick="mostrarGrupos('matutino')" 
      class="boton-tarea" 
      aria-controls="grupos-matutino" 
      aria-expanded="false" 
      aria-haspopup="true"
    >
      <i class="fas fa-school" aria-hidden="true"></i> Matutino
    </button>

    <button 
      onclick="mostrarGrupos('vespertino')" 
      class="boton-tarea" 
      aria-controls="grupos-vespertino" 
      aria-expanded="false" 
      aria-haspopup="true"
    >
      <i class="fas fa-school" aria-hidden="true"></i> Vespertino
    </button>
  </div>

  <!-- Contenedor de grupos Matutino -->
  <div id="grupos-matutino" class="grupos-contenedor" style="display: none;" aria-live="polite" aria-atomic="true">
    <h3 class="centrado" tabindex="0">Grupos Matutino</h3>
    <br>
    <!-- Generación dinámica de grados y grupos -->
    ${[1, 2, 3].map(grado => `
      <div class="grado-contenedor" style="margin-bottom: 20px;">
        <h4 tabindex="0" style="text-align: center;">Grado ${grado}</h4>
        <div style="display: flex; gap: 15px; justify-content: center;">
          ${['A', 'B', 'C', 'D', 'E'].map(grupo => `
            <!-- Enlace para descargar el horario de cada grupo -->
            <a 
              href="ARCHIVOS/T_MAT/HORARIOS/${grado}${grupo}_Grado_Horario.pdf" 
              download 
              class="grupo-link" 
              aria-label="Descargar horario grado ${grado} grupo ${grupo} matutino"
            >
              <button class="boton-tarea">
                <i class="fas fa-download" aria-hidden="true"></i> ${grado}${grupo}
              </button>
            </a>
          `).join('')}
        </div>
      </div>
    `).join('')}
  </div>

  <!-- Contenedor de grupos Vespertino -->
  <div id="grupos-vespertino" class="grupos-contenedor" style="display: none;" aria-live="polite" aria-atomic="true">
    <h3 class="centrado" tabindex="0">Grupos Vespertino</h3>
    <br>
    <!-- Generación dinámica de grados y grupos -->
    ${[1, 2, 3].map(grado => `
      <div class="grado-contenedor" style="margin-bottom: 20px;">
        <h4 tabindex="0" style="text-align: center;">Grado ${grado}</h4>
        <div style="display: flex; gap: 15px; justify-content: center;">
          ${['A', 'B', 'C', 'D'].map(grupo => `
            <!-- Enlace para descargar el horario de cada grupo vespertino -->
            <a 
              href="ARCHIVOS/T_VES/HORARIOS/${grado}${grupo}_Grado_Horario.pdf" 
              download 
              class="grupo-link" 
              aria-label="Descargar horario grado ${grado} grupo ${grupo} vespertino"
            >
              <button class="boton-tarea">
                <i class="fas fa-download" aria-hidden="true"></i> ${grado}${grupo}
              </button>
            </a>
          `).join('')}
        </div>
      </div>
    `).join('')}
  </div>
`,

// ==================================================
// Sección: Asistencia
// ==================================================
asistencia: `
  <div class="contenedor-asistencia">
    <!-- Icono decorativo de asistencia -->
    <div class="asistencia-icono" aria-hidden="true">
      <i class="fas fa-clipboard-list"></i>
    </div>
    
    <!-- Título y descripción -->
    <h2 class="centrado" tabindex="0" style="color: var(--color-principal); margin-bottom: 1rem;">Consulta de Asistencia</h2>
    <p class="centrado" tabindex="0" style="margin-bottom: 2rem;">
      Padres de familia, pueden buscar la asistencia de sus hijos ingresando los datos a continuación.
    </p>

    <!-- Formulario de búsqueda de asistencia -->
    <form id="formAsistencia" class="login-form">
      <div class="login-input-wrapper">
        <i class="fas fa-layer-group" aria-hidden="true"></i>
        <select id="grado" required>
          <option value="">Selecciona grado</option>
          <option value="1">1°</option>
          <option value="2">2°</option>
          <option value="3">3°</option>
        </select>
      </div>

      <div class="login-input-wrapper">
        <i class="fas fa-users" aria-hidden="true"></i>
        <select id="grupo" required>
          <option value="">Selecciona grupo</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
        </select>
      </div>

      <div class="login-input-wrapper">
        <i class="fas fa-user" aria-hidden="true"></i>
        <input id="nombre" type="text" placeholder="Nombre del Alumno" required />
      </div>

      <!-- Botón de búsqueda -->
      <button type="submit">
        <i class="fas fa-search"></i> Buscar
      </button>
    </form>

    <!-- Contenedor para mostrar resultados -->
    <div id="resultadosAsistencia"></div>
  </div>
`,

// ==================================================
// Sección: Login
// ==================================================
login: `
  <div class="login-container">
    <!-- Icono decorativo de usuario -->
    <div class="login-icon" aria-hidden="true">
      <i class="fas fa-user-circle"></i>
    </div>

    <!-- Título y subtítulo -->
    <h2 tabindex="0" style="color: var(--color-principal); margin-bottom: 1rem;">Iniciar Sesión</h2>
    <p class="centrado" tabindex="0" style="margin-bottom: 2rem;">
      Ingresa tus datos para acceder a tu cuenta.
    </p>

    <!-- Formulario de inicio de sesión -->
    <form id="loginForm" class="login-form" aria-label="Formulario de inicio de sesión">
      <div class="login-input-wrapper">
        <i class="fas fa-user" aria-hidden="true"></i>
        <input id="username" name="username" type="text" placeholder="Usuario" required autocomplete="username" />
      </div>
      <div class="login-input-wrapper">
        <i class="fas fa-lock" aria-hidden="true"></i>
        <input id="password" name="password" type="password" placeholder="Contraseña" required autocomplete="current-password" />
      </div>
      <button type="submit">
        <i class="fas fa-sign-in-alt" aria-hidden="true"></i> Entrar
      </button>
    </form>

    <!-- Enlace de recuperación de contraseña -->
    <div class="centrado" style="margin-top: 1rem;">
      <a href="#" tabindex="0">¿Olvidaste tu contraseña?</a>
    </div>
  </div>
`,

// ==================================================
// Sección: Contacto
// ==================================================
contacto: `
  <section class="contacto-seccion">
    <!-- Título principal de la sección de contacto -->
    <h2 class="titulo-contacto">📬 Contáctanos</h2>
    <!-- Subtítulo que invita al usuario a comunicarse -->
    <p class="subtitulo-contacto">Estamos aquí para resolver tus dudas y recibir tus comentarios</p>

    <!-- Contenedor de tarjetas de información de contacto -->
    <div class="tarjetas-contacto">
      
      <!-- Tarjeta 1: Teléfono de contacto -->
      <div class="tarjeta-contacto">
        <i class="fas fa-phone icono-contacto"></i> <!-- Icono decorativo -->
        <h3>Teléfono</h3>
        <p>348 783 6090</p> <!-- Número de contacto -->
      </div>

      <!-- Tarjeta 2: Dirección física -->
      <div class="tarjeta-contacto">
        <i class="fas fa-map-marker-alt icono-contacto"></i> <!-- Icono decorativo -->
        <h3>Dirección</h3>
        <p>C. Felipe Ángeles 24,<br> Arandas, Jalisco</p> <!-- Dirección con salto de línea -->
      </div>

      <!-- Tarjeta 3: Correo electrónico -->
      <div class="tarjeta-contacto">
        <i class="fas fa-envelope icono-contacto"></i> <!-- Icono decorativo -->
        <h3>Correo</h3>
        <p>
          <a href="mailto:tecnica.arandas101@gmail.com">
            tecnica.arandas101@gmail.com
          </a> <!-- Enlace directo para enviar correo -->
        </p>
      </div>
    </div>

    <!-- Sección para mostrar la ubicación en el mapa -->
    <h2 class="titulo-contacto">📍 Ubicación en el Mapa</h2>
    <div class="mapa-contenedor" id="mapa-contenedor">
      <img 
        src="./IMG/Ubicacion.png" 
        alt="Mapa estático de la ubicación" 
        id="mapa-estatico" 
        class="mapa-img" 
      /> <!-- Imagen representativa del mapa -->
    </div>
  </section>
`
};