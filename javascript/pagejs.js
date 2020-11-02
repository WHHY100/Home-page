function showDescribe()
{
    document.getElementById("describeAuthor").className = "describeShow";
    document.getElementById("arrowDown1").className = "arrowShow";
    document.getElementById("arrowDown2").className = "arrowShow";
}

function hideDescribe()
{
    document.getElementById("describeAuthor").className = "describe"
    document.getElementById("arrowDown1").className = "arrow";
    document.getElementById("arrowDown2").className = "arrow";
}

function skillsDescribe(param)
{
    let result;
    let arrowResultUp;
    let arrowResultDown;

    if(param === "show") {
        result = "inline";
        arrowResultUp = "inline";
        arrowResultDown = "none";
    }
    else if(param === "hide") {
        result = "none";
        arrowResultUp = "none";
        arrowResultDown = "inline";
    }
    else return false;

    let selectedElements = document.querySelectorAll(".skillsDescribe");

    document.getElementById("arrowDown3").style.display = arrowResultDown;
    document.getElementById("arrowUp2").style.display = arrowResultUp;

    for(let i = 0; i<selectedElements.length; i++)
    {
        selectedElements[i].style.display = result;
    }

    return true;
}

function projectDescribeShow() {

    let selectedElements = document.querySelectorAll(".projectDescribe");

    document.getElementById("arrowDown4").style.display = "none";
    document.getElementById("arrowUp3").style.display = "inline";

    for (let i = 0; i < selectedElements.length; i++) {
        selectedElements[i].style.maxHeight = "none";
        selectedElements[i].style.height = "auto";
        selectedElements[i].style.overflow = "visible";
    }
}

function projectDescribeHide() {

    let selectedElements = document.querySelectorAll(".projectDescribe");

    document.getElementById("arrowDown4").style.display = "inline";
    document.getElementById("arrowUp3").style.display = "none";

    for (let i = 0; i < selectedElements.length; i++) {
        selectedElements[i].style.maxHeight = "100px";
        selectedElements[i].style.overflow = "hidden";
    }
}

function projectDescribeArchShow() {

    let selectedElements = document.querySelectorAll(".projectDescribeArch");

    document.getElementById("arrowDown5").style.display = "none";
    document.getElementById("arrowUp4").style.display = "inline";

    for (let i = 0; i < selectedElements.length; i++) {
        selectedElements[i].style.maxHeight = "none";
        selectedElements[i].style.height = "auto";
        selectedElements[i].style.overflow = "visible";
    }
}

function projectDescribeArchHide() {

    let selectedElements = document.querySelectorAll(".projectDescribeArch");

    document.getElementById("arrowDown5").style.display = "inline";
    document.getElementById("arrowUp4").style.display = "none";

    for (let i = 0; i < selectedElements.length; i++) {
        selectedElements[i].style.maxHeight = "100px";
        selectedElements[i].style.overflow = "hidden";
    }
}