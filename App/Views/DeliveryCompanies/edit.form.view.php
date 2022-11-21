<?php
/** @var  Array $data */
/** @var \App\Models\DeliveryCompany $deliveryCompany */

$deliveryCompany = $data['deliveryCompany']
?>

<hr>
<div class="container-fluid col-12">
    <div class="row">
        <div class="container col-8">
            <?php if ($data['edit'] == true) { ?>
                <h1>Editácia prepravcu: <?= $deliveryCompany->getFullCompanyName() ?></h1>
            <?php } else {?>
                <h1>Pridanie nového prepravcu <?= $deliveryCompany->getFullCompanyName() ?></h1>
            <?php }?>

        </div>
        <div class="container col-4"></div>
    </div>
</div>

<form action="?c=deliverycompanies&a=saveEdit" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?= $deliveryCompany->getId() ?>" name="id">
    <div class="mb-3">
        <label for="title" class="form-label">Celý názov spoločnosti:</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $deliveryCompany->getFullCompanyName() ?>">
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Kód spoločnosti (skrátený názov alebo skratka):</label>
        <input type="text" class="form-control" id="code" name="code" value="<?= $deliveryCompany->getDeliveryCompanyCode() ?>">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Popis spoločnosti (skrátený názov alebo skratka):</label>
        <textarea type="text" class="form-control" id="description" name="description" style="height: 180px"><?= $deliveryCompany->getDeliveryCompanyDescription() ?>"</textarea>
    </div>
    <div class="mb-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-5 col-md-3">

                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="obec" placeholder="Zadaj mesto/obec" value="<?= $deliveryCompany->getAdress()->getCity() ?>" name="obec" required>
                        <label for="obec">Mesto alebo obec kde spoločnost sídli</label>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="col-sm-7 col-md-5">
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="ulica" placeholder="Zadaj ulicu" name="ulica" value="<?= $deliveryCompany->getAdress()->getStreet() ?>">
                        <label for="ulica">Ulica sídla spoločnosti</label>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-2">
                    <div class="form-floating mb-3 mt-3">
                        <input type="number" class="form-control" id="zip" placeholder="Zadaj PSČ" name="zip" value="<?= $deliveryCompany->getAdress()->getZipCode() ?>">
                        <label for="zip">PSČ spoločnosti</label>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-2">
                    <div class="form-floating mb-3 mt-3">
                        <input type="number" class="form-control" id="supisne-cislo" placeholder="Zadaj súpisné číslo" name="supisne-cislo" value="<?= $deliveryCompany->getAdress()->getStreetNumber() ?>">
                        <label for="supisne-cislo">Súpisné č. spoločnosti</label>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="photo" class="form-label">Cesta ku brázoku spoločnosti:</label>
        <input class="form-control" type="text" id="photo" name="photo" value="<?= $deliveryCompany->getIconPath() ?>">
    </div>
    <div class="mb-3">
        <div class="container-fluid">
            <div class="row">
                <div class="form-floating mb-3 mt-3">
                    <input type="email" class="form-control" id="email" placeholder="Zadaj email" name="email" value="<?= $deliveryCompany->getEmail() ?>">
                    <label for="email">Emailová adresa spoločnosti</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input type="tel" class="form-control" id="telefon" placeholder="Zadaj telefónne číslo" name="telefon" value="<?= $deliveryCompany->getPhone() ?>">
                    <label for="telefon">Telefónne číslo spoločnosti</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="website" placeholder="Zadaj webstránku" name="website" value="<?= $deliveryCompany->getWebsite()?>">
                    <label for="telefon">Webstránka spoločnosti</label>
                </div>


            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Odoslať</button>

</form>
