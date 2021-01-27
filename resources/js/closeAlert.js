const closeAlert = (e) => {
  if (e.target.classList.contains('close-alert')) {
    e.target.parentElement.classList.add('hidden');
  }
};

export default closeAlert;
