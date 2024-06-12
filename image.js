const container = document.querySelector('.image-container');
const image = document.querySelector('.image-viewer');
let isDragging = false;
let startX, startY, initialX, initialY;

container.addEventListener('wheel', (e) => {
    e.preventDefault();
    const scaleAmount = 0.1;
    let scale = Number(image.dataset.scale) || 1;
    scale += e.deltaY > 0 ? -scaleAmount : scaleAmount;
    scale = Math.min(Math.max(.125, scale), 4);
    image.dataset.scale = scale;
    image.style.transform = `scale(${scale})`;
});

container.addEventListener('mousedown', (e) => {
    isDragging = true;
    startX = e.pageX - container.offsetLeft;
    startY = e.pageY - container.offsetTop;
    initialX = Number(image.dataset.x) || 0;
    initialY = Number(image.dataset.y) || 0;
});

container.addEventListener('mouseup', () => {
    isDragging = false;
    image.style.transition = 'transform 0.25s ease';
});

container.addEventListener('mouseleave', () => {
    isDragging = false;
    image.style.transition = 'transform 0.25s ease';
});

container.addEventListener('mousemove', (e) => {
    if (!isDragging) return;
    e.preventDefault();
    image.style.transition = 'none';
    const x = e.pageX - container.offsetLeft;
    const y = e.pageY - container.offsetTop;
    const dx = x - startX;
    const dy = y - startY;
    image.dataset.x = initialX + dx;
    image.dataset.y = initialY + dy;
    image.style.transform = `scale(${image.dataset.scale}) translate(${image.dataset.x}px, ${image.dataset.y}px)`;
});