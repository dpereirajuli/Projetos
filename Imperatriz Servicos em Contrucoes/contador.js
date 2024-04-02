function startCountingWhenVisible() {
    var counters = document.querySelectorAll('.count');

    var options = {
        root: null,
        rootMargin: '0px',
        threshold: 0.5 // Define a porcentagem do elemento que deve estar visível para ativar a função de callback
    };

    var observer = new IntersectionObserver(function(entries, observer) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                countUp(entry.target);
                observer.unobserve(entry.target); // Remove o observador após ativar a contagem
            }
        });
    }, options);

    counters.forEach(function(counter) {
        observer.observe(counter);
    });
}

function countUp(counter) {
    var target = +counter.dataset.target; // Valor final
    var duration = 5000; // Duração total da animação em milissegundos
    var count = 0; // Valor inicial
    var increment = target / (duration / 90); // Incremento por frame (aproximadamente 60 frames por segundo)

    var timer = setInterval(function() {
        count += increment;
        counter.innerText = Math.ceil(count);

        if (count >= target) {
            clearInterval(timer);
            counter.innerText = target; // Garante que o valor exibido seja o valor final
        }
    }, 1000 / 15); // Atualiza a cada frame (aproximadamente 60 frames por segundo)
}

startCountingWhenVisible();