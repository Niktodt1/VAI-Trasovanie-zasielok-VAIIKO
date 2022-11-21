<?php
/** @var Array $data */
/** @var DeliveryCompany $deliveryCompany */

/** @var Array $data */

use App\Models\DeliveryCompany;

?>

<hr>
<div class="container-fluid col-12">
    <div class="row">
        <div class="container col-8">
            <a href="?c=deliverycompanies&a=create" class="btn btn-success">Pridať novú spoločnosť</a>
            <h1>Naši prepravcovia:</h1>
        </div>
        <div class="container col-4"></div>
    </div>
</div>


<div class="container mt-3">
    <div class="row">
        <?php
        foreach ($data['deliveryCompanies'] as $deliveryCompany) {
            $adress = $deliveryCompany->getAdress();
            ?>
            <div class="card m-1 col-sm-3 col-md-2" style="min-width:250px">
                <img class="card-img-top center-text pt-3" src="<?= $deliveryCompany->getIconPath() ?>" alt="Card image" style="width:50%">

                <div class="card-body">
                    <h4 class="card-title"><?= $deliveryCompany->getFullCompanyName() ?></h4>
                    <p class="card-text"><?= $deliveryCompany->getDeliveryCompanyDescription() ?></p>
                    <div class="p-0">
                        <h6>Konktaktné údaje:</h6>
                        <ul class="p-0">
                            <li>
                                <a href="<?= $deliveryCompany->getWebsite() ?>">
                                    <img src="public/images/globe.svg" alt="web" class="me-1">
                                    <?= $deliveryCompany->getWebsite() ?>
                                </a>
                            </li>
                            <li><a href="mailto:<?= $deliveryCompany->getEmail() ?></a>">
                                    <img src="public/images/envelope-fill.svg" alt="email" class="me-1">
                                    <?= $deliveryCompany->getEmail() ?></a>
                            </li>
                            <li>
                                <img src="public/images/telephone-fill.svg" alt="tel" class="me-1">
                                <?= $deliveryCompany->getPhone() ?>
                            </li>
                            <li>
                                <img src="public/images/house-door-fill.svg" alt="domov">
                                <?= $adress->getStreet()." ".$adress->getStreetNumber() ?><br>
                                <?= $adress->getZipCode()." ".$adress->getCity() ?>
                            </li>
                        </ul>
                    </div>
                    <a href="#" class="btn btn-primary">Ohodnotiť</a>
                    <a href="?c=deliverycompanies&a=edit&id=<?= $deliveryCompany->getId() ?>" class="btn btn-warning">Editovať spoločnosť</a>
                    <a href="?c=deliverycompanies&a=delete&id=<?= $deliveryCompany->getId() ?>" class="btn btn-danger">Zmazať spoločnosť</a>
                </div>
            </div>

        <?php } ?>




    </div>

</div>

<hr>
<div class="container-fluid">
    <div class="row top-oznam">
        <div class="container col-8">
            <h1>Podporované obchody:</h1>
        </div>
        <div class="container col-4"></div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="card m-1 col-sm-3 col-md-2" style="min-width:250px">
            <img class="card-img-top center-text pt-3" src="public/images/alza.png" alt="Card image" style="width:50%">
            <div class="card-body">
                <h4 class="card-title">Alza.sk</h4>
                <p class="card-text">Alza.cz a.s. je internetový obchod pôsobiaci v Česku, od roku 2004
                    na Slovensku a od roku 2014 aj v ďalších krajinách Európskej únie. Patrí k
                    najväčším tuzemským on-line obchodníkom</p>
                <div class="p-0">
                    <h6>Konktaktné údaje:</h6>
                    <ul>
                        <li>
                            <a href="https://www.alza.sk/contact">
                                <img src="public/images/globe.svg" alt="web" class="me-1">
                                www.alza.sk/contact
                            </a>
                        </li>
                        <li><a href="https://www.alza.sk/contact">
                                <img src="public/images/envelope-fill.svg" alt="email" class="me-1">
                                www.alza.sk/contact</a>
                        </li>
                        <li>
                            <img src="public/images/telephone-fill.svg" alt="tel" class="me-1">
                            +421 2 5710 1800
                        </li>
                        <li>
                            <img src="public/images/house-door-fill.svg" alt="domov">
                            Mlynské Nivy 19034 / 5a<br>
                            82109 Bratislava
                        </li>
                    </ul>
                </div>
                <a href="https://obchody.heureka.sk/alza-sk/recenze/" class="btn btn-primary">Ohodnotiť</a>
            </div>
        </div>
        <div class="card m-1 col-sm-3 col-md-2" style="min-width:250px">
            <img class="card-img-top center-text pt-3 " src="public/images/datart.jpg" alt="Card image" style="width:50%">
            <div class="card-body">
                <h4 class="card-title">Datart</h4>
                <p class="card-text">Na trhu působí od roku 1990. Prodejní řetězec tvoří více než 100 kamenných
                    prodejen v Česku a 19 prodejen na Slovensku a český i slovenský e-shop.</p>
                <div class="p-0">
                    <h6>Konktaktné údaje:</h6>
                    <ul class="p-0">
                        <li>
                            <a href="https://www.datart.sk/napoveda/kontakt">
                                <img src="public/images/globe.svg" alt="web" class="me-1">
                                www.datart.sk/napoveda/kontakt
                            </a>
                        </li>
                        <li><a href="mailto:infolinka@datart.sk">
                                <img src="public/images/envelope-fill.svg" alt="email" class="me-1">
                                infolinka@datart.sk</a>
                        </li>
                        <li>
                            <img src="public/images/telephone-fill.svg" alt="tel" class="me-1">
                            +421 850 328 278
                        </li>
                        <li>
                            <img src="public/images/house-door-fill.svg" alt="domov">
                            Diaľničná cesta 6015/12A<br>
                            Senec 903 01
                        </li>
                    </ul>
                </div>
                <a href="https://obchody.heureka.sk/datart-sk/recenze/overene" class="btn btn-primary">Ohodnotiť</a>
            </div>
        </div>
        <div class="card m-1 col-sm-3 col-md-2" style="min-width:250px">
            <img class="card-img-top center-text pt-3" src="public/images/mall-sk.png" alt="Card image" style="width:50%">
            <div class="card-body">
                <h4 class="card-title">Mall.sk</h4>
                <p class="card-text">Internet Mall patří mezi české maloobchody s bílou technikou, elektronikou,
                    sportovními potřebami, hračkami a s počítači a mobily. Mall.cz provozuje v České republice
                    internetový obchod a kamenné prodejny pod značkou Mall.cz.</p>
                <div class="p-0">
                    <h6>Konktaktné údaje</h6>(ako list)
                    <ul class="p-0">
                        <li>
                            <a href="https://www.mall.sk/kontakty">
                                <img src="public/images/globe.svg" alt="web" class="me-1">
                                www.mall.sk/kontakty
                            </a>
                        </li>
                        <li><a href="https://www.mall.sk/kontakty">
                                <img src="public/images/envelope-fill.svg" alt="email" class="me-1">
                                mall.sk/kontakty</a>
                        </li>
                        <li>
                            <img src="public/images/telephone-fill.svg" alt="tel" class="me-1">
                            02/5826 7310
                        </li>
                        <li>
                            <img src="public/images/house-door-fill.svg" alt="domov">
                            Galvaniho 6<br>
                            821 04 Bratislava
                        </li>
                    </ul>
                </div>
                <a href="https://obchody.heureka.sk/mall-sk/recenze/overene" class="btn btn-primary">Ohodnotiť</a>
            </div>
        </div>
        <div class="card m-1 col-sm-3 col-md-2" style="min-width:250px">
            <img class="card-img-top center-text pt-3 " src="public/images/datart.jpg" alt="Card image" style="width:50%">
            <div class="card-body">
                <h4 class="card-title">Datart</h4>
                <p class="card-text">Na trhu působí od roku 1990. Prodejní řetězec tvoří více než 100 kamenných
                    prodejen v Česku a 19 prodejen na Slovensku a český i slovenský e-shop.</p>
                <div class="p-0">
                    <h6>Konktaktné údaje:</h6>
                    <ul class="p-0">
                        <li>
                            <a href="https://www.datart.sk/napoveda/kontakt">
                                <img src="public/images/globe.svg" alt="web" class="me-1">
                                www.datart.sk/napoveda/kontakt
                            </a>
                        </li>
                        <li><a href="mailto:infolinka@datart.sk">
                                <img src="public/images/envelope-fill.svg" alt="email" class="me-1">
                                infolinka@datart.sk</a>
                        </li>
                        <li>
                            <img src="public/images/telephone-fill.svg" alt="tel" class="me-1">
                            +421 850 328 278
                        </li>
                        <li>
                            <img src="public/images/house-door-fill.svg" alt="domov">
                            Diaľničná cesta 6015/12A<br>
                            Senec 903 01
                        </li>
                    </ul>
                </div>
                <a href="https://obchody.heureka.sk/datart-sk/recenze/overene" class="btn btn-primary">Ohodnotiť</a>
            </div>
        </div>
        <div class="card m-1 col-sm-3 col-md-2" style="min-width:250px">
            <img class="card-img-top center-text pt-3" src="public/images/mall-sk.png" alt="Card image" style="width:50%">
            <div class="card-body">
                <h4 class="card-title">Mall.sk</h4>
                <p class="card-text">Internet Mall patří mezi české maloobchody s bílou technikou, elektronikou,
                    sportovními potřebami, hračkami a s počítači a mobily. Mall.cz provozuje v České republice
                    internetový obchod a kamenné prodejny pod značkou Mall.cz.</p>
                <div class="p-0">
                    <h6>Konktaktné údaje</h6>
                    <ul class="p-0">
                        <li>
                            <a href="https://www.mall.sk/kontakty">
                                <img src="public/images/globe.svg" alt="web" class="me-1">
                                www.mall.sk/kontakty
                            </a>
                        </li>
                        <li><a href="https://www.mall.sk/kontakty">
                                <img src="public/images/envelope-fill.svg" alt="email" class="me-1">
                                mall.sk/kontakty</a>
                        </li>
                        <li>
                            <img src="public/images/telephone-fill.svg" alt="tel" class="me-1">
                            02/5826 7310
                        </li>
                        <li>
                            <img src="public/images/house-door-fill.svg" alt="domov">
                            Galvaniho 6<br>
                            821 04 Bratislava
                        </li>
                    </ul>
                </div>
                <a href="https://obchody.heureka.sk/mall-sk/recenze/overene" class="btn btn-primary">Ohodnotiť</a>
            </div>
        </div>

    </div>
</div>
