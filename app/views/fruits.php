<h1>FRUIT PAGE</h1>

<table>
    <tr>
        <th>Id</th>
        <th>naam</th>
        <th>kleur</th>
        <th>prijs</th>
    </tr>
    <?php
    foreach ($data['fruits'] as $fruit):
        $fruit = (object)$fruit; // to object because ['this'] sucks

        echo "
        <tr>
            <th>{$fruit->id}</th>
            <td>{$fruit->name}</td>
            <td>{$fruit->color}</td>
            <td>€{$fruit->price}</td>
        </tr>
        ";
    endforeach;
    ?>
</table>