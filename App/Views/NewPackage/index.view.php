<?php
/** @var Array $data */

/** @var Array $companies */
/** @var Company $company */

/** @var Array $deliveryCompanies */
/** @var DeliveryCompany $deliveryCompany */

/** @var Array $deliveryCodes */
/** @var DeliveryCode $deliveryCode */

use App\Models\Company;
use App\Models\DeliveryCode;
use App\Models\DeliveryCompany;

?>

<hr>
<div class="container-fluid col-12">
    <div class="row mt-3">
        <div class="container col-8">
            <h1>Nová zásielka</h1>
        </div>
        <div class="container col-4">
            <button data-bs-toggle="collapse" data-bs-target="#cez-kod" class="btn btn-primary">Mám kód zásielky!</button>
        </div>
    </div>
</div>

<div id="cez-kod" class="collapse">
    <div class="row">
        <div class="form-floating mb-3 mt-3 col-sm-5">
            <input type="text" class="form-control" id="input-cislo" placeholder="#Číslo">
            <label for="input-cislo">Sem zadajte číslo zásielky</label>
        </div>
        <div class="col-sm-5 mt-3">
            <button type="button" class="btn btn-success m-2 punchPinkDark">Pridať novú zásielku</button>
        </div>

    </div>
</div>
<hr>

<form action="?c=newpackage&a=create" method="post" enctype="multipart/form-data">

    <h6>Osobné údaje príjemcu</h6>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 col-sm-6">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="meno" placeholder="Zadaj svoje meno" name="meno" required>
                    <label for="meno">Krstné meno</label>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
            </div>
            <div class="col-10 col-sm-6">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="priezvisko" placeholder="Zadaj svoje priezvisko" name="priezvisko">
                    <label for="priezvisko">Priezvisko</label>
                </div>
            </div>

            <!--
            meno priezvisko
            email číslo
            bydlisko

            adresa doručenia
            obchodník
            dátum a čas objednávky

            sposob doručenia
            meno a priezvisko kuriéra
            číslo kuriéra
            -->
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-7 col-md-6">
                <div class="form-floating mb-3 mt-3">
                    <input type="email" class="form-control" id="email" placeholder="Zadaj svoj email" name="email">
                    <label for="email">Emailová adresa</label>
                </div>
            </div>
            <div class="col-sm-5 col-md-4">
                <div class="form-floating mb-3 mt-3">
                    <input type="tel" class="form-control" id="telefon" placeholder="Zadaj svoje telefónne číslo" name="telefon">
                    <label for="telefon">Telefónne číslo</label>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <h6>Adresa doručenia</h6>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-5 col-md-3">

                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="obec" placeholder="Zadaj mesto/obec" name="obec" required>
                    <label for="obec">Mesto alebo obec</label>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
            </div>
            <div class="col-sm-7 col-md-5">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="ulica" placeholder="Zadaj ulicu" name="ulica">
                    <label for="ulica">Ulica</label>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-2">
                <div class="form-floating mb-3 mt-3">
                    <input type="number" class="form-control" id="zip" placeholder="Zadaj PSČ" name="zip">
                    <label for="zip">PSČ</label>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-2">
                <div class="form-floating mb-3 mt-3">
                    <input type="number" class="form-control" id="supisne-cislo" placeholder="Zadaj súpisné číslo" name="supisne-cislo">
                    <label for="supisne-cislo">Súpisné č.</label>
                </div>
            </div>

        </div>
    </div>


    <hr>
    <h6>Detaily zásielky</h6>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <label for="obchod" class="form-label">Obchod (vyber si jeden):</label>
                <select class="form-select" id="obchod" name="obchod">
                    <option>Obchod (vyber si jeden)</option>
                    <?php
                        foreach ($data['companies'] as $company) {?>
                            <option><?= $company->getCompanyCode() ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3 mt-3">
                    <input type="date" class="form-control" id="datum-objednania" name="datum-objednania">
                    <label for="datum-objednania">Dátum objednania</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3 mt-3">
                    <input type="time" class="form-control" id="cas-objednania" name="cas-objednania">
                    <label for="cas-objednania">Čas objednania</label>
                </div>
            </div>

        </div>
    </div>


    <hr>
    <h6>Detaily doručenia</h6>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <label for="prepravca" class="form-label">Prepravca (vyber si jedného):</label>
                <select class="form-select" id="prepravca" name="prepravca">
                    <option>Prepravca (vyber si jedného)</option>
                    <?php
                    foreach ($data['deliveryCompanies'] as $deliveryCompany) {?>
                        <option><?= $deliveryCompany->getDeliveryCompanyCode() ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-5">
                <label for="dorucenie" class="form-label">Spôsob doručenia (vyber si jeden):</label>
                <select class="form-select" id="dorucenie" name="dorucenie">
                    <option>Spôsob doručenia (vyber si jeden)</option>
                    <?php
                    foreach ($data['deliveryCodes'] as $deliveryCode) {?>
                        <option><?= $deliveryCode->getDeliveryText() ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>


    <hr>
    <div class="container-fluid text-center">
        <h5>Dokončenie zásielky</h5>
        <button type="submit" class="btn btn-primary">Potvrdiť zásielku</button>
    </div>
</form>


