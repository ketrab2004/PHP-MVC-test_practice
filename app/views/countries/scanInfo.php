<a href="./scan">back</a>

<div style="display: <?= $data["data_found"] ? "block" : "none" ?>">
    <h2><?= ($data["info"]["id"]??0) .". ". $data["info"]["name"] ?></h2>
    <p>heeft <?= $data["info"]["capitalCity"]??0 ?> als hoofdstad</p>
    <p>ligt in <?= $data["info"]["continent"]??0 ?></p>
    <p>heeft <?= number_format($data["info"]["population"]??0, 0, ',', '.') ?> inwoners</p>
</div>

<div style="display: <?= $data["data_found"] ? "none" : "block" ?>">
    <h2><?= $data["info"]["name"] ?> wasn't found</h2>
</div>
