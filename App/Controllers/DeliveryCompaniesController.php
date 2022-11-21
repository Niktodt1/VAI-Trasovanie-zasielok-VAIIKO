<?php

namespace App\Controllers;

use App\Core\Responses\Response;
use App\Models\Adress;
use App\Models\Courier;
use App\Models\DeliveryCompany;
use App\Models\ErrorMessenger;
use App\Models\Package;

class DeliveryCompaniesController extends \App\Core\AControllerBase
{

    public function edit() {
        return $this->html([
            'deliveryCompany' => DeliveryCompany::getOne($this->request()->getValue('id')),
            'edit' => true
        ],
            'edit.form'
        );
    }

    public function create() {
        return $this->html([
            'deliveryCompany' => new DeliveryCompany(),
        ],
            'new.form'
        );
    }

    /**
     * @throws \Exception
     */
    public function delete() {
        $deliveryCompany = DeliveryCompany::getOne($this->request()->getValue('id'));
        $associatedPackages = Package::getAll("DeliveryCompanyId=?",[$deliveryCompany->getId()]);
        $associatedCouriers = Courier::getAll("DeliveryCompanyId=?",[$deliveryCompany->getId()]);

        foreach ($associatedPackages as $associatedPackage) {
            $associatedPackage->delete();
        }
        foreach ($associatedCouriers as $associatedCourier) {
            $associatedCourier->delete();
        }
        $deliveryCompany->delete();

        return $this->redirect("?c=deliverycompanies");
    }

    public function saveEdit() {
        $id = $this->request()->getValue('id');
        $deliveryCompany = ($id ? DeliveryCompany::getOne($id) : new DeliveryCompany());

        $deliveryCompany->setFullCompanyName($this->request()->getValue('title'));
        $deliveryCompany->setDeliveryCompanyCode($this->request()->getValue('code'));
        $deliveryCompany->setDeliveryCompanyDescription($this->request()->getValue('description'));
        $city = $this->request()->getValue('obec');
        $street = $this->request()->getValue('ulica');
        $streetNumber = $this->request()->getValue('supisne-cislo');
        $zipCode = $this->request()->getValue('zip');
        $adressFound = false;
        $adressId = -1;   //ak sa adresa nenajde tak nastala chyba a v id bude -1
        $adresses = Adress::getAll();
        foreach ($adresses as $adress) {
            if ($adress->getCity() == $city && $adress->getStreet() == $street && $adress->getZipCode() == $zipCode && $adress->getStreetNumber() == $streetNumber) {
                //tato adresa je v databaze
                $adressFound = true;
                $adressId = $adress->getId();
                if ($deliveryCompany->getAdressId() != $adress->getId()) {
                    //ak sa povodna nerovna tak ju zmenime
                    $deliveryCompany->setAdressId($adress->getId());
                }
            }
        }
        if (!$adressFound) {
            //adresa sa nenasla (takze je zrejme nova, musime ju pridat
            $newAdress = new Adress();
            $newAdress->setCity($city);
            $newAdress->setStreet($street);
            $newAdress->setZipCode($zipCode);
            $newAdress->setStreetNumber($streetNumber);
            $newAdress->save();
            $deliveryCompany->setAdressId($newAdress->getId());
            $deliveryCompany->save();
        }

        $deliveryCompany->setPhone($this->request()->getValue('telefon'));
        $deliveryCompany->setEmail($this->request()->getValue('email'));
        $deliveryCompany->setWebsite($this->request()->getValue('website'));
        $deliveryCompany->setIconPath($this->request()->getValue('photo'));

        $deliveryCompany->save();
        //18181 just in case

        return $this->redirect("?c=deliverycompanies");
    }


    /**
     * @inheritDoc
     * @throws \Exception
     */
    public function index(): Response
    {
        return $this->html([
            'deliveryCompanies' => DeliveryCompany::getAll(),
            'adresses' => Adress::getAll()
        ]);
    }
}