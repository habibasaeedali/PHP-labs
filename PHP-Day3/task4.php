<?php

// =====================================================================
// 1) Person / Student / Staff
// =====================================================================

abstract class Person
{
    private string $name;
    private string $address;

    public function __construct(string $name, string $address)
    {
        $this->name = $name;
        $this->address = $address;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    abstract public function __toString(): string;
}

class Student extends Person
{
    private string $program;
    private int $year;
    private float $fee;

    public function __construct(
        string $name,
        string $address,
        string $program,
        int $year,
        float $fee
    ) {
        parent::__construct($name, $address);
        $this->program = $program;
        $this->year = $year;
        $this->fee = $fee;
    }

    public function getProgram(): string
    {
        return $this->program;
    }

    public function setProgram(string $program): void
    {
        $this->program = $program;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function getFee(): float
    {
        return $this->fee;
    }

    public function setFee(float $fee): void
    {
        $this->fee = $fee;
    }

    #[\Override]
    public function __toString(): string
    {
        
        $personPart = "Person[name={$this->getName()},address={$this->getAddress()}]";
        return "Student[{$personPart},program={$this->program},year={$this->year},fee={$this->fee}]";
    }
}

class Staff extends Person
{
    private string $school;
    private float $pay;

    public function __construct(
        string $name,
        string $address,
        string $school,
        float $pay
    ) {
        parent::__construct($name, $address);
        $this->school = $school;
        $this->pay = $pay;
    }

    public function getSchool(): string
    {
        return $this->school;
    }

    public function setSchool(string $school): void
    {
        $this->school = $school;
    }

    public function getPay(): float
    {
        return $this->pay;
    }

    public function setPay(float $pay): void
    {
        $this->pay = $pay;
    }

    #[\Override]
    public function __toString(): string
    {
        $personPart = "Person[name={$this->getName()},address={$this->getAddress()}]";
        return "Staff[{$personPart},school={$this->school},pay={$this->pay}]";
    }
}


// =====================================================================
// 2) Shape / Circle / Rectangle / Square (abstract version, protected fields)
// =====================================================================

abstract class Shape
{
    protected string $color = "red";
    protected bool $filled = true;

    public function __construct(?string $color = null, ?bool $filled = null)
    {
        if ($color !== null) {
            $this->color = $color;
        }
        if ($filled !== null) {
            $this->filled = $filled;
        }
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function isFilled(): bool
    {
        return $this->filled;
    }

    public function setFilled(bool $filled): void
    {
        $this->filled = $filled;
    }

    abstract public function getArea(): float;

    abstract public function getPerimeter(): float;

    public function __toString(): string
    {
        return "Shape[color={$this->color},filled=" . ($this->filled ? "true" : "false") . "]";
    }
}

class Circle extends Shape
{
    protected float $radius = 1.0;

    public function __construct(
        ?float $radius = null,
        ?string $color = null,
        ?bool $filled = null
    ) {
        parent::__construct($color, $filled);
        if ($radius !== null) {
            $this->radius = $radius;
        }
    }

    public function getRadius(): float
    {
        return $this->radius;
    }

    public function setRadius(float $radius): void
    {
        $this->radius = $radius;
    }

    #[\Override]
    public function getArea(): float
    {
        return M_PI * $this->radius ** 2;
    }

    #[\Override]
    public function getPerimeter(): float
    {
        return 2 * M_PI * $this->radius;
    }

    #[\Override]
    public function __toString(): string
    {
        return "Circle[" . parent::__toString() . ",radius={$this->radius}]";
    }
}

class Rectangle extends Shape
{
    protected float $width = 1.0;
    protected float $length = 1.0;

    public function __construct(
        ?float $width = null,
        ?float $length = null,
        ?string $color = null,
        ?bool $filled = null
    ) {
        parent::__construct($color, $filled);
        if ($width !== null) {
            $this->width = $width;
        }
        if ($length !== null) {
            $this->length = $length;
        }
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function setWidth(float $width): void
    {
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

    #[\Override]
    public function getArea(): float
    {
        return $this->width * $this->length;
    }

    #[\Override]
    public function getPerimeter(): float
    {
        return 2 * ($this->width + $this->length);
    }

    #[\Override]
    public function __toString(): string
    {
        return "Rectangle[" . parent::__toString() . ",width={$this->width},length={$this->length}]";
    }
}

class Square extends Rectangle
{
    public function __construct(
        ?float $side = null,
        ?string $color = null,
        ?bool $filled = null
    ) {
        parent::__construct($side, $side, $color, $filled);
    }

    public function getSide(): float
    {
        return $this->width;
    }

    public function setSide(float $side): void
    {
        $this->setWidth($side);
        $this->setLength($side);
    }

    // The length and width shall be set to the same value.

    #[\Override]
    public function setWidth(float $side): void
    {
        $this->width = $side;
        $this->length = $side;
    }

    #[\Override]
    public function setLength(float $side): void
    {
        $this->width = $side;
        $this->length = $side;
    }

    #[\Override]
    public function __toString(): string
    {
        return "Square[" . parent::__toString() . "]";
    }
}


// =====================================================================
// 3) Animal / Mammal / Cat / Dog
// =====================================================================

class Animal
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function __toString(): string
    {
        return "Animal[name=\"{$this->name}\"]";
    }
}

class Mammal extends Animal
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    #[\Override]
    public function __toString(): string
    {
        return "Mammal[" . parent::__toString() . "]";
    }
}

class Cat extends Mammal
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    public function greets(): void
    {
        echo "Meow";
    }

    #[\Override]
    public function __toString(): string
    {
        return "Cat[" . parent::__toString() . "]";
    }
}

class Dog extends Mammal
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    public function greets(?Dog $another = null): void
    {
        if ($another === null) {
            echo "Woof";
        } else {
            echo "Wooooof";
        }
    }

    #[\Override]
    public function __toString(): string
    {
        return "Dog[" . parent::__toString() . "]";
    }
}