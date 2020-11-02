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
    var errors = search.querySelectorAll('.error');

    for (var i = 0; i < errors.length; i++) {
        errors[i].remove();
    }
}

// Делаем проверку всех элементов типа "element" на пустоту
var checkFieldsPresence = function () {
    for (var i = 0; i < elements.length; i++) {
        if (!elements[i].value) {
            var error = generateErrors('This field cant be empty');
            elements[i].parentElement.insertBefore(error, elements[i]);
        }
    }
}

var checkInteger = function () // Проверка значения "available" на тип integer
{
    for (var i = 0; i < ints.length; i++) {

        if (/\D/.test(ints[i].value)) {
            var error = generateErrors('Enter the integer number!');
            ints[i].parentElement.insertBefore(error, ints[i]);
        }
    }
}

var checkRating = function () //Проверка на рейтинг
{

    console.log(this.rating);
    let throwExc = true;
    enumRating.filter(ratingItem => ratingItem === this.rating[0]['value']).map(() => throwExc = false);

    if (throwExc) {
        let error = generateErrors('Enter the correct MPAA age rating category: G, PG, PG-13, R, NC-17 !');
        rating[0].parentElement.insertBefore(error, rating[0]);
    }
};

uploadData = () => {
    let formData = new FormData();
    for (let i = 0; i < search.childElementCount - 2; i++) {
        formData.append(search[i]['name'], search[i]['value']);
    }

    let request = new XMLHttpRequest();

    request.open("POST", "http://localhost/web-servises/create_record.php");
    request.setRequestHeader('Content-type', 'application/json; charset=utf-8');

    request.send(JSON.stringify(formData));
};

search.addEventListener('submit', function (event) {
        event.preventDefault();

        removeValidation();
        checkFieldsPresence();
        checkInteger();
        checkRating();
        uploadData();
    }
)