
let a=document.querySelector(".buju");
let y=document.querySelector(".sou");
let i1=document.querySelector(".input-box");
let i2=document.querySelector(".input-box3");
let i3=document.querySelector(".input-box1");
let dian=document.querySelector(".tijiao");
let kk=document.querySelector(".kua");
// console.log(gg);
dian.onclick=function () {
    let ll = i1.value;
    let pp = i2.value;
    let oo=i3.value;
    // console.log(ll);
    i1.value = "";
    i2.value = "";
    i3.value = "";
    if (!ll && !pp&&!oo) {
        alert("必须输入才能提交")
    } else {
        let str = ` <div class="kua">
           <i class="iconfont icon-yonghuzhongxin_f"></i>
           <b>${ll}</b>
            <span>2019-03-28 10:36:50</span>
            <p> ${oo}</p>
            <div class="kong">
                <ul>${pp}</ul>
            </div>
            <div class="xian" style="width: 100%;height: 1px;background: #999999;margin-top: 20px;"></div>
        </div>`;
        let z=document.querySelector(".buju");
        z.innerHTML+=str
    }
}