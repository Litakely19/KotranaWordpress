!function(){"use strict";var e={n:function(o){var n=o&&o.__esModule?function(){return o.default}:function(){return o};return e.d(n,{a:n}),n},d:function(o,n){for(var t in n)e.o(n,t)&&!e.o(o,t)&&Object.defineProperty(o,t,{enumerable:!0,get:n[t]})},o:function(e,o){return Object.prototype.hasOwnProperty.call(e,o)},r:function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})}},o={};e.r(o);var n=window.wp.i18n,t=window.wp.data,r=window.wp.domReady,i=e.n(r),c=window.wc.wcSettings;i()((()=>{(0,t.dispatch)("core/notices").createSuccessNotice((0,n.__)("Sample products added","woocommerce"),{id:"WOOCOMMERCE_ONBOARDING_LOAD_SAMPLE_PRODUCTS_NOTICE",actions:[{url:(0,c.getAdminLink)("admin.php?page=wc-admin"),label:(0,n.__)("Continue setting up your store","woocommerce")}]})})),(window.wc=window.wc||{}).onboardingLoadSampleProductsNotice=o}();