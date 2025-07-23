import './bootstrap';
import { themes } from './themes.js';

function setTheme(key) {
    const html = document.documentElement;
    html.setAttribute('theme', key);
    localStorage.setItem('theme', key);
    const select = document.getElementById('theme-select');
    if (select) select.value = key;
}

window.addEventListener('DOMContentLoaded', () => {
    const select = document.getElementById('theme-select');
    const saved = localStorage.getItem('theme') || 'pro';
    setTheme(saved);
    if (select) {
        select.value = saved;
        select.addEventListener('change', (e) => {
            setTheme(e.target.value);
        });
    }
});
