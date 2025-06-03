<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultat</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-size: 5em;
            font-weight: bold;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .victory {
            color: gold;
        }

        .defeat {
            color: red;
        }

        .return-button {
            margin-top: 2rem;
            padding: 1rem 2rem;
            font-size: 0.5em;
            background-color: #444;
            color: white;
            border: 2px solid white;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .return-button:hover {
            background-color: #666;
        }
    </style>
</head>
<body>
    @if ($correct)
        <div class="victory">VICTORY ACHIEVED</div>
    @else
        <div class="defeat">YOU DIED</div>
    @endif

    <form method="POST" action="{{ url('/') }}">
        @csrf    
        <input type="hidden" name="questionid" value={{ $questionid }}>
        <input type="hidden" name="correct" value="{{ $correct }}">
        <button type="submit" class="return-button">↩ Retour</button>
    </form>
</body>
</html>
