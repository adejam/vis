export const openModal = ({ currentTarget }) => {
  const {
    dataset: { target },
  } = currentTarget;
  const targetId = target;
  const modal = document.querySelector(`#${targetId}`);
  modal.style.display = 'block';
};

export const closeModal = ({ currentTarget }) => {
  const {
    dataset: { dismiss },
  } = currentTarget;
  const targetId = dismiss;
  const modal = document.querySelector(`#${targetId}`);
  modal.style.display = 'none';
};

export const windowClickCloseModal = ({ target }) => {
  if (target.classList.contains('modal')) {
    target.style.display = 'none';
  }
};
