#### Strategy Pattern

The strategy pattern is a behavioral design pattern that allows you to define a family of algorithms, put each of them into a separate class, and make their objects interchangeable.

The strategy pattern lets the algorithm vary independently from clients that use it.

The strategy pattern is also known as the policy pattern.

#### Problem

Imagine that you are working on a project that uses a lot of different algorithms. For example, you have a class that performs some sort of validation on incoming data. The validation algorithm can be different depending on the type of data, so you need to be able to use different validation algorithms in different situations.

#### Solution

The strategy pattern suggests that you take a class that does something useful in a lot of different ways and extract all of these algorithms into separate classes called strategies.

The original class, called context, must have a field for storing a reference to one of the strategies. The context delegates the work to a linked strategy object instead of executing it on its own.

#### Structure

![Strategy Pattern Structure](https://refactoring.guru/images/patterns/diagrams/strategy/structure.png)

1. The **Strategy** interface declares operations common to all supported versions of some algorithm. The context uses this interface to call the algorithm defined by Concrete Strategies.

2. **Concrete Strategies** implement the algorithm while following the base Strategy interface. The interface makes them interchangeable in the context.

3. The **Context** is configured with a Concrete Strategy object. It maintains a reference to a Strategy object and delegates it executing the algorithm.

#### Example

In this example, the context is a `CreditCard` class. It has a field for storing a reference to a strategy object, called `validator`. The context delegates the work to a linked strategy object instead of executing it on its own.

The `LuhnAlgorithm` class implements the validation algorithm. It is a Concrete Strategy.

```php
<?php

namespace App\Behavioral\Strategy;

class CreditCard
{
    private $number;
    private $date;
    private $cvv;
    private $validator;

    public function __construct(string $number, string $date, string $cvv, Validator $validator)
    {
        $this->number = $number;
        $this->date = $date;
        $this->cvv = $cvv;
        $this->validator = $validator;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getCvv(): string
    {
        return $this->cvv;
    }

    public function validate(): bool
    {
        return $this->validator->isValid($this);
    }
}
```

The `Validator` interface declares the `isValid()` method. All Concrete Strategies must implement this method.

```php

namespace App\Behavioral\Strategy;

interface Validator
{
    public function isValid(CreditCard $creditCard): bool;
}
```

The `LuhnAlgorithm` class implements the validation algorithm. It is a Concrete Strategy.

```php

namespace App\Behavioral\Strategy;

class LuhnAlgorithm implements Validator
{
    public function isValid(CreditCard $creditCard): bool
    {
        $number = $creditCard->getNumber();
        $sumTable = array(
            array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9),
            array(0, 2, 4, 6, 8, 1, 3, 5, 7, 9)
        );
        $sum = 0;
        $flip = 0;

        for ($i = strlen($number) - 1; $i >= 0; $i--) {
            $sum += $sumTable[$flip++ & 0x1][$number[$i]];
        }

        return $sum % 10 === 0;
    }
}
```

The `AmexAlgorithm` class implements the validation algorithm. It is a Concrete Strategy.

```php

namespace App\Behavioral\Strategy;

class AmexAlgorithm implements Validator
{
    public function isValid(CreditCard $creditCard): bool
    {
        $number = $creditCard->getNumber();
        $number = preg_replace('/\D/', '', $number);

        if (strlen($number) != 15) {
            return false;
        }

        if (preg_match('/^3[47][0-9]{13}$/', $number)) {
            return true;
        }

        return false;
    }
}
```

The client code picks a concrete strategy and passes it to the context. The client should be aware of the differences between strategies in order to make the right choice.

```php

namespace App\Behavioral\Strategy;

$creditCard = new CreditCard('1234567890123456', '12/20', '123', new LuhnAlgorithm());

echo $creditCard->validate() ? 'Valid' : 'Invalid';
```

#### When to use

- Use the Strategy pattern when you want to use different variants of an algorithm within an object and be able to switch from one algorithm to another during runtime.

- Use the pattern when you have a lot of similar classes that only differ in the way they execute some behavior.

- Use the pattern to isolate the business logic of a class from the implementation details of algorithms that may not be as important in the context of that logic.

#### How to implement

1. Identify the aspects of your application that vary and separate them from what stays the same.

2. Program to an interface, not an implementation.

3. Favor composition over inheritance.

#### Pros and Cons

**Pros:**

- You can swap algorithms used inside an object at runtime.

- You can isolate the implementation details of an algorithm from the code that uses it.

- Open/Closed Principle. You can introduce new strategies without having to change the context.

**Cons:**

- Clients must be aware of the differences between strategies in order to be able to select a proper one.

- A lot of modern programming languages have functional type support that lets you implement different versions of an algorithm inside a set of anonymous functions. Then you can pass these functions around as if they were objects. The Strategy pattern can be unnecessary in such languages.
