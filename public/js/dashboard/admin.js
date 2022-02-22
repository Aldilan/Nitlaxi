//Clock With Javascript
function realTime() {
    let now = new Date();
    // let second = now.getSeconds();
    // let minute = now.getMinutes();
    let hour = now.getHours();
    let greeting = 'greeting';
    let quote = 'quote';
    // let dayName = now.getDay();
    // let dayNum = now.getDate();
    // let month = now.getMonth();
    // let year = now.getFullYear();

    if (hour <= 5) {
        greeting = 'Selamat Malam';
        quote = 'Kalau kamu sudah lelah, lebih baik istirahat saja, kesehatan tubuh kamu itu yang paling utama'
    }
    else if (hour <= 12) {
        greeting = "Selamat Pagi";
        quote = "Semoga di pagi ini kamu semakin semangat untuk bekerja, dan jangan lupa untuk sarapan"
    }
    else if (hour <= 14) {
        greeting = "Selamat Siang";
        quote = "Jangan lupa makan siangnya, agar tambah semangat untuk bekerja"
    }
    else if (hour <= 17) {
        greeting = "Selamat Sore";
        quote = "Kalau kamu punya sidikit waktu, kamu bisa olahraga ringan dulu agar badan mu tetap sehat"
    } else {
        greeting = "Selamat Malam";
        quote = "Malam gini kok masih kerja? Haha mimin bercanda, jangan tidur terlalu malam ya"
    }

    Number.prototype.pad = function (digit) {
        for (var n = this.toString(); n.length < digit; n = 0 + n);
        return n;
    }

    // const months = ["January","February","March","April","May","June","July","Agustus","September","Oktober","November","Desember"];
    // const days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
    const ids = ['greeting', 'quote'];
    const values = [greeting, quote];
    for (let i = 0; i < ids.length; i++) {
        document.getElementById(ids[i]).innerHTML = values[i];
            
    }
};
function updating() {
    realTime();
    window.setInterval("realTime()", 1);
};

updating();

//addon
let classContain = document.querySelector('.contain div').getAttribute('class')

// sideber function
const sidebarButton = document.querySelector('.headerSidebar a');
const contain = document.querySelector('.contain');
const dataTable = document.querySelector('.dataTable');
const notifs = document.querySelectorAll('#notif')
const dropdownProfile = document.querySelector('.dropdownProfile')
sidebarButton.addEventListener('click', function(e) {
    e.preventDefault()
    e.target.classList.toggle('rotateArrowSidebar')
    sidebarButton.parentElement.parentElement.classList.toggle('marginLeftSidebar');
    dropdownProfile.classList.toggle('dropdownProfileSlide')
    if (classContain != "homeContain") {
        dataTable.classList.toggle('dataTableSlide')
    }
    notifs.forEach(function (notif) {
        notif.classList.toggle('failSuccessNotifSlide')
    })
    contain.classList.toggle('containSlide');
})

//function notif
const closeButton = document.querySelector('#closeNotif');
closeButton.addEventListener('click',function () {
    closeButton.parentElement.classList.add('displayNone')
})

//change pages function
const cardsContain = document.querySelectorAll('.cardContain')
const tableUser = document.querySelector('.tableUser')
const tableRoom = document.querySelector('.tableRoom')
const tableRoomFacility = document.querySelector('.tableRoomFacility')
const tableHotelFacility = document.querySelector('.tableHotelFacility')
const tambahUser = document.querySelector('.tambahUser')
const tambahKamar = document.querySelector('.tambahKamar')
const tambahFasilitasKamar = document.querySelector('.tambahFasilitasKamar')
const tambahFasilitasHotel = document.querySelector('.tambahFasilitasHotel')
const editDatas = document.querySelectorAll('.editData')
const notifHasil = document.getElementById('notif')


function playAllNone() {
    cardsContain.forEach(function (cardContain) {
        cardContain.classList.add('displayNone');
    })
    editDatas.forEach(function (editData) {
        editData.classList.add('displayNone')
    })
    tableUser.classList.add('displayNone')
    tableRoom.classList.add('displayNone')
    tableRoomFacility.classList.add('displayNone')
    tableHotelFacility.classList.add('displayNone')
    tambahUser.classList.add('displayNone')
    tambahKamar.classList.add('displayNone')
    tambahFasilitasKamar.classList.add('displayNone')
    tambahFasilitasHotel.classList.add('displayNone')
}

function playDefault() {
    playAllNone();
    cardsContain.forEach(function (cardContain) {
        cardContain.classList.remove('displayNone');
    })
}

playDefault();

function playTabelUser() {
    playAllNone();
    tableUser.classList.remove('displayNone')
    notifHasil.classList.add('displayNone')
}

function playTabelRoom() {
    playAllNone();
    tableRoom.classList.remove('displayNone')
    notifHasil.classList.add('displayNone')
}

function playTabelRoomFacility() {
    playAllNone();
    tableRoomFacility.classList.remove('displayNone')
    notifHasil.classList.add('displayNone')
}

function playTabelHotelFacility() {
    playAllNone();
    tableHotelFacility.classList.remove('displayNone')
    notifHasil.classList.add('displayNone')
}

function playTambahUser() {
    playAllNone();
    tambahUser.classList.remove('displayNone')
    notifHasil.classList.add('displayNone')
}

function playTambahKamar() {
    playAllNone();
    tambahKamar.classList.remove('displayNone')
    notifHasil.classList.add('displayNone')
}

function playTambahKamarFacility() {
    playAllNone();
    tambahFasilitasKamar.classList.remove('displayNone')
    notifHasil.classList.add('displayNone')
}

function playTambahHotelFacility() {
    playAllNone();
    tambahFasilitasHotel.classList.remove('displayNone')
    notifHasil.classList.add('displayNone')
}

const sidebarLinksLeft = document.querySelectorAll('.sidebarLeft ul li a');
sidebarLinksLeft.forEach(function (sidebarLinkLeft) {
    sidebarLinkLeft.addEventListener('click', function (e) {
        e.preventDefault();
        sidebarLinksLeft.forEach(function (sidebarLinkLeft2) {
            sidebarLinkLeft2.classList.remove('active');
        });
        e.target.classList.add('active');
        if (e.target.textContent == 'Dashboard') {
            playDefault()
        }
        else if (e.target.textContent == 'User') {
            playTabelUser()
        }
        else if (e.target.textContent == 'Room') {
            playTabelRoom()
        }
        else if (e.target.textContent == 'Room Facilities') {
            playTabelRoomFacility()
        }else {
            playTabelHotelFacility();
        }
    })
})

const sidebarLinksRight = document.querySelectorAll('.sidebarRight ul li a');
sidebarLinksRight.forEach(function (sidebarLinkRight) {
    sidebarLinkRight.addEventListener('click', function (e) {
        e.preventDefault();
        srcPhotos = e.target.getAttribute('src');
        if (srcPhotos == '/img/icon/home.png') {
            playDefault();
            sidebarLinksLeft.forEach(function (sidebarLinkLeft3) {
                if (sidebarLinkLeft3.textContent == 'Dashboard') {
                    sidebarLinkLeft3.classList.add('active')
                }else {
                    sidebarLinkLeft3.classList.remove('active');
                }
            })
        }else if (srcPhotos == '/img/icon/profile.png') {
            playTabelUser();
            sidebarLinksLeft.forEach(function (sidebarLinkLeft3) {
                if (sidebarLinkLeft3.textContent == 'User') {
                    sidebarLinkLeft3.classList.add('active')
                }else {
                    sidebarLinkLeft3.classList.remove('active');
                }
            })
        }else if (srcPhotos == '/img/icon/door.png') {
            playTabelRoom();
            sidebarLinksLeft.forEach(function (sidebarLinkLeft3) {
                if (sidebarLinkLeft3.textContent == 'Room') {
                    sidebarLinkLeft3.classList.add('active')
                }else {
                    sidebarLinkLeft3.classList.remove('active');
                }
            })
        }else if (srcPhotos == '/img/icon/bed.png') {
            playTabelRoomFacility();
            sidebarLinksLeft.forEach(function (sidebarLinkLeft3) {
                if (sidebarLinkLeft3.textContent == 'Room Facilities') {
                    sidebarLinkLeft3.classList.add('active')
                }else {
                    sidebarLinkLeft3.classList.remove('active');
                }
            })
        }else{
            playTabelHotelFacility();
            sidebarLinksLeft.forEach(function (sidebarLinkLeft3) {
                if (sidebarLinkLeft3.textContent == 'Hotel Facilities') {
                    sidebarLinkLeft3.classList.add('active')
                }else {
                    sidebarLinkLeft3.classList.remove('active');
                }
            })
        }
    })
})

const lihatDetailLinks = document.querySelectorAll('.cardContain a')
lihatDetailLinks.forEach(function (lihatDetailLink) {
    lihatDetailLink.addEventListener('click', function (e) {
        e.preventDefault();
        let idDetailLink = e.target.getAttribute('id')
        if (idDetailLink == 'detailProfile') {
            playTabelUser()
            sidebarLinksLeft.forEach(function (sidebarLinkLeft4) {
                if (sidebarLinkLeft4.textContent == 'User') {
                    sidebarLinkLeft4.classList.add('active')
                }else {
                    sidebarLinkLeft4.classList.remove('active');
                }
            })
        }else if (idDetailLink == 'detailRoom') {
            playTabelRoom();
            sidebarLinksLeft.forEach(function (sidebarLinkLeft4) {
                if (sidebarLinkLeft4.textContent == 'Room') {
                    sidebarLinkLeft4.classList.add('active')
                }else {
                    sidebarLinkLeft4.classList.remove('active');
                }
            })
        }else if (idDetailLink == 'detailRoomFacility') {
            playTabelRoomFacility();
            sidebarLinksLeft.forEach(function (sidebarLinkLeft4) {
                if (sidebarLinkLeft4.textContent == 'Room Facilities') {
                    sidebarLinkLeft4.classList.add('active')
                }else {
                    sidebarLinkLeft4.classList.remove('active');
                }
            })
        }else{
            playTabelHotelFacility();
            sidebarLinksLeft.forEach(function (sidebarLinkLeft4) {
                if (sidebarLinkLeft4.textContent == 'Hotel Facilities') {
                    sidebarLinkLeft4.classList.add('active')
                }else {
                    sidebarLinkLeft4.classList.remove('active');
                }
            })
    }
})
})

const tambahDataBaruLinks = document.querySelectorAll('.dataTable small a')
tambahDataBaruLinks.forEach(function (tambahDataBaruLink) {
    tambahDataBaruLink.addEventListener('click',function (e) {
        if (e.target.textContent != 'Delete') {
            e.preventDefault();
        }
        let idTambahLink = e.target.textContent
        if (idTambahLink == 'Tambah user baru') {
            playTambahUser()
            sidebarLinksLeft.forEach(function (sidebarLinkLeft5) {
                if (sidebarLinkLeft5.textContent == 'User') {
                    sidebarLinkLeft5.classList.add('active')
                }else {
                    sidebarLinkLeft5.classList.remove('active')
                }
            })
        }else if (idTambahLink == 'Tambah kamar baru') {
            playTambahKamar()
            sidebarLinksLeft.forEach(function (sidebarLinkLeft5) {
                if (sidebarLinkLeft5.textContent == 'Room') {
                    sidebarLinkLeft5.classList.add('active')
                }else {
                    sidebarLinkLeft5.classList.remove('active')
                }
            })
        }else if (idTambahLink == 'Tambah fasilitas kamar baru') {
            playTambahKamarFacility()
            sidebarLinksLeft.forEach(function (sidebarLinkLeft5) {
                if (sidebarLinkLeft5.textContent == 'Room Facilities') {
                    sidebarLinkLeft5.classList.add('active')
                }else {
                    sidebarLinkLeft5.classList.remove('active')
                }
            })
        }else if (idTambahLink == 'Tambah fasilitas hotel baru') {
            playTambahHotelFacility()
            sidebarLinksLeft.forEach(function (sidebarLinkLeft5) {
                if (sidebarLinkLeft5.textContent == 'Hotel Facilities') {
                    sidebarLinkLeft5.classList.add('active')
                }else {
                    sidebarLinkLeft5.classList.remove('active')
                }
            })
        }else {

        }
    })
})

const editDataLinks = document.querySelectorAll('.editDataLink')
editDataLinks.forEach(function (editDataLink) {
    editDataLink.addEventListener('click', function (e) {
        e.preventDefault();
        let idDataLink = editDataLink.getAttribute('id')
        playAllNone();
        editDatas.forEach(function (editData2) {
            if (editData2.getAttribute('id') == idDataLink) {
                editData2.classList.remove('displayNone')
            }else {
                editData2.classList.add('displayNone')
            }
        })
    })
})

//function dropdown profile
const dropdownProfileLink = document.querySelector('.dropdownProfileLink')

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