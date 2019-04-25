//https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5

document.getElementById('courses').onclick = function () {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
    xhr.onreadystatechange = function () {
        if (this.readyState === 4) {
            if (this.status === 200) {
                var json_text = this.responseText;
                var courses = JSON.parse(json_text);
                console.log(courses);
            }

        } else {

        }
    };

    xhr.send();
};

function getQuestions() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/api/questions');
    xhr.onreadystatechange = function () {
        if (this.readyState === 4) {
            if (this.status === 200) {
                var json_text = this.responseText;
                var questions = JSON.parse(json_text);
                return questions;
            } else {
                return false;
            }
        }
    };

    xhr.send();
}

document.getElementById('questions-btn').onclick= function(){
    var questions = getQuestions();
    console.log(questions);
};