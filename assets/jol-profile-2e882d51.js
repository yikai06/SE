import{d as P,c as V,D as Y,j as d,m as H,q as u,t as te,Z as le,_ as oe,u as e,E as ae,l as o,y as c,k as b,B as s,F as N,x as se,$ as ne,A as ie,b as B,J as Q,L as re,z as de,w as ue,K as ce,a2 as me}from"./forms-697c0855.js";import{J as pe}from"./jol-layout-d0dfc8be.js";import{j as fe}from"./use-geolocation-9c96d09d.js";import"./product-listing.vue_vue_type_style_index_0_lang-83b95a72.js";import{k as K}from"./kebabCase-67124385.js";import be from"./checkbox-control-6abfe93d.js";import{_ as L}from"./_plugin-vue_export-helper-c27b6911.js";import{u as _e,T as J,D as ge}from"./form-profile-simple.vue_vue_type_style_index_0_lang-68c6b86d.js";import{b as he}from"./debounce-fd325246.js";import{u as X,a as ve,c as ee,e as ye}from"./join-online-payment-5fb9c33d.js";import{s as F}from"./pinia-20a6ceed.js";import{a as U}from"./axios-427c969f.js";import{I as D}from"./icon-88a2c7c1.js";import{S as z}from"./spinner-abf5bfba.js";import{T as Ce}from"./tooltip-29665fb0.js";import{F as G}from"./fade-transition-adfb85d2.js";import{R as Z}from"./radio-toggle-button-control-3ad59946.js";import{T as q}from"./text-control-5a0c47c0.js";import{J as ke}from"./jol-offcanvas-857e8c06.js";import{g as R}from"./geolocation-3650dcab.js";import"./swiper-2ad592ff.js";/* empty css                                                                   */import{F as $e}from"./ff-button-05d250b8.js";import{M as je}from"./modal-f459bf62.js";import{u as Se}from"./i18n-fb5925bd.js";import{i as Ve}from"./general-libs-bb1bbc34.js";/* empty css                                                                  */import{b as we}from"./vue-router-dfcbd074.js";/* empty css                                                      */import{J as Te}from"./jol-stepper-nav-b7bfdddf.js";import{u as Ae}from"./use-templates-b07b7724.js";import"./datepicker-control-ca6391c3.js";import"./endpoints-03992eb2.js";import"./offcanvas-751db7da.js";import"./app.constants-9263fce2.js";import"./vue-9d7e997e.js";const Me=P({__name:"checkbox-control-field",props:{id:{},name:{},label:{},trueValue:{default:!0},falseValue:{},disabled:{type:Boolean},valueToString:{}},setup(w){const n=w,C=()=>["number","string","boolean"].includes(typeof n.trueValue);!C()&&!n.valueToString&&console.warn(`Please provide {valueToString} for {${n.name}} if {value} is not a primitive`);const T=V(()=>{if(n.id)return n.id;if(typeof n.trueValue>"u"||!C()&&!n.valueToString)return;const a=C()?n.trueValue:n.valueToString(n.trueValue);return"chk-"+K(n.name)+"-"+K(a)}),{errorMessage:p,value:h}=Y(n.name,void 0,{type:"checkbox",checkedValue:n.trueValue,uncheckedValue:n.falseValue});return(a,v)=>(d(),H(e(be),{id:T.value,name:a.name,label:a.label,"is-invalid":!!e(p),"true-value":a.trueValue,"false-value":a.falseValue,disabled:a.disabled,modelValue:e(h),"onUpdate:modelValue":v[0]||(v[0]=f=>ae(h)?h.value=f:null)},{default:u(f=>[te(a.$slots,"default",le(oe(f)))]),_:3},8,["id","name","label","is-invalid","true-value","false-value","disabled","modelValue"]))}}),W=L(Me,[["__file","checkbox-control-field.vue"]]),xe={class:"d-flex justify-content-between"},Be={class:"fs-14p fs-md-16p fw-bold mb-0"},Fe={key:0,class:"d-flex gap-8p align-items-center"},Ie={class:"fs-14p fs-md-16p mb-0"},He={class:"mb-0 line-clamp",style:{"--line-clamp-lines":"2"}},Ne=P({__name:"jol-card-club",props:{tag:{default:"div"},club:{},distanceInKm:{},selected:{type:Boolean}},setup(w){return(n,C)=>(d(),H(ne(n.tag),{class:se(["jol-card-club text-start position-relative border-0 h-100 p-20p d-flex flex-column align-items-stretch gap-20p gap-md-16p position-relative",n.selected&&"bg-primary text-white"])},{default:u(()=>[o("div",xe,[o("h4",Be,c(n.club.displayName),1),n.distanceInKm?(d(),b("div",Fe,[s(e(D),{symbol:"location-pin-2",class:"icon-20p icon-lg-25p"}),o("p",Ie,c(n.distanceInKm.toFixed(1))+" KM",1)])):N("",!0)]),o("p",He,c(n.club.fullAddress),1)]),_:1},8,["class"]))}}),Pe=L(Ne,[["__file","jol-card-club.vue"]]),Le={class:"position-relative"},Oe={class:"offcanvas-header flex-shrink-0 pt-51p pb-24p px-20p px-lg-80p d-flex flex-column gap-30p gap-md-24p"},Je={type:"button",class:"align-self-end btn btn-overlay-secondary p-2","data-bs-dismiss":"offcanvas","aria-label":"Close"},De={class:"position-relative w-100"},Re={class:"d-flex justify-content-between align-items-center w-100"},We=["innerHTML"],Ee={key:0,class:"d-flex gap-12p align-items-center"},Ke={class:"fs-12p fw-bold mb-0"},Ue={key:1,class:"d-flex justify-content-end align-items-center gap-8p"},ze={class:"fs-12p fw-bold mb-0"},Ge={key:0,class:"py-5 flex flex-column align-items-center text-center"},Ze={class:"fs-14p fw-bold text-uppercase"},qe={key:1,class:"w-100 flex-grow-1"},Ye={class:"row row-gap-20p flex-grow-1 d-flex"},Qe={class:"col-lg-6"},Xe={key:2,class:"py-5"},et={class:"fs-32p fw-bold text-gray-400 text-center"},tt={class:"offcanvas-footer p-20p d-flex justify-content-center"},lt=["disabled"],ot={class:"fs-12p lh-lg"},at=["onClick","disabled"],st=P({__name:"jol-club-picker-field",props:{name:{}},emits:["change"],setup(w,{emit:n}){const C=w,T=n,{value:p,errorMessage:h}=Y(ie(C,"name")),{geolocationState:a,refreshOnce:v,coords:f,promptGeolocation:k,isLocating:A,checkGeolocationPermission:M}=fe(),g=B(!0),y=B(""),_=B("alphabetical"),x=X(),{clubs:m}=F(x),$=V(()=>{var l;return(l=m.value.find(r=>r.id.toString()===p.value))==null?void 0:l.name}),S=l=>l&&l.replace(/[\\^$*+?.()|{}[]/g,"\\$&"),t=V(()=>{let l=m.value.filter(r=>new RegExp(S(y.value),"gi").test([r.name,r.fullAddress].join(" ")));if(_.value==="distance"&&f.value){const{latitude:r,longitude:i}=f.value;l=l.sort((I,E)=>R(r,i,I.address.latitude,I.address.longitude)-R(r,i,E.address.latitude,E.address.longitude))}return _.value==="alphabetical"&&(l=l.sort((r,i)=>r.displayName<i.displayName?-1:r.displayName>i.displayName?1:0)),l}),j=l=>{l.toString()!==p.value&&T("change"),p.value=l.toString()},O=async()=>{g.value=!0,await x.getClubs(),g.value=!1,await M(),a.value==="prompt"&&await k(),a.value==="granted"&&(_.value="distance",await v())};return(l,r)=>(d(),H(e(ke),{onShow:O},{activator:u(({show:i})=>[o("div",Le,[s(e(q),{onClick:i,modelValue:$.value,"onUpdate:modelValue":r[0]||(r[0]=I=>$.value=I),"form-floating":"",label:l.$t("join_online.profile.forms.preferred_club"),readonly:"","error-message":e(h)},null,8,["onClick","modelValue","label","error-message"]),s(e(D),{symbol:"chevron-down",class:"icon-toggle icon-14p me-16p position-absolute end-0 top-50 translate-middle-y"})])]),header:u(()=>[o("div",Oe,[o("button",Je,[s(e(D),{symbol:"x",class:"icon icon-m"})]),o("div",De,[s(e(q),{class:"w-100",label:"Search","form-floating":"",modelValue:y.value,"onUpdate:modelValue":r[1]||(r[1]=i=>y.value=i)},null,8,["modelValue"]),s(e(D),{symbol:"search-outline",class:"icon-20p position-absolute top-50 end-0 translate-middle-y me-16p"})]),o("div",Re,[o("p",{class:"fs-14p text-center mb-0",innerHTML:l.$t("join_online.select_club.results_label",{clubCount:t.value.length})},null,8,We),s(e(G),{mode:"out-in"},{default:u(()=>[e(A)?(d(),b("div",Ue,[s(e(z),{class:"text-primary icon"}),o("p",ze,c(l.$t("join_online.select_club.getting_location")),1)])):(d(),b("div",Ee,[o("p",Ke,c(l.$t("join_online.select_club.sort_by.title")),1),s(e(Z),{label:l.$t("join_online.select_club.sort_by.alphabetical_option"),id:"chk-jolClubSorting-aToZ",name:"sorting",modelValue:_.value,"onUpdate:modelValue":r[2]||(r[2]=i=>_.value=i),"true-value":"alphabetical"},null,8,["label","modelValue"]),e(a)!=="denied"?(d(),H(e(Z),{key:0,label:l.$t("join_online.select_club.sort_by.distance_option"),id:"chk-jolClubSorting-distance",name:"sorting",modelValue:_.value,"onUpdate:modelValue":r[3]||(r[3]=i=>_.value=i),"true-value":"distance",disabled:e(a)==="prompt"},null,8,["label","modelValue","disabled"])):N("",!0)]))]),_:1})])])]),footer:u(({hide:i})=>[o("div",tt,[e(p)?(d(),b("button",{key:1,onClick:i,class:"btn btn-primary mx-auto",type:"button",disabled:!e(p)},c(l.$t("join_online.select_club.confirm_club")),9,at)):(d(),H(e(Ce),{key:0},{activator:u(()=>[o("div",null,[o("button",{class:"btn btn-primary mx-auto",type:"button",disabled:!e(p)},c(l.$t("join_online.select_club.confirm_club")),9,lt)])]),default:u(()=>[o("div",ot,c(l.$t("join_online.select_club.tooltip_no_club_selected")),1)]),_:1}))])]),default:u(()=>[s(e(G),{mode:"out-in"},{default:u(()=>[g.value?(d(),b("div",Ge,[s(e(z),{class:"text-primary icon icon-3xl mb-3"}),o("p",Ze,c(l.$t("join_online.select_club.loading")),1)])):t.value.length>0?(d(),b("div",qe,[o("div",Ye,[(d(!0),b(Q,null,re(t.value,i=>(d(),b("div",Qe,[s(e(Pe),{class:"w-100",tag:"button",onClick:I=>j(i.id),club:i,selected:e(p)===i.id.toString(),"distance-in-km":e(f)?e(R)(e(f).latitude,e(f).longitude,i.address.latitude,i.address.longitude)/1e3:void 0},null,8,["onClick","club","selected","distance-in-km"])]))),256))])])):(d(),b("div",Xe,[o("p",et,c(l.$t("join_online.select_club.empty_state")),1)]))]),_:1})]),_:1}))}}),nt=L(st,[["__file","jol-club-picker-field.vue"]]),it=["disabled"],rt={key:0,class:"fs-12p text-gray-600 mt-4p mb-0"},dt={class:"mb-0 fs-14p fw-bold mt-3form-custom-country-dialing-number input-group-text bg-gray-100 py-0 px-2"},ut=["for","innerHTML"],ct={key:0,class:"error-message caption text-danger"},mt=["for","innerHTML"],pt={key:0,class:"error-message caption text-danger"},ft=["for","innerHTML"],bt=P({__name:"form-setup-profile",props:{initialValues:{},countryIntlDialCode:{},disabled:{type:Boolean}},emits:["valuesChange","submit"],setup(w,{emit:n}){const C=w,{schema:T}=_e(),{isSubmitting:p,handleSubmit:h,values:a,errors:v}=de({initialValues:C.initialValues,validationSchema:T}),f=n,k=h(t=>{f("submit",t)});ue(a,he(()=>f("valuesChange",a)));const{clubs:A}=F(X()),{websales:M}=F(ve()),{leadId:g}=F(ee()),y=V(()=>A.value.find(t=>t.id.toString()===a.clubId)),_=V(()=>Math.max(...A.value.map(t=>t.minimumAge))),x=V(()=>{var t;return((t=y.value)==null?void 0:t.minimumAge)??_.value??18}),m=V(()=>U().subtract(x.value,"years").toDate()),$=V(()=>U().diff(a.dateOfBirth,"year")),S=()=>{M.value=null,g.value=""};return(t,j)=>{var O;return d(),b("form",{onSubmit:j[0]||(j[0]=(...l)=>e(k)&&e(k)(...l)),class:"form-setup-profile"},[o("fieldset",{disabled:t.disabled,class:"d-flex flex-column gap-30p gap-lg-16p"},[s(e(J),{name:"firstName",placeholder:t.$t("join_online.common.first_name"),label:t.$t("join_online.common.first_name"),"form-floating":""},null,8,["placeholder","label"]),s(e(J),{name:"lastName",placeholder:t.$t("join_online.common.last_name"),label:t.$t("join_online.common.last_name"),"form-floating":""},null,8,["placeholder","label"]),o("div",null,[s(e(ge),{name:"dateOfBirth",label:t.$t("join_online.common.date_of_birth"),format:"d MMMM yyyy","max-date":m.value,"start-date":m.value},null,8,["label","max-date","start-date"]),y.value&&$.value&&$.value<y.value.ageOfConsent?(d(),b("p",rt,c(t.$t((O=y.value)==null?void 0:O.ageOfConsentWarningDescriptionKey)),1)):N("",!0)]),s(e(J),{name:"email",placeholder:t.$t("join_online.common.email"),label:t.$t("join_online.common.email"),"form-floating":"",type:"email"},null,8,["placeholder","label"]),s(e(J),{class:"flex-grow-1",name:"mobilePhone",autocomplete:"tel-national",placeholder:t.$t("join_online.common.mobile_number"),label:t.$t("join_online.common.mobile_number"),"form-floating":"",type:"tel","field-wrapper-class":"input-group"},{"field-start":u(()=>[o("p",dt,c(t.countryIntlDialCode),1)]),_:1},8,["placeholder","label"]),s(e(nt),{name:"clubId",onChange:S}),o("div",null,[s(e(W),{name:"isAgreeTerms",disabled:e(p)},{default:u(({forAttr:l})=>[o("label",{for:l,class:"form-check-label fs-9p fs-lg-10p align-top mt-4p",innerHTML:t.$t("join_online.profile.forms.terms_checkbox")},null,8,ut)]),_:1},8,["disabled"]),e(v).isAgreeTerms?(d(),b("p",ct,c(e(v).isAgreeTerms),1)):N("",!0)]),o("div",null,[s(e(W),{name:"isAgreeWithHealthStatement",disabled:e(p)},{default:u(({forAttr:l})=>[o("label",{for:l,class:"form-check-label fs-9p fs-lg-10p align-top mt-4p",innerHTML:t.$t("join_online.profile.forms.health_declaration")},null,8,mt)]),_:1},8,["disabled"]),e(v).isAgreeWithHealthStatement?(d(),b("p",pt,c(e(v).isAgreeWithHealthStatement),1)):N("",!0)]),s(e(W),{name:"isAgreeMktConsent",disabled:e(p)},{default:u(({forAttr:l})=>[o("label",{for:l,class:"form-check-label fs-9p fs-lg-10p align-top mt-4p",innerHTML:t.$t("join_online.profile.forms.marketing_consent")},null,8,ft)]),_:1},8,["disabled"]),s(e($e),{tag:"button",type:"submit",class:"btn-primary",disabled:t.disabled,busy:t.disabled},{default:u(()=>[ce(c(t.$t("join_online.common.continue")),1)]),_:1},8,["disabled","busy"])],8,it)],32)}}}),_t=L(bt,[["__file","form-setup-profile.vue"]]),gt={class:"row mb-30p mb-lg-48p"},ht={class:"col-lg-10"},vt={class:"fs-32p fs-lg-40p text-uppercase mb-30p mb-lg-48p"},yt=["onClick"],Ct=P({__name:"jol-profile",setup(w){const{profileBg:{ReuseProfileBgTemplate:n}}=Ae(),C=ye(),{countryIntlDialCode:T,countryName:p}=F(C),h=ee(),{profile:a,planConfig:v}=F(h),f=we(),{t:k,te:A}=Se(),M=B(),g=B({title:"",description:""}),y=m=>{h.$patch({profile:{...m,isAgreeWithHealthStatement:m.isAgreeWithHealthStatement,isHappyToBeContacted:m.isAgreeMktConsent,isAllowContactByThirdParty:m.isAgreeMktConsent,country:p.value},planConfig:{clubId:m.clubId}})},_=B(!1),x=async m=>{var $,S;_.value=!0;try{y(m),await h.createOrUpdateLead(),f.push({name:"jol-membership"})}catch(t){if(g.value.title=k("join_online.common.error_popup.generic_title"),g.value.description=k("join_online.common.error_popup.generic_desc"),Ve(t)){const j=(($=t.response)==null?void 0:$.data.messages)??[];j.length>0&&(A(j[0])&&(g.value.description=k(j[0])),j[0]==="Email_Is_Invalid_DuplicateEmail"&&(g.value.title=k("join_online.common.error_popup.duplicate_email_title")))}(S=M.value)==null||S.show()}finally{_.value=!1}};return(m,$)=>{const S=me("RouterView");return d(),b(Q,null,[s(pe,null,{background:u(()=>[s(e(n))]),default:u(()=>[o("div",gt,[o("div",ht,[s(e(Te))])]),o("h1",vt,c(m.$t("join_online.profile.step_title")),1),s(e(_t),{onValuesChange:y,onSubmit:x,"country-intl-dial-code":e(T),disabled:_.value,"initial-values":{email:e(a).email,firstName:e(a).firstName,lastName:e(a).lastName,mobilePhone:e(a).mobilePhone,isAgreeMktConsent:e(a).isAllowContactByThirdParty&&e(a).isHappyToBeContacted,isAgreeTerms:e(a).isAgreeTerms,isAgreeWithHealthStatement:e(a).isAgreeWithHealthStatement,dateOfBirth:e(a).dateOfBirth,clubId:e(v).clubId??""}},null,8,["country-intl-dial-code","disabled","initial-values"])]),_:1}),s(e(je),{ref_key:"messageModalRef",ref:M,"modal-title":g.value.title},{default:u(({hide:t})=>[o("p",null,c(g.value.description),1),o("button",{onClick:t,class:"btn btn-primary",type:"button"},c(m.$t("join_online.common.close")),9,yt)]),_:1},8,["modal-title"]),s(S)],64)}}}),al=L(Ct,[["__file","jol-profile.vue"]]);export{al as default};