(window.wporgLearnPlugin=window.wporgLearnPlugin||[]).push([[5],{7:function(e,t,n){}}]),function(e){function t(t){for(var r,l,u=t[0],p=t[1],a=t[2],s=0,f=[];s<u.length;s++)l=u[s],Object.prototype.hasOwnProperty.call(o,l)&&o[l]&&f.push(o[l][0]),o[l]=0;for(r in p)Object.prototype.hasOwnProperty.call(p,r)&&(e[r]=p[r]);for(c&&c(t);f.length;)f.shift()();return i.push.apply(i,a||[]),n()}function n(){for(var e,t=0;t<i.length;t++){for(var n=i[t],r=!0,u=1;u<n.length;u++){var p=n[u];0!==o[p]&&(r=!1)}r&&(i.splice(t--,1),e=l(l.s=n[0]))}return e}var r={},o={7:0},i=[];function l(t){if(r[t])return r[t].exports;var n=r[t]={i:t,l:!1,exports:{}};return e[t].call(n.exports,n,n.exports,l),n.l=!0,n.exports}l.m=e,l.c=r,l.d=function(e,t,n){l.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},l.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},l.t=function(e,t){if(1&t&&(e=l(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(l.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)l.d(n,r,function(t){return e[t]}.bind(null,r));return n},l.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return l.d(t,"a",t),t},l.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},l.p="";var u=window.wporgLearnPlugin=window.wporgLearnPlugin||[],p=u.push.bind(u);u.push=t,u=u.slice();for(var a=0;a<u.length;a++)t(u[a]);var c=p;i.push([12,5]),n()}([function(e,t){!function(){e.exports=this.wp.i18n}()},function(e,t){!function(){e.exports=this.wp.blocks}()},function(e,t){!function(){e.exports=this.wp.element}()},function(e,t){!function(){e.exports=this.wp.components}()},,,,,,,,,function(e,t,n){"use strict";n.r(t);var r=n(1),o=n(0),i=(n(7),n(2)),l=n(3);Object(r.registerBlockType)("wporg-learn/workshop-details",{title:Object(o.__)("Workshop Details","wporg-learn"),description:Object(o.__)("Show details about the workshop, pulled from post meta.","wporg-learn"),category:"widgets",icon:"smiley",supports:{html:!1},edit:function(){return Object(i.createElement)(l.Placeholder,{label:Object(o.__)("Workshop Details","wporg-learn")},Object(i.createElement)("p",null,Object(o.__)("This will be dynamically populated based on settings in the Workshop Details meta box.","wporg-learn")))},save:function(){return null}})}]);