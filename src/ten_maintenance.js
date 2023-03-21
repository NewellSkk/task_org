let disp= document.querySelector('.list');
let active= document.querySelectorAll('.category span');
active.forEach(show=>{
    show.addEventListener('click',()=>{
        document.querySelector('span.active').classList.remove('active');
        show.classList.add('active');
        //INCOMPLETE
        //ADD CLASS WITH DIPLAY:BLOCK REMOVE DISPLAY:NONE  
        document.querySelector('.show').classList.remove('show');
        if (show.classList.contains('general')) {
            document.querySelector('div.general').classList.add('show');
        }else if(show.classList.contains('plumbing')){
            document.querySelector('div.plumbing').classList.add('show');
        }else if(show.classList.contains('electric')){
            document.querySelector('div.electric').classList.add('show');
        }
    });
   
});
//list of different task categories
let tasks={
    general:['window panes','faulty door knob','loose tiles','other'],
    plumbing:['clogged drain','leaky pipe','faulty taps','faulty cistern'],
    electric:['light switch','bulb holder','blown fuse'],
};
