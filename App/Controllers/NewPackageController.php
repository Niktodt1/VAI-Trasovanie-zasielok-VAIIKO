<?php

namespace App\Controllers;

use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Models\Adress;
use App\Models\Company;
use App\Models\DeliveryCode;
use App\Models\DeliveryCompany;
use App\Models\Package;
use App\Models\Stage;
use App\Models\User;
use Exception;


class NewPackageController extends \App\Core\AControllerBase
{
    public bool $editingMode = false;

    /**
     * @return RedirectResponse
     * @throws Exception
     */
    public function create()
    {
        //najprv sa zadavaju udaje pouzivatela
        $name = $this->request()->getValue('meno');
        $surname =  $this->request()->getValue('priezvisko');
        $email =  $this->request()->getValue('email');
        $telefon = $this->request()->getValue('telefon');



        //pokusime sa ho najst v databaze
        $users = User::getAll();
        $userFound = false;
        $userId = -1;   //ak sa user nenajde tak nastala chyba a v id bude -1
        foreach ($users as $user) {
            if ($user->getName() == $name && $user->getSurname() == $surname && $user->getEmail() == $email && $user->getPhone() == $telefon) {
                //tento pouzivatel je v databaze a nemusime ho pridavat
                $userFound = true;
                $userId = $user->getId();
            }
        }
        if (!$userFound) {
            $newUser = new User();
            $newUser->setName($name);
            $newUser->setSurname($surname);
            $newUser->setEmail($email);
            $newUser->setPhone($telefon);
            $newUser->setIsRegistered(0);
            //vytvorime mu aj novu adresu a priradime ju, udaje sa ale ulozia neskor
            $newUsersAdress = new Adress();
            $city = $this->request()->getValue('obec');
            $street = $this->request()->getValue('ulica');
            $zipCode = $this->request()->getValue('zip');
            $streetNumber = $this->request()->getValue('supisne-cislo');
            $newUsersAdress->setCity($city);
            $newUsersAdress->setStreet($street);
            $newUsersAdress->setZipCode($zipCode);
            $newUsersAdress->setStreetNumber($streetNumber);

            $newUsersAdress->save();
            $newUser->setAdressId($newUsersAdress->getId());
            $newUser->save();
            $userId = $newUser->getId();
        }

        $companyCode = $this->request()->getValue('obchod');
        $matchCompany = null;
        foreach (Company::getAll() as $company) {
            if ($company->getCompanyCode() == $companyCode) {
                $matchCompany = $company;
            }
        }
        if (is_null($matchCompany)) {
            $matchCompany = Company::getOne(1);
        }
        $company = $matchCompany;

        $dateOfOrder = $this->request()->getValue('datum-objednania');
        $timeOfOrder = $this->request()->getValue('cas-objednania');

        $datetimeOfOrder = $dateOfOrder." ".$timeOfOrder.":00";

        $deliveryCompanyCode = $this->request()->getValue('prepravca');
        $matchDeliveryCompany = null;
        foreach (DeliveryCompany::getAll() as $deliveryCompany) {
            if ($deliveryCompany->getDeliveryCompanyCode() == $deliveryCompanyCode) {
                $matchDeliveryCompany = $deliveryCompany;
            }
        }
        if (is_null($matchDeliveryCompany)) {
            $matchDeliveryCompany = DeliveryCompany::getOne(1);
        }
        $deliveryCompany = $matchDeliveryCompany;


        $deliveryCode = $this->request()->getValue('dorucenie');
        $matchDeliveryCode = null;
        foreach (DeliveryCode::getAll() as $delivery) {
            if ($delivery->getDeliveryText() == $deliveryCode) {
                $matchDeliveryCode = $delivery;
            }
        }
        if (is_null($matchDeliveryCode)) {
            $matchDeliveryCode = DeliveryCode::getOne(1);
        }
        $delivery = $matchDeliveryCode;

        //a konecne mozeme vytvorit novu package
        $newPackage = new Package();
        $newPackage->setReceiverUserId($userId);
        $newPackage->setCompanyId($company->getId());
        $newPackage->setDateOfOrder($datetimeOfOrder);
        $newPackage->setDeliveryCompanyId($deliveryCompany->getId());
        $newPackage->setReceived(0);    //to je vzdy false pri vytvoreni novej
        $newPackage->setCourierId(1);   //PLACEHOLDER
        $newPackage->setTypeOfDelivery($delivery->getId());
        $newPackage->save();

        //teraz generujeme stage (zatial len natvrdo)
        $newStage = [5];
        for ($i=0; $i<5; $i++) {
            $newStage[$i] = new Stage();
            $newStage[$i]->setDatetime($newPackage->getDateOfOrder());
            $newStage[$i]->setPackageId($newPackage->getId());
            $newStage[$i]->setStageCurrentId($i+1);
            $newStage[$i]->setEstTimeOfDelivery("Not implemented yet, sorry...");
            $newStage[$i]->setLastSeen("Not implemented yet, sorry...");
            $newStage[$i]->save();
        }

        return $this->redirect("?c=home");
    }


    /**
     * @inheritDoc
     * @throws Exception
     */
    public function index(): Response
    {
        return $this->html([
            'companies' => Company::getAll(),
            'deliveryCompanies' => DeliveryCompany::getAll(),
            'deliveryCodes' => DeliveryCode::getAll()
        ]);
    }


}