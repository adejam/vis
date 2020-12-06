require('./bootstrap');

require('alpinejs');
import closeAlert from './closeAlert';

const sessionSuccessPath = document.querySelector('#sessionSuccessPath');
const sessionErrorPath = document.querySelector('#sessionErrorPath');
sessionSuccessPath.addEventListener('click', closeAlert);
sessionErrorPath.addEventListener('click', closeAlert); 