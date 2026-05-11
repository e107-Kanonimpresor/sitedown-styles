<?php
/*
 * Sitedown Styles — In-Admin User Guide language file (Portuguese).
 *
 * Loaded LAZILY by admin_config.php::guidePage() via:
 *   e107::lan('sitedown_styles', 'admin_help', true);
 *
 * Resolves to:  languages/Portuguese/Portuguese_admin_help.php
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
// 9. Guia de Utilizador integrado
// ─────────────────────────────────────────────────────────────────────────────

// 9.1 Etiquetas dos separadores
define('LAN_PLUGIN_SS_HELP_TAB_OVERVIEW',          'Visão geral');
define('LAN_PLUGIN_SS_HELP_TAB_INSTALL',           'Instalação');
define('LAN_PLUGIN_SS_HELP_TAB_CONFIG',            'Configuração');
define('LAN_PLUGIN_SS_HELP_TAB_ACTIVATION',        'Activação');
define('LAN_PLUGIN_SS_HELP_TAB_SHORTCODES',        'Placeholders');
define('LAN_PLUGIN_SS_HELP_TAB_TROUBLESHOOT',      'Resolução de problemas');
define('LAN_PLUGIN_SS_HELP_TAB_CREDITS',           'Créditos');

// 9.1.1 Cartão de introdução
define('LAN_PLUGIN_SS_HELP_INTRO_TITLE',           'Bem-vindo ao Guia do Utilizador');
define('LAN_PLUGIN_SS_HELP_INTRO_TEXT',            'Tudo o que precisa para instalar, configurar e resolver problemas do Sitedown Styles. Navegue pelos separadores — o conteúdo actualiza-se automaticamente com o seu idioma de administração.');

// 9.2 Separador Visão geral
define('LAN_PLUGIN_SS_HELP_OVERVIEW_TITLE',        'Visão geral');
define('LAN_PLUGIN_SS_HELP_OVERVIEW_P1',           'O Sitedown Styles substitui a página de manutenção pré-definida do e107 por um de 8 modelos Bootstrap 5 orientados a diferentes sectores de negócio.');
define('LAN_PLUGIN_SS_HELP_OVERVIEW_TIP',          'Os modelos são HTML/CSS puros com estilos embutidos — sem passo de build.');
define('LAN_PLUGIN_SS_HELP_OVERVIEW_WARN',         'Instalar o plugin NÃO é suficiente: também tem de copiar o stub de integração do tema (ver separador Instalação).');

// 9.3 Separador Instalação
define('LAN_PLUGIN_SS_HELP_INSTALL_TITLE',         'Instalação');
define('LAN_PLUGIN_SS_HELP_INSTALL_S1',            'Instale o plugin a partir de Admin → Gestor de Plugins.');
define('LAN_PLUGIN_SS_HELP_INSTALL_S2',            'Copie <code>e107_plugins/sitedown_styles/theme_integration/sitedown_template.php</code> para o seu tema activo em <code>e107_themes/&lt;o_seu_tema&gt;/templates/sitedown_template.php</code>.');
define('LAN_PLUGIN_SS_HELP_INSTALL_S3',            'Abra o separador Modelos e escolha um estilo.');
define('LAN_PLUGIN_SS_HELP_INSTALL_S4',            'Configure conteúdo, contagem decrescente, redes sociais e contacto no separador Preferências.');
define('LAN_PLUGIN_SS_HELP_INSTALL_S5',            'Active o Modo Manutenção em Admin → Utilizadores → Manutenção de Utilizadores e Visitantes (ou /e107_admin/ugflag.php).');
define('LAN_PLUGIN_SS_HELP_INSTALL_NOTE',          'O Administrador Principal (perm 0) vê a página de manutenção directamente em /sitedown.php mesmo com a flag em OFF — útil para pré-visualizar em produção.');

// 9.3.1 Separador Instalação — Integração no tema passo a passo (utilizadores não técnicos)
define('LAN_PLUGIN_SS_HELP_THEME_TITLE',           'Integração no tema passo a passo');
define('LAN_PLUGIN_SS_HELP_THEME_INTRO',           'O Sitedown Styles precisa de <strong>UM</strong> pequeno ficheiro copiado para dentro do seu tema activo. Esta ponte diz ao e107 para renderizar a página de manutenção usando um dos 8 modelos deste plugin em vez da página por omissão. <em>Sem este passo os modelos não vão aparecer, por mais que os pré-visualize.</em>');
define('LAN_PLUGIN_SS_HELP_THEME_FILE_HEADING',    'O ficheiro que tem de copiar');
define('LAN_PLUGIN_SS_HELP_THEME_FILE_DESC',       'Já vem com este plugin — <strong>NÃO</strong> tem de escrever nem descarregar nada. Apenas copie este ficheiro exacto:');
define('LAN_PLUGIN_SS_HELP_THEME_FILE_LOCATION_LABEL', 'Localização de origem (relativa à raiz do seu e107):');
define('LAN_PLUGIN_SS_HELP_THEME_TARGET_HEADING',  'Onde tem de o copiar');
define('LAN_PLUGIN_SS_HELP_THEME_TARGET_DESC',     'Cole o ficheiro dentro da pasta <code>templates</code> do seu tema activo:');
define('LAN_PLUGIN_SS_HELP_THEME_TARGET_HINT',     'Se a pasta <code>templates</code> não existir, crie-a. Mantenha o nome do ficheiro exactamente como <code>sitedown_template.php</code>.');
define('LAN_PLUGIN_SS_HELP_THEME_FIND_THEME',      'Não sabe qual o tema activo? Veja em Admin → Temas — o activo tem uma etiqueta verde.');
define('LAN_PLUGIN_SS_HELP_THEME_METHODS_TITLE',   'Três formas de copiar o ficheiro');
define('LAN_PLUGIN_SS_HELP_THEME_METHODS_INTRO',   'Escolha o método que se ajuste ao acesso que tem ao seu alojamento:');
// Método 1 — FTP / SFTP
define('LAN_PLUGIN_SS_HELP_THEME_M1_TITLE',        'Método 1 — Cliente FTP / SFTP (FileZilla, WinSCP, Cyberduck…)');
define('LAN_PLUGIN_SS_HELP_THEME_M1_S1',           'Conecte-se ao seu alojamento com as credenciais de FTP.');
define('LAN_PLUGIN_SS_HELP_THEME_M1_S2',           'Navegue até <code>e107_plugins/sitedown_styles/theme_integration/</code>, clique com o botão direito em <code>sitedown_template.php</code> e escolha <strong>Descarregar</strong>.');
define('LAN_PLUGIN_SS_HELP_THEME_M1_S3',           'Navegue até <code>e107_themes/&lt;o_seu_tema&gt;/templates/</code> (crie a pasta <code>templates</code> se não existir).');
define('LAN_PLUGIN_SS_HELP_THEME_M1_S4',           'Arraste o ficheiro do seu computador para essa pasta. Pronto.');
// Método 2 — Gestor de ficheiros
define('LAN_PLUGIN_SS_HELP_THEME_M2_TITLE',        'Método 2 — Gestor de ficheiros do alojamento (cPanel, Plesk, Hostinger, etc.)');
define('LAN_PLUGIN_SS_HELP_THEME_M2_S1',           'Inicie sessão no painel de controlo do seu alojamento e abra o Gestor de Ficheiros.');
define('LAN_PLUGIN_SS_HELP_THEME_M2_S2',           'Vá a <code>e107_plugins/sitedown_styles/theme_integration/</code>, seleccione <code>sitedown_template.php</code> e clique em <strong>Copiar</strong>.');
define('LAN_PLUGIN_SS_HELP_THEME_M2_S3',           'Indique como destino <code>e107_themes/&lt;o_seu_tema&gt;/templates/</code> (crie a pasta se não existir) e confirme.');
define('LAN_PLUGIN_SS_HELP_THEME_M2_S4',           'Certifique-se de que o ficheiro no destino se chama exactamente <code>sitedown_template.php</code> (sem <code>(1)</code>, sem <code>.txt</code>).');
// Método 3 — Linha de comandos
define('LAN_PLUGIN_SS_HELP_THEME_M3_TITLE',        'Método 3 — Linha de comandos (SSH, utilizadores avançados)');
define('LAN_PLUGIN_SS_HELP_THEME_M3_DESC',         'A partir do directório raiz do seu e107:');
// Verificação
define('LAN_PLUGIN_SS_HELP_THEME_VERIFY_TITLE',    'Como verificar que a integração funciona');
define('LAN_PLUGIN_SS_HELP_THEME_VERIFY_S1',       'Abra o separador <strong>Pré-visualização</strong> deste plugin e escolha qualquer modelo — funciona sempre porque a Pré-visualização ignora o stub do tema.');
define('LAN_PLUGIN_SS_HELP_THEME_VERIFY_S2',       'Com sessão iniciada como Administrador Principal, abra <code>/sitedown.php</code> directamente. Se vir o modelo escolhido em vez da página de manutenção por omissão do e107, o stub está correctamente instalado.');
define('LAN_PLUGIN_SS_HELP_THEME_VERIFY_S3',       'Se ainda vir a página por omissão, verifique que o ficheiro está em <code>e107_themes/&lt;o_seu_tema&gt;/templates/sitedown_template.php</code> com esse nome exacto.');
// Aviso + dica
define('LAN_PLUGIN_SS_HELP_THEME_WARN_LABEL',      'Atenção:');
define('LAN_PLUGIN_SS_HELP_THEME_WARN',            'se mais tarde mudar para outro tema, repita este passo no novo tema. O stub vive dentro do tema — não é global.');
define('LAN_PLUGIN_SS_HELP_THEME_TIP_LABEL',       'Boa notícia:');
define('LAN_PLUGIN_SS_HELP_THEME_TIP',             'só instala este stub uma vez por tema. Depois, mudar de modelo é um clique no separador Modelos — sem ter de copiar ficheiros.');

// 9.4 Separador Configuração
define('LAN_PLUGIN_SS_HELP_CONFIG_TITLE',          'Referência de configuração');
define('LAN_PLUGIN_SS_HELP_TBL_TAB',               'Separador');
define('LAN_PLUGIN_SS_HELP_TBL_PREF',              'Preferência');
define('LAN_PLUGIN_SS_HELP_TBL_PURPOSE',           'Finalidade');
define('LAN_PLUGIN_SS_HELP_CONFIG_STYLE',          'Slug do modelo activo.');
define('LAN_PLUGIN_SS_HELP_CONFIG_CONTENT',        'Sobrepõe título, mensagem e logótipo pré-definidos.');
define('LAN_PLUGIN_SS_HELP_CONFIG_COUNTDOWN',      'Activa contagem decrescente para o lançamento e barra de progresso.');
define('LAN_PLUGIN_SS_HELP_CONFIG_SOCIAL',         'Mostra ícones sociais e formulário de captura de email.');
define('LAN_PLUGIN_SS_HELP_CONFIG_CONTACT',        'Informações de contacto de emergência.');
define('LAN_PLUGIN_SS_HELP_CONFIG_NOTE',           "Todas as preferências são persistidas via <code>e107::getPlugConfig('sitedown_styles')</code>.");

// 9.4.1 Separador Configuração — secção Textos (Editor de cópia)
define('LAN_PLUGIN_SS_HELP_TEXTS_TITLE',           'Personalizar os textos visíveis (separador Textos)');
define('LAN_PLUGIN_SS_HELP_TEXTS_INTRO',           'O separador <strong>Textos</strong> (também conhecido como Editor de cópia) permite substituir o texto da página de manutenção — título, subtítulo, chamada à ação, rodapé, etc. — sem mexer em ficheiros PHP nem em ficheiros de idioma. Cada um dos 8 modelos tem o seu próprio conjunto de campos, para que possa adaptar o texto a cada nicho de negócio.');
define('LAN_PLUGIN_SS_HELP_TEXTS_S1',              'Abra <strong>Admin → Sitedown Styles → Textos</strong>.');
define('LAN_PLUGIN_SS_HELP_TEXTS_S2',              'Escolha um modelo no seletor no topo da página (cada modelo guarda as suas próprias substituições).');
define('LAN_PLUGIN_SS_HELP_TEXTS_S3',              'Edite qualquer campo. <em>Se ficar vazio, é usado o valor por omissão definido no ficheiro de idioma ativo.</em>');
define('LAN_PLUGIN_SS_HELP_TEXTS_S4',              'Guarde. Os valores são armazenados como preferências <code>sitedown_copy_&lt;estilo&gt;_&lt;campo&gt;</code> — o código do plugin nunca é tocado.');
define('LAN_PLUGIN_SS_HELP_TEXTS_NOTE',            'Use o separador <strong>Pré-visualização</strong> para ver as alterações imediatamente. Os valores por omissão vivem nos ficheiros de idioma (<code>LAN_PLUGIN_SITEDOWN_STYLES_COPY_*</code>), portanto pode sempre repor deixando o campo vazio.');

// 9.4.2 Separador Configuração — secção Conteúdo multilingue
define('LAN_PLUGIN_SS_HELP_LANG_TITLE',            'Conteúdo multilingue');
define('LAN_PLUGIN_SS_HELP_LANG_INTRO',            'O plugin inclui três idiomas: <strong>inglês</strong>, <strong>espanhol</strong> e <strong>português (PT-PT)</strong>. Todas as etiquetas de admin, os textos por omissão dos modelos e a própria página de manutenção estão traduzidos.');
define('LAN_PLUGIN_SS_HELP_LANG_TIP_LABEL',        'Dica:');
define('LAN_PLUGIN_SS_HELP_LANG_TIP',              'para mudar os textos visíveis para outro idioma incluído, basta alterar o <strong>idioma do Admin</strong> através do seletor de idioma no canto superior direito da área de administração do e107. O plugin carrega automaticamente o ficheiro de idioma correspondente — tanto o separador Textos como a página de manutenção gerada o usam. Sem alterações de código, sem migrações.');
define('LAN_PLUGIN_SS_HELP_LANG_OVERRIDE',         'Importante: qualquer valor definido no separador Textos é uma <strong>substituição permanente</strong> e aplica-se independentemente do idioma ativo. Esvazie o campo para voltar ao valor traduzido do idioma atual.');
define('LAN_PLUGIN_SS_HELP_LANG_ADD_TITLE',        'Para adicionar um novo idioma:');
define('LAN_PLUGIN_SS_HELP_LANG_ADD',              'duplique a pasta <code>languages/English/</code>, renomeie-a para o nome do seu idioma (p. ex. <code>French</code>), traduza os três ficheiros (<code>French_admin.php</code>, <code>French_front.php</code>, <code>French_global.php</code>) e o novo idioma fica disponível imediatamente.');

// 9.4.3 Separador Configuração — alerta de boas práticas
define('LAN_PLUGIN_SS_HELP_CFG_BEST_TITLE',        'Boas práticas');
define('LAN_PLUGIN_SS_HELP_CFG_BEST_1',            'Use sempre o separador <strong>Pré-visualização</strong> antes de ativar o modo de manutenção em produção.');
define('LAN_PLUGIN_SS_HELP_CFG_BEST_2',            'Defina uma <strong>data de contagem decrescente</strong> realista em UTC. O script do frontend converte-a automaticamente para a hora local do visitante.');
define('LAN_PLUGIN_SS_HELP_CFG_BEST_3',            'Para uma marca corporativa coerente, carregue o seu logótipo no campo <strong>URL de logótipo personalizado</strong> — substitui o nome do site em todos os modelos.');
define('LAN_PLUGIN_SS_HELP_CFG_BEST_4',            'Incremente a preferência <code>sitedown_css_version</code> sempre que editar um CSS de modelo em produção — os visitantes recebem a folha de estilos nova em vez da versão em cache.');

// 9.5 Separador Activação
define('LAN_PLUGIN_SS_HELP_ACTIV_TITLE',           'Activar o modo manutenção');
define('LAN_PLUGIN_SS_HELP_ACTIV_INTRO',           'O plugin apenas renderiza a página; a flag de manutenção é uma preferência do core.');
define('LAN_PLUGIN_SS_HELP_ACTIV_S1',              'Vá a <code>/e107_admin/ugflag.php</code> (ou Admin → Utilizadores → Manutenção de Utilizadores e Visitantes).');
define('LAN_PLUGIN_SS_HELP_ACTIV_S2',              'Coloque o <strong>Modo Manutenção</strong> em ON e guarde.');
define('LAN_PLUGIN_SS_HELP_ACTIV_S3',              'Abra o site numa janela anónima — qualquer URL devolve HTTP 503 com o seu modelo.');
define('LAN_PLUGIN_SS_HELP_ACTIV_BYPASS',          'Dica: o Administrador Principal ignora sempre a flag. Use outro browser/janela anónima para testar como visitante.');

// 9.6 Separador Placeholders
define('LAN_PLUGIN_SS_HELP_SC_TITLE',              'Placeholders disponíveis');
define('LAN_PLUGIN_SS_HELP_SC_INTRO',              'Coexistem duas camadas de placeholders propositadamente — mantenha-as distintas ao criar modelos personalizados.');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN',             'Camada do plugin (resolvida por str_replace em e_sitedown.php)');
define('LAN_PLUGIN_SS_HELP_SC_CORE',               'Camada do core (resolvida por parseTemplate + batch sitedown_shortcodes)');
define('LAN_PLUGIN_SS_HELP_SC_DUAL',               'Ao adicionar um novo placeholder <code>{SS_*}</code> TEM de actualizar tanto o modelo principal (<code>templates/sitedown_styles_template.php</code>) COMO o mapa de variáveis em <code>e_sitedown.php::buildVars()</code>, ou aparecerá literal na página.');

// 9.7 Separador Resolução de problemas
define('LAN_PLUGIN_SS_HELP_TS_TITLE',              'Resolução de problemas');
define('LAN_PLUGIN_SS_HELP_TS_Q1',                 'Ao terminar sessão vai para a página inicial em vez da página de manutenção');
define('LAN_PLUGIN_SS_HELP_TS_A1',                 '<code>maintainance_flag</code> está em OFF. Active-a em <code>/e107_admin/ugflag.php</code>. O plugin só fornece o aspecto, não a activação.');
define('LAN_PLUGIN_SS_HELP_TS_Q2',                 'O modo manutenção mostra o modelo genérico do e107, não o meu estilo');
define('LAN_PLUGIN_SS_HELP_TS_A2',                 'A cascata é THEME/templates/sitedown_template.php → THEME/sitedown_template.php → e_CORE/templates/sitedown_template.php. Copie o stub de integração para o seu tema (ver separador Instalação) para que ganhe.');
define('LAN_PLUGIN_SS_HELP_TS_Q3',                 'O separador Preferências não guarda nada');
define('LAN_PLUGIN_SS_HELP_TS_A3',                 'Confirme que a chave do menu é <code>main/prefs</code> (não <code>main/settings</code>). Apenas a acção <code>prefs</code> dispara <code>PrefsObserver/PrefsSaveTrigger</code>.');
define('LAN_PLUGIN_SS_HELP_TS_Q4',                 '404 em /…/fa-paint-brush.glyph após iniciar sessão');
define('LAN_PLUGIN_SS_HELP_TS_A4',                 '<code>adminLinks</code> em plugin.xml NÃO suporta sintaxe .glyph — use caminhos reais para PNG sob <code>images/</code>.');
define('LAN_PLUGIN_SS_HELP_TS_Q5',                 'TypeError ao desinstalar o plugin (PHP 8+)');
define('LAN_PLUGIN_SS_HELP_TS_A5',                 'Os nós XML vazios (<code>&lt;userClasses&gt;&lt;/userClasses&gt;</code>) são interpretados como strings. Remova-os ou preencha-os.');
define('LAN_PLUGIN_SS_HELP_TS_Q6',                 'A contagem decrescente fica em 00:00:00 na página real');
define('LAN_PLUGIN_SS_HELP_TS_A6',                 'Defina a data de lançamento em Preferências → Contagem Decrescente. Um valor vazio só é preenchido com "agora+7 dias" durante a instalação.');

// 9.8 Separador de Créditos
define('LAN_PLUGIN_SS_HELP_CREDITS_TITLE',             'Créditos e agradecimentos');
define('LAN_PLUGIN_SS_HELP_CREDITS_INTRO',             'Este plugin não existiria sem o trabalho da comunidade e107 e do ecossistema de código aberto listado abaixo.');
define('LAN_PLUGIN_SS_HELP_CREDITS_AUTHOR_TITLE',      'Autor');
define('LAN_PLUGIN_SS_HELP_CREDITS_AUTHOR_TEXT',       'Desenhado e mantido por Martin Costa (Kanonimpresor). Consulte a página <strong>Acerca de</strong> para obter todos os dados de contacto e ligações de suporte.');
define('LAN_PLUGIN_SS_HELP_CREDITS_TECH_TITLE',        'Tecnologias utilizadas');
define('LAN_PLUGIN_SS_HELP_CREDITS_TECH_E107',         'Framework da UI de administração, descoberta de plugins, parser e motor de shortcodes.');
define('LAN_PLUGIN_SS_HELP_CREDITS_TECH_BS',           'Os templates do frontend usam Bootstrap 5 via CDN — sem passo de build.');
define('LAN_PLUGIN_SS_HELP_CREDITS_TECH_FA',           'Conjunto de ícones utilizado em toda a UI de administração.');
define('LAN_PLUGIN_SS_HELP_CREDITS_TECH_BI',           'Conjunto de ícones complementar para os templates públicos.');
define('LAN_PLUGIN_SS_HELP_CREDITS_THANKS_TITLE',      'Agradecimentos especiais');
define('LAN_PLUGIN_SS_HELP_CREDITS_THANKS_E107TEAM',   'À equipa central e aos contribuidores do e107 por manterem vivo e bem documentado o CMS.');
define('LAN_PLUGIN_SS_HELP_CREDITS_THANKS_TESTERS',    'Aos beta testers que reportaram problemas e ajudaram a melhorar os templates.');
define('LAN_PLUGIN_SS_HELP_CREDITS_THANKS_TRANSLATORS','Aos tradutores que forneceram os pacotes de idioma em espanhol e português.');
define('LAN_PLUGIN_SS_HELP_CREDITS_LICENSE',           'Publicado sob a licença GNU GPLv3+ — livre para usar, modificar e redistribuir.');
define('LAN_PLUGIN_SS_HELP_CREDITS_GETINVOLVED',       'Quer contribuir com um novo template ou tradução? Abra uma issue ou pull request no repositório do projeto (ver a página Acerca de).');


// ─────────────────────────────────────────────────────────────────────────
// 9.b  Guia de Utilizador no Admin — adições do padrão booking (refactor v2)
// ─────────────────────────────────────────────────────────────────────────

// Etiquetas reutilizáveis (fluxo Quick-start + cartões Highlights)
define('LAN_PLUGIN_SS_HELP_LBL_QUICK_START',     'Início rápido');
define('LAN_PLUGIN_SS_HELP_LBL_HIGHLIGHTS',      'Destaques');
define('LAN_PLUGIN_SS_HELP_LBL_INSTALL',         'Instalar plugin');
define('LAN_PLUGIN_SS_HELP_LBL_PICK_TPL',        'Escolher modelo');
define('LAN_PLUGIN_SS_HELP_LBL_CUSTOMIZE',       'Personalizar');
define('LAN_PLUGIN_SS_HELP_LBL_ACTIVATE',        'Activar');
define('LAN_PLUGIN_SS_HELP_LBL_TEMPLATES',       'modelos');
define('LAN_PLUGIN_SS_HELP_LBL_TEMPLATES_DESC',  'Skins Bootstrap 5 prontos para diferentes sectores de negócio.');
define('LAN_PLUGIN_SS_HELP_LBL_NO_BUILD',        'Sem passo de build');
define('LAN_PLUGIN_SS_HELP_LBL_THEME_REQ',       'Stub do tema necessário');

// Tabela de configuração — etiquetas de linha (primeira coluna)
define('LAN_PLUGIN_SS_HELP_TBL_ROW_TPL',         'Modelo');
define('LAN_PLUGIN_SS_HELP_TBL_ROW_CONTENT',     'Conteúdo');
define('LAN_PLUGIN_SS_HELP_TBL_ROW_COUNTDOWN',   'Contagem decrescente');
define('LAN_PLUGIN_SS_HELP_TBL_ROW_SOCIAL',      'Redes sociais');
define('LAN_PLUGIN_SS_HELP_TBL_ROW_CONTACT',     'Contacto');

// Separador Placeholders — descrições da camada plugin
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_TITLE_DESC',      'Título personalizado ou nome do site pré-definido');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_SUBTITLE_DESC',   'Mensagem de manutenção personalizada ou pré-definida');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_LOGO_DESC',       'Imagem do logótipo (ou nome do site como fallback)');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_COUNTDOWN_DESC',  'Marcação da contagem decrescente (HTML) e script de arranque (JS)');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_PROGRESS_DESC',   'Bloco da barra de progresso baseado nas prefs de início/fim');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_NEWSLETTER_DESC', 'Formulário de captura da newsletter (quando activado)');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_SOCIAL_DESC',     'Linha de ícones de redes sociais (Facebook, Twitter, Instagram, …)');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_CONTACT_DESC',    'Telefone e email de contacto de emergência');

// Separador Placeholders — descrições da camada core
define('LAN_PLUGIN_SS_HELP_SC_CORE_SITE_DESC',   'Identidade global do site (nome e URL)');
define('LAN_PLUGIN_SS_HELP_SC_CORE_TEXT_DESC',   'Preferência core <em>maintainance_text</em> (nota: typo histórico)');
define('LAN_PLUGIN_SS_HELP_SC_CORE_PAGE_DESC',   'Título da página e favicon');
define('LAN_PLUGIN_SS_HELP_SC_CORE_THEME_DESC',  'Helpers do tema (logótipo, URLs de ícones)');


// ─────────────────────────────────────────────────────────────────────────────
// Strings de estado em tempo real (consumidas por shortcodes dinâmicos sc_ss_help_*)
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SS_HELP_STUB_LIVE_TITLE',     'Estado em tempo real no seu tema activo');
define('LAN_PLUGIN_SS_HELP_STUB_OK',             'Stub do tema detectado — integração activa');
define('LAN_PLUGIN_SS_HELP_STUB_MISSING',       'Stub do tema NÃO instalado — siga os passos acima');
define('LAN_PLUGIN_SS_HELP_NONE',                'nenhum');
