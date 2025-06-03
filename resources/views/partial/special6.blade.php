@vite(['resources/js/special6.js', 'resources/css/special6.css'])

<div id="click-faith-container">
    <h2>⚡ Dévotion envers Killias : <span id="click-count">0</span> / 1000</h2>
    <button id="click-button">Clique-moi !</button>
    <button id="cheat-button">Tricher</button>

    <p id="commentary" class="commentary"></p>
</div>

<form id="finish-form" method="POST" action="{{ url('/check-answer') }}" class="hidden">
    @csrf
    <input type="hidden" name="questionid" value="{{ $questionid }}">
    <input type="hidden" name="answer" value="faith_proven">
</form>

