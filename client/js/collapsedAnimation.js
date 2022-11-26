const burguerBtn = document.querySelector(".navbar-toggler"); 
const img_pfp = document.querySelector("#pfp");
let flag = true; //button clicked and not collapsed

burguerBtn.addEventListener("click",()=>{
    if(flag){
        img_pfp.style.transition = "ease 0.3s";
        img_pfp.style.top="350px";
        console.log(flag);
        flag=false;
    }else{
        img_pfp.style.transition = "ease 0.3s";
        img_pfp.style.top = "105px";
        flag=true;
    }
});

