import{E,r,w as $,K as l,O as f,P as e,X as n,W as c,H as y,a6 as b,v as a,S as z,L as k,a1 as d,Q as M,R as W,ad as C}from"./forms-5e524d78.js";import{_ as x,h as G,b as S,t as H,a as B}from"./endpoints-461b1c36.js";import{S as V,a as K}from"./swiper-0d59a981.js";import{V as Q,A as X}from"./autoplay-78c97335.js";import{j as q,e as J,l as U,f as Y}from"./vue-libs-5c981799.js";import{V as _}from"./v-lazy-image-4d7b979e.js";import"./general-libs-bb1bbc34.js";const Z={class:"container"},ee={class:"social-feed-item ratio ratio-1x1"},te=e("div",{class:"bg-black opacity-25"},null,-1),se=["href","onClick"],ae={class:"visually-hidden"},oe={class:"social-feed-item-content bg-white d-flex flex-column"},re={class:"position-relative p-3 p-lg-20p flex-grow-1 overflow-hidden"},ie={class:"text-center position-relative social-feed-item-user-link"},le=["href"],ne=["href"],ce=e("div",{class:"position-absolute w-100 h-25 bottom-0 start-0 bg-gradient bg-gradient-white-to-top-50"},null,-1),de={class:"position-relative flex-shrink-0 px-3 py-2 bg-white d-flex align-items-center gap-3"},ue={class:"icon icon-xl"},fe={class:"fs-14p text-end flex-grow-1"},_e=E({__name:"social-feed",props:{feedId:{}},setup(L){const A=C(()=>x(()=>import("./social-feed-item-modal-15b2c51a.js"),["assets/social-feed-item-modal-15b2c51a.js","assets/forms-5e524d78.js","assets/endpoints-461b1c36.js","assets/general-libs-bb1bbc34.js","assets/vue-libs-5c981799.js","assets/endpoints-b75ca574.css","assets/modal-b0546d47.js"]));x(()=>Promise.resolve({}),["assets/swiper-cf3452f2.css"]);const D=L,p=r(),m=r(),v=r(),h=r(!0),I=r(!1),g=r([]),w=r(),u=q(p);r(!1);const N=J(Y).greater("lg"),{load:O}=U("https://cdn.curator.io/5.0/curator.embed.js",void 0,{defer:!0,immediate:!1}),R=async()=>{try{await O(),new Curator.Widgets.Carousel({feed:{id:D.feedId},container:m.value,debug:!0}).on("posts:loaded",function(o){g.value=o,h.value=!1})}catch{I.value=!1}},P=s=>{if(!s)return"";const o=S(s);return o.isValid()?o.isBefore(S().subtract(2,"week"))?H(s):o.fromNow():""},j=(s,o)=>{var t;N.value||(s.preventDefault(),w.value=o,(t=v.value)==null||t.show())},F=$(u,s=>{s&&(F(),u.value=!0,R())});return(s,o)=>(l(),f("div",{ref_key:"rootEl",ref:p,class:"overflow-hidden"},[e("div",{ref_key:"stubRef",ref:m,class:"d-none"},null,512),e("div",Z,[n(a(K),{class:"overflow-visible",modules:[a(Q),a(X)],"slides-per-view":1.2,"initial-slide":1,breakpoints:{768:{slidesPerView:4,initialSlide:2}},"space-between":16,speed:600,autoplay:{delay:5e3,disableOnInteraction:!1,pauseOnMouseEnter:!0,stopOnLastSlide:!1},virtual:{enabled:!0,addSlidesAfter:1,addSlidesBefore:2}},{default:c(()=>[h.value?(l(),f(y,{key:0},b(8,(t,i)=>n(a(V),{key:i,"virtual-index":i},{default:c(()=>[e("div",{class:"placeholder ratio ratio-1x1 bg-gray-300",style:z({"animation-delay":i*.1+"s"})},null,4)]),_:2},1032,["virtual-index"])),64)):(l(!0),f(y,{key:1},b(g.value,(t,i)=>(l(),k(a(V),{key:i,"virtual-index":i},{default:c(()=>[e("div",ee,[n(a(_),{src:t.image},null,8,["src"]),te,e("a",{href:t.url,onClick:T=>j(T,t),class:"d-flex justify-content-center align-items-center"},[e("span",ae,d(s.$t("social_feed.view_post")),1)],8,se),e("div",oe,[e("div",re,[e("p",ie,[e("a",{href:t.user_url,target:"_blank",class:"fs-14p fs-lg-16p text-reset text-decoration-underline text-underline-offset fw-bold"},d(t.user_screen_name),9,le)]),e("p",null,[e("a",{href:t.url,target:"_blank",class:"text-decoration-none underline text-reset stretched-link"},d(t.text),9,ne)]),ce]),e("div",de,[e("div",ue,[n(a(_),{src:t.user_image,class:"w-100 h-100"},null,8,["src"])]),e("div",fe,d(P(t.source_created_at)),1)])])])]),_:2},1032,["virtual-index"]))),128))]),_:1},8,["modules"])]),a(u)?(l(),k(a(A),{key:0,ref_key:"modalRef",ref:v},{"modal-body":c(()=>[M(s.$slots,"post-modal-body",{post:w.value,fromNow:a(G)})]),_:3},512)):W("",!0)],512))}});const pe=B(_e,[["__file","social-feed.vue"]]),me=E({components:{SocialFeed:pe,VLazyImage:_}}),Se=B(me,[["__file","social-feed.vue"]]);export{Se as default};