

// Ожидание загрузки DOM
document.addEventListener("DOMContentLoaded", function(event) {


    // Все элементы класса post_confirm
    const del_elements = document.getElementsByClassName('post_confirm')

    // Функция - вызов подтверждения
    const confirmIt = (event) => {

        if (!confirm('Вы уверены?'))
            event.preventDefault()

    }

    // Установка функции confirmIt на все элементы класса post_confirm
    for (let i = 0; i < del_elements.length; i++) {
        del_elements[i].addEventListener('click', confirmIt);
    }



    console.log('js ready')

})