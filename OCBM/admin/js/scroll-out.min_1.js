var ScrollOut=function(){"use strict"
function S(e,t,n){return e<t?t:n<e?n:e}function y(e){return+(0<e)-+(e<0)}var e,t={}
function n(e){return"-"+e[0].toLowerCase()}function u(e){return t[e]||(t[e]=e.replace(/([A-Z])/g,n))}function r(e,t){return e&&0!==e.length?e.nodeName?[e]:[].slice.call(e[0].nodeName?e:(t||document.documentElement).querySelectorAll(e)):[]}function d(e,t){for(var n in t)n.indexOf("_")&&e.setAttribute("data-"+u(n),t[n])}var i=[]
function o(){i.slice().forEach(function(e){return e()}),e=i.length?requestAnimationFrame(o):0}function T(t){return i.push(t),e||o(),function(){!(i=i.filter(function(e){return e!==t})).length&&e&&(e=0,cancelAnimationFrame(e))}}function v(){}return function(E){var i,L,P,o=(E=E||{}).onChange||v,l=E.onHidden||v,c=E.onShown||v,s=E.onScroll||v,f=E.cssProps?(i=E.cssProps,function(e,t){for(var n in t)n.indexOf("_")&&(!0===i||i[n])&&e.style.setProperty("--"+u(n),(r=t[n],Math.round(1e4*r)/1e4))
var r}):v,e=E.scrollingElement,_=e?r(e)[0]:window,H=e?r(e)[0]:document.documentElement,W=!1,x={},A=[],O=T(C)
function t(){A=r(E.targets||"[data-scroll]",r(E.scope||H)[0]).map(function(e){return{element:e}})}function n(){var e=H.clientWidth,t=H.clientHeight,n=y(-L+(L=H.scrollLeft||window.pageXOffset)),r=y(-P+(P=H.scrollTop||window.pageYOffset)),i=H.scrollLeft/(H.scrollWidth-e||1),o=H.scrollTop/(H.scrollHeight-t||1)
W=W||x.scrollDirX!==n||x.scrollDirY!==r||x.scrollPercentX!==i||x.scrollPercentY!==o,x.scrollDirX=n,x.scrollDirY=r,x.scrollPercentX=i,x.scrollPercentY=o
for(var l=!1,c=0;c<A.length;c++){for(var s=A[c],f=s.element,a=f,u=0,d=0;u+=a.offsetLeft,d+=a.offsetTop,(a=a.offsetParent)&&a!==_;);var v=f.clientHeight||f.offsetHeight||0,h=f.clientWidth||f.offsetWidth||0,g=(S(u+h,L,L+e)-S(u,L,L+e))/h,m=(S(d+v,P,P+t)-S(d,P,P+t))/v,p=1===g?0:y(u-L),w=1===m?0:y(d-P),X=S((L-(h/2+u-e/2))/(e/2),-1,1),Y=S((P-(v/2+d-t/2))/(t/2),-1,1),b=+(E.offset?E.offset<=P:(E.threshold||0)<g*m),D=s.visible!==b;(s._changed||D||s.visibleX!==g||s.visibleY!==m||s.index!==c||s.elementHeight!==v||s.elementWidth!==h||s.offsetX!==u||s.offsetY!==d||s.intersectX!=s.intersectX||s.intersectY!=s.intersectY||s.viewportX!==X||s.viewportY!==Y)&&(l=!0,s._changed=!0,s._visibleChanged=D,s.visible=b,s.elementHeight=v,s.elementWidth=h,s.index=c,s.offsetX=u,s.offsetY=d,s.visibleX=g,s.visibleY=m,s.intersectX=p,s.intersectY=w,s.viewportX=X,s.viewportY=Y,s.visible=b)}O||!W&&!l||(O=T(C))}function C(){a(),W&&(W=!1,d(H,{scrollDirX:x.scrollDirX,scrollDirY:x.scrollDirY}),f(H,x),s(H,x,A))
for(var e=A.length-1;-1<e;e--){var t=A[e],n=t.element,r=t.visible
t._changed&&(t._changed=!1,f(n,t)),t._visibleChanged&&(d(n,{scroll:r?"in":"out"}),o(n,t,H),(r?c:l)(n,t,H)),r&&E.once&&A.splice(e,1)}}function a(){O&&(O(),O=void 0)}return t(),n(),window.addEventListener("resize",n),_.addEventListener("scroll",n),{index:t,update:n,teardown:function(){a(),window.removeEventListener("resize",n),_.removeEventListener("scroll",n)}}}}()
