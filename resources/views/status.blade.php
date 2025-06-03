<!DOCTYPE html> 
<html lang="fr"> 
    <head> 
        <meta charset="UTF-8"> 
        <title>Résultat</title> 
        <style> 
        
        body { 
            background-color: black; 
            color: white; 
            font-family: 'Georgia', serif; 
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; overflow: hidden; 
        }

            .result-message {
        font-size: 6em;
        font-weight: bold;
        text-align: center;
        opacity: 0;
        transform: scale(0.8);
        animation: fadeInZoom 2s ease forwards;
        padding: 1rem 2rem;
        border-radius: 20px;
        box-shadow: 0 0 40px rgba(255, 255, 255, 0.2);
    }

    .victory {
        color: gold;
        text-shadow: 0 0 30px gold, 0 0 60px #ffd700, 0 0 90px white;
    }

    .defeat {
        color: crimson;
        text-shadow: 0 0 30px crimson, 0 0 60px red, 0 0 90px white;
    }

    .return-button {
        margin-top: 3rem;
        padding: 1.2rem 2.5rem;
        font-size: 1.5em;
        font-weight: bold;
        background: rgba(255, 255, 255, 0.1);
        color: white;
        border: 2px solid white;
        border-radius: 15px;
        cursor: pointer;
        transition: background-color 0.4s, transform 0.2s;
    }

    .return-button:hover {
        background-color: rgba(255, 255, 255, 0.3);
        transform: scale(1.05);
    }

    @keyframes fadeInZoom {
        0% {
            opacity: 0;
            transform: scale(0.7);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }
</style>
</head> 
<body> 
    @if ($correct) 
        <div class="result-message victory">VICTORY ACHIEVED</div> 
    @else 
        <div class="result-message defeat">YOU DIED</div> 
    @endif

<form method="POST" action="{{ url('/') }}">
    @csrf    
    <input type="hidden" name="questionid" value="{{ $questionid }}">
    <input type="hidden" name="correct" value="{{ $correct }}">
    <button type="submit" class="return-button">↩ Continuer</button>
</form>

</body>
</html>