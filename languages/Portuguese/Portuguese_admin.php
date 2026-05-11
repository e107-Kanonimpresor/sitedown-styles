<?php
/*
 * Sitedown Styles Plugin - Portuguese (pt-PT) Language File
 *
 * Secções (por ordem):
 *   1. Metadados do plugin
 *   2. Menu admin
 *   3. Preferências admin (labels, helps, separadores)
 *   4. Descrições das plantillas
 *   5. Acções / mensagens admin
 *   6. Strings partilhadas front-end (LAN_SITEDOWN_*, LAN_* genéricos)
 *   7. Etiquetas partilhadas front-end (LAN_PLUGIN_SITEDOWN_STYLES_LBL_*)
 *   8. Texto por plantilla (LAN_PLUGIN_SITEDOWN_STYLES_TPL_<ESTILO>_*)
 *  10. Widget de ajuda lateral + página Acerca de
 *
 * NOTA: a secção 9 ("Guia de Utilizador integrado") foi extraída na v2.1.0 para
 * languages/Portuguese/Portuguese_admin_help.php — carregada de forma preguiçosa
 * por guidePage() via e107::lan('sitedown_styles', 'admin_help', true).
 * Ver docs/architecture/USER_GUIDE_PATTERN.md.
 *
 * @package     sitedown_styles
 * @version     2.1.0
 * @locale      pt-PT  (Português europeu)
 */

// ─────────────────────────────────────────────────────────────────────────────
// 1. Metadados do plugin
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SITEDOWN_STYLES_NAME',                        'Estilos de Manutenção');
define('LAN_PLUGIN_SITEDOWN_STYLES_SUMMARY',                     'Modelos profissionais para páginas de manutenção');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESCRIPTION',                 'Uma colecção de 8 modelos profissionais para páginas de manutenção com Bootstrap 5.');
define('LAN_PLUGIN_SITEDOWN_STYLES_ADMIN',                       'Configurar modelos de manutenção');
define('LAN_PLUGIN_SITEDOWN_STYLES_INSTALLED',                   'Plugin Sitedown Styles instalado com sucesso!');

// ─────────────────────────────────────────────────────────────────────────────
// 2. Menu admin
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SITEDOWN_STYLES_TEMPLATES',                   'Modelos');
define('LAN_PLUGIN_SITEDOWN_STYLES_PREVIEW',                     'Pré-visualização');
define('LAN_PLUGIN_SITEDOWN_STYLES_MAINTENANCE',                 'Modo Manutenção');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE',                       'Guia do Utilizador');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY',                        'Editor de textos');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_INTRO',                  'Personalize os textos visíveis (etiquetas, títulos, serviços, etc.) de cada skin. Deixe um campo vazio para voltar ao texto pré-definido do ficheiro de idioma.');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_FIELD',                  'Campo');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_DEFAULT',                'Valor pré-definido');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_OVERRIDE',               'Texto personalizado');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_SAVE',                   'Guardar textos');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_SAVED',                  'Textos guardados.');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_NOCHANGE',               'Sem alterações.');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_NONE',                   'Esta skin não tem textos editáveis.');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_LANG',                   'A editar idioma:');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_LANG_HINT',              'Os valores vazios resolvem-se nesta ordem: idioma actual → idioma pré-definido do site → primeira tradução disponível → texto pré-definido do plugin.');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_LANG_COL',               'Traduções');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_NO_TRANSLATION',         '(ainda sem tradução)');

// ─────────────────────────────────────────────────────────────────────────────
// 3. Preferências admin
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SITEDOWN_STYLES_ACTIVE',                      'Modelo Activo');
define('LAN_PLUGIN_SITEDOWN_STYLES_TITLE',                       'Título Personalizado');
define('LAN_PLUGIN_SITEDOWN_STYLES_TITLE_HELP',                  'Deixar vazio para usar o título pré-definido');
define('LAN_PLUGIN_SITEDOWN_STYLES_SUBTITLE',                    'Mensagem Personalizada');
define('LAN_PLUGIN_SITEDOWN_STYLES_SUBTITLE_HELP',               'Deixar vazio para usar a mensagem das preferências do site');
define('LAN_PLUGIN_SITEDOWN_STYLES_LOGO',                        'Imagem do Logótipo');
define('LAN_PLUGIN_SITEDOWN_STYLES_LOGO_HELP',                   'Seleccionar um logótipo a mostrar na página de manutenção');
define('LAN_PLUGIN_SITEDOWN_STYLES_COUNTDOWN',                   'Activar Contagem Decrescente');
define('LAN_PLUGIN_SITEDOWN_STYLES_COUNTDOWN_DATE',              'Data de Lançamento');
define('LAN_PLUGIN_SITEDOWN_STYLES_PROGRESS',                    'Mostrar Barra de Progresso');
define('LAN_PLUGIN_SITEDOWN_STYLES_PROGRESS_VALUE',              'Percentagem de Progresso');
define('LAN_PLUGIN_SITEDOWN_STYLES_NEWSLETTER',                  'Activar Formulário Newsletter');
define('LAN_PLUGIN_SITEDOWN_STYLES_SOCIAL',                      'Mostrar Redes Sociais');
define('LAN_PLUGIN_SITEDOWN_STYLES_PHONE',                       'Telefone de Contacto');
define('LAN_PLUGIN_SITEDOWN_STYLES_EMAIL',                       'Email de Contacto');

// Separadores de preferências
define('LAN_PLUGIN_SITEDOWN_STYLES_TAB_TEMPLATE',                'Modelo');
define('LAN_PLUGIN_SITEDOWN_STYLES_TAB_CONTENT',                 'Conteúdo');
define('LAN_PLUGIN_SITEDOWN_STYLES_TAB_COUNTDOWN',               'Contagem Decrescente');
define('LAN_PLUGIN_SITEDOWN_STYLES_TAB_SOCIAL',                  'Redes Sociais e Newsletter');
define('LAN_PLUGIN_SITEDOWN_STYLES_TAB_CONTACT',                 'Contacto');

// ─────────────────────────────────────────────────────────────────────────────
// 4. Descrições das plantillas
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_AGENCY',                 'Design glassmorphism elegante, perfeito para agências digitais e startups tecnológicas.');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_BUSINESS',               'Design corporativo profissional, ideal para serviços B2B e consultoria.');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_CONSTRUCTION',           'Design industrial com faixas de aviso para empresas de construção civil.');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_CREATIVE',               'Design artístico e vibrante com animações para designers e estúdios criativos.');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_GARDENING',              'Design natural e orgânico com elementos botânicos para jardineiros e paisagistas.');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_HANDYMAN',               'Design prático e funcional com contacto de emergência para serviços de reparação.');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_MARKETING',              'Design dinâmico tech com vista de dashboard para agências de marketing.');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_RESTAURANT',             'Design elegante e acolhedor com tipografia refinada para restaurantes e cafés.');

// ─────────────────────────────────────────────────────────────────────────────
// 5. Acções / mensagens admin
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SITEDOWN_STYLES_SAVE_SELECTION',              'Guardar Selecção');
define('LAN_PLUGIN_SITEDOWN_STYLES_SAVED',                       'Selecção de modelo guardada com sucesso!');
define('LAN_PLUGIN_SITEDOWN_STYLES_PREVIEW_DESC',                'Pré-visualização de como os visitantes verão a página de manutenção.');
define('LAN_PLUGIN_SITEDOWN_STYLES_OPEN_FULLSCREEN',             'Abrir em Ecrã Completo');
define('LAN_PLUGIN_SITEDOWN_STYLES_PREVIEW_BADGE',               'PRÉ-VISUALIZAÇÃO');

// ─────────────────────────────────────────────────────────────────────────────
// 6. Strings partilhadas front-end (unidades countdown, copy genérico)
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_SITEDOWN_TITLE',                                     'Site em Manutenção');
define('LAN_SITEDOWN_MSG',                                       'Estamos a realizar tarefas de manutenção planeadas. Voltaremos a estar online em breve.');
define('LAN_SITEDOWN_NOTIFY',                                    'Receba uma notificação quando voltarmos');
define('LAN_DAYS',                                               'Dias');
define('LAN_HOURS',                                              'Horas');
define('LAN_MINUTES',                                            'Min');
define('LAN_SECONDS',                                            'Seg');
define('LAN_PROGRESS',                                           'Progresso');
define('LAN_NOTIFY_ME',                                          'Notificar-me');
define('LAN_SUBSCRIBED',                                         'Subscrito!');
define('LAN_EMAIL',                                              'O seu email');
define('LAN_ACTIVE',                                             'Activo');

// ─────────────────────────────────────────────────────────────────────────────
// 7. Etiquetas partilhadas front-end (várias plantillas)
//    Resolvidas como placeholders {SITEDOWN_STYLES_LBL_*}.
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SITEDOWN_STYLES_LBL_PHONE',                   'Telefone');
define('LAN_PLUGIN_SITEDOWN_STYLES_LBL_EMAIL',                   'Email');
define('LAN_PLUGIN_SITEDOWN_STYLES_LBL_EMAIL_PH',                'Insira o seu email');
define('LAN_PLUGIN_SITEDOWN_STYLES_LBL_RESERVE',                 'Reservar');
define('LAN_PLUGIN_SITEDOWN_STYLES_LBL_REGISTERED',              'Registado!');
define('LAN_PLUGIN_SITEDOWN_STYLES_LBL_THANKS',                  'Obrigado!');

// ─────────────────────────────────────────────────────────────────────────────
// 8. Texto por plantilla (strings de marketing visíveis, por slug)
//    Resolvidas como placeholders {SITEDOWN_STYLES_TPL_*} por getTplCopy($style).
// ─────────────────────────────────────────────────────────────────────────────

// 8.1 Agency
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_AGENCY_BADGE',            'Modo Manutenção');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_AGENCY_HEAD1',            'Estamos a criar');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_AGENCY_HEAD2',            'algo incrível');

// 8.2 Business
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_BUSINESS_BADGE',          'Manutenção Planeada');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_BUSINESS_HEAD1',          'Voltaremos');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_BUSINESS_HEAD2',          'muito em breve');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_BUSINESS_CDLABEL',        'Tempo estimado restante');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_BUSINESS_BRAND',          'Estamos a actualizar os nossos sistemas para o servir melhor. Obrigado pela sua paciência.');

// 8.3 Construction
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_BADGE',      'Em Construção');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_HEAD1',      'A CONSTRUIR');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_HEAD2',      'ALGO');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_HEAD3',      'MELHOR');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_CDLABEL',    'LANÇAMENTO EM');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_SVC1',       'Construção');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_SVC2',       'Remodelações');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_SVC3',       'Design');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_SVC4',       'Manutenção');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_EMERG',      'Emergências 24/7');

// 8.4 Creative
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CREATIVE_HEAD1',          'A CRIAR');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CREATIVE_HEAD2',          'ALGO');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CREATIVE_HEAD3',          'INCRÍVEL');

// 8.5 Gardening
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_BADGE',         'A cultivar algo novo');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_HEAD1',         'O nosso jardim');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_HEAD2',         'florescerá em breve');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_CDLABEL',       '— Abertura em —');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_SVC1',          'Jardinagem');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_SVC2',          'Paisagismo');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_SVC3',          'Rega');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_SVC4',          'Manutenção');

// 8.6 Handyman
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_BADGE',          'Emergências 24/7');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_EMERG_TITLE',    'Precisa de ajuda urgente?');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_EMERG_TEXT',     'O nosso site está em manutenção, mas os serviços de emergência continuam disponíveis. Não hesite em contactar-nos para qualquer reparação urgente.');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_CALL',           'Ligue agora');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_AVAIL',          'Disponível 24 horas');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_STATUS',         'Manutenção a decorrer');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_HEAD1',          'Estamos a arranjar');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_HEAD2',          'tudo a postos');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_CDLABEL',        'Tempo estimado restante');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_SVC1',           'Electricidade');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_SVC2',           'Canalização');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_SVC3',           'Serralharia');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_SVC4',           'Climatização');

// 8.7 Marketing
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_BADGE',         'Optimização a decorrer');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_HEAD1',         'A escalar a nossa');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_HEAD2',         'infraestrutura digital');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_M1',            'Disponibilidade');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_M2',            'Mais rápido');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_M3',            'Novas funcionalidades');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_DASH_TITLE',    'Painel de controlo');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_DASH_BADGE',    'Em desenvolvimento');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_CDLABEL',       'Lançamento em');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_CHART',         'Desempenho esperado');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_S1',            'Optimizado');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_S2',            'Melhorado');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_S3',            'Actualizado');

// 8.8 Restaurant
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_TAGLINE',      'Experiência de alta cozinha');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_BADGE',        'A renovar o restaurante');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_HEAD1',        'Estamos a preparar uma');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_HEAD2',        'nova experiência gastronómica');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_CDLABEL',      '— Reabertura em —');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_NL_TITLE',     'Seja o primeiro a conhecer a nossa nova ementa');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_INFO1',        'Reservas');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_INFO2',        'Localização');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_INFO3',        'Horário');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_HOURS_VAL',    '13:00 - 23:00');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_QUOTE',        '«A boa comida é a base da felicidade.»');

// ─────────────────────────────────────────────────────────────────────────
// 10. Widget de ajuda lateral + página Acerca de (info / contacto / suporte)
// ─────────────────────────────────────────────────────────────────────────

// Menu / título da página
define('LAN_PLUGIN_SITEDOWN_STYLES_ABOUT',                  'Acerca de');

// Widget de ajuda lateral
define('LAN_PLUGIN_SITEDOWN_STYLES_HELP_CAPTION',           'Acerca deste plugin');
define('LAN_PLUGIN_SITEDOWN_STYLES_HELP_TAGLINE',           '8 modelos profissionais Bootstrap 5 para páginas de manutenção, com editor de textos multilingue e guia de utilizador integrado.');
define('LAN_PLUGIN_SITEDOWN_STYLES_HELP_TIP',               'Dica: instale o stub do tema uma única vez e mude de modelo quando quiser — sem tocar em código.');
define('LAN_PLUGIN_SITEDOWN_STYLES_HELP_MORE',              'Mais informação e suporte');

// Etiquetas de botões partilhadas (sidebar + Acerca de)
define('LAN_PLUGIN_SITEDOWN_STYLES_BTN_DOCS',               'Documentação');
define('LAN_PLUGIN_SITEDOWN_STYLES_BTN_SUPPORT',            'Suporte');
define('LAN_PLUGIN_SITEDOWN_STYLES_BTN_DONATE',             'Donativo');

// Secções da página Acerca de — MIGRADAS para
// languages/<Lang>/<Lang>_admin_about.php (padrão 4 camadas, carga preguiçosa
// a partir de aboutPage()). As constantes LAN_PLUGIN_SITEDOWN_STYLES_ABOUT_*
// que estavam aqui já não são referenciadas por nenhum código do plugin
// e foram removidas. Ver docs/architecture/USER_GUIDE_PATTERN.md.
