//function search bar
const idTables = document.querySelectorAll('.idTable')
const tglInTables = document.querySelectorAll('.tglInTable')
const searchTgl = document.querySelector('.searchTgl')
const searchTglButton = document.querySelector('.searchTglButton')
const searchNama = document.querySelector('.searchNama')
const searchNamaButton = document.querySelector('.searchNamaButton')
const resetSearch = document.querySelector('.resetSearch')
const resetSearchButton = document.querySelector('.resetSearch span')

function searchNamaFunc() {
    let searchNamaVal = searchNama.value
    idTables.forEach(function (idTable) {
        if (idTable.getAttribute('id') != searchNamaVal) {
            idTable.classList.add('displayNone')
        }else{
            idTable.classList.remove('displayNone')
        }
    })
}

function searchTglFunc() {
    let searchTglVal = searchTgl.value
    tglInTables.forEach(function (tglInTable) {
        if (tglInTable.getAttribute('id') != searchTglVal) {
            idTables.forEach(function (idTable2) {
                idTable2.classList.add('displayNone')
            })
        }else{
            idTables.forEach(function (idTable2) {
                idTable2.classList.remove('displayNone')
            })
        }
    })
}

function removeDiplayNoneTr() {
    idTables.forEach(function (idTable3) {
        idTable3.classList.remove('displayNone')
    })
}

searchNama.addEventListener('click',function () {
    removeDiplayNoneTr()
})

searchNamaButton.addEventListener('click', function (e) {
    resetSearch.classList.remove('displayNone')
    removeDiplayNoneTr()
    searchNamaFunc()
})

searchTgl.addEventListener('click', function (e) {
    removeDiplayNoneTr()
})

searchTglButton.addEventListener('click', function (e) {
    resetSearch.classList.remove('displayNone')
    removeDiplayNoneTr()
    searchTglFunc()
})

resetSearchButton.addEventListener('click',function (e) {
    removeDiplayNoneTr()
    resetSearch.classList.add('displayNone')
})