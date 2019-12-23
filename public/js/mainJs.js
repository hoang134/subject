var btnAdd=document.getElementsByClassName("btnSubject");

for (var i = 0; i < btnAdd.length; i++) {

    btnAdd[i].onclick= function() {
        var error=document.getElementById('error');
        error.innerHTML="";
        var btnDele=document.getElementsByClassName("subjectTimes");
        if( btnDele.length==0){
            error.style.color = "#1a73e8";
            error.innerHTML="đăng ký thành công";

            return 0;
        }

        btnCode=document.getElementsByClassName("subjectCode");

        var btnAdd=this.parentElement.parentElement;
        time2=btnAdd.children[3].innerHTML;
        code2=btnAdd.children[2].innerHTML;
        for (var i=0;i<btnDele.length;i++) {
            if (btnCode[i].innerHTML==code2){
                error.style.color = "#ff0000";
                error.innerHTML="môn thi đã đăng ký";
                break;
            }
            if(!check(btnDele[i].innerHTML, time2)){
                error.style.color = "#ff0000";
                error.innerHTML="môn thi  bị trùng lịch";
                break;
            }
            error.style.color = "#1a73e8";
            error.innerHTML="đăng ký thành công";
        }

    }
};
function check(time1,time2) {

    var hours = time1.split("-");
    hours[0]=hours[0].replace('h','');
    hours[1]=hours[1].replace('h','');
    var x = time2.split("-");
    x[0]=x[0].replace('h','');
    x[1]=x[1].replace('h','');

    if (hours[2]==x[2]&&hours[3]==x[3])
    {
        if(Number(hours[0])<=Number(x[0])&&Number(x[0])<=Number(hours[1]))
            return  false;
        if(Number(hours[0])<=Number(x[1])&& Number(x[1])<=Number(hours[1]))
            return  false;
        if(Number(x[0])<=Number(hours[0]) && Number(x[1])>=Number(hours[1]))
            return  false;
    }
    return true;
}

