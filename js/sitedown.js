/*
 * Sitedown Styles — front-end JS
 *
 * Public API:
 *   SitedownStyles.initCountdown(timestampMs)
 *     Drives #days/#hours/#minutes/#seconds. Stops at zero.
 *
 *   SitedownStyles.initNewsletter(doneLabel)
 *     Wires the .ss-newsletter-form submit handler. Fakes a successful
 *     subscription (UI only) — connect to a real endpoint later by
 *     replacing the body of the success branch.
 *
 * @package sitedown_styles
 * @since   2.0.0
 */
(function (window, document) {
    'use strict';

    var SS = window.SitedownStyles = window.SitedownStyles || {};

    // ----- Countdown -------------------------------------------------------
    SS.initCountdown = function (timestampMs) {
        var $d = document.getElementById('days');
        var $h = document.getElementById('hours');
        var $m = document.getElementById('minutes');
        var $s = document.getElementById('seconds');
        if (!$d || !$h || !$m || !$s) { return; }

        var launch = new Date(timestampMs);

        function pad(n) { return String(n).padStart(2, '0'); }

        function tick() {
            var diff = launch - new Date();
            if (diff <= 0) {
                $d.textContent = '00';
                $h.textContent = '00';
                $m.textContent = '00';
                $s.textContent = '00';
                clearInterval(SS._cdTimer);
                return;
            }
            var days    = Math.floor(diff / 86400000);
            var hours   = Math.floor((diff % 86400000) / 3600000);
            var minutes = Math.floor((diff % 3600000) / 60000);
            var seconds = Math.floor((diff % 60000) / 1000);
            $d.textContent = pad(days);
            $h.textContent = pad(hours);
            $m.textContent = pad(minutes);
            $s.textContent = pad(seconds);
        }

        tick();
        SS._cdTimer = setInterval(tick, 1000);
    };

    // ----- Newsletter ------------------------------------------------------
    SS.initNewsletter = function (doneLabel) {
        var forms = document.querySelectorAll('.ss-newsletter-form');
        if (!forms.length) { return; }

        Array.prototype.forEach.call(forms, function (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                var btn = form.querySelector('.ss-btn');
                if (!btn) { return false; }
                var original = btn.textContent;
                btn.textContent = doneLabel || 'Subscribed!';
                btn.style.background = '#059669';
                setTimeout(function () {
                    btn.textContent  = original;
                    btn.style.background = '';
                    form.reset();
                }, 3000);
                return false;
            });
        });
    };

}(window, document));
