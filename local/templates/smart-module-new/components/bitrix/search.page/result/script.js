(function () {
    try {
        const chains = document.querySelectorAll('[data-chain-path]');
        const navs = document.querySelectorAll('[data-nav-item]');
        chains.forEach((item, index) => {
            const links = item.querySelectorAll('a');
            links.forEach(link => {
                const li = document.createElement('li');
                li.classList.add('breadcrumb-item');
                li.append(link);
                navs[index].append(li);
            })
        })
    } catch (error) {
        
    }
})()