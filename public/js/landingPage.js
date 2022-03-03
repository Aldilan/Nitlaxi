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

//functions slideshow
let numRadio = 1;
setInterval(function () {
    document.getElementById('radio' + numRadio).checked = true;
    numRadio++;
    if (numRadio > 4) {
        numRadio = 1;
    }
},5000);

//automatic pgUp when reload
function pgUp() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
};
pgUp()

//function gallery
const gallery = document.querySelectorAll('.pages ul li a')[3];
gallery.addEventListener('click', function (e) {
    e.preventDefault()
    window.scrollTo({ top: 1700, behavior: 'smooth'});
})

//function page up
const pgUpbtnHome = document.querySelectorAll('.pages ul li a')[0];
pgUpbtnHome.addEventListener('click', function (e) {
    e.preventDefault()
    pgUp();
})
const pgUpBtnBtm = document.querySelector('.footerRight img');
pgUpBtnBtm.addEventListener('click', function () {
    pgUp();
})

//funct luxury
const rnsOpts = document.querySelectorAll('.rnsOpt')
const rnss = document.querySelectorAll('.RNS')
rnsOpts.forEach(function (rnsOpt) {
    rnsOpt.addEventListener('click',function (e) {
        rnsOpts.forEach(function (rnsOpt2) {
            rnsOpt2.classList.remove('borderBottom')
        })
        if (e.target.getAttribute('id') == 'LuxuryRNS') {
            e.target.classList.add('borderBottom')
            rnss.forEach(function (rns) {
                if (rns.getAttribute('id') == 'Kamar Luxury') {
                    rns.classList.remove('displayNone')
                }else{
                    rns.classList.add('displayNone')
                }
            })
        }else {
            e.target.classList.add('borderBottom')
            rnss.forEach(function (rns) {
                if (rns.getAttribute('id') == 'Luxury Suite') {
                    rns.classList.remove('displayNone')
                }else{
                    rns.classList.add('displayNone')
                }
            })
        }
    })
})

function rnsOto() {
    rnss.forEach(function (rns3) {
        if (rns3.getAttribute('id') == 'Kamar Luxury') {
            rns3.classList.remove('displayNone')
        }else{
            rns3.classList.add('displayNone')
        }
    })
}
rnsOto()

//function notif
const closeButton = document.querySelector('#closeNotif');
closeButton.addEventListener('click',function () {
    closeButton.parentElement.classList.add('displayNone')
})

//function dropdown profile
const dropdownProfileLink = document.querySelector('.dropdownProfileLink')
const dropdownProfile = document.querySelector('.dropdownProfile')

dropdownProfileLink.addEventListener('mouseenter',function (e) {
    dropdownProfile.classList.remove('displayNone')
})
dropdownProfileLink.addEventListener('mouseleave',function (e) {
    dropdownProfile.classList.add('displayNone')
})
dropdownProfile.addEventListener('mouseenter',function (e) {
    dropdownProfile.classList.remove('displayNone')
})
dropdownProfile.addEventListener('mouseleave',function (e) {
    dropdownProfile.classList.add('displayNone')
})

//function map
function initMap() {
    //options map
    let options = {
        zoom:12,
        center:{lat:-6.7311989,lng:106.797352}
    }

    //new map
    let map = new google.maps.Map(document.getElementById('map'), options)

    //marker map
    let marker = new google.maps.Marker({
        position:{lat:-6.7311989,lng:106.797352},
        map:map,
    })
}



//function menu and booking slide
const menus = document.getElementById('menus')
const menusSlide = document.querySelector('.menuSlide')
menus.addEventListener('click', function (e) {
    menusSlide.classList.toggle('menuSlideResponse')
    if(menusSlide.className == 'menuSlide menuSlideResponse') {
        e.target.setAttribute('src','/img/icon/x.png')
    }else{
        e.target.setAttribute('src','/img/icon/menu.png')
    }
})