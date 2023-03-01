let taskBox= document.querySelector('.display');
let active= document.querySelectorAll('.category span');
active.forEach(show=>{
    show.addEventListener('click',()=>{
        document.querySelector('span.active').classList.remove('active');
        show.classList.add('active');
        display(show.id)
    });
});
//list of different task categories
let tasks={
    general:['window panes','faulty door knob','loose tiles','other'],
    plumbing:['clogged drain','leaky pipe','faulty taps','faulty cistern'],
    electric:['light switch','bulb holder','blown fuse'],
};
