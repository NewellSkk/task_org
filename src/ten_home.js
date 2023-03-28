let records = document.querySelectorAll('.records');
records.forEach(i=>
{
    i.addEventListener('click',()=>{ 
        if(i.classList.contains('1')){
            document.querySelector('#one').classList.toggle('tenant_form');
        }else if(i.classList.contains('2')){
            document.querySelector('#two').classList.toggle('tenant_form');
        }
        
    })
})