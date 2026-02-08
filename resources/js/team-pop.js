window.openTeamModal = function (button) {
  const memberData = JSON.parse(button.getAttribute('data-member'));
  const modal = document.getElementById('team-modal');

  document.getElementById('modal-title').textContent = memberData.name;
  document.getElementById('modal-role').textContent = memberData.role;

  const imgEl = document.getElementById('modal-image');
  if (memberData.image) {
    imgEl.src = memberData.image;
  } else {
    // Fallback image
    imgEl.src =
      '/wordpress/wp-content/themes/clin-city/resources/images/logo.png';
  }

  const bioText =
    memberData.bio ||
    `Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.`;

  document.getElementById('modal-bio').innerHTML = `<p>${bioText}</p>`;

  modal.classList.remove('hidden');
  document.body.style.overflow = 'hidden';
};

window.closeTeamModal = function () {
  const modal = document.getElementById('team-modal');
  modal.classList.add('hidden');
  document.body.style.overflow = '';
};

document.addEventListener('keydown', function (event) {
  if (event.key === 'Escape') {
    window.closeTeamModal();
  }
});
