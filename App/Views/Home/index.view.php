<?php
/** @var Array $data */
/** @var \App\Models\Package $package */
/** @var Stage $stage */
/** @var ErrorMessenger $errorMessenger */

/** @var Array $couriers */
/** @var Array $deliverycompanies */
/** @var Array $adresses */

use App\Models\Adress;
use App\Models\Company;
use App\Models\Courier;
use App\Models\DeliveryCompany;
use App\Models\ErrorMessenger;
use App\Models\Stage;
use App\Models\StageCode;
use App\Models\User;



?>

<hr>
<div class="container-fluid col-12">
    <div class="row">
        <div class="container col-8">
            <?php
            $properText = "zásielok";
            $packCount = count($data['data']);
            switch ($packCount) {
                case 1:
                    $properText = "zásielku";
                    break;
                case 2|3|4:
                    $properText = "zásielky";
                    break;
            }
            ?>
            <h1>Aktuálne máte <?= $packCount." ".$properText ?>:</h1>
        </div>
        <div class="container col-4"></div>
    </div>
</div>



<div id="accordion">

    <?php
        foreach ($data['data'] as $package) {
            try {
                $user= $package->getUser();
                $adress = $package->getAdress();
                $company = $package->getCompany();
                $courier = $package->getCourier();
                $deliverycompany = $package->getDeliveryCompany();
            } catch (Exception $e) {
                $errorMessenger->message($e);
            }
            $latestStageId = 0;
            ?>
        <div class="card">
        <div class="card-header karta-zasielka-mini p-1 ">
            <div id="header<?= $package->getId() ?>">
                <div class="container-fluid col-12">
                    <div class="row">
                        <div class="container-fluid col-2 ikona-obchod-mini">
                            <img src="<?= $company->getIconPath() ?>" alt="Alza" class="ikona-obchodu-mini">

                        </div>
                        <div class="container-fluid col-9 objednavka-mini">
                            <b>Objednávka:</b><?= " ".$package->getId() ?><br>
                            <b>Na adresu:</b>
                            <?= $adress->getStreet()." ".$adress->getStreetNumber().", ".$adress->getZipCode()." ".$adress->getCity() ?>
                        </div>
                        <div class="container-fluid col-1 btn-roztiahni-mini p-0 ">
                            <a class="btn text-center" data-bs-toggle="collapse" href="#collapse<?= $package->getId() ?>">X</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-2 p-1">
                            <div class="row">
                                <div class="container-fluid col-6 col-sm-12 datum-objednavky-mini boldText">Dátum <br>objednávky:</div>
                                <div class="container-fluid col-4 col-sm-12 datum-mini"><?= $package->getDateOfOrder() ?></div>
                            </div>

                        </div>
                        <div class="col-12 col-sm-7 p-1">
                            <div class="container-fluid mt-2">
                                <?php
                                try {
                                    $stages = $package->getAllStagesAscending();
                                } catch (Exception $e) {
                                    $errorMessenger->message($e);
                                }
                                $stageCount = count($stages);
                                $lastStage = $stages[$stageCount-1];
                                $segmentOnePercentage = 0;
                                $segmentTwoPercentage = 100;
                                switch ($lastStage->getStageCurrentId()) {
                                    case 1:
                                        $segmentOnePercentage = 20;
                                        $segmentTwoPercentage = 80;
                                        break;
                                    case 2:
                                        $segmentOnePercentage = 40;
                                        $segmentTwoPercentage = 60;
                                        break;
                                    case 3:
                                        $segmentOnePercentage = 60;
                                        $segmentTwoPercentage = 40;
                                        break;
                                    case 4:
                                        $segmentOnePercentage = 80;
                                        $segmentTwoPercentage = 20;
                                        break;
                                    case 5:
                                        $segmentOnePercentage = 100;
                                        $segmentTwoPercentage = 0;
                                        break;
                                }
                                ?>
                                <div class="progress me-1 ms-1" style="height: 8px;">
                                    <div class="progress-bar progress-bar-animated progress-bar-striped bg-success priebeh<?= $segmentOnePercentage ?> priebeh-objednavky-mini" aria-label="Segment one"></div>
                                    <div class="progress-bar bg-secondary priebeh<?= $segmentTwoPercentage ?> priebeh-objednavky-mini" aria-label="Segment two"></div>
                                </div>
                                <!--
                                <div class="btn-toolbar">
                                    <button type="button" class="btn rounded-circle bg-success btn-dark tlacidlo-priebehu" data-bs-slide-to="0"></button>
                                    <div class="spacer-mini-1"></div>
                                    <button type="button" class="btn rounded-circle bg-success btn-dark tlacidlo-priebehu" data-bs-slide-to="1"></button>
                                    <div class="spacer-mini-2"></div>
                                    <button type="button" class="btn rounded-circle bg-success btn-dark tlacidlo-priebehu" data-bs-slide-to="2"></button>
                                    <div class="spacer-mini-3"></div>
                                    <button type="button" class="btn rounded-circle bg-success btn-dark tlacidlo-priebehu" data-bs-slide-to="3"></button>
                                    <div class="spacer-mini-4"></div>
                                    <button type="button" class="btn rounded-circle bg-secondary btn-dark tlacidlo-priebehu" data-bs-slide-to="4"></button>
                                </div>
                                -->
                            </div>
                            <div class="container-fluid priebeh-mini mt-1">
                                <!-- Carousel -->
                                <div class="carousel" data-bs-ride="false" id="carousel<?= $package->getId() ?>" data-bs-wrap="false">

                                    <div class="carousel-inner">
                                        <?php
                                        try {
                                            $stages = $package->getAllStagesAscending();
                                        } catch (Exception $e) {
                                            $errorMessenger->message($e);
                                        }

                                        $c = 1;
                                        foreach ($stages as $stage) {
                                            try {
                                                $description = $stage->getDescription($stage->getStageCurrentId());
                                            } catch (Exception $e) {
                                                $errorMessenger->message($e);
                                            }
                                            $latestStageId = $stage->getId() ?>
                                            <div class="carousel-item<?php if($c==$stageCount) { echo " active"; } ?>">
                                                <div class="container col-8">
                                                    <b> <?= $stage->getDatetime() ?></b><br>
                                                    <?php
                                                    if ($description == null) {
                                                        echo "Neznáme";
                                                    } else {
                                                        echo $description->getStageDescription();
                                                    }
                                                    $c++;
                                                    ?><br>
                                                </div>
                                            </div>

                                        <?php } ?>
                                    </div>

                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?= $package->getId() ?>" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon bg-dark"></span>
                                    </button>
                                    <button class="carousel-control-next " type="button" data-bs-target="#carousel<?= $package->getId() ?>" data-bs-slide="next">
                                        <span class="carousel-control-next-icon bg-dark"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-3 p-1">
                            <div class="row">
                                <div class="container-fluid col-6 col-sm-12 odhad-objednavky-mini boldText">Predpokladaný termín doručenia:</div>
                                <div class="container-fluid col-4 col-sm-12 odhad-mini boldText greenText"><?= $stage->getEstTimeOFDelivery() ?></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="collapse<?= $package->getId() ?>" class="collapse karta-zasielka-maxi" data-bs-parent="#accordion">
            <div class="card-body p-1">
                <div class="container-fluid col-12">
                    <div class="row">
                        <div class="container-fluid col-6 mapa">
                            <!--<img src="public/images/senohrad.png" alt="mapa">-->
                            <?= "MAP PREVIEW HERE"?>
                        </div>
                        <div class="container-fluid col-6 kontakty-maxi" >
                            <div class="row mt-3">
                                <div class="container-fluid col-4 boldText">

                                    Posledná známa<br>
                                    poloha:
                                </div>
                                <div class="container col-8">
                                    <?php
                                    try {
                                        $stage = $stage->getLastSeenById($latestStageId);
                                    } catch (Exception $e) {
                                        $errorMessenger->message($e);
                                    }
                                    if ($stage == null) {
                                        echo "Neznáme";
                                    } else {
                                        echo $stage;
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="container-fluid col-4 kontakt-obchod boldText">Kontakt na<br> obchod:</div>
                                <div class="container-fluid col-6 obchod">
                                    <div>
                                        <img src="public/images/envelope-fill.svg" alt="email">
                                        <a href="<?= $company->getEmail() ?>"><?= $company->getEmail() ?></a>
                                    </div>
                                    <div>
                                        <img src="public/images/telephone-fill.svg" alt="telefon">
                                        <?= $company->getPhone() ?>
                                    </div>

                                </div>
                                <div class="container-fluid col-2 overflow-hidden ikona-dopravca">
                                    <img src="<?= $company->getIconPath() ?>" alt="Alza" class="ikona-obchodu-maxi">
                                    <?= $company->getCompanyCode()." ICON HERE" ?>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="container-fluid col-4 overflow-hidden kontakt-dopravca boldText">Kontakt na dopravcu:</div>
                                <div class="container-fluid col-6 overflow-hidden dopravca">
                                    <div>
                                        <img src="public/images/envelope-fill.svg" alt="Geis">
                                        <a href="mailto:<?= $deliverycompany->getEmail() ?>"><?= $deliverycompany->getEmail() ?></a>
                                    </div>
                                    <div>
                                        <img src="public/images/telephone-fill.svg" alt="telefon">
                                        <?= $deliverycompany->getPhone() ?>
                                    </div>
                                </div>
                                <div class="container-fluid col-2 overflow-hidden ikona-dopravca">
                                    <img src="<?= $deliverycompany->getIconPath() ?>" alt="Alza" class="ikona-obchodu-maxi">
                                    <?= $deliverycompany->getDeliveryCompanyCode()." ICON HERE" ?>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="container-fluid col-12 kontakt-kurier boldText">Zásielku Vám privezie:</div>
                            </div>
                            <div class="row mt-3">
                                <div class="container-fluid col-6">
                                    <img src=" <?= $courier->getPicturePath() ?>" alt="kurier" class="kurier-foto">

                                </div>
                                <div class="container-fluid col-6 kurier boldText">
                                    <?= $courier->getName()." ".$courier->getSurname() ?>
                                    <div>
                                        <img src="public/images/telephone-fill.svg" alt="telefon">
                                        <?= $courier->getPhone() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php } ?>

<!--    <div class="card">-->
<!--        <div class="card-header karta-zasielka-mini p-1 ">-->
<!--            <div id="headerOne">-->
<!--                <div class="container-fluid col-12">-->
<!--                    <div class="row">-->
<!--                        <div class="container-fluid col-2 ikona-obchod-mini">-->
<!--                            <img src="public/images/alza_crop.png" alt="Alza" class="ikona-obchodu-mini">-->
<!--                        </div>-->
<!--                        <div class="container-fluid col-9 objednavka-mini">-->
<!--                            <b>Objednávka:</b> #111122223333444455555<br>-->
<!--                            <b>Na adresu:</b> Stredné Plachtince 13, 99124 Dolné Plachtince-->
<!--                        </div>-->
<!--                        <div class="container-fluid col-1 btn-roztiahni-mini p-0 ">-->
<!--                            <a class="btn text-center" data-bs-toggle="collapse" href="#collapseOne">X</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="row">-->
<!--                        <div class="col-12 col-sm-2 p-1">-->
<!--                            <div class="row">-->
<!--                                <div class="container-fluid col-6 col-sm-12 datum-objednavky-mini boldText">Dátum <br>objednávky:</div>-->
<!--                                <div class="container-fluid col-4 col-sm-12 datum-mini">13.10.2022</div>-->
<!--                            </div>-->
<!---->
<!--                        </div>-->
<!--                        <div class="col-12 col-sm-7 p-1">-->
<!--                            <div class="container-fluid mt-2">-->
<!--                                <div class="progress me-1 ms-1" style="height: 8px;">-->
<!--                                    <div class="progress-bar progress-bar-animated progress-bar-striped bg-success priebeh80 priebeh-objednavky-mini" aria-label="Segment one"></div>-->
<!--                                    <div class="progress-bar bg-secondary priebeh20 priebeh-objednavky-mini" aria-label="Segment two"></div>-->
<!--                                </div>-->
<!--                                -->
<!--                                <div class="btn-toolbar">-->
<!--                                    <button type="button" class="btn rounded-circle bg-success btn-dark tlacidlo-priebehu" data-bs-slide-to="0"></button>-->
<!--                                    <div class="spacer-mini-1"></div>-->
<!--                                    <button type="button" class="btn rounded-circle bg-success btn-dark tlacidlo-priebehu" data-bs-slide-to="1"></button>-->
<!--                                    <div class="spacer-mini-2"></div>-->
<!--                                    <button type="button" class="btn rounded-circle bg-success btn-dark tlacidlo-priebehu" data-bs-slide-to="2"></button>-->
<!--                                    <div class="spacer-mini-3"></div>-->
<!--                                    <button type="button" class="btn rounded-circle bg-success btn-dark tlacidlo-priebehu" data-bs-slide-to="3"></button>-->
<!--                                    <div class="spacer-mini-4"></div>-->
<!--                                    <button type="button" class="btn rounded-circle bg-secondary btn-dark tlacidlo-priebehu" data-bs-slide-to="4"></button>-->
<!--                                </div>-->
<!--                                -->
<!--                            </div>-->
<!--                            <div class="container-fluid priebeh-mini mt-1">-->
<!--                                Carousel -->
<!--                                <div class="carousel" data-bs-ride="false" id="carousel6" data-bs-wrap="false">-->
<!---->
<!--                                    <div class="carousel-inner">-->
<!--                                        <div class="carousel-item">-->
<!--                                            <div class="container col-8">-->
<!--                                                <b>10:10 | 13.10.2022</b><br>-->
<!--                                                Objednávka je zaregistrovaná<br>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="carousel-item">-->
<!--                                            <div class="container col-8">-->
<!--                                                <b>14:10 | 13.10.2022</b><br>-->
<!--                                                Obchodník vybavuje objednávku<br>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="carousel-item">-->
<!--                                            <div class="container col-8">-->
<!--                                                <b>15:10 | 14.10.2022</b><br>-->
<!--                                                Zásielka je pripravená na expedíciu<br>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="carousel-item active">-->
<!--                                            <div class="container col-8">-->
<!--                                                <b>14:10 | 13.10.2022</b><br>-->
<!--                                                Zásielka je už v preprave<br>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!---->
<!--                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel6" data-bs-slide="prev">-->
<!--                                        <span class="carousel-control-prev-icon bg-dark"></span>-->
<!--                                    </button>-->
<!--                                    <button class="carousel-control-next " type="button" data-bs-target="#carousel6" data-bs-slide="next">-->
<!--                                        <span class="carousel-control-next-icon bg-dark"></span>-->
<!--                                    </button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-12 col-sm-3 p-1">-->
<!--                            <div class="row">-->
<!--                                <div class="container-fluid col-6 col-sm-12 odhad-objednavky-mini boldText">Predpokladaný termín doručenia:</div>-->
<!--                                <div class="container-fluid col-4 col-sm-12 odhad-mini boldText greenText">17.10.<br> medzi 10:00 - 14:00</div>-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div id="collapseOne" class="collapse karta-zasielka-maxi" data-bs-parent="#accordion">-->
<!--            <div class="card-body p-1">-->
<!--                <div class="container-fluid col-12">-->
<!--                    <div class="row">-->
<!--                        <div class="container-fluid col-6 mapa">-->
<!--                            <img src="public/images/senohrad.png" alt="mapa">-->
<!--                        </div>-->
<!--                        <div class="container-fluid col-6 kontakty-maxi" >-->
<!--                            <div class="row mt-3">-->
<!--                                <div class="container-fluid col-4 boldText">-->
<!--                                    Posledná známa<br>-->
<!--                                    poloha:-->
<!--                                </div>-->
<!--                                <div class="container col-8">-->
<!--                                    Neďaleko obce Senohrad-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row mt-3">-->
<!--                                <div class="container-fluid col-4 kontakt-obchod boldText">Kontakt na<br> obchod:</div>-->
<!--                                <div class="container-fluid col-6 obchod">-->
<!--                                    <div>-->
<!--                                        <img src="public/images/envelope-fill.svg" alt="email">-->
<!--                                        <a href="www.alza.sk/kontakt">www.alza.sk/kontakt</a>-->
<!--                                    </div>-->
<!--                                    <div>-->
<!--                                        <img src="public/images/telephone-fill.svg" alt="telefon">-->
<!--                                        +421 123 457 891-->
<!--                                    </div>-->
<!---->
<!--                                </div>-->
<!--                                <div class="container-fluid col-2 overflow-hidden ikona-dopravca">-->
<!--                                    <img src="public/images/alza_crop.png" alt="Alza" class="ikona-obchodu-maxi">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row mt-3">-->
<!--                                <div class="container-fluid col-4 overflow-hidden kontakt-dopravca boldText">Kontakt na dopravcu:</div>-->
<!--                                <div class="container-fluid col-6 overflow-hidden dopravca">-->
<!--                                    <div>-->
<!--                                        <img src="public/images/envelope-fill.svg" alt="Geis">-->
<!--                                        <a href="mailto:info@geis.sk">info@geis.sk</a>-->
<!--                                    </div>-->
<!--                                    <div>-->
<!--                                        <img src="public/images/telephone-fill.svg" alt="telefon">-->
<!--                                        +421 123 457 891-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="container-fluid col-2 overflow-hidden ikona-dopravca">-->
<!--                                    <img src="public/images/geis.png" alt="Alza" class="ikona-obchodu-maxi">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row mt-3">-->
<!--                                <div class="container-fluid col-12 kontakt-kurier boldText">Zásielku Vám privezie:</div>-->
<!--                            </div>-->
<!--                            <div class="row mt-3">-->
<!--                                <div class="container-fluid col-6">-->
<!--                                    <img src="public/images/kurier.jpg" alt="kurier" class="kurier-foto">-->
<!--                                </div>-->
<!--                                <div class="container-fluid col-6 kurier boldText">-->
<!--                                    Marek Kuriér-->
<!--                                    <div>-->
<!--                                        <img src="public/images/telephone-fill.svg" alt="telefon">-->
<!--                                        +421 123 457 891-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="card">-->
<!--        <div class="card-header karta-zasielka-mini p-1">-->
<!--            <div id="headerTwo">-->
<!--                <div class="container-fluid col-12">-->
<!--                    <div class="row">-->
<!--                        <div class="container-fluid col-2 ikona-obchod-mini">-->
<!--                            <img src="public/images/mall-sk.png" alt="Mall.sk" class="ikona-obchodu-mini">-->
<!--                        </div>-->
<!--                        <div class="container-fluid col-9 objednavka-mini">-->
<!--                            <b>Objednávka:</b> #111122223333444455555<br>-->
<!--                            <b>Na adresu:</b> Stredné Plachtince 13, 99124 Dolné Plachtince-->
<!--                        </div>-->
<!--                        <div class="container-fluid col-1 btn-roztiahni-mini p-0 ">-->
<!--                            <a class="btn text-center" data-bs-toggle="collapse" href="#collapseTwo">X</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="row">-->
<!--                        <div class="col-12 col-sm-2 p-1">-->
<!--                            <div class="row">-->
<!--                                <div class="container-fluid col-6 col-sm-12 datum-objednavky-mini boldText">Dátum <br>objednávky:</div>-->
<!--                                <div class="container-fluid col-4 col-sm-12 datum-mini">14.10.2022</div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-12 col-sm-7 p-1">-->
<!--                            <div class="container-fluid mt-2">-->
<!--                                <div class="progress me-1 ms-1" style="height: 8px;">-->
<!--                                    <div class="progress-bar progress-bar-animated progress-bar-striped bg-success priebeh20 priebeh-objednavky-mini" aria-label="Segment one"></div>-->
<!--                                    <div class="progress-bar bg-secondary priebeh80 priebeh-objednavky-mini" aria-label="Segment two"></div>-->
<!--                                </div>-->
<!--                                -->
<!--                                <div class="btn-toolbar">-->
<!--                                    <button type="button" class="btn rounded-circle bg-success btn-dark tlacidlo-priebehu" data-bs-slide-to="0"></button>-->
<!--                                    <div class="spacer-mini-1"></div>-->
<!--                                    <button type="button" class="btn rounded-circle bg-success btn-dark tlacidlo-priebehu" data-bs-slide-to="1"></button>-->
<!--                                    <div class="spacer-mini-2"></div>-->
<!--                                    <button type="button" class="btn rounded-circle bg-success btn-dark tlacidlo-priebehu" data-bs-slide-to="2"></button>-->
<!--                                    <div class="spacer-mini-3"></div>-->
<!--                                    <button type="button" class="btn rounded-circle bg-success btn-dark tlacidlo-priebehu" data-bs-slide-to="3"></button>-->
<!--                                    <div class="spacer-mini-4"></div>-->
<!--                                    <button type="button" class="btn rounded-circle bg-secondary btn-dark tlacidlo-priebehu" data-bs-slide-to="4"></button>-->
<!--                                </div>-->
<!--                                -->
<!--                            </div>-->
<!--                            <div class="container-fluid priebeh-mini mt-1">-->
<!--                                Carousel -->
<!--                                <div class="carousel" data-bs-ride="false"  id="carouselTwo" data-bs-wrap="false">-->
<!---->
<!--                                    <div class="carousel-inner">-->
<!--                                        <div class="carousel-item">-->
<!--                                            <div class="container col-8">-->
<!--                                                <b>13:54 | 14.10.2022</b><br>-->
<!--                                                Objednávka je zaregistrovaná<br>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="carousel-item active">-->
<!--                                            <div class="container col-8">-->
<!--                                                <b>17:10 | 14.10.2022</b><br>-->
<!--                                                Obchodník vybavuje objednávku<br>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!---->
<!--                                    </div>-->
<!---->
<!--                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselTwo" data-bs-slide="prev">-->
<!--                                        <span class="carousel-control-prev-icon bg-dark"></span>-->
<!--                                    </button>-->
<!--                                    <button class="carousel-control-next " type="button" data-bs-target="#carouselTwo" data-bs-slide="next">-->
<!--                                        <span class="carousel-control-next-icon bg-dark"></span>-->
<!--                                    </button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-12 col-sm-3 p-1">-->
<!--                            <div class="row">-->
<!--                                <div class="container-fluid col-6 col-sm-12 odhad-objednavky-mini boldText">Predpokladaný termín<br>doručenia:</div>-->
<!--                                <div class="container-fluid col-4 col-sm-12 odhad-mini boldText greenText">18.10.<br> medzi 8:00 - 12:00</div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div id="collapseTwo" class="collapse karta-zasielka-maxi" data-bs-parent="#accordion">-->
<!--            <div class="card-body p-1">-->
<!--                <div class="container-fluid col-12">-->
<!--                    <div class="row">-->
<!--                        <div class="container-fluid col-6 mapa">-->
<!--                            <img src="public/images/bratislava.png" alt="mapa">-->
<!--                        </div>-->
<!--                        <div class="container-fluid col-6 kontakty-maxi" >-->
<!--                            <div class="row mt-3">-->
<!--                                <div class="container-fluid col-4 boldText">-->
<!--                                    Posledná známa<br>-->
<!--                                    poloha:-->
<!--                                </div>-->
<!--                                <div class="container col-8">-->
<!--                                    Sídlo Mall.sk, Bratislava-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row mt-3">-->
<!--                                <div class="container-fluid col-4 kontakt-obchod boldText">Kontakt na<br> obchod:</div>-->
<!--                                <div class="container-fluid col-6 obchod">-->
<!--                                    <div>-->
<!--                                        <img src="public/images/envelope-fill.svg" alt="email">-->
<!--                                        <a href="https://www.mall.sk/kontakty">www.mall.sk/kontakty</a>-->
<!--                                    </div>-->
<!--                                    <div>-->
<!--                                        <img src="public/images/telephone-fill.svg" alt="telefon">-->
<!--                                        +421 123 456 789-->
<!--                                    </div>-->
<!---->
<!--                                </div>-->
<!--                                <div class="container-fluid col-2 overflow-hidden ikona-dopravca">-->
<!--                                    <img src="public/images/mall-sk.png" alt="Mall.sk" class="ikona-obchodu-maxi" >-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row mt-3">-->
<!--                                <div class="container-fluid col-4 overflow-hidden kontakt-dopravca boldText">Kontakt na dopravcu:</div>-->
<!--                                <div class="container-fluid col-6 overflow-hidden dopravca">-->
<!--                                    <div>-->
<!--                                        <img src="public/images/envelope-fill.svg" alt="Geis">-->
<!--                                        <a href="mailto:info@geis.sk">info@geis.sk</a>-->
<!--                                    </div>-->
<!--                                    <div>-->
<!--                                        <img src="public/images/telephone-fill.svg" alt="telefon">-->
<!--                                        +421 123 457 891-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="container-fluid col-2 overflow-hidden ikona-dopravca">-->
<!--                                    <img src="public/images/geis.png" alt="Alza" class="ikona-obchodu-maxi">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row mt-3">-->
<!--                                <div class="container-fluid col-12 kontakt-kurier boldText">Zásielku Vám privezie:</div>-->
<!--                            </div>-->
<!--                            <div class="row mt-3">-->
<!--                                <div class="container-fluid col-6">-->
<!--                                    <img src="public/images/kurier.jpg" alt="kurier" class="kurier-foto">-->
<!--                                </div>-->
<!--                                <div class="container-fluid col-6 kurier boldText">-->
<!--                                    Marek Kuriér-->
<!--                                    <div>-->
<!--                                        <img src="public/images/telephone-fill.svg" alt="telefon">-->
<!--                                        +421 123 457 891-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="card">-->
<!--        <div class="card-header karta-zasielka-mini p-1">-->
<!--            <div id="headerThree">-->
<!--                <div class="container-fluid col-12">-->
<!--                    <div class="row">-->
<!--                        <div class="container-fluid col-2 ikona-obchod-mini">-->
<!--                            <img src="public/images/datart-crop.jpg" alt="Datart" class="ikona-obchodu-mini">-->
<!--                        </div>-->
<!--                        <div class="container-fluid col-9 objednavka-mini">-->
<!--                            <b>Objednávka:</b> #111122223333444455555<br>-->
<!--                            <b>Na adresu:</b> Stredné Plachtince 13, 99124 Dolné Plachtince-->
<!--                        </div>-->
<!--                        <div class="container-fluid col-1 btn-roztiahni-mini p-0 ">-->
<!--                            <a class="btn text-center" data-bs-toggle="collapse" href="#collapseThree">X</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="row">-->
<!--                        <div class="col-12 col-sm-2 p-1">-->
<!--                            <div class="row">-->
<!--                                <div class="container-fluid col-6 col-sm-12 datum-objednavky-mini boldText">Dátum <br>objednávky:</div>-->
<!--                                <div class="container-fluid col-4 col-sm-12 datum-mini">11.10.2022</div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-12 col-sm-7 p-1">-->
<!--                            <div class="container-fluid mt-2">-->
<!--                                <div class="progress me-1 ms-1" style="height: 8px;">-->
<!--                                    <div class="progress-bar progress-bar-animated progress-bar-striped bg-success priebeh100 priebeh-objednavky-mini" aria-label="Segment one"></div>-->
<!--                                    <div class="progress-bar bg-secondary priebeh-objednavky-mini" aria-label="Segment two"></div>-->
<!--                                </div>-->
<!--                                -->
<!--                                <div class="btn-toolbar">-->
<!--                                    <button type="button" class="btn rounded-circle bg-success btn-dark tlacidlo-priebehu" data-bs-slide-to="0"></button>-->
<!--                                    <div class="spacer-mini-1"></div>-->
<!--                                    <button type="button" class="btn rounded-circle bg-success btn-dark tlacidlo-priebehu" data-bs-slide-to="1"></button>-->
<!--                                    <div class="spacer-mini-2"></div>-->
<!--                                    <button type="button" class="btn rounded-circle bg-success btn-dark tlacidlo-priebehu" data-bs-slide-to="2"></button>-->
<!--                                    <div class="spacer-mini-3"></div>-->
<!--                                    <button type="button" class="btn rounded-circle bg-success btn-dark tlacidlo-priebehu" data-bs-slide-to="3"></button>-->
<!--                                    <div class="spacer-mini-4"></div>-->
<!--                                    <button type="button" class="btn rounded-circle bg-secondary btn-dark tlacidlo-priebehu" data-bs-slide-to="4"></button>-->
<!--                                </div>-->
<!--                                -->
<!--                            </div>-->
<!--                            <div class="container-fluid priebeh-mini mt-1">-->
<!--                                 Carousel -->
<!--                                <div class="carousel slide" data-bs-ride="false" id="carouselThree" data-bs-wrap="false">-->
<!---->
<!--                                    <div class="carousel-inner">-->
<!--                                        <div class="carousel-item">-->
<!--                                            <div class="container col-8">-->
<!--                                                <b>8:40 | 11.10.2022</b><br>-->
<!--                                                Objednávka je zaregistrovaná<br>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="carousel-item">-->
<!--                                            <div class="container col-8">-->
<!--                                                <b>14:17 | 11.10.2022</b><br>-->
<!--                                                Obchodník vybavuje objednávku<br>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="carousel-item">-->
<!--                                            <div class="container col-8">-->
<!--                                                <b>22:40 | 11.10.2022</b><br>-->
<!--                                                Zásielka je pripravená na expedíciu<br>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="carousel-item">-->
<!--                                            <div class="container col-8">-->
<!--                                                <b>6:22 | 12.10.2022</b><br>-->
<!--                                                Zásielka je už v preprave<br>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="carousel-item active">-->
<!--                                            <div class="container col-8">-->
<!--                                                <b>11:47 | 14.10.2022</b><br>-->
<!--                                                Zásielka bola doručená na poštu<br>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!---->
<!--                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselThree" data-bs-slide="prev">-->
<!--                                        <span class="carousel-control-prev-icon bg-dark"></span>-->
<!--                                    </button>-->
<!--                                    <button class="carousel-control-next " type="button" data-bs-target="#carouselThree" data-bs-slide="next">-->
<!--                                        <span class="carousel-control-next-icon bg-dark"></span>-->
<!--                                    </button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-12 col-sm-3 p-1">-->
<!--                            <div class="row">-->
<!--                                <div class="container-fluid col-6 col-sm-12 odhad-objednavky-mini boldText">Zásielka pripravená<br>na vyzdvihnutie</div>-->
<!--                                <div class="container-fluid col-4 col-sm-12 odhad-mini boldText greenText">Na pošte v obci Veľký Krtíš</div>-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div id="collapseThree" class="collapse karta-zasielka-maxi" data-bs-parent="#accordion">-->
<!--            <div class="card-body p-1">-->
<!--                <div class="container-fluid col-12">-->
<!--                    <div class="row">-->
<!--                        <div class="container-fluid col-6 mapa">-->
<!--                            <img src="public/images/vk.png" alt="mapa">-->
<!--                        </div>-->
<!--                        <div class="container-fluid col-6 kontakty-maxi" >-->
<!--                            <div class="row mt-3">-->
<!--                                <div class="container-fluid col-4 boldText">-->
<!--                                    Posledná známa<br>-->
<!--                                    poloha:-->
<!--                                </div>-->
<!--                                <div class="container col-8">-->
<!--                                    Pošta Veľký Krtíš, Námestie Škultétyho 1, 990 01 Veľký Krtíš-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row mt-3">-->
<!--                                <div class="container-fluid col-4 kontakt-obchod boldText">Kontakt na<br> obchod:</div>-->
<!--                                <div class="container-fluid col-6 obchod">-->
<!--                                    <div>-->
<!--                                        <img src="public/images/envelope-fill.svg" alt="email">-->
<!--                                        <a href="https://www.datart.sk/napoveda/kontakt">www.datart.sk/napoveda/kontakt</a>-->
<!--                                    </div>-->
<!--                                    <div>-->
<!--                                        <img src="public/images/telephone-fill.svg" alt="telefon">-->
<!--                                        +421 123 456 789-->
<!--                                    </div>-->
<!---->
<!--                                </div>-->
<!--                                <div class="container-fluid col-2 overflow-hidden ikona-dopravca">-->
<!--                                    <img src="public/images/datart-crop.jpg" alt="Datart" class="ikona-obchodu-maxi">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row mt-3">-->
<!--                                <div class="container-fluid col-4 overflow-hidden kontakt-dopravca boldText">Kontakt na dopravcu:</div>-->
<!--                                <div class="container-fluid col-6 overflow-hidden dopravca">-->
<!--                                    <div>-->
<!--                                        <img src="public/images/envelope-fill.svg" alt="ups">-->
<!--                                        <a href="mailto:bratislava@sps-sro.sk">bratislava@sps-sro.sk</a>-->
<!--                                    </div>-->
<!--                                    <div>-->
<!--                                        <img src="public/images/telephone-fill.svg" alt="telefon">-->
<!--                                        +421 123 457 891-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="container-fluid col-2 overflow-hidden ikona-dopravca">-->
<!--                                    <img src="public/images/ups.png" alt="ups" class="ikona-obchodu-maxi">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row mt-3">-->
<!--                                <div class="container-fluid col-12 kontakt-kurier boldText">Zásielku Vám privezie:</div>-->
<!--                            </div>-->
<!--                            <div class="row mt-3">-->
<!--                                <div class="container-fluid col-6">-->
<!--                                    <img src="public/images/kurier.jpg" alt="kurier" class="kurier-foto">-->
<!--                                </div>-->
<!--                                <div class="container-fluid col-6 kurier boldText">-->
<!--                                    Marek Kuriér-->
<!--                                    <div>-->
<!--                                        <img src="public/images/telephone-fill.svg" alt="telefon">-->
<!--                                        +421 123 457 891-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->


</div>


<hr>
<div class="container mt-4">
    <div class="row">
        <div class="col-sm-6">
            <h1>Máte kód zásielky?</h1>
        </div>
        <div class="col-sm-5">
            <h5>Zadajte nižšie kód svojej zásielky a ihneď ju pridáme do sledovania! Alebo si želáte editovať?</h5>
        </div>
    </div>
    <div class="row">
        <form action="?c=home" method="post">
            <div class="col-sm-8">
                <div class="form-floating mb-3 mt-3">

                        <input type="text" class="form-control" id="input-cislo" name="input-cislo" placeholder="#Číslo zásielky">
                        <label for="input-cislo">Sem zadajte číslo zásielky</label>
                </div>
            </div>
            <div class="col-sm-4 mt-3">
                <button type="button" class="btn btn-success m-2 punchPinkDark">Pridať novú zásielku</button>
                <button type="submit" class="btn btn-warning m-2" href="?c=home">Editovať existujúcu zásielku</button>
            </div>
        </form>
    </div>
    <hr>
    <div class="row mt-3 mb-5">
        <div class="col-sm-6">
            <h1>Chcete zaregistrovať úplne novú zásielku?</h1>
        </div>
        <div class="col-sm-5">
            <h5>Vyplňte náš formulár a vytvorte novú zásielku presne podľa Vašich potrieb!</h5>
            <a class="btn btn-success m-2 punchPinkDark" href="?c=newpackage">Vytvoriť novú zásielku</a>

        </div>
    </div>
    <hr>
</div>


