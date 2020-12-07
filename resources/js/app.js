require('./bootstrap');

require('alpinejs');
import closeAlert from './closeAlert';
import {openModal, closeModal, windowClickCloseModal} from './modal';

const modalButton = document.querySelector('#modal-button');
const closeButton = document.querySelector('#close-modal');

modalButton.addEventListener('click', openModal);
closeButton.addEventListener('click', closeModal);
window.addEventListener('click', windowClickCloseModal);

const sessionSuccessPath = document.querySelector('#sessionSuccessPath');
const sessionErrorPath = document.querySelector('#sessionErrorPath');
sessionSuccessPath.addEventListener('click', closeAlert);
sessionErrorPath.addEventListener('click', closeAlert);


