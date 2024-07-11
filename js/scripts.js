//email register picker
const email = document.querySelector('.email');
const selector = document.getElementById('email_selection')

if (!selector) {

} else {
   selector.addEventListener('change', function (e) {
      e.preventDefault();
      email.focus();
      email.value = selector.value;

   });
}




const image = document.querySelectorAll('.index_img');
image.forEach(function (curimg) {
   const randomimg = Math.floor(Math.random() * 20);
   curimg.src = `./gallery_images/gallery${randomimg}.jpg`;
});
