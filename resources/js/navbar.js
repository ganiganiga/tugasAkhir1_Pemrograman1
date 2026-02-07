document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.getElementById('navbar');
    const hero = document.getElementById('hero');

    if (!navbar || !hero) return;

    window.addEventListener('scroll', () => {
        const trigger = hero.offsetHeight - navbar.offsetHeight;

        if (window.scrollY > trigger) {
            navbar.classList.add(
                'bg-white/80',
                'backdrop-blur-md',
                'text-black'
            );
            navbar.classList.remove('bg-transparent', 'text-white');
        } else {
            navbar.classList.add('bg-transparent', 'text-white');
            navbar.classList.remove(
                'bg-white/80',
                'backdrop-blur-md',
                'text-black'
            );
        }
    });
});
