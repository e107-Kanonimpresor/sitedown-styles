<?php
/*
 * Sitedown Styles Plugin - Spanish Language File
 *
 * Secciones (en orden):
 *   1. Metadatos del plugin
 *   2. Menú admin
 *   3. Preferencias admin (labels, helps, pestañas)
 *   4. Descripciones de plantillas
 *   5. Acciones / mensajes admin
 *   6. Cadenas compartidas front-end (LAN_SITEDOWN_*, LAN_* genéricos)
 *   7. Etiquetas compartidas front-end (LAN_PLUGIN_SITEDOWN_STYLES_LBL_*)
 *   8. Texto por plantilla (LAN_PLUGIN_SITEDOWN_STYLES_TPL_<ESTILO>_*)
 *  10. Widget de ayuda lateral + página Acerca de
 *
 * NOTA: la sección 9 ("Guía de Usuario integrada") se extrajo en v2.1.0 a
 * languages/Spanish/Spanish_admin_help.php — cargada de forma perezosa por
 * guidePage() vía e107::lan('sitedown_styles', 'admin_help', true).
 * Ver docs/architecture/USER_GUIDE_PATTERN.md.
 *
 * @package     sitedown_styles
 * @version     2.1.0
 */

// ─────────────────────────────────────────────────────────────────────────────
// 1. Metadatos del plugin
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SITEDOWN_STYLES_NAME',                        'Estilos de Mantenimiento');
define('LAN_PLUGIN_SITEDOWN_STYLES_SUMMARY',                     'Plantillas profesionales para páginas de mantenimiento');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESCRIPTION',                 'Una colección de 8 plantillas profesionales para páginas de mantenimiento con Bootstrap 5.');
define('LAN_PLUGIN_SITEDOWN_STYLES_ADMIN',                       'Configurar plantillas de mantenimiento');
define('LAN_PLUGIN_SITEDOWN_STYLES_INSTALLED',                   '¡Plugin Sitedown Styles instalado correctamente!');

// ─────────────────────────────────────────────────────────────────────────────
// 2. Menú admin
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SITEDOWN_STYLES_TEMPLATES',                   'Plantillas');
define('LAN_PLUGIN_SITEDOWN_STYLES_PREVIEW',                     'Vista Previa');
define('LAN_PLUGIN_SITEDOWN_STYLES_MAINTENANCE',                 'Modo Mantenimiento');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE',                       'Guía de Usuario');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY',                        'Editor de textos');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_INTRO',                  'Personaliza los textos visibles (etiquetas, titulares, servicios, etc.) de cada skin. Deja un campo vacío para volver al texto por defecto del archivo de idioma.');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_FIELD',                  'Campo');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_DEFAULT',                'Valor por defecto');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_OVERRIDE',               'Texto personalizado');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_SAVE',                   'Guardar textos');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_SAVED',                  'Textos guardados.');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_NOCHANGE',               'No hay cambios.');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_NONE',                   'Esta skin no tiene textos editables.');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_LANG',                   'Editando idioma:');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_LANG_HINT',              'Los valores vacíos se resuelven en este orden: idioma actual → idioma por defecto del sitio → primera traducción disponible → texto por defecto del plugin.');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_LANG_COL',               'Traducciones');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_NO_TRANSLATION',         '(sin traducción todavía)');

// ─────────────────────────────────────────────────────────────────────────────
// 3. Preferencias admin
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SITEDOWN_STYLES_ACTIVE',                      'Plantilla Activa');
define('LAN_PLUGIN_SITEDOWN_STYLES_TITLE',                       'Título Personalizado');
define('LAN_PLUGIN_SITEDOWN_STYLES_TITLE_HELP',                  'Dejar vacío para usar el título por defecto');
define('LAN_PLUGIN_SITEDOWN_STYLES_SUBTITLE',                    'Mensaje Personalizado');
define('LAN_PLUGIN_SITEDOWN_STYLES_SUBTITLE_HELP',               'Dejar vacío para usar el mensaje de las preferencias del sitio');
define('LAN_PLUGIN_SITEDOWN_STYLES_LOGO',                        'Imagen del Logo');
define('LAN_PLUGIN_SITEDOWN_STYLES_LOGO_HELP',                   'Seleccionar un logo para mostrar en la página de mantenimiento');
define('LAN_PLUGIN_SITEDOWN_STYLES_COUNTDOWN',                   'Activar Cuenta Regresiva');
define('LAN_PLUGIN_SITEDOWN_STYLES_COUNTDOWN_DATE',              'Fecha de Lanzamiento');
define('LAN_PLUGIN_SITEDOWN_STYLES_PROGRESS',                    'Mostrar Barra de Progreso');
define('LAN_PLUGIN_SITEDOWN_STYLES_PROGRESS_VALUE',              'Porcentaje de Progreso');
define('LAN_PLUGIN_SITEDOWN_STYLES_NEWSLETTER',                  'Activar Formulario Newsletter');
define('LAN_PLUGIN_SITEDOWN_STYLES_SOCIAL',                      'Mostrar Redes Sociales');
define('LAN_PLUGIN_SITEDOWN_STYLES_PHONE',                       'Teléfono de Contacto');
define('LAN_PLUGIN_SITEDOWN_STYLES_EMAIL',                       'Email de Contacto');

// Pestañas de preferencias
define('LAN_PLUGIN_SITEDOWN_STYLES_TAB_TEMPLATE',                'Plantilla');
define('LAN_PLUGIN_SITEDOWN_STYLES_TAB_CONTENT',                 'Contenido');
define('LAN_PLUGIN_SITEDOWN_STYLES_TAB_COUNTDOWN',               'Cuenta Regresiva');
define('LAN_PLUGIN_SITEDOWN_STYLES_TAB_SOCIAL',                  'Social y Newsletter');
define('LAN_PLUGIN_SITEDOWN_STYLES_TAB_CONTACT',                 'Contacto');

// ─────────────────────────────────────────────────────────────────────────────
// 4. Descripciones de plantillas
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_AGENCY',                 'Elegante diseño glassmorphism perfecto para agencias digitales y startups tecnológicas.');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_BUSINESS',               'Diseño corporativo profesional ideal para servicios B2B y consultorías.');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_CONSTRUCTION',           'Diseño industrial con franjas de advertencia para empresas de construcción.');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_CREATIVE',               'Diseño artístico vibrante con animaciones para diseñadores y estudios creativos.');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_GARDENING',              'Diseño natural orgánico con elementos botánicos para jardineros y paisajistas.');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_HANDYMAN',               'Diseño práctico funcional con contacto de emergencia para servicios de reparación.');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_MARKETING',              'Diseño dinámico tech con vista de dashboard para agencias de marketing.');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_RESTAURANT',             'Diseño elegante y cálido con tipografía refinada para restaurantes y cafeterías.');

// ─────────────────────────────────────────────────────────────────────────────
// 5. Acciones / mensajes admin
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SITEDOWN_STYLES_SAVE_SELECTION',              'Guardar Selección');
define('LAN_PLUGIN_SITEDOWN_STYLES_SAVED',                       '¡Selección de plantilla guardada correctamente!');
define('LAN_PLUGIN_SITEDOWN_STYLES_PREVIEW_DESC',                'Vista previa de cómo verán los visitantes la página de mantenimiento.');
define('LAN_PLUGIN_SITEDOWN_STYLES_OPEN_FULLSCREEN',             'Abrir en Pantalla Completa');
define('LAN_PLUGIN_SITEDOWN_STYLES_PREVIEW_BADGE',               'VISTA PREVIA');

// ─────────────────────────────────────────────────────────────────────────────
// 6. Cadenas compartidas front-end (unidades countdown, copy genérico)
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_SITEDOWN_TITLE',                                     'Sitio en Mantenimiento');
define('LAN_SITEDOWN_MSG',                                       'Estamos realizando tareas de mantenimiento programadas. Volveremos a estar en línea pronto.');
define('LAN_SITEDOWN_NOTIFY',                                    'Recibe una notificación cuando volvamos');
define('LAN_DAYS',                                               'Días');
define('LAN_HOURS',                                              'Horas');
define('LAN_MINUTES',                                            'Min');
define('LAN_SECONDS',                                            'Seg');
define('LAN_PROGRESS',                                           'Progreso');
define('LAN_NOTIFY_ME',                                          'Notificarme');
define('LAN_SUBSCRIBED',                                         '¡Suscrito!');
define('LAN_EMAIL',                                              'Tu email');
define('LAN_ACTIVE',                                             'Activo');

// ─────────────────────────────────────────────────────────────────────────────
// 7. Etiquetas compartidas front-end (varias plantillas)
//    Resueltas como placeholders {SITEDOWN_STYLES_LBL_*}.
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SITEDOWN_STYLES_LBL_PHONE',                   'Teléfono');
define('LAN_PLUGIN_SITEDOWN_STYLES_LBL_EMAIL',                   'Email');
define('LAN_PLUGIN_SITEDOWN_STYLES_LBL_EMAIL_PH',                'Introduce tu email');
define('LAN_PLUGIN_SITEDOWN_STYLES_LBL_RESERVE',                 'Reservar');
define('LAN_PLUGIN_SITEDOWN_STYLES_LBL_REGISTERED',              '¡Registrado!');
define('LAN_PLUGIN_SITEDOWN_STYLES_LBL_THANKS',                  '¡Gracias!');

// ─────────────────────────────────────────────────────────────────────────────
// 8. Texto por plantilla (cadenas de marketing visibles, por slug)
//    Resueltas como placeholders {SITEDOWN_STYLES_TPL_*} por getTplCopy($style).
// ─────────────────────────────────────────────────────────────────────────────

// 8.1 Agency
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_AGENCY_BADGE',            'Modo Mantenimiento');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_AGENCY_HEAD1',            'Estamos creando');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_AGENCY_HEAD2',            'algo increíble');

// 8.2 Business
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_BUSINESS_BADGE',          'Mantenimiento Programado');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_BUSINESS_HEAD1',          'Volveremos');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_BUSINESS_HEAD2',          'muy pronto');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_BUSINESS_CDLABEL',        'Tiempo estimado restante');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_BUSINESS_BRAND',          'Estamos actualizando nuestros sistemas para servirte mejor. Gracias por tu paciencia.');

// 8.3 Construction
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_BADGE',      'En Construcción');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_HEAD1',      'CONSTRUYENDO');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_HEAD2',      'ALGO');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_HEAD3',      'MEJOR');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_CDLABEL',    'LANZAMIENTO EN');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_SVC1',       'Construcción');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_SVC2',       'Reformas');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_SVC3',       'Diseño');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_SVC4',       'Mantenimiento');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_EMERG',      'Emergencias 24/7');

// 8.4 Creative
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CREATIVE_HEAD1',          'CREANDO');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CREATIVE_HEAD2',          'ALGO');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CREATIVE_HEAD3',          'INCREÍBLE');

// 8.5 Gardening
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_BADGE',         'Cultivando algo nuevo');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_HEAD1',         'Nuestro jardín');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_HEAD2',         'florecerá pronto');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_CDLABEL',       '— Apertura en —');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_SVC1',          'Jardinería');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_SVC2',          'Paisajismo');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_SVC3',          'Riego');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_SVC4',          'Mantenimiento');

// 8.6 Handyman
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_BADGE',          'Emergencias 24/7');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_EMERG_TITLE',    '¿Necesitas ayuda urgente?');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_EMERG_TEXT',     'Nuestra web está en mantenimiento, pero los servicios de emergencia siguen disponibles. No dudes en llamarnos para cualquier reparación urgente.');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_CALL',           'Llámanos ahora');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_AVAIL',          'Disponible 24 horas');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_STATUS',         'Mantenimiento en curso');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_HEAD1',          'Estamos arreglando');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_HEAD2',          'todo a punto');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_CDLABEL',        'Tiempo estimado restante');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_SVC1',           'Electricidad');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_SVC2',           'Fontanería');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_SVC3',           'Cerrajería');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_SVC4',           'Climatización');

// 8.7 Marketing
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_BADGE',         'Optimización en curso');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_HEAD1',         'Escalando nuestra');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_HEAD2',         'infraestructura digital');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_M1',            'Disponibilidad');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_M2',            'Más rápido');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_M3',            'Funciones nuevas');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_DASH_TITLE',    'Panel de control');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_DASH_BADGE',    'En desarrollo');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_CDLABEL',       'Lanzamiento en');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_CHART',         'Rendimiento esperado');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_S1',            'Optimizado');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_S2',            'Mejorado');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_S3',            'Actualizado');

// 8.8 Restaurant
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_TAGLINE',      'Experiencia de alta cocina');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_BADGE',        'Renovando el restaurante');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_HEAD1',        'Estamos preparando una');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_HEAD2',        'nueva experiencia gastronómica');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_CDLABEL',      '— Reapertura en —');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_NL_TITLE',     'Sé el primero en conocer nuestra nueva carta');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_INFO1',        'Reservas');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_INFO2',        'Ubicación');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_INFO3',        'Horario');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_HOURS_VAL',    '13:00 - 23:00');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_QUOTE',        '«La buena comida es la base de la felicidad.»');

// ─────────────────────────────────────────────────────────────────────────
// 10. Widget de ayuda lateral + página Acerca de (info / contacto / soporte)
// ─────────────────────────────────────────────────────────────────────────

// Menú / título de página
define('LAN_PLUGIN_SITEDOWN_STYLES_ABOUT',                  'Acerca de');

// Widget de ayuda lateral
define('LAN_PLUGIN_SITEDOWN_STYLES_HELP_CAPTION',           'Acerca de este plugin');
define('LAN_PLUGIN_SITEDOWN_STYLES_HELP_TAGLINE',           '8 plantillas profesionales Bootstrap 5 para páginas de mantenimiento, con editor de textos multilingüe y guía de usuario integrada.');
define('LAN_PLUGIN_SITEDOWN_STYLES_HELP_TIP',               'Sugerencia: instala el stub del tema una sola vez y cambia de plantilla cuando quieras — sin tocar código.');
define('LAN_PLUGIN_SITEDOWN_STYLES_HELP_MORE',              'Más información y soporte');

// Etiquetas de botones compartidas (sidebar + Acerca de)
define('LAN_PLUGIN_SITEDOWN_STYLES_BTN_DOCS',               'Documentación');
define('LAN_PLUGIN_SITEDOWN_STYLES_BTN_SUPPORT',            'Soporte');
define('LAN_PLUGIN_SITEDOWN_STYLES_BTN_DONATE',             'Donar');

// Secciones de la página Acerca de — MIGRADAS a
// languages/<Lang>/<Lang>_admin_about.php (patrón 4 capas, carga perezosa
// desde aboutPage()). Las constantes LAN_PLUGIN_SITEDOWN_STYLES_ABOUT_*
// que estaban aquí ya no son referenciadas por ningún código del plugin
// y se han eliminado. Ver docs/architecture/USER_GUIDE_PATTERN.md.
