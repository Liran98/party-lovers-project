export const load_img = function (input, img) {
    document.getElementById(input).addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            // Display the image immediately
            const imgElement = document.getElementById(img);
            imgElement.src = URL.createObjectURL(file);
            imgElement.style.display = 'block';

        }
    });
}

