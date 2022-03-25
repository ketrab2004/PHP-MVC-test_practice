<h1>Countries:</h1>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Land</th>
            <th>Hoofdstad</th>
            <th>Continent</th>
            <th>Aantal inwoners</th>
            <th></th>
            <th></th>
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
                <td><a href='./countries/edit?id={$country->id}'>
                    Edit
                </a></td>
                <td><a href='./countries/delete?id={$country->id}'>
                    Delete
                </a></td>
            </tr>
            ";
        }
        ?>
    </tbody>
</table>
