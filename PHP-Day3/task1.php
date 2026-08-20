<?php

/**
 * ===================== Circle =====================
 */
class Circle
{
    private float $radius;
    private string $color;

    public function __construct(float $radius = 1.0, string $color = "red")
    {
        $this->radius = $radius;
        $this->color = $color;
    }

    public function getRadius(): float
    {
        return $this->radius;
    }

    public function setRadius(float $radius): void
    {
        $this->radius = $radius;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getArea(): float
    {
        return M_PI * $this->radius * $this->radius;
    }

    public function __toString(): string
    {
        return "Circle[radius={$this->radius},color={$this->color}]";
    }
}


/**
 * ===================== Employee =====================
 */
class Employee
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private int $salary;

    public function __construct(int $id, string $firstName, string $lastName, int $salary)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->salary = $salary;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getName(): string
    {
        return $this->firstName . " " . $this->lastName;
    }

    public function getSalary(): int
    {
        return $this->salary;
    }

    public function setSalary(int $salary): void
    {
        $this->salary = $salary;
    }

    public function getAnnualSalary(): int
    {
        return $this->salary * 12;
    }

  
    public function raiseSalary(int $percent): int
    {
        $this->salary += (int) round($this->salary * $percent / 100);
        return $this->salary;
    }

    public function __toString(): string
    {
        return "Employee[id={$this->id},name={$this->getName()},salary={$this->salary}]";
    }
}


/**
 * ===================== Rectangle =====================
 */
class Rectangle
{
    private float $length;
    private float $width;

    public function __construct(float $length = 1.0, float $width = 1.0)
    {
        $this->length = $length;
        $this->width = $width;
    }

    public function getLength(): float
    {
        return $this->length;
    }

    public function setLength(float $length): void
    {
        $this->length = $length;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function setWidth(float $width): void
    {
        $this->width = $width;
    }

    public function getArea(): float
    {
        return $this->length * $this->width;
    }

    public function getPerimeter(): float
    {
        return 2 * ($this->length + $this->width);
    }

    public function __toString(): string
    {
        return "Rectangle[length={$this->length},width={$this->width}]";
    }
}


/**
 * ===================== InvoiceItem =====================
 */
class InvoiceItem
{
    private string $id;
    private string $desc;
    private int $qty;
    private float $unitPrice;

    public function __construct(string $id, string $desc, int $qty, float $unitPrice)
    {
        $this->id = $id;
        $this->desc = $desc;
        $this->qty = $qty;
        $this->unitPrice = $unitPrice;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getDesc(): string
    {
        return $this->desc;
    }

    public function getQty(): int
    {
        return $this->qty;
    }

    public function setQty(int $qty): void
    {
        $this->qty = $qty;
    }

    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(float $unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }

    public function getTotal(): float
    {
        return $this->unitPrice * $this->qty;
    }

    public function __toString(): string
    {
        return "InvoiceItem[id={$this->id},desc={$this->desc},qty={$this->qty},unitPrice={$this->unitPrice}]";
    }
}


