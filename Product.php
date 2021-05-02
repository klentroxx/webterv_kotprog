<?php


class Product
{
    private $name;
    private $quantity;
    private $bestBefore;
    private $isImportant;
    private $unit;
    private $datetimeAdded;

    /**
     * Product constructor.
     * @param $name
     * @param $quantity
     * @param $bestBefore
     * @param $isImportant
     * @param $unit
     * @param $datetimeAdded
     */
    public function __construct($name, $quantity, $bestBefore, $isImportant, $unit, $datetimeAdded)
    {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->bestBefore = $bestBefore;
        $this->isImportant = $isImportant;
        $this->unit = $unit;
        $this->datetimeAdded = $datetimeAdded;
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
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getBestBefore()
    {
        return $this->bestBefore;
    }

    /**
     * @param mixed $bestBefore
     */
    public function setBestBefore($bestBefore)
    {
        $this->bestBefore = $bestBefore;
    }

    /**
     * @return mixed
     */
    public function getIsImportant()
    {
        return $this->isImportant;
    }

    /**
     * @param mixed $isImportant
     */
    public function setIsImportant($isImportant)
    {
        $this->isImportant = $isImportant;
    }

    /**
     * @return mixed
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param mixed $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
    }

    /**
     * @return mixed
     */
    public function getDatetimeAdded()
    {
        return $this->datetimeAdded;
    }

    /**
     * @param mixed $datetimeAdded
     */
    public function setDatetimeAdded($datetimeAdded)
    {
        $this->datetimeAdded = $datetimeAdded;
    }

    public function writeFile() {
        $product = [
            "name" => $this->name,
            "quantity" => $this->quantity,
            "best_before" => $this->bestBefore,
            "important" => $this->isImportant,
            "unit" => $this->unit,
            "datetime_added" => $this->datetimeAdded
        ];
        $file = fopen("products.txt", "a");
        fwrite($file, serialize($product));
        fwrite($file, "\n");
        fclose($file);
    }

}