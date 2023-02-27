const slidePage = document.querySelector(".slide-page");
const nextBtnFirst = document.querySelector(".firstNext");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");
const prevBtnFourth = document.querySelector(".prev-3");
const submitBtn = document.querySelector(".submit");
const progressText = document.querySelectorAll(".step p");
const progressCheck = document.querySelectorAll(".step .check");
const bullet = document.querySelectorAll(".step .bullet");
let current = 1;
nextBtnFirst.addEventListener("click", function(event) {
    event.preventDefault();
    slidePage.style.marginLeft = "-25%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
});
nextBtnSec.addEventListener("click", function(event) {
    event.preventDefault();
    slidePage.style.marginLeft = "-50%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
});
nextBtnThird.addEventListener("click", function(event) {
    event.preventDefault();
    slidePage.style.marginLeft = "-75%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
});
submitBtn.addEventListener("click", function() {
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
    setTimeout(function() {
        alert("Your Form Successfully Signed up");
        location.reload();
    }, 800);
});
prevBtnSec.addEventListener("click", function(event) {
    event.preventDefault();
    slidePage.style.marginLeft = "0%";
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -= 1;
});
prevBtnThird.addEventListener("click", function(event) {
    event.preventDefault();
    slidePage.style.marginLeft = "-25%";
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -= 1;
});
prevBtnFourth.addEventListener("click", function(event) {
    event.preventDefault();
    slidePage.style.marginLeft = "-50%";
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -= 1;
});







x = 0;
element1 = 0;
element2 = 0;
element3 = 0;
count1 = document.getElementById("count1");
count2 = document.getElementById("count2");
count3 = document.getElementById("count3");

function clickCounter(t, up, down) {
    if (document.getElementById(t).checked) {
        switch (up) {
            case 'up1':
                element1 = 1;
                break;
            case 'up2':
                element2 = 1;
                break;
            case 'up3':
                element3 = 1;
                break;
        }

        document.getElementById(up).classList.add("removeborder");
        document.getElementById(down).classList.add("removeborder");
        document.getElementById(up).classList.remove("hide");
        document.getElementById(down).classList.remove("hide");


    } else {
        switch (up) {
            case 'up1':
                element1 = 0;
                break;
            case 'up2':
                element2 = 0;
                break;
            case 'up3':
                element3 = 0;
                break;
        }
        document.getElementById(up).classList.add("hide");
        document.getElementById(down).classList.add("hide");
        document.getElementById(up).classList.remove("removeborder");
        document.getElementById(down).classList.remove("removeborder");

    }
    x = element1 + element2 + element3;
    document.getElementById("result").innerHTML = "x " + x;
    count1.innerHTML = "x " + element1;
    count2.innerHTML = "x " + element2;
    count3.innerHTML = "x " + element3;


}

function up(up, countx) {
    if (x <= 6) {
        console.log(countx);
        let p = 0;
        switch (up) {
            case 'up1':
                element1++;
                p = element1;
                break;
            case 'up2':
                element2++;
                p = element2;
                break;
            case 'up3':
                element3++;
                p = element3;
                break;
        }
        x++;
        document.getElementById(countx).innerHTML = "x " + p;
        document.getElementById("result").innerHTML = "x " + x;

    }
}


function down(down, countx) {
    console.log(countx);
    let p = 0;
    switch (down) {
        case 'down1':
            element1--;
            p = element1;
            break;
        case 'down2':
            element2--;
            p = element2;
            break;
        case 'down3':
            element3--;
            p = element3;
            break;
    }
    x--;
    document.getElementById(countx).innerHTML = "x " + p;
    document.getElementById("result").innerHTML = "x " + x;

}

function fnChangeBorder(boxId)

{
    document.getElementById(boxId).style.border = "solid #91A13B";
}

function fnChangeBorder2(boxId)

{
    document.getElementById(boxId).style.border = "solid #91A13B";
}

function fnChangeBorder3(boxId)

{
    document.getElementById(boxId).style.border = "solid #91A13B";
}

function fnChangeBorder4(boxId)

{
    document.getElementById(boxId).style.border = "solid #91A13B";
}

function fnChangeBorder5(boxId)

{
    document.getElementById(boxId).style.border = "solid #91A13B";
}


function displayPhrase() {
    document.getElementById("demo3").innerHTML = 'Great choice!';
}

function nextbutton() {
    document.getElementById("cardcheckout").innerHTML = 'hi';
    console.log("here");
}
