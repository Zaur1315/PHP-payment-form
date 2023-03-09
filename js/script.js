const element = document.getElementById('phone');
const maskOptions = {
    mask: '+{994} (00) 000-00-00'
};
const mask = IMask(element, maskOptions);




const moneyInput = document.getElementById('payment');
moneyInput.addEventListener('keydown', function(event) {
    const value = moneyInput.value;

    // Разрешаем ввод цифр, клавиш Backspace и Delete
    if (/^\d$/.test(event.key) || event.key === 'Backspace' || event.key === 'Delete') {
        // Запрещаем ввод нуля в начале числа
        if (value === '0' && event.key !== 'Backspace' && event.key !== 'Delete') {
            event.preventDefault();
        }
        return;
    }

    // Запрещаем ввод остальных символов
    event.preventDefault();
});


