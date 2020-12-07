const modal = document.querySelector('#modal');
export const openModal = () => {
  modal.style.display = 'block';
};

export const closeModal = () => {
  modal.style.display = 'none';
};

export const windowClickCloseModal = e => {
  if (e.target === modal) {
    modal.style.display = 'none';
  }
};
