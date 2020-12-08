require('./bootstrap');

require('alpinejs');
import closeAlert from './closeAlert';
import {openModal, closeModal, windowClickCloseModal} from './modal';

const modalButton = document.querySelector('#modal-button');
const closeButton = document.querySelector('#close-modal');

if (modalButton) {
    modalButton.addEventListener('click', openModal);
}

if (closeButton) {
    closeButton.addEventListener('click', closeModal);
}


window.addEventListener('click', windowClickCloseModal);

const alertDiv = document.querySelector('#alert-div');
alertDiv.addEventListener('click', closeAlert);
