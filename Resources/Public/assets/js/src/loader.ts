// Define selectors for the loader and button
const Selectors = {
    Loader: 'loader',
};

// Show the loader
function showLoader(): void {
    const loader = document.getElementById(Selectors.Loader);
    if (loader) {
        loader.style.display = 'block';
    } else {
        console.error('Loader element not found.');
    }
}

// Hide the loader
function hideLoader(): void {
    const loader = document.getElementById(Selectors.Loader);
    if (loader) {
        loader.style.display = 'none';
    } else {
        console.error('Loader element not found.');
    }
}

export { showLoader, hideLoader };
