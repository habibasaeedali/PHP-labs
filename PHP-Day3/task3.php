<?php

/* ============================================================================
 * Exercise 1: Author (name, email, gender) + TestAuthor
 * ============================================================================
 */


class Author
{
    private string $name;
    private string $email;
    private string $gender;

    public function __construct(string $name, string $email, string $gender)
    {
        $this->name = $name;
        $this->email = $email;
        $this->gender = $gender;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function __toString(): string
    {
        return "Author[name={$this->name},email={$this->email},gender={$this->gender}]";
    }
}




/* ============================================================================
 * Exercise 2: Book composing ONE Author + TestBook
 * ============================================================================
 */


class Book
{
    private string $name;
    private Author $author;
    private float $price;
    private int $qty;

    public function __construct(string $name, Author $author, float $price, int $qty = 0)
    {
        $this->name = $name;
        $this->author = $author;
        $this->price = $price;
        $this->qty = $qty;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getQty(): int
    {
        return $this->qty;
    }

    public function setQty(int $qty): void
    {
        $this->qty = $qty;
    }

   
    public function __toString(): string
    {
        return "Book[name={$this->name},{$this->author},price={$this->price},qty={$this->qty}]";
    }
}



/* ============================================================================
 * Exercise 3: Book composing an Author[] array (one or more authors) + TestBook
 * ============================================================================
 */


class Book
{
   
    private array $authors;
    private string $name;
    private float $price;
    private int $qty;

    public function __construct(string $name, array $authors, float $price, int $qty = 0)
    {
        $this->name = $name;
        $this->authors = $authors;
        $this->price = $price;
        $this->qty = $qty;
    }

    public function getName(): string
    {
        return $this->name;
    }

   
    public function getAuthors(): array
    {
        return $this->authors;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getQty(): int
    {
        return $this->qty;
    }

    public function setQty(int $qty): void
    {
        $this->qty = $qty;
    }

    public function getAuthorNames(): string
    {
        $names = array_map(fn(Author $a) => $a->getName(), $this->authors);
        return implode(",", $names);
    }

   
    public function __toString(): string
    {
        $authorsStr = implode(",", array_map(fn(Author $a) => (string) $a, $this->authors));
        return "Book[name={$this->name},authors={{$authorsStr}},price={$this->price},qty={$this->qty}]";
    }
}




/* ============================================================================
 * Exercise 4: "now in session" - Author (no gender) + Book (with isbn)
 * ============================================================================
 */


class Author
{
    private string $name;
    private string $email;

    public function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function __toString(): string
    {
        return "Author[name={$this->name},email={$this->email}]";
    }
}

class Book
{
    private string $isbn;
    private string $name;
    private Author $author;
    private float $price;
    private int $qty;

    public function __construct(string $isbn, string $name, Author $author, float $price, int $qty = 0)
    {
        $this->isbn = $isbn;
        $this->name = $name;
        $this->author = $author;
        $this->price = $price;
        $this->qty = $qty;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getQty(): int
    {
        return $this->qty;
    }

    public function setQty(int $qty): void
    {
        $this->qty = $qty;
    }

    public function getAuthorName(): string
    {
        return $this->author->getName();
    }

    public function __toString(): string
    {
        return "Book[isbn={$this->isbn},name={$this->name},{$this->author},price={$this->price},qty={$this->qty}]";
    }
}




/* ============================================================================
 * Exercise 5: Inheritance - Circle (superclass) / Cylinder (subclass)
 * ============================================================================
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

class Cylinder extends Circle
{
    private float $height;

    public function __construct(float $radius = 1.0, float $height = 1.0, string $color = "red")
    {
        parent::__construct($radius, $color);
        $this->height = $height;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function setHeight(float $height): void
    {
        $this->height = $height;
    }

    public function getVolume(): float
    {
        return $this->getArea() * $this->height;
    }

    public function __toString(): string
    {
        return "Cylinder[height={$this->height}," . parent::__toString() . "]";
    }
}




