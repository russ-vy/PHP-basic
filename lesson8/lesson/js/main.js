
document.addEventListener("DOMContentLoaded", ready);

function ready(){
    document.getElementById('tabs').addEventListener("click",changeActiveEl)
    document.getElementById('orderTable').addEventListener('click',orderUpdate)
}

function changeActiveEl(e){
    if (e.target.classList.contains('active'))
        return

    let links = document.getElementsByClassName('nav-link')

    for (let link of links){
        if (link === e.target){
            let title = link.textContent.toLowerCase()
            link.classList.add('active')
            document.getElementById(title).style.display = 'block'
        }
        else {
            let title = link.textContent.toLowerCase()
            link.classList.remove('active')
            document.getElementById(title).style.display = 'none'
        }
    }
}

function orderUpdate(e){
    if (e.target.textContent != 'Update'){
        return
    }

    let tr = e.target.parentElement.parentElement
        ,order = {
            id: e.target.getAttribute('data-id')
            ,phone: tr.querySelector('[data-id="phone"]').value
            ,address: tr.querySelector('[data-id="address"]').value
            ,id_status: tr.querySelector('.form-select').value
        }

    sendRequest('/order-edit', order)
}
/*
function sendRequest(url, body = {}, method = 'POST'){
    content = new FormData()
    content.append(
        'body'
        ,JSON.stringify(body)
    )

    return fetch(url, {
            method: method
            ,body: content
            ,headers: {
                'Content-Type': 'application/json'
            }
            ,credentials: 'include'
        }).then(response => {
            if(response.ok){
                alert('Ок!')
                return
            }

            console.log(response.json())
        })
}
*/
function sendRequest(url, body = {}, method = 'POST'){
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest()

        xhr.open(method, url)

        xhr.responseType = 'json'
        xhr.setRequestHeader('Content-Type', 'application/json')

        xhr.onload = () => {
            if (xhr.status >= 400) {
                reject(xhr.response)
            } else {
                resolve(xhr.response)
            }
        }

        xhr.onerror = () => {
            reject(xhr.response)
        }

        xhr.send(JSON.stringify(body))
    })
}
