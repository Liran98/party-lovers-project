

const image = document.querySelectorAll('.index_img');
image.forEach(function (curimg) {
   const randomimg = Math.floor(Math.random() * 20);
   curimg.src = `./gallery_images/gallery${randomimg}.jpg`;
});
