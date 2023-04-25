let exams = document.querySelectorAll('#exam');
let total = document.getElementById('total');
let sum = 0;
for (let i = 0; i < exams.length; i++) {
    sum = sum + parseFloat(exams[i].innerHTML);
}

if (total) {
    sum = (sum / 3).toFixed(2);
    total.innerHTML = sum + '/20';
}

