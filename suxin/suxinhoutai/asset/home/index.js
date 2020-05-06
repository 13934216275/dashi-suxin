
let p=document.querySelectorAll(".chart li img");
let o=document.querySelectorAll(".dian ul");
let m=document.querySelectorAll(".chart");
let n=document.querySelector(".left1 i");
let b=document.querySelector(".right1 i");
let lkj=document.querySelector(".head");
let zi=document.querySelectorAll(".head a");
let zi1=document.querySelectorAll(".head span");
let ddd=document.querySelector(".left1");
let ddd1=document.querySelector(".right1");
let zxc=document.querySelector(".hed999");
let bhu=document.querySelectorAll(".kua");
console.log(bhu);
// let bhu1=document.querySelector(".bh1");
// let bhu2=document.querySelector(".bh2");
// let bhu3=document.querySelector(".bh3");
// let bhu4=document.querySelector(".bh4");
// let bhu5=document.querySelector(".bh5");
// let bhu6=document.querySelector(".bh6");
// let bhu7=document.querySelector(".bh7");

window.onscroll=function() {
    let s = document.body.scrollTop || document.documentElement.scrollTop;
    let jl=document.body.scrollTop||document.documentElement.scrollTop;
    let  top=document.querySelector(".top");
    // console.log(s);
    if (s==0) {
        lkj.style.backgroundColor = "";
        zi.forEach(function (a,b) {
            a.style.color = "";
        })
        zi1.forEach(function (v,c) {
          v.style.color=""
        })
    }
    else {
       lkj.style.backgroundColor="#fff";
        // zi1.style.color="#000";
        zi.forEach(function (g,f) {
            g.style.color = "#000";
        })
        zi1.forEach(function (g,f) {
            g.style.color = "#000";
        })
    }
    if(jl>710){
        zxc.style.top="-15px"
    }

    if(jl>750){
        bhu[0].style.left="50px";
        bhu[1].style.left="700px";
    }
    if(jl>900){
        bhu[2].style.left="50px";
        bhu[3].style.left="700px";
    }
    if(jl>1150){
        bhu[4].style.left="50px";
        bhu[5].style.left="615px";
    }
    if(jl>1300){
        bhu[6].style.left="50px";
        bhu[7].style.left="700px";
    }
if(jl>1200){
    top.style.display="block"
}else{
    top.style.display="none"
}
};



let t=setInterval(move,2000);
m[0].onmousemove=function () {
    clearInterval(t)
};
m[0].onmouseleave=function () {
    t=setInterval(move,2000);
};
let zuo00=you00=0;
function move() {
    you00++;
    if(you00>p.length-1){
        you00=0;
    }
    p[you00].style.left="1349px";
    o[zuo00].classList.remove("hot");
    o[you00].classList.add("hot");
    animate (p[zuo00],{left:-1349});
    animate (p[you00],{left:0});
    zuo00=you00;
}
function move1() {
    zuo00--;
    if(zuo00<0){
        zuo00=p.length;
    }
    p[zuo00].style.left="-1349px";
    o[zuo00].classList.add("hot");
    o[you00].classList.remove("hot");
    animate (p[you00],{left:1349});
    animate (p[zuo00],{left:0});
    you00=zuo00;
}
n.onclick=function () {
    move1();
};
b.onclick=function () {
    move();
}
for(let i=0;i<p.length;i++){
    o[i].onclick=function () {
        if(i<zuo00){
            p[i].style.left="0";
            o[zuo00].classList.remove("hot");
            o[i].classList.add("hot");
            animate (p[zuo00],{left:1349});
            animate (p[i],{left:0});
        }else{
            p[zuo00].style.left="1349px";
            o[i].classList.add("hot");
            o[zuo00].classList.remove("hot");
            animate (p[i],{left:0});
            animate (p[zuo00],{left:0});
        }
        zuo00=i;
    }
}
ddd.onmousemove=function(){
    n.style.display="block"
}
ddd.onmouseleave=function(){
    n.style.display=""
}
ddd1.onmousemove=function(){
    b.style.display="block"
}
ddd1.onmouseleave=function(){
    b.style.display=""
}

//     let tu=document.querySelectorAll(".kk");
//     let uu=document.querySelector(".zuo");
//     let ii=document.querySelector(".you");
//     let bbb=document.querySelector(".da");
// // console.log(tu, uu, ii);
// let kuan=bbb.offsetWidth/5;
// // console.log(kuan);
// let num=0;
// ii.onclick=function () {
//     num++;
//     if(num>=3){
//         num=2;
//     }
//     bbb.style.transform=`translatex(${-kuan*num}px)`
// }
// uu.onclick=function () {
//     num--;
//     if(num<0){
//         num=0;
//     }
//     bbb.style.transform=`translatex(${-kuan*num}px)`
// }

function threeBanner(content1,bao,da,kk,zuo,you){
    let bigBox = document.querySelector(".content1");
    let grand = document.querySelector(".bao");
    let father = document.querySelector(".da");
    let son = document.querySelectorAll(".kk");
    let Left_btn = document.querySelector(".zuo" );
    let Right_btn = document.querySelector(".you" );
    let t = setInterval(back,2000);
    let flag = true;
    function back(){
        flag = false;
        if(flag){
            return;
        }
        animate(father,{left:-700},function(){
            father.appendChild(father.firstElementChild);
            father.style.left = "-380px";
            flag = true;
        });
    }

    function move(){
        flag = false;
        if(flag){
            return;
        }
        animate(father,{left:0},function(){
            father.style.left = "";
            father.insertBefore(father.lastElementChild,father.firstElementChild);
            father.style.left = "-380px";
            flag = true;
        });
    }

    Left_btn.onclick = function(){
        if(!flag){
            return;
        }
        move();
    }
    Right_btn.onclick = function(){
        if(!flag){
            return;
        }
        back();
    }
    bigBox.onmouseenter = function(){
        clearInterval(t);
    }

    bigBox.onmouseleave = function(){
        t = setInterval(back,2000);
    }
}
threeBanner("content1","bao","da","kk","zuo","you");







