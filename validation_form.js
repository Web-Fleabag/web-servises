var search = document.querySelector('.validationForm');
var validationCheck = search.querySelector('.validationCheck');
var name = search.querySelector('.name');
var description = search.querySelector('.description');
var genre = search.querySelector('.genre');
var duration = search.querySelector('.duration');
var producer = search.querySelector('.producer');
var age_rating = search.querySelector('.age_rating');
var price = search.querySelector('.price');
var available = search.querySelector('.available');
var elements = search.querySelectorAll('.element');
var ints = search.querySelectorAll('.int');
var rating = search.querySelectorAll('.rating')

const enumRating = ['G', 'PG', 'PG-13', 'R', 'NC-17'];

//Генерация ошибок
var generateErrors = function (text) {
    var error = document.createElement('div');
    error.className = 'error';
    error.style.color = 'red';
    error.innerHTML = text;
    return error;
}

// удаляем ошибки, чтоб по нескольку раз не появлялись на странице
var removeValidation = function () {
    let errors = search.querySelectorAll('.error');

    for (var i = 0; i < errors.length; i++) {
        errors[i].remove();
    }
}

// Делаем проверку всех элементов типа "element" на пустоту
var checkFieldsPresence = function () {
    let errors = [];
    for (var i = 0; i < elements.length; i++) {
        if (!elements[i].value) {
            let error = generateErrors('This field cant be empty');
            errors.push(error);
            elements[i].parentElement.insertBefore(error, elements[i]);
        }
    }

    return errors.length === 0;
}

var checkInteger = function () // Проверка значения "available" на тип integer
{
    let errors = [];
    for (var i = 0; i < ints.length; i++) {

        if (/\D/.test(ints[i].value)) {
            let error = generateErrors('Enter the integer number!');
            errors.push(error);
            ints[i].parentElement.insertBefore(error, ints[i]);
        }
    }

    return errors.length === 0;
}

var checkRating = function () //Проверка на рейтинг
{
    console.log(this.rating);
    let throwExc = true;
    enumRating.filter(ratingItem => ratingItem === this.rating[0]['value']).map(() => throwExc = false);

    if (throwExc) {
        let error = generateErrors('Enter the correct MPAA age rating category: G, PG, PG-13, R, NC-17 !');
        rating[0].parentElement.insertBefore(error, rating[0]);
        return false;
    } else {
        return true;
    }
};


search.addEventListener('submit', function (event) {
    event.preventDefault();
    removeValidation();

    if (checkFieldsPresence() && checkInteger() && checkRating()) {
        return true;
    }

    // остановить отправку формы на сервер
      //  uploadData();
      //  event.defaultPrevented = true;
    }
)

