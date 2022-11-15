const wallpaper_img = document.getElementById('wallpaper_img')
const status_text = document.getElementById('status_text')

wallpaper_img.addEventListener('mouseover', function handleMouseOver() {
    setTimeout(() => {
        status_text.classList.add('rainbow-text')
        status_text.innerHTML = 'Colored As Good As A Rainy Rainbow'
    }, 500)
});

wallpaper_img.addEventListener('mouseout', function handleMouseOut() {
    setTimeout(() => {
        status_text.classList.remove('rainbow-text')
        status_text.innerHTML = 'Grayscaled As Gray And Shallow As Your Life'
        status_text.style.color = 'gray'
    }, 500)
})
