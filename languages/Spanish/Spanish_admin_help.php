<?php
/*
 * Sitedown Styles — In-Admin User Guide language file (Spanish).
 *
 * Loaded LAZILY by admin_config.php::guidePage() via:
 *   e107::lan('sitedown_styles', 'admin_help', true);
 *
 * Resolves to:  languages/Spanish/Spanish_admin_help.php
 *
 * Convention: every constant is named LAN_PLUGIN_SS_HELP_<SECTION>_<KEY>.
 * Strings contain ONLY plain text + inline <code>/<strong>/<em>/HTML entities.
 * Structural HTML belongs in templates/sitedown_styles_guide_template.php.
 *
 * See docs/architecture/USER_GUIDE_PATTERN.md for the full rationale.
 *
 * @package     sitedown_styles
 * @version     2.1.0
 */

if (!defined('e107_INIT')) { exit; }

// ─────────────────────────────────────────────────────────────────────────────
// 9. Guía de Usuario integrada
// ─────────────────────────────────────────────────────────────────────────────

// 9.1 Etiquetas de pestañas
define('LAN_PLUGIN_SS_HELP_TAB_OVERVIEW',          'Visión general');
define('LAN_PLUGIN_SS_HELP_TAB_INSTALL',           'Instalación');
define('LAN_PLUGIN_SS_HELP_TAB_CONFIG',            'Configuración');
define('LAN_PLUGIN_SS_HELP_TAB_ACTIVATION',        'Activación');
define('LAN_PLUGIN_SS_HELP_TAB_SHORTCODES',        'Placeholders');
define('LAN_PLUGIN_SS_HELP_TAB_TROUBLESHOOT',      'Solución de problemas');
define('LAN_PLUGIN_SS_HELP_TAB_CREDITS',           'Créditos');

// 9.1.1 Tarjeta de introducción
define('LAN_PLUGIN_SS_HELP_INTRO_TITLE',           'Bienvenido a la Guía de Usuario');
define('LAN_PLUGIN_SS_HELP_INTRO_TEXT',            'Todo lo que necesitas para instalar, configurar y resolver problemas de Sitedown Styles. Navega por las pestañas — el contenido se actualiza automáticamente con tu idioma de administración.');

// 9.2 Pestaña Visión general
define('LAN_PLUGIN_SS_HELP_OVERVIEW_TITLE',        'Visión general');
define('LAN_PLUGIN_SS_HELP_OVERVIEW_P1',           'Sitedown Styles sustituye la página de mantenimiento por defecto de e107 con una de 8 plantillas Bootstrap 5 orientadas a distintos sectores de negocio.');
define('LAN_PLUGIN_SS_HELP_OVERVIEW_TIP',          'Las plantillas son HTML/CSS puros con estilos embebidos — sin paso de build.');
define('LAN_PLUGIN_SS_HELP_OVERVIEW_WARN',         'Instalar el plugin NO es suficiente: también debes copiar el stub de integración del tema (ver pestaña Instalación).');

// 9.3 Pestaña Instalación
define('LAN_PLUGIN_SS_HELP_INSTALL_TITLE',         'Instalación');
define('LAN_PLUGIN_SS_HELP_INSTALL_S1',            'Instala el plugin desde Admin → Gestor de Plugins.');
define('LAN_PLUGIN_SS_HELP_INSTALL_S2',            'Copia <code>e107_plugins/sitedown_styles/theme_integration/sitedown_template.php</code> a tu tema activo en <code>e107_themes/&lt;tu_tema&gt;/templates/sitedown_template.php</code>.');
define('LAN_PLUGIN_SS_HELP_INSTALL_S3',            'Abre la pestaña Plantillas y elige un estilo.');
define('LAN_PLUGIN_SS_HELP_INSTALL_S4',            'Configura contenido, cuenta regresiva, redes sociales y contacto en la pestaña Preferencias.');
define('LAN_PLUGIN_SS_HELP_INSTALL_S5',            'Activa el Modo Mantenimiento en Admin → Usuarios → Mantenimiento de Usuarios e Invitados (o /e107_admin/ugflag.php).');
define('LAN_PLUGIN_SS_HELP_INSTALL_NOTE',          'El Admin Principal (perm 0) ve la página de mantenimiento directamente en /sitedown.php aunque el flag esté en OFF — útil para previsualizar en producción.');

// 9.3.1 Pestaña Instalación — Integración en el tema paso a paso (usuarios no técnicos)
define('LAN_PLUGIN_SS_HELP_THEME_TITLE',           'Integración en el tema paso a paso');
define('LAN_PLUGIN_SS_HELP_THEME_INTRO',           'Sitedown Styles necesita <strong>UN</strong> pequeño archivo copiado dentro de tu tema activo. Este puente le indica a e107 que renderice la página de mantenimiento usando una de las 8 plantillas de este plugin en vez de la página por defecto. <em>Sin este paso las plantillas no aparecerán, por más que las previsualices.</em>');
define('LAN_PLUGIN_SS_HELP_THEME_FILE_HEADING',    'El archivo que tienes que copiar');
define('LAN_PLUGIN_SS_HELP_THEME_FILE_DESC',       'Ya viene con este plugin — <strong>NO</strong> tienes que escribir ni descargar nada. Solo copia este archivo exacto:');
define('LAN_PLUGIN_SS_HELP_THEME_FILE_LOCATION_LABEL', 'Ubicación de origen (relativa a la raíz de tu e107):');
define('LAN_PLUGIN_SS_HELP_THEME_TARGET_HEADING',  'Dónde tienes que copiarlo');
define('LAN_PLUGIN_SS_HELP_THEME_TARGET_DESC',     'Pega el archivo dentro de la carpeta <code>templates</code> de tu tema activo:');
define('LAN_PLUGIN_SS_HELP_THEME_TARGET_HINT',     'Si la carpeta <code>templates</code> no existe, créala. Mantén el nombre del archivo exactamente como <code>sitedown_template.php</code>.');
define('LAN_PLUGIN_SS_HELP_THEME_FIND_THEME',      '¿No sabes qué tema está activo? Mira en Admin → Temas — el activo tiene una etiqueta verde.');
define('LAN_PLUGIN_SS_HELP_THEME_METHODS_TITLE',   'Tres formas de copiar el archivo');
define('LAN_PLUGIN_SS_HELP_THEME_METHODS_INTRO',   'Elige el método que se ajuste al acceso que tengas a tu hosting:');
// Método 1 — FTP / SFTP
define('LAN_PLUGIN_SS_HELP_THEME_M1_TITLE',        'Método 1 — Cliente FTP / SFTP (FileZilla, WinSCP, Cyberduck…)');
define('LAN_PLUGIN_SS_HELP_THEME_M1_S1',           'Conéctate a tu hosting con tus credenciales de FTP.');
define('LAN_PLUGIN_SS_HELP_THEME_M1_S2',           'Navega a <code>e107_plugins/sitedown_styles/theme_integration/</code>, haz clic derecho en <code>sitedown_template.php</code> y elige <strong>Descargar</strong>.');
define('LAN_PLUGIN_SS_HELP_THEME_M1_S3',           'Navega a <code>e107_themes/&lt;tu_tema&gt;/templates/</code> (crea la carpeta <code>templates</code> si no existe).');
define('LAN_PLUGIN_SS_HELP_THEME_M1_S4',           'Arrastra el archivo desde tu ordenador hasta esa carpeta. Listo.');
// Método 2 — Administrador de archivos
define('LAN_PLUGIN_SS_HELP_THEME_M2_TITLE',        'Método 2 — Administrador de archivos del hosting (cPanel, Plesk, Hostinger, etc.)');
define('LAN_PLUGIN_SS_HELP_THEME_M2_S1',           'Inicia sesión en el panel de control de tu hosting y abre el Administrador de archivos.');
define('LAN_PLUGIN_SS_HELP_THEME_M2_S2',           'Ve a <code>e107_plugins/sitedown_styles/theme_integration/</code>, selecciona <code>sitedown_template.php</code> y pulsa <strong>Copiar</strong>.');
define('LAN_PLUGIN_SS_HELP_THEME_M2_S3',           'Indica como destino <code>e107_themes/&lt;tu_tema&gt;/templates/</code> (crea la carpeta si no existe) y confirma.');
define('LAN_PLUGIN_SS_HELP_THEME_M2_S4',           'Asegúrate de que el archivo en el destino se llame exactamente <code>sitedown_template.php</code> (sin <code>(1)</code>, sin <code>.txt</code>).');
// Método 3 — Línea de comandos
define('LAN_PLUGIN_SS_HELP_THEME_M3_TITLE',        'Método 3 — Línea de comandos (SSH, usuarios avanzados)');
define('LAN_PLUGIN_SS_HELP_THEME_M3_DESC',         'Desde el directorio raíz de tu e107:');
// Verificación
define('LAN_PLUGIN_SS_HELP_THEME_VERIFY_TITLE',    'Cómo verificar que la integración funciona');
define('LAN_PLUGIN_SS_HELP_THEME_VERIFY_S1',       'Abre la pestaña <strong>Vista previa</strong> de este plugin y elige cualquier plantilla — siempre funciona porque la Vista previa salta el stub del tema.');
define('LAN_PLUGIN_SS_HELP_THEME_VERIFY_S2',       'Estando logueado como Admin Principal, abre <code>/sitedown.php</code> directamente. Si ves la plantilla elegida en lugar de la página de mantenimiento por defecto de e107, el stub está bien instalado.');
define('LAN_PLUGIN_SS_HELP_THEME_VERIFY_S3',       'Si sigues viendo la página por defecto, comprueba que el archivo está en <code>e107_themes/&lt;tu_tema&gt;/templates/sitedown_template.php</code> con ese nombre exacto.');
// Aviso + truco
define('LAN_PLUGIN_SS_HELP_THEME_WARN_LABEL',      'Atención:');
define('LAN_PLUGIN_SS_HELP_THEME_WARN',            'si más adelante cambias a otro tema, repite este paso en el tema nuevo. El stub vive dentro del tema — no es global.');
define('LAN_PLUGIN_SS_HELP_THEME_TIP_LABEL',       'Buena noticia:');
define('LAN_PLUGIN_SS_HELP_THEME_TIP',             'solo instalas este stub una vez por tema. Después, cambiar de plantilla es un clic en la pestaña Plantillas — sin tener que copiar archivos.');

// 9.4 Pestaña Configuración
define('LAN_PLUGIN_SS_HELP_CONFIG_TITLE',          'Referencia de configuración');
define('LAN_PLUGIN_SS_HELP_TBL_TAB',               'Pestaña');
define('LAN_PLUGIN_SS_HELP_TBL_PREF',              'Preferencia');
define('LAN_PLUGIN_SS_HELP_TBL_PURPOSE',           'Propósito');
define('LAN_PLUGIN_SS_HELP_CONFIG_STYLE',          'Slug de la plantilla activa.');
define('LAN_PLUGIN_SS_HELP_CONFIG_CONTENT',        'Sobrescribe título, mensaje y logo por defecto.');
define('LAN_PLUGIN_SS_HELP_CONFIG_COUNTDOWN',      'Activa cuenta regresiva al lanzamiento y barra de progreso.');
define('LAN_PLUGIN_SS_HELP_CONFIG_SOCIAL',         'Muestra iconos sociales y formulario de captura de email.');
define('LAN_PLUGIN_SS_HELP_CONFIG_CONTACT',        'Información de contacto de emergencia.');
define('LAN_PLUGIN_SS_HELP_CONFIG_NOTE',           "Todas las preferencias se persisten vía <code>e107::getPlugConfig('sitedown_styles')</code>.");

// 9.4.1 Pestaña Configuración — sección Textos (Editor de copia)
define('LAN_PLUGIN_SS_HELP_TEXTS_TITLE',           'Personalizar los textos visibles (pestaña Textos)');
define('LAN_PLUGIN_SS_HELP_TEXTS_INTRO',           'La pestaña <strong>Textos</strong> (también conocida como Editor de copia) permite reemplazar los textos de la página de mantenimiento — título, subtítulo, llamada a la acción, pie, etc. — sin tocar archivos PHP ni archivos de idioma. Cada una de las 8 plantillas tiene su propio conjunto de campos, así que puedes adaptar el texto a cada nicho de negocio.');
define('LAN_PLUGIN_SS_HELP_TEXTS_S1',              'Abre <strong>Admin → Sitedown Styles → Textos</strong>.');
define('LAN_PLUGIN_SS_HELP_TEXTS_S2',              'Selecciona una plantilla en el selector superior (cada plantilla guarda sus propios reemplazos).');
define('LAN_PLUGIN_SS_HELP_TEXTS_S3',              'Edita cualquier campo. <em>Si lo dejas vacío, se usa el valor por defecto del archivo de idioma activo.</em>');
define('LAN_PLUGIN_SS_HELP_TEXTS_S4',              'Guarda. Los valores se almacenan como preferencias <code>sitedown_copy_&lt;estilo&gt;_&lt;campo&gt;</code> — el código del plugin no se modifica nunca.');
define('LAN_PLUGIN_SS_HELP_TEXTS_NOTE',            'Usa la pestaña <strong>Vista previa</strong> para ver los cambios al instante. Los valores por defecto viven en los archivos de idioma (<code>LAN_PLUGIN_SITEDOWN_STYLES_COPY_*</code>), de modo que siempre puedes restaurar dejando el campo vacío.');

// 9.4.2 Pestaña Configuración — sección Contenido multilingüe
define('LAN_PLUGIN_SS_HELP_LANG_TITLE',            'Contenido multilingüe');
define('LAN_PLUGIN_SS_HELP_LANG_INTRO',            'El plugin incluye tres idiomas: <strong>inglés</strong>, <strong>español</strong> y <strong>portugués (PT-PT)</strong>. Todas las etiquetas de admin, los textos por defecto de las plantillas y la propia página de mantenimiento están traducidos.');
define('LAN_PLUGIN_SS_HELP_LANG_TIP_LABEL',        'Truco:');
define('LAN_PLUGIN_SS_HELP_LANG_TIP',              'para cambiar los textos visibles a otro idioma incluido, simplemente cambia el <strong>idioma del Admin</strong> con el selector de idioma de la esquina superior derecha del área de administración de e107. El plugin carga el archivo de idioma correspondiente automáticamente — tanto la pestaña Textos como la página de mantenimiento generada lo usan. Sin tocar código, sin migraciones.');
define('LAN_PLUGIN_SS_HELP_LANG_OVERRIDE',         'Importante: cualquier valor que pongas en la pestaña Textos es un <strong>reemplazo permanente</strong> y se aplica sin importar el idioma activo. Vacía el campo para volver al valor traducido del idioma actual.');
define('LAN_PLUGIN_SS_HELP_LANG_ADD_TITLE',        'Para añadir un nuevo idioma:');
define('LAN_PLUGIN_SS_HELP_LANG_ADD',              'duplica la carpeta <code>languages/English/</code>, renómbrala con el nombre de tu idioma (p. ej. <code>French</code>), traduce los tres archivos (<code>French_admin.php</code>, <code>French_front.php</code>, <code>French_global.php</code>) y el nuevo idioma estará disponible al instante.');

// 9.4.3 Pestaña Configuración — alerta de buenas prácticas
define('LAN_PLUGIN_SS_HELP_CFG_BEST_TITLE',        'Buenas prácticas');
define('LAN_PLUGIN_SS_HELP_CFG_BEST_1',            'Usa siempre la pestaña <strong>Vista previa</strong> antes de activar el modo mantenimiento en producción.');
define('LAN_PLUGIN_SS_HELP_CFG_BEST_2',            'Configura una <strong>fecha de cuenta atrás</strong> realista en UTC. El script del frontend la convierte automáticamente a la hora local del visitante.');
define('LAN_PLUGIN_SS_HELP_CFG_BEST_3',            'Para una marca corporativa coherente, sube tu logo en el campo <strong>URL de logo personalizado</strong> — sustituye al nombre del sitio en todas las plantillas.');
define('LAN_PLUGIN_SS_HELP_CFG_BEST_4',            'Sube la preferencia <code>sitedown_css_version</code> cada vez que edites un CSS de plantilla en producción — los visitantes recibirán la hoja de estilos nueva en lugar de la versión cacheada.');

// 9.5 Pestaña Activación
define('LAN_PLUGIN_SS_HELP_ACTIV_TITLE',           'Activar el modo mantenimiento');
define('LAN_PLUGIN_SS_HELP_ACTIV_INTRO',           'El plugin solo renderiza la página; el flag de mantenimiento es una preferencia del core.');
define('LAN_PLUGIN_SS_HELP_ACTIV_S1',              'Ve a <code>/e107_admin/ugflag.php</code> (o Admin → Usuarios → Mantenimiento de Usuarios e Invitados).');
define('LAN_PLUGIN_SS_HELP_ACTIV_S2',              'Pon <strong>Modo Mantenimiento</strong> en ON y guarda.');
define('LAN_PLUGIN_SS_HELP_ACTIV_S3',              'Abre el sitio en una ventana de incógnito — toda URL devuelve HTTP 503 con tu plantilla.');
define('LAN_PLUGIN_SS_HELP_ACTIV_BYPASS',          'Truco: el Admin Principal siempre bypasea el flag. Usa otro navegador/incógnito para probar como visitante.');

// 9.6 Pestaña Placeholders
define('LAN_PLUGIN_SS_HELP_SC_TITLE',              'Placeholders disponibles');
define('LAN_PLUGIN_SS_HELP_SC_INTRO',              'Coexisten dos capas de placeholders a propósito — mantenlas distintas al crear plantillas personalizadas.');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN',             'Capa del plugin (resuelta por str_replace en e_sitedown.php)');
define('LAN_PLUGIN_SS_HELP_SC_CORE',               'Capa del core (resuelta por parseTemplate + batch sitedown_shortcodes)');
define('LAN_PLUGIN_SS_HELP_SC_DUAL',               'Al añadir un nuevo placeholder <code>{SS_*}</code> DEBES actualizar tanto la plantilla maestra (<code>templates/sitedown_styles_template.php</code>) COMO el mapa de variables en <code>e_sitedown.php::buildVars()</code>, o se renderizará literal en la página.');

// 9.7 Pestaña Solución de problemas
define('LAN_PLUGIN_SS_HELP_TS_TITLE',              'Solución de problemas');
define('LAN_PLUGIN_SS_HELP_TS_Q1',                 'Al cerrar sesión va al home en lugar de la página de mantenimiento');
define('LAN_PLUGIN_SS_HELP_TS_A1',                 '<code>maintainance_flag</code> está en OFF. Actívalo en <code>/e107_admin/ugflag.php</code>. El plugin solo aporta el aspecto, no la activación.');
define('LAN_PLUGIN_SS_HELP_TS_Q2',                 'El mantenimiento muestra la plantilla genérica de e107, no mi estilo');
define('LAN_PLUGIN_SS_HELP_TS_A2',                 'La cascada es THEME/templates/sitedown_template.php → THEME/sitedown_template.php → e_CORE/templates/sitedown_template.php. Copia el stub de integración a tu tema (ver pestaña Instalación) para que gane.');
define('LAN_PLUGIN_SS_HELP_TS_Q3',                 'La pestaña Preferencias no guarda nada');
define('LAN_PLUGIN_SS_HELP_TS_A3',                 'Confirma que la clave del menú es <code>main/prefs</code> (no <code>main/settings</code>). Solo la acción <code>prefs</code> dispara <code>PrefsObserver/PrefsSaveTrigger</code>.');
define('LAN_PLUGIN_SS_HELP_TS_Q4',                 '404 en /…/fa-paint-brush.glyph tras iniciar sesión');
define('LAN_PLUGIN_SS_HELP_TS_A4',                 '<code>adminLinks</code> en plugin.xml NO soporta sintaxis .glyph — usa rutas reales a PNG bajo <code>images/</code>.');
define('LAN_PLUGIN_SS_HELP_TS_Q5',                 'TypeError al desinstalar el plugin (PHP 8+)');
define('LAN_PLUGIN_SS_HELP_TS_A5',                 'Los nodos XML vacíos (<code>&lt;userClasses&gt;&lt;/userClasses&gt;</code>) se parsean como strings. Elimínalos o rellénalos.');
define('LAN_PLUGIN_SS_HELP_TS_Q6',                 'La cuenta regresiva se queda en 00:00:00 en la página real');
define('LAN_PLUGIN_SS_HELP_TS_A6',                 'Establece la fecha de lanzamiento en Preferencias → Cuenta Regresiva. Un valor vacío solo se rellena con "ahora+7 días" durante la instalación.');

// 9.8 Pestaña de Créditos
define('LAN_PLUGIN_SS_HELP_CREDITS_TITLE',             'Créditos y agradecimientos');
define('LAN_PLUGIN_SS_HELP_CREDITS_INTRO',             'Este plugin no existiría sin el trabajo de la comunidad e107 y del ecosistema de código abierto que se enumera a continuación.');
define('LAN_PLUGIN_SS_HELP_CREDITS_AUTHOR_TITLE',      'Autor');
define('LAN_PLUGIN_SS_HELP_CREDITS_AUTHOR_TEXT',       'Diseñado y mantenido por Martin Costa (Kanonimpresor). Consulta la página <strong>Acerca de</strong> para obtener todos los datos de contacto y enlaces de soporte.');
define('LAN_PLUGIN_SS_HELP_CREDITS_TECH_TITLE',        'Tecnologías utilizadas');
define('LAN_PLUGIN_SS_HELP_CREDITS_TECH_E107',         'Framework de la UI de administración, descubrimiento de plugins, parser y motor de shortcodes.');
define('LAN_PLUGIN_SS_HELP_CREDITS_TECH_BS',           'Las plantillas del frontend usan Bootstrap 5 vía CDN — sin paso de build.');
define('LAN_PLUGIN_SS_HELP_CREDITS_TECH_FA',           'Conjunto de iconos utilizado en toda la UI de administración.');
define('LAN_PLUGIN_SS_HELP_CREDITS_TECH_BI',           'Conjunto de iconos complementario para las plantillas públicas.');
define('LAN_PLUGIN_SS_HELP_CREDITS_THANKS_TITLE',      'Agradecimientos especiales');
define('LAN_PLUGIN_SS_HELP_CREDITS_THANKS_E107TEAM',   'Al equipo central y a los colaboradores de e107 por mantener vivo y bien documentado el CMS.');
define('LAN_PLUGIN_SS_HELP_CREDITS_THANKS_TESTERS',    'A los beta testers que reportaron problemas y ayudaron a mejorar las plantillas.');
define('LAN_PLUGIN_SS_HELP_CREDITS_THANKS_TRANSLATORS','A los traductores que aportaron los paquetes de idioma en español y portugués.');
define('LAN_PLUGIN_SS_HELP_CREDITS_LICENSE',           'Publicado bajo licencia GNU GPLv3+ — libre para usar, modificar y redistribuir.');
define('LAN_PLUGIN_SS_HELP_CREDITS_GETINVOLVED',       '¿Quieres contribuir con una nueva plantilla o traducción? Abre una incidencia o pull request en el repositorio del proyecto (ver la página Acerca de).');


// ─────────────────────────────────────────────────────────────────────────
// 9.b  Guía de Usuario en Admin — añadidos del patrón booking (refactor v2)
// ─────────────────────────────────────────────────────────────────────────

// Etiquetas reutilizables (flujo Quick-start + tarjetas Highlights)
define('LAN_PLUGIN_SS_HELP_LBL_QUICK_START',     'Inicio rápido');
define('LAN_PLUGIN_SS_HELP_LBL_HIGHLIGHTS',      'Destacados');
define('LAN_PLUGIN_SS_HELP_LBL_INSTALL',         'Instalar plugin');
define('LAN_PLUGIN_SS_HELP_LBL_PICK_TPL',        'Elegir plantilla');
define('LAN_PLUGIN_SS_HELP_LBL_CUSTOMIZE',       'Personalizar');
define('LAN_PLUGIN_SS_HELP_LBL_ACTIVATE',        'Activar');
define('LAN_PLUGIN_SS_HELP_LBL_TEMPLATES',       'plantillas');
define('LAN_PLUGIN_SS_HELP_LBL_TEMPLATES_DESC',  'Skins Bootstrap 5 listos para distintos sectores de negocio.');
define('LAN_PLUGIN_SS_HELP_LBL_NO_BUILD',        'Sin paso de build');
define('LAN_PLUGIN_SS_HELP_LBL_THEME_REQ',       'Stub del tema requerido');

// Tabla de configuración — etiquetas de fila (primera columna)
define('LAN_PLUGIN_SS_HELP_TBL_ROW_TPL',         'Plantilla');
define('LAN_PLUGIN_SS_HELP_TBL_ROW_CONTENT',     'Contenido');
define('LAN_PLUGIN_SS_HELP_TBL_ROW_COUNTDOWN',   'Cuenta regresiva');
define('LAN_PLUGIN_SS_HELP_TBL_ROW_SOCIAL',      'Redes sociales');
define('LAN_PLUGIN_SS_HELP_TBL_ROW_CONTACT',     'Contacto');

// Pestaña Placeholders — descripciones capa plugin
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_TITLE_DESC',      'Título personalizado o nombre del sitio por defecto');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_SUBTITLE_DESC',   'Mensaje de mantenimiento personalizado o por defecto');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_LOGO_DESC',       'Imagen del logo (o nombre del sitio como fallback)');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_COUNTDOWN_DESC',  'Marcado de cuenta regresiva (HTML) y script de arranque (JS)');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_PROGRESS_DESC',   'Bloque de barra de progreso basado en las prefs de inicio/fin');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_NEWSLETTER_DESC', 'Formulario de captura del boletín (cuando esté habilitado)');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_SOCIAL_DESC',     'Fila de iconos de redes sociales (Facebook, Twitter, Instagram, …)');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_CONTACT_DESC',    'Teléfono y correo de contacto de emergencia');

// Pestaña Placeholders — descripciones capa core
define('LAN_PLUGIN_SS_HELP_SC_CORE_SITE_DESC',   'Identidad global del sitio (nombre y URL)');
define('LAN_PLUGIN_SS_HELP_SC_CORE_TEXT_DESC',   'Preferencia core <em>maintainance_text</em> (nota: typo histórico)');
define('LAN_PLUGIN_SS_HELP_SC_CORE_PAGE_DESC',   'Título de la página y favicon');
define('LAN_PLUGIN_SS_HELP_SC_CORE_THEME_DESC',  'Helpers del tema (logo, URLs de iconos)');


// ─────────────────────────────────────────────────────────────────────────────
// Cadenas de estado en vivo (consumidas por shortcodes dinámicos sc_ss_help_*)
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SS_HELP_STUB_LIVE_TITLE',     'Estado en vivo en tu tema activo');
define('LAN_PLUGIN_SS_HELP_STUB_OK',             'Stub del tema detectado — integración activa');
define('LAN_PLUGIN_SS_HELP_STUB_MISSING',       'Stub del tema NO instalado — sigue los pasos de arriba');
define('LAN_PLUGIN_SS_HELP_NONE',                'ninguno');
