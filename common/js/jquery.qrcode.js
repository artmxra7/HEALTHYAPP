/*! jquery-qrcode v0.18.0 - https://larsjung.de/jquery-qrcode/ */
!(function (t, r) {
	"object" == typeof exports && "object" == typeof module
		? (module.exports = r())
		: "function" == typeof define && define.amd
		? define("jquery-qrcode", [], r)
		: "object" == typeof exports
		? (exports["jquery-qrcode"] = r())
		: (t["jquery-qrcode"] = r());
})("undefined" != typeof self ? self : this, function () {
	return (
		(n = {}),
		(o.m = e = [
			function (t, r, f) {
				function p(t) {
					return t && "string" == typeof t.tagName && "IMG" === t.tagName.toUpperCase();
				}
				function h(t, r, e, n, o) {
					(e = Math.max(1, e || 1)), (n = Math.min(40, n || 40));
					for (var i = e; i <= n; i += 1)
						try {
							return (function (t, r, e, n) {
								var o = {},
									i = f(1);
								i.stringToBytes = i.stringToBytesFuncs["UTF-8"];
								var a = i(e, r);
								a.addData(t), a.make(), (n = n || 0);
								var u = a.getModuleCount(),
									s = u + 2 * n;
								return (
									(o.text = t),
									(o.level = r),
									(o.version = e),
									(o.module_count = s),
									(o.is_dark = function (t, r) {
										return (r -= n), 0 <= (t -= n) && t < u && 0 <= r && r < u && a.isDark(t, r);
									}),
									(o.add_blank = function (a, u, f, l) {
										var c = o.is_dark,
											g = 1 / s;
										o.is_dark = function (t, r) {
											var e = r * g,
												n = t * g,
												o = e + g,
												i = n + g;
											return c(t, r) && (o < a || f < e || i < u || l < n);
										};
									}),
									o
								);
							})(t, r, i, o);
						} catch (t) {}
				}
				function i(t, r, e) {
					p(e.background)
						? r.drawImage(e.background, 0, 0, e.size, e.size)
						: e.background && ((r.fillStyle = e.background), r.fillRect(e.left, e.top, e.size, e.size));
					var n,
						o,
						i,
						a,
						u,
						f,
						l,
						c,
						g,
						s,
						h,
						d,
						v = e.mode;
					1 === v || 2 === v
						? (function (t, r, e) {
								var n = e.size,
									o = "bold " + e.mSize * n + "px " + e.fontname,
									i = w("<canvas/>")[0].getContext("2d");
								i.font = o;
								var a = i.measureText(e.label).width,
									u = e.mSize,
									f = a / n,
									l = (1 - f) * e.mPosX,
									c = (1 - u) * e.mPosY,
									g = l + f,
									s = c + u;
								1 === e.mode ? t.add_blank(0, c - 0.01, n, s + 0.01) : t.add_blank(l - 0.01, c - 0.01, 0.01 + g, s + 0.01),
									(r.fillStyle = e.fontcolor),
									(r.font = o),
									r.fillText(e.label, l * n, c * n + 0.75 * e.mSize * n);
						  })(t, r, e)
						: !p(e.image) ||
						  (3 !== v && 4 !== v) ||
						  ((n = t),
						  (o = r),
						  (a = (i = e).size),
						  (u = i.image.naturalWidth || 1),
						  (f = i.image.naturalHeight || 1),
						  (l = i.mSize),
						  (g = (1 - (c = (l * u) / f)) * i.mPosX),
						  (s = (1 - l) * i.mPosY),
						  (h = g + c),
						  (d = s + l),
						  3 === i.mode ? n.add_blank(0, s - 0.01, a, d + 0.01) : n.add_blank(g - 0.01, s - 0.01, 0.01 + h, d + 0.01),
						  o.drawImage(i.image, g * a, s * a, c * a, l * a));
				}
				function s(t, r, e, n, o, i, a, u) {
					t.is_dark(a, u) && r.r(n, o, i, i);
				}
				function d(t, r, e, n, o, i, a, u) {
					var f,
						l,
						c,
						g,
						s,
						h,
						d,
						v,
						p,
						w,
						y,
						m,
						b,
						k,
						x,
						B,
						C,
						A,
						M,
						S = n + i,
						L = o + i,
						D = e.radius * i,
						T = a - 1,
						z = a + 1,
						P = u - 1,
						j = u + 1,
						I = t.is_dark,
						_ = I(a, u),
						q = I(T, P),
						O = I(T, u),
						F = I(T, j),
						R = I(a, j),
						H = I(z, j),
						N = I(z, u),
						U = I(z, P),
						V = I(a, P);
					_
						? ((w = r),
						  (y = n),
						  (m = o),
						  (b = S),
						  (k = L),
						  (x = D),
						  (C = !O && !R),
						  (A = !N && !R),
						  (M = !N && !V),
						  (B = !O && !V) ? w.m(y + x, m) : w.m(y, m),
						  C ? w.l(b - x, m).a(b, m, b, k, x) : w.l(b, m),
						  A ? w.l(b, k - x).a(b, k, y, k, x) : w.l(b, k),
						  M ? w.l(y + x, k).a(y, k, y, m, x) : w.l(y, k),
						  B ? w.l(y, m + x).a(y, m, b, m, x) : w.l(y, m))
						: ((f = r),
						  (l = n),
						  (c = o),
						  (g = S),
						  (s = L),
						  (h = D),
						  (d = O && R && F),
						  (v = N && R && H),
						  (p = N && V && U),
						  O &&
								V &&
								q &&
								f
									.m(l + h, c)
									.l(l, c)
									.l(l, c + h)
									.a(l, c, l + h, c, h),
						  d &&
								f
									.m(g - h, c)
									.l(g, c)
									.l(g, c + h)
									.a(g, c, g - h, c, h),
						  v &&
								f
									.m(g - h, s)
									.l(g, s)
									.l(g, s - h)
									.a(g, s, g - h, s, h),
						  p &&
								f
									.m(l + h, s)
									.l(l, s)
									.l(l, s - h)
									.a(l, s, l + h, s, h));
				}
				function n(t, r) {
					var e = h(r.text, r.ecLevel, r.minVersion, r.maxVersion, r.quiet);
					if (!e) return null;
					var n = w(t).data("qrcode", e),
						o = n[0].getContext("2d");
					return (
						i(e, o, r),
						(function (t, e, r) {
							var n = t.module_count,
								o = r.size / n,
								i = s;
							0 < r.radius && r.radius <= 0.5 && (i = d);
							var a = {
								m: function (t, r) {
									return e.moveTo(t, r), a;
								},
								l: function (t, r) {
									return e.lineTo(t, r), a;
								},
								a: function () {
									return e.arcTo.apply(e, arguments), a;
								},
								r: function () {
									return e.rect.apply(e, arguments), a;
								},
							};
							e.beginPath();
							for (var u, f = 0; f < n; f += 1)
								for (var l = 0; l < n; l += 1) {
									var c = r.left + l * o,
										g = r.top + f * o;
									i(t, a, r, c, g, o, f, l);
								}
							p(r.fill)
								? ((e.strokeStyle = "rgba(0,0,0,0.5)"),
								  (e.lineWidth = 2),
								  e.stroke(),
								  (u = e.globalCompositeOperation),
								  (e.globalCompositeOperation = "destination-out"),
								  e.fill(),
								  (e.globalCompositeOperation = u),
								  e.clip(),
								  e.drawImage(r.fill, 0, 0, r.size, r.size),
								  e.restore())
								: ((e.fillStyle = r.fill), e.fill());
						})(e, o, r),
						n
					);
				}
				function e(t) {
					var r = w("<canvas/>").attr("width", t.size).attr("height", t.size);
					return n(r, t);
				}
				function o(t) {
					return "canvas" === t.render
						? e(t)
						: "image" === t.render
						? ((r = t), w("<img/>").attr("src", e(r)[0].toDataURL("image/png")))
						: (function (t) {
								var r = h(t.text, t.ecLevel, t.minVersion, t.maxVersion, t.quiet);
								if (!r) return null;
								var e = t.size,
									n = t.background,
									o = Math.floor,
									i = r.module_count,
									a = o(e / i),
									u = o(0.5 * (e - a * i)),
									f = { position: "relative", left: 0, top: 0, padding: 0, margin: 0, width: e, height: e },
									l = { position: "absolute", padding: 0, margin: 0, width: a, height: a, "background-color": t.fill },
									c = w("<div/>").data("qrcode", r).css(f);
								n && c.css("background-color", n);
								for (var g = 0; g < i; g += 1)
									for (var s = 0; s < i; s += 1)
										r.is_dark(g, s) &&
											w("<div/>")
												.css(l)
												.css({ left: u + s * a, top: u + g * a })
												.appendTo(c);
								return c;
						  })(t);
					var r;
				}
				var w = window.jQuery,
					a = {
						render: "canvas",
						minVersion: 1,
						maxVersion: 40,
						ecLevel: "L",
						left: 0,
						top: 0,
						size: 200,
						fill: "#000",
						background: "#fff",
						text: "no text",
						radius: 0,
						quiet: 0,
						mode: 0,
						mSize: 0.1,
						mPosX: 0.5,
						mPosY: 0.5,
						label: "no label",
						fontname: "sans",
						fontcolor: "#000",
						image: null,
					};
				w.fn.qrcode = t.exports = function (t) {
					var e = w.extend({}, a, t);
					return this.each(function (t, r) {
						"canvas" === r.nodeName.toLowerCase() ? n(r, e) : w(r).append(o(e));
					});
				};
			},
			function (t, r, e) {
				var n,
					o,
					i,
					a = (function () {
						function i(t, r) {
							function a(t, r) {
								(c = (function (t) {
									for (var r = new Array(t), e = 0; e < t; e += 1) {
										r[e] = new Array(t);
										for (var n = 0; n < t; n += 1) r[e][n] = null;
									}
									return r;
								})((g = 4 * u + 17))),
									e(0, 0),
									e(g - 7, 0),
									e(0, g - 7),
									i(),
									o(),
									d(t, r),
									7 <= u && s(t),
									null == n && (n = p(u, f, l)),
									v(n, r);
							}
							var u = t,
								f = y[r],
								c = null,
								g = 0,
								n = null,
								l = [],
								h = {},
								e = function (t, r) {
									for (var e = -1; e <= 7; e += 1)
										if (!(t + e <= -1 || g <= t + e))
											for (var n = -1; n <= 7; n += 1)
												r + n <= -1 ||
													g <= r + n ||
													(c[t + e][r + n] =
														(0 <= e && e <= 6 && (0 == n || 6 == n)) ||
														(0 <= n && n <= 6 && (0 == e || 6 == e)) ||
														(2 <= e && e <= 4 && 2 <= n && n <= 4));
								},
								o = function () {
									for (var t = 8; t < g - 8; t += 1) null == c[t][6] && (c[t][6] = t % 2 == 0);
									for (var r = 8; r < g - 8; r += 1) null == c[6][r] && (c[6][r] = r % 2 == 0);
								},
								i = function () {
									for (var t = m.getPatternPosition(u), r = 0; r < t.length; r += 1)
										for (var e = 0; e < t.length; e += 1) {
											var n = t[r],
												o = t[e];
											if (null == c[n][o])
												for (var i = -2; i <= 2; i += 1)
													for (var a = -2; a <= 2; a += 1)
														c[n + i][o + a] = -2 == i || 2 == i || -2 == a || 2 == a || (0 == i && 0 == a);
										}
								},
								s = function (t) {
									for (var r = m.getBCHTypeNumber(u), e = 0; e < 18; e += 1) {
										var n = !t && 1 == ((r >> e) & 1);
										c[Math.floor(e / 3)][(e % 3) + g - 8 - 3] = n;
									}
									for (e = 0; e < 18; e += 1) {
										n = !t && 1 == ((r >> e) & 1);
										c[(e % 3) + g - 8 - 3][Math.floor(e / 3)] = n;
									}
								},
								d = function (t, r) {
									for (var e = (f << 3) | r, n = m.getBCHTypeInfo(e), o = 0; o < 15; o += 1) {
										var i = !t && 1 == ((n >> o) & 1);
										o < 6 ? (c[o][8] = i) : o < 8 ? (c[o + 1][8] = i) : (c[g - 15 + o][8] = i);
									}
									for (o = 0; o < 15; o += 1) {
										i = !t && 1 == ((n >> o) & 1);
										o < 8 ? (c[8][g - o - 1] = i) : o < 9 ? (c[8][15 - o - 1 + 1] = i) : (c[8][15 - o - 1] = i);
									}
									c[g - 8][8] = !t;
								},
								v = function (t, r) {
									for (var e = -1, n = g - 1, o = 7, i = 0, a = m.getMaskFunction(r), u = g - 1; 0 < u; u -= 2)
										for (6 == u && --u; ; ) {
											for (var f, l = 0; l < 2; l += 1) {
												null == c[n][u - l] &&
													((f = !1),
													i < t.length && (f = 1 == ((t[i] >>> o) & 1)),
													a(n, u - l) && (f = !f),
													(c[n][u - l] = f),
													-1 == --o && ((i += 1), (o = 7)));
											}
											if ((n += e) < 0 || g <= n) {
												(n -= e), (e = -e);
												break;
											}
										}
								},
								p = function (t, r, e) {
									for (var n = A.getRSBlocks(t, r), o = M(), i = 0; i < e.length; i += 1) {
										var a = e[i];
										o.put(a.getMode(), 4), o.put(a.getLength(), m.getLengthInBits(a.getMode(), t)), a.write(o);
									}
									for (var u = 0, i = 0; i < n.length; i += 1) u += n[i].dataCount;
									if (o.getLengthInBits() > 8 * u) throw "code length overflow. (" + o.getLengthInBits() + ">" + 8 * u + ")";
									for (o.getLengthInBits() + 4 <= 8 * u && o.put(0, 4); o.getLengthInBits() % 8 != 0; ) o.putBit(!1);
									for (; !(o.getLengthInBits() >= 8 * u || (o.put(236, 8), o.getLengthInBits() >= 8 * u)); ) o.put(17, 8);
									return (function (t, r) {
										for (var e = 0, n = 0, o = 0, i = new Array(r.length), a = new Array(r.length), u = 0; u < r.length; u += 1) {
											var f = r[u].dataCount,
												l = r[u].totalCount - f,
												n = Math.max(n, f),
												o = Math.max(o, l);
											i[u] = new Array(f);
											for (var c = 0; c < i[u].length; c += 1) i[u][c] = 255 & t.getBuffer()[c + e];
											e += f;
											var g = m.getErrorCorrectPolynomial(l),
												s = b(i[u], g.getLength() - 1).mod(g);
											a[u] = new Array(g.getLength() - 1);
											for (c = 0; c < a[u].length; c += 1) {
												var h = c + s.getLength() - a[u].length;
												a[u][c] = 0 <= h ? s.getAt(h) : 0;
											}
										}
										for (var d = 0, c = 0; c < r.length; c += 1) d += r[c].totalCount;
										for (var v = new Array(d), p = 0, c = 0; c < n; c += 1)
											for (u = 0; u < r.length; u += 1) c < i[u].length && ((v[p] = i[u][c]), (p += 1));
										for (c = 0; c < o; c += 1) for (u = 0; u < r.length; u += 1) c < a[u].length && ((v[p] = a[u][c]), (p += 1));
										return v;
									})(o, n);
								};
							(h.addData = function (t, r) {
								var e = null;
								switch ((r = r || "Byte")) {
									case "Numeric":
										e = S(t);
										break;
									case "Alphanumeric":
										e = L(t);
										break;
									case "Byte":
										e = D(t);
										break;
									case "Kanji":
										e = T(t);
										break;
									default:
										throw "mode:" + r;
								}
								l.push(e), (n = null);
							}),
								(h.isDark = function (t, r) {
									if (t < 0 || g <= t || r < 0 || g <= r) throw t + "," + r;
									return c[t][r];
								}),
								(h.getModuleCount = function () {
									return g;
								}),
								(h.make = function () {
									if (u < 1) {
										for (var t = 1; t < 40; t++) {
											for (var r = A.getRSBlocks(t, f), e = M(), n = 0; n < l.length; n++) {
												var o = l[n];
												e.put(o.getMode(), 4), e.put(o.getLength(), m.getLengthInBits(o.getMode(), t)), o.write(e);
											}
											for (var i = 0, n = 0; n < r.length; n++) i += r[n].dataCount;
											if (e.getLengthInBits() <= 8 * i) break;
										}
										u = t;
									}
									a(
										!1,
										(function () {
											for (var t = 0, r = 0, e = 0; e < 8; e += 1) {
												a(!0, e);
												var n = m.getLostPoint(h);
												(0 == e || n < t) && ((t = n), (r = e));
											}
											return r;
										})()
									);
								}),
								(h.createTableTag = function (t, r) {
									t = t || 2;
									var e = "";
									(e += '<table style="'),
										(e += " border-width: 0px; border-style: none;"),
										(e += " border-collapse: collapse;"),
										(e += " padding: 0px; margin: " + (r = void 0 === r ? 4 * t : r) + "px;"),
										(e += '">'),
										(e += "<tbody>");
									for (var n = 0; n < h.getModuleCount(); n += 1) {
										e += "<tr>";
										for (var o = 0; o < h.getModuleCount(); o += 1)
											(e += '<td style="'),
												(e += " border-width: 0px; border-style: none;"),
												(e += " border-collapse: collapse;"),
												(e += " padding: 0px; margin: 0px;"),
												(e += " width: " + t + "px;"),
												(e += " height: " + t + "px;"),
												(e += " background-color: "),
												(e += h.isDark(n, o) ? "#000000" : "#ffffff"),
												(e += ";"),
												(e += '"/>');
										e += "</tr>";
									}
									return (e += "</tbody>"), (e += "</table>");
								}),
								(h.createSvgTag = function (t, r, e, n) {
									var o = {};
									"object" == typeof arguments[0] &&
										((t = (o = arguments[0]).cellSize), (r = o.margin), (e = o.alt), (n = o.title)),
										(t = t || 2),
										(r = void 0 === r ? 4 * t : r),
										((e = "string" == typeof e ? { text: e } : e || {}).text = e.text || null),
										(e.id = e.text ? e.id || "qrcode-description" : null),
										((n = "string" == typeof n ? { text: n } : n || {}).text = n.text || null),
										(n.id = n.text ? n.id || "qrcode-title" : null);
									var i,
										a,
										u,
										f = h.getModuleCount() * t + 2 * r,
										l = "",
										c = "l" + t + ",0 0," + t + " -" + t + ",0 0,-" + t + "z ";
									for (
										l += '<svg version="1.1" xmlns="http://www.w3.org/2000/svg"',
											l += o.scalable ? "" : ' width="' + f + 'px" height="' + f + 'px"',
											l += ' viewBox="0 0 ' + f + " " + f + '" ',
											l += ' preserveAspectRatio="xMinYMin meet"',
											l += n.text || e.text ? ' role="img" aria-labelledby="' + w([n.id, e.id].join(" ").trim()) + '"' : "",
											l += ">",
											l += n.text ? '<title id="' + w(n.id) + '">' + w(n.text) + "</title>" : "",
											l += e.text ? '<description id="' + w(e.id) + '">' + w(e.text) + "</description>" : "",
											l += '<rect width="100%" height="100%" fill="white" cx="0" cy="0"/>',
											l += '<path d="',
											a = 0;
										a < h.getModuleCount();
										a += 1
									)
										for (u = a * t + r, i = 0; i < h.getModuleCount(); i += 1)
											h.isDark(a, i) && (l += "M" + (i * t + r) + "," + u + c);
									return (l += '" stroke="transparent" fill="black"/>'), (l += "</svg>");
								}),
								(h.createDataURL = function (o, t) {
									(o = o || 2), (t = void 0 === t ? 4 * o : t);
									var r = h.getModuleCount() * o + 2 * t,
										i = t,
										a = r - t;
									return P(r, r, function (t, r) {
										if (i <= t && t < a && i <= r && r < a) {
											var e = Math.floor((t - i) / o),
												n = Math.floor((r - i) / o);
											return h.isDark(n, e) ? 0 : 1;
										}
										return 1;
									});
								}),
								(h.createImgTag = function (t, r, e) {
									(t = t || 2), (r = void 0 === r ? 4 * t : r);
									var n = h.getModuleCount() * t + 2 * r,
										o = "";
									return (
										(o += "<img"),
										(o += ' src="'),
										(o += h.createDataURL(t, r)),
										(o += '"'),
										(o += ' width="'),
										(o += n),
										(o += '"'),
										(o += ' height="'),
										(o += n),
										(o += '"'),
										e && ((o += ' alt="'), (o += w(e)), (o += '"')),
										(o += "/>")
									);
								});
							var w = function (t) {
								for (var r = "", e = 0; e < t.length; e += 1) {
									var n = t.charAt(e);
									switch (n) {
										case "<":
											r += "&lt;";
											break;
										case ">":
											r += "&gt;";
											break;
										case "&":
											r += "&amp;";
											break;
										case '"':
											r += "&quot;";
											break;
										default:
											r += n;
									}
								}
								return r;
							};
							return (
								(h.createASCII = function (t, r) {
									if ((t = t || 1) < 2)
										return (function (t) {
											t = void 0 === t ? 2 : t;
											for (
												var r,
													e,
													n,
													o,
													i = +h.getModuleCount() + 2 * t,
													a = t,
													u = i - t,
													f = { "██": "█", "█ ": "▀", " █": "▄", "  ": " " },
													l = { "██": "▀", "█ ": "▀", " █": " ", "  ": " " },
													c = "",
													g = 0;
												g < i;
												g += 2
											) {
												for (e = Math.floor(g - a), n = Math.floor(g + 1 - a), r = 0; r < i; r += 1)
													(o = "█"),
														a <= r && r < u && a <= g && g < u && h.isDark(e, Math.floor(r - a)) && (o = " "),
														a <= r && r < u && a <= g + 1 && g + 1 < u && h.isDark(n, Math.floor(r - a))
															? (o += " ")
															: (o += "█"),
														(c += t < 1 && u <= g + 1 ? l[o] : f[o]);
												c += "\n";
											}
											return i % 2 && 0 < t
												? c.substring(0, c.length - i - 1) + Array(1 + i).join("▀")
												: c.substring(0, c.length - 1);
										})(r);
									--t, (r = void 0 === r ? 2 * t : r);
									for (
										var e,
											n,
											o,
											i = h.getModuleCount() * t + 2 * r,
											a = r,
											u = i - r,
											f = Array(t + 1).join("██"),
											l = Array(t + 1).join("  "),
											c = "",
											g = "",
											s = 0;
										s < i;
										s += 1
									) {
										for (n = Math.floor((s - a) / t), g = "", e = 0; e < i; e += 1)
											(o = 1),
												a <= e && e < u && a <= s && s < u && h.isDark(n, Math.floor((e - a) / t)) && (o = 0),
												(g += o ? f : l);
										for (n = 0; n < t; n += 1) c += g + "\n";
									}
									return c.substring(0, c.length - 1);
								}),
								(h.renderTo2dContext = function (t, r) {
									r = r || 2;
									for (var e = h.getModuleCount(), n = 0; n < e; n++)
										for (var o = 0; o < e; o++)
											(t.fillStyle = h.isDark(n, o) ? "black" : "white"), t.fillRect(n * r, o * r, r, r);
								}),
								h
							);
						}
						(i.stringToBytes = (i.stringToBytesFuncs = {
							default: function (t) {
								for (var r = [], e = 0; e < t.length; e += 1) {
									var n = t.charCodeAt(e);
									r.push(255 & n);
								}
								return r;
							},
						}).default),
							(i.createStringToBytes = function (u, f) {
								var i = (function () {
										function t() {
											var t = r.read();
											if (-1 == t) throw "eof";
											return t;
										}
										for (var r = z(u), e = 0, n = {}; ; ) {
											var o = r.read();
											if (-1 == o) break;
											var i = t(),
												a = (t() << 8) | t();
											(n[String.fromCharCode((o << 8) | i)] = a), (e += 1);
										}
										if (e != f) throw e + " != " + f;
										return n;
									})(),
									a = "?".charCodeAt(0);
								return function (t) {
									for (var r = [], e = 0; e < t.length; e += 1) {
										var n,
											o = t.charCodeAt(e);
										o < 128
											? r.push(o)
											: "number" == typeof (n = i[t.charAt(e)])
											? (255 & n) == n
												? r.push(n)
												: (r.push(n >>> 8), r.push(255 & n))
											: r.push(a);
									}
									return r;
								};
							});
						var r,
							t,
							a = 1,
							u = 2,
							o = 4,
							f = 8,
							y = { L: 1, M: 0, Q: 3, H: 2 },
							e = 0,
							n = 1,
							l = 2,
							c = 3,
							g = 4,
							s = 5,
							h = 6,
							d = 7,
							m =
								((r = [
									[],
									[6, 18],
									[6, 22],
									[6, 26],
									[6, 30],
									[6, 34],
									[6, 22, 38],
									[6, 24, 42],
									[6, 26, 46],
									[6, 28, 50],
									[6, 30, 54],
									[6, 32, 58],
									[6, 34, 62],
									[6, 26, 46, 66],
									[6, 26, 48, 70],
									[6, 26, 50, 74],
									[6, 30, 54, 78],
									[6, 30, 56, 82],
									[6, 30, 58, 86],
									[6, 34, 62, 90],
									[6, 28, 50, 72, 94],
									[6, 26, 50, 74, 98],
									[6, 30, 54, 78, 102],
									[6, 28, 54, 80, 106],
									[6, 32, 58, 84, 110],
									[6, 30, 58, 86, 114],
									[6, 34, 62, 90, 118],
									[6, 26, 50, 74, 98, 122],
									[6, 30, 54, 78, 102, 126],
									[6, 26, 52, 78, 104, 130],
									[6, 30, 56, 82, 108, 134],
									[6, 34, 60, 86, 112, 138],
									[6, 30, 58, 86, 114, 142],
									[6, 34, 62, 90, 118, 146],
									[6, 30, 54, 78, 102, 126, 150],
									[6, 24, 50, 76, 102, 128, 154],
									[6, 28, 54, 80, 106, 132, 158],
									[6, 32, 58, 84, 110, 136, 162],
									[6, 26, 54, 82, 110, 138, 166],
									[6, 30, 58, 86, 114, 142, 170],
								]),
								((t = {}).getBCHTypeInfo = function (t) {
									for (var r = t << 10; 0 <= v(r) - v(1335); ) r ^= 1335 << (v(r) - v(1335));
									return 21522 ^ ((t << 10) | r);
								}),
								(t.getBCHTypeNumber = function (t) {
									for (var r = t << 12; 0 <= v(r) - v(7973); ) r ^= 7973 << (v(r) - v(7973));
									return (t << 12) | r;
								}),
								(t.getPatternPosition = function (t) {
									return r[t - 1];
								}),
								(t.getMaskFunction = function (t) {
									switch (t) {
										case e:
											return function (t, r) {
												return (t + r) % 2 == 0;
											};
										case n:
											return function (t, r) {
												return t % 2 == 0;
											};
										case l:
											return function (t, r) {
												return r % 3 == 0;
											};
										case c:
											return function (t, r) {
												return (t + r) % 3 == 0;
											};
										case g:
											return function (t, r) {
												return (Math.floor(t / 2) + Math.floor(r / 3)) % 2 == 0;
											};
										case s:
											return function (t, r) {
												return ((t * r) % 2) + ((t * r) % 3) == 0;
											};
										case h:
											return function (t, r) {
												return (((t * r) % 2) + ((t * r) % 3)) % 2 == 0;
											};
										case d:
											return function (t, r) {
												return (((t * r) % 3) + ((t + r) % 2)) % 2 == 0;
											};
										default:
											throw "bad maskPattern:" + t;
									}
								}),
								(t.getErrorCorrectPolynomial = function (t) {
									for (var r = b([1], 0), e = 0; e < t; e += 1) r = r.multiply(b([1, p.gexp(e)], 0));
									return r;
								}),
								(t.getLengthInBits = function (t, r) {
									if (1 <= r && r < 10)
										switch (t) {
											case a:
												return 10;
											case u:
												return 9;
											case o:
											case f:
												return 8;
											default:
												throw "mode:" + t;
										}
									else if (r < 27)
										switch (t) {
											case a:
												return 12;
											case u:
												return 11;
											case o:
												return 16;
											case f:
												return 10;
											default:
												throw "mode:" + t;
										}
									else {
										if (!(r < 41)) throw "type:" + r;
										switch (t) {
											case a:
												return 14;
											case u:
												return 13;
											case o:
												return 16;
											case f:
												return 12;
											default:
												throw "mode:" + t;
										}
									}
								}),
								(t.getLostPoint = function (t) {
									for (var r = t.getModuleCount(), e = 0, n = 0; n < r; n += 1)
										for (var o = 0; o < r; o += 1) {
											for (var i = 0, a = t.isDark(n, o), u = -1; u <= 1; u += 1)
												if (!(n + u < 0 || r <= n + u))
													for (var f = -1; f <= 1; f += 1)
														o + f < 0 || r <= o + f || (0 == u && 0 == f) || (a == t.isDark(n + u, o + f) && (i += 1));
											5 < i && (e += 3 + i - 5);
										}
									for (n = 0; n < r - 1; n += 1)
										for (o = 0; o < r - 1; o += 1) {
											var l = 0;
											t.isDark(n, o) && (l += 1),
												t.isDark(n + 1, o) && (l += 1),
												t.isDark(n, o + 1) && (l += 1),
												t.isDark(n + 1, o + 1) && (l += 1),
												(0 != l && 4 != l) || (e += 3);
										}
									for (n = 0; n < r; n += 1)
										for (o = 0; o < r - 6; o += 1)
											t.isDark(n, o) &&
												!t.isDark(n, o + 1) &&
												t.isDark(n, o + 2) &&
												t.isDark(n, o + 3) &&
												t.isDark(n, o + 4) &&
												!t.isDark(n, o + 5) &&
												t.isDark(n, o + 6) &&
												(e += 40);
									for (o = 0; o < r; o += 1)
										for (n = 0; n < r - 6; n += 1)
											t.isDark(n, o) &&
												!t.isDark(n + 1, o) &&
												t.isDark(n + 2, o) &&
												t.isDark(n + 3, o) &&
												t.isDark(n + 4, o) &&
												!t.isDark(n + 5, o) &&
												t.isDark(n + 6, o) &&
												(e += 40);
									for (var c = 0, o = 0; o < r; o += 1) for (n = 0; n < r; n += 1) t.isDark(n, o) && (c += 1);
									return (e += (Math.abs((100 * c) / r / r - 50) / 5) * 10);
								}),
								t);
						function v(t) {
							for (var r = 0; 0 != t; ) (r += 1), (t >>>= 1);
							return r;
						}
						var p = (function () {
							for (var r = new Array(256), e = new Array(256), t = 0; t < 8; t += 1) r[t] = 1 << t;
							for (t = 8; t < 256; t += 1) r[t] = r[t - 4] ^ r[t - 5] ^ r[t - 6] ^ r[t - 8];
							for (t = 0; t < 255; t += 1) e[r[t]] = t;
							var n = {
								glog: function (t) {
									if (t < 1) throw "glog(" + t + ")";
									return e[t];
								},
								gexp: function (t) {
									for (; t < 0; ) t += 255;
									for (; 256 <= t; ) t -= 255;
									return r[t];
								},
							};
							return n;
						})();
						function b(n, o) {
							if (void 0 === n.length) throw n.length + "/" + o;
							var r = (function () {
									for (var t = 0; t < n.length && 0 == n[t]; ) t += 1;
									for (var r = new Array(n.length - t + o), e = 0; e < n.length - t; e += 1) r[e] = n[e + t];
									return r;
								})(),
								i = {
									getAt: function (t) {
										return r[t];
									},
									getLength: function () {
										return r.length;
									},
									multiply: function (t) {
										for (var r = new Array(i.getLength() + t.getLength() - 1), e = 0; e < i.getLength(); e += 1)
											for (var n = 0; n < t.getLength(); n += 1) r[e + n] ^= p.gexp(p.glog(i.getAt(e)) + p.glog(t.getAt(n)));
										return b(r, 0);
									},
									mod: function (t) {
										if (i.getLength() - t.getLength() < 0) return i;
										for (
											var r = p.glog(i.getAt(0)) - p.glog(t.getAt(0)), e = new Array(i.getLength()), n = 0;
											n < i.getLength();
											n += 1
										)
											e[n] = i.getAt(n);
										for (n = 0; n < t.getLength(); n += 1) e[n] ^= p.gexp(p.glog(t.getAt(n)) + r);
										return b(e, 0).mod(t);
									},
								};
							return i;
						}
						function w() {
							var e = [],
								o = {
									writeByte: function (t) {
										e.push(255 & t);
									},
									writeShort: function (t) {
										o.writeByte(t), o.writeByte(t >>> 8);
									},
									writeBytes: function (t, r, e) {
										(r = r || 0), (e = e || t.length);
										for (var n = 0; n < e; n += 1) o.writeByte(t[n + r]);
									},
									writeString: function (t) {
										for (var r = 0; r < t.length; r += 1) o.writeByte(t.charCodeAt(r));
									},
									toByteArray: function () {
										return e;
									},
									toString: function () {
										var t = "";
										t += "[";
										for (var r = 0; r < e.length; r += 1) 0 < r && (t += ","), (t += e[r]);
										return (t += "]");
									},
								};
							return o;
						}
						function k() {
							function e(t) {
								a += String.fromCharCode(r(63 & t));
							}
							var n = 0,
								o = 0,
								i = 0,
								a = "",
								t = {},
								r = function (t) {
									if (!(t < 0)) {
										if (t < 26) return 65 + t;
										if (t < 52) return t - 26 + 97;
										if (t < 62) return t - 52 + 48;
										if (62 == t) return 43;
										if (63 == t) return 47;
									}
									throw "n:" + t;
								};
							return (
								(t.writeByte = function (t) {
									for (n = (n << 8) | (255 & t), o += 8, i += 1; 6 <= o; ) e(n >>> (o - 6)), (o -= 6);
								}),
								(t.flush = function () {
									if ((0 < o && (e(n << (6 - o)), (o = n = 0)), i % 3 != 0))
										for (var t = 3 - (i % 3), r = 0; r < t; r += 1) a += "=";
								}),
								(t.toString = function () {
									return a;
								}),
								t
							);
						}
						function x(t, r) {
							var n = t,
								o = r,
								d = new Array(t * r),
								e = {
									setPixel: function (t, r, e) {
										d[r * n + t] = e;
									},
									write: function (t) {
										t.writeString("GIF87a"),
											t.writeShort(n),
											t.writeShort(o),
											t.writeByte(128),
											t.writeByte(0),
											t.writeByte(0),
											t.writeByte(0),
											t.writeByte(0),
											t.writeByte(0),
											t.writeByte(255),
											t.writeByte(255),
											t.writeByte(255),
											t.writeString(","),
											t.writeShort(0),
											t.writeShort(0),
											t.writeShort(n),
											t.writeShort(o),
											t.writeByte(0);
										var r = i(2);
										t.writeByte(2);
										for (var e = 0; 255 < r.length - e; ) t.writeByte(255), t.writeBytes(r, e, 255), (e += 255);
										t.writeByte(r.length - e), t.writeBytes(r, e, r.length - e), t.writeByte(0), t.writeString(";");
									},
								},
								i = function (t) {
									for (var r = 1 << t, e = 1 + (1 << t), n = t + 1, o = v(), i = 0; i < r; i += 1) o.add(String.fromCharCode(i));
									o.add(String.fromCharCode(r)), o.add(String.fromCharCode(e));
									var a,
										u,
										f,
										l = w(),
										c =
											((a = l),
											(f = u = 0),
											{
												write: function (t, r) {
													if (t >>> r != 0) throw "length over";
													for (; 8 <= u + r; ) a.writeByte(255 & ((t << u) | f)), (r -= 8 - u), (t >>>= 8 - u), (u = f = 0);
													(f |= t << u), (u += r);
												},
												flush: function () {
													0 < u && a.writeByte(f);
												},
											});
									c.write(r, n);
									var g = 0,
										s = String.fromCharCode(d[g]);
									for (g += 1; g < d.length; ) {
										var h = String.fromCharCode(d[g]);
										(g += 1),
											o.contains(s + h)
												? (s += h)
												: (c.write(o.indexOf(s), n),
												  o.size() < 4095 && (o.size() == 1 << n && (n += 1), o.add(s + h)),
												  (s = h));
									}
									return c.write(o.indexOf(s), n), c.write(e, n), c.flush(), l.toByteArray();
								},
								v = function () {
									var r = {},
										e = 0,
										n = {
											add: function (t) {
												if (n.contains(t)) throw "dup key:" + t;
												(r[t] = e), (e += 1);
											},
											size: function () {
												return e;
											},
											indexOf: function (t) {
												return r[t];
											},
											contains: function (t) {
												return void 0 !== r[t];
											},
										};
									return n;
								};
							return e;
						}
						var B,
							C,
							A =
								((B = [
									[1, 26, 19],
									[1, 26, 16],
									[1, 26, 13],
									[1, 26, 9],
									[1, 44, 34],
									[1, 44, 28],
									[1, 44, 22],
									[1, 44, 16],
									[1, 70, 55],
									[1, 70, 44],
									[2, 35, 17],
									[2, 35, 13],
									[1, 100, 80],
									[2, 50, 32],
									[2, 50, 24],
									[4, 25, 9],
									[1, 134, 108],
									[2, 67, 43],
									[2, 33, 15, 2, 34, 16],
									[2, 33, 11, 2, 34, 12],
									[2, 86, 68],
									[4, 43, 27],
									[4, 43, 19],
									[4, 43, 15],
									[2, 98, 78],
									[4, 49, 31],
									[2, 32, 14, 4, 33, 15],
									[4, 39, 13, 1, 40, 14],
									[2, 121, 97],
									[2, 60, 38, 2, 61, 39],
									[4, 40, 18, 2, 41, 19],
									[4, 40, 14, 2, 41, 15],
									[2, 146, 116],
									[3, 58, 36, 2, 59, 37],
									[4, 36, 16, 4, 37, 17],
									[4, 36, 12, 4, 37, 13],
									[2, 86, 68, 2, 87, 69],
									[4, 69, 43, 1, 70, 44],
									[6, 43, 19, 2, 44, 20],
									[6, 43, 15, 2, 44, 16],
									[4, 101, 81],
									[1, 80, 50, 4, 81, 51],
									[4, 50, 22, 4, 51, 23],
									[3, 36, 12, 8, 37, 13],
									[2, 116, 92, 2, 117, 93],
									[6, 58, 36, 2, 59, 37],
									[4, 46, 20, 6, 47, 21],
									[7, 42, 14, 4, 43, 15],
									[4, 133, 107],
									[8, 59, 37, 1, 60, 38],
									[8, 44, 20, 4, 45, 21],
									[12, 33, 11, 4, 34, 12],
									[3, 145, 115, 1, 146, 116],
									[4, 64, 40, 5, 65, 41],
									[11, 36, 16, 5, 37, 17],
									[11, 36, 12, 5, 37, 13],
									[5, 109, 87, 1, 110, 88],
									[5, 65, 41, 5, 66, 42],
									[5, 54, 24, 7, 55, 25],
									[11, 36, 12, 7, 37, 13],
									[5, 122, 98, 1, 123, 99],
									[7, 73, 45, 3, 74, 46],
									[15, 43, 19, 2, 44, 20],
									[3, 45, 15, 13, 46, 16],
									[1, 135, 107, 5, 136, 108],
									[10, 74, 46, 1, 75, 47],
									[1, 50, 22, 15, 51, 23],
									[2, 42, 14, 17, 43, 15],
									[5, 150, 120, 1, 151, 121],
									[9, 69, 43, 4, 70, 44],
									[17, 50, 22, 1, 51, 23],
									[2, 42, 14, 19, 43, 15],
									[3, 141, 113, 4, 142, 114],
									[3, 70, 44, 11, 71, 45],
									[17, 47, 21, 4, 48, 22],
									[9, 39, 13, 16, 40, 14],
									[3, 135, 107, 5, 136, 108],
									[3, 67, 41, 13, 68, 42],
									[15, 54, 24, 5, 55, 25],
									[15, 43, 15, 10, 44, 16],
									[4, 144, 116, 4, 145, 117],
									[17, 68, 42],
									[17, 50, 22, 6, 51, 23],
									[19, 46, 16, 6, 47, 17],
									[2, 139, 111, 7, 140, 112],
									[17, 74, 46],
									[7, 54, 24, 16, 55, 25],
									[34, 37, 13],
									[4, 151, 121, 5, 152, 122],
									[4, 75, 47, 14, 76, 48],
									[11, 54, 24, 14, 55, 25],
									[16, 45, 15, 14, 46, 16],
									[6, 147, 117, 4, 148, 118],
									[6, 73, 45, 14, 74, 46],
									[11, 54, 24, 16, 55, 25],
									[30, 46, 16, 2, 47, 17],
									[8, 132, 106, 4, 133, 107],
									[8, 75, 47, 13, 76, 48],
									[7, 54, 24, 22, 55, 25],
									[22, 45, 15, 13, 46, 16],
									[10, 142, 114, 2, 143, 115],
									[19, 74, 46, 4, 75, 47],
									[28, 50, 22, 6, 51, 23],
									[33, 46, 16, 4, 47, 17],
									[8, 152, 122, 4, 153, 123],
									[22, 73, 45, 3, 74, 46],
									[8, 53, 23, 26, 54, 24],
									[12, 45, 15, 28, 46, 16],
									[3, 147, 117, 10, 148, 118],
									[3, 73, 45, 23, 74, 46],
									[4, 54, 24, 31, 55, 25],
									[11, 45, 15, 31, 46, 16],
									[7, 146, 116, 7, 147, 117],
									[21, 73, 45, 7, 74, 46],
									[1, 53, 23, 37, 54, 24],
									[19, 45, 15, 26, 46, 16],
									[5, 145, 115, 10, 146, 116],
									[19, 75, 47, 10, 76, 48],
									[15, 54, 24, 25, 55, 25],
									[23, 45, 15, 25, 46, 16],
									[13, 145, 115, 3, 146, 116],
									[2, 74, 46, 29, 75, 47],
									[42, 54, 24, 1, 55, 25],
									[23, 45, 15, 28, 46, 16],
									[17, 145, 115],
									[10, 74, 46, 23, 75, 47],
									[10, 54, 24, 35, 55, 25],
									[19, 45, 15, 35, 46, 16],
									[17, 145, 115, 1, 146, 116],
									[14, 74, 46, 21, 75, 47],
									[29, 54, 24, 19, 55, 25],
									[11, 45, 15, 46, 46, 16],
									[13, 145, 115, 6, 146, 116],
									[14, 74, 46, 23, 75, 47],
									[44, 54, 24, 7, 55, 25],
									[59, 46, 16, 1, 47, 17],
									[12, 151, 121, 7, 152, 122],
									[12, 75, 47, 26, 76, 48],
									[39, 54, 24, 14, 55, 25],
									[22, 45, 15, 41, 46, 16],
									[6, 151, 121, 14, 152, 122],
									[6, 75, 47, 34, 76, 48],
									[46, 54, 24, 10, 55, 25],
									[2, 45, 15, 64, 46, 16],
									[17, 152, 122, 4, 153, 123],
									[29, 74, 46, 14, 75, 47],
									[49, 54, 24, 10, 55, 25],
									[24, 45, 15, 46, 46, 16],
									[4, 152, 122, 18, 153, 123],
									[13, 74, 46, 32, 75, 47],
									[48, 54, 24, 14, 55, 25],
									[42, 45, 15, 32, 46, 16],
									[20, 147, 117, 4, 148, 118],
									[40, 75, 47, 7, 76, 48],
									[43, 54, 24, 22, 55, 25],
									[10, 45, 15, 67, 46, 16],
									[19, 148, 118, 6, 149, 119],
									[18, 75, 47, 31, 76, 48],
									[34, 54, 24, 34, 55, 25],
									[20, 45, 15, 61, 46, 16],
								]),
								((C = {}).getRSBlocks = function (t, r) {
									var e = (function (t, r) {
										switch (r) {
											case y.L:
												return B[4 * (t - 1) + 0];
											case y.M:
												return B[4 * (t - 1) + 1];
											case y.Q:
												return B[4 * (t - 1) + 2];
											case y.H:
												return B[4 * (t - 1) + 3];
											default:
												return;
										}
									})(t, r);
									if (void 0 === e) throw "bad rs block @ typeNumber:" + t + "/errorCorrectionLevel:" + r;
									for (var n, o, i = e.length / 3, a = [], u = 0; u < i; u += 1)
										for (var f = e[3 * u + 0], l = e[3 * u + 1], c = e[3 * u + 2], g = 0; g < f; g += 1)
											a.push(((n = c), (o = void 0), ((o = {}).totalCount = l), (o.dataCount = n), o));
									return a;
								}),
								C),
							M = function () {
								var e = [],
									n = 0,
									o = {
										getBuffer: function () {
											return e;
										},
										getAt: function (t) {
											var r = Math.floor(t / 8);
											return 1 == ((e[r] >>> (7 - (t % 8))) & 1);
										},
										put: function (t, r) {
											for (var e = 0; e < r; e += 1) o.putBit(1 == ((t >>> (r - e - 1)) & 1));
										},
										getLengthInBits: function () {
											return n;
										},
										putBit: function (t) {
											var r = Math.floor(n / 8);
											e.length <= r && e.push(0), t && (e[r] |= 128 >>> n % 8), (n += 1);
										},
									};
								return o;
							},
							S = function (t) {
								var r = a,
									n = t,
									e = {
										getMode: function () {
											return r;
										},
										getLength: function (t) {
											return n.length;
										},
										write: function (t) {
											for (var r = n, e = 0; e + 2 < r.length; ) t.put(o(r.substring(e, e + 3)), 10), (e += 3);
											e < r.length &&
												(r.length - e == 1
													? t.put(o(r.substring(e, e + 1)), 4)
													: r.length - e == 2 && t.put(o(r.substring(e, e + 2)), 7));
										},
									},
									o = function (t) {
										for (var r = 0, e = 0; e < t.length; e += 1) r = 10 * r + i(t.charAt(e));
										return r;
									},
									i = function (t) {
										if ("0" <= t && t <= "9") return t.charCodeAt(0) - "0".charCodeAt(0);
										throw "illegal char :" + t;
									};
								return e;
							},
							L = function (t) {
								var r = u,
									n = t,
									e = {
										getMode: function () {
											return r;
										},
										getLength: function (t) {
											return n.length;
										},
										write: function (t) {
											for (var r = n, e = 0; e + 1 < r.length; ) t.put(45 * o(r.charAt(e)) + o(r.charAt(e + 1)), 11), (e += 2);
											e < r.length && t.put(o(r.charAt(e)), 6);
										},
									},
									o = function (t) {
										if ("0" <= t && t <= "9") return t.charCodeAt(0) - "0".charCodeAt(0);
										if ("A" <= t && t <= "Z") return t.charCodeAt(0) - "A".charCodeAt(0) + 10;
										switch (t) {
											case " ":
												return 36;
											case "$":
												return 37;
											case "%":
												return 38;
											case "*":
												return 39;
											case "+":
												return 40;
											case "-":
												return 41;
											case ".":
												return 42;
											case "/":
												return 43;
											case ":":
												return 44;
											default:
												throw "illegal char :" + t;
										}
									};
								return e;
							},
							D = function (t) {
								var r = o,
									e = i.stringToBytes(t),
									n = {
										getMode: function () {
											return r;
										},
										getLength: function (t) {
											return e.length;
										},
										write: function (t) {
											for (var r = 0; r < e.length; r += 1) t.put(e[r], 8);
										},
									};
								return n;
							},
							T = function (t) {
								var r = f,
									e = i.stringToBytesFuncs.SJIS;
								if (!e) throw "sjis not supported.";
								!(function () {
									var t = e("友");
									if (2 != t.length || 38726 != ((t[0] << 8) | t[1])) throw "sjis not supported.";
								})();
								var o = e(t),
									n = {
										getMode: function () {
											return r;
										},
										getLength: function (t) {
											return ~~(o.length / 2);
										},
										write: function (t) {
											for (var r = o, e = 0; e + 1 < r.length; ) {
												var n = ((255 & r[e]) << 8) | (255 & r[e + 1]);
												if (33088 <= n && n <= 40956) n -= 33088;
												else {
													if (!(57408 <= n && n <= 60351)) throw "illegal char at " + (e + 1) + "/" + n;
													n -= 49472;
												}
												(n = 192 * ((n >>> 8) & 255) + (255 & n)), t.put(n, 13), (e += 2);
											}
											if (e < r.length) throw "illegal char at " + (e + 1);
										},
									};
								return n;
							},
							z = function (t) {
								var e = t,
									n = 0,
									o = 0,
									i = 0,
									r = {
										read: function () {
											for (; i < 8; ) {
												if (n >= e.length) {
													if (0 == i) return -1;
													throw "unexpected end of file./" + i;
												}
												var t = e.charAt(n);
												if (((n += 1), "=" == t)) return (i = 0), -1;
												t.match(/^\s$/) || ((o = (o << 6) | a(t.charCodeAt(0))), (i += 6));
											}
											var r = (o >>> (i - 8)) & 255;
											return (i -= 8), r;
										},
									},
									a = function (t) {
										if (65 <= t && t <= 90) return t - 65;
										if (97 <= t && t <= 122) return t - 97 + 26;
										if (48 <= t && t <= 57) return t - 48 + 52;
										if (43 == t) return 62;
										if (47 == t) return 63;
										throw "c:" + t;
									};
								return r;
							},
							P = function (t, r, e) {
								for (var n = x(t, r), o = 0; o < r; o += 1) for (var i = 0; i < t; i += 1) n.setPixel(i, o, e(i, o));
								var a = w();
								n.write(a);
								for (var u = k(), f = a.toByteArray(), l = 0; l < f.length; l += 1) u.writeByte(f[l]);
								return u.flush(), "data:image/gif;base64," + u;
							};
						return i;
					})();
				(a.stringToBytesFuncs["UTF-8"] = function (t) {
					return (function (t) {
						for (var r = [], e = 0; e < t.length; e++) {
							var n = t.charCodeAt(e);
							n < 128
								? r.push(n)
								: n < 2048
								? r.push(192 | (n >> 6), 128 | (63 & n))
								: n < 55296 || 57344 <= n
								? r.push(224 | (n >> 12), 128 | ((n >> 6) & 63), 128 | (63 & n))
								: (e++,
								  (n = 65536 + (((1023 & n) << 10) | (1023 & t.charCodeAt(e)))),
								  r.push(240 | (n >> 18), 128 | ((n >> 12) & 63), 128 | ((n >> 6) & 63), 128 | (63 & n)));
						}
						return r;
					})(t);
				}),
					(o = []),
					void 0 ===
						(i =
							"function" ==
							typeof (n = function () {
								return a;
							})
								? n.apply(r, o)
								: n) || (t.exports = i);
			},
		]),
		(o.c = n),
		(o.d = function (t, r, e) {
			o.o(t, r) || Object.defineProperty(t, r, { enumerable: !0, get: e });
		}),
		(o.r = function (t) {
			"undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, { value: "Module" }),
				Object.defineProperty(t, "__esModule", { value: !0 });
		}),
		(o.t = function (r, t) {
			if ((1 & t && (r = o(r)), 8 & t)) return r;
			if (4 & t && "object" == typeof r && r && r.__esModule) return r;
			var e = Object.create(null);
			if ((o.r(e), Object.defineProperty(e, "default", { enumerable: !0, value: r }), 2 & t && "string" != typeof r))
				for (var n in r)
					o.d(
						e,
						n,
						function (t) {
							return r[t];
						}.bind(null, n)
					);
			return e;
		}),
		(o.n = function (t) {
			var r =
				t && t.__esModule
					? function () {
							return t.default;
					  }
					: function () {
							return t;
					  };
			return o.d(r, "a", r), r;
		}),
		(o.o = function (t, r) {
			return Object.prototype.hasOwnProperty.call(t, r);
		}),
		(o.p = ""),
		o((o.s = 0))
	);
	function o(t) {
		if (n[t]) return n[t].exports;
		var r = (n[t] = { i: t, l: !1, exports: {} });
		return e[t].call(r.exports, r, r.exports, o), (r.l = !0), r.exports;
	}
	var e, n;
});