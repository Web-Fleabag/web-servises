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

let errors = new Map();

//Генерация ошибок
var generateErrors = function (text) {
    let error = document.createElement('div');
    error.className = 'error';
    error.style.color = 'red';
    error.innerHTML = text;
    return error;
};

// удаляем ошибки, чтоб по нескольку раз не появлялись на странице
var removeValidation = function () {
    errors.clear();
    search.querySelectorAll('.error').forEach(error => {
        error.remove();
    });
};

// Делаем проверку всех элементов типа "element" на пустоту
var checkFieldsPresence = function () {
    for (var i = 0; i < elements.length; i++) {
        if (!elements[i].value) {
            errors.set(elements[i], generateErrors('This field cant be empty'));
        }
    }
};

var checkInteger = function () // Проверка значения "available" на тип integer
{
    for (var i = 0; i < ints.length; i++) {

        if (/\D/.test(ints[i].value)) {
            errors.set(ints[i], generateErrors('Enter the integer number!'));
        }
    }

};

var checkRating = function () //Проверка на рейтинг
{
    let throwExc = true;
    enumRating.filter(ratingItem => ratingItem === this.rating[0]['value']).map(() => throwExc = false);

    if (throwExc) {
        errors.set(rating[0], generateErrors('Enter the correct MPAA age rating category: G, PG, PG-13, R, NC-17 !'));
    }
};

let generateElements = () => {
    errors.forEach((value, key) => {
        key.parentElement.insertBefore(value, key);
    })
};


search.addEventListener('submit', function (event) {
        removeValidation();
        checkFieldsPresence();
        checkInteger();
        checkRating();

        if (errors.size === 0) {
            return true;
        } else {
            event.preventDefault();
            generateElements();
        }
    }
)