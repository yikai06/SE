import{d as u,j as c,k as m,l as r,x as p,t as f,y as h}from"./forms-697c0855.js";import"./product-listing.vue_vue_type_style_index_0_lang-83b95a72.js";import{_ as V}from"./_plugin-vue_export-helper-c27b6911.js";const k={class:"form-check"},b=["id","name","checked","disabled"],y=["for"],C=u({__name:"checkbox-control",props:{id:{},name:{},label:{},trueValue:{default:!0},falseValue:{},disabled:{type:Boolean},isInvalid:{type:Boolean},modelValue:{},inputClass:{},dark:{type:Boolean}},emits:["update:modelValue","change"],setup(t,{emit:n}){const a=t,l=n,d=()=>a.modelValue?Array.isArray(a.modelValue)?a.modelValue.findIndex(e=>e===a.trueValue)!==-1:a.modelValue===a.trueValue:!1,i=e=>{const s=e.target;if(Array.isArray(a.modelValue)){const o=[...a.modelValue];s.checked?o.push(a.trueValue):o.splice(o.indexOf(a.trueValue),1),l("update:modelValue",o),l("change");return}l("update:modelValue",s.checked?a.trueValue:a.falseValue),l("change")};return(e,s)=>(c(),m("div",k,[r("input",{id:e.id,class:p(["form-check-input",e.inputClass,e.isInvalid&&"is-invalid",e.dark&&"form-check-input-dark"]),name:e.name,type:"checkbox",checked:d(),onChange:i,disabled:e.disabled},null,42,b),f(e.$slots,"default",{forAttr:e.id},()=>[r("label",{class:"form-check-label",for:e.id},h(e.label),9,y)])]))}}),v=V(C,[["__file","checkbox-control.vue"]]);export{v as default};
