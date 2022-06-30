function toggle(el) {
    let tag = document.getElementById(el);
    tag.style.display = tag.style.display === 'block' ? 'none' : 'block';
}


const btn = document.getElementsByClassName('btn btn-error')[0];
const div = document.getElementById('showhide');
let index = 0;

const colors = ['darkgreen','red', 'gray','#0d6efd'];

btn.addEventListener('click', function onClick() {
    switch (index) {
        case 0:
            btn.style.backgroundColor = 'darkgreen';
            btn.innerText = 'Přiřazen na úkolu';
            index++;
            break;
        case 1:
            btn.style.backgroundColor = 'red';
            btn.innerText = 'Odhlásit se z úkolu?';
            index++;
            break;
        case 2:
            btn.style.backgroundColor = 'gray';
            btn.innerText = 'Odhlášen z úkolu';
            index++;
            break;
        case 3:
            btn.style.backgroundColor = '#0d6efd';
            btn.innerText = 'Přiřadit se na úkol';
            index = 0;
            break;
    }
});
