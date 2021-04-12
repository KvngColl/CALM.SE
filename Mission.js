const flash = document.querySelector(".flash");
const states = [
    () => {
        flash.style.transition = "transform 1ms";
        flash.style.transform = "translateX(-196px) rotate(0deg)";
    },
    () => {
        flash.style.transition = "transform 700ms ease-in-out";
        setTimeout(() => {
            flash.style.transform = "translateX(-196px) rotate(-485deg)";
        }, 100);
    },
    () => (flash.style.transform = "translateX(-196px) rotate(-320deg)"),
    () => (flash.style.transform = "translateX(-196px) rotate(-375deg)"),
    () => (flash.style.transform = "translateX(-196px) rotate(-355deg)"),
    () => (flash.style.transform = "translateX(-196px) rotate(-360deg)")
];
let currentState = 0;
const animateToNextState = () => {
    requestAnimationFrame(() => {
        states[++currentState % states.length]();
    });
};
flash.addEventListener("transitionend", () => animateToNextState());
window.onload = () => {
    animateToNextState();
};

