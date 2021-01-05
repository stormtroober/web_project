<main>
<div class="row py-4">
    <div class="col-md-1"></div>
    <div class="col-12 col-md-4 col-lg-3">
        <div class="list-group px-5 px-md-0">
        <a href="./login.php?info=account" class="list-group-item list-group-item-action bg-dark text-white">Account</a>
        <a href="./login.php?info=account" class="list-group-item list-group-item-action">Info</a>
        <a href="./login.php?info=ordini" class="list-group-item list-group-item-action bg-light-gray fw-bold">History</a>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-7 p-5 py-md-1">
        <h3>Cronologia Ordini</h3> 
        <div class="container px-2 px-md-0 py-3">
        <?php
        $i = 0;
        foreach($templateParams["ordini"] as $ordine): ?>
            <ul class="list-group mb-3">
                <li class="list-group-item bg-dark text-white">Ordine n. <?php echo ($i+1); ?></li>
                <li class="list-group-item">
                Data: <?php $date = new DateTime($ordine["Data"]);
                echo $date->format('Y-m-d').", "; ?>
                Totale: <?php echo $ordine["Totale"]; ?>
                </li>
                <li class="list-group-item fw-bold">Prodotti:</li>
                <li class="list-group-item">
                    <ul class="list-group">
                        <?php
                        $k = 0;
                        foreach($itemsDetail[$i] as $item): ?>
                        <li class="list-group-item fw-bold"><?php echo $item[0]["Nome"]; ?></li>
                        <li class="list-group-item"><?php echo($itemsInCart[$i][$k]["Quantità"]); ?></li>
                        <li class="list-group-item"><?php echo $item[0]["Prezzo"]." $"; ?></li>
                        <?php
                        $k++;
                        endforeach; ?>
                    </ul>
                </li>
            </ul>
        <?php 
        $i++;
        endforeach; ?>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
</main>