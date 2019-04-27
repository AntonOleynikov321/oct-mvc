//https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5

//document.getElementById('courses').onclick = function () {
//    var xhr = new XMLHttpRequest();
//    xhr.open('GET', 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
//    xhr.onreadystatechange = function () {
//        if (this.readyState === 4) {
//            if (this.status === 200) {
//                var json_text = this.responseText;
//                var courses = JSON.parse(json_text);
//                console.log(courses);
//            }
//
//        } else {
//
//        }
//    };
//
//    xhr.send();
//};



function showQuestions () {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/api/questions');
    xhr.onreadystatechange = function () {
        if (this.readyState === 4) {
            if (this.status === 200) {
                var json_text = this.responseText;
                var questions = JSON.parse(json_text);
                console.log(questions);
                //TODO show in table
                var table = document.querySelector('#questions tbody');
                table.innerHTML = '';
                for (var i = 0; i < questions.length; i++) {
                    table.innerHTML += '<td>' + questions[i].id +
                            '</td>' + '<td>' + questions[i].author +
                            '</td>' + '<td>' + questions[i].text +
                            '</td>';
                }
            } else {
                return false;
            }
        }
    };

    xhr.send();
};

showQuestions();