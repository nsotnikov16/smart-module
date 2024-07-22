<!-- BEGIN Neiros code-->
<script data-skip-moving="true">
    (function(w, d, h) {
        ni = d.cookie.match(/neiros_id=(.+?)(;|$)/);
        nv = d.cookie.match(/neiros_visit=(.+?)(;|$)/);
        if (ni) {
            ni = ni[1];
        }
        if (nv) {
            nv = nv[1];
        }
        var _mkey = "df65ab260fc492b79b97dc21ec31b44d_36";
        url = "https://neiros.cloud/api/widget_site/getv2/" + _mkey + "?ni=" + ni + "&nv=" + nv + "&referrer=" + encodeURIComponent(document.referrer) + "&URl=" + encodeURIComponent(d.location.href);
        let scr = {
            "scripts": [{
                "src": url,
                "async": false
            }]
        };
        console.log(scr);
        console.log(url);
        ! function(t, n, r) {
            "use strict";
            var c = function(t) {
                if ("[object Array]" !== Object.prototype.toString.call(t)) return !1;
                for (var r = 0; r < t.length; r++) {
                    var c = n.createElement("script"),
                        e = t[r];
                    c.src = e.src, c.async = e.async, n.body.appendChild(c)
                }
                return !0
            };
            t.addEventListener ? t.addEventListener("DOMContentLoaded", function() {
                c(r.scripts);
            }, !1) : t.attachEvent ? t.attachEvent("onload", function() {
                c(r.scripts)
            }) : t.onload = function() {
                c(r.scripts)
            }
        }(window, document, scr);
    })(window, document, "neiros.cloud");
</script>
<noscript><img src="https://neiros.cloud/api/noscript/63d173695571256f3cd37660e7dbbde7_12" alt="neiros" /> </noscript>
<!-- END Neiros code -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript" data-skip-moving="true">
	(function (m, e, t, r, i, k, a) {
		m[i] = m[i] || function () { (m[i].a = m[i].a || []).push(arguments) };
		m[i].l = 1 * new Date();
		for (var j = 0; j < document.scripts.length; j++) { if (document.scripts[j].src === r) { return; } }
		k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
	})
		(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

	ym(45525420, "init", {
		clickmap: true,
		trackLinks: true,
		accurateTrackBounce: true,
		webvisor: true
	});
</script>
<noscript>
	<div><img src="https://mc.yandex.ru/watch/45525420" style="position:absolute; left:-9999px;" alt="" /></div>
</noscript>
<!-- /Yandex.Metrika counter -->