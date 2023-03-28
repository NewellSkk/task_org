// let records = document.querySelector('.records');
// let tenant_form = document.querySelector('.toggle');
// records.addEventListener('click',()=>{
//     tenant_form.classList.toggle('tenant_form');
// }
// );
let records = document.querySelectorAll('.records');
let tenant_form = document.querySelector('.toggle');
records.foreach(i=>
{
    i.addEventListener('click',()=>{  
    tenant_form.classList.toggle('tenant_form');
    })
})
