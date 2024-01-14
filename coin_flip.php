<!DOCTYPE html>
<html>

<head>
    <title>Coin Tossing</title>
    <style>
        .coin {
            width: 200px;
            height: 200px;
            background: url('coin.png') no-repeat center center;
            background-size: contain;
            position: relative;
            animation: rotate 1s infinite linear;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <script>
        function flipCoin() {
            var coin = document.getElementById('coin');
            coin.classList.add('animate-rotation');

            setTimeout(function() {
                var result = document.getElementById('result');
                var random = Math.random();
                var side = random < 0.5 ? 'Heads' : 'Tails';
                result.innerHTML = side;

                coin.classList.remove('animate-rotation');
                coin.classList.add(side.toLowerCase());
            }, 1000);
        }
    </script>
</head>

<body>
    <h1>Coin Tossing</h1>

    <?php
    $result = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $result = 'Flipping...';
        echo '<script>flipCoin();</script>';
    }
    ?>

    <form method="POST">
        <button type="submit">Flip Coin</button>
    </form>

    <div id="coin" class="coin"></div>

    <?php if ($result !== '') : ?>
        <h2 id="result"><?php echo $result; ?></h2>
    <?php endif; ?>
</body>

</html>