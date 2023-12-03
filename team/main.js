let moon = document.getElementById("moon");
let text = document.getElementById("text");
let cityRight = document.getElementById("cityRight");
let cityLeft = document.getElementById("cityLeft");

window.addEventListener("scroll",()=>{
    let value = window.scrollY;
    moon.style.top = value * .8 + "px";
    text.style.marginTop = value * 1.5 + "px";
    cityRight.style.right = value * 1.5 + "px";
    cityLeft.style.left = value * -1.5 + "px";

});

window.addEventListener('scroll', e => {
	document.documentElement.style.setProperty('--scrollTop', `${this.scrollY}px`)
})
gsap.registerPlugin(ScrollTrigger, ScrollSmoother)
ScrollSmoother.create({
	wrapper: '.wrapper',
	content: '.content'
})

