<?php
/**
 * Sitedown Styles — Admin Templates Gallery template.
 *
 * Defines two HTML strings consumed by `sitedown_styles_adminArea::templatesPage()`:
 *
 *   $ADMIN_TEMPLATES_GRID  → outer form + grid wrapper. Placeholders:
 *       {FORM_ACTION} {FORM_TOKEN} {CARDS} {SAVE_LABEL}
 *
 *   $ADMIN_TEMPLATE_CARD   → single card markup. Placeholders:
 *       {KEY} {ACTIVE_CLASS} {CHECKED} {NAME} {DESC} {TAGS}
 *       {PREVIEW_MEDIA} {PREVIEW_URL} {PREVIEW_LABEL} {ACTIVE_BADGE}
 *
 *   $ADMIN_TEMPLATE_THUMB    → preview when a thumbnail image exists.
 *       Placeholders: {THUMB_URL} {NAME}
 *
 *   $ADMIN_TEMPLATE_FALLBACK → preview when no thumbnail (icon + gradient).
 *       Placeholders: {COLOR} {ICON}
 *
 *   $ADMIN_TEMPLATE_BADGE  → "active" pill, only injected on the selected card.
 *       Placeholders: {ACTIVE_LABEL}
 *
 * Resolution is done with a simple str_replace pass — no shortcodes required.
 */
if (!defined('e107_INIT')) { exit; }

$ADMIN_TEMPLATES_GRID = '
<form method="post" action="{FORM_ACTION}">
    {FORM_TOKEN}
    <div class="sitedown-templates-grid">
        {CARDS}
    </div>
    <div class="form-group mt-4 text-center">
        {SUBMIT_BTN}
    </div>
</form>';

$ADMIN_TEMPLATE_CARD = '
<div class="sitedown-template-card {ACTIVE_CLASS}" data-style="{KEY}">
    <div class="template-preview">
        {PREVIEW_MEDIA}
        <div class="template-overlay">
            <a href="{PREVIEW_URL}" class="btn btn-sm btn-light" target="_blank" rel="noopener">
                <i class="fa fa-eye"></i> {PREVIEW_LABEL}
            </a>
        </div>
    </div>
    <div class="template-info">
        <div class="template-radio">
            <input type="radio" name="template_style" value="{KEY}" id="tpl_{KEY}" {CHECKED}>
        </div>
        <label for="tpl_{KEY}" class="template-label">
            <h4 class="template-name">{NAME}</h4>
            <p class="template-desc">{DESC}</p>
            <div class="template-tags">{TAGS}</div>
        </label>
    </div>
    {ACTIVE_BADGE}
</div>';

$ADMIN_TEMPLATE_THUMB = '<img src="{THUMB_URL}" alt="{NAME}" class="template-preview-img" loading="lazy">';

$ADMIN_TEMPLATE_FALLBACK = '
<div class="template-preview-fallback" style="background: linear-gradient(135deg, {COLOR}22, {COLOR}55);">
    <i class="fa {ICON} template-icon" style="color: {COLOR};"></i>
</div>';

$ADMIN_TEMPLATE_BADGE = '<div class="active-badge"><i class="fa fa-check"></i> {ACTIVE_LABEL}</div>';
