<main>
<div class="row py-4">
    <div class="col-md-1"></div>
    <div class="col-12 col-md-4 col-lg-3">
        <div class="list-group px-5 px-md-0">
        <a href="./login.php?info=account" class="list-group-item list-group-item-action bg-dark text-white">Account</a>
        <a href="./login.php?info=account" class="list-group-item list-group-item-action">Info</a>
        <a href="./login.php?info=prodotti" class="list-group-item list-group-item-action">Added products</a>
        <a href="./login.php?info=addp" class="list-group-item list-group-item-action">Add a product</a>
        <a href="./login.php?info=storico" class="list-group-item list-group-item-action bg-light-gray fw-bold">Order History</a>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-7 p-5 py-md-1">
        <span class = "h2">Order History</span>
        <div class="container px-2 px-md-0 py-3">
        <ul class="list-group mb-3">
                <li class="list-group-item bg-dark text-white">Selled Products</li>
                <li class="list-group-item">
                        <?php foreach($templateParams["vendite"] as $sale): ?>
                        <ul class="list-group mb-2 px-2">
                            <li class="list-group-item fw-bold bg-light-gray">Prodotto: <?php echo $sale["Nome"]; ?></li>
                            <li class="list-group-item">Data: <?php $date = new DateTime($sale["Data"]);
                            echo $date->format('Y-m-d H:i:s'); ?></li>
                            <li class="list-group-item">Quantità: <?php echo $sale["Quantità"]; ?></li>
                            <li class="list-group-item">Utente: <?php echo $sale["Utente"]; ?></li>
                        </ul>
                        <?php endforeach; ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
</main>