const modal = document.querySelector('#modal');
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

export const windowClickCloseModal = (e) => {
  if (e.target === modal) {
    modal.style.display = 'none';
  }
};

// export const closeModal = e => {

// };
