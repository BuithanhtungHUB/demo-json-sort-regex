<?php


class DataCountry
{
    public static $path = "countries.json";

    public static function checkFile()
    {
        if (!file_exists(self::$path)) {
            throw new Exception("file not found");

        }
    }

    public static function loadData()
    {
        try {
            self::checkFile();
            $dataJson = file_get_contents(self::$path);
            $data = json_decode($dataJson);
            return self::convertToCountry($data);
        } catch (Exception $e) {
            session_start();
            $_SESSION['error'] = $e->getMessage() . " - " . 'line: '. $e->getLine();
        }
    }

    public static function saveData($data)
    {
        $dataJson = json_encode($data);
        file_put_contents(self::$path, $dataJson);
    }

    public static function convertToCountry($data)
    {
        $countries = [];
        foreach ($data as $item) {
            $country = new Country($item->name, $item->goldMedals, $item->silverMedals, $item->bronzeMedals);
            array_push($countries, $country);
        }
        return $countries;
    }

    public static function addCountry($country)
    {
        $countries = self::loadData();
        array_push($countries, $country);
        self::saveData($countries);
    }

    public static function getCountryByName($name)
    {
        $countries = self::loadData();
        foreach ($countries as $country) {
            if ($country->getName() == $name) {
                return $country;
            }
        }
    }

    public static function editCountryByName($name, $newCountry)
    {
        $countries = self::loadData();
        foreach ($countries as $country) {
            if ($country->getName() == $name) {
                $country->setName($newCountry->getName());
                $country->setgoldMedals($newCountry->getgoldMedals());
                $country->setsilverMedals($newCountry->getsilverMedals());
                $country->setbronzeMedals($newCountry->getbronzeMedals());
            }
        }
        self::saveData($countries);
    }

    public static function sortCountryByGoldMedals($type)
    {
        $countries = self::loadData();
        usort($countries, function ($item1, $item2) use ($type) {
            if ($type == 'up') {
                return $item1->totalMedals > $item2->totalMedals;
            } else {
                return $item1->totalMedals < $item2->totalMedals;
            }
        });
        return $countries;
    }
}