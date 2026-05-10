<?php
/**
 * Sitedown Styles — Admin Copy Editor template.
 *
 * Defines HTML strings consumed by `sitedown_styles_adminArea::copyPage()`.
 *
 *   $ADMIN_COPY_PAGE     → outer wrapper. Placeholders:
 *       {INTRO} {SKIN_TABS} {EDIT_FORM_OR_EMPTY}
 *
 *   $ADMIN_COPY_TAB      → single skin tab. Placeholders:
 *       {URL} {ACTIVE_CLASS} {LABEL}
 *
 *   The editing language is driven by e107's top admin language switcher
 *   (i.e. e_LANGUAGE) — no in-page language selector is rendered.
 *
 *   $ADMIN_COPY_FORM     → edit form table. Placeholders:
 *       {ACTION} {TOKEN} {EDIT_STYLE} {EDIT_LANG}
 *       {COL_FIELD} {COL_DEFAULT} {COL_OVERRIDE} {COL_LANGS}
 *       {ROWS} {SAVE_LABEL} {PREVIEW_URL} {PREVIEW_LABEL}
 *
 *   $ADMIN_COPY_ROW      → single field row. Placeholders:
 *       {FIELD} {DEFAULT} {INPUT} {LANG_BADGES}
 *
 *   $ADMIN_COPY_LANGBADGE → small ISO pill listed per row. Placeholders:
 *       {ISO} {NATIVE} {STATE}      (STATE = 'has' | 'missing')
 *
 *   $ADMIN_COPY_EMPTY    → message when a skin has no editable copy.
 *       Placeholders: {MESSAGE}
 *
 * Resolution is done with str_replace passes — no shortcodes required.
 */
if (!defined('e107_INIT')) { exit; }

$ADMIN_COPY_PAGE = '
{INTRO}
<ul class="nav nav-pills sd-copy-skins mb-3" role="tablist">{SKIN_TABS}</ul>
{EDIT_FORM_OR_EMPTY}';

$ADMIN_COPY_TAB = '<li class="nav-item"><a href="{URL}" class="nav-link {ACTIVE_CLASS}">{LABEL}</a></li>';

$ADMIN_COPY_FORM = '
<form method="post" action="{ACTION}">
    {TOKEN}
    <input type="hidden" name="copy_style" value="{EDIT_STYLE}">
    <input type="hidden" name="copy_lang"  value="{EDIT_LANG}">
    <table class="table table-striped sd-copy-table">
        <thead>
            <tr>
                <th class="sd-col-field">{COL_FIELD}</th>
                <th class="sd-col-default">{COL_DEFAULT}</th>
                <th class="sd-col-override">{COL_OVERRIDE}</th>
                <th class="sd-col-langs">{COL_LANGS}</th>
            </tr>
        </thead>
        <tbody>{ROWS}</tbody>
    </table>
    <div class="text-center">
        {SUBMIT_BTN}
        <a href="{PREVIEW_URL}" class="btn btn-default" target="_blank" rel="noopener">
            <i class="fa fa-eye"></i> {PREVIEW_LABEL}
        </a>
    </div>
</form>';

$ADMIN_COPY_ROW = '
<tr>
    <td><code>{FIELD}</code></td>
    <td><span class="text-muted">{DEFAULT}</span></td>
    <td>{INPUT}</td>
    <td class="sd-cell-langs">{LANG_BADGES}</td>
</tr>';

$ADMIN_COPY_LANGBADGE = '<span class="sd-lang-badge sd-lang-{STATE}" title="{NATIVE}">{ISO}</span>';

$ADMIN_COPY_EMPTY = '<div class="alert alert-warning">{MESSAGE}</div>';
