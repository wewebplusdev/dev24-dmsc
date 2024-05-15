

(async () => {
    "use strict";

    // let content_web;
    // await $.getJSON("./webservice_json/content_language_web.json", function (data) {
    //     content_web = data;
    // }).fail(function () {
    //     console.log("An error has occurred. get json fail.");
    // });
    // console.log(language);
    // console.log(content_web);
    const t = {
        en: {
            "Accessibility Menu": "เมนูสำหรับผู้พิการ",
            "Reset settings": "คืนค่าการตั้งค่า",
            Close: "ปิด",
            "Content Adjustments": "การปรับแต่งเนื้อหา",
            "Adjust Font Size": "ปรับขนาดตัวอักษร",
            Default: "ปกติ",
            "Highlight Title": "เน้นชื่อเรื่อง",
            "Highlight Links": "เน้นลิงค์",
            "Readable Font": "Readable Font",
            "Color Adjustments": "การปรับแต่งสี",
            "Dark Contrast": "มืด",
            "Yellow Contrast": "เหลือง",
            "Light Contrast": "สว่าง",
            "High Contrast": "ความคมชัดสูง",
            "High Saturation": "ความอิ่มตัวสูง",
            "Low Saturation": "ความอิ่มตัวต่ำ",
            Monochrome: "ขาว-ดำ",
            Tools: "เครื่องมือ",
            "Reading Guide": "ช่วยการอ่าน",
            "Stop Animations": "หยุดภาพเคลื่อนไหว",
            "Big Cursor": "เคอร์เซอร์ใหญ่",
            "Increase Font Size": "เพิ่มขนาดอักษร",
            "Decrease Font Size": "ลดขนาดอักษร",
            "Letter Spacing": "ขยายระยะห่างตัวอักษร",
            "Line Height": "เพิ่มความสูงตัวอักษร",
            "Font Weight": "ความเข้มตัวอักษร"
        },
        // language: {
        //     "Accessibility Menu": content_web?.wcag_title?.display[language] ? content_web?.wcag_title?.display[language] : "เมนูสำหรับผู้พิการ",
        //     "Reset settings": content_web?.wcag_reset_settings?.display[language] ? content_web?.wcag_reset_settings?.display[language] : "คืนค่าการตั้งค่า",
        //     Close: content_web?.wcag_close?.display[language] ? content_web?.wcag_close?.display[language] : "ปิด",
        //     "Content Adjustments": content_web?.wcag_detail?.display[language] ? content_web?.wcag_detail?.display[language] : "การปรับแต่งเนื้อหา",
        //     "Adjust Font Size": content_web?.wcag_font?.display[language] ? content_web?.wcag_font?.display[language] : "ปรับขนาดตัวอักษร",
        //     Default: content_web?.wcag_default?.display[language] ? content_web?.wcag_default?.display[language] : "ปกติ",
        //     "Highlight Title": content_web?.wcag_highlight_title?.display[language] ? content_web?.wcag_highlight_title?.display[language] : "เน้นชื่อเรื่อง",
        //     "Highlight Links": content_web?.wcag_highlight_links?.display[language] ? content_web?.wcag_highlight_links?.display[language] : "เน้นลิงค์",
        //     "Readable Font": "Readable Font",
        //     "Color Adjustments": content_web?.wcag_color?.display[language] ? content_web?.wcag_color?.display[language] : "การปรับแต่งสี",
        //     "Dark Contrast": content_web?.wcag_dark_contrast?.display[language] ? content_web?.wcag_dark_contrast?.display[language] : "มืด",
        //     "Yellow Contrast": content_web?.wcag_yellow_contrast?.display[language] ? content_web?.wcag_yellow_contrast?.display[language] : "เหลือง",
        //     "Light Contrast": content_web?.wcag_light_contrast?.display[language] ? content_web?.wcag_light_contrast?.display[language] : "สว่าง",
        //     "High Contrast": content_web?.wcag_high_contrast?.display[language] ? content_web?.wcag_high_contrast?.display[language] : "ความคมชัดสูง",
        //     "High Saturation": content_web?.wcag_high_saturation?.display[language] ? content_web?.wcag_high_saturation?.display[language] : "ความอิ่มตัวสูง",
        //     "Low Saturation": content_web?.wcag_low_saturation?.display[language] ? content_web?.wcag_low_saturation?.display[language] : "ความอิ่มตัวต่ำ",
        //     Monochrome: content_web?.wcag_monochrome?.display[language] ? content_web?.wcag_monochrome?.display[language] : "ขาว-ดำ",
        //     Tools: content_web?.wcag_tools?.display[language] ? content_web?.wcag_tools?.display[language] : "เครื่องมือ",
        //     "Reading Guide": content_web?.wcag_reading_guide?.display[language] ? content_web?.wcag_reading_guide?.display[language] : "ช่วยการอ่าน",
        //     "Stop Animations": content_web?.wcag_stop_animations?.display[language] ? content_web?.wcag_stop_animations?.display[language] : "หยุดภาพเคลื่อนไหว",
        //     "Big Cursor": content_web?.wcag_big_cursor?.display[language] ? content_web?.wcag_big_cursor?.display[language] : "เคอร์เซอร์ใหญ่",
        //     "Increase Font Size": content_web?.wcag_Increase_font_size?.display[language] ? content_web?.wcag_Increase_font_size?.display[language] : "เพิ่มขนาดอักษร",
        //     "Decrease Font Size": content_web?.wcag_decrease_font_size?.display[language] ? content_web?.wcag_decrease_font_size?.display[language] : "ลดขนาดอักษร",
        //     "Letter Spacing": content_web?.wcag_letter_spacing?.display[language] ? content_web?.wcag_letter_spacing?.display[language] : "ขยายระยะห่างตัวอักษร",
        //     "Line Height": content_web?.wcag_line_height?.display[language] ? content_web?.wcag_line_height?.display[language] : "เพิ่มความสูงตัวอักษร",
        //     "Font Weight": content_web?.wcag_font_weight?.display[language] ? content_web?.wcag_font_weight?.display[language] : "ความเข้มตัวอักษร"
        // },
    }
        , e = [{
            label: "Monochrome",
            key: "monochrome",
            icon: "filter_b_and_w"
        }, {
            label: "Low Saturation",
            key: "low-saturation",
            icon: "gradient"
        }, {
            label: "High Saturation",
            key: "high-saturation",
            icon: "filter_vintage"
        }, {
            label: "High Contrast",
            key: "high-contrast",
            icon: "tonality"
        }, {
            label: "Light Contrast",
            key: "light-contrast",
            icon: "brightness_5"
        },
        {
            label: "Yellow Contrast",
            key: "yellow-contrast",
            icon: "nightlight"
        },
        {
            label: "Dark Contrast",
            key: "dark-contrast",
            icon: "dark_mode"
        }]
        , i = [{
            label: "Font Weight",
            key: "font-weight",
            icon: "format_bold"
        }, {
            label: "Line Height",
            key: "line-height",
            icon: "format_line_spacing"
        }, {
            label: "Letter Spacing",
            key: "letter-spacing",
            icon: "space_bar"
        }, {
            label: "ดีสเล็กซี่ฟ้อนท์",
            key: "readable-font",
            icon: "spellcheck"
        }, {
            label: "Highlight Links",
            key: "highlight-links",
            icon: "link"
        }, {
            label: "Highlight Title",
            key: "highlight-title",
            icon: "title"
        }]
        , s = [{
            label: "Big Cursor",
            key: "big-cursor",
            icon: "mouse"
        }, {
            label: "Stop Animations",
            key: "stop-animations",
            icon: "motion_photos_off"
        }, {
            label: "Reading Guide",
            key: "readable-guide",
            icon: "local_library"
        }];

    class n {
        constructor(e, content) {
            this.config = {
                ...e
            },
                this.rendered = !1,
                this.settings = {
                    states: {},
                    lang: "en",
                    ...e?.settings
                };
            let i = document.documentElement.lang || "en";
            this.locale = t.en,
                t[i] && (this.settings.lang = i,
                    this.locale = t[i]),
                this.settings?.states && (this.changeControls(),
                    1 !== this.settings.states.fontSize && this.changeFont(null, this.settings.states.fontSize),
                    this.settings.states.contrast && this.changeFilter(this.settings.states.contrast))

            console.log(content);
        }

        toggle() {
            this.rendered || this.render(),
                setTimeout((() => {
                    this.menu.style.display = "block" === this.menu.style.display ? "block" : "block"
                }
                ), 0)
        }
        saveSettings() {
            this.setCookie("asw", JSON.stringify({
                ...this.settings,
                updatedAt: new Date
            }))
        }
        setCookie(t, e, i) {
            const s = new Date;
            s.setTime(s.getTime() + 24 * i * 60 * 60 * 1e3);
            let n = "expires=" + s.toUTCString();
            document.cookie = t + "=" + e + ";" + n + ";path=/"
        }
        render() {
            const n = ``;
            return this.menu = document.createElement("div"),
                this.menu.innerHTML = `<div class="asw-wrapper">
                                        <div class="asw-relative">
                                            <div class="menu-close" style="display: none;"><span class="material-icons">close</span></div>
                                            <div class="asw-widget">
                                                <a href="javascript:void(0);" class="asw-menu-btn" style="bottom:130px;"  title="เมนูสำหรับผู้พิการ" role="button" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25.831" height="49.867"><g><path d="M12.917 9.551a4.776 4.776 0 1 0-4.776-4.776 4.775 4.775 0 0 0 4.776 4.776Z" fill="#fff"/></g><g><path d="m25.634 25.919-5.322-12.206a3.9 3.9 0 0 0-2.96-2.267c-.2-.052-8.675-.052-8.877 0a3.9 3.9 0 0 0-2.955 2.266l-5.322 12.2a2.371 2.371 0 0 0 4.346 1.895l2.006-4.6v24.068a2.587 2.587 0 0 0 5.173 0V31.047h2.382v16.235a2.586 2.586 0 0 0 5.172 0v-24.07l2.007 4.6a2.372 2.372 0 0 0 4.346-1.9Z" fill="#fff"/></g></svg>
                                                </a>
                                            
                                            </div>
                                            <div class="asw-widget">
                                                <a href="javascript:void(0);" class="asw-menu-btn" style="bottom:30px; background: #0084ff" title="เมนูสำหรับผู้พิการ" role="button" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0,0,256,256">
                                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M25,2c-12.69922,0 -23,9.60156 -23,21.5c0,6.30078 2.89844,12.19922 8,16.30078v8.80078l8.60156,-4.5c2.09766,0.59766 4.19922,0.79688 6.39844,0.79688c12.69922,0 23,-9.59766 23,-21.5c0,-11.79687 -10.30078,-21.39844 -23,-21.39844zM27.30078,30.60156l-5.80078,-6.20312l-10.80078,6.10156l12,-12.69922l5.90234,5.89844l10.5,-5.89844z"></path></g></g>
                                                </svg>
                                                </a>
                                            
                                            </div>
                                            <div class="asw-menu">
                                                <div class="asw-menu-header">
                                                    <div class="asw-translate">เมนูสำหรับผู้พิการ</div>
                                                    <div>
                                                        <div role="button" class="asw-menu-reset" title="เคลียร์การตั้งค่า"><span class="material-icons">restart_alt</span></div>
                                                        <div role="button" class="asw-menu-close" title="ปิด" style=""><span class="material-icons">close</span></div>
                                                    </div>
                                                </div>
                                                <div class="asw-menu-content">
                                                    <div class="asw-card">
                                                        <div class="asw-card-title">การปรับแต่งเนื้อหา</div>
                                                        <div class="asw-adjust-font">
                                                            <div class="asw-label" style="margin:0"><span class="material-icons" style="margin-right:8px">format_size</span>
                                                                <div class="asw-translate">ปรับขนาดตัวอักษร</div>
                                                            </div>
                                                            <div>
                                                                <div class="asw-minus" data-key="font-size" role="button" aria-pressed="false" title="Decrease Font Size"><span class="material-icons">remove</span></div>
                                                                <div class="asw-amount" style="font-weight:400">Default</div>
                                                                <div class="asw-plus" data-key="font-size" role="button" aria-pressed="false" title="Increase Font Size"><span class="material-icons">add</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="asw-items content"></div>
                                                    </div>
                                                    <div class="asw-card">
                                                        <div class="asw-card-title">การปรับแต่งสี</div>
                                                        <div class="asw-items contrast"></div>
                                                    </div>
                                                    <div class="asw-card">
                                                        <div class="asw-card-title">เครื่องมือ</div>
                                                        <div class="asw-items tools"></div>
                                                    </div>
                                                </div>
                                                <div class="asw-footer">
                                                    <div style="text-decoration : none;">กรมวิทยาศาสตร์การแพทย์ กระทรวงสาธารณสุข</div>
                                                </div>
                                            </div>
                                            <div class="asw-overlay"></div>
                                        </div>
                                    </div>`,

                this.menu.querySelector(".content").innerHTML = this._createButtons(i),
                this.menu.querySelector(".tools").innerHTML = this._createButtons(s, "asw-tools"),
                this.menu.querySelector(".contrast").innerHTML = this._createButtons(e, "asw-filter"),
                this.menu.querySelector(".asw-menu-close").addEventListener("click", (() => {
                    this.close()
                }
                )),
                this.menu.querySelector(".asw-overlay").addEventListener("click", (() => {
                    this.close()
                }
                )),
                this.menu.querySelectorAll(".asw-btn").forEach((t => {
                    t.addEventListener("click", (e => {
                        this.clickItem(t)
                    }
                    ))
                }
                )),
                this.menu.querySelectorAll(".asw-adjust-font div[role='button']").forEach((t => {
                    t.addEventListener("click", (() => {
                        this.changeFont(t),
                            this.saveSettings()
                    }
                    ))
                }
                )),
                this.menu.querySelector(".asw-menu-reset").addEventListener("click", (() => {
                    this.reset()
                }
                )),
                // this.menu.querySelector("select").value = this.settings.lang,
                // this.menu.querySelector("select").addEventListener("change", (e=>{
                //     this.settings.lang = e.target.value,
                //     this.locale = t[this.settings.lang] || t.en,
                //     this.saveSettings(),
                //     this.translate()
                // }
                // )),
                // this.menu.querySelector(".asw-footer a").setAttribute("href", n),
                this.translate(),
                this.config.container.appendChild(this.menu),
                this.rendered = !0,
                this
        }
        reset() {
            this.settings.states = {},
                this.changeFilter(),
                // this.changeFilterYellow(),
                this.changeControls(),
                this.changeFont(void 0, 1),
                this.saveSettings(),
                this.menu.querySelectorAll(".asw-btn").forEach((t => {
                    t.classList.remove("asw-selected")
                }
                )),
                this.translate()
        }
        changeFont(t, e) {
            !e && t && (e = parseFloat(this.settings.states.fontSize) || 1,
                t.classList.contains("asw-minus") ? e -= .1 : e += .1,
                e = Math.max(e, .1),
                e = Math.min(e, 2),
                e = parseFloat(e.toFixed(2))),
                document.querySelectorAll("h1,h3,h4,h5,h6,p,a,dl,dt,li,ol,th,td,span,blockquote,.asw-text").forEach((function (t) {
                    if (!t.classList.contains("material-icons")) {
                        let i = t.getAttribute("data-asw-orgFontSize");
                        i || (i = parseInt(window.getComputedStyle(t, null).getPropertyValue("font-size")),
                            t.setAttribute("data-asw-orgFontSize", i));
                        let s = i * e;
                        t.style["font-size"] = s + "px"
                    }
                }
                )),
                this.settings.states.fontSize = e,
                this.translate()
        }
        clickItem(t) {
            let e = t.dataset.key;
            t.classList.contains("asw-filter") ? (document.querySelectorAll(".asw-filter").forEach((function (t) {
                t.classList.remove("asw-selected")
            }
            )),
                this.settings.states.contrast = this.settings.states.contrast !== e && e,
                this.settings.states.contrast && t.classList.add("asw-selected"),
                this.changeFilter(this.settings.states.contrast)) : (this.settings.states[e] = !this.settings.states[e],
                    t.classList.toggle("asw-selected", this.settings.states[e]),


                    this.changeControls()),
                this.saveSettings()

            console.log(e)
        }

        close() {
            // this.menu.style.display = "block"
            this.menu.querySelectorAll("div > .asw-wrapper").forEach((t => {
                t.classList.remove("active")
            }
            ))
        }

        // clickItemYellow(t) {
        //     let e = t.dataset.key;
        //     t.classList.contains("asw-filter") ? (document.querySelectorAll(".asw-filter").forEach((function(t) {
        //         t.classList.remove("asw-selected")
        //     }
        //     )),
        //     this.settings.states.contrast = this.settings.states.contrast !== e && e,
        //     this.settings.states.contrast && t.classList.add("asw-selected"),
        //     this.changeFilterYellow(this.settings.states.contrast)) : (this.settings.states[e] = !this.settings.states[e],
        //     t.classList.toggle("asw-selected", this.settings.states[e]),


        //     this.changeControls()),
        //     this.saveSettings()

        //     console.log(e)
        // }

        changeControls() {
            let t = [{
                id: "highlight-title",
                childrenSelector: ["h1", "h2", "h3", "h4", "h5", "h6"],
                css: "outline: 2px solid #0067B3 !important;outline-offset: 2px !important;"
            }, {
                id: "highlight-links",
                childrenSelector: ["a[href]"],
                css: "outline: 2px solid #0067B3 !important;outline-offset: 2px !important;"
            }, {
                id: "readable-font",
                childrenSelector: ["h1", "h2", "h3", "h4", "h5", "h6", "img", "p", "svg", "a", "button", "label", "li", "ol", ".wsite-headline", ".wsite-content-title"],
                css: "font-family: OpenDyslexic3,Comic Sans MS,Arial,Helvetica,sans-serif !important;"
            }, {
                id: "letter-spacing",
                childrenSelector: ["", ":not(.asw-wrapper *)"],
                css: "letter-spacing: 2px!important;"
            }, {
                id: "line-height",
                childrenSelector: ["h4", "p"],
                css: "line-height: 1.4em!important;"
            }, {
                id: "font-weight",
                childrenSelector: ["", ":not(.asw-wrapper *)"],
                css: "font-weight: 700!important;"
            }]
                , e = "";
            for (var i = t.length; i--;) {
                let n = t[i];
                if (document.documentElement.classList.toggle(n.id, !!this.settings.states[n.id]),
                    this.settings.states[n.id])
                    for (var s = n.childrenSelector.length; s--;)
                        e += "." + n.id + " " + n.childrenSelector[s] + "{" + n.css + "}"
            }
            var n = document.querySelector(".asw-rg-container");
            if (this.settings.states["readable-guide"]) {
                if (!n) {
                    var a = document.createElement("div");
                    a.setAttribute("class", "asw-rg-container"),
                        a.innerHTML = '\n<style>.asw-rg {position: fixed;top: 0;left: 0;right: 0;width: 100%;height: 0;pointer-events: none;background-color: rgba(0,0,0,.5);z-index: 1000000;}\n</style>\n<div class="asw-rg asw-rg-top"></div>\n<div class="asw-rg asw-rg-bottom" style="top: auto;bottom: 0;"></div>\n';
                    let t = a.querySelector(".asw-rg-top")
                        , e = a.querySelector(".asw-rg-bottom")
                        , i = 20;
                    window.onScrollReadableGuide = function (s) {
                        t.style.height = s.clientY - i + "px",
                            e.style.height = window.innerHeight - s.clientY - i - i + "px"
                    }
                        ,
                        document.addEventListener("mousemove", window.onScrollReadableGuide, {
                            passive: !1
                        }),
                        document.body.appendChild(a)
                }
            } else
                n && (n.remove(),
                    document.removeEventListener("mousemove", window.onScrollReadableGuide));
            this.settings.states["stop-animations"] && (e += `\nbody * {\n ${this.getFilterCSS("none !important", "transition")}\n ${this.getFilterCSS("forwards !important", "animation-fill-mode")}\n ${this.getFilterCSS("1 !important", " animation-iteration-count")}\n ${this.getFilterCSS(".01s !important", "animation-duration")}\n}\n`),
                this.settings.states["big-cursor"] && (e += "\nbody * {\ncursor: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='64' height='64' viewBox='0 0 512 512'%3E%3Cpath  d='M429.742 319.31L82.49 0l-.231 471.744 105.375-100.826 61.89 141.083 96.559-42.358-61.89-141.083 145.549-9.25zM306.563 454.222l-41.62 18.259-67.066-152.879-85.589 81.894.164-333.193 245.264 225.529-118.219 7.512 67.066 152.878z' xmlns='http://www.w3.org/2000/svg'/%3E%3C/svg%3E\") ,default !important;\n}\n"),
                this.settings.states["readable-font"] && (e += '\n@font-face {\nfont-family: OpenDyslexic3;\nsrc: url("https://website-widgets.pages.dev/fonts/OpenDyslexic3-Regular.woff") format("woff"), url("https://website-widgets.pages.dev/fonts/OpenDyslexic3-Regular.ttf") format("truetype");\n}\n'),
                this.addStyleSheet(e, "asw-content-style")
        }
        addStyleSheet(t, e) {
            let i = document.getElementById(e || "") || document.createElement("style");
            i.innerHTML = t,
                i.id || (i.id = e,
                    document.head.appendChild(i))
        }
        getFilterCSS(t, e) {
            let i = ""
                , s = ["-o-", "-ms-", "-moz-", "-webkit", ""];
            for (var n = s.length; n--;)
                i += s[n] + (e || "filter") + ":" + t + ";";
            return i
        }
        translate() {
            this.menu && (this.menu.querySelectorAll("[title]").forEach((t => {
                let e = t.getAttribute("data-translate");
                e || (e = t.getAttribute("title"),
                    t.setAttribute("data-translate", e)),
                    e = this.locale?.[e] || e,
                    t.setAttribute("title", e)
            }
            )),
                this.menu.querySelector(".asw-amount").innerHTML = this.settings.states.fontSize && 1 != this.settings.states.fontSize ? `${parseInt(100 * this.settings.states.fontSize)}%` : this.locale?.Default || "Default",
                this.menu.querySelectorAll(".asw-card-title, .asw-translate").forEach((t => {
                    let e = t.getAttribute("data-translate");
                    e || (e = String(t.innerText || "").trim(),
                        t.setAttribute("data-translate", e)),
                        e = this.locale?.[e] || e,
                        t.innerText = e
                }
                )))
        }
        changeFilter(t) {
            let e = "";
            if (t) {
                let s = "";
                // "dark-contrast" == t ? s = "color: #fff !important;fill: #FFF !important;background-color: #000 !important;" : 

                // "yellow-contrast" == t ? s = "color: #ff0 !important;fill:; background-color: #000 !important;" : 

                "light-contrast" == t ? s = " color: #000 !important;fill: #000 !important;background-color: #FFF !important;" :
                    // "high-contrast" == t ? s += this.getFilterCSS("contrast(125%)") : 
                    "high-contrast" == t ? s = " filter: contrast(125%);" :
                        "high-saturation" == t ? s += this.getFilterCSS("saturate(200%)") :
                            "low-saturation" == t ? s += this.getFilterCSS("saturate(50%)") :
                                "monochrome" == t && (s += this.getFilterCSS("grayscale(100%)"));
                let n = [""];

                "high-contrast" != t && "light-contrast" != t || (n = [
                    "body",
                ]);
                // "dark-contrast" != t && "light-contrast" != t || (n = 
                //     [
                //         "body", 
                //         "h1", 
                //         "h2", 
                //         "h3", 
                //         "h4", 
                //         "h5", 
                //         "h6", 
                //         "img", 
                //         "p", 
                //         "i", 
                //         "svg", 
                //         "a", 
                //         "button", 
                //         "label", 
                //         "li", 
                //         "ol",
                //         ".text-gradient-primary"
                //     ]
                // );
                // "yellow-contrast" != t && "light-contrast" != t || (n = 
                //     [
                //         ".layout-header .navbar", 
                //         "body", 
                //         "h1", 
                //         "h2", 
                //         "h3", 
                //         "h4", 
                //         "h5", 
                //         "h6", 
                //         "img", 
                //         "p", 
                //         "i", 
                //         "svg", 
                //         "a", 
                //         "button", 
                //         "label", 
                //         "li", 
                //         "ol",
                //         ".text-gradient-primary"
                //     ]
                // );
                for (var i = n.length; i--;)
                    e += '[data-asw-filter="' + t + '"] ' + n[i] + "{" + s + "}"
            }
            this.addStyleSheet(e, "asw-filter-style"),
                t ? document.documentElement.setAttribute("data-asw-filter", t) : document.documentElement.removeAttribute("data-asw-filter", t)
        }

        _createButtons(t, e) {
            let i = "";
            for (var s = t.length; s--;) {
                let n = t[s]
                    , a = this.settings.states[n.key];
                "asw-filter" == e && this.settings.states.contrast == n.key && (a = !0),
                    i += `\n<button class="asw-btn ${e || ""} ${a ? "asw-selected" : ""}" type="button" data-key="${n.key}" title="${n.label}">\n<span class="material-icons">${n.icon}</span>\n<span class="asw-translate">${n.label}</span>\n</button>\n`
            }
            return i
        }
    }

    document.addEventListener("DOMContentLoaded", (() => {
        // alert("Hello! I am an alert box!!"); 
        let t, e = document.createElement("div");
        e.innerHTML = '<div class="asw-widget -mb"> <a href="javascript:void(0);" class="asw-menu-btn-mobile" title="เมนูสำหรับผู้พิการ" role="button" aria-expanded="false"> <svg xmlns="http://www.w3.org/2000/svg" style="fill:#fff" viewBox="0 0 24 24" width="30px" height="30px"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.5 6c-2.61.7-5.67 1-8.5 1s-5.89-.3-8.5-1L3 8c1.86.5 4 .83 6 1v13h2v-6h2v6h2V9c2-.17 4.14-.5 6-1l-.5-2zM12 6c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/></svg> </a> </div>';
        let i = function (t) {
            let e = "asw="
                , i = decodeURIComponent(document.cookie).split(";");
            for (let t = 0; t < i.length; t++) {
                let s = i[t];
                for (; " " == s.charAt(0);)
                    s = s.substring(1);
                if (0 == s.indexOf(e))
                    return s.substring(e.length, s.length)
            }
            return ""
        }();
        if (i)
            try {
                i = JSON.parse(i)
            } catch (t) { }
        i?.states && (t = new n({
            container: e,
            settings: i
        }));

        // show เลย
        t = new n({
            container: e
        }).render()
        document.body.appendChild(e)

    }
    ));
}
)();

