<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Para Ti, Mi Querida Amiga 💖</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(45deg, #ff758c, #ff7eb3);
            color: #fff;
            text-align: center;
            padding: 50px;
            overflow: hidden;
            position: relative;
        }
        h1 {
            font-family: 'Dancing Script', cursive;
            font-size: 3.5em;
            margin: 20px 0;
        }
        p {
            font-size: 1.5em;
            margin: 10px 0;
        }
        .heart {
            font-size: 5em;
            animation: beat 1s infinite alternate;
        }
        @keyframes beat {
            from { transform: scale(1); }
            to { transform: scale(1.2); }
        }
        .buttons {
            margin-top: 20px;
        }
        .button {
            display: inline-block;
            margin: 10px;
            padding: 15px 32px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .yes {
            background-color: #4CAF50;
            color: white;
            box-shadow: 0 4px 10px rgba(0, 255, 0, 0.4);
        }
        .no {
            background-color: #f44336;
            color: white;
            box-shadow: 0 4px 10px rgba(255, 0, 0, 0.4);
        }
        .button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }
        /* Efecto de partículas */
        .particles {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <canvas class="particles"></canvas>
    <div class="heart">❤️</div>
    <h1>¡Feliz San Valentín, mi querida amiga! 💕</h1>
    <p>Eres una persona increíble y muy especial para mí,</p>
    <p>y quiero preguntarte algo importante...</p>
    <p>¿Me dejas robarte el corazón? 💘</p>
    
    <form action="respuesta.php" method="post" class="buttons">
        <input type="submit" name="respuesta" value="Sí 💖" class="button yes">
        <input type="submit" name="respuesta" value="No 💔" class="button no">
    </form>

    <script>
        // Partículas románticas
        const canvas = document.querySelector('.particles');
        const ctx = canvas.getContext('2d');
        let hearts = [];

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }

        function createHeart() {
            return {
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                size: Math.random() * 10 + 5,
                speed: Math.random() * 2 + 1,
                opacity: Math.random() * 0.5 + 0.5,
                direction: Math.random() * 2 * Math.PI
            };
        }

        function drawHeart(heart) {
            ctx.globalAlpha = heart.opacity;
            ctx.fillStyle = "red";
            ctx.beginPath();
            ctx.arc(heart.x, heart.y, heart.size, 0, Math.PI * 2);
            ctx.fill();
        }

        function updateHearts() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            hearts.forEach(heart => {
                heart.y -= heart.speed;
                heart.x += Math.sin(heart.direction) * 1.5;
                if (heart.y < -heart.size) {
                    heart.y = canvas.height + heart.size;
                    heart.x = Math.random() * canvas.width;
                }
                drawHeart(heart);
            });
            requestAnimationFrame(updateHearts);
        }

        function init() {
            resizeCanvas();
            hearts = Array.from({ length: 50 }, createHeart);
            updateHearts();
        }

        window.addEventListener('resize', resizeCanvas);
        window.addEventListener('load', init);
    </script>
</body>
</html>
