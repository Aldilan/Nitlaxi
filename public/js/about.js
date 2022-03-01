//Clock With Javascript
function realTime() {
    let now = new Date();
    // let second = now.getSeconds();
    let minute = now.getMinutes();
    let hour = now.getHours();
    // let meridiem = 'AM';
    // let dayName = now.getDay();
    let dayNum = now.getDate();
    let dayNumOut = dayNum + 1;
    if (dayNumOut > 0 && dayNumOut < 10) {
        dayNumOut = '0' + dayNumOut 
    }
    if (dayNum > 0 && dayNum < 10) {
        dayNum = '0' + dayNum
    }
    let month = now.getMonth();
    month += 1;
    if (month > 0 && month < 10) {
        month = `0` + month
    }
    let year = now.getFullYear();
    let tgl = year+`-`+month+`-`+dayNum;
    let tglOut = year+`-`+month+`-`+dayNumOut;
    
    // if (hour == 0) {
    //     hour = 12;
    // }
    // if (hour >12) {
    //     hour -= 12;
    //     meridiem = "PM"
    // }

    Number.prototype.pad = function (digit) {
        for (var n = this.toString(); n.length < digit; n = 0 + n);
        return n;
    }

    const tgl_check_in = document.getElementById('tgl_check_in');
    tgl_check_in.setAttribute('value',tgl);
    const tgl_check_out = document.getElementById('tgl_check_out');
    tgl_check_out.setAttribute('value',tglOut);

    // const months = ["January","February","March","April","May","June","July","Agustus","September","Oktober","November","Desember"];
    // const days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
    const ids = ['hour','minute'];
    const values = [hour.pad(2)+':',minute.pad(2)];
    for (let i = 0; i < ids.length; i++) {
        document.getElementById(ids[i]).firstChild.nodeValue = values[i];
            
    }
};
function updating() {
    realTime();
    window.setInterval("realTime()", 1);
};

updating();

//automatic pgUp when reload
function pgUp() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
};
pgUp()

//function page up-
const pgUpBtnBtm = document.querySelector('.footerRight img');
pgUpBtnBtm.addEventListener('click', function () {
    pgUp();
})
