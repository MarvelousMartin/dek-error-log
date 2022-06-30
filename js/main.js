const btn = document.getElementsByClassName('btn btn-error')[0];

let index = 0;

const colors = ['darkgreen','red', 'gray','#0d6efd'];

btn.addEventListener('click', function onClick() {
    btn.style.backgroundColor = colors[index];
    btn.style.color = 'white';
    index++;
    if (index >= colors.length) {
        index = 0;
    }
});
