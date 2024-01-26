import{N as T}from"./forms-697c0855.js";import{a as x,d as k,c as y,b as O,e as S}from"./selector-engine-a19ef981.js";var E={exports:{}};/*!
  * Bootstrap backdrop.js v5.3.2 (https://getbootstrap.com/)
  * Copyright 2011-2023 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
  */var D;function R(){return D||(D=1,function(_,v){(function(s,a){_.exports=a(x(),k(),y())})(T,function(s,a,o){const c="backdrop",d="fade",r="show",u=`mousedown.bs.${c}`,m={className:"modal-backdrop",clickCallback:null,isAnimated:!1,isVisible:!0,rootElement:"body"},p={className:"string",clickCallback:"(function|null)",isAnimated:"boolean",isVisible:"boolean",rootElement:"(element|string)"};class i extends a{constructor(t){super(),this._config=this._getConfig(t),this._isAppended=!1,this._element=null}static get Default(){return m}static get DefaultType(){return p}static get NAME(){return c}show(t){if(!this._config.isVisible){o.execute(t);return}this._append();const l=this._getElement();this._config.isAnimated&&o.reflow(l),l.classList.add(r),this._emulateAnimation(()=>{o.execute(t)})}hide(t){if(!this._config.isVisible){o.execute(t);return}this._getElement().classList.remove(r),this._emulateAnimation(()=>{this.dispose(),o.execute(t)})}dispose(){this._isAppended&&(s.off(this._element,u),this._element.remove(),this._isAppended=!1)}_getElement(){if(!this._element){const t=document.createElement("div");t.className=this._config.className,this._config.isAnimated&&t.classList.add(d),this._element=t}return this._element}_configAfterMerge(t){return t.rootElement=o.getElement(t.rootElement),t}_append(){if(this._isAppended)return;const t=this._getElement();this._config.rootElement.append(t),s.on(t,u,()=>{o.execute(this._config.clickCallback)}),this._isAppended=!0}_emulateAnimation(t){o.executeAfterTransition(t,this._getElement(),this._config.isAnimated)}}return i})}(E)),E.exports}var g={exports:{}};/*!
  * Bootstrap focustrap.js v5.3.2 (https://getbootstrap.com/)
  * Copyright 2011-2023 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
  */var w;function F(){return w||(w=1,function(_,v){(function(s,a){_.exports=a(x(),O(),k())})(T,function(s,a,o){const c="focustrap",r=".bs.focustrap",u=`focusin${r}`,m=`keydown.tab${r}`,p="Tab",i="forward",e="backward",t={autofocus:!0,trapElement:null},l={autofocus:"boolean",trapElement:"element"};class f extends o{constructor(n){super(),this._config=this._getConfig(n),this._isActive=!1,this._lastTabNavDirection=null}static get Default(){return t}static get DefaultType(){return l}static get NAME(){return c}activate(){this._isActive||(this._config.autofocus&&this._config.trapElement.focus(),s.off(document,r),s.on(document,u,n=>this._handleFocusin(n)),s.on(document,m,n=>this._handleKeydown(n)),this._isActive=!0)}deactivate(){this._isActive&&(this._isActive=!1,s.off(document,r))}_handleFocusin(n){const{trapElement:A}=this._config;if(n.target===document||n.target===A||A.contains(n.target))return;const b=a.focusableChildren(A);b.length===0?A.focus():this._lastTabNavDirection===e?b[b.length-1].focus():b[0].focus()}_handleKeydown(n){n.key===p&&(this._lastTabNavDirection=n.shiftKey?e:i)}}return f})}(g)),g.exports}var N={exports:{}};/*!
  * Bootstrap scrollbar.js v5.3.2 (https://getbootstrap.com/)
  * Copyright 2011-2023 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
  */var C;function M(){return C||(C=1,function(_,v){(function(s,a){_.exports=a(S(),O(),y())})(T,function(s,a,o){const c=".fixed-top, .fixed-bottom, .is-fixed, .sticky-top",d=".sticky-top",r="padding-right",u="margin-right";class m{constructor(){this._element=document.body}getWidth(){const i=document.documentElement.clientWidth;return Math.abs(window.innerWidth-i)}hide(){const i=this.getWidth();this._disableOverFlow(),this._setElementAttributes(this._element,r,e=>e+i),this._setElementAttributes(c,r,e=>e+i),this._setElementAttributes(d,u,e=>e-i)}reset(){this._resetElementAttributes(this._element,"overflow"),this._resetElementAttributes(this._element,r),this._resetElementAttributes(c,r),this._resetElementAttributes(d,u)}isOverflowing(){return this.getWidth()>0}_disableOverFlow(){this._saveInitialAttribute(this._element,"overflow"),this._element.style.overflow="hidden"}_setElementAttributes(i,e,t){const l=this.getWidth(),f=h=>{if(h!==this._element&&window.innerWidth>h.clientWidth+l)return;this._saveInitialAttribute(h,e);const n=window.getComputedStyle(h).getPropertyValue(e);h.style.setProperty(e,`${t(Number.parseFloat(n))}px`)};this._applyManipulationCallback(i,f)}_saveInitialAttribute(i,e){const t=i.style.getPropertyValue(e);t&&s.setDataAttribute(i,e,t)}_resetElementAttributes(i,e){const t=l=>{const f=s.getDataAttribute(l,e);if(f===null){l.style.removeProperty(e);return}s.removeDataAttribute(l,e),l.style.setProperty(e,f)};this._applyManipulationCallback(i,t)}_applyManipulationCallback(i,e){if(o.isElement(i)){e(i);return}for(const t of a.find(i,this._element))e(t)}}return m})}(N)),N.exports}export{F as a,M as b,R as r};
