# Plugin Sitedown Styles para e107

Plantillas profesionales de página de mantenimiento para e107 CMS con 8 diseños únicos para diferentes sectores de negocio.

![Versión](https://img.shields.io/badge/version-2.0.0-blue)
![e107](https://img.shields.io/badge/e107-2.3%2B-green)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-purple)
![Licencia](https://img.shields.io/badge/license-GPL--3.0-orange)

#### Elija su idioma abajo / Choose your language below / Escolha o seu idioma abaixo

[![Language-English](https://img.shields.io/badge/Language-English-blue)](README.md)
[![Language-Português](https://img.shields.io/badge/Language-Português-green)](README.pt-PT.md)
[![Language-Español](https://img.shields.io/badge/Language-Español-red)](README.es-ES.md)

---

## 🎨 Plantillas disponibles

| Plantilla | Estilo | Ideal para |
|-----------|--------|------------|
| **Agency Pro** | Glassmorphism, Dark | Agencias digitales, startups tech |
| **Business Corp** | Profesional, limpio | Servicios B2B, consultorías |
| **BuilderPro** | Industrial, atrevido | Construcción, obras |
| **Creative Studio** | Vibrante, animado | Diseñadores, artistas, estudios creativos |
| **GreenThumb** | Natural, orgánico | Paisajistas, centros de jardinería |
| **FixIt Pro** | Práctico, emergencia | Reparaciones, manitas |
| **Growth Labs** | Dinámico, tech | Agencias de marketing, growth hackers |
| **Gourmet Table** | Elegante, cálido | Restaurantes, cafeterías, bares |

## ✨ Características

- 🎯 **8 plantillas profesionales** — cada una con estética propia
- ⏱️ **Cuenta regresiva** configurable con fecha de lanzamiento
- 📊 **Barra de progreso** para mostrar el avance
- 📧 **Formulario newsletter** para captar emails
- 🔗 **Enlaces a redes sociales**
- 📱 **Totalmente responsive**
- 🎨 **Bootstrap 5** moderno y fiable
- 🔧 **Configuración fácil** con vista previa
- 🌍 **Multiidioma** (Inglés y Español incluidos)
- 📖 **Guía de Usuario integrada en el Admin** con pestañas Bootstrap 5

## 📦 Instalación

### Paso 1: Subir el plugin

1. Descarga el paquete del plugin
2. Extrae a `e107_plugins/sitedown_styles/`
3. Ve a **Admin → Gestor de Plugins**
4. Busca "Sitedown Styles" y haz clic en **Instalar**

### Paso 2: Integración con el tema

> ⚠️ **Obligatorio**: instalar el plugin por sí solo NO engancha la página de mantenimiento. Debes copiar el stub de integración a tu tema activo para que gane la cascada de templates de e107.

Orden de la cascada resuelta por `sitedown.php` (raíz):

1. `THEME/templates/sitedown_template.php` ← **objetivo**
2. `THEME/sitedown_template.php` (legado v1.x)
3. `e_CORE/templates/sitedown_template.php` (fallback básico)

Copia el archivo de integración a tu tema activo:

```bash
# Desde la carpeta del plugin
cp e107_plugins/sitedown_styles/theme_integration/sitedown_template.php \
   e107_themes/TU_TEMA/templates/sitedown_template.php
```

### Paso 3: Configurar

1. Ve a **Admin → Sitedown Styles**
2. Selecciona la plantilla preferida en la pestaña **Plantillas**
3. Configura cuenta regresiva, redes sociales y contacto en **Preferencias**
4. Guarda

## 🎮 Uso

### Activar el modo mantenimiento

1. Ve a **Admin → Usuarios → Mantenimiento de Usuarios e Invitados** (`/e107_admin/ugflag.php`)
2. Pon **Modo Mantenimiento = ON** y guarda
3. Abre el sitio en una ventana de incógnito — toda URL devuelve HTTP 503 con la plantilla seleccionada

> 💡 El Admin Principal (perm `0`) siempre bypasea el flag y puede previsualizar en `/sitedown.php` aunque el mantenimiento esté en OFF.

### Vista previa en el Admin

- Los administradores pueden previsualizar sin activar el mantenimiento
- Visita `/sitedown.php` siendo Admin Principal
- O usa la pestaña **Vista Previa** del plugin
- URL directa por estilo (solo admin): `/e107_plugins/sitedown_styles/preview.php?style=<clave>`

### Guía de Usuario integrada

El plugin incluye una pestaña **Guía de Usuario** dentro del admin (Admin → Sitedown Styles → Guía de Usuario) con secciones: Visión general, Instalación, Configuración, Activación, Placeholders y Solución de problemas. Todos los textos son traducibles vía constantes `LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_*`.

## ⚙️ Opciones de configuración

### Pestaña Plantilla
- Elige entre 8 plantillas profesionales
- Vista previa visual de cada diseño

### Pestaña Contenido
- Título personalizado (opcional)
- Mensaje/subtítulo personalizado
- Subida de logo

### Pestaña Cuenta Regresiva
- Activa/desactiva la cuenta regresiva
- Define fecha y hora de lanzamiento
- Activa/desactiva la barra de progreso
- Establece el porcentaje

### Pestaña Social y Newsletter
- Activa/desactiva el formulario newsletter
- Activa/desactiva los enlaces sociales
- URLs de Facebook, Twitter, Instagram, LinkedIn

### Pestaña Contacto
- Teléfono de emergencia
- Email de contacto

## 📁 Estructura de archivos

```
e107_plugins/sitedown_styles/
├── plugin.xml              # Definición del plugin
├── plugin.php              # Clase principal (install/uninstall)
├── admin_config.php        # Panel de administración
├── e_sitedown.php          # Hook del sitedown
├── preview.php             # Preview por estilo
├── README.md / README.es-ES.md / README.pt-PT.md
├── CHANGELOG.md
├── DIAGNOSTICO_E107_SITEDOWN.md
├── GUIA_DESARROLLO_PLUGINS_E107.md
├── languages/
│   ├── English/English_admin.php
│   └── Spanish/Spanish_admin.php
├── templates/
│   ├── agency_template.php
│   ├── business_template.php
│   ├── construction_template.php
│   ├── creative_template.php
│   ├── gardening_template.php
│   ├── handyman_template.php
│   ├── marketing_template.php
│   └── restaurant_template.php
├── theme_integration/
│   └── sitedown_template.php
└── images/
    └── web-optimization-{16,24,32,64,128,256,512}.png
```

## 🔧 Requisitos

- e107 CMS v2.3.0 o superior
- PHP 7.4 o superior (probado en PHP 8.x)
- MySQL 5.7 o superior

## 🎨 Personalización

### Crear plantillas personalizadas

1. Copia una plantilla existente desde `templates/`
2. Renómbrala a `tunombre_template.php`
3. Modifica el HTML/CSS
4. Añade el slug a la whitelist en `preview.php` y al array de plantillas en `admin_config.php::templatesPage()`

### Placeholders disponibles

Coexisten dos capas — manténlas distintas:

**Capa del plugin** (resuelta por `e_sitedown.php::processTemplate()`):

| Placeholder | Descripción |
|-------------|-------------|
| `{SITEDOWN_STYLES_TITLE}` | Título personalizado o por defecto |
| `{SITEDOWN_STYLES_SUBTITLE}` | Mensaje personalizado o por defecto |
| `{SITEDOWN_STYLES_LOGO}` | HTML del logo o nombre del sitio |
| `{SITEDOWN_STYLES_COUNTDOWN}` / `_JS` | Cuenta regresiva (HTML + JS) |
| `{SITEDOWN_STYLES_PROGRESS}` | Barra de progreso |
| `{SITEDOWN_STYLES_NEWSLETTER}` | Formulario newsletter |
| `{SITEDOWN_STYLES_SOCIAL}` | Iconos sociales |
| `{SITEDOWN_STYLES_PHONE}` / `{SITEDOWN_STYLES_EMAIL}` | Contacto |

**Capa del core** (resuelta por `parseTemplate` + batch `sitedown_shortcodes`):

| Placeholder | Descripción |
|-------------|-------------|
| `{SITENAME}` / `{SITEURL}` | Identidad del sitio |
| `{SITEDOWN_TABLE_MAINTAINANCETEXT}` | Texto del pref core (typo histórico) |
| `{SITEDOWN_TABLE_PAGENAME}` | Título de la página |
| `{SITEDOWN_FAVICON}` | Favicon del tema o raíz |
| `{LOGO: h=180}` / `{XURL_ICONS: …}` | Helpers globales del tema |

> ⚠️ Al añadir un nuevo `{SITEDOWN_STYLES_*}` actualiza **tanto** `e_sitedown.php::processTemplate()` **como** `preview.php::processPreviewTemplate()`, o la página real y la vista previa divergerán.

## 🐛 Solución de problemas

### La plantilla no aparece
1. Verifica que `sitedown_template.php` está en `templates/` de tu tema
2. Comprueba que el plugin está instalado y activo
3. Vacía la caché de e107

### Al cerrar sesión va al home, no a la página de mantenimiento
- El flag `maintainance_flag` está en OFF. Actívalo en `/e107_admin/ugflag.php`.
- El Admin Principal siempre bypasea el flag — pruébalo en incógnito.

### La pestaña Preferencias no guarda los cambios
- La clave del menú admin debe ser `main/prefs`. Otros nombres (p. ej. `main/settings`) saltan los triggers `PrefsObserver`/`PrefsSaveTrigger` del framework y descartan el formulario en silencio.

### 404 en `/…/fa-paint-brush.glyph` tras iniciar sesión
- `adminLinks` en `plugin.xml` NO soporta sintaxis `.glyph`. Usa rutas reales a PNG bajo `images/`.

### Fatal `TypeError: Cannot access offset of type string on string` al desinstalar
- Las etiquetas XML vacías en `plugin.xml` (`<userClasses></userClasses>`, `<dependencies></dependencies>`…) se parsean como `""` en PHP 8+. Elimínalas o rellénalas.

### La cuenta regresiva no funciona
1. Asegúrate de tener JavaScript activado
2. Comprueba que la fecha está configurada en el admin
3. Verifica que la cuenta regresiva está activada

### Los estilos no cargan
1. Comprueba que el CDN de Bootstrap es accesible
2. Mira la consola del navegador por errores de JS
3. Vacía la caché del navegador

## 📄 Licencia

Plugin liberado bajo la GNU General Public License v3.0.

## 👨‍💻 Autor

**Martin Costa — Marketing de Performance**
- Sitio web: [marketingdeperformance.online](https://marketingdeperformance.online)
- Email: info@marketingdeperformance.online

## 🙏 Créditos

- [e107 CMS](https://e107.org) — Sistema de Gestión de Contenidos
- [Bootstrap 5](https://getbootstrap.com) — Framework CSS
- [Bootstrap Icons](https://icons.getbootstrap.com) — Librería de iconos
- [Google Fonts](https://fonts.google.com) — Tipografías

---

Hecho con ❤️ para la comunidad e107
