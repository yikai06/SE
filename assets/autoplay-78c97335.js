import {g as U, s as q, e as H, c as _} from "./swiper-78c97335.js";
function K(V) {
    let {swiper: e, extendParams: z, on: y, emit: p} = V;
    z({
        virtual: {
            enabled: !1,
            slides: [],
            cache: !0,
            renderSlide: null,
            renderExternal: null,
            renderExternalUpdate: !0,
            addSlidesBefore: 0,
            addSlidesAfter: 0
        }
    });
    let S;
    const O = U();
    e.virtual = {
        cache: {},
        from: void 0,
        to: void 0,
        slides: [],
        offset: 0,
        slidesGrid: []
    };
    const $ = O.createElement("div");
    function x(t, i) {
        const s = e.params.virtual;
        if (s.cache && e.virtual.cache[i])
            return e.virtual.cache[i];
        let r;
        return s.renderSlide ? (r = s.renderSlide.call(e, t, i),
        typeof r == "string" && ($.innerHTML = r,
        r = $.children[0])) : e.isElement ? r = _("swiper-slide") : r = _("div", e.params.slideClass),
        r.setAttribute("data-swiper-slide-index", i),
        s.renderSlide || (r.innerHTML = t),
        s.cache && (e.virtual.cache[i] = r),
        r
    }
    function c(t) {
        const {slidesPerView: i, slidesPerGroup: s, centeredSlides: r, loop: o} = e.params
          , {addSlidesBefore: A, addSlidesAfter: M} = e.params.virtual
          , {from: T, to: h, slides: d, slidesGrid: P, offset: L} = e.virtual;
        e.params.cssMode || e.updateActiveIndex();
        const g = e.activeIndex || 0;
        let C;
        e.rtlTranslate ? C = "right" : C = e.isHorizontal() ? "left" : "top";
        let I, E;
        r ? (I = Math.floor(i / 2) + s + M,
        E = Math.floor(i / 2) + s + A) : (I = i + (s - 1) + M,
        E = (o ? i : s) + A);
        let m = g - E
          , w = g + I;
        o || (m = Math.max(m, 0),
        w = Math.min(w, d.length - 1));
        let b = (e.slidesGrid[m] || 0) - (e.slidesGrid[0] || 0);
        o && g >= E ? (m -= E,
        r || (b += e.slidesGrid[0])) : o && g < E && (m = -E,
        r && (b += e.slidesGrid[0])),
        Object.assign(e.virtual, {
            from: m,
            to: w,
            offset: b,
            slidesGrid: e.slidesGrid,
            slidesBefore: E,
            slidesAfter: I
        });
        function N() {
            e.updateSlides(),
            e.updateProgress(),
            e.updateSlidesClasses(),
            p("virtualUpdate")
        }
        if (T === m && h === w && !t) {
            e.slidesGrid !== P && b !== L && e.slides.forEach(a=>{
                a.style[C] = `${b - Math.abs(e.cssOverflowAdjustment())}px`
            }
            ),
            e.updateProgress(),
            p("virtualUpdate");
            return
        }
        if (e.params.virtual.renderExternal) {
            e.params.virtual.renderExternal.call(e, {
                offset: b,
                from: m,
                to: w,
                slides: function() {
                    const n = [];
                    for (let j = m; j <= w; j += 1)
                        n.push(d[j]);
                    return n
                }()
            }),
            e.params.virtual.renderExternalUpdate ? N() : p("virtualUpdate");
            return
        }
        const l = []
          , v = []
          , u = a=>{
            let n = a;
            return a < 0 ? n = d.length + a : n >= d.length && (n = n - d.length),
            n
        }
        ;
        if (t)
            e.slides.filter(a=>a.matches(`.${e.params.slideClass}, swiper-slide`)).forEach(a=>{
                a.remove()
            }
            );
        else
            for (let a = T; a <= h; a += 1)
                if (a < m || a > w) {
                    const n = u(a);
                    e.slides.filter(j=>j.matches(`.${e.params.slideClass}[data-swiper-slide-index="${n}"], swiper-slide[data-swiper-slide-index="${n}"]`)).forEach(j=>{
                        j.remove()
                    }
                    )
                }
        const G = o ? -d.length : 0
          , R = o ? d.length * 2 : d.length;
        for (let a = G; a < R; a += 1)
            if (a >= m && a <= w) {
                const n = u(a);
                typeof h > "u" || t ? v.push(n) : (a > h && v.push(n),
                a < T && l.push(n))
            }
        if (v.forEach(a=>{
            e.slidesEl.append(x(d[a], a))
        }
        ),
        o)
            for (let a = l.length - 1; a >= 0; a -= 1) {
                const n = l[a];
                e.slidesEl.prepend(x(d[n], n))
            }
        else
            l.sort((a,n)=>n - a),
            l.forEach(a=>{
                e.slidesEl.prepend(x(d[a], a))
            }
            );
        H(e.slidesEl, ".swiper-slide, swiper-slide").forEach(a=>{
            a.style[C] = `${b - Math.abs(e.cssOverflowAdjustment())}px`
        }
        ),
        N()
    }
    function f(t) {
        if (typeof t == "object" && "length"in t)
            for (let i = 0; i < t.length; i += 1)
                t[i] && e.virtual.slides.push(t[i]);
        else
            e.virtual.slides.push(t);
        c(!0)
    }
    function D(t) {
        const i = e.activeIndex;
        let s = i + 1
          , r = 1;
        if (Array.isArray(t)) {
            for (let o = 0; o < t.length; o += 1)
                t[o] && e.virtual.slides.unshift(t[o]);
            s = i + t.length,
            r = t.length
        } else
            e.virtual.slides.unshift(t);
        if (e.params.virtual.cache) {
            const o = e.virtual.cache
              , A = {};
            Object.keys(o).forEach(M=>{
                const T = o[M]
                  , h = T.getAttribute("data-swiper-slide-index");
                h && T.setAttribute("data-swiper-slide-index", parseInt(h, 10) + r),
                A[parseInt(M, 10) + r] = T
            }
            ),
            e.virtual.cache = A
        }
        c(!0),
        e.slideTo(s, 0)
    }
    function B(t) {
        if (typeof t > "u" || t === null)
            return;
        let i = e.activeIndex;
        if (Array.isArray(t))
            for (let s = t.length - 1; s >= 0; s -= 1)
                e.params.virtual.cache && (delete e.virtual.cache[t[s]],
                Object.keys(e.virtual.cache).forEach(r=>{
                    r > t && (e.virtual.cache[r - 1] = e.virtual.cache[r],
                    e.virtual.cache[r - 1].setAttribute("data-swiper-slide-index", r - 1),
                    delete e.virtual.cache[r])
                }
                )),
                e.virtual.slides.splice(t[s], 1),
                t[s] < i && (i -= 1),
                i = Math.max(i, 0);
        else
            e.params.virtual.cache && (delete e.virtual.cache[t],
            Object.keys(e.virtual.cache).forEach(s=>{
                s > t && (e.virtual.cache[s - 1] = e.virtual.cache[s],
                e.virtual.cache[s - 1].setAttribute("data-swiper-slide-index", s - 1),
                delete e.virtual.cache[s])
            }
            )),
            e.virtual.slides.splice(t, 1),
            t < i && (i -= 1),
            i = Math.max(i, 0);
        c(!0),
        e.slideTo(i, 0)
    }
    function F() {
        e.virtual.slides = [],
        e.params.virtual.cache && (e.virtual.cache = {}),
        c(!0),
        e.slideTo(0, 0)
    }
    y("beforeInit", ()=>{
        if (!e.params.virtual.enabled)
            return;
        let t;
        if (typeof e.passedParams.virtual.slides > "u") {
            const i = [...e.slidesEl.children].filter(s=>s.matches(`.${e.params.slideClass}, swiper-slide`));
            i && i.length && (e.virtual.slides = [...i],
            t = !0,
            i.forEach((s,r)=>{
                s.setAttribute("data-swiper-slide-index", r),
                e.virtual.cache[r] = s,
                s.remove()
            }
            ))
        }
        t || (e.virtual.slides = e.params.virtual.slides),
        e.classNames.push(`${e.params.containerModifierClass}virtual`),
        e.params.watchSlidesProgress = !0,
        e.originalParams.watchSlidesProgress = !0,
        c()
    }
    ),
    y("setTranslate", ()=>{
        e.params.virtual.enabled && (e.params.cssMode && !e._immediateVirtual ? (clearTimeout(S),
        S = setTimeout(()=>{
            c()
        }
        , 100)) : c())
    }
    ),
    y("init update resize", ()=>{
        e.params.virtual.enabled && e.params.cssMode && q(e.wrapperEl, "--swiper-virtual-size", `${e.virtualSize}px`)
    }
    ),
    Object.assign(e.virtual, {
        appendSlide: f,
        prependSlide: D,
        removeSlide: B,
        removeAllSlides: F,
        update: c
    })
}
function Q(V) {
    let {swiper: e, extendParams: z, on: y, emit: p, params: S} = V;
    e.autoplay = {
        running: !1,
        paused: !1,
        timeLeft: 0
    },
    z({
        autoplay: {
            enabled: !1,
            delay: 3e3,
            waitForTransition: !0,
            disableOnInteraction: !1,
            stopOnLastSlide: !1,
            reverseDirection: !1,
            pauseOnMouseEnter: !1
        }
    });
    let O, $, x = S && S.autoplay ? S.autoplay.delay : 3e3, c = S && S.autoplay ? S.autoplay.delay : 3e3, f, D = new Date().getTime(), B, F, t, i, s, r, o;
    function A(l) {
        !e || e.destroyed || !e.wrapperEl || l.target === e.wrapperEl && (e.wrapperEl.removeEventListener("transitionend", A),
        !o && g())
    }
    const M = ()=>{
        if (e.destroyed || !e.autoplay.running)
            return;
        e.autoplay.paused ? B = !0 : B && (c = f,
        B = !1);
        const l = e.autoplay.paused ? f : D + c - new Date().getTime();
        e.autoplay.timeLeft = l,
        p("autoplayTimeLeft", l, l / x),
        $ = requestAnimationFrame(()=>{
            M()
        }
        )
    }
      , T = ()=>{
        let l;
        return e.virtual && e.params.virtual.enabled ? l = e.slides.filter(u=>u.classList.contains("swiper-slide-active"))[0] : l = e.slides[e.activeIndex],
        l ? parseInt(l.getAttribute("data-swiper-autoplay"), 10) : void 0
    }
      , h = l=>{
        if (e.destroyed || !e.autoplay.running)
            return;
        cancelAnimationFrame($),
        M();
        let v = typeof l > "u" ? e.params.autoplay.delay : l;
        x = e.params.autoplay.delay,
        c = e.params.autoplay.delay;
        const u = T();
        !Number.isNaN(u) && u > 0 && typeof l > "u" && (v = u,
        x = u,
        c = u),
        f = v;
        const G = e.params.speed
          , R = ()=>{
            !e || e.destroyed || (e.params.autoplay.reverseDirection ? !e.isBeginning || e.params.loop || e.params.rewind ? (e.slidePrev(G, !0, !0),
            p("autoplay")) : e.params.autoplay.stopOnLastSlide || (e.slideTo(e.slides.length - 1, G, !0, !0),
            p("autoplay")) : !e.isEnd || e.params.loop || e.params.rewind ? (e.slideNext(G, !0, !0),
            p("autoplay")) : e.params.autoplay.stopOnLastSlide || (e.slideTo(0, G, !0, !0),
            p("autoplay")),
            e.params.cssMode && (D = new Date().getTime(),
            requestAnimationFrame(()=>{
                h()
            }
            )))
        }
        ;
        return v > 0 ? (clearTimeout(O),
        O = setTimeout(()=>{
            R()
        }
        , v)) : requestAnimationFrame(()=>{
            R()
        }
        ),
        v
    }
      , d = ()=>{
        D = new Date().getTime(),
        e.autoplay.running = !0,
        h(),
        p("autoplayStart")
    }
      , P = ()=>{
        e.autoplay.running = !1,
        clearTimeout(O),
        cancelAnimationFrame($),
        p("autoplayStop")
    }
      , L = (l,v)=>{
        if (e.destroyed || !e.autoplay.running)
            return;
        clearTimeout(O),
        l || (r = !0);
        const u = ()=>{
            p("autoplayPause"),
            e.params.autoplay.waitForTransition ? e.wrapperEl.addEventListener("transitionend", A) : g()
        }
        ;
        if (e.autoplay.paused = !0,
        v) {
            s && (f = e.params.autoplay.delay),
            s = !1,
            u();
            return
        }
        f = (f || e.params.autoplay.delay) - (new Date().getTime() - D),
        !(e.isEnd && f < 0 && !e.params.loop) && (f < 0 && (f = 0),
        u())
    }
      , g = ()=>{
        e.isEnd && f < 0 && !e.params.loop || e.destroyed || !e.autoplay.running || (D = new Date().getTime(),
        r ? (r = !1,
        h(f)) : h(),
        e.autoplay.paused = !1,
        p("autoplayResume"))
    }
      , C = ()=>{
        if (e.destroyed || !e.autoplay.running)
            return;
        const l = U();
        l.visibilityState === "hidden" && (r = !0,
        L(!0)),
        l.visibilityState === "visible" && g()
    }
      , I = l=>{
        l.pointerType === "mouse" && (r = !0,
        o = !0,
        !(e.animating || e.autoplay.paused) && L(!0))
    }
      , E = l=>{
        l.pointerType === "mouse" && (o = !1,
        e.autoplay.paused && g())
    }
      , m = ()=>{
        e.params.autoplay.pauseOnMouseEnter && (e.el.addEventListener("pointerenter", I),
        e.el.addEventListener("pointerleave", E))
    }
      , w = ()=>{
        e.el.removeEventListener("pointerenter", I),
        e.el.removeEventListener("pointerleave", E)
    }
      , b = ()=>{
        U().addEventListener("visibilitychange", C)
    }
      , N = ()=>{
        U().removeEventListener("visibilitychange", C)
    }
    ;
    y("init", ()=>{
        e.params.autoplay.enabled && (m(),
        b(),
        d())
    }
    ),
    y("destroy", ()=>{
        w(),
        N(),
        e.autoplay.running && P()
    }
    ),
    y("_freeModeStaticRelease", ()=>{
        (t || r) && g()
    }
    ),
    y("_freeModeNoMomentumRelease", ()=>{
        e.params.autoplay.disableOnInteraction ? P() : L(!0, !0)
    }
    ),
    y("beforeTransitionStart", (l,v,u)=>{
        e.destroyed || !e.autoplay.running || (u || !e.params.autoplay.disableOnInteraction ? L(!0, !0) : P())
    }
    ),
    y("sliderFirstMove", ()=>{
        if (!(e.destroyed || !e.autoplay.running)) {
            if (e.params.autoplay.disableOnInteraction) {
                P();
                return
            }
            F = !0,
            t = !1,
            r = !1,
            i = setTimeout(()=>{
                r = !0,
                t = !0,
                L(!0)
            }
            , 200)
        }
    }
    ),
    y("touchEnd", ()=>{
        if (!(e.destroyed || !e.autoplay.running || !F)) {
            if (clearTimeout(i),
            clearTimeout(O),
            e.params.autoplay.disableOnInteraction) {
                t = !1,
                F = !1;
                return
            }
            t && e.params.cssMode && g(),
            t = !1,
            F = !1
        }
    }
    ),
    y("slideChange", ()=>{
        e.destroyed || !e.autoplay.running || (s = !0)
    }
    ),
    Object.assign(e.autoplay, {
        start: d,
        stop: P,
        pause: L,
        resume: g
    })
}
export {Q as A, K as V};