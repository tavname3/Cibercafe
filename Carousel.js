let prevBtn = document.getElementById('prev');
let nextBtn = document.getElementById('next');
let bgImages = document.querySelector('.bigContainer').children;
let images = document.querySelector('.container').children;
let index = 0;
let length = images.length;
let numbers = document.getElementById('number');
let content = ['Promociones', 'Promociones', 'Promociones', 'Promociones','Promociones']
let contentHeading = document.getElementById('content')

const nextImage = (e) => {
    if(e == 'next'){
        index++;
        numbers.innerHTML = `0${index+1}`;
        contentHeading.innerHTML = `${content[index]}`
        if(index == length){
            index = 0;
            numbers.innerHTML = `0${index+1}`;
            contentHeading.innerHTML = `${content[0]}`
        }
    }
    else{
        if(index == 0){
            index = length-1;
            numbers.innerHTML = `0${index+1}`;
            contentHeading.innerHTML = `${content[index]}`
            
        }
        else{
            index--;
            numbers.innerHTML = `0${index+1}`;
            contentHeading.innerHTML = `${content[index]}`
        }
    }

    for(let i = 0; i< length; i++){
        images[i].classList.remove('show');
        bgImages[i].classList.remove('show');
    }
    images[index].classList.add('show');
    bgImages[index].classList.add('show');
    // images.style.transform = `translateX(-40px)`;


}
prevBtn.addEventListener('click', ()=>{
    nextImage('prev');
})

nextBtn.addEventListener('click', ()=>{
    nextImage('next');
})

















