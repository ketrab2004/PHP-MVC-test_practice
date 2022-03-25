<h1>Edit Country:</h1>

<form method="POST" action="./applyChanges" style="display: flex; flex-direction: column; align-items: center">
    <input type="hidden" name="id" value="<?php echo $data["country"]["id"] ?>" />
    <input type="text" name="name" value="<?php echo $data["country"]["name"] ?>" />
    <input type="text" name="capitalCity" value="<?php echo $data["country"]["capitalCity"] ?>" />
    <select name="continent">
        <?php
        foreach($data["continents"] as $continent) {
            $selected = $data["country"]["continent"] == $continent ? " selected" : '';

            echo "<option value='$continent'$selected>$continent</option>";
        }
        ?>
    </select>
    <input type="number" min="0" max="4294967295" name="population" value="<?php echo $data["country"]["population"] ?>" />

    <input type="submit" value="Submit" />
</form>
