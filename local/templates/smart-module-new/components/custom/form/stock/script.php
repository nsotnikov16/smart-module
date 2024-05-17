<? global $days, $hours, $minutes, $seconds; ?>
<script type="text/javascript" data-skip-moving="true">
    (function() {
        var _id = "6cd91e0e0899178fc878278f6dbfc92b";
        while (document.getElementById("timer" + _id)) _id = _id + "0";
        document.write("<div id='timer" + _id + "' style='min-width:262px;height:64px;'></div>");
        var _t = document.createElement("script");
        _t.src = "https://megatimer.ru/timer/timer.min.js";
        var _f = function(_k) {
            var l = new MegaTimer(_id, {
                "view": [1, 1, 1, 1],
                "type": {
                    "currentType": "2",
                    "params": {
                        "startByFirst": true,
                        "days": "<?= $days ?>",
                        "hours": "<?= $hours ?>",
                        "minutes": "<?= $minutes ?>",
                        "seconds": "<?= $seconds ?>",
                        "utc": 0
                    }
                },
                "design": {
                    "type": "circle",
                    "params": {
                        "width": "2",
                        "radius": "29",
                        "line": "solid",
                        "line-color": "#507298",
                        "background": "solid",
                        "background-color": "#f9f9f9",
                        "direction": "direct",
                        "number-font-family": {
                            "family": "Open Sans",
                            "link": "<link href='//fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic' rel='stylesheet' type='text/css'>"
                        },
                        "number-font-size": "14",
                        "number-font-color": "#000000",
                        "separator-margin": "0",
                        "separator-on": false,
                        "separator-text": ":",
                        "text-on": true,
                        "text-font-family": {
                            "family": "Open Sans",
                            "link": "<link href='//fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic' rel='stylesheet' type='text/css'>"
                        },
                        "text-font-size": "14",
                        "text-font-color": "#000000"
                    }
                },
                "designId": 7,
                "theme": "white",
                "width": 262,
                "height": 64
            });
            if (_k != null) l.run();
        };
        _t.onload = _f;
        _t.onreadystatechange = function() {
            if (_t.readyState == "loaded") _f(1);
        };
        var _h = document.head || document.getElementsByTagName("head")[0];
        _h.appendChild(_t);
    }).call(this);
</script>