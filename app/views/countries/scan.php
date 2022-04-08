<form method="POST" action="./scanInfo" style="display: flex; flex-direction: column; align-items: center">

    <h1>Scan a country code to see it's info:</h1>

    <input type="text" name="countryCode" autofocus />

</form>

<script>
    const input = document.querySelector("input[type=text]");

    function focus() {
        input.focus();
        window.requestAnimationFrame(focus);
    }

    window.requestAnimationFrame(focus);
</script>
