try {
    const headerMenuElement = document.querySelector('#header-menu');
    if (headerMenuElement) {
        const parent = headerMenuElement.parentNode;
        if (parent.id.includes('bx_incl_area')) parent.style.width = '100%';
    }
} catch {

}
