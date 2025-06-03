@vite(['resources/css/special8.css', 'resources/js/special8.js'])

<div id="game-container">
    <h2>Attrape le ballon et jette-le dans la poubelle !</h2>
    <p id="instruction">Clique sur le ballon, maintiens et glisse-le dans la poubelle.</p>

    <img src="{{ asset('images/balloon.png') }}" alt="Ballon" id="balloon" draggable="true" />

    <div id="trash-bin">
        <img src="{{ asset('images/trash-bin.png') }}" alt="Poubelle" />
    </div>

    <button id="continue-button" class="hidden">Continuer</button>
    
    <form id="finish-form" method="POST" action="{{ url('/check-answer') }}" class="hidden">
        @csrf
        <input type="hidden" name="questionid" value="{{ $questionid }}">
        <input type="hidden" name="answer" value="gg">
    </form>
</div>
