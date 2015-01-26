var URL_PATH_PATTENT = 'img/samples/'
function toggle_frame(state) {
    state ? ($scope.styles.css.items = {
        background: "#fff"
    }, $scope.styles.css.item_inner = {
        margin: 10
    }, delete $scope.styles["class"].item_inner) : ($scope.styles.css.items = {
        background: "none"
    }, $scope.styles.css.item_inner = {
        margin: 0
    }, $scope.styles["class"].item_inner = "frame_none")
}

function item_hover(flag) {
    flag ? ($("#item_list").removeClass("hover_style"), $(".items").each(function() {
        $(this).unbind("mouseenter").unbind("mouseleave"), $(this).find(".data").css({
            display: "block",
            opacity: 1
        })
    })) : ($("#item_list").addClass("hover_style"), $(".items").each(function() {
        $(this).find(".data").css({
            display: "none"
        }), $(this).bind("mouseenter", function() {
            $(this).find(".data").fadeIn(200)
        }).bind("mouseleave", function() {
            $(this).find(".data").fadeOut(200)
        })
    })), $("dd.name").tile()
}

function change_active_element(self, target_selector) {
        $(target_selector).removeClass("active"), $(self).addClass("active")
    }! function(e, t) {
        function _(e) {
            var t = M[e] = {};
            return v.each(e.split(y), function(e, n) {
                t[n] = !0
            }), t
        }

        function H(e, n, r) {
            if (r === t && 1 === e.nodeType) {
                var i = "data-" + n.replace(P, "-$1").toLowerCase();
                if (r = e.getAttribute(i), "string" == typeof r) {
                    try {
                        r = "true" === r ? !0 : "false" === r ? !1 : "null" === r ? null : +r + "" === r ? +r : D.test(r) ? v.parseJSON(r) : r
                    } catch (s) {}
                    v.data(e, n, r)
                } else r = t
            }
            return r
        }

        function B(e) {
            var t;
            for (t in e)
                if (("data" !== t || !v.isEmptyObject(e[t])) && "toJSON" !== t) return !1;
            return !0
        }

        function et() {
            return !1
        }

        function tt() {
            return !0
        }

        function ut(e) {
            return !e || !e.parentNode || 11 === e.parentNode.nodeType
        }

        function at(e, t) {
            do e = e[t]; while (e && 1 !== e.nodeType);
            return e
        }

        function ft(e, t, n) {
            if (t = t || 0, v.isFunction(t)) return v.grep(e, function(e, r) {
                var i = !!t.call(e, r, e);
                return i === n
            });
            if (t.nodeType) return v.grep(e, function(e) {
                return e === t === n
            });
            if ("string" == typeof t) {
                var r = v.grep(e, function(e) {
                    return 1 === e.nodeType
                });
                if (it.test(t)) return v.filter(t, r, !n);
                t = v.filter(t, r)
            }
            return v.grep(e, function(e) {
                return v.inArray(e, t) >= 0 === n
            })
        }

        function lt(e) {
            var t = ct.split("|"),
                n = e.createDocumentFragment();
            if (n.createElement)
                for (; t.length;) n.createElement(t.pop());
            return n
        }

        function Lt(e, t) {
            return e.getElementsByTagName(t)[0] || e.appendChild(e.ownerDocument.createElement(t))
        }

        function At(e, t) {
            if (1 === t.nodeType && v.hasData(e)) {
                var n, r, i, s = v._data(e),
                    o = v._data(t, s),
                    u = s.events;
                if (u) {
                    delete o.handle, o.events = {};
                    for (n in u)
                        for (r = 0, i = u[n].length; i > r; r++) v.event.add(t, n, u[n][r])
                }
                o.data && (o.data = v.extend({}, o.data))
            }
        }

        function Ot(e, t) {
            var n;
            1 === t.nodeType && (t.clearAttributes && t.clearAttributes(), t.mergeAttributes && t.mergeAttributes(e), n = t.nodeName.toLowerCase(), "object" === n ? (t.parentNode && (t.outerHTML = e.outerHTML), v.support.html5Clone && e.innerHTML && !v.trim(t.innerHTML) && (t.innerHTML = e.innerHTML)) : "input" === n && Et.test(e.type) ? (t.defaultChecked = t.checked = e.checked, t.value !== e.value && (t.value = e.value)) : "option" === n ? t.selected = e.defaultSelected : "input" === n || "textarea" === n ? t.defaultValue = e.defaultValue : "script" === n && t.text !== e.text && (t.text = e.text), t.removeAttribute(v.expando))
        }

        function Mt(e) {
            return "undefined" != typeof e.getElementsByTagName ? e.getElementsByTagName("*") : "undefined" != typeof e.querySelectorAll ? e.querySelectorAll("*") : []
        }

        function _t(e) {
            Et.test(e.type) && (e.defaultChecked = e.checked)
        }

        function Qt(e, t) {
            if (t in e) return t;
            for (var n = t.charAt(0).toUpperCase() + t.slice(1), r = t, i = Jt.length; i--;)
                if (t = Jt[i] + n, t in e) return t;
            return r
        }

        function Gt(e, t) {
            return e = t || e, "none" === v.css(e, "display") || !v.contains(e.ownerDocument, e)
        }

        function Yt(e, t) {
            for (var n, r, i = [], s = 0, o = e.length; o > s; s++) n = e[s], n.style && (i[s] = v._data(n, "olddisplay"), t ? (!i[s] && "none" === n.style.display && (n.style.display = ""), "" === n.style.display && Gt(n) && (i[s] = v._data(n, "olddisplay", nn(n.nodeName)))) : (r = Dt(n, "display"), !i[s] && "none" !== r && v._data(n, "olddisplay", r)));
            for (s = 0; o > s; s++) n = e[s], n.style && (t && "none" !== n.style.display && "" !== n.style.display || (n.style.display = t ? i[s] || "" : "none"));
            return e
        }

        function Zt(e, t, n) {
            var r = Rt.exec(t);
            return r ? Math.max(0, r[1] - (n || 0)) + (r[2] || "px") : t
        }

        function en(e, t, n, r) {
            for (var i = n === (r ? "border" : "content") ? 4 : "width" === t ? 1 : 0, s = 0; 4 > i; i += 2) "margin" === n && (s += v.css(e, n + $t[i], !0)), r ? ("content" === n && (s -= parseFloat(Dt(e, "padding" + $t[i])) || 0), "margin" !== n && (s -= parseFloat(Dt(e, "border" + $t[i] + "Width")) || 0)) : (s += parseFloat(Dt(e, "padding" + $t[i])) || 0, "padding" !== n && (s += parseFloat(Dt(e, "border" + $t[i] + "Width")) || 0));
            return s
        }

        function tn(e, t, n) {
            var r = "width" === t ? e.offsetWidth : e.offsetHeight,
                i = !0,
                s = v.support.boxSizing && "border-box" === v.css(e, "boxSizing");
            if (0 >= r || null == r) {
                if (r = Dt(e, t), (0 > r || null == r) && (r = e.style[t]), Ut.test(r)) return r;
                i = s && (v.support.boxSizingReliable || r === e.style[t]), r = parseFloat(r) || 0
            }
            return r + en(e, t, n || (s ? "border" : "content"), i) + "px"
        }

        function nn(e) {
            if (Wt[e]) return Wt[e];
            var t = v("<" + e + ">").appendTo(i.body),
                n = t.css("display");
            return t.remove(), ("none" === n || "" === n) && (Pt = i.body.appendChild(Pt || v.extend(i.createElement("iframe"), {
                frameBorder: 0,
                width: 0,
                height: 0
            })), Ht && Pt.createElement || (Ht = (Pt.contentWindow || Pt.contentDocument).document, Ht.write("<!doctype html><html><body>"), Ht.close()), t = Ht.body.appendChild(Ht.createElement(e)), n = Dt(t, "display"), i.body.removeChild(Pt)), Wt[e] = n, n
        }

        function fn(e, t, n, r) {
            var i;
            if (v.isArray(t)) v.each(t, function(t, i) {
                n || sn.test(e) ? r(e, i) : fn(e + "[" + ("object" == typeof i ? t : "") + "]", i, n, r)
            });
            else if (n || "object" !== v.type(t)) r(e, t);
            else
                for (i in t) fn(e + "[" + i + "]", t[i], n, r)
        }

        function Cn(e) {
            return function(t, n) {
                "string" != typeof t && (n = t, t = "*");
                var r, i, s, o = t.toLowerCase().split(y),
                    u = 0,
                    a = o.length;
                if (v.isFunction(n))
                    for (; a > u; u++) r = o[u], s = /^\+/.test(r), s && (r = r.substr(1) || "*"), i = e[r] = e[r] || [], i[s ? "unshift" : "push"](n)
            }
        }

        function kn(e, n, r, i, s, o) {
            s = s || n.dataTypes[0], o = o || {}, o[s] = !0;
            for (var u, a = e[s], f = 0, l = a ? a.length : 0, c = e === Sn; l > f && (c || !u); f++) u = a[f](n, r, i), "string" == typeof u && (!c || o[u] ? u = t : (n.dataTypes.unshift(u), u = kn(e, n, r, i, u, o)));
            return (c || !u) && !o["*"] && (u = kn(e, n, r, i, "*", o)), u
        }

        function Ln(e, n) {
            var r, i, s = v.ajaxSettings.flatOptions || {};
            for (r in n) n[r] !== t && ((s[r] ? e : i || (i = {}))[r] = n[r]);
            i && v.extend(!0, e, i)
        }

        function An(e, n, r) {
            var i, s, o, u, a = e.contents,
                f = e.dataTypes,
                l = e.responseFields;
            for (s in l) s in r && (n[l[s]] = r[s]);
            for (;
                "*" === f[0];) f.shift(), i === t && (i = e.mimeType || n.getResponseHeader("content-type"));
            if (i)
                for (s in a)
                    if (a[s] && a[s].test(i)) {
                        f.unshift(s);
                        break
                    }
            if (f[0] in r) o = f[0];
            else {
                for (s in r) {
                    if (!f[0] || e.converters[s + " " + f[0]]) {
                        o = s;
                        break
                    }
                    u || (u = s)
                }
                o = o || u
            }
            return o ? (o !== f[0] && f.unshift(o), r[o]) : void 0
        }

        function On(e, t) {
            var n, r, i, s, o = e.dataTypes.slice(),
                u = o[0],
                a = {},
                f = 0;
            if (e.dataFilter && (t = e.dataFilter(t, e.dataType)), o[1])
                for (n in e.converters) a[n.toLowerCase()] = e.converters[n];
            for (; i = o[++f];)
                if ("*" !== i) {
                    if ("*" !== u && u !== i) {
                        if (n = a[u + " " + i] || a["* " + i], !n)
                            for (r in a)
                                if (s = r.split(" "), s[1] === i && (n = a[u + " " + s[0]] || a["* " + s[0]])) {
                                    n === !0 ? n = a[r] : a[r] !== !0 && (i = s[0], o.splice(f--, 0, i));
                                    break
                                }
                        if (n !== !0)
                            if (n && e["throws"]) t = n(t);
                            else try {
                                t = n(t)
                            } catch (l) {
                                return {
                                    state: "parsererror",
                                    error: n ? l : "No conversion from " + u + " to " + i
                                }
                            }
                    }
                    u = i
                }
            return {
                state: "success",
                data: t
            }
        }

        function Fn() {
            try {
                return new e.XMLHttpRequest
            } catch (t) {}
        }

        function In() {
            try {
                return new e.ActiveXObject("Microsoft.XMLHTTP")
            } catch (t) {}
        }

        function $n() {
            return setTimeout(function() {
                qn = t
            }, 0), qn = v.now()
        }

        function Jn(e, t) {
            v.each(t, function(t, n) {
                for (var r = (Vn[t] || []).concat(Vn["*"]), i = 0, s = r.length; s > i; i++)
                    if (r[i].call(e, t, n)) return
            })
        }

        function Kn(e, t, n) {
            var r, i = 0,
                o = Xn.length,
                u = v.Deferred().always(function() {
                    delete a.elem
                }),
                a = function() {
                    for (var t = qn || $n(), n = Math.max(0, f.startTime + f.duration - t), r = n / f.duration || 0, i = 1 - r, s = 0, o = f.tweens.length; o > s; s++) f.tweens[s].run(i);
                    return u.notifyWith(e, [f, i, n]), 1 > i && o ? n : (u.resolveWith(e, [f]), !1)
                },
                f = u.promise({
                    elem: e,
                    props: v.extend({}, t),
                    opts: v.extend(!0, {
                        specialEasing: {}
                    }, n),
                    originalProperties: t,
                    originalOptions: n,
                    startTime: qn || $n(),
                    duration: n.duration,
                    tweens: [],
                    createTween: function(t, n) {
                        var i = v.Tween(e, f.opts, t, n, f.opts.specialEasing[t] || f.opts.easing);
                        return f.tweens.push(i), i
                    },
                    stop: function(t) {
                        for (var n = 0, r = t ? f.tweens.length : 0; r > n; n++) f.tweens[n].run(1);
                        return t ? u.resolveWith(e, [f, t]) : u.rejectWith(e, [f, t]), this
                    }
                }),
                l = f.props;
            for (Qn(l, f.opts.specialEasing); o > i; i++)
                if (r = Xn[i].call(f, e, l, f.opts)) return r;
            return Jn(f, l), v.isFunction(f.opts.start) && f.opts.start.call(e, f), v.fx.timer(v.extend(a, {
                anim: f,
                queue: f.opts.queue,
                elem: e
            })), f.progress(f.opts.progress).done(f.opts.done, f.opts.complete).fail(f.opts.fail).always(f.opts.always)
        }

        function Qn(e, t) {
            var n, r, i, s, o;
            for (n in e)
                if (r = v.camelCase(n), i = t[r], s = e[n], v.isArray(s) && (i = s[1], s = e[n] = s[0]), n !== r && (e[r] = s, delete e[n]), o = v.cssHooks[r], o && "expand" in o) {
                    s = o.expand(s), delete e[r];
                    for (n in s) n in e || (e[n] = s[n], t[n] = i)
                } else t[r] = i
        }

        function Gn(e, t, n) {
            var r, i, s, o, u, a, f, l, c, h = this,
                p = e.style,
                d = {},
                m = [],
                g = e.nodeType && Gt(e);
            n.queue || (l = v._queueHooks(e, "fx"), null == l.unqueued && (l.unqueued = 0, c = l.empty.fire, l.empty.fire = function() {
                l.unqueued || c()
            }), l.unqueued++, h.always(function() {
                h.always(function() {
                    l.unqueued--, v.queue(e, "fx").length || l.empty.fire()
                })
            })), 1 === e.nodeType && ("height" in t || "width" in t) && (n.overflow = [p.overflow, p.overflowX, p.overflowY], "inline" === v.css(e, "display") && "none" === v.css(e, "float") && (v.support.inlineBlockNeedsLayout && "inline" !== nn(e.nodeName) ? p.zoom = 1 : p.display = "inline-block")), n.overflow && (p.overflow = "hidden", v.support.shrinkWrapBlocks || h.done(function() {
                p.overflow = n.overflow[0], p.overflowX = n.overflow[1], p.overflowY = n.overflow[2]
            }));
            for (r in t)
                if (s = t[r], Un.exec(s)) {
                    if (delete t[r], a = a || "toggle" === s, s === (g ? "hide" : "show")) continue;
                    m.push(r)
                }
            if (o = m.length) {
                u = v._data(e, "fxshow") || v._data(e, "fxshow", {}), "hidden" in u && (g = u.hidden), a && (u.hidden = !g), g ? v(e).show() : h.done(function() {
                    v(e).hide()
                }), h.done(function() {
                    var t;
                    v.removeData(e, "fxshow", !0);
                    for (t in d) v.style(e, t, d[t])
                });
                for (r = 0; o > r; r++) i = m[r], f = h.createTween(i, g ? u[i] : 0), d[i] = u[i] || v.style(e, i), i in u || (u[i] = f.start, g && (f.end = f.start, f.start = "width" === i || "height" === i ? 1 : 0))
            }
        }

        function Yn(e, t, n, r, i) {
            return new Yn.prototype.init(e, t, n, r, i)
        }

        function Zn(e, t) {
            var n, r = {
                    height: e
                },
                i = 0;
            for (t = t ? 1 : 0; 4 > i; i += 2 - t) n = $t[i], r["margin" + n] = r["padding" + n] = e;
            return t && (r.opacity = r.width = e), r
        }

        function tr(e) {
            return v.isWindow(e) ? e : 9 === e.nodeType ? e.defaultView || e.parentWindow : !1
        }
        var n, r, i = e.document,
            s = e.location,
            o = e.navigator,
            u = e.jQuery,
            a = e.$,
            f = Array.prototype.push,
            l = Array.prototype.slice,
            c = Array.prototype.indexOf,
            h = Object.prototype.toString,
            p = Object.prototype.hasOwnProperty,
            d = String.prototype.trim,
            v = function(e, t) {
                return new v.fn.init(e, t, n)
            },
            m = /[\-+]?(?:\d*\.|)\d+(?:[eE][\-+]?\d+|)/.source,
            g = /\S/,
            y = /\s+/,
            b = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
            w = /^(?:[^#<]*(<[\w\W]+>)[^>]*$|#([\w\-]*)$)/,
            E = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
            S = /^[\],:{}\s]*$/,
            x = /(?:^|:|,)(?:\s*\[)+/g,
            T = /\\(?:["\\\/bfnrt]|u[\da-fA-F]{4})/g,
            N = /"[^"\\\r\n]*"|true|false|null|-?(?:\d\d*\.|)\d+(?:[eE][\-+]?\d+|)/g,
            C = /^-ms-/,
            k = /-([\da-z])/gi,
            L = function(e, t) {
                return (t + "").toUpperCase()
            },
            A = function() {
                i.addEventListener ? (i.removeEventListener("DOMContentLoaded", A, !1), v.ready()) : "complete" === i.readyState && (i.detachEvent("onreadystatechange", A), v.ready())
            },
            O = {};
        v.fn = v.prototype = {
            constructor: v,
            init: function(e, n, r) {
                var s, o, a;
                if (!e) return this;
                if (e.nodeType) return this.context = this[0] = e, this.length = 1, this;
                if ("string" == typeof e) {
                    if (s = "<" === e.charAt(0) && ">" === e.charAt(e.length - 1) && e.length >= 3 ? [null, e, null] : w.exec(e), s && (s[1] || !n)) {
                        if (s[1]) return n = n instanceof v ? n[0] : n, a = n && n.nodeType ? n.ownerDocument || n : i, e = v.parseHTML(s[1], a, !0), E.test(s[1]) && v.isPlainObject(n) && this.attr.call(e, n, !0), v.merge(this, e);
                        if (o = i.getElementById(s[2]), o && o.parentNode) {
                            if (o.id !== s[2]) return r.find(e);
                            this.length = 1, this[0] = o
                        }
                        return this.context = i, this.selector = e, this
                    }
                    return !n || n.jquery ? (n || r).find(e) : this.constructor(n).find(e)
                }
                return v.isFunction(e) ? r.ready(e) : (e.selector !== t && (this.selector = e.selector, this.context = e.context), v.makeArray(e, this))
            },
            selector: "",
            jquery: "1.8.3",
            length: 0,
            size: function() {
                return this.length
            },
            toArray: function() {
                return l.call(this)
            },
            get: function(e) {
                return null == e ? this.toArray() : 0 > e ? this[this.length + e] : this[e]
            },
            pushStack: function(e, t, n) {
                var r = v.merge(this.constructor(), e);
                return r.prevObject = this, r.context = this.context, "find" === t ? r.selector = this.selector + (this.selector ? " " : "") + n : t && (r.selector = this.selector + "." + t + "(" + n + ")"), r
            },
            each: function(e, t) {
                return v.each(this, e, t)
            },
            ready: function(e) {
                return v.ready.promise().done(e), this
            },
            eq: function(e) {
                return e = +e, -1 === e ? this.slice(e) : this.slice(e, e + 1)
            },
            first: function() {
                return this.eq(0)
            },
            last: function() {
                return this.eq(-1)
            },
            slice: function() {
                return this.pushStack(l.apply(this, arguments), "slice", l.call(arguments).join(","))
            },
            map: function(e) {
                return this.pushStack(v.map(this, function(t, n) {
                    return e.call(t, n, t)
                }))
            },
            end: function() {
                return this.prevObject || this.constructor(null)
            },
            push: f,
            sort: [].sort,
            splice: [].splice
        }, v.fn.init.prototype = v.fn, v.extend = v.fn.extend = function() {
            var e, n, r, i, s, o, u = arguments[0] || {},
                a = 1,
                f = arguments.length,
                l = !1;
            for ("boolean" == typeof u && (l = u, u = arguments[1] || {}, a = 2), "object" != typeof u && !v.isFunction(u) && (u = {}), f === a && (u = this, --a); f > a; a++)
                if (null != (e = arguments[a]))
                    for (n in e) r = u[n], i = e[n], u !== i && (l && i && (v.isPlainObject(i) || (s = v.isArray(i))) ? (s ? (s = !1, o = r && v.isArray(r) ? r : []) : o = r && v.isPlainObject(r) ? r : {}, u[n] = v.extend(l, o, i)) : i !== t && (u[n] = i));
            return u
        }, v.extend({
            noConflict: function(t) {
                return e.$ === v && (e.$ = a), t && e.jQuery === v && (e.jQuery = u), v
            },
            isReady: !1,
            readyWait: 1,
            holdReady: function(e) {
                e ? v.readyWait++ : v.ready(!0)
            },
            ready: function(e) {
                if (e === !0 ? !--v.readyWait : !v.isReady) {
                    if (!i.body) return setTimeout(v.ready, 1);
                    v.isReady = !0, e !== !0 && --v.readyWait > 0 || (r.resolveWith(i, [v]), v.fn.trigger && v(i).trigger("ready").off("ready"))
                }
            },
            isFunction: function(e) {
                return "function" === v.type(e)
            },
            isArray: Array.isArray || function(e) {
                return "array" === v.type(e)
            },
            isWindow: function(e) {
                return null != e && e == e.window
            },
            isNumeric: function(e) {
                return !isNaN(parseFloat(e)) && isFinite(e)
            },
            type: function(e) {
                return null == e ? String(e) : O[h.call(e)] || "object"
            },
            isPlainObject: function(e) {
                if (!e || "object" !== v.type(e) || e.nodeType || v.isWindow(e)) return !1;
                try {
                    if (e.constructor && !p.call(e, "constructor") && !p.call(e.constructor.prototype, "isPrototypeOf")) return !1
                } catch (n) {
                    return !1
                }
                var r;
                for (r in e);
                return r === t || p.call(e, r)
            },
            isEmptyObject: function(e) {
                var t;
                for (t in e) return !1;
                return !0
            },
            error: function(e) {
                throw new Error(e)
            },
            parseHTML: function(e, t, n) {
                var r;
                return e && "string" == typeof e ? ("boolean" == typeof t && (n = t, t = 0), t = t || i, (r = E.exec(e)) ? [t.createElement(r[1])] : (r = v.buildFragment([e], t, n ? null : []), v.merge([], (r.cacheable ? v.clone(r.fragment) : r.fragment).childNodes))) : null
            },
            parseJSON: function(t) {
                return t && "string" == typeof t ? (t = v.trim(t), e.JSON && e.JSON.parse ? e.JSON.parse(t) : S.test(t.replace(T, "@").replace(N, "]").replace(x, "")) ? new Function("return " + t)() : void v.error("Invalid JSON: " + t)) : null
            },
            parseXML: function(n) {
                var r, i;
                if (!n || "string" != typeof n) return null;
                try {
                    e.DOMParser ? (i = new DOMParser, r = i.parseFromString(n, "text/xml")) : (r = new ActiveXObject("Microsoft.XMLDOM"), r.async = "false", r.loadXML(n))
                } catch (s) {
                    r = t
                }
                return (!r || !r.documentElement || r.getElementsByTagName("parsererror").length) && v.error("Invalid XML: " + n), r
            },
            noop: function() {},
            globalEval: function(t) {
                t && g.test(t) && (e.execScript || function(t) {
                    e.eval.call(e, t)
                })(t)
            },
            camelCase: function(e) {
                return e.replace(C, "ms-").replace(k, L)
            },
            nodeName: function(e, t) {
                return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
            },
            each: function(e, n, r) {
                var i, s = 0,
                    o = e.length,
                    u = o === t || v.isFunction(e);
                if (r)
                    if (u) {
                        for (i in e)
                            if (n.apply(e[i], r) === !1) break
                    } else
                        for (; o > s && n.apply(e[s++], r) !== !1;);
                else if (u) {
                    for (i in e)
                        if (n.call(e[i], i, e[i]) === !1) break
                } else
                    for (; o > s && n.call(e[s], s, e[s++]) !== !1;);
                return e
            },
            trim: d && !d.call("\ufeff\xa0") ? function(e) {
                return null == e ? "" : d.call(e)
            } : function(e) {
                return null == e ? "" : (e + "").replace(b, "")
            },
            makeArray: function(e, t) {
                var n, r = t || [];
                return null != e && (n = v.type(e), null == e.length || "string" === n || "function" === n || "regexp" === n || v.isWindow(e) ? f.call(r, e) : v.merge(r, e)), r
            },
            inArray: function(e, t, n) {
                var r;
                if (t) {
                    if (c) return c.call(t, e, n);
                    for (r = t.length, n = n ? 0 > n ? Math.max(0, r + n) : n : 0; r > n; n++)
                        if (n in t && t[n] === e) return n
                }
                return -1
            },
            merge: function(e, n) {
                var r = n.length,
                    i = e.length,
                    s = 0;
                if ("number" == typeof r)
                    for (; r > s; s++) e[i++] = n[s];
                else
                    for (; n[s] !== t;) e[i++] = n[s++];
                return e.length = i, e
            },
            grep: function(e, t, n) {
                var r, i = [],
                    s = 0,
                    o = e.length;
                for (n = !!n; o > s; s++) r = !!t(e[s], s), n !== r && i.push(e[s]);
                return i
            },
            map: function(e, n, r) {
                var i, s, o = [],
                    u = 0,
                    a = e.length,
                    f = e instanceof v || a !== t && "number" == typeof a && (a > 0 && e[0] && e[a - 1] || 0 === a || v.isArray(e));
                if (f)
                    for (; a > u; u++) i = n(e[u], u, r), null != i && (o[o.length] = i);
                else
                    for (s in e) i = n(e[s], s, r), null != i && (o[o.length] = i);
                return o.concat.apply([], o)
            },
            guid: 1,
            proxy: function(e, n) {
                var r, i, s;
                return "string" == typeof n && (r = e[n], n = e, e = r), v.isFunction(e) ? (i = l.call(arguments, 2), s = function() {
                    return e.apply(n, i.concat(l.call(arguments)))
                }, s.guid = e.guid = e.guid || v.guid++, s) : t
            },
            access: function(e, n, r, i, s, o, u) {
                var a, f = null == r,
                    l = 0,
                    c = e.length;
                if (r && "object" == typeof r) {
                    for (l in r) v.access(e, n, l, r[l], 1, o, i);
                    s = 1
                } else if (i !== t) {
                    if (a = u === t && v.isFunction(i), f && (a ? (a = n, n = function(e, t, n) {
                            return a.call(v(e), n)
                        }) : (n.call(e, i), n = null)), n)
                        for (; c > l; l++) n(e[l], r, a ? i.call(e[l], l, n(e[l], r)) : i, u);
                    s = 1
                }
                return s ? e : f ? n.call(e) : c ? n(e[0], r) : o
            },
            now: function() {
                return (new Date).getTime()
            }
        }), v.ready.promise = function(t) {
            if (!r)
                if (r = v.Deferred(), "complete" === i.readyState) setTimeout(v.ready, 1);
                else if (i.addEventListener) i.addEventListener("DOMContentLoaded", A, !1), e.addEventListener("load", v.ready, !1);
            else {
                i.attachEvent("onreadystatechange", A), e.attachEvent("onload", v.ready);
                var n = !1;
                try {
                    n = null == e.frameElement && i.documentElement
                } catch (s) {}
                n && n.doScroll && function o() {
                    if (!v.isReady) {
                        try {
                            n.doScroll("left")
                        } catch (e) {
                            return setTimeout(o, 50)
                        }
                        v.ready()
                    }
                }()
            }
            return r.promise(t)
        }, v.each("Boolean Number String Function Array Date RegExp Object".split(" "), function(e, t) {
            O["[object " + t + "]"] = t.toLowerCase()
        }), n = v(i);
        var M = {};
        v.Callbacks = function(e) {
            e = "string" == typeof e ? M[e] || _(e) : v.extend({}, e);
            var n, r, i, s, o, u, a = [],
                f = !e.once && [],
                l = function(t) {
                    for (n = e.memory && t, r = !0, u = s || 0, s = 0, o = a.length, i = !0; a && o > u; u++)
                        if (a[u].apply(t[0], t[1]) === !1 && e.stopOnFalse) {
                            n = !1;
                            break
                        }
                    i = !1, a && (f ? f.length && l(f.shift()) : n ? a = [] : c.disable())
                },
                c = {
                    add: function() {
                        if (a) {
                            var t = a.length;
                            ! function r(t) {
                                v.each(t, function(t, n) {
                                    var i = v.type(n);
                                    "function" === i ? (!e.unique || !c.has(n)) && a.push(n) : n && n.length && "string" !== i && r(n)
                                })
                            }(arguments), i ? o = a.length : n && (s = t, l(n))
                        }
                        return this
                    },
                    remove: function() {
                        return a && v.each(arguments, function(e, t) {
                            for (var n;
                                (n = v.inArray(t, a, n)) > -1;) a.splice(n, 1), i && (o >= n && o--, u >= n && u--)
                        }), this
                    },
                    has: function(e) {
                        return v.inArray(e, a) > -1
                    },
                    empty: function() {
                        return a = [], this
                    },
                    disable: function() {
                        return a = f = n = t, this
                    },
                    disabled: function() {
                        return !a
                    },
                    lock: function() {
                        return f = t, n || c.disable(), this
                    },
                    locked: function() {
                        return !f
                    },
                    fireWith: function(e, t) {
                        return t = t || [], t = [e, t.slice ? t.slice() : t], a && (!r || f) && (i ? f.push(t) : l(t)), this
                    },
                    fire: function() {
                        return c.fireWith(this, arguments), this
                    },
                    fired: function() {
                        return !!r
                    }
                };
            return c
        }, v.extend({
            Deferred: function(e) {
                var t = [
                        ["resolve", "done", v.Callbacks("once memory"), "resolved"],
                        ["reject", "fail", v.Callbacks("once memory"), "rejected"],
                        ["notify", "progress", v.Callbacks("memory")]
                    ],
                    n = "pending",
                    r = {
                        state: function() {
                            return n
                        },
                        always: function() {
                            return i.done(arguments).fail(arguments), this
                        },
                        then: function() {
                            var e = arguments;
                            return v.Deferred(function(n) {
                                v.each(t, function(t, r) {
                                    var s = r[0],
                                        o = e[t];
                                    i[r[1]](v.isFunction(o) ? function() {
                                        var e = o.apply(this, arguments);
                                        e && v.isFunction(e.promise) ? e.promise().done(n.resolve).fail(n.reject).progress(n.notify) : n[s + "With"](this === i ? n : this, [e])
                                    } : n[s])
                                }), e = null
                            }).promise()
                        },
                        promise: function(e) {
                            return null != e ? v.extend(e, r) : r
                        }
                    },
                    i = {};
                return r.pipe = r.then, v.each(t, function(e, s) {
                    var o = s[2],
                        u = s[3];
                    r[s[1]] = o.add, u && o.add(function() {
                        n = u
                    }, t[1 ^ e][2].disable, t[2][2].lock), i[s[0]] = o.fire, i[s[0] + "With"] = o.fireWith
                }), r.promise(i), e && e.call(i, i), i
            },
            when: function(e) {
                var u, a, f, t = 0,
                    n = l.call(arguments),
                    r = n.length,
                    i = 1 !== r || e && v.isFunction(e.promise) ? r : 0,
                    s = 1 === i ? e : v.Deferred(),
                    o = function(e, t, n) {
                        return function(r) {
                            t[e] = this, n[e] = arguments.length > 1 ? l.call(arguments) : r, n === u ? s.notifyWith(t, n) : --i || s.resolveWith(t, n)
                        }
                    };
                if (r > 1)
                    for (u = new Array(r), a = new Array(r), f = new Array(r); r > t; t++) n[t] && v.isFunction(n[t].promise) ? n[t].promise().done(o(t, f, n)).fail(s.reject).progress(o(t, a, u)) : --i;
                return i || s.resolveWith(f, n), s.promise()
            }
        }), v.support = function() {
            var t, n, r, s, o, u, a, f, l, c, h, p = i.createElement("div");
            if (p.setAttribute("className", "t"), p.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", n = p.getElementsByTagName("*"), r = p.getElementsByTagName("a")[0], !n || !r || !n.length) return {};
            s = i.createElement("select"), o = s.appendChild(i.createElement("option")), u = p.getElementsByTagName("input")[0], r.style.cssText = "top:1px;float:left;opacity:.5", t = {
                leadingWhitespace: 3 === p.firstChild.nodeType,
                tbody: !p.getElementsByTagName("tbody").length,
                htmlSerialize: !!p.getElementsByTagName("link").length,
                style: /top/.test(r.getAttribute("style")),
                hrefNormalized: "/a" === r.getAttribute("href"),
                opacity: /^0.5/.test(r.style.opacity),
                cssFloat: !!r.style.cssFloat,
                checkOn: "on" === u.value,
                optSelected: o.selected,
                getSetAttribute: "t" !== p.className,
                enctype: !!i.createElement("form").enctype,
                html5Clone: "<:nav></:nav>" !== i.createElement("nav").cloneNode(!0).outerHTML,
                boxModel: "CSS1Compat" === i.compatMode,
                submitBubbles: !0,
                changeBubbles: !0,
                focusinBubbles: !1,
                deleteExpando: !0,
                noCloneEvent: !0,
                inlineBlockNeedsLayout: !1,
                shrinkWrapBlocks: !1,
                reliableMarginRight: !0,
                boxSizingReliable: !0,
                pixelPosition: !1
            }, u.checked = !0, t.noCloneChecked = u.cloneNode(!0).checked, s.disabled = !0, t.optDisabled = !o.disabled;
            try {
                delete p.test
            } catch (d) {
                t.deleteExpando = !1
            }
            if (!p.addEventListener && p.attachEvent && p.fireEvent && (p.attachEvent("onclick", h = function() {
                    t.noCloneEvent = !1
                }), p.cloneNode(!0).fireEvent("onclick"), p.detachEvent("onclick", h)), u = i.createElement("input"), u.value = "t", u.setAttribute("type", "radio"), t.radioValue = "t" === u.value, u.setAttribute("checked", "checked"), u.setAttribute("name", "t"), p.appendChild(u), a = i.createDocumentFragment(), a.appendChild(p.lastChild), t.checkClone = a.cloneNode(!0).cloneNode(!0).lastChild.checked, t.appendChecked = u.checked, a.removeChild(u), a.appendChild(p), p.attachEvent)
                for (l in {
                        submit: !0,
                        change: !0,
                        focusin: !0
                    }) f = "on" + l, c = f in p, c || (p.setAttribute(f, "return;"), c = "function" == typeof p[f]), t[l + "Bubbles"] = c;
            return v(function() {
                var n, r, s, o, u = "padding:0;margin:0;border:0;display:block;overflow:hidden;",
                    a = i.getElementsByTagName("body")[0];
                a && (n = i.createElement("div"), n.style.cssText = "visibility:hidden;border:0;width:0;height:0;position:static;top:0;margin-top:1px", a.insertBefore(n, a.firstChild), r = i.createElement("div"), n.appendChild(r), r.innerHTML = "<table><tr><td></td><td>t</td></tr></table>", s = r.getElementsByTagName("td"), s[0].style.cssText = "padding:0;margin:0;border:0;display:none", c = 0 === s[0].offsetHeight, s[0].style.display = "", s[1].style.display = "none", t.reliableHiddenOffsets = c && 0 === s[0].offsetHeight, r.innerHTML = "", r.style.cssText = "box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;padding:1px;border:1px;display:block;width:4px;margin-top:1%;position:absolute;top:1%;", t.boxSizing = 4 === r.offsetWidth, t.doesNotIncludeMarginInBodyOffset = 1 !== a.offsetTop, e.getComputedStyle && (t.pixelPosition = "1%" !== (e.getComputedStyle(r, null) || {}).top, t.boxSizingReliable = "4px" === (e.getComputedStyle(r, null) || {
                    width: "4px"
                }).width, o = i.createElement("div"), o.style.cssText = r.style.cssText = u, o.style.marginRight = o.style.width = "0", r.style.width = "1px", r.appendChild(o), t.reliableMarginRight = !parseFloat((e.getComputedStyle(o, null) || {}).marginRight)), "undefined" != typeof r.style.zoom && (r.innerHTML = "", r.style.cssText = u + "width:1px;padding:1px;display:inline;zoom:1", t.inlineBlockNeedsLayout = 3 === r.offsetWidth, r.style.display = "block", r.style.overflow = "visible", r.innerHTML = "<div></div>", r.firstChild.style.width = "5px", t.shrinkWrapBlocks = 3 !== r.offsetWidth, n.style.zoom = 1), a.removeChild(n), n = r = s = o = null)
            }), a.removeChild(p), n = r = s = o = u = a = p = null, t
        }();
        var D = /(?:\{[\s\S]*\}|\[[\s\S]*\])$/,
            P = /([A-Z])/g;
        v.extend({
            cache: {},
            deletedIds: [],
            uuid: 0,
            expando: "jQuery" + (v.fn.jquery + Math.random()).replace(/\D/g, ""),
            noData: {
                embed: !0,
                object: "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",
                applet: !0
            },
            hasData: function(e) {
                return e = e.nodeType ? v.cache[e[v.expando]] : e[v.expando], !!e && !B(e)
            },
            data: function(e, n, r, i) {
                if (v.acceptData(e)) {
                    var s, o, u = v.expando,
                        a = "string" == typeof n,
                        f = e.nodeType,
                        l = f ? v.cache : e,
                        c = f ? e[u] : e[u] && u;
                    if (c && l[c] && (i || l[c].data) || !a || r !== t) return c || (f ? e[u] = c = v.deletedIds.pop() || v.guid++ : c = u), l[c] || (l[c] = {}, f || (l[c].toJSON = v.noop)), ("object" == typeof n || "function" == typeof n) && (i ? l[c] = v.extend(l[c], n) : l[c].data = v.extend(l[c].data, n)), s = l[c], i || (s.data || (s.data = {}), s = s.data), r !== t && (s[v.camelCase(n)] = r), a ? (o = s[n], null == o && (o = s[v.camelCase(n)])) : o = s, o
                }
            },
            removeData: function(e, t, n) {
                if (v.acceptData(e)) {
                    var r, i, s, o = e.nodeType,
                        u = o ? v.cache : e,
                        a = o ? e[v.expando] : v.expando;
                    if (u[a]) {
                        if (t && (r = n ? u[a] : u[a].data)) {
                            v.isArray(t) || (t in r ? t = [t] : (t = v.camelCase(t), t = t in r ? [t] : t.split(" ")));
                            for (i = 0, s = t.length; s > i; i++) delete r[t[i]];
                            if (!(n ? B : v.isEmptyObject)(r)) return
                        }(n || (delete u[a].data, B(u[a]))) && (o ? v.cleanData([e], !0) : v.support.deleteExpando || u != u.window ? delete u[a] : u[a] = null)
                    }
                }
            },
            _data: function(e, t, n) {
                return v.data(e, t, n, !0)
            },
            acceptData: function(e) {
                var t = e.nodeName && v.noData[e.nodeName.toLowerCase()];
                return !t || t !== !0 && e.getAttribute("classid") === t
            }
        }), v.fn.extend({
            data: function(e, n) {
                var r, i, s, o, u, a = this[0],
                    f = 0,
                    l = null;
                if (e === t) {
                    if (this.length && (l = v.data(a), 1 === a.nodeType && !v._data(a, "parsedAttrs"))) {
                        for (s = a.attributes, u = s.length; u > f; f++) o = s[f].name, o.indexOf("data-") || (o = v.camelCase(o.substring(5)), H(a, o, l[o]));
                        v._data(a, "parsedAttrs", !0)
                    }
                    return l
                }
                return "object" == typeof e ? this.each(function() {
                    v.data(this, e)
                }) : (r = e.split(".", 2), r[1] = r[1] ? "." + r[1] : "", i = r[1] + "!", v.access(this, function(n) {
                    return n === t ? (l = this.triggerHandler("getData" + i, [r[0]]), l === t && a && (l = v.data(a, e), l = H(a, e, l)), l === t && r[1] ? this.data(r[0]) : l) : (r[1] = n, void this.each(function() {
                        var t = v(this);
                        t.triggerHandler("setData" + i, r), v.data(this, e, n), t.triggerHandler("changeData" + i, r)
                    }))
                }, null, n, arguments.length > 1, null, !1))
            },
            removeData: function(e) {
                return this.each(function() {
                    v.removeData(this, e)
                })
            }
        }), v.extend({
            queue: function(e, t, n) {
                var r;
                return e ? (t = (t || "fx") + "queue", r = v._data(e, t), n && (!r || v.isArray(n) ? r = v._data(e, t, v.makeArray(n)) : r.push(n)), r || []) : void 0
            },
            dequeue: function(e, t) {
                t = t || "fx";
                var n = v.queue(e, t),
                    r = n.length,
                    i = n.shift(),
                    s = v._queueHooks(e, t),
                    o = function() {
                        v.dequeue(e, t)
                    };
                "inprogress" === i && (i = n.shift(), r--), i && ("fx" === t && n.unshift("inprogress"), delete s.stop, i.call(e, o, s)), !r && s && s.empty.fire()
            },
            _queueHooks: function(e, t) {
                var n = t + "queueHooks";
                return v._data(e, n) || v._data(e, n, {
                    empty: v.Callbacks("once memory").add(function() {
                        v.removeData(e, t + "queue", !0), v.removeData(e, n, !0)
                    })
                })
            }
        }), v.fn.extend({
            queue: function(e, n) {
                var r = 2;
                return "string" != typeof e && (n = e, e = "fx", r--), arguments.length < r ? v.queue(this[0], e) : n === t ? this : this.each(function() {
                    var t = v.queue(this, e, n);
                    v._queueHooks(this, e), "fx" === e && "inprogress" !== t[0] && v.dequeue(this, e)
                })
            },
            dequeue: function(e) {
                return this.each(function() {
                    v.dequeue(this, e)
                })
            },
            delay: function(e, t) {
                return e = v.fx ? v.fx.speeds[e] || e : e, t = t || "fx", this.queue(t, function(t, n) {
                    var r = setTimeout(t, e);
                    n.stop = function() {
                        clearTimeout(r)
                    }
                })
            },
            clearQueue: function(e) {
                return this.queue(e || "fx", [])
            },
            promise: function(e, n) {
                var r, i = 1,
                    s = v.Deferred(),
                    o = this,
                    u = this.length,
                    a = function() {
                        --i || s.resolveWith(o, [o])
                    };
                for ("string" != typeof e && (n = e, e = t), e = e || "fx"; u--;) r = v._data(o[u], e + "queueHooks"), r && r.empty && (i++, r.empty.add(a));
                return a(), s.promise(n)
            }
        });
        var j, F, I, q = /[\t\r\n]/g,
            R = /\r/g,
            U = /^(?:button|input)$/i,
            z = /^(?:button|input|object|select|textarea)$/i,
            W = /^a(?:rea|)$/i,
            X = /^(?:autofocus|autoplay|async|checked|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped|selected)$/i,
            V = v.support.getSetAttribute;
        v.fn.extend({
            attr: function(e, t) {
                return v.access(this, v.attr, e, t, arguments.length > 1)
            },
            removeAttr: function(e) {
                return this.each(function() {
                    v.removeAttr(this, e)
                })
            },
            prop: function(e, t) {
                return v.access(this, v.prop, e, t, arguments.length > 1)
            },
            removeProp: function(e) {
                return e = v.propFix[e] || e, this.each(function() {
                    try {
                        this[e] = t, delete this[e]
                    } catch (n) {}
                })
            },
            addClass: function(e) {
                var t, n, r, i, s, o, u;
                if (v.isFunction(e)) return this.each(function(t) {
                    v(this).addClass(e.call(this, t, this.className))
                });
                if (e && "string" == typeof e)
                    for (t = e.split(y), n = 0, r = this.length; r > n; n++)
                        if (i = this[n], 1 === i.nodeType)
                            if (i.className || 1 !== t.length) {
                                for (s = " " + i.className + " ", o = 0, u = t.length; u > o; o++) s.indexOf(" " + t[o] + " ") < 0 && (s += t[o] + " ");
                                i.className = v.trim(s)
                            } else i.className = e;
                return this
            },
            removeClass: function(e) {
                var n, r, i, s, o, u, a;
                if (v.isFunction(e)) return this.each(function(t) {
                    v(this).removeClass(e.call(this, t, this.className))
                });
                if (e && "string" == typeof e || e === t)
                    for (n = (e || "").split(y), u = 0, a = this.length; a > u; u++)
                        if (i = this[u], 1 === i.nodeType && i.className) {
                            for (r = (" " + i.className + " ").replace(q, " "), s = 0, o = n.length; o > s; s++)
                                for (; r.indexOf(" " + n[s] + " ") >= 0;) r = r.replace(" " + n[s] + " ", " ");
                            i.className = e ? v.trim(r) : ""
                        }
                return this
            },
            toggleClass: function(e, t) {
                var n = typeof e,
                    r = "boolean" == typeof t;
                return this.each(v.isFunction(e) ? function(n) {
                    v(this).toggleClass(e.call(this, n, this.className, t), t)
                } : function() {
                    if ("string" === n)
                        for (var i, s = 0, o = v(this), u = t, a = e.split(y); i = a[s++];) u = r ? u : !o.hasClass(i), o[u ? "addClass" : "removeClass"](i);
                    else("undefined" === n || "boolean" === n) && (this.className && v._data(this, "__className__", this.className), this.className = this.className || e === !1 ? "" : v._data(this, "__className__") || "")
                })
            },
            hasClass: function(e) {
                for (var t = " " + e + " ", n = 0, r = this.length; r > n; n++)
                    if (1 === this[n].nodeType && (" " + this[n].className + " ").replace(q, " ").indexOf(t) >= 0) return !0;
                return !1
            },
            val: function(e) {
                var n, r, i, s = this[0]; {
                    if (arguments.length) return i = v.isFunction(e), this.each(function(r) {
                        var s, o = v(this);
                        1 === this.nodeType && (s = i ? e.call(this, r, o.val()) : e, null == s ? s = "" : "number" == typeof s ? s += "" : v.isArray(s) && (s = v.map(s, function(e) {
                            return null == e ? "" : e + ""
                        })), n = v.valHooks[this.type] || v.valHooks[this.nodeName.toLowerCase()], n && "set" in n && n.set(this, s, "value") !== t || (this.value = s))
                    });
                    if (s) return n = v.valHooks[s.type] || v.valHooks[s.nodeName.toLowerCase()], n && "get" in n && (r = n.get(s, "value")) !== t ? r : (r = s.value, "string" == typeof r ? r.replace(R, "") : null == r ? "" : r)
                }
            }
        }), v.extend({
            valHooks: {
                option: {
                    get: function(e) {
                        var t = e.attributes.value;
                        return !t || t.specified ? e.value : e.text
                    }
                },
                select: {
                    get: function(e) {
                        for (var t, n, r = e.options, i = e.selectedIndex, s = "select-one" === e.type || 0 > i, o = s ? null : [], u = s ? i + 1 : r.length, a = 0 > i ? u : s ? i : 0; u > a; a++)
                            if (n = r[a], !(!n.selected && a !== i || (v.support.optDisabled ? n.disabled : null !== n.getAttribute("disabled")) || n.parentNode.disabled && v.nodeName(n.parentNode, "optgroup"))) {
                                if (t = v(n).val(), s) return t;
                                o.push(t)
                            }
                        return o
                    },
                    set: function(e, t) {
                        var n = v.makeArray(t);
                        return v(e).find("option").each(function() {
                            this.selected = v.inArray(v(this).val(), n) >= 0
                        }), n.length || (e.selectedIndex = -1), n
                    }
                }
            },
            attrFn: {},
            attr: function(e, n, r, i) {
                var s, o, u, a = e.nodeType;
                if (e && 3 !== a && 8 !== a && 2 !== a) return i && v.isFunction(v.fn[n]) ? v(e)[n](r) : "undefined" == typeof e.getAttribute ? v.prop(e, n, r) : (u = 1 !== a || !v.isXMLDoc(e), u && (n = n.toLowerCase(), o = v.attrHooks[n] || (X.test(n) ? F : j)), r !== t ? null === r ? void v.removeAttr(e, n) : o && "set" in o && u && (s = o.set(e, r, n)) !== t ? s : (e.setAttribute(n, r + ""), r) : o && "get" in o && u && null !== (s = o.get(e, n)) ? s : (s = e.getAttribute(n), null === s ? t : s))
            },
            removeAttr: function(e, t) {
                var n, r, i, s, o = 0;
                if (t && 1 === e.nodeType)
                    for (r = t.split(y); o < r.length; o++) i = r[o], i && (n = v.propFix[i] || i, s = X.test(i), s || v.attr(e, i, ""), e.removeAttribute(V ? i : n), s && n in e && (e[n] = !1))
            },
            attrHooks: {
                type: {
                    set: function(e, t) {
                        if (U.test(e.nodeName) && e.parentNode) v.error("type property can't be changed");
                        else if (!v.support.radioValue && "radio" === t && v.nodeName(e, "input")) {
                            var n = e.value;
                            return e.setAttribute("type", t), n && (e.value = n), t
                        }
                    }
                },
                value: {
                    get: function(e, t) {
                        return j && v.nodeName(e, "button") ? j.get(e, t) : t in e ? e.value : null
                    },
                    set: function(e, t, n) {
                        return j && v.nodeName(e, "button") ? j.set(e, t, n) : void(e.value = t)
                    }
                }
            },
            propFix: {
                tabindex: "tabIndex",
                readonly: "readOnly",
                "for": "htmlFor",
                "class": "className",
                maxlength: "maxLength",
                cellspacing: "cellSpacing",
                cellpadding: "cellPadding",
                rowspan: "rowSpan",
                colspan: "colSpan",
                usemap: "useMap",
                frameborder: "frameBorder",
                contenteditable: "contentEditable"
            },
            prop: function(e, n, r) {
                var i, s, o, u = e.nodeType;
                if (e && 3 !== u && 8 !== u && 2 !== u) return o = 1 !== u || !v.isXMLDoc(e), o && (n = v.propFix[n] || n, s = v.propHooks[n]), r !== t ? s && "set" in s && (i = s.set(e, r, n)) !== t ? i : e[n] = r : s && "get" in s && null !== (i = s.get(e, n)) ? i : e[n]
            },
            propHooks: {
                tabIndex: {
                    get: function(e) {
                        var n = e.getAttributeNode("tabindex");
                        return n && n.specified ? parseInt(n.value, 10) : z.test(e.nodeName) || W.test(e.nodeName) && e.href ? 0 : t
                    }
                }
            }
        }), F = {
            get: function(e, n) {
                var r, i = v.prop(e, n);
                return i === !0 || "boolean" != typeof i && (r = e.getAttributeNode(n)) && r.nodeValue !== !1 ? n.toLowerCase() : t
            },
            set: function(e, t, n) {
                var r;
                return t === !1 ? v.removeAttr(e, n) : (r = v.propFix[n] || n, r in e && (e[r] = !0), e.setAttribute(n, n.toLowerCase())), n
            }
        }, V || (I = {
            name: !0,
            id: !0,
            coords: !0
        }, j = v.valHooks.button = {
            get: function(e, n) {
                var r;
                return r = e.getAttributeNode(n), r && (I[n] ? "" !== r.value : r.specified) ? r.value : t
            },
            set: function(e, t, n) {
                var r = e.getAttributeNode(n);
                return r || (r = i.createAttribute(n), e.setAttributeNode(r)), r.value = t + ""
            }
        }, v.each(["width", "height"], function(e, t) {
            v.attrHooks[t] = v.extend(v.attrHooks[t], {
                set: function(e, n) {
                    return "" === n ? (e.setAttribute(t, "auto"), n) : void 0
                }
            })
        }), v.attrHooks.contenteditable = {
            get: j.get,
            set: function(e, t, n) {
                "" === t && (t = "false"), j.set(e, t, n)
            }
        }), v.support.hrefNormalized || v.each(["href", "src", "width", "height"], function(e, n) {
            v.attrHooks[n] = v.extend(v.attrHooks[n], {
                get: function(e) {
                    var r = e.getAttribute(n, 2);
                    return null === r ? t : r
                }
            })
        }), v.support.style || (v.attrHooks.style = {
            get: function(e) {
                return e.style.cssText.toLowerCase() || t
            },
            set: function(e, t) {
                return e.style.cssText = t + ""
            }
        }), v.support.optSelected || (v.propHooks.selected = v.extend(v.propHooks.selected, {
            get: function(e) {
                var t = e.parentNode;
                return t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex), null
            }
        })), v.support.enctype || (v.propFix.enctype = "encoding"), v.support.checkOn || v.each(["radio", "checkbox"], function() {
            v.valHooks[this] = {
                get: function(e) {
                    return null === e.getAttribute("value") ? "on" : e.value
                }
            }
        }), v.each(["radio", "checkbox"], function() {
            v.valHooks[this] = v.extend(v.valHooks[this], {
                set: function(e, t) {
                    return v.isArray(t) ? e.checked = v.inArray(v(e).val(), t) >= 0 : void 0
                }
            })
        });
        var $ = /^(?:textarea|input|select)$/i,
            J = /^([^\.]*|)(?:\.(.+)|)$/,
            K = /(?:^|\s)hover(\.\S+|)\b/,
            Q = /^key/,
            G = /^(?:mouse|contextmenu)|click/,
            Y = /^(?:focusinfocus|focusoutblur)$/,
            Z = function(e) {
                return v.event.special.hover ? e : e.replace(K, "mouseenter$1 mouseleave$1")
            };
        v.event = {
                add: function(e, n, r, i, s) {
                    var o, u, a, f, l, c, h, p, d, m, g;
                    if (3 !== e.nodeType && 8 !== e.nodeType && n && r && (o = v._data(e))) {
                        for (r.handler && (d = r, r = d.handler, s = d.selector), r.guid || (r.guid = v.guid++), a = o.events, a || (o.events = a = {}), u = o.handle, u || (o.handle = u = function(e) {
                                return "undefined" == typeof v || e && v.event.triggered === e.type ? t : v.event.dispatch.apply(u.elem, arguments)
                            }, u.elem = e), n = v.trim(Z(n)).split(" "), f = 0; f < n.length; f++) l = J.exec(n[f]) || [], c = l[1], h = (l[2] || "").split(".").sort(), g = v.event.special[c] || {}, c = (s ? g.delegateType : g.bindType) || c, g = v.event.special[c] || {}, p = v.extend({
                            type: c,
                            origType: l[1],
                            data: i,
                            handler: r,
                            guid: r.guid,
                            selector: s,
                            needsContext: s && v.expr.match.needsContext.test(s),
                            namespace: h.join(".")
                        }, d), m = a[c], m || (m = a[c] = [], m.delegateCount = 0, g.setup && g.setup.call(e, i, h, u) !== !1 || (e.addEventListener ? e.addEventListener(c, u, !1) : e.attachEvent && e.attachEvent("on" + c, u))), g.add && (g.add.call(e, p), p.handler.guid || (p.handler.guid = r.guid)), s ? m.splice(m.delegateCount++, 0, p) : m.push(p), v.event.global[c] = !0;
                        e = null
                    }
                },
                global: {},
                remove: function(e, t, n, r, i) {
                    var s, o, u, a, f, l, c, h, p, d, m, g = v.hasData(e) && v._data(e);
                    if (g && (h = g.events)) {
                        for (t = v.trim(Z(t || "")).split(" "), s = 0; s < t.length; s++)
                            if (o = J.exec(t[s]) || [], u = a = o[1], f = o[2], u) {
                                for (p = v.event.special[u] || {}, u = (r ? p.delegateType : p.bindType) || u, d = h[u] || [], l = d.length, f = f ? new RegExp("(^|\\.)" + f.split(".").sort().join("\\.(?:.*\\.|)") + "(\\.|$)") : null, c = 0; c < d.length; c++) m = d[c], !(!i && a !== m.origType || n && n.guid !== m.guid || f && !f.test(m.namespace) || r && r !== m.selector && ("**" !== r || !m.selector) || (d.splice(c--, 1), m.selector && d.delegateCount--, !p.remove || !p.remove.call(e, m)));
                                0 === d.length && l !== d.length && ((!p.teardown || p.teardown.call(e, f, g.handle) === !1) && v.removeEvent(e, u, g.handle), delete h[u])
                            } else
                                for (u in h) v.event.remove(e, u + t[s], n, r, !0);
                        v.isEmptyObject(h) && (delete g.handle, v.removeData(e, "events", !0))
                    }
                },
                customEvent: {
                    getData: !0,
                    setData: !0,
                    changeData: !0
                },
                trigger: function(n, r, s, o) {
                    if (!s || 3 !== s.nodeType && 8 !== s.nodeType) {
                        var u, a, f, l, c, h, p, d, m, g, y = n.type || n,
                            b = [];
                        if (Y.test(y + v.event.triggered)) return;
                        if (y.indexOf("!") >= 0 && (y = y.slice(0, -1), a = !0), y.indexOf(".") >= 0 && (b = y.split("."), y = b.shift(), b.sort()), (!s || v.event.customEvent[y]) && !v.event.global[y]) return;
                        if (n = "object" == typeof n ? n[v.expando] ? n : new v.Event(y, n) : new v.Event(y), n.type = y, n.isTrigger = !0, n.exclusive = a, n.namespace = b.join("."), n.namespace_re = n.namespace ? new RegExp("(^|\\.)" + b.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, h = y.indexOf(":") < 0 ? "on" + y : "", !s) {
                            u = v.cache;
                            for (f in u) u[f].events && u[f].events[y] && v.event.trigger(n, r, u[f].handle.elem, !0);
                            return
                        }
                        if (n.result = t, n.target || (n.target = s), r = null != r ? v.makeArray(r) : [], r.unshift(n), p = v.event.special[y] || {}, p.trigger && p.trigger.apply(s, r) === !1) return;
                        if (m = [
                                [s, p.bindType || y]
                            ], !o && !p.noBubble && !v.isWindow(s)) {
                            for (g = p.delegateType || y, l = Y.test(g + y) ? s : s.parentNode, c = s; l; l = l.parentNode) m.push([l, g]), c = l;
                            c === (s.ownerDocument || i) && m.push([c.defaultView || c.parentWindow || e, g])
                        }
                        for (f = 0; f < m.length && !n.isPropagationStopped(); f++) l = m[f][0], n.type = m[f][1], d = (v._data(l, "events") || {})[n.type] && v._data(l, "handle"), d && d.apply(l, r), d = h && l[h], d && v.acceptData(l) && d.apply && d.apply(l, r) === !1 && n.preventDefault();
                        return n.type = y, !(o || n.isDefaultPrevented() || p._default && p._default.apply(s.ownerDocument, r) !== !1 || "click" === y && v.nodeName(s, "a") || !v.acceptData(s) || !h || !s[y] || ("focus" === y || "blur" === y) && 0 === n.target.offsetWidth || v.isWindow(s) || (c = s[h], c && (s[h] = null), v.event.triggered = y, s[y](), v.event.triggered = t, !c || !(s[h] = c))), n.result
                    }
                },
                dispatch: function(n) {
                    n = v.event.fix(n || e.event);
                    var r, i, s, o, u, a, f, c, h, d = (v._data(this, "events") || {})[n.type] || [],
                        m = d.delegateCount,
                        g = l.call(arguments),
                        y = !n.exclusive && !n.namespace,
                        b = v.event.special[n.type] || {},
                        w = [];
                    if (g[0] = n, n.delegateTarget = this, !b.preDispatch || b.preDispatch.call(this, n) !== !1) {
                        if (m && (!n.button || "click" !== n.type))
                            for (s = n.target; s != this; s = s.parentNode || this)
                                if (s.disabled !== !0 || "click" !== n.type) {
                                    for (u = {}, f = [], r = 0; m > r; r++) c = d[r], h = c.selector, u[h] === t && (u[h] = c.needsContext ? v(h, this).index(s) >= 0 : v.find(h, this, null, [s]).length), u[h] && f.push(c);
                                    f.length && w.push({
                                        elem: s,
                                        matches: f
                                    })
                                }
                        for (d.length > m && w.push({
                                elem: this,
                                matches: d.slice(m)
                            }), r = 0; r < w.length && !n.isPropagationStopped(); r++)
                            for (a = w[r], n.currentTarget = a.elem, i = 0; i < a.matches.length && !n.isImmediatePropagationStopped(); i++) c = a.matches[i], (y || !n.namespace && !c.namespace || n.namespace_re && n.namespace_re.test(c.namespace)) && (n.data = c.data, n.handleObj = c, o = ((v.event.special[c.origType] || {}).handle || c.handler).apply(a.elem, g), o !== t && (n.result = o, o === !1 && (n.preventDefault(), n.stopPropagation())));
                        return b.postDispatch && b.postDispatch.call(this, n), n.result
                    }
                },
                props: "attrChange attrName relatedNode srcElement altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
                fixHooks: {},
                keyHooks: {
                    props: "char charCode key keyCode".split(" "),
                    filter: function(e, t) {
                        return null == e.which && (e.which = null != t.charCode ? t.charCode : t.keyCode), e
                    }
                },
                mouseHooks: {
                    props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
                    filter: function(e, n) {
                        var r, s, o, u = n.button,
                            a = n.fromElement;
                        return null == e.pageX && null != n.clientX && (r = e.target.ownerDocument || i, s = r.documentElement, o = r.body, e.pageX = n.clientX + (s && s.scrollLeft || o && o.scrollLeft || 0) - (s && s.clientLeft || o && o.clientLeft || 0), e.pageY = n.clientY + (s && s.scrollTop || o && o.scrollTop || 0) - (s && s.clientTop || o && o.clientTop || 0)), !e.relatedTarget && a && (e.relatedTarget = a === e.target ? n.toElement : a), !e.which && u !== t && (e.which = 1 & u ? 1 : 2 & u ? 3 : 4 & u ? 2 : 0), e
                    }
                },
                fix: function(e) {
                    if (e[v.expando]) return e;
                    var t, n, r = e,
                        s = v.event.fixHooks[e.type] || {},
                        o = s.props ? this.props.concat(s.props) : this.props;
                    for (e = v.Event(r), t = o.length; t;) n = o[--t], e[n] = r[n];
                    return e.target || (e.target = r.srcElement || i), 3 === e.target.nodeType && (e.target = e.target.parentNode), e.metaKey = !!e.metaKey, s.filter ? s.filter(e, r) : e
                },
                special: {
                    load: {
                        noBubble: !0
                    },
                    focus: {
                        delegateType: "focusin"
                    },
                    blur: {
                        delegateType: "focusout"
                    },
                    beforeunload: {
                        setup: function(e, t, n) {
                            v.isWindow(this) && (this.onbeforeunload = n)
                        },
                        teardown: function(e, t) {
                            this.onbeforeunload === t && (this.onbeforeunload = null)
                        }
                    }
                },
                simulate: function(e, t, n, r) {
                    var i = v.extend(new v.Event, n, {
                        type: e,
                        isSimulated: !0,
                        originalEvent: {}
                    });
                    r ? v.event.trigger(i, null, t) : v.event.dispatch.call(t, i), i.isDefaultPrevented() && n.preventDefault()
                }
            }, v.event.handle = v.event.dispatch, v.removeEvent = i.removeEventListener ? function(e, t, n) {
                e.removeEventListener && e.removeEventListener(t, n, !1)
            } : function(e, t, n) {
                var r = "on" + t;
                e.detachEvent && ("undefined" == typeof e[r] && (e[r] = null), e.detachEvent(r, n))
            }, v.Event = function(e, t) {
                return this instanceof v.Event ? (e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || e.returnValue === !1 || e.getPreventDefault && e.getPreventDefault() ? tt : et) : this.type = e, t && v.extend(this, t), this.timeStamp = e && e.timeStamp || v.now(), this[v.expando] = !0, void 0) : new v.Event(e, t)
            }, v.Event.prototype = {
                preventDefault: function() {
                    this.isDefaultPrevented = tt;
                    var e = this.originalEvent;
                    e && (e.preventDefault ? e.preventDefault() : e.returnValue = !1)
                },
                stopPropagation: function() {
                    this.isPropagationStopped = tt;
                    var e = this.originalEvent;
                    e && (e.stopPropagation && e.stopPropagation(), e.cancelBubble = !0)
                },
                stopImmediatePropagation: function() {
                    this.isImmediatePropagationStopped = tt, this.stopPropagation()
                },
                isDefaultPrevented: et,
                isPropagationStopped: et,
                isImmediatePropagationStopped: et
            }, v.each({
                mouseenter: "mouseover",
                mouseleave: "mouseout"
            }, function(e, t) {
                v.event.special[e] = {
                    delegateType: t,
                    bindType: t,
                    handle: function(e) {
                        {
                            var n, r = this,
                                i = e.relatedTarget,
                                s = e.handleObj;
                            s.selector
                        }
                        return (!i || i !== r && !v.contains(r, i)) && (e.type = s.origType, n = s.handler.apply(this, arguments), e.type = t), n
                    }
                }
            }), v.support.submitBubbles || (v.event.special.submit = {
                setup: function() {
                    return v.nodeName(this, "form") ? !1 : void v.event.add(this, "click._submit keypress._submit", function(e) {
                        var n = e.target,
                            r = v.nodeName(n, "input") || v.nodeName(n, "button") ? n.form : t;
                        r && !v._data(r, "_submit_attached") && (v.event.add(r, "submit._submit", function(e) {
                            e._submit_bubble = !0
                        }), v._data(r, "_submit_attached", !0))
                    })
                },
                postDispatch: function(e) {
                    e._submit_bubble && (delete e._submit_bubble, this.parentNode && !e.isTrigger && v.event.simulate("submit", this.parentNode, e, !0))
                },
                teardown: function() {
                    return v.nodeName(this, "form") ? !1 : void v.event.remove(this, "._submit")
                }
            }), v.support.changeBubbles || (v.event.special.change = {
                setup: function() {
                    return $.test(this.nodeName) ? (("checkbox" === this.type || "radio" === this.type) && (v.event.add(this, "propertychange._change", function(e) {
                        "checked" === e.originalEvent.propertyName && (this._just_changed = !0)
                    }), v.event.add(this, "click._change", function(e) {
                        this._just_changed && !e.isTrigger && (this._just_changed = !1), v.event.simulate("change", this, e, !0)
                    })), !1) : void v.event.add(this, "beforeactivate._change", function(e) {
                        var t = e.target;
                        $.test(t.nodeName) && !v._data(t, "_change_attached") && (v.event.add(t, "change._change", function(e) {
                            this.parentNode && !e.isSimulated && !e.isTrigger && v.event.simulate("change", this.parentNode, e, !0)
                        }), v._data(t, "_change_attached", !0))
                    })
                },
                handle: function(e) {
                    var t = e.target;
                    return this !== t || e.isSimulated || e.isTrigger || "radio" !== t.type && "checkbox" !== t.type ? e.handleObj.handler.apply(this, arguments) : void 0
                },
                teardown: function() {
                    return v.event.remove(this, "._change"), !$.test(this.nodeName)
                }
            }), v.support.focusinBubbles || v.each({
                focus: "focusin",
                blur: "focusout"
            }, function(e, t) {
                var n = 0,
                    r = function(e) {
                        v.event.simulate(t, e.target, v.event.fix(e), !0)
                    };
                v.event.special[t] = {
                    setup: function() {
                        0 === n++ && i.addEventListener(e, r, !0)
                    },
                    teardown: function() {
                        0 === --n && i.removeEventListener(e, r, !0)
                    }
                }
            }), v.fn.extend({
                on: function(e, n, r, i, s) {
                    var o, u;
                    if ("object" == typeof e) {
                        "string" != typeof n && (r = r || n, n = t);
                        for (u in e) this.on(u, n, r, e[u], s);
                        return this
                    }
                    if (null == r && null == i ? (i = n, r = n = t) : null == i && ("string" == typeof n ? (i = r, r = t) : (i = r, r = n, n = t)), i === !1) i = et;
                    else if (!i) return this;
                    return 1 === s && (o = i, i = function(e) {
                        return v().off(e), o.apply(this, arguments)
                    }, i.guid = o.guid || (o.guid = v.guid++)), this.each(function() {
                        v.event.add(this, e, i, r, n)
                    })
                },
                one: function(e, t, n, r) {
                    return this.on(e, t, n, r, 1)
                },
                off: function(e, n, r) {
                    var i, s;
                    if (e && e.preventDefault && e.handleObj) return i = e.handleObj, v(e.delegateTarget).off(i.namespace ? i.origType + "." + i.namespace : i.origType, i.selector, i.handler), this;
                    if ("object" == typeof e) {
                        for (s in e) this.off(s, n, e[s]);
                        return this
                    }
                    return (n === !1 || "function" == typeof n) && (r = n, n = t), r === !1 && (r = et), this.each(function() {
                        v.event.remove(this, e, r, n)
                    })
                },
                bind: function(e, t, n) {
                    return this.on(e, null, t, n)
                },
                unbind: function(e, t) {
                    return this.off(e, null, t)
                },
                live: function(e, t, n) {
                    return v(this.context).on(e, this.selector, t, n), this
                },
                die: function(e, t) {
                    return v(this.context).off(e, this.selector || "**", t), this
                },
                delegate: function(e, t, n, r) {
                    return this.on(t, e, n, r)
                },
                undelegate: function(e, t, n) {
                    return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n)
                },
                trigger: function(e, t) {
                    return this.each(function() {
                        v.event.trigger(e, t, this)
                    })
                },
                triggerHandler: function(e, t) {
                    return this[0] ? v.event.trigger(e, t, this[0], !0) : void 0
                },
                toggle: function(e) {
                    var t = arguments,
                        n = e.guid || v.guid++,
                        r = 0,
                        i = function(n) {
                            var i = (v._data(this, "lastToggle" + e.guid) || 0) % r;
                            return v._data(this, "lastToggle" + e.guid, i + 1), n.preventDefault(), t[i].apply(this, arguments) || !1
                        };
                    for (i.guid = n; r < t.length;) t[r++].guid = n;
                    return this.click(i)
                },
                hover: function(e, t) {
                    return this.mouseenter(e).mouseleave(t || e)
                }
            }), v.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function(e, t) {
                v.fn[t] = function(e, n) {
                    return null == n && (n = e, e = null), arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t)
                }, Q.test(t) && (v.event.fixHooks[t] = v.event.keyHooks), G.test(t) && (v.event.fixHooks[t] = v.event.mouseHooks)
            }),
            function(e, t) {
                function nt(e, t, n, r) {
                    n = n || [], t = t || g;
                    var i, s, a, f, l = t.nodeType;
                    if (!e || "string" != typeof e) return n;
                    if (1 !== l && 9 !== l) return [];
                    if (a = o(t), !a && !r && (i = R.exec(e)))
                        if (f = i[1]) {
                            if (9 === l) {
                                if (s = t.getElementById(f), !s || !s.parentNode) return n;
                                if (s.id === f) return n.push(s), n
                            } else if (t.ownerDocument && (s = t.ownerDocument.getElementById(f)) && u(t, s) && s.id === f) return n.push(s), n
                        } else {
                            if (i[2]) return S.apply(n, x.call(t.getElementsByTagName(e), 0)), n;
                            if ((f = i[3]) && Z && t.getElementsByClassName) return S.apply(n, x.call(t.getElementsByClassName(f), 0)), n
                        }
                    return vt(e.replace(j, "$1"), t, n, r, a)
                }

                function rt(e) {
                    return function(t) {
                        var n = t.nodeName.toLowerCase();
                        return "input" === n && t.type === e
                    }
                }

                function it(e) {
                    return function(t) {
                        var n = t.nodeName.toLowerCase();
                        return ("input" === n || "button" === n) && t.type === e
                    }
                }

                function st(e) {
                    return N(function(t) {
                        return t = +t, N(function(n, r) {
                            for (var i, s = e([], n.length, t), o = s.length; o--;) n[i = s[o]] && (n[i] = !(r[i] = n[i]))
                        })
                    })
                }

                function ot(e, t, n) {
                    if (e === t) return n;
                    for (var r = e.nextSibling; r;) {
                        if (r === t) return -1;
                        r = r.nextSibling
                    }
                    return 1
                }

                function ut(e, t) {
                    var n, r, s, o, u, a, f, l = L[d][e + " "];
                    if (l) return t ? 0 : l.slice(0);
                    for (u = e, a = [], f = i.preFilter; u;) {
                        (!n || (r = F.exec(u))) && (r && (u = u.slice(r[0].length) || u), a.push(s = [])), n = !1, (r = I.exec(u)) && (s.push(n = new m(r.shift())), u = u.slice(n.length), n.type = r[0].replace(j, " "));
                        for (o in i.filter)(r = J[o].exec(u)) && (!f[o] || (r = f[o](r))) && (s.push(n = new m(r.shift())), u = u.slice(n.length), n.type = o, n.matches = r);
                        if (!n) break
                    }
                    return t ? u.length : u ? nt.error(e) : L(e, a).slice(0)
                }

                function at(e, t, r) {
                    var i = t.dir,
                        s = r && "parentNode" === t.dir,
                        o = w++;
                    return t.first ? function(t, n, r) {
                        for (; t = t[i];)
                            if (s || 1 === t.nodeType) return e(t, n, r)
                    } : function(t, r, u) {
                        if (u) {
                            for (; t = t[i];)
                                if ((s || 1 === t.nodeType) && e(t, r, u)) return t
                        } else
                            for (var a, f = b + " " + o + " ", l = f + n; t = t[i];)
                                if (s || 1 === t.nodeType) {
                                    if ((a = t[d]) === l) return t.sizset;
                                    if ("string" == typeof a && 0 === a.indexOf(f)) {
                                        if (t.sizset) return t
                                    } else {
                                        if (t[d] = l, e(t, r, u)) return t.sizset = !0, t;
                                        t.sizset = !1
                                    }
                                }
                    }
                }

                function ft(e) {
                    return e.length > 1 ? function(t, n, r) {
                        for (var i = e.length; i--;)
                            if (!e[i](t, n, r)) return !1;
                        return !0
                    } : e[0]
                }

                function lt(e, t, n, r, i) {
                    for (var s, o = [], u = 0, a = e.length, f = null != t; a > u; u++)(s = e[u]) && (!n || n(s, r, i)) && (o.push(s), f && t.push(u));
                    return o
                }

                function ct(e, t, n, r, i, s) {
                    return r && !r[d] && (r = ct(r)), i && !i[d] && (i = ct(i, s)), N(function(s, o, u, a) {
                        var f, l, c, h = [],
                            p = [],
                            d = o.length,
                            v = s || dt(t || "*", u.nodeType ? [u] : u, []),
                            m = !e || !s && t ? v : lt(v, h, e, u, a),
                            g = n ? i || (s ? e : d || r) ? [] : o : m;
                        if (n && n(m, g, u, a), r)
                            for (f = lt(g, p), r(f, [], u, a), l = f.length; l--;)(c = f[l]) && (g[p[l]] = !(m[p[l]] = c));
                        if (s) {
                            if (i || e) {
                                if (i) {
                                    for (f = [], l = g.length; l--;)(c = g[l]) && f.push(m[l] = c);
                                    i(null, g = [], f, a)
                                }
                                for (l = g.length; l--;)(c = g[l]) && (f = i ? T.call(s, c) : h[l]) > -1 && (s[f] = !(o[f] = c))
                            }
                        } else g = lt(g === o ? g.splice(d, g.length) : g), i ? i(null, o, g, a) : S.apply(o, g)
                    })
                }

                function ht(e) {
                    for (var t, n, r, s = e.length, o = i.relative[e[0].type], u = o || i.relative[" "], a = o ? 1 : 0, f = at(function(e) {
                            return e === t
                        }, u, !0), l = at(function(e) {
                            return T.call(t, e) > -1
                        }, u, !0), h = [function(e, n, r) {
                            return !o && (r || n !== c) || ((t = n).nodeType ? f(e, n, r) : l(e, n, r))
                        }]; s > a; a++)
                        if (n = i.relative[e[a].type]) h = [at(ft(h), n)];
                        else {
                            if (n = i.filter[e[a].type].apply(null, e[a].matches), n[d]) {
                                for (r = ++a; s > r && !i.relative[e[r].type]; r++);
                                return ct(a > 1 && ft(h), a > 1 && e.slice(0, a - 1).join("").replace(j, "$1"), n, r > a && ht(e.slice(a, r)), s > r && ht(e = e.slice(r)), s > r && e.join(""))
                            }
                            h.push(n)
                        }
                    return ft(h)
                }

                function pt(e, t) {
                    var r = t.length > 0,
                        s = e.length > 0,
                        o = function(u, a, f, l, h) {
                            var p, d, v, m = [],
                                y = 0,
                                w = "0",
                                x = u && [],
                                T = null != h,
                                N = c,
                                C = u || s && i.find.TAG("*", h && a.parentNode || a),
                                k = b += null == N ? 1 : Math.E;
                            for (T && (c = a !== g && a, n = o.el); null != (p = C[w]); w++) {
                                if (s && p) {
                                    for (d = 0; v = e[d]; d++)
                                        if (v(p, a, f)) {
                                            l.push(p);
                                            break
                                        }
                                    T && (b = k, n = ++o.el)
                                }
                                r && ((p = !v && p) && y--, u && x.push(p))
                            }
                            if (y += w, r && w !== y) {
                                for (d = 0; v = t[d]; d++) v(x, m, a, f);
                                if (u) {
                                    if (y > 0)
                                        for (; w--;) !x[w] && !m[w] && (m[w] = E.call(l));
                                    m = lt(m)
                                }
                                S.apply(l, m), T && !u && m.length > 0 && y + t.length > 1 && nt.uniqueSort(l)
                            }
                            return T && (b = k, c = N), x
                        };
                    return o.el = 0, r ? N(o) : o
                }

                function dt(e, t, n) {
                    for (var r = 0, i = t.length; i > r; r++) nt(e, t[r], n);
                    return n
                }

                function vt(e, t, n, r, s) {
                    {
                        var o, u, f, l, c, h = ut(e);
                        h.length
                    }
                    if (!r && 1 === h.length) {
                        if (u = h[0] = h[0].slice(0), u.length > 2 && "ID" === (f = u[0]).type && 9 === t.nodeType && !s && i.relative[u[1].type]) {
                            if (t = i.find.ID(f.matches[0].replace($, ""), t, s)[0], !t) return n;
                            e = e.slice(u.shift().length)
                        }
                        for (o = J.POS.test(e) ? -1 : u.length - 1; o >= 0 && (f = u[o], !i.relative[l = f.type]); o--)
                            if ((c = i.find[l]) && (r = c(f.matches[0].replace($, ""), z.test(u[0].type) && t.parentNode || t, s))) {
                                if (u.splice(o, 1), e = r.length && u.join(""), !e) return S.apply(n, x.call(r, 0)), n;
                                break
                            }
                    }
                    return a(e, h)(r, t, s, n, z.test(e)), n
                }

                function mt() {}
                var n, r, i, s, o, u, a, f, l, c, h = !0,
                    p = "undefined",
                    d = ("sizcache" + Math.random()).replace(".", ""),
                    m = String,
                    g = e.document,
                    y = g.documentElement,
                    b = 0,
                    w = 0,
                    E = [].pop,
                    S = [].push,
                    x = [].slice,
                    T = [].indexOf || function(e) {
                        for (var t = 0, n = this.length; n > t; t++)
                            if (this[t] === e) return t;
                        return -1
                    },
                    N = function(e, t) {
                        return e[d] = null == t || t, e
                    },
                    C = function() {
                        var e = {},
                            t = [];
                        return N(function(n, r) {
                            return t.push(n) > i.cacheLength && delete e[t.shift()], e[n + " "] = r
                        }, e)
                    },
                    k = C(),
                    L = C(),
                    A = C(),
                    O = "[\\x20\\t\\r\\n\\f]",
                    M = "(?:\\\\.|[-\\w]|[^\\x00-\\xa0])+",
                    _ = M.replace("w", "w#"),
                    D = "([*^$|!~]?=)",
                    P = "\\[" + O + "*(" + M + ")" + O + "*(?:" + D + O + "*(?:(['\"])((?:\\\\.|[^\\\\])*?)\\3|(" + _ + ")|)|)" + O + "*\\]",
                    H = ":(" + M + ")(?:\\((?:(['\"])((?:\\\\.|[^\\\\])*?)\\2|([^()[\\]]*|(?:(?:" + P + ")|[^:]|\\\\.)*|.*))\\)|)",
                    B = ":(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + O + "*((?:-\\d)?\\d*)" + O + "*\\)|)(?=[^-]|$)",
                    j = new RegExp("^" + O + "+|((?:^|[^\\\\])(?:\\\\.)*)" + O + "+$", "g"),
                    F = new RegExp("^" + O + "*," + O + "*"),
                    I = new RegExp("^" + O + "*([\\x20\\t\\r\\n\\f>+~])" + O + "*"),
                    q = new RegExp(H),
                    R = /^(?:#([\w\-]+)|(\w+)|\.([\w\-]+))$/,
                    z = /[\x20\t\r\n\f]*[+~]/,
                    X = /h\d/i,
                    V = /input|select|textarea|button/i,
                    $ = /\\(?!\\)/g,
                    J = {
                        ID: new RegExp("^#(" + M + ")"),
                        CLASS: new RegExp("^\\.(" + M + ")"),
                        NAME: new RegExp("^\\[name=['\"]?(" + M + ")['\"]?\\]"),
                        TAG: new RegExp("^(" + M.replace("w", "w*") + ")"),
                        ATTR: new RegExp("^" + P),
                        PSEUDO: new RegExp("^" + H),
                        POS: new RegExp(B, "i"),
                        CHILD: new RegExp("^:(only|nth|first|last)-child(?:\\(" + O + "*(even|odd|(([+-]|)(\\d*)n|)" + O + "*(?:([+-]|)" + O + "*(\\d+)|))" + O + "*\\)|)", "i"),
                        needsContext: new RegExp("^" + O + "*[>+~]|" + B, "i")
                    },
                    K = function(e) {
                        var t = g.createElement("div");
                        try {
                            return e(t)
                        } catch (n) {
                            return !1
                        } finally {
                            t = null
                        }
                    },
                    Q = K(function(e) {
                        return e.appendChild(g.createComment("")), !e.getElementsByTagName("*").length
                    }),
                    G = K(function(e) {
                        return e.innerHTML = "<a href='#'></a>", e.firstChild && typeof e.firstChild.getAttribute !== p && "#" === e.firstChild.getAttribute("href")
                    }),
                    Y = K(function(e) {
                        e.innerHTML = "<select></select>";
                        var t = typeof e.lastChild.getAttribute("multiple");
                        return "boolean" !== t && "string" !== t
                    }),
                    Z = K(function(e) {
                        return e.innerHTML = "<div class='hidden e'></div><div class='hidden'></div>", e.getElementsByClassName && e.getElementsByClassName("e").length ? (e.lastChild.className = "e", 2 === e.getElementsByClassName("e").length) : !1
                    }),
                    et = K(function(e) {
                        e.id = d + 0, e.innerHTML = "<a name='" + d + "'></a><div name='" + d + "'></div>", y.insertBefore(e, y.firstChild);
                        var t = g.getElementsByName && g.getElementsByName(d).length === 2 + g.getElementsByName(d + 0).length;
                        return r = !g.getElementById(d), y.removeChild(e), t
                    });
                try {
                    x.call(y.childNodes, 0)[0].nodeType
                } catch (tt) {
                    x = function(e) {
                        for (var t, n = []; t = this[e]; e++) n.push(t);
                        return n
                    }
                }
                nt.matches = function(e, t) {
                    return nt(e, null, null, t)
                }, nt.matchesSelector = function(e, t) {
                    return nt(t, null, null, [e]).length > 0
                }, s = nt.getText = function(e) {
                    var t, n = "",
                        r = 0,
                        i = e.nodeType;
                    if (i) {
                        if (1 === i || 9 === i || 11 === i) {
                            if ("string" == typeof e.textContent) return e.textContent;
                            for (e = e.firstChild; e; e = e.nextSibling) n += s(e)
                        } else if (3 === i || 4 === i) return e.nodeValue
                    } else
                        for (; t = e[r]; r++) n += s(t);
                    return n
                }, o = nt.isXML = function(e) {
                    var t = e && (e.ownerDocument || e).documentElement;
                    return t ? "HTML" !== t.nodeName : !1
                }, u = nt.contains = y.contains ? function(e, t) {
                    var n = 9 === e.nodeType ? e.documentElement : e,
                        r = t && t.parentNode;
                    return e === r || !!(r && 1 === r.nodeType && n.contains && n.contains(r))
                } : y.compareDocumentPosition ? function(e, t) {
                    return t && !!(16 & e.compareDocumentPosition(t))
                } : function(e, t) {
                    for (; t = t.parentNode;)
                        if (t === e) return !0;
                    return !1
                }, nt.attr = function(e, t) {
                    var n, r = o(e);
                    return r || (t = t.toLowerCase()), (n = i.attrHandle[t]) ? n(e) : r || Y ? e.getAttribute(t) : (n = e.getAttributeNode(t), n ? "boolean" == typeof e[t] ? e[t] ? t : null : n.specified ? n.value : null : null)
                }, i = nt.selectors = {
                    cacheLength: 50,
                    createPseudo: N,
                    match: J,
                    attrHandle: G ? {} : {
                        href: function(e) {
                            return e.getAttribute("href", 2)
                        },
                        type: function(e) {
                            return e.getAttribute("type")
                        }
                    },
                    find: {
                        ID: r ? function(e, t, n) {
                            if (typeof t.getElementById !== p && !n) {
                                var r = t.getElementById(e);
                                return r && r.parentNode ? [r] : []
                            }
                        } : function(e, n, r) {
                            if (typeof n.getElementById !== p && !r) {
                                var i = n.getElementById(e);
                                return i ? i.id === e || typeof i.getAttributeNode !== p && i.getAttributeNode("id").value === e ? [i] : t : []
                            }
                        },
                        TAG: Q ? function(e, t) {
                            return typeof t.getElementsByTagName !== p ? t.getElementsByTagName(e) : void 0
                        } : function(e, t) {
                            var n = t.getElementsByTagName(e);
                            if ("*" === e) {
                                for (var r, i = [], s = 0; r = n[s]; s++) 1 === r.nodeType && i.push(r);
                                return i
                            }
                            return n
                        },
                        NAME: et && function(e, t) {
                            return typeof t.getElementsByName !== p ? t.getElementsByName(name) : void 0
                        },
                        CLASS: Z && function(e, t, n) {
                            return typeof t.getElementsByClassName === p || n ? void 0 : t.getElementsByClassName(e)
                        }
                    },
                    relative: {
                        ">": {
                            dir: "parentNode",
                            first: !0
                        },
                        " ": {
                            dir: "parentNode"
                        },
                        "+": {
                            dir: "previousSibling",
                            first: !0
                        },
                        "~": {
                            dir: "previousSibling"
                        }
                    },
                    preFilter: {
                        ATTR: function(e) {
                            return e[1] = e[1].replace($, ""), e[3] = (e[4] || e[5] || "").replace($, ""), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4)
                        },
                        CHILD: function(e) {
                            return e[1] = e[1].toLowerCase(), "nth" === e[1] ? (e[2] || nt.error(e[0]), e[3] = +(e[3] ? e[4] + (e[5] || 1) : 2 * ("even" === e[2] || "odd" === e[2])), e[4] = +(e[6] + e[7] || "odd" === e[2])) : e[2] && nt.error(e[0]), e
                        },
                        PSEUDO: function(e) {
                            var t, n;
                            return J.CHILD.test(e[0]) ? null : (e[3] ? e[2] = e[3] : (t = e[4]) && (q.test(t) && (n = ut(t, !0)) && (n = t.indexOf(")", t.length - n) - t.length) && (t = t.slice(0, n), e[0] = e[0].slice(0, n)), e[2] = t), e.slice(0, 3))
                        }
                    },
                    filter: {
                        ID: r ? function(e) {
                            return e = e.replace($, ""),
                                function(t) {
                                    return t.getAttribute("id") === e
                                }
                        } : function(e) {
                            return e = e.replace($, ""),
                                function(t) {
                                    var n = typeof t.getAttributeNode !== p && t.getAttributeNode("id");
                                    return n && n.value === e
                                }
                        },
                        TAG: function(e) {
                            return "*" === e ? function() {
                                return !0
                            } : (e = e.replace($, "").toLowerCase(), function(t) {
                                return t.nodeName && t.nodeName.toLowerCase() === e
                            })
                        },
                        CLASS: function(e) {
                            var t = k[d][e + " "];
                            return t || (t = new RegExp("(^|" + O + ")" + e + "(" + O + "|$)")) && k(e, function(e) {
                                return t.test(e.className || typeof e.getAttribute !== p && e.getAttribute("class") || "")
                            })
                        },
                        ATTR: function(e, t, n) {
                            return function(r) {
                                var s = nt.attr(r, e);
                                return null == s ? "!=" === t : t ? (s += "", "=" === t ? s === n : "!=" === t ? s !== n : "^=" === t ? n && 0 === s.indexOf(n) : "*=" === t ? n && s.indexOf(n) > -1 : "$=" === t ? n && s.substr(s.length - n.length) === n : "~=" === t ? (" " + s + " ").indexOf(n) > -1 : "|=" === t ? s === n || s.substr(0, n.length + 1) === n + "-" : !1) : !0
                            }
                        },
                        CHILD: function(e, t, n, r) {
                            return "nth" === e ? function(e) {
                                var t, i, s = e.parentNode;
                                if (1 === n && 0 === r) return !0;
                                if (s)
                                    for (i = 0, t = s.firstChild; t && (1 !== t.nodeType || (i++, e !== t)); t = t.nextSibling);
                                return i -= r, i === n || i % n === 0 && i / n >= 0
                            } : function(t) {
                                var n = t;
                                switch (e) {
                                    case "only":
                                    case "first":
                                        for (; n = n.previousSibling;)
                                            if (1 === n.nodeType) return !1;
                                        if ("first" === e) return !0;
                                        n = t;
                                    case "last":
                                        for (; n = n.nextSibling;)
                                            if (1 === n.nodeType) return !1;
                                        return !0
                                }
                            }
                        },
                        PSEUDO: function(e, t) {
                            var n, r = i.pseudos[e] || i.setFilters[e.toLowerCase()] || nt.error("unsupported pseudo: " + e);
                            return r[d] ? r(t) : r.length > 1 ? (n = [e, e, "", t], i.setFilters.hasOwnProperty(e.toLowerCase()) ? N(function(e, n) {
                                for (var i, s = r(e, t), o = s.length; o--;) i = T.call(e, s[o]), e[i] = !(n[i] = s[o])
                            }) : function(e) {
                                return r(e, 0, n)
                            }) : r
                        }
                    },
                    pseudos: {
                        not: N(function(e) {
                            var t = [],
                                n = [],
                                r = a(e.replace(j, "$1"));
                            return r[d] ? N(function(e, t, n, i) {
                                for (var s, o = r(e, null, i, []), u = e.length; u--;)(s = o[u]) && (e[u] = !(t[u] = s))
                            }) : function(e, i, s) {
                                return t[0] = e, r(t, null, s, n), !n.pop()
                            }
                        }),
                        has: N(function(e) {
                            return function(t) {
                                return nt(e, t).length > 0
                            }
                        }),
                        contains: N(function(e) {
                            return function(t) {
                                return (t.textContent || t.innerText || s(t)).indexOf(e) > -1
                            }
                        }),
                        enabled: function(e) {
                            return e.disabled === !1
                        },
                        disabled: function(e) {
                            return e.disabled === !0
                        },
                        checked: function(e) {
                            var t = e.nodeName.toLowerCase();
                            return "input" === t && !!e.checked || "option" === t && !!e.selected
                        },
                        selected: function(e) {
                            return e.parentNode && e.parentNode.selectedIndex, e.selected === !0
                        },
                        parent: function(e) {
                            return !i.pseudos.empty(e)
                        },
                        empty: function(e) {
                            var t;
                            for (e = e.firstChild; e;) {
                                if (e.nodeName > "@" || 3 === (t = e.nodeType) || 4 === t) return !1;
                                e = e.nextSibling
                            }
                            return !0
                        },
                        header: function(e) {
                            return X.test(e.nodeName)
                        },
                        text: function(e) {
                            var t, n;
                            return "input" === e.nodeName.toLowerCase() && "text" === (t = e.type) && (null == (n = e.getAttribute("type")) || n.toLowerCase() === t)
                        },
                        radio: rt("radio"),
                        checkbox: rt("checkbox"),
                        file: rt("file"),
                        password: rt("password"),
                        image: rt("image"),
                        submit: it("submit"),
                        reset: it("reset"),
                        button: function(e) {
                            var t = e.nodeName.toLowerCase();
                            return "input" === t && "button" === e.type || "button" === t
                        },
                        input: function(e) {
                            return V.test(e.nodeName)
                        },
                        focus: function(e) {
                            var t = e.ownerDocument;
                            return e === t.activeElement && (!t.hasFocus || t.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
                        },
                        active: function(e) {
                            return e === e.ownerDocument.activeElement
                        },
                        first: st(function() {
                            return [0]
                        }),
                        last: st(function(e, t) {
                            return [t - 1]
                        }),
                        eq: st(function(e, t, n) {
                            return [0 > n ? n + t : n]
                        }),
                        even: st(function(e, t) {
                            for (var n = 0; t > n; n += 2) e.push(n);
                            return e
                        }),
                        odd: st(function(e, t) {
                            for (var n = 1; t > n; n += 2) e.push(n);
                            return e
                        }),
                        lt: st(function(e, t, n) {
                            for (var r = 0 > n ? n + t : n; --r >= 0;) e.push(r);
                            return e
                        }),
                        gt: st(function(e, t, n) {
                            for (var r = 0 > n ? n + t : n; ++r < t;) e.push(r);
                            return e
                        })
                    }
                }, f = y.compareDocumentPosition ? function(e, t) {
                    return e === t ? (l = !0, 0) : (e.compareDocumentPosition && t.compareDocumentPosition ? 4 & e.compareDocumentPosition(t) : e.compareDocumentPosition) ? -1 : 1
                } : function(e, t) {
                    if (e === t) return l = !0, 0;
                    if (e.sourceIndex && t.sourceIndex) return e.sourceIndex - t.sourceIndex;
                    var n, r, i = [],
                        s = [],
                        o = e.parentNode,
                        u = t.parentNode,
                        a = o;
                    if (o === u) return ot(e, t);
                    if (!o) return -1;
                    if (!u) return 1;
                    for (; a;) i.unshift(a), a = a.parentNode;
                    for (a = u; a;) s.unshift(a), a = a.parentNode;
                    n = i.length, r = s.length;
                    for (var f = 0; n > f && r > f; f++)
                        if (i[f] !== s[f]) return ot(i[f], s[f]);
                    return f === n ? ot(e, s[f], -1) : ot(i[f], t, 1)
                }, [0, 0].sort(f), h = !l, nt.uniqueSort = function(e) {
                    var t, n = [],
                        r = 1,
                        i = 0;
                    if (l = h, e.sort(f), l) {
                        for (; t = e[r]; r++) t === e[r - 1] && (i = n.push(r));
                        for (; i--;) e.splice(n[i], 1)
                    }
                    return e
                }, nt.error = function(e) {
                    throw new Error("Syntax error, unrecognized expression: " + e)
                }, a = nt.compile = function(e, t) {
                    var n, r = [],
                        i = [],
                        s = A[d][e + " "];
                    if (!s) {
                        for (t || (t = ut(e)), n = t.length; n--;) s = ht(t[n]), s[d] ? r.push(s) : i.push(s);
                        s = A(e, pt(i, r))
                    }
                    return s
                }, g.querySelectorAll && function() {
                    var e, t = vt,
                        n = /'|\\/g,
                        r = /\=[\x20\t\r\n\f]*([^'"\]]*)[\x20\t\r\n\f]*\]/g,
                        i = [":focus"],
                        s = [":active"],
                        u = y.matchesSelector || y.mozMatchesSelector || y.webkitMatchesSelector || y.oMatchesSelector || y.msMatchesSelector;
                    K(function(e) {
                        e.innerHTML = "<select><option selected=''></option></select>", e.querySelectorAll("[selected]").length || i.push("\\[" + O + "*(?:checked|disabled|ismap|multiple|readonly|selected|value)"), e.querySelectorAll(":checked").length || i.push(":checked")
                    }), K(function(e) {
                        e.innerHTML = "<p test=''></p>", e.querySelectorAll("[test^='']").length && i.push("[*^$]=" + O + "*(?:\"\"|'')"), e.innerHTML = "<input type='hidden'/>", e.querySelectorAll(":enabled").length || i.push(":enabled", ":disabled")
                    }), i = new RegExp(i.join("|")), vt = function(e, r, s, o, u) {
                        if (!o && !u && !i.test(e)) {
                            var a, f, l = !0,
                                c = d,
                                h = r,
                                p = 9 === r.nodeType && e;
                            if (1 === r.nodeType && "object" !== r.nodeName.toLowerCase()) {
                                for (a = ut(e), (l = r.getAttribute("id")) ? c = l.replace(n, "\\$&") : r.setAttribute("id", c), c = "[id='" + c + "'] ", f = a.length; f--;) a[f] = c + a[f].join("");
                                h = z.test(e) && r.parentNode || r, p = a.join(",")
                            }
                            if (p) try {
                                return S.apply(s, x.call(h.querySelectorAll(p), 0)), s
                            } catch (v) {} finally {
                                l || r.removeAttribute("id")
                            }
                        }
                        return t(e, r, s, o, u)
                    }, u && (K(function(t) {
                        e = u.call(t, "div");
                        try {
                            u.call(t, "[test!='']:sizzle"), s.push("!=", H)
                        } catch (n) {}
                    }), s = new RegExp(s.join("|")), nt.matchesSelector = function(t, n) {
                        if (n = n.replace(r, "='$1']"), !o(t) && !s.test(n) && !i.test(n)) try {
                            var a = u.call(t, n);
                            if (a || e || t.document && 11 !== t.document.nodeType) return a
                        } catch (f) {}
                        return nt(n, null, null, [t]).length > 0
                    })
                }(), i.pseudos.nth = i.pseudos.eq, i.filters = mt.prototype = i.pseudos, i.setFilters = new mt, nt.attr = v.attr, v.find = nt, v.expr = nt.selectors, v.expr[":"] = v.expr.pseudos, v.unique = nt.uniqueSort, v.text = nt.getText, v.isXMLDoc = nt.isXML, v.contains = nt.contains
            }(e);
        var nt = /Until$/,
            rt = /^(?:parents|prev(?:Until|All))/,
            it = /^.[^:#\[\.,]*$/,
            st = v.expr.match.needsContext,
            ot = {
                children: !0,
                contents: !0,
                next: !0,
                prev: !0
            };
        v.fn.extend({
            find: function(e) {
                var t, n, r, i, s, o, u = this;
                if ("string" != typeof e) return v(e).filter(function() {
                    for (t = 0, n = u.length; n > t; t++)
                        if (v.contains(u[t], this)) return !0
                });
                for (o = this.pushStack("", "find", e), t = 0, n = this.length; n > t; t++)
                    if (r = o.length, v.find(e, this[t], o), t > 0)
                        for (i = r; i < o.length; i++)
                            for (s = 0; r > s; s++)
                                if (o[s] === o[i]) {
                                    o.splice(i--, 1);
                                    break
                                }
                return o
            },
            has: function(e) {
                var t, n = v(e, this),
                    r = n.length;
                return this.filter(function() {
                    for (t = 0; r > t; t++)
                        if (v.contains(this, n[t])) return !0
                })
            },
            not: function(e) {
                return this.pushStack(ft(this, e, !1), "not", e)
            },
            filter: function(e) {
                return this.pushStack(ft(this, e, !0), "filter", e)
            },
            is: function(e) {
                return !!e && ("string" == typeof e ? st.test(e) ? v(e, this.context).index(this[0]) >= 0 : v.filter(e, this).length > 0 : this.filter(e).length > 0)
            },
            closest: function(e, t) {
                for (var n, r = 0, i = this.length, s = [], o = st.test(e) || "string" != typeof e ? v(e, t || this.context) : 0; i > r; r++)
                    for (n = this[r]; n && n.ownerDocument && n !== t && 11 !== n.nodeType;) {
                        if (o ? o.index(n) > -1 : v.find.matchesSelector(n, e)) {
                            s.push(n);
                            break
                        }
                        n = n.parentNode
                    }
                return s = s.length > 1 ? v.unique(s) : s, this.pushStack(s, "closest", e)
            },
            index: function(e) {
                return e ? "string" == typeof e ? v.inArray(this[0], v(e)) : v.inArray(e.jquery ? e[0] : e, this) : this[0] && this[0].parentNode ? this.prevAll().length : -1
            },
            add: function(e, t) {
                var n = "string" == typeof e ? v(e, t) : v.makeArray(e && e.nodeType ? [e] : e),
                    r = v.merge(this.get(), n);
                return this.pushStack(ut(n[0]) || ut(r[0]) ? r : v.unique(r))
            },
            addBack: function(e) {
                return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
            }
        }), v.fn.andSelf = v.fn.addBack, v.each({
            parent: function(e) {
                var t = e.parentNode;
                return t && 11 !== t.nodeType ? t : null
            },
            parents: function(e) {
                return v.dir(e, "parentNode")
            },
            parentsUntil: function(e, t, n) {
                return v.dir(e, "parentNode", n)
            },
            next: function(e) {
                return at(e, "nextSibling")
            },
            prev: function(e) {
                return at(e, "previousSibling")
            },
            nextAll: function(e) {
                return v.dir(e, "nextSibling")
            },
            prevAll: function(e) {
                return v.dir(e, "previousSibling")
            },
            nextUntil: function(e, t, n) {
                return v.dir(e, "nextSibling", n)
            },
            prevUntil: function(e, t, n) {
                return v.dir(e, "previousSibling", n)
            },
            siblings: function(e) {
                return v.sibling((e.parentNode || {}).firstChild, e)
            },
            children: function(e) {
                return v.sibling(e.firstChild)
            },
            contents: function(e) {
                return v.nodeName(e, "iframe") ? e.contentDocument || e.contentWindow.document : v.merge([], e.childNodes)
            }
        }, function(e, t) {
            v.fn[e] = function(n, r) {
                var i = v.map(this, t, n);
                return nt.test(e) || (r = n), r && "string" == typeof r && (i = v.filter(r, i)), i = this.length > 1 && !ot[e] ? v.unique(i) : i, this.length > 1 && rt.test(e) && (i = i.reverse()), this.pushStack(i, e, l.call(arguments).join(","))
            }
        }), v.extend({
            filter: function(e, t, n) {
                return n && (e = ":not(" + e + ")"), 1 === t.length ? v.find.matchesSelector(t[0], e) ? [t[0]] : [] : v.find.matches(e, t)
            },
            dir: function(e, n, r) {
                for (var i = [], s = e[n]; s && 9 !== s.nodeType && (r === t || 1 !== s.nodeType || !v(s).is(r));) 1 === s.nodeType && i.push(s), s = s[n];
                return i
            },
            sibling: function(e, t) {
                for (var n = []; e; e = e.nextSibling) 1 === e.nodeType && e !== t && n.push(e);
                return n
            }
        });
        var ct = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",
            ht = / jQuery\d+="(?:null|\d+)"/g,
            pt = /^\s+/,
            dt = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
            vt = /<([\w:]+)/,
            mt = /<tbody/i,
            gt = /<|&#?\w+;/,
            yt = /<(?:script|style|link)/i,
            bt = /<(?:script|object|embed|option|style)/i,
            wt = new RegExp("<(?:" + ct + ")[\\s/>]", "i"),
            Et = /^(?:checkbox|radio)$/,
            St = /checked\s*(?:[^=]|=\s*.checked.)/i,
            xt = /\/(java|ecma)script/i,
            Tt = /^\s*<!(?:\[CDATA\[|\-\-)|[\]\-]{2}>\s*$/g,
            Nt = {
                option: [1, "<select multiple='multiple'>", "</select>"],
                legend: [1, "<fieldset>", "</fieldset>"],
                thead: [1, "<table>", "</table>"],
                tr: [2, "<table><tbody>", "</tbody></table>"],
                td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
                col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
                area: [1, "<map>", "</map>"],
                _default: [0, "", ""]
            },
            Ct = lt(i),
            kt = Ct.appendChild(i.createElement("div"));
        Nt.optgroup = Nt.option, Nt.tbody = Nt.tfoot = Nt.colgroup = Nt.caption = Nt.thead, Nt.th = Nt.td, v.support.htmlSerialize || (Nt._default = [1, "X<div>", "</div>"]), v.fn.extend({
                text: function(e) {
                    return v.access(this, function(e) {
                        return e === t ? v.text(this) : this.empty().append((this[0] && this[0].ownerDocument || i).createTextNode(e))
                    }, null, e, arguments.length)
                },
                wrapAll: function(e) {
                    if (v.isFunction(e)) return this.each(function(t) {
                        v(this).wrapAll(e.call(this, t))
                    });
                    if (this[0]) {
                        var t = v(e, this[0].ownerDocument).eq(0).clone(!0);
                        this[0].parentNode && t.insertBefore(this[0]), t.map(function() {
                            for (var e = this; e.firstChild && 1 === e.firstChild.nodeType;) e = e.firstChild;
                            return e
                        }).append(this)
                    }
                    return this
                },
                wrapInner: function(e) {
                    return this.each(v.isFunction(e) ? function(t) {
                        v(this).wrapInner(e.call(this, t))
                    } : function() {
                        var t = v(this),
                            n = t.contents();
                        n.length ? n.wrapAll(e) : t.append(e)
                    })
                },
                wrap: function(e) {
                    var t = v.isFunction(e);
                    return this.each(function(n) {
                        v(this).wrapAll(t ? e.call(this, n) : e)
                    })
                },
                unwrap: function() {
                    return this.parent().each(function() {
                        v.nodeName(this, "body") || v(this).replaceWith(this.childNodes)
                    }).end()
                },
                append: function() {
                    return this.domManip(arguments, !0, function(e) {
                        (1 === this.nodeType || 11 === this.nodeType) && this.appendChild(e)
                    })
                },
                prepend: function() {
                    return this.domManip(arguments, !0, function(e) {
                        (1 === this.nodeType || 11 === this.nodeType) && this.insertBefore(e, this.firstChild)
                    })
                },
                before: function() {
                    if (!ut(this[0])) return this.domManip(arguments, !1, function(e) {
                        this.parentNode.insertBefore(e, this)
                    });
                    if (arguments.length) {
                        var e = v.clean(arguments);
                        return this.pushStack(v.merge(e, this), "before", this.selector)
                    }
                },
                after: function() {
                    if (!ut(this[0])) return this.domManip(arguments, !1, function(e) {
                        this.parentNode.insertBefore(e, this.nextSibling)
                    });
                    if (arguments.length) {
                        var e = v.clean(arguments);
                        return this.pushStack(v.merge(this, e), "after", this.selector)
                    }
                },
                remove: function(e, t) {
                    for (var n, r = 0; null != (n = this[r]); r++)(!e || v.filter(e, [n]).length) && (!t && 1 === n.nodeType && (v.cleanData(n.getElementsByTagName("*")), v.cleanData([n])), n.parentNode && n.parentNode.removeChild(n));
                    return this
                },
                empty: function() {
                    for (var e, t = 0; null != (e = this[t]); t++)
                        for (1 === e.nodeType && v.cleanData(e.getElementsByTagName("*")); e.firstChild;) e.removeChild(e.firstChild);
                    return this
                },
                clone: function(e, t) {
                    return e = null == e ? !1 : e, t = null == t ? e : t, this.map(function() {
                        return v.clone(this, e, t)
                    })
                },
                html: function(e) {
                    return v.access(this, function(e) {
                        var n = this[0] || {},
                            r = 0,
                            i = this.length;
                        if (e === t) return 1 === n.nodeType ? n.innerHTML.replace(ht, "") : t;
                        if (!("string" != typeof e || yt.test(e) || !v.support.htmlSerialize && wt.test(e) || !v.support.leadingWhitespace && pt.test(e) || Nt[(vt.exec(e) || ["", ""])[1].toLowerCase()])) {
                            e = e.replace(dt, "<$1></$2>");
                            try {
                                for (; i > r; r++) n = this[r] || {}, 1 === n.nodeType && (v.cleanData(n.getElementsByTagName("*")), n.innerHTML = e);
                                n = 0
                            } catch (s) {}
                        }
                        n && this.empty().append(e)
                    }, null, e, arguments.length)
                },
                replaceWith: function(e) {
                    return ut(this[0]) ? this.length ? this.pushStack(v(v.isFunction(e) ? e() : e), "replaceWith", e) : this : v.isFunction(e) ? this.each(function(t) {
                        var n = v(this),
                            r = n.html();
                        n.replaceWith(e.call(this, t, r))
                    }) : ("string" != typeof e && (e = v(e).detach()), this.each(function() {
                        var t = this.nextSibling,
                            n = this.parentNode;
                        v(this).remove(), t ? v(t).before(e) : v(n).append(e)
                    }))
                },
                detach: function(e) {
                    return this.remove(e, !0)
                },
                domManip: function(e, n, r) {
                    e = [].concat.apply([], e);
                    var i, s, o, u, a = 0,
                        f = e[0],
                        l = [],
                        c = this.length;
                    if (!v.support.checkClone && c > 1 && "string" == typeof f && St.test(f)) return this.each(function() {
                        v(this).domManip(e, n, r)
                    });
                    if (v.isFunction(f)) return this.each(function(i) {
                        var s = v(this);
                        e[0] = f.call(this, i, n ? s.html() : t), s.domManip(e, n, r)
                    });
                    if (this[0]) {
                        if (i = v.buildFragment(e, this, l), o = i.fragment, s = o.firstChild, 1 === o.childNodes.length && (o = s), s)
                            for (n = n && v.nodeName(s, "tr"), u = i.cacheable || c - 1; c > a; a++) r.call(n && v.nodeName(this[a], "table") ? Lt(this[a], "tbody") : this[a], a === u ? o : v.clone(o, !0, !0));
                        o = s = null, l.length && v.each(l, function(e, t) {
                            t.src ? v.ajax ? v.ajax({
                                url: t.src,
                                type: "GET",
                                dataType: "script",
                                async: !1,
                                global: !1,
                                "throws": !0
                            }) : v.error("no ajax") : v.globalEval((t.text || t.textContent || t.innerHTML || "").replace(Tt, "")), t.parentNode && t.parentNode.removeChild(t)
                        })
                    }
                    return this
                }
            }), v.buildFragment = function(e, n, r) {
                var s, o, u, a = e[0];
                return n = n || i, n = !n.nodeType && n[0] || n, n = n.ownerDocument || n, 1 === e.length && "string" == typeof a && a.length < 512 && n === i && "<" === a.charAt(0) && !bt.test(a) && (v.support.checkClone || !St.test(a)) && (v.support.html5Clone || !wt.test(a)) && (o = !0, s = v.fragments[a], u = s !== t), s || (s = n.createDocumentFragment(), v.clean(e, n, s, r), o && (v.fragments[a] = u && s)), {
                    fragment: s,
                    cacheable: o
                }
            }, v.fragments = {}, v.each({
                appendTo: "append",
                prependTo: "prepend",
                insertBefore: "before",
                insertAfter: "after",
                replaceAll: "replaceWith"
            }, function(e, t) {
                v.fn[e] = function(n) {
                    var r, i = 0,
                        s = [],
                        o = v(n),
                        u = o.length,
                        a = 1 === this.length && this[0].parentNode;
                    if ((null == a || a && 11 === a.nodeType && 1 === a.childNodes.length) && 1 === u) return o[t](this[0]), this;
                    for (; u > i; i++) r = (i > 0 ? this.clone(!0) : this).get(), v(o[i])[t](r), s = s.concat(r);
                    return this.pushStack(s, e, o.selector)
                }
            }), v.extend({
                clone: function(e, t, n) {
                    var r, i, s, o;
                    if (v.support.html5Clone || v.isXMLDoc(e) || !wt.test("<" + e.nodeName + ">") ? o = e.cloneNode(!0) : (kt.innerHTML = e.outerHTML, kt.removeChild(o = kt.firstChild)), !(v.support.noCloneEvent && v.support.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || v.isXMLDoc(e)))
                        for (Ot(e, o), r = Mt(e), i = Mt(o), s = 0; r[s]; ++s) i[s] && Ot(r[s], i[s]);
                    if (t && (At(e, o), n))
                        for (r = Mt(e), i = Mt(o), s = 0; r[s]; ++s) At(r[s], i[s]);
                    return r = i = null, o
                },
                clean: function(e, t, n, r) {
                    var s, o, u, a, f, l, c, h, p, m, g, y = t === i && Ct,
                        b = [];
                    for (t && "undefined" != typeof t.createDocumentFragment || (t = i), s = 0; null != (u = e[s]); s++)
                        if ("number" == typeof u && (u += ""), u) {
                            if ("string" == typeof u)
                                if (gt.test(u)) {
                                    for (y = y || lt(t), c = t.createElement("div"), y.appendChild(c), u = u.replace(dt, "<$1></$2>"), a = (vt.exec(u) || ["", ""])[1].toLowerCase(), f = Nt[a] || Nt._default, l = f[0], c.innerHTML = f[1] + u + f[2]; l--;) c = c.lastChild;
                                    if (!v.support.tbody)
                                        for (h = mt.test(u), p = "table" !== a || h ? "<table>" !== f[1] || h ? [] : c.childNodes : c.firstChild && c.firstChild.childNodes, o = p.length - 1; o >= 0; --o) v.nodeName(p[o], "tbody") && !p[o].childNodes.length && p[o].parentNode.removeChild(p[o]);
                                    !v.support.leadingWhitespace && pt.test(u) && c.insertBefore(t.createTextNode(pt.exec(u)[0]), c.firstChild), u = c.childNodes, c.parentNode.removeChild(c)
                                } else u = t.createTextNode(u);
                            u.nodeType ? b.push(u) : v.merge(b, u)
                        }
                    if (c && (u = c = y = null), !v.support.appendChecked)
                        for (s = 0; null != (u = b[s]); s++) v.nodeName(u, "input") ? _t(u) : "undefined" != typeof u.getElementsByTagName && v.grep(u.getElementsByTagName("input"), _t);
                    if (n)
                        for (m = function(e) {
                                return !e.type || xt.test(e.type) ? r ? r.push(e.parentNode ? e.parentNode.removeChild(e) : e) : n.appendChild(e) : void 0
                            }, s = 0; null != (u = b[s]); s++) v.nodeName(u, "script") && m(u) || (n.appendChild(u), "undefined" != typeof u.getElementsByTagName && (g = v.grep(v.merge([], u.getElementsByTagName("script")), m), b.splice.apply(b, [s + 1, 0].concat(g)), s += g.length));
                    return b
                },
                cleanData: function(e, t) {
                    for (var n, r, i, s, o = 0, u = v.expando, a = v.cache, f = v.support.deleteExpando, l = v.event.special; null != (i = e[o]); o++)
                        if ((t || v.acceptData(i)) && (r = i[u], n = r && a[r])) {
                            if (n.events)
                                for (s in n.events) l[s] ? v.event.remove(i, s) : v.removeEvent(i, s, n.handle);
                            a[r] && (delete a[r], f ? delete i[u] : i.removeAttribute ? i.removeAttribute(u) : i[u] = null, v.deletedIds.push(r))
                        }
                }
            }),
            function() {
                var e, t;
                v.uaMatch = function(e) {
                    e = e.toLowerCase();
                    var t = /(chrome)[ \/]([\w.]+)/.exec(e) || /(webkit)[ \/]([\w.]+)/.exec(e) || /(opera)(?:.*version|)[ \/]([\w.]+)/.exec(e) || /(msie) ([\w.]+)/.exec(e) || e.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(e) || [];
                    return {
                        browser: t[1] || "",
                        version: t[2] || "0"
                    }
                }, e = v.uaMatch(o.userAgent), t = {}, e.browser && (t[e.browser] = !0, t.version = e.version), t.chrome ? t.webkit = !0 : t.webkit && (t.safari = !0), v.browser = t, v.sub = function() {
                    function e(t, n) {
                        return new e.fn.init(t, n)
                    }
                    v.extend(!0, e, this), e.superclass = this, e.fn = e.prototype = this(), e.fn.constructor = e, e.sub = this.sub, e.fn.init = function(r, i) {
                        return i && i instanceof v && !(i instanceof e) && (i = e(i)), v.fn.init.call(this, r, i, t)
                    }, e.fn.init.prototype = e.fn;
                    var t = e(i);
                    return e
                }
            }();
        var Dt, Pt, Ht, Bt = /alpha\([^)]*\)/i,
            jt = /opacity=([^)]*)/,
            Ft = /^(top|right|bottom|left)$/,
            It = /^(none|table(?!-c[ea]).+)/,
            qt = /^margin/,
            Rt = new RegExp("^(" + m + ")(.*)$", "i"),
            Ut = new RegExp("^(" + m + ")(?!px)[a-z%]+$", "i"),
            zt = new RegExp("^([-+])=(" + m + ")", "i"),
            Wt = {
                BODY: "block"
            },
            Xt = {
                position: "absolute",
                visibility: "hidden",
                display: "block"
            },
            Vt = {
                letterSpacing: 0,
                fontWeight: 400
            },
            $t = ["Top", "Right", "Bottom", "Left"],
            Jt = ["Webkit", "O", "Moz", "ms"],
            Kt = v.fn.toggle;
        v.fn.extend({
            css: function(e, n) {
                return v.access(this, function(e, n, r) {
                    return r !== t ? v.style(e, n, r) : v.css(e, n)
                }, e, n, arguments.length > 1)
            },
            show: function() {
                return Yt(this, !0)
            },
            hide: function() {
                return Yt(this)
            },
            toggle: function(e, t) {
                var n = "boolean" == typeof e;
                return v.isFunction(e) && v.isFunction(t) ? Kt.apply(this, arguments) : this.each(function() {
                    (n ? e : Gt(this)) ? v(this).show(): v(this).hide()
                })
            }
        }), v.extend({
            cssHooks: {
                opacity: {
                    get: function(e, t) {
                        if (t) {
                            var n = Dt(e, "opacity");
                            return "" === n ? "1" : n
                        }
                    }
                }
            },
            cssNumber: {
                fillOpacity: !0,
                fontWeight: !0,
                lineHeight: !0,
                opacity: !0,
                orphans: !0,
                widows: !0,
                zIndex: !0,
                zoom: !0
            },
            cssProps: {
                "float": v.support.cssFloat ? "cssFloat" : "styleFloat"
            },
            style: function(e, n, r, i) {
                if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                    var s, o, u, a = v.camelCase(n),
                        f = e.style;
                    if (n = v.cssProps[a] || (v.cssProps[a] = Qt(f, a)), u = v.cssHooks[n] || v.cssHooks[a], r === t) return u && "get" in u && (s = u.get(e, !1, i)) !== t ? s : f[n];
                    if (o = typeof r, "string" === o && (s = zt.exec(r)) && (r = (s[1] + 1) * s[2] + parseFloat(v.css(e, n)), o = "number"), !(null == r || "number" === o && isNaN(r) || ("number" === o && !v.cssNumber[a] && (r += "px"), u && "set" in u && (r = u.set(e, r, i)) === t))) try {
                        f[n] = r
                    } catch (l) {}
                }
            },
            css: function(e, n, r, i) {
                var s, o, u, a = v.camelCase(n);
                return n = v.cssProps[a] || (v.cssProps[a] = Qt(e.style, a)), u = v.cssHooks[n] || v.cssHooks[a], u && "get" in u && (s = u.get(e, !0, i)), s === t && (s = Dt(e, n)), "normal" === s && n in Vt && (s = Vt[n]), r || i !== t ? (o = parseFloat(s), r || v.isNumeric(o) ? o || 0 : s) : s
            },
            swap: function(e, t, n) {
                var r, i, s = {};
                for (i in t) s[i] = e.style[i], e.style[i] = t[i];
                r = n.call(e);
                for (i in t) e.style[i] = s[i];
                return r
            }
        }), e.getComputedStyle ? Dt = function(t, n) {
            var r, i, s, o, u = e.getComputedStyle(t, null),
                a = t.style;
            return u && (r = u.getPropertyValue(n) || u[n], "" === r && !v.contains(t.ownerDocument, t) && (r = v.style(t, n)), Ut.test(r) && qt.test(n) && (i = a.width, s = a.minWidth, o = a.maxWidth, a.minWidth = a.maxWidth = a.width = r, r = u.width, a.width = i, a.minWidth = s, a.maxWidth = o)), r
        } : i.documentElement.currentStyle && (Dt = function(e, t) {
            var n, r, i = e.currentStyle && e.currentStyle[t],
                s = e.style;
            return null == i && s && s[t] && (i = s[t]), Ut.test(i) && !Ft.test(t) && (n = s.left, r = e.runtimeStyle && e.runtimeStyle.left, r && (e.runtimeStyle.left = e.currentStyle.left), s.left = "fontSize" === t ? "1em" : i, i = s.pixelLeft + "px", s.left = n, r && (e.runtimeStyle.left = r)), "" === i ? "auto" : i
        }), v.each(["height", "width"], function(e, t) {
            v.cssHooks[t] = {
                get: function(e, n, r) {
                    return n ? 0 === e.offsetWidth && It.test(Dt(e, "display")) ? v.swap(e, Xt, function() {
                        return tn(e, t, r)
                    }) : tn(e, t, r) : void 0
                },
                set: function(e, n, r) {
                    return Zt(e, n, r ? en(e, t, r, v.support.boxSizing && "border-box" === v.css(e, "boxSizing")) : 0)
                }
            }
        }), v.support.opacity || (v.cssHooks.opacity = {
            get: function(e, t) {
                return jt.test((t && e.currentStyle ? e.currentStyle.filter : e.style.filter) || "") ? .01 * parseFloat(RegExp.$1) + "" : t ? "1" : ""
            },
            set: function(e, t) {
                var n = e.style,
                    r = e.currentStyle,
                    i = v.isNumeric(t) ? "alpha(opacity=" + 100 * t + ")" : "",
                    s = r && r.filter || n.filter || "";
                n.zoom = 1, t >= 1 && "" === v.trim(s.replace(Bt, "")) && n.removeAttribute && (n.removeAttribute("filter"), r && !r.filter) || (n.filter = Bt.test(s) ? s.replace(Bt, i) : s + " " + i)
            }
        }), v(function() {
            v.support.reliableMarginRight || (v.cssHooks.marginRight = {
                get: function(e, t) {
                    return v.swap(e, {
                        display: "inline-block"
                    }, function() {
                        return t ? Dt(e, "marginRight") : void 0
                    })
                }
            }), !v.support.pixelPosition && v.fn.position && v.each(["top", "left"], function(e, t) {
                v.cssHooks[t] = {
                    get: function(e, n) {
                        if (n) {
                            var r = Dt(e, t);
                            return Ut.test(r) ? v(e).position()[t] + "px" : r
                        }
                    }
                }
            })
        }), v.expr && v.expr.filters && (v.expr.filters.hidden = function(e) {
            return 0 === e.offsetWidth && 0 === e.offsetHeight || !v.support.reliableHiddenOffsets && "none" === (e.style && e.style.display || Dt(e, "display"))
        }, v.expr.filters.visible = function(e) {
            return !v.expr.filters.hidden(e)
        }), v.each({
            margin: "",
            padding: "",
            border: "Width"
        }, function(e, t) {
            v.cssHooks[e + t] = {
                expand: function(n) {
                    var r, i = "string" == typeof n ? n.split(" ") : [n],
                        s = {};
                    for (r = 0; 4 > r; r++) s[e + $t[r] + t] = i[r] || i[r - 2] || i[0];
                    return s
                }
            }, qt.test(e) || (v.cssHooks[e + t].set = Zt)
        });
        var rn = /%20/g,
            sn = /\[\]$/,
            on = /\r?\n/g,
            un = /^(?:color|date|datetime|datetime-local|email|hidden|month|number|password|range|search|tel|text|time|url|week)$/i,
            an = /^(?:select|textarea)/i;
        v.fn.extend({
            serialize: function() {
                return v.param(this.serializeArray())
            },
            serializeArray: function() {
                return this.map(function() {
                    return this.elements ? v.makeArray(this.elements) : this
                }).filter(function() {
                    return this.name && !this.disabled && (this.checked || an.test(this.nodeName) || un.test(this.type))
                }).map(function(e, t) {
                    var n = v(this).val();
                    return null == n ? null : v.isArray(n) ? v.map(n, function(e) {
                        return {
                            name: t.name,
                            value: e.replace(on, "\r\n")
                        }
                    }) : {
                        name: t.name,
                        value: n.replace(on, "\r\n")
                    }
                }).get()
            }
        }), v.param = function(e, n) {
            var r, i = [],
                s = function(e, t) {
                    t = v.isFunction(t) ? t() : null == t ? "" : t, i[i.length] = encodeURIComponent(e) + "=" + encodeURIComponent(t)
                };
            if (n === t && (n = v.ajaxSettings && v.ajaxSettings.traditional), v.isArray(e) || e.jquery && !v.isPlainObject(e)) v.each(e, function() {
                s(this.name, this.value)
            });
            else
                for (r in e) fn(r, e[r], n, s);
            return i.join("&").replace(rn, "+")
        };
        var ln, cn, hn = /#.*$/,
            pn = /^(.*?):[ \t]*([^\r\n]*)\r?$/gm,
            dn = /^(?:about|app|app\-storage|.+\-extension|file|res|widget):$/,
            vn = /^(?:GET|HEAD)$/,
            mn = /^\/\//,
            gn = /\?/,
            yn = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,
            bn = /([?&])_=[^&]*/,
            wn = /^([\w\+\.\-]+:)(?:\/\/([^\/?#:]*)(?::(\d+)|)|)/,
            En = v.fn.load,
            Sn = {},
            xn = {},
            Tn = ["*/"] + ["*"];
        try {
            cn = s.href
        } catch (Nn) {
            cn = i.createElement("a"), cn.href = "", cn = cn.href
        }
        ln = wn.exec(cn.toLowerCase()) || [], v.fn.load = function(e, n, r) {
            if ("string" != typeof e && En) return En.apply(this, arguments);
            if (!this.length) return this;
            var i, s, o, u = this,
                a = e.indexOf(" ");
            return a >= 0 && (i = e.slice(a, e.length), e = e.slice(0, a)), v.isFunction(n) ? (r = n, n = t) : n && "object" == typeof n && (s = "POST"), v.ajax({
                url: e,
                type: s,
                dataType: "html",
                data: n,
                complete: function(e, t) {
                    r && u.each(r, o || [e.responseText, t, e])
                }
            }).done(function(e) {
                o = arguments, u.html(i ? v("<div>").append(e.replace(yn, "")).find(i) : e)
            }), this
        }, v.each("ajaxStart ajaxStop ajaxComplete ajaxError ajaxSuccess ajaxSend".split(" "), function(e, t) {
            v.fn[t] = function(e) {
                return this.on(t, e)
            }
        }), v.each(["get", "post"], function(e, n) {
            v[n] = function(e, r, i, s) {
                return v.isFunction(r) && (s = s || i, i = r, r = t), v.ajax({
                    type: n,
                    url: e,
                    data: r,
                    success: i,
                    dataType: s
                })
            }
        }), v.extend({
            getScript: function(e, n) {
                return v.get(e, t, n, "script")
            },
            getJSON: function(e, t, n) {
                return v.get(e, t, n, "json")
            },
            ajaxSetup: function(e, t) {
                return t ? Ln(e, v.ajaxSettings) : (t = e, e = v.ajaxSettings), Ln(e, t), e
            },
            ajaxSettings: {
                url: cn,
                isLocal: dn.test(ln[1]),
                global: !0,
                type: "GET",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                processData: !0,
                async: !0,
                accepts: {
                    xml: "application/xml, text/xml",
                    html: "text/html",
                    text: "text/plain",
                    json: "application/json, text/javascript",
                    "*": Tn
                },
                contents: {
                    xml: /xml/,
                    html: /html/,
                    json: /json/
                },
                responseFields: {
                    xml: "responseXML",
                    text: "responseText"
                },
                converters: {
                    "* text": e.String,
                    "text html": !0,
                    "text json": v.parseJSON,
                    "text xml": v.parseXML
                },
                flatOptions: {
                    context: !0,
                    url: !0
                }
            },
            ajaxPrefilter: Cn(Sn),
            ajaxTransport: Cn(xn),
            ajax: function(e, n) {
                function T(e, n, s, a) {
                    var l, y, b, w, S, T = n;
                    2 !== E && (E = 2, u && clearTimeout(u), o = t, i = a || "", x.readyState = e > 0 ? 4 : 0, s && (w = An(c, x, s)), e >= 200 && 300 > e || 304 === e ? (c.ifModified && (S = x.getResponseHeader("Last-Modified"), S && (v.lastModified[r] = S), S = x.getResponseHeader("Etag"), S && (v.etag[r] = S)), 304 === e ? (T = "notmodified", l = !0) : (l = On(c, w), T = l.state, y = l.data, b = l.error, l = !b)) : (b = T, (!T || e) && (T = "error", 0 > e && (e = 0))), x.status = e, x.statusText = (n || T) + "", l ? d.resolveWith(h, [y, T, x]) : d.rejectWith(h, [x, T, b]), x.statusCode(g), g = t, f && p.trigger("ajax" + (l ? "Success" : "Error"), [x, c, l ? y : b]), m.fireWith(h, [x, T]), f && (p.trigger("ajaxComplete", [x, c]), --v.active || v.event.trigger("ajaxStop")))
                }
                "object" == typeof e && (n = e, e = t), n = n || {};
                var r, i, s, o, u, a, f, l, c = v.ajaxSetup({}, n),
                    h = c.context || c,
                    p = h !== c && (h.nodeType || h instanceof v) ? v(h) : v.event,
                    d = v.Deferred(),
                    m = v.Callbacks("once memory"),
                    g = c.statusCode || {},
                    b = {},
                    w = {},
                    E = 0,
                    S = "canceled",
                    x = {
                        readyState: 0,
                        setRequestHeader: function(e, t) {
                            if (!E) {
                                var n = e.toLowerCase();
                                e = w[n] = w[n] || e, b[e] = t
                            }
                            return this
                        },
                        getAllResponseHeaders: function() {
                            return 2 === E ? i : null
                        },
                        getResponseHeader: function(e) {
                            var n;
                            if (2 === E) {
                                if (!s)
                                    for (s = {}; n = pn.exec(i);) s[n[1].toLowerCase()] = n[2];
                                n = s[e.toLowerCase()]
                            }
                            return n === t ? null : n
                        },
                        overrideMimeType: function(e) {
                            return E || (c.mimeType = e), this
                        },
                        abort: function(e) {
                            return e = e || S, o && o.abort(e), T(0, e), this
                        }
                    };
                if (d.promise(x), x.success = x.done, x.error = x.fail, x.complete = m.add, x.statusCode = function(e) {
                        if (e) {
                            var t;
                            if (2 > E)
                                for (t in e) g[t] = [g[t], e[t]];
                            else t = e[x.status], x.always(t)
                        }
                        return this
                    }, c.url = ((e || c.url) + "").replace(hn, "").replace(mn, ln[1] + "//"), c.dataTypes = v.trim(c.dataType || "*").toLowerCase().split(y), null == c.crossDomain && (a = wn.exec(c.url.toLowerCase()), c.crossDomain = !(!a || a[1] === ln[1] && a[2] === ln[2] && (a[3] || ("http:" === a[1] ? 80 : 443)) == (ln[3] || ("http:" === ln[1] ? 80 : 443)))), c.data && c.processData && "string" != typeof c.data && (c.data = v.param(c.data, c.traditional)), kn(Sn, c, n, x), 2 === E) return x;
                if (f = c.global, c.type = c.type.toUpperCase(), c.hasContent = !vn.test(c.type), f && 0 === v.active++ && v.event.trigger("ajaxStart"), !c.hasContent && (c.data && (c.url += (gn.test(c.url) ? "&" : "?") + c.data, delete c.data), r = c.url, c.cache === !1)) {
                    var N = v.now(),
                        C = c.url.replace(bn, "$1_=" + N);
                    c.url = C + (C === c.url ? (gn.test(c.url) ? "&" : "?") + "_=" + N : "")
                }(c.data && c.hasContent && c.contentType !== !1 || n.contentType) && x.setRequestHeader("Content-Type", c.contentType), c.ifModified && (r = r || c.url, v.lastModified[r] && x.setRequestHeader("If-Modified-Since", v.lastModified[r]), v.etag[r] && x.setRequestHeader("If-None-Match", v.etag[r])), x.setRequestHeader("Accept", c.dataTypes[0] && c.accepts[c.dataTypes[0]] ? c.accepts[c.dataTypes[0]] + ("*" !== c.dataTypes[0] ? ", " + Tn + "; q=0.01" : "") : c.accepts["*"]);
                for (l in c.headers) x.setRequestHeader(l, c.headers[l]);
                if (!c.beforeSend || c.beforeSend.call(h, x, c) !== !1 && 2 !== E) {
                    S = "abort";
                    for (l in {
                            success: 1,
                            error: 1,
                            complete: 1
                        }) x[l](c[l]);
                    if (o = kn(xn, c, n, x)) {
                        x.readyState = 1, f && p.trigger("ajaxSend", [x, c]), c.async && c.timeout > 0 && (u = setTimeout(function() {
                            x.abort("timeout")
                        }, c.timeout));
                        try {
                            E = 1, o.send(b, T)
                        } catch (k) {
                            if (!(2 > E)) throw k;
                            T(-1, k)
                        }
                    } else T(-1, "No Transport");
                    return x
                }
                return x.abort()
            },
            active: 0,
            lastModified: {},
            etag: {}
        });
        var Mn = [],
            _n = /\?/,
            Dn = /(=)\?(?=&|$)|\?\?/,
            Pn = v.now();
        v.ajaxSetup({
            jsonp: "callback",
            jsonpCallback: function() {
                var e = Mn.pop() || v.expando + "_" + Pn++;
                return this[e] = !0, e
            }
        }), v.ajaxPrefilter("json jsonp", function(n, r, i) {
            var s, o, u, a = n.data,
                f = n.url,
                l = n.jsonp !== !1,
                c = l && Dn.test(f),
                h = l && !c && "string" == typeof a && !(n.contentType || "").indexOf("application/x-www-form-urlencoded") && Dn.test(a);
            return "jsonp" === n.dataTypes[0] || c || h ? (s = n.jsonpCallback = v.isFunction(n.jsonpCallback) ? n.jsonpCallback() : n.jsonpCallback, o = e[s], c ? n.url = f.replace(Dn, "$1" + s) : h ? n.data = a.replace(Dn, "$1" + s) : l && (n.url += (_n.test(f) ? "&" : "?") + n.jsonp + "=" + s), n.converters["script json"] = function() {
                return u || v.error(s + " was not called"), u[0]
            }, n.dataTypes[0] = "json", e[s] = function() {
                u = arguments
            }, i.always(function() {
                e[s] = o, n[s] && (n.jsonpCallback = r.jsonpCallback, Mn.push(s)), u && v.isFunction(o) && o(u[0]), u = o = t
            }), "script") : void 0
        }), v.ajaxSetup({
            accepts: {
                script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
            },
            contents: {
                script: /javascript|ecmascript/
            },
            converters: {
                "text script": function(e) {
                    return v.globalEval(e), e
                }
            }
        }), v.ajaxPrefilter("script", function(e) {
            e.cache === t && (e.cache = !1), e.crossDomain && (e.type = "GET", e.global = !1)
        }), v.ajaxTransport("script", function(e) {
            if (e.crossDomain) {
                var n, r = i.head || i.getElementsByTagName("head")[0] || i.documentElement;
                return {
                    send: function(s, o) {
                        n = i.createElement("script"), n.async = "async", e.scriptCharset && (n.charset = e.scriptCharset), n.src = e.url, n.onload = n.onreadystatechange = function(e, i) {
                            (i || !n.readyState || /loaded|complete/.test(n.readyState)) && (n.onload = n.onreadystatechange = null, r && n.parentNode && r.removeChild(n), n = t, i || o(200, "success"))
                        }, r.insertBefore(n, r.firstChild)
                    },
                    abort: function() {
                        n && n.onload(0, 1)
                    }
                }
            }
        });
        var Hn, Bn = e.ActiveXObject ? function() {
                for (var e in Hn) Hn[e](0, 1)
            } : !1,
            jn = 0;
        v.ajaxSettings.xhr = e.ActiveXObject ? function() {
                return !this.isLocal && Fn() || In()
            } : Fn,
            function(e) {
                v.extend(v.support, {
                    ajax: !!e,
                    cors: !!e && "withCredentials" in e
                })
            }(v.ajaxSettings.xhr()), v.support.ajax && v.ajaxTransport(function(n) {
                if (!n.crossDomain || v.support.cors) {
                    var r;
                    return {
                        send: function(i, s) {
                            var o, u, a = n.xhr();
                            if (n.username ? a.open(n.type, n.url, n.async, n.username, n.password) : a.open(n.type, n.url, n.async), n.xhrFields)
                                for (u in n.xhrFields) a[u] = n.xhrFields[u];
                            n.mimeType && a.overrideMimeType && a.overrideMimeType(n.mimeType), !n.crossDomain && !i["X-Requested-With"] && (i["X-Requested-With"] = "XMLHttpRequest");
                            try {
                                for (u in i) a.setRequestHeader(u, i[u])
                            } catch (f) {}
                            a.send(n.hasContent && n.data || null), r = function(e, i) {
                                var u, f, l, c, h;
                                try {
                                    if (r && (i || 4 === a.readyState))
                                        if (r = t, o && (a.onreadystatechange = v.noop, Bn && delete Hn[o]), i) 4 !== a.readyState && a.abort();
                                        else {
                                            u = a.status, l = a.getAllResponseHeaders(), c = {}, h = a.responseXML, h && h.documentElement && (c.xml = h);
                                            try {
                                                c.text = a.responseText
                                            } catch (p) {}
                                            try {
                                                f = a.statusText
                                            } catch (p) {
                                                f = ""
                                            }
                                            u || !n.isLocal || n.crossDomain ? 1223 === u && (u = 204) : u = c.text ? 200 : 404
                                        }
                                } catch (d) {
                                    i || s(-1, d)
                                }
                                c && s(u, f, c, l)
                            }, n.async ? 4 === a.readyState ? setTimeout(r, 0) : (o = ++jn, Bn && (Hn || (Hn = {}, v(e).unload(Bn)), Hn[o] = r), a.onreadystatechange = r) : r()
                        },
                        abort: function() {
                            r && r(0, 1)
                        }
                    }
                }
            });
        var qn, Rn, Un = /^(?:toggle|show|hide)$/,
            zn = new RegExp("^(?:([-+])=|)(" + m + ")([a-z%]*)$", "i"),
            Wn = /queueHooks$/,
            Xn = [Gn],
            Vn = {
                "*": [function(e, t) {
                    var n, r, i = this.createTween(e, t),
                        s = zn.exec(t),
                        o = i.cur(),
                        u = +o || 0,
                        a = 1,
                        f = 20;
                    if (s) {
                        if (n = +s[2], r = s[3] || (v.cssNumber[e] ? "" : "px"), "px" !== r && u) {
                            u = v.css(i.elem, e, !0) || n || 1;
                            do a = a || ".5", u /= a, v.style(i.elem, e, u + r); while (a !== (a = i.cur() / o) && 1 !== a && --f)
                        }
                        i.unit = r, i.start = u, i.end = s[1] ? u + (s[1] + 1) * n : n
                    }
                    return i
                }]
            };
        v.Animation = v.extend(Kn, {
            tweener: function(e, t) {
                v.isFunction(e) ? (t = e, e = ["*"]) : e = e.split(" ");
                for (var n, r = 0, i = e.length; i > r; r++) n = e[r], Vn[n] = Vn[n] || [], Vn[n].unshift(t)
            },
            prefilter: function(e, t) {
                t ? Xn.unshift(e) : Xn.push(e)
            }
        }), v.Tween = Yn, Yn.prototype = {
            constructor: Yn,
            init: function(e, t, n, r, i, s) {
                this.elem = e, this.prop = n, this.easing = i || "swing", this.options = t, this.start = this.now = this.cur(), this.end = r, this.unit = s || (v.cssNumber[n] ? "" : "px")
            },
            cur: function() {
                var e = Yn.propHooks[this.prop];
                return e && e.get ? e.get(this) : Yn.propHooks._default.get(this)
            },
            run: function(e) {
                var t, n = Yn.propHooks[this.prop];
                return this.pos = t = this.options.duration ? v.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : e, this.now = (this.end - this.start) * t + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : Yn.propHooks._default.set(this), this
            }
        }, Yn.prototype.init.prototype = Yn.prototype, Yn.propHooks = {
            _default: {
                get: function(e) {
                    var t;
                    return null == e.elem[e.prop] || e.elem.style && null != e.elem.style[e.prop] ? (t = v.css(e.elem, e.prop, !1, ""), t && "auto" !== t ? t : 0) : e.elem[e.prop]
                },
                set: function(e) {
                    v.fx.step[e.prop] ? v.fx.step[e.prop](e) : e.elem.style && (null != e.elem.style[v.cssProps[e.prop]] || v.cssHooks[e.prop]) ? v.style(e.elem, e.prop, e.now + e.unit) : e.elem[e.prop] = e.now
                }
            }
        }, Yn.propHooks.scrollTop = Yn.propHooks.scrollLeft = {
            set: function(e) {
                e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
            }
        }, v.each(["toggle", "show", "hide"], function(e, t) {
            var n = v.fn[t];
            v.fn[t] = function(r, i, s) {
                return null == r || "boolean" == typeof r || !e && v.isFunction(r) && v.isFunction(i) ? n.apply(this, arguments) : this.animate(Zn(t, !0), r, i, s)
            }
        }), v.fn.extend({
            fadeTo: function(e, t, n, r) {
                return this.filter(Gt).css("opacity", 0).show().end().animate({
                    opacity: t
                }, e, n, r)
            },
            animate: function(e, t, n, r) {
                var i = v.isEmptyObject(e),
                    s = v.speed(t, n, r),
                    o = function() {
                        var t = Kn(this, v.extend({}, e), s);
                        i && t.stop(!0)
                    };
                return i || s.queue === !1 ? this.each(o) : this.queue(s.queue, o)
            },
            stop: function(e, n, r) {
                var i = function(e) {
                    var t = e.stop;
                    delete e.stop, t(r)
                };
                return "string" != typeof e && (r = n, n = e, e = t), n && e !== !1 && this.queue(e || "fx", []), this.each(function() {
                    var t = !0,
                        n = null != e && e + "queueHooks",
                        s = v.timers,
                        o = v._data(this);
                    if (n) o[n] && o[n].stop && i(o[n]);
                    else
                        for (n in o) o[n] && o[n].stop && Wn.test(n) && i(o[n]);
                    for (n = s.length; n--;) s[n].elem === this && (null == e || s[n].queue === e) && (s[n].anim.stop(r), t = !1, s.splice(n, 1));
                    (t || !r) && v.dequeue(this, e)
                })
            }
        }), v.each({
            slideDown: Zn("show"),
            slideUp: Zn("hide"),
            slideToggle: Zn("toggle"),
            fadeIn: {
                opacity: "show"
            },
            fadeOut: {
                opacity: "hide"
            },
            fadeToggle: {
                opacity: "toggle"
            }
        }, function(e, t) {
            v.fn[e] = function(e, n, r) {
                return this.animate(t, e, n, r)
            }
        }), v.speed = function(e, t, n) {
            var r = e && "object" == typeof e ? v.extend({}, e) : {
                complete: n || !n && t || v.isFunction(e) && e,
                duration: e,
                easing: n && t || t && !v.isFunction(t) && t
            };
            return r.duration = v.fx.off ? 0 : "number" == typeof r.duration ? r.duration : r.duration in v.fx.speeds ? v.fx.speeds[r.duration] : v.fx.speeds._default, (null == r.queue || r.queue === !0) && (r.queue = "fx"), r.old = r.complete, r.complete = function() {
                v.isFunction(r.old) && r.old.call(this), r.queue && v.dequeue(this, r.queue)
            }, r
        }, v.easing = {
            linear: function(e) {
                return e
            },
            swing: function(e) {
                return .5 - Math.cos(e * Math.PI) / 2
            }
        }, v.timers = [], v.fx = Yn.prototype.init, v.fx.tick = function() {
            var e, n = v.timers,
                r = 0;
            for (qn = v.now(); r < n.length; r++) e = n[r], !e() && n[r] === e && n.splice(r--, 1);
            n.length || v.fx.stop(), qn = t
        }, v.fx.timer = function(e) {
            e() && v.timers.push(e) && !Rn && (Rn = setInterval(v.fx.tick, v.fx.interval))
        }, v.fx.interval = 13, v.fx.stop = function() {
            clearInterval(Rn), Rn = null
        }, v.fx.speeds = {
            slow: 600,
            fast: 200,
            _default: 400
        }, v.fx.step = {}, v.expr && v.expr.filters && (v.expr.filters.animated = function(e) {
            return v.grep(v.timers, function(t) {
                return e === t.elem
            }).length
        });
        var er = /^(?:body|html)$/i;
        v.fn.offset = function(e) {
            if (arguments.length) return e === t ? this : this.each(function(t) {
                v.offset.setOffset(this, e, t)
            });
            var n, r, i, s, o, u, a, f = {
                    top: 0,
                    left: 0
                },
                l = this[0],
                c = l && l.ownerDocument;
            if (c) return (r = c.body) === l ? v.offset.bodyOffset(l) : (n = c.documentElement, v.contains(n, l) ? ("undefined" != typeof l.getBoundingClientRect && (f = l.getBoundingClientRect()), i = tr(c), s = n.clientTop || r.clientTop || 0, o = n.clientLeft || r.clientLeft || 0, u = i.pageYOffset || n.scrollTop, a = i.pageXOffset || n.scrollLeft, {
                top: f.top + u - s,
                left: f.left + a - o
            }) : f)
        }, v.offset = {
            bodyOffset: function(e) {
                var t = e.offsetTop,
                    n = e.offsetLeft;
                return v.support.doesNotIncludeMarginInBodyOffset && (t += parseFloat(v.css(e, "marginTop")) || 0, n += parseFloat(v.css(e, "marginLeft")) || 0), {
                    top: t,
                    left: n
                }
            },
            setOffset: function(e, t, n) {
                var r = v.css(e, "position");
                "static" === r && (e.style.position = "relative");
                var c, h, i = v(e),
                    s = i.offset(),
                    o = v.css(e, "top"),
                    u = v.css(e, "left"),
                    a = ("absolute" === r || "fixed" === r) && v.inArray("auto", [o, u]) > -1,
                    f = {},
                    l = {};
                a ? (l = i.position(), c = l.top, h = l.left) : (c = parseFloat(o) || 0, h = parseFloat(u) || 0), v.isFunction(t) && (t = t.call(e, n, s)), null != t.top && (f.top = t.top - s.top + c), null != t.left && (f.left = t.left - s.left + h), "using" in t ? t.using.call(e, f) : i.css(f)
            }
        }, v.fn.extend({
            position: function() {
                if (this[0]) {
                    var e = this[0],
                        t = this.offsetParent(),
                        n = this.offset(),
                        r = er.test(t[0].nodeName) ? {
                            top: 0,
                            left: 0
                        } : t.offset();
                    return n.top -= parseFloat(v.css(e, "marginTop")) || 0, n.left -= parseFloat(v.css(e, "marginLeft")) || 0, r.top += parseFloat(v.css(t[0], "borderTopWidth")) || 0, r.left += parseFloat(v.css(t[0], "borderLeftWidth")) || 0, {
                        top: n.top - r.top,
                        left: n.left - r.left
                    }
                }
            },
            offsetParent: function() {
                return this.map(function() {
                    for (var e = this.offsetParent || i.body; e && !er.test(e.nodeName) && "static" === v.css(e, "position");) e = e.offsetParent;
                    return e || i.body
                })
            }
        }), v.each({
            scrollLeft: "pageXOffset",
            scrollTop: "pageYOffset"
        }, function(e, n) {
            var r = /Y/.test(n);
            v.fn[e] = function(i) {
                return v.access(this, function(e, i, s) {
                    var o = tr(e);
                    return s === t ? o ? n in o ? o[n] : o.document.documentElement[i] : e[i] : void(o ? o.scrollTo(r ? v(o).scrollLeft() : s, r ? s : v(o).scrollTop()) : e[i] = s)
                }, e, i, arguments.length, null)
            }
        }), v.each({
            Height: "height",
            Width: "width"
        }, function(e, n) {
            v.each({
                padding: "inner" + e,
                content: n,
                "": "outer" + e
            }, function(r, i) {
                v.fn[i] = function(i, s) {
                    var o = arguments.length && (r || "boolean" != typeof i),
                        u = r || (i === !0 || s === !0 ? "margin" : "border");
                    return v.access(this, function(n, r, i) {
                        var s;
                        return v.isWindow(n) ? n.document.documentElement["client" + e] : 9 === n.nodeType ? (s = n.documentElement, Math.max(n.body["scroll" + e], s["scroll" + e], n.body["offset" + e], s["offset" + e], s["client" + e])) : i === t ? v.css(n, r, i, u) : v.style(n, r, i, u)
                    }, n, o ? i : t, o, null)
                }
            })
        }), e.jQuery = e.$ = v, "function" == typeof define && define.amd && define.amd.jQuery && define("jquery", [], function() {
            return v
        })
    }(window),
    function() {
        var e = this,
            t = e._,
            n = {},
            r = Array.prototype,
            i = Object.prototype,
            s = Function.prototype,
            o = r.push,
            u = r.slice,
            a = r.concat,
            l = (r.unshift, i.toString),
            c = i.hasOwnProperty,
            h = r.forEach,
            p = r.map,
            d = r.reduce,
            v = r.reduceRight,
            m = r.filter,
            g = r.every,
            y = r.some,
            b = r.indexOf,
            w = r.lastIndexOf,
            E = Array.isArray,
            S = Object.keys,
            x = s.bind,
            T = function(e) {
                return e instanceof T ? e : this instanceof T ? void(this._wrapped = e) : new T(e)
            };
        "undefined" != typeof exports ? ("undefined" != typeof module && module.exports && (exports = module.exports = T), exports._ = T) : e._ = T, T.VERSION = "1.4.2";
        var N = T.each = T.forEach = function(e, t, r) {
            if (null != e)
                if (h && e.forEach === h) e.forEach(t, r);
                else if (e.length === +e.length) {
                for (var i = 0, s = e.length; s > i; i++)
                    if (t.call(r, e[i], i, e) === n) return
            } else
                for (var o in e)
                    if (T.has(e, o) && t.call(r, e[o], o, e) === n) return
        };
        T.map = T.collect = function(e, t, n) {
            var r = [];
            return null == e ? r : p && e.map === p ? e.map(t, n) : (N(e, function(e, i, s) {
                r[r.length] = t.call(n, e, i, s)
            }), r)
        }, T.reduce = T.foldl = T.inject = function(e, t, n, r) {
            var i = arguments.length > 2;
            if (null == e && (e = []), d && e.reduce === d) return r && (t = T.bind(t, r)), i ? e.reduce(t, n) : e.reduce(t);
            if (N(e, function(e, s, o) {
                    i ? n = t.call(r, n, e, s, o) : (n = e, i = !0)
                }), !i) throw new TypeError("Reduce of empty array with no initial value");
            return n
        }, T.reduceRight = T.foldr = function(e, t, n, r) {
            var i = arguments.length > 2;
            if (null == e && (e = []), v && e.reduceRight === v) return r && (t = T.bind(t, r)), arguments.length > 2 ? e.reduceRight(t, n) : e.reduceRight(t);
            var s = e.length;
            if (s !== +s) {
                var o = T.keys(e);
                s = o.length
            }
            if (N(e, function(u, a, f) {
                    a = o ? o[--s] : --s, i ? n = t.call(r, n, e[a], a, f) : (n = e[a], i = !0)
                }), !i) throw new TypeError("Reduce of empty array with no initial value");
            return n
        }, T.find = T.detect = function(e, t, n) {
            var r;
            return C(e, function(e, i, s) {
                return t.call(n, e, i, s) ? (r = e, !0) : void 0
            }), r
        }, T.filter = T.select = function(e, t, n) {
            var r = [];
            return null == e ? r : m && e.filter === m ? e.filter(t, n) : (N(e, function(e, i, s) {
                t.call(n, e, i, s) && (r[r.length] = e)
            }), r)
        }, T.reject = function(e, t, n) {
            var r = [];
            return null == e ? r : (N(e, function(e, i, s) {
                t.call(n, e, i, s) || (r[r.length] = e)
            }), r)
        }, T.every = T.all = function(e, t, r) {
            t || (t = T.identity);
            var i = !0;
            return null == e ? i : g && e.every === g ? e.every(t, r) : (N(e, function(e, s, o) {
                return (i = i && t.call(r, e, s, o)) ? void 0 : n
            }), !!i)
        };
        var C = T.some = T.any = function(e, t, r) {
            t || (t = T.identity);
            var i = !1;
            return null == e ? i : y && e.some === y ? e.some(t, r) : (N(e, function(e, s, o) {
                return i || (i = t.call(r, e, s, o)) ? n : void 0
            }), !!i)
        };
        T.contains = T.include = function(e, t) {
            var n = !1;
            return null == e ? n : b && e.indexOf === b ? -1 != e.indexOf(t) : n = C(e, function(e) {
                return e === t
            })
        }, T.invoke = function(e, t) {
            var n = u.call(arguments, 2);
            return T.map(e, function(e) {
                return (T.isFunction(t) ? t : e[t]).apply(e, n)
            })
        }, T.pluck = function(e, t) {
            return T.map(e, function(e) {
                return e[t]
            })
        }, T.where = function(e, t) {
            return T.isEmpty(t) ? [] : T.filter(e, function(e) {
                for (var n in t)
                    if (t[n] !== e[n]) return !1;
                return !0
            })
        }, T.max = function(e, t, n) {
            if (!t && T.isArray(e) && e[0] === +e[0] && e.length < 65535) return Math.max.apply(Math, e);
            if (!t && T.isEmpty(e)) return -1 / 0;
            var r = {
                computed: -1 / 0
            };
            return N(e, function(e, i, s) {
                var o = t ? t.call(n, e, i, s) : e;
                o >= r.computed && (r = {
                    value: e,
                    computed: o
                })
            }), r.value
        }, T.min = function(e, t, n) {
            if (!t && T.isArray(e) && e[0] === +e[0] && e.length < 65535) return Math.min.apply(Math, e);
            if (!t && T.isEmpty(e)) return 1 / 0;
            var r = {
                computed: 1 / 0
            };
            return N(e, function(e, i, s) {
                var o = t ? t.call(n, e, i, s) : e;
                o < r.computed && (r = {
                    value: e,
                    computed: o
                })
            }), r.value
        }, T.shuffle = function(e) {
            var t, n = 0,
                r = [];
            return N(e, function(e) {
                t = T.random(n++), r[n - 1] = r[t], r[t] = e
            }), r
        };
        var k = function(e) {
            return T.isFunction(e) ? e : function(t) {
                return t[e]
            }
        };
        T.sortBy = function(e, t, n) {
            var r = k(t);
            return T.pluck(T.map(e, function(e, t, i) {
                return {
                    value: e,
                    index: t,
                    criteria: r.call(n, e, t, i)
                }
            }).sort(function(e, t) {
                var n = e.criteria,
                    r = t.criteria;
                if (n !== r) {
                    if (n > r || void 0 === n) return 1;
                    if (r > n || void 0 === r) return -1
                }
                return e.index < t.index ? -1 : 1
            }), "value")
        };
        var L = function(e, t, n, r) {
            var i = {},
                s = k(t);
            return N(e, function(t, o) {
                var u = s.call(n, t, o, e);
                r(i, u, t)
            }), i
        };
        T.groupBy = function(e, t, n) {
            return L(e, t, n, function(e, t, n) {
                (T.has(e, t) ? e[t] : e[t] = []).push(n)
            })
        }, T.countBy = function(e, t, n) {
            return L(e, t, n, function(e, t) {
                T.has(e, t) || (e[t] = 0), e[t] ++
            })
        }, T.sortedIndex = function(e, t, n, r) {
            n = null == n ? T.identity : k(n);
            for (var i = n.call(r, t), s = 0, o = e.length; o > s;) {
                var u = s + o >>> 1;
                n.call(r, e[u]) < i ? s = u + 1 : o = u
            }
            return s
        }, T.toArray = function(e) {
            return e ? e.length === +e.length ? u.call(e) : T.values(e) : []
        }, T.size = function(e) {
            return e.length === +e.length ? e.length : T.keys(e).length
        }, T.first = T.head = T.take = function(e, t, n) {
            return null == t || n ? e[0] : u.call(e, 0, t)
        }, T.initial = function(e, t, n) {
            return u.call(e, 0, e.length - (null == t || n ? 1 : t))
        }, T.last = function(e, t, n) {
            return null == t || n ? e[e.length - 1] : u.call(e, Math.max(e.length - t, 0))
        }, T.rest = T.tail = T.drop = function(e, t, n) {
            return u.call(e, null == t || n ? 1 : t)
        }, T.compact = function(e) {
            return T.filter(e, function(e) {
                return !!e
            })
        };
        var A = function(e, t, n) {
            return N(e, function(e) {
                T.isArray(e) ? t ? o.apply(n, e) : A(e, t, n) : n.push(e)
            }), n
        };
        T.flatten = function(e, t) {
            return A(e, t, [])
        }, T.without = function(e) {
            return T.difference(e, u.call(arguments, 1))
        }, T.uniq = T.unique = function(e, t, n, r) {
            var i = n ? T.map(e, n, r) : e,
                s = [],
                o = [];
            return N(i, function(n, r) {
                (t ? r && o[o.length - 1] === n : T.contains(o, n)) || (o.push(n), s.push(e[r]))
            }), s
        }, T.union = function() {
            return T.uniq(a.apply(r, arguments))
        }, T.intersection = function(e) {
            var t = u.call(arguments, 1);
            return T.filter(T.uniq(e), function(e) {
                return T.every(t, function(t) {
                    return T.indexOf(t, e) >= 0
                })
            })
        }, T.difference = function(e) {
            var t = a.apply(r, u.call(arguments, 1));
            return T.filter(e, function(e) {
                return !T.contains(t, e)
            })
        }, T.zip = function() {
            for (var e = u.call(arguments), t = T.max(T.pluck(e, "length")), n = new Array(t), r = 0; t > r; r++) n[r] = T.pluck(e, "" + r);
            return n
        }, T.object = function(e, t) {
            for (var n = {}, r = 0, i = e.length; i > r; r++) t ? n[e[r]] = t[r] : n[e[r][0]] = e[r][1];
            return n
        }, T.indexOf = function(e, t, n) {
            if (null == e) return -1;
            var r = 0,
                i = e.length;
            if (n) {
                if ("number" != typeof n) return r = T.sortedIndex(e, t), e[r] === t ? r : -1;
                r = 0 > n ? Math.max(0, i + n) : n
            }
            if (b && e.indexOf === b) return e.indexOf(t, n);
            for (; i > r; r++)
                if (e[r] === t) return r;
            return -1
        }, T.lastIndexOf = function(e, t, n) {
            if (null == e) return -1;
            var r = null != n;
            if (w && e.lastIndexOf === w) return r ? e.lastIndexOf(t, n) : e.lastIndexOf(t);
            for (var i = r ? n : e.length; i--;)
                if (e[i] === t) return i;
            return -1
        }, T.range = function(e, t, n) {
            arguments.length <= 1 && (t = e || 0, e = 0), n = arguments[2] || 1;
            for (var r = Math.max(Math.ceil((t - e) / n), 0), i = 0, s = new Array(r); r > i;) s[i++] = e, e += n;
            return s
        };
        var O = function() {};
        T.bind = function(t, n) {
            var r, i;
            if (t.bind === x && x) return x.apply(t, u.call(arguments, 1));
            if (!T.isFunction(t)) throw new TypeError;
            return i = u.call(arguments, 2), r = function() {
                if (this instanceof r) {
                    O.prototype = t.prototype;
                    var e = new O,
                        s = t.apply(e, i.concat(u.call(arguments)));
                    return Object(s) === s ? s : e
                }
                return t.apply(n, i.concat(u.call(arguments)))
            }
        }, T.bindAll = function(e) {
            var t = u.call(arguments, 1);
            return 0 == t.length && (t = T.functions(e)), N(t, function(t) {
                e[t] = T.bind(e[t], e)
            }), e
        }, T.memoize = function(e, t) {
            var n = {};
            return t || (t = T.identity),
                function() {
                    var r = t.apply(this, arguments);
                    return T.has(n, r) ? n[r] : n[r] = e.apply(this, arguments)
                }
        }, T.delay = function(e, t) {
            var n = u.call(arguments, 2);
            return setTimeout(function() {
                return e.apply(null, n)
            }, t)
        }, T.defer = function(e) {
            return T.delay.apply(T, [e, 1].concat(u.call(arguments, 1)))
        }, T.throttle = function(e, t) {
            var n, r, i, s, o, u, a = T.debounce(function() {
                o = s = !1
            }, t);
            return function() {
                n = this, r = arguments;
                var f = function() {
                    i = null, o && (u = e.apply(n, r)), a()
                };
                return i || (i = setTimeout(f, t)), s ? o = !0 : (s = !0, u = e.apply(n, r)), a(), u
            }
        }, T.debounce = function(e, t, n) {
            var r, i;
            return function() {
                var s = this,
                    o = arguments,
                    u = function() {
                        r = null, n || (i = e.apply(s, o))
                    },
                    a = n && !r;
                return clearTimeout(r), r = setTimeout(u, t), a && (i = e.apply(s, o)), i
            }
        }, T.once = function(e) {
            var n, t = !1;
            return function() {
                return t ? n : (t = !0, n = e.apply(this, arguments), e = null, n)
            }
        }, T.wrap = function(e, t) {
            return function() {
                var n = [e];
                return o.apply(n, arguments), t.apply(this, n)
            }
        }, T.compose = function() {
            var e = arguments;
            return function() {
                for (var t = arguments, n = e.length - 1; n >= 0; n--) t = [e[n].apply(this, t)];
                return t[0]
            }
        }, T.after = function(e, t) {
            return 0 >= e ? t() : function() {
                return --e < 1 ? t.apply(this, arguments) : void 0
            }
        }, T.keys = S || function(e) {
            if (e !== Object(e)) throw new TypeError("Invalid object");
            var t = [];
            for (var n in e) T.has(e, n) && (t[t.length] = n);
            return t
        }, T.values = function(e) {
            var t = [];
            for (var n in e) T.has(e, n) && t.push(e[n]);
            return t
        }, T.pairs = function(e) {
            var t = [];
            for (var n in e) T.has(e, n) && t.push([n, e[n]]);
            return t
        }, T.invert = function(e) {
            var t = {};
            for (var n in e) T.has(e, n) && (t[e[n]] = n);
            return t
        }, T.functions = T.methods = function(e) {
            var t = [];
            for (var n in e) T.isFunction(e[n]) && t.push(n);
            return t.sort()
        }, T.extend = function(e) {
            return N(u.call(arguments, 1), function(t) {
                for (var n in t) e[n] = t[n]
            }), e
        }, T.pick = function(e) {
            var t = {},
                n = a.apply(r, u.call(arguments, 1));
            return N(n, function(n) {
                n in e && (t[n] = e[n])
            }), t
        }, T.omit = function(e) {
            var t = {},
                n = a.apply(r, u.call(arguments, 1));
            for (var i in e) T.contains(n, i) || (t[i] = e[i]);
            return t
        }, T.defaults = function(e) {
            return N(u.call(arguments, 1), function(t) {
                for (var n in t) null == e[n] && (e[n] = t[n])
            }), e
        }, T.clone = function(e) {
            return T.isObject(e) ? T.isArray(e) ? e.slice() : T.extend({}, e) : e
        }, T.tap = function(e, t) {
            return t(e), e
        };
        var M = function(e, t, n, r) {
            if (e === t) return 0 !== e || 1 / e == 1 / t;
            if (null == e || null == t) return e === t;
            e instanceof T && (e = e._wrapped), t instanceof T && (t = t._wrapped);
            var i = l.call(e);
            if (i != l.call(t)) return !1;
            switch (i) {
                case "[object String]":
                    return e == String(t);
                case "[object Number]":
                    return e != +e ? t != +t : 0 == e ? 1 / e == 1 / t : e == +t;
                case "[object Date]":
                case "[object Boolean]":
                    return +e == +t;
                case "[object RegExp]":
                    return e.source == t.source && e.global == t.global && e.multiline == t.multiline && e.ignoreCase == t.ignoreCase
            }
            if ("object" != typeof e || "object" != typeof t) return !1;
            for (var s = n.length; s--;)
                if (n[s] == e) return r[s] == t;
            n.push(e), r.push(t);
            var o = 0,
                u = !0;
            if ("[object Array]" == i) {
                if (o = e.length, u = o == t.length)
                    for (; o-- && (u = M(e[o], t[o], n, r)););
            } else {
                var a = e.constructor,
                    f = t.constructor;
                if (a !== f && !(T.isFunction(a) && a instanceof a && T.isFunction(f) && f instanceof f)) return !1;
                for (var c in e)
                    if (T.has(e, c) && (o++, !(u = T.has(t, c) && M(e[c], t[c], n, r)))) break;
                if (u) {
                    for (c in t)
                        if (T.has(t, c) && !o--) break;
                    u = !o
                }
            }
            return n.pop(), r.pop(), u
        };
        T.isEqual = function(e, t) {
            return M(e, t, [], [])
        }, T.isEmpty = function(e) {
            if (null == e) return !0;
            if (T.isArray(e) || T.isString(e)) return 0 === e.length;
            for (var t in e)
                if (T.has(e, t)) return !1;
            return !0
        }, T.isElement = function(e) {
            return !!e && 1 === e.nodeType
        }, T.isArray = E || function(e) {
            return "[object Array]" == l.call(e)
        }, T.isObject = function(e) {
            return e === Object(e)
        }, N(["Arguments", "Function", "String", "Number", "Date", "RegExp"], function(e) {
            T["is" + e] = function(t) {
                return l.call(t) == "[object " + e + "]"
            }
        }), T.isArguments(arguments) || (T.isArguments = function(e) {
            return !!e && !!T.has(e, "callee")
        }), "function" != typeof /./ && (T.isFunction = function(e) {
            return "function" == typeof e
        }), T.isFinite = function(e) {
            return T.isNumber(e) && isFinite(e)
        }, T.isNaN = function(e) {
            return T.isNumber(e) && e != +e
        }, T.isBoolean = function(e) {
            return e === !0 || e === !1 || "[object Boolean]" == l.call(e)
        }, T.isNull = function(e) {
            return null === e
        }, T.isUndefined = function(e) {
            return void 0 === e
        }, T.has = function(e, t) {
            return c.call(e, t)
        }, T.noConflict = function() {
            return e._ = t, this
        }, T.identity = function(e) {
            return e
        }, T.times = function(e, t, n) {
            for (var r = 0; e > r; r++) t.call(n, r)
        }, T.random = function(e, t) {
            return null == t && (t = e, e = 0), e + (0 | Math.random() * (t - e + 1))
        };
        var _ = {
            escape: {
                "&": "&amp;",
                "<": "&lt;",
                ">": "&gt;",
                '"': "&quot;",
                "'": "&#x27;",
                "/": "&#x2F;"
            }
        };
        _.unescape = T.invert(_.escape);
        var D = {
            escape: new RegExp("[" + T.keys(_.escape).join("") + "]", "g"),
            unescape: new RegExp("(" + T.keys(_.unescape).join("|") + ")", "g")
        };
        T.each(["escape", "unescape"], function(e) {
            T[e] = function(t) {
                return null == t ? "" : ("" + t).replace(D[e], function(t) {
                    return _[e][t]
                })
            }
        }), T.result = function(e, t) {
            if (null == e) return null;
            var n = e[t];
            return T.isFunction(n) ? n.call(e) : n
        }, T.mixin = function(e) {
            N(T.functions(e), function(t) {
                var n = T[t] = e[t];
                T.prototype[t] = function() {
                    var e = [this._wrapped];
                    return o.apply(e, arguments), F.call(this, n.apply(T, e))
                }
            })
        };
        var P = 0;
        T.uniqueId = function(e) {
            var t = P++;
            return e ? e + t : t
        }, T.templateSettings = {
            evaluate: /<%([\s\S]+?)%>/g,
            interpolate: /<%=([\s\S]+?)%>/g,
            escape: /<%-([\s\S]+?)%>/g
        };
        var H = /(.)^/,
            B = {
                "'": "'",
                "\\": "\\",
                "\r": "r",
                "\n": "n",
                "	": "t",
                "\u2028": "u2028",
                "\u2029": "u2029"
            },
            j = /\\|'|\r|\n|\t|\u2028|\u2029/g;
        T.template = function(e, t, n) {
            n = T.defaults({}, n, T.templateSettings);
            var r = new RegExp([(n.escape || H).source, (n.interpolate || H).source, (n.evaluate || H).source].join("|") + "|$", "g"),
                i = 0,
                s = "__p+='";
            e.replace(r, function(t, n, r, o, u) {
                s += e.slice(i, u).replace(j, function(e) {
                    return "\\" + B[e]
                }), s += n ? "'+\n((__t=(" + n + "))==null?'':_.escape(__t))+\n'" : r ? "'+\n((__t=(" + r + "))==null?'':__t)+\n'" : o ? "';\n" + o + "\n__p+='" : "", i = u + t.length
            }), s += "';\n", n.variable || (s = "with(obj||{}){\n" + s + "}\n"), s = "var __t,__p='',__j=Array.prototype.join,print=function(){__p+=__j.call(arguments,'');};\n" + s + "return __p;\n";
            try {
                var o = new Function(n.variable || "obj", "_", s)
            } catch (u) {
                throw u.source = s, u
            }
            if (t) return o(t, T);
            var a = function(e) {
                return o.call(this, e, T)
            };
            return a.source = "function(" + (n.variable || "obj") + "){\n" + s + "}", a
        }, T.chain = function(e) {
            return T(e).chain()
        };
        var F = function(e) {
            return this._chain ? T(e).chain() : e
        };
        T.mixin(T), N(["pop", "push", "reverse", "shift", "sort", "splice", "unshift"], function(e) {
            var t = r[e];
            T.prototype[e] = function() {
                var n = this._wrapped;
                return t.apply(n, arguments), ("shift" == e || "splice" == e) && 0 === n.length && delete n[0], F.call(this, n)
            }
        }), N(["concat", "join", "slice"], function(e) {
            var t = r[e];
            T.prototype[e] = function() {
                return F.call(this, t.apply(this._wrapped, arguments))
            }
        }), T.extend(T.prototype, {
            chain: function() {
                return this._chain = !0, this
            },
            value: function() {
                return this._wrapped
            }
        })
    }.call(this),
    function(T, aa, p) {
        "use strict";

        function m(b, a, c) {
            var d;
            if (b)
                if (M(b))
                    for (d in b) "prototype" != d && "length" != d && "name" != d && b.hasOwnProperty(d) && a.call(c, b[d], d);
                else if (b.forEach && b.forEach !== m) b.forEach(a, c);
            else if (J(b) && va(b.length))
                for (d = 0; d < b.length; d++) a.call(c, b[d], d);
            else
                for (d in b) b.hasOwnProperty(d) && a.call(c, b[d], d);
            return b
        }

        function kb(b) {
            var c, a = [];
            for (c in b) b.hasOwnProperty(c) && a.push(c);
            return a.sort()
        }

        function dc(b, a, c) {
            for (var d = kb(b), e = 0; e < d.length; e++) a.call(c, b[d[e]], d[e]);
            return d
        }

        function lb(b) {
            return function(a, c) {
                b(c, a)
            }
        }

        function wa() {
            for (var a, b = Y.length; b;) {
                if (b--, a = Y[b].charCodeAt(0), 57 == a) return Y[b] = "A", Y.join("");
                if (90 != a) return Y[b] = String.fromCharCode(a + 1), Y.join("");
                Y[b] = "0"
            }
            return Y.unshift("0"), Y.join("")
        }

        function D(b) {
            return m(arguments, function(a) {
                a !== b && m(a, function(a, d) {
                    b[d] = a
                })
            }), b
        }

        function H(b) {
            return parseInt(b, 10)
        }

        function xa(b, a) {
            return D(new(D(function() {}, {
                prototype: b
            })), a)
        }

        function x() {}

        function ya(b) {
            return b
        }

        function B(b) {
            return function() {
                return b
            }
        }

        function v(b) {
            return "undefined" == typeof b
        }

        function s(b) {
            return "undefined" != typeof b
        }

        function J(b) {
            return null != b && "object" == typeof b
        }

        function G(b) {
            return "string" == typeof b
        }

        function va(b) {
            return "number" == typeof b
        }

        function ma(b) {
            return "[object Date]" == Sa.apply(b)
        }

        function K(b) {
            return "[object Array]" == Sa.apply(b)
        }

        function M(b) {
            return "function" == typeof b
        }

        function na(b) {
            return b && b.document && b.location && b.alert && b.setInterval
        }

        function Q(b) {
            return G(b) ? b.replace(/^\s*/, "").replace(/\s*$/, "") : b
        }

        function ec(b) {
            return b && (b.nodeName || b.bind && b.find)
        }

        function Ta(b, a, c) {
            var d = [];
            return m(b, function(b, g, h) {
                d.push(a.call(c, b, g, h))
            }), d
        }

        function fc(b, a) {
            var d, c = 0;
            if (K(b) || G(b)) return b.length;
            if (J(b))
                for (d in b)(!a || b.hasOwnProperty(d)) && c++;
            return c
        }

        function Ua(b, a) {
            if (b.indexOf) return b.indexOf(a);
            for (var c = 0; c < b.length; c++)
                if (a === b[c]) return c;
            return -1
        }

        function za(b, a) {
            var c = Ua(b, a);
            return c >= 0 && b.splice(c, 1), a
        }

        function U(b, a) {
            if (na(b) || b && b.$evalAsync && b.$watch) throw z("Can't copy Window or Scope");
            if (a) {
                if (b === a) throw z("Can't copy equivalent objects or arrays");
                if (K(b)) {
                    for (; a.length;) a.pop();
                    for (var c = 0; c < b.length; c++) a.push(U(b[c]))
                } else
                    for (c in m(a, function(b, c) {
                            delete a[c]
                        }), b) a[c] = U(b[c])
            } else(a = b) && (K(b) ? a = U(b, []) : ma(b) ? a = new Date(b.getTime()) : J(b) && (a = U(b, {})));
            return a
        }

        function gc(b, a) {
            var c, a = a || {};
            for (c in b) b.hasOwnProperty(c) && "$$" !== c.substr(0, 2) && (a[c] = b[c]);
            return a
        }

        function fa(b, a) {
            if (b === a) return !0;
            if (null === b || null === a) return !1;
            if (b !== b && a !== a) return !0;
            var d, c = typeof b;
            if (c == typeof a && "object" == c) {
                if (!K(b)) {
                    if (ma(b)) return ma(a) && b.getTime() == a.getTime();
                    if (b && b.$evalAsync && b.$watch || a && a.$evalAsync && a.$watch || na(b) || na(a)) return !1;
                    c = {};
                    for (d in b) {
                        if ("$" !== d.charAt(0) && !M(b[d]) && !fa(b[d], a[d])) return !1;
                        c[d] = !0
                    }
                    for (d in a)
                        if (!c[d] && "$" !== d.charAt(0) && !M(a[d])) return !1;
                    return !0
                }
                if ((c = b.length) == a.length) {
                    for (d = 0; c > d; d++)
                        if (!fa(b[d], a[d])) return !1;
                    return !0
                }
            }
            return !1
        }

        function Va(b, a) {
            var c = arguments.length > 2 ? ga.call(arguments, 2) : [];
            return !M(a) || a instanceof RegExp ? a : c.length ? function() {
                return arguments.length ? a.apply(b, c.concat(ga.call(arguments, 0))) : a.apply(b, c)
            } : function() {
                return arguments.length ? a.apply(b, arguments) : a.call(b)
            }
        }

        function hc(b, a) {
            var c = a;
            return /^\$+/.test(b) ? c = p : na(a) ? c = "$WINDOW" : a && aa === a ? c = "$DOCUMENT" : a && a.$evalAsync && a.$watch && (c = "$SCOPE"), c
        }

        function ba(b, a) {
            return JSON.stringify(b, hc, a ? "  " : null)
        }

        function mb(b) {
            return G(b) ? JSON.parse(b) : b
        }

        function Wa(b) {
            return b && 0 !== b.length ? (b = C("" + b), b = !("f" == b || "0" == b || "false" == b || "no" == b || "n" == b || "[]" == b)) : b = !1, b
        }

        function oa(b) {
            b = u(b).clone();
            try {
                b.html("")
            } catch (a) {}
            return u("<div>").append(b).html().match(/^(<[^>]+>)/)[1].replace(/^<([\w\-]+)/, function(a, b) {
                return "<" + C(b)
            })
        }

        function Xa(b) {
            var c, d, a = {};
            return m((b || "").split("&"), function(b) {
                b && (c = b.split("="), d = decodeURIComponent(c[0]), a[d] = s(c[1]) ? decodeURIComponent(c[1]) : !0)
            }), a
        }

        function nb(b) {
            var a = [];
            return m(b, function(b, d) {
                a.push(Ya(d, !0) + (b === !0 ? "" : "=" + Ya(b, !0)))
            }), a.length ? a.join("&") : ""
        }

        function Za(b) {
            return Ya(b, !0).replace(/%26/gi, "&").replace(/%3D/gi, "=").replace(/%2B/gi, "+")
        }

        function Ya(b, a) {
            return encodeURIComponent(b).replace(/%40/gi, "@").replace(/%3A/gi, ":").replace(/%24/g, "$").replace(/%2C/gi, ",").replace(a ? null : /%20/g, "+")
        }

        function ic(b, a) {
            function c(a) {
                a && d.push(a)
            }
            var e, g, d = [b],
                h = ["ng:app", "ng-app", "x-ng-app", "data-ng-app"],
                f = /\sng[:\-]app(:\s*([\w\d_]+);?)?\s/;
            m(h, function(a) {
                h[a] = !0, c(aa.getElementById(a)), a = a.replace(":", "\\:"), b.querySelectorAll && (m(b.querySelectorAll("." + a), c), m(b.querySelectorAll("." + a + "\\:"), c), m(b.querySelectorAll("[" + a + "]"), c))
            }), m(d, function(a) {
                if (!e) {
                    var b = f.exec(" " + a.className + " ");
                    b ? (e = a, g = (b[2] || "").replace(/\s+/g, ",")) : m(a.attributes, function(b) {
                        !e && h[b.name] && (e = a, g = b.value)
                    })
                }
            }), e && a(e, g ? [g] : [])
        }

        function ob(b, a) {
            b = u(b), a = a || [], a.unshift(["$provide", function(a) {
                a.value("$rootElement", b)
            }]), a.unshift("ng");
            var c = pb(a);
            return c.invoke(["$rootScope", "$rootElement", "$compile", "$injector", function(a, b, c, h) {
                a.$apply(function() {
                    b.data("$injector", h), c(b)(a)
                })
            }]), c
        }

        function $a(b, a) {
            return a = a || "_", b.replace(jc, function(b, d) {
                return (d ? a : "") + b.toLowerCase()
            })
        }

        function pa(b, a, c) {
            if (!b) throw new z("Argument '" + (a || "?") + "' is " + (c || "required"));
            return b
        }

        function qa(b, a, c) {
            return c && K(b) && (b = b[b.length - 1]), pa(M(b), a, "not a function, got " + (b && "object" == typeof b ? b.constructor.name || "Object" : typeof b)), b
        }

        function kc(b) {
            function a(a, b, e) {
                return a[b] || (a[b] = e())
            }
            return a(a(b, "angular", Object), "module", function() {
                var b = {};
                return function(d, e, g) {
                    return e && b.hasOwnProperty(d) && (b[d] = null), a(b, d, function() {
                        function a(c, d, e) {
                            return function() {
                                return b[e || "push"]([c, d, arguments]), k
                            }
                        }
                        if (!e) throw z("No module: " + d);
                        var b = [],
                            c = [],
                            j = a("$injector", "invoke"),
                            k = {
                                _invokeQueue: b,
                                _runBlocks: c,
                                requires: e,
                                name: d,
                                provider: a("$provide", "provider"),
                                factory: a("$provide", "factory"),
                                service: a("$provide", "service"),
                                value: a("$provide", "value"),
                                constant: a("$provide", "constant", "unshift"),
                                filter: a("$filterProvider", "register"),
                                controller: a("$controllerProvider", "register"),
                                directive: a("$compileProvider", "directive"),
                                config: j,
                                run: function(a) {
                                    return c.push(a), this
                                }
                            };
                        return g && j(g), k
                    })
                }
            })
        }

        function qb(b) {
            return b.replace(lc, function(a, b, d, e) {
                return e ? d.toUpperCase() : d
            }).replace(mc, "Moz$1")
        }

        function ab(b, a) {
            function c() {
                for (var e, h, f, i, j, k, l, n, b = [this], c = a; b.length;)
                    for (h = b.shift(), f = 0, i = h.length; i > f; f++)
                        for (j = u(h[f]), c ? (n = (k = j.data("events")) && k.$destroy) && m(n, function(a) {
                                a.handler()
                            }) : c = !c, k = 0, e = (l = j.children()).length, j = e; j > k; k++) b.push(ha(l[k]));
                return d.apply(this, arguments)
            }
            var d = ha.fn[b],
                d = d.$original || d;
            c.$original = d, ha.fn[b] = c
        }

        function P(b) {
            if (b instanceof P) return b;
            if (!(this instanceof P)) {
                if (G(b) && "<" != b.charAt(0)) throw z("selectors not implemented");
                return new P(b)
            }
            if (G(b)) {
                var a = aa.createElement("div");
                a.innerHTML = "<div>&nbsp;</div>" + b, a.removeChild(a.firstChild), bb(this, a.childNodes), this.remove()
            } else bb(this, b)
        }

        function cb(b) {
            return b.cloneNode(!0)
        }

        function ra(b) {
            rb(b);
            for (var a = 0, b = b.childNodes || []; a < b.length; a++) ra(b[a])
        }

        function sb(b, a, c) {
            var d = ca(b, "events");
            ca(b, "handle") && (v(a) ? m(d, function(a, c) {
                tb(b, c, a), delete d[c]
            }) : v(c) ? (tb(b, a, d[a]), delete d[a]) : za(d[a], c))
        }

        function rb(b) {
            var a = b[Aa],
                c = Ba[a];
            c && (c.handle && (c.events.$destroy && c.handle({}, "$destroy"), sb(b)), delete Ba[a], b[Aa] = p)
        }

        function ca(b, a, c) {
            var d = b[Aa],
                d = Ba[d || -1];
            return s(c) ? (d || (b[Aa] = d = ++nc, d = Ba[d] = {}), void(d[a] = c)) : d && d[a]
        }

        function ub(b, a, c) {
            var d = ca(b, "data"),
                e = s(c),
                g = !e && s(a),
                h = g && !J(a);
            if (!d && !h && ca(b, "data", d = {}), e) d[a] = c;
            else {
                if (!g) return d;
                if (h) return d && d[a];
                D(d, a)
            }
        }

        function Ca(b, a) {
            return (" " + b.className + " ").replace(/[\n\t]/g, " ").indexOf(" " + a + " ") > -1
        }

        function vb(b, a) {
            a && m(a.split(" "), function(a) {
                b.className = Q((" " + b.className + " ").replace(/[\n\t]/g, " ").replace(" " + Q(a) + " ", " "))
            })
        }

        function wb(b, a) {
            a && m(a.split(" "), function(a) {
                Ca(b, a) || (b.className = Q(b.className + " " + Q(a)))
            })
        }

        function bb(b, a) {
            if (a)
                for (var a = a.nodeName || !s(a.length) || na(a) ? [a] : a, c = 0; c < a.length; c++) b.push(a[c])
        }

        function xb(b, a) {
            return Da(b, "$" + (a || "ngController") + "Controller")
        }

        function Da(b, a, c) {
            for (b = u(b), 9 == b[0].nodeType && (b = b.find("html")); b.length;) {
                if (c = b.data(a)) return c;
                b = b.parent()
            }
        }

        function yb(b, a) {
            var c = Ea[a.toLowerCase()];
            return c && zb[b.nodeName] && c
        }

        function oc(b, a) {
            var c = function(c, e) {
                if (c.preventDefault || (c.preventDefault = function() {
                        c.returnValue = !1
                    }), c.stopPropagation || (c.stopPropagation = function() {
                        c.cancelBubble = !0
                    }), c.target || (c.target = c.srcElement || aa), v(c.defaultPrevented)) {
                    var g = c.preventDefault;
                    c.preventDefault = function() {
                        c.defaultPrevented = !0, g.call(c)
                    }, c.defaultPrevented = !1
                }
                c.isDefaultPrevented = function() {
                    return c.defaultPrevented
                }, m(a[e || c.type], function(a) {
                    a.call(b, c)
                }), 8 >= Z ? (c.preventDefault = null, c.stopPropagation = null, c.isDefaultPrevented = null) : (delete c.preventDefault, delete c.stopPropagation, delete c.isDefaultPrevented)
            };
            return c.elem = b, c
        }

        function ia(b) {
            var c, a = typeof b;
            return "object" == a && null !== b ? "function" == typeof(c = b.$$hashKey) ? c = b.$$hashKey() : c === p && (c = b.$$hashKey = wa()) : c = b, a + ":" + c
        }

        function Fa(b) {
            m(b, this.put, this)
        }

        function db() {}

        function Ab(b) {
            var a, c;
            return "function" == typeof b ? (a = b.$inject) || (a = [], c = b.toString().replace(pc, ""), c = c.match(qc), m(c[1].split(rc), function(b) {
                b.replace(sc, function(b, c, d) {
                    a.push(d)
                })
            }), b.$inject = a) : K(b) ? (c = b.length - 1, qa(b[c], "fn"), a = b.slice(0, c)) : qa(b, "fn", !0), a
        }

        function pb(b) {
            function a(a) {
                return function(b, c) {
                    return J(b) ? void m(b, lb(a)) : a(b, c)
                }
            }

            function c(a, b) {
                if (M(b) && (b = l.instantiate(b)), !b.$get) throw z("Provider " + a + " must define $get factory method.");
                return k[a + f] = b
            }

            function d(a, b) {
                return c(a, {
                    $get: b
                })
            }

            function e(a) {
                var b = [];
                return m(a, function(a) {
                    if (!j.get(a))
                        if (j.put(a, !0), G(a)) {
                            var c = sa(a);
                            b = b.concat(e(c.requires)).concat(c._runBlocks);
                            try {
                                for (var d = c._invokeQueue, c = 0, f = d.length; f > c; c++) {
                                    var g = d[c],
                                        i = "$injector" == g[0] ? l : l.get(g[0]);
                                    i[g[1]].apply(i, g[2])
                                }
                            } catch (h) {
                                throw h.message && (h.message += " from " + a), h
                            }
                        } else if (M(a)) try {
                        b.push(l.invoke(a))
                    } catch (o) {
                        throw o.message && (o.message += " from " + a), o
                    } else if (K(a)) try {
                        b.push(l.invoke(a))
                    } catch (n) {
                        throw n.message && (n.message += " from " + String(a[a.length - 1])), n
                    } else qa(a, "module")
                }), b
            }

            function g(a, b) {
                function c(d) {
                    if ("string" != typeof d) throw z("Service name expected");
                    if (a.hasOwnProperty(d)) {
                        if (a[d] === h) throw z("Circular dependency: " + i.join(" <- "));
                        return a[d]
                    }
                    try {
                        return i.unshift(d), a[d] = h, a[d] = b(d)
                    } finally {
                        i.shift()
                    }
                }

                function d(a, b, e) {
                    var j, h, o, f = [],
                        g = Ab(a);
                    for (h = 0, j = g.length; j > h; h++) o = g[h], f.push(e && e.hasOwnProperty(o) ? e[o] : c(o, i));
                    switch (a.$inject || (a = a[j]), b ? -1 : f.length) {
                        case 0:
                            return a();
                        case 1:
                            return a(f[0]);
                        case 2:
                            return a(f[0], f[1]);
                        case 3:
                            return a(f[0], f[1], f[2]);
                        case 4:
                            return a(f[0], f[1], f[2], f[3]);
                        case 5:
                            return a(f[0], f[1], f[2], f[3], f[4]);
                        case 6:
                            return a(f[0], f[1], f[2], f[3], f[4], f[5]);
                        case 7:
                            return a(f[0], f[1], f[2], f[3], f[4], f[5], f[6]);
                        case 8:
                            return a(f[0], f[1], f[2], f[3], f[4], f[5], f[6], f[7]);
                        case 9:
                            return a(f[0], f[1], f[2], f[3], f[4], f[5], f[6], f[7], f[8]);
                        case 10:
                            return a(f[0], f[1], f[2], f[3], f[4], f[5], f[6], f[7], f[8], f[9]);
                        default:
                            return a.apply(b, f)
                    }
                }
                return {
                    invoke: d,
                    instantiate: function(a, b) {
                        var e, c = function() {};
                        return c.prototype = (K(a) ? a[a.length - 1] : a).prototype, c = new c, e = d(a, c, b), J(e) ? e : c
                    },
                    get: c,
                    annotate: Ab
                }
            }
            var h = {},
                f = "Provider",
                i = [],
                j = new Fa,
                k = {
                    $provide: {
                        provider: a(c),
                        factory: a(d),
                        service: a(function(a, b) {
                            return d(a, ["$injector", function(a) {
                                return a.instantiate(b)
                            }])
                        }),
                        value: a(function(a, b) {
                            return d(a, B(b))
                        }),
                        constant: a(function(a, b) {
                            k[a] = b, n[a] = b
                        }),
                        decorator: function(a, b) {
                            var c = l.get(a + f),
                                d = c.$get;
                            c.$get = function() {
                                var a = r.invoke(d, c);
                                return r.invoke(b, null, {
                                    $delegate: a
                                })
                            }
                        }
                    }
                },
                l = g(k, function() {
                    throw z("Unknown provider: " + i.join(" <- "))
                }),
                n = {},
                r = n.$injector = g(n, function(a) {
                    return a = l.get(a + f), r.invoke(a.$get, a)
                });
            return m(e(b), function(a) {
                r.invoke(a || x)
            }), r
        }

        function tc() {
            var b = !0;
            this.disableAutoScrolling = function() {
                b = !1
            }, this.$get = ["$window", "$location", "$rootScope", function(a, c, d) {
                function e(a) {
                    var b = null;
                    return m(a, function(a) {
                        !b && "a" === C(a.nodeName) && (b = a)
                    }), b
                }

                function g() {
                    var d, b = c.hash();
                    b ? (d = h.getElementById(b)) ? d.scrollIntoView() : (d = e(h.getElementsByName(b))) ? d.scrollIntoView() : "top" === b && a.scrollTo(0, 0) : a.scrollTo(0, 0)
                }
                var h = a.document;
                return b && d.$watch(function() {
                    return c.hash()
                }, function() {
                    d.$evalAsync(g)
                }), g
            }]
        }

        function uc(b, a, c, d) {
            function e(a) {
                try {
                    a.apply(null, ga.call(arguments, 1))
                } finally {
                    if (o--, 0 === o)
                        for (; w.length;) try {
                            w.pop()()
                        } catch (b) {
                            c.error(b)
                        }
                }
            }

            function g(a, b) {
                ! function da() {
                    m(q, function(a) {
                        a()
                    }), t = b(da, a)
                }()
            }

            function h() {
                X != f.url() && (X = f.url(), m(y, function(a) {
                    a(f.url())
                }))
            }
            var f = this,
                i = a[0],
                j = b.location,
                k = b.history,
                l = b.setTimeout,
                n = b.clearTimeout,
                r = {};
            f.isMock = !1;
            var o = 0,
                w = [];
            f.$$completeOutstandingRequest = e, f.$$incOutstandingRequestCount = function() {
                o++
            }, f.notifyWhenNoOutstandingRequests = function(a) {
                m(q, function(a) {
                    a()
                }), 0 === o ? a() : w.push(a)
            };
            var t, q = [];
            f.addPollFn = function(a) {
                return v(t) && g(100, l), q.push(a), a
            };
            var X = j.href,
                A = a.find("base");
            f.url = function(a, b) {
                return a ? X != a ? (X = a, d.history ? b ? k.replaceState(null, "", a) : (k.pushState(null, "", a), A.attr("href", A.attr("href"))) : b ? j.replace(a) : j.href = a, f) : void 0 : j.href.replace(/%27/g, "'")
            };
            var y = [],
                L = !1;
            f.onUrlChange = function(a) {
                return L || (d.history && u(b).bind("popstate", h), d.hashchange ? u(b).bind("hashchange", h) : f.addPollFn(h), L = !0), y.push(a), a
            }, f.baseHref = function() {
                var a = A.attr("href");
                return a ? a.replace(/^https?\:\/\/[^\/]*/, "") : a
            };
            var V = {},
                I = "",
                N = f.baseHref();
            f.cookies = function(a, b) {
                var d, e, f, g;
                if (!a) {
                    if (i.cookie !== I)
                        for (I = i.cookie, d = I.split("; "), V = {}, f = 0; f < d.length; f++) e = d[f], g = e.indexOf("="), g > 0 && (V[unescape(e.substring(0, g))] = unescape(e.substring(g + 1)));
                    return V
                }
                b === p ? i.cookie = escape(a) + "=;path=" + N + ";expires=Thu, 01 Jan 1970 00:00:00 GMT" : G(b) && (d = (i.cookie = escape(a) + "=" + escape(b) + ";path=" + N).length + 1, d > 4096 && c.warn("Cookie '" + a + "' possibly not set or overflowed because it was too large (" + d + " > 4096 bytes)!"), V.length > 20 && c.warn("Cookie '" + a + "' possibly not set or overflowed because too many cookies were already set (" + V.length + " > 20 )"))
            }, f.defer = function(a, b) {
                var c;
                return o++, c = l(function() {
                    delete r[c], e(a)
                }, b || 0), r[c] = !0, c
            }, f.defer.cancel = function(a) {
                return r[a] ? (delete r[a], n(a), e(x), !0) : !1
            }
        }

        function vc() {
            this.$get = ["$window", "$log", "$sniffer", "$document", function(b, a, c, d) {
                return new uc(b, d, a, c)
            }]
        }

        function wc() {
            this.$get = function() {
                function b(b, d) {
                    function e(a) {
                        a != l && (n ? n == a && (n = a.n) : n = a, g(a.n, a.p), g(a, l), l = a, l.n = null)
                    }

                    function g(a, b) {
                        a != b && (a && (a.p = b), b && (b.n = a))
                    }
                    if (b in a) throw z("cacheId " + b + " taken");
                    var h = 0,
                        f = D({}, d, {
                            id: b
                        }),
                        i = {},
                        j = d && d.capacity || Number.MAX_VALUE,
                        k = {},
                        l = null,
                        n = null;
                    return a[b] = {
                        put: function(a, b) {
                            var c = k[a] || (k[a] = {
                                key: a
                            });
                            e(c), v(b) || (a in i || h++, i[a] = b, h > j && this.remove(n.key))
                        },
                        get: function(a) {
                            var b = k[a];
                            return b ? (e(b), i[a]) : void 0
                        },
                        remove: function(a) {
                            var b = k[a];
                            b == l && (l = b.p), b == n && (n = b.n), g(b.n, b.p), delete k[a], delete i[a], h--
                        },
                        removeAll: function() {
                            i = {}, h = 0, k = {}, l = n = null
                        },
                        destroy: function() {
                            k = f = i = null, delete a[b]
                        },
                        info: function() {
                            return D({}, f, {
                                size: h
                            })
                        }
                    }
                }
                var a = {};
                return b.info = function() {
                    var b = {};
                    return m(a, function(a, e) {
                        b[e] = a.info()
                    }), b
                }, b.get = function(b) {
                    return a[b]
                }, b
            }
        }

        function xc() {
            this.$get = ["$cacheFactory", function(b) {
                return b("templates")
            }]
        }

        function Bb(b) {
            var a = {},
                c = "Directive",
                d = /^\s*directive\:\s*([\d\w\-_]+)\s+(.*)$/,
                e = /(([\d\w\-_]+)(?:\:([^;]+))?;?)/,
                g = "Template must have exactly one root element. was: ";
            this.directive = function f(d, e) {
                return G(d) ? (pa(e, "directive"), a.hasOwnProperty(d) || (a[d] = [], b.factory(d + c, ["$injector", "$exceptionHandler", function(b, c) {
                    var e = [];
                    return m(a[d], function(a) {
                        try {
                            var f = b.invoke(a);
                            M(f) ? f = {
                                compile: B(f)
                            } : !f.compile && f.link && (f.compile = B(f.link)), f.priority = f.priority || 0, f.name = f.name || d, f.require = f.require || f.controller && f.name, f.restrict = f.restrict || "A", e.push(f)
                        } catch (g) {
                            c(g)
                        }
                    }), e
                }])), a[d].push(e)) : m(d, lb(f)), this
            }, this.$get = ["$injector", "$interpolate", "$exceptionHandler", "$http", "$templateCache", "$parse", "$controller", "$rootScope", function(b, i, j, k, l, n, r, o) {
                function w(a, b, c) {
                    a instanceof u || (a = u(a)), m(a, function(b, c) {
                        3 == b.nodeType && (a[c] = u(b).wrap("<span>").parent()[0])
                    });
                    var d = t(a, b, a, c);
                    return function(b, c) {
                        pa(b, "scope");
                        var e = c ? ta.clone.call(a) : a;
                        return e.data("$scope", b), q(e, "ng-scope"), c && c(e, b), d && d(b, e, e), e
                    }
                }

                function q(a, b) {
                    try {
                        a.addClass(b)
                    } catch (c) {}
                }

                function t(a, b, c, d) {
                    function e(a, c, d, g) {
                        for (var j, i, n, k, l, o = 0, r = 0, q = f.length; q > o; r++) n = c[r], j = f[o++], i = f[o++], j ? (j.scope ? (k = a.$new(J(j.scope)), u(n).data("$scope", k)) : k = a, (l = j.transclude) || !g && b ? j(i, k, n, d, function(b) {
                            return function(c) {
                                var d = a.$new();
                                return b(d, c).bind("$destroy", Va(d, d.$destroy))
                            }
                        }(l || b)) : j(i, k, n, p, g)) : i && i(a, n.childNodes, p, g)
                    }
                    for (var g, j, i, f = [], n = 0; n < a.length; n++) j = new da, g = X(a[n], [], j, d), j = (g = g.length ? A(g, a[n], j, b, c) : null) && g.terminal ? null : t(a[n].childNodes, g ? g.transclude : b), f.push(g), f.push(j), i = i || g || j;
                    return i ? e : null
                }

                function X(a, b, c, f) {
                    var j, g = c.$attr;
                    switch (a.nodeType) {
                        case 1:
                            y(b, ea(Cb(a).toLowerCase()), "E", f);
                            var i, n, k;
                            j = a.attributes;
                            for (var l = 0, o = j && j.length; o > l; l++) i = j[l], i.specified && (n = i.name, k = ea(n.toLowerCase()), g[k] = n, c[k] = i = Q(Z && "href" == n ? decodeURIComponent(a.getAttribute(n, 2)) : i.value), yb(a, k) && (c[k] = !0), W(a, b, i, k), y(b, k, "A", f));
                            if (a = a.className, G(a))
                                for (; j = e.exec(a);) k = ea(j[2]), y(b, k, "C", f) && (c[k] = Q(j[3])), a = a.substr(j.index + j[0].length);
                            break;
                        case 3:
                            F(b, a.nodeValue);
                            break;
                        case 8:
                            try {
                                (j = d.exec(a.nodeValue)) && (k = ea(j[1]), y(b, k, "M", f) && (c[k] = Q(j[2])))
                            } catch (r) {}
                    }
                    return b.sort(I), b
                }

                function A(a, b, c, d, e) {
                    function f(a, b) {
                        a && (a.require = E.require, o.push(a)), b && (b.require = E.require, t.push(b))
                    }

                    function i(a, b) {
                        var c, d = "data",
                            e = !1;
                        if (G(a)) {
                            for (;
                                "^" == (c = a.charAt(0)) || "?" == c;) a = a.substr(1), "^" == c && (d = "inheritedData"), e = e || "?" == c;
                            if (c = b[d]("$" + a + "Controller"), !c && !e) throw z("No controller: " + a)
                        } else K(a) && (c = [], m(a, function(a) {
                            c.push(i(a, b))
                        }));
                        return c
                    }

                    function k(a, d, e, f, g) {
                        var l, q, w, L, Ha;
                        if (l = b === e ? c : gc(c, new da(u(e), c.$attr)), q = l.$$element, A && J(A.scope)) {
                            var yc = /^\s*([@=&])\s*(\w*)\s*$/,
                                ja = d.$parent || d;
                            m(A.scope, function(a, b) {
                                var f, g, j, c = a.match(yc) || [],
                                    e = c[2] || b;
                                switch (c[1]) {
                                    case "@":
                                        l.$observe(e, function(a) {
                                            d[b] = a
                                        }), l.$$observers[e].$$scope = ja;
                                        break;
                                    case "=":
                                        g = n(l[e]), j = g.assign || function() {
                                            throw f = d[b] = g(ja), z(Db + l[e] + " (directive: " + A.name + ")")
                                        }, f = d[b] = g(ja), d.$watch(function() {
                                            var a = g(ja);
                                            return a !== d[b] && (a !== f ? f = d[b] = a : j(ja, f = d[b])), a
                                        });
                                        break;
                                    case "&":
                                        g = n(l[e]), d[b] = function(a) {
                                            return g(ja, a)
                                        };
                                        break;
                                    default:
                                        throw z("Invalid isolate scope definition for directive " + A.name + ": " + a)
                                }
                            })
                        }
                        for (s && m(s, function(a) {
                                var b = {
                                    $scope: d,
                                    $element: q,
                                    $attrs: l,
                                    $transclude: g
                                };
                                Ha = a.controller, "@" == Ha && (Ha = l[a.name]), q.data("$" + a.name + "Controller", r(Ha, b))
                            }), f = 0, w = o.length; w > f; f++) try {
                            (L = o[f])(d, q, l, L.require && i(L.require, q))
                        } catch (y) {
                            j(y, oa(q))
                        }
                        for (a && a(d, e.childNodes, p, g), f = 0, w = t.length; w > f; f++) try {
                            (L = t[f])(d, q, l, L.require && i(L.require, q))
                        } catch (X) {
                            j(X, oa(q))
                        }
                    }
                    for (var E, W, $, x, s, D, B, l = -Number.MAX_VALUE, o = [], t = [], A = null, y = null, I = null, F = c.$$element = u(b), v = d, C = 0, H = a.length; H > C && (E = a[C], $ = p, !(l > E.priority)); C++) {
                        if ((B = E.scope) && (N("isolated scope", y, E, F), J(B) && (q(F, "ng-isolate-scope"), y = E), q(F, "ng-scope"), A = A || E), W = E.name, (B = E.controller) && (s = s || {}, N("'" + W + "' controller", s[W], E, F), s[W] = E), (B = E.transclude) && (N("transclusion", x, E, F), x = E, l = E.priority, "element" == B ? ($ = u(b), F = c.$$element = u("<!-- " + W + ": " + c[W] + " -->"), b = F[0], Ga(e, u($[0]), b), v = w($, d, l)) : ($ = u(cb(b)).contents(), F.html(""), v = w($, d))), B = E.template)
                            if (N("template", I, E, F), I = E, $ = u("<div>" + Q(B) + "</div>").contents(), b = $[0], E.replace) {
                                if (1 != $.length || 1 !== b.nodeType) throw new z(g + B);
                                Ga(e, F, b), W = {
                                    $attr: {}
                                }, a = a.concat(X(b, a.splice(C + 1, a.length - (C + 1)), W)), L(c, W), H = a.length
                            } else F.html(B);
                        if (E.templateUrl) N("template", I, E, F), I = E, k = V(a.splice(C, a.length - C), k, F, c, e, E.replace, v), H = a.length;
                        else if (E.compile) try {
                            D = E.compile(F, c, v), M(D) ? f(null, D) : D && f(D.pre, D.post)
                        } catch (O) {
                            j(O, oa(F))
                        }
                        E.terminal && (k.terminal = !0, l = Math.max(l, E.priority))
                    }
                    return k.scope = A && A.scope, k.transclude = x && v, k
                }

                function y(d, e, g, i) {
                    var n = !1;
                    if (a.hasOwnProperty(e))
                        for (var k, e = b.get(e + c), l = 0, o = e.length; o > l; l++) try {
                            k = e[l], (i === p || i > k.priority) && -1 != k.restrict.indexOf(g) && (d.push(k), n = !0)
                        } catch (r) {
                            j(r)
                        }
                    return n
                }

                function L(a, b) {
                    var c = b.$attr,
                        d = a.$attr,
                        e = a.$$element;
                    m(a, function(d, e) {
                        "$" != e.charAt(0) && (b[e] && (d += ("style" === e ? ";" : " ") + b[e]), a.$set(e, d, !0, c[e]))
                    }), m(b, function(b, f) {
                        "class" == f ? (q(e, b), a["class"] = (a["class"] ? a["class"] + " " : "") + b) : "style" == f ? e.attr("style", e.attr("style") + ";" + b) : "$" != f.charAt(0) && !a.hasOwnProperty(f) && (a[f] = b, d[f] = c[f])
                    })
                }

                function V(a, b, c, d, e, f, j) {
                    var n, o, i = [],
                        r = c[0],
                        q = a.shift(),
                        w = D({}, q, {
                            controller: null,
                            templateUrl: null,
                            transclude: null
                        });
                    return c.html(""), k.get(q.templateUrl, {
                            cache: l
                        }).success(function(k) {
                            var l, q;
                            if (f) {
                                if (q = u("<div>" + Q(k) + "</div>").contents(), l = q[0], 1 != q.length || 1 !== l.nodeType) throw new z(g + k);
                                k = {
                                    $attr: {}
                                }, Ga(e, c, l), X(l, a, k), L(d, k)
                            } else l = r, c.html(k);
                            for (a.unshift(w), n = A(a, c, d, j), o = t(c.contents(), j); i.length;) {
                                var m = i.pop(),
                                    k = i.pop();
                                q = i.pop();
                                var y = i.pop(),
                                    I = l;
                                q !== r && (I = cb(l), Ga(k, u(q), I)), n(function() {
                                    b(o, y, I, e, m)
                                }, y, I, e, m)
                            }
                            i = null
                        }).error(function(a, b, c, d) {
                            throw z("Failed to load template: " + d.url)
                        }),
                        function(a, c, d, e, f) {
                            i ? (i.push(c), i.push(d), i.push(e), i.push(f)) : n(function() {
                                b(o, c, d, e, f)
                            }, c, d, e, f)
                        }
                }

                function I(a, b) {
                    return b.priority - a.priority
                }

                function N(a, b, c, d) {
                    if (b) throw z("Multiple directives [" + b.name + ", " + c.name + "] asking for " + a + " on: " + oa(d))
                }

                function F(a, b) {
                    var c = i(b, !0);
                    c && a.push({
                        priority: 0,
                        compile: B(function(a, b) {
                            var d = b.parent(),
                                e = d.data("$binding") || [];
                            e.push(c), q(d.data("$binding", e), "ng-binding"), a.$watch(c, function(a) {
                                b[0].nodeValue = a
                            })
                        })
                    })
                }

                function W(a, b, c, d) {
                    var e = i(c, !0);
                    e && b.push({
                        priority: 100,
                        compile: B(function(a, b, c) {
                            b = c.$$observers || (c.$$observers = {}), "class" === d && (e = i(c[d], !0)), c[d] = p, (b[d] || (b[d] = [])).$$inter = !0, (c.$$observers && c.$$observers[d].$$scope || a).$watch(e, function(a) {
                                c.$set(d, a)
                            })
                        })
                    })
                }

                function Ga(a, b, c) {
                    var f, g, d = b[0],
                        e = d.parentNode;
                    if (a)
                        for (f = 0, g = a.length; g > f; f++)
                            if (a[f] == d) {
                                a[f] = c;
                                break
                            }
                    e && e.replaceChild(c, d), c[u.expando] = d[u.expando], b[0] = c
                }
                var da = function(a, b) {
                    this.$$element = a, this.$attr = b || {}
                };
                return da.prototype = {
                    $normalize: ea,
                    $set: function(a, b, c, d) {
                        var e = yb(this.$$element[0], a),
                            f = this.$$observers;
                        e && (this.$$element.prop(a, b), d = e), this[a] = b, d ? this.$attr[a] = d : (d = this.$attr[a]) || (this.$attr[a] = d = $a(a, "-")), c !== !1 && (null === b || b === p ? this.$$element.removeAttr(d) : this.$$element.attr(d, b)), f && m(f[a], function(a) {
                            try {
                                a(b)
                            } catch (c) {
                                j(c)
                            }
                        })
                    },
                    $observe: function(a, b) {
                        var c = this,
                            d = c.$$observers || (c.$$observers = {}),
                            e = d[a] || (d[a] = []);
                        return e.push(b), o.$evalAsync(function() {
                            e.$$inter || b(c[a])
                        }), b
                    }
                }, w
            }]
        }

        function ea(b) {
            return qb(b.replace(zc, ""))
        }

        function Ac() {
            var b = {};
            this.register = function(a, c) {
                J(a) ? D(b, a) : b[a] = c
            }, this.$get = ["$injector", "$window", function(a, c) {
                return function(d, e) {
                    if (G(d)) {
                        var g = d,
                            d = b.hasOwnProperty(g) ? b[g] : eb(e.$scope, g, !0) || eb(c, g, !0);
                        qa(d, g, !0)
                    }
                    return a.instantiate(d, e)
                }
            }]
        }

        function Bc() {
            this.$get = ["$window", function(b) {
                return u(b.document)
            }]
        }

        function Cc() {
            this.$get = ["$log", function(b) {
                return function() {
                    b.error.apply(b, arguments)
                }
            }]
        }

        function Dc() {
            var b = "{{",
                a = "}}";
            this.startSymbol = function(a) {
                return a ? (b = a, this) : b
            }, this.endSymbol = function(c) {
                return c ? (a = c, this) : b
            }, this.$get = ["$parse", function(c) {
                var d = b.length,
                    e = a.length;
                return function(g, h) {
                    for (var f, i, j = 0, k = [], l = g.length, n = !1, r = []; l > j;) - 1 != (f = g.indexOf(b, j)) && -1 != (i = g.indexOf(a, f + d)) ? (j != f && k.push(g.substring(j, f)), k.push(j = c(n = g.substring(f + d, i))), j.exp = n, j = i + e, n = !0) : (j != l && k.push(g.substring(j)), j = l);
                    return (l = k.length) || (k.push(""), l = 1), !h || n ? (r.length = l, j = function(a) {
                        for (var d, b = 0, c = l; c > b; b++) "function" == typeof(d = k[b]) && (d = d(a), null == d || d == p ? d = "" : "string" != typeof d && (d = ba(d))), r[b] = d;
                        return r.join("")
                    }, j.exp = g, j.parts = k, j) : void 0
                }
            }]
        }

        function Eb(b) {
            for (var b = b.split("/"), a = b.length; a--;) b[a] = Za(b[a]);
            return b.join("/")
        }

        function ua(b, a) {
            var c = Fb.exec(b),
                c = {
                    protocol: c[1],
                    host: c[3],
                    port: H(c[5]) || Gb[c[1]] || null,
                    path: c[6] || "/",
                    search: c[8],
                    hash: c[10]
                };
            return a && (a.$$protocol = c.protocol, a.$$host = c.host, a.$$port = c.port), c
        }

        function ka(b, a, c) {
            return b + "://" + a + (c == Gb[b] ? "" : ":" + c)
        }

        function Ec(b, a, c) {
            var d = ua(b);
            return decodeURIComponent(d.path) != a || v(d.hash) || 0 !== d.hash.indexOf(c) ? b : ka(d.protocol, d.host, d.port) + a.substr(0, a.lastIndexOf("/")) + d.hash.substr(c.length)
        }

        function Fc(b, a, c) {
            var d = ua(b);
            if (decodeURIComponent(d.path) == a) return b;
            var e = d.search && "?" + d.search || "",
                g = d.hash && "#" + d.hash || "",
                h = a.substr(0, a.lastIndexOf("/")),
                f = d.path.substr(h.length);
            if (0 !== d.path.indexOf(h)) throw z('Invalid url "' + b + '", missing path prefix "' + h + '" !');
            return ka(d.protocol, d.host, d.port) + a + "#" + c + f + e + g
        }

        function fb(b, a, c) {
            a = a || "", this.$$parse = function(b) {
                var c = ua(b, this);
                if (0 !== c.path.indexOf(a)) throw z('Invalid url "' + b + '", missing path prefix "' + a + '" !');
                this.$$path = decodeURIComponent(c.path.substr(a.length)), this.$$search = Xa(c.search), this.$$hash = c.hash && decodeURIComponent(c.hash) || "", this.$$compose()
            }, this.$$compose = function() {
                var b = nb(this.$$search),
                    c = this.$$hash ? "#" + Za(this.$$hash) : "";
                this.$$url = Eb(this.$$path) + (b ? "?" + b : "") + c, this.$$absUrl = ka(this.$$protocol, this.$$host, this.$$port) + a + this.$$url
            }, this.$$rewriteAppUrl = function(a) {
                return 0 == a.indexOf(c) ? a : void 0
            }, this.$$parse(b)
        }

        function Ia(b, a, c) {
            var d;
            this.$$parse = function(b) {
                var c = ua(b, this);
                if (c.hash && 0 !== c.hash.indexOf(a)) throw z('Invalid url "' + b + '", missing hash prefix "' + a + '" !');
                d = c.path + (c.search ? "?" + c.search : ""), c = Gc.exec((c.hash || "").substr(a.length)), this.$$path = c[1] ? ("/" == c[1].charAt(0) ? "" : "/") + decodeURIComponent(c[1]) : "", this.$$search = Xa(c[3]), this.$$hash = c[5] && decodeURIComponent(c[5]) || "", this.$$compose()
            }, this.$$compose = function() {
                var b = nb(this.$$search),
                    c = this.$$hash ? "#" + Za(this.$$hash) : "";
                this.$$url = Eb(this.$$path) + (b ? "?" + b : "") + c, this.$$absUrl = ka(this.$$protocol, this.$$host, this.$$port) + d + (this.$$url ? "#" + a + this.$$url : "")
            }, this.$$rewriteAppUrl = function(a) {
                return 0 == a.indexOf(c) ? a : void 0
            }, this.$$parse(b)
        }

        function Hb(b, a, c, d) {
            Ia.apply(this, arguments), this.$$rewriteAppUrl = function(b) {
                return 0 == b.indexOf(c) ? c + d + "#" + a + b.substr(c.length) : void 0
            }
        }

        function Ja(b) {
            return function() {
                return this[b]
            }
        }

        function Ib(b, a) {
            return function(c) {
                return v(c) ? this[b] : (this[b] = a(c), this.$$compose(), this)
            }
        }

        function Hc() {
            var b = "",
                a = !1;
            this.hashPrefix = function(a) {
                return s(a) ? (b = a, this) : b
            }, this.html5Mode = function(b) {
                return s(b) ? (a = b, this) : a
            }, this.$get = ["$rootScope", "$browser", "$sniffer", "$rootElement", function(c, d, e, g) {
                function h(a) {
                    c.$broadcast("$locationChangeSuccess", f.absUrl(), a)
                }
                var f, i, j, k = d.url(),
                    l = ua(k);
                a ? (i = d.baseHref() || "/", j = i.substr(0, i.lastIndexOf("/")), l = ka(l.protocol, l.host, l.port) + j + "/", f = e.history ? new fb(Ec(k, i, b), j, l) : new Hb(Fc(k, i, b), b, l, i.substr(j.length + 1))) : (l = ka(l.protocol, l.host, l.port) + (l.path || "") + (l.search ? "?" + l.search : "") + "#" + b + "/", f = new Ia(k, b, l)), g.bind("click", function(a) {
                    if (!a.ctrlKey && !a.metaKey && 2 != a.which) {
                        for (var b = u(a.target);
                            "a" !== C(b[0].nodeName);)
                            if (b[0] === g[0] || !(b = b.parent())[0]) return;
                        var d = b.prop("href"),
                            e = f.$$rewriteAppUrl(d);
                        d && !b.attr("target") && e && (f.$$parse(e), c.$apply(), a.preventDefault(), T.angular["ff-684208-preventDefault"] = !0)
                    }
                }), f.absUrl() != k && d.url(f.absUrl(), !0), d.onUrlChange(function(a) {
                    f.absUrl() != a && (c.$evalAsync(function() {
                        var b = f.absUrl();
                        f.$$parse(a), h(b)
                    }), c.$$phase || c.$digest())
                });
                var n = 0;
                return c.$watch(function() {
                    var a = d.url();
                    return n && a == f.absUrl() || (n++, c.$evalAsync(function() {
                        c.$broadcast("$locationChangeStart", f.absUrl(), a).defaultPrevented ? f.$$parse(a) : (d.url(f.absUrl(), f.$$replace), f.$$replace = !1, h(a))
                    })), n
                }), f
            }]
        }

        function Ic() {
            this.$get = ["$window", function(b) {
                function a(a) {
                    return a instanceof z && (a.stack ? a = a.message && -1 === a.stack.indexOf(a.message) ? "Error: " + a.message + "\n" + a.stack : a.stack : a.sourceURL && (a = a.message + "\n" + a.sourceURL + ":" + a.line)), a
                }

                function c(c) {
                    var e = b.console || {},
                        g = e[c] || e.log || x;
                    return g.apply ? function() {
                        var b = [];
                        return m(arguments, function(c) {
                            b.push(a(c))
                        }), g.apply(e, b)
                    } : function(a, b) {
                        g(a, b)
                    }
                }
                return {
                    log: c("log"),
                    warn: c("warn"),
                    info: c("info"),
                    error: c("error")
                }
            }]
        }

        function Jc(b, a) {
            function c(a) {
                return -1 != a.indexOf(q)
            }

            function d() {
                return o + 1 < b.length ? b.charAt(o + 1) : !1
            }

            function e(a) {
                return a >= "0" && "9" >= a
            }

            function g(a) {
                return " " == a || "\r" == a || "	" == a || "\n" == a || "" == a || "\xa0" == a
            }

            function h(a) {
                return a >= "a" && "z" >= a || a >= "A" && "Z" >= a || "_" == a || "$" == a
            }

            function f(a) {
                return "-" == a || "+" == a || e(a)
            }

            function i(a, c, d) {
                throw d = d || o, z("Lexer Error: " + a + " at column" + (s(c) ? "s " + c + "-" + o + " [" + b.substring(c, d) + "]" : " " + d) + " in expression [" + b + "].")
            }

            function j() {
                for (var a = "", c = o; o < b.length;) {
                    var j = C(b.charAt(o));
                    if ("." == j || e(j)) a += j;
                    else {
                        var g = d();
                        if ("e" == j && f(g)) a += j;
                        else if (f(j) && g && e(g) && "e" == a.charAt(a.length - 1)) a += j;
                        else {
                            if (!f(j) || g && e(g) || "e" != a.charAt(a.length - 1)) break;
                            i("Invalid exponent")
                        }
                    }
                    o++
                }
                a *= 1, n.push({
                    index: c,
                    text: a,
                    json: !0,
                    fn: function() {
                        return a
                    }
                })
            }

            function k() {
                for (var f, j, i, c = "", d = o; o < b.length;) {
                    var k = b.charAt(o);
                    if ("." != k && !h(k) && !e(k)) break;
                    "." == k && (f = o), c += k, o++
                }
                if (f)
                    for (j = o; j < b.length;) {
                        if (k = b.charAt(j), "(" == k) {
                            i = c.substr(f - d + 1), c = c.substr(0, f - d), o = j;
                            break
                        }
                        if (!g(k)) break;
                        j++
                    }
                if (d = {
                        index: d,
                        text: c
                    }, Ka.hasOwnProperty(c)) d.fn = d.json = Ka[c];
                else {
                    var l = Jb(c, a);
                    d.fn = D(function(a, b) {
                        return l(a, b)
                    }, {
                        assign: function(a, b) {
                            return Kb(a, c, b)
                        }
                    })
                }
                n.push(d), i && (n.push({
                    index: f,
                    text: ".",
                    json: !1
                }), n.push({
                    index: f + 1,
                    text: i,
                    json: !1
                }))
            }

            function l(a) {
                var c = o;
                o++;
                for (var d = "", f = a, e = !1; o < b.length;) {
                    var j = b.charAt(o);
                    if (f += j, e) "u" == j ? (j = b.substring(o + 1, o + 5), j.match(/[\da-f]{4}/i) || i("Invalid unicode escape [\\u" + j + "]"), o += 4, d += String.fromCharCode(parseInt(j, 16))) : (e = Kc[j], d += e ? e : j), e = !1;
                    else if ("\\" == j) e = !0;
                    else {
                        if (j == a) return o++, void n.push({
                            index: c,
                            text: f,
                            string: d,
                            json: !0,
                            fn: function() {
                                return d
                            }
                        });
                        d += j
                    }
                    o++
                }
                i("Unterminated quote", c)
            }
            for (var r, q, n = [], o = 0, w = [], t = ":"; o < b.length;) {
                if (q = b.charAt(o), c("\"'")) l(q);
                else if (e(q) || c(".") && e(d())) j();
                else if (h(q)) k(), -1 != "{,".indexOf(t) && "{" == w[0] && (r = n[n.length - 1]) && (r.json = -1 == r.text.indexOf("."));
                else if (c("(){}[].,;:")) n.push({
                    index: o,
                    text: q,
                    json: -1 != ":[,".indexOf(t) && c("{[") || c("}]:,")
                }), c("{[") && w.unshift(q), c("}]") && w.shift(), o++;
                else {
                    if (g(q)) {
                        o++;
                        continue
                    }
                    var m = q + d(),
                        A = Ka[q],
                        y = Ka[m];
                    y ? (n.push({
                        index: o,
                        text: m,
                        fn: y
                    }), o += 2) : A ? (n.push({
                        index: o,
                        text: q,
                        fn: A,
                        json: -1 != "[,:".indexOf(t) && c("+-")
                    }), o += 1) : i("Unexpected next character ", o, o + 1)
                }
                t = q
            }
            return n
        }

        function Lc(b, a, c, d) {
            function e(a, c) {
                throw z("Syntax Error: Token '" + c.text + "' " + a + " at column " + (c.index + 1) + " of the expression [" + b + "] starting at [" + b.substring(c.index) + "].")
            }

            function g() {
                if (0 === N.length) throw z("Unexpected end of expression: " + b);
                return N[0]
            }

            function h(a, b, c, d) {
                if (N.length > 0) {
                    var e = N[0],
                        f = e.text;
                    if (f == a || f == b || f == c || f == d || !a && !b && !c && !d) return e
                }
                return !1
            }

            function f(b, c, d, f) {
                return (b = h(b, c, d, f)) ? (a && !b.json && e("is not valid json", b), N.shift(), b) : !1
            }

            function i(a) {
                f(a) || e("is unexpected, expecting [" + a + "]", h())
            }

            function j(a, b) {
                return function(c, d) {
                    return a(c, d, b)
                }
            }

            function k(a, b, c) {
                return function(d, f) {
                    return b(d, f, a, c)
                }
            }

            function l() {
                for (var a = [];;)
                    if (N.length > 0 && !h("}", ")", ";", "]") && a.push(v()), !f(";")) return 1 == a.length ? a[0] : function(b, c) {
                        for (var d, f = 0; f < a.length; f++) {
                            var e = a[f];
                            e && (d = e(b, c))
                        }
                        return d
                    }
            }

            function n() {
                for (var a = f(), b = c(a.text), d = [];;) {
                    if (!(a = f(":"))) {
                        var e = function(a, c, f) {
                            for (var f = [f], e = 0; e < d.length; e++) f.push(d[e](a, c));
                            return b.apply(a, f)
                        };
                        return function() {
                            return e
                        }
                    }
                    d.push(F())
                }
            }

            function r() {
                for (var b, a = o();;) {
                    if (!(b = f("||"))) return a;
                    a = k(a, b.fn, o())
                }
            }

            function o() {
                var b, a = w();
                return (b = f("&&")) && (a = k(a, b.fn, o())), a
            }

            function w() {
                var b, a = q();
                return (b = f("==", "!=")) && (a = k(a, b.fn, w())), a
            }

            function q() {
                var a;
                a = t();
                for (var b; b = f("+", "-");) a = k(a, b.fn, t());
                return (b = f("<", ">", "<=", ">=")) && (a = k(a, b.fn, q())), a
            }

            function t() {
                for (var b, a = m(); b = f("*", "/", "%");) a = k(a, b.fn, m());
                return a
            }

            function m() {
                var a;
                return f("+") ? A() : (a = f("-")) ? k(V, a.fn, m()) : (a = f("!")) ? j(a.fn, m()) : A()
            }

            function A() {
                var a;
                if (f("(")) a = v(), i(")");
                else if (f("[")) a = y();
                else if (f("{")) a = L();
                else {
                    var b = f();
                    (a = b.fn) || e("not a primary expression", b)
                }
                for (var c; b = f("(", "[", ".");) "(" === b.text ? (a = u(a, c), c = null) : "[" === b.text ? (c = a, a = da(a)) : "." === b.text ? (c = a, a = s(a)) : e("IMPOSSIBLE");
                return a
            }

            function y() {
                var a = [];
                if ("]" != g().text)
                    do a.push(F()); while (f(","));
                return i("]"),
                    function(b, c) {
                        for (var d = [], f = 0; f < a.length; f++) d.push(a[f](b, c));
                        return d
                    }
            }

            function L() {
                var a = [];
                if ("}" != g().text)
                    do {
                        var b = f(),
                            b = b.string || b.text;
                        i(":");
                        var c = F();
                        a.push({
                            key: b,
                            value: c
                        })
                    } while (f(","));
                return i("}"),
                    function(b, c) {
                        for (var d = {}, f = 0; f < a.length; f++) {
                            var e = a[f],
                                j = e.value(b, c);
                            d[e.key] = j
                        }
                        return d
                    }
            }
            var I, V = B(0),
                N = Jc(b, d),
                F = function() {
                    var c, d, a = r();
                    return (d = f("=")) ? (a.assign || e("implies assignment but [" + b.substring(0, d.index) + "] can not be assigned to", d), c = r(), function(b, d) {
                        return a.assign(b, c(b, d), d)
                    }) : a
                },
                u = function(a, b) {
                    var c = [];
                    if (")" != g().text)
                        do c.push(F()); while (f(","));
                    return i(")"),
                        function(d, f) {
                            for (var e = [], j = b ? b(d, f) : d, g = 0; g < c.length; g++) e.push(c[g](d, f));
                            return g = a(d, f) || x, g.apply ? g.apply(j, e) : g(e[0], e[1], e[2], e[3], e[4])
                        }
                },
                s = function(a) {
                    var b = f().text,
                        c = Jb(b, d);
                    return D(function(b, d) {
                        return c(a(b, d), d)
                    }, {
                        assign: function(c, d, f) {
                            return Kb(a(c, f), b, d)
                        }
                    })
                },
                da = function(a) {
                    var b = F();
                    return i("]"), D(function(c, d) {
                        var j, f = a(c, d),
                            e = b(c, d);
                        return f ? ((f = f[e]) && f.then && (j = f, "$$v" in f || (j.$$v = p, j.then(function(a) {
                            j.$$v = a
                        })), f = f.$$v), f) : p
                    }, {
                        assign: function(c, d, f) {
                            return a(c, f)[b(c, f)] = d
                        }
                    })
                },
                v = function() {
                    for (var b, a = F();;) {
                        if (!(b = f("|"))) return a;
                        a = k(a, b.fn, n())
                    }
                };
            return a ? (F = r, u = s = da = v = function() {
                e("is not valid json", {
                    text: b,
                    index: 0
                })
            }, I = A()) : I = l(), 0 !== N.length && e("is an unexpected token", N[0]), I
        }

        function Kb(b, a, c) {
            for (var a = a.split("."), d = 0; a.length > 1; d++) {
                var e = a.shift(),
                    g = b[e];
                g || (g = {}, b[e] = g), b = g
            }
            return b[a.shift()] = c
        }

        function eb(b, a, c) {
            if (!a) return b;
            for (var d, a = a.split("."), e = b, g = a.length, h = 0; g > h; h++) d = a[h], b && (b = (e = b)[d]);
            return !c && M(b) ? Va(e, b) : b
        }

        function Lb(b, a, c, d, e) {
            return function(g, h) {
                var i, f = h && h.hasOwnProperty(b) ? h : g;
                return null === f || f === p ? f : ((f = f[b]) && f.then && ("$$v" in f || (i = f, i.$$v = p, i.then(function(a) {
                    i.$$v = a
                })), f = f.$$v), a && null !== f && f !== p ? ((f = f[a]) && f.then && ("$$v" in f || (i = f, i.$$v = p, i.then(function(a) {
                    i.$$v = a
                })), f = f.$$v), c && null !== f && f !== p ? ((f = f[c]) && f.then && ("$$v" in f || (i = f, i.$$v = p, i.then(function(a) {
                    i.$$v = a
                })), f = f.$$v), d && null !== f && f !== p ? ((f = f[d]) && f.then && ("$$v" in f || (i = f, i.$$v = p, i.then(function(a) {
                    i.$$v = a
                })), f = f.$$v), e && null !== f && f !== p ? ((f = f[e]) && f.then && ("$$v" in f || (i = f, i.$$v = p, i.then(function(a) {
                    i.$$v = a
                })), f = f.$$v), f) : f) : f) : f) : f)
            }
        }

        function Jb(b, a) {
            if (gb.hasOwnProperty(b)) return gb[b];
            var e, c = b.split("."),
                d = c.length;
            if (a) e = 6 > d ? Lb(c[0], c[1], c[2], c[3], c[4]) : function(a, b) {
                var j, e = 0;
                do j = Lb(c[e++], c[e++], c[e++], c[e++], c[e++])(a, b), b = p, a = j; while (d > e);
                return j
            };
            else {
                var g = "var l, fn, p;\n";
                m(c, function(a, b) {
                    g += "if(s === null || s === undefined) return s;\nl=s;\ns=" + (b ? "s" : '((k&&k.hasOwnProperty("' + a + '"))?k:s)') + '["' + a + '"];\nif (s && s.then) {\n if (!("$$v" in s)) {\n p=s;\n p.$$v = undefined;\n p.then(function(v) {p.$$v=v;});\n}\n s=s.$$v\n}\n'
                }), g += "return s;", e = Function("s", "k", g), e.toString = function() {
                    return g
                }
            }
            return gb[b] = e
        }

        function Mc() {
            var b = {};
            this.$get = ["$filter", "$sniffer", function(a, c) {
                return function(d) {
                    switch (typeof d) {
                        case "string":
                            return b.hasOwnProperty(d) ? b[d] : b[d] = Lc(d, !1, a, c.csp);
                        case "function":
                            return d;
                        default:
                            return x
                    }
                }
            }]
        }

        function Nc() {
            this.$get = ["$rootScope", "$exceptionHandler", function(b, a) {
                return Oc(function(a) {
                    b.$evalAsync(a)
                }, a)
            }]
        }

        function Oc(b, a) {
            function c(a) {
                return a
            }

            function d(a) {
                return h(a)
            }
            var e = function() {
                    var i, j, f = [];
                    return j = {
                        resolve: function(a) {
                            if (f) {
                                var c = f;
                                f = p, i = g(a), c.length && b(function() {
                                    for (var a, b = 0, d = c.length; d > b; b++) a = c[b], i.then(a[0], a[1])
                                })
                            }
                        },
                        reject: function(a) {
                            j.resolve(h(a))
                        },
                        promise: {
                            then: function(b, j) {
                                var g = e(),
                                    h = function(d) {
                                        try {
                                            g.resolve((b || c)(d))
                                        } catch (f) {
                                            a(f), g.reject(f)
                                        }
                                    },
                                    o = function(b) {
                                        try {
                                            g.resolve((j || d)(b))
                                        } catch (c) {
                                            a(c), g.reject(c)
                                        }
                                    };
                                return f ? f.push([h, o]) : i.then(h, o), g.promise
                            }
                        }
                    }
                },
                g = function(a) {
                    return a && a.then ? a : {
                        then: function(c) {
                            var d = e();
                            return b(function() {
                                d.resolve(c(a))
                            }), d.promise
                        }
                    }
                },
                h = function(a) {
                    return {
                        then: function(c, j) {
                            var g = e();
                            return b(function() {
                                g.resolve((j || d)(a))
                            }), g.promise
                        }
                    }
                };
            return {
                defer: e,
                reject: h,
                when: function(f, i, j) {
                    var l, k = e(),
                        n = function(b) {
                            try {
                                return (i || c)(b)
                            } catch (d) {
                                return a(d), h(d)
                            }
                        },
                        r = function(b) {
                            try {
                                return (j || d)(b)
                            } catch (c) {
                                return a(c), h(c)
                            }
                        };
                    return b(function() {
                        g(f).then(function(a) {
                            l || (l = !0, k.resolve(g(a).then(n, r)))
                        }, function(a) {
                            l || (l = !0, k.resolve(r(a)))
                        })
                    }), k.promise
                },
                all: function(a) {
                    var b = e(),
                        c = a.length,
                        d = [];
                    return c ? m(a, function(a, e) {
                        g(a).then(function(a) {
                            e in d || (d[e] = a, --c || b.resolve(d))
                        }, function(a) {
                            e in d || b.reject(a)
                        })
                    }) : b.resolve(d), b.promise
                }
            }
        }

        function Pc() {
            var b = {};
            this.when = function(a, c) {
                if (b[a] = D({
                        reloadOnSearch: !0
                    }, c), a) {
                    var d = "/" == a[a.length - 1] ? a.substr(0, a.length - 1) : a + "/";
                    b[d] = {
                        redirectTo: a
                    }
                }
                return this
            }, this.otherwise = function(a) {
                return this.when(null, a), this
            }, this.$get = ["$rootScope", "$location", "$routeParams", "$q", "$injector", "$http", "$templateCache", function(a, c, d, e, g, h, f) {
                function i() {
                    var b = j(),
                        i = r.current;
                    b && i && b.$route === i.$route && fa(b.pathParams, i.pathParams) && !b.reloadOnSearch && !n ? (i.params = b.params, U(i.params, d), a.$broadcast("$routeUpdate", i)) : (b || i) && (n = !1, a.$broadcast("$routeChangeStart", b, i), (r.current = b) && b.redirectTo && (G(b.redirectTo) ? c.path(k(b.redirectTo, b.params)).search(b.params).replace() : c.url(b.redirectTo(b.pathParams, c.path(), c.search())).replace()), e.when(b).then(function() {
                        if (b) {
                            var d, a = [],
                                c = [];
                            return m(b.resolve || {}, function(b, d) {
                                a.push(d), c.push(M(b) ? g.invoke(b) : g.get(b))
                            }), s(d = b.template) || s(d = b.templateUrl) && (d = h.get(d, {
                                cache: f
                            }).then(function(a) {
                                return a.data
                            })), s(d) && (a.push("$template"), c.push(d)), e.all(c).then(function(b) {
                                var c = {};
                                return m(b, function(b, d) {
                                    c[a[d]] = b
                                }), c
                            })
                        }
                    }).then(function(c) {
                        b == r.current && (b && (b.locals = c, U(b.params, d)), a.$broadcast("$routeChangeSuccess", b, i))
                    }, function(c) {
                        b == r.current && a.$broadcast("$routeChangeError", b, i, c)
                    }))
                }

                function j() {
                    var a, d;
                    return m(b, function(b, e) {
                        !d && (a = l(c.path(), e)) && (d = xa(b, {
                            params: D({}, c.search(), a),
                            pathParams: a
                        }), d.$route = b)
                    }), d || b[null] && xa(b[null], {
                        params: {},
                        pathParams: {}
                    })
                }

                function k(a, b) {
                    var c = [];
                    return m((a || "").split(":"), function(a, d) {
                        if (0 == d) c.push(a);
                        else {
                            var e = a.match(/(\w+)(.*)/),
                                f = e[1];
                            c.push(b[f]), c.push(e[2] || ""), delete b[f]
                        }
                    }), c.join("")
                }
                var l = function(a, b) {
                        var c = "^" + b.replace(/([\.\\\(\)\^\$])/g, "\\$1") + "$",
                            d = [],
                            e = {};
                        m(b.split(/\W/), function(a) {
                            if (a) {
                                var b = RegExp(":" + a + "([\\W])");
                                c.match(b) && (c = c.replace(b, "([^\\/]*)$1"), d.push(a))
                            }
                        });
                        var f = a.match(RegExp(c));
                        return f && m(d, function(a, b) {
                            e[a] = f[b + 1]
                        }), f ? e : null
                    },
                    n = !1,
                    r = {
                        routes: b,
                        reload: function() {
                            n = !0, a.$evalAsync(i)
                        }
                    };
                return a.$on("$locationChangeSuccess", i), r
            }]
        }

        function Qc() {
            this.$get = B({})
        }

        function Rc() {
            var b = 10;
            this.digestTtl = function(a) {
                return arguments.length && (b = a), b
            }, this.$get = ["$injector", "$exceptionHandler", "$parse", function(a, c, d) {
                function e() {
                    this.$id = wa(), this.$$phase = this.$parent = this.$$watchers = this.$$nextSibling = this.$$prevSibling = this.$$childHead = this.$$childTail = null, this["this"] = this.$root = this, this.$$asyncQueue = [], this.$$listeners = {}
                }

                function g(a) {
                    if (i.$$phase) throw z(i.$$phase + " already in progress");
                    i.$$phase = a
                }

                function h(a, b) {
                    var c = d(a);
                    return qa(c, b), c
                }

                function f() {}
                e.prototype = {
                    $new: function(a) {
                        if (M(a)) throw z("API-CHANGE: Use $controller to instantiate controllers.");
                        return a ? (a = new e, a.$root = this.$root) : (a = function() {}, a.prototype = this, a = new a, a.$id = wa()), a["this"] = a, a.$$listeners = {}, a.$parent = this, a.$$asyncQueue = [], a.$$watchers = a.$$nextSibling = a.$$childHead = a.$$childTail = null, a.$$prevSibling = this.$$childTail, this.$$childHead ? this.$$childTail = this.$$childTail.$$nextSibling = a : this.$$childHead = this.$$childTail = a, a
                    },
                    $watch: function(a, b, c) {
                        var d = h(a, "watch"),
                            e = this.$$watchers,
                            g = {
                                fn: b,
                                last: f,
                                get: d,
                                exp: a,
                                eq: !!c
                            };
                        if (!M(b)) {
                            var i = h(b || x, "listener");
                            g.fn = function(a, b, c) {
                                i(c)
                            }
                        }
                        return e || (e = this.$$watchers = []), e.unshift(g),
                            function() {
                                za(e, g)
                            }
                    },
                    $digest: function() {
                        var a, d, e, h, r, o, m, t, A, y, q = b,
                            p = [];
                        g("$digest");
                        do {
                            m = !1, t = this;
                            do {
                                for (r = t.$$asyncQueue; r.length;) try {
                                    t.$eval(r.shift())
                                } catch (L) {
                                    c(L)
                                }
                                if (h = t.$$watchers)
                                    for (o = h.length; o--;) try {
                                        a = h[o], (d = a.get(t)) === (e = a.last) || (a.eq ? fa(d, e) : "number" == typeof d && "number" == typeof e && isNaN(d) && isNaN(e)) || (m = !0, a.last = a.eq ? U(d) : d, a.fn(d, e === f ? d : e, t), 5 > q && (A = 4 - q, p[A] || (p[A] = []), y = M(a.exp) ? "fn: " + (a.exp.name || a.exp.toString()) : a.exp, y += "; newVal: " + ba(d) + "; oldVal: " + ba(e), p[A].push(y)))
                                    } catch (V) {
                                        c(V)
                                    }
                                if (!(h = t.$$childHead || t !== this && t.$$nextSibling))
                                    for (; t !== this && !(h = t.$$nextSibling);) t = t.$parent
                            } while (t = h);
                            if (m && !q--) throw i.$$phase = null, z(b + " $digest() iterations reached. Aborting!\nWatchers fired in the last 5 iterations: " + ba(p))
                        } while (m || r.length);
                        i.$$phase = null
                    },
                    $destroy: function() {
                        if (i != this) {
                            var a = this.$parent;
                            this.$broadcast("$destroy"), a.$$childHead == this && (a.$$childHead = this.$$nextSibling), a.$$childTail == this && (a.$$childTail = this.$$prevSibling), this.$$prevSibling && (this.$$prevSibling.$$nextSibling = this.$$nextSibling), this.$$nextSibling && (this.$$nextSibling.$$prevSibling = this.$$prevSibling)
                        }
                    },
                    $eval: function(a, b) {
                        return d(a)(this, b)
                    },
                    $evalAsync: function(a) {
                        this.$$asyncQueue.push(a)
                    },
                    $apply: function(a) {
                        try {
                            return g("$apply"), this.$eval(a)
                        } catch (b) {
                            c(b)
                        } finally {
                            i.$$phase = null;
                            try {
                                i.$digest()
                            } catch (d) {
                                throw c(d), d
                            }
                        }
                    },
                    $on: function(a, b) {
                        var c = this.$$listeners[a];
                        return c || (this.$$listeners[a] = c = []), c.push(b),
                            function() {
                                za(c, b)
                            }
                    },
                    $emit: function(a) {
                        var e, m, p, d = [],
                            f = this,
                            g = !1,
                            i = {
                                name: a,
                                targetScope: f,
                                stopPropagation: function() {
                                    g = !0
                                },
                                preventDefault: function() {
                                    i.defaultPrevented = !0
                                },
                                defaultPrevented: !1
                            },
                            h = [i].concat(ga.call(arguments, 1));
                        do {
                            for (e = f.$$listeners[a] || d, i.currentScope = f, m = 0, p = e.length; p > m; m++) try {
                                if (e[m].apply(null, h), g) return i
                            } catch (A) {
                                c(A)
                            }
                            f = f.$parent
                        } while (f);
                        return i
                    },
                    $broadcast: function(a) {
                        var d = this,
                            e = this,
                            f = {
                                name: a,
                                targetScope: this,
                                preventDefault: function() {
                                    f.defaultPrevented = !0
                                },
                                defaultPrevented: !1
                            },
                            g = [f].concat(ga.call(arguments, 1));
                        do
                            if (d = e, f.currentScope = d, m(d.$$listeners[a], function(a) {
                                    try {
                                        a.apply(null, g)
                                    } catch (b) {
                                        c(b)
                                    }
                                }), !(e = d.$$childHead || d !== this && d.$$nextSibling))
                                for (; d !== this && !(e = d.$$nextSibling);) d = d.$parent;
                        while (d = e);
                        return f
                    }
                };
                var i = new e;
                return i
            }]
        }

        function Sc() {
            this.$get = ["$window", function(b) {
                var a = {},
                    c = H((/android (\d+)/.exec(C(b.navigator.userAgent)) || [])[1]);
                return {
                    history: !(!b.history || !b.history.pushState || 4 > c),
                    hashchange: "onhashchange" in b && (!b.document.documentMode || b.document.documentMode > 7),
                    hasEvent: function(c) {
                        if ("input" == c && 9 == Z) return !1;
                        if (v(a[c])) {
                            var e = b.document.createElement("div");
                            a[c] = "on" + c in e
                        }
                        return a[c]
                    },
                    csp: !1
                }
            }]
        }

        function Tc() {
            this.$get = B(T)
        }

        function Mb(b) {
            var c, d, e, a = {};
            return b ? (m(b.split("\n"), function(b) {
                e = b.indexOf(":"), c = C(Q(b.substr(0, e))), d = Q(b.substr(e + 1)), c && (a[c] ? a[c] += ", " + d : a[c] = d)
            }), a) : a
        }

        function Nb(b) {
            var a = J(b) ? b : p;
            return function(c) {
                return a || (a = Mb(b)), c ? a[C(c)] || null : a
            }
        }

        function Ob(b, a, c) {
            return M(c) ? c(b, a) : (m(c, function(c) {
                b = c(b, a)
            }), b)
        }

        function Uc() {
            var b = /^\s*(\[|\{[^\{])/,
                a = /[\}\]]\s*$/,
                c = /^\)\]\}',?\n/,
                d = this.defaults = {
                    transformResponse: [function(d) {
                        return G(d) && (d = d.replace(c, ""), b.test(d) && a.test(d) && (d = mb(d, !0))), d
                    }],
                    transformRequest: [function(a) {
                        return J(a) && "[object File]" !== Sa.apply(a) ? ba(a) : a
                    }],
                    headers: {
                        common: {
                            Accept: "application/json, text/plain, */*",
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        post: {
                            "Content-Type": "application/json;charset=utf-8"
                        },
                        put: {
                            "Content-Type": "application/json;charset=utf-8"
                        }
                    }
                },
                e = this.responseInterceptors = [];
            this.$get = ["$httpBackend", "$browser", "$cacheFactory", "$rootScope", "$q", "$injector", function(a, b, c, i, j, k) {
                function l(a) {
                    function c(a) {
                        var b = D({}, a, {
                            data: Ob(a.data, a.headers, f)
                        });
                        return 200 <= a.status && a.status < 300 ? b : j.reject(b)
                    }
                    a.method = la(a.method);
                    var i, e = a.transformRequest || d.transformRequest,
                        f = a.transformResponse || d.transformResponse,
                        g = d.headers,
                        g = D({
                            "X-XSRF-TOKEN": b.cookies()["XSRF-TOKEN"]
                        }, g.common, g[C(a.method)], a.headers),
                        e = Ob(a.data, Nb(g), e);
                    return v(a.data) && delete g["Content-Type"], i = n(a, e, g), i = i.then(c, c), m(w, function(a) {
                        i = a(i)
                    }), i.success = function(b) {
                        return i.then(function(c) {
                            b(c.data, c.status, c.headers, a)
                        }), i
                    }, i.error = function(b) {
                        return i.then(null, function(c) {
                            b(c.data, c.status, c.headers, a)
                        }), i
                    }, i
                }

                function n(b, c, d) {
                    function e(a, b, c) {
                        m && (a >= 200 && 300 > a ? m.put(w, [a, b, Mb(c)]) : m.remove(w)), f(b, a, c), i.$apply()
                    }

                    function f(a, c, d) {
                        c = Math.max(c, 0), (c >= 200 && 300 > c ? n.resolve : n.reject)({
                            data: a,
                            status: c,
                            headers: Nb(d),
                            config: b
                        })
                    }

                    function h() {
                        var a = Ua(l.pendingRequests, b); - 1 !== a && l.pendingRequests.splice(a, 1)
                    }
                    var m, p, n = j.defer(),
                        k = n.promise,
                        w = r(b.url, b.params);
                    if (l.pendingRequests.push(b), k.then(h, h), b.cache && "GET" == b.method && (m = J(b.cache) ? b.cache : o), m)
                        if (p = m.get(w)) {
                            if (p.then) return p.then(h, h), p;
                            K(p) ? f(p[1], p[0], U(p[2])) : f(p, 200, {})
                        } else m.put(w, k);
                    return p || a(b.method, w, c, e, d, b.timeout, b.withCredentials), k
                }

                function r(a, b) {
                    if (!b) return a;
                    var c = [];
                    return dc(b, function(a, b) {
                        null == a || a == p || (J(a) && (a = ba(a)), c.push(encodeURIComponent(b) + "=" + encodeURIComponent(a)))
                    }), a + (-1 == a.indexOf("?") ? "?" : "&") + c.join("&")
                }
                var o = c("$http"),
                    w = [];
                return m(e, function(a) {
                        w.push(G(a) ? k.get(a) : k.invoke(a))
                    }), l.pendingRequests = [],
                    function() {
                        m(arguments, function(a) {
                            l[a] = function(b, c) {
                                return l(D(c || {}, {
                                    method: a,
                                    url: b
                                }))
                            }
                        })
                    }("get", "delete", "head", "jsonp"),
                    function() {
                        m(arguments, function(a) {
                            l[a] = function(b, c, d) {
                                return l(D(d || {}, {
                                    method: a,
                                    url: b,
                                    data: c
                                }))
                            }
                        })
                    }("post", "put"), l.defaults = d, l
            }]
        }

        function Vc() {
            this.$get = ["$browser", "$window", "$document", function(b, a, c) {
                return Wc(b, Xc, b.defer, a.angular.callbacks, c[0], a.location.protocol.replace(":", ""))
            }]
        }

        function Wc(b, a, c, d, e, g) {
            function h(a, b) {
                var c = e.createElement("script"),
                    d = function() {
                        e.body.removeChild(c), b && b()
                    };
                c.type = "text/javascript", c.src = a, Z ? c.onreadystatechange = function() {
                    /loaded|complete/.test(c.readyState) && d()
                } : c.onload = c.onerror = d, e.body.appendChild(c)
            }
            return function(e, i, j, k, l, n, r) {
                function o(a, c, d, e) {
                    c = "file" == (i.match(Fb) || ["", g])[1] ? d ? 200 : 404 : c, a(1223 == c ? 204 : c, d, e), b.$$completeOutstandingRequest(x)
                }
                if (b.$$incOutstandingRequestCount(), i = i || b.url(), "jsonp" == C(e)) {
                    var p = "_" + (d.counter++).toString(36);
                    d[p] = function(a) {
                        d[p].data = a
                    }, h(i.replace("JSON_CALLBACK", "angular.callbacks." + p), function() {
                        d[p].data ? o(k, 200, d[p].data) : o(k, -2), delete d[p]
                    })
                } else {
                    var q = new a;
                    q.open(e, i, !0), m(l, function(a, b) {
                        a && q.setRequestHeader(b, a)
                    });
                    var t;
                    q.onreadystatechange = function() {
                        4 == q.readyState && o(k, t || q.status, q.responseText, q.getAllResponseHeaders())
                    }, r && (q.withCredentials = !0), q.send(j || ""), n > 0 && c(function() {
                        t = -1, q.abort()
                    }, n)
                }
            }
        }

        function Yc() {
            this.$get = function() {
                return {
                    id: "en-us",
                    NUMBER_FORMATS: {
                        DECIMAL_SEP: ".",
                        GROUP_SEP: ",",
                        PATTERNS: [{
                            minInt: 1,
                            minFrac: 0,
                            maxFrac: 3,
                            posPre: "",
                            posSuf: "",
                            negPre: "-",
                            negSuf: "",
                            gSize: 3,
                            lgSize: 3
                        }, {
                            minInt: 1,
                            minFrac: 2,
                            maxFrac: 2,
                            posPre: "\xa4",
                            posSuf: "",
                            negPre: "(\xa4",
                            negSuf: ")",
                            gSize: 3,
                            lgSize: 3
                        }],
                        CURRENCY_SYM: "$"
                    },
                    DATETIME_FORMATS: {
                        MONTH: "January,February,March,April,May,June,July,August,September,October,November,December".split(","),
                        SHORTMONTH: "Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec".split(","),
                        DAY: "Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday".split(","),
                        SHORTDAY: "Sun,Mon,Tue,Wed,Thu,Fri,Sat".split(","),
                        AMPMS: ["AM", "PM"],
                        medium: "MMM d, y h:mm:ss a",
                        "short": "M/d/yy h:mm a",
                        fullDate: "EEEE, MMMM d, y",
                        longDate: "MMMM d, y",
                        mediumDate: "MMM d, y",
                        shortDate: "M/d/yy",
                        mediumTime: "h:mm:ss a",
                        shortTime: "h:mm a"
                    },
                    pluralCat: function(b) {
                        return 1 === b ? "one" : "other"
                    }
                }
            }
        }

        function Zc() {
            this.$get = ["$rootScope", "$browser", "$q", "$exceptionHandler", function(b, a, c, d) {
                function e(e, f, i) {
                    var j = c.defer(),
                        k = j.promise,
                        l = s(i) && !i,
                        f = a.defer(function() {
                            try {
                                j.resolve(e())
                            } catch (a) {
                                j.reject(a), d(a)
                            }
                            l || b.$apply()
                        }, f),
                        i = function() {
                            delete g[k.$$timeoutId]
                        };
                    return k.$$timeoutId = f, g[f] = j, k.then(i, i), k
                }
                var g = {};
                return e.cancel = function(b) {
                    return b && b.$$timeoutId in g ? (g[b.$$timeoutId].reject("canceled"), a.defer.cancel(b.$$timeoutId)) : !1
                }, e
            }]
        }

        function Pb(b) {
            function a(a, e) {
                return b.factory(a + c, e)
            }
            var c = "Filter";
            this.register = a, this.$get = ["$injector", function(a) {
                return function(b) {
                    return a.get(b + c)
                }
            }], a("currency", Qb), a("date", Rb), a("filter", $c), a("json", ad), a("limitTo", bd), a("lowercase", cd), a("number", Sb), a("orderBy", Tb), a("uppercase", dd)
        }

        function $c() {
            return function(b, a) {
                if (!(b instanceof Array)) return b;
                var c = [];
                c.check = function(a) {
                    for (var b = 0; b < c.length; b++)
                        if (!c[b](a)) return !1;
                    return !0
                };
                var d = function(a, b) {
                    if ("!" === b.charAt(0)) return !d(a, b.substr(1));
                    switch (typeof a) {
                        case "boolean":
                        case "number":
                        case "string":
                            return ("" + a).toLowerCase().indexOf(b) > -1;
                        case "object":
                            for (var c in a)
                                if ("$" !== c.charAt(0) && d(a[c], b)) return !0;
                            return !1;
                        case "array":
                            for (c = 0; c < a.length; c++)
                                if (d(a[c], b)) return !0;
                            return !1;
                        default:
                            return !1
                    }
                };
                switch (typeof a) {
                    case "boolean":
                    case "number":
                    case "string":
                        a = {
                            $: a
                        };
                    case "object":
                        for (var e in a) "$" == e ? function() {
                            var b = ("" + a[e]).toLowerCase();
                            b && c.push(function(a) {
                                return d(a, b)
                            })
                        }() : function() {
                            var b = e,
                                f = ("" + a[e]).toLowerCase();
                            f && c.push(function(a) {
                                return d(eb(a, b), f)
                            })
                        }();
                        break;
                    case "function":
                        c.push(a);
                        break;
                    default:
                        return b
                }
                for (var g = [], h = 0; h < b.length; h++) {
                    var f = b[h];
                    c.check(f) && g.push(f)
                }
                return g
            }
        }

        function Qb(b) {
            var a = b.NUMBER_FORMATS;
            return function(b, d) {
                return v(d) && (d = a.CURRENCY_SYM), Ub(b, a.PATTERNS[1], a.GROUP_SEP, a.DECIMAL_SEP, 2).replace(/\u00A4/g, d)
            }
        }

        function Sb(b) {
            var a = b.NUMBER_FORMATS;
            return function(b, d) {
                return Ub(b, a.PATTERNS[0], a.GROUP_SEP, a.DECIMAL_SEP, d)
            }
        }

        function Ub(b, a, c, d, e) {
            if (isNaN(b) || !isFinite(b)) return "";
            var g = 0 > b,
                b = Math.abs(b),
                h = b + "",
                f = "",
                i = [];
            if (-1 !== h.indexOf("e")) f = h;
            else {
                h = (h.split(Vb)[1] || "").length, v(e) && (e = Math.min(Math.max(a.minFrac, h), a.maxFrac));
                var h = Math.pow(10, e),
                    b = Math.round(b * h) / h,
                    b = ("" + b).split(Vb),
                    h = b[0],
                    b = b[1] || "",
                    j = 0,
                    k = a.lgSize,
                    l = a.gSize;
                if (h.length >= k + l)
                    for (var j = h.length - k, n = 0; j > n; n++)(j - n) % l === 0 && 0 !== n && (f += c), f += h.charAt(n);
                for (n = j; n < h.length; n++)(h.length - n) % k === 0 && 0 !== n && (f += c), f += h.charAt(n);
                for (; b.length < e;) b += "0";
                e && (f += d + b.substr(0, e))
            }
            return i.push(g ? a.negPre : a.posPre), i.push(f), i.push(g ? a.negSuf : a.posSuf), i.join("")
        }

        function hb(b, a, c) {
            var d = "";
            for (0 > b && (d = "-", b = -b), b = "" + b; b.length < a;) b = "0" + b;
            return c && (b = b.substr(b.length - a)), d + b
        }

        function O(b, a, c, d) {
            return function(e) {
                return e = e["get" + b](), (c > 0 || e > -c) && (e += c), 0 === e && -12 == c && (e = 12), hb(e, a, d)
            }
        }

        function La(b, a) {
            return function(c, d) {
                var e = c["get" + b](),
                    g = la(a ? "SHORT" + b : b);
                return d[g][e]
            }
        }

        function Rb(b) {
            function a(a) {
                var b;
                if (b = a.match(c)) {
                    var a = new Date(0),
                        g = 0,
                        h = 0;
                    b[9] && (g = H(b[9] + b[10]), h = H(b[9] + b[11])), a.setUTCFullYear(H(b[1]), H(b[2]) - 1, H(b[3])), a.setUTCHours(H(b[4] || 0) - g, H(b[5] || 0) - h, H(b[6] || 0), H(b[7] || 0))
                }
                return a
            }
            var c = /^(\d{4})-?(\d\d)-?(\d\d)(?:T(\d\d)(?::?(\d\d)(?::?(\d\d)(?:\.(\d{3}))?)?)?(Z|([+-])(\d\d):?(\d\d)))?$/;
            return function(c, e) {
                var f, i, g = "",
                    h = [],
                    e = e || "mediumDate",
                    e = b.DATETIME_FORMATS[e] || e;
                if (G(c) && (c = ed.test(c) ? H(c) : a(c)), va(c) && (c = new Date(c)), !ma(c)) return c;
                for (; e;)(i = fd.exec(e)) ? (h = h.concat(ga.call(i, 1)), e = h.pop()) : (h.push(e), e = null);
                return m(h, function(a) {
                    f = gd[a], g += f ? f(c, b.DATETIME_FORMATS) : a.replace(/(^'|'$)/g, "").replace(/''/g, "'")
                }), g
            }
        }

        function ad() {
            return function(b) {
                return ba(b, !0)
            }
        }

        function bd() {
            return function(b, a) {
                if (!(b instanceof Array)) return b;
                var d, e, a = H(a),
                    c = [];
                if (!(b && b instanceof Array)) return c;
                for (a > b.length ? a = b.length : a < -b.length && (a = -b.length), a > 0 ? (d = 0, e = a) : (d = b.length + a, e = b.length); e > d; d++) c.push(b[d]);
                return c
            }
        }

        function Tb(b) {
            return function(a, c, d) {
                function e(a, b) {
                    return Wa(b) ? function(b, c) {
                        return a(c, b)
                    } : a
                }
                if (!(a instanceof Array)) return a;
                if (!c) return a;
                for (var c = K(c) ? c : [c], c = Ta(c, function(a) {
                        var c = !1,
                            d = a || ya;
                        return G(a) && (("+" == a.charAt(0) || "-" == a.charAt(0)) && (c = "-" == a.charAt(0), a = a.substring(1)), d = b(a)), e(function(a, b) {
                            var c;
                            c = d(a);
                            var e = d(b),
                                f = typeof c,
                                g = typeof e;
                            return f == g ? ("string" == f && (c = c.toLowerCase()), "string" == f && (e = e.toLowerCase()), c = c === e ? 0 : e > c ? -1 : 1) : c = g > f ? -1 : 1, c
                        }, c)
                    }), g = [], h = 0; h < a.length; h++) g.push(a[h]);
                return g.sort(e(function(a, b) {
                    for (var d = 0; d < c.length; d++) {
                        var e = c[d](a, b);
                        if (0 !== e) return e
                    }
                    return 0
                }, d))
            }
        }

        function R(b) {
            return M(b) && (b = {
                link: b
            }), b.restrict = b.restrict || "AC", B(b)
        }

        function Wb(b, a) {
            function c(a, c) {
                c = c ? "-" + $a(c, "-") : "", b.removeClass((a ? Ma : Na) + c).addClass((a ? Na : Ma) + c)
            }
            var d = this,
                e = b.parent().controller("form") || Oa,
                g = 0,
                h = d.$error = {};
            d.$name = a.name, d.$dirty = !1, d.$pristine = !0, d.$valid = !0, d.$invalid = !1, e.$addControl(d), b.addClass(Pa), c(!0), d.$addControl = function(a) {
                a.$name && !d.hasOwnProperty(a.$name) && (d[a.$name] = a)
            }, d.$removeControl = function(a) {
                a.$name && d[a.$name] === a && delete d[a.$name], m(h, function(b, c) {
                    d.$setValidity(c, !0, a)
                })
            }, d.$setValidity = function(a, b, j) {
                var k = h[a];
                if (b) k && (za(k, j), !k.length) && (g--, g || (c(b), d.$valid = !0, d.$invalid = !1), h[a] = !1, c(!0, a), e.$setValidity(a, !0, d));
                else {
                    if (g || c(b), k) {
                        if (-1 != Ua(k, j)) return
                    } else h[a] = k = [], g++, c(!1, a), e.$setValidity(a, !1, d);
                    k.push(j), d.$valid = !1, d.$invalid = !0
                }
            }, d.$setDirty = function() {
                b.removeClass(Pa).addClass(Xb), d.$dirty = !0, d.$pristine = !1
            }
        }

        function S(b) {
            return v(b) || "" === b || null === b || b !== b
        }

        function Qa(b, a, c, d, e, g) {
            var h = function() {
                var c = Q(a.val());
                d.$viewValue !== c && b.$apply(function() {
                    d.$setViewValue(c)
                })
            };
            if (e.hasEvent("input")) a.bind("input", h);
            else {
                var f;
                a.bind("keydown", function(a) {
                    a = a.keyCode, 91 === a || a > 15 && 19 > a || a >= 37 && 40 >= a || f || (f = g.defer(function() {
                        h(), f = null
                    }))
                }), a.bind("change", h)
            }
            d.$render = function() {
                a.val(S(d.$viewValue) ? "" : d.$viewValue)
            };
            var i = c.ngPattern,
                j = function(a, b) {
                    return S(b) || a.test(b) ? (d.$setValidity("pattern", !0), b) : (d.$setValidity("pattern", !1), p)
                };
            if (i && (i.match(/^\/(.*)\/$/) ? (i = RegExp(i.substr(1, i.length - 2)), e = function(a) {
                    return j(i, a)
                }) : e = function(a) {
                    var c = b.$eval(i);
                    if (!c || !c.test) throw new z("Expected " + i + " to be a RegExp but was " + c);
                    return j(c, a)
                }, d.$formatters.push(e), d.$parsers.push(e)), c.ngMinlength) {
                var k = H(c.ngMinlength),
                    e = function(a) {
                        return !S(a) && a.length < k ? (d.$setValidity("minlength", !1), p) : (d.$setValidity("minlength", !0), a)
                    };
                d.$parsers.push(e), d.$formatters.push(e)
            }
            if (c.ngMaxlength) {
                var l = H(c.ngMaxlength),
                    c = function(a) {
                        return !S(a) && a.length > l ? (d.$setValidity("maxlength", !1), p) : (d.$setValidity("maxlength", !0), a)
                    };
                d.$parsers.push(c), d.$formatters.push(c)
            }
        }

        function ib(b, a) {
            return b = "ngClass" + b, R(function(c, d, e) {
                c.$watch(e[b], function(b, e) {
                    (a === !0 || c.$index % 2 === a) && (e && b !== e && (J(e) && !K(e) && (e = Ta(e, function(a, b) {
                        return a ? b : void 0
                    })), d.removeClass(K(e) ? e.join(" ") : e)), J(b) && !K(b) && (b = Ta(b, function(a, b) {
                        return a ? b : void 0
                    })), b && d.addClass(K(b) ? b.join(" ") : b))
                }, !0)
            })
        }
        var u, ha, sa, Cb, C = function(b) {
                return G(b) ? b.toLowerCase() : b
            },
            la = function(b) {
                return G(b) ? b.toUpperCase() : b
            },
            z = T.Error,
            Z = H((/msie (\d+)/.exec(C(navigator.userAgent)) || [])[1]),
            ga = [].slice,
            Ra = [].push,
            Sa = Object.prototype.toString,
            Yb = T.angular || (T.angular = {}),
            Y = ["0", "0", "0"];
        x.$inject = [], ya.$inject = [], Cb = 9 > Z ? function(b) {
            return b = b.nodeName ? b : b[0], b.scopeName && "HTML" != b.scopeName ? la(b.scopeName + ":" + b.nodeName) : b.nodeName
        } : function(b) {
            return b.nodeName ? b.nodeName : b[0].nodeName
        };
        var jc = /[A-Z]/g,
            hd = {
                full: "1.0.1",
                major: 1,
                minor: 0,
                dot: 1,
                codeName: "thorium-shielding"
            },
            Ba = P.cache = {},
            Aa = P.expando = "ng-" + (new Date).getTime(),
            nc = 1,
            id = T.document.addEventListener ? function(b, a, c) {
                b.addEventListener(a, c, !1)
            } : function(b, a, c) {
                b.attachEvent("on" + a, c)
            },
            tb = T.document.removeEventListener ? function(b, a, c) {
                b.removeEventListener(a, c, !1)
            } : function(b, a, c) {
                b.detachEvent("on" + a, c)
            },
            lc = /([\:\-\_]+(.))/g,
            mc = /^moz([A-Z])/,
            ta = P.prototype = {
                ready: function(b) {
                    function a() {
                        c || (c = !0, b())
                    }
                    var c = !1;
                    this.bind("DOMContentLoaded", a), P(T).bind("load", a)
                },
                toString: function() {
                    var b = [];
                    return m(this, function(a) {
                        b.push("" + a)
                    }), "[" + b.join(", ") + "]"
                },
                eq: function(b) {
                    return u(b >= 0 ? this[b] : this[this.length + b])
                },
                length: 0,
                push: Ra,
                sort: [].sort,
                splice: [].splice
            },
            Ea = {};
        m("multiple,selected,checked,disabled,readOnly,required".split(","), function(b) {
            Ea[C(b)] = b
        });
        var zb = {};
        m("input,select,option,textarea,button,form".split(","), function(b) {
            zb[la(b)] = !0
        }), m({
            data: ub,
            inheritedData: Da,
            scope: function(b) {
                return Da(b, "$scope")
            },
            controller: xb,
            injector: function(b) {
                return Da(b, "$injector")
            },
            removeAttr: function(b, a) {
                b.removeAttribute(a)
            },
            hasClass: Ca,
            css: function(b, a, c) {
                if (a = qb(a), !s(c)) {
                    var d;
                    return 8 >= Z && (d = b.currentStyle && b.currentStyle[a], "" === d && (d = "auto")), d = d || b.style[a], 8 >= Z && (d = "" === d ? p : d), d
                }
                b.style[a] = c
            },
            attr: function(b, a, c) {
                var d = C(a);
                if (Ea[d]) {
                    if (!s(c)) return b[a] || (b.attributes.getNamedItem(a) || x).specified ? d : p;
                    c ? (b[a] = !0, b.setAttribute(a, d)) : (b[a] = !1, b.removeAttribute(d))
                } else if (s(c)) b.setAttribute(a, c);
                else if (b.getAttribute) return b = b.getAttribute(a, 2), null === b ? p : b
            },
            prop: function(b, a, c) {
                return s(c) ? void(b[a] = c) : b[a]
            },
            text: D(9 > Z ? function(b, a) {
                if (1 == b.nodeType) {
                    if (v(a)) return b.innerText;
                    b.innerText = a
                } else {
                    if (v(a)) return b.nodeValue;
                    b.nodeValue = a
                }
            } : function(b, a) {
                return v(a) ? b.textContent : void(b.textContent = a)
            }, {
                $dv: ""
            }),
            val: function(b, a) {
                return v(a) ? b.value : void(b.value = a)
            },
            html: function(b, a) {
                if (v(a)) return b.innerHTML;
                for (var c = 0, d = b.childNodes; c < d.length; c++) ra(d[c]);
                b.innerHTML = a
            }
        }, function(b, a) {
            P.prototype[a] = function(a, d) {
                var e, g;
                if ((2 == b.length && b !== Ca && b !== xb ? a : d) !== p) {
                    for (e = 0; e < this.length; e++) b(this[e], a, d);
                    return this
                }
                if (J(a)) {
                    for (e = 0; e < this.length; e++)
                        if (b === ub) b(this[e], a);
                        else
                            for (g in a) b(this[e], g, a[g]);
                    return this
                }
                return this.length ? b(this[0], a, d) : b.$dv
            }
        }), m({
            removeData: rb,
            dealoc: ra,
            bind: function a(c, d, e) {
                var g = ca(c, "events"),
                    h = ca(c, "handle");
                g || ca(c, "events", g = {}), h || ca(c, "handle", h = oc(c, g)), m(d.split(" "), function(d) {
                    var i = g[d];
                    if (!i) {
                        if ("mouseenter" == d || "mouseleave" == d) {
                            var j = 0;
                            g.mouseenter = [], g.mouseleave = [], a(c, "mouseover", function(a) {
                                j++, 1 == j && h(a, "mouseenter")
                            }), a(c, "mouseout", function(a) {
                                j--, 0 == j && h(a, "mouseleave")
                            })
                        } else id(c, d, h), g[d] = [];
                        i = g[d]
                    }
                    i.push(e)
                })
            },
            unbind: sb,
            replaceWith: function(a, c) {
                var d, e = a.parentNode;
                ra(a), m(new P(c), function(c) {
                    d ? e.insertBefore(c, d.nextSibling) : e.replaceChild(c, a), d = c
                })
            },
            children: function(a) {
                var c = [];
                return m(a.childNodes, function(a) {
                    "#text" != a.nodeName && c.push(a)
                }), c
            },
            contents: function(a) {
                return a.childNodes
            },
            append: function(a, c) {
                m(new P(c), function(c) {
                    1 === a.nodeType && a.appendChild(c)
                })
            },
            prepend: function(a, c) {
                if (1 === a.nodeType) {
                    var d = a.firstChild;
                    m(new P(c), function(c) {
                        d ? a.insertBefore(c, d) : (a.appendChild(c), d = c)
                    })
                }
            },
            wrap: function(a, c) {
                var c = u(c)[0],
                    d = a.parentNode;
                d && d.replaceChild(c, a), c.appendChild(a)
            },
            remove: function(a) {
                ra(a);
                var c = a.parentNode;
                c && c.removeChild(a)
            },
            after: function(a, c) {
                var d = a,
                    e = a.parentNode;
                m(new P(c), function(a) {
                    e.insertBefore(a, d.nextSibling), d = a
                })
            },
            addClass: wb,
            removeClass: vb,
            toggleClass: function(a, c, d) {
                v(d) && (d = !Ca(a, c)), (d ? wb : vb)(a, c)
            },
            parent: function(a) {
                return (a = a.parentNode) && 11 !== a.nodeType ? a : null
            },
            next: function(a) {
                return a.nextSibling
            },
            find: function(a, c) {
                return a.getElementsByTagName(c)
            },
            clone: cb
        }, function(a, c) {
            P.prototype[c] = function(c, e) {
                for (var g, h = 0; h < this.length; h++) g == p ? (g = a(this[h], c, e), g !== p && (g = u(g))) : bb(g, a(this[h], c, e));
                return g == p ? this : g
            }
        }), Fa.prototype = {
            put: function(a, c) {
                this[ia(a)] = c
            },
            get: function(a) {
                return this[ia(a)]
            },
            remove: function(a) {
                var c = this[a = ia(a)];
                return delete this[a], c
            }
        }, db.prototype = {
            push: function(a, c) {
                var d = this[a = ia(a)];
                d ? d.push(c) : this[a] = [c]
            },
            shift: function(a) {
                var c = this[a = ia(a)];
                return c ? 1 == c.length ? (delete this[a], c[0]) : c.shift() : void 0
            }
        };
        var qc = /^function\s*[^\(]*\(\s*([^\)]*)\)/m,
            rc = /,/,
            sc = /^\s*(_?)(.+?)\1\s*$/,
            pc = /((\/\/.*$)|(\/\*[\s\S]*?\*\/))/gm,
            Db = "Non-assignable model expression: ";
        Bb.$inject = ["$provide"];
        var zc = /^(x[\:\-_]|data[\:\-_])/i,
            Fb = /^([^:]+):\/\/(\w+:{0,1}\w*@)?([\w\.-]*)(:([0-9]+))?(\/[^\?#]*)?(\?([^#]*))?(#(.*))?$/,
            Zb = /^([^\?#]*)?(\?([^#]*))?(#(.*))?$/,
            Gc = Zb,
            Gb = {
                http: 80,
                https: 443,
                ftp: 21
            };
        fb.prototype = {
            $$replace: !1,
            absUrl: Ja("$$absUrl"),
            url: function(a, c) {
                if (v(a)) return this.$$url;
                var d = Zb.exec(a);
                return d[1] && this.path(decodeURIComponent(d[1])), (d[2] || d[1]) && this.search(d[3] || ""), this.hash(d[5] || "", c), this
            },
            protocol: Ja("$$protocol"),
            host: Ja("$$host"),
            port: Ja("$$port"),
            path: Ib("$$path", function(a) {
                return "/" == a.charAt(0) ? a : "/" + a
            }),
            search: function(a, c) {
                return v(a) ? this.$$search : (s(c) ? null === c ? delete this.$$search[a] : this.$$search[a] = c : this.$$search = G(a) ? Xa(a) : a, this.$$compose(), this)
            },
            hash: Ib("$$hash", ya),
            replace: function() {
                return this.$$replace = !0, this
            }
        }, Ia.prototype = xa(fb.prototype), Hb.prototype = xa(Ia.prototype);
        var Ka = {
                "null": function() {
                    return null
                },
                "true": function() {
                    return !0
                },
                "false": function() {
                    return !1
                },
                undefined: x,
                "+": function(a, c, d, e) {
                    return d = d(a, c), e = e(a, c), (s(d) ? d : 0) + (s(e) ? e : 0)
                },
                "-": function(a, c, d, e) {
                    return d = d(a, c), e = e(a, c), (s(d) ? d : 0) - (s(e) ? e : 0)
                },
                "*": function(a, c, d, e) {
                    return d(a, c) * e(a, c)
                },
                "/": function(a, c, d, e) {
                    return d(a, c) / e(a, c)
                },
                "%": function(a, c, d, e) {
                    return d(a, c) % e(a, c)
                },
                "^": function(a, c, d, e) {
                    return d(a, c) ^ e(a, c)
                },
                "=": x,
                "==": function(a, c, d, e) {
                    return d(a, c) == e(a, c)
                },
                "!=": function(a, c, d, e) {
                    return d(a, c) != e(a, c)
                },
                "<": function(a, c, d, e) {
                    return d(a, c) < e(a, c)
                },
                ">": function(a, c, d, e) {
                    return d(a, c) > e(a, c)
                },
                "<=": function(a, c, d, e) {
                    return d(a, c) <= e(a, c)
                },
                ">=": function(a, c, d, e) {
                    return d(a, c) >= e(a, c)
                },
                "&&": function(a, c, d, e) {
                    return d(a, c) && e(a, c)
                },
                "||": function(a, c, d, e) {
                    return d(a, c) || e(a, c)
                },
                "&": function(a, c, d, e) {
                    return d(a, c) & e(a, c)
                },
                "|": function(a, c, d, e) {
                    return e(a, c)(a, c, d(a, c))
                },
                "!": function(a, c, d) {
                    return !d(a, c)
                }
            },
            Kc = {
                n: "\n",
                f: "\f",
                r: "\r",
                t: "	",
                v: "",
                "'": "'",
                '"': '"'
            },
            gb = {},
            Xc = T.XMLHttpRequest || function() {
                try {
                    return new ActiveXObject("Msxml2.XMLHTTP.6.0")
                } catch (a) {}
                try {
                    return new ActiveXObject("Msxml2.XMLHTTP.3.0")
                } catch (c) {}
                try {
                    return new ActiveXObject("Msxml2.XMLHTTP")
                } catch (d) {}
                throw new z("This browser does not support XMLHttpRequest.")
            };
        Pb.$inject = ["$provide"], Qb.$inject = ["$locale"], Sb.$inject = ["$locale"];
        var Vb = ".",
            gd = {
                yyyy: O("FullYear", 4),
                yy: O("FullYear", 2, 0, !0),
                y: O("FullYear", 1),
                MMMM: La("Month"),
                MMM: La("Month", !0),
                MM: O("Month", 2, 1),
                M: O("Month", 1, 1),
                dd: O("Date", 2),
                d: O("Date", 1),
                HH: O("Hours", 2),
                H: O("Hours", 1),
                hh: O("Hours", 2, -12),
                h: O("Hours", 1, -12),
                mm: O("Minutes", 2),
                m: O("Minutes", 1),
                ss: O("Seconds", 2),
                s: O("Seconds", 1),
                EEEE: La("Day"),
                EEE: La("Day", !0),
                a: function(a, c) {
                    return a.getHours() < 12 ? c.AMPMS[0] : c.AMPMS[1]
                },
                Z: function(a) {
                    return a = a.getTimezoneOffset(), hb(a / 60, 2) + hb(Math.abs(a % 60), 2)
                }
            },
            fd = /((?:[^yMdHhmsaZE']+)|(?:'(?:[^']|'')*')|(?:E+|y+|M+|d+|H+|h+|m+|s+|a|Z))(.*)/,
            ed = /^\d+$/;
        Rb.$inject = ["$locale"];
        var cd = B(C),
            dd = B(la);
        Tb.$inject = ["$parse"];
        var jd = B({
                restrict: "E",
                compile: function(a, c) {
                    return c.href || c.$set("href", ""),
                        function(a, c) {
                            c.bind("click", function(a) {
                                c.attr("href") || a.preventDefault()
                            })
                        }
                }
            }),
            jb = {};
        m(Ea, function(a, c) {
            var d = ea("ng-" + c);
            jb[d] = function() {
                return {
                    priority: 100,
                    compile: function() {
                        return function(a, g, h) {
                            a.$watch(h[d], function(a) {
                                h.$set(c, !!a)
                            })
                        }
                    }
                }
            }
        }), m(["src", "href"], function(a) {
            var c = ea("ng-" + a);
            jb[c] = function() {
                return {
                    priority: 99,
                    link: function(d, e, g) {
                        g.$observe(c, function(c) {
                            g.$set(a, c), Z && e.prop(a, c)
                        })
                    }
                }
            }
        });
        var Oa = {
            $addControl: x,
            $removeControl: x,
            $setValidity: x,
            $setDirty: x
        };
        Wb.$inject = ["$element", "$attrs", "$scope"];
        var Ra = {
                name: "form",
                restrict: "E",
                controller: Wb,
                compile: function() {
                    return {
                        pre: function(a, c, d, e) {
                            d.action || c.bind("submit", function(a) {
                                a.preventDefault()
                            });
                            var g = c.parent().controller("form"),
                                h = d.name || d.ngForm;
                            h && (a[h] = e), g && c.bind("$destroy", function() {
                                g.$removeControl(e), h && (a[h] = p), D(e, Oa)
                            })
                        }
                    }
                }
            },
            kd = B(Ra),
            ld = B(D(U(Ra), {
                restrict: "EAC"
            })),
            md = /^(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$/,
            nd = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/,
            od = /^\s*(\-|\+)?(\d+|(\d*(\.\d*)))\s*$/,
            $b = {
                text: Qa,
                number: function(a, c, d, e, g, h) {
                    if (Qa(a, c, d, e, g, h), e.$parsers.push(function(a) {
                            var c = S(a);
                            return c || od.test(a) ? (e.$setValidity("number", !0), "" === a ? null : c ? a : parseFloat(a)) : (e.$setValidity("number", !1), p)
                        }), e.$formatters.push(function(a) {
                            return S(a) ? "" : "" + a
                        }), d.min) {
                        var f = parseFloat(d.min),
                            a = function(a) {
                                return !S(a) && f > a ? (e.$setValidity("min", !1), p) : (e.$setValidity("min", !0), a)
                            };
                        e.$parsers.push(a), e.$formatters.push(a)
                    }
                    if (d.max) {
                        var i = parseFloat(d.max),
                            d = function(a) {
                                return !S(a) && a > i ? (e.$setValidity("max", !1), p) : (e.$setValidity("max", !0), a)
                            };
                        e.$parsers.push(d), e.$formatters.push(d)
                    }
                    e.$formatters.push(function(a) {
                        return S(a) || va(a) ? (e.$setValidity("number", !0), a) : (e.$setValidity("number", !1), p)
                    })
                },
                url: function(a, c, d, e, g, h) {
                    Qa(a, c, d, e, g, h), a = function(a) {
                        return S(a) || md.test(a) ? (e.$setValidity("url", !0), a) : (e.$setValidity("url", !1), p)
                    }, e.$formatters.push(a), e.$parsers.push(a)
                },
                email: function(a, c, d, e, g, h) {
                    Qa(a, c, d, e, g, h), a = function(a) {
                        return S(a) || nd.test(a) ? (e.$setValidity("email", !0), a) : (e.$setValidity("email", !1), p)
                    }, e.$formatters.push(a), e.$parsers.push(a)
                },
                radio: function(a, c, d, e) {
                    v(d.name) && c.attr("name", wa()), c.bind("click", function() {
                        c[0].checked && a.$apply(function() {
                            e.$setViewValue(d.value)
                        })
                    }), e.$render = function() {
                        c[0].checked = d.value == e.$viewValue
                    }, d.$observe("value", e.$render)
                },
                checkbox: function(a, c, d, e) {
                    var g = d.ngTrueValue,
                        h = d.ngFalseValue;
                    G(g) || (g = !0), G(h) || (h = !1), c.bind("click", function() {
                        a.$apply(function() {
                            e.$setViewValue(c[0].checked)
                        })
                    }), e.$render = function() {
                        c[0].checked = e.$viewValue
                    }, e.$formatters.push(function(a) {
                        return a === g
                    }), e.$parsers.push(function(a) {
                        return a ? g : h
                    })
                },
                hidden: x,
                button: x,
                submit: x,
                reset: x
            },
            ac = ["$browser", "$sniffer", function(a, c) {
                return {
                    restrict: "E",
                    require: "?ngModel",
                    link: function(d, e, g, h) {
                        h && ($b[C(g.type)] || $b.text)(d, e, g, h, c, a)
                    }
                }
            }],
            Na = "ng-valid",
            Ma = "ng-invalid",
            Pa = "ng-pristine",
            Xb = "ng-dirty",
            pd = ["$scope", "$exceptionHandler", "$attrs", "$element", "$parse", function(a, c, d, e, g) {
                function h(a, c) {
                    c = c ? "-" + $a(c, "-") : "", e.removeClass((a ? Ma : Na) + c).addClass((a ? Na : Ma) + c)
                }
                this.$modelValue = this.$viewValue = Number.NaN, this.$parsers = [], this.$formatters = [], this.$viewChangeListeners = [], this.$pristine = !0, this.$dirty = !1, this.$valid = !0, this.$invalid = !1, this.$name = d.name;
                var g = g(d.ngModel),
                    f = g.assign;
                if (!f) throw z(Db + d.ngModel + " (" + oa(e) + ")");
                this.$render = x;
                var i = e.inheritedData("$formController") || Oa,
                    j = 0,
                    k = this.$error = {};
                e.addClass(Pa), h(!0), this.$setValidity = function(a, c) {
                    k[a] !== !c && (c ? (k[a] && j--, j || (h(!0), this.$valid = !0, this.$invalid = !1)) : (h(!1), this.$invalid = !0, this.$valid = !1, j++), k[a] = !c, h(c, a), i.$setValidity(a, c, this))
                }, this.$setViewValue = function(d) {
                    this.$viewValue = d, this.$pristine && (this.$dirty = !0, this.$pristine = !1, e.removeClass(Pa).addClass(Xb), i.$setDirty()), m(this.$parsers, function(a) {
                        d = a(d)
                    }), this.$modelValue !== d && (this.$modelValue = d, f(a, d), m(this.$viewChangeListeners, function(a) {
                        try {
                            a()
                        } catch (d) {
                            c(d)
                        }
                    }))
                };
                var l = this;
                a.$watch(g, function(a) {
                    if (l.$modelValue !== a) {
                        var c = l.$formatters,
                            d = c.length;
                        for (l.$modelValue = a; d--;) a = c[d](a);
                        l.$viewValue !== a && (l.$viewValue = a, l.$render())
                    }
                })
            }],
            qd = function() {
                return {
                    require: ["ngModel", "^?form"],
                    controller: pd,
                    link: function(a, c, d, e) {
                        var g = e[0],
                            h = e[1] || Oa;
                        h.$addControl(g), c.bind("$destroy", function() {
                            h.$removeControl(g)
                        })
                    }
                }
            },
            rd = B({
                require: "ngModel",
                link: function(a, c, d, e) {
                    e.$viewChangeListeners.push(function() {
                        a.$eval(d.ngChange)
                    })
                }
            }),
            bc = function() {
                return {
                    require: "?ngModel",
                    link: function(a, c, d, e) {
                        if (e) {
                            d.required = !0;
                            var g = function(a) {
                                return !d.required || !S(a) && a !== !1 ? (e.$setValidity("required", !0), a) : void e.$setValidity("required", !1)
                            };
                            e.$formatters.push(g), e.$parsers.unshift(g), d.$observe("required", function() {
                                g(e.$viewValue)
                            })
                        }
                    }
                }
            },
            sd = function() {
                return {
                    require: "ngModel",
                    link: function(a, c, d, e) {
                        var g = (a = /\/(.*)\//.exec(d.ngList)) && RegExp(a[1]) || d.ngList || ",",
                            h = function(a) {
                                var c = [];
                                return a && m(a.split(g), function(a) {
                                    a && c.push(Q(a))
                                }), c
                            };
                        e.$parsers.push(h), e.$formatters.push(function(a) {
                            return K(a) && !fa(h(e.$viewValue), a) ? a.join(", ") : p
                        })
                    }
                }
            },
            td = /^(true|false|\d+)$/,
            ud = function() {
                return {
                    priority: 100,
                    compile: function(a, c) {
                        return td.test(c.ngValue) ? function(a, c, g) {
                            g.$set("value", a.$eval(g.ngValue))
                        } : function(a, c, g) {
                            a.$watch(g.ngValue, function(a) {
                                g.$set("value", a, !1)
                            })
                        }
                    }
                }
            },
            vd = R(function(a, c, d) {
                c.addClass("ng-binding").data("$binding", d.ngBind), a.$watch(d.ngBind, function(a) {
                    c.text(a == p ? "" : a)
                })
            }),
            wd = ["$interpolate", function(a) {
                return function(c, d, e) {
                    c = a(d.attr(e.$attr.ngBindTemplate)), d.addClass("ng-binding").data("$binding", c), e.$observe("ngBindTemplate", function(a) {
                        d.text(a)
                    })
                }
            }],
            xd = [function() {
                return function(a, c, d) {
                    c.addClass("ng-binding").data("$binding", d.ngBindHtmlUnsafe), a.$watch(d.ngBindHtmlUnsafe, function(a) {
                        c.html(a || "")
                    })
                }
            }],
            yd = ib("", !0),
            zd = ib("Odd", 0),
            Ad = ib("Even", 1),
            Bd = R({
                compile: function(a, c) {
                    c.$set("ngCloak", p), a.removeClass("ng-cloak")
                }
            }),
            Cd = [function() {
                return {
                    scope: !0,
                    controller: "@"
                }
            }],
            Dd = ["$sniffer", function(a) {
                return {
                    priority: 1e3,
                    compile: function() {
                        a.csp = !0
                    }
                }
            }],
            cc = {};
        m("click dblclick mousedown mouseup mouseover mouseout mousemove mouseenter mouseleave".split(" "), function(a) {
            var c = ea("ng-" + a);
            cc[c] = ["$parse", function(d) {
                return function(e, g, h) {
                    var f = d(h[c]);
                    g.bind(C(a), function(a) {
                        e.$apply(function() {
                            f(e, {
                                $event: a
                            })
                        })
                    })
                }
            }]
        });
        var Ed = R(function(a, c, d) {
                c.bind("submit", function() {
                    a.$apply(d.ngSubmit)
                })
            }),
            Fd = ["$http", "$templateCache", "$anchorScroll", "$compile", function(a, c, d, e) {
                return {
                    restrict: "ECA",
                    terminal: !0,
                    compile: function(g, h) {
                        var f = h.ngInclude || h.src,
                            i = h.onload || "",
                            j = h.autoscroll;
                        return function(g, h) {
                            var m, n = 0,
                                o = function() {
                                    m && (m.$destroy(), m = null), h.html("")
                                };
                            g.$watch(f, function(f) {
                                var q = ++n;
                                f ? a.get(f, {
                                    cache: c
                                }).success(function(a) {
                                    q === n && (m && m.$destroy(), m = g.$new(), h.html(a), e(h.contents())(m), s(j) && (!j || g.$eval(j)) && d(), m.$emit("$includeContentLoaded"), g.$eval(i))
                                }).error(function() {
                                    q === n && o()
                                }) : o()
                            })
                        }
                    }
                }
            }],
            Gd = R({
                compile: function() {
                    return {
                        pre: function(a, c, d) {
                            a.$eval(d.ngInit)
                        }
                    }
                }
            }),
            Hd = R({
                terminal: !0,
                priority: 1e3
            }),
            Id = ["$locale", "$interpolate", function(a, c) {
                var d = /{}/g;
                return {
                    restrict: "EA",
                    link: function(e, g, h) {
                        var f = h.count,
                            i = g.attr(h.$attr.when),
                            j = h.offset || 0,
                            k = e.$eval(i),
                            l = {};
                        m(k, function(a, e) {
                            l[e] = c(a.replace(d, "{{" + f + "-" + j + "}}"))
                        }), e.$watch(function() {
                            var c = parseFloat(e.$eval(f));
                            return isNaN(c) ? "" : (k[c] || (c = a.pluralCat(c - j)), l[c](e, g, !0))
                        }, function(a) {
                            g.text(a)
                        })
                    }
                }
            }],
            Jd = R({
                transclude: "element",
                priority: 1e3,
                terminal: !0,
                compile: function(a, c, d) {
                    return function(a, c, h) {
                        var i, j, k, f = h.ngRepeat,
                            h = f.match(/^\s*(.+)\s+in\s+(.*)\s*$/);
                        if (!h) throw z("Expected ngRepeat in form of '_item_ in _collection_' but got '" + f + "'.");
                        if (f = h[1], i = h[2], h = f.match(/^(?:([\$\w]+)|\(([\$\w]+)\s*,\s*([\$\w]+)\))$/), !h) throw z("'item' in 'item in collection' should be identifier or (key, value) but got '" + f + "'.");
                        j = h[3] || h[1], k = h[2];
                        var l = new db;
                        a.$watch(function(a) {
                            var e, f, p, A, y, v, s, h = a.$eval(i),
                                m = fc(h, !0),
                                u = new db,
                                z = c;
                            if (K(h)) v = h || [];
                            else {
                                v = [];
                                for (A in h) h.hasOwnProperty(A) && "$" != A.charAt(0) && v.push(A);
                                v.sort()
                            }
                            for (e = 0, f = v.length; f > e; e++) A = h === v ? e : v[e], y = h[A], (s = l.shift(y)) ? (p = s.scope, u.push(y, s), e !== s.index && (s.index = e, z.after(s.element)), z = s.element) : p = a.$new(), p[j] = y, k && (p[k] = A), p.$index = e, p.$first = 0 === e, p.$last = e === m - 1, p.$middle = !(p.$first || p.$last), s || d(p, function(a) {
                                z.after(a), s = {
                                    scope: p,
                                    element: z = a,
                                    index: e
                                }, u.push(y, s)
                            });
                            for (A in l)
                                if (l.hasOwnProperty(A))
                                    for (v = l[A]; v.length;) y = v.pop(), y.element.remove(), y.scope.$destroy();
                            l = u
                        })
                    }
                }
            }),
            Kd = R(function(a, c, d) {
                a.$watch(d.ngShow, function(a) {
                    c.css("display", Wa(a) ? "" : "none")
                })
            }),
            Ld = R(function(a, c, d) {
                a.$watch(d.ngHide, function(a) {
                    c.css("display", Wa(a) ? "none" : "")
                })
            }),
            Md = R(function(a, c, d) {
                a.$watch(d.ngStyle, function(a, d) {
                    d && a !== d && m(d, function(a, d) {
                        c.css(d, "")
                    }), a && c.css(a)
                }, !0)
            }),
            Nd = B({
                restrict: "EA",
                compile: function(a, c) {
                    var d = c.ngSwitch || c.on,
                        e = {};
                    return a.data("ng-switch", e),
                        function(a, h) {
                            var f, i, j;
                            a.$watch(d, function(d) {
                                i && (j.$destroy(), i.remove(), i = j = null), (f = e["!" + d] || e["?"]) && (a.$eval(c.change), j = a.$new(), f(j, function(a) {
                                    i = a, h.append(a)
                                }))
                            })
                        }
                }
            }),
            Od = R({
                transclude: "element",
                priority: 500,
                compile: function(a, c, d) {
                    a = a.inheritedData("ng-switch"), pa(a), a["!" + c.ngSwitchWhen] = d
                }
            }),
            Pd = R({
                transclude: "element",
                priority: 500,
                compile: function(a, c, d) {
                    a = a.inheritedData("ng-switch"), pa(a), a["?"] = d
                }
            }),
            Qd = R({
                controller: ["$transclude", "$element", function(a, c) {
                    a(function(a) {
                        c.append(a)
                    })
                }]
            }),
            Rd = ["$http", "$templateCache", "$route", "$anchorScroll", "$compile", "$controller", function(a, c, d, e, g, h) {
                return {
                    restrict: "ECA",
                    terminal: !0,
                    link: function(a, c, j) {
                        function k() {
                            var j = d.current && d.current.locals,
                                k = j && j.$template;
                            if (k) {
                                c.html(k), l && (l.$destroy(), l = null);
                                var k = g(c.contents()),
                                    m = d.current;
                                l = m.scope = a.$new(), m.controller && (j.$scope = l, j = h(m.controller, j), c.contents().data("$ngControllerController", j)), k(l), l.$emit("$viewContentLoaded"), l.$eval(n), e()
                            } else c.html(""), l && (l.$destroy(), l = null)
                        }
                        var l, n = j.onload || "";
                        a.$on("$routeChangeSuccess", k), k()
                    }
                }
            }],
            Sd = ["$templateCache", function(a) {
                return {
                    restrict: "E",
                    terminal: !0,
                    compile: function(c, d) {
                        "text/ng-template" == d.type && a.put(d.id, c[0].text)
                    }
                }
            }],
            Td = B({
                terminal: !0
            }),
            Ud = ["$compile", "$parse", function(a, c) {
                var d = /^\s*(.*?)(?:\s+as\s+(.*?))?(?:\s+group\s+by\s+(.*))?\s+for\s+(?:([\$\w][\$\w\d]*)|(?:\(\s*([\$\w][\$\w\d]*)\s*,\s*([\$\w][\$\w\d]*)\s*\)))\s+in\s+(.*)$/,
                    e = {
                        $setViewValue: x
                    };
                return {
                    restrict: "E",
                    require: ["select", "?ngModel"],
                    controller: ["$element", "$scope", "$attrs", function(a, c, d) {
                        var l, i = this,
                            j = {},
                            k = e;
                        i.databound = d.ngModel, i.init = function(a, c, d) {
                            k = a, l = d
                        }, i.addOption = function(c) {
                            j[c] = !0, k.$viewValue == c && (a.val(c), l.parent() && l.remove())
                        }, i.removeOption = function(a) {
                            this.hasOption(a) && (delete j[a], k.$viewValue == a && this.renderUnknownOption(a))
                        }, i.renderUnknownOption = function(c) {
                            c = "? " + ia(c) + " ?", l.val(c), a.prepend(l), a.val(c), l.prop("selected", !0)
                        }, i.hasOption = function(a) {
                            return j.hasOwnProperty(a)
                        }, c.$on("$destroy", function() {
                            i.renderUnknownOption = x
                        })
                    }],
                    link: function(e, h, f, i) {
                        function j(a, c, d, e) {
                            d.$render = function() {
                                var a = d.$viewValue;
                                e.hasOption(a) ? (y.parent() && y.remove(), c.val(a), "" === a && t.prop("selected", !0)) : v(a) && t ? c.val("") : e.renderUnknownOption(a)
                            }, c.bind("change", function() {
                                a.$apply(function() {
                                    y.parent() && y.remove(), d.$setViewValue(c.val())
                                })
                            })
                        }

                        function k(a, c, d) {
                            var e;
                            d.$render = function() {
                                var a = new Fa(d.$viewValue);
                                m(c.children(), function(c) {
                                    c.selected = s(a.get(c.value))
                                })
                            }, a.$watch(function() {
                                fa(e, d.$viewValue) || (e = U(d.$viewValue), d.$render())
                            }), c.bind("change", function() {
                                a.$apply(function() {
                                    var a = [];
                                    m(c.children(), function(c) {
                                        c.selected && a.push(c.value)
                                    }), d.$setViewValue(a)
                                })
                            })
                        }

                        function l(e, f, g) {
                            function i() {
                                var d, h, s, u, t, a = {
                                        "": []
                                    },
                                    c = [""];
                                s = g.$modelValue, u = r(e) || [];
                                var z, w, x, y = l ? kb(u) : u;
                                w = {}, t = !1;
                                var B, C;
                                for (o ? t = new Fa(s) : (null === s || q) && (a[""].push({
                                        selected: null === s,
                                        id: "",
                                        label: ""
                                    }), t = !0), x = 0; z = y.length, z > x; x++) w[k] = u[l ? w[l] = y[x] : x], d = m(e, w) || "", (h = a[d]) || (h = a[d] = [], c.push(d)), o ? d = t.remove(n(e, w)) != p : (d = s === n(e, w), t = t || d), h.push({
                                    id: l ? y[x] : x,
                                    label: j(e, w) || "",
                                    selected: d
                                });
                                for (!o && !t && a[""].unshift({
                                        id: "?",
                                        label: "",
                                        selected: !0
                                    }), w = 0, y = c.length; y > w; w++) {
                                    for (d = c[w], h = a[d], v.length <= w ? (s = {
                                            element: A.clone().attr("label", d),
                                            label: h.label
                                        }, u = [s], v.push(u), f.append(s.element)) : (u = v[w], s = u[0], s.label != d && s.element.attr("label", s.label = d)), B = null, x = 0, z = h.length; z > x; x++) d = h[x], (t = u[x + 1]) ? (B = t.element, t.label !== d.label && B.text(t.label = d.label), t.id !== d.id && B.val(t.id = d.id), t.element.selected !== d.selected && B.prop("selected", t.selected = d.selected)) : ("" === d.id && q ? C = q : (C = D.clone()).val(d.id).attr("selected", d.selected).text(d.label), u.push({
                                        element: C,
                                        label: d.label,
                                        id: d.id,
                                        selected: d.selected
                                    }), B ? B.after(C) : s.element.append(C), B = C);
                                    for (x++; u.length > x;) u.pop().element.remove()
                                }
                                for (; v.length > w;) v.pop()[0].element.remove()
                            }
                            var h;
                            if (!(h = w.match(d))) throw z("Expected ngOptions in form of '_select_ (as _label_)? for (_key_,)?_value_ in _collection_' but got '" + w + "'.");
                            var j = c(h[2] || h[1]),
                                k = h[4] || h[6],
                                l = h[5],
                                m = c(h[3] || ""),
                                n = c(h[2] ? h[1] : k),
                                r = c(h[7]),
                                v = [
                                    [{
                                        element: f,
                                        label: ""
                                    }]
                                ];
                            q && (a(q)(e), q.removeClass("ng-scope"), q.remove()), f.html(""), f.bind("change", function() {
                                e.$apply(function() {
                                    var a, h, i, j, m, q, s, c = r(e) || [],
                                        d = {};
                                    if (o)
                                        for (i = [], m = 0, s = v.length; s > m; m++)
                                            for (a = v[m], j = 1, q = a.length; q > j; j++)(h = a[j].element)[0].selected && (h = h.val(), l && (d[l] = h), d[k] = c[h], i.push(n(e, d)));
                                    else h = f.val(), "?" == h ? i = p : "" == h ? i = null : (d[k] = c[h], l && (d[l] = h), i = n(e, d));
                                    g.$setViewValue(i)
                                })
                            }), g.$render = i, e.$watch(i)
                        }
                        if (i[1]) {
                            for (var t, n = i[0], r = i[1], o = f.multiple, w = f.ngOptions, q = !1, D = u(aa.createElement("option")), A = u(aa.createElement("optgroup")), y = D.clone(), i = 0, x = h.children(), B = x.length; B > i; i++)
                                if ("" == x[i].value) {
                                    t = q = x.eq(i);
                                    break
                                }
                            if (n.init(r, q, y), o && (f.required || f.ngRequired)) {
                                var C = function(a) {
                                    return r.$setValidity("required", !f.required || a && a.length), a
                                };
                                r.$parsers.push(C), r.$formatters.unshift(C), f.$observe("required", function() {
                                    C(r.$viewValue)
                                })
                            }
                            w ? l(e, h, r) : o ? k(e, h, r) : j(e, h, r, n)
                        }
                    }
                }
            }],
            Vd = ["$interpolate", function(a) {
                var c = {
                    addOption: x,
                    removeOption: x
                };
                return {
                    restrict: "E",
                    priority: 100,
                    require: "^select",
                    compile: function(d, e) {
                        if (v(e.value)) {
                            var g = a(d.text(), !0);
                            g || e.$set("value", d.text())
                        }
                        return function(a, d, e, j) {
                            j.databound ? d.prop("selected", !1) : j = c, g ? a.$watch(g, function(a, c) {
                                e.$set("value", a), a !== c && j.removeOption(c), j.addOption(a)
                            }) : j.addOption(e.value), d.bind("$destroy", function() {
                                j.removeOption(e.value)
                            })
                        }
                    }
                }
            }],
            Wd = B({
                restrict: "E",
                terminal: !0
            });
        (ha = T.jQuery) ? (u = ha, D(ha.fn, {
            scope: ta.scope,
            controller: ta.controller,
            injector: ta.injector,
            inheritedData: ta.inheritedData
        }), ab("remove", !0), ab("empty"), ab("html")) : u = P, Yb.element = u,
            function(a) {
                D(a, {
                    bootstrap: ob,
                    copy: U,
                    extend: D,
                    equals: fa,
                    element: u,
                    forEach: m,
                    injector: pb,
                    noop: x,
                    bind: Va,
                    toJson: ba,
                    fromJson: mb,
                    identity: ya,
                    isUndefined: v,
                    isDefined: s,
                    isString: G,
                    isFunction: M,
                    isObject: J,
                    isNumber: va,
                    isElement: ec,
                    isArray: K,
                    version: hd,
                    isDate: ma,
                    lowercase: C,
                    uppercase: la,
                    callbacks: {
                        counter: 0
                    }
                }), sa = kc(T);
                try {
                    sa("ngLocale")
                } catch (c) {
                    sa("ngLocale", []).provider("$locale", Yc)
                }
                sa("ng", ["ngLocale"], ["$provide", function(a) {
                    a.provider("$compile", Bb).directive({
                        a: jd,
                        input: ac,
                        textarea: ac,
                        form: kd,
                        script: Sd,
                        select: Ud,
                        style: Wd,
                        option: Vd,
                        ngBind: vd,
                        ngBindHtmlUnsafe: xd,
                        ngBindTemplate: wd,
                        ngClass: yd,
                        ngClassEven: Ad,
                        ngClassOdd: zd,
                        ngCsp: Dd,
                        ngCloak: Bd,
                        ngController: Cd,
                        ngForm: ld,
                        ngHide: Ld,
                        ngInclude: Fd,
                        ngInit: Gd,
                        ngNonBindable: Hd,
                        ngPluralize: Id,
                        ngRepeat: Jd,
                        ngShow: Kd,
                        ngSubmit: Ed,
                        ngStyle: Md,
                        ngSwitch: Nd,
                        ngSwitchWhen: Od,
                        ngSwitchDefault: Pd,
                        ngOptions: Td,
                        ngView: Rd,
                        ngTransclude: Qd,
                        ngModel: qd,
                        ngList: sd,
                        ngChange: rd,
                        required: bc,
                        ngRequired: bc,
                        ngValue: ud
                    }).directive(jb).directive(cc), a.provider({
                        $anchorScroll: tc,
                        $browser: vc,
                        $cacheFactory: wc,
                        $controller: Ac,
                        $document: Bc,
                        $exceptionHandler: Cc,
                        $filter: Pb,
                        $interpolate: Dc,
                        $http: Uc,
                        $httpBackend: Vc,
                        $location: Hc,
                        $log: Ic,
                        $parse: Mc,
                        $route: Pc,
                        $routeParams: Qc,
                        $rootScope: Rc,
                        $q: Nc,
                        $sniffer: Sc,
                        $templateCache: xc,
                        $timeout: Zc,
                        $window: Tc
                    })
                }])
            }(Yb), u(aa).ready(function() {
                ic(aa, ob)
            })
    }(window, document), angular.element(document).find("head").append('<style type="text/css">@charset "UTF-8";[ng\\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak{display:none;}ng\\:form{display:block;}</style>'),
    function(A, f, u) {
        "use strict";
        f.module("ngResource", ["ng"]).factory("$resource", ["$http", "$parse", function(v, w) {
            function g(b, c) {
                return encodeURIComponent(b).replace(/%40/gi, "@").replace(/%3A/gi, ":").replace(/%24/g, "$").replace(/%2C/gi, ",").replace(c ? null : /%20/g, "+")
            }

            function l(b, c) {
                this.template = b += "#", this.defaults = c || {};
                var a = this.urlParams = {};
                j(b.split(/\W/), function(c) {
                    c && b.match(RegExp("[^\\\\]:" + c + "\\W")) && (a[c] = !0)
                }), this.template = b.replace(/\\:/g, ":")
            }

            function s(b, c, a) {
                function f(d) {
                    var b = {};
                    return j(c || {}, function(a, x) {
                        var m;
                        a.charAt && "@" == a.charAt(0) ? (m = a.substr(1), m = w(m)(d)) : m = a, b[x] = m
                    }), b
                }

                function e(a) {
                    t(a || {}, this)
                }
                var y = new l(b),
                    a = r({}, z, a);
                return j(a, function(d, g) {
                    var l = "POST" == d.method || "PUT" == d.method || "PATCH" == d.method;
                    e[g] = function(a, b, c, g) {
                        var h, i = {},
                            k = o,
                            p = null;
                        switch (arguments.length) {
                            case 4:
                                p = g, k = c;
                            case 3:
                            case 2:
                                if (!q(b)) {
                                    i = a, h = b, k = c;
                                    break
                                }
                                if (q(a)) {
                                    k = a, p = b;
                                    break
                                }
                                k = b, p = c;
                            case 1:
                                q(a) ? k = a : l ? h = a : i = a;
                                break;
                            case 0:
                                break;
                            default:
                                throw "Expected between 0-4 arguments [params, data, success, error], got " + arguments.length + " arguments."
                        }
                        var n = this instanceof e ? this : d.isArray ? [] : new e(h);
                        return v({
                            method: d.method,
                            url: y.url(r({}, f(h), d.params || {}, i)),
                            data: h
                        }).then(function(a) {
                            var b = a.data;
                            b && (d.isArray ? (n.length = 0, j(b, function(a) {
                                n.push(new e(a))
                            })) : t(b, n)), (k || o)(n, a.headers)
                        }, p), n
                    }, e.bind = function(d) {
                        return s(b, r({}, c, d), a)
                    }, e.prototype["$" + g] = function(a, b, d) {
                        var h, c = f(this),
                            i = o;
                        switch (arguments.length) {
                            case 3:
                                c = a, i = b, h = d;
                                break;
                            case 2:
                            case 1:
                                q(a) ? (i = a, h = b) : (c = a, i = b || o);
                            case 0:
                                break;
                            default:
                                throw "Expected between 1-3 arguments [params, success, error], got " + arguments.length + " arguments."
                        }
                        e[g].call(this, c, l ? this : u, i, h)
                    }
                }), e
            }
            var z = {
                    get: {
                        method: "GET"
                    },
                    save: {
                        method: "POST"
                    },
                    query: {
                        method: "GET",
                        isArray: !0
                    },
                    remove: {
                        method: "DELETE"
                    },
                    "delete": {
                        method: "DELETE"
                    }
                },
                o = f.noop,
                j = f.forEach,
                r = f.extend,
                t = f.copy,
                q = f.isFunction;
            return l.prototype = {
                url: function(b) {
                    var f, c = this,
                        a = this.template,
                        b = b || {};
                    j(this.urlParams, function(e, d) {
                        f = g(b[d] || c.defaults[d] || "", !0).replace(/%26/gi, "&").replace(/%3D/gi, "=").replace(/%2B/gi, "+"), a = a.replace(RegExp(":" + d + "(\\W)"), f + "$1")
                    });
                    var a = a.replace(/\/?#$/, ""),
                        e = [];
                    return j(b, function(a, b) {
                        c.urlParams[b] || e.push(g(b) + "=" + g(a))
                    }), e.sort(), a = a.replace(/\/*$/, ""), a + (e.length ? "?" + e.join("&") : "")
                }
            }, s
        }])
    }(window, window.angular);
var app = angular.module("StoresJp", ["ngResource", "ui.sortable", "angularFileUpload", "StoresJpDashboardCommon", "StoresJpAddon", "StoresJp.services", "StoresJpCommon.directives"]).config(function($routeProvider, $locationProvider, $httpProvider) {
    angular.forEach(["post", "put", "patch", "delete"], function(method) {
        $httpProvider.defaults.headers[method] ? $httpProvider.defaults.headers[method]["X-CSRF-Token"] = AUTH_TOKEN : $httpProvider.defaults.headers[method] = {
            "X-CSRF-Token": AUTH_TOKEN
        }
    })
});
$(document).ready(function() {
    var $main_btn = $(".panel_btn"),
        $panels = $(".panels"),
        $icons = $(".opened_icon"),
        pallet_height = 0,
        win_height = 0;
    $main_btn.each(function(i) {
        var $t = $(this),
            $panel = $panels.eq(i),
            $icon = $icons.eq(i);
        $t.data("flag", !1), $t.data("opened", !1), $t.data("height", $panel.height()), $panel.css({
            height: "0"
        }), pallet_height = $("#pallet_wrap").outerHeight(), $t.bind("click", function() {
            $t.data("flag", !0), $($main_btn).trigger("checker")
        }).bind("checker", function() {
            panelHandler($t, $panel, $icon)
        })
    });
    var panelHandler = function($btn, $panel, $icon) {
            win_height = $(window).height();
            var height = $btn.data("height"),
                p_height = height + pallet_height;
            p_height > win_height && (height = win_height - pallet_height - 0), ($btn.data("opened") || $btn.data("flag")) && (!$btn.data("opened") && $btn.data("flag") ? ($btn.data("flag", !1), $btn.data("opened", !0), $btn.addClass("panel_active"), $icon.css({
                display: "block"
            }), $panel.animate({
                height: height + "px"
            })) : $btn.data("opened") && $btn.data("flag") ? ($btn.data("flag", !1), $btn.data("opened", !1), $btn.removeClass("panel_active"), $icon.css({
                display: "none"
            }), $panel.animate({
                height: "0"
            })) : $btn.data("opened") && !$btn.data("flag") && ($btn.data("opened", !1), $btn.removeClass("panel_active"), $icon.css({
                display: "none"
            }), $panel.animate({
                height: "0"
            })))
        },
        PanelSlide = function() {};
    PanelSlide.prototype = {
        $btns: "",
        $pannel: "",
        current: 0,
        w: 0,
        max: 0,
        spd: 100,
        init: function(btn, pannel) {
            var that = this;
            that.$btns = btn, that.$pannel = pannel, that.w = pannel.children().width(), that.max = pannel.children().length, that.$btns.each(function(i) {
                var $t = $(this);
				if($t.hasClass('l')){
					if(that.current == 0 ){
						$t.css('display', 'none');
					}else {
						if(that.current>0 && that.current < that.max) {
							$t.css('display', 'list-item');
						}
					}					
				}
                if($t.hasClass('r')){
					if(that.current == (that.max - 1)){
						$t.css('display', 'none');
					}else {
						$t.css('display', 'list-item');
					}					
				}
				// 0 == i && $t.css({
				// display: "none"
				// }),
                $t.bind("click", function() {
                    0 == i ? that.current > 0 && (that.current -= 1, that.changeHandler(!1)) : that.current < that.max - 1 && (that.current += 1, that.changeHandler(!0)), that.$btns.trigger("checker")
                }).bind("checker", function() {
					if($t.hasClass('l')){
						if(that.current == 0 ){
							$t.css('display', 'none');
						}else {
							if(that.current>0 && that.current < that.max) {
								$t.css('display', 'list-item');
							}
						}					
					}
					if($t.hasClass('r')){
						if(that.current == (that.max - 1)){
							$t.css('display', 'none');
						}else {
							$t.css('display', 'list-item');
						}					
					}
                    // 0 == that.current ? 0 == i && $t.fadeOut(that.spd) :
					// that.current == that.max - 1 ? 1 == i &&
					// $t.fadeOut(that.spd) : "none" == $t.css("display") &&
					// $t.fadeIn(that.spd)
                })
            })
        },
        changeHandler: function() {
            var that = this;
            that.$pannel.animate({
                left: -that.w * that.current
            }, 300)
        }
    };
    var slide_bgcolor = new PanelSlide;
    slide_bgcolor.init($("#bgcolor .scroll li"), $(".btn_bgcolor"));
    var slide_bgpattern = new PanelSlide;
    slide_bgpattern.init($("#bgpattern .scroll li"), $(".btn_bgpattern"));
    var palletFlag = !0;
    $("#pallet").bind("mouseover", function() {
        $(window).stopTime(), palletFlag || (palletFlag = !0, $("#pallet").stop().animate({
            left: "0px"
        }))
    }), $("#preview").bind("mouseover", function() {
        palletFlag && ($(window).stopTime(), $(window).oneTime(500, function() {
            palletFlag = !1, $("#pallet").stop().animate({
                left: "-280px"
            })
        }))
    })
});
var app = angular.module("StoresJp::EditStore", ["StoresJpAddon"]).config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[').endSymbol(']]');
});
angular.module("StoresJp::EditStore").controller("StylesController", ["$scope", "$http", "$timeout", "storesJpAddonUtility", function($scope, $http, $timeout) {
        function update_store_name_ja_exists() {
            $scope.store_name_ja_only = $scope.store.name.match(/^[^ -~\uff61-\uff9f]*$/) ? !0 : !1
        }
        angular.extend($scope, {
            store: {
                name: USER_NAME,
                logo: null,
                store_font: {
                    style: "",
                    type: "",
                    weight: "",
                    size: ""
                },
                layout: "layout_a",
                display: {
                    item: !0,
                    frame: !0
                },
                text_color: {
                    store: "#000000",
                    item: "#000000"
                },
                background: {
                    color: "#ffffff",
                    image: null,
                    repeat: "repeat",
                    repeat_checked: "true"
                },
                toggle_display: function(target) {
                    switch (target) {
                        case "item":
                            this.display.item = !this.display.item, item_hover(this.display.item);
                            break;
                        case "frame":
                            this.display.frame = !this.display.frame, this.display.frame ? ($scope.styles.css.items = {
                                background: "#fff"
                            }, $scope.styles.css.item_inner = {
                                margin: 10
                            }, delete $scope.styles["class"].item_inner) : ($scope.styles.css.items = {
                                background: "none"
                            }, $scope.styles.css.item_inner = {
                                margin: 0
                            }, $scope.styles["class"].item_inner = "frame_none");
                            break;
                        case "logo":
                            $scope.styles.logo = !$scope.styles.logo;
                            break;
                        case "background_repeat":
                            "repeat" == $scope.store.background.repeat ? ($scope.styles.body["background-repeat"] = "repeat", $scope.store.background.repeat_checked = "true") : ($scope.styles.body["background-repeat"] = "no-repeat", $scope.store.background.repeat_checked = "false");
                            break;
                        case "original_background_image":
                            $scope.styles.original_background_image = !$scope.styles.original_background_image, $scope.styles.original_background_image ? $("#bg_default").slideUp(300, function() {
                                $("#bg_original .cont").slideDown(250)
                            }) : ($scope.store.background.image = $scope.styles.body["background-image"] = null, $("#bg_original .cont").slideUp(200, function() {
                                $("#bg_default").slideDown(300)
                            }))
                    }
                },
                change_store_font_language: function(language) {
                    $scope.font_language_show = language, $("#font_scroll ul").jScrollPane()
                },
                change_store_font: function(font_name, font_type, font_family2, font_weight) {
                    $scope.store_name_ja_only && "en" == $scope.font_language_show || ($scope.select_font_name = font_name, "google" == font_type ? (this.store_font.style = $scope.styles.store_logo["font-family"] = "'" + font_name + "', " + font_family2, this.store_font.type = font_type, this.store_font.weight = $scope.styles.store_logo["font-weight"] = font_weight) : (this.store_font.style = font_name, $scope.styles.store_logo["font-family"] = "dynamic_font", this.store_font.type = font_type, this.store_font.weight = $scope.styles.store_logo["font-weight"] = "", Ts.dynamicCss(font_callback, $scope.store.name, font_name, "dynamic_font", "", "")))
                },
                change_layout: function(layout) {
                    this.layout = layout;
                    var _layout = _.find($scope.preset.layouts, function(l) {
                        return l.name == layout
                    });
                    _.each($scope.items, function(v, k) {
                        if (!_.isEmpty(v.images)) {
                            var file_name = v.images[0].name.split(".");
                            v.path = k ? STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + file_name[0] + "_" + _layout.other + "." + file_name[1] : STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + file_name[0] + "_" + _layout.first + "." + file_name[1]
                        }
                    }), _.delay(function() {
                        $("dd.name").tile()
                    }, 50)
                },
                change_background_image: function(path) {
                    this.background.image = path, $scope.styles.body["background-image"] = $scope.util.generate_image_style(path)["background-image"], "/" == path[0] && "no-repeat" == $scope.store.background.repeat && ($scope.store.background.repeat = $scope.styles.body["background-repeat"] = "repeat"), $(".btn_bgcolor dd ul li.active").removeClass("active")
                },
                change_background_color: function(color) {
                    this.background.color = $scope.styles.body["background-color"] = color, $scope.store.background.image = $scope.styles.body["background-image"] = null, $(".bg_pt dd ul li.active").removeClass("active")
                },
                change_store_text_color: function(color) {
                    this.text_color.store = $scope.styles.store_logo.color = $scope.styles.navi_main.color = color
                },
                change_item_text_color: function(color) {
                    this.text_color.item = $scope.styles.css.items.color = color
                }
            },
            preset: {
                fonts: {
                    en: editStore_Fonts
                },
                layouts: editStore_Layouts,
                background_patterns: editStore_BackgroundPatterns,
                background_colors: editStore_BackgroundColor,
                text_colors: editStore_TextColor
            },
            util: {
                generate_image_style: function(path) {
                    return {
                        "background-image": "url(" + path + ")"
                    }
                },
                generate_background_color_style: function(color) {
                    return {
                        "background-color": color
                    }
                },
                generate_store_text: function(color) {
                	if($scope.styles.store_logo.color == color) {
                		return ' active';
                	}else {
                		return ' ';
                	}
                },
                generate_active_layouts: function(l){
                	if($scope.store.layout == l){
                		return ' active';
                	}else {
                		return ' ';
                	}
                },
                generate_item_text: function(color) {
                	if(typeof($scope.store.text_color.item) != "undefined" && ($scope.store.text_color.item == color)){
                		return ' active';
                	}else {
                		return ' ';
                	}
                },
                generate_active_background_colors: function(color){
                	if($scope.store.background.color == color){
                		return ' active';
                	}else {
                		return ' ';
                	}
                },
                generate_active_background_patterns: function(pattern) {
                	if($scope.store.background.image == pattern){
                		return ' active';
                	}else {
                		return ' ';
                	}
                }
            },
            init: function() {
                $http.get("/items").success(function(data) {

                    $scope.items = _.isEmpty(data) ? editStoreItemSample : data, $http.get("/styles").success(function(data) {
                    	var url_path_background = (data.background.image);
                        var main_url_path = '';
                        var is_original_background_image = !1;
                        if (url_path_background != null && url_path_background.indexOf(URL_PATH_PATTENT) > -1) {
                            main_url_path = STORES_JP.FILE_SERVER_URL + '/' + url_path_background;
                            is_original_background_image = !1;
                        } else {
                            main_url_path = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" +url_path_background;
                            is_original_background_image = !0;
                        };
                        _.each(data, function(v, k) {
                            v && (_.isObject(v) ? _.each(v, function(v2, k2) {
                                $scope.store[k][k2] = v2
                            }) : $scope.store[k] = v)
                        }), data.display.frame ? ($scope.styles.css = {
                            items: {
                                background: "#fff"
                            }
                        }, $scope.styles["class"] = {}) : ($scope.styles.css = {
                            items: {},
                            item_inner: {
                                margin: 0
                            }
                        }, $scope.styles["class"] = {
                            item_inner: "frame_none"
                        }), _.isEmpty($scope.store.background.image) || $scope.store.change_background_image($scope.store.background.image), _.isEmpty($scope.store.logo) || ($scope.styles.logo_image = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + $scope.store.logo, $scope.styles.logo = !0, $scope.styles.show_logo_switch = !0), "no-repeat" == $scope.store.background.repeat && ($scope.styles.body["background-repeat"] = "no-repeat"), $scope.store.background.image && "/" != $scope.store.background.image[0] && ($scope.styles.original_background_image = is_original_background_image, $scope.styles.body["background-image"] = $scope.util.generate_image_style(main_url_path)["background-image"]), $scope.store.background.color && ($scope.styles.body["background-color"] = $scope.store.background.color), $scope.store.text_color.store && ($scope.styles.store_logo.color = $scope.styles.navi_main.color = $scope.store.text_color.store), $scope.store.store_font.style && ("google" == $scope.store.store_font.type ? ($scope.styles.store_logo["font-family"] = $scope.store.store_font.style, $scope.styles.store_logo["font-weight"] = $scope.store.store_font.weight) : ($scope.styles.store_logo["font-family"] = "dynamic_font", $scope.styles.store_logo["font-weight"] = "", Ts.dynamicCss(font_callback, $scope.store.name, $scope.store.store_font.style, "dynamic_font", "", ""))), $scope.select_font_name = $scope.store.store_font.style.split(",")[0].replace(/'/g, ""), update_store_name_ja_exists(), $(".store_logo_pc").css("font-size", $scope.store.store_font.size + "px"), $("#slider").slider({
                            range: "max",
                            min: 30,
                            max: 120,
                            value: $scope.store.store_font.size,
                            slide: function(event, ui) {
                                $scope.store.store_font.size = ui.value, $(".store_logo_pc").css("font-size", ui.value + "px")
                            }
                        }), $scope.store.text_color.item && ($scope.styles.css.items.color = $scope.store.text_color.item), item_hover($scope.store.display.item);
                        var layout = _.find($scope.preset.layouts, function(l) {
                            return l.name == $scope.store.layout
                        });
                        _.each($scope.items, function(v, k) {
                            if (!_.isEmpty(v.images)) {
                                var file_name = v.images[0].name.split(".");
                                v.path = k ? STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + file_name[0] + "_" + layout.other + "." + file_name[1] : STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + file_name[0] + "_" + layout.first + "." + file_name[1]
                            }
                        }), $(".panel_btn:eq(1)").click(), _.delay(function() {
                            $(".btn_bgcolor dd ul li:nth-child(7n)").css({
                                "margin-right": 0
                            }), $("#layout div ul li:nth-child(4n)").css({
                                "margin-right": 0
                            })
                        }, 50)
                    }), $http.get("/categories").success(function(data) {
                        $scope.categories = data
                    }), $http.head("/about").success(function() {
                        $scope.hasAbout = !0
                    })
                }), (navigator.userAgent.toLowerCase().indexOf("firefox") + 1 ? 1 : 0) && ($("#label_logo_image").on("click", function() {
                    return $("#file_logo_image").click(), !1
                }), $("#label_background_image").on("click", function() {
                    return $("#file_background_image").click(), !1
                })), $("#file_logo_image, #file_background_image").on("change", function() {
                    $(this).submit()
                }), $("#file_logo_image").change(function() {
                    $(this).upload("/upload_image", {
                        authenticity_token: AUTH_TOKEN
                    }, function(data) {
                        $scope.store.logo = data.name, $scope.styles.logo_image = "/_temp_files/" + data.name, $scope.styles.logo = !0, $scope.styles.show_logo_switch = !0, $scope.$digest()
                    }, "json")
                }), $("#file_background_image").change(function() {
                    $(this).upload("/upload_image", {
                        authenticity_token: AUTH_TOKEN
                    }, function(data) {
                        $scope.store.background.image = data.name, $scope.styles.body["background-image"] = $scope.util.generate_image_style("/_temp_files/" + data.name)["background-image"], $scope.$digest()
                    }, "json")
                }), $scope.font_language_show = "en";

                $(window).on("beforeunload", function() {
                    return "Thông tin của bạn chưa được lưu. Thao tác này sẽ không phục hồi lại được."
                })
            },
            save: function() {
                if (window.confirm("Bạn có chắc chắn là muốn lưu thông tin giao diện mới ?")) {
                    var data = {};
                    _.each($scope.store, function(v, k) {
                        _.isFunction(v) || (data[k] = v)
                    });
                    var d = data;
                    $scope.styles.logo || (d.logo = null), $http.post("/save", {
                        authenticity_token: AUTH_TOKEN,
                        store: {
                            name: d.name,
                            store_style: {
                                store_font_style: d.store_font.style,
                                store_font_type: d.store_font.type,
                                store_font_weight: d.store_font.weight,
                                store_font_size: d.store_font.size,
                                layout: d.layout,
                                display_frame: d.display.frame,
                                display_item: d.display.item,
                                logo_image: d.logo,
                                background_color: d.background.color,
                                background_image: d.background.image,
                                background_repeat: d.background.repeat,
                                item_text_color: d.text_color.item,
                                store_text_color: d.text_color.store
                            }
                        }
                    }).success(function(data, status, headers, config) {
                        //alert(data);
                        $(window).off("beforeunload"), location.href = "/"
                    }).error(function(data, status, headers, config) {
                        //alert('errot' + data);
                        alert('Đã có lỗi xảy ra!');
                    })
                }
            }
        }), $scope.styles = {
            body: {
                "background-color": $scope.store.background.color,
                "background-image": $scope.store.background.image,
                "background-repeat": $scope.store.background.repeat
            },
            store_logo: {
                color: $scope.store.text_color.store,
                "font-family": "",
                "font-weight": $scope.store.store_font.weight
            },
            navi_main: {
                color: $scope.store.text_color.store
            },
            item_text: {
                color: $scope.store.text_color.item
            },
            logo: !_.isNull($scope.store.logo),
            original_background_image: !1
        }, font_load_count = 0, $scope.store_name_change = function() {
            update_store_name_ja_exists(), "" != $scope.store.store_font.style && "google" != $scope.store.store_font.type && (font_load_count > 0 && $timeout.cancel(font_load), font_load_count = 2, font_load_countdown())
        };
        var font_load_countdown = function() {
                font_load = $timeout(function() {
                    font_load_count -= 1, 0 >= font_load_count ? ($timeout.cancel(font_load), Ts.dynamicCss(font_callback, $scope.store.name, $scope.store.store_font.style, "dynamic_font", "", "")) : font_load_countdown()
                }, 100)
            },
            font_change_panel_timer = 0;
        $scope.font_change_mouseover = function() {
            $timeout.cancel(font_change_panel_timer), $(".store_font").fadeIn("normal"), $("#font_scroll ul").jScrollPane()
        }, $scope.font_change_mouseleave = function() {
            font_change_panel_timer = $timeout(function() {
                $(".store_font").fadeOut("normal")
            }, 500)
        };
        var font_callback = function(res) {
                var css = document.getElementById("dynamic_font_css");
                "css" == res.type && (css.textContent = res.data)
            },
            select_font_callback = function(res) {
                var css = document.getElementById("select_font_css");
                "css" == res.type && (css.textContent += res.data)
            }
    }]),
    /*
     * jQuery.upload v1.0.2
     *
     * Copyright (c) 2010 lagos
     * Dual licensed under the MIT and GPL licenses.
     *
     * http://lagoscript.org
     */
    function(b) {
        function m(e) {
            return b.map(n(e), function(d) {
                return '<input type="hidden" name="' + d.name + '" value="' + d.value + '"/>'
            }).join("")
        }

        function n(e) {
            function d(c, f) {
                a.push({
                    name: c,
                    value: f
                })
            }
            if (b.isArray(e)) return e;
            var a = [];
            return "object" == typeof e ? b.each(e, function(c) {
                b.isArray(this) ? b.each(this, function() {
                    d(c, this)
                }) : d(c, b.isFunction(this) ? this() : this)
            }) : "string" == typeof e && b.each(e.split("&"), function() {
                var c = b.map(this.split("="), function(f) {
                    return decodeURIComponent(f.replace(/\+/g, " "))
                });
                d(c[0], c[1])
            }), a
        }

        function o(e, d) {
            var a;
            if (a = b(e).contents().get(0), b.isXMLDoc(a) || a.XMLDocument) return a.XMLDocument || a;
            switch (a = b(a).find("body").html(), d) {
                case "xml":
                    if (a = a, window.DOMParser) a = (new DOMParser).parseFromString(a, "application/xml");
                    else {
                        var c = new ActiveXObject("Microsoft.XMLDOM");
                        c.async = !1, c.loadXML(a), a = c
                    }
                    break;
                case "json":
                    a = window.eval("(" + a + ")")
            }
            return a
        }
        var p = 0;
        b.fn.upload = function(e, d, a, c) {
            var g, j, h, f = this;
            h = "jquery_upload" + ++p;
            var k = b('<iframe name="' + h + '" style="position:absolute;top:-9999px" />').appendTo("body"),
                i = '<form target="' + h + '" method="post" enctype="multipart/form-data" />';
            return b.isFunction(d) && (c = a, a = d, d = {}), j = b("input:checkbox", this), h = b("input:checked", this), i = f.wrapAll(i).parent("form").attr("action", e), j.removeAttr("checked"), h.attr("checked", !0), g = (g = m(d)) ? b(g).appendTo(i) : null, i.submit(function() {
                k.load(function() {
                    var l = o(this, c),
                        q = b("input:checked", f);
                    i.after(f).remove(), j.removeAttr("checked"), q.attr("checked", !0), g && g.remove(), setTimeout(function() {
                        k.remove(), "script" === c && b.globalEval(l), a && a.call(f, l)
                    }, 0)
                })
            }).submit(), this
        }
    }(jQuery),
    /*! Copyright (c) 2011 Brandon Aaron (http://brandonaaron.net)
     * Licensed under the MIT License (LICENSE.txt).
     *
     * Thanks to: http://adomas.org/javascript-mouse-wheel/ for some pointers.
     * Thanks to: Mathias Bank(http://www.mathias-bank.de) for a scope bug fix.
     * Thanks to: Seamus Leahy for adding deltaX and deltaY
     *
     * Version: 3.0.6
     *
     * Requires: 1.2.2+
     */
    function($) {
        function handler(event) {
            var orgEvent = event || window.event,
                args = [].slice.call(arguments, 1),
                delta = 0,
                deltaX = 0,
                deltaY = 0;
            return event = $.event.fix(orgEvent), event.type = "mousewheel", orgEvent.wheelDelta && (delta = orgEvent.wheelDelta / 120), orgEvent.detail && (delta = -orgEvent.detail / 3), deltaY = delta, void 0 !== orgEvent.axis && orgEvent.axis === orgEvent.HORIZONTAL_AXIS && (deltaY = 0, deltaX = -1 * delta), void 0 !== orgEvent.wheelDeltaY && (deltaY = orgEvent.wheelDeltaY / 120), void 0 !== orgEvent.wheelDeltaX && (deltaX = -1 * orgEvent.wheelDeltaX / 120), args.unshift(event, delta, deltaX, deltaY), ($.event.dispatch || $.event.handle).apply(this, args)
        }
        var types = ["DOMMouseScroll", "mousewheel"];
        if ($.event.fixHooks)
            for (var i = types.length; i;) $.event.fixHooks[types[--i]] = $.event.mouseHooks;
        $.event.special.mousewheel = {
            setup: function() {
                if (this.addEventListener)
                    for (var i = types.length; i;) this.addEventListener(types[--i], handler, !1);
                else this.onmousewheel = handler
            },
            teardown: function() {
                if (this.removeEventListener)
                    for (var i = types.length; i;) this.removeEventListener(types[--i], handler, !1);
                else this.onmousewheel = null
            }
        }, $.fn.extend({
            mousewheel: function(fn) {
                return fn ? this.bind("mousewheel", fn) : this.trigger("mousewheel")
            },
            unmousewheel: function(fn) {
                return this.unbind("mousewheel", fn)
            }
        })
    }(jQuery), jQuery.fn.extend({
        everyTime: function(interval, label, fn, times, belay) {
            return this.each(function() {
                jQuery.timer.add(this, interval, label, fn, times, belay)
            })
        },
        oneTime: function(interval, label, fn) {
            return this.each(function() {
                jQuery.timer.add(this, interval, label, fn, 1)
            })
        },
        stopTime: function(label, fn) {
            return this.each(function() {
                jQuery.timer.remove(this, label, fn)
            })
        }
    }), jQuery.extend({
        timer: {
            guid: 1,
            global: {},
            regex: /^([0-9]+)\s*(.*s)?$/,
            powers: {
                ms: 1,
                cs: 10,
                ds: 100,
                s: 1e3,
                das: 1e4,
                hs: 1e5,
                ks: 1e6
            },
            timeParse: function(value) {
                if (void 0 == value || null == value) return null;
                var result = this.regex.exec(jQuery.trim(value.toString()));
                if (result[2]) {
                    var num = parseInt(result[1], 10),
                        mult = this.powers[result[2]] || 1;
                    return num * mult
                }
                return value
            },
            add: function(element, interval, label, fn, times, belay) {
                var counter = 0;
                if (jQuery.isFunction(label) && (times || (times = fn), fn = label, label = interval), interval = jQuery.timer.timeParse(interval), !("number" != typeof interval || isNaN(interval) || 0 >= interval)) {
                    times && times.constructor != Number && (belay = !!times, times = 0), times = times || 0, belay = belay || !1, element.$timers || (element.$timers = {}), element.$timers[label] || (element.$timers[label] = {}), fn.$timerID = fn.$timerID || this.guid++;
                    var handler = function() {
                        belay && this.inProgress || (this.inProgress = !0, (++counter > times && 0 !== times || fn.call(element, counter) === !1) && jQuery.timer.remove(element, label, fn), this.inProgress = !1)
                    };
                    handler.$timerID = fn.$timerID, element.$timers[label][fn.$timerID] || (element.$timers[label][fn.$timerID] = window.setInterval(handler, interval)), this.global[label] || (this.global[label] = []), this.global[label].push(element)
                }
            },
            remove: function(element, label, fn) {
                var ret, timers = element.$timers;
                if (timers) {
                    if (label) {
                        if (timers[label]) {
                            if (fn) fn.$timerID && (window.clearInterval(timers[label][fn.$timerID]), delete timers[label][fn.$timerID]);
                            else
                                for (var fn in timers[label]) window.clearInterval(timers[label][fn]), delete timers[label][fn];
                            for (ret in timers[label]) break;
                            ret || (ret = null, delete timers[label])
                        }
                    } else
                        for (label in timers) this.remove(element, label, fn);
                    for (ret in timers) break;
                    ret || (element.$timers = null)
                }
            }
        }
    }), jQuery.browser.msie && jQuery(window).one("unload", function() {
        var global = jQuery.timer.global;
        for (var label in global)
            for (var els = global[label], i = els.length; --i;) jQuery.timer.remove(els[i], label)
    }),
    /*
     * jScrollPane - v2.0.0beta12 - 2012-05-14
     * http://jscrollpane.kelvinluck.com/
     *
     * Copyright (c) 2010 Kelvin Luck
     * Dual licensed under the MIT and GPL licenses.
     */
    function(b, a, c) {
        b.fn.jScrollPane = function(e) {
            function d(D, O) {
                function ar(aQ) {
                    var aL, aN, aM, aJ, aI, aP, aO = !1,
                        aK = !1;
                    if (ay = aQ, Y === c) aI = D.scrollTop(), aP = D.scrollLeft(), D.css({
                        overflow: "hidden",
                        padding: 0
                    }), aj = D.innerWidth() + f, v = D.innerHeight(), D.width(aj), Y = b('<div class="jspPane" />').css("padding", aH).append(D.children()), al = b('<div class="jspContainer" />').css({
                        width: aj + "px",
                        height: v + "px"
                    }).append(Y).appendTo(D);
                    else {
                        if (D.css("width", ""), aO = ay.stickToBottom && K(), aK = ay.stickToRight && B(), aJ = D.innerWidth() + f != aj || D.outerHeight() != v, aJ && (aj = D.innerWidth() + f, v = D.innerHeight(), al.css({
                                width: aj + "px",
                                height: v + "px"
                            })), !aJ && L == T && Y.outerHeight() == Z) return void D.width(aj);
                        L = T, Y.css("width", ""), D.width(aj), al.find(">.jspVerticalBar,>.jspHorizontalBar").remove().end()
                    }
                    Y.css("overflow", "auto"), T = aQ.contentWidth ? aQ.contentWidth : Y[0].scrollWidth, Z = Y[0].scrollHeight, Y.css("overflow", ""), y = T / aj, q = Z / v, az = q > 1, aE = y > 1, aE || az ? (D.addClass("jspScrollable"), aL = ay.maintainPosition && (I || aa), aL && (aN = aC(), aM = aA()), aF(), z(), F(), aL && (N(aK ? T - aj : aN, !1), M(aO ? Z - v : aM, !1)), J(), ag(), an(), ay.enableKeyboardNavigation && S(), ay.clickOnTrack && p(), C(), ay.hijackInternalLinks && m()) : (D.removeClass("jspScrollable"), Y.css({
                        top: 0,
                        width: al.width() - f
                    }), n(), E(), R(), w()), ay.autoReinitialise && !av ? av = setInterval(function() {
                        ar(ay)
                    }, ay.autoReinitialiseDelay) : !ay.autoReinitialise && av && clearInterval(av), aI && D.scrollTop(0) && M(aI, !1), aP && D.scrollLeft(0) && N(aP, !1), D.trigger("jsp-initialised", [aE || az])
                }

                function aF() {
                    az && (al.append(b('<div class="jspVerticalBar" />').append(b('<div class="jspCap jspCapTop" />'), b('<div class="jspTrack" />').append(b('<div class="jspDrag" />').append(b('<div class="jspDragTop" />'), b('<div class="jspDragBottom" />'))), b('<div class="jspCap jspCapBottom" />'))), U = al.find(">.jspVerticalBar"), ap = U.find(">.jspTrack"), au = ap.find(">.jspDrag"), ay.showArrows && (aq = b('<a class="jspArrow jspArrowUp" />').bind("mousedown.jsp", aD(0, -1)).bind("click.jsp", aB), af = b('<a class="jspArrow jspArrowDown" />').bind("mousedown.jsp", aD(0, 1)).bind("click.jsp", aB), ay.arrowScrollOnHover && (aq.bind("mouseover.jsp", aD(0, -1, aq)), af.bind("mouseover.jsp", aD(0, 1, af))), ak(ap, ay.verticalArrowPositions, aq, af)), t = v, al.find(">.jspVerticalBar>.jspCap:visible,>.jspVerticalBar>.jspArrow").each(function() {
                        t -= b(this).outerHeight()
                    }), au.hover(function() {
                        au.addClass("jspHover")
                    }, function() {
                        au.removeClass("jspHover")
                    }).bind("mousedown.jsp", function(aI) {
                        b("html").bind("dragstart.jsp selectstart.jsp", aB), au.addClass("jspActive");
                        var s = aI.pageY - au.position().top;
                        return b("html").bind("mousemove.jsp", function(aJ) {
                            V(aJ.pageY - s, !1)
                        }).bind("mouseup.jsp mouseleave.jsp", aw), !1
                    }), o())
                }

                function o() {
                    ap.height(t + "px"), I = 0, X = ay.verticalGutter + ap.outerWidth(), Y.width(aj - X - f);
                    try {
                        0 === U.position().left && Y.css("margin-left", X + "px")
                    } catch (s) {}
                }

                function z() {
                    aE && (al.append(b('<div class="jspHorizontalBar" />').append(b('<div class="jspCap jspCapLeft" />'), b('<div class="jspTrack" />').append(b('<div class="jspDrag" />').append(b('<div class="jspDragLeft" />'), b('<div class="jspDragRight" />'))), b('<div class="jspCap jspCapRight" />'))), am = al.find(">.jspHorizontalBar"), G = am.find(">.jspTrack"), h = G.find(">.jspDrag"), ay.showArrows && (ax = b('<a class="jspArrow jspArrowLeft" />').bind("mousedown.jsp", aD(-1, 0)).bind("click.jsp", aB), x = b('<a class="jspArrow jspArrowRight" />').bind("mousedown.jsp", aD(1, 0)).bind("click.jsp", aB), ay.arrowScrollOnHover && (ax.bind("mouseover.jsp", aD(-1, 0, ax)), x.bind("mouseover.jsp", aD(1, 0, x))), ak(G, ay.horizontalArrowPositions, ax, x)), h.hover(function() {
                        h.addClass("jspHover")
                    }, function() {
                        h.removeClass("jspHover")
                    }).bind("mousedown.jsp", function(aI) {
                        b("html").bind("dragstart.jsp selectstart.jsp", aB), h.addClass("jspActive");
                        var s = aI.pageX - h.position().left;
                        return b("html").bind("mousemove.jsp", function(aJ) {
                            W(aJ.pageX - s, !1)
                        }).bind("mouseup.jsp mouseleave.jsp", aw), !1
                    }), l = al.innerWidth(), ah())
                }

                function ah() {
                    al.find(">.jspHorizontalBar>.jspCap:visible,>.jspHorizontalBar>.jspArrow").each(function() {
                        l -= b(this).outerWidth()
                    }), G.width(l + "px"), aa = 0
                }

                function F() {
                    if (aE && az) {
                        var aI = G.outerHeight(),
                            s = ap.outerWidth();
                        t -= aI, b(am).find(">.jspCap:visible,>.jspArrow").each(function() {
                            l += b(this).outerWidth()
                        }), l -= s, v -= s, aj -= aI, G.parent().append(b('<div class="jspCorner" />').css("width", aI + "px")), o(), ah()
                    }
                    aE && Y.width(al.outerWidth() - f + "px"), Z = Y.outerHeight(), q = Z / v, aE && (at = Math.ceil(1 / y * l), at > ay.horizontalDragMaxWidth ? at = ay.horizontalDragMaxWidth : at < ay.horizontalDragMinWidth && (at = ay.horizontalDragMinWidth), h.width(at + "px"), j = l - at, ae(aa)), az && (A = Math.ceil(1 / q * t), A > ay.verticalDragMaxHeight ? A = ay.verticalDragMaxHeight : A < ay.verticalDragMinHeight && (A = ay.verticalDragMinHeight), au.height(A + "px"), i = t - A, ad(I))
                }

                function ak(aJ, aL, aI, s) {
                    var aM, aN = "before",
                        aK = "after";
                    "os" == aL && (aL = /Mac/.test(navigator.platform) ? "after" : "split"), aL == aN ? aK = aL : aL == aK && (aN = aL, aM = aI, aI = s, s = aM), aJ[aN](aI)[aK](s)
                }

                function aD(aI, s, aJ) {
                    return function() {
                        return H(aI, s, this, aJ), this.blur(), !1
                    }
                }

                function H(aL, aK, aO, aN) {
                    aO = b(aO).addClass("jspActive");
                    var aM, aJ, aI = !0,
                        s = function() {
                            0 !== aL && Q.scrollByX(aL * ay.arrowButtonSpeed), 0 !== aK && Q.scrollByY(aK * ay.arrowButtonSpeed), aJ = setTimeout(s, aI ? ay.initialDelay : ay.arrowRepeatFreq), aI = !1
                        };
                    s(), aM = aN ? "mouseout.jsp" : "mouseup.jsp", aN = aN || b("html"), aN.bind(aM, function() {
                        aO.removeClass("jspActive"), aJ && clearTimeout(aJ), aJ = null, aN.unbind(aM)
                    })
                }

                function p() {
                    w(), az && ap.bind("mousedown.jsp", function(aN) {
                        if (aN.originalTarget === c || aN.originalTarget == aN.currentTarget) {
                            var aJ, aL = b(this),
                                aO = aL.offset(),
                                aM = aN.pageY - aO.top - I,
                                aI = !0,
                                s = function() {
                                    var aR = aL.offset(),
                                        aS = aN.pageY - aR.top - A / 2,
                                        aP = v * ay.scrollPagePercent,
                                        aQ = i * aP / (Z - v);
                                    if (0 > aM) I - aQ > aS ? Q.scrollByY(-aP) : V(aS);
                                    else {
                                        if (!(aM > 0)) return void aK();
                                        aS > I + aQ ? Q.scrollByY(aP) : V(aS)
                                    }
                                    aJ = setTimeout(s, aI ? ay.initialDelay : ay.trackClickRepeatFreq), aI = !1
                                },
                                aK = function() {
                                    aJ && clearTimeout(aJ), aJ = null, b(document).unbind("mouseup.jsp", aK)
                                };
                            return s(), b(document).bind("mouseup.jsp", aK), !1
                        }
                    }), aE && G.bind("mousedown.jsp", function(aN) {
                        if (aN.originalTarget === c || aN.originalTarget == aN.currentTarget) {
                            var aJ, aL = b(this),
                                aO = aL.offset(),
                                aM = aN.pageX - aO.left - aa,
                                aI = !0,
                                s = function() {
                                    var aR = aL.offset(),
                                        aS = aN.pageX - aR.left - at / 2,
                                        aP = aj * ay.scrollPagePercent,
                                        aQ = j * aP / (T - aj);
                                    if (0 > aM) aa - aQ > aS ? Q.scrollByX(-aP) : W(aS);
                                    else {
                                        if (!(aM > 0)) return void aK();
                                        aS > aa + aQ ? Q.scrollByX(aP) : W(aS)
                                    }
                                    aJ = setTimeout(s, aI ? ay.initialDelay : ay.trackClickRepeatFreq), aI = !1
                                },
                                aK = function() {
                                    aJ && clearTimeout(aJ), aJ = null, b(document).unbind("mouseup.jsp", aK)
                                };
                            return s(), b(document).bind("mouseup.jsp", aK), !1
                        }
                    })
                }

                function w() {
                    G && G.unbind("mousedown.jsp"), ap && ap.unbind("mousedown.jsp")
                }

                function aw() {
                    b("html").unbind("dragstart.jsp selectstart.jsp mousemove.jsp mouseup.jsp mouseleave.jsp"), au && au.removeClass("jspActive"), h && h.removeClass("jspActive")
                }

                function V(s, aI) {
                    az && (0 > s ? s = 0 : s > i && (s = i), aI === c && (aI = ay.animateScroll), aI ? Q.animate(au, "top", s, ad) : (au.css("top", s), ad(s)))
                }

                function ad(aI) {
                    aI === c && (aI = au.position().top), al.scrollTop(0), I = aI;
                    var aL = 0 === I,
                        aJ = I == i,
                        aK = aI / i,
                        s = -aK * (Z - v);
                    (ai != aL || aG != aJ) && (ai = aL, aG = aJ, D.trigger("jsp-arrow-change", [ai, aG, P, k])), u(aL, aJ), Y.css("top", s), D.trigger("jsp-scroll-y", [-s, aL, aJ]).trigger("scroll")
                }

                function W(aI, s) {
                    aE && (0 > aI ? aI = 0 : aI > j && (aI = j), s === c && (s = ay.animateScroll), s ? Q.animate(h, "left", aI, ae) : (h.css("left", aI), ae(aI)))
                }

                function ae(aI) {
                    aI === c && (aI = h.position().left), al.scrollTop(0), aa = aI;
                    var aL = 0 === aa,
                        aK = aa == j,
                        aJ = aI / j,
                        s = -aJ * (T - aj);
                    (P != aL || k != aK) && (P = aL, k = aK, D.trigger("jsp-arrow-change", [ai, aG, P, k])), r(aL, aK), Y.css("left", s), D.trigger("jsp-scroll-x", [-s, aL, aK]).trigger("scroll")
                }

                function u(aI, s) {
                    ay.showArrows && (aq[aI ? "addClass" : "removeClass"]("jspDisabled"), af[s ? "addClass" : "removeClass"]("jspDisabled"))
                }

                function r(aI, s) {
                    ay.showArrows && (ax[aI ? "addClass" : "removeClass"]("jspDisabled"), x[s ? "addClass" : "removeClass"]("jspDisabled"))
                }

                function M(s, aI) {
                    var aJ = s / (Z - v);
                    V(aJ * i, aI)
                }

                function N(aI, s) {
                    var aJ = aI / (T - aj);
                    W(aJ * j, s)
                }

                function ab(aV, aQ, aJ) {
                    var aN, aK, aL, aI, aP, aO, aS, aR, aT, s = 0,
                        aU = 0;
                    try {
                        aN = b(aV)
                    } catch (aM) {
                        return
                    }
                    for (aK = aN.outerHeight(), aL = aN.outerWidth(), al.scrollTop(0), al.scrollLeft(0); !aN.is(".jspPane");)
                        if (s += aN.position().top, aU += aN.position().left, aN = aN.offsetParent(), /^body|html$/i.test(aN[0].nodeName)) return;
                    aI = aA(), aO = aI + v, aI > s || aQ ? aR = s - ay.verticalGutter : s + aK > aO && (aR = s - v + aK + ay.verticalGutter), aR && M(aR, aJ), aP = aC(), aS = aP + aj, aP > aU || aQ ? aT = aU - ay.horizontalGutter : aU + aL > aS && (aT = aU - aj + aL + ay.horizontalGutter), aT && N(aT, aJ)
                }

                function aC() {
                    return -Y.position().left
                }

                function aA() {
                    return -Y.position().top
                }

                function K() {
                    var s = Z - v;
                    return s > 20 && s - aA() < 10
                }

                function B() {
                    var s = T - aj;
                    return s > 20 && s - aC() < 10
                }

                function ag() {
                    al.unbind(ac).bind(ac, function(aL, aM, aK, aI) {
                        var aJ = aa,
                            s = I;
                        return Q.scrollBy(aK * ay.mouseWheelSpeed, -aI * ay.mouseWheelSpeed, !1), aJ == aa && s == I
                    })
                }

                function n() {
                    al.unbind(ac)
                }

                function aB() {
                    return !1
                }

                function J() {
                    Y.find(":input,a").unbind("focus.jsp").bind("focus.jsp", function(s) {
                        ab(s.target, !1)
                    })
                }

                function E() {
                    Y.find(":input,a").unbind("focus.jsp")
                }

                function S() {
                    function aJ() {
                        var aM = aa,
                            aL = I;
                        switch (s) {
                            case 40:
                                Q.scrollByY(ay.keyboardSpeed, !1);
                                break;
                            case 38:
                                Q.scrollByY(-ay.keyboardSpeed, !1);
                                break;
                            case 34:
                            case 32:
                                Q.scrollByY(v * ay.scrollPagePercent, !1);
                                break;
                            case 33:
                                Q.scrollByY(-v * ay.scrollPagePercent, !1);
                                break;
                            case 39:
                                Q.scrollByX(ay.keyboardSpeed, !1);
                                break;
                            case 37:
                                Q.scrollByX(-ay.keyboardSpeed, !1)
                        }
                        return aI = aM != aa || aL != I
                    }
                    var s, aI, aK = [];
                    aE && aK.push(am[0]), az && aK.push(U[0]), Y.focus(function() {
                        D.focus()
                    }), D.attr("tabindex", 0).unbind("keydown.jsp keypress.jsp").bind("keydown.jsp", function(aN) {
                        if (aN.target === this || aK.length && b(aN.target).closest(aK).length) {
                            var aM = aa,
                                aL = I;
                            switch (aN.keyCode) {
                                case 40:
                                case 38:
                                case 34:
                                case 32:
                                case 33:
                                case 39:
                                case 37:
                                    s = aN.keyCode, aJ();
                                    break;
                                case 35:
                                    M(Z - v), s = null;
                                    break;
                                case 36:
                                    M(0), s = null
                            }
                            return aI = aN.keyCode == s && aM != aa || aL != I, !aI
                        }
                    }).bind("keypress.jsp", function(aL) {
                        return aL.keyCode == s && aJ(), !aI
                    }), ay.hideFocus ? (D.css("outline", "none"), "hideFocus" in al[0] && D.attr("hideFocus", !0)) : (D.css("outline", ""), "hideFocus" in al[0] && D.attr("hideFocus", !1))
                }

                function R() {
                    D.attr("tabindex", "-1").removeAttr("tabindex").unbind("keydown.jsp keypress.jsp")
                }

                function C() {
                    if (location.hash && location.hash.length > 1) {
                        var aK, aI, aJ = escape(location.hash.substr(1));
                        try {
                            aK = b("#" + aJ + ', a[name="' + aJ + '"]')
                        } catch (s) {
                            return
                        }
                        aK.length && Y.find(aJ) && (0 === al.scrollTop() ? aI = setInterval(function() {
                            al.scrollTop() > 0 && (ab(aK, !0), b(document).scrollTop(al.position().top), clearInterval(aI))
                        }, 50) : (ab(aK, !0), b(document).scrollTop(al.position().top)))
                    }
                }

                function m() {
                    b(document.body).data("jspHijack") || (b(document.body).data("jspHijack", !0), b(document.body).delegate("a[href*=#]", "click", function(s) {
                        var aO, aP, aJ, aM, aL, aN, aI = this.href.substr(0, this.href.indexOf("#")),
                            aK = location.href;
                        if (-1 !== location.href.indexOf("#") && (aK = location.href.substr(0, location.href.indexOf("#"))), aI === aK) {
                            aO = escape(this.href.substr(this.href.indexOf("#") + 1));
                            try {
                                aP = b("#" + aO + ', a[name="' + aO + '"]')
                            } catch (aQ) {
                                return
                            }
                            aP.length && (aJ = aP.closest(".jspScrollable"), aM = aJ.data("jsp"), aM.scrollToElement(aP, !0), aJ[0].scrollIntoView && (aL = b(a).scrollTop(), aN = aP.offset().top, (aL > aN || aN > aL + b(a).height()) && aJ[0].scrollIntoView()), s.preventDefault())
                        }
                    }))
                }

                function an() {
                    var aJ, aI, aL, aK, aM, s = !1;
                    al.unbind("touchstart.jsp touchmove.jsp touchend.jsp click.jsp-touchclick").bind("touchstart.jsp", function(aN) {
                        var aO = aN.originalEvent.touches[0];
                        aJ = aC(), aI = aA(), aL = aO.pageX, aK = aO.pageY, aM = !1, s = !0
                    }).bind("touchmove.jsp", function(aQ) {
                        if (s) {
                            var aP = aQ.originalEvent.touches[0],
                                aO = aa,
                                aN = I;
                            return Q.scrollTo(aJ + aL - aP.pageX, aI + aK - aP.pageY), aM = aM || Math.abs(aL - aP.pageX) > 5 || Math.abs(aK - aP.pageY) > 5, aO == aa && aN == I
                        }
                    }).bind("touchend.jsp", function() {
                        s = !1
                    }).bind("click.jsp-touchclick", function() {
                        return aM ? (aM = !1, !1) : void 0
                    })
                }

                function g() {
                    var s = aA(),
                        aI = aC();
                    D.removeClass("jspScrollable").unbind(".jsp"), D.replaceWith(ao.append(Y.children())), ao.scrollTop(s), ao.scrollLeft(aI), av && clearInterval(av)
                }
                var ay, Y, aj, v, al, T, Z, y, q, az, aE, au, i, I, h, j, aa, U, ap, X, t, A, aq, af, am, G, l, at, ax, x, av, aH, f, L, Q = this,
                    ai = !0,
                    P = !0,
                    aG = !1,
                    k = !1,
                    ao = D.clone(!1, !1).empty(),
                    ac = b.fn.mwheelIntent ? "mwheelIntent.jsp" : "mousewheel.jsp";
                aH = D.css("paddingTop") + " " + D.css("paddingRight") + " " + D.css("paddingBottom") + " " + D.css("paddingLeft"), f = (parseInt(D.css("paddingLeft"), 10) || 0) + (parseInt(D.css("paddingRight"), 10) || 0), b.extend(Q, {
                    reinitialise: function(aI) {
                        aI = b.extend({}, ay, aI), ar(aI)
                    },
                    scrollToElement: function(aJ, aI, s) {
                        ab(aJ, aI, s)
                    },
                    scrollTo: function(aJ, s, aI) {
                        N(aJ, aI), M(s, aI)
                    },
                    scrollToX: function(aI, s) {
                        N(aI, s)
                    },
                    scrollToY: function(s, aI) {
                        M(s, aI)
                    },
                    scrollToPercentX: function(aI, s) {
                        N(aI * (T - aj), s)
                    },
                    scrollToPercentY: function(aI, s) {
                        M(aI * (Z - v), s)
                    },
                    scrollBy: function(aI, s, aJ) {
                        Q.scrollByX(aI, aJ), Q.scrollByY(s, aJ)
                    },
                    scrollByX: function(s, aJ) {
                        var aI = aC() + Math[0 > s ? "floor" : "ceil"](s),
                            aK = aI / (T - aj);
                        W(aK * j, aJ)
                    },
                    scrollByY: function(s, aJ) {
                        var aI = aA() + Math[0 > s ? "floor" : "ceil"](s),
                            aK = aI / (Z - v);
                        V(aK * i, aJ)
                    },
                    positionDragX: function(s, aI) {
                        W(s, aI)
                    },
                    positionDragY: function(aI, s) {
                        V(aI, s)
                    },
                    animate: function(aI, aL, s, aK) {
                        var aJ = {};
                        aJ[aL] = s, aI.animate(aJ, {
                            duration: ay.animateDuration,
                            easing: ay.animateEase,
                            queue: !1,
                            step: aK
                        })
                    },
                    getContentPositionX: function() {
                        return aC()
                    },
                    getContentPositionY: function() {
                        return aA()
                    },
                    getContentWidth: function() {
                        return T
                    },
                    getContentHeight: function() {
                        return Z
                    },
                    getPercentScrolledX: function() {
                        return aC() / (T - aj)
                    },
                    getPercentScrolledY: function() {
                        return aA() / (Z - v)
                    },
                    getIsScrollableH: function() {
                        return aE
                    },
                    getIsScrollableV: function() {
                        return az
                    },
                    getContentPane: function() {
                        return Y
                    },
                    scrollToBottom: function(s) {
                        V(i, s)
                    },
                    hijackInternalLinks: b.noop,
                    destroy: function() {
                        g()
                    }
                }), ar(O)
            }
            return e = b.extend({}, b.fn.jScrollPane.defaults, e), b.each(["mouseWheelSpeed", "arrowButtonSpeed", "trackClickSpeed", "keyboardSpeed"], function() {
                e[this] = e[this] || e.speed
            }), this.each(function() {
                var f = b(this),
                    g = f.data("jsp");
                g ? g.reinitialise(e) : (g = new d(f, e), f.data("jsp", g))
            })
        }, b.fn.jScrollPane.defaults = {
            showArrows: !1,
            maintainPosition: !0,
            stickToBottom: !1,
            stickToRight: !1,
            clickOnTrack: !0,
            autoReinitialise: !1,
            autoReinitialiseDelay: 500,
            verticalDragMinHeight: 0,
            verticalDragMaxHeight: 99999,
            horizontalDragMinWidth: 0,
            horizontalDragMaxWidth: 99999,
            contentWidth: c,
            animateScroll: !1,
            animateDuration: 300,
            animateEase: "linear",
            hijackInternalLinks: !1,
            verticalGutter: 4,
            horizontalGutter: 4,
            mouseWheelSpeed: 0,
            arrowButtonSpeed: 0,
            arrowRepeatFreq: 50,
            arrowScrollOnHover: !1,
            trackClickSpeed: 0,
            trackClickRepeatFreq: 70,
            verticalArrowPositions: "split",
            horizontalArrowPositions: "split",
            enableKeyboardNavigation: !0,
            hideFocus: !1,
            keyboardSpeed: 0,
            initialDelay: 300,
            speed: 30,
            scrollPagePercent: .8
        }
    }(jQuery, this),
    function($) {
        $.fn.tile = function(columns) {
            var tiles, max, c, h, s, last = this.length - 1;
            return columns || (columns = this.length), this.each(function() {
                s = this.style, s.removeProperty && s.removeProperty("height"), s.removeAttribute && s.removeAttribute("height")
            }), this.each(function(i) {
                c = i % columns, 0 == c && (tiles = []), tiles[c] = $(this), h = tiles[c].height(), (0 == c || h > max) && (max = h), (i == last || c == columns - 1) && $.each(tiles, function() {
                    this.height(max)
                })
            })
        }
    }(jQuery),
    /*
     *  Sugar Library v1.3
     *
     *  Freely distributable and licensed under the MIT-style license.
     *  Copyright (c) 2012 Andrew Plummer
     *  http://sugarjs.com/
     *
     * ---------------------------- */
    function() {
        function y(a) {
            return function(b) {
                return ga(b, a)
            }
        }

        function ga(a, b) {
            return p.prototype.toString.call(a) === "[object " + b + "]"
        }

        function ha(a) {
            a.SugarMethods || (ia(a, "SugarMethods", {}), G(a, m, m, {
                restore: function() {
                    var b = 0 === arguments.length,
                        c = H(arguments);
                    I(a.SugarMethods, function(d, e) {
                        (b || c.indexOf(d) > -1) && ia(e.za ? a.prototype : a, d, e.method)
                    })
                },
                extend: function(b, c, d) {
                    G(a, d !== m, c, b)
                }
            }))
        }

        function G(a, b, c, d) {
            var g, e = b ? a.prototype : a;
            ha(a), I(d, function(f, i) {
                g = e[f], "function" == typeof c && (i = ja(e[f], i, c)), c === m && e[f] || ia(e, f, i), a.SugarMethods[f] = {
                    za: b,
                    method: i,
                    Ga: g
                }
            })
        }

        function J(a, b, c, d, e) {
            var g = {};
            d = E(d) ? d.split(",") : d, d.forEach(function(f, i) {
                e(g, f, i)
            }), G(a, b, c, g)
        }

        function ja(a, b, c) {
            return function() {
                return !a || c !== j && c.apply(this, arguments) ? b.apply(this, arguments) : a.apply(this, arguments)
            }
        }

        function ia(a, b, c) {
            ca ? p.defineProperty(a, b, {
                value: c,
                configurable: j,
                enumerable: m,
                writable: j
            }) : a[b] = c
        }

        function H(a, b) {
            var c = [],
                d = 0;
            for (d = 0; d < a.length; d++) c.push(a[d]), b && b.call(a, a[d], d);
            return c
        }

        function K(a) {
            return void 0 !== a
        }

        function L(a) {
            return void 0 === a
        }

        function ka(a) {
            return a && "object" == typeof a
        }

        function la(a) {
            return !!a && ga(a, "Object") && u(a.constructor) === u(p)
        }

        function ma(a, b) {
            return p.hasOwnProperty.call(a, b)
        }

        function I(a, b) {
            for (var c in a)
                if (ma(a, c) && b.call(a, c, a[c]) === m) break
        }

        function na(a, b) {
            return I(b, function(c) {
                a[c] = b[c]
            }), a
        }

        function M(a) {
            na(this, a)
        }

        function N(a, b, c, d) {
            var e = [];
            a = parseInt(a);
            for (var g = 0 > d; !g && b >= a || g && a >= b;) e.push(a), c && c.call(this, a), a += d || 1;
            return e
        }

        function O(a, b, c) {
            c = w[c || "round"];
            var d = w.pow(10, w.abs(b || 0));
            return 0 > b && (d = 1 / d), c(a * d) / d
        }

        function P(a, b) {
            return O(a, b, "floor")
        }

        function Q(a, b, c, d) {
            return d = w.abs(a).toString(d || 10), d = oa(b - d.replace(/\.\d+/, "").length, "0") + d, (c || 0 > a) && (d = (0 > a ? "-" : "+") + d), d
        }

        function ra() {
            return "	\n\f\r \xa0\u1680\u180e\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u202f\u205f\u2028\u2029\u3000\ufeff"
        }

        function oa(a, b) {
            return r(w.max(0, K(a) ? a : 1) + 1).join(b || "")
        }

        function sa(a, b) {
            var c = a.toString().match(/[^/]*$/)[0];
            return b && (c = (c + b).split("").sort().join("").replace(/([gimy])\1+/g, "$1")), c
        }

        function R(a) {
            return E(a) || (a = u(a)), a.replace(/([\\/'*+?|()\[\]{}.^$])/g, "\\$1")
        }

        function ta(a, b, c) {
            var f, d = [],
                e = a.length,
                g = b[b.length - 1] !== m;
            return H(b, function(i) {
                return ea(i) ? m : (g && (i %= e, 0 > i && (i = e + i)), f = c ? a.charAt(i) || "" : a[i], void d.push(f))
            }), d.length < 2 ? d[0] : d
        }

        function va(a, b, c, d) {
            var e = a.length,
                g = -1 == d,
                f = g ? e - 1 : 0;
            for (c = isNaN(c) ? f : parseInt(c >> 0), 0 > c && (c = e + c), (!g && 0 > c || g && c >= e) && (c = f); g && c >= 0 || !g && e > c;) {
                if (a[c] === b) return c;
                c += d
            }
            return -1
        }

        function wa(a, b, c, d) {
            var e = a.length,
                g = 0,
                f = K(c);
            if (xa(b), 0 == e && !f) throw new TypeError("Reduce called on empty array with no initial value");
            for (f ? c = c : (c = a[d ? e - 1 : g], g++); e > g;) f = d ? e - g - 1 : g, f in a && (c = b(c, a[f], f, a)), g++;
            return c
        }

        function xa(a) {
            if (!a || !a.call) throw new TypeError("Callback is not callable")
        }

        function ya(a) {
            if (0 === a.length) throw new TypeError("First argument must be defined")
        }

        function dc(a, b, c, d) {
            Vb || ec();
            var e = H(b).join(""),
                g = Vb[d];
            return e = e.replace(/all/, "").replace(/(\w)lphabet|umbers?|atakana|paces?|unctuation/g, "$1"), a.replace(c, function(f) {
                return !g[f] || e && !e.has(g[f].type) ? f : g[f].to
            })
        }

        function ec() {
            var a;
            Vb = {
                zenkaku: {},
                hankaku: {}
            }, Ub.forEach(function(b) {
                N(b.start, b.end, function(c) {
                    $(b.type, u.fromCharCode(c), u.fromCharCode(c + b.shift))
                })
            }), cc.each(function(b, c) {
                a = bc.charAt(c), $("k", a, b), b.match($b) && $("k", a + "\uff9e", b.shift(1)), b.match(ac) && $("k", a + "\uff9f", b.shift(2))
            }), Zb.each(function(b, c) {
                $("p", Yb.charAt(c), b)
            }), $("k", "\uff73\uff9e", "\u30f4"), $("k", "\uff66\uff9e", "\u30fa"), $("s", " ", "\u3000")
        }

        function $(a, b, c) {
            Vb.zenkaku[b] = {
                type: a,
                to: c
            }, Vb.hankaku[c] = {
                type: a,
                to: b
            }
        }

        function fc() {
            Rb = {}, I(Tb, function(a, b) {
                b.split("").forEach(function(c) {
                    Rb[c] = a
                }), Sb += b
            }), Sb = s("[" + Sb + "]", "g")
        }
        var j = !0,
            m = !1,
            p = Object,
            r = Array,
            s = RegExp,
            t = Date,
            u = String,
            w = Math,
            ba = "undefined" != typeof global ? global : this,
            ca = p.defineProperty && p.defineProperties,
            x = "Array,Boolean,Date,Function,Number,String,RegExp".split(","),
            ea = (y(x[0]), y(x[1])),
            z = (y(x[2]), y(x[3])),
            D = y(x[4]),
            E = y(x[5]),
            F = y(x[6]);
        M.prototype.constructor = p, ha(p), I(x, function(a, b) {
                ha(ba[b])
            }), G(p, m, m, {
                keys: function(a) {
                    var b = [];
                    if (!ka(a) && !F(a) && !z(a)) throw new TypeError("Object required");
                    return I(a, function(c) {
                        b.push(c)
                    }), b
                }
            }), G(r, m, m, {
                isArray: function(a) {
                    return ga(a, "Array")
                }
            }), G(r, j, m, {
                every: function(a, b) {
                    var c = this.length,
                        d = 0;
                    for (ya(arguments); c > d;) {
                        if (d in this && !a.call(b, this[d], d, this)) return m;
                        d++
                    }
                    return j
                },
                some: function(a, b) {
                    var c = this.length,
                        d = 0;
                    for (ya(arguments); c > d;) {
                        if (d in this && a.call(b, this[d], d, this)) return j;
                        d++
                    }
                    return m
                },
                map: function(a, b) {
                    var c = this.length,
                        d = 0,
                        e = Array(c);
                    for (ya(arguments); c > d;) d in this && (e[d] = a.call(b, this[d], d, this)), d++;
                    return e
                },
                filter: function(a, b) {
                    var c = this.length,
                        d = 0,
                        e = [];
                    for (ya(arguments); c > d;) d in this && a.call(b, this[d], d, this) && e.push(this[d]), d++;
                    return e
                },
                indexOf: function(a, b) {
                    return E(this) ? this.indexOf(a, b) : va(this, a, b, 1)
                },
                lastIndexOf: function(a, b) {
                    return E(this) ? this.lastIndexOf(a, b) : va(this, a, b, -1)
                },
                forEach: function(a, b) {
                    var c = this.length,
                        d = 0;
                    for (xa(a); c > d;) d in this && a.call(b, this[d], d, this), d++
                },
                reduce: function(a, b) {
                    return wa(this, a, b)
                },
                reduceRight: function(a, b) {
                    return wa(this, a, b, j)
                }
            }), G(t, m, m, {
                now: function() {
                    return (new t).getTime()
                }
            }),
            function() {
                var a = ra().match(/^\s+$/);
                try {
                    u.prototype.trim.call([1])
                } catch (b) {
                    a = m
                }
                G(u, j, !a, {
                    trim: function() {
                        return this.toString().trimLeft().trimRight()
                    },
                    trimLeft: function() {
                        return this.replace(s("^[" + ra() + "]+"), "")
                    },
                    trimRight: function() {
                        return this.replace(s("[" + ra() + "]+$"), "")
                    }
                })
            }(),
            function() {
                var a = m;
                if (Function.prototype.ta) {
                    a = function() {};
                    var b = a.ta();
                    a = new b instanceof b && !(new a instanceof b)
                }
                G(Function, j, !a, {
                    bind: function(c) {
                        var g, f, d = this,
                            e = H(arguments).slice(1);
                        if (!z(this)) throw new TypeError("Function.prototype.bind called on a non-function");
                        return f = function() {
                            return d.apply(d.prototype && this instanceof d ? this : c, e.concat(H(arguments)))
                        }, g = function() {}, g.prototype = this.prototype, f.prototype = new g, f
                    }
                })
            }(),
            function() {
                var a = new t(t.UTC(1999, 11, 31));
                a = a.toISOString && "1999-12-31T00:00:00.000Z" === a.toISOString(), J(t, j, !a, "toISOString,toJSON", function(b, c) {
                    b[c] = function() {
                        return Q(this.getUTCFullYear(), 4) + "-" + Q(this.getUTCMonth() + 1, 2) + "-" + Q(this.getUTCDate(), 2) + "T" + Q(this.getUTCHours(), 2) + ":" + Q(this.getUTCMinutes(), 2) + ":" + Q(this.getUTCSeconds(), 2) + "." + Q(this.getUTCMilliseconds(), 3) + "Z"
                    }
                })
            }();
        var Db, Eb;
        G(u, j, m, {
                escapeRegExp: function() {
                    return R(this)
                },
                escapeURL: function(a) {
                    return a ? encodeURIComponent(this) : encodeURI(this)
                },
                unescapeURL: function(a) {
                    return a ? decodeURI(this) : decodeURIComponent(this)
                },
                escapeHTML: function() {
                    return this.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;")
                },
                unescapeHTML: function() {
                    return this.replace(/&lt;/g, "<").replace(/&gt;/g, ">").replace(/&amp;/g, "&")
                },
                encodeBase64: function() {
                    return Db(this)
                },
                decodeBase64: function() {
                    return Eb(this)
                },
                each: function(a, b) {
                    var c, d;
                    if (z(a) ? (b = a, a = /[\s\S]/g) : a ? E(a) ? a = s(R(a), "gi") : F(a) && (a = s(a.source, sa(a, "g"))) : a = /[\s\S]/g, c = this.match(a) || [], b)
                        for (d = 0; d < c.length; d++) c[d] = b.call(this, c[d], d, c) || c[d];
                    return c
                },
                shift: function(a) {
                    var b = "";
                    return a = a || 0, this.codes(function(c) {
                        b += u.fromCharCode(c + a)
                    }), b
                },
                codes: function(a) {
                    for (var b = [], c = 0; c < this.length; c++) {
                        var d = this.charCodeAt(c);
                        b.push(d), a && a.call(this, d, c)
                    }
                    return b
                },
                chars: function(a) {
                    return this.each(a)
                },
                words: function(a) {
                    return this.trim().each(/\S+/g, a)
                },
                lines: function(a) {
                    return this.trim().each(/^.*$/gm, a)
                },
                paragraphs: function(a) {
                    var b = this.trim().split(/[\r\n]{2,}/);
                    return b = b.map(function(c) {
                        if (a) var d = a.call(c);
                        return d ? d : c
                    })
                },
                startsWith: function(a, b) {
                    L(b) && (b = j);
                    var c = F(a) ? a.source.replace("^", "") : R(a);
                    return s("^" + c, b ? "" : "i").test(this)
                },
                endsWith: function(a, b) {
                    L(b) && (b = j);
                    var c = F(a) ? a.source.replace("$", "") : R(a);
                    return s(c + "$", b ? "" : "i").test(this)
                },
                isBlank: function() {
                    return 0 === this.trim().length
                },
                has: function(a) {
                    return -1 !== this.search(F(a) ? a : R(a))
                },
                add: function(a, b) {
                    return b = L(b) ? this.length : b, this.slice(0, b) + a + this.slice(b)
                },
                remove: function(a) {
                    return this.replace(a, "")
                },
                reverse: function() {
                    return this.split("").reverse().join("")
                },
                compact: function() {
                    return this.trim().replace(/([\r\n\s\u3000])+/g, function(a, b) {
                        return "\u3000" === b ? b : " "
                    })
                },
                at: function() {
                    return ta(this, arguments, j)
                },
                from: function(a) {
                    return this.slice(a)
                },
                to: function(a) {
                    return L(a) && (a = this.length), this.slice(0, a)
                },
                dasherize: function() {
                    return this.underscore().replace(/_/g, "-")
                },
                underscore: function() {
                    return this.replace(/[-\s]+/g, "_").replace(u.Inflector && u.Inflector.acronymRegExp, function(a, b) {
                        return (b > 0 ? "_" : "") + a.toLowerCase()
                    }).replace(/([A-Z\d]+)([A-Z][a-z])/g, "$1_$2").replace(/([a-z\d])([A-Z])/g, "$1_$2").toLowerCase()
                },
                camelize: function(a) {
                    return this.underscore().replace(/(^|_)([^_]+)/g, function(b, c, d, e) {
                        return b = d, b = (c = u.Inflector) && c.acronyms[b], b = E(b) ? b : void 0, e = a !== m || e > 0, b ? e ? b : b.toLowerCase() : e ? d.capitalize() : d
                    })
                },
                spacify: function() {
                    return this.underscore().replace(/_/g, " ")
                },
                stripTags: function() {
                    var a = this;
                    return H(arguments.length > 0 ? arguments : [""], function(b) {
                        a = a.replace(s("</?" + R(b) + "[^<>]*>", "gi"), "")
                    }), a
                },
                removeTags: function() {
                    var a = this;
                    return H(arguments.length > 0 ? arguments : ["\\S+"], function(b) {
                        b = s("<(" + b + ")[^<>]*(?:\\/>|>.*?<\\/\\1>)", "gi"), a = a.replace(b, "")
                    }), a
                },
                truncate: function(a, b, c, d) {
                    var e = "",
                        g = "",
                        f = this.toString(),
                        i = "[" + ra() + "]+",
                        h = "[^" + ra() + "]*",
                        l = s(i + h + "$");
                    if (d = L(d) ? "..." : u(d), f.length <= a) return f;
                    switch (c) {
                        case "left":
                            a = f.length - a, e = d, f = f.slice(a), l = s("^" + h + i);
                            break;
                        case "middle":
                            a = P(a / 2), g = d + f.slice(f.length - a).trimLeft(), f = f.slice(0, a);
                            break;
                        default:
                            a = a, g = d, f = f.slice(0, a)
                    }
                    return b === m && this.slice(a, a + 1).match(/\S/) && (f = f.remove(l)), e + f + g
                },
                pad: function(a, b) {
                    return oa(b, a) + this + oa(b, a)
                },
                padLeft: function(a, b) {
                    return oa(b, a) + this
                },
                padRight: function(a, b) {
                    return this + oa(b, a)
                },
                first: function(a) {
                    return L(a) && (a = 1), this.substr(0, a)
                },
                last: function(a) {
                    return L(a) && (a = 1), this.substr(this.length - a < 0 ? 0 : this.length - a)
                },
                repeat: function(a) {
                    var b = "",
                        c = 0;
                    if (D(a) && a > 0)
                        for (; a > c;) b += this, c++;
                    return b
                },
                toNumber: function(a) {
                    var b = this.replace(/,/g, "");
                    return b.match(/\./) ? parseFloat(b) : parseInt(b, a || 10)
                },
                capitalize: function(a) {
                    var b;
                    return this.toLowerCase().replace(a ? /[\s\S]/g : /^\S/, function(c) {
                        var e, d = c.toUpperCase();
                        return e = b ? c : d, b = d !== c, e
                    })
                },
                assign: function() {
                    var a = {};
                    return H(arguments, function(b, c) {
                        la(b) ? na(a, b) : a[c + 1] = b
                    }), this.replace(/\{([^{]+?)\}/g, function(b, c) {
                        return ma(a, c) ? a[c] : b
                    })
                },
                namespace: function(a) {
                    return a = a || ba, I(this.split("."), function(b, c) {
                        return !!(a = a[c])
                    }), a
                }
            }), G(u, j, m, {
                insert: u.prototype.add
            }),
            function(a) {
                if (this.btoa) Db = this.btoa, Eb = this.atob;
                else {
                    var b = /[^A-Za-z0-9\+\/\=]/g;
                    Db = function(c) {
                        var e, g, f, i, h, l, d = "",
                            n = 0;
                        do e = c.charCodeAt(n++), g = c.charCodeAt(n++), f = c.charCodeAt(n++), i = e >> 2, e = (3 & e) << 4 | g >> 4, h = (15 & g) << 2 | f >> 6, l = 63 & f, isNaN(g) ? h = l = 64 : isNaN(f) && (l = 64), d = d + a.charAt(i) + a.charAt(e) + a.charAt(h) + a.charAt(l); while (n < c.length);
                        return d
                    }, Eb = function(c) {
                        var e, g, f, i, h, d = "",
                            l = 0;
                        if (c.match(b)) throw Error("String contains invalid base64 characters");
                        c = c.replace(/[^A-Za-z0-9\+\/\=]/g, "");
                        do e = a.indexOf(c.charAt(l++)), g = a.indexOf(c.charAt(l++)), i = a.indexOf(c.charAt(l++)), h = a.indexOf(c.charAt(l++)), e = e << 2 | g >> 4, g = (15 & g) << 4 | i >> 2, f = (3 & i) << 6 | h, d += u.fromCharCode(e), 64 != i && (d += u.fromCharCode(g)), 64 != h && (d += u.fromCharCode(f)); while (l < c.length);
                        return d
                    }
                }
            }("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=");
        var Rb, Tb, Vb, Sb = "",
            Ub = [{
                type: "a",
                shift: 65248,
                start: 65,
                end: 90
            }, {
                type: "a",
                shift: 65248,
                start: 97,
                end: 122
            }, {
                type: "n",
                shift: 65248,
                start: 48,
                end: 57
            }, {
                type: "p",
                shift: 65248,
                start: 33,
                end: 47
            }, {
                type: "p",
                shift: 65248,
                start: 58,
                end: 64
            }, {
                type: "p",
                shift: 65248,
                start: 91,
                end: 96
            }, {
                type: "p",
                shift: 65248,
                start: 123,
                end: 126
            }],
            Wb = /[\u0020-\u00A5]|[\uFF61-\uFF9F][\uff9e\uff9f]?/g,
            Xb = /[\u3000-\u301C]|[\u301A-\u30FC]|[\uFF01-\uFF60]|[\uFFE0-\uFFE6]/g,
            Yb = "\uff61\uff64\uff62\uff63\xa5\xa2\xa3",
            Zb = "\u3002\u3001\u300c\u300d\uffe5\uffe0\uffe1",
            $b = /[\u30ab\u30ad\u30af\u30b1\u30b3\u30b5\u30b7\u30b9\u30bb\u30bd\u30bf\u30c1\u30c4\u30c6\u30c8\u30cf\u30d2\u30d5\u30d8\u30db]/,
            ac = /[\u30cf\u30d2\u30d5\u30d8\u30db\u30f2]/,
            bc = "\uff71\uff72\uff73\uff74\uff75\uff67\uff68\uff69\uff6a\uff6b\uff76\uff77\uff78\uff79\uff7a\uff7b\uff7c\uff7d\uff7e\uff7f\uff80\uff81\uff82\uff6f\uff83\uff84\uff85\uff86\uff87\uff88\uff89\uff8a\uff8b\uff8c\uff8d\uff8e\uff8f\uff90\uff91\uff92\uff93\uff94\uff6c\uff95\uff6d\uff96\uff6e\uff97\uff98\uff99\uff9a\uff9b\uff9c\uff66\uff9d\uff70\uff65",
            cc = "\u30a2\u30a4\u30a6\u30a8\u30aa\u30a1\u30a3\u30a5\u30a7\u30a9\u30ab\u30ad\u30af\u30b1\u30b3\u30b5\u30b7\u30b9\u30bb\u30bd\u30bf\u30c1\u30c4\u30c3\u30c6\u30c8\u30ca\u30cb\u30cc\u30cd\u30ce\u30cf\u30d2\u30d5\u30d8\u30db\u30de\u30df\u30e0\u30e1\u30e2\u30e4\u30e3\u30e6\u30e5\u30e8\u30e7\u30e9\u30ea\u30eb\u30ec\u30ed\u30ef\u30f2\u30f3\u30fc\u30fb";
        Tb = {
            A: "A\u24b6\uff21\xc0\xc1\xc2\u1ea6\u1ea4\u1eaa\u1ea8\xc3\u0100\u0102\u1eb0\u1eae\u1eb4\u1eb2\u0226\u01e0\xc4\u01de\u1ea2\xc5\u01fa\u01cd\u0200\u0202\u1ea0\u1eac\u1eb6\u1e00\u0104\u023a\u2c6f",
            B: "B\u24b7\uff22\u1e02\u1e04\u1e06\u0243\u0182\u0181",
            C: "C\u24b8\uff23\u0106\u0108\u010a\u010c\xc7\u1e08\u0187\u023b\ua73e",
            D: "D\u24b9\uff24\u1e0a\u010e\u1e0c\u1e10\u1e12\u1e0e\u0110\u018b\u018a\u0189\ua779",
            E: "E\u24ba\uff25\xc8\xc9\xca\u1ec0\u1ebe\u1ec4\u1ec2\u1ebc\u0112\u1e14\u1e16\u0114\u0116\xcb\u1eba\u011a\u0204\u0206\u1eb8\u1ec6\u0228\u1e1c\u0118\u1e18\u1e1a\u0190\u018e",
            F: "F\u24bb\uff26\u1e1e\u0191\ua77b",
            G: "G\u24bc\uff27\u01f4\u011c\u1e20\u011e\u0120\u01e6\u0122\u01e4\u0193\ua7a0\ua77d\ua77e",
            H: "H\u24bd\uff28\u0124\u1e22\u1e26\u021e\u1e24\u1e28\u1e2a\u0126\u2c67\u2c75\ua78d",
            I: "I\u24be\uff29\xcc\xcd\xce\u0128\u012a\u012c\u0130\xcf\u1e2e\u1ec8\u01cf\u0208\u020a\u1eca\u012e\u1e2c\u0197",
            J: "J\u24bf\uff2a\u0134\u0248",
            K: "K\u24c0\uff2b\u1e30\u01e8\u1e32\u0136\u1e34\u0198\u2c69\ua740\ua742\ua744\ua7a2",
            L: "L\u24c1\uff2c\u013f\u0139\u013d\u1e36\u1e38\u013b\u1e3c\u1e3a\u0141\u023d\u2c62\u2c60\ua748\ua746\ua780",
            M: "M\u24c2\uff2d\u1e3e\u1e40\u1e42\u2c6e\u019c",
            N: "N\u24c3\uff2e\u01f8\u0143\xd1\u1e44\u0147\u1e46\u0145\u1e4a\u1e48\u0220\u019d\ua790\ua7a4",
            O: "O\u24c4\uff2f\xd2\xd3\xd4\u1ed2\u1ed0\u1ed6\u1ed4\xd5\u1e4c\u022c\u1e4e\u014c\u1e50\u1e52\u014e\u022e\u0230\xd6\u022a\u1ece\u0150\u01d1\u020c\u020e\u01a0\u1edc\u1eda\u1ee0\u1ede\u1ee2\u1ecc\u1ed8\u01ea\u01ec\xd8\u01fe\u0186\u019f\ua74a\ua74c",
            P: "P\u24c5\uff30\u1e54\u1e56\u01a4\u2c63\ua750\ua752\ua754",
            Q: "Q\u24c6\uff31\ua756\ua758\u024a",
            R: "R\u24c7\uff32\u0154\u1e58\u0158\u0210\u0212\u1e5a\u1e5c\u0156\u1e5e\u024c\u2c64\ua75a\ua7a6\ua782",
            S: "S\u24c8\uff33\u1e9e\u015a\u1e64\u015c\u1e60\u0160\u1e66\u1e62\u1e68\u0218\u015e\u2c7e\ua7a8\ua784",
            T: "T\u24c9\uff34\u1e6a\u0164\u1e6c\u021a\u0162\u1e70\u1e6e\u0166\u01ac\u01ae\u023e\ua786",
            U: "U\u24ca\uff35\xd9\xda\xdb\u0168\u1e78\u016a\u1e7a\u016c\xdc\u01db\u01d7\u01d5\u01d9\u1ee6\u016e\u0170\u01d3\u0214\u0216\u01af\u1eea\u1ee8\u1eee\u1eec\u1ef0\u1ee4\u1e72\u0172\u1e76\u1e74\u0244",
            V: "V\u24cb\uff36\u1e7c\u1e7e\u01b2\ua75e\u0245",
            W: "W\u24cc\uff37\u1e80\u1e82\u0174\u1e86\u1e84\u1e88\u2c72",
            X: "X\u24cd\uff38\u1e8a\u1e8c",
            Y: "Y\u24ce\uff39\u1ef2\xdd\u0176\u1ef8\u0232\u1e8e\u0178\u1ef6\u1ef4\u01b3\u024e\u1efe",
            Z: "Z\u24cf\uff3a\u0179\u1e90\u017b\u017d\u1e92\u1e94\u01b5\u0224\u2c7f\u2c6b\ua762",
            a: "a\u24d0\uff41\u1e9a\xe0\xe1\xe2\u1ea7\u1ea5\u1eab\u1ea9\xe3\u0101\u0103\u1eb1\u1eaf\u1eb5\u1eb3\u0227\u01e1\xe4\u01df\u1ea3\xe5\u01fb\u01ce\u0201\u0203\u1ea1\u1ead\u1eb7\u1e01\u0105\u2c65\u0250",
            b: "b\u24d1\uff42\u1e03\u1e05\u1e07\u0180\u0183\u0253",
            c: "c\u24d2\uff43\u0107\u0109\u010b\u010d\xe7\u1e09\u0188\u023c\ua73f\u2184",
            d: "d\u24d3\uff44\u1e0b\u010f\u1e0d\u1e11\u1e13\u1e0f\u0111\u018c\u0256\u0257\ua77a",
            e: "e\u24d4\uff45\xe8\xe9\xea\u1ec1\u1ebf\u1ec5\u1ec3\u1ebd\u0113\u1e15\u1e17\u0115\u0117\xeb\u1ebb\u011b\u0205\u0207\u1eb9\u1ec7\u0229\u1e1d\u0119\u1e19\u1e1b\u0247\u025b\u01dd",
            f: "f\u24d5\uff46\u1e1f\u0192\ua77c",
            g: "g\u24d6\uff47\u01f5\u011d\u1e21\u011f\u0121\u01e7\u0123\u01e5\u0260\ua7a1\u1d79\ua77f",
            h: "h\u24d7\uff48\u0125\u1e23\u1e27\u021f\u1e25\u1e29\u1e2b\u1e96\u0127\u2c68\u2c76\u0265",
            i: "i\u24d8\uff49\xec\xed\xee\u0129\u012b\u012d\xef\u1e2f\u1ec9\u01d0\u0209\u020b\u1ecb\u012f\u1e2d\u0268\u0131",
            j: "j\u24d9\uff4a\u0135\u01f0\u0249",
            k: "k\u24da\uff4b\u1e31\u01e9\u1e33\u0137\u1e35\u0199\u2c6a\ua741\ua743\ua745\ua7a3",
            l: "l\u24db\uff4c\u0140\u013a\u013e\u1e37\u1e39\u013c\u1e3d\u1e3b\u017f\u0142\u019a\u026b\u2c61\ua749\ua781\ua747",
            m: "m\u24dc\uff4d\u1e3f\u1e41\u1e43\u0271\u026f",
            n: "n\u24dd\uff4e\u01f9\u0144\xf1\u1e45\u0148\u1e47\u0146\u1e4b\u1e49\u019e\u0272\u0149\ua791\ua7a5",
            o: "o\u24de\uff4f\xf2\xf3\xf4\u1ed3\u1ed1\u1ed7\u1ed5\xf5\u1e4d\u022d\u1e4f\u014d\u1e51\u1e53\u014f\u022f\u0231\xf6\u022b\u1ecf\u0151\u01d2\u020d\u020f\u01a1\u1edd\u1edb\u1ee1\u1edf\u1ee3\u1ecd\u1ed9\u01eb\u01ed\xf8\u01ff\u0254\ua74b\ua74d\u0275",
            p: "p\u24df\uff50\u1e55\u1e57\u01a5\u1d7d\ua751\ua753\ua755",
            q: "q\u24e0\uff51\u024b\ua757\ua759",
            r: "r\u24e1\uff52\u0155\u1e59\u0159\u0211\u0213\u1e5b\u1e5d\u0157\u1e5f\u024d\u027d\ua75b\ua7a7\ua783",
            s: "s\u24e2\uff53\u015b\u1e65\u015d\u1e61\u0161\u1e67\u1e63\u1e69\u0219\u015f\u023f\ua7a9\ua785\u1e9b",
            t: "t\u24e3\uff54\u1e6b\u1e97\u0165\u1e6d\u021b\u0163\u1e71\u1e6f\u0167\u01ad\u0288\u2c66\ua787",
            u: "u\u24e4\uff55\xf9\xfa\xfb\u0169\u1e79\u016b\u1e7b\u016d\xfc\u01dc\u01d8\u01d6\u01da\u1ee7\u016f\u0171\u01d4\u0215\u0217\u01b0\u1eeb\u1ee9\u1eef\u1eed\u1ef1\u1ee5\u1e73\u0173\u1e77\u1e75\u0289",
            v: "v\u24e5\uff56\u1e7d\u1e7f\u028b\ua75f\u028c",
            w: "w\u24e6\uff57\u1e81\u1e83\u0175\u1e87\u1e85\u1e98\u1e89\u2c73",
            x: "x\u24e7\uff58\u1e8b\u1e8d",
            y: "y\u24e8\uff59\u1ef3\xfd\u0177\u1ef9\u0233\u1e8f\xff\u1ef7\u1e99\u1ef5\u01b4\u024f\u1eff",
            z: "z\u24e9\uff5a\u017a\u1e91\u017c\u017e\u1e93\u1e95\u01b6\u0225\u0240\u2c6c\ua763",
            AA: "\ua732",
            AE: "\xc6\u01fc\u01e2",
            AO: "\ua734",
            AU: "\ua736",
            AV: "\ua738\ua73a",
            AY: "\ua73c",
            DZ: "\u01f1\u01c4",
            Dz: "\u01f2\u01c5",
            LJ: "\u01c7",
            Lj: "\u01c8",
            NJ: "\u01ca",
            Nj: "\u01cb",
            OI: "\u01a2",
            OO: "\ua74e",
            OU: "\u0222",
            TZ: "\ua728",
            VY: "\ua760",
            aa: "\ua733",
            ae: "\xe6\u01fd\u01e3",
            ao: "\ua735",
            au: "\ua737",
            av: "\ua739\ua73b",
            ay: "\ua73d",
            dz: "\u01f3\u01c6",
            hv: "\u0195",
            lj: "\u01c9",
            nj: "\u01cc",
            oi: "\u01a3",
            ou: "\u0223",
            oo: "\ua74f",
            ss: "\xdf",
            tz: "\ua729",
            vy: "\ua761"
        }, G(u, j, m, {
            normalize: function() {
                return Rb || fc(), this.replace(Sb, function(a) {
                    return Rb[a]
                })
            },
            hankaku: function() {
                return dc(this, arguments, Xb, "hankaku")
            },
            zenkaku: function() {
                return dc(this, arguments, Wb, "zenkaku")
            },
            hiragana: function(a) {
                var b = this;
                return a !== m && (b = b.zenkaku("k")), b.replace(/[\u30A1-\u30F6]/g, function(c) {
                    return c.shift(-96)
                })
            },
            katakana: function() {
                return this.replace(/[\u3041-\u3096]/g, function(a) {
                    return a.shift(96)
                })
            }
        }), [{
            ca: ["Arabic"],
            source: "\u0600-\u06ff"
        }, {
            ca: ["Cyrillic"],
            source: "\u0400-\u04ff"
        }, {
            ca: ["Devanagari"],
            source: "\u0900-\u097f"
        }, {
            ca: ["Greek"],
            source: "\u0370-\u03ff"
        }, {
            ca: ["Hangul"],
            source: "\uac00-\ud7af\u1100-\u11ff"
        }, {
            ca: ["Han", "Kanji"],
            source: "\u4e00-\u9fff\uf900-\ufaff"
        }, {
            ca: ["Hebrew"],
            source: "\u0590-\u05ff"
        }, {
            ca: ["Hiragana"],
            source: "\u3040-\u309f\u30fb-\u30fc"
        }, {
            ca: ["Kana"],
            source: "\u3040-\u30ff\uff61-\uff9f"
        }, {
            ca: ["Katakana"],
            source: "\u30a0-\u30ff\uff61-\uff9f"
        }, {
            ca: ["Latin"],
            source: "-\x80-\xff\u0100-\u017f\u0180-\u024f"
        }, {
            ca: ["Thai"],
            source: "\u0e00-\u0e7f"
        }].forEach(function(a) {
            var b = s("^[" + a.source + "\\s]+$"),
                c = s("[" + a.source + "]");
            a.ca.forEach(function(d) {
                ia(u.prototype, "is" + d, function() {
                    return b.test(this.trim())
                }), ia(u.prototype, "has" + d, function() {
                    return c.test(this)
                })
            })
        })
    }();

var _gaq = _gaq || [];
_gaq.push(["_setAccount", "UA-XXXXXXXX-X"]), _gaq.push(["_setDomainName", "stores.jp"]), "undefined" != typeof AUTHENTICATED && _gaq.push(["_setCustomVar", 2, "authenticated", AUTHENTICATED, 1]), _gaq.push(["_trackPageview", decodeURI(location.pathname + location.search + location.hash)]),
    function() {
        var ga = document.createElement("script");
        ga.type = "text/javascript", ga.async = !0, ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(ga, s)
    }(),
    function() {
        var module = angular.module("StoresJpAddon", ["ngResource"]);
        module.directive("spInclude", ["$compile", "storesJpAddonUtility", function($compile, util) {
            return {
                restrict: "E",
                link: function(scope, element, attrs) {
                    util.isEnableAddon(attrs.addon) !== !1 && element.html($compile('<div ng-include="' + attrs.template + '" ng-controller="' + attrs.controller + '"></div>')(scope))
                }
            }
        }]), module.directive("spGrip", ["storesJpAddonUtility", function(Util) {
            return {
                restrict: "AE",
                scope: !0,
                replace: !0,
                compile: function(element, attrs) {
                    return element.html(attrs.mobile ? '<div class="switch" ng-click="toggleAddon()"><p class="status first" ng-class="{active: !isEnableAddon(), deactive: isEnableAddon()}">OFF</p><p class="status second" ng-class="{active: isEnableAddon(), deactive: !isEnableAddon()}">ON</p></div>' : '<div class="switch" ng-click="toggleAddon()"><p class="status active" ng-show="isEnableAddon()">ON</p><p class="status deactive" ng-hide="isEnableAddon()">OFF</p><p class="grip"></p></div>'),
                        function(scope, element, attrs) {
                            scope.addon = attrs.addon, scope.isEnableAddon = function() {
                                return Util.isEnableAddon(scope.addon)
                            }, scope.toggleAddon = function() {
                                if (scope.isEnableAddon()) Util.disableAddon(scope.addon);
                                else {
                                    if ("free" === STORES_JP.plan && attrs.premium && (!scope.user_info.mybook_user || scope.user_info.mybook_user && "secret" !== scope.addon)) return void $("#popup_premium_button a").click();
                                    if ("detail_shipping_fee" === scope.addon) return void $("#popup_alert_shipping_button a").click();
                                    Util.enableAddon(scope.addon).then(null, function(res) {
                                        403 === res.status ? $("#popup_premium_button a").click() : 422 === res.status && res.data.errors && _.has(res.data.errors, "mybook_english") && alert(res.data.errors.mybook_english)
                                    })
                                }
                            }, scope.$watch("isEnableAddon()", function(v) {
                                element.find($("p.grip")).animate({
                                    left: v ? "57px" : "2px"
                                }, "fast", "swing")
                            })
                        }
                }
            }
        }]), module.directive("spShow", ["storesJpAddonUtility", function(util) {
            return {
                link: function(scope, element, attrs) {
                    scope.$watch(function() {
                        return util.isEnableAddon(attrs.spShow || attrs.addon)
                    }, function(v) {
                        v ? element.show() : element.hide()
                    })
                }
            }
        }]), module.directive("spHide", ["storesJpAddonUtility", function(util) {
            return {
                link: function(scope, element, attrs) {
                    util.isEnableAddon(attrs.spHide || attrs.addon) ? element.hide() : element.show()
                }
            }
        }]), module.directive("spIf", ["storesJpAddonUtility", function(util) {
            return {
                compile: function(element, attrs) {
                    util.isEnableAddon(attrs.spIf || attrs.addon) === !1 && element.remove()
                }
            }
        }]), module.directive("spController", ["$controller", "storesJpAddonUtility", function($controller, util) {
            return {
                link: function(scope, element, attrs) {
                    util.isEnableAddon(attrs.addon) !== !1 && $controller(attrs.spController, {
                        $scope: scope
                    })
                }
            }
        }]), module.factory("Addon", ["$resource", function($resource) {
            return $resource("/store_addons/:addon", {
                addon: "@addon"
            }, {
                update: {
                    method: "PUT"
                }
            })
        }]), module.factory("storesJpAddonUtility", ["$q", "Addon", function($q, Addon) {
            function isEnableAddon(addon) {
                return $.inArray(addon, addons) >= 0
            }

            function enableAddons() {
                return addons
            }

            function enableAddon(addon_key) {
                var delay = $q.defer(),
                    addon = new Addon({
                        addon: addon_key
                    });
                return addon.$update(function(data) {
                    addons = data.addons, delay.resolve(data.addons)
                }, function(data) {
                    delay.reject(data)
                }), delay.promise
            }

            function disableAddon(addon_key) {
                var delay = $q.defer(),
                    addon = new Addon({
                        addon: addon_key
                    });
                return addon.$remove(function() {
                    addons = _.without(addons, addon_key), delay.resolve(addons)
                }, function() {
                    delay.reject("delete addon error")
                }), delay.promise
            }
            var addons = STORES_JP.enable_addons || [];
            return {
                isEnableAddon: isEnableAddon,
                enableAddons: enableAddons,
                enableAddon: enableAddon,
                disableAddon: disableAddon
            }
        }]), module.run(["$rootScope", "$location", "storesJpAddonUtility", function($rootScope, $location, util) {
            $rootScope.$on("$routeChangeStart", function(scope, next) {
                next.$route.requiredAddon && util.isEnableAddon(next.$route.requiredAddon) === !1 && $location.url("/")
            })
        }])
    }(),
    /*! jQuery UI - v1.10.3 - 2013-10-20
     * http://jqueryui.com
     * Includes: jquery.ui.core.js, jquery.ui.widget.js, jquery.ui.mouse.js, jquery.ui.position.js, jquery.ui.draggable.js, jquery.ui.droppable.js, jquery.ui.resizable.js, jquery.ui.selectable.js, jquery.ui.sortable.js, jquery.ui.accordion.js, jquery.ui.autocomplete.js, jquery.ui.button.js, jquery.ui.datepicker.js, jquery.ui.dialog.js, jquery.ui.menu.js, jquery.ui.progressbar.js, jquery.ui.slider.js, jquery.ui.spinner.js, jquery.ui.tabs.js, jquery.ui.tooltip.js, jquery.ui.effect.js, jquery.ui.effect-blind.js, jquery.ui.effect-bounce.js, jquery.ui.effect-clip.js, jquery.ui.effect-drop.js, jquery.ui.effect-explode.js, jquery.ui.effect-fade.js, jquery.ui.effect-fold.js, jquery.ui.effect-highlight.js, jquery.ui.effect-pulsate.js, jquery.ui.effect-scale.js, jquery.ui.effect-shake.js, jquery.ui.effect-slide.js, jquery.ui.effect-transfer.js
     * Copyright 2013 jQuery Foundation and other contributors; Licensed MIT */
    function(e, t) {
        function i(t, i) {
            var s, n, r, o = t.nodeName.toLowerCase();
            return "area" === o ? (s = t.parentNode, n = s.name, t.href && n && "map" === s.nodeName.toLowerCase() ? (r = e("img[usemap=#" + n + "]")[0], !!r && a(r)) : !1) : (/input|select|textarea|button|object/.test(o) ? !t.disabled : "a" === o ? t.href || i : i) && a(t)
        }

        function a(t) {
            return e.expr.filters.visible(t) && !e(t).parents().addBack().filter(function() {
                return "hidden" === e.css(this, "visibility")
            }).length
        }
        var s = 0,
            n = /^ui-id-\d+$/;
        e.ui = e.ui || {}, e.extend(e.ui, {
            version: "1.10.3",
            keyCode: {
                BACKSPACE: 8,
                COMMA: 188,
                DELETE: 46,
                DOWN: 40,
                END: 35,
                ENTER: 13,
                ESCAPE: 27,
                HOME: 36,
                LEFT: 37,
                NUMPAD_ADD: 107,
                NUMPAD_DECIMAL: 110,
                NUMPAD_DIVIDE: 111,
                NUMPAD_ENTER: 108,
                NUMPAD_MULTIPLY: 106,
                NUMPAD_SUBTRACT: 109,
                PAGE_DOWN: 34,
                PAGE_UP: 33,
                PERIOD: 190,
                RIGHT: 39,
                SPACE: 32,
                TAB: 9,
                UP: 38
            }
        }), e.fn.extend({
            focus: function(t) {
                return function(i, a) {
                    return "number" == typeof i ? this.each(function() {
                        var t = this;
                        setTimeout(function() {
                            e(t).focus(), a && a.call(t)
                        }, i)
                    }) : t.apply(this, arguments)
                }
            }(e.fn.focus),
            scrollParent: function() {
                var t;
                return t = e.ui.ie && /(static|relative)/.test(this.css("position")) || /absolute/.test(this.css("position")) ? this.parents().filter(function() {
                    return /(relative|absolute|fixed)/.test(e.css(this, "position")) && /(auto|scroll)/.test(e.css(this, "overflow") + e.css(this, "overflow-y") + e.css(this, "overflow-x"))
                }).eq(0) : this.parents().filter(function() {
                    return /(auto|scroll)/.test(e.css(this, "overflow") + e.css(this, "overflow-y") + e.css(this, "overflow-x"))
                }).eq(0), /fixed/.test(this.css("position")) || !t.length ? e(document) : t
            },
            zIndex: function(i) {
                if (i !== t) return this.css("zIndex", i);
                if (this.length)
                    for (var a, s, n = e(this[0]); n.length && n[0] !== document;) {
                        if (a = n.css("position"), ("absolute" === a || "relative" === a || "fixed" === a) && (s = parseInt(n.css("zIndex"), 10), !isNaN(s) && 0 !== s)) return s;
                        n = n.parent()
                    }
                return 0
            },
            uniqueId: function() {
                return this.each(function() {
                    this.id || (this.id = "ui-id-" + ++s)
                })
            },
            removeUniqueId: function() {
                return this.each(function() {
                    n.test(this.id) && e(this).removeAttr("id")
                })
            }
        }), e.extend(e.expr[":"], {
            data: e.expr.createPseudo ? e.expr.createPseudo(function(t) {
                return function(i) {
                    return !!e.data(i, t)
                }
            }) : function(t, i, a) {
                return !!e.data(t, a[3])
            },
            focusable: function(t) {
                return i(t, !isNaN(e.attr(t, "tabindex")))
            },
            tabbable: function(t) {
                var a = e.attr(t, "tabindex"),
                    s = isNaN(a);
                return (s || a >= 0) && i(t, !s)
            }
        }), e("<a>").outerWidth(1).jquery || e.each(["Width", "Height"], function(i, a) {
            function s(t, i, a, s) {
                return e.each(n, function() {
                    i -= parseFloat(e.css(t, "padding" + this)) || 0, a && (i -= parseFloat(e.css(t, "border" + this + "Width")) || 0), s && (i -= parseFloat(e.css(t, "margin" + this)) || 0)
                }), i
            }
            var n = "Width" === a ? ["Left", "Right"] : ["Top", "Bottom"],
                r = a.toLowerCase(),
                o = {
                    innerWidth: e.fn.innerWidth,
                    innerHeight: e.fn.innerHeight,
                    outerWidth: e.fn.outerWidth,
                    outerHeight: e.fn.outerHeight
                };
            e.fn["inner" + a] = function(i) {
                return i === t ? o["inner" + a].call(this) : this.each(function() {
                    e(this).css(r, s(this, i) + "px")
                })
            }, e.fn["outer" + a] = function(t, i) {
                return "number" != typeof t ? o["outer" + a].call(this, t) : this.each(function() {
                    e(this).css(r, s(this, t, !0, i) + "px")
                })
            }
        }), e.fn.addBack || (e.fn.addBack = function(e) {
            return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
        }), e("<a>").data("a-b", "a").removeData("a-b").data("a-b") && (e.fn.removeData = function(t) {
            return function(i) {
                return arguments.length ? t.call(this, e.camelCase(i)) : t.call(this)
            }
        }(e.fn.removeData)), e.ui.ie = !!/msie [\w.]+/.exec(navigator.userAgent.toLowerCase()), e.support.selectstart = "onselectstart" in document.createElement("div"), e.fn.extend({
            disableSelection: function() {
                return this.bind((e.support.selectstart ? "selectstart" : "mousedown") + ".ui-disableSelection", function(e) {
                    e.preventDefault()
                })
            },
            enableSelection: function() {
                return this.unbind(".ui-disableSelection")
            }
        }), e.extend(e.ui, {
            plugin: {
                add: function(t, i, a) {
                    var s, n = e.ui[t].prototype;
                    for (s in a) n.plugins[s] = n.plugins[s] || [], n.plugins[s].push([i, a[s]])
                },
                call: function(e, t, i) {
                    var a, s = e.plugins[t];
                    if (s && e.element[0].parentNode && 11 !== e.element[0].parentNode.nodeType)
                        for (a = 0; s.length > a; a++) e.options[s[a][0]] && s[a][1].apply(e.element, i)
                }
            },
            hasScroll: function(t, i) {
                if ("hidden" === e(t).css("overflow")) return !1;
                var a = i && "left" === i ? "scrollLeft" : "scrollTop",
                    s = !1;
                return t[a] > 0 ? !0 : (t[a] = 1, s = t[a] > 0, t[a] = 0, s)
            }
        })
    }(jQuery),
    function(e, t) {
        var i = 0,
            s = Array.prototype.slice,
            a = e.cleanData;
        e.cleanData = function(t) {
            for (var i, s = 0; null != (i = t[s]); s++) try {
                e(i).triggerHandler("remove")
            } catch (n) {}
            a(t)
        }, e.widget = function(i, s, a) {
            var n, r, o, h, l = {},
                u = i.split(".")[0];
            i = i.split(".")[1], n = u + "-" + i, a || (a = s, s = e.Widget), e.expr[":"][n.toLowerCase()] = function(t) {
                return !!e.data(t, n)
            }, e[u] = e[u] || {}, r = e[u][i], o = e[u][i] = function(e, i) {
                return this._createWidget ? (arguments.length && this._createWidget(e, i), t) : new o(e, i)
            }, e.extend(o, r, {
                version: a.version,
                _proto: e.extend({}, a),
                _childConstructors: []
            }), h = new s, h.options = e.widget.extend({}, h.options), e.each(a, function(i, a) {
                return e.isFunction(a) ? (l[i] = function() {
                    var e = function() {
                            return s.prototype[i].apply(this, arguments)
                        },
                        t = function(e) {
                            return s.prototype[i].apply(this, e)
                        };
                    return function() {
                        var i, s = this._super,
                            n = this._superApply;
                        return this._super = e, this._superApply = t, i = a.apply(this, arguments), this._super = s, this._superApply = n, i
                    }
                }(), t) : (l[i] = a, t)
            }), o.prototype = e.widget.extend(h, {
                widgetEventPrefix: r ? h.widgetEventPrefix : i
            }, l, {
                constructor: o,
                namespace: u,
                widgetName: i,
                widgetFullName: n
            }), r ? (e.each(r._childConstructors, function(t, i) {
                var s = i.prototype;
                e.widget(s.namespace + "." + s.widgetName, o, i._proto)
            }), delete r._childConstructors) : s._childConstructors.push(o), e.widget.bridge(i, o)
        }, e.widget.extend = function(i) {
            for (var a, n, r = s.call(arguments, 1), o = 0, h = r.length; h > o; o++)
                for (a in r[o]) n = r[o][a], r[o].hasOwnProperty(a) && n !== t && (i[a] = e.isPlainObject(n) ? e.isPlainObject(i[a]) ? e.widget.extend({}, i[a], n) : e.widget.extend({}, n) : n);
            return i
        }, e.widget.bridge = function(i, a) {
            var n = a.prototype.widgetFullName || i;
            e.fn[i] = function(r) {
                var o = "string" == typeof r,
                    h = s.call(arguments, 1),
                    l = this;
                return r = !o && h.length ? e.widget.extend.apply(null, [r].concat(h)) : r, this.each(o ? function() {
                    var s, a = e.data(this, n);
                    return a ? e.isFunction(a[r]) && "_" !== r.charAt(0) ? (s = a[r].apply(a, h), s !== a && s !== t ? (l = s && s.jquery ? l.pushStack(s.get()) : s, !1) : t) : e.error("no such method '" + r + "' for " + i + " widget instance") : e.error("cannot call methods on " + i + " prior to initialization; attempted to call method '" + r + "'")
                } : function() {
                    var t = e.data(this, n);
                    t ? t.option(r || {})._init() : e.data(this, n, new a(r, this))
                }), l
            }
        }, e.Widget = function() {}, e.Widget._childConstructors = [], e.Widget.prototype = {
            widgetName: "widget",
            widgetEventPrefix: "",
            defaultElement: "<div>",
            options: {
                disabled: !1,
                create: null
            },
            _createWidget: function(t, s) {
                s = e(s || this.defaultElement || this)[0], this.element = e(s), this.uuid = i++, this.eventNamespace = "." + this.widgetName + this.uuid, this.options = e.widget.extend({}, this.options, this._getCreateOptions(), t), this.bindings = e(), this.hoverable = e(), this.focusable = e(), s !== this && (e.data(s, this.widgetFullName, this), this._on(!0, this.element, {
                    remove: function(e) {
                        e.target === s && this.destroy()
                    }
                }), this.document = e(s.style ? s.ownerDocument : s.document || s), this.window = e(this.document[0].defaultView || this.document[0].parentWindow)), this._create(), this._trigger("create", null, this._getCreateEventData()), this._init()
            },
            _getCreateOptions: e.noop,
            _getCreateEventData: e.noop,
            _create: e.noop,
            _init: e.noop,
            destroy: function() {
                this._destroy(), this.element.unbind(this.eventNamespace).removeData(this.widgetName).removeData(this.widgetFullName).removeData(e.camelCase(this.widgetFullName)), this.widget().unbind(this.eventNamespace).removeAttr("aria-disabled").removeClass(this.widgetFullName + "-disabled ui-state-disabled"), this.bindings.unbind(this.eventNamespace), this.hoverable.removeClass("ui-state-hover"), this.focusable.removeClass("ui-state-focus")
            },
            _destroy: e.noop,
            widget: function() {
                return this.element
            },
            option: function(i, s) {
                var a, n, r, o = i;
                if (0 === arguments.length) return e.widget.extend({}, this.options);
                if ("string" == typeof i)
                    if (o = {}, a = i.split("."), i = a.shift(), a.length) {
                        for (n = o[i] = e.widget.extend({}, this.options[i]), r = 0; a.length - 1 > r; r++) n[a[r]] = n[a[r]] || {}, n = n[a[r]];
                        if (i = a.pop(), s === t) return n[i] === t ? null : n[i];
                        n[i] = s
                    } else {
                        if (s === t) return this.options[i] === t ? null : this.options[i];
                        o[i] = s
                    }
                return this._setOptions(o), this
            },
            _setOptions: function(e) {
                var t;
                for (t in e) this._setOption(t, e[t]);
                return this
            },
            _setOption: function(e, t) {
                return this.options[e] = t, "disabled" === e && (this.widget().toggleClass(this.widgetFullName + "-disabled ui-state-disabled", !!t).attr("aria-disabled", t), this.hoverable.removeClass("ui-state-hover"), this.focusable.removeClass("ui-state-focus")), this
            },
            enable: function() {
                return this._setOption("disabled", !1)
            },
            disable: function() {
                return this._setOption("disabled", !0)
            },
            _on: function(i, s, a) {
                var n, r = this;
                "boolean" != typeof i && (a = s, s = i, i = !1), a ? (s = n = e(s), this.bindings = this.bindings.add(s)) : (a = s, s = this.element, n = this.widget()), e.each(a, function(a, o) {
                    function h() {
                        return i || r.options.disabled !== !0 && !e(this).hasClass("ui-state-disabled") ? ("string" == typeof o ? r[o] : o).apply(r, arguments) : t
                    }
                    "string" != typeof o && (h.guid = o.guid = o.guid || h.guid || e.guid++);
                    var l = a.match(/^(\w+)\s*(.*)$/),
                        u = l[1] + r.eventNamespace,
                        c = l[2];
                    c ? n.delegate(c, u, h) : s.bind(u, h)
                })
            },
            _off: function(e, t) {
                t = (t || "").split(" ").join(this.eventNamespace + " ") + this.eventNamespace, e.unbind(t).undelegate(t)
            },
            _delay: function(e, t) {
                function i() {
                    return ("string" == typeof e ? s[e] : e).apply(s, arguments)
                }
                var s = this;
                return setTimeout(i, t || 0)
            },
            _hoverable: function(t) {
                this.hoverable = this.hoverable.add(t), this._on(t, {
                    mouseenter: function(t) {
                        e(t.currentTarget).addClass("ui-state-hover")
                    },
                    mouseleave: function(t) {
                        e(t.currentTarget).removeClass("ui-state-hover")
                    }
                })
            },
            _focusable: function(t) {
                this.focusable = this.focusable.add(t), this._on(t, {
                    focusin: function(t) {
                        e(t.currentTarget).addClass("ui-state-focus")
                    },
                    focusout: function(t) {
                        e(t.currentTarget).removeClass("ui-state-focus")
                    }
                })
            },
            _trigger: function(t, i, s) {
                var a, n, r = this.options[t];
                if (s = s || {}, i = e.Event(i), i.type = (t === this.widgetEventPrefix ? t : this.widgetEventPrefix + t).toLowerCase(), i.target = this.element[0], n = i.originalEvent)
                    for (a in n) a in i || (i[a] = n[a]);
                return this.element.trigger(i, s), !(e.isFunction(r) && r.apply(this.element[0], [i].concat(s)) === !1 || i.isDefaultPrevented())
            }
        }, e.each({
            show: "fadeIn",
            hide: "fadeOut"
        }, function(t, i) {
            e.Widget.prototype["_" + t] = function(s, a, n) {
                "string" == typeof a && (a = {
                    effect: a
                });
                var r, o = a ? a === !0 || "number" == typeof a ? i : a.effect || i : t;
                a = a || {}, "number" == typeof a && (a = {
                    duration: a
                }), r = !e.isEmptyObject(a), a.complete = n, a.delay && s.delay(a.delay), r && e.effects && e.effects.effect[o] ? s[t](a) : o !== t && s[o] ? s[o](a.duration, a.easing, n) : s.queue(function(i) {
                    e(this)[t](), n && n.call(s[0]), i()
                })
            }
        })
    }(jQuery),
    function(e) {
        var t = !1;
        e(document).mouseup(function() {
            t = !1
        }), e.widget("ui.mouse", {
            version: "1.10.3",
            options: {
                cancel: "input,textarea,button,select,option",
                distance: 1,
                delay: 0
            },
            _mouseInit: function() {
                var t = this;
                this.element.bind("mousedown." + this.widgetName, function(e) {
                    return t._mouseDown(e)
                }).bind("click." + this.widgetName, function(i) {
                    return !0 === e.data(i.target, t.widgetName + ".preventClickEvent") ? (e.removeData(i.target, t.widgetName + ".preventClickEvent"), i.stopImmediatePropagation(), !1) : void 0
                }), this.started = !1
            },
            _mouseDestroy: function() {
                this.element.unbind("." + this.widgetName), this._mouseMoveDelegate && e(document).unbind("mousemove." + this.widgetName, this._mouseMoveDelegate).unbind("mouseup." + this.widgetName, this._mouseUpDelegate)
            },
            _mouseDown: function(i) {
                if (!t) {
                    this._mouseStarted && this._mouseUp(i), this._mouseDownEvent = i;
                    var s = this,
                        a = 1 === i.which,
                        n = "string" == typeof this.options.cancel && i.target.nodeName ? e(i.target).closest(this.options.cancel).length : !1;
                    return a && !n && this._mouseCapture(i) ? (this.mouseDelayMet = !this.options.delay, this.mouseDelayMet || (this._mouseDelayTimer = setTimeout(function() {
                        s.mouseDelayMet = !0
                    }, this.options.delay)), this._mouseDistanceMet(i) && this._mouseDelayMet(i) && (this._mouseStarted = this._mouseStart(i) !== !1, !this._mouseStarted) ? (i.preventDefault(), !0) : (!0 === e.data(i.target, this.widgetName + ".preventClickEvent") && e.removeData(i.target, this.widgetName + ".preventClickEvent"), this._mouseMoveDelegate = function(e) {
                        return s._mouseMove(e)
                    }, this._mouseUpDelegate = function(e) {
                        return s._mouseUp(e)
                    }, e(document).bind("mousemove." + this.widgetName, this._mouseMoveDelegate).bind("mouseup." + this.widgetName, this._mouseUpDelegate), i.preventDefault(), t = !0, !0)) : !0
                }
            },
            _mouseMove: function(t) {
                return e.ui.ie && (!document.documentMode || 9 > document.documentMode) && !t.button ? this._mouseUp(t) : this._mouseStarted ? (this._mouseDrag(t), t.preventDefault()) : (this._mouseDistanceMet(t) && this._mouseDelayMet(t) && (this._mouseStarted = this._mouseStart(this._mouseDownEvent, t) !== !1, this._mouseStarted ? this._mouseDrag(t) : this._mouseUp(t)), !this._mouseStarted)
            },
            _mouseUp: function(t) {
                return e(document).unbind("mousemove." + this.widgetName, this._mouseMoveDelegate).unbind("mouseup." + this.widgetName, this._mouseUpDelegate), this._mouseStarted && (this._mouseStarted = !1, t.target === this._mouseDownEvent.target && e.data(t.target, this.widgetName + ".preventClickEvent", !0), this._mouseStop(t)), !1
            },
            _mouseDistanceMet: function(e) {
                return Math.max(Math.abs(this._mouseDownEvent.pageX - e.pageX), Math.abs(this._mouseDownEvent.pageY - e.pageY)) >= this.options.distance
            },
            _mouseDelayMet: function() {
                return this.mouseDelayMet
            },
            _mouseStart: function() {},
            _mouseDrag: function() {},
            _mouseStop: function() {},
            _mouseCapture: function() {
                return !0
            }
        })
    }(jQuery),
    function(e, t) {
        function i(e, t, i) {
            return [parseFloat(e[0]) * (p.test(e[0]) ? t / 100 : 1), parseFloat(e[1]) * (p.test(e[1]) ? i / 100 : 1)]
        }

        function s(t, i) {
            return parseInt(e.css(t, i), 10) || 0
        }

        function a(t) {
            var i = t[0];
            return 9 === i.nodeType ? {
                width: t.width(),
                height: t.height(),
                offset: {
                    top: 0,
                    left: 0
                }
            } : e.isWindow(i) ? {
                width: t.width(),
                height: t.height(),
                offset: {
                    top: t.scrollTop(),
                    left: t.scrollLeft()
                }
            } : i.preventDefault ? {
                width: 0,
                height: 0,
                offset: {
                    top: i.pageY,
                    left: i.pageX
                }
            } : {
                width: t.outerWidth(),
                height: t.outerHeight(),
                offset: t.offset()
            }
        }
        e.ui = e.ui || {};
        var n, r = Math.max,
            o = Math.abs,
            h = Math.round,
            l = /left|center|right/,
            u = /top|center|bottom/,
            c = /[\+\-]\d+(\.[\d]+)?%?/,
            d = /^\w+/,
            p = /%$/,
            f = e.fn.position;
        e.position = {
                scrollbarWidth: function() {
                    if (n !== t) return n;
                    var i, s, a = e("<div style='display:block;width:50px;height:50px;overflow:hidden;'><div style='height:100px;width:auto;'></div></div>"),
                        r = a.children()[0];
                    return e("body").append(a), i = r.offsetWidth, a.css("overflow", "scroll"), s = r.offsetWidth, i === s && (s = a[0].clientWidth), a.remove(), n = i - s
                },
                getScrollInfo: function(t) {
                    var i = t.isWindow ? "" : t.element.css("overflow-x"),
                        s = t.isWindow ? "" : t.element.css("overflow-y"),
                        a = "scroll" === i || "auto" === i && t.width < t.element[0].scrollWidth,
                        n = "scroll" === s || "auto" === s && t.height < t.element[0].scrollHeight;
                    return {
                        width: n ? e.position.scrollbarWidth() : 0,
                        height: a ? e.position.scrollbarWidth() : 0
                    }
                },
                getWithinInfo: function(t) {
                    var i = e(t || window),
                        s = e.isWindow(i[0]);
                    return {
                        element: i,
                        isWindow: s,
                        offset: i.offset() || {
                            left: 0,
                            top: 0
                        },
                        scrollLeft: i.scrollLeft(),
                        scrollTop: i.scrollTop(),
                        width: s ? i.width() : i.outerWidth(),
                        height: s ? i.height() : i.outerHeight()
                    }
                }
            }, e.fn.position = function(t) {
                if (!t || !t.of) return f.apply(this, arguments);
                t = e.extend({}, t);
                var n, p, m, g, v, y, b = e(t.of),
                    _ = e.position.getWithinInfo(t.within),
                    x = e.position.getScrollInfo(_),
                    k = (t.collision || "flip").split(" "),
                    w = {};
                return y = a(b), b[0].preventDefault && (t.at = "left top"), p = y.width, m = y.height, g = y.offset, v = e.extend({}, g), e.each(["my", "at"], function() {
                    var e, i, s = (t[this] || "").split(" ");
                    1 === s.length && (s = l.test(s[0]) ? s.concat(["center"]) : u.test(s[0]) ? ["center"].concat(s) : ["center", "center"]), s[0] = l.test(s[0]) ? s[0] : "center", s[1] = u.test(s[1]) ? s[1] : "center", e = c.exec(s[0]), i = c.exec(s[1]), w[this] = [e ? e[0] : 0, i ? i[0] : 0], t[this] = [d.exec(s[0])[0], d.exec(s[1])[0]]
                }), 1 === k.length && (k[1] = k[0]), "right" === t.at[0] ? v.left += p : "center" === t.at[0] && (v.left += p / 2), "bottom" === t.at[1] ? v.top += m : "center" === t.at[1] && (v.top += m / 2), n = i(w.at, p, m), v.left += n[0], v.top += n[1], this.each(function() {
                    var a, l, u = e(this),
                        c = u.outerWidth(),
                        d = u.outerHeight(),
                        f = s(this, "marginLeft"),
                        y = s(this, "marginTop"),
                        D = c + f + s(this, "marginRight") + x.width,
                        T = d + y + s(this, "marginBottom") + x.height,
                        M = e.extend({}, v),
                        S = i(w.my, u.outerWidth(), u.outerHeight());
                    "right" === t.my[0] ? M.left -= c : "center" === t.my[0] && (M.left -= c / 2), "bottom" === t.my[1] ? M.top -= d : "center" === t.my[1] && (M.top -= d / 2), M.left += S[0], M.top += S[1], e.support.offsetFractions || (M.left = h(M.left), M.top = h(M.top)), a = {
                        marginLeft: f,
                        marginTop: y
                    }, e.each(["left", "top"], function(i, s) {
                        e.ui.position[k[i]] && e.ui.position[k[i]][s](M, {
                            targetWidth: p,
                            targetHeight: m,
                            elemWidth: c,
                            elemHeight: d,
                            collisionPosition: a,
                            collisionWidth: D,
                            collisionHeight: T,
                            offset: [n[0] + S[0], n[1] + S[1]],
                            my: t.my,
                            at: t.at,
                            within: _,
                            elem: u
                        })
                    }), t.using && (l = function(e) {
                        var i = g.left - M.left,
                            s = i + p - c,
                            a = g.top - M.top,
                            n = a + m - d,
                            h = {
                                target: {
                                    element: b,
                                    left: g.left,
                                    top: g.top,
                                    width: p,
                                    height: m
                                },
                                element: {
                                    element: u,
                                    left: M.left,
                                    top: M.top,
                                    width: c,
                                    height: d
                                },
                                horizontal: 0 > s ? "left" : i > 0 ? "right" : "center",
                                vertical: 0 > n ? "top" : a > 0 ? "bottom" : "middle"
                            };
                        c > p && p > o(i + s) && (h.horizontal = "center"), d > m && m > o(a + n) && (h.vertical = "middle"), h.important = r(o(i), o(s)) > r(o(a), o(n)) ? "horizontal" : "vertical", t.using.call(this, e, h)
                    }), u.offset(e.extend(M, {
                        using: l
                    }))
                })
            }, e.ui.position = {
                fit: {
                    left: function(e, t) {
                        var i, s = t.within,
                            a = s.isWindow ? s.scrollLeft : s.offset.left,
                            n = s.width,
                            o = e.left - t.collisionPosition.marginLeft,
                            h = a - o,
                            l = o + t.collisionWidth - n - a;
                        t.collisionWidth > n ? h > 0 && 0 >= l ? (i = e.left + h + t.collisionWidth - n - a, e.left += h - i) : e.left = l > 0 && 0 >= h ? a : h > l ? a + n - t.collisionWidth : a : h > 0 ? e.left += h : l > 0 ? e.left -= l : e.left = r(e.left - o, e.left)
                    },
                    top: function(e, t) {
                        var i, s = t.within,
                            a = s.isWindow ? s.scrollTop : s.offset.top,
                            n = t.within.height,
                            o = e.top - t.collisionPosition.marginTop,
                            h = a - o,
                            l = o + t.collisionHeight - n - a;
                        t.collisionHeight > n ? h > 0 && 0 >= l ? (i = e.top + h + t.collisionHeight - n - a, e.top += h - i) : e.top = l > 0 && 0 >= h ? a : h > l ? a + n - t.collisionHeight : a : h > 0 ? e.top += h : l > 0 ? e.top -= l : e.top = r(e.top - o, e.top)
                    }
                },
                flip: {
                    left: function(e, t) {
                        var i, s, a = t.within,
                            n = a.offset.left + a.scrollLeft,
                            r = a.width,
                            h = a.isWindow ? a.scrollLeft : a.offset.left,
                            l = e.left - t.collisionPosition.marginLeft,
                            u = l - h,
                            c = l + t.collisionWidth - r - h,
                            d = "left" === t.my[0] ? -t.elemWidth : "right" === t.my[0] ? t.elemWidth : 0,
                            p = "left" === t.at[0] ? t.targetWidth : "right" === t.at[0] ? -t.targetWidth : 0,
                            f = -2 * t.offset[0];
                        0 > u ? (i = e.left + d + p + f + t.collisionWidth - r - n, (0 > i || o(u) > i) && (e.left += d + p + f)) : c > 0 && (s = e.left - t.collisionPosition.marginLeft + d + p + f - h, (s > 0 || c > o(s)) && (e.left += d + p + f))
                    },
                    top: function(e, t) {
                        var i, s, a = t.within,
                            n = a.offset.top + a.scrollTop,
                            r = a.height,
                            h = a.isWindow ? a.scrollTop : a.offset.top,
                            l = e.top - t.collisionPosition.marginTop,
                            u = l - h,
                            c = l + t.collisionHeight - r - h,
                            d = "top" === t.my[1],
                            p = d ? -t.elemHeight : "bottom" === t.my[1] ? t.elemHeight : 0,
                            f = "top" === t.at[1] ? t.targetHeight : "bottom" === t.at[1] ? -t.targetHeight : 0,
                            m = -2 * t.offset[1];
                        0 > u ? (s = e.top + p + f + m + t.collisionHeight - r - n, e.top + p + f + m > u && (0 > s || o(u) > s) && (e.top += p + f + m)) : c > 0 && (i = e.top - t.collisionPosition.marginTop + p + f + m - h, e.top + p + f + m > c && (i > 0 || c > o(i)) && (e.top += p + f + m))
                    }
                },
                flipfit: {
                    left: function() {
                        e.ui.position.flip.left.apply(this, arguments), e.ui.position.fit.left.apply(this, arguments)
                    },
                    top: function() {
                        e.ui.position.flip.top.apply(this, arguments), e.ui.position.fit.top.apply(this, arguments)
                    }
                }
            },
            function() {
                var t, i, s, a, n, r = document.getElementsByTagName("body")[0],
                    o = document.createElement("div");
                t = document.createElement(r ? "div" : "body"), s = {
                    visibility: "hidden",
                    width: 0,
                    height: 0,
                    border: 0,
                    margin: 0,
                    background: "none"
                }, r && e.extend(s, {
                    position: "absolute",
                    left: "-1000px",
                    top: "-1000px"
                });
                for (n in s) t.style[n] = s[n];
                t.appendChild(o), i = r || document.documentElement, i.insertBefore(t, i.firstChild), o.style.cssText = "position: absolute; left: 10.7432222px;", a = e(o).offset().left, e.support.offsetFractions = a > 10 && 11 > a, t.innerHTML = "", i.removeChild(t)
            }()
    }(jQuery),
    function(e) {
        e.widget("ui.draggable", e.ui.mouse, {
            version: "1.10.3",
            widgetEventPrefix: "drag",
            options: {
                addClasses: !0,
                appendTo: "parent",
                axis: !1,
                connectToSortable: !1,
                containment: !1,
                cursor: "auto",
                cursorAt: !1,
                grid: !1,
                handle: !1,
                helper: "original",
                iframeFix: !1,
                opacity: !1,
                refreshPositions: !1,
                revert: !1,
                revertDuration: 500,
                scope: "default",
                scroll: !0,
                scrollSensitivity: 20,
                scrollSpeed: 20,
                snap: !1,
                snapMode: "both",
                snapTolerance: 20,
                stack: !1,
                zIndex: !1,
                drag: null,
                start: null,
                stop: null
            },
            _create: function() {
                "original" !== this.options.helper || /^(?:r|a|f)/.test(this.element.css("position")) || (this.element[0].style.position = "relative"), this.options.addClasses && this.element.addClass("ui-draggable"), this.options.disabled && this.element.addClass("ui-draggable-disabled"), this._mouseInit()
            },
            _destroy: function() {
                this.element.removeClass("ui-draggable ui-draggable-dragging ui-draggable-disabled"), this._mouseDestroy()
            },
            _mouseCapture: function(t) {
                var i = this.options;
                return this.helper || i.disabled || e(t.target).closest(".ui-resizable-handle").length > 0 ? !1 : (this.handle = this._getHandle(t), this.handle ? (e(i.iframeFix === !0 ? "iframe" : i.iframeFix).each(function() {
                    e("<div class='ui-draggable-iframeFix' style='background: #fff;'></div>").css({
                        width: this.offsetWidth + "px",
                        height: this.offsetHeight + "px",
                        position: "absolute",
                        opacity: "0.001",
                        zIndex: 1e3
                    }).css(e(this).offset()).appendTo("body")
                }), !0) : !1)
            },
            _mouseStart: function(t) {
                var i = this.options;
                return this.helper = this._createHelper(t), this.helper.addClass("ui-draggable-dragging"), this._cacheHelperProportions(), e.ui.ddmanager && (e.ui.ddmanager.current = this), this._cacheMargins(), this.cssPosition = this.helper.css("position"), this.scrollParent = this.helper.scrollParent(), this.offsetParent = this.helper.offsetParent(), this.offsetParentCssPosition = this.offsetParent.css("position"), this.offset = this.positionAbs = this.element.offset(), this.offset = {
                    top: this.offset.top - this.margins.top,
                    left: this.offset.left - this.margins.left
                }, this.offset.scroll = !1, e.extend(this.offset, {
                    click: {
                        left: t.pageX - this.offset.left,
                        top: t.pageY - this.offset.top
                    },
                    parent: this._getParentOffset(),
                    relative: this._getRelativeOffset()
                }), this.originalPosition = this.position = this._generatePosition(t), this.originalPageX = t.pageX, this.originalPageY = t.pageY, i.cursorAt && this._adjustOffsetFromHelper(i.cursorAt), this._setContainment(), this._trigger("start", t) === !1 ? (this._clear(), !1) : (this._cacheHelperProportions(), e.ui.ddmanager && !i.dropBehaviour && e.ui.ddmanager.prepareOffsets(this, t), this._mouseDrag(t, !0), e.ui.ddmanager && e.ui.ddmanager.dragStart(this, t), !0)
            },
            _mouseDrag: function(t, i) {
                if ("fixed" === this.offsetParentCssPosition && (this.offset.parent = this._getParentOffset()), this.position = this._generatePosition(t), this.positionAbs = this._convertPositionTo("absolute"), !i) {
                    var a = this._uiHash();
                    if (this._trigger("drag", t, a) === !1) return this._mouseUp({}), !1;
                    this.position = a.position
                }
                return this.options.axis && "y" === this.options.axis || (this.helper[0].style.left = this.position.left + "px"), this.options.axis && "x" === this.options.axis || (this.helper[0].style.top = this.position.top + "px"), e.ui.ddmanager && e.ui.ddmanager.drag(this, t), !1
            },
            _mouseStop: function(t) {
                var i = this,
                    a = !1;
                return e.ui.ddmanager && !this.options.dropBehaviour && (a = e.ui.ddmanager.drop(this, t)), this.dropped && (a = this.dropped, this.dropped = !1), "original" !== this.options.helper || e.contains(this.element[0].ownerDocument, this.element[0]) ? ("invalid" === this.options.revert && !a || "valid" === this.options.revert && a || this.options.revert === !0 || e.isFunction(this.options.revert) && this.options.revert.call(this.element, a) ? e(this.helper).animate(this.originalPosition, parseInt(this.options.revertDuration, 10), function() {
                    i._trigger("stop", t) !== !1 && i._clear()
                }) : this._trigger("stop", t) !== !1 && this._clear(), !1) : !1
            },
            _mouseUp: function(t) {
                return e("div.ui-draggable-iframeFix").each(function() {
                    this.parentNode.removeChild(this)
                }), e.ui.ddmanager && e.ui.ddmanager.dragStop(this, t), e.ui.mouse.prototype._mouseUp.call(this, t)
            },
            cancel: function() {
                return this.helper.is(".ui-draggable-dragging") ? this._mouseUp({}) : this._clear(), this
            },
            _getHandle: function(t) {
                return this.options.handle ? !!e(t.target).closest(this.element.find(this.options.handle)).length : !0
            },
            _createHelper: function(t) {
                var i = this.options,
                    a = e.isFunction(i.helper) ? e(i.helper.apply(this.element[0], [t])) : "clone" === i.helper ? this.element.clone().removeAttr("id") : this.element;
                return a.parents("body").length || a.appendTo("parent" === i.appendTo ? this.element[0].parentNode : i.appendTo), a[0] === this.element[0] || /(fixed|absolute)/.test(a.css("position")) || a.css("position", "absolute"), a
            },
            _adjustOffsetFromHelper: function(t) {
                "string" == typeof t && (t = t.split(" ")), e.isArray(t) && (t = {
                    left: +t[0],
                    top: +t[1] || 0
                }), "left" in t && (this.offset.click.left = t.left + this.margins.left), "right" in t && (this.offset.click.left = this.helperProportions.width - t.right + this.margins.left), "top" in t && (this.offset.click.top = t.top + this.margins.top), "bottom" in t && (this.offset.click.top = this.helperProportions.height - t.bottom + this.margins.top)
            },
            _getParentOffset: function() {
                var t = this.offsetParent.offset();
                return "absolute" === this.cssPosition && this.scrollParent[0] !== document && e.contains(this.scrollParent[0], this.offsetParent[0]) && (t.left += this.scrollParent.scrollLeft(), t.top += this.scrollParent.scrollTop()), (this.offsetParent[0] === document.body || this.offsetParent[0].tagName && "html" === this.offsetParent[0].tagName.toLowerCase() && e.ui.ie) && (t = {
                    top: 0,
                    left: 0
                }), {
                    top: t.top + (parseInt(this.offsetParent.css("borderTopWidth"), 10) || 0),
                    left: t.left + (parseInt(this.offsetParent.css("borderLeftWidth"), 10) || 0)
                }
            },
            _getRelativeOffset: function() {
                if ("relative" === this.cssPosition) {
                    var e = this.element.position();
                    return {
                        top: e.top - (parseInt(this.helper.css("top"), 10) || 0) + this.scrollParent.scrollTop(),
                        left: e.left - (parseInt(this.helper.css("left"), 10) || 0) + this.scrollParent.scrollLeft()
                    }
                }
                return {
                    top: 0,
                    left: 0
                }
            },
            _cacheMargins: function() {
                this.margins = {
                    left: parseInt(this.element.css("marginLeft"), 10) || 0,
                    top: parseInt(this.element.css("marginTop"), 10) || 0,
                    right: parseInt(this.element.css("marginRight"), 10) || 0,
                    bottom: parseInt(this.element.css("marginBottom"), 10) || 0
                }
            },
            _cacheHelperProportions: function() {
                this.helperProportions = {
                    width: this.helper.outerWidth(),
                    height: this.helper.outerHeight()
                }
            },
            _setContainment: function() {
                var t, i, a, s = this.options;
                return s.containment ? "window" === s.containment ? void(this.containment = [e(window).scrollLeft() - this.offset.relative.left - this.offset.parent.left, e(window).scrollTop() - this.offset.relative.top - this.offset.parent.top, e(window).scrollLeft() + e(window).width() - this.helperProportions.width - this.margins.left, e(window).scrollTop() + (e(window).height() || document.body.parentNode.scrollHeight) - this.helperProportions.height - this.margins.top]) : "document" === s.containment ? void(this.containment = [0, 0, e(document).width() - this.helperProportions.width - this.margins.left, (e(document).height() || document.body.parentNode.scrollHeight) - this.helperProportions.height - this.margins.top]) : s.containment.constructor === Array ? void(this.containment = s.containment) : ("parent" === s.containment && (s.containment = this.helper[0].parentNode), i = e(s.containment), a = i[0], void(a && (t = "hidden" !== i.css("overflow"), this.containment = [(parseInt(i.css("borderLeftWidth"), 10) || 0) + (parseInt(i.css("paddingLeft"), 10) || 0), (parseInt(i.css("borderTopWidth"), 10) || 0) + (parseInt(i.css("paddingTop"), 10) || 0), (t ? Math.max(a.scrollWidth, a.offsetWidth) : a.offsetWidth) - (parseInt(i.css("borderRightWidth"), 10) || 0) - (parseInt(i.css("paddingRight"), 10) || 0) - this.helperProportions.width - this.margins.left - this.margins.right, (t ? Math.max(a.scrollHeight, a.offsetHeight) : a.offsetHeight) - (parseInt(i.css("borderBottomWidth"), 10) || 0) - (parseInt(i.css("paddingBottom"), 10) || 0) - this.helperProportions.height - this.margins.top - this.margins.bottom], this.relative_container = i))) : void(this.containment = null)
            },
            _convertPositionTo: function(t, i) {
                i || (i = this.position);
                var a = "absolute" === t ? 1 : -1,
                    s = "absolute" !== this.cssPosition || this.scrollParent[0] !== document && e.contains(this.scrollParent[0], this.offsetParent[0]) ? this.scrollParent : this.offsetParent;
                return this.offset.scroll || (this.offset.scroll = {
                    top: s.scrollTop(),
                    left: s.scrollLeft()
                }), {
                    top: i.top + this.offset.relative.top * a + this.offset.parent.top * a - ("fixed" === this.cssPosition ? -this.scrollParent.scrollTop() : this.offset.scroll.top) * a,
                    left: i.left + this.offset.relative.left * a + this.offset.parent.left * a - ("fixed" === this.cssPosition ? -this.scrollParent.scrollLeft() : this.offset.scroll.left) * a
                }
            },
            _generatePosition: function(t) {
                var i, a, s, n, r = this.options,
                    o = "absolute" !== this.cssPosition || this.scrollParent[0] !== document && e.contains(this.scrollParent[0], this.offsetParent[0]) ? this.scrollParent : this.offsetParent,
                    l = t.pageX,
                    h = t.pageY;
                return this.offset.scroll || (this.offset.scroll = {
                    top: o.scrollTop(),
                    left: o.scrollLeft()
                }), this.originalPosition && (this.containment && (this.relative_container ? (a = this.relative_container.offset(), i = [this.containment[0] + a.left, this.containment[1] + a.top, this.containment[2] + a.left, this.containment[3] + a.top]) : i = this.containment, t.pageX - this.offset.click.left < i[0] && (l = i[0] + this.offset.click.left), t.pageY - this.offset.click.top < i[1] && (h = i[1] + this.offset.click.top), t.pageX - this.offset.click.left > i[2] && (l = i[2] + this.offset.click.left), t.pageY - this.offset.click.top > i[3] && (h = i[3] + this.offset.click.top)), r.grid && (s = r.grid[1] ? this.originalPageY + Math.round((h - this.originalPageY) / r.grid[1]) * r.grid[1] : this.originalPageY, h = i ? s - this.offset.click.top >= i[1] || s - this.offset.click.top > i[3] ? s : s - this.offset.click.top >= i[1] ? s - r.grid[1] : s + r.grid[1] : s, n = r.grid[0] ? this.originalPageX + Math.round((l - this.originalPageX) / r.grid[0]) * r.grid[0] : this.originalPageX, l = i ? n - this.offset.click.left >= i[0] || n - this.offset.click.left > i[2] ? n : n - this.offset.click.left >= i[0] ? n - r.grid[0] : n + r.grid[0] : n)), {
                    top: h - this.offset.click.top - this.offset.relative.top - this.offset.parent.top + ("fixed" === this.cssPosition ? -this.scrollParent.scrollTop() : this.offset.scroll.top),
                    left: l - this.offset.click.left - this.offset.relative.left - this.offset.parent.left + ("fixed" === this.cssPosition ? -this.scrollParent.scrollLeft() : this.offset.scroll.left)
                }
            },
            _clear: function() {
                this.helper.removeClass("ui-draggable-dragging"), this.helper[0] === this.element[0] || this.cancelHelperRemoval || this.helper.remove(), this.helper = null, this.cancelHelperRemoval = !1
            },
            _trigger: function(t, i, a) {
                return a = a || this._uiHash(), e.ui.plugin.call(this, t, [i, a]), "drag" === t && (this.positionAbs = this._convertPositionTo("absolute")), e.Widget.prototype._trigger.call(this, t, i, a)
            },
            plugins: {},
            _uiHash: function() {
                return {
                    helper: this.helper,
                    position: this.position,
                    originalPosition: this.originalPosition,
                    offset: this.positionAbs
                }
            }
        }), e.ui.plugin.add("draggable", "connectToSortable", {
            start: function(t, i) {
                var a = e(this).data("ui-draggable"),
                    s = a.options,
                    n = e.extend({}, i, {
                        item: a.element
                    });
                a.sortables = [], e(s.connectToSortable).each(function() {
                    var i = e.data(this, "ui-sortable");
                    i && !i.options.disabled && (a.sortables.push({
                        instance: i,
                        shouldRevert: i.options.revert
                    }), i.refreshPositions(), i._trigger("activate", t, n))
                })
            },
            stop: function(t, i) {
                var a = e(this).data("ui-draggable"),
                    s = e.extend({}, i, {
                        item: a.element
                    });
                e.each(a.sortables, function() {
                    this.instance.isOver ? (this.instance.isOver = 0, a.cancelHelperRemoval = !0, this.instance.cancelHelperRemoval = !1, this.shouldRevert && (this.instance.options.revert = this.shouldRevert), this.instance._mouseStop(t), this.instance.options.helper = this.instance.options._helper, "original" === a.options.helper && this.instance.currentItem.css({
                        top: "auto",
                        left: "auto"
                    })) : (this.instance.cancelHelperRemoval = !1, this.instance._trigger("deactivate", t, s))
                })
            },
            drag: function(t, i) {
                var a = e(this).data("ui-draggable"),
                    s = this;
                e.each(a.sortables, function() {
                    var n = !1,
                        r = this;
                    this.instance.positionAbs = a.positionAbs, this.instance.helperProportions = a.helperProportions, this.instance.offset.click = a.offset.click, this.instance._intersectsWith(this.instance.containerCache) && (n = !0, e.each(a.sortables, function() {
                        return this.instance.positionAbs = a.positionAbs, this.instance.helperProportions = a.helperProportions, this.instance.offset.click = a.offset.click, this !== r && this.instance._intersectsWith(this.instance.containerCache) && e.contains(r.instance.element[0], this.instance.element[0]) && (n = !1), n
                    })), n ? (this.instance.isOver || (this.instance.isOver = 1, this.instance.currentItem = e(s).clone().removeAttr("id").appendTo(this.instance.element).data("ui-sortable-item", !0), this.instance.options._helper = this.instance.options.helper, this.instance.options.helper = function() {
                        return i.helper[0]
                    }, t.target = this.instance.currentItem[0], this.instance._mouseCapture(t, !0), this.instance._mouseStart(t, !0, !0), this.instance.offset.click.top = a.offset.click.top, this.instance.offset.click.left = a.offset.click.left, this.instance.offset.parent.left -= a.offset.parent.left - this.instance.offset.parent.left, this.instance.offset.parent.top -= a.offset.parent.top - this.instance.offset.parent.top, a._trigger("toSortable", t), a.dropped = this.instance.element, a.currentItem = a.element, this.instance.fromOutside = a), this.instance.currentItem && this.instance._mouseDrag(t)) : this.instance.isOver && (this.instance.isOver = 0, this.instance.cancelHelperRemoval = !0, this.instance.options.revert = !1, this.instance._trigger("out", t, this.instance._uiHash(this.instance)), this.instance._mouseStop(t, !0), this.instance.options.helper = this.instance.options._helper, this.instance.currentItem.remove(), this.instance.placeholder && this.instance.placeholder.remove(), a._trigger("fromSortable", t), a.dropped = !1)
                })
            }
        }), e.ui.plugin.add("draggable", "cursor", {
            start: function() {
                var t = e("body"),
                    i = e(this).data("ui-draggable").options;
                t.css("cursor") && (i._cursor = t.css("cursor")), t.css("cursor", i.cursor)
            },
            stop: function() {
                var t = e(this).data("ui-draggable").options;
                t._cursor && e("body").css("cursor", t._cursor)
            }
        }), e.ui.plugin.add("draggable", "opacity", {
            start: function(t, i) {
                var a = e(i.helper),
                    s = e(this).data("ui-draggable").options;
                a.css("opacity") && (s._opacity = a.css("opacity")), a.css("opacity", s.opacity)
            },
            stop: function(t, i) {
                var a = e(this).data("ui-draggable").options;
                a._opacity && e(i.helper).css("opacity", a._opacity)
            }
        }), e.ui.plugin.add("draggable", "scroll", {
            start: function() {
                var t = e(this).data("ui-draggable");
                t.scrollParent[0] !== document && "HTML" !== t.scrollParent[0].tagName && (t.overflowOffset = t.scrollParent.offset())
            },
            drag: function(t) {
                var i = e(this).data("ui-draggable"),
                    a = i.options,
                    s = !1;
                i.scrollParent[0] !== document && "HTML" !== i.scrollParent[0].tagName ? (a.axis && "x" === a.axis || (i.overflowOffset.top + i.scrollParent[0].offsetHeight - t.pageY < a.scrollSensitivity ? i.scrollParent[0].scrollTop = s = i.scrollParent[0].scrollTop + a.scrollSpeed : t.pageY - i.overflowOffset.top < a.scrollSensitivity && (i.scrollParent[0].scrollTop = s = i.scrollParent[0].scrollTop - a.scrollSpeed)), a.axis && "y" === a.axis || (i.overflowOffset.left + i.scrollParent[0].offsetWidth - t.pageX < a.scrollSensitivity ? i.scrollParent[0].scrollLeft = s = i.scrollParent[0].scrollLeft + a.scrollSpeed : t.pageX - i.overflowOffset.left < a.scrollSensitivity && (i.scrollParent[0].scrollLeft = s = i.scrollParent[0].scrollLeft - a.scrollSpeed))) : (a.axis && "x" === a.axis || (t.pageY - e(document).scrollTop() < a.scrollSensitivity ? s = e(document).scrollTop(e(document).scrollTop() - a.scrollSpeed) : e(window).height() - (t.pageY - e(document).scrollTop()) < a.scrollSensitivity && (s = e(document).scrollTop(e(document).scrollTop() + a.scrollSpeed))), a.axis && "y" === a.axis || (t.pageX - e(document).scrollLeft() < a.scrollSensitivity ? s = e(document).scrollLeft(e(document).scrollLeft() - a.scrollSpeed) : e(window).width() - (t.pageX - e(document).scrollLeft()) < a.scrollSensitivity && (s = e(document).scrollLeft(e(document).scrollLeft() + a.scrollSpeed)))), s !== !1 && e.ui.ddmanager && !a.dropBehaviour && e.ui.ddmanager.prepareOffsets(i, t)
            }
        }), e.ui.plugin.add("draggable", "snap", {
            start: function() {
                var t = e(this).data("ui-draggable"),
                    i = t.options;
                t.snapElements = [], e(i.snap.constructor !== String ? i.snap.items || ":data(ui-draggable)" : i.snap).each(function() {
                    var i = e(this),
                        a = i.offset();
                    this !== t.element[0] && t.snapElements.push({
                        item: this,
                        width: i.outerWidth(),
                        height: i.outerHeight(),
                        top: a.top,
                        left: a.left
                    })
                })
            },
            drag: function(t, i) {
                var a, s, n, r, o, l, h, u, d, c, p = e(this).data("ui-draggable"),
                    f = p.options,
                    m = f.snapTolerance,
                    g = i.offset.left,
                    v = g + p.helperProportions.width,
                    y = i.offset.top,
                    b = y + p.helperProportions.height;
                for (d = p.snapElements.length - 1; d >= 0; d--) o = p.snapElements[d].left, l = o + p.snapElements[d].width, h = p.snapElements[d].top, u = h + p.snapElements[d].height, o - m > v || g > l + m || h - m > b || y > u + m || !e.contains(p.snapElements[d].item.ownerDocument, p.snapElements[d].item) ? (p.snapElements[d].snapping && p.options.snap.release && p.options.snap.release.call(p.element, t, e.extend(p._uiHash(), {
                    snapItem: p.snapElements[d].item
                })), p.snapElements[d].snapping = !1) : ("inner" !== f.snapMode && (a = m >= Math.abs(h - b), s = m >= Math.abs(u - y), n = m >= Math.abs(o - v), r = m >= Math.abs(l - g), a && (i.position.top = p._convertPositionTo("relative", {
                    top: h - p.helperProportions.height,
                    left: 0
                }).top - p.margins.top), s && (i.position.top = p._convertPositionTo("relative", {
                    top: u,
                    left: 0
                }).top - p.margins.top), n && (i.position.left = p._convertPositionTo("relative", {
                    top: 0,
                    left: o - p.helperProportions.width
                }).left - p.margins.left), r && (i.position.left = p._convertPositionTo("relative", {
                    top: 0,
                    left: l
                }).left - p.margins.left)), c = a || s || n || r, "outer" !== f.snapMode && (a = m >= Math.abs(h - y), s = m >= Math.abs(u - b), n = m >= Math.abs(o - g), r = m >= Math.abs(l - v), a && (i.position.top = p._convertPositionTo("relative", {
                    top: h,
                    left: 0
                }).top - p.margins.top), s && (i.position.top = p._convertPositionTo("relative", {
                    top: u - p.helperProportions.height,
                    left: 0
                }).top - p.margins.top), n && (i.position.left = p._convertPositionTo("relative", {
                    top: 0,
                    left: o
                }).left - p.margins.left), r && (i.position.left = p._convertPositionTo("relative", {
                    top: 0,
                    left: l - p.helperProportions.width
                }).left - p.margins.left)), !p.snapElements[d].snapping && (a || s || n || r || c) && p.options.snap.snap && p.options.snap.snap.call(p.element, t, e.extend(p._uiHash(), {
                    snapItem: p.snapElements[d].item
                })), p.snapElements[d].snapping = a || s || n || r || c)
            }
        }), e.ui.plugin.add("draggable", "stack", {
            start: function() {
                var t, i = this.data("ui-draggable").options,
                    a = e.makeArray(e(i.stack)).sort(function(t, i) {
                        return (parseInt(e(t).css("zIndex"), 10) || 0) - (parseInt(e(i).css("zIndex"), 10) || 0)
                    });
                a.length && (t = parseInt(e(a[0]).css("zIndex"), 10) || 0, e(a).each(function(i) {
                    e(this).css("zIndex", t + i)
                }), this.css("zIndex", t + a.length))
            }
        }), e.ui.plugin.add("draggable", "zIndex", {
            start: function(t, i) {
                var a = e(i.helper),
                    s = e(this).data("ui-draggable").options;
                a.css("zIndex") && (s._zIndex = a.css("zIndex")), a.css("zIndex", s.zIndex)
            },
            stop: function(t, i) {
                var a = e(this).data("ui-draggable").options;
                a._zIndex && e(i.helper).css("zIndex", a._zIndex)
            }
        })
    }(jQuery),
    function(e) {
        function t(e, t, i) {
            return e > t && t + i > e
        }
        e.widget("ui.droppable", {
            version: "1.10.3",
            widgetEventPrefix: "drop",
            options: {
                accept: "*",
                activeClass: !1,
                addClasses: !0,
                greedy: !1,
                hoverClass: !1,
                scope: "default",
                tolerance: "intersect",
                activate: null,
                deactivate: null,
                drop: null,
                out: null,
                over: null
            },
            _create: function() {
                var t = this.options,
                    i = t.accept;
                this.isover = !1, this.isout = !0, this.accept = e.isFunction(i) ? i : function(e) {
                    return e.is(i)
                }, this.proportions = {
                    width: this.element[0].offsetWidth,
                    height: this.element[0].offsetHeight
                }, e.ui.ddmanager.droppables[t.scope] = e.ui.ddmanager.droppables[t.scope] || [], e.ui.ddmanager.droppables[t.scope].push(this), t.addClasses && this.element.addClass("ui-droppable")
            },
            _destroy: function() {
                for (var t = 0, i = e.ui.ddmanager.droppables[this.options.scope]; i.length > t; t++) i[t] === this && i.splice(t, 1);
                this.element.removeClass("ui-droppable ui-droppable-disabled")
            },
            _setOption: function(t, i) {
                "accept" === t && (this.accept = e.isFunction(i) ? i : function(e) {
                    return e.is(i)
                }), e.Widget.prototype._setOption.apply(this, arguments)
            },
            _activate: function(t) {
                var i = e.ui.ddmanager.current;
                this.options.activeClass && this.element.addClass(this.options.activeClass), i && this._trigger("activate", t, this.ui(i))
            },
            _deactivate: function(t) {
                var i = e.ui.ddmanager.current;
                this.options.activeClass && this.element.removeClass(this.options.activeClass), i && this._trigger("deactivate", t, this.ui(i))
            },
            _over: function(t) {
                var i = e.ui.ddmanager.current;
                i && (i.currentItem || i.element)[0] !== this.element[0] && this.accept.call(this.element[0], i.currentItem || i.element) && (this.options.hoverClass && this.element.addClass(this.options.hoverClass), this._trigger("over", t, this.ui(i)))
            },
            _out: function(t) {
                var i = e.ui.ddmanager.current;
                i && (i.currentItem || i.element)[0] !== this.element[0] && this.accept.call(this.element[0], i.currentItem || i.element) && (this.options.hoverClass && this.element.removeClass(this.options.hoverClass), this._trigger("out", t, this.ui(i)))
            },
            _drop: function(t, i) {
                var a = i || e.ui.ddmanager.current,
                    s = !1;
                return a && (a.currentItem || a.element)[0] !== this.element[0] ? (this.element.find(":data(ui-droppable)").not(".ui-draggable-dragging").each(function() {
                    var t = e.data(this, "ui-droppable");
                    return t.options.greedy && !t.options.disabled && t.options.scope === a.options.scope && t.accept.call(t.element[0], a.currentItem || a.element) && e.ui.intersect(a, e.extend(t, {
                        offset: t.element.offset()
                    }), t.options.tolerance) ? (s = !0, !1) : void 0
                }), s ? !1 : this.accept.call(this.element[0], a.currentItem || a.element) ? (this.options.activeClass && this.element.removeClass(this.options.activeClass), this.options.hoverClass && this.element.removeClass(this.options.hoverClass), this._trigger("drop", t, this.ui(a)), this.element) : !1) : !1
            },
            ui: function(e) {
                return {
                    draggable: e.currentItem || e.element,
                    helper: e.helper,
                    position: e.position,
                    offset: e.positionAbs
                }
            }
        }), e.ui.intersect = function(e, i, a) {
            if (!i.offset) return !1;
            var s, n, r = (e.positionAbs || e.position.absolute).left,
                o = r + e.helperProportions.width,
                l = (e.positionAbs || e.position.absolute).top,
                h = l + e.helperProportions.height,
                u = i.offset.left,
                d = u + i.proportions.width,
                c = i.offset.top,
                p = c + i.proportions.height;
            switch (a) {
                case "fit":
                    return r >= u && d >= o && l >= c && p >= h;
                case "intersect":
                    return r + e.helperProportions.width / 2 > u && d > o - e.helperProportions.width / 2 && l + e.helperProportions.height / 2 > c && p > h - e.helperProportions.height / 2;
                case "pointer":
                    return s = (e.positionAbs || e.position.absolute).left + (e.clickOffset || e.offset.click).left, n = (e.positionAbs || e.position.absolute).top + (e.clickOffset || e.offset.click).top, t(n, c, i.proportions.height) && t(s, u, i.proportions.width);
                case "touch":
                    return (l >= c && p >= l || h >= c && p >= h || c > l && h > p) && (r >= u && d >= r || o >= u && d >= o || u > r && o > d);
                default:
                    return !1
            }
        }, e.ui.ddmanager = {
            current: null,
            droppables: {
                "default": []
            },
            prepareOffsets: function(t, i) {
                var a, s, n = e.ui.ddmanager.droppables[t.options.scope] || [],
                    r = i ? i.type : null,
                    o = (t.currentItem || t.element).find(":data(ui-droppable)").addBack();
                e: for (a = 0; n.length > a; a++)
                    if (!(n[a].options.disabled || t && !n[a].accept.call(n[a].element[0], t.currentItem || t.element))) {
                        for (s = 0; o.length > s; s++)
                            if (o[s] === n[a].element[0]) {
                                n[a].proportions.height = 0;
                                continue e
                            }
                        n[a].visible = "none" !== n[a].element.css("display"), n[a].visible && ("mousedown" === r && n[a]._activate.call(n[a], i), n[a].offset = n[a].element.offset(), n[a].proportions = {
                            width: n[a].element[0].offsetWidth,
                            height: n[a].element[0].offsetHeight
                        })
                    }
            },
            drop: function(t, i) {
                var a = !1;
                return e.each((e.ui.ddmanager.droppables[t.options.scope] || []).slice(), function() {
                    this.options && (!this.options.disabled && this.visible && e.ui.intersect(t, this, this.options.tolerance) && (a = this._drop.call(this, i) || a), !this.options.disabled && this.visible && this.accept.call(this.element[0], t.currentItem || t.element) && (this.isout = !0, this.isover = !1, this._deactivate.call(this, i)))
                }), a
            },
            dragStart: function(t, i) {
                t.element.parentsUntil("body").bind("scroll.droppable", function() {
                    t.options.refreshPositions || e.ui.ddmanager.prepareOffsets(t, i)
                })
            },
            drag: function(t, i) {
                t.options.refreshPositions && e.ui.ddmanager.prepareOffsets(t, i), e.each(e.ui.ddmanager.droppables[t.options.scope] || [], function() {
                    if (!this.options.disabled && !this.greedyChild && this.visible) {
                        var a, s, n, r = e.ui.intersect(t, this, this.options.tolerance),
                            o = !r && this.isover ? "isout" : r && !this.isover ? "isover" : null;
                        o && (this.options.greedy && (s = this.options.scope, n = this.element.parents(":data(ui-droppable)").filter(function() {
                            return e.data(this, "ui-droppable").options.scope === s
                        }), n.length && (a = e.data(n[0], "ui-droppable"), a.greedyChild = "isover" === o)), a && "isover" === o && (a.isover = !1, a.isout = !0, a._out.call(a, i)), this[o] = !0, this["isout" === o ? "isover" : "isout"] = !1, this["isover" === o ? "_over" : "_out"].call(this, i), a && "isout" === o && (a.isout = !1, a.isover = !0, a._over.call(a, i)))
                    }
                })
            },
            dragStop: function(t, i) {
                t.element.parentsUntil("body").unbind("scroll.droppable"), t.options.refreshPositions || e.ui.ddmanager.prepareOffsets(t, i)
            }
        }
    }(jQuery),
    function(e) {
        function t(e) {
            return parseInt(e, 10) || 0
        }

        function i(e) {
            return !isNaN(parseInt(e, 10))
        }
        e.widget("ui.resizable", e.ui.mouse, {
            version: "1.10.3",
            widgetEventPrefix: "resize",
            options: {
                alsoResize: !1,
                animate: !1,
                animateDuration: "slow",
                animateEasing: "swing",
                aspectRatio: !1,
                autoHide: !1,
                containment: !1,
                ghost: !1,
                grid: !1,
                handles: "e,s,se",
                helper: !1,
                maxHeight: null,
                maxWidth: null,
                minHeight: 10,
                minWidth: 10,
                zIndex: 90,
                resize: null,
                start: null,
                stop: null
            },
            _create: function() {
                var t, i, s, a, n, r = this,
                    o = this.options;
                if (this.element.addClass("ui-resizable"), e.extend(this, {
                        _aspectRatio: !!o.aspectRatio,
                        aspectRatio: o.aspectRatio,
                        originalElement: this.element,
                        _proportionallyResizeElements: [],
                        _helper: o.helper || o.ghost || o.animate ? o.helper || "ui-resizable-helper" : null
                    }), this.element[0].nodeName.match(/canvas|textarea|input|select|button|img/i) && (this.element.wrap(e("<div class='ui-wrapper' style='overflow: hidden;'></div>").css({
                        position: this.element.css("position"),
                        width: this.element.outerWidth(),
                        height: this.element.outerHeight(),
                        top: this.element.css("top"),
                        left: this.element.css("left")
                    })), this.element = this.element.parent().data("ui-resizable", this.element.data("ui-resizable")), this.elementIsWrapper = !0, this.element.css({
                        marginLeft: this.originalElement.css("marginLeft"),
                        marginTop: this.originalElement.css("marginTop"),
                        marginRight: this.originalElement.css("marginRight"),
                        marginBottom: this.originalElement.css("marginBottom")
                    }), this.originalElement.css({
                        marginLeft: 0,
                        marginTop: 0,
                        marginRight: 0,
                        marginBottom: 0
                    }), this.originalResizeStyle = this.originalElement.css("resize"), this.originalElement.css("resize", "none"), this._proportionallyResizeElements.push(this.originalElement.css({
                        position: "static",
                        zoom: 1,
                        display: "block"
                    })), this.originalElement.css({
                        margin: this.originalElement.css("margin")
                    }), this._proportionallyResize()), this.handles = o.handles || (e(".ui-resizable-handle", this.element).length ? {
                        n: ".ui-resizable-n",
                        e: ".ui-resizable-e",
                        s: ".ui-resizable-s",
                        w: ".ui-resizable-w",
                        se: ".ui-resizable-se",
                        sw: ".ui-resizable-sw",
                        ne: ".ui-resizable-ne",
                        nw: ".ui-resizable-nw"
                    } : "e,s,se"), this.handles.constructor === String)
                    for ("all" === this.handles && (this.handles = "n,e,s,w,se,sw,ne,nw"), t = this.handles.split(","), this.handles = {}, i = 0; t.length > i; i++) s = e.trim(t[i]), n = "ui-resizable-" + s, a = e("<div class='ui-resizable-handle " + n + "'></div>"), a.css({
                        zIndex: o.zIndex
                    }), "se" === s && a.addClass("ui-icon ui-icon-gripsmall-diagonal-se"), this.handles[s] = ".ui-resizable-" + s, this.element.append(a);
                this._renderAxis = function(t) {
                    var i, s, a, n;
                    t = t || this.element;
                    for (i in this.handles) this.handles[i].constructor === String && (this.handles[i] = e(this.handles[i], this.element).show()), this.elementIsWrapper && this.originalElement[0].nodeName.match(/textarea|input|select|button/i) && (s = e(this.handles[i], this.element), n = /sw|ne|nw|se|n|s/.test(i) ? s.outerHeight() : s.outerWidth(), a = ["padding", /ne|nw|n/.test(i) ? "Top" : /se|sw|s/.test(i) ? "Bottom" : /^e$/.test(i) ? "Right" : "Left"].join(""), t.css(a, n), this._proportionallyResize()), e(this.handles[i]).length
                }, this._renderAxis(this.element), this._handles = e(".ui-resizable-handle", this.element).disableSelection(), this._handles.mouseover(function() {
                    r.resizing || (this.className && (a = this.className.match(/ui-resizable-(se|sw|ne|nw|n|e|s|w)/i)), r.axis = a && a[1] ? a[1] : "se")
                }), o.autoHide && (this._handles.hide(), e(this.element).addClass("ui-resizable-autohide").mouseenter(function() {
                    o.disabled || (e(this).removeClass("ui-resizable-autohide"), r._handles.show())
                }).mouseleave(function() {
                    o.disabled || r.resizing || (e(this).addClass("ui-resizable-autohide"), r._handles.hide())
                })), this._mouseInit()
            },
            _destroy: function() {
                this._mouseDestroy();
                var t, i = function(t) {
                    e(t).removeClass("ui-resizable ui-resizable-disabled ui-resizable-resizing").removeData("resizable").removeData("ui-resizable").unbind(".resizable").find(".ui-resizable-handle").remove()
                };
                return this.elementIsWrapper && (i(this.element), t = this.element, this.originalElement.css({
                    position: t.css("position"),
                    width: t.outerWidth(),
                    height: t.outerHeight(),
                    top: t.css("top"),
                    left: t.css("left")
                }).insertAfter(t), t.remove()), this.originalElement.css("resize", this.originalResizeStyle), i(this.originalElement), this
            },
            _mouseCapture: function(t) {
                var i, s, a = !1;
                for (i in this.handles) s = e(this.handles[i])[0], (s === t.target || e.contains(s, t.target)) && (a = !0);
                return !this.options.disabled && a
            },
            _mouseStart: function(i) {
                var s, a, n, r = this.options,
                    o = this.element.position(),
                    h = this.element;
                return this.resizing = !0, /absolute/.test(h.css("position")) ? h.css({
                    position: "absolute",
                    top: h.css("top"),
                    left: h.css("left")
                }) : h.is(".ui-draggable") && h.css({
                    position: "absolute",
                    top: o.top,
                    left: o.left
                }), this._renderProxy(), s = t(this.helper.css("left")), a = t(this.helper.css("top")), r.containment && (s += e(r.containment).scrollLeft() || 0, a += e(r.containment).scrollTop() || 0), this.offset = this.helper.offset(), this.position = {
                    left: s,
                    top: a
                }, this.size = this._helper ? {
                    width: h.outerWidth(),
                    height: h.outerHeight()
                } : {
                    width: h.width(),
                    height: h.height()
                }, this.originalSize = this._helper ? {
                    width: h.outerWidth(),
                    height: h.outerHeight()
                } : {
                    width: h.width(),
                    height: h.height()
                }, this.originalPosition = {
                    left: s,
                    top: a
                }, this.sizeDiff = {
                    width: h.outerWidth() - h.width(),
                    height: h.outerHeight() - h.height()
                }, this.originalMousePosition = {
                    left: i.pageX,
                    top: i.pageY
                }, this.aspectRatio = "number" == typeof r.aspectRatio ? r.aspectRatio : this.originalSize.width / this.originalSize.height || 1, n = e(".ui-resizable-" + this.axis).css("cursor"), e("body").css("cursor", "auto" === n ? this.axis + "-resize" : n), h.addClass("ui-resizable-resizing"), this._propagate("start", i), !0
            },
            _mouseDrag: function(t) {
                var i, s = this.helper,
                    a = {},
                    n = this.originalMousePosition,
                    r = this.axis,
                    o = this.position.top,
                    h = this.position.left,
                    l = this.size.width,
                    u = this.size.height,
                    c = t.pageX - n.left || 0,
                    d = t.pageY - n.top || 0,
                    p = this._change[r];
                return p ? (i = p.apply(this, [t, c, d]), this._updateVirtualBoundaries(t.shiftKey), (this._aspectRatio || t.shiftKey) && (i = this._updateRatio(i, t)), i = this._respectSize(i, t), this._updateCache(i), this._propagate("resize", t), this.position.top !== o && (a.top = this.position.top + "px"), this.position.left !== h && (a.left = this.position.left + "px"), this.size.width !== l && (a.width = this.size.width + "px"), this.size.height !== u && (a.height = this.size.height + "px"), s.css(a), !this._helper && this._proportionallyResizeElements.length && this._proportionallyResize(), e.isEmptyObject(a) || this._trigger("resize", t, this.ui()), !1) : !1
            },
            _mouseStop: function(t) {
                this.resizing = !1;
                var i, s, a, n, r, o, h, l = this.options,
                    u = this;
                return this._helper && (i = this._proportionallyResizeElements, s = i.length && /textarea/i.test(i[0].nodeName), a = s && e.ui.hasScroll(i[0], "left") ? 0 : u.sizeDiff.height, n = s ? 0 : u.sizeDiff.width, r = {
                    width: u.helper.width() - n,
                    height: u.helper.height() - a
                }, o = parseInt(u.element.css("left"), 10) + (u.position.left - u.originalPosition.left) || null, h = parseInt(u.element.css("top"), 10) + (u.position.top - u.originalPosition.top) || null, l.animate || this.element.css(e.extend(r, {
                    top: h,
                    left: o
                })), u.helper.height(u.size.height), u.helper.width(u.size.width), this._helper && !l.animate && this._proportionallyResize()), e("body").css("cursor", "auto"), this.element.removeClass("ui-resizable-resizing"), this._propagate("stop", t), this._helper && this.helper.remove(), !1
            },
            _updateVirtualBoundaries: function(e) {
                var t, s, a, n, r, o = this.options;
                r = {
                    minWidth: i(o.minWidth) ? o.minWidth : 0,
                    maxWidth: i(o.maxWidth) ? o.maxWidth : 1 / 0,
                    minHeight: i(o.minHeight) ? o.minHeight : 0,
                    maxHeight: i(o.maxHeight) ? o.maxHeight : 1 / 0
                }, (this._aspectRatio || e) && (t = r.minHeight * this.aspectRatio, a = r.minWidth / this.aspectRatio, s = r.maxHeight * this.aspectRatio, n = r.maxWidth / this.aspectRatio, t > r.minWidth && (r.minWidth = t), a > r.minHeight && (r.minHeight = a), r.maxWidth > s && (r.maxWidth = s), r.maxHeight > n && (r.maxHeight = n)), this._vBoundaries = r
            },
            _updateCache: function(e) {
                this.offset = this.helper.offset(), i(e.left) && (this.position.left = e.left), i(e.top) && (this.position.top = e.top), i(e.height) && (this.size.height = e.height), i(e.width) && (this.size.width = e.width)
            },
            _updateRatio: function(e) {
                var t = this.position,
                    s = this.size,
                    a = this.axis;
                return i(e.height) ? e.width = e.height * this.aspectRatio : i(e.width) && (e.height = e.width / this.aspectRatio), "sw" === a && (e.left = t.left + (s.width - e.width), e.top = null), "nw" === a && (e.top = t.top + (s.height - e.height), e.left = t.left + (s.width - e.width)), e
            },
            _respectSize: function(e) {
                var t = this._vBoundaries,
                    s = this.axis,
                    a = i(e.width) && t.maxWidth && t.maxWidth < e.width,
                    n = i(e.height) && t.maxHeight && t.maxHeight < e.height,
                    r = i(e.width) && t.minWidth && t.minWidth > e.width,
                    o = i(e.height) && t.minHeight && t.minHeight > e.height,
                    h = this.originalPosition.left + this.originalSize.width,
                    l = this.position.top + this.size.height,
                    u = /sw|nw|w/.test(s),
                    c = /nw|ne|n/.test(s);
                return r && (e.width = t.minWidth), o && (e.height = t.minHeight), a && (e.width = t.maxWidth), n && (e.height = t.maxHeight), r && u && (e.left = h - t.minWidth), a && u && (e.left = h - t.maxWidth), o && c && (e.top = l - t.minHeight), n && c && (e.top = l - t.maxHeight), e.width || e.height || e.left || !e.top ? e.width || e.height || e.top || !e.left || (e.left = null) : e.top = null, e
            },
            _proportionallyResize: function() {
                if (this._proportionallyResizeElements.length) {
                    var e, t, i, s, a, n = this.helper || this.element;
                    for (e = 0; this._proportionallyResizeElements.length > e; e++) {
                        if (a = this._proportionallyResizeElements[e], !this.borderDif)
                            for (this.borderDif = [], i = [a.css("borderTopWidth"), a.css("borderRightWidth"), a.css("borderBottomWidth"), a.css("borderLeftWidth")], s = [a.css("paddingTop"), a.css("paddingRight"), a.css("paddingBottom"), a.css("paddingLeft")], t = 0; i.length > t; t++) this.borderDif[t] = (parseInt(i[t], 10) || 0) + (parseInt(s[t], 10) || 0);
                        a.css({
                            height: n.height() - this.borderDif[0] - this.borderDif[2] || 0,
                            width: n.width() - this.borderDif[1] - this.borderDif[3] || 0
                        })
                    }
                }
            },
            _renderProxy: function() {
                var t = this.element,
                    i = this.options;
                this.elementOffset = t.offset(), this._helper ? (this.helper = this.helper || e("<div style='overflow:hidden;'></div>"), this.helper.addClass(this._helper).css({
                    width: this.element.outerWidth() - 1,
                    height: this.element.outerHeight() - 1,
                    position: "absolute",
                    left: this.elementOffset.left + "px",
                    top: this.elementOffset.top + "px",
                    zIndex: ++i.zIndex
                }), this.helper.appendTo("body").disableSelection()) : this.helper = this.element
            },
            _change: {
                e: function(e, t) {
                    return {
                        width: this.originalSize.width + t
                    }
                },
                w: function(e, t) {
                    var i = this.originalSize,
                        s = this.originalPosition;
                    return {
                        left: s.left + t,
                        width: i.width - t
                    }
                },
                n: function(e, t, i) {
                    var s = this.originalSize,
                        a = this.originalPosition;
                    return {
                        top: a.top + i,
                        height: s.height - i
                    }
                },
                s: function(e, t, i) {
                    return {
                        height: this.originalSize.height + i
                    }
                },
                se: function(t, i, s) {
                    return e.extend(this._change.s.apply(this, arguments), this._change.e.apply(this, [t, i, s]))
                },
                sw: function(t, i, s) {
                    return e.extend(this._change.s.apply(this, arguments), this._change.w.apply(this, [t, i, s]))
                },
                ne: function(t, i, s) {
                    return e.extend(this._change.n.apply(this, arguments), this._change.e.apply(this, [t, i, s]))
                },
                nw: function(t, i, s) {
                    return e.extend(this._change.n.apply(this, arguments), this._change.w.apply(this, [t, i, s]))
                }
            },
            _propagate: function(t, i) {
                e.ui.plugin.call(this, t, [i, this.ui()]), "resize" !== t && this._trigger(t, i, this.ui())
            },
            plugins: {},
            ui: function() {
                return {
                    originalElement: this.originalElement,
                    element: this.element,
                    helper: this.helper,
                    position: this.position,
                    size: this.size,
                    originalSize: this.originalSize,
                    originalPosition: this.originalPosition
                }
            }
        }), e.ui.plugin.add("resizable", "animate", {
            stop: function(t) {
                var i = e(this).data("ui-resizable"),
                    s = i.options,
                    a = i._proportionallyResizeElements,
                    n = a.length && /textarea/i.test(a[0].nodeName),
                    r = n && e.ui.hasScroll(a[0], "left") ? 0 : i.sizeDiff.height,
                    o = n ? 0 : i.sizeDiff.width,
                    h = {
                        width: i.size.width - o,
                        height: i.size.height - r
                    },
                    l = parseInt(i.element.css("left"), 10) + (i.position.left - i.originalPosition.left) || null,
                    u = parseInt(i.element.css("top"), 10) + (i.position.top - i.originalPosition.top) || null;
                i.element.animate(e.extend(h, u && l ? {
                    top: u,
                    left: l
                } : {}), {
                    duration: s.animateDuration,
                    easing: s.animateEasing,
                    step: function() {
                        var s = {
                            width: parseInt(i.element.css("width"), 10),
                            height: parseInt(i.element.css("height"), 10),
                            top: parseInt(i.element.css("top"), 10),
                            left: parseInt(i.element.css("left"), 10)
                        };
                        a && a.length && e(a[0]).css({
                            width: s.width,
                            height: s.height
                        }), i._updateCache(s), i._propagate("resize", t)
                    }
                })
            }
        }), e.ui.plugin.add("resizable", "containment", {
            start: function() {
                var i, s, a, n, r, o, h, l = e(this).data("ui-resizable"),
                    u = l.options,
                    c = l.element,
                    d = u.containment,
                    p = d instanceof e ? d.get(0) : /parent/.test(d) ? c.parent().get(0) : d;
                p && (l.containerElement = e(p), /document/.test(d) || d === document ? (l.containerOffset = {
                    left: 0,
                    top: 0
                }, l.containerPosition = {
                    left: 0,
                    top: 0
                }, l.parentData = {
                    element: e(document),
                    left: 0,
                    top: 0,
                    width: e(document).width(),
                    height: e(document).height() || document.body.parentNode.scrollHeight
                }) : (i = e(p), s = [], e(["Top", "Right", "Left", "Bottom"]).each(function(e, a) {
                    s[e] = t(i.css("padding" + a))
                }), l.containerOffset = i.offset(), l.containerPosition = i.position(), l.containerSize = {
                    height: i.innerHeight() - s[3],
                    width: i.innerWidth() - s[1]
                }, a = l.containerOffset, n = l.containerSize.height, r = l.containerSize.width, o = e.ui.hasScroll(p, "left") ? p.scrollWidth : r, h = e.ui.hasScroll(p) ? p.scrollHeight : n, l.parentData = {
                    element: p,
                    left: a.left,
                    top: a.top,
                    width: o,
                    height: h
                }))
            },
            resize: function(t) {
                var i, s, a, n, r = e(this).data("ui-resizable"),
                    o = r.options,
                    h = r.containerOffset,
                    l = r.position,
                    u = r._aspectRatio || t.shiftKey,
                    c = {
                        top: 0,
                        left: 0
                    },
                    d = r.containerElement;
                d[0] !== document && /static/.test(d.css("position")) && (c = h), l.left < (r._helper ? h.left : 0) && (r.size.width = r.size.width + (r._helper ? r.position.left - h.left : r.position.left - c.left), u && (r.size.height = r.size.width / r.aspectRatio), r.position.left = o.helper ? h.left : 0), l.top < (r._helper ? h.top : 0) && (r.size.height = r.size.height + (r._helper ? r.position.top - h.top : r.position.top), u && (r.size.width = r.size.height * r.aspectRatio), r.position.top = r._helper ? h.top : 0), r.offset.left = r.parentData.left + r.position.left, r.offset.top = r.parentData.top + r.position.top, i = Math.abs((r._helper ? r.offset.left - c.left : r.offset.left - c.left) + r.sizeDiff.width), s = Math.abs((r._helper ? r.offset.top - c.top : r.offset.top - h.top) + r.sizeDiff.height), a = r.containerElement.get(0) === r.element.parent().get(0), n = /relative|absolute/.test(r.containerElement.css("position")), a && n && (i -= r.parentData.left), i + r.size.width >= r.parentData.width && (r.size.width = r.parentData.width - i, u && (r.size.height = r.size.width / r.aspectRatio)), s + r.size.height >= r.parentData.height && (r.size.height = r.parentData.height - s, u && (r.size.width = r.size.height * r.aspectRatio))
            },
            stop: function() {
                var t = e(this).data("ui-resizable"),
                    i = t.options,
                    s = t.containerOffset,
                    a = t.containerPosition,
                    n = t.containerElement,
                    r = e(t.helper),
                    o = r.offset(),
                    h = r.outerWidth() - t.sizeDiff.width,
                    l = r.outerHeight() - t.sizeDiff.height;
                t._helper && !i.animate && /relative/.test(n.css("position")) && e(this).css({
                    left: o.left - a.left - s.left,
                    width: h,
                    height: l
                }), t._helper && !i.animate && /static/.test(n.css("position")) && e(this).css({
                    left: o.left - a.left - s.left,
                    width: h,
                    height: l
                })
            }
        }), e.ui.plugin.add("resizable", "alsoResize", {
            start: function() {
                var t = e(this).data("ui-resizable"),
                    i = t.options,
                    s = function(t) {
                        e(t).each(function() {
                            var t = e(this);
                            t.data("ui-resizable-alsoresize", {
                                width: parseInt(t.width(), 10),
                                height: parseInt(t.height(), 10),
                                left: parseInt(t.css("left"), 10),
                                top: parseInt(t.css("top"), 10)
                            })
                        })
                    };
                "object" != typeof i.alsoResize || i.alsoResize.parentNode ? s(i.alsoResize) : i.alsoResize.length ? (i.alsoResize = i.alsoResize[0], s(i.alsoResize)) : e.each(i.alsoResize, function(e) {
                    s(e)
                })
            },
            resize: function(t, i) {
                var s = e(this).data("ui-resizable"),
                    a = s.options,
                    n = s.originalSize,
                    r = s.originalPosition,
                    o = {
                        height: s.size.height - n.height || 0,
                        width: s.size.width - n.width || 0,
                        top: s.position.top - r.top || 0,
                        left: s.position.left - r.left || 0
                    },
                    h = function(t, s) {
                        e(t).each(function() {
                            var t = e(this),
                                a = e(this).data("ui-resizable-alsoresize"),
                                n = {},
                                r = s && s.length ? s : t.parents(i.originalElement[0]).length ? ["width", "height"] : ["width", "height", "top", "left"];
                            e.each(r, function(e, t) {
                                var i = (a[t] || 0) + (o[t] || 0);
                                i && i >= 0 && (n[t] = i || null)
                            }), t.css(n)
                        })
                    };
                "object" != typeof a.alsoResize || a.alsoResize.nodeType ? h(a.alsoResize) : e.each(a.alsoResize, function(e, t) {
                    h(e, t)
                })
            },
            stop: function() {
                e(this).removeData("resizable-alsoresize")
            }
        }), e.ui.plugin.add("resizable", "ghost", {
            start: function() {
                var t = e(this).data("ui-resizable"),
                    i = t.options,
                    s = t.size;
                t.ghost = t.originalElement.clone(), t.ghost.css({
                    opacity: .25,
                    display: "block",
                    position: "relative",
                    height: s.height,
                    width: s.width,
                    margin: 0,
                    left: 0,
                    top: 0
                }).addClass("ui-resizable-ghost").addClass("string" == typeof i.ghost ? i.ghost : ""), t.ghost.appendTo(t.helper)
            },
            resize: function() {
                var t = e(this).data("ui-resizable");
                t.ghost && t.ghost.css({
                    position: "relative",
                    height: t.size.height,
                    width: t.size.width
                })
            },
            stop: function() {
                var t = e(this).data("ui-resizable");
                t.ghost && t.helper && t.helper.get(0).removeChild(t.ghost.get(0))
            }
        }), e.ui.plugin.add("resizable", "grid", {
            resize: function() {
                var t = e(this).data("ui-resizable"),
                    i = t.options,
                    s = t.size,
                    a = t.originalSize,
                    n = t.originalPosition,
                    r = t.axis,
                    o = "number" == typeof i.grid ? [i.grid, i.grid] : i.grid,
                    h = o[0] || 1,
                    l = o[1] || 1,
                    u = Math.round((s.width - a.width) / h) * h,
                    c = Math.round((s.height - a.height) / l) * l,
                    d = a.width + u,
                    p = a.height + c,
                    f = i.maxWidth && d > i.maxWidth,
                    m = i.maxHeight && p > i.maxHeight,
                    g = i.minWidth && i.minWidth > d,
                    v = i.minHeight && i.minHeight > p;
                i.grid = o, g && (d += h), v && (p += l), f && (d -= h), m && (p -= l), /^(se|s|e)$/.test(r) ? (t.size.width = d, t.size.height = p) : /^(ne)$/.test(r) ? (t.size.width = d, t.size.height = p, t.position.top = n.top - c) : /^(sw)$/.test(r) ? (t.size.width = d, t.size.height = p, t.position.left = n.left - u) : (t.size.width = d, t.size.height = p, t.position.top = n.top - c, t.position.left = n.left - u)
            }
        })
    }(jQuery),
    function(e) {
        e.widget("ui.selectable", e.ui.mouse, {
            version: "1.10.3",
            options: {
                appendTo: "body",
                autoRefresh: !0,
                distance: 0,
                filter: "*",
                tolerance: "touch",
                selected: null,
                selecting: null,
                start: null,
                stop: null,
                unselected: null,
                unselecting: null
            },
            _create: function() {
                var t, i = this;
                this.element.addClass("ui-selectable"), this.dragged = !1, this.refresh = function() {
                    t = e(i.options.filter, i.element[0]), t.addClass("ui-selectee"), t.each(function() {
                        var t = e(this),
                            i = t.offset();
                        e.data(this, "selectable-item", {
                            element: this,
                            $element: t,
                            left: i.left,
                            top: i.top,
                            right: i.left + t.outerWidth(),
                            bottom: i.top + t.outerHeight(),
                            startselected: !1,
                            selected: t.hasClass("ui-selected"),
                            selecting: t.hasClass("ui-selecting"),
                            unselecting: t.hasClass("ui-unselecting")
                        })
                    })
                }, this.refresh(), this.selectees = t.addClass("ui-selectee"), this._mouseInit(), this.helper = e("<div class='ui-selectable-helper'></div>")
            },
            _destroy: function() {
                this.selectees.removeClass("ui-selectee").removeData("selectable-item"), this.element.removeClass("ui-selectable ui-selectable-disabled"), this._mouseDestroy()
            },
            _mouseStart: function(t) {
                var i = this,
                    s = this.options;
                this.opos = [t.pageX, t.pageY], this.options.disabled || (this.selectees = e(s.filter, this.element[0]), this._trigger("start", t), e(s.appendTo).append(this.helper), this.helper.css({
                    left: t.pageX,
                    top: t.pageY,
                    width: 0,
                    height: 0
                }), s.autoRefresh && this.refresh(), this.selectees.filter(".ui-selected").each(function() {
                    var s = e.data(this, "selectable-item");
                    s.startselected = !0, t.metaKey || t.ctrlKey || (s.$element.removeClass("ui-selected"), s.selected = !1, s.$element.addClass("ui-unselecting"), s.unselecting = !0, i._trigger("unselecting", t, {
                        unselecting: s.element
                    }))
                }), e(t.target).parents().addBack().each(function() {
                    var s, a = e.data(this, "selectable-item");
                    return a ? (s = !t.metaKey && !t.ctrlKey || !a.$element.hasClass("ui-selected"), a.$element.removeClass(s ? "ui-unselecting" : "ui-selected").addClass(s ? "ui-selecting" : "ui-unselecting"), a.unselecting = !s, a.selecting = s, a.selected = s, s ? i._trigger("selecting", t, {
                        selecting: a.element
                    }) : i._trigger("unselecting", t, {
                        unselecting: a.element
                    }), !1) : void 0
                }))
            },
            _mouseDrag: function(t) {
                if (this.dragged = !0, !this.options.disabled) {
                    var i, s = this,
                        a = this.options,
                        n = this.opos[0],
                        r = this.opos[1],
                        o = t.pageX,
                        h = t.pageY;
                    return n > o && (i = o, o = n, n = i), r > h && (i = h, h = r, r = i), this.helper.css({
                        left: n,
                        top: r,
                        width: o - n,
                        height: h - r
                    }), this.selectees.each(function() {
                        var i = e.data(this, "selectable-item"),
                            l = !1;
                        i && i.element !== s.element[0] && ("touch" === a.tolerance ? l = !(i.left > o || n > i.right || i.top > h || r > i.bottom) : "fit" === a.tolerance && (l = i.left > n && o > i.right && i.top > r && h > i.bottom), l ? (i.selected && (i.$element.removeClass("ui-selected"), i.selected = !1), i.unselecting && (i.$element.removeClass("ui-unselecting"), i.unselecting = !1), i.selecting || (i.$element.addClass("ui-selecting"), i.selecting = !0, s._trigger("selecting", t, {
                            selecting: i.element
                        }))) : (i.selecting && ((t.metaKey || t.ctrlKey) && i.startselected ? (i.$element.removeClass("ui-selecting"), i.selecting = !1, i.$element.addClass("ui-selected"), i.selected = !0) : (i.$element.removeClass("ui-selecting"), i.selecting = !1, i.startselected && (i.$element.addClass("ui-unselecting"), i.unselecting = !0), s._trigger("unselecting", t, {
                            unselecting: i.element
                        }))), i.selected && (t.metaKey || t.ctrlKey || i.startselected || (i.$element.removeClass("ui-selected"), i.selected = !1, i.$element.addClass("ui-unselecting"), i.unselecting = !0, s._trigger("unselecting", t, {
                            unselecting: i.element
                        })))))
                    }), !1
                }
            },
            _mouseStop: function(t) {
                var i = this;
                return this.dragged = !1, e(".ui-unselecting", this.element[0]).each(function() {
                    var s = e.data(this, "selectable-item");
                    s.$element.removeClass("ui-unselecting"), s.unselecting = !1, s.startselected = !1, i._trigger("unselected", t, {
                        unselected: s.element
                    })
                }), e(".ui-selecting", this.element[0]).each(function() {
                    var s = e.data(this, "selectable-item");
                    s.$element.removeClass("ui-selecting").addClass("ui-selected"), s.selecting = !1, s.selected = !0, s.startselected = !0, i._trigger("selected", t, {
                        selected: s.element
                    })
                }), this._trigger("stop", t), this.helper.remove(), !1
            }
        })
    }(jQuery),
    function(e) {
        function t(e, t, i) {
            return e > t && t + i > e
        }

        function i(e) {
            return /left|right/.test(e.css("float")) || /inline|table-cell/.test(e.css("display"))
        }
        e.widget("ui.sortable", e.ui.mouse, {
            version: "1.10.3",
            widgetEventPrefix: "sort",
            ready: !1,
            options: {
                appendTo: "parent",
                axis: !1,
                connectWith: !1,
                containment: !1,
                cursor: "auto",
                cursorAt: !1,
                dropOnEmpty: !0,
                forcePlaceholderSize: !1,
                forceHelperSize: !1,
                grid: !1,
                handle: !1,
                helper: "original",
                items: "> *",
                opacity: !1,
                placeholder: !1,
                revert: !1,
                scroll: !0,
                scrollSensitivity: 20,
                scrollSpeed: 20,
                scope: "default",
                tolerance: "intersect",
                zIndex: 1e3,
                activate: null,
                beforeStop: null,
                change: null,
                deactivate: null,
                out: null,
                over: null,
                receive: null,
                remove: null,
                sort: null,
                start: null,
                stop: null,
                update: null
            },
            _create: function() {
                var e = this.options;
                this.containerCache = {}, this.element.addClass("ui-sortable"), this.refresh(), this.floating = this.items.length ? "x" === e.axis || i(this.items[0].item) : !1, this.offset = this.element.offset(), this._mouseInit(), this.ready = !0
            },
            _destroy: function() {
                this.element.removeClass("ui-sortable ui-sortable-disabled"), this._mouseDestroy();
                for (var e = this.items.length - 1; e >= 0; e--) this.items[e].item.removeData(this.widgetName + "-item");
                return this
            },
            _setOption: function(t, i) {
                "disabled" === t ? (this.options[t] = i, this.widget().toggleClass("ui-sortable-disabled", !!i)) : e.Widget.prototype._setOption.apply(this, arguments)
            },
            _mouseCapture: function(t, i) {
                var s = null,
                    a = !1,
                    n = this;
                return this.reverting ? !1 : this.options.disabled || "static" === this.options.type ? !1 : (this._refreshItems(t), e(t.target).parents().each(function() {
                    return e.data(this, n.widgetName + "-item") === n ? (s = e(this), !1) : void 0
                }), e.data(t.target, n.widgetName + "-item") === n && (s = e(t.target)), s && (!this.options.handle || i || (e(this.options.handle, s).find("*").addBack().each(function() {
                    this === t.target && (a = !0)
                }), a)) ? (this.currentItem = s, this._removeCurrentsFromItems(), !0) : !1)
            },
            _mouseStart: function(t, i, s) {
                var a, n, r = this.options;
                if (this.currentContainer = this, this.refreshPositions(), this.helper = this._createHelper(t), this._cacheHelperProportions(), this._cacheMargins(), this.scrollParent = this.helper.scrollParent(), this.offset = this.currentItem.offset(), this.offset = {
                        top: this.offset.top - this.margins.top,
                        left: this.offset.left - this.margins.left
                    }, e.extend(this.offset, {
                        click: {
                            left: t.pageX - this.offset.left,
                            top: t.pageY - this.offset.top
                        },
                        parent: this._getParentOffset(),
                        relative: this._getRelativeOffset()
                    }), this.helper.css("position", "absolute"), this.cssPosition = this.helper.css("position"), this.originalPosition = this._generatePosition(t), this.originalPageX = t.pageX, this.originalPageY = t.pageY, r.cursorAt && this._adjustOffsetFromHelper(r.cursorAt), this.domPosition = {
                        prev: this.currentItem.prev()[0],
                        parent: this.currentItem.parent()[0]
                    }, this.helper[0] !== this.currentItem[0] && this.currentItem.hide(), this._createPlaceholder(), r.containment && this._setContainment(), r.cursor && "auto" !== r.cursor && (n = this.document.find("body"), this.storedCursor = n.css("cursor"), n.css("cursor", r.cursor), this.storedStylesheet = e("<style>*{ cursor: " + r.cursor + " !important; }</style>").appendTo(n)), r.opacity && (this.helper.css("opacity") && (this._storedOpacity = this.helper.css("opacity")), this.helper.css("opacity", r.opacity)), r.zIndex && (this.helper.css("zIndex") && (this._storedZIndex = this.helper.css("zIndex")), this.helper.css("zIndex", r.zIndex)), this.scrollParent[0] !== document && "HTML" !== this.scrollParent[0].tagName && (this.overflowOffset = this.scrollParent.offset()), this._trigger("start", t, this._uiHash()), this._preserveHelperProportions || this._cacheHelperProportions(), !s)
                    for (a = this.containers.length - 1; a >= 0; a--) this.containers[a]._trigger("activate", t, this._uiHash(this));
                return e.ui.ddmanager && (e.ui.ddmanager.current = this), e.ui.ddmanager && !r.dropBehaviour && e.ui.ddmanager.prepareOffsets(this, t), this.dragging = !0, this.helper.addClass("ui-sortable-helper"), this._mouseDrag(t), !0
            },
            _mouseDrag: function(t) {
                var i, s, a, n, r = this.options,
                    o = !1;
                for (this.position = this._generatePosition(t), this.positionAbs = this._convertPositionTo("absolute"), this.lastPositionAbs || (this.lastPositionAbs = this.positionAbs), this.options.scroll && (this.scrollParent[0] !== document && "HTML" !== this.scrollParent[0].tagName ? (this.overflowOffset.top + this.scrollParent[0].offsetHeight - t.pageY < r.scrollSensitivity ? this.scrollParent[0].scrollTop = o = this.scrollParent[0].scrollTop + r.scrollSpeed : t.pageY - this.overflowOffset.top < r.scrollSensitivity && (this.scrollParent[0].scrollTop = o = this.scrollParent[0].scrollTop - r.scrollSpeed), this.overflowOffset.left + this.scrollParent[0].offsetWidth - t.pageX < r.scrollSensitivity ? this.scrollParent[0].scrollLeft = o = this.scrollParent[0].scrollLeft + r.scrollSpeed : t.pageX - this.overflowOffset.left < r.scrollSensitivity && (this.scrollParent[0].scrollLeft = o = this.scrollParent[0].scrollLeft - r.scrollSpeed)) : (t.pageY - e(document).scrollTop() < r.scrollSensitivity ? o = e(document).scrollTop(e(document).scrollTop() - r.scrollSpeed) : e(window).height() - (t.pageY - e(document).scrollTop()) < r.scrollSensitivity && (o = e(document).scrollTop(e(document).scrollTop() + r.scrollSpeed)), t.pageX - e(document).scrollLeft() < r.scrollSensitivity ? o = e(document).scrollLeft(e(document).scrollLeft() - r.scrollSpeed) : e(window).width() - (t.pageX - e(document).scrollLeft()) < r.scrollSensitivity && (o = e(document).scrollLeft(e(document).scrollLeft() + r.scrollSpeed))), o !== !1 && e.ui.ddmanager && !r.dropBehaviour && e.ui.ddmanager.prepareOffsets(this, t)), this.positionAbs = this._convertPositionTo("absolute"), this.options.axis && "y" === this.options.axis || (this.helper[0].style.left = this.position.left + "px"), this.options.axis && "x" === this.options.axis || (this.helper[0].style.top = this.position.top + "px"), i = this.items.length - 1; i >= 0; i--)
                    if (s = this.items[i], a = s.item[0], n = this._intersectsWithPointer(s), n && s.instance === this.currentContainer && a !== this.currentItem[0] && this.placeholder[1 === n ? "next" : "prev"]()[0] !== a && !e.contains(this.placeholder[0], a) && ("semi-dynamic" === this.options.type ? !e.contains(this.element[0], a) : !0)) {
                        if (this.direction = 1 === n ? "down" : "up", "pointer" !== this.options.tolerance && !this._intersectsWithSides(s)) break;
                        this._rearrange(t, s), this._trigger("change", t, this._uiHash());
                        break
                    }
                return this._contactContainers(t), e.ui.ddmanager && e.ui.ddmanager.drag(this, t), this._trigger("sort", t, this._uiHash()), this.lastPositionAbs = this.positionAbs, !1
            },
            _mouseStop: function(t, i) {
                if (t) {
                    if (e.ui.ddmanager && !this.options.dropBehaviour && e.ui.ddmanager.drop(this, t), this.options.revert) {
                        var s = this,
                            a = this.placeholder.offset(),
                            n = this.options.axis,
                            r = {};
                        n && "x" !== n || (r.left = a.left - this.offset.parent.left - this.margins.left + (this.offsetParent[0] === document.body ? 0 : this.offsetParent[0].scrollLeft)), n && "y" !== n || (r.top = a.top - this.offset.parent.top - this.margins.top + (this.offsetParent[0] === document.body ? 0 : this.offsetParent[0].scrollTop)), this.reverting = !0, e(this.helper).animate(r, parseInt(this.options.revert, 10) || 500, function() {
                            s._clear(t)
                        })
                    } else this._clear(t, i);
                    return !1
                }
            },
            cancel: function() {
                if (this.dragging) {
                    this._mouseUp({
                        target: null
                    }), "original" === this.options.helper ? this.currentItem.css(this._storedCSS).removeClass("ui-sortable-helper") : this.currentItem.show();
                    for (var t = this.containers.length - 1; t >= 0; t--) this.containers[t]._trigger("deactivate", null, this._uiHash(this)), this.containers[t].containerCache.over && (this.containers[t]._trigger("out", null, this._uiHash(this)), this.containers[t].containerCache.over = 0)
                }
                return this.placeholder && (this.placeholder[0].parentNode && this.placeholder[0].parentNode.removeChild(this.placeholder[0]), "original" !== this.options.helper && this.helper && this.helper[0].parentNode && this.helper.remove(), e.extend(this, {
                    helper: null,
                    dragging: !1,
                    reverting: !1,
                    _noFinalSort: null
                }), this.domPosition.prev ? e(this.domPosition.prev).after(this.currentItem) : e(this.domPosition.parent).prepend(this.currentItem)), this
            },
            serialize: function(t) {
                var i = this._getItemsAsjQuery(t && t.connected),
                    s = [];
                return t = t || {}, e(i).each(function() {
                    var i = (e(t.item || this).attr(t.attribute || "id") || "").match(t.expression || /(.+)[\-=_](.+)/);
                    i && s.push((t.key || i[1] + "[]") + "=" + (t.key && t.expression ? i[1] : i[2]))
                }), !s.length && t.key && s.push(t.key + "="), s.join("&")
            },
            toArray: function(t) {
                var i = this._getItemsAsjQuery(t && t.connected),
                    s = [];
                return t = t || {}, i.each(function() {
                    s.push(e(t.item || this).attr(t.attribute || "id") || "")
                }), s
            },
            _intersectsWith: function(e) {
                var t = this.positionAbs.left,
                    i = t + this.helperProportions.width,
                    s = this.positionAbs.top,
                    a = s + this.helperProportions.height,
                    n = e.left,
                    r = n + e.width,
                    o = e.top,
                    h = o + e.height,
                    l = this.offset.click.top,
                    u = this.offset.click.left,
                    c = "x" === this.options.axis || s + l > o && h > s + l,
                    d = "y" === this.options.axis || t + u > n && r > t + u,
                    p = c && d;
                return "pointer" === this.options.tolerance || this.options.forcePointerForContainers || "pointer" !== this.options.tolerance && this.helperProportions[this.floating ? "width" : "height"] > e[this.floating ? "width" : "height"] ? p : t + this.helperProportions.width / 2 > n && r > i - this.helperProportions.width / 2 && s + this.helperProportions.height / 2 > o && h > a - this.helperProportions.height / 2
            },
            _intersectsWithPointer: function(e) {
                var i = "x" === this.options.axis || t(this.positionAbs.top + this.offset.click.top, e.top, e.height),
                    s = "y" === this.options.axis || t(this.positionAbs.left + this.offset.click.left, e.left, e.width),
                    a = i && s,
                    n = this._getDragVerticalDirection(),
                    r = this._getDragHorizontalDirection();
                return a ? this.floating ? r && "right" === r || "down" === n ? 2 : 1 : n && ("down" === n ? 2 : 1) : !1
            },
            _intersectsWithSides: function(e) {
                var i = t(this.positionAbs.top + this.offset.click.top, e.top + e.height / 2, e.height),
                    s = t(this.positionAbs.left + this.offset.click.left, e.left + e.width / 2, e.width),
                    a = this._getDragVerticalDirection(),
                    n = this._getDragHorizontalDirection();
                return this.floating && n ? "right" === n && s || "left" === n && !s : a && ("down" === a && i || "up" === a && !i)
            },
            _getDragVerticalDirection: function() {
                var e = this.positionAbs.top - this.lastPositionAbs.top;
                return 0 !== e && (e > 0 ? "down" : "up")
            },
            _getDragHorizontalDirection: function() {
                var e = this.positionAbs.left - this.lastPositionAbs.left;
                return 0 !== e && (e > 0 ? "right" : "left")
            },
            refresh: function(e) {
                return this._refreshItems(e), this.refreshPositions(), this
            },
            _connectWith: function() {
                var e = this.options;
                return e.connectWith.constructor === String ? [e.connectWith] : e.connectWith
            },
            _getItemsAsjQuery: function(t) {
                var i, s, a, n, r = [],
                    o = [],
                    h = this._connectWith();
                if (h && t)
                    for (i = h.length - 1; i >= 0; i--)
                        for (a = e(h[i]), s = a.length - 1; s >= 0; s--) n = e.data(a[s], this.widgetFullName), n && n !== this && !n.options.disabled && o.push([e.isFunction(n.options.items) ? n.options.items.call(n.element) : e(n.options.items, n.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"), n]);
                for (o.push([e.isFunction(this.options.items) ? this.options.items.call(this.element, null, {
                        options: this.options,
                        item: this.currentItem
                    }) : e(this.options.items, this.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"), this]), i = o.length - 1; i >= 0; i--) o[i][0].each(function() {
                    r.push(this)
                });
                return e(r)
            },
            _removeCurrentsFromItems: function() {
                var t = this.currentItem.find(":data(" + this.widgetName + "-item)");
                this.items = e.grep(this.items, function(e) {
                    for (var i = 0; t.length > i; i++)
                        if (t[i] === e.item[0]) return !1;
                    return !0
                })
            },
            _refreshItems: function(t) {
                this.items = [], this.containers = [this];
                var i, s, a, n, r, o, h, l, u = this.items,
                    c = [
                        [e.isFunction(this.options.items) ? this.options.items.call(this.element[0], t, {
                            item: this.currentItem
                        }) : e(this.options.items, this.element), this]
                    ],
                    d = this._connectWith();
                if (d && this.ready)
                    for (i = d.length - 1; i >= 0; i--)
                        for (a = e(d[i]), s = a.length - 1; s >= 0; s--) n = e.data(a[s], this.widgetFullName), n && n !== this && !n.options.disabled && (c.push([e.isFunction(n.options.items) ? n.options.items.call(n.element[0], t, {
                            item: this.currentItem
                        }) : e(n.options.items, n.element), n]), this.containers.push(n));
                for (i = c.length - 1; i >= 0; i--)
                    for (r = c[i][1], o = c[i][0], s = 0, l = o.length; l > s; s++) h = e(o[s]), h.data(this.widgetName + "-item", r), u.push({
                        item: h,
                        instance: r,
                        width: 0,
                        height: 0,
                        left: 0,
                        top: 0
                    })
            },
            refreshPositions: function(t) {
                this.offsetParent && this.helper && (this.offset.parent = this._getParentOffset());
                var i, s, a, n;
                for (i = this.items.length - 1; i >= 0; i--) s = this.items[i], s.instance !== this.currentContainer && this.currentContainer && s.item[0] !== this.currentItem[0] || (a = this.options.toleranceElement ? e(this.options.toleranceElement, s.item) : s.item, t || (s.width = a.outerWidth(), s.height = a.outerHeight()), n = a.offset(), s.left = n.left, s.top = n.top);
                if (this.options.custom && this.options.custom.refreshContainers) this.options.custom.refreshContainers.call(this);
                else
                    for (i = this.containers.length - 1; i >= 0; i--) n = this.containers[i].element.offset(), this.containers[i].containerCache.left = n.left, this.containers[i].containerCache.top = n.top, this.containers[i].containerCache.width = this.containers[i].element.outerWidth(), this.containers[i].containerCache.height = this.containers[i].element.outerHeight();
                return this
            },
            _createPlaceholder: function(t) {
                t = t || this;
                var i, s = t.options;
                s.placeholder && s.placeholder.constructor !== String || (i = s.placeholder, s.placeholder = {
                    element: function() {
                        var s = t.currentItem[0].nodeName.toLowerCase(),
                            a = e("<" + s + ">", t.document[0]).addClass(i || t.currentItem[0].className + " ui-sortable-placeholder").removeClass("ui-sortable-helper");
                        return "tr" === s ? t.currentItem.children().each(function() {
                            e("<td>&#160;</td>", t.document[0]).attr("colspan", e(this).attr("colspan") || 1).appendTo(a)
                        }) : "img" === s && a.attr("src", t.currentItem.attr("src")), i || a.css("visibility", "hidden"), a
                    },
                    update: function(e, a) {
                        (!i || s.forcePlaceholderSize) && (a.height() || a.height(t.currentItem.innerHeight() - parseInt(t.currentItem.css("paddingTop") || 0, 10) - parseInt(t.currentItem.css("paddingBottom") || 0, 10)), a.width() || a.width(t.currentItem.innerWidth() - parseInt(t.currentItem.css("paddingLeft") || 0, 10) - parseInt(t.currentItem.css("paddingRight") || 0, 10)))
                    }
                }), t.placeholder = e(s.placeholder.element.call(t.element, t.currentItem)), t.currentItem.after(t.placeholder), s.placeholder.update(t, t.placeholder)
            },
            _contactContainers: function(s) {
                var a, n, r, o, h, l, u, c, d, p, f = null,
                    m = null;
                for (a = this.containers.length - 1; a >= 0; a--)
                    if (!e.contains(this.currentItem[0], this.containers[a].element[0]))
                        if (this._intersectsWith(this.containers[a].containerCache)) {
                            if (f && e.contains(this.containers[a].element[0], f.element[0])) continue;
                            f = this.containers[a], m = a
                        } else this.containers[a].containerCache.over && (this.containers[a]._trigger("out", s, this._uiHash(this)), this.containers[a].containerCache.over = 0);
                if (f)
                    if (1 === this.containers.length) this.containers[m].containerCache.over || (this.containers[m]._trigger("over", s, this._uiHash(this)), this.containers[m].containerCache.over = 1);
                    else {
                        for (r = 1e4, o = null, p = f.floating || i(this.currentItem), h = p ? "left" : "top", l = p ? "width" : "height", u = this.positionAbs[h] + this.offset.click[h], n = this.items.length - 1; n >= 0; n--) e.contains(this.containers[m].element[0], this.items[n].item[0]) && this.items[n].item[0] !== this.currentItem[0] && (!p || t(this.positionAbs.top + this.offset.click.top, this.items[n].top, this.items[n].height)) && (c = this.items[n].item.offset()[h], d = !1, Math.abs(c - u) > Math.abs(c + this.items[n][l] - u) && (d = !0, c += this.items[n][l]), r > Math.abs(c - u) && (r = Math.abs(c - u), o = this.items[n], this.direction = d ? "up" : "down"));
                        if (!o && !this.options.dropOnEmpty) return;
                        if (this.currentContainer === this.containers[m]) return;
                        o ? this._rearrange(s, o, null, !0) : this._rearrange(s, null, this.containers[m].element, !0), this._trigger("change", s, this._uiHash()), this.containers[m]._trigger("change", s, this._uiHash(this)), this.currentContainer = this.containers[m], this.options.placeholder.update(this.currentContainer, this.placeholder), this.containers[m]._trigger("over", s, this._uiHash(this)), this.containers[m].containerCache.over = 1
                    }
            },
            _createHelper: function(t) {
                var i = this.options,
                    s = e.isFunction(i.helper) ? e(i.helper.apply(this.element[0], [t, this.currentItem])) : "clone" === i.helper ? this.currentItem.clone() : this.currentItem;
                return s.parents("body").length || e("parent" !== i.appendTo ? i.appendTo : this.currentItem[0].parentNode)[0].appendChild(s[0]), s[0] === this.currentItem[0] && (this._storedCSS = {
                    width: this.currentItem[0].style.width,
                    height: this.currentItem[0].style.height,
                    position: this.currentItem.css("position"),
                    top: this.currentItem.css("top"),
                    left: this.currentItem.css("left")
                }), (!s[0].style.width || i.forceHelperSize) && s.width(this.currentItem.width()), (!s[0].style.height || i.forceHelperSize) && s.height(this.currentItem.height()), s
            },
            _adjustOffsetFromHelper: function(t) {
                "string" == typeof t && (t = t.split(" ")), e.isArray(t) && (t = {
                    left: +t[0],
                    top: +t[1] || 0
                }), "left" in t && (this.offset.click.left = t.left + this.margins.left), "right" in t && (this.offset.click.left = this.helperProportions.width - t.right + this.margins.left), "top" in t && (this.offset.click.top = t.top + this.margins.top), "bottom" in t && (this.offset.click.top = this.helperProportions.height - t.bottom + this.margins.top)
            },
            _getParentOffset: function() {
                this.offsetParent = this.helper.offsetParent();
                var t = this.offsetParent.offset();
                return "absolute" === this.cssPosition && this.scrollParent[0] !== document && e.contains(this.scrollParent[0], this.offsetParent[0]) && (t.left += this.scrollParent.scrollLeft(), t.top += this.scrollParent.scrollTop()), (this.offsetParent[0] === document.body || this.offsetParent[0].tagName && "html" === this.offsetParent[0].tagName.toLowerCase() && e.ui.ie) && (t = {
                    top: 0,
                    left: 0
                }), {
                    top: t.top + (parseInt(this.offsetParent.css("borderTopWidth"), 10) || 0),
                    left: t.left + (parseInt(this.offsetParent.css("borderLeftWidth"), 10) || 0)
                }
            },
            _getRelativeOffset: function() {
                if ("relative" === this.cssPosition) {
                    var e = this.currentItem.position();
                    return {
                        top: e.top - (parseInt(this.helper.css("top"), 10) || 0) + this.scrollParent.scrollTop(),
                        left: e.left - (parseInt(this.helper.css("left"), 10) || 0) + this.scrollParent.scrollLeft()
                    }
                }
                return {
                    top: 0,
                    left: 0
                }
            },
            _cacheMargins: function() {
                this.margins = {
                    left: parseInt(this.currentItem.css("marginLeft"), 10) || 0,
                    top: parseInt(this.currentItem.css("marginTop"), 10) || 0
                }
            },
            _cacheHelperProportions: function() {
                this.helperProportions = {
                    width: this.helper.outerWidth(),
                    height: this.helper.outerHeight()
                }
            },
            _setContainment: function() {
                var t, i, s, a = this.options;
                "parent" === a.containment && (a.containment = this.helper[0].parentNode), ("document" === a.containment || "window" === a.containment) && (this.containment = [0 - this.offset.relative.left - this.offset.parent.left, 0 - this.offset.relative.top - this.offset.parent.top, e("document" === a.containment ? document : window).width() - this.helperProportions.width - this.margins.left, (e("document" === a.containment ? document : window).height() || document.body.parentNode.scrollHeight) - this.helperProportions.height - this.margins.top]), /^(document|window|parent)$/.test(a.containment) || (t = e(a.containment)[0], i = e(a.containment).offset(), s = "hidden" !== e(t).css("overflow"), this.containment = [i.left + (parseInt(e(t).css("borderLeftWidth"), 10) || 0) + (parseInt(e(t).css("paddingLeft"), 10) || 0) - this.margins.left, i.top + (parseInt(e(t).css("borderTopWidth"), 10) || 0) + (parseInt(e(t).css("paddingTop"), 10) || 0) - this.margins.top, i.left + (s ? Math.max(t.scrollWidth, t.offsetWidth) : t.offsetWidth) - (parseInt(e(t).css("borderLeftWidth"), 10) || 0) - (parseInt(e(t).css("paddingRight"), 10) || 0) - this.helperProportions.width - this.margins.left, i.top + (s ? Math.max(t.scrollHeight, t.offsetHeight) : t.offsetHeight) - (parseInt(e(t).css("borderTopWidth"), 10) || 0) - (parseInt(e(t).css("paddingBottom"), 10) || 0) - this.helperProportions.height - this.margins.top])
            },
            _convertPositionTo: function(t, i) {
                i || (i = this.position);
                var s = "absolute" === t ? 1 : -1,
                    a = "absolute" !== this.cssPosition || this.scrollParent[0] !== document && e.contains(this.scrollParent[0], this.offsetParent[0]) ? this.scrollParent : this.offsetParent,
                    n = /(html|body)/i.test(a[0].tagName);
                return {
                    top: i.top + this.offset.relative.top * s + this.offset.parent.top * s - ("fixed" === this.cssPosition ? -this.scrollParent.scrollTop() : n ? 0 : a.scrollTop()) * s,
                    left: i.left + this.offset.relative.left * s + this.offset.parent.left * s - ("fixed" === this.cssPosition ? -this.scrollParent.scrollLeft() : n ? 0 : a.scrollLeft()) * s
                }
            },
            _generatePosition: function(t) {
                var i, s, a = this.options,
                    n = t.pageX,
                    r = t.pageY,
                    o = "absolute" !== this.cssPosition || this.scrollParent[0] !== document && e.contains(this.scrollParent[0], this.offsetParent[0]) ? this.scrollParent : this.offsetParent,
                    h = /(html|body)/i.test(o[0].tagName);
                return "relative" !== this.cssPosition || this.scrollParent[0] !== document && this.scrollParent[0] !== this.offsetParent[0] || (this.offset.relative = this._getRelativeOffset()), this.originalPosition && (this.containment && (t.pageX - this.offset.click.left < this.containment[0] && (n = this.containment[0] + this.offset.click.left), t.pageY - this.offset.click.top < this.containment[1] && (r = this.containment[1] + this.offset.click.top), t.pageX - this.offset.click.left > this.containment[2] && (n = this.containment[2] + this.offset.click.left), t.pageY - this.offset.click.top > this.containment[3] && (r = this.containment[3] + this.offset.click.top)), a.grid && (i = this.originalPageY + Math.round((r - this.originalPageY) / a.grid[1]) * a.grid[1], r = this.containment ? i - this.offset.click.top >= this.containment[1] && i - this.offset.click.top <= this.containment[3] ? i : i - this.offset.click.top >= this.containment[1] ? i - a.grid[1] : i + a.grid[1] : i, s = this.originalPageX + Math.round((n - this.originalPageX) / a.grid[0]) * a.grid[0], n = this.containment ? s - this.offset.click.left >= this.containment[0] && s - this.offset.click.left <= this.containment[2] ? s : s - this.offset.click.left >= this.containment[0] ? s - a.grid[0] : s + a.grid[0] : s)), {
                    top: r - this.offset.click.top - this.offset.relative.top - this.offset.parent.top + ("fixed" === this.cssPosition ? -this.scrollParent.scrollTop() : h ? 0 : o.scrollTop()),
                    left: n - this.offset.click.left - this.offset.relative.left - this.offset.parent.left + ("fixed" === this.cssPosition ? -this.scrollParent.scrollLeft() : h ? 0 : o.scrollLeft())
                }
            },
            _rearrange: function(e, t, i, s) {
                i ? i[0].appendChild(this.placeholder[0]) : t.item[0].parentNode.insertBefore(this.placeholder[0], "down" === this.direction ? t.item[0] : t.item[0].nextSibling), this.counter = this.counter ? ++this.counter : 1;
                var a = this.counter;
                this._delay(function() {
                    a === this.counter && this.refreshPositions(!s)
                })
            },
            _clear: function(e, t) {
                this.reverting = !1;
                var i, s = [];
                if (!this._noFinalSort && this.currentItem.parent().length && this.placeholder.before(this.currentItem), this._noFinalSort = null, this.helper[0] === this.currentItem[0]) {
                    for (i in this._storedCSS)("auto" === this._storedCSS[i] || "static" === this._storedCSS[i]) && (this._storedCSS[i] = "");
                    this.currentItem.css(this._storedCSS).removeClass("ui-sortable-helper")
                } else this.currentItem.show();
                for (this.fromOutside && !t && s.push(function(e) {
                        this._trigger("receive", e, this._uiHash(this.fromOutside))
                    }), !this.fromOutside && this.domPosition.prev === this.currentItem.prev().not(".ui-sortable-helper")[0] && this.domPosition.parent === this.currentItem.parent()[0] || t || s.push(function(e) {
                        this._trigger("update", e, this._uiHash())
                    }), this !== this.currentContainer && (t || (s.push(function(e) {
                        this._trigger("remove", e, this._uiHash())
                    }), s.push(function(e) {
                        return function(t) {
                            e._trigger("receive", t, this._uiHash(this))
                        }
                    }.call(this, this.currentContainer)), s.push(function(e) {
                        return function(t) {
                            e._trigger("update", t, this._uiHash(this))
                        }
                    }.call(this, this.currentContainer)))), i = this.containers.length - 1; i >= 0; i--) t || s.push(function(e) {
                    return function(t) {
                        e._trigger("deactivate", t, this._uiHash(this))
                    }
                }.call(this, this.containers[i])), this.containers[i].containerCache.over && (s.push(function(e) {
                    return function(t) {
                        e._trigger("out", t, this._uiHash(this))
                    }
                }.call(this, this.containers[i])), this.containers[i].containerCache.over = 0);
                if (this.storedCursor && (this.document.find("body").css("cursor", this.storedCursor), this.storedStylesheet.remove()), this._storedOpacity && this.helper.css("opacity", this._storedOpacity), this._storedZIndex && this.helper.css("zIndex", "auto" === this._storedZIndex ? "" : this._storedZIndex), this.dragging = !1, this.cancelHelperRemoval) {
                    if (!t) {
                        for (this._trigger("beforeStop", e, this._uiHash()), i = 0; s.length > i; i++) s[i].call(this, e);
                        this._trigger("stop", e, this._uiHash())
                    }
                    return this.fromOutside = !1, !1
                }
                if (t || this._trigger("beforeStop", e, this._uiHash()), this.placeholder[0].parentNode.removeChild(this.placeholder[0]), this.helper[0] !== this.currentItem[0] && this.helper.remove(), this.helper = null, !t) {
                    for (i = 0; s.length > i; i++) s[i].call(this, e);
                    this._trigger("stop", e, this._uiHash())
                }
                return this.fromOutside = !1, !0
            },
            _trigger: function() {
                e.Widget.prototype._trigger.apply(this, arguments) === !1 && this.cancel()
            },
            _uiHash: function(t) {
                var i = t || this;
                return {
                    helper: i.helper,
                    placeholder: i.placeholder || e([]),
                    position: i.position,
                    originalPosition: i.originalPosition,
                    offset: i.positionAbs,
                    item: i.currentItem,
                    sender: t ? t.element : null
                }
            }
        })
    }(jQuery),
    function(e) {
        var t = 0,
            i = {},
            a = {};
        i.height = i.paddingTop = i.paddingBottom = i.borderTopWidth = i.borderBottomWidth = "hide", a.height = a.paddingTop = a.paddingBottom = a.borderTopWidth = a.borderBottomWidth = "show", e.widget("ui.accordion", {
            version: "1.10.3",
            options: {
                active: 0,
                animate: {},
                collapsible: !1,
                event: "click",
                header: "> li > :first-child,> :not(li):even",
                heightStyle: "auto",
                icons: {
                    activeHeader: "ui-icon-triangle-1-s",
                    header: "ui-icon-triangle-1-e"
                },
                activate: null,
                beforeActivate: null
            },
            _create: function() {
                var t = this.options;
                this.prevShow = this.prevHide = e(), this.element.addClass("ui-accordion ui-widget ui-helper-reset").attr("role", "tablist"), t.collapsible || t.active !== !1 && null != t.active || (t.active = 0), this._processPanels(), 0 > t.active && (t.active += this.headers.length), this._refresh()
            },
            _getCreateEventData: function() {
                return {
                    header: this.active,
                    panel: this.active.length ? this.active.next() : e(),
                    content: this.active.length ? this.active.next() : e()
                }
            },
            _createIcons: function() {
                var t = this.options.icons;
                t && (e("<span>").addClass("ui-accordion-header-icon ui-icon " + t.header).prependTo(this.headers), this.active.children(".ui-accordion-header-icon").removeClass(t.header).addClass(t.activeHeader), this.headers.addClass("ui-accordion-icons"))
            },
            _destroyIcons: function() {
                this.headers.removeClass("ui-accordion-icons").children(".ui-accordion-header-icon").remove()
            },
            _destroy: function() {
                var e;
                this.element.removeClass("ui-accordion ui-widget ui-helper-reset").removeAttr("role"), this.headers.removeClass("ui-accordion-header ui-accordion-header-active ui-helper-reset ui-state-default ui-corner-all ui-state-active ui-state-disabled ui-corner-top").removeAttr("role").removeAttr("aria-selected").removeAttr("aria-controls").removeAttr("tabIndex").each(function() {
                    /^ui-accordion/.test(this.id) && this.removeAttribute("id")
                }), this._destroyIcons(), e = this.headers.next().css("display", "").removeAttr("role").removeAttr("aria-expanded").removeAttr("aria-hidden").removeAttr("aria-labelledby").removeClass("ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content ui-accordion-content-active ui-state-disabled").each(function() {
                    /^ui-accordion/.test(this.id) && this.removeAttribute("id")
                }), "content" !== this.options.heightStyle && e.css("height", "")
            },
            _setOption: function(e, t) {
                return "active" === e ? void this._activate(t) : ("event" === e && (this.options.event && this._off(this.headers, this.options.event), this._setupEvents(t)), this._super(e, t), "collapsible" !== e || t || this.options.active !== !1 || this._activate(0), "icons" === e && (this._destroyIcons(), t && this._createIcons()), void("disabled" === e && this.headers.add(this.headers.next()).toggleClass("ui-state-disabled", !!t)))
            },
            _keydown: function(t) {
                if (!t.altKey && !t.ctrlKey) {
                    var i = e.ui.keyCode,
                        a = this.headers.length,
                        s = this.headers.index(t.target),
                        n = !1;
                    switch (t.keyCode) {
                        case i.RIGHT:
                        case i.DOWN:
                            n = this.headers[(s + 1) % a];
                            break;
                        case i.LEFT:
                        case i.UP:
                            n = this.headers[(s - 1 + a) % a];
                            break;
                        case i.SPACE:
                        case i.ENTER:
                            this._eventHandler(t);
                            break;
                        case i.HOME:
                            n = this.headers[0];
                            break;
                        case i.END:
                            n = this.headers[a - 1]
                    }
                    n && (e(t.target).attr("tabIndex", -1), e(n).attr("tabIndex", 0), n.focus(), t.preventDefault())
                }
            },
            _panelKeyDown: function(t) {
                t.keyCode === e.ui.keyCode.UP && t.ctrlKey && e(t.currentTarget).prev().focus()
            },
            refresh: function() {
                var t = this.options;
                this._processPanels(), t.active === !1 && t.collapsible === !0 || !this.headers.length ? (t.active = !1, this.active = e()) : t.active === !1 ? this._activate(0) : this.active.length && !e.contains(this.element[0], this.active[0]) ? this.headers.length === this.headers.find(".ui-state-disabled").length ? (t.active = !1, this.active = e()) : this._activate(Math.max(0, t.active - 1)) : t.active = this.headers.index(this.active), this._destroyIcons(), this._refresh()
            },
            _processPanels: function() {
                this.headers = this.element.find(this.options.header).addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-all"), this.headers.next().addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").filter(":not(.ui-accordion-content-active)").hide()
            },
            _refresh: function() {
                var i, a = this.options,
                    s = a.heightStyle,
                    n = this.element.parent(),
                    r = this.accordionId = "ui-accordion-" + (this.element.attr("id") || ++t);
                this.active = this._findActive(a.active).addClass("ui-accordion-header-active ui-state-active ui-corner-top").removeClass("ui-corner-all"), this.active.next().addClass("ui-accordion-content-active").show(), this.headers.attr("role", "tab").each(function(t) {
                    var i = e(this),
                        a = i.attr("id"),
                        s = i.next(),
                        n = s.attr("id");
                    a || (a = r + "-header-" + t, i.attr("id", a)), n || (n = r + "-panel-" + t, s.attr("id", n)), i.attr("aria-controls", n), s.attr("aria-labelledby", a)
                }).next().attr("role", "tabpanel"), this.headers.not(this.active).attr({
                    "aria-selected": "false",
                    tabIndex: -1
                }).next().attr({
                    "aria-expanded": "false",
                    "aria-hidden": "true"
                }).hide(), this.active.length ? this.active.attr({
                    "aria-selected": "true",
                    tabIndex: 0
                }).next().attr({
                    "aria-expanded": "true",
                    "aria-hidden": "false"
                }) : this.headers.eq(0).attr("tabIndex", 0), this._createIcons(), this._setupEvents(a.event), "fill" === s ? (i = n.height(), this.element.siblings(":visible").each(function() {
                    var t = e(this),
                        a = t.css("position");
                    "absolute" !== a && "fixed" !== a && (i -= t.outerHeight(!0))
                }), this.headers.each(function() {
                    i -= e(this).outerHeight(!0)
                }), this.headers.next().each(function() {
                    e(this).height(Math.max(0, i - e(this).innerHeight() + e(this).height()))
                }).css("overflow", "auto")) : "auto" === s && (i = 0, this.headers.next().each(function() {
                    i = Math.max(i, e(this).css("height", "").height())
                }).height(i))
            },
            _activate: function(t) {
                var i = this._findActive(t)[0];
                i !== this.active[0] && (i = i || this.active[0], this._eventHandler({
                    target: i,
                    currentTarget: i,
                    preventDefault: e.noop
                }))
            },
            _findActive: function(t) {
                return "number" == typeof t ? this.headers.eq(t) : e()
            },
            _setupEvents: function(t) {
                var i = {
                    keydown: "_keydown"
                };
                t && e.each(t.split(" "), function(e, t) {
                    i[t] = "_eventHandler"
                }), this._off(this.headers.add(this.headers.next())), this._on(this.headers, i), this._on(this.headers.next(), {
                    keydown: "_panelKeyDown"
                }), this._hoverable(this.headers), this._focusable(this.headers)
            },
            _eventHandler: function(t) {
                var i = this.options,
                    a = this.active,
                    s = e(t.currentTarget),
                    n = s[0] === a[0],
                    r = n && i.collapsible,
                    o = r ? e() : s.next(),
                    h = a.next(),
                    l = {
                        oldHeader: a,
                        oldPanel: h,
                        newHeader: r ? e() : s,
                        newPanel: o
                    };
                t.preventDefault(), n && !i.collapsible || this._trigger("beforeActivate", t, l) === !1 || (i.active = r ? !1 : this.headers.index(s), this.active = n ? e() : s, this._toggle(l), a.removeClass("ui-accordion-header-active ui-state-active"), i.icons && a.children(".ui-accordion-header-icon").removeClass(i.icons.activeHeader).addClass(i.icons.header), n || (s.removeClass("ui-corner-all").addClass("ui-accordion-header-active ui-state-active ui-corner-top"), i.icons && s.children(".ui-accordion-header-icon").removeClass(i.icons.header).addClass(i.icons.activeHeader), s.next().addClass("ui-accordion-content-active")))
            },
            _toggle: function(t) {
                var i = t.newPanel,
                    a = this.prevShow.length ? this.prevShow : t.oldPanel;
                this.prevShow.add(this.prevHide).stop(!0, !0), this.prevShow = i, this.prevHide = a, this.options.animate ? this._animate(i, a, t) : (a.hide(), i.show(), this._toggleComplete(t)), a.attr({
                    "aria-expanded": "false",
                    "aria-hidden": "true"
                }), a.prev().attr("aria-selected", "false"), i.length && a.length ? a.prev().attr("tabIndex", -1) : i.length && this.headers.filter(function() {
                    return 0 === e(this).attr("tabIndex")
                }).attr("tabIndex", -1), i.attr({
                    "aria-expanded": "true",
                    "aria-hidden": "false"
                }).prev().attr({
                    "aria-selected": "true",
                    tabIndex: 0
                })
            },
            _animate: function(e, t, s) {
                var n, r, o, h = this,
                    l = 0,
                    u = e.length && (!t.length || e.index() < t.index()),
                    d = this.options.animate || {},
                    c = u && d.down || d,
                    p = function() {
                        h._toggleComplete(s)
                    };
                return "number" == typeof c && (o = c), "string" == typeof c && (r = c), r = r || c.easing || d.easing, o = o || c.duration || d.duration, t.length ? e.length ? (n = e.show().outerHeight(), t.animate(i, {
                    duration: o,
                    easing: r,
                    step: function(e, t) {
                        t.now = Math.round(e)
                    }
                }), void e.hide().animate(a, {
                    duration: o,
                    easing: r,
                    complete: p,
                    step: function(e, i) {
                        i.now = Math.round(e), "height" !== i.prop ? l += i.now : "content" !== h.options.heightStyle && (i.now = Math.round(n - t.outerHeight() - l), l = 0)
                    }
                })) : t.animate(i, o, r, p) : e.animate(a, o, r, p)
            },
            _toggleComplete: function(e) {
                var t = e.oldPanel;
                t.removeClass("ui-accordion-content-active").prev().removeClass("ui-corner-top").addClass("ui-corner-all"), t.length && (t.parent()[0].className = t.parent()[0].className), this._trigger("activate", null, e)
            }
        })
    }(jQuery),
    function(e) {
        var t = 0;
        e.widget("ui.autocomplete", {
            version: "1.10.3",
            defaultElement: "<input>",
            options: {
                appendTo: null,
                autoFocus: !1,
                delay: 300,
                minLength: 1,
                position: {
                    my: "left top",
                    at: "left bottom",
                    collision: "none"
                },
                source: null,
                change: null,
                close: null,
                focus: null,
                open: null,
                response: null,
                search: null,
                select: null
            },
            pending: 0,
            _create: function() {
                var t, i, a, s = this.element[0].nodeName.toLowerCase(),
                    n = "textarea" === s,
                    r = "input" === s;
                this.isMultiLine = n ? !0 : r ? !1 : this.element.prop("isContentEditable"), this.valueMethod = this.element[n || r ? "val" : "text"], this.isNewMenu = !0, this.element.addClass("ui-autocomplete-input").attr("autocomplete", "off"), this._on(this.element, {
                    keydown: function(s) {
                        if (this.element.prop("readOnly")) return t = !0, a = !0, void(i = !0);
                        t = !1, a = !1, i = !1;
                        var n = e.ui.keyCode;
                        switch (s.keyCode) {
                            case n.PAGE_UP:
                                t = !0, this._move("previousPage", s);
                                break;
                            case n.PAGE_DOWN:
                                t = !0, this._move("nextPage", s);
                                break;
                            case n.UP:
                                t = !0, this._keyEvent("previous", s);
                                break;
                            case n.DOWN:
                                t = !0, this._keyEvent("next", s);
                                break;
                            case n.ENTER:
                            case n.NUMPAD_ENTER:
                                this.menu.active && (t = !0, s.preventDefault(), this.menu.select(s));
                                break;
                            case n.TAB:
                                this.menu.active && this.menu.select(s);
                                break;
                            case n.ESCAPE:
                                this.menu.element.is(":visible") && (this._value(this.term), this.close(s), s.preventDefault());
                                break;
                            default:
                                i = !0, this._searchTimeout(s)
                        }
                    },
                    keypress: function(a) {
                        if (t) return t = !1, void((!this.isMultiLine || this.menu.element.is(":visible")) && a.preventDefault());
                        if (!i) {
                            var s = e.ui.keyCode;
                            switch (a.keyCode) {
                                case s.PAGE_UP:
                                    this._move("previousPage", a);
                                    break;
                                case s.PAGE_DOWN:
                                    this._move("nextPage", a);
                                    break;
                                case s.UP:
                                    this._keyEvent("previous", a);
                                    break;
                                case s.DOWN:
                                    this._keyEvent("next", a)
                            }
                        }
                    },
                    input: function(e) {
                        return a ? (a = !1, void e.preventDefault()) : void this._searchTimeout(e)
                    },
                    focus: function() {
                        this.selectedItem = null, this.previous = this._value()
                    },
                    blur: function(e) {
                        return this.cancelBlur ? void delete this.cancelBlur : (clearTimeout(this.searching), this.close(e), void this._change(e))
                    }
                }), this._initSource(), this.menu = e("<ul>").addClass("ui-autocomplete ui-front").appendTo(this._appendTo()).menu({
                    role: null
                }).hide().data("ui-menu"), this._on(this.menu.element, {
                    mousedown: function(t) {
                        t.preventDefault(), this.cancelBlur = !0, this._delay(function() {
                            delete this.cancelBlur
                        });
                        var i = this.menu.element[0];
                        e(t.target).closest(".ui-menu-item").length || this._delay(function() {
                            var t = this;
                            this.document.one("mousedown", function(a) {
                                a.target === t.element[0] || a.target === i || e.contains(i, a.target) || t.close()
                            })
                        })
                    },
                    menufocus: function(t, i) {
                        if (this.isNewMenu && (this.isNewMenu = !1, t.originalEvent && /^mouse/.test(t.originalEvent.type))) return this.menu.blur(), void this.document.one("mousemove", function() {
                            e(t.target).trigger(t.originalEvent)
                        });
                        var a = i.item.data("ui-autocomplete-item");
                        !1 !== this._trigger("focus", t, {
                            item: a
                        }) ? t.originalEvent && /^key/.test(t.originalEvent.type) && this._value(a.value) : this.liveRegion.text(a.value)
                    },
                    menuselect: function(e, t) {
                        var i = t.item.data("ui-autocomplete-item"),
                            a = this.previous;
                        this.element[0] !== this.document[0].activeElement && (this.element.focus(), this.previous = a, this._delay(function() {
                            this.previous = a, this.selectedItem = i
                        })), !1 !== this._trigger("select", e, {
                            item: i
                        }) && this._value(i.value), this.term = this._value(), this.close(e), this.selectedItem = i
                    }
                }), this.liveRegion = e("<span>", {
                    role: "status",
                    "aria-live": "polite"
                }).addClass("ui-helper-hidden-accessible").insertBefore(this.element), this._on(this.window, {
                    beforeunload: function() {
                        this.element.removeAttr("autocomplete")
                    }
                })
            },
            _destroy: function() {
                clearTimeout(this.searching), this.element.removeClass("ui-autocomplete-input").removeAttr("autocomplete"), this.menu.element.remove(), this.liveRegion.remove()
            },
            _setOption: function(e, t) {
                this._super(e, t), "source" === e && this._initSource(), "appendTo" === e && this.menu.element.appendTo(this._appendTo()), "disabled" === e && t && this.xhr && this.xhr.abort()
            },
            _appendTo: function() {
                var t = this.options.appendTo;
                return t && (t = t.jquery || t.nodeType ? e(t) : this.document.find(t).eq(0)), t || (t = this.element.closest(".ui-front")), t.length || (t = this.document[0].body), t
            },
            _initSource: function() {
                var t, i, a = this;
                e.isArray(this.options.source) ? (t = this.options.source, this.source = function(i, a) {
                    a(e.ui.autocomplete.filter(t, i.term))
                }) : "string" == typeof this.options.source ? (i = this.options.source, this.source = function(t, s) {
                    a.xhr && a.xhr.abort(), a.xhr = e.ajax({
                        url: i,
                        data: t,
                        dataType: "json",
                        success: function(e) {
                            s(e)
                        },
                        error: function() {
                            s([])
                        }
                    })
                }) : this.source = this.options.source
            },
            _searchTimeout: function(e) {
                clearTimeout(this.searching), this.searching = this._delay(function() {
                    this.term !== this._value() && (this.selectedItem = null, this.search(null, e))
                }, this.options.delay)
            },
            search: function(e, t) {
                return e = null != e ? e : this._value(), this.term = this._value(), e.length < this.options.minLength ? this.close(t) : this._trigger("search", t) !== !1 ? this._search(e) : void 0
            },
            _search: function(e) {
                this.pending++, this.element.addClass("ui-autocomplete-loading"), this.cancelSearch = !1, this.source({
                    term: e
                }, this._response())
            },
            _response: function() {
                var e = this,
                    i = ++t;
                return function(a) {
                    i === t && e.__response(a), e.pending--, e.pending || e.element.removeClass("ui-autocomplete-loading")
                }
            },
            __response: function(e) {
                e && (e = this._normalize(e)), this._trigger("response", null, {
                    content: e
                }), !this.options.disabled && e && e.length && !this.cancelSearch ? (this._suggest(e), this._trigger("open")) : this._close()
            },
            close: function(e) {
                this.cancelSearch = !0, this._close(e)
            },
            _close: function(e) {
                this.menu.element.is(":visible") && (this.menu.element.hide(), this.menu.blur(), this.isNewMenu = !0, this._trigger("close", e))
            },
            _change: function(e) {
                this.previous !== this._value() && this._trigger("change", e, {
                    item: this.selectedItem
                })
            },
            _normalize: function(t) {
                return t.length && t[0].label && t[0].value ? t : e.map(t, function(t) {
                    return "string" == typeof t ? {
                        label: t,
                        value: t
                    } : e.extend({
                        label: t.label || t.value,
                        value: t.value || t.label
                    }, t)
                })
            },
            _suggest: function(t) {
                var i = this.menu.element.empty();
                this._renderMenu(i, t), this.isNewMenu = !0, this.menu.refresh(), i.show(), this._resizeMenu(), i.position(e.extend({
                    of: this.element
                }, this.options.position)), this.options.autoFocus && this.menu.next()
            },
            _resizeMenu: function() {
                var e = this.menu.element;
                e.outerWidth(Math.max(e.width("").outerWidth() + 1, this.element.outerWidth()))
            },
            _renderMenu: function(t, i) {
                var a = this;
                e.each(i, function(e, i) {
                    a._renderItemData(t, i)
                })
            },
            _renderItemData: function(e, t) {
                return this._renderItem(e, t).data("ui-autocomplete-item", t)
            },
            _renderItem: function(t, i) {
                return e("<li>").append(e("<a>").text(i.label)).appendTo(t)
            },
            _move: function(e, t) {
                return this.menu.element.is(":visible") ? this.menu.isFirstItem() && /^previous/.test(e) || this.menu.isLastItem() && /^next/.test(e) ? (this._value(this.term), void this.menu.blur()) : void this.menu[e](t) : void this.search(null, t)
            },
            widget: function() {
                return this.menu.element
            },
            _value: function() {
                return this.valueMethod.apply(this.element, arguments)
            },
            _keyEvent: function(e, t) {
                (!this.isMultiLine || this.menu.element.is(":visible")) && (this._move(e, t), t.preventDefault())
            }
        }), e.extend(e.ui.autocomplete, {
            escapeRegex: function(e) {
                return e.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&")
            },
            filter: function(t, i) {
                var a = RegExp(e.ui.autocomplete.escapeRegex(i), "i");
                return e.grep(t, function(e) {
                    return a.test(e.label || e.value || e)
                })
            }
        }), e.widget("ui.autocomplete", e.ui.autocomplete, {
            options: {
                messages: {
                    noResults: "No search results.",
                    results: function(e) {
                        return e + (e > 1 ? " results are" : " result is") + " available, use up and down arrow keys to navigate."
                    }
                }
            },
            __response: function(e) {
                var t;
                this._superApply(arguments), this.options.disabled || this.cancelSearch || (t = e && e.length ? this.options.messages.results(e.length) : this.options.messages.noResults, this.liveRegion.text(t))
            }
        })
    }(jQuery),
    function(e) {
        var t, i, a, s, n = "ui-button ui-widget ui-state-default ui-corner-all",
            r = "ui-state-hover ui-state-active ",
            o = "ui-button-icons-only ui-button-icon-only ui-button-text-icons ui-button-text-icon-primary ui-button-text-icon-secondary ui-button-text-only",
            h = function() {
                var t = e(this);
                setTimeout(function() {
                    t.find(":ui-button").button("refresh")
                }, 1)
            },
            l = function(t) {
                var i = t.name,
                    a = t.form,
                    s = e([]);
                return i && (i = i.replace(/'/g, "\\'"), s = a ? e(a).find("[name='" + i + "']") : e("[name='" + i + "']", t.ownerDocument).filter(function() {
                    return !this.form
                })), s
            };
        e.widget("ui.button", {
            version: "1.10.3",
            defaultElement: "<button>",
            options: {
                disabled: null,
                text: !0,
                label: null,
                icons: {
                    primary: null,
                    secondary: null
                }
            },
            _create: function() {
                this.element.closest("form").unbind("reset" + this.eventNamespace).bind("reset" + this.eventNamespace, h), "boolean" != typeof this.options.disabled ? this.options.disabled = !!this.element.prop("disabled") : this.element.prop("disabled", this.options.disabled), this._determineButtonType(), this.hasTitle = !!this.buttonElement.attr("title");
                var r = this,
                    o = this.options,
                    u = "checkbox" === this.type || "radio" === this.type,
                    d = u ? "" : "ui-state-active",
                    c = "ui-state-focus";
                null === o.label && (o.label = "input" === this.type ? this.buttonElement.val() : this.buttonElement.html()), this._hoverable(this.buttonElement), this.buttonElement.addClass(n).attr("role", "button").bind("mouseenter" + this.eventNamespace, function() {
                    o.disabled || this === t && e(this).addClass("ui-state-active")
                }).bind("mouseleave" + this.eventNamespace, function() {
                    o.disabled || e(this).removeClass(d)
                }).bind("click" + this.eventNamespace, function(e) {
                    o.disabled && (e.preventDefault(), e.stopImmediatePropagation())
                }), this.element.bind("focus" + this.eventNamespace, function() {
                    r.buttonElement.addClass(c)
                }).bind("blur" + this.eventNamespace, function() {
                    r.buttonElement.removeClass(c)
                }), u && (this.element.bind("change" + this.eventNamespace, function() {
                    s || r.refresh()
                }), this.buttonElement.bind("mousedown" + this.eventNamespace, function(e) {
                    o.disabled || (s = !1, i = e.pageX, a = e.pageY)
                }).bind("mouseup" + this.eventNamespace, function(e) {
                    o.disabled || (i !== e.pageX || a !== e.pageY) && (s = !0)
                })), "checkbox" === this.type ? this.buttonElement.bind("click" + this.eventNamespace, function() {
                    return o.disabled || s ? !1 : void 0
                }) : "radio" === this.type ? this.buttonElement.bind("click" + this.eventNamespace, function() {
                    if (o.disabled || s) return !1;
                    e(this).addClass("ui-state-active"), r.buttonElement.attr("aria-pressed", "true");
                    var t = r.element[0];
                    l(t).not(t).map(function() {
                        return e(this).button("widget")[0]
                    }).removeClass("ui-state-active").attr("aria-pressed", "false")
                }) : (this.buttonElement.bind("mousedown" + this.eventNamespace, function() {
                    return o.disabled ? !1 : (e(this).addClass("ui-state-active"), t = this, void r.document.one("mouseup", function() {
                        t = null
                    }))
                }).bind("mouseup" + this.eventNamespace, function() {
                    return o.disabled ? !1 : void e(this).removeClass("ui-state-active")
                }).bind("keydown" + this.eventNamespace, function(t) {
                    return o.disabled ? !1 : void((t.keyCode === e.ui.keyCode.SPACE || t.keyCode === e.ui.keyCode.ENTER) && e(this).addClass("ui-state-active"))
                }).bind("keyup" + this.eventNamespace + " blur" + this.eventNamespace, function() {
                    e(this).removeClass("ui-state-active")
                }), this.buttonElement.is("a") && this.buttonElement.keyup(function(t) {
                    t.keyCode === e.ui.keyCode.SPACE && e(this).click()
                })), this._setOption("disabled", o.disabled), this._resetButton()
            },
            _determineButtonType: function() {
                var e, t, i;
                this.type = this.element.is("[type=checkbox]") ? "checkbox" : this.element.is("[type=radio]") ? "radio" : this.element.is("input") ? "input" : "button", "checkbox" === this.type || "radio" === this.type ? (e = this.element.parents().last(), t = "label[for='" + this.element.attr("id") + "']", this.buttonElement = e.find(t), this.buttonElement.length || (e = e.length ? e.siblings() : this.element.siblings(), this.buttonElement = e.filter(t), this.buttonElement.length || (this.buttonElement = e.find(t))), this.element.addClass("ui-helper-hidden-accessible"), i = this.element.is(":checked"), i && this.buttonElement.addClass("ui-state-active"), this.buttonElement.prop("aria-pressed", i)) : this.buttonElement = this.element
            },
            widget: function() {
                return this.buttonElement
            },
            _destroy: function() {
                this.element.removeClass("ui-helper-hidden-accessible"), this.buttonElement.removeClass(n + " " + r + " " + o).removeAttr("role").removeAttr("aria-pressed").html(this.buttonElement.find(".ui-button-text").html()), this.hasTitle || this.buttonElement.removeAttr("title")
            },
            _setOption: function(e, t) {
                return this._super(e, t), "disabled" === e ? void(t ? this.element.prop("disabled", !0) : this.element.prop("disabled", !1)) : void this._resetButton()
            },
            refresh: function() {
                var t = this.element.is("input, button") ? this.element.is(":disabled") : this.element.hasClass("ui-button-disabled");
                t !== this.options.disabled && this._setOption("disabled", t), "radio" === this.type ? l(this.element[0]).each(function() {
                    e(this).is(":checked") ? e(this).button("widget").addClass("ui-state-active").attr("aria-pressed", "true") : e(this).button("widget").removeClass("ui-state-active").attr("aria-pressed", "false")
                }) : "checkbox" === this.type && (this.element.is(":checked") ? this.buttonElement.addClass("ui-state-active").attr("aria-pressed", "true") : this.buttonElement.removeClass("ui-state-active").attr("aria-pressed", "false"))
            },
            _resetButton: function() {
                if ("input" === this.type) return void(this.options.label && this.element.val(this.options.label));
                var t = this.buttonElement.removeClass(o),
                    i = e("<span></span>", this.document[0]).addClass("ui-button-text").html(this.options.label).appendTo(t.empty()).text(),
                    a = this.options.icons,
                    s = a.primary && a.secondary,
                    n = [];
                a.primary || a.secondary ? (this.options.text && n.push("ui-button-text-icon" + (s ? "s" : a.primary ? "-primary" : "-secondary")), a.primary && t.prepend("<span class='ui-button-icon-primary ui-icon " + a.primary + "'></span>"), a.secondary && t.append("<span class='ui-button-icon-secondary ui-icon " + a.secondary + "'></span>"), this.options.text || (n.push(s ? "ui-button-icons-only" : "ui-button-icon-only"), this.hasTitle || t.attr("title", e.trim(i)))) : n.push("ui-button-text-only"), t.addClass(n.join(" "))
            }
        }), e.widget("ui.buttonset", {
            version: "1.10.3",
            options: {
                items: "button, input[type=button], input[type=submit], input[type=reset], input[type=checkbox], input[type=radio], a, :data(ui-button)"
            },
            _create: function() {
                this.element.addClass("ui-buttonset")
            },
            _init: function() {
                this.refresh()
            },
            _setOption: function(e, t) {
                "disabled" === e && this.buttons.button("option", e, t), this._super(e, t)
            },
            refresh: function() {
                var t = "rtl" === this.element.css("direction");
                this.buttons = this.element.find(this.options.items).filter(":ui-button").button("refresh").end().not(":ui-button").button().end().map(function() {
                    return e(this).button("widget")[0]
                }).removeClass("ui-corner-all ui-corner-left ui-corner-right").filter(":first").addClass(t ? "ui-corner-right" : "ui-corner-left").end().filter(":last").addClass(t ? "ui-corner-left" : "ui-corner-right").end().end()
            },
            _destroy: function() {
                this.element.removeClass("ui-buttonset"), this.buttons.map(function() {
                    return e(this).button("widget")[0]
                }).removeClass("ui-corner-left ui-corner-right").end().button("destroy")
            }
        })
    }(jQuery),
    function(e, t) {
        function i() {
            this._curInst = null, this._keyEvent = !1, this._disabledInputs = [], this._datepickerShowing = !1, this._inDialog = !1, this._mainDivId = "ui-datepicker-div", this._inlineClass = "ui-datepicker-inline", this._appendClass = "ui-datepicker-append", this._triggerClass = "ui-datepicker-trigger", this._dialogClass = "ui-datepicker-dialog", this._disableClass = "ui-datepicker-disabled", this._unselectableClass = "ui-datepicker-unselectable", this._currentClass = "ui-datepicker-current-day", this._dayOverClass = "ui-datepicker-days-cell-over", this.regional = [], this.regional[""] = {
                closeText: "Done",
                prevText: "Prev",
                nextText: "Next",
                currentText: "Today",
                monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                monthNamesShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                dayNames: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                dayNamesShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                dayNamesMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                weekHeader: "Wk",
                dateFormat: "mm/dd/yy",
                firstDay: 0,
                isRTL: !1,
                showMonthAfterYear: !1,
                yearSuffix: ""
            }, this._defaults = {
                showOn: "focus",
                showAnim: "fadeIn",
                showOptions: {},
                defaultDate: null,
                appendText: "",
                buttonText: "...",
                buttonImage: "",
                buttonImageOnly: !1,
                hideIfNoPrevNext: !1,
                navigationAsDateFormat: !1,
                gotoCurrent: !1,
                changeMonth: !1,
                changeYear: !1,
                yearRange: "c-10:c+10",
                showOtherMonths: !1,
                selectOtherMonths: !1,
                showWeek: !1,
                calculateWeek: this.iso8601Week,
                shortYearCutoff: "+10",
                minDate: null,
                maxDate: null,
                duration: "fast",
                beforeShowDay: null,
                beforeShow: null,
                onSelect: null,
                onChangeMonthYear: null,
                onClose: null,
                numberOfMonths: 1,
                showCurrentAtPos: 0,
                stepMonths: 1,
                stepBigMonths: 12,
                altField: "",
                altFormat: "",
                constrainInput: !0,
                showButtonPanel: !1,
                autoSize: !1,
                disabled: !1
            }, e.extend(this._defaults, this.regional[""]), this.dpDiv = a(e("<div id='" + this._mainDivId + "' class='ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>"))
        }

        function a(t) {
            var i = "button, .ui-datepicker-prev, .ui-datepicker-next, .ui-datepicker-calendar td a";
            return t.delegate(i, "mouseout", function() {
                e(this).removeClass("ui-state-hover"), -1 !== this.className.indexOf("ui-datepicker-prev") && e(this).removeClass("ui-datepicker-prev-hover"), -1 !== this.className.indexOf("ui-datepicker-next") && e(this).removeClass("ui-datepicker-next-hover")
            }).delegate(i, "mouseover", function() {
                e.datepicker._isDisabledDatepicker(n.inline ? t.parent()[0] : n.input[0]) || (e(this).parents(".ui-datepicker-calendar").find("a").removeClass("ui-state-hover"), e(this).addClass("ui-state-hover"), -1 !== this.className.indexOf("ui-datepicker-prev") && e(this).addClass("ui-datepicker-prev-hover"), -1 !== this.className.indexOf("ui-datepicker-next") && e(this).addClass("ui-datepicker-next-hover"))
            })
        }

        function s(t, i) {
            e.extend(t, i);
            for (var a in i) null == i[a] && (t[a] = i[a]);
            return t
        }
        e.extend(e.ui, {
            datepicker: {
                version: "1.10.3"
            }
        });
        var n, r = "datepicker";
        e.extend(i.prototype, {
            markerClassName: "hasDatepicker",
            maxRows: 4,
            _widgetDatepicker: function() {
                return this.dpDiv
            },
            setDefaults: function(e) {
                return s(this._defaults, e || {}), this
            },
            _attachDatepicker: function(t, i) {
                var a, s, n;
                a = t.nodeName.toLowerCase(), s = "div" === a || "span" === a, t.id || (this.uuid += 1, t.id = "dp" + this.uuid), n = this._newInst(e(t), s), n.settings = e.extend({}, i || {}), "input" === a ? this._connectDatepicker(t, n) : s && this._inlineDatepicker(t, n)
            },
            _newInst: function(t, i) {
                var s = t[0].id.replace(/([^A-Za-z0-9_\-])/g, "\\\\$1");
                return {
                    id: s,
                    input: t,
                    selectedDay: 0,
                    selectedMonth: 0,
                    selectedYear: 0,
                    drawMonth: 0,
                    drawYear: 0,
                    inline: i,
                    dpDiv: i ? a(e("<div class='" + this._inlineClass + " ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>")) : this.dpDiv
                }
            },
            _connectDatepicker: function(t, i) {
                var a = e(t);
                i.append = e([]), i.trigger = e([]), a.hasClass(this.markerClassName) || (this._attachments(a, i), a.addClass(this.markerClassName).keydown(this._doKeyDown).keypress(this._doKeyPress).keyup(this._doKeyUp), this._autoSize(i), e.data(t, r, i), i.settings.disabled && this._disableDatepicker(t))
            },
            _attachments: function(t, i) {
                var a, s, n, r = this._get(i, "appendText"),
                    o = this._get(i, "isRTL");
                i.append && i.append.remove(), r && (i.append = e("<span class='" + this._appendClass + "'>" + r + "</span>"), t[o ? "before" : "after"](i.append)), t.unbind("focus", this._showDatepicker), i.trigger && i.trigger.remove(), a = this._get(i, "showOn"), ("focus" === a || "both" === a) && t.focus(this._showDatepicker), ("button" === a || "both" === a) && (s = this._get(i, "buttonText"), n = this._get(i, "buttonImage"), i.trigger = e(this._get(i, "buttonImageOnly") ? e("<img/>").addClass(this._triggerClass).attr({
                    src: n,
                    alt: s,
                    title: s
                }) : e("<button type='button'></button>").addClass(this._triggerClass).html(n ? e("<img/>").attr({
                    src: n,
                    alt: s,
                    title: s
                }) : s)), t[o ? "before" : "after"](i.trigger), i.trigger.click(function() {
                    return e.datepicker._datepickerShowing && e.datepicker._lastInput === t[0] ? e.datepicker._hideDatepicker() : e.datepicker._datepickerShowing && e.datepicker._lastInput !== t[0] ? (e.datepicker._hideDatepicker(), e.datepicker._showDatepicker(t[0])) : e.datepicker._showDatepicker(t[0]), !1
                }))
            },
            _autoSize: function(e) {
                if (this._get(e, "autoSize") && !e.inline) {
                    var t, i, a, s, n = new Date(2009, 11, 20),
                        r = this._get(e, "dateFormat");
                    r.match(/[DM]/) && (t = function(e) {
                        for (i = 0, a = 0, s = 0; e.length > s; s++) e[s].length > i && (i = e[s].length, a = s);
                        return a
                    }, n.setMonth(t(this._get(e, r.match(/MM/) ? "monthNames" : "monthNamesShort"))), n.setDate(t(this._get(e, r.match(/DD/) ? "dayNames" : "dayNamesShort")) + 20 - n.getDay())), e.input.attr("size", this._formatDate(e, n).length)
                }
            },
            _inlineDatepicker: function(t, i) {
                var a = e(t);
                a.hasClass(this.markerClassName) || (a.addClass(this.markerClassName).append(i.dpDiv), e.data(t, r, i), this._setDate(i, this._getDefaultDate(i), !0), this._updateDatepicker(i), this._updateAlternate(i), i.settings.disabled && this._disableDatepicker(t), i.dpDiv.css("display", "block"))
            },
            _dialogDatepicker: function(t, i, a, n, o) {
                var h, l, u, d, c, p = this._dialogInst;
                return p || (this.uuid += 1, h = "dp" + this.uuid, this._dialogInput = e("<input type='text' id='" + h + "' style='position: absolute; top: -100px; width: 0px;'/>"), this._dialogInput.keydown(this._doKeyDown), e("body").append(this._dialogInput), p = this._dialogInst = this._newInst(this._dialogInput, !1), p.settings = {}, e.data(this._dialogInput[0], r, p)), s(p.settings, n || {}), i = i && i.constructor === Date ? this._formatDate(p, i) : i, this._dialogInput.val(i), this._pos = o ? o.length ? o : [o.pageX, o.pageY] : null, this._pos || (l = document.documentElement.clientWidth, u = document.documentElement.clientHeight, d = document.documentElement.scrollLeft || document.body.scrollLeft, c = document.documentElement.scrollTop || document.body.scrollTop, this._pos = [l / 2 - 100 + d, u / 2 - 150 + c]), this._dialogInput.css("left", this._pos[0] + 20 + "px").css("top", this._pos[1] + "px"), p.settings.onSelect = a, this._inDialog = !0, this.dpDiv.addClass(this._dialogClass), this._showDatepicker(this._dialogInput[0]), e.blockUI && e.blockUI(this.dpDiv), e.data(this._dialogInput[0], r, p), this
            },
            _destroyDatepicker: function(t) {
                var i, a = e(t),
                    s = e.data(t, r);
                a.hasClass(this.markerClassName) && (i = t.nodeName.toLowerCase(), e.removeData(t, r), "input" === i ? (s.append.remove(), s.trigger.remove(), a.removeClass(this.markerClassName).unbind("focus", this._showDatepicker).unbind("keydown", this._doKeyDown).unbind("keypress", this._doKeyPress).unbind("keyup", this._doKeyUp)) : ("div" === i || "span" === i) && a.removeClass(this.markerClassName).empty())
            },
            _enableDatepicker: function(t) {
                var i, a, s = e(t),
                    n = e.data(t, r);
                s.hasClass(this.markerClassName) && (i = t.nodeName.toLowerCase(), "input" === i ? (t.disabled = !1, n.trigger.filter("button").each(function() {
                    this.disabled = !1
                }).end().filter("img").css({
                    opacity: "1.0",
                    cursor: ""
                })) : ("div" === i || "span" === i) && (a = s.children("." + this._inlineClass), a.children().removeClass("ui-state-disabled"), a.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled", !1)), this._disabledInputs = e.map(this._disabledInputs, function(e) {
                    return e === t ? null : e
                }))
            },
            _disableDatepicker: function(t) {
                var i, a, s = e(t),
                    n = e.data(t, r);
                s.hasClass(this.markerClassName) && (i = t.nodeName.toLowerCase(), "input" === i ? (t.disabled = !0, n.trigger.filter("button").each(function() {
                    this.disabled = !0
                }).end().filter("img").css({
                    opacity: "0.5",
                    cursor: "default"
                })) : ("div" === i || "span" === i) && (a = s.children("." + this._inlineClass), a.children().addClass("ui-state-disabled"), a.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled", !0)), this._disabledInputs = e.map(this._disabledInputs, function(e) {
                    return e === t ? null : e
                }), this._disabledInputs[this._disabledInputs.length] = t)
            },
            _isDisabledDatepicker: function(e) {
                if (!e) return !1;
                for (var t = 0; this._disabledInputs.length > t; t++)
                    if (this._disabledInputs[t] === e) return !0;
                return !1
            },
            _getInst: function(t) {
                try {
                    return e.data(t, r)
                } catch (i) {
                    throw "Missing instance data for this datepicker"
                }
            },
            _optionDatepicker: function(i, a, n) {
                var r, o, h, l, u = this._getInst(i);
                return 2 === arguments.length && "string" == typeof a ? "defaults" === a ? e.extend({}, e.datepicker._defaults) : u ? "all" === a ? e.extend({}, u.settings) : this._get(u, a) : null : (r = a || {}, "string" == typeof a && (r = {}, r[a] = n), u && (this._curInst === u && this._hideDatepicker(), o = this._getDateDatepicker(i, !0), h = this._getMinMaxDate(u, "min"), l = this._getMinMaxDate(u, "max"), s(u.settings, r), null !== h && r.dateFormat !== t && r.minDate === t && (u.settings.minDate = this._formatDate(u, h)), null !== l && r.dateFormat !== t && r.maxDate === t && (u.settings.maxDate = this._formatDate(u, l)), "disabled" in r && (r.disabled ? this._disableDatepicker(i) : this._enableDatepicker(i)), this._attachments(e(i), u), this._autoSize(u), this._setDate(u, o), this._updateAlternate(u), this._updateDatepicker(u)), t)
            },
            _changeDatepicker: function(e, t, i) {
                this._optionDatepicker(e, t, i)
            },
            _refreshDatepicker: function(e) {
                var t = this._getInst(e);
                t && this._updateDatepicker(t)
            },
            _setDateDatepicker: function(e, t) {
                var i = this._getInst(e);
                i && (this._setDate(i, t), this._updateDatepicker(i), this._updateAlternate(i))
            },
            _getDateDatepicker: function(e, t) {
                var i = this._getInst(e);
                return i && !i.inline && this._setDateFromField(i, t), i ? this._getDate(i) : null
            },
            _doKeyDown: function(t) {
                var i, a, s, n = e.datepicker._getInst(t.target),
                    r = !0,
                    o = n.dpDiv.is(".ui-datepicker-rtl");
                if (n._keyEvent = !0, e.datepicker._datepickerShowing) switch (t.keyCode) {
                    case 9:
                        e.datepicker._hideDatepicker(), r = !1;
                        break;
                    case 13:
                        return s = e("td." + e.datepicker._dayOverClass + ":not(." + e.datepicker._currentClass + ")", n.dpDiv), s[0] && e.datepicker._selectDay(t.target, n.selectedMonth, n.selectedYear, s[0]), i = e.datepicker._get(n, "onSelect"), i ? (a = e.datepicker._formatDate(n), i.apply(n.input ? n.input[0] : null, [a, n])) : e.datepicker._hideDatepicker(), !1;
                    case 27:
                        e.datepicker._hideDatepicker();
                        break;
                    case 33:
                        e.datepicker._adjustDate(t.target, t.ctrlKey ? -e.datepicker._get(n, "stepBigMonths") : -e.datepicker._get(n, "stepMonths"), "M");
                        break;
                    case 34:
                        e.datepicker._adjustDate(t.target, t.ctrlKey ? +e.datepicker._get(n, "stepBigMonths") : +e.datepicker._get(n, "stepMonths"), "M");
                        break;
                    case 35:
                        (t.ctrlKey || t.metaKey) && e.datepicker._clearDate(t.target), r = t.ctrlKey || t.metaKey;
                        break;
                    case 36:
                        (t.ctrlKey || t.metaKey) && e.datepicker._gotoToday(t.target), r = t.ctrlKey || t.metaKey;
                        break;
                    case 37:
                        (t.ctrlKey || t.metaKey) && e.datepicker._adjustDate(t.target, o ? 1 : -1, "D"), r = t.ctrlKey || t.metaKey, t.originalEvent.altKey && e.datepicker._adjustDate(t.target, t.ctrlKey ? -e.datepicker._get(n, "stepBigMonths") : -e.datepicker._get(n, "stepMonths"), "M");
                        break;
                    case 38:
                        (t.ctrlKey || t.metaKey) && e.datepicker._adjustDate(t.target, -7, "D"), r = t.ctrlKey || t.metaKey;
                        break;
                    case 39:
                        (t.ctrlKey || t.metaKey) && e.datepicker._adjustDate(t.target, o ? -1 : 1, "D"), r = t.ctrlKey || t.metaKey, t.originalEvent.altKey && e.datepicker._adjustDate(t.target, t.ctrlKey ? +e.datepicker._get(n, "stepBigMonths") : +e.datepicker._get(n, "stepMonths"), "M");
                        break;
                    case 40:
                        (t.ctrlKey || t.metaKey) && e.datepicker._adjustDate(t.target, 7, "D"), r = t.ctrlKey || t.metaKey;
                        break;
                    default:
                        r = !1
                } else 36 === t.keyCode && t.ctrlKey ? e.datepicker._showDatepicker(this) : r = !1;
                r && (t.preventDefault(), t.stopPropagation())
            },
            _doKeyPress: function(i) {
                var a, s, n = e.datepicker._getInst(i.target);
                return e.datepicker._get(n, "constrainInput") ? (a = e.datepicker._possibleChars(e.datepicker._get(n, "dateFormat")), s = String.fromCharCode(null == i.charCode ? i.keyCode : i.charCode), i.ctrlKey || i.metaKey || " " > s || !a || a.indexOf(s) > -1) : t
            },
            _doKeyUp: function(t) {
                var i, a = e.datepicker._getInst(t.target);
                if (a.input.val() !== a.lastVal) try {
                    i = e.datepicker.parseDate(e.datepicker._get(a, "dateFormat"), a.input ? a.input.val() : null, e.datepicker._getFormatConfig(a)), i && (e.datepicker._setDateFromField(a), e.datepicker._updateAlternate(a), e.datepicker._updateDatepicker(a))
                } catch (s) {}
                return !0
            },
            _showDatepicker: function(t) {
                if (t = t.target || t, "input" !== t.nodeName.toLowerCase() && (t = e("input", t.parentNode)[0]), !e.datepicker._isDisabledDatepicker(t) && e.datepicker._lastInput !== t) {
                    var i, a, n, r, o, h, l;
                    i = e.datepicker._getInst(t), e.datepicker._curInst && e.datepicker._curInst !== i && (e.datepicker._curInst.dpDiv.stop(!0, !0), i && e.datepicker._datepickerShowing && e.datepicker._hideDatepicker(e.datepicker._curInst.input[0])), a = e.datepicker._get(i, "beforeShow"), n = a ? a.apply(t, [t, i]) : {}, n !== !1 && (s(i.settings, n), i.lastVal = null, e.datepicker._lastInput = t, e.datepicker._setDateFromField(i), e.datepicker._inDialog && (t.value = ""), e.datepicker._pos || (e.datepicker._pos = e.datepicker._findPos(t), e.datepicker._pos[1] += t.offsetHeight), r = !1, e(t).parents().each(function() {
                        return r |= "fixed" === e(this).css("position"), !r
                    }), o = {
                        left: e.datepicker._pos[0],
                        top: e.datepicker._pos[1]
                    }, e.datepicker._pos = null, i.dpDiv.empty(), i.dpDiv.css({
                        position: "absolute",
                        display: "block",
                        top: "-1000px"
                    }), e.datepicker._updateDatepicker(i), o = e.datepicker._checkOffset(i, o, r), i.dpDiv.css({
                        position: e.datepicker._inDialog && e.blockUI ? "static" : r ? "fixed" : "absolute",
                        display: "none",
                        left: o.left + "px",
                        top: o.top + "px"
                    }), i.inline || (h = e.datepicker._get(i, "showAnim"), l = e.datepicker._get(i, "duration"), i.dpDiv.zIndex(e(t).zIndex() + 1), e.datepicker._datepickerShowing = !0, e.effects && e.effects.effect[h] ? i.dpDiv.show(h, e.datepicker._get(i, "showOptions"), l) : i.dpDiv[h || "show"](h ? l : null), e.datepicker._shouldFocusInput(i) && i.input.focus(), e.datepicker._curInst = i))
                }
            },
            _updateDatepicker: function(t) {
                this.maxRows = 4, n = t, t.dpDiv.empty().append(this._generateHTML(t)), this._attachHandlers(t), t.dpDiv.find("." + this._dayOverClass + " a").mouseover();
                var i, a = this._getNumberOfMonths(t),
                    s = a[1],
                    r = 17;
                t.dpDiv.removeClass("ui-datepicker-multi-2 ui-datepicker-multi-3 ui-datepicker-multi-4").width(""), s > 1 && t.dpDiv.addClass("ui-datepicker-multi-" + s).css("width", r * s + "em"), t.dpDiv[(1 !== a[0] || 1 !== a[1] ? "add" : "remove") + "Class"]("ui-datepicker-multi"), t.dpDiv[(this._get(t, "isRTL") ? "add" : "remove") + "Class"]("ui-datepicker-rtl"), t === e.datepicker._curInst && e.datepicker._datepickerShowing && e.datepicker._shouldFocusInput(t) && t.input.focus(), t.yearshtml && (i = t.yearshtml, setTimeout(function() {
                    i === t.yearshtml && t.yearshtml && t.dpDiv.find("select.ui-datepicker-year:first").replaceWith(t.yearshtml), i = t.yearshtml = null
                }, 0))
            },
            _shouldFocusInput: function(e) {
                return e.input && e.input.is(":visible") && !e.input.is(":disabled") && !e.input.is(":focus")
            },
            _checkOffset: function(t, i, a) {
                var s = t.dpDiv.outerWidth(),
                    n = t.dpDiv.outerHeight(),
                    r = t.input ? t.input.outerWidth() : 0,
                    o = t.input ? t.input.outerHeight() : 0,
                    h = document.documentElement.clientWidth + (a ? 0 : e(document).scrollLeft()),
                    l = document.documentElement.clientHeight + (a ? 0 : e(document).scrollTop());
                return i.left -= this._get(t, "isRTL") ? s - r : 0, i.left -= a && i.left === t.input.offset().left ? e(document).scrollLeft() : 0, i.top -= a && i.top === t.input.offset().top + o ? e(document).scrollTop() : 0, i.left -= Math.min(i.left, i.left + s > h && h > s ? Math.abs(i.left + s - h) : 0), i.top -= Math.min(i.top, i.top + n > l && l > n ? Math.abs(n + o) : 0), i
            },
            _findPos: function(t) {
                for (var i, a = this._getInst(t), s = this._get(a, "isRTL"); t && ("hidden" === t.type || 1 !== t.nodeType || e.expr.filters.hidden(t));) t = t[s ? "previousSibling" : "nextSibling"];
                return i = e(t).offset(), [i.left, i.top]
            },
            _hideDatepicker: function(t) {
                var i, a, s, n, o = this._curInst;
                !o || t && o !== e.data(t, r) || this._datepickerShowing && (i = this._get(o, "showAnim"), a = this._get(o, "duration"), s = function() {
                    e.datepicker._tidyDialog(o)
                }, e.effects && (e.effects.effect[i] || e.effects[i]) ? o.dpDiv.hide(i, e.datepicker._get(o, "showOptions"), a, s) : o.dpDiv["slideDown" === i ? "slideUp" : "fadeIn" === i ? "fadeOut" : "hide"](i ? a : null, s), i || s(), this._datepickerShowing = !1, n = this._get(o, "onClose"), n && n.apply(o.input ? o.input[0] : null, [o.input ? o.input.val() : "", o]), this._lastInput = null, this._inDialog && (this._dialogInput.css({
                    position: "absolute",
                    left: "0",
                    top: "-100px"
                }), e.blockUI && (e.unblockUI(), e("body").append(this.dpDiv))), this._inDialog = !1)
            },
            _tidyDialog: function(e) {
                e.dpDiv.removeClass(this._dialogClass).unbind(".ui-datepicker-calendar")
            },
            _checkExternalClick: function(t) {
                if (e.datepicker._curInst) {
                    var i = e(t.target),
                        a = e.datepicker._getInst(i[0]);
                    (i[0].id !== e.datepicker._mainDivId && 0 === i.parents("#" + e.datepicker._mainDivId).length && !i.hasClass(e.datepicker.markerClassName) && !i.closest("." + e.datepicker._triggerClass).length && e.datepicker._datepickerShowing && (!e.datepicker._inDialog || !e.blockUI) || i.hasClass(e.datepicker.markerClassName) && e.datepicker._curInst !== a) && e.datepicker._hideDatepicker()
                }
            },
            _adjustDate: function(t, i, a) {
                var s = e(t),
                    n = this._getInst(s[0]);
                this._isDisabledDatepicker(s[0]) || (this._adjustInstDate(n, i + ("M" === a ? this._get(n, "showCurrentAtPos") : 0), a), this._updateDatepicker(n))
            },
            _gotoToday: function(t) {
                var i, a = e(t),
                    s = this._getInst(a[0]);
                this._get(s, "gotoCurrent") && s.currentDay ? (s.selectedDay = s.currentDay, s.drawMonth = s.selectedMonth = s.currentMonth, s.drawYear = s.selectedYear = s.currentYear) : (i = new Date, s.selectedDay = i.getDate(), s.drawMonth = s.selectedMonth = i.getMonth(), s.drawYear = s.selectedYear = i.getFullYear()), this._notifyChange(s), this._adjustDate(a)
            },
            _selectMonthYear: function(t, i, a) {
                var s = e(t),
                    n = this._getInst(s[0]);
                n["selected" + ("M" === a ? "Month" : "Year")] = n["draw" + ("M" === a ? "Month" : "Year")] = parseInt(i.options[i.selectedIndex].value, 10), this._notifyChange(n), this._adjustDate(s)
            },
            _selectDay: function(t, i, a, s) {
                var n, r = e(t);
                e(s).hasClass(this._unselectableClass) || this._isDisabledDatepicker(r[0]) || (n = this._getInst(r[0]), n.selectedDay = n.currentDay = e("a", s).html(), n.selectedMonth = n.currentMonth = i, n.selectedYear = n.currentYear = a, this._selectDate(t, this._formatDate(n, n.currentDay, n.currentMonth, n.currentYear)))
            },
            _clearDate: function(t) {
                var i = e(t);
                this._selectDate(i, "")
            },
            _selectDate: function(t, i) {
                var a, s = e(t),
                    n = this._getInst(s[0]);
                i = null != i ? i : this._formatDate(n), n.input && n.input.val(i), this._updateAlternate(n), a = this._get(n, "onSelect"), a ? a.apply(n.input ? n.input[0] : null, [i, n]) : n.input && n.input.trigger("change"), n.inline ? this._updateDatepicker(n) : (this._hideDatepicker(), this._lastInput = n.input[0], "object" != typeof n.input[0] && n.input.focus(), this._lastInput = null)
            },
            _updateAlternate: function(t) {
                var i, a, s, n = this._get(t, "altField");
                n && (i = this._get(t, "altFormat") || this._get(t, "dateFormat"), a = this._getDate(t), s = this.formatDate(i, a, this._getFormatConfig(t)), e(n).each(function() {
                    e(this).val(s)
                }))
            },
            noWeekends: function(e) {
                var t = e.getDay();
                return [t > 0 && 6 > t, ""]
            },
            iso8601Week: function(e) {
                var t, i = new Date(e.getTime());
                return i.setDate(i.getDate() + 4 - (i.getDay() || 7)), t = i.getTime(), i.setMonth(0), i.setDate(1), Math.floor(Math.round((t - i) / 864e5) / 7) + 1
            },
            parseDate: function(i, a, s) {
                if (null == i || null == a) throw "Invalid arguments";
                if (a = "object" == typeof a ? "" + a : a + "", "" === a) return null;
                var n, r, o, h, l = 0,
                    u = (s ? s.shortYearCutoff : null) || this._defaults.shortYearCutoff,
                    d = "string" != typeof u ? u : (new Date).getFullYear() % 100 + parseInt(u, 10),
                    c = (s ? s.dayNamesShort : null) || this._defaults.dayNamesShort,
                    p = (s ? s.dayNames : null) || this._defaults.dayNames,
                    m = (s ? s.monthNamesShort : null) || this._defaults.monthNamesShort,
                    f = (s ? s.monthNames : null) || this._defaults.monthNames,
                    g = -1,
                    v = -1,
                    y = -1,
                    b = -1,
                    _ = !1,
                    k = function(e) {
                        var t = i.length > n + 1 && i.charAt(n + 1) === e;
                        return t && n++, t
                    },
                    x = function(e) {
                        var t = k(e),
                            i = "@" === e ? 14 : "!" === e ? 20 : "y" === e && t ? 4 : "o" === e ? 3 : 2,
                            s = RegExp("^\\d{1," + i + "}"),
                            n = a.substring(l).match(s);
                        if (!n) throw "Missing number at position " + l;
                        return l += n[0].length, parseInt(n[0], 10)
                    },
                    D = function(i, s, n) {
                        var r = -1,
                            o = e.map(k(i) ? n : s, function(e, t) {
                                return [
                                    [t, e]
                                ]
                            }).sort(function(e, t) {
                                return -(e[1].length - t[1].length)
                            });
                        if (e.each(o, function(e, i) {
                                var s = i[1];
                                return a.substr(l, s.length).toLowerCase() === s.toLowerCase() ? (r = i[0], l += s.length, !1) : t
                            }), -1 !== r) return r + 1;
                        throw "Unknown name at position " + l
                    },
                    w = function() {
                        if (a.charAt(l) !== i.charAt(n)) throw "Unexpected literal at position " + l;
                        l++
                    };
                for (n = 0; i.length > n; n++)
                    if (_) "'" !== i.charAt(n) || k("'") ? w() : _ = !1;
                    else switch (i.charAt(n)) {
                        case "d":
                            y = x("d");
                            break;
                        case "D":
                            D("D", c, p);
                            break;
                        case "o":
                            b = x("o");
                            break;
                        case "m":
                            v = x("m");
                            break;
                        case "M":
                            v = D("M", m, f);
                            break;
                        case "y":
                            g = x("y");
                            break;
                        case "@":
                            h = new Date(x("@")), g = h.getFullYear(), v = h.getMonth() + 1, y = h.getDate();
                            break;
                        case "!":
                            h = new Date((x("!") - this._ticksTo1970) / 1e4), g = h.getFullYear(), v = h.getMonth() + 1, y = h.getDate();
                            break;
                        case "'":
                            k("'") ? w() : _ = !0;
                            break;
                        default:
                            w()
                    }
                    if (a.length > l && (o = a.substr(l), !/^\s+/.test(o))) throw "Extra/unparsed characters found in date: " + o;
                if (-1 === g ? g = (new Date).getFullYear() : 100 > g && (g += (new Date).getFullYear() - (new Date).getFullYear() % 100 + (d >= g ? 0 : -100)), b > -1)
                    for (v = 1, y = b; r = this._getDaysInMonth(g, v - 1), !(r >= y);) v++, y -= r;
                if (h = this._daylightSavingAdjust(new Date(g, v - 1, y)), h.getFullYear() !== g || h.getMonth() + 1 !== v || h.getDate() !== y) throw "Invalid date";
                return h
            },
            ATOM: "yy-mm-dd",
            COOKIE: "D, dd M yy",
            ISO_8601: "yy-mm-dd",
            RFC_822: "D, d M y",
            RFC_850: "DD, dd-M-y",
            RFC_1036: "D, d M y",
            RFC_1123: "D, d M yy",
            RFC_2822: "D, d M yy",
            RSS: "D, d M y",
            TICKS: "!",
            TIMESTAMP: "@",
            W3C: "yy-mm-dd",
            _ticksTo1970: 864e9 * (718685 + Math.floor(492.5) - Math.floor(19.7) + Math.floor(4.925)),
            formatDate: function(e, t, i) {
                if (!t) return "";
                var a, s = (i ? i.dayNamesShort : null) || this._defaults.dayNamesShort,
                    n = (i ? i.dayNames : null) || this._defaults.dayNames,
                    r = (i ? i.monthNamesShort : null) || this._defaults.monthNamesShort,
                    o = (i ? i.monthNames : null) || this._defaults.monthNames,
                    h = function(t) {
                        var i = e.length > a + 1 && e.charAt(a + 1) === t;
                        return i && a++, i
                    },
                    l = function(e, t, i) {
                        var a = "" + t;
                        if (h(e))
                            for (; i > a.length;) a = "0" + a;
                        return a
                    },
                    u = function(e, t, i, a) {
                        return h(e) ? a[t] : i[t]
                    },
                    d = "",
                    c = !1;
                if (t)
                    for (a = 0; e.length > a; a++)
                        if (c) "'" !== e.charAt(a) || h("'") ? d += e.charAt(a) : c = !1;
                        else switch (e.charAt(a)) {
                            case "d":
                                d += l("d", t.getDate(), 2);
                                break;
                            case "D":
                                d += u("D", t.getDay(), s, n);
                                break;
                            case "o":
                                d += l("o", Math.round((new Date(t.getFullYear(), t.getMonth(), t.getDate()).getTime() - new Date(t.getFullYear(), 0, 0).getTime()) / 864e5), 3);
                                break;
                            case "m":
                                d += l("m", t.getMonth() + 1, 2);
                                break;
                            case "M":
                                d += u("M", t.getMonth(), r, o);
                                break;
                            case "y":
                                d += h("y") ? t.getFullYear() : (10 > t.getYear() % 100 ? "0" : "") + t.getYear() % 100;
                                break;
                            case "@":
                                d += t.getTime();
                                break;
                            case "!":
                                d += 1e4 * t.getTime() + this._ticksTo1970;
                                break;
                            case "'":
                                h("'") ? d += "'" : c = !0;
                                break;
                            default:
                                d += e.charAt(a)
                        }
                        return d
            },
            _possibleChars: function(e) {
                var t, i = "",
                    a = !1,
                    s = function(i) {
                        var a = e.length > t + 1 && e.charAt(t + 1) === i;
                        return a && t++, a
                    };
                for (t = 0; e.length > t; t++)
                    if (a) "'" !== e.charAt(t) || s("'") ? i += e.charAt(t) : a = !1;
                    else switch (e.charAt(t)) {
                        case "d":
                        case "m":
                        case "y":
                        case "@":
                            i += "0123456789";
                            break;
                        case "D":
                        case "M":
                            return null;
                        case "'":
                            s("'") ? i += "'" : a = !0;
                            break;
                        default:
                            i += e.charAt(t)
                    }
                    return i
            },
            _get: function(e, i) {
                return e.settings[i] !== t ? e.settings[i] : this._defaults[i]
            },
            _setDateFromField: function(e, t) {
                if (e.input.val() !== e.lastVal) {
                    var i = this._get(e, "dateFormat"),
                        a = e.lastVal = e.input ? e.input.val() : null,
                        s = this._getDefaultDate(e),
                        n = s,
                        r = this._getFormatConfig(e);
                    try {
                        n = this.parseDate(i, a, r) || s
                    } catch (o) {
                        a = t ? "" : a
                    }
                    e.selectedDay = n.getDate(), e.drawMonth = e.selectedMonth = n.getMonth(), e.drawYear = e.selectedYear = n.getFullYear(), e.currentDay = a ? n.getDate() : 0, e.currentMonth = a ? n.getMonth() : 0, e.currentYear = a ? n.getFullYear() : 0, this._adjustInstDate(e)
                }
            },
            _getDefaultDate: function(e) {
                return this._restrictMinMax(e, this._determineDate(e, this._get(e, "defaultDate"), new Date))
            },
            _determineDate: function(t, i, a) {
                var s = function(e) {
                        var t = new Date;
                        return t.setDate(t.getDate() + e), t
                    },
                    n = function(i) {
                        try {
                            return e.datepicker.parseDate(e.datepicker._get(t, "dateFormat"), i, e.datepicker._getFormatConfig(t))
                        } catch (a) {}
                        for (var s = (i.toLowerCase().match(/^c/) ? e.datepicker._getDate(t) : null) || new Date, n = s.getFullYear(), r = s.getMonth(), o = s.getDate(), h = /([+\-]?[0-9]+)\s*(d|D|w|W|m|M|y|Y)?/g, l = h.exec(i); l;) {
                            switch (l[2] || "d") {
                                case "d":
                                case "D":
                                    o += parseInt(l[1], 10);
                                    break;
                                case "w":
                                case "W":
                                    o += 7 * parseInt(l[1], 10);
                                    break;
                                case "m":
                                case "M":
                                    r += parseInt(l[1], 10), o = Math.min(o, e.datepicker._getDaysInMonth(n, r));
                                    break;
                                case "y":
                                case "Y":
                                    n += parseInt(l[1], 10), o = Math.min(o, e.datepicker._getDaysInMonth(n, r))
                            }
                            l = h.exec(i)
                        }
                        return new Date(n, r, o)
                    },
                    r = null == i || "" === i ? a : "string" == typeof i ? n(i) : "number" == typeof i ? isNaN(i) ? a : s(i) : new Date(i.getTime());
                return r = r && "Invalid Date" == "" + r ? a : r, r && (r.setHours(0), r.setMinutes(0), r.setSeconds(0), r.setMilliseconds(0)), this._daylightSavingAdjust(r)
            },
            _daylightSavingAdjust: function(e) {
                return e ? (e.setHours(e.getHours() > 12 ? e.getHours() + 2 : 0), e) : null
            },
            _setDate: function(e, t, i) {
                var a = !t,
                    s = e.selectedMonth,
                    n = e.selectedYear,
                    r = this._restrictMinMax(e, this._determineDate(e, t, new Date));
                e.selectedDay = e.currentDay = r.getDate(), e.drawMonth = e.selectedMonth = e.currentMonth = r.getMonth(), e.drawYear = e.selectedYear = e.currentYear = r.getFullYear(), s === e.selectedMonth && n === e.selectedYear || i || this._notifyChange(e), this._adjustInstDate(e), e.input && e.input.val(a ? "" : this._formatDate(e))
            },
            _getDate: function(e) {
                var t = !e.currentYear || e.input && "" === e.input.val() ? null : this._daylightSavingAdjust(new Date(e.currentYear, e.currentMonth, e.currentDay));
                return t
            },
            _attachHandlers: function(t) {
                var i = this._get(t, "stepMonths"),
                    a = "#" + t.id.replace(/\\\\/g, "\\");
                t.dpDiv.find("[data-handler]").map(function() {
                    var t = {
                        prev: function() {
                            e.datepicker._adjustDate(a, -i, "M")
                        },
                        next: function() {
                            e.datepicker._adjustDate(a, +i, "M")
                        },
                        hide: function() {
                            e.datepicker._hideDatepicker()
                        },
                        today: function() {
                            e.datepicker._gotoToday(a)
                        },
                        selectDay: function() {
                            return e.datepicker._selectDay(a, +this.getAttribute("data-month"), +this.getAttribute("data-year"), this), !1
                        },
                        selectMonth: function() {
                            return e.datepicker._selectMonthYear(a, this, "M"), !1
                        },
                        selectYear: function() {
                            return e.datepicker._selectMonthYear(a, this, "Y"), !1
                        }
                    };
                    e(this).bind(this.getAttribute("data-event"), t[this.getAttribute("data-handler")])
                })
            },
            _generateHTML: function(e) {
                var t, i, a, s, n, r, o, h, l, u, d, c, p, m, f, g, v, y, b, _, k, x, D, w, T, M, S, N, C, A, P, I, F, j, H, E, z, L, O, R = new Date,
                    W = this._daylightSavingAdjust(new Date(R.getFullYear(), R.getMonth(), R.getDate())),
                    Y = this._get(e, "isRTL"),
                    J = this._get(e, "showButtonPanel"),
                    $ = this._get(e, "hideIfNoPrevNext"),
                    Q = this._get(e, "navigationAsDateFormat"),
                    B = this._getNumberOfMonths(e),
                    K = this._get(e, "showCurrentAtPos"),
                    V = this._get(e, "stepMonths"),
                    U = 1 !== B[0] || 1 !== B[1],
                    G = this._daylightSavingAdjust(e.currentDay ? new Date(e.currentYear, e.currentMonth, e.currentDay) : new Date(9999, 9, 9)),
                    q = this._getMinMaxDate(e, "min"),
                    X = this._getMinMaxDate(e, "max"),
                    Z = e.drawMonth - K,
                    et = e.drawYear;
                if (0 > Z && (Z += 12, et--), X)
                    for (t = this._daylightSavingAdjust(new Date(X.getFullYear(), X.getMonth() - B[0] * B[1] + 1, X.getDate())), t = q && q > t ? q : t; this._daylightSavingAdjust(new Date(et, Z, 1)) > t;) Z--, 0 > Z && (Z = 11, et--);
                for (e.drawMonth = Z, e.drawYear = et, i = this._get(e, "prevText"), i = Q ? this.formatDate(i, this._daylightSavingAdjust(new Date(et, Z - V, 1)), this._getFormatConfig(e)) : i, a = this._canAdjustMonth(e, -1, et, Z) ? "<a class='ui-datepicker-prev ui-corner-all' data-handler='prev' data-event='click' title='" + i + "'><span class='ui-icon ui-icon-circle-triangle-" + (Y ? "e" : "w") + "'>" + i + "</span></a>" : $ ? "" : "<a class='ui-datepicker-prev ui-corner-all ui-state-disabled' title='" + i + "'><span class='ui-icon ui-icon-circle-triangle-" + (Y ? "e" : "w") + "'>" + i + "</span></a>", s = this._get(e, "nextText"), s = Q ? this.formatDate(s, this._daylightSavingAdjust(new Date(et, Z + V, 1)), this._getFormatConfig(e)) : s, n = this._canAdjustMonth(e, 1, et, Z) ? "<a class='ui-datepicker-next ui-corner-all' data-handler='next' data-event='click' title='" + s + "'><span class='ui-icon ui-icon-circle-triangle-" + (Y ? "w" : "e") + "'>" + s + "</span></a>" : $ ? "" : "<a class='ui-datepicker-next ui-corner-all ui-state-disabled' title='" + s + "'><span class='ui-icon ui-icon-circle-triangle-" + (Y ? "w" : "e") + "'>" + s + "</span></a>", r = this._get(e, "currentText"), o = this._get(e, "gotoCurrent") && e.currentDay ? G : W, r = Q ? this.formatDate(r, o, this._getFormatConfig(e)) : r, h = e.inline ? "" : "<button type='button' class='ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all' data-handler='hide' data-event='click'>" + this._get(e, "closeText") + "</button>", l = J ? "<div class='ui-datepicker-buttonpane ui-widget-content'>" + (Y ? h : "") + (this._isInRange(e, o) ? "<button type='button' class='ui-datepicker-current ui-state-default ui-priority-secondary ui-corner-all' data-handler='today' data-event='click'>" + r + "</button>" : "") + (Y ? "" : h) + "</div>" : "", u = parseInt(this._get(e, "firstDay"), 10), u = isNaN(u) ? 0 : u, d = this._get(e, "showWeek"), c = this._get(e, "dayNames"), p = this._get(e, "dayNamesMin"), m = this._get(e, "monthNames"), f = this._get(e, "monthNamesShort"), g = this._get(e, "beforeShowDay"), v = this._get(e, "showOtherMonths"), y = this._get(e, "selectOtherMonths"), b = this._getDefaultDate(e), _ = "", x = 0; B[0] > x; x++) {
                    for (D = "", this.maxRows = 4, w = 0; B[1] > w; w++) {
                        if (T = this._daylightSavingAdjust(new Date(et, Z, e.selectedDay)), M = " ui-corner-all", S = "", U) {
                            if (S += "<div class='ui-datepicker-group", B[1] > 1) switch (w) {
                                case 0:
                                    S += " ui-datepicker-group-first", M = " ui-corner-" + (Y ? "right" : "left");
                                    break;
                                case B[1] - 1:
                                    S += " ui-datepicker-group-last", M = " ui-corner-" + (Y ? "left" : "right");
                                    break;
                                default:
                                    S += " ui-datepicker-group-middle", M = ""
                            }
                            S += "'>"
                        }
                        for (S += "<div class='ui-datepicker-header ui-widget-header ui-helper-clearfix" + M + "'>" + (/all|left/.test(M) && 0 === x ? Y ? n : a : "") + (/all|right/.test(M) && 0 === x ? Y ? a : n : "") + this._generateMonthYearHeader(e, Z, et, q, X, x > 0 || w > 0, m, f) + "</div><table class='ui-datepicker-calendar'><thead><tr>", N = d ? "<th class='ui-datepicker-week-col'>" + this._get(e, "weekHeader") + "</th>" : "", k = 0; 7 > k; k++) C = (k + u) % 7, N += "<th" + ((k + u + 6) % 7 >= 5 ? " class='ui-datepicker-week-end'" : "") + "><span title='" + c[C] + "'>" + p[C] + "</span></th>";
                        for (S += N + "</tr></thead><tbody>", A = this._getDaysInMonth(et, Z), et === e.selectedYear && Z === e.selectedMonth && (e.selectedDay = Math.min(e.selectedDay, A)), P = (this._getFirstDayOfMonth(et, Z) - u + 7) % 7, I = Math.ceil((P + A) / 7), F = U && this.maxRows > I ? this.maxRows : I, this.maxRows = F, j = this._daylightSavingAdjust(new Date(et, Z, 1 - P)), H = 0; F > H; H++) {
                            for (S += "<tr>", E = d ? "<td class='ui-datepicker-week-col'>" + this._get(e, "calculateWeek")(j) + "</td>" : "", k = 0; 7 > k; k++) z = g ? g.apply(e.input ? e.input[0] : null, [j]) : [!0, ""], L = j.getMonth() !== Z, O = L && !y || !z[0] || q && q > j || X && j > X, E += "<td class='" + ((k + u + 6) % 7 >= 5 ? " ui-datepicker-week-end" : "") + (L ? " ui-datepicker-other-month" : "") + (j.getTime() === T.getTime() && Z === e.selectedMonth && e._keyEvent || b.getTime() === j.getTime() && b.getTime() === T.getTime() ? " " + this._dayOverClass : "") + (O ? " " + this._unselectableClass + " ui-state-disabled" : "") + (L && !v ? "" : " " + z[1] + (j.getTime() === G.getTime() ? " " + this._currentClass : "") + (j.getTime() === W.getTime() ? " ui-datepicker-today" : "")) + "'" + (L && !v || !z[2] ? "" : " title='" + z[2].replace(/'/g, "&#39;") + "'") + (O ? "" : " data-handler='selectDay' data-event='click' data-month='" + j.getMonth() + "' data-year='" + j.getFullYear() + "'") + ">" + (L && !v ? "&#xa0;" : O ? "<span class='ui-state-default'>" + j.getDate() + "</span>" : "<a class='ui-state-default" + (j.getTime() === W.getTime() ? " ui-state-highlight" : "") + (j.getTime() === G.getTime() ? " ui-state-active" : "") + (L ? " ui-priority-secondary" : "") + "' href='#'>" + j.getDate() + "</a>") + "</td>", j.setDate(j.getDate() + 1), j = this._daylightSavingAdjust(j);
                            S += E + "</tr>"
                        }
                        Z++, Z > 11 && (Z = 0, et++), S += "</tbody></table>" + (U ? "</div>" + (B[0] > 0 && w === B[1] - 1 ? "<div class='ui-datepicker-row-break'></div>" : "") : ""), D += S
                    }
                    _ += D
                }
                return _ += l, e._keyEvent = !1, _
            },
            _generateMonthYearHeader: function(e, t, i, a, s, n, r, o) {
                var h, l, u, d, c, p, m, f, g = this._get(e, "changeMonth"),
                    v = this._get(e, "changeYear"),
                    y = this._get(e, "showMonthAfterYear"),
                    b = "<div class='ui-datepicker-title'>",
                    _ = "";
                if (n || !g) _ += "<span class='ui-datepicker-month'>" + r[t] + "</span>";
                else {
                    for (h = a && a.getFullYear() === i, l = s && s.getFullYear() === i, _ += "<select class='ui-datepicker-month' data-handler='selectMonth' data-event='change'>", u = 0; 12 > u; u++)(!h || u >= a.getMonth()) && (!l || s.getMonth() >= u) && (_ += "<option value='" + u + "'" + (u === t ? " selected='selected'" : "") + ">" + o[u] + "</option>");
                    _ += "</select>"
                }
                if (y || (b += _ + (!n && g && v ? "" : "&#xa0;")), !e.yearshtml)
                    if (e.yearshtml = "", n || !v) b += "<span class='ui-datepicker-year'>" + i + "</span>";
                    else {
                        for (d = this._get(e, "yearRange").split(":"), c = (new Date).getFullYear(), p = function(e) {
                                var t = e.match(/c[+\-].*/) ? i + parseInt(e.substring(1), 10) : e.match(/[+\-].*/) ? c + parseInt(e, 10) : parseInt(e, 10);
                                return isNaN(t) ? c : t
                            }, m = p(d[0]), f = Math.max(m, p(d[1] || "")), m = a ? Math.max(m, a.getFullYear()) : m, f = s ? Math.min(f, s.getFullYear()) : f, e.yearshtml += "<select class='ui-datepicker-year' data-handler='selectYear' data-event='change'>"; f >= m; m++) e.yearshtml += "<option value='" + m + "'" + (m === i ? " selected='selected'" : "") + ">" + m + "</option>";
                        e.yearshtml += "</select>", b += e.yearshtml, e.yearshtml = null
                    }
                return b += this._get(e, "yearSuffix"), y && (b += (!n && g && v ? "" : "&#xa0;") + _), b += "</div>"
            },
            _adjustInstDate: function(e, t, i) {
                var a = e.drawYear + ("Y" === i ? t : 0),
                    s = e.drawMonth + ("M" === i ? t : 0),
                    n = Math.min(e.selectedDay, this._getDaysInMonth(a, s)) + ("D" === i ? t : 0),
                    r = this._restrictMinMax(e, this._daylightSavingAdjust(new Date(a, s, n)));
                e.selectedDay = r.getDate(), e.drawMonth = e.selectedMonth = r.getMonth(), e.drawYear = e.selectedYear = r.getFullYear(), ("M" === i || "Y" === i) && this._notifyChange(e)
            },
            _restrictMinMax: function(e, t) {
                var i = this._getMinMaxDate(e, "min"),
                    a = this._getMinMaxDate(e, "max"),
                    s = i && i > t ? i : t;
                return a && s > a ? a : s
            },
            _notifyChange: function(e) {
                var t = this._get(e, "onChangeMonthYear");
                t && t.apply(e.input ? e.input[0] : null, [e.selectedYear, e.selectedMonth + 1, e])
            },
            _getNumberOfMonths: function(e) {
                var t = this._get(e, "numberOfMonths");
                return null == t ? [1, 1] : "number" == typeof t ? [1, t] : t
            },
            _getMinMaxDate: function(e, t) {
                return this._determineDate(e, this._get(e, t + "Date"), null)
            },
            _getDaysInMonth: function(e, t) {
                return 32 - this._daylightSavingAdjust(new Date(e, t, 32)).getDate()
            },
            _getFirstDayOfMonth: function(e, t) {
                return new Date(e, t, 1).getDay()
            },
            _canAdjustMonth: function(e, t, i, a) {
                var s = this._getNumberOfMonths(e),
                    n = this._daylightSavingAdjust(new Date(i, a + (0 > t ? t : s[0] * s[1]), 1));
                return 0 > t && n.setDate(this._getDaysInMonth(n.getFullYear(), n.getMonth())), this._isInRange(e, n)
            },
            _isInRange: function(e, t) {
                var i, a, s = this._getMinMaxDate(e, "min"),
                    n = this._getMinMaxDate(e, "max"),
                    r = null,
                    o = null,
                    h = this._get(e, "yearRange");
                return h && (i = h.split(":"), a = (new Date).getFullYear(), r = parseInt(i[0], 10), o = parseInt(i[1], 10), i[0].match(/[+\-].*/) && (r += a), i[1].match(/[+\-].*/) && (o += a)), (!s || t.getTime() >= s.getTime()) && (!n || t.getTime() <= n.getTime()) && (!r || t.getFullYear() >= r) && (!o || o >= t.getFullYear())
            },
            _getFormatConfig: function(e) {
                var t = this._get(e, "shortYearCutoff");
                return t = "string" != typeof t ? t : (new Date).getFullYear() % 100 + parseInt(t, 10), {
                    shortYearCutoff: t,
                    dayNamesShort: this._get(e, "dayNamesShort"),
                    dayNames: this._get(e, "dayNames"),
                    monthNamesShort: this._get(e, "monthNamesShort"),
                    monthNames: this._get(e, "monthNames")
                }
            },
            _formatDate: function(e, t, i, a) {
                t || (e.currentDay = e.selectedDay, e.currentMonth = e.selectedMonth, e.currentYear = e.selectedYear);
                var s = t ? "object" == typeof t ? t : this._daylightSavingAdjust(new Date(a, i, t)) : this._daylightSavingAdjust(new Date(e.currentYear, e.currentMonth, e.currentDay));
                return this.formatDate(this._get(e, "dateFormat"), s, this._getFormatConfig(e))
            }
        }), e.fn.datepicker = function(t) {
            if (!this.length) return this;
            e.datepicker.initialized || (e(document).mousedown(e.datepicker._checkExternalClick), e.datepicker.initialized = !0), 0 === e("#" + e.datepicker._mainDivId).length && e("body").append(e.datepicker.dpDiv);
            var i = Array.prototype.slice.call(arguments, 1);
            return "string" != typeof t || "isDisabled" !== t && "getDate" !== t && "widget" !== t ? "option" === t && 2 === arguments.length && "string" == typeof arguments[1] ? e.datepicker["_" + t + "Datepicker"].apply(e.datepicker, [this[0]].concat(i)) : this.each(function() {
                "string" == typeof t ? e.datepicker["_" + t + "Datepicker"].apply(e.datepicker, [this].concat(i)) : e.datepicker._attachDatepicker(this, t)
            }) : e.datepicker["_" + t + "Datepicker"].apply(e.datepicker, [this[0]].concat(i))
        }, e.datepicker = new i, e.datepicker.initialized = !1, e.datepicker.uuid = (new Date).getTime(), e.datepicker.version = "1.10.3"
    }(jQuery),
    function(e) {
        var t = {
                buttons: !0,
                height: !0,
                maxHeight: !0,
                maxWidth: !0,
                minHeight: !0,
                minWidth: !0,
                width: !0
            },
            i = {
                maxHeight: !0,
                maxWidth: !0,
                minHeight: !0,
                minWidth: !0
            };
        e.widget("ui.dialog", {
            version: "1.10.3",
            options: {
                appendTo: "body",
                autoOpen: !0,
                buttons: [],
                closeOnEscape: !0,
                closeText: "close",
                dialogClass: "",
                draggable: !0,
                hide: null,
                height: "auto",
                maxHeight: null,
                maxWidth: null,
                minHeight: 150,
                minWidth: 150,
                modal: !1,
                position: {
                    my: "center",
                    at: "center",
                    of: window,
                    collision: "fit",
                    using: function(t) {
                        var i = e(this).css(t).offset().top;
                        0 > i && e(this).css("top", t.top - i)
                    }
                },
                resizable: !0,
                show: null,
                title: null,
                width: 300,
                beforeClose: null,
                close: null,
                drag: null,
                dragStart: null,
                dragStop: null,
                focus: null,
                open: null,
                resize: null,
                resizeStart: null,
                resizeStop: null
            },
            _create: function() {
                this.originalCss = {
                    display: this.element[0].style.display,
                    width: this.element[0].style.width,
                    minHeight: this.element[0].style.minHeight,
                    maxHeight: this.element[0].style.maxHeight,
                    height: this.element[0].style.height
                }, this.originalPosition = {
                    parent: this.element.parent(),
                    index: this.element.parent().children().index(this.element)
                }, this.originalTitle = this.element.attr("title"), this.options.title = this.options.title || this.originalTitle, this._createWrapper(), this.element.show().removeAttr("title").addClass("ui-dialog-content ui-widget-content").appendTo(this.uiDialog), this._createTitlebar(), this._createButtonPane(), this.options.draggable && e.fn.draggable && this._makeDraggable(), this.options.resizable && e.fn.resizable && this._makeResizable(), this._isOpen = !1
            },
            _init: function() {
                this.options.autoOpen && this.open()
            },
            _appendTo: function() {
                var t = this.options.appendTo;
                return t && (t.jquery || t.nodeType) ? e(t) : this.document.find(t || "body").eq(0)
            },
            _destroy: function() {
                var e, t = this.originalPosition;
                this._destroyOverlay(), this.element.removeUniqueId().removeClass("ui-dialog-content ui-widget-content").css(this.originalCss).detach(), this.uiDialog.stop(!0, !0).remove(), this.originalTitle && this.element.attr("title", this.originalTitle), e = t.parent.children().eq(t.index), e.length && e[0] !== this.element[0] ? e.before(this.element) : t.parent.append(this.element)
            },
            widget: function() {
                return this.uiDialog
            },
            disable: e.noop,
            enable: e.noop,
            close: function(t) {
                var i = this;
                this._isOpen && this._trigger("beforeClose", t) !== !1 && (this._isOpen = !1, this._destroyOverlay(), this.opener.filter(":focusable").focus().length || e(this.document[0].activeElement).blur(), this._hide(this.uiDialog, this.options.hide, function() {
                    i._trigger("close", t)
                }))
            },
            isOpen: function() {
                return this._isOpen
            },
            moveToTop: function() {
                this._moveToTop()
            },
            _moveToTop: function(e, t) {
                var i = !!this.uiDialog.nextAll(":visible").insertBefore(this.uiDialog).length;
                return i && !t && this._trigger("focus", e), i
            },
            open: function() {
                var t = this;
                return this._isOpen ? void(this._moveToTop() && this._focusTabbable()) : (this._isOpen = !0, this.opener = e(this.document[0].activeElement), this._size(), this._position(), this._createOverlay(), this._moveToTop(null, !0), this._show(this.uiDialog, this.options.show, function() {
                    t._focusTabbable(), t._trigger("focus")
                }), void this._trigger("open"))
            },
            _focusTabbable: function() {
                var e = this.element.find("[autofocus]");
                e.length || (e = this.element.find(":tabbable")), e.length || (e = this.uiDialogButtonPane.find(":tabbable")), e.length || (e = this.uiDialogTitlebarClose.filter(":tabbable")), e.length || (e = this.uiDialog), e.eq(0).focus()
            },
            _keepFocus: function(t) {
                function i() {
                    var t = this.document[0].activeElement,
                        i = this.uiDialog[0] === t || e.contains(this.uiDialog[0], t);
                    i || this._focusTabbable()
                }
                t.preventDefault(), i.call(this), this._delay(i)
            },
            _createWrapper: function() {
                this.uiDialog = e("<div>").addClass("ui-dialog ui-widget ui-widget-content ui-corner-all ui-front " + this.options.dialogClass).hide().attr({
                    tabIndex: -1,
                    role: "dialog"
                }).appendTo(this._appendTo()), this._on(this.uiDialog, {
                    keydown: function(t) {
                        if (this.options.closeOnEscape && !t.isDefaultPrevented() && t.keyCode && t.keyCode === e.ui.keyCode.ESCAPE) return t.preventDefault(), void this.close(t);
                        if (t.keyCode === e.ui.keyCode.TAB) {
                            var i = this.uiDialog.find(":tabbable"),
                                a = i.filter(":first"),
                                s = i.filter(":last");
                            t.target !== s[0] && t.target !== this.uiDialog[0] || t.shiftKey ? t.target !== a[0] && t.target !== this.uiDialog[0] || !t.shiftKey || (s.focus(1), t.preventDefault()) : (a.focus(1), t.preventDefault())
                        }
                    },
                    mousedown: function(e) {
                        this._moveToTop(e) && this._focusTabbable()
                    }
                }), this.element.find("[aria-describedby]").length || this.uiDialog.attr({
                    "aria-describedby": this.element.uniqueId().attr("id")
                })
            },
            _createTitlebar: function() {
                var t;
                this.uiDialogTitlebar = e("<div>").addClass("ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix").prependTo(this.uiDialog), this._on(this.uiDialogTitlebar, {
                    mousedown: function(t) {
                        e(t.target).closest(".ui-dialog-titlebar-close") || this.uiDialog.focus()
                    }
                }), this.uiDialogTitlebarClose = e("<button></button>").button({
                    label: this.options.closeText,
                    icons: {
                        primary: "ui-icon-closethick"
                    },
                    text: !1
                }).addClass("ui-dialog-titlebar-close").appendTo(this.uiDialogTitlebar), this._on(this.uiDialogTitlebarClose, {
                    click: function(e) {
                        e.preventDefault(), this.close(e)
                    }
                }), t = e("<span>").uniqueId().addClass("ui-dialog-title").prependTo(this.uiDialogTitlebar), this._title(t), this.uiDialog.attr({
                    "aria-labelledby": t.attr("id")
                })
            },
            _title: function(e) {
                this.options.title || e.html("&#160;"), e.text(this.options.title)
            },
            _createButtonPane: function() {
                this.uiDialogButtonPane = e("<div>").addClass("ui-dialog-buttonpane ui-widget-content ui-helper-clearfix"), this.uiButtonSet = e("<div>").addClass("ui-dialog-buttonset").appendTo(this.uiDialogButtonPane), this._createButtons()
            },
            _createButtons: function() {
                var t = this,
                    i = this.options.buttons;
                return this.uiDialogButtonPane.remove(), this.uiButtonSet.empty(), e.isEmptyObject(i) || e.isArray(i) && !i.length ? void this.uiDialog.removeClass("ui-dialog-buttons") : (e.each(i, function(i, a) {
                    var s, n;
                    a = e.isFunction(a) ? {
                        click: a,
                        text: i
                    } : a, a = e.extend({
                        type: "button"
                    }, a), s = a.click, a.click = function() {
                        s.apply(t.element[0], arguments)
                    }, n = {
                        icons: a.icons,
                        text: a.showText
                    }, delete a.icons, delete a.showText, e("<button></button>", a).button(n).appendTo(t.uiButtonSet)
                }), this.uiDialog.addClass("ui-dialog-buttons"), void this.uiDialogButtonPane.appendTo(this.uiDialog))
            },
            _makeDraggable: function() {
                function t(e) {
                    return {
                        position: e.position,
                        offset: e.offset
                    }
                }
                var i = this,
                    a = this.options;
                this.uiDialog.draggable({
                    cancel: ".ui-dialog-content, .ui-dialog-titlebar-close",
                    handle: ".ui-dialog-titlebar",
                    containment: "document",
                    start: function(a, s) {
                        e(this).addClass("ui-dialog-dragging"), i._blockFrames(), i._trigger("dragStart", a, t(s))
                    },
                    drag: function(e, a) {
                        i._trigger("drag", e, t(a))
                    },
                    stop: function(s, n) {
                        a.position = [n.position.left - i.document.scrollLeft(), n.position.top - i.document.scrollTop()], e(this).removeClass("ui-dialog-dragging"), i._unblockFrames(), i._trigger("dragStop", s, t(n))
                    }
                })
            },
            _makeResizable: function() {
                function t(e) {
                    return {
                        originalPosition: e.originalPosition,
                        originalSize: e.originalSize,
                        position: e.position,
                        size: e.size
                    }
                }
                var i = this,
                    a = this.options,
                    s = a.resizable,
                    n = this.uiDialog.css("position"),
                    r = "string" == typeof s ? s : "n,e,s,w,se,sw,ne,nw";
                this.uiDialog.resizable({
                    cancel: ".ui-dialog-content",
                    containment: "document",
                    alsoResize: this.element,
                    maxWidth: a.maxWidth,
                    maxHeight: a.maxHeight,
                    minWidth: a.minWidth,
                    minHeight: this._minHeight(),
                    handles: r,
                    start: function(a, s) {
                        e(this).addClass("ui-dialog-resizing"), i._blockFrames(), i._trigger("resizeStart", a, t(s))
                    },
                    resize: function(e, a) {
                        i._trigger("resize", e, t(a))
                    },
                    stop: function(s, n) {
                        a.height = e(this).height(), a.width = e(this).width(), e(this).removeClass("ui-dialog-resizing"), i._unblockFrames(), i._trigger("resizeStop", s, t(n))
                    }
                }).css("position", n)
            },
            _minHeight: function() {
                var e = this.options;
                return "auto" === e.height ? e.minHeight : Math.min(e.minHeight, e.height)
            },
            _position: function() {
                var e = this.uiDialog.is(":visible");
                e || this.uiDialog.show(), this.uiDialog.position(this.options.position), e || this.uiDialog.hide()
            },
            _setOptions: function(a) {
                var s = this,
                    n = !1,
                    r = {};
                e.each(a, function(e, a) {
                    s._setOption(e, a), e in t && (n = !0), e in i && (r[e] = a)
                }), n && (this._size(), this._position()), this.uiDialog.is(":data(ui-resizable)") && this.uiDialog.resizable("option", r)
            },
            _setOption: function(e, t) {
                var i, a, s = this.uiDialog;
                "dialogClass" === e && s.removeClass(this.options.dialogClass).addClass(t), "disabled" !== e && (this._super(e, t), "appendTo" === e && this.uiDialog.appendTo(this._appendTo()), "buttons" === e && this._createButtons(), "closeText" === e && this.uiDialogTitlebarClose.button({
                    label: "" + t
                }), "draggable" === e && (i = s.is(":data(ui-draggable)"), i && !t && s.draggable("destroy"), !i && t && this._makeDraggable()), "position" === e && this._position(), "resizable" === e && (a = s.is(":data(ui-resizable)"), a && !t && s.resizable("destroy"), a && "string" == typeof t && s.resizable("option", "handles", t), a || t === !1 || this._makeResizable()), "title" === e && this._title(this.uiDialogTitlebar.find(".ui-dialog-title")))
            },
            _size: function() {
                var e, t, i, a = this.options;
                this.element.show().css({
                    width: "auto",
                    minHeight: 0,
                    maxHeight: "none",
                    height: 0
                }), a.minWidth > a.width && (a.width = a.minWidth), e = this.uiDialog.css({
                    height: "auto",
                    width: a.width
                }).outerHeight(), t = Math.max(0, a.minHeight - e), i = "number" == typeof a.maxHeight ? Math.max(0, a.maxHeight - e) : "none", "auto" === a.height ? this.element.css({
                    minHeight: t,
                    maxHeight: i,
                    height: "auto"
                }) : this.element.height(Math.max(0, a.height - e)), this.uiDialog.is(":data(ui-resizable)") && this.uiDialog.resizable("option", "minHeight", this._minHeight())
            },
            _blockFrames: function() {
                this.iframeBlocks = this.document.find("iframe").map(function() {
                    var t = e(this);
                    return e("<div>").css({
                        position: "absolute",
                        width: t.outerWidth(),
                        height: t.outerHeight()
                    }).appendTo(t.parent()).offset(t.offset())[0]
                })
            },
            _unblockFrames: function() {
                this.iframeBlocks && (this.iframeBlocks.remove(), delete this.iframeBlocks)
            },
            _allowInteraction: function(t) {
                return e(t.target).closest(".ui-dialog").length ? !0 : !!e(t.target).closest(".ui-datepicker").length
            },
            _createOverlay: function() {
                if (this.options.modal) {
                    var t = this,
                        i = this.widgetFullName;
                    e.ui.dialog.overlayInstances || this._delay(function() {
                        e.ui.dialog.overlayInstances && this.document.bind("focusin.dialog", function(a) {
                            t._allowInteraction(a) || (a.preventDefault(), e(".ui-dialog:visible:last .ui-dialog-content").data(i)._focusTabbable())
                        })
                    }), this.overlay = e("<div>").addClass("ui-widget-overlay ui-front").appendTo(this._appendTo()), this._on(this.overlay, {
                        mousedown: "_keepFocus"
                    }), e.ui.dialog.overlayInstances++
                }
            },
            _destroyOverlay: function() {
                this.options.modal && this.overlay && (e.ui.dialog.overlayInstances--, e.ui.dialog.overlayInstances || this.document.unbind("focusin.dialog"), this.overlay.remove(), this.overlay = null)
            }
        }), e.ui.dialog.overlayInstances = 0, e.uiBackCompat !== !1 && e.widget("ui.dialog", e.ui.dialog, {
            _position: function() {
                var t, i = this.options.position,
                    a = [],
                    s = [0, 0];
                i ? (("string" == typeof i || "object" == typeof i && "0" in i) && (a = i.split ? i.split(" ") : [i[0], i[1]], 1 === a.length && (a[1] = a[0]), e.each(["left", "top"], function(e, t) {
                    +a[e] === a[e] && (s[e] = a[e], a[e] = t)
                }), i = {
                    my: a[0] + (0 > s[0] ? s[0] : "+" + s[0]) + " " + a[1] + (0 > s[1] ? s[1] : "+" + s[1]),
                    at: a.join(" ")
                }), i = e.extend({}, e.ui.dialog.prototype.options.position, i)) : i = e.ui.dialog.prototype.options.position, t = this.uiDialog.is(":visible"), t || this.uiDialog.show(), this.uiDialog.position(i), t || this.uiDialog.hide()
            }
        })
    }(jQuery),
    function(e) {
        e.widget("ui.menu", {
            version: "1.10.3",
            defaultElement: "<ul>",
            delay: 300,
            options: {
                icons: {
                    submenu: "ui-icon-carat-1-e"
                },
                menus: "ul",
                position: {
                    my: "left top",
                    at: "right top"
                },
                role: "menu",
                blur: null,
                focus: null,
                select: null
            },
            _create: function() {
                this.activeMenu = this.element, this.mouseHandled = !1, this.element.uniqueId().addClass("ui-menu ui-widget ui-widget-content ui-corner-all").toggleClass("ui-menu-icons", !!this.element.find(".ui-icon").length).attr({
                    role: this.options.role,
                    tabIndex: 0
                }).bind("click" + this.eventNamespace, e.proxy(function(e) {
                    this.options.disabled && e.preventDefault()
                }, this)), this.options.disabled && this.element.addClass("ui-state-disabled").attr("aria-disabled", "true"), this._on({
                    "mousedown .ui-menu-item > a": function(e) {
                        e.preventDefault()
                    },
                    "click .ui-state-disabled > a": function(e) {
                        e.preventDefault()
                    },
                    "click .ui-menu-item:has(a)": function(t) {
                        var i = e(t.target).closest(".ui-menu-item");
                        !this.mouseHandled && i.not(".ui-state-disabled").length && (this.mouseHandled = !0, this.select(t), i.has(".ui-menu").length ? this.expand(t) : this.element.is(":focus") || (this.element.trigger("focus", [!0]), this.active && 1 === this.active.parents(".ui-menu").length && clearTimeout(this.timer)))
                    },
                    "mouseenter .ui-menu-item": function(t) {
                        var i = e(t.currentTarget);
                        i.siblings().children(".ui-state-active").removeClass("ui-state-active"), this.focus(t, i)
                    },
                    mouseleave: "collapseAll",
                    "mouseleave .ui-menu": "collapseAll",
                    focus: function(e, t) {
                        var i = this.active || this.element.children(".ui-menu-item").eq(0);
                        t || this.focus(e, i)
                    },
                    blur: function(t) {
                        this._delay(function() {
                            e.contains(this.element[0], this.document[0].activeElement) || this.collapseAll(t)
                        })
                    },
                    keydown: "_keydown"
                }), this.refresh(), this._on(this.document, {
                    click: function(t) {
                        e(t.target).closest(".ui-menu").length || this.collapseAll(t), this.mouseHandled = !1
                    }
                })
            },
            _destroy: function() {
                this.element.removeAttr("aria-activedescendant").find(".ui-menu").addBack().removeClass("ui-menu ui-widget ui-widget-content ui-corner-all ui-menu-icons").removeAttr("role").removeAttr("tabIndex").removeAttr("aria-labelledby").removeAttr("aria-expanded").removeAttr("aria-hidden").removeAttr("aria-disabled").removeUniqueId().show(), this.element.find(".ui-menu-item").removeClass("ui-menu-item").removeAttr("role").removeAttr("aria-disabled").children("a").removeUniqueId().removeClass("ui-corner-all ui-state-hover").removeAttr("tabIndex").removeAttr("role").removeAttr("aria-haspopup").children().each(function() {
                    var t = e(this);
                    t.data("ui-menu-submenu-carat") && t.remove()
                }), this.element.find(".ui-menu-divider").removeClass("ui-menu-divider ui-widget-content")
            },
            _keydown: function(t) {
                function i(e) {
                    return e.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&")
                }
                var s, a, n, r, o, h = !0;
                switch (t.keyCode) {
                    case e.ui.keyCode.PAGE_UP:
                        this.previousPage(t);
                        break;
                    case e.ui.keyCode.PAGE_DOWN:
                        this.nextPage(t);
                        break;
                    case e.ui.keyCode.HOME:
                        this._move("first", "first", t);
                        break;
                    case e.ui.keyCode.END:
                        this._move("last", "last", t);
                        break;
                    case e.ui.keyCode.UP:
                        this.previous(t);
                        break;
                    case e.ui.keyCode.DOWN:
                        this.next(t);
                        break;
                    case e.ui.keyCode.LEFT:
                        this.collapse(t);
                        break;
                    case e.ui.keyCode.RIGHT:
                        this.active && !this.active.is(".ui-state-disabled") && this.expand(t);
                        break;
                    case e.ui.keyCode.ENTER:
                    case e.ui.keyCode.SPACE:
                        this._activate(t);
                        break;
                    case e.ui.keyCode.ESCAPE:
                        this.collapse(t);
                        break;
                    default:
                        h = !1, a = this.previousFilter || "", n = String.fromCharCode(t.keyCode), r = !1, clearTimeout(this.filterTimer), n === a ? r = !0 : n = a + n, o = RegExp("^" + i(n), "i"), s = this.activeMenu.children(".ui-menu-item").filter(function() {
                            return o.test(e(this).children("a").text())
                        }), s = r && -1 !== s.index(this.active.next()) ? this.active.nextAll(".ui-menu-item") : s, s.length || (n = String.fromCharCode(t.keyCode), o = RegExp("^" + i(n), "i"), s = this.activeMenu.children(".ui-menu-item").filter(function() {
                            return o.test(e(this).children("a").text())
                        })), s.length ? (this.focus(t, s), s.length > 1 ? (this.previousFilter = n, this.filterTimer = this._delay(function() {
                            delete this.previousFilter
                        }, 1e3)) : delete this.previousFilter) : delete this.previousFilter
                }
                h && t.preventDefault()
            },
            _activate: function(e) {
                this.active.is(".ui-state-disabled") || (this.active.children("a[aria-haspopup='true']").length ? this.expand(e) : this.select(e))
            },
            refresh: function() {
                var t, i = this.options.icons.submenu,
                    s = this.element.find(this.options.menus);
                s.filter(":not(.ui-menu)").addClass("ui-menu ui-widget ui-widget-content ui-corner-all").hide().attr({
                    role: this.options.role,
                    "aria-hidden": "true",
                    "aria-expanded": "false"
                }).each(function() {
                    var t = e(this),
                        s = t.prev("a"),
                        a = e("<span>").addClass("ui-menu-icon ui-icon " + i).data("ui-menu-submenu-carat", !0);
                    s.attr("aria-haspopup", "true").prepend(a), t.attr("aria-labelledby", s.attr("id"))
                }), t = s.add(this.element), t.children(":not(.ui-menu-item):has(a)").addClass("ui-menu-item").attr("role", "presentation").children("a").uniqueId().addClass("ui-corner-all").attr({
                    tabIndex: -1,
                    role: this._itemRole()
                }), t.children(":not(.ui-menu-item)").each(function() {
                    var t = e(this);
                    /[^\-\u2014\u2013\s]/.test(t.text()) || t.addClass("ui-widget-content ui-menu-divider")
                }), t.children(".ui-state-disabled").attr("aria-disabled", "true"), this.active && !e.contains(this.element[0], this.active[0]) && this.blur()
            },
            _itemRole: function() {
                return {
                    menu: "menuitem",
                    listbox: "option"
                }[this.options.role]
            },
            _setOption: function(e, t) {
                "icons" === e && this.element.find(".ui-menu-icon").removeClass(this.options.icons.submenu).addClass(t.submenu), this._super(e, t)
            },
            focus: function(e, t) {
                var i, s;
                this.blur(e, e && "focus" === e.type), this._scrollIntoView(t), this.active = t.first(), s = this.active.children("a").addClass("ui-state-focus"), this.options.role && this.element.attr("aria-activedescendant", s.attr("id")), this.active.parent().closest(".ui-menu-item").children("a:first").addClass("ui-state-active"), e && "keydown" === e.type ? this._close() : this.timer = this._delay(function() {
                    this._close()
                }, this.delay), i = t.children(".ui-menu"), i.length && /^mouse/.test(e.type) && this._startOpening(i), this.activeMenu = t.parent(), this._trigger("focus", e, {
                    item: t
                })
            },
            _scrollIntoView: function(t) {
                var i, s, a, n, r, o;
                this._hasScroll() && (i = parseFloat(e.css(this.activeMenu[0], "borderTopWidth")) || 0, s = parseFloat(e.css(this.activeMenu[0], "paddingTop")) || 0, a = t.offset().top - this.activeMenu.offset().top - i - s, n = this.activeMenu.scrollTop(), r = this.activeMenu.height(), o = t.height(), 0 > a ? this.activeMenu.scrollTop(n + a) : a + o > r && this.activeMenu.scrollTop(n + a - r + o))
            },
            blur: function(e, t) {
                t || clearTimeout(this.timer), this.active && (this.active.children("a").removeClass("ui-state-focus"), this.active = null, this._trigger("blur", e, {
                    item: this.active
                }))
            },
            _startOpening: function(e) {
                clearTimeout(this.timer), "true" === e.attr("aria-hidden") && (this.timer = this._delay(function() {
                    this._close(), this._open(e)
                }, this.delay))
            },
            _open: function(t) {
                var i = e.extend({
                    of: this.active
                }, this.options.position);
                clearTimeout(this.timer), this.element.find(".ui-menu").not(t.parents(".ui-menu")).hide().attr("aria-hidden", "true"), t.show().removeAttr("aria-hidden").attr("aria-expanded", "true").position(i)
            },
            collapseAll: function(t, i) {
                clearTimeout(this.timer), this.timer = this._delay(function() {
                    var s = i ? this.element : e(t && t.target).closest(this.element.find(".ui-menu"));
                    s.length || (s = this.element), this._close(s), this.blur(t), this.activeMenu = s
                }, this.delay)
            },
            _close: function(e) {
                e || (e = this.active ? this.active.parent() : this.element), e.find(".ui-menu").hide().attr("aria-hidden", "true").attr("aria-expanded", "false").end().find("a.ui-state-active").removeClass("ui-state-active")
            },
            collapse: function(e) {
                var t = this.active && this.active.parent().closest(".ui-menu-item", this.element);
                t && t.length && (this._close(), this.focus(e, t))
            },
            expand: function(e) {
                var t = this.active && this.active.children(".ui-menu ").children(".ui-menu-item").first();
                t && t.length && (this._open(t.parent()), this._delay(function() {
                    this.focus(e, t)
                }))
            },
            next: function(e) {
                this._move("next", "first", e)
            },
            previous: function(e) {
                this._move("prev", "last", e)
            },
            isFirstItem: function() {
                return this.active && !this.active.prevAll(".ui-menu-item").length
            },
            isLastItem: function() {
                return this.active && !this.active.nextAll(".ui-menu-item").length
            },
            _move: function(e, t, i) {
                var s;
                this.active && (s = "first" === e || "last" === e ? this.active["first" === e ? "prevAll" : "nextAll"](".ui-menu-item").eq(-1) : this.active[e + "All"](".ui-menu-item").eq(0)), s && s.length && this.active || (s = this.activeMenu.children(".ui-menu-item")[t]()), this.focus(i, s)
            },
            nextPage: function(t) {
                var i, s, a;
                return this.active ? void(this.isLastItem() || (this._hasScroll() ? (s = this.active.offset().top, a = this.element.height(), this.active.nextAll(".ui-menu-item").each(function() {
                    return i = e(this), 0 > i.offset().top - s - a
                }), this.focus(t, i)) : this.focus(t, this.activeMenu.children(".ui-menu-item")[this.active ? "last" : "first"]()))) : void this.next(t)
            },
            previousPage: function(t) {
                var i, s, a;
                return this.active ? void(this.isFirstItem() || (this._hasScroll() ? (s = this.active.offset().top, a = this.element.height(), this.active.prevAll(".ui-menu-item").each(function() {
                    return i = e(this), i.offset().top - s + a > 0
                }), this.focus(t, i)) : this.focus(t, this.activeMenu.children(".ui-menu-item").first()))) : void this.next(t)
            },
            _hasScroll: function() {
                return this.element.outerHeight() < this.element.prop("scrollHeight")
            },
            select: function(t) {
                this.active = this.active || e(t.target).closest(".ui-menu-item");
                var i = {
                    item: this.active
                };
                this.active.has(".ui-menu").length || this.collapseAll(t, !0), this._trigger("select", t, i)
            }
        })
    }(jQuery),
    function(e, t) {
        e.widget("ui.progressbar", {
            version: "1.10.3",
            options: {
                max: 100,
                value: 0,
                change: null,
                complete: null
            },
            min: 0,
            _create: function() {
                this.oldValue = this.options.value = this._constrainedValue(), this.element.addClass("ui-progressbar ui-widget ui-widget-content ui-corner-all").attr({
                    role: "progressbar",
                    "aria-valuemin": this.min
                }), this.valueDiv = e("<div class='ui-progressbar-value ui-widget-header ui-corner-left'></div>").appendTo(this.element), this._refreshValue()
            },
            _destroy: function() {
                this.element.removeClass("ui-progressbar ui-widget ui-widget-content ui-corner-all").removeAttr("role").removeAttr("aria-valuemin").removeAttr("aria-valuemax").removeAttr("aria-valuenow"), this.valueDiv.remove()
            },
            value: function(e) {
                return e === t ? this.options.value : (this.options.value = this._constrainedValue(e), this._refreshValue(), t)
            },
            _constrainedValue: function(e) {
                return e === t && (e = this.options.value), this.indeterminate = e === !1, "number" != typeof e && (e = 0), this.indeterminate ? !1 : Math.min(this.options.max, Math.max(this.min, e))
            },
            _setOptions: function(e) {
                var t = e.value;
                delete e.value, this._super(e), this.options.value = this._constrainedValue(t), this._refreshValue()
            },
            _setOption: function(e, t) {
                "max" === e && (t = Math.max(this.min, t)), this._super(e, t)
            },
            _percentage: function() {
                return this.indeterminate ? 100 : 100 * (this.options.value - this.min) / (this.options.max - this.min)
            },
            _refreshValue: function() {
                var t = this.options.value,
                    i = this._percentage();
                this.valueDiv.toggle(this.indeterminate || t > this.min).toggleClass("ui-corner-right", t === this.options.max).width(i.toFixed(0) + "%"), this.element.toggleClass("ui-progressbar-indeterminate", this.indeterminate), this.indeterminate ? (this.element.removeAttr("aria-valuenow"), this.overlayDiv || (this.overlayDiv = e("<div class='ui-progressbar-overlay'></div>").appendTo(this.valueDiv))) : (this.element.attr({
                    "aria-valuemax": this.options.max,
                    "aria-valuenow": t
                }), this.overlayDiv && (this.overlayDiv.remove(), this.overlayDiv = null)), this.oldValue !== t && (this.oldValue = t, this._trigger("change")), t === this.options.max && this._trigger("complete")
            }
        })
    }(jQuery),
    function(e) {
        var t = 5;
        e.widget("ui.slider", e.ui.mouse, {
            version: "1.10.3",
            widgetEventPrefix: "slide",
            options: {
                animate: !1,
                distance: 0,
                max: 100,
                min: 0,
                orientation: "horizontal",
                range: !1,
                step: 1,
                value: 0,
                values: null,
                change: null,
                slide: null,
                start: null,
                stop: null
            },
            _create: function() {
                this._keySliding = !1, this._mouseSliding = !1, this._animateOff = !0, this._handleIndex = null, this._detectOrientation(), this._mouseInit(), this.element.addClass("ui-slider ui-slider-" + this.orientation + " ui-widget ui-widget-content ui-corner-all"), this._refresh(), this._setOption("disabled", this.options.disabled), this._animateOff = !1
            },
            _refresh: function() {
                this._createRange(), this._createHandles(), this._setupEvents(), this._refreshValue()
            },
            _createHandles: function() {
                var t, i, s = this.options,
                    a = this.element.find(".ui-slider-handle").addClass("ui-state-default ui-corner-all"),
                    n = "<a class='ui-slider-handle ui-state-default ui-corner-all' href='#'></a>",
                    r = [];
                for (i = s.values && s.values.length || 1, a.length > i && (a.slice(i).remove(), a = a.slice(0, i)), t = a.length; i > t; t++) r.push(n);
                this.handles = a.add(e(r.join("")).appendTo(this.element)), this.handle = this.handles.eq(0), this.handles.each(function(t) {
                    e(this).data("ui-slider-handle-index", t)
                })
            },
            _createRange: function() {
                var t = this.options,
                    i = "";
                t.range ? (t.range === !0 && (t.values ? t.values.length && 2 !== t.values.length ? t.values = [t.values[0], t.values[0]] : e.isArray(t.values) && (t.values = t.values.slice(0)) : t.values = [this._valueMin(), this._valueMin()]), this.range && this.range.length ? this.range.removeClass("ui-slider-range-min ui-slider-range-max").css({
                    left: "",
                    bottom: ""
                }) : (this.range = e("<div></div>").appendTo(this.element), i = "ui-slider-range ui-widget-header ui-corner-all"), this.range.addClass(i + ("min" === t.range || "max" === t.range ? " ui-slider-range-" + t.range : ""))) : this.range = e([])
            },
            _setupEvents: function() {
                var e = this.handles.add(this.range).filter("a");
                this._off(e), this._on(e, this._handleEvents), this._hoverable(e), this._focusable(e)
            },
            _destroy: function() {
                this.handles.remove(), this.range.remove(), this.element.removeClass("ui-slider ui-slider-horizontal ui-slider-vertical ui-widget ui-widget-content ui-corner-all"), this._mouseDestroy()
            },
            _mouseCapture: function(t) {
                var i, s, a, n, r, o, h, l, u = this,
                    c = this.options;
                return c.disabled ? !1 : (this.elementSize = {
                    width: this.element.outerWidth(),
                    height: this.element.outerHeight()
                }, this.elementOffset = this.element.offset(), i = {
                    x: t.pageX,
                    y: t.pageY
                }, s = this._normValueFromMouse(i), a = this._valueMax() - this._valueMin() + 1, this.handles.each(function(t) {
                    var i = Math.abs(s - u.values(t));
                    (a > i || a === i && (t === u._lastChangedValue || u.values(t) === c.min)) && (a = i, n = e(this), r = t)
                }), o = this._start(t, r), o === !1 ? !1 : (this._mouseSliding = !0, this._handleIndex = r, n.addClass("ui-state-active").focus(), h = n.offset(), l = !e(t.target).parents().addBack().is(".ui-slider-handle"), this._clickOffset = l ? {
                    left: 0,
                    top: 0
                } : {
                    left: t.pageX - h.left - n.width() / 2,
                    top: t.pageY - h.top - n.height() / 2 - (parseInt(n.css("borderTopWidth"), 10) || 0) - (parseInt(n.css("borderBottomWidth"), 10) || 0) + (parseInt(n.css("marginTop"), 10) || 0)
                }, this.handles.hasClass("ui-state-hover") || this._slide(t, r, s), this._animateOff = !0, !0))
            },
            _mouseStart: function() {
                return !0
            },
            _mouseDrag: function(e) {
                var t = {
                        x: e.pageX,
                        y: e.pageY
                    },
                    i = this._normValueFromMouse(t);
                return this._slide(e, this._handleIndex, i), !1
            },
            _mouseStop: function(e) {
                return this.handles.removeClass("ui-state-active"), this._mouseSliding = !1, this._stop(e, this._handleIndex), this._change(e, this._handleIndex), this._handleIndex = null, this._clickOffset = null, this._animateOff = !1, !1
            },
            _detectOrientation: function() {
                this.orientation = "vertical" === this.options.orientation ? "vertical" : "horizontal"
            },
            _normValueFromMouse: function(e) {
                var t, i, s, a, n;
                return "horizontal" === this.orientation ? (t = this.elementSize.width, i = e.x - this.elementOffset.left - (this._clickOffset ? this._clickOffset.left : 0)) : (t = this.elementSize.height, i = e.y - this.elementOffset.top - (this._clickOffset ? this._clickOffset.top : 0)), s = i / t, s > 1 && (s = 1), 0 > s && (s = 0), "vertical" === this.orientation && (s = 1 - s), a = this._valueMax() - this._valueMin(), n = this._valueMin() + s * a, this._trimAlignValue(n)
            },
            _start: function(e, t) {
                var i = {
                    handle: this.handles[t],
                    value: this.value()
                };
                return this.options.values && this.options.values.length && (i.value = this.values(t), i.values = this.values()), this._trigger("start", e, i)
            },
            _slide: function(e, t, i) {
                var s, a, n;
                this.options.values && this.options.values.length ? (s = this.values(t ? 0 : 1), 2 === this.options.values.length && this.options.range === !0 && (0 === t && i > s || 1 === t && s > i) && (i = s), i !== this.values(t) && (a = this.values(), a[t] = i, n = this._trigger("slide", e, {
                    handle: this.handles[t],
                    value: i,
                    values: a
                }), s = this.values(t ? 0 : 1), n !== !1 && this.values(t, i, !0))) : i !== this.value() && (n = this._trigger("slide", e, {
                    handle: this.handles[t],
                    value: i
                }), n !== !1 && this.value(i))
            },
            _stop: function(e, t) {
                var i = {
                    handle: this.handles[t],
                    value: this.value()
                };
                this.options.values && this.options.values.length && (i.value = this.values(t), i.values = this.values()), this._trigger("stop", e, i)
            },
            _change: function(e, t) {
                if (!this._keySliding && !this._mouseSliding) {
                    var i = {
                        handle: this.handles[t],
                        value: this.value()
                    };
                    this.options.values && this.options.values.length && (i.value = this.values(t), i.values = this.values()), this._lastChangedValue = t, this._trigger("change", e, i)
                }
            },
            value: function(e) {
                return arguments.length ? (this.options.value = this._trimAlignValue(e), this._refreshValue(), void this._change(null, 0)) : this._value()
            },
            values: function(t, i) {
                var s, a, n;
                if (arguments.length > 1) return this.options.values[t] = this._trimAlignValue(i), this._refreshValue(), void this._change(null, t);
                if (!arguments.length) return this._values();
                if (!e.isArray(arguments[0])) return this.options.values && this.options.values.length ? this._values(t) : this.value();
                for (s = this.options.values, a = arguments[0], n = 0; s.length > n; n += 1) s[n] = this._trimAlignValue(a[n]), this._change(null, n);
                this._refreshValue()
            },
            _setOption: function(t, i) {
                var s, a = 0;
                switch ("range" === t && this.options.range === !0 && ("min" === i ? (this.options.value = this._values(0), this.options.values = null) : "max" === i && (this.options.value = this._values(this.options.values.length - 1), this.options.values = null)), e.isArray(this.options.values) && (a = this.options.values.length), e.Widget.prototype._setOption.apply(this, arguments), t) {
                    case "orientation":
                        this._detectOrientation(), this.element.removeClass("ui-slider-horizontal ui-slider-vertical").addClass("ui-slider-" + this.orientation), this._refreshValue();
                        break;
                    case "value":
                        this._animateOff = !0, this._refreshValue(), this._change(null, 0), this._animateOff = !1;
                        break;
                    case "values":
                        for (this._animateOff = !0, this._refreshValue(), s = 0; a > s; s += 1) this._change(null, s);
                        this._animateOff = !1;
                        break;
                    case "min":
                    case "max":
                        this._animateOff = !0, this._refreshValue(), this._animateOff = !1;
                        break;
                    case "range":
                        this._animateOff = !0, this._refresh(), this._animateOff = !1
                }
            },
            _value: function() {
                var e = this.options.value;
                return e = this._trimAlignValue(e)
            },
            _values: function(e) {
                var t, i, s;
                if (arguments.length) return t = this.options.values[e], t = this._trimAlignValue(t);
                if (this.options.values && this.options.values.length) {
                    for (i = this.options.values.slice(), s = 0; i.length > s; s += 1) i[s] = this._trimAlignValue(i[s]);
                    return i
                }
                return []
            },
            _trimAlignValue: function(e) {
                if (this._valueMin() >= e) return this._valueMin();
                if (e >= this._valueMax()) return this._valueMax();
                var t = this.options.step > 0 ? this.options.step : 1,
                    i = (e - this._valueMin()) % t,
                    s = e - i;
                return 2 * Math.abs(i) >= t && (s += i > 0 ? t : -t), parseFloat(s.toFixed(5))
            },
            _valueMin: function() {
                return this.options.min
            },
            _valueMax: function() {
                return this.options.max
            },
            _refreshValue: function() {
                var t, i, s, a, n, r = this.options.range,
                    o = this.options,
                    h = this,
                    l = this._animateOff ? !1 : o.animate,
                    u = {};
                this.options.values && this.options.values.length ? this.handles.each(function(s) {
                    i = 100 * ((h.values(s) - h._valueMin()) / (h._valueMax() - h._valueMin())), u["horizontal" === h.orientation ? "left" : "bottom"] = i + "%", e(this).stop(1, 1)[l ? "animate" : "css"](u, o.animate), h.options.range === !0 && ("horizontal" === h.orientation ? (0 === s && h.range.stop(1, 1)[l ? "animate" : "css"]({
                        left: i + "%"
                    }, o.animate), 1 === s && h.range[l ? "animate" : "css"]({
                        width: i - t + "%"
                    }, {
                        queue: !1,
                        duration: o.animate
                    })) : (0 === s && h.range.stop(1, 1)[l ? "animate" : "css"]({
                        bottom: i + "%"
                    }, o.animate), 1 === s && h.range[l ? "animate" : "css"]({
                        height: i - t + "%"
                    }, {
                        queue: !1,
                        duration: o.animate
                    }))), t = i
                }) : (s = this.value(), a = this._valueMin(), n = this._valueMax(), i = n !== a ? 100 * ((s - a) / (n - a)) : 0, u["horizontal" === this.orientation ? "left" : "bottom"] = i + "%", this.handle.stop(1, 1)[l ? "animate" : "css"](u, o.animate), "min" === r && "horizontal" === this.orientation && this.range.stop(1, 1)[l ? "animate" : "css"]({
                    width: i + "%"
                }, o.animate), "max" === r && "horizontal" === this.orientation && this.range[l ? "animate" : "css"]({
                    width: 100 - i + "%"
                }, {
                    queue: !1,
                    duration: o.animate
                }), "min" === r && "vertical" === this.orientation && this.range.stop(1, 1)[l ? "animate" : "css"]({
                    height: i + "%"
                }, o.animate), "max" === r && "vertical" === this.orientation && this.range[l ? "animate" : "css"]({
                    height: 100 - i + "%"
                }, {
                    queue: !1,
                    duration: o.animate
                }))
            },
            _handleEvents: {
                keydown: function(i) {
                    var s, a, n, r, o = e(i.target).data("ui-slider-handle-index");
                    switch (i.keyCode) {
                        case e.ui.keyCode.HOME:
                        case e.ui.keyCode.END:
                        case e.ui.keyCode.PAGE_UP:
                        case e.ui.keyCode.PAGE_DOWN:
                        case e.ui.keyCode.UP:
                        case e.ui.keyCode.RIGHT:
                        case e.ui.keyCode.DOWN:
                        case e.ui.keyCode.LEFT:
                            if (i.preventDefault(), !this._keySliding && (this._keySliding = !0, e(i.target).addClass("ui-state-active"), s = this._start(i, o), s === !1)) return
                    }
                    switch (r = this.options.step, a = n = this.options.values && this.options.values.length ? this.values(o) : this.value(), i.keyCode) {
                        case e.ui.keyCode.HOME:
                            n = this._valueMin();
                            break;
                        case e.ui.keyCode.END:
                            n = this._valueMax();
                            break;
                        case e.ui.keyCode.PAGE_UP:
                            n = this._trimAlignValue(a + (this._valueMax() - this._valueMin()) / t);
                            break;
                        case e.ui.keyCode.PAGE_DOWN:
                            n = this._trimAlignValue(a - (this._valueMax() - this._valueMin()) / t);
                            break;
                        case e.ui.keyCode.UP:
                        case e.ui.keyCode.RIGHT:
                            if (a === this._valueMax()) return;
                            n = this._trimAlignValue(a + r);
                            break;
                        case e.ui.keyCode.DOWN:
                        case e.ui.keyCode.LEFT:
                            if (a === this._valueMin()) return;
                            n = this._trimAlignValue(a - r)
                    }
                    this._slide(i, o, n)
                },
                click: function(e) {
                    e.preventDefault()
                },
                keyup: function(t) {
                    var i = e(t.target).data("ui-slider-handle-index");
                    this._keySliding && (this._keySliding = !1, this._stop(t, i), this._change(t, i), e(t.target).removeClass("ui-state-active"))
                }
            }
        })
    }(jQuery),
    function(e) {
        function t(e) {
            return function() {
                var t = this.element.val();
                e.apply(this, arguments), this._refresh(), t !== this.element.val() && this._trigger("change")
            }
        }
        e.widget("ui.spinner", {
            version: "1.10.3",
            defaultElement: "<input>",
            widgetEventPrefix: "spin",
            options: {
                culture: null,
                icons: {
                    down: "ui-icon-triangle-1-s",
                    up: "ui-icon-triangle-1-n"
                },
                incremental: !0,
                max: null,
                min: null,
                numberFormat: null,
                page: 10,
                step: 1,
                change: null,
                spin: null,
                start: null,
                stop: null
            },
            _create: function() {
                this._setOption("max", this.options.max), this._setOption("min", this.options.min), this._setOption("step", this.options.step), this._value(this.element.val(), !0), this._draw(), this._on(this._events), this._refresh(), this._on(this.window, {
                    beforeunload: function() {
                        this.element.removeAttr("autocomplete")
                    }
                })
            },
            _getCreateOptions: function() {
                var t = {},
                    i = this.element;
                return e.each(["min", "max", "step"], function(e, s) {
                    var a = i.attr(s);
                    void 0 !== a && a.length && (t[s] = a)
                }), t
            },
            _events: {
                keydown: function(e) {
                    this._start(e) && this._keydown(e) && e.preventDefault()
                },
                keyup: "_stop",
                focus: function() {
                    this.previous = this.element.val()
                },
                blur: function(e) {
                    return this.cancelBlur ? void delete this.cancelBlur : (this._stop(), this._refresh(), void(this.previous !== this.element.val() && this._trigger("change", e)))
                },
                mousewheel: function(e, t) {
                    if (t) {
                        if (!this.spinning && !this._start(e)) return !1;
                        this._spin((t > 0 ? 1 : -1) * this.options.step, e), clearTimeout(this.mousewheelTimer), this.mousewheelTimer = this._delay(function() {
                            this.spinning && this._stop(e)
                        }, 100), e.preventDefault()
                    }
                },
                "mousedown .ui-spinner-button": function(t) {
                    function i() {
                        var e = this.element[0] === this.document[0].activeElement;
                        e || (this.element.focus(), this.previous = s, this._delay(function() {
                            this.previous = s
                        }))
                    }
                    var s;
                    s = this.element[0] === this.document[0].activeElement ? this.previous : this.element.val(), t.preventDefault(), i.call(this), this.cancelBlur = !0, this._delay(function() {
                        delete this.cancelBlur, i.call(this)
                    }), this._start(t) !== !1 && this._repeat(null, e(t.currentTarget).hasClass("ui-spinner-up") ? 1 : -1, t)
                },
                "mouseup .ui-spinner-button": "_stop",
                "mouseenter .ui-spinner-button": function(t) {
                    return e(t.currentTarget).hasClass("ui-state-active") ? this._start(t) === !1 ? !1 : void this._repeat(null, e(t.currentTarget).hasClass("ui-spinner-up") ? 1 : -1, t) : void 0
                },
                "mouseleave .ui-spinner-button": "_stop"
            },
            _draw: function() {
                var e = this.uiSpinner = this.element.addClass("ui-spinner-input").attr("autocomplete", "off").wrap(this._uiSpinnerHtml()).parent().append(this._buttonHtml());
                this.element.attr("role", "spinbutton"), this.buttons = e.find(".ui-spinner-button").attr("tabIndex", -1).button().removeClass("ui-corner-all"), this.buttons.height() > Math.ceil(.5 * e.height()) && e.height() > 0 && e.height(e.height()), this.options.disabled && this.disable()
            },
            _keydown: function(t) {
                var i = this.options,
                    s = e.ui.keyCode;
                switch (t.keyCode) {
                    case s.UP:
                        return this._repeat(null, 1, t), !0;
                    case s.DOWN:
                        return this._repeat(null, -1, t), !0;
                    case s.PAGE_UP:
                        return this._repeat(null, i.page, t), !0;
                    case s.PAGE_DOWN:
                        return this._repeat(null, -i.page, t), !0
                }
                return !1
            },
            _uiSpinnerHtml: function() {
                return "<span class='ui-spinner ui-widget ui-widget-content ui-corner-all'></span>"
            },
            _buttonHtml: function() {
                return "<a class='ui-spinner-button ui-spinner-up ui-corner-tr'><span class='ui-icon " + this.options.icons.up + "'>&#9650;</span></a><a class='ui-spinner-button ui-spinner-down ui-corner-br'><span class='ui-icon " + this.options.icons.down + "'>&#9660;</span></a>"
            },
            _start: function(e) {
                return this.spinning || this._trigger("start", e) !== !1 ? (this.counter || (this.counter = 1), this.spinning = !0, !0) : !1
            },
            _repeat: function(e, t, i) {
                e = e || 500, clearTimeout(this.timer), this.timer = this._delay(function() {
                    this._repeat(40, t, i)
                }, e), this._spin(t * this.options.step, i)
            },
            _spin: function(e, t) {
                var i = this.value() || 0;
                this.counter || (this.counter = 1), i = this._adjustValue(i + e * this._increment(this.counter)), this.spinning && this._trigger("spin", t, {
                    value: i
                }) === !1 || (this._value(i), this.counter++)
            },
            _increment: function(t) {
                var i = this.options.incremental;
                return i ? e.isFunction(i) ? i(t) : Math.floor(t * t * t / 5e4 - t * t / 500 + 17 * t / 200 + 1) : 1
            },
            _precision: function() {
                var e = this._precisionOf(this.options.step);
                return null !== this.options.min && (e = Math.max(e, this._precisionOf(this.options.min))), e
            },
            _precisionOf: function(e) {
                var t = "" + e,
                    i = t.indexOf(".");
                return -1 === i ? 0 : t.length - i - 1
            },
            _adjustValue: function(e) {
                var t, i, s = this.options;
                return t = null !== s.min ? s.min : 0, i = e - t, i = Math.round(i / s.step) * s.step, e = t + i, e = parseFloat(e.toFixed(this._precision())), null !== s.max && e > s.max ? s.max : null !== s.min && s.min > e ? s.min : e
            },
            _stop: function(e) {
                this.spinning && (clearTimeout(this.timer), clearTimeout(this.mousewheelTimer), this.counter = 0, this.spinning = !1, this._trigger("stop", e))
            },
            _setOption: function(e, t) {
                if ("culture" === e || "numberFormat" === e) {
                    var i = this._parse(this.element.val());
                    return this.options[e] = t, void this.element.val(this._format(i))
                }("max" === e || "min" === e || "step" === e) && "string" == typeof t && (t = this._parse(t)), "icons" === e && (this.buttons.first().find(".ui-icon").removeClass(this.options.icons.up).addClass(t.up), this.buttons.last().find(".ui-icon").removeClass(this.options.icons.down).addClass(t.down)), this._super(e, t), "disabled" === e && (t ? (this.element.prop("disabled", !0), this.buttons.button("disable")) : (this.element.prop("disabled", !1), this.buttons.button("enable")))
            },
            _setOptions: t(function(e) {
                this._super(e), this._value(this.element.val())
            }),
            _parse: function(e) {
                return "string" == typeof e && "" !== e && (e = window.Globalize && this.options.numberFormat ? Globalize.parseFloat(e, 10, this.options.culture) : +e), "" === e || isNaN(e) ? null : e
            },
            _format: function(e) {
                return "" === e ? "" : window.Globalize && this.options.numberFormat ? Globalize.format(e, this.options.numberFormat, this.options.culture) : e
            },
            _refresh: function() {
                this.element.attr({
                    "aria-valuemin": this.options.min,
                    "aria-valuemax": this.options.max,
                    "aria-valuenow": this._parse(this.element.val())
                })
            },
            _value: function(e, t) {
                var i;
                "" !== e && (i = this._parse(e), null !== i && (t || (i = this._adjustValue(i)), e = this._format(i))), this.element.val(e), this._refresh()
            },
            _destroy: function() {
                this.element.removeClass("ui-spinner-input").prop("disabled", !1).removeAttr("autocomplete").removeAttr("role").removeAttr("aria-valuemin").removeAttr("aria-valuemax").removeAttr("aria-valuenow"), this.uiSpinner.replaceWith(this.element)
            },
            stepUp: t(function(e) {
                this._stepUp(e)
            }),
            _stepUp: function(e) {
                this._start() && (this._spin((e || 1) * this.options.step), this._stop())
            },
            stepDown: t(function(e) {
                this._stepDown(e)
            }),
            _stepDown: function(e) {
                this._start() && (this._spin((e || 1) * -this.options.step), this._stop())
            },
            pageUp: t(function(e) {
                this._stepUp((e || 1) * this.options.page)
            }),
            pageDown: t(function(e) {
                this._stepDown((e || 1) * this.options.page)
            }),
            value: function(e) {
                return arguments.length ? void t(this._value).call(this, e) : this._parse(this.element.val())
            },
            widget: function() {
                return this.uiSpinner
            }
        })
    }(jQuery),
    function(e, t) {
        function i() {
            return ++a
        }

        function s(e) {
            return e.hash.length > 1 && decodeURIComponent(e.href.replace(n, "")) === decodeURIComponent(location.href.replace(n, ""))
        }
        var a = 0,
            n = /#.*$/;
        e.widget("ui.tabs", {
            version: "1.10.3",
            delay: 300,
            options: {
                active: null,
                collapsible: !1,
                event: "click",
                heightStyle: "content",
                hide: null,
                show: null,
                activate: null,
                beforeActivate: null,
                beforeLoad: null,
                load: null
            },
            _create: function() {
                var t = this,
                    i = this.options;
                this.running = !1, this.element.addClass("ui-tabs ui-widget ui-widget-content ui-corner-all").toggleClass("ui-tabs-collapsible", i.collapsible).delegate(".ui-tabs-nav > li", "mousedown" + this.eventNamespace, function(t) {
                    e(this).is(".ui-state-disabled") && t.preventDefault()
                }).delegate(".ui-tabs-anchor", "focus" + this.eventNamespace, function() {
                    e(this).closest("li").is(".ui-state-disabled") && this.blur()
                }), this._processTabs(), i.active = this._initialActive(), e.isArray(i.disabled) && (i.disabled = e.unique(i.disabled.concat(e.map(this.tabs.filter(".ui-state-disabled"), function(e) {
                    return t.tabs.index(e)
                }))).sort()), this.active = this.options.active !== !1 && this.anchors.length ? this._findActive(i.active) : e(), this._refresh(), this.active.length && this.load(i.active)
            },
            _initialActive: function() {
                var i = this.options.active,
                    s = this.options.collapsible,
                    a = location.hash.substring(1);
                return null === i && (a && this.tabs.each(function(s, n) {
                    return e(n).attr("aria-controls") === a ? (i = s, !1) : t
                }), null === i && (i = this.tabs.index(this.tabs.filter(".ui-tabs-active"))), (null === i || -1 === i) && (i = this.tabs.length ? 0 : !1)), i !== !1 && (i = this.tabs.index(this.tabs.eq(i)), -1 === i && (i = s ? !1 : 0)), !s && i === !1 && this.anchors.length && (i = 0), i
            },
            _getCreateEventData: function() {
                return {
                    tab: this.active,
                    panel: this.active.length ? this._getPanelForTab(this.active) : e()
                }
            },
            _tabKeydown: function(i) {
                var s = e(this.document[0].activeElement).closest("li"),
                    a = this.tabs.index(s),
                    n = !0;
                if (!this._handlePageNav(i)) {
                    switch (i.keyCode) {
                        case e.ui.keyCode.RIGHT:
                        case e.ui.keyCode.DOWN:
                            a++;
                            break;
                        case e.ui.keyCode.UP:
                        case e.ui.keyCode.LEFT:
                            n = !1, a--;
                            break;
                        case e.ui.keyCode.END:
                            a = this.anchors.length - 1;
                            break;
                        case e.ui.keyCode.HOME:
                            a = 0;
                            break;
                        case e.ui.keyCode.SPACE:
                            return i.preventDefault(), clearTimeout(this.activating), this._activate(a), t;
                        case e.ui.keyCode.ENTER:
                            return i.preventDefault(), clearTimeout(this.activating), this._activate(a === this.options.active ? !1 : a), t;
                        default:
                            return
                    }
                    i.preventDefault(), clearTimeout(this.activating), a = this._focusNextTab(a, n), i.ctrlKey || (s.attr("aria-selected", "false"), this.tabs.eq(a).attr("aria-selected", "true"), this.activating = this._delay(function() {
                        this.option("active", a)
                    }, this.delay))
                }
            },
            _panelKeydown: function(t) {
                this._handlePageNav(t) || t.ctrlKey && t.keyCode === e.ui.keyCode.UP && (t.preventDefault(), this.active.focus())
            },
            _handlePageNav: function(i) {
                return i.altKey && i.keyCode === e.ui.keyCode.PAGE_UP ? (this._activate(this._focusNextTab(this.options.active - 1, !1)), !0) : i.altKey && i.keyCode === e.ui.keyCode.PAGE_DOWN ? (this._activate(this._focusNextTab(this.options.active + 1, !0)), !0) : t
            },
            _findNextTab: function(t, i) {
                function s() {
                    return t > a && (t = 0), 0 > t && (t = a), t
                }
                for (var a = this.tabs.length - 1; - 1 !== e.inArray(s(), this.options.disabled);) t = i ? t + 1 : t - 1;
                return t
            },
            _focusNextTab: function(e, t) {
                return e = this._findNextTab(e, t), this.tabs.eq(e).focus(), e
            },
            _setOption: function(e, i) {
                return "active" === e ? (this._activate(i), t) : "disabled" === e ? (this._setupDisabled(i), t) : (this._super(e, i), "collapsible" === e && (this.element.toggleClass("ui-tabs-collapsible", i), i || this.options.active !== !1 || this._activate(0)), "event" === e && this._setupEvents(i), "heightStyle" === e && this._setupHeightStyle(i), t)
            },
            _tabId: function(e) {
                return e.attr("aria-controls") || "ui-tabs-" + i()
            },
            _sanitizeSelector: function(e) {
                return e ? e.replace(/[!"$%&'()*+,.\/:;<=>?@\[\]\^`{|}~]/g, "\\$&") : ""
            },
            refresh: function() {
                var t = this.options,
                    i = this.tablist.children(":has(a[href])");
                t.disabled = e.map(i.filter(".ui-state-disabled"), function(e) {
                    return i.index(e)
                }), this._processTabs(), t.active !== !1 && this.anchors.length ? this.active.length && !e.contains(this.tablist[0], this.active[0]) ? this.tabs.length === t.disabled.length ? (t.active = !1, this.active = e()) : this._activate(this._findNextTab(Math.max(0, t.active - 1), !1)) : t.active = this.tabs.index(this.active) : (t.active = !1, this.active = e()), this._refresh()
            },
            _refresh: function() {
                this._setupDisabled(this.options.disabled), this._setupEvents(this.options.event), this._setupHeightStyle(this.options.heightStyle), this.tabs.not(this.active).attr({
                    "aria-selected": "false",
                    tabIndex: -1
                }), this.panels.not(this._getPanelForTab(this.active)).hide().attr({
                    "aria-expanded": "false",
                    "aria-hidden": "true"
                }), this.active.length ? (this.active.addClass("ui-tabs-active ui-state-active").attr({
                    "aria-selected": "true",
                    tabIndex: 0
                }), this._getPanelForTab(this.active).show().attr({
                    "aria-expanded": "true",
                    "aria-hidden": "false"
                })) : this.tabs.eq(0).attr("tabIndex", 0)
            },
            _processTabs: function() {
                var t = this;
                this.tablist = this._getList().addClass("ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all").attr("role", "tablist"), this.tabs = this.tablist.find("> li:has(a[href])").addClass("ui-state-default ui-corner-top").attr({
                    role: "tab",
                    tabIndex: -1
                }), this.anchors = this.tabs.map(function() {
                    return e("a", this)[0]
                }).addClass("ui-tabs-anchor").attr({
                    role: "presentation",
                    tabIndex: -1
                }), this.panels = e(), this.anchors.each(function(i, a) {
                    var n, r, o, h = e(a).uniqueId().attr("id"),
                        l = e(a).closest("li"),
                        u = l.attr("aria-controls");
                    s(a) ? (n = a.hash, r = t.element.find(t._sanitizeSelector(n))) : (o = t._tabId(l), n = "#" + o, r = t.element.find(n), r.length || (r = t._createPanel(o), r.insertAfter(t.panels[i - 1] || t.tablist)), r.attr("aria-live", "polite")), r.length && (t.panels = t.panels.add(r)), u && l.data("ui-tabs-aria-controls", u), l.attr({
                        "aria-controls": n.substring(1),
                        "aria-labelledby": h
                    }), r.attr("aria-labelledby", h)
                }), this.panels.addClass("ui-tabs-panel ui-widget-content ui-corner-bottom").attr("role", "tabpanel")
            },
            _getList: function() {
                return this.element.find("ol,ul").eq(0)
            },
            _createPanel: function(t) {
                return e("<div>").attr("id", t).addClass("ui-tabs-panel ui-widget-content ui-corner-bottom").data("ui-tabs-destroy", !0)
            },
            _setupDisabled: function(t) {
                e.isArray(t) && (t.length ? t.length === this.anchors.length && (t = !0) : t = !1);
                for (var i, s = 0; i = this.tabs[s]; s++) t === !0 || -1 !== e.inArray(s, t) ? e(i).addClass("ui-state-disabled").attr("aria-disabled", "true") : e(i).removeClass("ui-state-disabled").removeAttr("aria-disabled");
                this.options.disabled = t
            },
            _setupEvents: function(t) {
                var i = {
                    click: function(e) {
                        e.preventDefault()
                    }
                };
                t && e.each(t.split(" "), function(e, t) {
                    i[t] = "_eventHandler"
                }), this._off(this.anchors.add(this.tabs).add(this.panels)), this._on(this.anchors, i), this._on(this.tabs, {
                    keydown: "_tabKeydown"
                }), this._on(this.panels, {
                    keydown: "_panelKeydown"
                }), this._focusable(this.tabs), this._hoverable(this.tabs)
            },
            _setupHeightStyle: function(t) {
                var i, s = this.element.parent();
                "fill" === t ? (i = s.height(), i -= this.element.outerHeight() - this.element.height(), this.element.siblings(":visible").each(function() {
                    var t = e(this),
                        s = t.css("position");
                    "absolute" !== s && "fixed" !== s && (i -= t.outerHeight(!0))
                }), this.element.children().not(this.panels).each(function() {
                    i -= e(this).outerHeight(!0)
                }), this.panels.each(function() {
                    e(this).height(Math.max(0, i - e(this).innerHeight() + e(this).height()))
                }).css("overflow", "auto")) : "auto" === t && (i = 0, this.panels.each(function() {
                    i = Math.max(i, e(this).height("").height())
                }).height(i))
            },
            _eventHandler: function(t) {
                var i = this.options,
                    s = this.active,
                    a = e(t.currentTarget),
                    n = a.closest("li"),
                    r = n[0] === s[0],
                    o = r && i.collapsible,
                    h = o ? e() : this._getPanelForTab(n),
                    l = s.length ? this._getPanelForTab(s) : e(),
                    u = {
                        oldTab: s,
                        oldPanel: l,
                        newTab: o ? e() : n,
                        newPanel: h
                    };
                t.preventDefault(), n.hasClass("ui-state-disabled") || n.hasClass("ui-tabs-loading") || this.running || r && !i.collapsible || this._trigger("beforeActivate", t, u) === !1 || (i.active = o ? !1 : this.tabs.index(n), this.active = r ? e() : n, this.xhr && this.xhr.abort(), l.length || h.length || e.error("jQuery UI Tabs: Mismatching fragment identifier."), h.length && this.load(this.tabs.index(n), t), this._toggle(t, u))
            },
            _toggle: function(t, i) {
                function s() {
                    n.running = !1, n._trigger("activate", t, i)
                }

                function a() {
                    i.newTab.closest("li").addClass("ui-tabs-active ui-state-active"), r.length && n.options.show ? n._show(r, n.options.show, s) : (r.show(), s())
                }
                var n = this,
                    r = i.newPanel,
                    o = i.oldPanel;
                this.running = !0, o.length && this.options.hide ? this._hide(o, this.options.hide, function() {
                    i.oldTab.closest("li").removeClass("ui-tabs-active ui-state-active"), a()
                }) : (i.oldTab.closest("li").removeClass("ui-tabs-active ui-state-active"), o.hide(), a()), o.attr({
                    "aria-expanded": "false",
                    "aria-hidden": "true"
                }), i.oldTab.attr("aria-selected", "false"), r.length && o.length ? i.oldTab.attr("tabIndex", -1) : r.length && this.tabs.filter(function() {
                    return 0 === e(this).attr("tabIndex")
                }).attr("tabIndex", -1), r.attr({
                    "aria-expanded": "true",
                    "aria-hidden": "false"
                }), i.newTab.attr({
                    "aria-selected": "true",
                    tabIndex: 0
                })
            },
            _activate: function(t) {
                var i, s = this._findActive(t);
                s[0] !== this.active[0] && (s.length || (s = this.active), i = s.find(".ui-tabs-anchor")[0], this._eventHandler({
                    target: i,
                    currentTarget: i,
                    preventDefault: e.noop
                }))
            },
            _findActive: function(t) {
                return t === !1 ? e() : this.tabs.eq(t)
            },
            _getIndex: function(e) {
                return "string" == typeof e && (e = this.anchors.index(this.anchors.filter("[href$='" + e + "']"))), e
            },
            _destroy: function() {
                this.xhr && this.xhr.abort(), this.element.removeClass("ui-tabs ui-widget ui-widget-content ui-corner-all ui-tabs-collapsible"), this.tablist.removeClass("ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all").removeAttr("role"), this.anchors.removeClass("ui-tabs-anchor").removeAttr("role").removeAttr("tabIndex").removeUniqueId(), this.tabs.add(this.panels).each(function() {
                    e.data(this, "ui-tabs-destroy") ? e(this).remove() : e(this).removeClass("ui-state-default ui-state-active ui-state-disabled ui-corner-top ui-corner-bottom ui-widget-content ui-tabs-active ui-tabs-panel").removeAttr("tabIndex").removeAttr("aria-live").removeAttr("aria-busy").removeAttr("aria-selected").removeAttr("aria-labelledby").removeAttr("aria-hidden").removeAttr("aria-expanded").removeAttr("role")
                }), this.tabs.each(function() {
                    var t = e(this),
                        i = t.data("ui-tabs-aria-controls");
                    i ? t.attr("aria-controls", i).removeData("ui-tabs-aria-controls") : t.removeAttr("aria-controls")
                }), this.panels.show(), "content" !== this.options.heightStyle && this.panels.css("height", "")
            },
            enable: function(i) {
                var s = this.options.disabled;
                s !== !1 && (i === t ? s = !1 : (i = this._getIndex(i), s = e.isArray(s) ? e.map(s, function(e) {
                    return e !== i ? e : null
                }) : e.map(this.tabs, function(e, t) {
                    return t !== i ? t : null
                })), this._setupDisabled(s))
            },
            disable: function(i) {
                var s = this.options.disabled;
                if (s !== !0) {
                    if (i === t) s = !0;
                    else {
                        if (i = this._getIndex(i), -1 !== e.inArray(i, s)) return;
                        s = e.isArray(s) ? e.merge([i], s).sort() : [i]
                    }
                    this._setupDisabled(s)
                }
            },
            load: function(t, i) {
                t = this._getIndex(t);
                var a = this,
                    n = this.tabs.eq(t),
                    r = n.find(".ui-tabs-anchor"),
                    o = this._getPanelForTab(n),
                    h = {
                        tab: n,
                        panel: o
                    };
                s(r[0]) || (this.xhr = e.ajax(this._ajaxSettings(r, i, h)), this.xhr && "canceled" !== this.xhr.statusText && (n.addClass("ui-tabs-loading"), o.attr("aria-busy", "true"), this.xhr.success(function(e) {
                    setTimeout(function() {
                        o.html(e), a._trigger("load", i, h)
                    }, 1)
                }).complete(function(e, t) {
                    setTimeout(function() {
                        "abort" === t && a.panels.stop(!1, !0), n.removeClass("ui-tabs-loading"), o.removeAttr("aria-busy"), e === a.xhr && delete a.xhr
                    }, 1)
                })))
            },
            _ajaxSettings: function(t, i, s) {
                var a = this;
                return {
                    url: t.attr("href"),
                    beforeSend: function(t, n) {
                        return a._trigger("beforeLoad", i, e.extend({
                            jqXHR: t,
                            ajaxSettings: n
                        }, s))
                    }
                }
            },
            _getPanelForTab: function(t) {
                var i = e(t).attr("aria-controls");
                return this.element.find(this._sanitizeSelector("#" + i))
            }
        })
    }(jQuery),
    function(e) {
        function t(t, i) {
            var s = (t.attr("aria-describedby") || "").split(/\s+/);
            s.push(i), t.data("ui-tooltip-id", i).attr("aria-describedby", e.trim(s.join(" ")))
        }

        function i(t) {
            var i = t.data("ui-tooltip-id"),
                s = (t.attr("aria-describedby") || "").split(/\s+/),
                a = e.inArray(i, s); - 1 !== a && s.splice(a, 1), t.removeData("ui-tooltip-id"), s = e.trim(s.join(" ")), s ? t.attr("aria-describedby", s) : t.removeAttr("aria-describedby")
        }
        var s = 0;
        e.widget("ui.tooltip", {
            version: "1.10.3",
            options: {
                content: function() {
                    var t = e(this).attr("title") || "";
                    return e("<a>").text(t).html()
                },
                hide: !0,
                items: "[title]:not([disabled])",
                position: {
                    my: "left top+15",
                    at: "left bottom",
                    collision: "flipfit flip"
                },
                show: !0,
                tooltipClass: null,
                track: !1,
                close: null,
                open: null
            },
            _create: function() {
                this._on({
                    mouseover: "open",
                    focusin: "open"
                }), this.tooltips = {}, this.parents = {}, this.options.disabled && this._disable()
            },
            _setOption: function(t, i) {
                var s = this;
                return "disabled" === t ? (this[i ? "_disable" : "_enable"](), void(this.options[t] = i)) : (this._super(t, i), void("content" === t && e.each(this.tooltips, function(e, t) {
                    s._updateContent(t)
                })))
            },
            _disable: function() {
                var t = this;
                e.each(this.tooltips, function(i, s) {
                    var a = e.Event("blur");
                    a.target = a.currentTarget = s[0], t.close(a, !0)
                }), this.element.find(this.options.items).addBack().each(function() {
                    var t = e(this);
                    t.is("[title]") && t.data("ui-tooltip-title", t.attr("title")).attr("title", "")
                })
            },
            _enable: function() {
                this.element.find(this.options.items).addBack().each(function() {
                    var t = e(this);
                    t.data("ui-tooltip-title") && t.attr("title", t.data("ui-tooltip-title"))
                })
            },
            open: function(t) {
                var i = this,
                    s = e(t ? t.target : this.element).closest(this.options.items);
                s.length && !s.data("ui-tooltip-id") && (s.attr("title") && s.data("ui-tooltip-title", s.attr("title")), s.data("ui-tooltip-open", !0), t && "mouseover" === t.type && s.parents().each(function() {
                    var t, s = e(this);
                    s.data("ui-tooltip-open") && (t = e.Event("blur"), t.target = t.currentTarget = this, i.close(t, !0)), s.attr("title") && (s.uniqueId(), i.parents[this.id] = {
                        element: this,
                        title: s.attr("title")
                    }, s.attr("title", ""))
                }), this._updateContent(s, t))
            },
            _updateContent: function(e, t) {
                var i, s = this.options.content,
                    a = this,
                    n = t ? t.type : null;
                return "string" == typeof s ? this._open(t, e, s) : (i = s.call(e[0], function(i) {
                    e.data("ui-tooltip-open") && a._delay(function() {
                        t && (t.type = n), this._open(t, e, i)
                    })
                }), void(i && this._open(t, e, i)))
            },
            _open: function(i, s, a) {
                function n(e) {
                    l.of = e, r.is(":hidden") || r.position(l)
                }
                var r, o, h, l = e.extend({}, this.options.position);
                if (a) {
                    if (r = this._find(s), r.length) return void r.find(".ui-tooltip-content").html(a);
                    s.is("[title]") && (i && "mouseover" === i.type ? s.attr("title", "") : s.removeAttr("title")), r = this._tooltip(s), t(s, r.attr("id")), r.find(".ui-tooltip-content").html(a), this.options.track && i && /^mouse/.test(i.type) ? (this._on(this.document, {
                        mousemove: n
                    }), n(i)) : r.position(e.extend({
                        of: s
                    }, this.options.position)), r.hide(), this._show(r, this.options.show), this.options.show && this.options.show.delay && (h = this.delayedShow = setInterval(function() {
                        r.is(":visible") && (n(l.of), clearInterval(h))
                    }, e.fx.interval)), this._trigger("open", i, {
                        tooltip: r
                    }), o = {
                        keyup: function(t) {
                            if (t.keyCode === e.ui.keyCode.ESCAPE) {
                                var i = e.Event(t);
                                i.currentTarget = s[0], this.close(i, !0)
                            }
                        },
                        remove: function() {
                            this._removeTooltip(r)
                        }
                    }, i && "mouseover" !== i.type || (o.mouseleave = "close"), i && "focusin" !== i.type || (o.focusout = "close"), this._on(!0, s, o)
                }
            },
            close: function(t) {
                var s = this,
                    a = e(t ? t.currentTarget : this.element),
                    n = this._find(a);
                this.closing || (clearInterval(this.delayedShow), a.data("ui-tooltip-title") && a.attr("title", a.data("ui-tooltip-title")), i(a), n.stop(!0), this._hide(n, this.options.hide, function() {
                    s._removeTooltip(e(this))
                }), a.removeData("ui-tooltip-open"), this._off(a, "mouseleave focusout keyup"), a[0] !== this.element[0] && this._off(a, "remove"), this._off(this.document, "mousemove"), t && "mouseleave" === t.type && e.each(this.parents, function(t, i) {
                    e(i.element).attr("title", i.title), delete s.parents[t]
                }), this.closing = !0, this._trigger("close", t, {
                    tooltip: n
                }), this.closing = !1)
            },
            _tooltip: function(t) {
                var i = "ui-tooltip-" + s++,
                    a = e("<div>").attr({
                        id: i,
                        role: "tooltip"
                    }).addClass("ui-tooltip ui-widget ui-corner-all ui-widget-content " + (this.options.tooltipClass || ""));
                return e("<div>").addClass("ui-tooltip-content").appendTo(a), a.appendTo(this.document[0].body), this.tooltips[i] = t, a
            },
            _find: function(t) {
                var i = t.data("ui-tooltip-id");
                return i ? e("#" + i) : e()
            },
            _removeTooltip: function(e) {
                e.remove(), delete this.tooltips[e.attr("id")]
            },
            _destroy: function() {
                var t = this;
                e.each(this.tooltips, function(i, s) {
                    var a = e.Event("blur");
                    a.target = a.currentTarget = s[0], t.close(a, !0), e("#" + i).remove(), s.data("ui-tooltip-title") && (s.attr("title", s.data("ui-tooltip-title")), s.removeData("ui-tooltip-title"))
                })
            }
        })
    }(jQuery),
    function(e, t) {
        var i = "ui-effects-";
        e.effects = {
                effect: {}
            },
            function(e, t) {
                function i(e, t, i) {
                    var s = c[t.type] || {};
                    return null == e ? i || !t.def ? null : t.def : (e = s.floor ? ~~e : parseFloat(e), isNaN(e) ? t.def : s.mod ? (e + s.mod) % s.mod : 0 > e ? 0 : e > s.max ? s.max : e)
                }

                function s(i) {
                    var s = l(),
                        a = s._rgba = [];
                    return i = i.toLowerCase(), f(h, function(e, n) {
                        var r, o = n.re.exec(i),
                            h = o && n.parse(o),
                            l = n.space || "rgba";
                        return h ? (r = s[l](h), s[u[l].cache] = r[u[l].cache], a = s._rgba = r._rgba, !1) : t
                    }), a.length ? ("0,0,0,0" === a.join() && e.extend(a, n.transparent), s) : n[i]
                }

                function a(e, t, i) {
                    return i = (i + 1) % 1, 1 > 6 * i ? e + 6 * (t - e) * i : 1 > 2 * i ? t : 2 > 3 * i ? e + 6 * (t - e) * (2 / 3 - i) : e
                }
                var n, r = "backgroundColor borderBottomColor borderLeftColor borderRightColor borderTopColor color columnRuleColor outlineColor textDecorationColor textEmphasisColor",
                    o = /^([\-+])=\s*(\d+\.?\d*)/,
                    h = [{
                        re: /rgba?\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/,
                        parse: function(e) {
                            return [e[1], e[2], e[3], e[4]]
                        }
                    }, {
                        re: /rgba?\(\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/,
                        parse: function(e) {
                            return [2.55 * e[1], 2.55 * e[2], 2.55 * e[3], e[4]]
                        }
                    }, {
                        re: /#([a-f0-9]{2})([a-f0-9]{2})([a-f0-9]{2})/,
                        parse: function(e) {
                            return [parseInt(e[1], 16), parseInt(e[2], 16), parseInt(e[3], 16)]
                        }
                    }, {
                        re: /#([a-f0-9])([a-f0-9])([a-f0-9])/,
                        parse: function(e) {
                            return [parseInt(e[1] + e[1], 16), parseInt(e[2] + e[2], 16), parseInt(e[3] + e[3], 16)]
                        }
                    }, {
                        re: /hsla?\(\s*(\d+(?:\.\d+)?)\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/,
                        space: "hsla",
                        parse: function(e) {
                            return [e[1], e[2] / 100, e[3] / 100, e[4]]
                        }
                    }],
                    l = e.Color = function(t, i, s, a) {
                        return new e.Color.fn.parse(t, i, s, a)
                    },
                    u = {
                        rgba: {
                            props: {
                                red: {
                                    idx: 0,
                                    type: "byte"
                                },
                                green: {
                                    idx: 1,
                                    type: "byte"
                                },
                                blue: {
                                    idx: 2,
                                    type: "byte"
                                }
                            }
                        },
                        hsla: {
                            props: {
                                hue: {
                                    idx: 0,
                                    type: "degrees"
                                },
                                saturation: {
                                    idx: 1,
                                    type: "percent"
                                },
                                lightness: {
                                    idx: 2,
                                    type: "percent"
                                }
                            }
                        }
                    },
                    c = {
                        "byte": {
                            floor: !0,
                            max: 255
                        },
                        percent: {
                            max: 1
                        },
                        degrees: {
                            mod: 360,
                            floor: !0
                        }
                    },
                    d = l.support = {},
                    p = e("<p>")[0],
                    f = e.each;
                p.style.cssText = "background-color:rgba(1,1,1,.5)", d.rgba = p.style.backgroundColor.indexOf("rgba") > -1, f(u, function(e, t) {
                    t.cache = "_" + e, t.props.alpha = {
                        idx: 3,
                        type: "percent",
                        def: 1
                    }
                }), l.fn = e.extend(l.prototype, {
                    parse: function(a, r, o, h) {
                        if (a === t) return this._rgba = [null, null, null, null], this;
                        (a.jquery || a.nodeType) && (a = e(a).css(r), r = t);
                        var c = this,
                            d = e.type(a),
                            p = this._rgba = [];
                        return r !== t && (a = [a, r, o, h], d = "array"), "string" === d ? this.parse(s(a) || n._default) : "array" === d ? (f(u.rgba.props, function(e, t) {
                            p[t.idx] = i(a[t.idx], t)
                        }), this) : "object" === d ? (a instanceof l ? f(u, function(e, t) {
                            a[t.cache] && (c[t.cache] = a[t.cache].slice())
                        }) : f(u, function(t, s) {
                            var n = s.cache;
                            f(s.props, function(e, t) {
                                if (!c[n] && s.to) {
                                    if ("alpha" === e || null == a[e]) return;
                                    c[n] = s.to(c._rgba)
                                }
                                c[n][t.idx] = i(a[e], t, !0)
                            }), c[n] && 0 > e.inArray(null, c[n].slice(0, 3)) && (c[n][3] = 1, s.from && (c._rgba = s.from(c[n])))
                        }), this) : t
                    },
                    is: function(e) {
                        var i = l(e),
                            s = !0,
                            a = this;
                        return f(u, function(e, n) {
                            var r, o = i[n.cache];
                            return o && (r = a[n.cache] || n.to && n.to(a._rgba) || [], f(n.props, function(e, i) {
                                return null != o[i.idx] ? s = o[i.idx] === r[i.idx] : t
                            })), s
                        }), s
                    },
                    _space: function() {
                        var e = [],
                            t = this;
                        return f(u, function(i, s) {
                            t[s.cache] && e.push(i)
                        }), e.pop()
                    },
                    transition: function(e, t) {
                        var s = l(e),
                            a = s._space(),
                            n = u[a],
                            r = 0 === this.alpha() ? l("transparent") : this,
                            o = r[n.cache] || n.to(r._rgba),
                            h = o.slice();
                        return s = s[n.cache], f(n.props, function(e, a) {
                            var n = a.idx,
                                r = o[n],
                                l = s[n],
                                u = c[a.type] || {};
                            null !== l && (null === r ? h[n] = l : (u.mod && (l - r > u.mod / 2 ? r += u.mod : r - l > u.mod / 2 && (r -= u.mod)), h[n] = i((l - r) * t + r, a)))
                        }), this[a](h)
                    },
                    blend: function(t) {
                        if (1 === this._rgba[3]) return this;
                        var i = this._rgba.slice(),
                            s = i.pop(),
                            a = l(t)._rgba;
                        return l(e.map(i, function(e, t) {
                            return (1 - s) * a[t] + s * e
                        }))
                    },
                    toRgbaString: function() {
                        var t = "rgba(",
                            i = e.map(this._rgba, function(e, t) {
                                return null == e ? t > 2 ? 1 : 0 : e
                            });
                        return 1 === i[3] && (i.pop(), t = "rgb("), t + i.join() + ")"
                    },
                    toHslaString: function() {
                        var t = "hsla(",
                            i = e.map(this.hsla(), function(e, t) {
                                return null == e && (e = t > 2 ? 1 : 0), t && 3 > t && (e = Math.round(100 * e) + "%"), e
                            });
                        return 1 === i[3] && (i.pop(), t = "hsl("), t + i.join() + ")"
                    },
                    toHexString: function(t) {
                        var i = this._rgba.slice(),
                            s = i.pop();
                        return t && i.push(~~(255 * s)), "#" + e.map(i, function(e) {
                            return e = (e || 0).toString(16), 1 === e.length ? "0" + e : e
                        }).join("")
                    },
                    toString: function() {
                        return 0 === this._rgba[3] ? "transparent" : this.toRgbaString()
                    }
                }), l.fn.parse.prototype = l.fn, u.hsla.to = function(e) {
                    if (null == e[0] || null == e[1] || null == e[2]) return [null, null, null, e[3]];
                    var t, i, s = e[0] / 255,
                        a = e[1] / 255,
                        n = e[2] / 255,
                        r = e[3],
                        o = Math.max(s, a, n),
                        h = Math.min(s, a, n),
                        l = o - h,
                        u = o + h,
                        c = .5 * u;
                    return t = h === o ? 0 : s === o ? 60 * (a - n) / l + 360 : a === o ? 60 * (n - s) / l + 120 : 60 * (s - a) / l + 240, i = 0 === l ? 0 : .5 >= c ? l / u : l / (2 - u), [Math.round(t) % 360, i, c, null == r ? 1 : r]
                }, u.hsla.from = function(e) {
                    if (null == e[0] || null == e[1] || null == e[2]) return [null, null, null, e[3]];
                    var t = e[0] / 360,
                        i = e[1],
                        s = e[2],
                        n = e[3],
                        r = .5 >= s ? s * (1 + i) : s + i - s * i,
                        o = 2 * s - r;
                    return [Math.round(255 * a(o, r, t + 1 / 3)), Math.round(255 * a(o, r, t)), Math.round(255 * a(o, r, t - 1 / 3)), n]
                }, f(u, function(s, a) {
                    var n = a.props,
                        r = a.cache,
                        h = a.to,
                        u = a.from;
                    l.fn[s] = function(s) {
                        if (h && !this[r] && (this[r] = h(this._rgba)), s === t) return this[r].slice();
                        var a, o = e.type(s),
                            c = "array" === o || "object" === o ? s : arguments,
                            d = this[r].slice();
                        return f(n, function(e, t) {
                            var s = c["object" === o ? e : t.idx];
                            null == s && (s = d[t.idx]), d[t.idx] = i(s, t)
                        }), u ? (a = l(u(d)), a[r] = d, a) : l(d)
                    }, f(n, function(t, i) {
                        l.fn[t] || (l.fn[t] = function(a) {
                            var n, r = e.type(a),
                                h = "alpha" === t ? this._hsla ? "hsla" : "rgba" : s,
                                l = this[h](),
                                u = l[i.idx];
                            return "undefined" === r ? u : ("function" === r && (a = a.call(this, u), r = e.type(a)), null == a && i.empty ? this : ("string" === r && (n = o.exec(a), n && (a = u + parseFloat(n[2]) * ("+" === n[1] ? 1 : -1))), l[i.idx] = a, this[h](l)))
                        })
                    })
                }), l.hook = function(t) {
                    var i = t.split(" ");
                    f(i, function(t, i) {
                        e.cssHooks[i] = {
                            set: function(t, a) {
                                var n, r, o = "";
                                if ("transparent" !== a && ("string" !== e.type(a) || (n = s(a)))) {
                                    if (a = l(n || a), !d.rgba && 1 !== a._rgba[3]) {
                                        for (r = "backgroundColor" === i ? t.parentNode : t;
                                            ("" === o || "transparent" === o) && r && r.style;) try {
                                            o = e.css(r, "backgroundColor"), r = r.parentNode
                                        } catch (h) {}
                                        a = a.blend(o && "transparent" !== o ? o : "_default")
                                    }
                                    a = a.toRgbaString()
                                }
                                try {
                                    t.style[i] = a
                                } catch (h) {}
                            }
                        }, e.fx.step[i] = function(t) {
                            t.colorInit || (t.start = l(t.elem, i), t.end = l(t.end), t.colorInit = !0), e.cssHooks[i].set(t.elem, t.start.transition(t.end, t.pos))
                        }
                    })
                }, l.hook(r), e.cssHooks.borderColor = {
                    expand: function(e) {
                        var t = {};
                        return f(["Top", "Right", "Bottom", "Left"], function(i, s) {
                            t["border" + s + "Color"] = e
                        }), t
                    }
                }, n = e.Color.names = {
                    aqua: "#00ffff",
                    black: "#000000",
                    blue: "#0000ff",
                    fuchsia: "#ff00ff",
                    gray: "#808080",
                    green: "#008000",
                    lime: "#00ff00",
                    maroon: "#800000",
                    navy: "#000080",
                    olive: "#808000",
                    purple: "#800080",
                    red: "#ff0000",
                    silver: "#c0c0c0",
                    teal: "#008080",
                    white: "#ffffff",
                    yellow: "#ffff00",
                    transparent: [null, null, null, 0],
                    _default: "#ffffff"
                }
            }(jQuery),
            function() {
                function i(t) {
                    var i, s, a = t.ownerDocument.defaultView ? t.ownerDocument.defaultView.getComputedStyle(t, null) : t.currentStyle,
                        n = {};
                    if (a && a.length && a[0] && a[a[0]])
                        for (s = a.length; s--;) i = a[s], "string" == typeof a[i] && (n[e.camelCase(i)] = a[i]);
                    else
                        for (i in a) "string" == typeof a[i] && (n[i] = a[i]);
                    return n
                }

                function s(t, i) {
                    var s, a, r = {};
                    for (s in i) a = i[s], t[s] !== a && (n[s] || (e.fx.step[s] || !isNaN(parseFloat(a))) && (r[s] = a));
                    return r
                }
                var a = ["add", "remove", "toggle"],
                    n = {
                        border: 1,
                        borderBottom: 1,
                        borderColor: 1,
                        borderLeft: 1,
                        borderRight: 1,
                        borderTop: 1,
                        borderWidth: 1,
                        margin: 1,
                        padding: 1
                    };
                e.each(["borderLeftStyle", "borderRightStyle", "borderBottomStyle", "borderTopStyle"], function(t, i) {
                    e.fx.step[i] = function(e) {
                        ("none" !== e.end && !e.setAttr || 1 === e.pos && !e.setAttr) && (jQuery.style(e.elem, i, e.end), e.setAttr = !0)
                    }
                }), e.fn.addBack || (e.fn.addBack = function(e) {
                    return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
                }), e.effects.animateClass = function(t, n, r, o) {
                    var h = e.speed(n, r, o);
                    return this.queue(function() {
                        var n, r = e(this),
                            o = r.attr("class") || "",
                            l = h.children ? r.find("*").addBack() : r;
                        l = l.map(function() {
                            var t = e(this);
                            return {
                                el: t,
                                start: i(this)
                            }
                        }), n = function() {
                            e.each(a, function(e, i) {
                                t[i] && r[i + "Class"](t[i])
                            })
                        }, n(), l = l.map(function() {
                            return this.end = i(this.el[0]), this.diff = s(this.start, this.end), this
                        }), r.attr("class", o), l = l.map(function() {
                            var t = this,
                                i = e.Deferred(),
                                s = e.extend({}, h, {
                                    queue: !1,
                                    complete: function() {
                                        i.resolve(t)
                                    }
                                });
                            return this.el.animate(this.diff, s), i.promise()
                        }), e.when.apply(e, l.get()).done(function() {
                            n(), e.each(arguments, function() {
                                var t = this.el;
                                e.each(this.diff, function(e) {
                                    t.css(e, "")
                                })
                            }), h.complete.call(r[0])
                        })
                    })
                }, e.fn.extend({
                    addClass: function(t) {
                        return function(i, s, a, n) {
                            return s ? e.effects.animateClass.call(this, {
                                add: i
                            }, s, a, n) : t.apply(this, arguments)
                        }
                    }(e.fn.addClass),
                    removeClass: function(t) {
                        return function(i, s, a, n) {
                            return arguments.length > 1 ? e.effects.animateClass.call(this, {
                                remove: i
                            }, s, a, n) : t.apply(this, arguments)
                        }
                    }(e.fn.removeClass),
                    toggleClass: function(i) {
                        return function(s, a, n, r, o) {
                            return "boolean" == typeof a || a === t ? n ? e.effects.animateClass.call(this, a ? {
                                add: s
                            } : {
                                remove: s
                            }, n, r, o) : i.apply(this, arguments) : e.effects.animateClass.call(this, {
                                toggle: s
                            }, a, n, r)
                        }
                    }(e.fn.toggleClass),
                    switchClass: function(t, i, s, a, n) {
                        return e.effects.animateClass.call(this, {
                            add: i,
                            remove: t
                        }, s, a, n)
                    }
                })
            }(),
            function() {
                function s(t, i, s, a) {
                    return e.isPlainObject(t) && (i = t, t = t.effect), t = {
                        effect: t
                    }, null == i && (i = {}), e.isFunction(i) && (a = i, s = null, i = {}), ("number" == typeof i || e.fx.speeds[i]) && (a = s, s = i, i = {}), e.isFunction(s) && (a = s, s = null), i && e.extend(t, i), s = s || i.duration, t.duration = e.fx.off ? 0 : "number" == typeof s ? s : s in e.fx.speeds ? e.fx.speeds[s] : e.fx.speeds._default, t.complete = a || i.complete, t
                }

                function a(t) {
                    return !t || "number" == typeof t || e.fx.speeds[t] ? !0 : "string" != typeof t || e.effects.effect[t] ? e.isFunction(t) ? !0 : "object" != typeof t || t.effect ? !1 : !0 : !0
                }
                e.extend(e.effects, {
                    version: "1.10.3",
                    save: function(e, t) {
                        for (var s = 0; t.length > s; s++) null !== t[s] && e.data(i + t[s], e[0].style[t[s]])
                    },
                    restore: function(e, s) {
                        var a, n;
                        for (n = 0; s.length > n; n++) null !== s[n] && (a = e.data(i + s[n]), a === t && (a = ""), e.css(s[n], a))
                    },
                    setMode: function(e, t) {
                        return "toggle" === t && (t = e.is(":hidden") ? "show" : "hide"), t
                    },
                    getBaseline: function(e, t) {
                        var i, s;
                        switch (e[0]) {
                            case "top":
                                i = 0;
                                break;
                            case "middle":
                                i = .5;
                                break;
                            case "bottom":
                                i = 1;
                                break;
                            default:
                                i = e[0] / t.height
                        }
                        switch (e[1]) {
                            case "left":
                                s = 0;
                                break;
                            case "center":
                                s = .5;
                                break;
                            case "right":
                                s = 1;
                                break;
                            default:
                                s = e[1] / t.width
                        }
                        return {
                            x: s,
                            y: i
                        }
                    },
                    createWrapper: function(t) {
                        if (t.parent().is(".ui-effects-wrapper")) return t.parent();
                        var i = {
                                width: t.outerWidth(!0),
                                height: t.outerHeight(!0),
                                "float": t.css("float")
                            },
                            s = e("<div></div>").addClass("ui-effects-wrapper").css({
                                fontSize: "100%",
                                background: "transparent",
                                border: "none",
                                margin: 0,
                                padding: 0
                            }),
                            a = {
                                width: t.width(),
                                height: t.height()
                            },
                            n = document.activeElement;
                        try {
                            n.id
                        } catch (r) {
                            n = document.body
                        }
                        return t.wrap(s), (t[0] === n || e.contains(t[0], n)) && e(n).focus(), s = t.parent(), "static" === t.css("position") ? (s.css({
                            position: "relative"
                        }), t.css({
                            position: "relative"
                        })) : (e.extend(i, {
                            position: t.css("position"),
                            zIndex: t.css("z-index")
                        }), e.each(["top", "left", "bottom", "right"], function(e, s) {
                            i[s] = t.css(s), isNaN(parseInt(i[s], 10)) && (i[s] = "auto")
                        }), t.css({
                            position: "relative",
                            top: 0,
                            left: 0,
                            right: "auto",
                            bottom: "auto"
                        })), t.css(a), s.css(i).show()
                    },
                    removeWrapper: function(t) {
                        var i = document.activeElement;
                        return t.parent().is(".ui-effects-wrapper") && (t.parent().replaceWith(t), (t[0] === i || e.contains(t[0], i)) && e(i).focus()), t
                    },
                    setTransition: function(t, i, s, a) {
                        return a = a || {}, e.each(i, function(e, i) {
                            var n = t.cssUnit(i);
                            n[0] > 0 && (a[i] = n[0] * s + n[1])
                        }), a
                    }
                }), e.fn.extend({
                    effect: function() {
                        function t(t) {
                            function s() {
                                e.isFunction(n) && n.call(a[0]), e.isFunction(t) && t()
                            }
                            var a = e(this),
                                n = i.complete,
                                o = i.mode;
                            (a.is(":hidden") ? "hide" === o : "show" === o) ? (a[o](), s()) : r.call(a[0], i, s)
                        }
                        var i = s.apply(this, arguments),
                            a = i.mode,
                            n = i.queue,
                            r = e.effects.effect[i.effect];
                        return e.fx.off || !r ? a ? this[a](i.duration, i.complete) : this.each(function() {
                            i.complete && i.complete.call(this)
                        }) : n === !1 ? this.each(t) : this.queue(n || "fx", t)
                    },
                    show: function(e) {
                        return function(t) {
                            if (a(t)) return e.apply(this, arguments);
                            var i = s.apply(this, arguments);
                            return i.mode = "show", this.effect.call(this, i)
                        }
                    }(e.fn.show),
                    hide: function(e) {
                        return function(t) {
                            if (a(t)) return e.apply(this, arguments);
                            var i = s.apply(this, arguments);
                            return i.mode = "hide", this.effect.call(this, i)
                        }
                    }(e.fn.hide),
                    toggle: function(e) {
                        return function(t) {
                            if (a(t) || "boolean" == typeof t) return e.apply(this, arguments);
                            var i = s.apply(this, arguments);
                            return i.mode = "toggle", this.effect.call(this, i)
                        }
                    }(e.fn.toggle),
                    cssUnit: function(t) {
                        var i = this.css(t),
                            s = [];
                        return e.each(["em", "px", "%", "pt"], function(e, t) {
                            i.indexOf(t) > 0 && (s = [parseFloat(i), t])
                        }), s
                    }
                })
            }(),
            function() {
                var t = {};
                e.each(["Quad", "Cubic", "Quart", "Quint", "Expo"], function(e, i) {
                    t[i] = function(t) {
                        return Math.pow(t, e + 2)
                    }
                }), e.extend(t, {
                    Sine: function(e) {
                        return 1 - Math.cos(e * Math.PI / 2)
                    },
                    Circ: function(e) {
                        return 1 - Math.sqrt(1 - e * e)
                    },
                    Elastic: function(e) {
                        return 0 === e || 1 === e ? e : -Math.pow(2, 8 * (e - 1)) * Math.sin((80 * (e - 1) - 7.5) * Math.PI / 15)
                    },
                    Back: function(e) {
                        return e * e * (3 * e - 2)
                    },
                    Bounce: function(e) {
                        for (var t, i = 4;
                            ((t = Math.pow(2, --i)) - 1) / 11 > e;);
                        return 1 / Math.pow(4, 3 - i) - 7.5625 * Math.pow((3 * t - 2) / 22 - e, 2)
                    }
                }), e.each(t, function(t, i) {
                    e.easing["easeIn" + t] = i, e.easing["easeOut" + t] = function(e) {
                        return 1 - i(1 - e)
                    }, e.easing["easeInOut" + t] = function(e) {
                        return .5 > e ? i(2 * e) / 2 : 1 - i(-2 * e + 2) / 2
                    }
                })
            }()
    }(jQuery),
    function(e) {
        var t = /up|down|vertical/,
            i = /up|left|vertical|horizontal/;
        e.effects.effect.blind = function(a, s) {
            var n, r, o, l = e(this),
                h = ["position", "top", "bottom", "left", "right", "height", "width"],
                u = e.effects.setMode(l, a.mode || "hide"),
                d = a.direction || "up",
                c = t.test(d),
                p = c ? "height" : "width",
                f = c ? "top" : "left",
                m = i.test(d),
                g = {},
                v = "show" === u;
            l.parent().is(".ui-effects-wrapper") ? e.effects.save(l.parent(), h) : e.effects.save(l, h), l.show(), n = e.effects.createWrapper(l).css({
                overflow: "hidden"
            }), r = n[p](), o = parseFloat(n.css(f)) || 0, g[p] = v ? r : 0, m || (l.css(c ? "bottom" : "right", 0).css(c ? "top" : "left", "auto").css({
                position: "absolute"
            }), g[f] = v ? o : r + o), v && (n.css(p, 0), m || n.css(f, o + r)), n.animate(g, {
                duration: a.duration,
                easing: a.easing,
                queue: !1,
                complete: function() {
                    "hide" === u && l.hide(), e.effects.restore(l, h), e.effects.removeWrapper(l), s()
                }
            })
        }
    }(jQuery),
    function(e) {
        e.effects.effect.bounce = function(t, i) {
            var a, s, n, r = e(this),
                o = ["position", "top", "bottom", "left", "right", "height", "width"],
                l = e.effects.setMode(r, t.mode || "effect"),
                h = "hide" === l,
                u = "show" === l,
                d = t.direction || "up",
                c = t.distance,
                p = t.times || 5,
                f = 2 * p + (u || h ? 1 : 0),
                m = t.duration / f,
                g = t.easing,
                v = "up" === d || "down" === d ? "top" : "left",
                y = "up" === d || "left" === d,
                b = r.queue(),
                _ = b.length;
            for ((u || h) && o.push("opacity"), e.effects.save(r, o), r.show(), e.effects.createWrapper(r), c || (c = r["top" === v ? "outerHeight" : "outerWidth"]() / 3), u && (n = {
                    opacity: 1
                }, n[v] = 0, r.css("opacity", 0).css(v, y ? 2 * -c : 2 * c).animate(n, m, g)), h && (c /= Math.pow(2, p - 1)), n = {}, n[v] = 0, a = 0; p > a; a++) s = {}, s[v] = (y ? "-=" : "+=") + c, r.animate(s, m, g).animate(n, m, g), c = h ? 2 * c : c / 2;
            h && (s = {
                opacity: 0
            }, s[v] = (y ? "-=" : "+=") + c, r.animate(s, m, g)), r.queue(function() {
                h && r.hide(), e.effects.restore(r, o), e.effects.removeWrapper(r), i()
            }), _ > 1 && b.splice.apply(b, [1, 0].concat(b.splice(_, f + 1))), r.dequeue()
        }
    }(jQuery),
    function(e) {
        e.effects.effect.clip = function(t, i) {
            var a, s, n, r = e(this),
                o = ["position", "top", "bottom", "left", "right", "height", "width"],
                l = e.effects.setMode(r, t.mode || "hide"),
                h = "show" === l,
                u = t.direction || "vertical",
                d = "vertical" === u,
                c = d ? "height" : "width",
                p = d ? "top" : "left",
                f = {};
            e.effects.save(r, o), r.show(), a = e.effects.createWrapper(r).css({
                overflow: "hidden"
            }), s = "IMG" === r[0].tagName ? a : r, n = s[c](), h && (s.css(c, 0), s.css(p, n / 2)), f[c] = h ? n : 0, f[p] = h ? 0 : n / 2, s.animate(f, {
                queue: !1,
                duration: t.duration,
                easing: t.easing,
                complete: function() {
                    h || r.hide(), e.effects.restore(r, o), e.effects.removeWrapper(r), i()
                }
            })
        }
    }(jQuery),
    function(e) {
        e.effects.effect.drop = function(t, i) {
            var a, s = e(this),
                n = ["position", "top", "bottom", "left", "right", "opacity", "height", "width"],
                r = e.effects.setMode(s, t.mode || "hide"),
                o = "show" === r,
                l = t.direction || "left",
                h = "up" === l || "down" === l ? "top" : "left",
                u = "up" === l || "left" === l ? "pos" : "neg",
                d = {
                    opacity: o ? 1 : 0
                };
            e.effects.save(s, n), s.show(), e.effects.createWrapper(s), a = t.distance || s["top" === h ? "outerHeight" : "outerWidth"](!0) / 2, o && s.css("opacity", 0).css(h, "pos" === u ? -a : a), d[h] = (o ? "pos" === u ? "+=" : "-=" : "pos" === u ? "-=" : "+=") + a, s.animate(d, {
                queue: !1,
                duration: t.duration,
                easing: t.easing,
                complete: function() {
                    "hide" === r && s.hide(), e.effects.restore(s, n), e.effects.removeWrapper(s), i()
                }
            })
        }
    }(jQuery),
    function(e) {
        e.effects.effect.explode = function(t, i) {
            function s() {
                b.push(this), b.length === d * c && a()
            }

            function a() {
                p.css({
                    visibility: "visible"
                }), e(b).remove(), m || p.hide(), i()
            }
            var n, r, o, l, h, u, d = t.pieces ? Math.round(Math.sqrt(t.pieces)) : 3,
                c = d,
                p = e(this),
                f = e.effects.setMode(p, t.mode || "hide"),
                m = "show" === f,
                g = p.show().css("visibility", "hidden").offset(),
                v = Math.ceil(p.outerWidth() / c),
                y = Math.ceil(p.outerHeight() / d),
                b = [];
            for (n = 0; d > n; n++)
                for (l = g.top + n * y, u = n - (d - 1) / 2, r = 0; c > r; r++) o = g.left + r * v, h = r - (c - 1) / 2, p.clone().appendTo("body").wrap("<div></div>").css({
                    position: "absolute",
                    visibility: "visible",
                    left: -r * v,
                    top: -n * y
                }).parent().addClass("ui-effects-explode").css({
                    position: "absolute",
                    overflow: "hidden",
                    width: v,
                    height: y,
                    left: o + (m ? h * v : 0),
                    top: l + (m ? u * y : 0),
                    opacity: m ? 0 : 1
                }).animate({
                    left: o + (m ? 0 : h * v),
                    top: l + (m ? 0 : u * y),
                    opacity: m ? 1 : 0
                }, t.duration || 500, t.easing, s)
        }
    }(jQuery),
    function(e) {
        e.effects.effect.fade = function(t, i) {
            var s = e(this),
                a = e.effects.setMode(s, t.mode || "toggle");
            s.animate({
                opacity: a
            }, {
                queue: !1,
                duration: t.duration,
                easing: t.easing,
                complete: i
            })
        }
    }(jQuery),
    function(e) {
        e.effects.effect.fold = function(t, i) {
            var s, a, n = e(this),
                r = ["position", "top", "bottom", "left", "right", "height", "width"],
                o = e.effects.setMode(n, t.mode || "hide"),
                l = "show" === o,
                h = "hide" === o,
                u = t.size || 15,
                d = /([0-9]+)%/.exec(u),
                c = !!t.horizFirst,
                p = l !== c,
                f = p ? ["width", "height"] : ["height", "width"],
                m = t.duration / 2,
                g = {},
                v = {};
            e.effects.save(n, r), n.show(), s = e.effects.createWrapper(n).css({
                overflow: "hidden"
            }), a = p ? [s.width(), s.height()] : [s.height(), s.width()], d && (u = parseInt(d[1], 10) / 100 * a[h ? 0 : 1]), l && s.css(c ? {
                height: 0,
                width: u
            } : {
                height: u,
                width: 0
            }), g[f[0]] = l ? a[0] : u, v[f[1]] = l ? a[1] : 0, s.animate(g, m, t.easing).animate(v, m, t.easing, function() {
                h && n.hide(), e.effects.restore(n, r), e.effects.removeWrapper(n), i()
            })
        }
    }(jQuery),
    function(e) {
        e.effects.effect.highlight = function(t, i) {
            var s = e(this),
                a = ["backgroundImage", "backgroundColor", "opacity"],
                n = e.effects.setMode(s, t.mode || "show"),
                r = {
                    backgroundColor: s.css("backgroundColor")
                };
            "hide" === n && (r.opacity = 0), e.effects.save(s, a), s.show().css({
                backgroundImage: "none",
                backgroundColor: t.color || "#ffff99"
            }).animate(r, {
                queue: !1,
                duration: t.duration,
                easing: t.easing,
                complete: function() {
                    "hide" === n && s.hide(), e.effects.restore(s, a), i()
                }
            })
        }
    }(jQuery),
    function(e) {
        e.effects.effect.pulsate = function(t, i) {
            var s, a = e(this),
                n = e.effects.setMode(a, t.mode || "show"),
                r = "show" === n,
                o = "hide" === n,
                l = r || "hide" === n,
                h = 2 * (t.times || 5) + (l ? 1 : 0),
                u = t.duration / h,
                d = 0,
                c = a.queue(),
                p = c.length;
            for ((r || !a.is(":visible")) && (a.css("opacity", 0).show(), d = 1), s = 1; h > s; s++) a.animate({
                opacity: d
            }, u, t.easing), d = 1 - d;
            a.animate({
                opacity: d
            }, u, t.easing), a.queue(function() {
                o && a.hide(), i()
            }), p > 1 && c.splice.apply(c, [1, 0].concat(c.splice(p, h + 1))), a.dequeue()
        }
    }(jQuery),
    function(e) {
        e.effects.effect.puff = function(t, i) {
            var s = e(this),
                a = e.effects.setMode(s, t.mode || "hide"),
                n = "hide" === a,
                r = parseInt(t.percent, 10) || 150,
                o = r / 100,
                h = {
                    height: s.height(),
                    width: s.width(),
                    outerHeight: s.outerHeight(),
                    outerWidth: s.outerWidth()
                };
            e.extend(t, {
                effect: "scale",
                queue: !1,
                fade: !0,
                mode: a,
                complete: i,
                percent: n ? r : 100,
                from: n ? h : {
                    height: h.height * o,
                    width: h.width * o,
                    outerHeight: h.outerHeight * o,
                    outerWidth: h.outerWidth * o
                }
            }), s.effect(t)
        }, e.effects.effect.scale = function(t, i) {
            var s = e(this),
                a = e.extend(!0, {}, t),
                n = e.effects.setMode(s, t.mode || "effect"),
                r = parseInt(t.percent, 10) || (0 === parseInt(t.percent, 10) ? 0 : "hide" === n ? 0 : 100),
                o = t.direction || "both",
                h = t.origin,
                l = {
                    height: s.height(),
                    width: s.width(),
                    outerHeight: s.outerHeight(),
                    outerWidth: s.outerWidth()
                },
                u = {
                    y: "horizontal" !== o ? r / 100 : 1,
                    x: "vertical" !== o ? r / 100 : 1
                };
            a.effect = "size", a.queue = !1, a.complete = i, "effect" !== n && (a.origin = h || ["middle", "center"], a.restore = !0), a.from = t.from || ("show" === n ? {
                height: 0,
                width: 0,
                outerHeight: 0,
                outerWidth: 0
            } : l), a.to = {
                height: l.height * u.y,
                width: l.width * u.x,
                outerHeight: l.outerHeight * u.y,
                outerWidth: l.outerWidth * u.x
            }, a.fade && ("show" === n && (a.from.opacity = 0, a.to.opacity = 1), "hide" === n && (a.from.opacity = 1, a.to.opacity = 0)), s.effect(a)
        }, e.effects.effect.size = function(t, i) {
            var s, a, n, r = e(this),
                o = ["position", "top", "bottom", "left", "right", "width", "height", "overflow", "opacity"],
                h = ["position", "top", "bottom", "left", "right", "overflow", "opacity"],
                l = ["width", "height", "overflow"],
                u = ["fontSize"],
                d = ["borderTopWidth", "borderBottomWidth", "paddingTop", "paddingBottom"],
                c = ["borderLeftWidth", "borderRightWidth", "paddingLeft", "paddingRight"],
                p = e.effects.setMode(r, t.mode || "effect"),
                f = t.restore || "effect" !== p,
                m = t.scale || "both",
                g = t.origin || ["middle", "center"],
                v = r.css("position"),
                y = f ? o : h,
                b = {
                    height: 0,
                    width: 0,
                    outerHeight: 0,
                    outerWidth: 0
                };
            "show" === p && r.show(), s = {
                height: r.height(),
                width: r.width(),
                outerHeight: r.outerHeight(),
                outerWidth: r.outerWidth()
            }, "toggle" === t.mode && "show" === p ? (r.from = t.to || b, r.to = t.from || s) : (r.from = t.from || ("show" === p ? b : s), r.to = t.to || ("hide" === p ? b : s)), n = {
                from: {
                    y: r.from.height / s.height,
                    x: r.from.width / s.width
                },
                to: {
                    y: r.to.height / s.height,
                    x: r.to.width / s.width
                }
            }, ("box" === m || "both" === m) && (n.from.y !== n.to.y && (y = y.concat(d), r.from = e.effects.setTransition(r, d, n.from.y, r.from), r.to = e.effects.setTransition(r, d, n.to.y, r.to)), n.from.x !== n.to.x && (y = y.concat(c), r.from = e.effects.setTransition(r, c, n.from.x, r.from), r.to = e.effects.setTransition(r, c, n.to.x, r.to))), ("content" === m || "both" === m) && n.from.y !== n.to.y && (y = y.concat(u).concat(l), r.from = e.effects.setTransition(r, u, n.from.y, r.from), r.to = e.effects.setTransition(r, u, n.to.y, r.to)), e.effects.save(r, y), r.show(), e.effects.createWrapper(r), r.css("overflow", "hidden").css(r.from), g && (a = e.effects.getBaseline(g, s), r.from.top = (s.outerHeight - r.outerHeight()) * a.y, r.from.left = (s.outerWidth - r.outerWidth()) * a.x, r.to.top = (s.outerHeight - r.to.outerHeight) * a.y, r.to.left = (s.outerWidth - r.to.outerWidth) * a.x), r.css(r.from), ("content" === m || "both" === m) && (d = d.concat(["marginTop", "marginBottom"]).concat(u), c = c.concat(["marginLeft", "marginRight"]), l = o.concat(d).concat(c), r.find("*[width]").each(function() {
                var i = e(this),
                    s = {
                        height: i.height(),
                        width: i.width(),
                        outerHeight: i.outerHeight(),
                        outerWidth: i.outerWidth()
                    };
                f && e.effects.save(i, l), i.from = {
                    height: s.height * n.from.y,
                    width: s.width * n.from.x,
                    outerHeight: s.outerHeight * n.from.y,
                    outerWidth: s.outerWidth * n.from.x
                }, i.to = {
                    height: s.height * n.to.y,
                    width: s.width * n.to.x,
                    outerHeight: s.height * n.to.y,
                    outerWidth: s.width * n.to.x
                }, n.from.y !== n.to.y && (i.from = e.effects.setTransition(i, d, n.from.y, i.from), i.to = e.effects.setTransition(i, d, n.to.y, i.to)), n.from.x !== n.to.x && (i.from = e.effects.setTransition(i, c, n.from.x, i.from), i.to = e.effects.setTransition(i, c, n.to.x, i.to)), i.css(i.from), i.animate(i.to, t.duration, t.easing, function() {
                    f && e.effects.restore(i, l)
                })
            })), r.animate(r.to, {
                queue: !1,
                duration: t.duration,
                easing: t.easing,
                complete: function() {
                    0 === r.to.opacity && r.css("opacity", r.from.opacity), "hide" === p && r.hide(), e.effects.restore(r, y), f || ("static" === v ? r.css({
                        position: "relative",
                        top: r.to.top,
                        left: r.to.left
                    }) : e.each(["top", "left"], function(e, t) {
                        r.css(t, function(t, i) {
                            var s = parseInt(i, 10),
                                a = e ? r.to.left : r.to.top;
                            return "auto" === i ? a + "px" : s + a + "px"
                        })
                    })), e.effects.removeWrapper(r), i()
                }
            })
        }
    }(jQuery),
    function(e) {
        e.effects.effect.shake = function(t, i) {
            var s, a = e(this),
                n = ["position", "top", "bottom", "left", "right", "height", "width"],
                r = e.effects.setMode(a, t.mode || "effect"),
                o = t.direction || "left",
                h = t.distance || 20,
                l = t.times || 3,
                u = 2 * l + 1,
                d = Math.round(t.duration / u),
                c = "up" === o || "down" === o ? "top" : "left",
                p = "up" === o || "left" === o,
                f = {},
                m = {},
                g = {},
                v = a.queue(),
                y = v.length;
            for (e.effects.save(a, n), a.show(), e.effects.createWrapper(a), f[c] = (p ? "-=" : "+=") + h, m[c] = (p ? "+=" : "-=") + 2 * h, g[c] = (p ? "-=" : "+=") + 2 * h, a.animate(f, d, t.easing), s = 1; l > s; s++) a.animate(m, d, t.easing).animate(g, d, t.easing);
            a.animate(m, d, t.easing).animate(f, d / 2, t.easing).queue(function() {
                "hide" === r && a.hide(), e.effects.restore(a, n), e.effects.removeWrapper(a), i()
            }), y > 1 && v.splice.apply(v, [1, 0].concat(v.splice(y, u + 1))), a.dequeue()
        }
    }(jQuery),
    function(e) {
        e.effects.effect.slide = function(t, i) {
            var s, a = e(this),
                n = ["position", "top", "bottom", "left", "right", "width", "height"],
                r = e.effects.setMode(a, t.mode || "show"),
                o = "show" === r,
                h = t.direction || "left",
                l = "up" === h || "down" === h ? "top" : "left",
                u = "up" === h || "left" === h,
                d = {};
            e.effects.save(a, n), a.show(), s = t.distance || a["top" === l ? "outerHeight" : "outerWidth"](!0), e.effects.createWrapper(a).css({
                overflow: "hidden"
            }), o && a.css(l, u ? isNaN(s) ? "-" + s : -s : s), d[l] = (o ? u ? "+=" : "-=" : u ? "-=" : "+=") + s, a.animate(d, {
                queue: !1,
                duration: t.duration,
                easing: t.easing,
                complete: function() {
                    "hide" === r && a.hide(), e.effects.restore(a, n), e.effects.removeWrapper(a), i()
                }
            })
        }
    }(jQuery),
    function(e) {
        e.effects.effect.transfer = function(t, i) {
            var s = e(this),
                a = e(t.to),
                n = "fixed" === a.css("position"),
                r = e("body"),
                o = n ? r.scrollTop() : 0,
                h = n ? r.scrollLeft() : 0,
                l = a.offset(),
                u = {
                    top: l.top - o,
                    left: l.left - h,
                    height: a.innerHeight(),
                    width: a.innerWidth()
                },
                d = s.offset(),
                c = e("<div class='ui-effects-transfer'></div>").appendTo(document.body).addClass(t.className).css({
                    top: d.top - o,
                    left: d.left - h,
                    height: s.innerHeight(),
                    width: s.innerWidth(),
                    position: n ? "fixed" : "absolute"
                }).animate(u, t.duration, t.easing, function() {
                    c.remove(), i()
                })
        }
    }(jQuery), app.factory("notificationStorage", [function() {
        function _cookie_name(type) {
            return type + "_notification_storage"
        }

        function _set_cookie_value(type, key) {
            $.cookie.json = !0;
            var data = $.cookie(_cookie_name(type)) || {};
            data[key] = !0, $.cookie(_cookie_name(type), data, {
                expires: 90
            }), $.cookie.json = !1
        }

        function _get_cookie_value(type, key) {
            $.cookie.json = !0;
            var data = $.cookie(_cookie_name(type)) || {};
            return $.cookie.json = !1, data[key] === !0
        }

        function show(type) {
            _gaq.push(["_trackEvent", _cookie_name(type), "show", "popup"]), $.fancybox.open($popup_storage), set_already_display(type)
        }

        function hide() {
            $.fancybox.close($popup_storage)
        }

        function set_display(type) {
            _set_cookie_value(type, "display")
        }

        function set_already_display(type) {
            _set_cookie_value(type, "already_display")
        }

        function set_hidden_panel(type) {
            _gaq.push(["_trackEvent", _cookie_name(type), "hidden", "panel"]), _set_cookie_value(type, "hidden_panel")
        }

        function is_display(type) {
            return _get_cookie_value(type, "display") === !0
        }

        function is_already_display(type) {
            return _get_cookie_value(type, "already_display") === !0
        }

        function is_hidden_panel(type) {
            return is_display(type) === !1 || _get_cookie_value(type, "hidden_panel") === !0
        }

        function is_auto_popup(type) {
            return is_display(type) === !0 && is_already_display(type) === !1
        }
        var $popup_storage = $("#popup_storage_ad");
        return {
            show: show,
            hide: hide,
            set_display: set_display,
            set_already_display: set_already_display,
            set_hidden_panel: set_hidden_panel,
            is_display: is_display,
            is_already_display: is_already_display,
            is_hidden_panel: is_hidden_panel,
            is_auto_popup: is_auto_popup
        }
    }]), app.factory("conversionTag", [function() {
        function append_tags(conversions) {
            var def = $.Deferred(),
                promises = [];
            for (var key in conversions) conversion_func[key] && promises.push(conversion_func[key].apply(this, conversions[key]));
            return $.when.apply(this, promises).done(function() {
                def.resolve()
            }), def
        }
        var conversion_func = {};
        return conversion_func.google_conversion = function(id, label) {
            var def = $.Deferred(),
                init_script_tag = document.createElement("script");
            init_script_tag.innerHTML = ["/* <![CDATA[ */", "var google_conversion_id = " + id + ";", 'var google_conversion_language = "en";', 'var google_conversion_format = "3";', 'var google_conversion_color = "ffffff";', 'var google_conversion_label = "' + label + '";', "var google_conversion_value = 0;", "/* ]]> */"].join("\n");
            var noscript_tag = document.createElement("noscript");
            noscript_tag.innerHTML = ['<div style="display:inline;">', '<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/' + id + "/?value=0&amp;label=" + label + '&amp;guid=ON&amp;script=0">', "</div>"].join("\n");
            var conversion_script_tag = document.createElement("script");
            return conversion_script_tag.src = "//www.googleadservices.com/pagead/conversion.js", conversion_script_tag.onload = function() {
                def.resolve()
            }, document.body.appendChild(init_script_tag), document.body.appendChild(noscript_tag), document.body.appendChild(conversion_script_tag), def
        }, conversion_func.google_remarketing = function(id, label) {
            var def = $.Deferred(),
                init_script_tag = document.createElement("script");
            init_script_tag.innerHTML = ["/* <![CDATA[ */", "var google_conversion_id = " + id + ";", 'var google_conversion_label = "' + label + '";', "var google_custom_params = window.google_tag_params;", "var google_remarketing_only = true;", "/* ]]> */"].join("\n");
            var noscript_tag = document.createElement("noscript");
            noscript_tag.innerHTML = ['<div style="display:inline;">', '<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/' + id + "/?value=0&amp;label=" + label + '&amp;guid=ON&amp;script=0"/>', "</div>"].join("\n");
            var conversion_script_tag = document.createElement("script");
            return conversion_script_tag.src = "//www.googleadservices.com/pagead/conversion.js", conversion_script_tag.onload = function() {
                def.resolve()
            }, document.body.appendChild(init_script_tag), document.body.appendChild(noscript_tag), document.body.appendChild(conversion_script_tag), def
        }, conversion_func.yahoo_conversion = function(id, label) {
            var def = $.Deferred(),
                init_script_tag = document.createElement("script");
            init_script_tag.innerHTML = ["/* <![CDATA[ */", "var yahoo_conversion_id = " + id + ";", 'var yahoo_conversion_label = "' + label + '";', "var yahoo_conversion_value = 0;", "/* ]]> */"].join("\n");
            var noscript_tag = document.createElement("noscript");
            noscript_tag.innerHTML = ['<div style="display:inline;">', '<img height="1" width="1" style="border-style:none;" alt="" src="//b91.yahoo.co.jp/pagead/conversion/' + id + "/?value=0&amp;label=" + label + '&amp;guid=ON&amp;script=0&amp;disvt=true"/>', "</div>"].join("\n");
            var conversion_script_tag = document.createElement("script");
            return conversion_script_tag.src = "https://s.yimg.jp/images/listing/tool/cv/conversion.js", conversion_script_tag.onload = function() {
                def.resolve()
            }, document.body.appendChild(init_script_tag), document.body.appendChild(noscript_tag), document.body.appendChild(conversion_script_tag), def
        }, conversion_func.yahoo_remarketing = function(id, label) {
            var def = $.Deferred(),
                init_script_tag = document.createElement("script");
            init_script_tag.innerHTML = ["/* <![CDATA[ */", 'var yahoo_retargeting_id = "' + id + '";', 'var yahoo_conversion_label = "' + label + '";', "/* ]]> */"].join("\n");
            var conversion_script_tag = document.createElement("script");
            return conversion_script_tag.src = "//b92.yahoo.co.jp/js/s_retargeting.js", conversion_script_tag.onload = function() {
                def.resolve()
            }, document.body.appendChild(init_script_tag), document.body.appendChild(conversion_script_tag), def
        }, conversion_func.yahoo_listing = function(account_id, transaction_id, amount) {
            var def = $.Deferred();
            if ("https:" == location.protocol) var protocol = "https:";
            else var protocol = "http:";
            var img = document.createElement("img");
            return img.src = protocol + "//b90.yahoo.co.jp/c?account_id=" + account_id + "&transaction_id=" + transaction_id + "&amount=" + amount, img.width = 1, img.height = 1, img.border = 0, img.onload = function() {
                def.resolve()
            }, document.body.appendChild(img), def
        }, conversion_func.a8_conversion = function(id, name) {
            var def = $.Deferred(),
                img = document.createElement("img");
            return img.src = "https://px.a8.net/cgi-bin/a8fly/sales?pid=" + id + "&so=" + name + "&si=1.1.1.a8", img.onload = function() {
                def.resolve()
            }, document.body.appendChild(img), def
        }, {
            append_tags: append_tags
        }
    }]);
var services = angular.module("StoresJp.services", ["ngResource"]);
services.factory("DeliveryMethod", ["$resource", function($resource) {
        return $resource("/stores/:user/delivery_methods/:id", {
            user: "@user",
            id: "@id"
        }, {
            update: {
                method: "PUT",
                params: {},
                isArray: !1
            }
        })
    }]),
    function() {
        app.factory("StoresUtil", function() {
            function is_mobile() {
                return /iphone|ipod|android.*mobile/.test(navigator.userAgent.toLowerCase())
            }
            return {
                is_mobile: is_mobile
            }
        })
    }(), app.directive("storesDate", function() {
        return {
            require: "?ngModel",
            link: function(scope, element, attrs, controller) {
                var defaultAttrs = {
                        format: "Y/m/d",
                        days: ["\u65e5", "\u6708", "\u706b", "\u6c34", "\u6728", "\u91d1", "\u571f"],
                        months: ["1\u6708", "2\u6708", "3\u6708", "4\u6708", "5\u6708", "6\u6708", "7\u6708", "8\u6708", "9\u6708", "10\u6708", "11\u6708", "12\u6708"],
                        onSelect: function(v) {
                            controller.$setViewValue(v), controller.$render()
                        }
                    },
                    obj = scope.$eval(attrs.storesDate);
                obj && (obj.pair && (obj.pair = $(obj.pair)), angular.extend(defaultAttrs, obj)), _.delay(function() {
                    element.Zebra_DatePicker(defaultAttrs)
                }, 300)
            }
        }
    }), app.directive("storesJwysiwyg", function() {
        return {
            require: "?ngModel",
            link: function(scope, element, attrs, controller) {
                element.wysiwyg({
                    rmUnusedControls: !0,
                    initialContent: null,
                    controls: {
                        bold: {
                            visible: !0
                        },
                        italic: {
                            visible: !0
                        },
                        insertUnorderedList: {
                            visible: !0
                        },
                        insertOrderedList: {
                            visible: !0
                        },
                        createLink: {
                            visible: !0
                        }
                    },
                    events: {
                        keyup: function() {
                            controller.$setViewValue(element.val())
                        }
                    }
                }), element.prev().find(".toolbar").click(function() {
                    controller.$setViewValue(element.val())
                })
            }
        }
    }), app.directive("storesMax", function() {
        return {
            require: "ngModel",
            restrict: "A",
            link: function(scope, element, attrs, controller) {
                var max = parseInt(attrs.storesMax, 10);
                controller.$parsers.unshift(function(viewValue) {
                    return !viewValue || parseInt(viewValue, 10) <= max ? (controller.$setValidity("storesMax", !0), viewValue) : (controller.$setValidity("storesMax", !1), viewValue)
                })
            }
        }
    }), app.directive("storesMin", function() {
        return {
            require: "ngModel",
            restrict: "A",
            link: function(scope, element, attrs, controller) {
                var min = parseInt(attrs.storesMin, 10);
                controller.$parsers.unshift(function(viewValue) {
                    return !viewValue || parseInt(viewValue, 10) >= min ? (controller.$setValidity("storesMin", !0), viewValue) : (controller.$setValidity("storesMin", !1), viewValue)
                })
            }
        }
    }), app.directive("ngIf", [function() {
        return {
            transclude: "element",
            priority: 600,
            terminal: !0,
            restrict: "A",
            $$tlb: !0,
            compile: function($element, $attr, $transclude) {
                return function($scope, $element, $attr) {
                    var block, childScope;
                    $scope.$watch($attr.ngIf, function(value) {
                        value ? childScope || (childScope = $scope.$new(), $transclude(childScope, function(clone) {
                            clone[clone.length++] = document.createComment(" end ngIf: " + $attr.ngIf + " "), block = {
                                clone: clone
                            }, angular.element($element).after(clone)
                        })) : (childScope && (childScope.$destroy(), childScope = null), block && (angular.element(block.clone).remove(), block = null))
                    })
                }
            }
        }
    }]), app.directive("storesNumeric", function() {
        return {
            require: "ngModel",
            restrict: "A",
            link: function(scope, element, attrs, controller) {
                element.bind("keyup", function(e) {
                    13 === e.keyCode && (controller.$setViewValue(parseInt(function(num) {
                        return num.replace(/[\uff10-\uff19]/g, function(n) {
                            return String.fromCharCode(n.charCodeAt(0) - 65248)
                        }).replace(/\D/g, "")
                    }(controller.$modelValue.toString()), 10)), controller.$render())
                })
            }
        }
    }), app.directive("storesRequired", function() {
        return {
            require: "ngModel",
            restrict: "A",
            link: function(scope, element, attrs, controller) {
                scope.$watch(attrs.storesRequired, function(newValue) {
                    if (newValue) {
                        var v = controller.$modelValue;
                        null === v || void 0 === v || "string" == typeof v && 0 === v.length ? controller.$setValidity("storesRequired", !1) : controller.$setValidity("storesRequired", !0), angular.forEach(controller.$parsers, function(validator) {
                            validator(v)
                        })
                    } else angular.forEach(controller.$error, function(v, k) {
                        controller.$setValidity(k, !0)
                    })
                }), controller.$parsers.unshift(function(viewValue) {
                    return scope.$eval(attrs.storesRequired) && "string" == typeof viewValue && !viewValue.length ? (controller.$setValidity("storesRequired", !1), viewValue) : (controller.$setValidity("storesRequired", !0), viewValue)
                })
            }
        }
    }), app.directive("zipCodeSeparate", function($http) {
        return {
            require: "ngModel",
            restrict: "A",
            link: function(scope, element, attrs) {
                {
                    var last_zip = "",
                        address_elm = element.parents().find('[id="address"]');
                    element.parents().find('[id="zip2"]')
                }
                element.on("keyup", function() {
                    scope.$apply(function() {
                        var val = document.getElementById("zip1").value + document.getElementById("zip2").value,
                            zip = val.hankaku().replace(/\D/g, "");
                        if (7 == zip.length) {
                            if (last_zip == zip) return;
                            last_zip = zip, $http.get("/zip_codes/" + zip.to(3)).success(function(data) {
                                var prefecture = _.find(scope.preset.prefectures, function(prefecture) {
                                    return prefecture == data[zip][0]
                                });
                                if (prefecture) {
                                    var splits = attrs.ngModel.split("."),
                                        obj = scope.$eval(splits[0]);
                                    obj && (obj.prefecture = prefecture, obj.address1 = data[zip][1], obj.address2 = data[zip][2], address_elm.focus())
                                }
                            })
                        }
                    })
                })
            }
        }
    });
