@if(session('error'))
    <div style="color:red; font-weight:bold;">{{ session('error') }}</div>
@endif

<p style="font-size: 1.5em;">Niveau : {{ $questionid + 1 }}</p>

<form method="POST" action="{{ url('/check-answer') }}">
    @csrf
    <label for="answer" style="font-size: 1.3em;">{{ $question }}</label><br>
    <input type="text" id="answer" name="answer" required autocomplete="off">
    <input type="hidden" name="questionid" value="{{ $questionid }}">
    <button type="submit">Envoyer</button>
</form>
