let score = 0;

function generateBubble() {
    const bubble = $('#bubble');
    const randomLetter = String.fromCharCode(Math.floor(Math.random() * 26) + 65); // A-Z
    const width = screen.width - 100;
    const height = screen.height - 200;

    bubble.text(randomLetter);
    bubble.css({
        left: Math.random() * width + 'px',
        top: Math.random() * height + 'px',
        backgroundColor: `hsl(${Math.random() * 360}, 100%, 50%)`
    }).fadeIn();

    setTimeout(() => {
        bubble.fadeOut();
        generateBubble();
    }, 3000); // Bubble disappears after 3 seconds
}

$(document).ready(function() {
    $(document).keypress(function(event) {
        const key = String.fromCharCode(event.which);
        const bubbleLetter = $('#bubble').text();

        if (key.toUpperCase() === bubbleLetter) {
            score++;
            $('#score').text('Score: ' + score);
            $('#bubble').fadeOut();
            generateBubble();
        }
    });

    generateBubble(); // Start the game by generating the first bubble
});
