function setSlide(number) {
    clearSelected();
    currentSlide(number);
    document.querySelectorAll('.thumbImage')[number - 1].style.borderBottom = "6px solid purple";
}

function clearSelected() {
    Array.from(document.querySelectorAll('.thumbImage')).forEach(item => item.style.borderBottom = "");
}
document.querySelector(".prevBtn").addEventListener("click", () => {
    changeSlides(-1);
});
document.querySelector(".nextBtn").addEventListener("click", () => {
    changeSlides(1);
});
var slideIndex = 1;
showSlides(slideIndex);

function changeSlides(n) {
    showSlides((slideIndex += n));
}

function currentSlide(n) {
    showSlides((slideIndex = n));
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("Slide");
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    Array.from(slides).forEach(item => (item.style.display = "none"));
    slides[slideIndex - 1].style.display = "block";
}

function increaseCount(a, b) {
    var input = b.previousElementSibling;
    var value = parseInt(input.value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    input.value = value;
}

function decreaseCount(a, b) {
    var input = b.nextElementSibling;
    var value = parseInt(input.value, 10);
    if (value > 1) {
        value = isNaN(value) ? 0 : value;
        value--;
        input.value = value;
    }
}
const btn = document.getElementById('btn');


btn.addEventListener('click', function handleClick() {
    btn.textContent = 'Button clicked';
});


function myFunction() {

    var btn = document.getElementById("submit_addtocart");

    if (btn.value == "Add to cart") {
        btn.value = "Item Added ! ";
        document.getElementById("submit_addtocart").style.backgroundColor = "#2E613A";
        btn.innerHTML = "Item Added ! ";
    } else {
        btn.value = "Add to cart";
        document.getElementById("submit_addtocart").style.backgroundColor = "#A9AB17";
        btn.innerHTML = "Add to cart";
    }

}

function myFunction2() {

    var round = document.getElementById("round");


    document.getElementById("round").style.backgroundColor = "#A9AB17";
    document.getElementById("round").style.Color = "#FFFFF";


}

function myFunction3() {

    var round1 = document.getElementById("round1");


    document.getElementById("round1").style.backgroundColor = "#A9AB17";
    document.getElementById("round1").style.Color = "#FFFFF";

}
