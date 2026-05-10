# Plugin Sitedown Styles para e107

Modelos profissionais de página de manutenção para e107 CMS com 8 designs únicos para diferentes nichos de negócio.

![Versão](https://img.shields.io/badge/version-1.1-blue)
![e107](https://img.shields.io/badge/e107-2.3%2B-green)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-purple)
![Licença](https://img.shields.io/badge/license-GPL--3.0-orange)

> 🌐 Também disponível em: [English](README.md) · [Español](README.es-ES.md)

## 🎨 Modelos disponíveis

| Modelo | Estilo | Ideal para |
|--------|--------|------------|
| **Agency Pro** | Glassmorphism, Dark | Agências digitais, startups tech |
| **Business Corp** | Profissional, limpo | Serviços B2B, consultorias |
| **BuilderPro** | Industrial, marcante | Construção, obras |
| **Creative Studio** | Vibrante, animado | Designers, artistas, estúdios criativos |
| **GreenThumb** | Natural, orgânico | Paisagistas, centros de jardinagem |
| **FixIt Pro** | Prático, emergência | Reparações, biscates |
| **Growth Labs** | Dinâmico, tech | Agências de marketing, growth hackers |
| **Gourmet Table** | Elegante, acolhedor | Restaurantes, cafés, bares |

## ✨ Características

- 🎯 **8 modelos profissionais** — cada um com estética própria
- ⏱️ **Contagem decrescente** configurável com data de lançamento
- 📊 **Barra de progresso** para mostrar o avanço
- 📧 **Formulário de newsletter** para captar emails
- 🔗 **Ligações a redes sociais**
- 📱 **Totalmente responsivo**
- 🎨 **Bootstrap 5** moderno e fiável
- 🔧 **Configuração fácil** com pré-visualização
- 🌍 **Multilíngue** (Inglês e Espanhol incluídos)
- 📖 **Guia do Utilizador integrado no Admin** com separadores Bootstrap 5

## 📦 Instalação

### Passo 1: Carregar o plugin

1. Descarrega o pacote do plugin
2. Extrai para `e107_plugins/sitedown_styles/`
3. Vai a **Admin → Gestor de Plugins**
4. Procura "Sitedown Styles" e clica em **Instalar**

### Passo 2: Integração com o tema

> ⚠️ **Obrigatório**: instalar o plugin, por si só NÃO liga a página de manutenção. Tens de copiar o stub de integração para o teu tema activo de modo a vencer a cascata de templates do e107.

Ordem da cascata resolvida por `sitedown.php` (raiz):

1. `THEME/templates/sitedown_template.php` ← **alvo**
2. `THEME/sitedown_template.php` (legado v1.x)
3. `e_CORE/templates/sitedown_template.php` (fallback básico)

Copia o ficheiro de integração para o teu tema activo:

```bash
# A partir da pasta do plugin
cp e107_plugins/sitedown_styles/theme_integration/sitedown_template.php \
   e107_themes/O_TEU_TEMA/templates/sitedown_template.php
```

### Passo 3: Configurar

1. Vai a **Admin → Sitedown Styles**
2. Selecciona o modelo preferido no separador **Templates**
3. Configura contagem decrescente, redes sociais e contacto em **Preferências**
4. Guarda

## 🎮 Utilização

### Activar o modo manutenção

1. Vai a **Admin → Utilizadores → Manutenção de Utilizadores e Visitantes** (`/e107_admin/ugflag.php`)
2. Coloca **Modo Manutenção = ON** e guarda
3. Abre o site numa janela de navegação anónima — qualquer URL devolve HTTP 503 com o teu modelo

> 💡 O Admin Principal (perm `0`) faz sempre bypass ao flag e pode pré-visualizar em `/sitedown.php` mesmo com manutenção em OFF.

### Pré-visualização no Admin

- Os administradores podem pré-visualizar sem activar manutenção
- Visita `/sitedown.php` enquanto Admin Principal
- Ou usa o separador **Pré-visualizar** do plugin
- URL directo por estilo (apenas admin): `/e107_plugins/sitedown_styles/preview.php?style=<chave>`

### Guia do Utilizador integrado

O plugin inclui um separador **Guia do Utilizador** dentro do admin (Admin → Sitedown Styles → User Guide) com secções: Visão geral, Instalação, Configuração, Activação, Placeholders e Resolução de problemas. Todos os textos são traduzíveis via constantes `LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_*`.

## ⚙️ Opções de configuração

### Separador Modelo
- Escolhe entre 8 modelos profissionais
- Pré-visualização visual de cada design

### Separador Conteúdo
- Título personalizado (opcional)
- Mensagem/subtítulo personalizado
- Carregamento de logótipo

### Separador Contagem decrescente
- Activa/desactiva a contagem decrescente
- Define data e hora de lançamento
- Activa/desactiva a barra de progresso
- Define a percentagem

### Separador Social e Newsletter
- Activa/desactiva o formulário de newsletter
- Activa/desactiva as ligações sociais
- URLs de Facebook, Twitter, Instagram, LinkedIn

### Separador Contacto
- Telefone de emergência
- Email de contacto

## 📁 Estrutura de ficheiros

```
e107_plugins/sitedown_styles/
├── plugin.xml              # Definição do plugin
├── plugin.php              # Classe principal (install/uninstall)
├── admin_config.php        # Painel de administração
├── e_sitedown.php          # Hook do sitedown
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

- e107 CMS v2.3.0 ou superior
- PHP 7.4 ou superior (testado em PHP 8.x)
- MySQL 5.7 ou superior

## 🎨 Personalização

### Criar modelos personalizados

1. Copia um modelo existente de `templates/`
2. Muda o nome para `oteunome_template.php`
3. Modifica o HTML/CSS conforme necessário
4. Adiciona o slug à whitelist em `preview.php` e ao array de modelos em `admin_config.php::templatesPage()`

### Placeholders disponíveis

Coexistem duas camadas — mantém-nas distintas:

**Camada do plugin** (resolvida por `e_sitedown.php::processTemplate()`):

| Placeholder | Descrição |
|-------------|-----------|
| `{SITEDOWN_STYLES_TITLE}` | Título personalizado ou por defeito |
| `{SITEDOWN_STYLES_SUBTITLE}` | Mensagem personalizada ou por defeito |
| `{SITEDOWN_STYLES_LOGO}` | HTML do logótipo ou nome do site |
| `{SITEDOWN_STYLES_COUNTDOWN}` / `_JS` | Contagem decrescente (HTML + JS) |
| `{SITEDOWN_STYLES_PROGRESS}` | Barra de progresso |
| `{SITEDOWN_STYLES_NEWSLETTER}` | Formulário de newsletter |
| `{SITEDOWN_STYLES_SOCIAL}` | Ícones sociais |
| `{SITEDOWN_STYLES_PHONE}` / `{SITEDOWN_STYLES_EMAIL}` | Contacto |

**Camada do core** (resolvida por `parseTemplate` + batch `sitedown_shortcodes`):

| Placeholder | Descrição |
|-------------|-----------|
| `{SITENAME}` / `{SITEURL}` | Identidade do site |
| `{SITEDOWN_TABLE_MAINTAINANCETEXT}` | Texto do pref do core (gralha histórica) |
| `{SITEDOWN_TABLE_PAGENAME}` | Título da página |
| `{SITEDOWN_FAVICON}` | Favicon do tema ou raiz |
| `{LOGO: h=180}` / `{XURL_ICONS: …}` | Helpers globais do tema |

> ⚠️ Ao adicionar um novo `{SITEDOWN_STYLES_*}` actualiza **tanto** `e_sitedown.php::processTemplate()` **como** `preview.php::processPreviewTemplate()`, ou a página real e o preview do admin vão divergir.

## 🐛 Resolução de problemas

### O modelo não aparece
1. Verifica que `sitedown_template.php` está em `templates/` do teu tema
2. Confirma que o plugin está instalado e activo
3. Limpa a cache do e107

### Ao terminar sessão vai para a home, não para a página de manutenção
- O flag `maintainance_flag` está em OFF. Activa-o em `/e107_admin/ugflag.php`.
- O Admin Principal faz sempre bypass ao flag — testa em janela anónima.

### O separador Preferências não guarda alterações
- A chave do menu admin tem de ser `main/prefs`. Outros nomes (ex.: `main/settings`) saltam os triggers `PrefsObserver`/`PrefsSaveTrigger` do framework e descartam o formulário em silêncio.

### 404 em `/…/fa-paint-brush.glyph` após login
- `adminLinks` em `plugin.xml` NÃO suporta a sintaxe `.glyph`. Usa caminhos reais para PNG sob `images/`.

### Fatal `TypeError: Cannot access offset of type string on string` ao desinstalar
- Tags XML vazias em `plugin.xml` (`<userClasses></userClasses>`, `<dependencies></dependencies>`…) são interpretadas como `""` em PHP 8+. Remove-as ou preenche-as.

### A contagem decrescente não funciona
1. Garante que o JavaScript está activado
2. Confirma que a data está definida no admin
3. Verifica que a contagem decrescente está activada

### Os estilos não carregam
1. Confirma que o CDN do Bootstrap está acessível
2. Vê a consola do browser à procura de erros JS
3. Limpa a cache do browser

## 📄 Licença

Plugin libertado sob a GNU General Public License v3.0.

## 👨‍💻 Autor

**Martin Costa — Marketing de Performance**
- Site: [marketingdeperformance.online](https://marketingdeperformance.online)
- Email: info@marketingdeperformance.online

## 🙏 Créditos

- [e107 CMS](https://e107.org) — Sistema de Gestão de Conteúdos
- [Bootstrap 5](https://getbootstrap.com) — Framework CSS
- [Bootstrap Icons](https://icons.getbootstrap.com) — Biblioteca de ícones
- [Google Fonts](https://fonts.google.com) — Tipografias

---

Feito com ❤️ para a comunidade e107
