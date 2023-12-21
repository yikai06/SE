import{E as T,r as p,j as z,w as F,K as l,O as a,v as n,P as i,X as u,W as m,H as g,a6 as P,a1 as d,R as c,L as O}from"./forms-5e524d78.js";import{_ as S,I as f,e as G,a as V}from"./endpoints-461b1c36.js";import"./ff-button.vue_vue_type_style_index_0_scoped_0a22213a_lang-033e91f9.js";import{e as j,j as W,f as q}from"./vue-libs-5c981799.js";import{S as M,a as H}from"./swiper-0d59a981.js";import{V as E}from"./v-lazy-image-4d7b979e.js";import{F as h}from"./fade-transition-6b989812.js";import{N as X}from"./navigation-0e852a3b.js";import{a as J}from"./general-libs-bb1bbc34.js";/* empty css                                                                   */const Q={key:0,class:"swiper-club-location-description col-lg-5 d-flex"},Y={class:"d-flex description-item slanted py-70p"},Z={key:0},ee={key:0},te={key:0,class:"fs-14p fs-lg-16p text-white mb-30p mb-lg-32p"},se={key:1},le={class:"text-white fs-14p fs-lg-16p mb-30p mb-lg-32p"},ae={key:2,class:"fs-14p fs-lg-16p text-white fw-bold mb-16p"},oe={key:3,class:"fs-24p fs-lg-36p text-white fw-bold text-uppercase text-break mb-30p mb-lg-32p px-82p"},ne=["href"],ce={class:"d-block d-lg-flex position-relative justify-content-lg-end"},ie={key:0,class:"swiper-club-location-description col-lg-5 d-flex"},re={class:"d-flex description-item slanted py-70p"},ue={key:0,class:"fs-14p fs-lg-16p text-white mb-30p mb-lg-32p"},de={key:0},be={class:"text-white fs-14p fs-lg-16p mb-30p mb-lg-32p"},pe={key:0,class:"fs-14p fs-lg-16p text-white fw-bold mb-16p"},me={key:1,class:"fs-24p fs-lg-36p text-white fw-bold text-uppercase text-break mb-30p mb-lg-32p px-82p"},_e=["href"],fe={class:"swiper-club-location-image col-lg-7"},ve={class:"image-item slanted h-100"},ge={class:"ratio h-100"},he=i("div",{class:"d-block d-lg-none bg-dark",style:{"--bs-bg-opacity":"40%"}},null,-1),ye={class:"carousel-controls"},we={class:"d-flex justify-content-between"},Ce={class:"btn btn-prev btn-carousel-nav",title:"Prev Slide",type:"button"},ke={class:"btn btn-next btn-carousel-nav",title:"Next Slide",type:"button"},Ie=T({__name:"club-location-carousel",props:{clubs:{}},setup(A){var K;S(()=>Promise.resolve({}),["assets/swiper-cf3452f2.css"]),S(()=>Promise.resolve({}),["assets/navigation-05db3b45.css"]);const y=j(q).greaterOrEqual("lg"),w=p(),C=p(0),D=A,_=p(!1),v=p(!1),k=p(),o=p(((K=D.clubs)==null?void 0:K.map(s=>({club:s,distanceInKm:void 0})))??[]),I=z(()=>o.value.every(s=>s.distanceInKm)),L=async s=>new Promise((r,e)=>{try{navigator.geolocation.getCurrentPosition(r,e,s)}catch{e()}}),B=async(s,r,e)=>{try{return(await J.get(`${G.CLUBS}/distance`,{params:{clubId:s,latitude:r,longitude:e}})).data.data}catch{}},x=async()=>{const{coords:{longitude:s,latitude:r}}=await L(),e=await Promise.all(o.value.map(async t=>({clubId:t.club.ClubId,distanceInKm:await B(t.club.ClubId,r,s)})));o.value=o.value.map(t=>{var b;return{...t,distanceInKm:(b=e.find($=>$.clubId===t.club.ClubId))==null?void 0:b.distanceInKm}}).sort((t,b)=>!t.distanceInKm||!b.distanceInKm?0:t.distanceInKm-b.distanceInKm)},U=async()=>{try{const{state:s}=await navigator.permissions.query({name:"geolocation"});s==="granted"&&(_.value=!0,await x())}catch{}},N=async()=>{_.value||await x()},R=F(W(k),s=>{s&&(v.value=!0,N(),R())});return U(),(s,r)=>(l(),a("div",{class:"club-location-carousel-container",ref_key:"containerRef",ref:k},[n(y)?(l(),a("div",Q,[i("div",Y,[w.value&&o.value&&o.value.length>0?(l(),a("div",Z,[u(n(h),{mode:"out-in"},{default:m(()=>[(l(!0),a(g,null,P(o.value,(e,t)=>{var b;return l(),a(g,{key:e.club.ClubId},[C.value===t?(l(),a("div",ee,[I.value&&t===0?(l(),a("p",te,d(s.$t("common.recommended_club")),1)):c("",!0),(v.value||_.value)&&o.value[t].distanceInKm?(l(),a("div",se,[u(n(f),{symbol:"location-pin-2",size:"xl",class:"text-white mb-16p"}),i("p",le,d((b=o.value[t].distanceInKm)==null?void 0:b.toFixed(1))+"km",1)])):c("",!0),o.value[t].club.CardTag?(l(),a("p",ae,d(o.value[t].club.CardTag),1)):c("",!0),o.value[t].club.ClubTitle?(l(),a("h3",oe,d(o.value[t].club.ClubTitle),1)):c("",!0),o.value[t].club.ClubPageUrl?(l(),a("a",{key:4,href:o.value[t].club.ClubPageUrl,class:"fs-14p fs-lg-16p fw-bold text-white"},d(s.$t("common.view_this_club")),9,ne)):c("",!0)])):c("",!0)],64)}),128))]),_:1})])):c("",!0)])])):c("",!0),u(n(H),{effect:"slide",onSwiper:r[0]||(r[0]=e=>w.value=e),onSlideChange:r[1]||(r[1]=e=>C.value=e.realIndex),modules:[n(X)],"slides-per-view":1,"space-between":20,speed:500,"grab-cursor":!0,navigation:{prevEl:".club-location-carousel-container .btn-prev",nextEl:".club-location-carousel-container .btn-next"}},{default:m(()=>[(l(!0),a(g,null,P(o.value,(e,t)=>(l(),O(n(M),{key:e.club.ClubId},{default:m(()=>[i("div",ce,[n(y)?c("",!0):(l(),a("div",ie,[i("div",re,[u(n(h),null,{default:m(()=>[I.value&&t===0?(l(),a("p",ue,d(s.$t("common.recommended_club")),1)):c("",!0)]),_:2},1024),u(n(h),null,{default:m(()=>[(v.value||_.value)&&e.distanceInKm?(l(),a("div",de,[u(n(f),{symbol:"location-pin-2",size:"xl",class:"text-white mb-16p"}),i("p",be,d(e.distanceInKm.toFixed(1))+"km",1)])):c("",!0)]),_:2},1024),e.club.CardTag?(l(),a("p",pe,d(e.club.CardTag),1)):c("",!0),e.club.ClubTitle?(l(),a("h3",me,d(e.club.ClubTitle),1)):c("",!0),e.club.ClubPageUrl?(l(),a("a",{key:2,href:e.club.ClubPageUrl,class:"fs-14p fs-lg-16p fw-bold text-white"},d(s.$t("common.view_this_club")),9,_e)):c("",!0)])])),i("div",fe,[i("div",ve,[i("div",ge,[u(n(E),{class:"d-none d-lg-block bg-gray-300 v-lazy-image-fades-in",src:e.club.ClubImageMediaUrl,alt:e.club.ClubImageAlt},null,8,["src","alt"]),u(n(E),{class:"d-block d-lg-none v-lazy-image-fades-in",src:e.club.ClubImageMediaUrl,alt:e.club.ClubImageAlt},null,8,["src","alt"]),he])])])])]),_:2},1024))),128))]),_:1},8,["modules","navigation"]),i("div",ye,[i("div",we,[i("button",Ce,[u(n(f),{symbol:"chevron-left-bold"})]),i("button",ke,[u(n(f),{symbol:"chevron-right-bold"})])])])],512))}}),xe=V(Ie,[["__file","club-location-carousel.vue"]]),Ke=T({components:{ClubLocationCarousel:xe}}),Re=V(Ke,[["__file","ff-club-location-carousel.vue"]]);export{Re as default};
