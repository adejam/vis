require('./bootstrap');

require('alpinejs');
import closeAlert from './closeAlert';
import { openModal, closeModal, windowClickCloseModal } from './modal';

const openModalButton = document.querySelectorAll('.open-modal-button');
const closeModalButton = document.querySelectorAll('.close-modal-button');

if (openModalButton) {
  openModalButton.forEach((btn) => {
    btn.addEventListener('click', openModal);
  });
}

if (closeModalButton) {
  closeModalButton.forEach((btn) => {
    btn.addEventListener('click', closeModal);
  });
}

window.addEventListener('click', windowClickCloseModal);

const alertDiv = document.querySelector('#alert-div');
alertDiv.addEventListener('click', closeAlert);
