@vite(['resources/js/special9.js', 'resources/css/special9.css'])

<div id="game-container">
  <div id="messitext">Voila, tu a gagné...</div>

  <img src="{{ asset('images/messi.jpg') }}" alt="Messi" class="el1" id="hidden-zone">

  <form id="finish-form" method="POST" action="{{ url('/check-answer') }}" class="hidden">
        @csrf
        <input type="hidden" name="questionid" value="{{ $questionid }}">
        <input type="hidden" name="answer" value="bravo">
    </form>
</div>
