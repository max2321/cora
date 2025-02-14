<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lo Entiendo... 💔</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            text-align: center;
            padding: 50px;
            color: white;
            background: linear-gradient(180deg, #2c3e50, #000000);
            overflow: hidden;
            position: relative;
        }
        h1 {
            font-family: 'Dancing Script', cursive;
            font-size: 4em;
            margin-bottom: 20px;
            color: #fff;
            text-shadow: 2px 2px 15px rgba(0, 0, 0, 0.6);
        }
        p {
            font-size: 1.5em;
            color: #ddd;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
        }
        .button {
            margin-top: 20px;
            padding: 15px 32px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            display: inline-block;
            background-color: #555;
            box-shadow: 0 4px 10px rgba(255, 0, 0, 0.4);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 15px rgba(255, 0, 0, 0.6);
        }
        /* Fondo Canvas */
        canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        /* Animación de lágrimas */
        .tear {
            position: absolute;
            bottom: -30px;
            animation: fall 2s infinite ease-in-out;
        }
        @keyframes fall {
            0% { transform: translateY(0); opacity: 1; }
            100% { transform: translateY(100px); opacity: 0; }
        }
    </style>
</head>
<body>
    <canvas id="tearsCanvas"></canvas>
    <audio autoplay loop>
        <source src="musica\Your love is my drug 8Bit version [XyMalBJCgUY].mp3" type="audio/mp3">
    </audio>
    <h1>Lo Entiendo... 💔</h1>
    <p>Aunque duele, respeto tu decisión...</p>
    <p>Siempre estaré aquí para ti.</p>

    <!-- Lágrimas caídas -->
    <div class="tear" style="left: 25%; animation-delay: 0.2s;"></div>
    <div class="tear" style="left: 50%; animation-delay: 0.5s;"></div>
    <div class="tear" style="left: 75%; animation-delay: 1s;"></div>

    <a href="index.php" class="button">Volver al Inicio</a>

    <script>
        const canvas = document.getElementById("tearsCanvas");
        const ctx = canvas.getContext("2d");
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        const drops = [];
        class Drop {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height - canvas.height;
                this.speed = Math.random() * 3 + 2;
                this.length = Math.random() * 20 + 10;
                this.opacity = Math.random() * 0.5 + 0.2;
            }
            draw() {
                ctx.strokeStyle = `rgba(173, 216, 230, ${this.opacity})`;
                ctx.lineWidth = 2;
                ctx.beginPath();
                ctx.moveTo(this.x, this.y);
                ctx.lineTo(this.x, this.y + this.length);
                ctx.stroke();
            }
            update() {
                this.y += this.speed;
                if (this.y > canvas.height) {
                    this.y = Math.random() * canvas.height - canvas.height;
                    this.x = Math.random() * canvas.width;
                }
            }
        }
        function createDrops() {
            for (let i = 0; i < 100; i++) {
                drops.push(new Drop());
            }
        }
        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            drops.forEach(drop => {
                drop.update();
                drop.draw();
            });
            requestAnimationFrame(animate);
        }
        createDrops();
        animate();
        window.addEventListener("resize", () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        });
    </script>
</body>
</html>
