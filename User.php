<?php


class User
{
    private $username;
    private $name;
    private $password;
    private $phone;
    private $email;
    private $postalCode;
    private $city;
    private $streetName;
    private $streetNumber;
    private $floor;
    private $door;
    private $image;

    /**
     * User constructor.
     * @param $username
     * @param $name
     * @param $password
     * @param $phone
     * @param $email
     * @param $postalCode
     * @param $city
     * @param $streetName
     * @param $streetNumber
     * @param $floor
     * @param $door
     * @param $image
     */
    public function __construct($username, $name, $password, $phone, $email, $postalCode, $city, $streetName, $streetNumber, $floor, $door, $image)
    {
        $this->username = $username;
        $this->name = $name;
        $this->password = $password;
        $this->phone = $phone;
        $this->email = $email;
        $this->postalCode = $postalCode;
        $this->city = $city;
        $this->streetName = $streetName;
        $this->streetNumber = $streetNumber;
        $this->floor = $floor;
        $this->door = $door;
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param mixed $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * @param mixed $streetName
     */
    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;
    }

    /**
     * @return mixed
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @param mixed $streetNumber
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;
    }

    /**
     * @return mixed
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * @param mixed $floor
     */
    public function setFloor($floor)
    {
        $this->floor = $floor;
    }

    /**
     * @return mixed
     */
    public function getDoor()
    {
        return $this->door;
    }

    /**
     * @param mixed $door
     */
    public function setDoor($door)
    {
        $this->door = $door;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    public function writeFile() {
        $user = [
            "felhasznalo_nev" => $this->username,
            "nev" => $this->name,
            "jelszo" => $this->password,
            "telefon" => $this->password,
            "email" => $this->password,
            "iranyito_szam" => $this->password,
            "varos" => $this->password,
            "utca_nev" => $this->password,
            "hazszam" => $this->password,
            "emelet" => $this->password,
            "ajto" => $this->password,
            "kep" => $this->password
        ];
        $file = fopen("users.txt", "a");
        fwrite($file, serialize($user));
        fclose($file);
    }

}