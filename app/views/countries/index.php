<h1>Countries:</h1>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Land</th>
            <th>Hoofdstad</th>
            <th>Continent</th>
            <th>Aantal inwoners</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($data["countries"] as $country) {
            echo "
            <tr>
                <th>{$country->id}</th>
                <td>{$country->name}</td>
                <td>{$country->capitalCity}</td>
                <td>{$country->continent}</td>
                <td>{$country->population}</td>
            </tr>
            ";
        }
        ?>
    </tbody>
</table>
